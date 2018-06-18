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

Creating a custom product variation widget for add-to-cart-form