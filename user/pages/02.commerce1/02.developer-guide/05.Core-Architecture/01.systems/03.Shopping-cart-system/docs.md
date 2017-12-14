---
title: Shopping cart system
taxonomy:
    category: docs
---

Shopping carts in Drupal Commerce are nothing more than orders in statuses that indicate they are cart statuses. By default, this includes the cart status that comes with the cart order state and a couple of the checkout page statuses.

When a user adds an item to his shopping cart, the action will create a new shopping cart order for the customer with the product in it. If the user is logged in, the order will contain his uid so it may be loaded on subsequent pageloads.  If the user is not logged in, the order ID is stored in the user's session until he logs in and the order is updated to point to the account uid.

As long as an order is still considered to be a shopping cart, its line items will be re-validated on load against the latest product prices / availability, etc. (This still needs to be <a href="http://drupal.org/node/736488">implemented</a>.)

For Drupal Commerce 1.0, we are not planning on supporting shopping carts with products in multiple currencies.  While it is technically possible for line items to have differing currencies, it is impossible to provide a general total / payment solution.

The Cart module defines a shopping cart block via Views and a form where the user can manage the contents of his cart.  If an item is removed from the shopping cart, its line item is deleted from the order.  Even if all the items are removed from the order, the order will persist to preserve any data in the order object.

The shopping cart is totally optional, meaning checkout is implemented in a separate module and will still function properly for orders created by the administrator. This allows for sites to do invoicing and payment collection where users shouldn't be allowed to create and manage their own orders via a cart.