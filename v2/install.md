# Installing

## Requirements

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
- Downloading additional modules: `composer require "drupal/devel:8.1.x-dev"` <br>
- Updating an existing module: `composer update drupal/address`

See the [project-base README](https://github.com/drupalcommerce/project-base/blob/8.x/README.md) for more details.

## Existing site

Download Commerce and its Drupal dependencies manually, then use [Composer Manager](https://drupal.org/project/composer_manager) to download the libraries.

The instructions below use [Drupal Console](https://drupalconsole.com). 

1. Download the modules

 ```sh
 drupal module:download commerce;
 drupal module:download address;
 drupal module:download entity
 drupal module:download state_machine;
 drupal module:download inline_entity_form;
 drupal module:download profile;
 ```

2. Initialize Composer Manager and download the libraries

 ```sh
 drupal module:download composer_manager;
 php modules/contrib/composer_manager/scripts/init.php;
 composer drupal-update;
 composer dump-autoload;
 ```

  For more information see the [Composer Manager documentation](https://www.drupal.org/node/2405811).

3. Enable Commerce

 ```sh
 drupal module:install commerce_product commerce_order commerce_cart commerce_tax
 ```
