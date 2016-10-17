# Products and types

## Creating product types
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

## Loading a product type
```php
// Loading is based off of the primary key [String] that was defined when creating it.
$product_type = \Drupal\commerce_product\Entity\ProductType::load('my_custom_product_type');
```

## Creating products
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

## Loading a product
```php
// Loading is based off of the primary key [Integer]
//   1 would be the first one saved, 2 the next, etc.
$product = \Drupal\commerce_product\Entity\Product::load(1);
```