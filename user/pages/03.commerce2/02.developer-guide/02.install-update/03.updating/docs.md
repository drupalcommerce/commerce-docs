---
title: Updating
taxonomy:
    category: docs
---

** Important: You must use Composer to update Drupal Core, Drupal Commerce, and all contributed modules. Otherwise, your site will break. Also, you should always back up your site before starting an update procedure. **

To update to the newest version of Drupal Commerce, you will need to
update with Composer.

Run the following command. Until [Change submodule metadata to use '*' instead of 'self.version'](https://www.drupal.org/project/project_composer/issues/2948861) is fixed, this lengthy command is needed.

```bash
composer update --with-dependencies drupal/commerce drupal/commerce_price drupal/commerce_product drupal/commerce_order drupal/commerce_payment drupal/commerce_payment_example drupal/commerce_checkout drupal/commerce_tax drupal/commerce_cart drupal/commerce_log drupal/commerce_store drupal/commerce_promotion
```

Once the Drupal.org infrastructure issue is resolved, the command will be

```bash
composer update drupal/commerce --with-dependencies
```

Please note the `--with-dependencies` option. Without this option
specified, any needed, contributed projects and libraries will not
update. Only the Drupal Commerce module will be updated.

Run your Drupal updates once all of the dependencies are updated. We
recommend running them on the command line rather than the
`update.php` script. See the example below.

```bash
drupal update:debug
drupal update:execute
```

### Composer update tips
If your `composer update` command isn't working, you can try:

  - Run `composer why-not` to check dependency issues.
  - Run `composer remove` then `composer require` to reinstall the project.
  - Delete the `composer.lock` file and entire /vendor directory from
    your project and then run `composer install`.
  - Run `composer clear-cache`.
  - Run `composer self-update`.
