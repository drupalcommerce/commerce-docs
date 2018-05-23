---
title: Requirements
taxonomy:
    category: docs
---

 ### Requirements

 -Commerce 2.x requires Drupal 8.5.0 or newer.

 Unless you are building a very simple site, you will normally want to develop
 locally, on a copy of your site that operates separately from the live site.

 If you already have a web server, make sure it satisfies [Drupal 8’s requirements].
 The recommended memory limit is 256MB or more. For local development we recommend
 [DDEV] (Docker-based), [Drupal VM] (advanced users), or [Acquia Dev Desktop] (beginners). You will also need [Composer].


 ### PHP requirements

 Drupal Commerce requires that you have the [bcmath](http://php.net/manual/en/intro.bc.php) extension installed.

 If you are using DrupalVM, add the following to your configuration (change PHP version number if needed).

 ```
 php_packages_extra:
   - php7.1-bcmath
 ```
## Links and resources
* [Best Practice Drupal Development](https://drupalize.me/tutorial/best-practice-drupal-development)
* [Why must we use Composer?](https://glamanate.com/blog/managing-your-drupal-project-composer)


 [Drupal 8’s requirements]: https://www.drupal.org/requirements
 [DDEV]: https://www.drud.com/what-is-ddev/
 [Drupal VM]: http://www.drupalvm.com/
 [Acquia Dev Desktop]: https://www.acquia.com/products-services/dev-desktop
 [Composer]: https://getcomposer.org/doc/00-intro.md#installation-linux-unix-osx
