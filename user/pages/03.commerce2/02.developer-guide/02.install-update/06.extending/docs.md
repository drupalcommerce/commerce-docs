---
title: Extending
taxonomy:
    category: docs
---

One of the primary strengths of both Commerce and Drupal is that they are open
source projects. There is a large, active community of developers who
contribute to these and related projects. As a result, you will find that it's
easy to extend Commerce with freely available, "contributed" modules. And if
you can't find something to meet your needs, you can always create your own
modules as well. Contributed modules as well as extensive documentation about
extending your Drupal site can be found on [drupal.org]. A good place to start
is [Extending Drupal 8].

For Commerce, you can find everything from modules that provide major types of
functionality to smaller modules that provide unique, specialized functionality.
For example:

* [Commerce Shipping] makes it possible to ship physical products to your customers.
* [Commerce Recurring] makes it possible to provide subscriptions and recurring billing.

Extending your composer-managed site with additional modules is a
straightforward process. Each Drupal module has its own project page on
drupal.org with information and instructions. To add a module using composer,
the command is:

```bash
composer require drupal/commerce_shipping --prefer-dist
```

Where `commerce_shipping` is the name of the module you want to add to your
project. Composer will add the module as well as all of its dependencies.

Then you can install the module using the Admin UI (`/admin/modules`) or Drupal console:

The instructions below use [Drupal Console]

```bash
drupal module:install commerce_shipping
```

### Adding custom modules from GitHub

Many Drupal developers use [GitHub] for their initial module development work. So you may find that a module you'd like to use to extend your site is available on GitHub but not on Drupal.org. So how do you add that custom module to your composer-managed site? You can use [Composer Installers], a multi-framework composer library installer. Please see [How to download a module hosted on GitHub via composer.json?] on Drupal Answers for a good example of how to do this.

If you are developing custom modules locally yourself, see [Managing dependencies for a custom product] for an explanation of using Composer to manage your dependencies.

[drupal.org]: https://www.drupal.org
[Extending Drupal 8]: https://www.drupal.org/docs/8/extending-drupal-8
[Commerce Shipping]: https://www.drupal.org/project/commerce_shipping
[Commerce Recurring]: https://www.drupal.org/project/commerce_recurring
[Commerce Variation Cart Form]: https://www.drupal.org/project/commerce_variation_cart_form
[GitHub]: https://github.com/
[Composer Installers]: https://github.com/composer/installers
[How to download a module hosted on GitHub via composer.json?]: https://drupal.stackexchange.com/questions/243581/how-to-download-a-module-hosted-on-github-via-composer-json
[Managing dependencies for a custom product]: https://www.drupal.org/docs/develop/using-composer/managing-dependencies-for-a-custom-project
