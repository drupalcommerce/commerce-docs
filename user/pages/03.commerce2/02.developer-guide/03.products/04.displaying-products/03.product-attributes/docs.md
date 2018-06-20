---
title: Product attributes
taxonomy:
    category: docs
---

This section describes how you can modify the product attributes that appear on the "Add to cart form" to do things like display a color swatch instead of just a color name for a customer to select.

![Add to cart form](../../images/add-to-cart-ui.jpg)

#### Prerequisites
- [Add to cart form documentation](../02.add-to-cart-form)
- [Product attributes](../../03.products/01.product-attributes)

>In the [Add to cart form documentation](../02.add-to-cart-form), we looked at the difference between the "Product variation attributes" widget and the "Product variation title" widget. To customize the display of individual product attributes, like Color or Size, the "Product variation attributes widget" must be selected on the Add to cart form display for the product's order item type.

### Product attribute element types

There are three options for how a product attribute is displayed on the add to cart form. The first two options, radio buttons and select list, simply display the Name of each value for the attribute. In the image above, the Size attribute values are displayed with the Select list element type. It is the third option, "Rendered attribute", that provides functionality for displaying attributes in alternative ways.

#### Rendered attribute element type
The rendered attribute element type works by using the Add to Cart Form view display mode for the product attribute. (The default display mode for the product attribute is used if the Add to Cart Form display mode is not explicitly enabled.)

To access this administrative UI, navigate to your list of Product attributes at `/admin/commerce/product-attributes` and click the "Edit" button for the product attribute. Select "Rendered attribute" for the Element type and then click the "Save" button at the bottom of the page.

![Select rendered attributes element type](../../images/product-attributes-ui-1.jpg)

Next, navigate to the "Manage display" tab, where you'll see the Name field as well as any additional fields you added for this product attribute. Here we've left the "Color" product attribute (that we created in the ..docs) configured with its defaults. You can see that the Name field label is hidden, but the Color field label is displayed above the color text, which is displayed as its hex value.

![Color attribute manage display ui](../../images/product-attributes-ui-2.jpg)

To get the color swatches appearing as we'd like, we'll move the "Name" field to he Disabled section, hide the "Color" field label, change its Format to "Color swatch", and adjust its configuration like this:

![Color attribute manage display ui](../../images/product-attributes-ui-3.jpg)

A similar approach can be taken for displaying an attribute as an image:
1. Add an Image field to the product attribute.
2. Select "Rendered attribute" as the Element type.
3. Configure the attribute's display so that only the image field is rendered.

---
In the next section, product theming...

[Drupal 8: Hooks, Events, and Event Subscribers]: https://www.daggerhart.com/drupal-8-hooks-events-event-subscribers/
[Drupal 8 Event Subscribers - the successor to alter hooks]: https://www.computerminds.co.uk/drupal-code/drupal-8-event-subscribers-successor-alter-hooks
