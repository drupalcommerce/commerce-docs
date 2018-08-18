---
title: Theming products
taxonomy:
    category: docs
---

If you need to customize layouts for your product displays beyond what is possible using the administration UI, you can use Twig templates as part of a custom theme. Theming is an advanced topic beyond the scope of this Drupal Commerce documentation guide. For an overview, please see the [Theming Drupal Guide] on Drupal.org. This documentation page serves as a reference for theming Drupal Commerce products, variations, and product attribute values.

### Theming products
The default product template is commerce-product.html.twig

- The product template will be used for product pages and product fields displayed with the *Rendered entity* formatter.
- Use *Manage display* for your product type to make sure that all the fields you want displayed are enabled for the active display mode. (The *Default* display mode is used for product pages; display mode is a configuration option for rendered entities.)
- If you want to display variation fields, product variation field injection should be enabled. Also, make sure that all the variation fields you want displayed are enabled for the Default display mode for the variation type.

#### Available variables
- **attributes**: HTML attributes for the wrapper. (*not to be confused with **product attributes***)
- **product_entity**: The product entity.
- **product_url**: The product URL.
- **product**: The rendered product fields.
 - Use `{{ product }}` to print them all.
 - Use `{{ product.title }}`, for example, to print a single field.
 - Use `{{ product|without('title') }}`, for example, to exclude the printing of a given field.
 - Product attribute fields are grouped so that they can be excluded together; use `{{- product|without('variation_attributes') -}}` to exclude the printing of product attribute fields.

##### Product-level field variables
- product.title
- product.body
 - unless the Body field has been deleted for the product type
- product.variations
- product.uid
 - for the product Author field
- product.created
- product.stores
- For each added product field:
 - product.*field_added_field_name*

##### Product variation-level field variables
- product.variation_title
- product.variation_sku
- product.variation_price
- For each added product variation field:
 - product.*variation_field_added_field_name*


### Theming product variations
The default product template is commerce-product-variation.html.twig

- If you are using the *Add to cart form* formatter to display your product's variations, this template will *not* be used.
- This template will be used whenever the *Rendered entity* formatter is selected for a product variations field.
- Use *Manage display* for your product variation type to make sure that all the fields you want displayed are enabled for the rendered entity's display mode.

#### Available variables
- **attributes**: HTML attributes for the wrapper. (*not to be confused with **product attributes***)
- **product_variation_entity**: The product variation entity.
- **product_url**: The product URL.
- **product_variation**: The rendered product variation fields.
 - Use `{{ product_variation }}` to print them all.
 - Use `{{ product_variation.title }}`, for example, to print a single field.
 - Use `{{ product_variation|without('title') }}`, for example, to exclude the printing of a given field.

##### Product variation field variables
- product_variation.title
- product_variation.sku
- product_variation.price
- product_variation.product_id
 - for the variation's product
- For each attribute:
 - product_variation.*attribute_name*
- For each added field:
 - product_variation.*field_added_field_name*

### Theming product attribute values
The default product attribute template is commerce-product-attribute-value.html.twig

- This template will be used whenever the *Rendered attribute* formatter is selected for a product variations field.
- Use *Manage display* for your product attribute to make sure that all the fields you want displayed are enabled for the *Add to Cart Form* display mode.

#### Available variables
- **attributes**: HTML attributes for the wrapper.
- **product_attribute_value_entity**: The product attribute value entity.
- **product_attribute_value**: The rendered product attribute value fields.
 - Use `{{ product_attribute_value }}` to print them all.
 - Use `{{ product_attribute_value.name }}`, for example, to print a single field.
 - Use `{{ product_attribute_value|without('name') }}`, for example, to exclude the printing of a given field.

##### Product attribute value field variables
- product_attribute_value.name
- For each added field:
 - product_attribute_value.*field_added_field_name*

Also, there is a custom css library for rendered product attributes, located within the Drupal Commerce Product module: `css/commerce_product.rendered-attributes.css`. There are two classes attached to the rendered product attribute element that can be targeted with custom styling:
- `product--rendered-attribute`
- `product--rendered-attribute__selected`

---
In the next section, we'll look at how you can create a page that displays multiple products with multiple *add to cart forms*.

[Theming Drupal Guide]: https://www.drupal.org/docs/8/theming
