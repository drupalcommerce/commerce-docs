---
title: On-site payment gateways
taxonomy:
    category: docs
---

On-site payment gateways allow the customer to enter credit card details directly on the site. The details might be safely tokenized before they reach the server (Braintree, Stripe, etc) or they might be transmitted directly through the server (PayPal Payments Pro).

On-site payment flow:
 1. The customer enters checkout.
 2. The *PaymentInformation* checkout pane shows the *add-payment-method* plugin form, allowing the customer to enter their payment details.
 3. On submit, a payment method is created via *createPaymentMethod()* and attached to the customer and the order.
 4. The customer continues checkout, hits the *payment* checkout step.
 5. The PaymentProcess checkout pane calls *createPayment()*, which charges the provided payment method and creates a payment.

- If the payment method could not be charged (for example, because the credit card's daily limit was breached), the customer is redirected back to the checkout step that contains the *PaymentInformation* checkout pane, to provide a different payment method.

This documentation page will explain how to set up an on-site payment gateway, using the *Example (on-site)* payment gateway that's provided in the *Commerce Payment Example* module. In this example, we'll also create an *interface* for our on-site payment gateway plugin and learn about [other interfaces available for payment gateways](#off-site-and-manual-payment-gateway-interfaces).

##### Steps for creating an on-site payment gateway in Drupal Commerce:
1. [Create an on-site payment gateway plugin.](#step-1-create-an-on-site-payment-gateway-plugin)
2. [Implement the plugin methods.](#step-2-implement-the-plugin-methods)
3. [Implement the add-payment-method Form.](#step-3-implement-the-add-payment-method-form)

### Step 1: Create an on-site payment gateway plugin
Start by creating a new module and configuration schema for your on-site payment gateway, as described in the [Creating payment gateways documentation](../docs.md). We'll define our configuration very simply with just a single `api_key` setting:

```yml
commerce_payment.commerce_payment_gateway.plugin.example_onsite:
  type: commerce_payment_gateway_configuration
  mapping:
    api_key:
      type: string
      label: 'API key'
```

Our payment gateway plugin will subclass `Drupal\commerce_payment\Plugin\Commerce\PaymentGateway\OnsitePaymentGatewayBase` and extend an interface we'll create, called `OnsiteInterface`. Here's what our plugin class looks like (with *use statements* omitted here):

```php
<?php

namespace Drupal\commerce_payment_example\Plugin\Commerce\PaymentGateway;

/**
 * Provides the On-site payment gateway.
 *
 * @CommercePaymentGateway(
 *   id = "example_onsite",
 *   label = "Example (On-site)",
 *   display_label = "Example",
 *   forms = {
 *     "add-payment-method" = "Drupal\commerce_payment_example\PluginForm\Onsite\PaymentMethodAddForm",
 *     "edit-payment-method" = "Drupal\commerce_payment\PluginForm\PaymentMethodEditForm",
 *   },
 *   payment_method_types = {"credit_card"},
 *   credit_card_types = {
 *     "amex", "dinersclub", "discover", "jcb", "maestro", "mastercard", "visa",
 *   },
 * )
 */
class Onsite extends OnsitePaymentGatewayBase implements OnsiteInterface {

}
```

Next, we'll implement the plugin configuration form methods for our *api_key* setting: *defaultConfiguration()*, *buildConfigurationForm()*, and *submitConfigurationForm()*, as described in the [Creating payment gateways documentation](../docs.md). We'll describe the implementation of the rest of the methods in the context of the *OnsiteInterface* we'll create.

**OnsiteInterface** extends a base interface, *OnsitePaymentGatewayInterface*, as well as three additional interfaces provided by the Drupal Commerce Payment module. For an actual implementation, you may want to define additional methods in your plugin's interface that are specific to your payment provider.

```php
interface OnsiteInterface extends OnsitePaymentGatewayInterface, SupportsAuthorizationsInterface, SupportsRefundsInterface, SupportsUpdatingStoredPaymentMethodsInterface {

}
```

### Step 2: Implement the plugin methods
Now that we have the basic structure in place for our on-site payment gateway plugin, the next step is to implement each of the methods defined by *OnsiteInterface* and the interfaces it extends. The other interfaces signal which additional capabilities a payment gateway has.

#### OnsitePaymentGatewayInterface and SupportsStoredPaymentMethodsInterface
**OnsitePaymentGatewayInterface** is the base interface for on-site payment gateways. It extends the *PaymentGatewayInterface* base interface as well as the *SupportsStoredPaymentMethodsInterface*. It defines a single method, *createPayment()*. **SupportsStoredPaymentMethodsInterface** defines the interface for gateways which support storing payment methods. It defines *createPaymentMethod()* and *deletePaymentMethod()* methods.

The **createPayment** method is called when the *Pay and complete purchase* button has been clicked on the final page of the checkout process: the *Review* page. If `$capture` is TRUE, a *sale* transaction should be run; if FALSE, an *authorize only* transaction should be run. Here's an example of a *createPayment* method implementation, taken from the *Example (on-site)* payment gateway:

```php
  public function createPayment(PaymentInterface $payment, $capture = TRUE) {
    $this->assertPaymentState($payment, ['new']);
    $payment_method = $payment->getPaymentMethod();
    $this->assertPaymentMethod($payment_method);
    $amount = $payment->getAmount();

    // Perform verifications related to billing address, payment currency, etc.
    // Throw exceptions as needed.
    // See \Drupal\commerce_payment\Exception for the available exceptions.

    // Perform the create payment request here, throw an exception if it fails.
    // Remember to take into account $capture when performing the request.
    $payment_method_token = $payment_method->getRemoteId();
    // The remote ID returned by the request.
    $remote_id = '123456';

    $next_state = $capture ? 'completed' : 'authorization';
    $payment->setState($next_state);
    $payment->setRemoteId($remote_id);
    $payment->save();
  }
```

The **createPaymentMethod** method is called during the checkout process, when the *Continue to review* button has been clicked on the *Order information* page. The `$payment_details` array contains all credit card information collected from the *Payment Information* form. Billing address and credit card information is typically stored or updated on the payment gateway inside of this method. After the information has been stored on the gateway, payment method details are typically saved locally in the `$payment_method` variable. Here's an example of a *createPaymentMethod* implementation, taken from the *Example (on-site)* payment gateway:

```php
  public function createPaymentMethod(PaymentMethodInterface $payment_method, array $payment_details) {
    $required_keys = [
      // The expected keys are payment gateway specific and usually match
      // the PaymentMethodAddForm form elements. They are expected to be valid.
      'type', 'number', 'expiration',
    ];
    foreach ($required_keys as $required_key) {
      if (empty($payment_details[$required_key])) {
        throw new \InvalidArgumentException(sprintf('$payment_details must contain the %s key.', $required_key));
      }
    }

    // If the remote API needs a remote customer to be created.
    $owner = $payment_method->getOwner();
    if ($owner && $owner->isAuthenticated()) {
      $customer_id = $this->getRemoteCustomerId($owner);
      // If $customer_id is empty, create the customer remotely and then do
      // $this->setRemoteCustomerId($owner, $customer_id);
      // $owner->save();
    }

    // Perform the create request here, throw an exception if it fails.
    // See \Drupal\commerce_payment\Exception for the available exceptions.
    // You might need to do different API requests based on whether the
    // payment method is reusable: $payment_method->isReusable().
    // Non-reusable payment methods usually have an expiration timestamp.
    $payment_method->card_type = $payment_details['type'];
    // Only the last 4 numbers are safe to store.
    $payment_method->card_number = substr($payment_details['number'], -4);
    $payment_method->card_exp_month = $payment_details['expiration']['month'];
    $payment_method->card_exp_year = $payment_details['expiration']['year'];
    $expires = CreditCard::calculateExpirationTimestamp($payment_details['expiration']['month'], $payment_details['expiration']['year']);
    // The remote ID returned by the request.
    $remote_id = '789';

    $payment_method->setRemoteId($remote_id);
    $payment_method->setExpiresTime($expires);
    $payment_method->save();
  }
```
The **deletePaymentMethod** method deletes a stored payment method from an existing customer's record. It is called from the *Payment methods* tab of a user's account. It should delete a saved payment method both on the Commerce site and in the gateway customer records. Here's an example of a *deletePaymentMethod* implementation, taken from the *Example (on-site)* payment gateway:

```php
  public function deletePaymentMethod(PaymentMethodInterface $payment_method) {
    // Delete the remote record here, throw an exception if it fails.
    // See \Drupal\commerce_payment\Exception for the available exceptions.

    // Delete the local entity.
    $payment_method->delete();
  }
```

#### SupportsAuthorizationsInterface and SupportsVoidsInterface
**SupportsAuthorizationsInterface** extends the SupportsVoidsInterface interface and defines the interface for gateways which support authorizing payments. It defines the *capturePayment()* method. **SupportsVoidsInterface** defines the interface for gateways which support voiding payments.. It defines the *voidPayment()* method.

The **capturePayment** method captures the transaction for a previously authorized payment and moves it to the current batch for settlement. It is called when the *Capture* operations button is clicked for a specific payment on an order's *Payments* administration page. Only payments in the *authorization* state can be captured. An optional *amount* can be specified to capture only a portion of the entire payment amount. Here's an example of a *capturePayment* method implementation, taken from the *Example (on-site)* payment gateway:

```php
  public function capturePayment(PaymentInterface $payment, Price $amount = NULL) {
    $this->assertPaymentState($payment, ['authorization']);
    // If not specified, capture the entire amount.
    $amount = $amount ?: $payment->getAmount();

    // Perform the capture request here, throw an exception if it fails.
    // See \Drupal\commerce_payment\Exception for the available exceptions.
    $remote_id = $payment->getRemoteId();

    $payment->setState('completed');
    $payment->setAmount($amount);
    $payment->save();
  }
```

The **voidPayment** method could also be called delete payment. It is called when the *Delete* operations button is clicked for a specific payment on an order's *Payments* administration page. It will void a transaction that was previously authorized but has not been settled. (Payments can usually only be voided before they are captured/received.) Here's an example of a *voidPayment* method implementation, taken from the *Example (on-site)* payment gateway:

```php
  public function voidPayment(PaymentInterface $payment) {
    $this->assertPaymentState($payment, ['authorization']);
    // Perform the void request here, throw an exception if it fails.
    // See \Drupal\commerce_payment\Exception for the available exceptions.
    $remote_id = $payment->getRemoteId();

    $payment->setState('authorization_voided');
    $payment->save();
  }
```

#### SupportsRefundsInterface
**SupportsRefundsInterface** defines the interface for gateways which support refunds. It defines a single method: *refundPayment()*.

The **refundPayment** method is called when the *Refund* operations button is clicked for a specific payment on an order's *Payments* administration page. This method serves to refund all or part of a sale. An optional *amount* can be specified to refund only a portion of the entire payment amount. Here's an example of a *refundPayment* method implementation, taken from the *Example (on-site)* payment gateway:

```php
  public function refundPayment(PaymentInterface $payment, Price $amount = NULL) {
    $this->assertPaymentState($payment, ['completed', 'partially_refunded']);
    // If not specified, refund the entire amount.
    $amount = $amount ?: $payment->getAmount();
    $this->assertRefundAmount($payment, $amount);

    // Perform the refund request here, throw an exception if it fails.
    // See \Drupal\commerce_payment\Exception for the available exceptions.
    $remote_id = $payment->getRemoteId();

    $old_refunded_amount = $payment->getRefundedAmount();
    $new_refunded_amount = $old_refunded_amount->add($amount);
    if ($new_refunded_amount->lessThan($payment->getAmount())) {
      $payment->setState('partially_refunded');
    }
    else {
      $payment->setState('refunded');
    }

    $payment->setRefundedAmount($new_refunded_amount);
    $payment->save();
  }
```
#### SupportsUpdatingStoredPaymentMethodsInterface
**SupportsUpdatingStoredPaymentMethodsInterface** defines the interface for gateways which support updating stored payment methods. It defines a single method: *updatePaymentMethod()*.

The **updatePaymentMethod** method updates a stored payment method for an existing customer. It is called from the *Payment methods* tab of a user's account. It should update a saved payment method both on the Commerce site and in the gateway customer records. The default payment method edit form only supports updating billing info. Here's an example of an *updatePaymentMethod* method implementation, taken from the *Example (on-site)* payment gateway:

```php
  public function updatePaymentMethod(PaymentMethodInterface $payment_method) {
    $billing_profile = $payment_method->getBillingProfile();

    // Perform the update request here, throw an exception if it fails.
    // See \Drupal\commerce_payment\Exception for the available exceptions.
  }
```

### Step 3: Implement the add-payment-method Form
In the annotation for our example on-site plugin, we specified the class for the add-payment-method form: `Drupal\commerce_payment_example\PluginForm\Onsite\PaymentMethodAddForm`. This is the form displayed during checkout when a customer selects this payment method. In this example, we'll extend the Payment module's `PaymentMethodAddForm` class to provide our own `buildCreditCardForm()` method to provide a known valid test card number as a default:

```php
<?php

namespace Drupal\commerce_payment_example\PluginForm\Onsite;

use Drupal\commerce_payment\PluginForm\PaymentMethodAddForm as BasePaymentMethodAddForm;
use Drupal\Core\Form\FormStateInterface;

class PaymentMethodAddForm extends BasePaymentMethodAddForm {

  /**
   * {@inheritdoc}
   */
  protected function buildCreditCardForm(array $element, FormStateInterface $form_state) {
    $element = parent::buildCreditCardForm($element, $form_state);
    // Default to a known valid test credit card number.
    $element['number']['#default_value'] = '4111111111111111';

    return $element;
  }

}
```

That completes the implementation for our example on-site payment gateway. In this documentation page, we've already covered most of the interfaces provided by the Drupal Commerce Payment module. For completeness, here is an overview of the rest of the interfaces, which are generally implemented by off-site or manual payment gateways rather than on-site gateways.

### Off-site and Manual payment gateway interfaces

#### OffsitePaymentGatewayInterface and SupportsNotificationsInterface
**OffsitePaymentGatewayInterface** is the base interface for off-site payment gateways. It extends the *PaymentGatewayInterface* base interface as well as the *SupportsNotificationsInterface* interface. It defines three methods: *getNotifyUrl()*, *onReturn()*, and *onCancel()*. **SupportsNotificationsInterface** defines the interface for gateways which which support notifications. It defines the *onNotify()* methods.

The **getNotifyUrl** method gets the URL of the *notify* page. When supported, this page is called asynchronously to notify the site of payment changes (new payment or capture/void/refund of an existing one). The *OffsitePaymentGatewayBase* class provides the following default implementation:

```php
  public function getNotifyUrl() {
    return Url::fromRoute('commerce_payment.notify', [
      'commerce_payment_gateway' => $this->entityId,
    ], ['absolute' => TRUE]);
  }
```

The **onReturn** method processes the *return* request. After validating the request, it creates a new payment for the order.  Here's an example of an *onReturn*  implementation, based on the *Example (Off-site redirect)* payment gateway:

```php
  public function onReturn(OrderInterface $order, Request $request) {
  	// Validate request, throw an exception if it fails.
    // See \Drupal\commerce_payment\Exception for the available exceptions.
    $response = $request->query->all();
    if ($response['some_value'] != 'what-we-want') {
    	throw new PaymentGatewayException('Payment failed.');
    }

    // Create and store the payment.
    $payment_storage = $this->entityTypeManager->getStorage('commerce_payment');
    $payment = $payment_storage->create([
      'state' => 'authorization',
      'amount' => $order->getTotalPrice(),
      'payment_gateway' => $this->entityId,
      'order_id' => $order->id(),
      'remote_id' => $request->query->get('txn_id'),
      'remote_state' => $request->query->get('payment_status'),
    ]);
    $payment->save();
  }
```

The **onCancel** method processes the *cancel* request. It allows the payment gateway to clean up any data added to the $order and set a message for the customer. The *OffsitePaymentGatewayBase* class provides the following default implementation:

```php
  public function onCancel(OrderInterface $order, Request $request) {
    drupal_set_message($this->t('You have canceled checkout at @gateway but may resume the checkout process here when you are ready.', [
      '@gateway' => $this->getDisplayLabel(),
    ]));
  }
```

The **onNotify** method processes the notification request. Payment providers can use the notification URL (commerce_payment.notify) to inform the site that a new pending/complete payment should be created (if the payment happened off-site), or to provide information about an existing payment (refunds, disputes, etc).
Note: this method can't throw exceptions on failure because some payment providers expect an error response to be returned in that case. Therefore, the method can log the error itself and then choose which response to return.

#### ManualPaymentGatewayInterface and HasPaymentInstructionsInterface
**ManualPaymentGatewayInterface is** the base interface for manual payment gateways. Manual payment gateways instruct the customer to pay the store in the real world. The gateway creates a payment entity to allow the merchant to track and record the money flow. Examples of manual payment gateways include cash on delivery, pay in person, cheque, and bank transfer.

ManualPaymentGatewayInterface extends the *PaymentGatewayInterface* base interface as well as the *HasPaymentInstructionsInterface*, *SupportsVoidsInterface*, and *SupportsRefundsInterface* interfaces. (The *SupportsVoidsInterface* and *SupportsRefundsInterface* were described above.) ManualPaymentGatewayInterface defines the *createPayment()* and *receivePayment()* methods; **HasPaymentInstructionsInterface** defines the interface for gateways which show payment instructions. Payment instructions are usually shown on checkout complete. It defines the *buildPaymentInstructions()* method.

The *Manual* payment gateway plugin, provided by the *Drupal Commerce Payment* module provides implementations for each of these three methods:

```php
  public function createPayment(PaymentInterface $payment, $received = FALSE) {
    $this->assertPaymentState($payment, ['new']);

    $payment->state = $received ? 'completed' : 'pending';
    $payment->save();
  }

  public function receivePayment(PaymentInterface $payment, Price $amount = NULL) {
    $this->assertPaymentState($payment, ['pending']);

    // If not specified, use the entire amount.
    $amount = $amount ?: $payment->getAmount();
    $payment->state = 'completed';
    $payment->setAmount($amount);
    $payment->save();
  }

  public function buildPaymentOperations(PaymentInterface $payment) {
    $payment_state = $payment->getState()->value;
    $operations = [];
    $operations['receive'] = [
      'title' => $this->t('Receive'),
      'page_title' => $this->t('Receive payment'),
      'plugin_form' => 'receive-payment',
      'access' => $payment_state == 'pending',
    ];
    $operations['void'] = [
      'title' => $this->t('Void'),
      'page_title' => $this->t('Void payment'),
      'plugin_form' => 'void-payment',
      'access' => $payment_state == 'pending',
    ];
    $operations['refund'] = [
      'title' => $this->t('Refund'),
      'page_title' => $this->t('Refund payment'),
      'plugin_form' => 'refund-payment',
      'access' => in_array($payment_state, ['completed', 'partially_refunded']),
    ];

    return $operations;
  }
```
