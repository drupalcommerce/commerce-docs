---
title: Price calculation
taxonomy:
    category: docs
---

The base price of a product variation is the price without adjustments (i.e. without promotions, taxes etc). Price resolving is the process of finding the base price of the variation. Price resolvers are services. The default price resolver simply returns the price in the variations's price field. 

To actually resolve a price, commerce uses the `commerce_price.chain_price_resolver` service which finds all price resolver services and calls their `resolve()` method until one of them returns a price. For example, to support multiple currencies one could implement a custom price resolver service fetching the price with the appropriate currency from a multivalue price field.

Price resolvers do not know about the order the product has been added to. Enter order processors.

[Order refresh](https://docs.drupalcommerce.org/commerce2/developer-guide/orders/order-refresh-and-process) runs order processors to (among others) add adjustments (e.g. promotions, taxes) to the order. An adjustment can rely on order data when changing the price. 

The `commerce_order.price_calculator` service can be used to find out the variation price including adjustments. It is used by the `commerce_price_calculated` field formatter implemented in the `commerce_order` module. It works by creating an unsaved order and applying adjustments on it. 
