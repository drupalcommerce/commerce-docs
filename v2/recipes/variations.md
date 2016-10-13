# Product Variations and types
Product variations are the purchasable parts of products, thus products need at least one variation.

## Creating variation types.
```
// [OPTIONAL] Integer - Enabled is 1, disabled is 0. Default is 1.
$statusEnabled = 1;

// String - The primary key for the variation type.
$variationTypeId = 'my_custom_variation_type';

// String - The label for the variation type.
$label = 'Variation Type With Color';

// String - The id for the order item type. Default is 'default'.
// Can use custom order item type if we have one made.
$orderItemTypeId = 'default';

// Bool - Whether or not it should generate the title based off of product label and attributes.
$generateTitle = TRUE;

// Create the new variation type.
$variationType = \Drupal\commerce_product\Entity\ProductVariationType::create([
  'status' => $statusEnabled,
  'id' => $variationTypeId,
  'label' => $label,
  'orderItemType' => $orderItemTypeId,
  'generateTitle' => $generateTitle,
]);
$variationType->save();
```

## Creating variations.
```
// String - The variation type to use for the variation. Default is 'default'.
$variationTypeId = 'default';
// Can use the custom one from above here.
$variationTypeId = 'my_custom_variation_type';

// String - The variation sku.
$sku = 'test-product-01';

// [OPTIONAL] Integer - Enabled is 1, disabled is 0. Default is 1.
$statusEnabled = 1;

// [OPTIONAL] The price of the variation.
$price = new \Drupal\commerce_price\Price('24.99', 'USD');

// [POTENTIALLY NOT NEEDED] The title for the product variation.
// If the variation type is set to generate a title, this is not used.
// Otherwise, a title must be given.
$title = 'My product variation";

$variation = \Drupal\commerce_product\Entity\ProductVariation::create([
  'type' => $variationTypeId,
  'sku' => $sku,
  'status' => $statusEnabled,
  'price' => $price,
  'title' => $title,
]);
$variation->save();
```