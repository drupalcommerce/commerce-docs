---
title: Off-site (redirect) payment gateways
taxonomy:
    category: docs
---

This documentation will explain how to set up an off-site payment gateway. Off-site payment is enabled through a redirect from the Payment checkout page to the payment service, with customers ideally being returned back to the Payment page upon success or failure so they can be moved forward or backward in the checkout process as the case may require.

Off-site payment flow:
 1. Customer hits the *payment* checkout step.
 2. The *PaymentProcess* checkout pane shows the *offsite-payment* plugin form.
 3. The plugin form performs a redirect or shows an iFrame.
 4. The customer provides their payment details to the payment provider.
 5. The payment provider redirects the customer back to the return url.
 6. A payment is created in either *onReturn()* or *onNotify()*.

- If the payment provider supports asynchronous notifications (IPNs), then creating the payment in *onNotify()* is preferred, since it is guaranteed to be called even if the customer does not return to the site.
- If the customer declines to provide their payment details, and cancels the payment at the payment provider, they will be redirected back to the cancel url.

We'll continue with the QuickPay payment gateway example that was started in the [Creating payment gateways documentation](../docs.md). In that example, we created a custom module, configuration schema, payment plugin, and configuration form methods. With the configuration all set up, we can proceed to configure the checkout.

### Checkout
In the ***annotation*** for the QuickPay payment gateway plugin (`RedirectCheckout`), we defined the ***offsite-payment*** form class:

```php
 *    forms = {
 *     "offsite-payment" = "Drupal\commerce_quickpay\PluginForm\RedirectCheckoutForm",
 *   },
```

This defines a form that Drupal Commerce will redirect to, when the user clicks the *Pay and complete purchase* button:

![Pay and complete purchase](../../images/create-payment-gateway-4.png)

We only need to implement one method, `buildConfigurationForm`, for the `RedirectCheckoutForm` form. This is a pretty straightforward Drupal form, and it should not hold any surprises. For this example, we will set a lot of hidden fields and automatically redirect the user to QuickPay.

```php
<?php

namespace Drupal\commerce_quickpay\PluginForm;

use Drupal\commerce_payment\PluginForm\PaymentOffsiteForm;
use Drupal\Core\Form\FormStateInterface;

class RedirectCheckoutForm extends PaymentOffsiteForm {

  public function buildConfigurationForm(array $form, FormStateInterface $form_state) {
    $form = parent::buildConfigurationForm($form, $form_state);
    $configuration = $this->getConfiguration();

    /** @var \Drupal\commerce_payment\Entity\PaymentInterface $payment */
    $payment = $this->entity;

    $data['version'] = 'v10';
    $data['private_key'] = $configuration['private_key'];
    $data['api_key'] = $configuration['api_key'];

    return $this->buildRedirectForm(
      $form,
      $form_state,
      'https://payment.quickpay.net',
      $data,
      PaymentOffsiteForm::REDIRECT_POST
    );
  }
}
```
*Again remember that this is just for illustration purposes; the real QuickPay implementation requires a lot more details.*

That completes our ***Checkout*** implementation. Next, we need to handle the returning user.

### Return from payment provider
When the user returns from the payment provider, we need to validate that the payment actually succeeded. To do this, we'll implement the `onReturn()` method in the `RedirectCheckout` class. If the payment failed, the method should throw a `PaymentGatewayException`. This will reset the payment. The Drupal Comerce Payment module provides several other *Exceptions* in addition to the *PaymentGatewayException*, which are listed at the end of this page.

![Errornous payment](../../07.off-site-redirect-gateways/errornous-payment.png)

If the payment was successful, the method should create a payment and store it:

```php
public function onReturn(OrderInterface $order, Request $request) {
    if ($request->something_that_marks_a_failure) {
        throw new PaymentGatewayException('Payment failed!');
    }

    $payment_storage = $this->entityTypeManager->getStorage('commerce_payment');
    $payment = $payment_storage->create([
      'state' => 'completed',
      'amount' => $order->getTotalPrice(),
      'payment_gateway' => $this->entityId,
      'order_id' => $order->id(),
      'remote_id' => $request->request->get('remote_id'),
      'remote_state' => $request->request->get('remote_state'),
    ]);

    $payment->save();
}
```

In this example code, we've simply used `if ($request->something_that_marks_a_failure)`. In an actual implementation, you would need to use logic specific to your payment provider and do comprehensive error-checking. Typically, you will also want to log the information returned by the provider. See [How to Log Messages in Drupal 8] for more information.

Also, note that the payment provider you are integrating with might have different ways to complete a payment. Some payment providers, including QuickPay, will not pass any sensitive information in the request when returning. You may need to implement a callback method or submit a request for additional information from the provider.

And that's it. You should now be able to implement checkouts for the off-site payment provider of your choice.

### Handling Payment Gateway Exceptions
In this example, we used the *PaymentGatewayException* to handle failures in the *onReturn()* method. ***PaymentGatewayException*** is the *Base* exception for all payment gateway errors. As stated in the [Drupal 8 Coding standards documentation on PHP Exceptions]:

>The use of subclassed Exceptions is preferred over reusing a single generic Exception class with different error messages as different classes may then be caught separately.

The Drupal Commerce Payment module provides several subclassed Exceptions:

- ***DeclineException*** is a base exception for declined transactions. A transaction can be declined due to an invalid payment method, fraud check, expired authorization, etc. See the [Braintree documentation on Declines] for a good, detailed explanation.<br />The Payment module provides two additional *Decline* exceptions that subclass *DeclineException*:
 - ***HardDeclineException*** should be thrown for declined transactions that can't be retried.
 - ***SoftDeclineException*** should be thrown for declined transactions that can be retried.

- ***InvalidRequestException*** is an exception for requests that are invalid due to missing or invalid parameters, usually indicating a bug in the plugin logic.
 - ***AuthenticationException*** is a subclass of *InvalidRequestException*. It should be thrown when the request can't be properly authenticated (usually because of missing or invalid API keys).<br />&nbsp;<br />

- ***InvalidResponseException*** should be thrown when the payment gateway receives an invalid response. The API endpoint might be down, throwing an error, or returning a response whose signature can't be verified.

[How to Log Messages in Drupal 8]: https://drupalize.me/blog/201510/how-log-messages-drupal-8
[Drupal 8 Coding standards documentation on PHP Exceptions]: https://www.drupal.org/docs/develop/coding-standards/php-exceptions
[Braintree documentation on Declines]: https://articles.braintreepayments.com/control-panel/transactions/declines
