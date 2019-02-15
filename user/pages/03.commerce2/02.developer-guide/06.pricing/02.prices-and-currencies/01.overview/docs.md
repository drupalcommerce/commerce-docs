---
title: Overview
taxonomy:
    category: docs
---

Prices are used within Drupal Commerce by several entities. These include product variations, order items, orders, and payments. Prices aren't standalone entities; rather, they are attached to entities as [fields] and are manipulated as [value objects]. Prices consist of a decimal number and a currency code. The level of precision (i.e., number of fractional digits) is defined by the currency code.

Currency functionality is provided by the commerceguys/intl library. It relies on the CLDR dataset for locale-specific patterns for formatting and displaying numbers and currency values. See [Commerce 2.x Stories - Internationalization] for a detailed introduction and backstory for the commerceguys/intl library.

### Links and resources:
* TBD

[Commerce 2.x Stories - Internationalization]: https://drupalcommerce.org/blog/15916/commerce-2x-stories-internationalization
[fields]: https://www.drupal.org/docs/user_guide/en/planning-data-types.html
[value objects]: https://codete.com/blog/value-objects/
