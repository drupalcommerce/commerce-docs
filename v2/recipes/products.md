# Products and types

## Creating product types.
```
// String - Primary key for product type.
$productTypeId = 'my_custom_product_type';

// String - Label for the product type.
$label = "My custom product type";

// [OPTIONAL] Integer - Enabled is 1, disabled is 0. Default is 1.
$statusEnabled = 1;

// String - The description.
$description = 'My custom product type with color and size variations.';

// String - The variation type id to use for this product type. Default is 'default'.
$variationTypeId = 'default';
// We can use the new variation type we created previously here.
$variationTypeId = 'my_custom_variation_type';

// [OPTIONAL] Bool - Whether or not to inject the variation fields. Defaults to TRUE.
$injectVariationFields = TRUE;

// Create the product type.
$productType = \Drupal\commerce_product\Entity\ProductType::create([
  'id' => $productTypeId,
  'label' => $label,
  'status' => $statusEnabled,
  'description' => $description,
  'variationType' => $variationTypeId,
  'injectVariationFields' => $injectVariationFields,
]);
$productType->save();

// These three functions must be called to add the appropriate fields to the type
commerce_product_add_variations_field($productType);
commerce_product_add_stores_field($productType);
commerce_product_add_body_field($productType);
```

## Creating products.
```
// Integer|String - The id of the user that created the product.
$uid = 1;

// String - The product type id to use. Default is 'default'.
$orderTypeId = 'default';
// We can use the product type we just created.
$orderTypeId = 'my_custom_product_type';

// String - The product title.
$title = 'My Custom Product';

// Array - The stores that the product belongs to. (Using the one we made previously here.)
$stores = [
  $store,
];

// Array - The variations that belong to the product.
$variations = [
  $variationRedMedium,
  $variationBlueLarge,
];

$product = \Drupal\commerce_product\Entity\Product::create([
  'uid' => $uid,
  'type' => $orderTypeId,
  'title' => $title,
  'stores' => $stores,
  'variations' => $variations,
]);
$product->save();

// You can also add a variation to a product using the addVariation() method.
$product->addVariation($variationRedMedium);
$product->save();
```