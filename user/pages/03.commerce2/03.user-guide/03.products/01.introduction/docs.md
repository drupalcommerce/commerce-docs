---
title: Before you begin
taxonomy:
    category: docs
---

Before you begin adding products to your Drupal Commerce store, it is important to understand the product structure. Let us go through an example.

Let us say that your store sells t-shirts. Your t-shirts come in various sizes; such as small, medium, large, and extra large. Each shirt has a graphic but can come in different colors. Each graphic t-shirt is its own product but has its variations of colors available.

How does that translate into Drupal Commerce?

* There is a **t-shirt** product type
* There is a **size** product attribute
* There is a **color** product attribute
* Each graphic _t-shirt_ will be its own product, with variations of color and size.

The following table is an example of variations that could be for a Drupal Commerce Cart graphic t-shirt.

| Product      | Size        | Color |
|------------------------------------|
| Cart graphic | Small       | Grey  |
| Cart graphic | Small       | White |
| Cart graphic | Small       | Black |
| Cart graphic | Medium      | Grey  |
| Cart graphic | Medium      | White |
| Cart graphic | Medium      | Black |
| Cart graphic | Large       | Grey  |
| Cart graphic | Large       | White |
| Cart graphic | Large       | Black |
| Cart graphic | Extra Large | Grey  |
| Cart graphic | Extra Large | White |
| Cart graphic | Extra Large | Black |

We have now defined the product attributes which need to be created. [Read here to learn about how to create, edit, and making some attributes optional](../02.configure-product-attributes)

We will need a product variation type and product type for our t-shirt, [which we discuss in Manage product structure](../03.manage-product-structure).

Finally, you can create products! [Follow the directions in this section on the most common use cases.](../04.create-a-product)
