# Product Variations and types
Product variations are the purchasable parts of products, thus products need at least one variation.

## Creating variation types.
```php
/**
 * id [String]
 *   The primary key for this variation type.
 *
 * label [String]
 *   The label for this variation type.
 *
 * status [Integer] - [OPTIONAL, DEFAULTS TO 1]
 *   [AVAILABLE = 0, 1]
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
  'status' => 1,
  'orderItemType' => 'default',
  'generateTitle' => TRUE,
]);
$variation_type->save();
```

## Creating variations.    
```php
/**
 * type [String] - [DEFAULT = default]
 *   Foreign key of the variation type to use.
 *
 * sku [String]
 *   The sku for this variation.
 *
 * status [Integer] - [OPTIONAL, DEFAULTS TO 1]
 *   [AVAILABLE = 0, 1]
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
  'status' => 1,
  'price' => new \Drupal\commerce_price\Price('24.99', 'USD'),
]);
$variation->save();
```