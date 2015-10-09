# Installing Drupal Commerce 2.x

1. Download the -dev versions of Drupal 8 and [composer_manager](https://drupal.org/project/composer_manager) into your
   `modules` directory.

2. From the Drupal root directory, initialize composer_manager,* and run it for the first time:

   ```sh
   php modules/composer_manager/scripts/init.php
   composer drupal-update
   ```

3. Enable the Commerce modules, e.g.:

   ```sh
   drush en -y commerce commerce_order commerce_product commerce_tax
   ```

Notes:
* Find out more about composer_manager usage [here](https://www.drupal.org/node/2405811).