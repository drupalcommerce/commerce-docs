Address
==============

See Also: `Address Drupal Module`_   \|   `Addressing library`_   \|
`Address Commerce 2.x Story`_

For the addressing needs of Commerce 1.x the `addressfield module`_ was
created. It stores addresses using the xNAL standard, accommodates both
name and address data, and provides per-country address forms.

It was a good first try, but we can do better.

Commerce 2.x will depend on the `Address 1.x module`_, which will pull
in the `commerceguys/addressing`_ library, store the address formats and
subdivisions as configuration entities, and use them to generate and
validate Drupal forms.

We gain a much richer dataset and greatly improved support for countries
such as China, Korea, Brazil, and others. Best of all, our efforts
benefit the whole wider PHP community.

Installation
------------

This is a dependency of Drupal Commerce. Once you have successfully installed Drupal Commerce,
you will have the address module and its dependent PHP libraries. See :doc:`Installation
Instructions for Commerce 2.x <../getting-started/install>`.

Zones
-----

Zones are territorial groupings mostly used for shipping or tax purposes. For
example, a set of shipping rates associated with a zone where the rates become
available only if the customer’s address matches the zone. They are powered by the `zone library`_.

A zone can match other zones, countries, subdivisions (states/provinces/municipalities),
postal codes. Postal codes can also be expressed using ranges or regular expressions.

Examples of zones:

-  California and Nevada
-  Belgium, Netherlands, Luxemburg
-  European Union
-  Germany and a set of Austrian postal codes (6691, 6991, 6992, 6993)
-  Austria without specific postal codes (6691, 6991, 6992, 6993)

To locate Zones in your Commerce install, (1) click on Configuration and (2) click on Zones:

|Navigate to zones|

Each zone consists of zone members, which represent conditions that can be matched.
For example, a “France and Germany” zone would have two zone members: 1) France
2) Germany and an address would match that zone if it matches one of those two
zone members.

.. _Zone Library: https://github.com/commerceguys/zone
.. _Addressing Library: https://github.com/commerceguys/addressing
.. _Address Drupal Module: https://www.drupal.org/project/address

.. |Navigate to zones| image:: images/zones-navigate.png

.. _Address Drupal Module: https://www.drupal.org/project/address
.. _Addressing library: https://github.com/commerceguys/addressing
.. _Address Commerce 2.x Story: https://drupalcommerce.org/blog/16864/commerce-2x-stories-addressing
.. _addressfield module: https://drupal.org/project/addressfield
.. _Address 1.x module: https://www.drupal.org/project/address
.. _commerceguys/addressing: https://github.com/commerceguys/addressing
