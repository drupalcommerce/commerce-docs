---
title: Order types
taxonomy:
    category: docs
---

Order types allow you to control how an order interacts with the other
components of Drupal Commerce, and the how the order moves through the
system.

![Order workflow settings](../images/order-types-workflow.png)

Orders have a specific workflow that defines what states and transitions
the order can move in. Each order type can have its own workflow.

This means your default order type, which has shippable products, can
use the *Fulfillment* workflow. Meanwhile, your digital goods order type
can have the more simplistic *Default* workflow.

![Order refresh settings](../images/order-types-refresh.png)

Each order type can control its refresh settings to control how often
order draft’s are processed. This controls the [order refresh
process.](../03.order-processing)

![Order type cart settings](../images/order-types-cart.png)

The cart module allows each order type to control the default view used
when rendering carts in the cart block or cart form.

[Order type checkout settings](../images/order-types-checkout.png)

You can use a different checkout flow for each order type. In this case
you would have a physical order use a multiple step checkout flow that
requires shipping information. A digital order could have a more
simplified checkout flow that has one step (i.e.: payment.)
