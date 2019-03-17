---
title: Off-site redirect payment gateways
taxonomy:
    category: docs
---

In an off-site redirect payment gateway, the customer is taken to the third party payment provider's website during the checkout process. This happens when the customer clicks the *Pay and complete purchase* button:
![Pay and complete purchase](../../../images/create-payment-gateway-4.png)

To implement this functionality, you will need to create an *Offsite payment* plugin form. When a payment gateway implements the `OffsitePaymentGatewayInterface` interface, this plugin form is embedded into the *Payment process* checkout pane. To implement this form, you will need to:
1. Extend the base off-site payment form.
2. Add your payment form to your payment gateway plugin annotation.
3. Implement the `buildConfigurationForm()` method for your payment form:
  * Build the array of data for the request to the payment provider.
  * Specify the request method (POST or GET).
  * Use `buildRedirectForm()` to submit the request to the payment provider.

### 1. Extend the base off-site payment form
Your plugin form should extend `PaymentGatewayFormBase`, like this:

```php
<?php

namespace Drupal\my_custom_gateway\PluginForm;

use Drupal\commerce_payment\Exception\PaymentGatewayException;
use Drupal\commerce_payment\PluginForm\PaymentOffsiteForm as BasePaymentOffsiteForm;
use Drupal\Core\Form\FormStateInterface;

class MyCustomPaymentForm extends BasePaymentOffsiteForm {

  /**
   * {@inheritdoc}
   */
  public function buildConfigurationForm(array $form, FormStateInterface $form_state) {
    $form = parent::buildConfigurationForm($form, $form_state);

     ... your custom code here ...

    return $this->buildRedirectForm($form, $form_state, ...your parameters...);
  }

}
```

The base `PaymentOffsiteForm` class provides the `buildRedirectForm()` method that you'll use to invoke the request to the payment provider at the end of your `buildConfigurationForm()` method.  In addition to the `$form` and `$form_state`, you will pass it the redirect url for your payment provider, an array of data to be submitted to the payment provider, and the redirect method (GET or POST).

The base form's `buildConfigurationForm()` method checks that the required `$form['#return_url']` and `$form['#cancel_url']` values are present. Also, if `$form['#capture']` has not been set, it will provide *TRUE* as a default value, meaning that the payment should be authorized and captured rather than just authorized.

### 2. Add your payment form to the gateway plugin annotation
In the `@CommercePaymentGateway` ***annotation*** at the start of your off-site payment gateway plugin, you need to specify the class for your custom ***offsite-payment*** plugin form:

```php
 *    forms = {
 *     "offsite-payment" = "Drupal\my_custom_gateway\PluginForm\MyCustomPaymentForm",
 *   },
```

### 3. Implement the `buildConfigurationForm()` method
We only need to implement one method, `buildConfigurationForm()`, for the payment form plugin class. This method is responsible for:
* building the array of data for the request to the payment provider
* specifying the request method (POST or GET)
* using `buildRedirectForm()` to submit the request to the payment provider

Handling the actual response from the payment provider is covered in subsequent documentation pages: [Return from payment provider](../03.return-from-payment-provider) and [Handling an IPN](../04.handling-ipn).

#### Gathering data for the request to the payment provider:
Your payment gateway API documentation will provide you with the information you need to build an array of data to be submitted to the payment provider. This data may come from multiple sources such as:
* your custom payment gateway configuration
* the payment entity
* the order and its billing profile
* form data (the *return* and *cancel* url values)

For example:
```php
/** @var \Drupal\commerce_payment\Entity\PaymentInterface $payment */
$payment = $this->entity;

/** @var \Drupal\commerce_payment\Plugin\Commerce\PaymentGateway\OffsitePaymentGatewayInterface $payment_gateway_plugin */
$payment_gateway_plugin = $payment->getPaymentGateway()->getPlugin();
$configuration = $payment_gateway_plugin->getConfiguration();

// Payment gateway configuration data.
$data['version'] = 'v10';
$data['merchant_id'] = $configuration['merchant_id'];
$data['agreement_id'] = $configuration['agreement_id'];
$data['language'] = $configuration['language'];

// Payment data.
$data['currency'] = $payment->getAmount()->getCurrencyCode();
$data['total'] => $payment->getAmount()->getNumber();
$data['variables[payment_gateway]'] = $payment->getPaymentGatewayId();
$data['variables[order]'] = $payment->getOrderId();

// Order and billing address.
$order = $payment->getOrder();
$billing_address = $order->getBillingProfile()->get('address');
$data['name'] = $billing_address->->getGivenName() . ' ' $billing_address->getFamilyName();
$data['city'] = $billing_address->getLocality();
$data['state'] = $billing_address->getAdministrativeArea()

// Form url values.
$data['continueurl'] = $form['#return_url'];
$data['cancelurl'] = $form['#cancel_url'];
```

#### POST vs GET request methods
For the API request submission, you need to specify either *POST* or *GET* for the request method. You do so by setting the last parameter of the `buildRedirectForm()` call to one of:
* `PaymentOffsiteForm::REDIRECT_POST`
* `PaymentOffsiteForm::REDIRECT_GET`

If the request method is *GET*, then `buildRedirectForm()` attaches the `$data` array as the *query string* for the `$redirect_url`. It then throws a `NeedsRedirectException`, an exception that represents the need for an HTTP redirect. If no request method is specified, *GET* is used as the default value.

If the request method is *POST*, then `buildRedirectForm()` attaches javascript that auto-clicks the form submit button. The form will display this message and a button to allow the customer to re-submit the form to the `$redirect_url`:

>Please wait while you are redirected to the payment server. If nothing happens within 10 seconds, please click on the button below.

In addition to the submit button, the customer is also presented with a *Go back* cancel button, which will invoke the payment gateway's `onCancel()` method.

#### Submit the API request to the payment provider
The last parameter we need to pass into `buildRedirectForm()` is the actual `$redirect_url`. So the final statement of your `buildConfigurationForm()` method should look something like this:

```php
<?php

    return $this->buildRedirectForm(
      $form,
      $form_state,
      'https://payment.my_payment_provider.net',
      $data,
      PaymentOffsiteForm::REDIRECT_POST
    );
  }
}
```

After building your *Offsite payment* plugin form, continue with the [Return from payment provider](../03.return-from-payment-provider) documentation to learn how to handle the return from the payment provider.
