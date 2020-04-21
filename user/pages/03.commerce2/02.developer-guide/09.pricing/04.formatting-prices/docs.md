---
title: Formatting prices
taxonomy:
    category: docs
---

The documentation page on [Prices](../prices) describes how a Price consists of a number and a currency code, both stored as strings. So, for example, suppose the total price for an order is "$464,230.13". That value would be stored in the database as "464230.130000" for the total price number and "USD" for the total price currency.

How exactly do we get from "464230.130000" and "USD" to the "$464,230.13" we see displayed in the order summary? 

***First***, we determine the correct *format* to use for the price. This is the job of the *Currency* and *Number format* [Repositories](#commerce-price-repositories). The *format* specifies things like how many digits to use for the fractional part of the price and which character to use to separate the fractional part and how the currency should be displayed.

* For example, the currency pattern for US dollars specifies that the '$' symbol prefixes the price number. The ',' character separates thousands from hundreds of dollars. And the '.' character separates the dollars from the cents, with exactly 2 digits displayed for the cents. So our price should be displayed as "$464,230.13", *not* "463 230,130 £".

***Second***, we apply that *Number format* to the raw price data. This is the job of the *Currency* and *Number* [Formatters](#commerce-price-formatters).

### Commerce Price repositories
The Commerce Price module's `CurrencyRepository` and `NumberFormatRepository` services provide the formats used by the `CurrencyFormatter` and `NumberFormatter` services.

#### Currency repository
The currency repository provides formats in the form of `CommerceGuys\Intl\Currency\Currency` value objects, loaded from the Currency entities that have been created for the site. See the [Currencies documentation](../currencies) for a list of the Currency configuration entity properties that are loaded into the value objects. In addition, the `locale` property is set based on the language of the Currency entity. The repository doesn't support loading currencies in a non-default locale, since it would be imprecise to map `$locale` to Drupal's languages.

#### Number format repository
The number format repository service constructs a `CommerceGuys\Intl\NumberFormat\NumberFormat` value object for a given locale. These value objects have the following properties:

| Property | ID | Description | Example value |
|----------|----|-------------|---------------|
| Locale   | locale | The locale. | `'en_US'` |
| Decimal pattern | decimal_pattern | The number pattern used to format decimal numbers. | `'#,##0.###'` |
| Percent pattern | percent_pattern | The number pattern used to format percentages. | `'#,##0%'` |
| Currency pattern | currency_pattern | The number pattern used to format currency amounts. | `'¤#,##0.00'` |
| Accounting currency pattern | accounting_currency_pattern | The number pattern used to format accounting currency amounts. | `'¤#,##0.00;(¤#,##0.00)'` |
| Numbering system | numbering_system |  The numbering system, one of Arabic-Indic, Extended Arabic-Indic, Bengali, Devanagari, or Latin. Default is Latin. | `'latn'` |
| Decimal separator | decimal_separator | The decimal separator. The default is `'.'`. | `','` |
| Grouping separator | grouping_separator | The grouping separator. The default is `','`. | `' '` |
| Plus sign | plus_sign | The plus sign. The default is `'+'`. | `'‎+‎'` |
| Minus sign | minus_sign | The minus sign. The default is `'+'`. | `'‎-‎'` |
| Percent sign | percent_sign | The percent sign. The default is `'%'`. | `'٪؜'` |

The number format definitions are specified directly in the `CommerceGuys\Intl\NumberFormat\NumberFormatRepository::getDefinitions()` method. For example, here is the definition for for the default 'en' locale:

```php
'en' => [
    'numbering_system' => 'latn',
    'decimal_pattern' => '#,##0.###',
    'percent_pattern' => '#,##0%',
    'currency_pattern' => '¤#,##0.00',
    'accounting_currency_pattern' => '¤#,##0.00;(¤#,##0.00)',
],
```

#### How can I alter the number format definition for a locale?
The `NumberFormatDefinitionEvent` event can be used to customize the number format definition for any locale. The event is dispatched by the Commerce Price `NumberFormatterRepository` service after the number format definition is proccessed by the `CommerceGuys\Intl\NumberFormat\NumberFormatterRepository` service.

For example, the format definition for the German (`'de'`) locale specifies that `','` should be used for the decimal separator, and `'.'` should be used for the grouping separator. Suppose you'd like to switch those for your site. Here's an example event subscriber that does that.

```php
<?php

namespace Drupal\custom_module\EventSubscriber;

use Drupal\commerce_price\Event\PriceEvents;
use Drupal\commerce_price\Event\NumberFormatDefinitionEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

/**
 * Modifies the number format definition for the 'de' locale
 */
class NumberFormatDefinitionEventSubscriber implements EventSubscriberInterface {

  public static function getSubscribedEvents() {
    $events[PriceEvents::NUMBER_FORMAT][] = ['onNumberFormat'];
    return $events;
  }

  public function onNumberFormat(NumberFormatDefinitionEvent $event) {
    $definition = $event->getDefinition();

    if ($definition['locale'] == 'de') {
	    $defintion['decimal_separator'] = '.';
	    $definition['grouping_separator' = ',';
	    $event->setDefinition($definition);
    }
  }

}
```

Don't forget to include a service definition for your Event Subscriber in your custom module's `services.yml` file and clear caches.

### Commerce Price formatters
The Commerce Price module's `CurrencyFormatter` and `NumberFormatter` services extend [Internationalization Library] services of the same names to provide better defaults. The locale is set to the current locale, based on the current country and language for the Drupal user. The default locale is `'en'`. And for the currency formatter, the maximum fraction digits is set to 6 (the storage max), and the rounding mode is set to `'none'`, to show prices as-is.

* The *Currency formatter* service is used by the *Default* and *Calculated* field formatters to display prices. (See the [Displaying prices documentation](../displaying-prices).) The Currency formatter uses both the Currency repository and the Number format repository.
* The *Number formatter* service is used by the *Number form element* to support language-specific input. The Number formatter uses only the Number format repository.  A raw number value, like "464230.130000", is formatted into the language-specific format on element display. It uses text for the form element instead of a number type to accept language-specific input, such as commas. During element validation the input is converted back into to the generic format, to allow the returned value to be stored.

Both formatters rely on the logic provided by the `CommerceGuys\Intl\Formatter\FormatterTrait` trait to format  numbers using locale-specific patterns.

[Internationalization Library]: https://github.com/commerceguys/intl
[commerceguys/intl]: https://github.com/commerceguys/intl
