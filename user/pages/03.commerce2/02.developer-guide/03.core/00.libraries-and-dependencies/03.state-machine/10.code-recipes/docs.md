---
title: Code recipes

taxonomy:
    category: docs
---

If you want to manage State fields and transitions programatically, you can use these code examples as a starting point.

- [Alter existing workflows](#alter-existing-workflows)
- **Get values for a State field:**
 - [Current state ID](#current-state-id-for-an-order-entity)
 - [State label](#label-for-an-entity-with-a-custom-state-field)
 - [Allowed transitions](#allowed-transitions-for-the-current-state-of-a-payment-entity)
- **Change the current state for a State field:**
 - [Place an Order programatically](#place-an-order)
 - [Apply a transition to a custom State field](#apply-the-complete-transition-to-a-custom-state-field)

### Alter existing workflows
If your State field can be configured through the admin UI, then you can usually just create your own custom workflow for use with the State field. See the examples in the [State fields](../state-fields) documentation.

The workflows for Payment states are not as easily altered, since they are managed entirely by code. Payment gateways define their Payment types in the gateway plugin annotation, and Payment types define the workflow for the Payment State field in their annotations. So there is no admin UI that allows you to change the workflow for Payments. Instead, you can use a hook provided by the State machine module.

Here is an example for changing the label for a Payment State, using `hook_workflows_alter(array &$workflows)`.

```php
/**
 * Change the label for the "Completed" state to "Captured", for the `payment_default` workflow.
 *
 * @param array $workflows
 *   Workflow definitions, keyed by plugin ID.
 */
function mymodule_workflows_alter(array &$workflows) {
  $workflows['payment_default']['states']['completed']['label'] = 'Captured';
}
```

In addition to `hook_workflows_alter(array &$workflows)`, the State machine module also provides `hook_workflow_groups_alter(array &$workflow_groups)` for altering the definitions of workflow groups.

### Get values for a State field
See `Drupal\state_machine\Plugin\Field\FieldType\StateItemInterface` for the full definitions of all methods available for State fields. Here are a few examples for the most commonly used operations:

#### Current state ID for an Order entity
The state ID is a string; for example: `draft`.
```php
/** @var \Drupal\commerce_order\Entity\OrderInterface $order */
$state = $order->getState()->getId();
```

#### Label for an entity with a custom State field
In this example, we've added a "Fulfillment state" field to an Order item type, with machine ID: `field_fulfillment_state`.
```php
/** @var \Drupal\commerce_order\Entity\OrderItemInterface $order_item */
$label = $order_item->get('field_fulfillment_state')->first()->getLabel();
```

#### Allowed transitions for the current state of a Payment entity
```php
/** @var \Drupal\commerce_payment\Entity\PaymentInterface $payment */
/** @var \Drupal\state_machine\Plugin\Workflow\WorkflowTransition[] $transitions */
$transitions = $payment->getState()->getTransitions();
```

### Change the current state for a State field
The current state should always be changed by applying a transition. Do not attempt to "set" the value of the State field directly. You can use the `applyTransition(WorkflowTransition $transition)` method to change the current state using a transition or apply a transition by ID, like this:

#### Place an order
```php
/** @var \Drupal\commerce_order\Entity\OrderInterface $order */
$order->getState()->applyTransitionById('place');
$order->save();
```

#### Apply the "complete" transition to a custom State field
```php
/** @var \Drupal\state_machine\Plugin\Field\FieldType\StateItemInterface $state_item */
$state_item = $entity->get('field_state')->first();
$state_item->applyTransitionById('complete');
$entity->save();
```
