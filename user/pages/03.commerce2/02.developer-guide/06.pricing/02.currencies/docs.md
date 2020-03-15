---
title: Currencies
taxonomy:
    category: docs
---

### Overview

Commerce without borders means we support every language and every
denomination of currency. This is a big undertaking because not only do
we need to support various currencies, we need to support their regional
formatting rules, what each currency is called in every other language,
and many other difficult problems.

Commerce 2’s currency support is built upon the [commerceguys/intl]
library which provides a list of currencies, currency formatting,
countries, and languages. This list in not something we cooked up on the
back of a napkin, the intl library uses the internationally-recognized
standard of [CLDR] data. We parse the CLDR definitions into our own
more compact YAML definitions and use them to re-implement intl’s
NumberFormatter and provide currency, country, language data.

![Currency Landing Page](../../images/currency-landingpage.png)

For instructions on managing currencies, see the [Adding a currency](../../../../03.user-guide/02.setting-up-store/01.importing-currencies) page in the [Drupal Commerce User guide](../../../../03.user-guide).

When the price module is installed, the currency importer service is used to import a default currency based on the site's default country (or US if not set). When new languages are installed, the currency importer service is used to import currency translations.

CurrencyImporter service:
getImportable()
import($currency_code)
importByCountry($country_code)
importTranslations($langcodes)

###Currency config entity
currencyCode: string
name: label
numericCode: string
symbol: label
fractionDigits: integer

CurrencyFormatter service extends the intl version:
format($number, $currencyCode, $options = []);
returns a string or false
parse($number, $currencyCode, $options = []); --> use for input widgets

### Links and resources:
* [Internationalization Commerce Story]
* [Internationalization Library]

[CLDR]: http://cldr.unicode.org/
[Internationalization Commerce Story]: https://drupalcommerce.org/blog/15916/commerce-2x-stories-internationalization
[Internationalization Library]: https://github.com/commerceguys/intl
[commerceguys/intl]: https://github.com/commerceguys/intl