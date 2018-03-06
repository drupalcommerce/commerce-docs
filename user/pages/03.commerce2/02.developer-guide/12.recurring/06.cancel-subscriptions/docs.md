---
title: Cancel subscriptions
taxonomy:
    category: docs
---

In the [Create subscriptions section](../03.create-subscriptions/docs.md), we looked at how the `OrderSubscriber` class uses its `onPlace()` method to handle the "place" transition that's triggered when checkout completes. In this part, we'll look at what happens when an order with a subscription is canceled. The `OrderSubscriber` class handles this event with its `onCancel()` method. Just as in `onPlace()`, this method only operates on *non-recurring* order types. Unlike the `onPlace()` method, `onCancel()` is fairly simple and straighforward.

In `onCancel()`, we iterate through the order's items. If an order item's purchasable entity has both a "subscription type" and "billing schedule", then we find any subscriptions for which this order is the subscription's "initial order" *and* the subscription state is "active". For each subscription, the state is set to Canceled and the subscription is saved.
