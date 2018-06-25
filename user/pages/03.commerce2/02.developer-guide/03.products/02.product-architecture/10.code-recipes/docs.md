---
title: Code recipes

taxonomy:
    category: docs
---

Creating a product type
----------------------
```php
    /**
     * id [String]
     *   Primary key for this product type.
     *
     * label [String]
     *   Label for this product type
     *
     * status [Bool] - [OPTIONAL, DEFAULTS TO TRUE]
     *   [AVAILABLE = FALSE, TRUE]
     *   Whether or not it's enabled or disabled. 1 for enabled.
     *
     * description [String]
     *   Description for this product.
     *
     * variationType [String] - [DEFAULT = default]
     *   Foreign key for the variation type used.
     *
     * injectVariationFields [Bool] - [OPTIONAL, DEFAULTS TO TRUE]
     *   Whether or not to inject the variation fields.
     */

    // Create the product type.
    $product_type = \Drupal\commerce_product\Entity\ProductType::create([
      'id' => 'my_custom_product_type',
      'label' => "My custom product type",
      'description' => '',
      'variationType' => 'my_custom_variation_type',
      'injectVariationFields' => TRUE,
    ]);
    $product_type->save();

    // These three functions must be called to add the appropriate fields to the type
    commerce_product_add_variations_field($product_type);
    commerce_product_add_stores_field($product_type);
    commerce_product_add_body_field($product_type);

```

Loading a product type
----------------------

```php
    // Loading is based off of the primary key [String] that was defined when creating it.
    $product_type = \Drupal\commerce_product\Entity\ProductType::load('my_custom_product_type');
```

Creating variation types
------------------------

```php

    /**
     * id [String]
     *   The primary key for this variation type.
     *
     * label [String]
     *   The label for this variation type.
     *
     * status [Bool] - [OPTIONAL, DEFAULTS TO TRUE]
     *   [AVAILABLE = FALSE, TRUE]
     *   Whether or not it's enabled or disabled. 1 for enabled.
     *
     * orderItemType [String] - [DEFAULT = default]
     *   Foreign key for the order item type to use.
     *
     * generateTitle [Bool] - [DEFAULT = TRUE]
     *   Whether or not it should generate the title based off of product label and attributes.
     */
    $variation_type = \Drupal\commerce_product\Entity\ProductVariationType::create([
      'id' => 'my_custom_variation_type',
      'label' => 'Variation Type With Color',
      'status' => TRUE,
      'orderItemType' => 'default',
      'generateTitle' => TRUE,
    ]);
    $variation_type->save();

```

Loading a variation type
------------------------

```php

    // Loading is based off of the primary key [String] that was defined when creating it.
    $variation_type = \Drupal\commerce_product\Entity\ProductVariationType::load('my_custom_variation_type');

```

Product variation types can have certain attributes (ex. color) and
those attributes have values (ex red, blue). In this example, we will
create two attributes (color and size) and add them to the variation
type we made previously.

Creating attributes
-------------------

```php
    /**
     * id [String]
     *   The primary key for this attribute.
     *
     * label [String]
     *   The label for this attribute.
     */
    $color_attribute = \Drupal\commerce_product\Entity\ProductAttribute::create([
      'id' => 'color',
      'label' => 'Color',
    ]);
    $color_attribute->save();

    $size_attribute = \Drupal\commerce_product\Entity\ProductAttribute::create([
      'id' => 'size',
      'label' => 'Size',
    ]);
    $size_attribute->save();

    // We load a service that adds the attributes to the variation type we made previously.
    $attribute_field_manager = \Drupal::service('commerce_product.attribute_field_manager');

    $attribute_field_manager->createField($color_attribute, 'my_custom_variation_type');
    $attribute_field_manager->createField($size_attribute, 'my_custom_variation_type');
```

Loading an attribute
--------------------

```php
    // Loading is based off of the primary key [String] that was defined when creating it.
    $size_attribute = \Drupal\commerce_product\Entity\ProductAttribute::load('size');
```
Checking if an attribute value exists within a particular attribute type
--------------------

```php
    // Look up while filtering by Attribute
    $productAttributeId = \Drupal::entityTypeManager()
          ->getStorage('commerce_product_attribute_value')
          ->condition('attribute', 'attribute_machine_name')
          ->condition('field_value', field_value)
          ->execute();
```
