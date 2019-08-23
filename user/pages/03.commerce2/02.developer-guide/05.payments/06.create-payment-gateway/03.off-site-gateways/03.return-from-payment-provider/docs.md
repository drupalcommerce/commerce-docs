---
title: Return from payment provider
taxonomy:
    category: docs
---

After a customer provides his payment details to the payment provider for your off-site gateway, the payment provider redirects the customer back to your site. If the customer declines to provide his payment details and cancels the payment at the payment provider, he will be redirected back to the cancel url. Otherwise, he will be redirected back to the return url so that you can validate that the payment actually succeeded and create the  Drupal Commerce payment for the customer's order.

Off-site payment gateways implement the `OffsitePaymentGatewayInterface`, which defines the methods used to handle the return from the payment provider:  `onCancel()`, and `onReturn()`. This documentation page describes how to implement these methods, which is just one aspect of creating an off-site payment gateway. See the [Off-site payment gateways docmentation](../docs.md) for a full overview. 

Note that if your payment provider supports asynchronous notifications (IPNs), then creating the payment in `onNotify()` is preferred, since it is guaranteed to be called even if the customer does not return to the site. Also, some off-site payment gateways do not need to implement the `onReturn()` method at all. Instead, they just handle payment creation and processing in the `onNotify()` method. See the [Handling an IPN documentation](../04.handling-ipn) for more information.  


### Handling payment cancellation
The `onCancel` method allows the payment gateway to clean up any data added to the order and set a message for the customer. It can be invoked during checkout if the customer chooses the *Go back* link instead of the *Proceed to payment gateway* link. For payments cancelled at the payment provider, you will need to provide the url for the checkout endpoint. Typically, this information is provided in the api request. For example, the [Ingenico payment gateway] includes this statement while building the api request in the `buildConfigurationForm` method of its off-site plugin form:

```php
$ecommercePaymentRequest->setCancelurl($form['#cancel_url']);
$ecommercePaymentRequest->setBackurl($form['#cancel_url']);
```

For many payment gateways, the default implementation of the `onCancel` method that's provided by the off-site payment gateway base class is sufficient. It simply displays a message to the customer:

```php
public function onCancel(OrderInterface $order, Request $request) {
  $this->messenger()->addMessage($this->t('You have canceled checkout at @gateway but may resume the checkout process here when you are ready.', [
    '@gateway' => $this->getDisplayLabel(),
  ]));
}
```

### Handling payment submission
When the user returns from the payment provider, we need to validate that the payment actually succeeded. Just as in payment cancellation processing, you will typically provide the url for the return request in the `buildConfigurationForm` method of the off-site plugin form. Actual implementations will vary based on the payment gateway api. This is example code from the [Ingenico payment gateway] module:

```php
$ecommercePaymentRequest->setAccepturl($form['#return_url']);
$ecommercePaymentRequest->setDeclineurl($form['#return_url']);
$ecommercePaymentRequest->setExceptionurl($form['#return_url']);
``` 

This return url endpoint will be routed to the `onReturn()` method in the off-site payment gateway plugin class:

`public function onReturn(OrderInterface $order, Request $request);`

This method is responsible for:
* performing verifications, throwing exceptions as needed
* creating and saving information to the Drupal Commerce payment for the order

Typically, you will also want to log the information returned by the provider. See [How to Log Messages in Drupal 8] for more information.

This method should only be concerned with creating/completing *payments*. The parent *order* does not need to be touched. It is only provided as a parameter so that information from the order can be used and so that the newly created payment can be added to the order. The order state is updated automatically when the order is paid in full, or manually by the merchant (via the admin UI).

#### Performing verifications
If the payment fails for any reason, the method should throw a `PaymentGatewayException`. This will reset the payment.

![Payment error message](../../../images/create-payment-gateway-5.png)

Before you even begin processing the request, you should first verify that it is actually a legitmate request *from the payment provider*. For an overview and examples of how this is handled by several actual payment gateway modules, read the [Security considerations](../05.security-considerations) documentation.

Next, you can perform additional verification steps, specific to your payment gateway api. For example, the [Rave payment gateway] requires verification that the order amount matches the charged amount:

```php
$logger = \Drupal::logger('commerce_rave');
$chargedAmount = $transactionData['charged_amount'];
$orderAmount = $order->getTotalPrice()->getNumber();
if ($orderAmount != $chargedAmount) {
  $logger->warning('Charged Amount is: ' . $chargedAmount . ' while Order Amount: ' . $orderAmount);
  throw new PaymentGatewayException('Charged amount not equal to order amount.');
}
```

#### Creating and saving the payment
If the payment was successful, the method should create a payment and store it. Here is an example from the [Rave payment gateway]:

```php
$payment_storage = $this->entityTypeManager->getStorage('commerce_payment');
$payment = $payment_storage->create([
  'state' => 'authorization',
  'amount' => $order->getTotalPrice(),
  'payment_gateway' => $this->entityId,
  'order_id' => $order->id(),
  'remote_id' => $transactionData['flw_ref'],
  'remote_state' => $transactionData['status'],
]);

$logger->info('Saving Payment information. Transaction reference: ' . $merchantTransactionReference);

$payment->save();
drupal_set_message('Payment was processed');

$logger->info('Payment information saved successfully. Transaction reference: ' . $merchantTransactionReference);
```

The payment provider you are integrating with might have different ways to complete a payment. For example, in the example above, the payment `state` was set to *authorization*. For other payment gateways, you may want to set the `state` to *completed*.


[Rave payment gateway]: https://www.drupal.org/project/commerce_rave
[Ingenico payment gateway]: https://www.drupal.org/project/commerce_ingenico
[How to Log Messages in Drupal 8]: https://drupalize.me/blog/201510/how-log-messages-drupal-8
