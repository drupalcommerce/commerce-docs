---
title: Overview
taxonomy:
    category: docs
---

Prices are used within Drupal Commerce by several entities. These include product variations, order items, orders, and payments. Prices aren't standalone entities; rather, they are attached to entities as [fields] and are manipulated as [value objects]. Prices consist of a decimal number and a currency code. The level of precision (i.e., number of fractional digits) is defined by the currency code.

Currency functionality is provided by the commerceguys/intl library. It relies on the CLDR dataset for locale-specific patterns for formatting and displaying numbers and currency values. See [Commerce 2.x Stories - Internationalization] for a detailed introduction and backstory for the commerceguys/intl library.

> Should the following be here or elsewhere in this documentation section? If not this (or perhaps in addition to this), perhaps provide more of a summary of the rest of the sections? Or maybe that goes in the TOC document...

Product variations have price and list_price, implement getPrice() and getListPrice().
Purchasable entities must implement getPrice().

Order items have unit_price and total_price. overridden_unit_price is boolean that allows complete administrative control. Prices will not be altered based on order refresh process.
getAdjustedTotalPrice: apply adjustments and round to proper level of precision.
getAdjustedUnitPrice: apply adjustments and round to proper level of precision.

Orders have total_price, total_paid, and getSubtotalPrice(), which is sum of item total prices. getBalance() is difference between total price and total paid.

Payments have an amount and a refunded_amount. The balance is the difference between the amount and the refunded amount.


### Links and resources:
* 

[Commerce 2.x Stories - Internationalization]: https://drupalcommerce.org/blog/15916/commerce-2x-stories-internationalization
[fields]: https://www.drupal.org/docs/user_guide/en/planning-data-types.html
[value objects]: https://codete.com/blog/value-objects/
