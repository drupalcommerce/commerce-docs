---
title: Subscribing to Transition Events
taxonomy:
    category: docs
---

In many cases we may want to do more when a transition occurs than simply moving the order to the next state. Let's say that we want to send an email to the customer when an order has been processed and is awaiting for fulfillment. That should happen when a store manager clicks on the "Process order" button for an Order.

The [State machine](../../../core/libraries-and-dependencies/state-machine) module that provides the foundation for the workflows emits two events when a transition occurs. The events are named ``commerce_order.TRANSITION_ID.TRANSITION_PHASE``, where ``TRANSITION_ID`` is the key of the transition's definition in the YAML file, and ``TRANSITION_PHASE`` is "pre_transition" for the first event that is emitted just before the transition has occurred, and "post_transition" for the second event that is emitted just after it.

In our case we want to send the email after the transition to the Fulfillment state has occurred. We therefore need to create an event subscriber that listens to the ``commerce_order.fulfill.post_transition`` event.

Here is an example that you can modify according to your requirements.

```php
    namespace Drupal\my_module\EventSubscriber;

    use Drupal\state_machine\Event\WorkflowTransitionEvent;
    use Drupal\Core\Language\LanguageManagerInterface;
    use Drupal\Core\Mail\MailManagerInterface;
    use Drupal\Core\StringTranslation\StringTranslationTrait;
    use Symfony\Component\EventDispatcher\EventSubscriberInterface;

    /**
     * Sends an email when the order transitions to Fulfillment.
     */
    class OrderFulfillmentSubscriber implements EventSubscriberInterface {

      use StringTranslationTrait;

      /**
       * The language manager.
       *
       * @var \Drupal\Core\Language\LanguageManagerInterface
       */
      protected $languageManager;

      /**
       * The mail manager.
       *
       * @var \Drupal\Core\Mail\MailManagerInterface
       */
      protected $mailManager;

      /**
       * Constructs a new OrderFulfillmentSubscriber object.
       *
       * @param \Drupal\Core\Language\LanguageManagerInterface $language_manager
       *   The language manager.
       * @param \Drupal\Core\Mail\MailManagerInterface $mail_manager
       *   The mail manager.
       */
      public function __construct(
        LanguageManagerInterface $language_manager,
        MailManagerInterface $mail_manager
      ) {
        $this->languageManager = $language_manager;
        $this->mailManager = $mail_manager;
      }

      /**
       * {@inheritdoc}
       */
      public static function getSubscribedEvents() {
        $events = [
          'commerce_order.fulfill.post_transition' => ['sendEmail', -100],
        ];
        return $events;
      }

      /**
       * Sends the email.
       *
       * @param \Drupal\state_machine\Event\WorkflowTransitionEvent $event-       *   The transition event.
       */
      public function sendEmail(WorkflowTransitionEvent $event) {
        // Create the email.
        $order = $event->getEntity();
        $to = $order->getEmail();
        $params = [
          'from' => $order->getStore()->getEmail(),
          'subject' => $this->t(
            'Regarding your order [#@number]',
            ['@number' => $order->getOrderNumber()]
          ),
          'body' => $this->t(
            'Your order with #@number that you have placed with us has been processed and is awaiting fulfillment.',
            ['@number' => $order->getOrderNumber()]
          ),
        ];

        // Set the language that will be used in translations.
        if ($customer = $order->getCustomer()) {
          $langcode = $customer->getPreferredLangcode();
        }
        else {
          $langcode = $this->languageManager->getDefaultLanguage()->getId();
        }

        // Send the email.
        $this->mailManager->mail('commerce_order', 'receipt', $to, $langcode, $params);
      }

    }
```

Note that the following functions are made available by the event, if you need to execute more advanced logic based on the state that you are coming from or the workflow that the transition is part of.

```php
    $fromState = $event->getFromState();
    $toState = $event->getToState();
    $workflow = $event->getWorkflow();
```

At last, don't forget to register your event subscriber. Your event subscriber should be added to `my_module.services.yml` in the base directory of your module.

```yaml
    services:
      my_module.order_fulfillment_subscriber:
        class: Drupal\my_module\EventSubscriber\OrderFulfillmentSubscriber
        arguments: ['@language_manager', '@plugin.manager.mail']
        tags:
          - { name: event_subscriber }
```

Finding Transitions
-------------------

Transition information can be found in `{module}.workflows.yml` files. For example, `commerce_order.workflows.yml` defines the default Order transitions, and `commerce_payment.workflows.yml` defines the default Payment transitions.

Example from commerce_order:

```yaml
    # commerce_order.workflows.yml
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

For an actual example being used in Drupal Commerce, check out the state machine transition event subscriber being used in commerce_order to set an order's placed timestamp:
* [commerce_order.services.yml]
* [TimestampEventSubscriber.php]

[commerce_order.services.yml]: https://github.com/drupalcommerce/commerce/blob/080ca52fbb9ec73b9eeece5487a62d221e75ed04/modules/order/commerce_order.services.yml#L29
[TimestampEventSubscriber.php]: https://github.com/drupalcommerce/commerce/blob/080ca52fbb9ec73b9eeece5487a62d221e75ed04/modules/order/src/EventSubscriber/TimestampEventSubscriber.php

