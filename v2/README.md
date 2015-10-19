# Commerce 2.x Documentation

Commerce is an open source eCommerce framework that is designed to enable flexible eCommerce for websites and applications based on Drupal.

## Table of Contents

* [Contributing](contributing/README.md)
  * [Setting up the environment](contributing/environment.md)
  * [Executing the automated tests](contributing/testing.md)
  * [Developing](contributing/start_developing.md)
* [Installing](install.md)
* [Getting Started](getting-started.md)
* [Dependencies](dependencies/README.md)
  * [Address](dependencies/address/README.md)
    * [Zones](dependencies/address/zones.md)
  * [Profile](dependencies/profile.md)
  * [Inline Entity Form](dependencies/ief.md)
* [Currency](currency.md)
* [Store](store.md)
* [Product](product/README.md)

## External PHP Libraries

For the 2.x branch of Commerce, Commerce Guys has moved some of the logic
out of the Drupal world and into the greater PHP community.

###[Intl](https://github.com/commerceguys/intl)

An internationalization library powered by CLDR data.
Handles currencies, currency formatting, and more.

###[Addressing](https://github.com/commerceguys/addressing)

An addressing library, powered by Google's dataset.
Stores and manipulates postal addresses, meant to identify a precise recipient location for shipping or billing purposes.

###[Zone](https://github.com/commerceguys/zone)

A zone library. Zones are territorial groupings mostly used for shipping or tax purposes.

###[Tax](https://github.com/commerceguys/tax)

A tax library with a flexible data model, predefined tax rates, powerful resolving logic.

###[Pricing](https://github.com/commerceguys/pricing)

A component for managing prices, taxes, discounts, fees.

## Maintainers

Maintained by [Ryan Szrama](https://www.drupal.org/u/rszrama) and
[Bojan Zivanovic](https://www.drupal.org/u/bojanz) of
[Commerce Guys](http://commerceguys.com/).