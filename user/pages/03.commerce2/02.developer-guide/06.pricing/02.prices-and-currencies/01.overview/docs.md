---
title: Overview
taxonomy:
    category: docs
---

Prices consist of a decimal number and a currency code. The level of precision (i.e., number of fractional digits) is defined by the currency code.

Product variations have price and list_price, implement getPrice() and getListPrice().
Purchasable entities must implement getPrice().

Order items have unit_price and total_price. overridden_unit_price is boolean that allows complete administrative control. Prices will not be altered based on order refresh process.
getAdjustedTotalPrice: apply adjustments and round to proper level of precision.
getAdjustedUnitPrice: apply adjustments and round to proper level of precision.

Orders have total_price, total_paid, and getSubtotalPrice(), which is sum of item total prices. getBalance() is difference between total price and total paid.

Also used in payments and tax modules.


### Links and resources:
* 
