---
title: Off-site (iframe) payment gateways
taxonomy:
    category: docs
---

This documentation will explain how to setup an off-site payment gateway in an iFrame.

Off-site payments in iFrames work similarly to off-site payments by redirect.
As such, this guide will not duplicate common processes between the two methods, as those are covered in the [documentation for redirect gateways](../07.off-site-redirect-gateways), but will instead focus on the **Checkout** process as this is the main area where they differ.
Therefore, prior to this guide, you should have a configured payment gateway according to the [Configuration](../07.off-site-redirect-gateways#configuration) section of the redirect gateway documentation.
This documentation is written while developing the [commerce_rave](https://drupal.org/project/commerce_rave) module, so in all the examples you should replace **commerce_rave** or **rave** with the id of your module.

### Configuration
The iFrame checkout will need some Javascript, so we'll put our Javascript code in a `js/commerce_rave.form.js` and we'll declare this as a _library_ and include its dependencies.
We need the `drupalSettings` library in order to pass necessary _transaction data_ from the payment form to the iFrame.
So create a `commerce_rave.libraries.yml`, and add the following content to it:

```yaml
rave:
  version: VERSION
  js:
    js/commerce_rave.form.js: {}
    https://api.ravepay.co/flwv3-pug/getpaidx/api/flwpbf-inline.js: {}
  dependencies:
    - core/jquery
    - core/jquery.once
    - core/drupal
    - core/drupalSettings
```

We'll leave `commerce_rave.form.js` for now and add the necessary code later.

### Checkout
With the configuration all setup, it's now time to configure the checkout.

Since this is an iFrame checkout, it means when the user clicks on **Pay and complete purchase**, the page will not redirect but will instead display an iFrame on the page which is specific to the payment processor, and after collecting the user's details, it returns to the site.

We will handle checkout in a `iFrameCheckoutForm` class which resides in `src/PluginForm/iFrameCheckoutForm.php`.
The `iFrameCheckoutForm` class only needs to implement the methods: `buildConfigurationForm`, `buildRedirectForm` and `processRedirectForm`.

`buildConfigurationForm` is a standard Drupal form builder which is really simple for this example, but in a real implementation will have a lot more fields specific to the payment processor.
After this, we attach the *form data* themselves to the form using `drupalSettings`, and this will reside in a `transactionData` key.
Using `drupalSettings`, we will retrieve `transactionData` in our javascript file (*commerce_rave.form.js*) from where we will use it to initialize the iFrame.
Typically, the payment processor will require a _redirect_ url where it sends the payment response to, for *Rave*, this is specified as `redirect_url`.

```php
  public function buildConfigurationForm(array $form, FormStateInterface $form_state) {
    $form = parent::buildConfigurationForm($form, $form_state);
    $configuration = $this->getConfiguration();

    /** @var \Drupal\commerce_payment\Entity\PaymentInterface $payment */
    $payment = $this->entity;

    $data = [
      'version' => 'v10',
      'private_key' => $configuration['private_key'],
      'api_key' => $configuration['api_key'],
      'payment_amount' => $payment->getAmount()->getNumber(),
      "redirect_url" => $form['#return_url']
    ];

    $form = $this->buildRedirectForm($form, $form_state, '', $data, '');

    $form['#attached']['drupalSettings']['rave']['transactionData'] = json_encode($data);

    return $form;
  }
```

In `buildRedirectForm`, we _attach_ our javascript library, then we configure a message to show above the payment button (which can be anything you choose), and then we add `processRedirectForm` as a form processor:

```php
  public function buildRedirectForm(array $form, FormStateInterface $form_state, $redirect_url, array $data, $redirect_method = '') {
    $form['#attached']['library'][] = 'commerce_rave/rave';
    $helpMessage = t('Please wait while the payment server loads. If nothing happens within 10 seconds, please click on the button below.');

    $form['commerce_message'] = [
      '#markup' => '<div class="checkout-help">' . $helpMessage . '</div>',
      '#weight' => -10,
      '#process' => [
        [get_class($this), 'processRedirectForm'],
      ],
    ];

    return $form;
  }
```

In `processRedirectForm`, we add a class to the form (`payment-iframe-form`) which we'll target in our javascript library:

```php
  public static function processRedirectForm(array $element, FormStateInterface $form_state, array &$complete_form) {
    $complete_form['#attributes']['class'][] = 'payment-iframe-form';

    $complete_form['actions']['#access'] = TRUE;
    foreach (Element::children($complete_form['actions']) as $element_name) {
      $complete_form['actions'][$element_name]['#access'] = TRUE;
    }

    return $element;
  }
```

At this point, the complete `src/PluginForm/iFrameCheckoutForm.php` should look like this:

```php
<?php

namespace Drupal\commerce_rave\PluginForm;

use Drupal\commerce_payment\PluginForm\PaymentOffsiteForm as BasePaymentOffsiteForm;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Render\Element;
use Drupal\Core\Url;

/**
 * {@inheritdoc}
 */
class iFrameCheckoutForm extends BasePaymentOffsiteForm {

  /**
   * {@inheritdoc}
   */
  public function buildConfigurationForm(array $form, FormStateInterface $form_state) {
    $form = parent::buildConfigurationForm($form, $form_state);
    $configuration = $this->getConfiguration();

    /** @var \Drupal\commerce_payment\Entity\PaymentInterface $payment */
    $payment = $this->entity;

    $data = [
      'version' => 'v10',
      'private_key' => $configuration['private_key'],
      'api_key' => $configuration['api_key'],
      'payment_amount' => $payment->getAmount()->getNumber()
    ];

    $form = $this->buildRedirectForm($form, $form_state, '', $data, '');

    $form['#attached']['drupalSettings']['rave']['transactionData'] = json_encode($data);

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function buildRedirectForm(array $form, FormStateInterface $form_state, $redirect_url, array $data, $redirect_method = '') {
    $form['#attached']['library'][] = 'commerce_rave/rave';
    $helpMessage = t('Please wait while the payment server loads. If nothing happens within 10 seconds, please click on the button below.');

    $form['commerce_message'] = [
      '#markup' => '<div class="checkout-help">' . $helpMessage . '</div>',
      '#weight' => -10,
      '#process' => [
        [get_class($this), 'processRedirectForm'],
      ],
    ];

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public static function processRedirectForm(array $element, FormStateInterface $form_state, array &$complete_form) {
    $complete_form['#attributes']['class'][] = 'payment-iframe-form';

    // The form actions are hidden by default, but needed in this case.
    $complete_form['actions']['#access'] = TRUE;
    foreach (Element::children($complete_form['actions']) as $element_name) {
      $complete_form['actions'][$element_name]['#access'] = TRUE;
    }

    return $element;
  }
}
```

Next, we'll create our JS file, `js/commerce_rave.form.js` and add the necessary code for iFrame initialization.

First, using `drupalSettings` we retrieve the transaction data that was attached to the form in `buildConfigurationForm` as described above.

```javascript
var options = drupalSettings.rave.transactionData;
```

Next, we'll select the payment form and attach an action to its `submit` event.
This event will be configured according to the specific payment platform we're integrating.
For example, with **Rave**, a `getpaidSetup` function is provided in the official library which I will call with transaction data:

```javascript
  var $paymentForm = $('.payment-iframe-form', context);

  $paymentForm.on('submit', function () {
    getpaidSetup(JSON.parse(options));

    return false;
  });
```

Finally, we configure the `submit` event to trigger automatically when the payment page is reached:

```javascript
$paymentForm.once('getPaid').trigger('submit');
```

The complete `commerce_rave.form.js` will look like this when we are done:

```javascript
(function ($, Drupal, drupalSettings) {

  'use strict';

  Drupal.behaviors.raveForm = {
    attach: function (context) {
      var options = drupalSettings['rave']['transactionData'];

      var $paymentForm = $('.payment-iframe-form', context);

      $paymentForm.on('submit', function () {
        getpaidSetup(JSON.parse(options));

        return false;
      });

      // Trigger form submission when user visits Payment page.
      $paymentForm.once('getPaid').trigger('submit');
    }
  };

})(jQuery, Drupal, drupalSettings);
```

And thats it for __Checkout__. Now we only need to handle the returning user.
Follow the [Return from Payment provider](../07.off-site-redirect-gateways#return-from-payment-provider) section of the offsite redirect guide to handle returning users.
