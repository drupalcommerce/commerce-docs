---
title: Currencies
taxonomy:
    category: docs
---

See Also: [Internationalization Commerce Story] | [Internationalization Library]

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

![Currency Landing Page](currency-landingpage.png)


[Internationalization Commerce Story]: https://drupalcommerce.org/blog/15916/commerce-2x-stories-internationalization
[Internationalization Library]: https://github.com/commerceguys/intl
[commerceguys/intl]: https://github.com/commerceguys/intl
