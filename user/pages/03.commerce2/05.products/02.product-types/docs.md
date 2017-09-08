---
title: Create a product type
taxonomy:
    category: docs
---


Imagine a new product arrives in your store, let's say T-shirt. You have never sold t-shirt in your store and now you have to sell it in your store. So for this new product, you will need to create a new product type in your drupal commerce site. This is not a hard process, below is a step by step guide.

Product attribute
------------------
Not all products have attributes. For our example product type, we're creating t-shirts. T-shirts usually come in colors and sizes. One type of t-shirt may have a few sizes that it comes in. Those sizes are what we call attributes. And those attributes can be created like this:

We will create two product attributes -

* Size
* Color

Goto ``admin/commerce/product-attributes``

OR

.. figure:: images/product-attribute-4.png
	:alt: Click on Product attribute

Click **Add product attribute**

.. figure:: images/product-attribute-1.png
	:alt: Click on Add product attribute

This will open a form.

.. figure:: images/product-attribute-2.png
	:alt: Fill Product attribute form

After saving this form, we are required to fill *attribute values*.

.. figure:: images/product-attribute-3.png
	:alt: Fill attribute values

Now save this form.

Do the same for Color attribute.

Create Product variation
--------------------------

Now we need a product variation for the image for t-shirts.

Goto ``admin/commerce/config/product-variation-types``

OR

.. figure:: images/product-variation-5.png
	:alt: Click on Product variation type

Click **Add product variation type**

.. figure:: images/product-variation-1.png
	:alt: Click on Add product variation type

This will open a form.

.. figure:: images/product-variation-2.png
	:alt: Fill product variation form

Now we will add image field to our product variation.

Click on **Manage fields** and then click on **Add field**

.. figure:: images/product-variation-3.png
	:alt: Click Add field under Manage fields tab

Now select field type Image under *Reference*.

.. figure:: images/product-variation-4.png
	:alt: Create an image field

Then click on **Save and continue**. Then save the settings for image field.

In the above steps we could have skipped adding image field in product variation and instead we could have added this field to our new product type which we are going to create in next step. But that way image will be same for every variation. We don't want that. We want our image to change when we change product variation. In easier words, we want yellow t-shirt image to appear when we select yellow color in select list. And for that we added image field in product variation and not in new product type.

Create Product Type
--------------------

By default drupal commerce comes with a *default* product type. But in our case, our requirements are different and our product have different attributes than what ``default`` product type come preloaded with. Therefore, we need a new product type for our T-shirts. So lets create our T-shirt product type.

Goto ``admin/commerce/config/product-types``

OR

.. figure:: images/product-type-3.png
	:alt: Click on Product types

Click on **Add product type**

.. figure:: images/product-type-1.png
	:alt: Click on Add product type

This will open a form.

.. figure:: images/product-type-2.png
	:alt: Fill product type form

Save settings and this will create our T-shirt product type.

Create a test product
----------------------

Goto ``admin/commerce/products``.

OR

.. figure:: images/product-add-4.png
	:alt: Click on Products

Then click on *Add product*.

.. figure:: images/product-add-5.png
	:alt: Click Add product

Now click on new product type that you created, in my case its *T-shirt*

.. figure:: images/product-add-1.png
	:alt: Click T-shirt

Fill new product form and create different variations for different size and color, and click on **Save and publish** button below **Create variation** button.

.. figure:: images/product-add-6.png
	:alt: Fill form and create variations

.. figure:: images/product-add-2.png
	:alt: Fill form and create variations

Product view
-------------

You can view all your added product by click on **Products** under ``Commerce`` menu link.

.. figure:: images/product-add-4.png
	:alt: Click on Products

.. figure:: images/product-view-1.png
	:alt: View your products in list

.. figure:: images/product-add-3.png
	:alt: View Product on product page
