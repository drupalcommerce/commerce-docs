Address Module
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

Install
-------

This is a dependency and once you have successfully installed Drupal Commerce,
you will have the address module available. See `Installation
Instructions for Commerce 2.x`_.

.. _Address Drupal Module: https://www.drupal.org/project/address
.. _Addressing library: https://github.com/commerceguys/addressing
.. _Address Commerce 2.x Story: https://drupalcommerce.org/blog/16864/commerce-2x-stories-addressing
.. _addressfield module: https://drupal.org/project/addressfield
.. _Address 1.x module: https://www.drupal.org/project/address
.. _commerceguys/addressing: https://github.com/commerceguys/addressing
.. _Installation Instructions for Commerce 2.x: ../../install.rst
