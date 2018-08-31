---
title: Address module
taxonomy:
    category: docs
---

The Address module provides functionality for storing, validating, and displaying international postal addresses. On eCommerce sites in general, when going through checkout customers are often annoyed by US-centric address forms. When interviewed about cart abandonment, this topic comes up time and time again. In Drupal Commerce, that *Address* module solves this problem by providing country-specific address forms to customers along with the capability to display the addresses properly for shipping or billing purposes.

#### [Address formats](01.address-formats)
- Structure of addresses, ways to customize
- Create a custom address field by repurposing an unused one.

#### [Countries and subdivisions](02.countries-and-subdivisions)
- Modify the list of available countries and set the default country for customers.
- Add or modify subdivisions for a country.

#### [Address entry](03.address-entry)
- Override address field settings. ()
- Customize address form fields.
- TBD: use an external service for postal code validation.

#### [Address display](04.address-display)
- How to customize display of addresses

#### [Zones and territories](05.zones-and-territories)
- TBD

#### TBD

TBD:
- events: SubdivisionsEvent
- functionality of FieldHelper, LabelHelper

issues to check on once written:
2838457
2514126
2971971
2596553
2912629 - pretty field formatter
