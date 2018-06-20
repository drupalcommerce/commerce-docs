---
title: Products
taxonomy:
    category: docs
---

Description of major sections:

01. Concepts
- NOTE: I expect this section of the Products documentation will be the last to be completed, since it should serve as a reference/additional/high-level explanation of concepts relevant to all other sections. Essentially, the idea is that some people like to try to understand the "big picture" before diving into specifics; other people would prefer to just get started and then jump back to "explanations" whenever they get stuck or something is confusing. So I'll keep adding to this section as I work on the others and then re-organize and clean up as necessary as the end.
- include reference page for glossary of terminology
- relationship diagram, product structure
- entities: Product, ProductAttribute, ProductAttributeValue, ProductType, ProductVariation, ProductVariationType
- also: Purchasable entities, Store entity, Price field, Order item types = order line items

#### [Basic setup](02.basic-setup)
- step-by-step config for attributes, product/variation types ("config creation" in developer guide, "content creation" in user guide)
- using non-attribute fields (including images, files) = supplier/vendor, manufacturer/brand, etc.
- adding fields to attributes (color hex, alternative names, etc.)
- links to drupal.org docs on custom fields
- various approaches to product architecture
- product specification content type
- auto-variation names
- default variations
- products without attributes / single variation products
- configurable products (commerce customizable products)
- downloadable products / virtual products
- physical products -> link to shipping module docs
- subscriptions -> link to recurring module docs
- bundles
- content translation module
- creating config from code ("code recipes") in a "Reference" section at the end

#### [Product management](03.product-management)
- Design and customize the product management experience for administrative users.
- Create product content programmatically, via bulk importing, and using data entry forms.

#### [Displaying products](04.displaying-products)
- formatters, widgets, templates, css, preprocess functions
- commerce product rendered attribute element, various services, hook alters
- add-to-cart form
- product images
- display multiple products

05. Marketing products
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

