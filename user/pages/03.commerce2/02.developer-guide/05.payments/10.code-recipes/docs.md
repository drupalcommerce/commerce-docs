---
title: Code recipes
taxonomy:
    category: docs
---

If you want to write custom code to programatically manage payments, you can use these code recipes as a starting point.
- **Create:**
 - [Payment gateway](#creating-a-payment-gateway)
 - [Payment method](#creating-a-payment-method)
 - [Payment](#creating-a-payment)
- **Load:**
 - [Payment gateway](#loading-a-payment-gateway)
 - [Payment method](#loading-a-payment-method)
 - [Payment](#loading-a-payment)
- **Manage payments:**
 - [Setting the payment gateway for an order](#setting-the-payment-gateway-for-an-order)
 - [Adding a refunded amount to an existing payment](#adding-a-refunded-amount-to-an-existing-payment)
- [**Filter payment gateways available for an order**](#filter-payment-gateways-available-for-an-order)
- **Alter plugin definitions:**
 - [Payment type](#altering-a-payment-type-definition)
 - [Payment method type](#altering-a-payment-method-type-definition)
 - [Payment gateway](#altering-a-payment-gateway-definition)

### Creating a payment gateway
Payment gateways are configuration entities that store the configuration for payment gateway plugins. The configuration keys will vary based on the payment gateway definition. The `Drupal\commerce_payment\Plugin\Commerce\PaymentGatewayBase` class defines `display_label`, `mode`, and `payment_method_types`. In this example, we've also added an `api_key` key.
```php
/**
 * id [String]
 *   Primary key for this payment gateway.
 *
 * label [String]
 *   Label for this payment gateway.
 *
 * weight [Integer]
 *   The payment gateway weight.
 *
 * plugin [String]
 *   Foreign key of the payment gateway plugin to use.
 *
 * configuration [Array]
 *   The plugin configuration.
 *
 * conditions [Array]
 *   The conditions that control gateway availability.
 *
 * conditionOperator [String] - [DEFAULT = AND]
 *   The condition operator.
 */

// Create the payment gateway.
$payment_gateway = \Drupal\commerce_payment\Entity\PaymentGateway::create([
  'id' => 'my_example',
  'label' => "My example payment gateway",
  'weight' => 0,
  'plugin' => 'example_onsite',
  'configuration' => [
    'api_key' => '2342fewfsfs',
    'display_label' => 'Credit card test',
    'mode' => 'test',
  	'payment_method_types' => ['credit_card'],
  ],
  'conditions' => [
    [
      'plugin' => 'order_total_price',
      'configuration' => [
        'operator' => '<',
        'amount' => [
          'number' => '100.00',
          'currency_code' => 'USD',
        ],
      ],
    ],
  ],
]);
$payment_gateway->save();
```

In this second example of payment gateway creation, we're separating the payment gateway plugin configuration from the creation of the payment gateway. This alternative approach works just the same but can result in slightly more readable code. Also, there may be times when you only want to update the configuration for an existing payment gateway.
```php
$payment_gateway = \Drupal\commerce_payment\Entity\PaymentGateway::create([
  'id' => 'manual',
  'label' => 'Manual example',
  'plugin' => 'manual',
]);
$payment_gateway->getPlugin()->setConfiguration([
  'display_label' => 'Cash on delivery',
  'instructions' => [
    'value' => 'Test instructions.',
    'format' => 'plain_text',
  ],
]);
$payment_gateway->save();
```

### Creating a payment method
In this example, we assume that we have that the variable `$order` is an object of type `Drupal\commerce_order\Entity\OrderInterface`. In this example, the payment method will expire on Thursday, January 16th, 2020. To create a payment method that does not expire, omit the `expires` key or set it to 0; its default value is 0.
```php
$payment_method = Drupal\commerce_payment\Entity\PaymentMethod::create([
  'type' => 'credit_card',
  'payment_gateway' => 'example',
  'payment_gateway_mode' => 'test',
  'remote_id' => 'example123abc',
  'reusable' => TRUE,
  'is_default' => TRUE,
  // Thu, 16 Jan 2020.
  'expires' => '1579132800',
  'uid' => $order->getCustomerId(),
  'billing_profile' => $order->getBillingProfile(),
]);
$payment_method->save();
```

### Creating a payment
```php
/** @var \Drupal\commerce_payment\Entity\PaymentGatewayInterface $onsite_gateway */
/** @var \Drupal\commerce_order\Entity\OrderInterface $order */

$payment = Drupal\commerce_payment\Entity\Payment::create([
  'type' => 'payment_default',
  'payment_gateway' => $onsite_gateway->id(),
  'order_id' => $order->id(),
  'amount' => $order->getTotalPrice(),
  'state' => 'completed',
]);
$payment->save();
```

### Loading a payment gateway
```php
// Loading is based off of the primary key [String] that was defined when creating it.
$payment_gateway = \Drupal\commerce_payment\Entity\PaymentGateway::load('manual');
```

###Loading a payment method
```php
// Loading is based off of the primary key [Integer]
//   1 would be the first one saved, 2 the next, etc.
$payment_method = \Drupal\commerce_payment\Entity\PaymentMethod::load(1);
```

Example: load user's reusable payment methods that have not yet expired for a given payment gateway, filtered by country.
```php
/** @var \Drupal\commerce_payment\Entity\PaymentGatewayInterface $payment_gateway */
/** @var \Drupal\commerce_payment\Entity\PaymentGatewayInterface $user */
$payment_methods = \Drupal::entityTypeManager()
  ->getStorage('commerce_payment_method')
  ->loadReusable($user, $payment_gateway, ['US', 'FR']);
```

###Loading a payment
```php
// Loading is based off of the primary key [Integer]
//   1 would be the first one saved, 2 the next, etc.
$payment = \Drupal\commerce_payment\Entity\Payment::load(1);

```

### Setting the payment gateway for an order
```php
/** @var \Drupal\commerce_order\Entity\OrderInterface $order */
/** @var \Drupal\commerce_payment\Entity\PaymentGatewayInterface $example_payment_gateway */
$order->set('payment_gateway', $example_payment_gateway);
$order->save();
```

### Adding a refunded amount to an existing payment
```php
/** @var \Drupal\commerce_payment\Entity\PaymentInterface $payment */
$payment->setRefundedAmount(new Drupal\commerce_price\Price('15', 'USD'));
$payemnt->save();
```

### Filter payment gateways available for an order
The payment module includes a `FilterPaymentGatewaysEvent` event that can be used whenever filtering available gateways using [Conditions](../../03.core/01.conditions) is not sufficient. In this example, we use the `data` field on `Order` entities to store a list of explicitly excluded payment gateways.

First, use the `data` field to store a payment gateway to be excluded.
```php
/** @var \Drupal\commerce_order\Entity\OrderInterface $order */
/** @var \Drupal\commerce_payment\Entity\PaymentGatewayInterface $example_payment_gateway */
$order->setData('excluded_gateways', [$example_payment_gateway->id()]);
$order->save();
```

Next, implement the event subscriber in your custom module.
```php
<?php

namespace Drupal\my_custom_module\EventSubscriber;

use Drupal\commerce_payment\Event\FilterPaymentGatewaysEvent;
use Drupal\commerce_payment\Event\PaymentEvents;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class FilterPaymentGatewaysSubscriber implements EventSubscriberInterface {

  /**
   * {@inheritdoc}
   */
  public static function getSubscribedEvents() {
    return [
      PaymentEvents::FILTER_PAYMENT_GATEWAYS => 'onFilter',
    ];
  }

  /**
   * Filters out payment gateways listed in an order's data attribute.
   *
   * @param \Drupal\commerce_payment\Event\FilterPaymentGatewaysEvent $event
   *   The event.
   */
  public function onFilter(FilterPaymentGatewaysEvent $event) {
    $payment_gateways = $event->getPaymentGateways();
    $excluded_gateways = $event->getOrder()->getData('excluded_gateways', []);
    foreach ($payment_gateways as $payment_gateway_id => $payment_gateway) {
      if (in_array($payment_gateway->id(), $excluded_gateways)) {
        unset($payment_gateways[$payment_gateway_id]);
      }
    }
    $event->setPaymentGateways($payment_gateways);
  }

}
```

### Altering a payment type definition
In this example, we swap out the existing manual workflow for a custom one. The custom workflow should be defined in the `mymodule.workflows.yml`, where *mymodule* is the name of your custom module.  See `commerce_payment.workflows.yml` in the *Commerce payment* module as an example. This approach could be use to, for example, change the labels that are displayed for the payment states.

```php
/**
 * Implements hook_commerce_payment_type_info_alter().
 */
function mymodule_commerce_payment_type_info_alter(array &$info) {
  if (isset($info['payment_manual'])) {
    $info['payment_manual']['workflow'] = 'mymodule_payment_manual';
  }
}
```

### Altering a payment method type definition
In this example, we swap out the existing class for the *Credit card* payment method type with a custom one. This approach could be used to customize the implementations of any of the `PaymentMethodTypeInterface` methods or the `buildFieldDefinitions` method.

```php
/**
 * Implements hook_commerce_payment_method_type_info_alter().
 */
function mymodule_commerce_payment_method_type_info_alter(array &$info) {
  if (isset($info['credit_card'])) {
    $info['credit_card']['class'] = \Drupal\mymodule\Plugin\Commerce\PaymentMethodType\CreditCard::class;
    $info['credit_card']['provider'] = 'mymodule';
  }
}
```

### Altering a payment gateway definition
In this example, we alter the *Manual* payment gateway plugin class as well as its plugin label.
```php
/**
 * Implements hook_commerce_payment_gateway_info_alter().
 */
function mymodule_commerce_payment_gateway_info_alter(array &$info) {
  if (isset($info['manual'])) {
    $info['manual']['class'] = \Drupal\mymodule\Plugin\Commerce\PaymentGateway\Manual::class;
    $info['manual']['provider'] = 'mymodule';
    $info['manual']['label'] = t('Bill me');
  }
}
```