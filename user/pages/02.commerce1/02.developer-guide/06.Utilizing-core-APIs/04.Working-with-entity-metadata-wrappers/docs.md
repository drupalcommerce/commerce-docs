---
title: Working with entity metadata wrappers
taxonomy:
    category: docs
---

Many of our core API functions and hooks work with and expect you to understand the use of entity metadata wrappers. The wrapper is an object defined by the Entity API module that takes an entity type and entity object and produces a new object that can be used to access and manipulate the entity's properties and fields. Additionally, it makes it easy to work with multiple value fields and entities referenced by properties or fields of the wrapped entity.

<h3>Examples</h3>

A product line item contains a product reference field.  Business logic often calls for different types of products to interact with the cart or checkout process differently.  Given a line item object, you could access the product information like so:


```php
<?php
$line_item_wrapper = entity_metadata_wrapper('commerce_line_item', $line_item);
$product_type = $line_item_wrapper->commerce_product->type->value();
?>
```

If you just had the order but not an individual line item, you'd want to loop over the line items referenced by the order.  The following example extracts the full line item object from the line item reference field attached to orders.

```php
<?php
$order_wrapper = entity_metadata_wrapper('commerce_order', $order);
foreach ($order_wrapper->commerce_line_items as $delta => $line_item_wrapper) {
  $line_item = $line_item_wrapper->value();
}
?>
```

In some cases, you may need access to the raw value of a property or field. This is true in cases where you just want the ID of a referenced entity instead of the entity itself. In these instances, use the ->raw() method of a wrapper instead of ->value().
