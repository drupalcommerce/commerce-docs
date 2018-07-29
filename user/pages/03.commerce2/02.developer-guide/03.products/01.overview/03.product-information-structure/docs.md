---
title: Product Information Structure
taxonomy:
    category: docs
---

This page provides specific, technical explanations of the product-related data structures and relationships in Drupal Commerce. Familiarity with Drupal concepts including configuration entities, content entities, bundles, base fields, and plugins is assumed. For a more general introduction to Drupal Commerce products,  see the [Concepts documentation page](../02.concepts). For step-by-step instructions for setting up products for your site, see the [Product Architecture documentation](../../02.product-architecture).

#### Product variation types and product types
Product variation types and product types are configuration bundle entities for product variations and products, respectively. Both extend the "CommerceBundleEntityBase" base class.

##### CommerceBundleEntityBase
 The CommerceBundleEntityBase base class provides unique id and label fields, an array of "entity traits", and a "locked" boolean field.

An **entity trait** represents a behavior that can be attached to a specific entity bundle, by acting as a marker, or flag, and/or providing a set of fields. For example, the [Commerce Shipping] module adds a "Shippable" trait to product variation types. If a product variation type is flagged as "shippable", then a "weight" field is added to product variations of that type.

Entity traits are implemented as plugins. If you are interested in creating your own product or product variation type entity traits, you can get started by looking at the "EntityTraitBase" class, located in `Drupal\commerce\Plugin\Commerce\EntityTrait`.

The **locked** property of a commerce entity bundle controls whether a bundle can be deleted. CommerceBundleEntityBase provides `lock()` and `unlock()` methods that can be used to set the locked status for a commerce entity bundle.

##### Product variation types
A **product variation type** is a configuration bundle entity that extends CommerceBundleEntityBase. It has an "order item type" ID field and a boolean "generate title" field. You can also customize a product variation type by adding custom fields and/or product attributes.
- The order item type ID field is used to determine what type of order item should be added to a customer's cart at the time a product variation is selected.
- The "generate title" field corresponds to the "Generate variation titles based on attribute values" option on the product variation type administration form. If selected for a product variation type, titles for its product variations will be automatically generated whenever the variations are saved. The pattern for the generated title is the variation's product title followed by a dash ('-') character and a comma-separated list of attribute value labels. (If the product variation type does not have any product attributes, the product title is used for the variation title.)

A standard Drupal Commerce installation includes a product variation type named "Default". Its order item type is the "Default" order item type, and its "generate title" setting is enabled. You can change these default values or customize the "Default" product variation type with additional fields and product attributes. In this screenshot, "Color" and "Size" product attributes have been added to the site, so they can be added to the Default product variation type.

![Default product variation type](../../images/info-structure-1.jpg)

Alternatively, if you do not want to use the "Default" product variation type, you can also delete it completely from your site.

**Deleting product variation types**
- Product variation types cannot be deleted if variations of those types exist.
- Locked product variation types cannot be deleted.


##### Product types
A **product type** is a configuration bundle entity that extends `CommerceBundleEntityBase`. It has a description, "variation type" ID field, and a boolean "inject variation fields".

Why does a product type need a set variation type? The variation type ID field value is set when a new product type is created. It is used to set the target bundle for the product "variations" field so that whenever a variation is added to a product, the correct type of variation is added. The variation type ID field is also used for the "Product attributes overview" formatter, a formatter that displays a product's variations as rendered attribute entities.

The "inject variation fields" setting affects how products are displayed. You can learn more about [product variation field injection](../../04.displaying-products/01.product-display) in the [Displaying products](../../04.displaying-products) section of the documentation.

The product type administrative page also includes an option to "Publish new products of this type by default". This option value is not stored with the product type configuration data; instead, it is used to set the default value for the "status" product entity base field, for the product type.

A standard Drupal Commerce installation includes a product type named "Default". Its product variation type is the "Default" product variation type, and its "inject variations fields" and "publish new products of the type by default" settings are enabled. You can change these default values or customize the "Default" product variation type with additional fields.

![Default product type](../../images/info-structure-2.jpg)

Alternatively, if you do not want to use the "Default" product type, you can also delete it completely from your site.

**Deleting product types**
- Product types cannot be deleted if products of those types exist.
- Locked product types cannot be deleted.
- Deleting a product type does not delete its variation type, even if the variation type is not being used by any other product type.

##### Product variation type and product type relationships
A product type has a single product variation type, but a single product variation type could be used for multiple product types. In most cases, though, you will have paired product types and product variation types. For example, the "Default" product type with the "Default" product variation type, the "Clothing" product type with the "Clothing" product variation type, and the "Book" product type with the "Book" product variation type.

In the following diagram, you can see that a Product entity can optionally have "Custom Fields", and a Product variation entity can optionally have both "Custom Fields" and "Attribute(s)". These additional fields are all specific to bundle types. You use the product type and product variation administrative pages to specify custom fields and product attributes for product and product variation entities.

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

#### Product attribute values and product attributes
A **product attribute value** is a content entity that has a product attribute as its bundle entity type. Its base fields are:
- attribute: the ID of the product attribute value's "product attribute" bundle.
- name: typically displayed to customers as a selectable product option, like "Blue", "Green", or "Red".
- weight: used for ordering attribute values in relation to other attribute values. The default ordering is alphabetical.
- created and changed: timestamps that are automatically set when attribute values are created/changed.

Custom fields can be added to product attribute value entities through the administrative UI.

A **product attribute** is a configuration entity that has the following properties:
- id: unique string id
- label: label to be used for the attribute and typically displayed to customer. For example: "Color" or "Size"
- elementType, one of:
 - 'radios' (radio buttons)
 - 'select' (select list)
 - 'commerce_product_rendered_attribute' (Rendered attribute). See [Product attributes](../../04.displaying-products/03.product-attributes) in the Displaying products documentation.

The product attribute entity also has two useful "getter" methods:
- The `getElementType()` method returns the attribute's entityType value.
- The `getValues()` method returns an array of "ProductAttributeValueInterface" objects, sorted by weight and name.

Show image of how product attribute is essentially just a special type of field.

**Deleting product attributes**
- If a product attribute is deleted, then all of its product attribute values will also be deleted.



![Product Information Structure](../../images/attribute_entity_relationships.png)

Something about ProductAttributeFieldManager here? broken links issues?
Something about ProductVariationAttributeMapper here?
Also need to go through commerce_product.module to add in all that customization.

[Commerce Shipping]: https://www.drupal.org/project/commerce_shipping
