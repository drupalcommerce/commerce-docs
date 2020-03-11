---
title: Displaying quantity on add to cart form
taxonomy:
    category: docs
---

! We need help filling out this section! Feel free to follow the *edit this page* link and contribute.

Brief tutorial on showing quantity, full explanation of customizing add to cart next page.


Previously we learned how to create a product catalog.

![Product catalog page](product_catalog_page.png)

Now, lets customize the *Add to cart* form a little bit. We will learn how to
add quantity field in that form.

Go to `/admin/commerce/config/order-item-types/default/edit/form-display/add_to_cart`.

![Product catalog default fields](product_catalog_default_fields.png)

Drag the **Quantity** field, and **Save** the form.

![Product catalog quantity field](product_catalog_quantity_field.png)

Go ahead and refresh the ``/products`` page.

![Product catalog page with quantity field](product_catalog_page_quantity.png)

And voila!! You can now choose quantity while adding products to cart.
