---
title: Orders
taxonomy:
    category: docs
---

Orders
======

Orders contain a list of order items and customer information. Orders
have states that are controlled through State Machine.

:doc:`order-items` - Orders contain order items, which represent purchased items.

:doc:`order-types` - You can have different order types. Order types have their
own settings when it comes to cart, checkout, and its processing.

Advanced topics
---------------

:doc:`order-processing` - Allows you to process an order, when the system
recalculates order item prices and availability.

.. toctree::
   :maxdepth: 2
   :hidden:

   order-types
   order-items
   order-processing
