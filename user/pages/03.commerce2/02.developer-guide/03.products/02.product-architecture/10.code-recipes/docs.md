---
title: Code recipes

taxonomy:
    category: docs
---

If you want to write custom code to programatically create or manage your product architecture, you can use these code recipes as a starting point.
- **Create:**
 - [Product type](#creating-a-product-type)
 - [Product variation type](#creating-a-variation-type)
 - [Product attributes](#creating-product-attributes)
- **Load:**
 - [Product type](#loading-a-product-type)
 - [Product variation type](#loading-a-variation-type)
 - [Product attribute](#loading-a-product-attribute)
- **Implement:**
 - [PurchasableEntityInterface](#purchasableentityinterface)

### Creating a product type
In the [Simple product type](../01.simple-product) documentation, we looked at creating a product type through the administration UI. A "Simple" product variation type was created automatically for us. If you are creating a product type programatically, you will need to create its product variation type *before* you create the product type.

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

### Creating a variation type
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
### Creating product attributes
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

### Loading a product type
```php
    // Loading is based off of the primary key [String] that was defined when creating it.
    $product_type = \Drupal\commerce_product\Entity\ProductType::load('my_custom_product_type');
```

### Loading a variation type
```php

    // Loading is based off of the primary key [String] that was defined when creating it.
    $variation_type = \Drupal\commerce_product\Entity\ProductVariationType::load('my_custom_variation_type');

```

### Loading a product attribute
```php
    // Loading is based off of the primary key [String] that was defined when creating it.
    $size_attribute = \Drupal\commerce_product\Entity\ProductAttribute::load('size');
```

### PurchasableEntityInterface
The ProductVariation entity class implements the PurchasableEntityInterface. Any content entity type that implements this interface can be purchased. Line items (*order items*) have a purchased_entity reference field. If you develop a content entity type that implements this PurchasableEntityInterface, you can set up an order item type to allow customers to purchase your custom entity type instead of standard product variations.

```php
      <?php

      namespace Drupal\commerce;

      use Drupal\Core\Entity\ContentEntityInterface;

      /**
       * Defines the interface for purchasable entities.
       *
       * Lives in Drupal\commerce instead of Drupal\commerce_order so that entity
       * type providing modules such as commerce_product don't need to depend
       * on commerce_order.
       */
      interface PurchasableEntityInterface extends ContentEntityInterface {

        /**
         * Gets the stores through which the purchasable entity is sold.
         *
         * @return \Drupal\commerce_store\Entity\StoreInterface[]
         *   The stores.
         */
        public function getStores();

        /**
         * Gets the purchasable entity's order item type ID.
         *
         * Used for finding/creating the appropriate order item when purchasing a
         * product (adding it to an order).
         *
         * @return string
         *   The order item type ID.
         */
        public function getOrderItemTypeId();

        /**
         * Gets the purchasable entity's order item title.
         *
         * Saved in the $order_item->title field to protect the order items of
         * completed orders against changes in the referenced purchased entity.
         *
         * @return string
         *   The order item title.
         */
        public function getOrderItemTitle();

        /**
         * Gets the purchasable entity's price.
         *
         * @return \Drupal\commerce_price\Price|null
         *   The price, or NULL.
         */
        public function getPrice();

      }
```