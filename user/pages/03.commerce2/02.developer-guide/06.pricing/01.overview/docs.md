---
title: Overview
taxonomy:
    category: docs
---

Drupal Commerce offers a complex pricing system that enables developers to implement sophisticated pricing policies.

Concepts:
* representation of prices and currencies within Drupal Commerce
* price resolvers
* product variation price vs. list price
* order refresh
* promotions
* fees
* contrib modules
 - price list module
 
Product variations have price and list_price, implement getPrice() and getListPrice().
Purchasable entities must implement getPrice().

Order items have unit_price and total_price. overridden_unit_price is boolean that allows complete administrative control. Prices will not be altered based on order refresh process.
getAdjustedTotalPrice: apply adjustments and round to proper level of precision.
getAdjustedUnitPrice: apply adjustments and round to proper level of precision.

Orders have total_price, total_paid, and getSubtotalPrice(), which is sum of item total prices. getBalance() is difference between total price and total paid.

Payments have an amount and a refunded_amount. The balance is the difference between the amount and the refunded amount.




