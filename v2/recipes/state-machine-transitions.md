# State Machine Transitions

## Finding Transitions
Transition information can be found in a `{module}.workflows.yml`.

Example from commerce_order:

```yaml
order_default:
  id: order_default
  group: commerce_order
  label: 'Default'
  states:
    draft:
      label: Draft
    completed:
      label: Completed
    canceled:
      label: Canceled
  transitions:
    place:
      label: 'Place order'
      from: [draft]
      to: completed
    cancel:
      label: 'Cancel order'
      from: [draft]
      to:   canceled

order_default_validation:
  id: order_default_validation
  group: commerce_order
  label: 'Default, with validation'
  states:
    draft:
      label: Draft
    validation:
      label: Validation
    completed:
      label: Completed
    canceled:
      label: Canceled
  transitions:
    place:
      label: 'Place order'
      from: [draft]
      to:   validation
    validate:
      label: 'Validate order'
      from: [validation]
      to: completed
    cancel:
      label: 'Cancel order'
      from: [draft, validation]
      to:   canceled

order_fulfillment:
  id: order_fulfillment
  group: commerce_order
  label: 'Fulfillment'
  states:
    draft:
      label: Draft
    fulfillment:
      label: Fulfillment
    completed:
      label: Completed
    canceled:
      label: Canceled
  transitions:
    place:
      label: 'Place order'
      from: [draft]
      to:   fulfillment
    fulfill:
      label: 'Fulfill order'
      from: [fulfillment]
      to: completed
    cancel:
      label: 'Cancel order'
      from: [draft, fulfillment]
      to:   canceled

order_fulfillment_validation:
  id: order_fulfillment_validation
  group: commerce_order
  label: 'Fulfillment, with validation'
  states:
    draft:
      label: Draft
    validation:
      label: Validation
    fulfillment:
      label: Fulfillment
    completed:
      label: Completed
    canceled:
      label: Canceled
  transitions:
    place:
      label: 'Place order'
      from: [draft]
      to:   validation
    validate:
      label: 'Validate order'
      from: [validation]
      to:   fulfillment
    fulfill:
      label: 'Fulfill order'
      from: [fulfillment]
      to: completed
    cancel:
      label: 'Cancel order'
      from: [draft, validation, fulfillment]
      to:   canceled
```

## Reacting to Transitions

Example - reacting to the order 'place' transition.

```php
namespace Drupal\my_module\EventSubscriber;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Drupal\state_machine\Event\WorkflowTransitionEvent;

class MyModuleEventSubscriber implements EventSubscriberInterface {

  public static function getSubscribedEvents() {
    // The format for adding a state machine event to subscribe to is:
    // {group}.{transition key}.pre_transition or {group}.{transition key}.post_transition
    // depending on when you want to react.
    $events = ['commerce_order.place.post_transition' => 'onOrderPlace'];
    return $events;
  }

  public function onOrderPlace(WorkflowTransitionEvent $event) {
    do_stuff();
  }
}
```
