---
title: Price resolvers
taxonomy:
    category: docs
---

Price resolvers are services that allow product and order item prices to be calculated dynamically. If you're unfamiliar with the concept of Drupal Commerce *Resolvers* generally, the [Understanding resolvers](../../../03.core/03.understanding-resolvers) documentation page provides an introduction. 

There are three places within Drupal Commerce where price resolvers are used:

#### 1. The *Calculated* price formatter
The *Calculated* price formatter can be used for any price fields that appear on product variations (or other entities that implement the [`PurchasableEntityInterface`](../../../03.products/02.product-architecture/10.code-recipes).) This formatter uses the `ChainPriceResolver` service to resolve the value of the price dynamically. See [Formatting prices](../04.formatting-prices) for more information on this price field formatter.

#### 2. The *Add to cart form*
When a customer is shopping on your site and adds a product to his cart using the [Add to cart form](../../../03.products/04.displaying-products/02.add-to-cart-form), the price of the product is calculated dynamically at that moment, using the `ChainPriceResolver` service.

#### 3. *Order refresh* process


2. AddToCartForm: see AddToCartForm
3. OrderRefresh: see Order refresh page

1. How/where are price resolvers used?
2. How to create a custom price resolver

AddToCartForm and OrderRefresh: setUnitPrice($resolved_price) _unless_ unit price has been overridden'

PriceCalculator service
PriceCalculatedFormatter (two versions: order one uses the service, price one doesn't)


Default resolver: returns value of "price" field for purchasable entity

ChainPriceResolver + Interface
* applies each resolver iteratatively, ordered by priority. Stops when price value is returned.

DefaultResolver + Interface
* gets the price from the purchasable entity (variation)
* can be used for variation price, list_price, as well as other price fields on a purchasable entity. Use $context to pass in field name.

Effect of order refresh on pricing. Link to general order refresh page that's part of orders documentation. Order refresh allows adding adjustments.

[Order refresh and processing](../../07.orders/01.order-refresh-and-process)

### Links and resources:
* [Modifying product prices in Drupal Commerce 2 for Drupal 8](https://www.rapiddg.com/blog/modifying-product-prices-drupal-commerce-2-drupal-8) has several examples of custom price resolvers.
* [Drupal Commerce 2.x and sale price] provides example code for creating a "sale price" price resolver.
