Create a product type
=====================
For this example we will create a product type for T-shirts
## First create Product attribute
First we will need to create a product attribute. We will create two product attributes - 

* Size
* Color

Goto ``admin/commerce/product-attributes``

Click **Add product attribute**
![](../images/product-attribute-1.png) 

This will open a form.
![](../images/product-attribute-2.png) 

After saving this form, we are required to fill *attribute values*.
![](../images/product-attribute-3.png) 

Now save this form.

Do the same for Color attribute.

## Create Product variation
Now we need a product variation for the image for t-shirts.

Goto ``admin/commerce/config/product-variation-types``

Click **Add product variation type**
![](../images/product-variation-1.png) 

This will open a form.
![](../images/product-variation-2.png) 

Now we will add image field to our product variation.

Click on **Manage fields** and then click on **Add field**
![](../images/product-variation-3.png)

Now select field type Image under *Reference*.
![](../images/product-variation-4.png) 

Then click on **Save and continue**. Then save the settings for image field.

## Create Product Type
Now lets create our product type T-shirt.

Goto ``admin/commerce/config/product-types``

Click on **Add product type**
![](../images/product-type-1.png) 

This will open a form.
![](../images/product-type-2.png) 

Save settings and this will create our T-shirt product type.

### Create a test product
Goto ``admin/commerce/products``. Click **Add product**. Click product type *T-shirt*

![](../images/product-add-1.png) 

Fill new product form and create different variations for different size and color, and click on **Save and publish** button below **Create variation** button.
![](../images/product-add-2.png) 

###Product view.
![](../images/product-add-3.png) 
