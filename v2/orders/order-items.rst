Order Items
===========

An order item represents a purchasable entity inside of an order. It
contains a reference to the purchasable entity, a quantity, a unit price
and a total price.

    **Note:** In Drupal Commerce 1.x, these were called line items.

The order total is based off the unit price of order items multiplied by
their quantity and the sum of all order item totals.

Order items have their unit price calculated during the `order refresh
process <order-processing.rst>`__. This synchronizes the price with the
current purchasable entity’s price while the order is still in a draft
state.

The add to cart form is actually the create form for an order item
entity. It is a specific form display. Selecting attributes on the add
to cart form identifies the proper reference purchased entity to
reference.

.. figure:: ../images/order-item-add-to-cart-form.png
   :alt: Order item add to cart form

   Order item add to cart form
