---
title: Off-site (iframe) payment gateways
taxonomy:
    category: docs
---

This documentation will explain how to setup an off-site payment gateway in an iFrame.

Off-site payments in iFrames work very similarly to off-site payments by redirect. As such, this guide will not
duplicate common processes between the two methods, as those are covered in documentation for redirect gateways, but
will instead focus on the **Checkout** process, as this is the main area where they differ. 
Therefore, prior to this guide, you should have a configured payment gateway according to the `Configuration` section of
[Off-site (redirect) payment gateways documentation](../07.off-site-redirect-gateways).
This documentation is written while developing the [commerce_rave](https://drupal.org/project/commerce_rave) module, so in all the examples you should replace **commerce_rave** with the id of your module.

### Configuration
The iFrame checkout will need some Javascript, so we'll put our Javascript code in a `js/commerce_rave.form.js`.
We'll need to declare this as a library, alongside its dependencies. We need `drupalSettings` in order to pass
necessary transaction data to the iFrame.
Create a `commerce_rave.libraries.yml`, and add the following content to it:

```yaml
rave:
  version: VERSION
  js:
    js/commerce_rave.form.js: {}
  dependencies:
    - core/jquery
    - core/jquery.once
    - core/drupal
    - core/drupalSettings
```

We'll add code to `commerce_rave.form.js` later.

### Checkout
With the configuration all setup, it's now time to configure the checkout.

Since this is an iframe checkout, it means when the user clicks on **Pay and complete purchase**, the page will not redirect
but will instead display an iFrame on the page which is specific to the payment processor, and after collecting the user's details,
it returns to the site.

Let's implement the `iFrameCheckoutForm`. `iFrameCheckoutForm` only needs to implement the methods:
`buildConfigurationForm`, `buildRedirectForm` and `processRedirectForm`.

`buildConfigurationForm` is a standard Drupal form builder which is really simple for this example, but in a real implementation
  will have a lot more fields. After this, we attach the form fields themselves to the form using `drupalSettings`. 
  Using `drupalSettings`, we will retrieve the fields in our javascript file `commerce_rave.form.js` from where we will use it to initialize the iFrame.

```php
  public function buildConfigurationForm(array $form, FormStateInterface $form_state) {
    $form = parent::buildConfigurationForm($form, $form_state);
    $configuration = $this->getConfiguration();

    $payment = $this->entity;

    $data['version'] = 'v10';
    $data['private_key'] = $configuration['private_key'];
    $data['api_key'] = $configuration['api_key'];
    $data['payment_amount'] = $payment->getAmount()->getNumber();

    $form = $this->buildRedirectForm($form, $form_state, '', $data, '');
  }
```

In `buildRedirectForm`, we add a message to show above the payment button which can be anything you choose, and then we
 add `processRedirectForm` as a form processor:

```php
  public function buildRedirectForm(array $form, FormStateInterface $form_state, $redirect_url, array $data, $redirect_method = '') {
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

In `processRedirectForm`, we add a class to the form `payment-redirect-form` which we'll target in our javascript library:

```php
  public static function processRedirectForm(array $element, FormStateInterface $form_state, array &$complete_form) {
    $complete_form['#attributes']['class'][] = 'payment-redirect-form';
    
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

    $data['version'] = 'v10';
    $data['private_key'] = $configuration['private_key'];
    $data['api_key'] = $configuration['api_key'];

    return $this->buildRedirectForm(
      $form,
      $form_state,
      '',
      $data,
      PaymentOffsiteForm::REDIRECT_POST
    );
  }

  /**
   * {@inheritdoc}
   */
  public function buildRedirectForm(array $form, FormStateInterface $form_state, $redirect_url, array $data, $redirect_method = '') {
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
    $complete_form['#attributes']['class'][] = 'payment-redirect-form';
    
    // The form actions are hidden by default, but needed in this case.
    $complete_form['actions']['#access'] = TRUE;
    foreach (Element::children($complete_form['actions']) as $element_name) {
      $complete_form['actions'][$element_name]['#access'] = TRUE;
    }

    return $element;
  }
}
```

