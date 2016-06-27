# Purchasable Entities

When it comes to product architectures, there is no one true answer. Furthermore, different clients might have
different needs. That’s why it’s important for Commerce 2.x to support any number of product architectures.

The ProductVariation entity class implements the PurchasableEntityInterface:

... needs screenshot of interface code ...

Any content entity type that implements this interface can be purchased. The order module doesn’t depend on the
product module, the product module just provides the default (and most common) product architecture. A product bundle
module will probably want to define its own product architecture, etc.

Line items have a purchased_entity reference field. The target_type of that reference field is different for each line
item type.

... needs screenshot of line item type edit page ...

Here the line item type points to the product variation entity type, indicating that the "Product variation" line item
type is used to purchase product variations.

Early in the Commerce 2.x cycle we explored the idea of hierarchical products, but after initial exploration found out
that the idea required several months of extra effort (having to rewrite the Tree module, reinvent an IEF like widget,
UX and performance considerations). We removed it from the roadmap with a heavy heart, but now that Commerce 2.x
supports custom product architectures, we can easily explore the idea in contrib at a later date.
