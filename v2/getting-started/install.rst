Installing
==========

    **Installing Commerce to contribute back?** Check out our
    `installation instructions for contributors`_.

Requirements
------------

Commerce 2.x requires Drupal 8.2.0 or newer.

| If you already have a web server, make sure it satisfies `Drupal 8’s
  requirements`_.
| The recommended memory limit is 256MB or more.

| For local development we recommend `Drupal VM`_ (advanced users) or
  `Acquia Dev Desktop`_ (beginners).
| You will also need `Composer`_.

`Why must we use Composer?`_

New site
--------

The following command will download Drupal 8 + Commerce 2.x with all
dependencies to the ``mystore`` folder:

::

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
-  Updating an existing module: ``composer update drupal/address``
   –with-dependencies

See the `project-base README`_ for more details.

Existing site
-------------

Run these commands in the root of your website:

#. Add the Drupal Packagist repository

``sh  composer config repositories.drupal composer https://packages.drupal.org/8``

This allows Composer to find Commerce and the other Drupal modules.

#. Download Commerce

``sh  composer require "drupal/commerce 2.x-dev"``

This will also download the required libraries and modules (Address,
Entity, State Machine, Inline Entity Form, Profile).

#. Enable Commerce (instructions below use `Drupal Console`_)

``sh  drupal module:install commerce_product commerce_checkout commerce_cart commerce_tax``

.. _installation instructions for contributors: contributing/getting-started.html
.. _Drupal 8’s requirements: https://www.drupal.org/requirements
.. _Drupal VM: http://www.drupalvm.com/
.. _Acquia Dev Desktop: https://www.acquia.com/products-services/dev-desktop
.. _Composer: https://getcomposer.org/doc/00-intro.rst#installation-linux-unix-osx
.. _Why must we use Composer?: https://bojanz.wordpress.com/2015/09/18/d8-composer-definitive-intro/
.. _Drupal Console: https://drupalconsole.com
.. _project-base README: https://github.com/drupalcommerce/project-base/blob/8.x/README.rst
