# Product Attributes and Values
Product variation types can have certain attributes (ex. color) and those attributes have values (ex red, blue).
<br>
In this example, we will create two attributes (color and size) and add them to the variation type we made previously.

## Creating attributes.
```
// String - The primary key of the attribute we are making.
$colorAttributeId = 'color';
$sizeAttributeId = 'size';

// String - The label for the attribute.
$colorLabel = 'Color';
$sizeLabel = 'Size';

// Creating the attributes.
$colorAttribute = \Drupal\commerce_product\Entity\ProductAttribute::create([
  'id' => $colorAttributeId,
  'label' => $colorLabel,
]);
$colorAttribute->save();

$sizeAttribute = \Drupal\commerce_product\Entity\ProductAttribute::create([
  'id' => $sizeAttributeId,
  'label' => $sizeLabel,
]);
$sizeAttribute->save();

// We load a service that adds the attributes to the variation type we made previously.
$variationTypeId = 'my_custom_variation_type';
$attributeFieldManager = \Drupal::service('commerce_product.attribute_field_manager');

$attributeFieldManager->createField($colorAttribute, $variationTypeId);
$attributeFieldManager->createField($sizeAttribute, $variationTypeId);
```

## Creating values for an attribute.
```
// String - The attribute id that we just made.
$colorAttributeId = 'color';
$sizeAttributeId = 'size';

// String - The 'value' for this value.
$redName = 'Red';
$blueName = 'Blue';
$mediumName = 'Medium';
$largeName = 'Large';

// Creating the values.
$red = \Drupal\commerce_product\Entity\ProductAttributeValue::create([
  'attribute' => $colorAttributeId,
  'name' => $redName,
]);
$red->save();

$blue = \Drupal\commerce_product\Entity\ProductAttributeValue::create([
  'attribute' => $colorAttributeId,
  'name' => $blueName,
]);
$blue->save();

$medium = \Drupal\commerce_product\Entity\ProductAttributeValue::create([
  'attribute' => $sizeAttributeId,
  'name' => $mediumName,
]);
$medium->save();

$large = \Drupal\commerce_product\Entity\ProductAttributeValue::create([
  'attribute' => $sizeAttributeId,
  'name' => $largeName,
]);
$large->save();
```

## Assigning attributes to a variation.
Let's say we want our hypothetical product to have two variations. One will be the color red and size medium, and the other will be the color blue and size large.
```
// [IMPORTANT] - If a Product Variation Type has fields for attributes (as we added above), then variations of that type MUST have those attributes.

$variationRedMedium = \Drupal\commerce_product\Entity\ProductVariation::create([
  'type' => 'my_custom_variation_type',
  'sku' => 'product-red-medium',
  'price' => new \Drupal\commerce_price\Price('10.00', 'USD'),
  'attribute_color' => $red,
  'attribute_size' => $medium,
]);
$variationRedMedium->save();

$variationBlueLarge = \Drupal\commerce_product\Entity\ProductVariation::create([
  'type' => 'my_custom_variation_type',
  'sku' => 'product-blue-large',
  'price' => new \Drupal\commerce_price\Price('10.00', 'USD'),
  'attribute_color' => $blue,
  'attribute_size' => $large;
]);
$variationBlueLarge->save();
```