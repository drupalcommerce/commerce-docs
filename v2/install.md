# Installing

> **Installing Commerce to contribute back?** Check out our [installation instructions for contributors](contributing/getting-started.html).

## Requirements

Commerce 2.x requires Drupal 8.1.0 or newer.

If you already have a web server, make sure it satisfies [Drupal 8's requirements](https://www.drupal.org/requirements). <br>
The recommended memory limit is 256MB or more.

For local development we recommend [Drupal VM](http://www.drupalvm.com/) (advanced users) or [Acquia Dev Desktop](https://www.acquia.com/products-services/dev-desktop) (beginners). <br>
You will also need [Composer](https://getcomposer.org/doc/00-intro.md#installation-linux-unix-osx).

[Why must we use Composer?](https://bojanz.wordpress.com/2015/09/18/d8-composer-definitive-intro/)

## New site

The following command will download Drupal 8 + Commerce 2.x with all dependencies to the `mystore` folder:

    composer create-project drupalcommerce/project-base mystore --stability dev

Install it just like a regular Drupal site. Commerce will be automatically enabled for you.

Tips:

- The `vendor/bin` folder contains [Drupal Console](https://drupalconsole.com). <br>
- The `web` folder represents the document root. <br>
- Composer commands are always run from the site root (`mystore` in this case). <br>
- Downloading additional modules: `composer require "drupal/devel:1.x-dev"` <br>
- Updating an existing module: `composer update drupal/address` --with-dependencies

See the [project-base README](https://github.com/drupalcommerce/project-base/blob/8.x/README.md) for more details.

## Existing site

Run these commands in the root of your website:

1. Add the Drupal Packagist repository

 ```sh
 composer config repositories.drupal composer https://packages.drupal.org/8
 ```

 This allows Composer to find Commerce and the other Drupal modules.

2. Download Commerce

 ```sh
 composer require "drupal/commerce 2.x-dev"
 ```

 This will also download the required libraries and modules (Address, Entity, State Machine, Inline Entity Form, Profile).

3. Enable Commerce (instructions below use [Drupal Console](https://drupalconsole.com))

 ```sh
 drupal module:install commerce_product commerce_checkout commerce_cart commerce_tax
 ```
