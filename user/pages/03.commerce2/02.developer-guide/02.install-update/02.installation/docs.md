---
title: Installing
taxonomy:
    category: docs
---

There are two ways to install Drupal Commerce. You can do it from scratch by installing Drupal 7 and then enabling the Commerce modules and their dependencies. This process requires additional configuration of products and product displays before you can start selling through your site.  However, it does afford you a greater measure of control over how exactly items are setup from the beginning.

An easier way to install Drupal Commerce would be to use an installation profile that enables and configures the Commerce modules and components for you.  The primary starter installation profile is <a href="http://drupal.org/project/commerce_kickstart">Commerce Kickstart</a>, but a major goal for the project is to see additional installation profiles tailor the initial configuration toward specific markets and business models.

Refer to the section below for your preferred method of installation.

**Installing Commerce to contribute back?** Check out our [Getting ready for development](../04.contributing/01.development-environment) guide.

Requirements

 -Commerce 2.x requires Drupal 8.3.0 or newer.
 
 If you already have a web server, make sure it satisfies [Drupal 8’s requirements].
 The recommended memory limit is 256MB or more. For local development we recommend
 [Drupal VM] (advanced users) or [Acquia Dev Desktop] (beginners). You will also need [Composer].
 
 [Why must we use Composer?]
 
 ### PHP requirements
 
 Drupal Commerce requires that you have the [bcmath](http://php.net/manual/en/intro.bc.php) extension installed. 
 
 If you are using DrupalVM, add the following to your configuration.
 
 ```
 extra_packages:
    php-bcmath
 ```
 
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
 
 [Drupal 8’s requirements]: https://www.drupal.org/requirements
 [Drupal VM]: http://www.drupalvm.com/
 [Acquia Dev Desktop]: https://www.acquia.com/products-services/dev-desktop
 [Composer]: https://getcomposer.org/doc/00-intro.rst#installation-linux-unix-osx
 [Why must we use Composer?]: https://bojanz.wordpress.com/2015/09/18/d8-composer-definitive-intro/
 [Drupal Console]: https://drupalconsole.com
 [project-base README]: https://github.com/drupalcommerce/project-base/blob/8.x/README.md