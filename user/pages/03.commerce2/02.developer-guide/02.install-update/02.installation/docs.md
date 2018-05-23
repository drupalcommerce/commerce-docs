---
title: Installing
taxonomy:
    category: docs
---

**Installing Commerce to contribute back?** Check out our [Getting ready for development](../../01.contributing/01.setup-local-environment) guide.

Be sure to [Review Requirements](../01.requirements) before starting the installation process.


 ## New site

 The following command will download Drupal 8 + Commerce 2.x with all
 dependencies to the `mystore` folder:

 ```bash
 composer create-project drupalcommerce/project-base mystore --stability dev
 ```

 Install it just like a regular Drupal site. Commerce will be
 automatically enabled for you.

 Tips:

   The `bin` folder contains [Drupal Console] binary.
   The `web` folder represents the document root.
   Composer commands are always run from the site root (`mystore` in this case).
   Downloading additional modules:   `composer require "drupal/devel:1.x-dev"`
   Updating an existing module: `composer update drupal/address -–with-dependencies`

 See the `project-base README`_ for more details.

 ## Existing site

 Run these commands in the root of your website:

 #### Download Commerce

 This will also download the required libraries and modules (Address, Entity, State Machine, Inline Entity Form, Profile).

 ```bash
 cd /path/to/drupal8
 composer require "drupal/commerce"
 ```

 #### Enable Commerce

 The instructions below use [Drupal Console]

 ```bash
 drupal module:install commerce_product commerce_checkout commerce_cart
 ```

 [Drupal Console]: https://drupalconsole.com
 [project-base README]: https://github.com/drupalcommerce/project-base/blob/8.x/README.md
