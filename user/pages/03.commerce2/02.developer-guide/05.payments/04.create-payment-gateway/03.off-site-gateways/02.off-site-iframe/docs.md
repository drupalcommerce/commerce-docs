---
title: Off-site (iFrame) payment gateways
taxonomy:
    category: docs
---

This documentation page will explain how to set up the iFrame portion of an off-site (iFrame) payment gateway. If you have not already read the [Off-site payment gateways](../../docs.md) documentation, start there for an overview and initial steps. Also, for an introduction to the Drupal Javascript API, see:
* [Drupal 8 documentation on JavaScript API overview]
* [Acquia tutorial topic: Add a custom variable to Drupal.Settings]

Off-site payments in iFrames work similarly to off-site payments by redirect. The difference is that in the **Checkout** process, the "off-site" portion is handled within an embedded iFrame and does not take the customer to the third party payment gateway's website. This happens when the customer clicks the *Pay and complete purchase* button during checkout:
![Pay and complete purchase](../../../images/create-payment-gateway-4.png)

To build this functionality, you will need to implement JavaScript for your iFrame, create an *Offsite payment* plugin form, and attach your iFrame JavaScript to that form. The *Offsite payment* plugin form will be responsible for providing the iFrame with all necessary data about the payment, order, customer, and gateway configuration, according to your payment provider's API specifications.

### Creating an *Offsite payment* plugin form
Just as in an [Off-site *redirect* payment gateway](../01.off-site-redirect), you will need to create an *Offsite payment* plugin form. When a payment gateway implements the `OffsitePaymentGatewayInterface` interface, this plugin form is embedded into the *Payment process* checkout pane. To implement this form, you will need to:
1. Extend the base off-site payment form.
2. Add your payment form to your payment gateway plugin annotation.
3. Implement the `buildConfigurationForm()` method for your payment form.

#### 1. Extend the base off-site payment form
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

  }

}
```

The base form's `buildConfigurationForm()` method checks that the required `$form['#return_url']` and `$form['#cancel_url']` values are present, which you may need to include in the data passed to your iFrame JavaScript.

#### 2. Add your payment form to the gateway plugin annotation
In the `@CommercePaymentGateway` ***annotation*** at the start of your off-site payment gateway plugin, you need to specify the class for your custom ***offsite-payment*** plugin form:

```php
 *    forms = {
 *     "offsite-payment" = "Drupal\my_custom_gateway\PluginForm\MyCustomPaymentForm",
 *   },
```

#### 3. Implement the `buildConfigurationForm()` method
We only need to implement one method, `buildConfigurationForm()`, for the payment form plugin class. This method is responsible for building the array of data needed for the embedded iFrame. This data may come from multiple sources such as:
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

Once we've computed all the necessary *data* items, we'll attach them to the form using ***drupalSettings***. Then, using ***drupalSettings***, we will retrieve the data in our JavaScript file and use it to initialize the iFrame.

```php
// Optionally use serialization and/or hashing for your data, 
// if specified by your payment provider's API. For example:
$data = json_encode($data);

$form['#attached']['library'][] = 'my_payment_gateway/iframe_file_name';
$form['#attached']['drupalSettings']['my_custom_module'] $data;
```

Your `buildConfigurationForm()` method should also build whatever form you want your customers to see. This may include form elements such as a message, submit button, and cancel button. If you are unfamiliar with building forms in Drupal 8, the [Drupal 8 Form API reference] may be helpful.

### Implementing the iFrame JavaScript
Your custom JavaScript file should be created within the `js` directory of your custom module. You'll also need to create a libraries YAML file named `my_custom_gateway.libraries.yml` to include your JavaScript and its dependencies. For example, if your JavaScript file name is `my_custom_gateway.checkout.js`, then include it in your module's libraries like this:

```yaml
checkout:
  version: VERSION
  js:
    js/my_custom_gateway.checkout.js: {}
  dependencies:
    - core/jquery
    - core/jquery.once
    - core/drupal
    - core/drupalSettings
```
If your payment provider provides additional required libraries, you should also include those here.

Next, we'll create our JavaScript file, `my_custom_gateway.checkout.js` and add the necessary code for iFrame initialization.

First, using ***drupalSettings*** we retrieve the data that was attached to the form in `buildConfigurationForm()`, as described above. After that, your implementation will vary based on your payment provider's API specifications. For example implementations, you might want to look at the [Cashpresso] or [Rave] Drupal Commerce payment gateway modules, both of which use the Off-site (iFrame) method.

```js
(function ($, Drupal, drupalSettings) {
  'use strict';

  Drupal.behaviors.offsiteForm = {
    var data = drupalSettings.my_custom_module;

    // Your custom JavaScript code.
  };

}(jQuery, Drupal, drupalSettings));
```

After building your *Offsite payment* plugin form, continue with the [Return from payment provider](../03.return-from-payment-provider) documentation to learn how to handle the return from the payment provider.

[Drupal 8 documentation on JavaScript API overview]: https://www.drupal.org/docs/8/api/javascript-api/javascript-api-overview
[Acquia tutorial topic: Add a custom variable to Drupal.Settings]: https://docs.acquia.com/tutorials/fast-track-drupal-8-coding/add-custom-variable-drupalsettings/
[Drupal 8 Form API reference]: https://api.drupal.org/api/drupal/elements/
[Rave]: https://www.drupal.org/project/commerce_rave
[Cashpresso]: https://www.drupal.org/project/commerce_cashpresso
