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

This is a dependency and once you have successfully installed commerce,
you will have the address module available. See `Installation
Instructions for Commerce 2.x`_.

Configure and Customize
-----------------------

|Address Module location|

To configure or customize address formats, navigate to the Configuration
page (1) and click on (2) “Address Formats” under “Regional and
Language”.

.. code-block:: terminal

    admin/config/regional/address-formats

|Address Module landing page|

The landing page for the address module shows all the default
configurations by country. You can edit the postal formatting (order of
fields, locality dependencies, and many many other things) just by
clicking “Edit.”

|Address Module format configuration|

The default values are based on an opensource 3rd party that has the
best coverage of all regions in the world. The formatting of the
addresses is for both the form and the display.

More information on Address formats
-----------------------------------

|Address Module Example|

Each country has a different address format that tells us:

-  Which fields are used in which order (Is there a state field? Does
   the zip code come before the city? After the state?)
-  Which fields are required
-  Which fields need to be uppercased for the actual mailing to
   facilitate automated sorting of mail
-  The labels for the administrative area (state, province, parish,
   etc.), and the postal code (Postal code or ZIP code)
-  Validation rules for postal codes, usually in the form of a regular
   expression.

In countries using a non-latin script (such as China, Taiwan, Korea),
the order of fields varies based on the language/script used. Addresses
written in latin script follow the minor-to-major order (start with the
street, end with the country) while addresses written in the chinese scr

.. _Address Drupal Module: https://www.drupal.org/project/address
.. _Addressing library: https://github.com/commerceguys/addressing
.. _Address Commerce 2.x Story: https://drupalcommerce.org/blog/16864/commerce-2x-stories-addressing
.. _addressfield module: https://drupal.org/project/addressfield
.. _Address 1.x module: https://www.drupal.org/project/address
.. _commerceguys/addressing: https://github.com/commerceguys/addressing
.. _Installation Instructions for Commerce 2.x: ../../install.rst

.. |Address Module location| image:: images/address-configure.png
.. |Address Module landing page| image:: images/address-landingpage.png
.. |Address Module format configuration| image:: images/address-configureformat.png
.. |Address Module Example| image:: images/address-brazil.png
