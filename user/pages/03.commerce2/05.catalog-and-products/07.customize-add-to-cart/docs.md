---
title: Customize the add to cart form
taxonomy:
    category: docs
---

Previously we learned how to create a product catalog.

.. figure:: images/product_catalog_page.png
   :alt: Product catalog page

Now, lets customize the *Add to cart* form a little bit. We will learn how to
add quantity field in that form.

Go to ``admin/commerce/config/order-item-types/default/edit/form-display/add_to_cart``.

.. figure:: images/product_catalog_default_fields.png
   :alt: Product catalog default fields

Drag the **Quantity** field, and **Save** the form.

.. figure:: images/product_catalog_quantity_field.png
   :alt: Product catalog quantity field

Go ahead and refresh the ``/products`` page.

.. figure:: images/product_catalog_page_quantity.png
   :alt: Product catalog page with quantity field

And voila!! You can now choose quantity while adding products to cart.
