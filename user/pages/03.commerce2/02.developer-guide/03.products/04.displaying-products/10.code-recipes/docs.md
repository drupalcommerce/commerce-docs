---
title: Code recipes
taxonomy:
    category: docs
---

Altering the title field label
------------------------------

```php

    use Drupal\Core\Entity\EntityTypeInterface;

    /**
     * Implements hook_entity_base_field_info_alter().
     */
    function mymodule_entity_base_field_info_alter(&$fields, EntityTypeInterface $entity_type) {
      if ($entity_type->id() == 'commerce_product') {
        // Change the title field label.
        $fields['title']->setLabel(t('Product name'));
      }
    }
```

Provide an example for ProductEvents::FILTER_VARIATIONS, used by ProductVariationStorage::loadEnabled, used by the ProductVariation widgets.


Hiding add to cart form for anonymous users
------------------------------
Use hook_form_alter and
`'#access' => !is_anonymous` under add to cart submit


Creating a custom product variation widget for add to cart form
------------------------------


Example of subscribing to the `ProductEvents::FILTER_VARIATIONS` event.
------------------------------


Creating a custom add to cart form
------------------------------

If the default add to cart form lacks some necessary functionality, you can either use a form alter hook or consider this cleaner approach:

1. Extend commerce_cart\Form\AddToCartForm.php
 - Override any methods to alter the form functionality.

2. Implement hook_entity_type_build() to swap out the default form with your custom one.

```php
/**
 * Implements hook_entity_type_build().
 */
function mymodule_entity_type_build(array &$entity_types) {
  $entity_types['commerce_order_item']->setFormClass('add_to_cart', '\Drupal\mymodule\Form\AddToCartForm');
}
```

3. If your custom module name does not come after "commerce_cart" alphabetically, then you will need to manually adjust its weight. To do this, you can use hook_module_implements_alter(). Or you can use the `module_set_weight` API function (implemented in core\includes\module.inc).


Altering commerce product twig template variables
------------------------------
You can use hook_preprocess_commerce_product as in:

```php
function mymodule_preprocess_commerce_product(&$variables) {
  $product = $variables['elements']['#commerce_product'];
  ...
}
```

### Links and resources
* [Custom field formatter for displaying entity images with thumbnails and 1 large image], posted by Ivan Jaros in [Drupal Answers] on StackExchange.

[Custom field formatter for displaying entity images with thumbnails and 1 large image]: https://drupal.stackexchange.com/questions/192471/display-entity-images-with-thumbnails-and-1-large-image
[Drupal Answers]: https://drupal.stackexchange.com/