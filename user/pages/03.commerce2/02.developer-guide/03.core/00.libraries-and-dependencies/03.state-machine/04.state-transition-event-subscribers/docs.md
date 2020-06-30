---
title: State transition event subscribers
taxonomy:
    category: docs
---

In the previous two sections, we created a custom Order item State field, Workflow and state transition Guard that could be used as parts of a custom Order fulfillment management system. Here we'll continue with that example and look at how event subscribers that react to State transition events can be used to provide custom business logic for your Drupal Commerce application.

If you're unfamiliar with the concept of event subscribers, you may want to start with documentation provided by Drupal.org:
- [Subscribe to and dispatch events]
- [EventSubscriber example]

The [State machine module] dispatches several events whenever a transition is applied to a State field. The two types of events are `pre_transition` phase and `post_transition` phase.

- **Pre-transition** phase events are dispatched right before the State field's entity is saved and allow the entity to be modified.
- **Post-transition** phase events are dispatched right after the State field's entity is saved.

Both types of events provide methods that can be used by your event subscriber:

```php
/** @var \Drupal\state_machine\Plugin\Workflow\WorkflowTransition $transition */
$transition = $event->getTransition();

/** @var \Drupal\state_machine\Plugin\Workflow\WorkflowInterface $workflow */
$workflow = $event->getWorkflow();

/** @var \Drupal\Core\Entity\ContentEntityInterface $entity */
$entity = $event->getEntity();

/** @var string $state_field_name */
$state_field_name = $event->getFieldName();

/** @var \Drupal\state_machine\Plugin\Field\FieldType\StateItemInterface $state_field */
$state_field = $event->getField();
```

When subscribing to a State transition event, you will specify pre- or post- transition as well as the type(s) of transitions you are targeting.

#### Generic state transition events
The `state_machine.pre_transition` and `state_machine.post_transition` events are fired for *any* transition on *any* State field. They are useful for logging, notifications, and other use cases that require reacting to every transition regardless of the workflow group. For an example of generic (and other) state transition event subscribers, see the [WorkflowTransitionEventSubscriber] test code provided by the State machine module.

#### Workflow group-specific state transition events
The pattern for workflow group-specific events is "{$workflow_group_id}.{$phase}", where {$workflow_group} is something like, `commerce_order` or `mymodule_order_item` and {$phase} is either `pre_transition` or `post_transition`.

These events are useful for performing an action based on the "to" state, regardless of which transition made the change. You can get the "to" state and its ID from the event transition, like this:

```php
/** @var \Drupal\state_machine\Plugin\Workflow\WorkflowTransition $transition */
$transition = $event->getTransition();

/** @var \Drupal\state_machine\Plugin\Workflow\WorkflowState $to_state */
$to_state = $transition->getToState();

$to_state_id = $to_state->getId();
```

##### Example: subscriber to log all Order item fulfillment events
In [Working with state fields](../state-fields), we created the `mymodule_order_item` custom workflow group for an Order item fulfillment state field. We can implement an event subscriber to log all transitions (for any workflow assigned to the group) by subscribing to the `mymodule_order_item.post_transition`, like this:

```php
namespace Drupal\mymodule\EventSubscriber;

use Drupal\state_machine\Event\WorkflowTransitionEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class OrderItemFulfillmentSubscriber implements EventSubscriberInterface {

  public static function getSubscribedEvents() {
    $events = [
      'mymodule_order_item.post_transition' => 'onLogOrderItemTransition',
    ];
    return $events;
  }

  public function onLogOrderItemTransition(WorkflowTransitionEvent $event) {
    /** @var \Drupal\commerce_order\Entity\OrderItemInterface $order_item */
    $order_item = $event->getEntity();

    $transition_id = $event->getTransition()->getId();
    // Log order item transition here.
  }

}
```

#### Transition-specific state transition events
The pattern for workflow group-specific events is "{$workflow_group_id}.{$transition_id}.{$phase}". These transition-specific state transition events can be extremely useful for powering business logic in Drupal Commerce applications. 

For example, the event subscriber that sets order numbers when an order is *placed* subscribes to the `commerce_order.place.pre_transition` event:
- `commerce_order` is the workflow group.
- `place` is the transition.
- `pre_transition` is the phase.

Additionally, other event subscribers for the `commerce_order.place.pre_transition` event perform cart finalization operations and register coupon/promotion usage, and an event subscriber for the `commerce_order.place.post_transition` event does some address book management.

##### Example: event subscriber to manage Order item fulfillment
In [Working with state fields](../state-fields), we created a custom workflow for an Order item state field with `fill` and `unfill` transitions. In a custom inventory management system, we could implement event subscribers for the `mymodule_order_item.fill.pre_transition` and `mymodule_order_item.unfill.pre_transition` events to make the actual updates to inventory data, like this:

```php
<?php

namespace Drupal\mymodule\EventSubscriber;

use Drupal\Core\Entity\EntityTypeManagerInterface;
use Drupal\mymodule\InventoryManagerInterface;
use Drupal\state_machine\Event\WorkflowTransitionEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class OrderItemFulfillmentSubscriber implements EventSubscriberInterface {

  /**
   * The custom inventory manager.
   *
   * @var \Drupal\mymodule\InventoryManagerInterface
   */
  protected $inventoryManager;

  /**
   * The log storage.
   *
   * @var \Drupal\commerce_log\LogStorageInterface
   */
  protected $logStorage;

  /**
   * Constructs a new OrderItemFulfillmentSubscriber object.
   *
   * @param \Drupal\mymodule\InventoryManagerInterface $inventory_manager
   *   The inventory manager.
   * @param \Drupal\Core\Entity\EntityTypeManagerInterface $entity_type_manager
   *   The entity type manager.
   */
  public function __construct(InventoryManagerInterface $inventory_manager, EntityTypeManagerInterface $entity_type_manager) {
    $this->inventoryManager = $inventory_manager;  	
    $this->entityTypeManager = $entity_type_manager;
  }

  /**
   * {@inheritdoc}
   */
  public static function getSubscribedEvents() {
    $events = [
      'mymodule_order_item.fill.pre_transition' => 'onOrderItemFill',
      'mymodule_order_item.unfill.pre_transition' => 'onOrderItemUnFill',
      'mymodule_order_item.post_transition' => 'onLogOrderItemTransition',
    ];
    return $events;
  }


  /**
   * Executes the actual inventory transaction for the order item fill.
   *
   * @param \Drupal\state_machine\Event\WorkflowTransitionEvent $event
   *   The event.
   */
  public function onOrderItemFill(WorkflowTransitionEvent $event) {
    /** @var \Drupal\commerce_order\Entity\OrderItemInterface $order_item */
    $order_item = $event->getEntity();

    $this->inventoryManager->fillOrderItem($order_item);
  }

  /**
   * Executes the inventory transaction for un-filling the order item.
   *
   * @param \Drupal\state_machine\Event\WorkflowTransitionEvent $event
   *   The event.
   */
  public function onOrderItemUnFill(WorkflowTransitionEvent $event) {
    /** @var \Drupal\commerce_order\Entity\OrderItemInterface $order_item */
    $order_item = $event->getEntity();

    $this->inventoryManager->unfillOrderItem($order_item);
  }

  /**
   * Log all order item fulfillment transitions to the parent order.
   *
   * @param \Drupal\state_machine\Event\WorkflowTransitionEvent $event
   *   The transition event.
   */
  public function onLogOrderItemTransition(WorkflowTransitionEvent $event) {
    /** @var \Drupal\commerce_order\Entity\OrderItemInterface $order_item */
    $order_item = $event->getEntity();

    $transition_id = $event->getTransition()->getId();
    $this->logStorage->generate($order_item->getOrder(), 'order_item_' . $transition_id, [
      'order_item_id' => $order_item->id(),
    ])->save();
  }

}

```

In the above example, the "inventory manager" is not an actual Drupal Commerce service. You would need to implement your own custom service to manage updates to inventory with `fillOrderItem()` and  `unfillOrderItem()` or similar methods.

[Subscribe to and dispatch events]: https://www.drupal.org/docs/creating-custom-modules/subscribe-to-and-dispatch-events
[EventSubscriber example]: https://www.drupal.org/docs/8/modules/simple-fb-connect-8x/eventsubscriber-example
[State machine module]: https://www.drupal.org/project/state_machine
[WorkflowTransitionEventSubscriber]: https://git.drupalcode.org/project/state_machine/-/blob/8.x-1.x/tests/modules/state_machine_test/src/EventSubscriber/WorkflowTransitionEventSubscriber.php
