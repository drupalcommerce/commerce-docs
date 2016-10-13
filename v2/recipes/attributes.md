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

## Creating values.
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