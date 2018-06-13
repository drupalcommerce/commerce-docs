---
title: Products
taxonomy:
    category: docs
---

Deleting a product deletes its variations. Adding a variation to a
product automatically creates a backreference on the variation, accessed
via `$variation->getProduct()`.

[Purchasable entities](02.purchasable-entities) - When it comes to product architectures, there is
no one true answer. Furthermore, different clients might have different needs.
That’s why it’s important for Commerce 2.x to support any number of product
architectures.


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

Creating products
-----------------

```php

    /**
     * uid [Integer]
     *   Foreign key of the user that created the product.
     *
     * type [String] - [DEFAULT = default]
     *   Foreign key of the product type being used.
     *
     * title [String]
     *   The product title.
     *
     * stores [Array(\Drupal\commerce_store\Entity\StoreInterface)]
     *   Array of stores this product belongs to.
     *
     * variations [Array(\Drupal\commerce_product\Entity\ProductVariationInterface)]
     *   Array of variations that belong to this product.
     */

    // The variations that belong to this product.
    $variations = [
      $variation_blue_large,
    ];

    $product = \Drupal\commerce_product\Entity\Product::create([
      'uid' => 1,
      'type' => 'my_custom_product_type',
      'title' => 'My Custom Product',
      'stores' => [$store],
      'variations' => $variations,
    ]);
    $product->save();

    // You can also add a variation to a product using the addVariation() method.
    $product->addVariation($variation_red_medium);
    $product->save();
    
```

Loading a product
-----------------

```php

    // Loading is based off of the primary key [Integer]
    //   1 would be the first one saved, 2 the next, etc.
    $product = \Drupal\commerce_product\Entity\Product::load(1);

```


Product variations are the purchasable parts of products, thus products
need at least one variation.

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

Creating variations
-------------------

```php


    /**
     * type [String] - [DEFAULT = default]
     *   Foreign key of the variation type to use.
     *
     * sku [String]
     *   The sku for this variation.
     *
     * status [Bool] - [OPTIONAL, DEFAULTS TO TRUE]
     *   [AVAILABLE = FALSE, TRUE]
     *   Whether or not it's enabled or disabled. 1 for enabled.
     *
     * price [\Drupal\commerce_price\Price] - [OPTIONAL]
     *   The price for this variation.
     *
     * title [String] - [POTENTIALLY NOT REQUIRED]
     *   The title for the product variation.
     *   If the variation type is set to generate a title, this is not used.
     *   Otherwise, a title must be given.
     */
    $variation = \Drupal\commerce_product\Entity\ProductVariation::create([
      'type' => 'my_custom_variation_type',
      'sku' => 'test-product-01',
      'status' => TRUE,
      'price' => new \Drupal\commerce_price\Price('24.99', 'USD'),
    ]);
    $variation->save();
    
```

Loading a variation
-------------------

```php


    // Loading is based off of the primary key [Integer]
    //   1 would be the first one saved, 2 the next, etc.
    $variation = \Drupal\commerce_product\Entity\ProductVariation::load(1);

```

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
