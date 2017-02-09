Commerce 2.x
============

At its core, Commerce is a set of Drupal 8 modules, which in turn depend
on other best-of-breed modules and libraries.

Drupal modules
--------------

The following Drupal contrib modules are used:

-  `Address`_ - Provides functionality for storing, validating and
   displaying international postal addresses.
-  `Entity`_ - Extends Drupal 8’s entity API with additional features.
-  `State Machine`_ - Provides code-driven workflow functionality.
-  `Inline Entity Form`_ - Provides a widget for inline management of
   referenced entities.
-  `Profile`_ - Provides configurable user profiles, used for customer
   profiles.

PHP libraries
-------------

The following PHP libraries are used:

-  `commerceguys/intl`_ - An internationalization library powered by
   CLDR data. Handles currencies, currency formatting, and more.
-  `commerceguys/addressing`_ - An addressing library, powered by
   Google’s dataset. Stores and manipulates postal addresses.
-  `commerceguys/zone`_ - A zone library. Zones are territorial
   groupings mostly used for shipping or tax purposes.
-  `commerceguys/tax`_ - A tax library with a flexible data model,
   predefined tax rates, powerful resolving logic.

Recommended Tools
-----------------

The `Drupal Console`_ command-line tool.

.. _Address: https://drupal.org/project/address
.. _Entity: https://drupal.org/project/entity
.. _State Machine: https://drupal.org/project/state_machine
.. _Inline Entity Form: https://drupal.org/project/inline_entity_form
.. _Profile: https://drupal.org/project/profile
.. _commerceguys/intl: https://github.com/commerceguys/intl
.. _commerceguys/addressing: https://github.com/commerceguys/addressing
.. _commerceguys/zone: https://github.com/commerceguys/zone
.. _commerceguys/tax: https://github.com/commerceguys/tax
.. _Drupal Console: https://drupalconsole.com/

.. toctree::
   :maxdepth: 1
   :hidden:

   getting-started/index
   building-blocks/index
   store
   product/index
   product/catalog-and-product-pages
   using-promotions
   orders/index
   checkout/index
   payments/index
   recipes/index
