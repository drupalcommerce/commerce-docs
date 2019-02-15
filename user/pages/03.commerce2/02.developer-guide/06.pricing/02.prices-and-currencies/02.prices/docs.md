---
title: Prices
taxonomy:
    category: docs
---

Drupal Commerce provides a custom *Price* field that has the following properties:
* Number: a decimal number, stored as a string.
* Currency code: a three letter currency code, stored as a string.

### What is a *number format*?
Number formats are used both for rendering the display of prices and for validating price data entered into forms. Number formats are defined on a per-locale basis. The default locale is 'en' (English). Number formats can include the following information:
* Decimal separator (comma)
* Grouping separator (space)
* Currency pattern ('¤#,##0.00')
* Accounting currency pattern ('¤#,##0.00;(¤#,##0.00)')
* Numbering system (eg. 'latn')
* Plus sign (eg '+')
* Minus sign (eg '-')
* Percent sign (eg '٪')

Complete list here: `CommerceGuys\Intl\NumberFormat\NumberFormatRepository`


#### How can I alter the number format definition for a locale?
Implement event subscriber for the `PriceEvents::NUMBER_FORMAT` event.

PriceItem field type has 3 formatters (see formatting prices section) and 2 widgets

Calculator service: helpers for bemath-based arithmetic. Link to bcmath extension. Drupal Commerce requires that you have the bcmath extension installed. http://php.net/manual/en/intro.bc.php
See the [Requirements](../../../02.install-update/01.requirements) documentation page.

Price object has two string properties: number and currency. Methods:
fromArray()
toString()
toArray()
convert() converts price to new currency, given rate and new currency code
math functions using Calculator service.

Rounder service:
roung($price, $mode) -- default mode is round half up. See interface documentation for all mode options, based on php round() function.

#### Section on price data entry
## Custom form elements
commerce_number form element supports language-specific input
- uses text instead of number type to accept language-specific input, such as commas
- provides placeholder value, 9.99, formatted w/ NumberFormatter service

See input.html.twig
Describe NumberFormatter service

commerce_price form element uses commerce_number as well as currency input

2 widgets: price, list_price (includes checkbox to use)

events:
NumberFormatDefinition
PriceEvents: NUMBER_FORMAT ?

repositories -- explain like address module
CurrencyRepository, NumberFormatRepository

### Links and resources:
* 
