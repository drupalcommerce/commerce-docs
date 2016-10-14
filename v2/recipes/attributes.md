# Product Attributes and Values
Product variation types can have certain attributes (ex. color) and those attributes have values (ex red, blue).
<br>
In this example, we will create two attributes (color and size) and add them to the variation type we made previously.

## Creating attributes.
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

## Creating values for an attribute.
```php
/**
 * attribute [String]
 *   Foreign key of the attribute we want.
 *
 * name [String]
 *   The name of this value.
 */
$red = \Drupal\commerce_product\Entity\ProductAttributeValue::create([
  'attribute' => 'color',
  'name' => 'Red',
]);
$red->save();

$blue = \Drupal\commerce_product\Entity\ProductAttributeValue::create([
  'attribute' => 'color',
  'name' => 'Blue',
]);
$blue->save();

$medium = \Drupal\commerce_product\Entity\ProductAttributeValue::create([
  'attribute' => 'size',
  'name' => 'Medium',
]);
$medium->save();

$large = \Drupal\commerce_product\Entity\ProductAttributeValue::create([
  'attribute' => 'size',
  'name' => 'Large',
]);
$large->save();
```

## Assigning attributes to a variation.
Let's say we want our hypothetical product to have two variations. One will be the color red and size medium, and the other will be the color blue and size large.
    // [IMPORTANT] - If a Product Variation Type has fields for attributes (as we added above), then variations of that type MUST have those attributes.

```php
/**
 * attribute_<ATTRIBUTE_ID> [\Drupal\commerce_product\Entity\ProductAttributeValueInterface]
 *   The attribute value entity to use for the attribute type.
 */
$variation_red_medium = \Drupal\commerce_product\Entity\ProductVariation::create([
  'type' => 'my_custom_variation_type',
  'sku' => 'product-red-medium',
  'price' => new \Drupal\commerce_price\Price('10.00', 'USD'),
  'attribute_color' => $red,
  'attribute_size' => $medium,
]);
$variation_red_medium->save();

$variation_blue_large = \Drupal\commerce_product\Entity\ProductVariation::create([
  'type' => 'my_custom_variation_type',
  'sku' => 'product-blue-large',
  'price' => new \Drupal\commerce_price\Price('10.00', 'USD'),
  'attribute_color' => $blue,
  'attribute_size' => $large,
]);
$variation_blue_large->save();
```