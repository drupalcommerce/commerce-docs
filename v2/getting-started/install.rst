Installing
==========

    **Installing Commerce to contribute back?** Check out our
    :doc:`contributing/development-environment`.

Requirements
------------

Commerce 2.x requires Drupal 8.3.0 or newer.

If you already have a web server, make sure it satisfies `Drupal 8’s requirements`_.
The recommended memory limit is 256MB or more. For local development we recommend
`Drupal VM`_ (advanced users) or `Acquia Dev Desktop`_ (beginners). You will also need `Composer`_.

`Why must we use Composer?`_

New site
--------

The following command will download Drupal 8 + Commerce 2.x with all
dependencies to the ``mystore`` folder:

.. code-block:: terminal

    composer create-project drupalcommerce/project-base mystore --stability dev

Install it just like a regular Drupal site. Commerce will be
automatically enabled for you.

Tips:

-  The ``bin`` folder contains `Drupal Console`_.
-  The ``web`` folder represents the document root.
-  Composer commands are always run from the site root (``mystore`` in
   this case).
-  Downloading additional modules:
   ``composer require "drupal/devel:1.x-dev"``
-  Updating an existing module: ``composer update drupal/address -–with-dependencies``

See the `project-base README`_ for more details.

Existing site
-------------

Run these commands in the root of your website:

Download Commerce
#################

This will also download the required libraries and modules (Address,
Entity, State Machine, Inline Entity Form, Profile).

.. code-block:: terminal

    composer require "drupal/commerce 2.x-dev"

Enable Commerce (instructions below use `Drupal Console`_)
##########################################################

.. code-block:: terminal

    drupal module:install commerce_product commerce_checkout commerce_cart

.. _Drupal 8’s requirements: https://www.drupal.org/requirements
.. _Drupal VM: http://www.drupalvm.com/
.. _Acquia Dev Desktop: https://www.acquia.com/products-services/dev-desktop
.. _Composer: https://getcomposer.org/doc/00-intro.rst#installation-linux-unix-osx
.. _Why must we use Composer?: https://bojanz.wordpress.com/2015/09/18/d8-composer-definitive-intro/
.. _Drupal Console: https://drupalconsole.com
.. _project-base README: https://github.com/drupalcommerce/project-base/blob/8.x/README.md
