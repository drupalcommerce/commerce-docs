---
title: Off-site (iFrame) payment gateways
taxonomy:
    category: docs
---

This documentation will explain how to set up an off-site payment gateway in an iFrame. Off-site payments in iFrames work similarly to off-site payments by redirect. The difference is that in the **Checkout** process, the "off-site" portion is handled within an embedded iframe and does not take the customer to the third party payment gateways website. As described in the [Creating payment gateways documentation](../docs.md), you'll start by creating a custom module, configuration schema, payment plugin, and configuration form methods.

>This documentation was written while developing the [Commerce Rave module], so in all the examples you should replace **commerce_rave** or **rave** with the id of your module.

### Configuration
In addition to the standard configuration, we need to add some Javascript specific to our *Rave* payment gateway, for the iFrame checkout. We'll put our Javascript code in a file named `commerce_rave.form.js` located in a folder named `js`. We'll discuss the implementation of `commerce_rave.form.js` later in this guide.

Next, we'll create a file named `commerce_rave.libraries.yml` to define a *rave* library and detail its assets and dependencies. We need the `drupalSettings` library in order to pass necessary *transaction data* from the payment form to the iFrame. For more information, see the [Drupal 8 documentation on adding stylesheets (CSS) and JavaScript (JS) to a Drupal 8 module]. Here is the full definition of our *rave* library:

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
*In the actual implementation for the Commerce Rave module, additional libraries provided by *Rave* are also added to the module.*

### Checkout
Since this is an iFrame checkout, when the user clicks on **Pay and complete purchase**, the page will not redirect. Instead, an iFrame will be displayed on the page which is specific to the payment processor. After
the customer's payment information is collected, the customer is returned to the site.

We will handle checkout in the `iFrameCheckoutForm` class, which resides in `src/PluginForm/iFrameCheckoutForm.php` and extends the `commerce_payment\PluginForm\PaymentOffsiteForm` class. In the `iFrameCheckoutForm` class, we'll implement the *buildConfigurationForm()*, *buildRedirectForm()*, and *processRedirectForm()* methods.

#### The buildConfigurationForm() method
The *buildConfigurationForm()* method is a standard Drupal form builder which we've simplified here for this example. Typically, the payment processor will require a *redirect* url where it sends the payment response to; for *Rave*, this is specified as *redirect_url*. We've also included *version*, *private_key*, *api_key*, and *payment_amount* data items. In the actual implementation, there are many additional fields specific to the payment processor.

Once we've computed all the necessary *data* items, we'll attach them to the form using ***drupalSettings***. This will reside in a *transactionData* key. Then, using ***drupalSettings***, we will retrieve *transactionData* in our JavaScript file (*commerce_rave.form.js*) and use it to initialize the iFrame.


```php
  public function buildConfigurationForm(array $form, FormStateInterface $form_state) {
    $form = parent::buildConfigurationForm($form, $form_state);
    $configuration = $this->getConfiguration();

    /** @var \Drupal\commerce_payment\Entity\PaymentInterface $payment */
    $payment = $this->entity;

    $form['#attached']['library'][] = 'commerce_rave/rave';

    $data = [
      'version' => 'v10',
      'private_key' => $configuration['private_key'],
      'api_key' => $configuration['api_key'],
      'payment_amount' => $payment->getAmount()->getNumber(),
      'redirect_url' => $form['#return_url']
    ];

    $form = $this->buildRedirectForm($form, $form_state, '', $data, '');

    $form['#attached']['drupalSettings']['rave']['transactionData'] = json_encode($data);

    return $form;
  }
```

#### The buildRedirectForm() method
In *buildRedirectForm()*, we configure a message to show above the payment button, and add *processRedirectForm* as a form processor:

```php
  public function buildRedirectForm(array $form, FormStateInterface $form_state, $redirect_url, array $data, $redirect_method = BasePaymentOffsiteForm::REDIRECT_GET) {
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

#### The processRedirectForm() method
In *processRedirectForm()*, we add a class to the form (`payment-iframe-form`) which we'll target in our JavaScript library:

```php
  public static function processRedirectForm(array $element, FormStateInterface $form_state, array &$complete_form) {
    $complete_form['#attributes']['class'][] = 'payment-iframe-form';

    // The form actions are hidden by default, but needed in this case.
    $complete_form['actions']['#access'] = TRUE;
    foreach (Element::children($complete_form['actions']) as $element_name) {
      $complete_form['actions'][$element_name]['#access'] = TRUE;
    }

    return $element;
  }
```

### Custom JavaScript for iFrame initialization and submission

Next, we'll create our JS file, `js/commerce_rave.form.js` and add the necessary code for iFrame initialization.

First, using ***drupalSettings*** we retrieve the transaction data that was attached to the form in *buildConfigurationForm()*, as described above.

```javascript
var options = drupalSettings.rave.transactionData;
```

Next, we'll select the payment form and attach an action to its ***submit*** event.
This event will be configured according to the specific payment platform we're integrating.
For example, for **Rave**, a *getpaidSetup* function is provided in the official library which we'll call with transaction data:

```javascript
  var $paymentForm = $('.payment-iframe-form', context);

  $paymentForm.on('submit', function () {
    getpaidSetup(JSON.parse(options));

    return false;
  });
```

Finally, we configure the ***submit*** event to trigger automatically when the payment page is reached:

```javascript
$paymentForm.once('getPaid').trigger('submit');
```

The complete `commerce_rave.form.js` will look like this when we are done:

```javascript
(function ($, Drupal, drupalSettings) {

  'use strict';

  Drupal.behaviors.raveForm = {
    attach: function (context) {
      var options = drupalSettings.rave.transactionData;

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

That completes our **Checkout** configuration and implementation. Now we only need to handle the returning user.
See the [Return from payment provider section](../03.off-site-redirect-gateways#return-from-payment-provider) of the off-site (redirect) documentation to handle returning users.

[Commerce Rave module]: https://drupal.org/project/commerce_rave
[Drupal 8 documentation on adding stylesheets (CSS) and JavaScript (JS) to a Drupal 8 module]: https://www.drupal.org/docs/8/creating-custom-modules/adding-stylesheets-css-and-javascript-js-to-a-drupal-8-module

