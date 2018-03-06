---
title: Create standalone subscriptions
taxonomy:
    category: docs
---

## Creating a Standalone Subscription
If a new Subscription is created through the Admin UI, "Standalone" is available as a subscription type option.
![add_standalone_subscription-1](/content/images/2018/03/add_standalone_subscription-1.png)

Once all the required field values have been entered and the form has been saved, the new Subscription is in the `Pending` state and does not yet have any recurring orders. In the previous section, we saw how the `Cron` service created (AdvancedQueue) `Jobs` for closing and renewing a recurring order. The `Cron` service also checks whether there are any pending subscriptions that have already started (i.e., subscription start date < current date/time). If any are found, a new AdvancedQueue `Job` (for 'activating' the subscription) is created and enqueued for each subscription.

The `SubscriptionActivate` JobType plugin is used to activate a subscription. If the subscription is not found or is not active, the plugin's `process()` method returns with a "failure" result. Otherwise, the `activate` transition is applied to the subscription and the **RecurringOrderManager's** `ensureOrder()` method is called to create the recurring order for the subscription. This is the same method that was used to create a recurring order for a product variation type subscription,<link: in part 3>. At the end, we will have an "active" subscription with a singled recurring order (in the "draft" state.) The only difference between a subscription created from an order item and a standalone subscription is that neither the standalone subscription nor its recurring order item will have a purchased entity.
