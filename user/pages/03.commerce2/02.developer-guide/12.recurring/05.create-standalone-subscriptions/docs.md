---
title: Create standalone subscriptions
taxonomy:
    category: docs
---

If a new Subscription is created through the Admin UI, "Standalone" is available as a subscription type option. This section describes what happens when a standalone type subscription is created.
![add_standalone_subscription](../images/add_standalone_subscription.png)

Once all the required field values have been entered and the form has been saved, the new Subscription is in the `Pending` state and does not yet have any recurring orders. In [the previous section](../04.close-and-renew-subscriptions/docs.md), we saw how the `Cron` service created [AdvancedQueue](https://www.drupal.org/project/advancedqueue) `Jobs` for closing and renewing a recurring order. The `Cron` service also checks whether there are any pending subscriptions that have already started (i.e., subscription start date < current date/time). If any are found, a new AdvancedQueue `Job` (for 'activating' the subscription) is created and enqueued for each subscription.

The `SubscriptionActivate` JobType plugin is used to activate a subscription. If the subscription is not found or is not active, the plugin's `process()` method returns with a "failure" result. Otherwise, the `activate` transition is applied to the subscription and the RecurringOrderManager's `ensureOrder()` method is called to create the recurring order for the subscription. This is the same method that was used to [create a recurring order for a product variation type subscription](../03.create-subscriptions/docs.md). At the end, we will have an "active" subscription with a single recurring order (in the "draft" state.) 

The only difference between a subscription created from an order item and a standalone subscription is that neither the standalone subscription nor its recurring order item will have a purchased entity. [The recurring order close-and-renewal process](../04.close-and-renew-subscriptions/docs.md) reamins the same. One possible use-case for a standalone subscription is a recurring donation system. The admin UI currently provides only basic functionality and would probably require improvements before it could be used in production. For example, the standalone subscription still requires a stored payment method; the Payment method field should be required and validated.
