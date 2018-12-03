---
title: Prices and currencies
taxonomy:
    category: docs
---

The [Price module] requires commerceguys/intl library.

provides functionality for storing, validating, and displaying international postal addresses. On eCommerce sites in general, when going through checkout customers are often annoyed by US-centric address forms. When interviewed about cart abandonment, this topic is a common complaint. In Drupal Commerce, the *Address* module solves this problem by providing country-specific address forms to customers along with the capability to display the addresses properly for shipping or billing purposes.

#### [Currencies](03.currencies)
- TBD

#### [Formatting prices](04.formatting-prices)
- Formatters: OrderTotalSummary, PriceCalculated
- PriceCalculator service: price a purchasable entity would have if is was in an order
- commerce-price-plain template

#### [Price resolvers](05.chain-price-resolvers)
- Explain pattern of chain resolvers.
- Price resolving is base price; order refresh allows adding adjustments.
