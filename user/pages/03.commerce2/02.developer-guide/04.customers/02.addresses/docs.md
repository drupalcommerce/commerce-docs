---
title: Addresses
taxonomy:
    category: docs
---

The [Address module] provides functionality for storing, validating, and displaying international postal addresses. On eCommerce sites in general, when going through checkout customers are often annoyed by US-centric address forms. When interviewed about cart abandonment, this topic is a common complaint. In Drupal Commerce, the *Address* module solves this problem by providing country-specific address forms to customers along with the capability to display the addresses properly for shipping or billing purposes.

#### [Address formats](01.address-formats)
- Learn about the structure of addresses and address formats.
- Create a custom address field by repurposing an unused one.

#### [Countries and subdivisions](02.countries-and-subdivisions)
- Modify the list of available countries and set the default country for customers.
- Add or modify subdivisions for a country.

#### [Address entry](03.address-entry)
- Override address field settings to control whether certain fields are always *hidden*, *optional*, or *required*.
- Customize address form fields and their labels.
- Set initial values for address fields.
- TBD: use an external service for postal code validation.

#### [Address display](04.address-display)
- Use the *Default* address formatter for country-specific address formats or extend it to modify its functionality.
- Use the *Plain* address formatter with custom theming to precisely control the display of addresses.
- Override the default language used for formatting addresses on multilingual sites.

#### [Zones and territories](05.zones-and-territories)
- TBD


[Address module]: https://www.drupal.org/project/address
