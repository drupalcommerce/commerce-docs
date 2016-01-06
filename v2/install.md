# Installing Drupal Commerce 2.x

## Creating a new Drupal Commerce 2 site

```sh
composer create-project drupalcommerce/project-base some-dir --stability dev --no-interaction
```

The above command downloads Drupal core, Commerce, all [dependencies and libraries](requirements.md) to "some-dir." Feel free to read more about the best practices on the github page for the project template: [drupalcommerce/project-base](https://github.com/drupalcommerce/project-base).

## Adding Commerce 2 to an existing Drupal 8 site

1. **Add Commerce to your site**

 ```sh
 drupal module:download commerce;
 drupal module:download address;
 drupal module:download entity
 drupal module:download state_machine;
 drupal module:download inline_entity_form;
 drupal module:download profile;
 ```

2. **Initialize Composer & download libraries**

 ```sh
 drupal module:download composer_manager;
 php modules/contrib/composer_manager/scripts/init.php;
 composer drupal-update;
 composer dump-autoload;
 ```

3. **Enable the Commerce modules** (below is provided as an example)

 ```sh
 drupal module:install commerce commerce_order commerce_product commerce_tax commerce_cart commerce_payment profile
 ```