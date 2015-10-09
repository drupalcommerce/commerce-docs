# Installing Drupal Commerce 2.x
[Composer Manager Module](https://drupal.org/project/composer_manager) &nbsp; | &nbsp; [Composer on Drupal Intro](https://bojanz.wordpress.com/2015/09/18/d8-composer-definitive-intro/) &nbsp; | &nbsp; [Community Docs](https://www.drupal.org/node/2405811)

1. Download _*the -dev versions*_ of Drupal 8 and [composer_manager](https://drupal.org/project/composer_manager) into your
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
   