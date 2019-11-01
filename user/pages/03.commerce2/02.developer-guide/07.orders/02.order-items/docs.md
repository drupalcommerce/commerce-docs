---
title: Order items
taxonomy:
    category: docs
---

An order item represents a purchasable entity inside of an order. It
contains a reference to the purchasable entity, a quantity, a unit price
and a total price.

Order items are fieldable and may also store other data relevant to the order, such as sizing. Many implementations are
best to store sizing and related things within the product variation (or other purchaseable entity). However for data
that is unique to the order rather than to the product using fields can help store that data without creating an excess of
product variations that make management hard.

> **Note:** In Drupal Commerce 1.x, these were called line items.

The order total is based off the unit price of order items multiplied by
their quantity and the sum of all order item totals.

Order items have their unit price calculated during the [order refresh process](../01.order-refresh-and-process). This synchronizes the price with the
current purchasable entity’s price while the order is still in a draft state, as well as applying any promotions and discounts as well as any custom
functionality that may adjust the price - or custom fields on the order item.

The add to cart form is actually the create form for an order item
entity. It is a specific form display. Selecting attributes on the add
to cart form identifies the proper reference purchased entity to
reference.

![Order item add to cart form](../images/order-item-add-to-cart-form.png)
