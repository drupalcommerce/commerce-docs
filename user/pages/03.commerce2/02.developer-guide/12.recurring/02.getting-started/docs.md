---
title: Getting started
taxonomy:
    category: docs
---

## Setting up subscriptions: First steps
### Step 1 - Create/enable a payment method
Each subscription has a Payment method, so you'll need to set up at least one enabled payment gateway that can be used by a customer to create a payment method.

### Step 2 - Create a billing schedule.
Billing schedules are configuration entities that can be created through the admin UI: `Commerce >> Configuration >> Payment`
See [Subscriptions overview](../01.subscriptions-overview/docs.md) for additional information on billing schedules.

### Step 3 - Enable subscriptions for a product variation type
While it is possible to [create standalone subscriptions](../05.create-standalone-subscriptions/docs.md), the more typical case is to create a product variation that will trigger the subscription. Unless a custom subscription type plugin has been created, the only option you'll see for the variation's subscription type is, "Product variation."

### Step 4 - Create a new product variation
Create a new product variation for the type you added in step 3. Select the billing schedule you added in step 2 and the "product variation" subscription type. You should now be able to place an order for a subscription by adding this new product variation to your cart.


## Adding a subscription product variation to the cart
After the product variation is added to the cart, the price charged for the order item may need to be adjusted if prorating is required or the item has a "Postpaid" billing schedule. This is done by adding a "subscription" type Adjustment to the order. (The order item's price remains unchanged.) This order processing takes place in the `process()` method of the `InitialOrderProcessor` service.

If the billing type for the variation's billing schedule is "prepaid", the billing schedule's plugin is used to generate the "first" billing period. And the billing schedule's prorater plugin uses that billing period to calculate a prorated unit price. If the prorated unit price is less than the order item's unit price, an adjustment is created in the amount of the difference between the two prices.

If the variation's billing schedule is "postpaid", then the customer should not be charged for the subscription order item at all. So a negative adjustment in the amount of the order's unit prices is created.


In the next section, we'll look at what happens when checkout completes for an order that includes a subscription/recurring product.
