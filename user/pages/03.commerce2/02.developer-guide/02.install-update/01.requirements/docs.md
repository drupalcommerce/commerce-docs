---
title: Requirements
taxonomy:
    category: docs
---

 ### Requirements

 - Commerce 2.x currently requires Drupal 8.5.0 or newer. Generally we require each minor release, as it contains improvements that we use, or to reduce our code base.

 - If you already have a web server, make sure it satisfies [Drupal 8’s requirements].
 The recommended memory limit is 256MB or more.

 - To properly take advantage of [Drupal's configuration management system], you should always develop locally. For local development we recommend
 [DDEV] (Docker-based) or [Drupal VM] (Vagrant-based). You will also need [Composer].


 ### PHP requirements

 - Drupal Commerce requires that you have the [bcmath](http://php.net/manual/en/intro.bc.php) extension installed.

 - If you are using Drupal VM, add the following to your configuration (change PHP version number if needed).

 ```
 php_packages_extra:
   - php7.1-bcmath
 ```
 - If you are having issues related to the bcmatch extension, the [Drupal VM documentation] provides useful information.

### Links and resources
* [Best Practice Drupal Development](https://drupalize.me/tutorial/best-practice-drupal-development)
* [Why must we use Composer?](https://glamanate.com/blog/managing-your-drupal-project-composer)


 [Drupal 8’s requirements]: https://www.drupal.org/requirements
 [DDEV]: https://www.drud.com/what-is-ddev/
 [Drupal VM]: http://www.drupalvm.com/
 [Acquia Dev Desktop]: https://www.acquia.com/products-services/dev-desktop
 [Composer]: https://getcomposer.org/doc/00-intro.md#installation-linux-unix-osx
 [Drupal's configuration management system]: https://www.drupal.org/docs/8/configuration-management/managing-your-sites-configuration
 [Drupal VM documentation]: https://github.com/geerlingguy/drupal-vm/search?q=bcmath&type=Issues
