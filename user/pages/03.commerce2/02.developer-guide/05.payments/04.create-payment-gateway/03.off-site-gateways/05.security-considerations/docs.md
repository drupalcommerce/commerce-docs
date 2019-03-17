---
title: Security considerations
taxonomy:
    category: docs
---

Off-site payment gateways are potentially vulnerable to malicious attacks because they accept requests from external sources. The `onReturn()`, `onNotify()` and`onCancel()` methods all accept a `[Request]` which *should* come from the payment gateway. Unfortunately, it's not possible for Drupal Commerce to automatically apply CSRF protections that will work for all types of Off-site payment gateways. So as an *Off-site* payment gateway developer, it's your responsibility to read and understand the integration documentation and implement protections specific to your gateway. By properly implementing the gateway's CSRF protections, you ensure that the `Request` actually *does* come from the gateway and not some malicious source.

In this document, we've included a few examples of `Request` validation implementations used by actual Drupal Commerce Off-site payment gateways.

#### PayPal: Express checkout payment gateway (an example of token-based validation)

PayPal: Express Checkout is an Off-site *redirect* payment gateway. Its API documentation describes how the `[GetExpressCheckoutDetails]` method can be used to validate the token for an order. Let's look at how that implemented within the [Commerce PayPal module].

When the checkout redirect form is built and a request is sent to PayPal, a timestamped *TOKEN* value is returned by PayPal and stored with the order data:

```php
$paypal_response = $payment_gateway_plugin->setExpressCheckout($payment, $extra);

// If we didn't get a TOKEN back from PayPal, then the
// $paypal_response['ACK'] == 'Failure', we need to exit checkout.
if (empty($paypal_response['TOKEN'])) {
  throw new PaymentGatewayException(sprintf('[PayPal error #%s]: %s', $paypal_response['L_ERRORCODE0'], $paypal_response['L_LONGMESSAGE0']));
}

$order = $payment->getOrder();
$order->setData('paypal_express_checkout', [
  'flow' => 'ec',
  'token' => $paypal_response['TOKEN'],
  'payerid' => FALSE,
  'capture' => $extra['capture'],
]);
$order->save();
```

Then in the `onReturn()` method, the *TOKEN* is retrieved from the order and sent with the `GetExpressCheckoutDetails()`request. PayPal validates the *TOKEN*. The `Request` that was received is never actually used; instead, the request from PayPal simply serves to notify the Express checkout payment gateway that it should request updated information about the payment using PayPal's `GetExpressCheckoutDetails` API operation. So if the `Request` that was received came from some other source, its contents are safely ignored.

```php
$order_express_checkout_data = $order->getData('paypal_express_checkout');
if (empty($order_express_checkout_data['token'])) {
  throw new PaymentGatewayException('Token data missing for this PayPal Express Checkout transaction.');
}

// GetExpressCheckoutDetails API Operation (NVP).
// Shows information about an Express Checkout transaction.
$paypal_response = $this->getExpressCheckoutDetails($order);

// If the request failed, exit now with a failure message.
if ($paypal_response['ACK'] == 'Failure') {
  throw new PaymentGatewayException($paypal_response['PAYMENTREQUESTINFO_0_LONGMESSAGE'], $paypal_response['PAYMENTREQUESTINFO_n_ERRORCODE']);
}
```

The validation procedure used by the `onNotify()` method is slightly different in that the `Request` from PayPal (or some other source) *is* processed. Essentially, though, the concept is the same: when a `Request` is received by the `onNotify()` method, the Express checkout payment gateway responds back to PayPal with information to be used by PayPal for IPN validation. Once verified, PayPal will respond with the actual IPN request data which can then be safely processed by the `onNotify()` method. For more information, see the [Handling an IPN documentation](../04.handling-ipn)


### Ingenico payment gateway (an example of SHA signature/passphrase validation)

Ingenico uses a "SHA-IN" to validate incoming requests POSTed to their offsite. And then a "SHA-OUT" to validate the final redirect. In the [Redirection with database update] section of the Ingenico Integration Guide, they describe the security requirements for verifying the contents of requests:

>The redirection is done via the customer’s browser, which makes it visible. Therefore, you must use an SHA-OUT signature to verify the contents of the request and prevent customers tampering with the data in the URL field, which could result in fraudulent database updates.

>If you don't configure a SHA-OUT signature, we won't send any parameters on your redirection URLs.

>The string to hash is constructed by concatenating the values of the fields sent with the order (sorted alphabetically, in the format ‘parameter=value’), followed by a passphrase. The passphrase is defined in the Transaction feedback tab of your Technical information page, “All transaction Submission modes” section.

In the `commerce_ingencio` module, this validation is implemented in a `processFeedback()` method that's used by both the `onReturn()` and `onNotify()` methods to process the `Request`:

```php
$ecommercePaymentResponse = new EcommercePaymentResponse($request->query->all());

// Validate response's SHASign.
$passphrase = new Passphrase($this->configuration['sha_out']);
$sha_algorithm = new HashAlgorithm($this->configuration['sha_algorithm']);
$shaComposer = new AllParametersShaComposer($passphrase, $sha_algorithm);
if (!$ecommercePaymentResponse->isValid($shaComposer)) {
  $payment->set('state', 'failed');
  $payment->save();
  throw new InvalidResponseException($this->t('The gateway response looks suspicious.'));
}
```

### CCAvenue payment gateway (an example of encryption/decryption validation)
When a request is sent to CCAvenue, it is encrypted using a *Working Key*. The *working key* is an API key generated by CCAvenue that is set as part of the payment gateway configuration. 

When the checkout redirect form is built, that *working key* is encrypted and sent to CCAvenue along with the rest of the data from the merchant.
That same *Working Key* is used in the `onRedirect()` method to decrypt the response received from CCAvenue:

```php
    $encResponse = $request->get('encResp');
    $decrypt = new CCAvenueEncryption();
    $rcvdString = $decrypt->decrypt($encResponse, $this->configuration['working_key']);
    $decryptValues = explode('&', $rcvdString);
    $dataSize = sizeof($decryptValues);

    for ($i = 0; $i < $dataSize; $i++) {
      $information = explode('=', $decryptValues[$i]);
      if ($i == 3)
        $order_status = $information[1];
    }
```

If the *request* received by the `onReturn()` method is successfully decrypted, the `order_status` value should be one of *Success*, *Aborted*, or *Failure*. Otherwise, the *request* is invalid and should not be processed.

```php
    switch ($order_status) {
....
      default:
        drupal_set_message($this->t('Security Error. Illegal access detected.'), 'error');
        break;
    }
```

### Links and Resources
* [Wikipedia description of CSRF]

[Request]: https://api.drupal.org/api/drupal/vendor%21symfony%21http-foundation%21Request.php/class/Request/8.7.x
[GetExpressCheckoutDetails]: (https://developer.paypal.com/docs/classic/api/merchant/SetExpressCheckout_API_Operation_NVP/)
[Commerce PayPal module]: https://www.drupal.org/project/commerce_paypal
[Redirection with database update]: https://www2.payment-services.ingenico.com/int/en/ogone/support/guides/integration%20guides/e-commerce/transaction-feedback#redirectionwithdatabaseupdate
[Wikipedia description of CSRF]: https://en.wikipedia.org/wiki/Cross-site_request_forgery

