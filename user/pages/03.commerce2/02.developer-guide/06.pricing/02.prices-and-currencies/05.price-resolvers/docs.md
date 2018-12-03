---
title: Price resolvers
taxonomy:
    category: docs
---

ChainPriceResolver + Interface
* applies each resolver iteratatively, ordered by priority. Stops when price value is returned.

DefaultResolver + Interface
* gets the price from the purchasable entity (variation)
* can be used for variation price, list_price, as well as other price fields on a purchasable entity. Use $context to pass in field name.

Effect of order refresh on pricing. Link to general order refresh page that's part of orders documentation. Order refresh allows adding adjustments.

[Order refresh and processing](../../07.orders/01.order-refresh-and-process)

### Links and resources:
* For more information on the Commerce Guys Addressing library and its data model, see its [README file](https://github.com/commerceguys/addressing/blob/master/README.md)

[Google's Address Data Service]: https://chromium-i18n.appspot.com/ssl-address

