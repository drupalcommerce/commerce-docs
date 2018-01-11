---
title: Administering Products
taxonomy:
    category: docs
---


<p>There are only about 20 administrative screens that come with Drupal
Commerce. Most of those screens are either Views or Settings Forms. Of particular
interest to store managers are the screens available for Product management.</p>


![Drupal Commerce Store Administration Screen.](Prod-Admin-Store.png)


<div class="caption">
        <p class="caption-title">Store Admin Screen</p>
        <p>This is the screen you will see when you click on "Store" up in the top toolbar.</p>
    </div>
<ul class="screenshot_breadcrumbs">
        <li class="first">Drupal Commerce</li>
        <li>Administration</li>
        <li class="last">Store</li>
    </ul>
</div>


![Product Listing](Prod-Admin-Store-Product.png)


<div class="caption">
        <p class="caption-title">Product Listing</p>
        <p>The Product Listing is pretty bare-bones to start with. Below we've
        made a simple exercise to add a few more filters and an image field.
        Since this is built with Views, the possibilities are literally
        endless.</p>
    </div>
<ul class="screenshot_breadcrumbs">
        <li class="first">Drupal Commerce</li>
        <li>Administration</li>
        <li>Store</li>
        <li class="last">Products</li>
    </ul>
</div>


![Product Type Listing Screen](Prod-Admin-Store-Product-Types.png)


<div class="caption">
        <p class="caption-title">Product Types</p>
        <p>The product types are documented in great detail in the <a
        href="Prod-Entity.html">Products as an Entity</a>.</p>
    </div>
<ul class="screenshot_breadcrumbs">
        <li class="first">Drupal Commerce</li>
        <li>Administration</li>
        <li>Store</li>
        <li>Products</li>
        <li class="last">Product Types</li>
    </ul>
</div>


![Product Type, Manage Fields](Prod-Admin-Store-Product-Fields.png)


<div class="caption">
        <p class="caption-title">Manage Fields</p>
        <p>If you click on "Manage Fields" from the standard Product Type this is what you will see. You will note that it is very similar to editing a content type, using the same interface to add fields to product types.See <a href="/user-guide/product-attributes-variations">Product Attributes &amp; Variations</a> for more information.</p>
    </div>
<ul class="screenshot_breadcrumbs">
        <li class="first">Drupal Commerce</li>
        <li>Administration</li>
        <li>Store</li>
        <li>Products</li>
        <li>Product Types</li>
        <li class="last">Manage Fields</li>
    </ul>
</div>


![This is where you manage the display of the fields for default values.](Prod-Admin-Store-Product-Display.png)


<div class="caption">
        <p class="caption-title">Manage Product Display</p>
        <p>This is where you manage how product fields will display in a variety of contexts, such as in the different view modes for product display nodes.</p>
    </div>
<ul class="screenshot_breadcrumbs">
        <li class="first">Drupal Commerce</li>
        <li>Administration</li>
        <li>Store</li>
        <li>Products</li>
        <li>Product Types</li>
        <li class="last">Manage Display</li>
    </ul>
</div>

![Product Edit Screen](Prod-Admin-Store-Product-Edit.png)


<div class="caption">
        <p class="caption-title">Product Edit Screen</p>
        <p>We've included the product edit screen for your benefit to see the
        Product Entity form in all of it's glory. Pretty simple, we've got the
        Product SKU and Product Title that are required. Additionally, Commerce
        Kickstart has added the Image field. <a
        href="../cart/Cart-MultiCurrency.html">The Price can be changed to allow
        for multiple currencies</a>.</p>
    </div>
<ul class="screenshot_breadcrumbs">
        <li class="first">Drupal Commerce</li>
        <li>Administration</li>
        <li>Store</li>
        <li>Products</li>
        <li class="last">Edit Product</li>
    </ul>
</div>

<h2>Customizing On-site Product Administration</h2>
<p>Because all the back-end interfaces in Drupal Commerce are default Views, you
have the ability to tailor each page to your needs. The product list includes a
simple SKU filter by default but can do much more for you through customization.
Below we include a simple exercise where we add an image field, hide the "type"
field, and extend a product title keyword filter.</p>

![Hover over the product listing view and click Edit](Prod-Admin-ViewEdit-step1.png)


<div class="caption">
        <p class="caption-title">Edit Product View</p>
        <p>To start with we are going to use a shortcut to edit the product
        listing view. This is a very simple way to tweak nearly all of the
        Drupal Commerce administrative screens.</p>
    </div>
<ul class="screenshot_breadcrumbs">
        <li class="first">Drupal Commerce</li>
        <li>Administration</li>
        <li>Store</li>
        <li class="last">Products</li>
    </ul>
</div>


![Rearrange the fields to easily move and remove fields quickly.](Prod-Admin-ViewEdit-step2.png)

<div class="screenshot screenshot-caption">

    <div class="caption">
        <p class="caption-title">Remove Product Type</p>
        <p>Our first step is to remove the product type. This will be replaced
        later on with an exposed filter.</p>
    </div>
<ul class="screenshot_breadcrumbs">
        <li class="first">Administration</li>
        <li>Structure</li>
        <li>Views</li>
        <li class="last">Edit View</li>
    </ul>
</div>


![Lets remove the Product Type Field](Prod-Admin-ViewEdit-step3.png)



<div class="caption">
        <p class="caption-title">Remove Product Type</p>
        <p>This is a great way to remove and re-order the fields on the product
        listing table. It's got a nice drag and drop feature as well as a very
        simple "Remove" capability.</p>
    </div>
<ul class="screenshot_breadcrumbs">
        <li class="first">Administration</li>
        <li>Structure</li>
        <li>Views</li>
        <li>Edit View</li>
        <li class="last">Rearrange Fields</li>
    </ul>
</div>

![We're adding an image field.](Prod-Admin-ViewEdit-step4.png)



<div class="caption">
        <p class="caption-title">Add Image Field</p>
        <p>Go ahead and click "Add" next to the fields list and select "Commerce
        Product: Image" which is about halfway down in the list. Imagine for a
        second how many fields are available here for your use. The most useful
        are probably the "Commerce Product" fields, but there are many more to
        choose from.</p>
    </div>
<ul class="screenshot_breadcrumbs">
        <li class="first">Administration</li>
        <li>Structure</li>
        <li>Views</li>
        <li>Edit View</li>
        <li class="last">Add Image Field</li>
    </ul>
</div>

![We want to remove the default colon and change the image to display as a thumbnail.](Prod-Admin-ViewEdit-step5.png)



<div class="caption">
        <p class="caption-title">Edit Field Image</p>
        <p>We want to remove the default colon and change the image to display
        as a thumbnail. You may want to go back and re-arrange the fields so
        that the image field appears closer to the front of the table. <em>See
        Remove Product Type</em> up above.</p>
    </div>
<ul class="screenshot_breadcrumbs">
        <li class="first">Administration</li>
        <li>Structure</li>
        <li>Views</li>
        <li>Edit View</li>
        <li class="last">Edit Field Image</li>
    </ul>
</div>


![Let's go ahead and add a couple new Exposed Filters](Prod-Admin-ViewEdit-step6.png)

<div class="caption">
        <p class="caption-title">Add Exposed Filters</p>
        <p>Exposed filters are one of the coolest features of Views. They create
        a simple form at the top of the administrative interface and let you
        setup simple keyword searches and drop downs that are
        automatically generated.</p>
    </div>
<ul class="screenshot_breadcrumbs">
        <li class="first">Administration</li>
        <li>Structure</li>
        <li>Views</li>
        <li>Edit View</li>
        <li class="last">Add Exposed Filters</li>
    </ul>
</div>


![Here we're adding two exposed filters. We're going to enable keyword search for Titles and drop down selection for Product Types.](Prod-Admin-ViewEdit-step7.png)


<div class="caption">
        <p class="caption-title">Add Filter Criteria</p>
        <p>Here we're adding two exposed filters. We're going to enable keyword
        search for Titles and drop down selection for Product Types.</p>
    </div>
<ul class="screenshot_breadcrumbs">
        <li class="first">Administration</li>
        <li>Structure</li>
        <li>Views</li>
        <li>Edit View</li>
        <li class="last">Add Filter Criteria</li>
    </ul>
</div>

![For the title, we will expose the filter and change the operator to contains any word.](Prod-Admin-ViewEdit-step8.png)



<div class="caption">
        <p class="caption-title">Configure Title Filter</p>
        <p>For the title, we will expose the filter and change the operator to
        "Contains any word."</p>
    </div>
<ul class="screenshot_breadcrumbs">
        <li class="first">Administration</li>
        <li>Structure</li>
        <li>Views</li>
        <li>Edit View</li>
        <li class="last">Configure Title Filter</li>
    </ul>
</div>


![The Product Type Exposed Filter automatically knows it can be a drop down of all available product types](Prod-Admin-ViewEdit-step9.png)


<div class="caption">
        <p class="caption-title">Configure Type Filter</p>
        <p>The Product Type Exposed Filter automatically knows it can be a drop
        down of all available product types.</p>
    </div>
<ul class="screenshot_breadcrumbs">
        <li class="first">Administration</li>
        <li>Structure</li>
        <li>Views</li>
        <li>Edit View</li>
        <li class="last">Configure Type Filter</li>
    </ul>
</div>

![Lets change the exposed filter submit button from Apply to Search.](Prod-Admin-ViewEdit-step10.png)

<div class="caption">
        <p class="caption-title">Submit Button Change</p>
        <p>Lets change the exposed filter submit button from "Apply" to
        "Search."</p>
    </div>
<ul class="screenshot_breadcrumbs">
        <li class="first">Administration</li>
        <li>Structure</li>
        <li>Views</li>
        <li>Edit View</li>
        <li class="last">Submit Button Change</li>
    </ul>
</div>


![It's really that simple.](Prod-Admin-ViewEdit-step11.png)


<div class="caption">
        <p class="caption-title">Change Submit Text</p>
        <p>It's really that simple. Next we will view our product administration
        screen. Don't forget to save your View!</p>
    </div>
<ul class="screenshot_breadcrumbs">
        <li class="first">Administration</li>
        <li>Structure</li>
        <li>Views</li>
        <li>Edit View</li>
        <li class="last">Change Submit Text</li>
    </ul>
</div>


![Final Customized Drupal Commerce Product Administration Screen](Prod-Admin-ViewEdit-step12.png)


<div class="caption">
        <p class="caption-title">Product Admin Screen</p>
        <p>Final Customized Drupal Commerce Product Administration Screen.</p>
    </div>
<ul class="screenshot_breadcrumbs">
        <li class="first">Drupal Commerce</li>
        <li>Administration</li>
        <li>Store</li>
        <li class="last">Products</li>
    </ul>
</div>
<h2>Contrib Product Administration</h2>
<p>If you don't want to tweak Views on your own, we recommend using one or more
of the modules listed below to tweak your Drupal Commerce Product Administration
experience:</p>
<ul>
    <li>Editable Fields - http://drupal.org/project/editablefields</li>
    <li>Commerce VBO Views - http://drupal.org/project/commerce_vbo_views</li>
    <li>Admin VBO Views - http://drupal.org/project/admin_vbo_views</li>
</ul>
<p>On the drupalcommerce.org community site, there is a community-fueled list of
all available <a href=""http://www.drupalcommerce.org/contrib/admin>Drupal
Commerce Administrative Modules</a>.</p>
<h2>Bulk Product Management with VBO</h2>
<p>Using Views Bulk Operations will let you perform batch processes across your
whole product list or a subset of the list using specific operations or Rules
based operations. The Commerce VBO Views module provides a replacement default
product View with a VBO version you can use as an example. Note that it does not
overwrite the existing View but disables the default View and enables the VBO
View at the same URL.</p>
<p>Further integrating Editable Fields with the VBO powered View will also let
you edit individual field values within the View itself even without a batch
process.</p>
</div>