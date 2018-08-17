---
title: Overview
taxonomy:
    category: docs
---

How are addresses used in Drupal Commerce:

Usage of the address field type:
- Every store has an address. 'field_overrides' setting used to deactivate unnecessary properties like "given name".
- Each customer profile has an address. Do not change profile address field to multiple cardinality; only the first address will be used. For multiple addresses per customer (i.e., an address book), use multiple profiles.
- Taxes: address_zone_territory used and $zone->match($customer_address) to determine applicability.

Explanation of the address field type:

Each address can have the following properties:

Given name (First name)
Additional name (Middle name / Patronymic)
Family name (Last name)
Organization
Address line 1
Address line 2
Postal code
Sorting code
Dependent Locality (Neighborhood / Suburb)
Locality (City)
Administrative area (State / Province)
Country
 - note: country code is limited to available countries*
Property names follow the OASIS eXtensible Address Language (xAL) standard.

Field settings:
- langcode_override: available for multilingual sites; use this setting to ensure that entered addresses are always formatted in the same language.

- field_overrides: country-specific address formats are provided; use this setting to override those defaults by forcing specific fields to always be hidden, optional, or required.

Default widget: address_default

Default formatter: address_default
Additional formatter: address_plain

Explanation of the address form element:

AvailableCountriesTrait: allows field types to limit the available countries.


