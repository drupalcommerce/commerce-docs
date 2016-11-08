# State Machine Transitions

For an actual example being used in Drupal Commerce, check out the state machine transition event subscriber being used in commerce_order to set an order's placed timestamp:
* [commerce_order.services.yml](https://github.com/drupalcommerce/commerce/blob/080ca52fbb9ec73b9eeece5487a62d221e75ed04/modules/order/commerce_order.services.yml#L29)
* [TimestampEventSubscriber.php](https://github.com/drupalcommerce/commerce/blob/080ca52fbb9ec73b9eeece5487a62d221e75ed04/modules/order/src/EventSubscriber/TimestampEventSubscriber.php)

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
    // @todo Write code that will run when the subscribed event fires.
  }
}
```

## Telling Drupal About Your Event Subscriber

Your event subscriber should be added to `{module}.services.yml` in the base directory of your module.

The following would register the event subscriber in the previous section:

```yaml
services:
  rmf_user_affiliate_event_subscriber:
    class: '\Drupal\my_module\EventSubscriber\MyModuleEventSubscriber'
    tags:
      - { name: 'event_subscriber' }
```