---
title: Create a condition
taxonomy:
    category: docs
---

Commerce conditions are used in when creating a Promotion or a Payment Gateway 
for your store. 

In this context, conditions are a set of plugins unique to the 
commerce project. They are not connected in function or code to conditions in 
core such as: Drupal\Core\Database\Query\Condition. 

A promotion condition evaluated only when a coupon is applied to an order.


Minimum requirements to build a condition:
---

As you can see from comparing `ConditionInterface` with `ConditionBase`, 
there is only one function required when extending ConditionBase to fulfill 
the ConditionInterface prescription.

```php
<?php

/**
 * Defines the interface for conditions.
 */
interface ConditionInterface extends ConfigurablePluginInterface, PluginFormInterface, PluginInspectionInterface {

  /** * Gets the condition label. */ 
  public function getLabel();

  /** * Shown in the condition UI when enabling/disabling a condition. */
  public function getDisplayLabel();

  /** * This is the entity type ID of the entity passed to evaluate(). */
  public function getEntityTypeId();

  /**
   * Evaluates the condition.
   *
   * @param \Drupal\Core\Entity\EntityInterface $entity
   *   The entity.
   *
   * @return bool
   *   TRUE if the condition has been met, FALSE otherwise.
   */
  public function evaluate(EntityInterface $entity);
}

```
[ConditionInterface.php](https://cgit.drupalcode.org/commerce/tree/src/Plugin/Commerce/Condition/ConditionInterface.php)

```php
<?php

/**
 * Provides the base class for conditions.
 */
abstract class ConditionBase extends PluginBase implements ConditionInterface {

  public function __construct(array $configuration, $plugin_id, $plugin_definition) { }

  public function calculateDependencies() { ... }

  public function defaultConfiguration() { ... }

  public function getConfiguration() { ... }

  public function setConfiguration(array $configuration) { ... }

  public function buildConfigurationForm(array $form, FormStateInterface $form_state) { ... }

  public function validateConfigurationForm(array &$form, FormStateInterface $form_state) {}

  public function submitConfigurationForm(array &$form, FormStateInterface $form_state) { ... }

  // These are required by ConditionInterface.
  public function getLabel() { ... }

  public function getDisplayLabel() { ... }

  public function getEntityTypeId() { ... }
  
  // TODO function evaluate is missing, write your own.
}
```
[ConditionBase.php](https://cgit.drupalcode.org/commerce/tree/src/Plugin/Commerce/Condition/ConditionBase.php)


Functionally, a condition would not be useful without some sort of user 
configuration. defaultConfiguration, buildConfigurationForm, and 
validateConfigurationForm go hand in hand with evaluate to create a basic 
condition.

Lets see how these functions are used in practice by analysing one of 
the simplest conditions to ship with commerce: OrderItemQuantity.


Example using class OrderItemQuantity:

User story:
  As a store manager I want to encourage bulk ordering by creating a promotion that applies to orders of at least 5 of the selected product. 
  
 ![Add Promotion UI](create-a-promotion.png)
  

```php
<?php // namespace & use
/**
 * Provides the total discounted product quantity condition.
 *
 * Implemented as an order condition to be able to count products across
 * non-combined order items.
 *
 * @CommerceCondition(
 *   id = "order_item_quantity",
 *   label = @Translation("Total discounted product quantity"),
 *   category = @Translation("Products"),
 *   entity_type = "commerce_order",
 *   parent_entity_type = "commerce_promotion",
 *   weight = 10,
 * )
 */
class OrderItemQuantity extends ConditionBase implements ParentEntityAwareInterface {

  use ParentEntityAwareTrait;

  /**
   * {@inheritdoc}
   */
  public function defaultConfiguration() {
    return [
      'operator' => '>',
      'quantity' => 1,
    ] + parent::defaultConfiguration();
  }

  /**
   * {@inheritdoc}
   */
  public function buildConfigurationForm(array $form, FormStateInterface $form_state) {
    $form = parent::buildConfigurationForm($form, $form_state);

    $form['operator'] = [
      '#type' => 'select',
      '#title' => t('Operator'),
      '#options' => $this->getComparisonOperators(),
      '#default_value' => $this->configuration['operator'],
      '#required' => TRUE,
    ];
    $form['quantity'] = [
      '#type' => 'number',
      '#title' => t('Quantity'),
      '#default_value' => $this->configuration['quantity'],
      '#min' => 1,
      '#required' => TRUE,
    ];

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function submitConfigurationForm(array &$form, FormStateInterface $form_state) {
    parent::submitConfigurationForm($form, $form_state);

    $values = $form_state->getValue($form['#parents']);
    $this->configuration['operator'] = $values['operator'];
    $this->configuration['quantity'] = $values['quantity'];
  }

  /**
   * {@inheritdoc}
   */
  public function evaluate(EntityInterface $entity) {
    $this->assertEntity($entity);
    /** @var \Drupal\commerce_order\Entity\OrderInterface $order */
    $order = $entity;
    /** @var \Drupal\commerce_promotion\Entity\PromotionInterface $promotion */
    $promotion = $this->parentEntity;
    $offer = $promotion->getOffer();

    $quantity = '0';
    foreach ($order->getItems() as $order_item) {
      // If the offer has conditions, skip order items that don't match.
      if ($offer instanceof OrderItemPromotionOfferInterface) {
        $conditions = $offer->getConditions();
        $condition_group = new ConditionGroup($conditions, 'OR');
        if (!$condition_group->evaluate($order_item)) {
          continue;
        }
      }
      $quantity = Calculator::add($quantity, $order_item->getQuantity());
    }

    switch ($this->configuration['operator']) {
      case '>=':
        return $quantity >= $this->configuration['quantity'];

      case '>':
        return $quantity > $this->configuration['quantity'];

      case '<=':
        return $quantity <= $this->configuration['quantity'];

      case '<':
        return $quantity < $this->configuration['quantity'];

      case '==':
        return $quantity == $this->configuration['quantity'];

      default:
        throw new \InvalidArgumentException("Invalid operator {$this->configuration['operator']}");
    }
  }

}
```
[OrderItemQuantity.php](https://cgit.drupalcode.org/commerce/tree/modules/promotion/src/Plugin/Commerce/Condition/OrderItemQuantity.php)

! We need help filling out this section! Feel free to follow the *edit this page* link and contribute.
