---
title: Order types
taxonomy:
    category: docs
---

Order Types
===========

Order types allow you to control how an order interacts with the other
components of Drupal Commerce, and the how the order moves through the
system.

.. figure:: ../images/order-types-workflow.png
   :alt: Order workflow settings

   Order workflow settings

Orders have a specific workflow that defines what states and transitions
the order can move in. Each order type can have its own workflow.

This means your default order type, which has shippable products, can
use the *Fulfillment* workflow. Meanwhile, your digital goods order type
can have the more simplistic *Default* workflow.

.. figure:: ../images/order-types-refresh.png
   :alt: Order refresh settings

   Order refresh settings

Each order type can control its refresh settings to control how often
order draft’s are processed. This controls the `order refresh
process. <order-processing.rst>`__

.. figure:: ../images/order-types-cart.png
   :alt: Order type cart settings

   Order type cart settings

The cart module allows each order type to control the default view used
when rendering carts in the cart block or cart form.

.. figure:: ../images/order-types-checkout.png
   :alt: Order type checkout settings

   Order type checkout settings

You can use a different checkout flow for each order type. In this case
you would have a physical order use a multiple step checkout flow that
requires shipping information. A digital order could have a more
simplified checkout flow that has one step (i.e.: payment.)
