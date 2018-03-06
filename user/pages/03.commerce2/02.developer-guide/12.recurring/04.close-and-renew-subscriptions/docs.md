---
title: Close and renew subscriptions
taxonomy:
    category: docs
---

This section describes what happens when a recurring order's billing period comes to an end. At that point, we need to close the current recurring order  (by successfully creating a payment for it) and renew the subscription by creating a new recurring order for the next billing period. In part 2, we looked at how the OrderSubscriber kicks off a chain of events when a new order is placed. And at the end, a Subscription entity with at least one recurring order, which was left in the draft state, was created. In this part, it's Cron that will kick things off. The commerce recurring module implements hook_cron with a call to the `run()` method of the Commerce Recurring `Cron` service.

### Cron service class
The Cron service class does a couple different things in its `run()` method, but we'll just look at one of them here, the one that's relevant to closing and renewing a recurring order. The `run()` method starts by checking whether there are any recurring orders in the draft state with an ended billing period (i.e., billing period end date < current date/time). If any are found, the 'commerce_recurring' queue is loaded. (The [AdvancedQueue module](https://www.drupal.org/project/advancedqueue) is used for queue management in Commerce Recurring). Then, for each draft/ended recurring order, two Advanced Queue Jobs (for 'close' and 'renew') are created and enqueued for the order.

### AdvancedQueue Jobs and JobType plugins
Without getting too much into the details, an AdvancedQueue `Job` is an object that has a state (queued, processing, success, failure), belongs to a AdvancedQueue `Queue` (a configuration entity), and has a payload (an array of values passed to the `Job`). An AdvancedQueue `JobType` plugin contains the logic for processing a given job, in its `process()` method. Commerce recurring defines two `JobType` plugins for closing and renewing orders: `RecurringOrderClose` and `RecurringOrderRenew`.

### Closing a recurring order
Given the recurring order id (via the `Job` payload), the `RecurringOrderClose` plugin attempts to load the order and then calls the **RecurringOrderManager's** `closeOrder()` method. First, if the recurring order's state is 'draft', the state is changed to 'placed' by applying the 'place' workflow transition. This ensures that the recurring order won't be queued again by the `Cron` service the next time Cron runs. Next, we need to get the payment method and payment gateway. If the recurring order has only one order item and only one subscription, we can use that subscription's payment method. If the recurring order has multiple subscriptions and multiple payment methods, then the most recent payment method is used.

Once we have a payment method, we get its payment gateway and the payment gateway plugin. Next, a new `Payment` entity is created for the recurring order in the amount of the total price of the order. The payment gateway's `createPayment()` method is called and, if successful, the recurring's order state is changed to 'completed' by applying the 'mark_paid' transition.

What happens if the `createPayment()` method fails? The `DeclineException` is caught by the `RecurringOrderClose` plugin and handled by the plugin's `handleDecline` method.

#### RecurringOrderClose handleDecline() method
The recurring's order BillingSchedule (a config entity) is used to get the Retry Schedule. (This is set in the "Dunning" section of the billing schedule's data entry form.) If the maximum number of retries has not yet been reached, then a "Failure" result will be returned with a retry delay based on the Dunning settings and the number of retries so far increased by one. The queue will attempt to run the Job again after the retry delay.

If the maximum number of retries has been reached, the recurring order's state is changed to 'Failed' by applying the 'mark_failed' workflow transition. The Billing Schedule's Dunning settings control whether the recurring order's subscription(s) should remain active or should be canceled. If the subscription(s) should be canceled, this is also handled by the `RecurringOrderClose` plugin. The state of each subscription will be set to 'Canceled', and the subscriptions will be saved. The Job will not be run again.

The `handleDecline()` method also dispatches a `PaymentDeclinedEvent` (that could be used to send a dunning email) and saves the recurring order.

### Renewing a recurring order
Given the recurring order id (via the `Job` payload), the `RecurringOrderRenew` plugin attempts to load the order and then calls the **RecurringOrderManager's** `renewOrder()` method. If the order's subscription state is not active, the subscription has ended, so nothing is done. Otherwise, we create a new `BillingPeriod` object for the current billing period, using the recurring order's `billing_period` field value. Next, the billing schedule's plugin (`Fixed`, `Rolling`, etc.) is used to generate the next billing period. (See part 1 for more information.)

A new recurring order is then created for the subscription and the next billing period, and subscription charges are applied.  This is the same process that was used for creating the initial recurring order for the subscription. (See part 2 for a description of RecurringOrderManager::createOrder() and RecurringOrderManager::applyCharges()). 

At this point, `renewOrder()` triggers the `onSubscriptionRenew()` method for the `SubscriptionType` plugin. In the default "Product variation" subscription type, this method does nothing, but you could add your own custom logic here by overriding the method in a custom SubscriptionType plugin (and creating a product variation type that uses your custom plugin.)

Next, the new recurring order and its items are saved, the order is added to the subscription, the renewed time is set for the subscription (to the current time), and the subscription is saved. The order renewal process is complete.
