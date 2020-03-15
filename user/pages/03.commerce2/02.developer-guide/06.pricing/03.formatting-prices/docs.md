---
title: Formatting prices
taxonomy:
    category: docs
---

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

There are various ways to display prices. Drupal Commerce provides several price field formatters and a Twig filter.

## Rendering prices in Twig.

There is the `commerce_price_format` Twig filter which renders a given Price value object based on its currency definition. Here is an example of using the Twig filter by utilizing the `inline_template` element type.

```
$element['price'] = [
  '#type' => 'inline_template',
  '#template' => '{{ price|commerce_price_format }}',
  '#context' => [
    'price' => new \Drupal\commerce_price\Price('10.25', 'USD'),
  ],
];
```

This would render as $10.25.

This Twig filter can be used on both Price objects and arrays with `number` and `currency_code` keys.
Uses the currency formatter service. Link to currency formatter service in currencies doc.


## Field formatters
### Plain

Prints the price using the `commerce_price_plain` theme hook. Resembles `10.25 USD`. Can be useful for exported data (CSV).

### Default

Uses the number formatter service to return marked up output. Same output as Twig filter.

### Calculated price

Returns price formatted for its currency, however it uses price resolving and can take into consideration other adjustments (promotions.)