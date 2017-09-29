---
title: Theme a product page
taxonomy:
    category: docs
---


## Managing the display of the product

Once the tshirt has important content fields and the t-shirt variation
fields have differentiating fields figured out, the product page may not
look as clean the designer envisioned. It's likely that there are a
number of labels for fields (like price, product image, SKU, etc) that
you would rather not display. There are two different ``Manage Display``
locations you will need to manage in order to get the desired output on
your product page.

>    **NOTE**: It's recommended that if you are using display modes to
    affect the product pages, that you use the "show weights" check box.
    The reason for this is that when a product is rendered, all fields,
    from the variation to the actual product get sorted based on weight.
    So if you just use the drag and drop methods, you will not get the
    granular control you might expect.

To fully control the display of all the fields it's helpful to think of
the fields as being a part of one big group.

![Manage Display field weight graphic](product_display_visual.png)

Above, our T-shirt Product fields (body, variations) are rendered with
our T-shirt Product Variation fields (Price, Image). In order to achieve
this order, the field weights must be manually set to go in order, as if
they were in a large group.

Product field weight can be managed here:
``admin/commerce/config/product-types``

Product Variation field weight can be managed here:
``admin/commerce/config/product-variation-types``

>    **FANCY FEATURE ALERT**: You may have noticed that product variation
    fields can be displayed INDEPENDENTLY of the variations field. Lots
    of work has gone in to making sure these fields get replaced easily
    and consistently when a new product is selected on the add-to-cart
    form. This was developed specifically to allow fine-tuned control of
    how a store would want to present different pieces of information.
    Perhaps you really need the picture of the selected t-shirt to
    appear before the body field of the product. Just change the weight
    :)


## Twig

To do this, just create a copy of ``page.html.twig`` file of your base theme,
and name it as ``page--product.html.twig``. You can move that file to your
custom theme.

Make changes in ``page--product.html.twig`` and it will reflect only in the
product pages.

Don't forget to **rebuild cache**.
