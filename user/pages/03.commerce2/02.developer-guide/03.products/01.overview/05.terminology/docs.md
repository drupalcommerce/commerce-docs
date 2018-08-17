---
title: Product Terminology
taxonomy:
    category: docs
---

The following is an introduction to terminology used in Drupal Commerce products.

| Term  | What does it mean? |
|----------------------------|
| <nobr>Add to cart form</nobr> | While not strictly a *term*, you'll find, "add to cart form" mentioned throughout the product documentation. When developing your Drupal Commerce site, you'll genreally want to include the add to cart form on pages of your site that display products. The add to cart form allows customers to select a specific variation of a product and add that item to their shopping cart. |
| Attribute | A product attribute is something about the product which creates a unique choice. For clothing this would be the color and size. A subscription may have monthly or annual billing options. |
| Attribute value | A product attribute value is one distinct choice for an attribute. For example, attribute values for a *color* attribute might be red, blue, yellow, and green. |
| Product | The actual product, such as a sweatshirt or the book "Moby Dick", which contains all of its variations. Every product has at least one variation. |
| Product type | A product type, like clothing or a book, defines a group of products. Every product has exactly one product type, and each product type has exactly one variation type. Drupal Commerce does not provide a set list of product types; instead, you are free to create whatever product types work best for your products. |
| Variation| A product variation represents an option of specific attributes for a product. For example, the Large Blue sweatshirt versus the Medium Red sweatshirt. Or the paperback or hardcover version of a book. This is what is purchased and has a price. It has a sku that must be unique across all products and variations. |
| Variation type | A product variation type defines the set of attributes applicable to the products of that type. For example, a sweatshirt variation type might have size and color as its attributes. A book variation type might have format as its only attribute. |
