---
title: Product Information Structure
taxonomy:
    category: docs
---

Need to write a little intro here... refer back to Concepts page as a prerequisite. This is a more technical overview. It assumes familiarity with Drupal concepts...



The Drupal Commerce product module defines three content entities, each with a corresponding bundle configuration entity type. Name them here and maybe provide a little TOC.

#### Product attributes and product attribute values
A **product attribute** is a configuration entity that has a unique id, label (Name), and an "Element type". The attribute element type can be one of:
- Radio buttons
- Select list
- Rendered attribute (See [Product attributes](../../04.displaying-products/03.product-attributes) in the Displaying products documentation.)

The values for a product attribute are not stored in its configuration data, but the "ProductAttribute" class provides a `getValues()` method that can be used to retrieve an array of "ProductAttributeValueInterface" objects, sorted by weight and name.

**Deleting product attributes**
- If a product attribute is deleted, then all of its product attribute values will also be deleted. Every product attribute value must have a product attribute; therefore, product attribute values cannot exist without their product attributes.

A **product attribute value** is a content entity that has a product attribute as its bundle entity type. Each product attribute value has a name and weight (used for ordering values in relation to others). Timestamps for attribute value creation and changed time are also stored.

Custom fields can be added to product attribute value entities through the administration ui.

![Product Information Structure](../../images/attribute_entity_relationships.png)

Something about ProductAttributeFieldManager here? broken links issues?
Something about ProductVariationAttributeMapper here?

#### Product variation types and product types
Product variation types and product types are configuration bundle entities for product variations and products, respectively. Both extend the "CommerceBundleEntityBase" base class.

##### CommerceBundleEntityBase
 The CommerceBundleEntityBase base class provides unique id and label fields, an array of "entity traits", and a "locked" boolean field.

An **entity trait** represents a behavior that can be attached to a specific entity bundle, by acting as a marker, or flag, and/or providing a set of fields. For example, the [Commerce Shipping] module adds a "Shippable" trait to product variation types. If a product variation type is flagged as "shippable", then a "weight" field is added to product variations of that type.

The **locked** property of a commerce entity bundle controls whether a bundle can be deleted. CommerceBundleEntityBase provides `lock()` and `unlock()` methods that can be used to set the locked status for a commerce entity bundle.

##### Product variation types
A **product variation type** is a configuration bundle entity that extends CommerceBundleEntityBase. It has an "order item type" ID field and a boolean "generate title" field.
- The order item type ID field is used to determine what type of order item should be added to a customer's cart at the time a product variation is selected.
- The "generate title" field corresponds to the "Generate variation titles based on attribute values" option on the product variation type administration form. If selected for a product variation type, titles for its product variations will be automatically generated whenever the variations are saved. The pattern for the generated title is the variation's product title followed by a dash ('-') character and a comma-separated list of attribute value labels. (If there are no attribute fields, the product title is used for the variation title.)

Custom fields, attributes can be added to a product variation type...Mention this here?

**Deleting product variation types**
- Product variation types cannot be deleted if variations of those types exist.
- Locked product variation types cannot be deleted.

##### Product types
A **product type** is a configuration bundle entity that extends `CommerceBundleEntityBase`. It has a description, "variation type" ID field, and a boolean "inject variation fields". (TBD: will there be a "show variations tab" setting as well?)

Why does a product type need a set variation type? The variation type ID field value is set when a new product type is created. It is used to set the target bundle for the product "variations" field so that whenever a variation is added to a product, the correct type of variation is added. The variation type ID field is also used for the "Product attributes overview" formatter, a formatter that displays a product's variations as rendered attribute entities.

The "inject variation fields" setting affects how products are displayed. You can learn more about [product variation field injection](../../04.displaying-products/01.product-display) in the [Displaying products](../../04.displaying-products) section of the documentation.

**Deleting product types**
- Product types cannot be deleted if products of those types exist.
- Locked product types cannot be deleted.
- Deleting a product type does not delete its variation type, even if the variation type is not being used by any other product type.

![Product Information Structure](../../images/product_entity_relationships.png)


#### Product variations
A **product variation** is a content entity that has a product variation type as its bundle entity type. Each product variation has a parent product entity, sku, title, price, and status (active/inactive). The author of the variation as well as its created and changed timestamps are also stored.

Since product variations belong to specific products and since products are specifically assigned to one or more stores, product variations are also assigned to stores. The `ProductVariation` class provides a `getStores()` method that retuns an array of stores to which the product variation is assigned.

The `ProductVariation` class also provides a couple methods that are used when a product variation is purchased (added to a cart):
- The `getOrderItemTypeId()` loads the variation's "product variation type" and returns the ID of the order item type set for that product variation type.
- The `getOrderItemTitle()` method will return the product variation's title, if set. If the variation's title has not been set, then a title will be generated as described above.

Say something about toUrl() method.
Also need to describe all the attribute value methods, attribute field manager (which is described above??)

####  Products
A **product** is a more complex content entity than product variation and product attribute value entities. Like a node, it is designed to be displayed on the site in its own page.

Product relationships: product type, stores, variations

Deleting a product deletes its variations.


Also need to go through commerce_product.module to add in all that customization.

[Commerce Shipping]: https://www.drupal.org/project/commerce_shipping
