---
title: Configure product attributes
taxonomy:
    category: docs
---

! We need help filling out this section! Feel free to follow the *edit this page* link and contribute.

![Product Attribute Entity Relationships](tshirt_drupalcon.png)

Imagine you need to sell a DrupalCon t-shirt. This t-shirt comes in
different sizes and colors. Each combination of size and color has its
own SKU, so you know which color and size the customer has purchased and
you can track exactly how many of each combination you have in stock.

![Product Attribute Entity Relationships](../images/attribute_entity_relationships.png)

Color and size are product attributes. Blue and small are product
attribute values, belonging to the mentioned attributes. The combination
of attribute values (with a SKU and a price) is called a product
variation. These variations are grouped inside a product.

Creating Attributes and their Values
------------------------------------

For our t-shirt we need two attributes: color and size. Let's start by
creating the color attribute. Go to
``admin/commerce/product-attributes`` and click the Add product attribute link.

![Product Attribute Creation](../images/attribute_create_02.png)

After you have created the color attribute, we need to define at least
one value. Normally we would simply say the color is "blue" or "red" but
sometimes you might need to further define the attribute using fields.
Adding fields is covered in detail later on in the documentation.

The product attribute values user interface allows creating and
re-ordering multiple values at the same time and a very powerful
translation capability:

![Product Attribute Value Creation](../images/attribute_create_03.png)

Next, you will need to add the attribute to the product variation type.
You can find these at ``/admin/commerce/config/product-variation-types``
and you just need to add/edit a product variation type that requires
your new attribute.

![Adding Product Attribute to Product Variation](../images/attribute_create_04.png)

After you have added "Color" and the various colors your t-shirts are
available in, the next step is to add that "color" attribute to our
product. Store administrators can do this on the product variation type
form, the checkbox in the last step automatically created entity
referenced fields as needed:

![Example Product variation form](../images/attribute_create_05.png)

Adding fields to Attributes
---------------------------

Product attributes are so much more than a word. Often times they
represent a differentiation between products that is useful to call out
visually for customers. The fieldable attribute value lets the
information architect decide what best describes this attribute. Like
any other fieldable entity, you can locate the list of attribute bundles
and click edit fields:

``/admin/commerce/product-attributes``

![Locating list of attributes](../images/attribute_create_01.png)

Add a field as you would expect. Most fields are supported and will
automatically show up when you go to add attribute values:

![Example of attribute with more than one attribute](../images/attribute_create_03.png)

Editing Attributes
------------------

![How do you edit the attribute values?](../images/attribute_edit_01.png)

Editing the attribute values is pretty easy. Simply locate the attribute
type that has the values you want to edit:
``/admin/commerce/product-attributes`` And click "edit" and you will be
taken to a screen to edit all the attributes of that type.

Optional Attributes
-------------------

After creating attributes, the product variation type needs to know that
it uses the attribute. The product variations are at
``/admin/commerce/config/product-variation-types`` and once you've
clicked on the attribute you want...

![Adding Product Attribute to Product Variation](../images/attribute_create_04.png)

Fields are added to the variation type that can then be modified. By
default, all attribute fields are required. If your attribute is
optional (perhaps some of the drupalcon t-shirts only come in blue),
then you can locate the manage fields of your particular product
variation type and make the ``color`` attribute optional by following
these steps:

1. Go to ``/admin/commerce/config/product-variation-types``
2. Click the drop down next to the variation type you want and click
   "manage fields" 
   
   ![](../images/product_variation_manage_fields.gif)
3. Un-select the "required" checkbox to make the attribute optional.

![Un-select the required checkbox](../images/attribute_optional.png)