Orders
======

Orders contain a list of order items and customer information. Orders
have states that are controlled through State Machine.

:doc:`order-items` - Orders contain order items, which represent purchased items.

:doc:`order-types` - You can have different order types. Order types have their
own settings when it comes to cart, checkout, and its processing.

:doc:`changing-the-order-workflow` - Each order type can use a different order workflow depending on the type of items sold, whether it's shippable etc.

Advanced topics
---------------

:doc:`order-processing` - Allows you to process an order, when the system
recalculates order item prices and availability.

:doc:`order-workflows` - Order workflows define states through which an order can go, from the moment an order was created to the moment that it is completed.

.. toctree::
   :maxdepth: 2
   :hidden:

   order-types
   order-items
   order-processing
   order-workflows
   order-workflows-states
   order-workflows-transitions
   order-workflows-association
   changing-the-order-workflow
