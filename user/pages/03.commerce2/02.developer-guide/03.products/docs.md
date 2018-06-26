---
title: Products
taxonomy:
    category: docs
---

Reference the Commerce demo module as a source for many of the examples in the documentation. Documentation will explain how to build a site that includes all functionality in the Commerce demo module.

#### [Overview](01.overview)
- NOTE: I expect this section of the Products documentation will be the last to be completed, since it should serve as a reference/additional/high-level explanation of concepts relevant to all other sections. Essentially, the idea is that some people like to try to understand the "big picture" before diving into specifics; other people would prefer to just get started and then jump back to "explanations" whenever they get stuck or something is confusing. So I'll keep adding to this section as I work on the others and then re-organize and clean up as necessary as the end.
- gettings started page?
- include reference page for glossary of terminology
- relationship diagram, product structure
- entities: Product, ProductAttribute, ProductAttributeValue, ProductType, ProductVariation, ProductVariationType
- also: Purchasable entities, Store entity, Price field, Order item types = order line items

#### [Product architecture](02.product-architecture)
- Create a simple, single-variation product type.
- Create product attributes and a product type with multiple variations.
- Add custom fields to product types, product variation types, and product attributes.
- Create product categories.
- Various approaches to product architecture.
- Multilingual products.

#### [Product management](03.product-management)
- Design and customize the product management experience for administrative users.
- Create product content programmatically, via bulk importing, and using data entry forms.

#### [Displaying products](04.displaying-products)
- Customize the display of products on your site.
- Use the "Add to cart form" to allow customers to select products and add them to their carts.

#### Marketing products
- links to drupal.org docs on taxonomies, views, (flag module?)
- product categories / tags (menus for categories?)
- includes SEO (links to relevant modules: pathauto, etc.)
- product reviews
- grouped / related products
- upselling / cross-selling / featured products
- add-ons?
- product catalog (facets, search api)
- product images, galleries


Other product-related that will be addressed in separate sections:
- pricing, currencies, promotions
- shipping
- stock
- tax
- subscriptions / recurring
- put concept of purchasable entity into section on "orders" b/c product module just provides the default (and most common) product architecture

