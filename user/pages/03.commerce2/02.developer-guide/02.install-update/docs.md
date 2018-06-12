---
title: Installation and updates
taxonomy:
    category: docs
---
##Before you begin

If you are not familiar with using [Composer to manage Drupal dependencies](https://www.drupal.org/docs/develop/using-composer/using-composer-with-drupal), read [Using Composer with Drupal](../../01.getting-started/01.using-composer) before continuing. Since you are already using the command line, we recommend you use [Drush](http://www.drush.org/) or [Drupal console](https://drupalconsole.com/) for various site management operations.

If you want to avoid using Composer for site management, the [Ludwig module](https://www.drupal.org/project/ludwig) offers a manual alternative to Composer. In the [Installing section](02.installation/), we document Ludwig installation; however, most of the documentation assumes that you will be using Composer to manage your site. If you do decide to use Ludwig instead of Composer, please be aware that updating and maintaining your site will be more difficult. Site administrators using Ludwig need to be careful when combining modules that depend on external libraries, since there are no safeguards against incompatible library versions or overlapping requirements.
