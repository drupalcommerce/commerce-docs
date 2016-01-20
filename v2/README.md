# Commerce 2.x Documentation

At its core, Commerce is a set of Drupal 8 modules, which in turn depend on other best-of-breed modules and libraries.

## Drupal modules

The following Drupal contrib modules are used:

* [Address](https://drupal.org/project/address) - Provides functionality for storing, validating and displaying international postal addresses.   
* [Entity](https://drupal.org/project/entity) - Extends Drupal 8's entity API with additional features.
* [State Machine](https://drupal.org/project/state_machine) - Provides code-driven workflow functionality.
* [Inline Entity Form](https://drupal.org/project/inline_entity_form) - Provides a widget for inline management of referenced entities.
* [Profile](https://drupal.org/project/profile) - Provides configurable user profiles, used for customer profiles.

## PHP libraries

The following PHP libraries are used:

* [commerceguys/intl](https://github.com/commerceguys/intl) - An internationalization library powered by CLDR data. Handles currencies, currency formatting, and more.
* [commerceguys/addressing](https://github.com/commerceguys/addressing) - An addressing library, powered by Google's dataset. Stores and manipulates postal addresses.
* [commerceguys/zone](https://github.com/commerceguys/zone) - A zone library. Zones are territorial groupings mostly used for shipping or tax purposes.
* [commerceguys/tax](https://github.com/commerceguys/tax) - A tax library with a flexible data model, predefined tax rates, powerful resolving logic.

## Recommended Tools

The [Drupal Console](https://drupalconsole.com/) command-line tool.
