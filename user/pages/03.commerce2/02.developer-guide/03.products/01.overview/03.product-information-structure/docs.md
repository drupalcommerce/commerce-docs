---
title: Product Information Structure
taxonomy:
    category: docs
---

![Product Information Structure](../../images/attribute_entity_relationships.png)

Relationships:
Product fields: product type, stores, variations
Variation fields: variation type, order item field

Implications for product data deletion:
Deleting a product deletes its variations.

Deleting a product attribute deletes its values.

Deleting a product type does not delete its variation type.

Product types cannot be deleted if products of those types exist.