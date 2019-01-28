---
title: Prices
taxonomy:
    category: docs
---

### Overview
commerce_price field:
number (string)
currency_code (string)

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
commerce_number form element supports language-specific imput
- uses text instead of number type to accept language-specific input, such as commas
- provides placeholder value, 9.99, formatted w/ NumberFormatter service

See imput.html.twig
Describe NumberFormatter service

commerce_price form element uses commerce_number as well as currency input

2 widgets: price, list_price (includes checkbox to use)

events:
NumberFormatDefinition
PriceEvents: NUMBER_FORMAT ?

repostitories -- explain like address module
CurrencyRepository, NumberFormatRepository

### Links and resources:
* 
