---
title: Currency info hooks
taxonomy:
    category: docs
---

<ol>
<li><a href="#currency-info">hook_commerce_currency_info()</a></li>
<li><a href="#currency-info-alter">hook_commerce_currency_info_alter(&$currencies)</a></li>
</ol>

<a name="currency-info"> </a>
<h3>hook_commerce_currency_info()</h3>

Commerce module endeavors to define all legal currencies, so please <a href="http://drupal.org/project/issues/commerce">open an issue</a> if yours is missing.  However, modules can use this hook to add custom / site-specific currencies, such as user points or credits.

The currency data structure is as follows:

<ul>
<li><em>code</em> - the three letter currency code as defined by <a href="http://en.wikipedia.org/wiki/ISO_4217">ISO 4217</a></li>
<li>numeric_code - the three digit numeric code in string format with leading zeros</li>
<li>name - translatable full name of the currency in plural format</li>
<li>symbol - the symbol used to denote the currency if one exists</li>
<li>major_unit - the translatable name of the major currency unit in single format</li>
<li>minor_unit - the translatable name of the minor currency unit in single format</li>
<li>decimals - the number of decimals expressed when displaying the currency; defaults to 2</li>
<li>thousands_separator - the character used to denote thousands in the currency; defaults to ','</li>
<li>decimal_separator - the character used as a decimal marker in the currency; defaults to '.'</li>
<li>symbol_placement - 'before' or 'after' indicating where the symbol is placed in relation to the amount of a price when formatted for the currency; if not specified, the symbol will not be displayed</li>
<li>code_placement - like symbol_placement but used for displaying the currency code
<li>format_callback - function used for formatting a price in this currency for display; if not specified, the formatting will happen within commerce_currency_format()</li>
<li>conversion_rate - conversion rate of this currency calculated against the base currency, expressed as a decimal value denoting the value of one majur unit of this currency when converted to the base currency; defaults to 1</li>
</ul>

Example currency definition:

<?php
$currencies['USD'] = array(
  'code' => 'USD',
  'numeric_code' => '840',
  'name' => t('United States Dollars'),
  'symbol' => '$',
  'major_unit' => t('Dollar'),
  'minor_unit' => t('Cent'),
  'symbol_placement' => 'before',
);
?>

<a name="currency-info-alter"> </a>
<h3>hook_commerce_currency_info_alter(&$currencies)</h3>

Modules can use this hook to alter properties of any defined currencies. This hook should be used with extreme caution, as the currency code and decimals values of each currency are intimately tied into price field values.  Changing codes and decimals values may cause wide disruption of store price values, so such alterations should be made prior to setting prices and collecting orders and not after moving to production.

Additionally, because every currency's default conversion rate is 1, this hook can be used to populate currency conversion rates with meaningful values. Conversion rates can be calculated using any currency as the base currency as long as the same base currency is used for every rate.

A single currency array is referred to as $currency.
An array of currency arrays keyed by code is referred to as $currencies.
The code of a currency is referred to as $currency_code.