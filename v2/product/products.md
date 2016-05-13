# Products

... needs picture of product admin ...

In the new architecture, a Product entity references one or more ProductVariation entities. Thus the product entities
replace D7 product display nodes (and match the D8 nodes visually) while the variation entities replace D7 product
entities. Each product type has a matching product variation type. A product always references variations of the same
type.

... needs picture of product edit ...

Variations are only manageable from the parent product, using Inline Entity Form, which is now a Commerce
dependency. Variation titles are also no longer stored. They are dynamically constructed from the attribute labels
instead, so there’s no more need for auto generation on insert. Deleting a product deletes its variations. Adding
a variation to a product automatically creates a backreference on the variation, accessed via $variation->getProduct().

