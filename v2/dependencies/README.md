# Drupal Commerce 2.x Requirements

Drupal 8 is all about getting off the Drupal island, so Drupal Commerce has abstracted of the core of Drupal Commerce into more multi-purpose Drupal modules and PHP Libraries. The [installation instructions](../install.md) include all of the following.

## Dependencies

Commerce 2 makes use of the following Drupal modules:

* [Address](https://drupal.org/project/address) - Provides Drupal integration for PHP libraries [commerceguys/addressing](https://github.com/commerceguys/addressing) and [commerceguys/zone](https://github.com/commerceguys/zone).
* [Entity](https://drupal.org/project/entity) - This module extends the entity API of Drupal core in order to provide a unified way to deal with entities and their properties.
* [State Machine](https://drupal.org/project/state_machine) - Provides code-driven workflow functionality.
* [Inline Entity Form](https://drupal.org/project/inline_entity_form) - Provides a widget for inline management (creation, modification, removal) of referenced entities.
* [Profile](https://drupal.org/project/profile) - Provides configurable user profiles, used for customer profiles.
* [Composer Manager](https://drupal.org/project/composer_manager) - Allows contributed modules to depend on PHP libraries managed via Composer.

## PHP Libraries

The following PHP Libraries are used in Commerce 2 (yes, other platforms can now use large portions of what makes Drupal Commerce awesome!):

* [Intl](https://github.com/commerceguys/intl) - An internationalization library powered by CLDR data. Handles currencies, currency formatting, and more.
* [Addressing](https://github.com/commerceguys/addressing) - An addressing library, powered by Google's dataset. Stores and manipulates postal addresses, meant to identify a precise recipient location for shipping or billing purposes.
* [Zone](https://github.com/commerceguys/zone) - A zone library. Zones are territorial groupings mostly used for shipping or tax purposes.
* [Tax](https://github.com/commerceguys/tax) - A tax library with a flexible data model, predefined tax rates, powerful resolving logic.
* [Pricing](https://github.com/commerceguys/pricing) - A component for managing prices, taxes, discounts, fees.

Libraries must be installed via Composer ([Why must we use Composer?](https://bojanz.wordpress.com/2015/09/18/d8-composer-definitive-intro/) [How do I install it?](https://getcomposer.org/doc/00-intro.md)). 

## Recommended Tools

The command-line tool [Drupal Console](https://drupalconsole.com/) is used for documentation and general best practice.
