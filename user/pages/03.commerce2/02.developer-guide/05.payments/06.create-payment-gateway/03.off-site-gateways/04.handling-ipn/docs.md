---
title: Handling an IPN
taxonomy:
    category: docs
---

Many payment providers use notifications, generally described as "IPNs", "endpoints", or "webhooks", to submit information asynchronously to the payment gateways that support them. Payment providers may inform a Drupal Commerce site that a new pending/complete payment should be created (if the payment happened off-site), or they may provide information about an existing payment (refunds, disputes, etc).

The Drupal Commerce Payment module handles these notifications by:
1. Providing a URL that can be used by the payment provider to send the information.
2. Providing a route and controller, the `PaymentNotificationController`, that will pass the received information on to a payment gateway that can process it.

If your payment gateway module needs to handle IPNs, it can do so by implementing the `SupportsNotificationsInterface`. This interface defines the `onNotify()` method, which is the method called by the `PaymentNotificationController`:

```php
/**
 * Processes the notification request.
 *
 * @param \Symfony\Component\HttpFoundation\Request $request
 *   The request.
 *
 * @return \Symfony\Component\HttpFoundation\Response|null
 *   The response, or NULL to return an empty HTTP 200 response.
 */
public function onNotify(Request $request);
```
#### What does the `onNotify()` method do?
The `onNotify()` method processes the notification request. It can create new payments or update existing payments. Typically, it will update the state of a payment based on the information in the request. If the state is set to *completed*, the amount of the payment will be included in the "total paid amount" for the order. The `onNotify()` method does not need to (*and should not*) touch the parent order. When the payment is saved in the `onNotify()` method, the total paid amount for the order will be automatically updated, based on all payments associated with the order.

If the payment is declined, the payment gateway should ***not*** create a payment entity. The only time a declined payment should be created is if the payment gateway utilizes async payments – like ACH or authorizations which take 24 hours to clear. Payment entities should be created only if the payment is successful or pending.

You may also want to log the request or other message, especially if the request was invalid.

The `onNotify()` method should return a [Symfony Response] or NULL to return an empty HTTP 200 response.

### Off-site payment gateways and IPNs
All off-site payment gateways implement the `SupportsNotificationsInterface` interface. Generally, off-site payment gateways will create payments in the `onReturn()` method. However, if the payment provider supports IPNs, then creating the payment in `onNotify()` rather than in `onReturn()` is preferred, since it is guaranteed to be called even if the customer does not return to the site.

### Examples of IPN handling by actual off-site payment gateways

#### [PayPlug payment gateway]
The PayPlug payment gateway module has a straightforward implementation of the `onNotify()` method, which is used to create the payment. First, the Request is validated, using a library provided by PayPlug:

```php
$notification = $request->getContent();
Payplug::setSecretKey($this->api_key);
$resource = \Payplug\Notification::treat($notification, $authentication = null);
```

If validation fails, it returns a `JsonResponse` with the exception thrown by the PayPlug `Notification::treat()` method:

```php
return new JsonResponse($exception->getMessage(), $exception->getCode());
```

Otherwise, it uses the returned PayPlug resource value to create a new payment for the order and returns an empty (success) Response:

```php
$metadata = $resource->metadata;
$payment_storage = $this->entityTypeManager->getStorage('commerce_payment');
$payment = $payment_storage->create([
  'state' => 'authorization',
  'amount' => new Price($resource->amount / 100, $resource->currency),
  'payment_gateway' => $this->entityId,
  'order_id' => $metadata['order_id'],
  'test' => $this->getMode() == 'test',
  'remote_id' => $resource->id,
  'remote_state' => empty($resource->failure) ? 'paid' : $resource->failure->code,
  'authorized' => $this->time->getRequestTime(),
]);
$payment->save();

return new JsonResponse();
```

#### [Ingenico payment gateway]
The Ingenico payment gateway is an example of an off-site payment gateway that creates the payment *before* the plugin form performs the redirect. So the payment is created in neither `onReturn()` nor `onNotify()`. The Drupal Commerce *payment ID* is provided to the payment provider so that the existing payment can be loaded in `onReturn()` and `onNotify()`:

```php
$payment = $this->entityTypeManager->getStorage('commerce_payment')->load($request->query->get('PAYMENT_ID'));
```

In both methods, every request is logged before any processing happens:
```php
// Log the response message if request logging is enabled.
if (!empty($this->configuration['api_logging']['response'])) {
  \Drupal::logger('commerce_ingenico')
    ->debug('e-Commerce notification: <pre>@body</pre>', [
      '@body' => var_export($request->query->all(), TRUE),
    ]);
}
```

Next, the response is verified using SHA signature/passphrase validation, as described in the [Security considerations documentation](../03.off-site-gateways/03.security-considerations). If the response received from the payment provider is invalid or unsuccessful, the payment state is set to *failed* and an exception is thrown.

```php
$payment->set('state', 'failed');
$payment->save();
throw new InvalidResponseException($this->t('The gateway response looks suspicious.'));
```

Finally, if the request is valid, the `onNotify()` method updates the payment state:
```php
// Let's also update payment state here - it's safer doing it from received
// asynchronous notification rather than from the redirect back from the
// off-site redirect.
$state = $request->query->get('STATUS') == PaymentResponse::STATUS_AUTHORISED ? 'authorization' : 'completed';
$payment->set('state', $state);
$payment->save();
```
The Ingenico payment gateway uses IPNs from the payment provider to more reliably capture the correct payment state. The payment state is only set to *authorized* or *completed* in the `onNotify()` method; the `onReturn()` method does not change a payment's state.


#### [PayPal: Express checkout payment gateway]
The PayPal: Express payment gateway creates payments in its `onReturn()` method with a `remote_id` value that can be used by `onNotify()` (and other methods) to load the payment, using the `loadByRemoteId()` *Payment storage* method. Its `onNotify()` method handles updates to the payment *amount* and *state* as well as refunds. Here is the portion of its `onNotify()` method that handles refunds using the IPN data:

```php
elseif ($ipn_data['payment_status'] == 'Refunded') {
  // Get the corresponding parent transaction and refund it.
  $payment = $payment_storage->loadByRemoteId($ipn_data['txn_id']);
  if (!$payment) {
    $this->logger->warning('IPN for Order @order_number ignored: the transaction to be refunded does not exist.', ['@order_number' => $ipn_data['invoice']]);
    return FALSE;
  }
  elseif ($payment->getState() == 'refunded') {
    $this->logger->warning('IPN for Order @order_number ignored: the transaction is already refunded.', ['@order_number' => $ipn_data['invoice']]);
    return FALSE;
  }
  $amount = new Price((string) $ipn_data['mc_gross'], $ipn_data['mc_currency']);
  // Check if the Refund is partial or full.
  $old_refunded_amount = $payment->getRefundedAmount();
  $new_refunded_amount = $old_refunded_amount->add($amount);
  if ($new_refunded_amount->lessThan($payment->getAmount())) {
    $payment->setState('partially_refunded');
  }
  else {
    $payment->setState('refunded');
  }
  $payment->setRefundedAmount($new_refunded_amount);
}
```
Handling IPNs from PayPal involves an extra validation step: PayPal includes a validation URL in its IPN data. So the first step for the `onNotify()` method is to extract that URL from the request and use it to send a request back to PayPal to validate the IPN. In the *Commerce PayPal* module, this functionality is included in an `IPNHandler` service:

```php
// Make PayPal request for IPN validation.
$url = $this->getIpnValidationUrl($ipn_data);
$validate_ipn = 'cmd=_notify-validate&' . $request->getContent();
$request = $this->httpClient->post($url, [
  'body' => $validate_ipn,
])->getBody();
$paypal_response = $this->getRequestDataArray($request->getContents());

// If the IPN was invalid, log a message and exit.
if (isset($paypal_response['INVALID'])) {
  $this->logger->alert('Invalid IPN received and ignored.');
  throw new BadRequestHttpException('Invalid IPN received and ignored.');
}

return $ipn_data;
```

See the [Security considerations documentation](../05.security-considerations) for additional information on how PayPal uses token-based validation for requests sent to the payment gateway.

#### Configuring the notification URL for your payment gateway
By default, your Drupal Commerce site can accept payment gateway requests at `/payment/notify/PAYMENT_GATEWAY_ID`, where PAYMENT_GATEWAY_ID is the id defined by the payment gateway's annotation. For example, *PayPal: Express checkout* accepts notifications at `/payment/notify/paypal_express_checkout`. You will need to read the documentation for your specific payment gateway to figure how to enable IPN/notification messages and how to configure the URL.

If you would like to alter the URL for notifications, you can [implement a Route Subscriber] for the `commerce_payment.notify` route.

[implement a Route Subscriber]: https://www.drupal.org/docs/8/api/routing-system/altering-existing-routes-and-adding-new-routes-based-on-dynamic-ones
[Symfony Response]: https://api.drupal.org/api/drupal/vendor%21symfony%21http-foundation%21Response.php/class/Response/8.2.x
[PayPlug payment gateway]: https://www.drupal.org/project/commerce_payplug
[Ingenico payment gateway]: https://www.drupal.org/project/commerce_ingenico
[PayPal: Express checkout payment gateway]: https://www.drupal.org/project/commerce_paypal
