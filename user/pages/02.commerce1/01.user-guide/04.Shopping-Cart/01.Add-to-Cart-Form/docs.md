---
title: Add to Cart Form
taxonomy:
    category: docs
---

<div class="docs-enhanced">
<div class="screenshot">
    <img src="/user/pages/02.commerce1/01.user-guide/04.Shopping-Cart/01.Add-to-Cart-Form/Add-to-Cart-Drupal-Commerce-1.png" alt="Where do
    you configure the Add-to-Cart button in Drupal Commerce?" />
</div>
<p>Almost everything in Drupal Commerce is put together using a common Drupal
pattern: Content (<a href="http://drupal.org/node/1261744">entity and fields
system</a>), <a
href="http://dev.nodeone.se/en/taming-the-beast-learn-views-with-nodeone">Views</a>
(listing things), and <a href="http://dev.nodeone.se/node/984">Rules</a> (taking
actions on events). The Add-to-Cart button and form are no different. We use the
fields and entities to format product references into what is known as the "Add
to Cart Form." There are really two topics we are discussing here.</p>
<ul>
    <li><strong>Add-to-Cart Button</strong> - The button that literally creates
    an order with a status of "Shopping Cart." (Sidenote&mdash;Commerce
    Guys has a blog post on <a
    href="http://commerceguys.com/blog/creating-orders-drupal-commerce-api">creating
    an order using PHP and the API</a>)</li>
    <li><strong>Add-to-Cart Form</strong> - The form that is displayed along
    with the Add-to-Cart button. This is the area that gets ajaxified when you
    select different product attributes (like color or size of shirt) and
    updates the image and price.</li>
</ul>
<h2>Button & Form Configuration using Fields</h2>
<p>Since Drupal Commerce 1.2, we've enhanced the Add-to-Cart magic with
dependable configuration settings. By altering forms in the Field UI, we now
embed options to help you create complex Add-to-Cart forms. Read on to learn how
to access, alter, and create Add-to-Cart buttons.</p>
<ol class="inpagenav">
    <li><a href="#product-reference-field">Product Reference Field</a> -
    Configuring the Add-to-Cart button that shows up in a display node.</li>
    <li><a href="#add-to-cart-examples">Add-to-Cart Examples</a> - Helping you
    understand the power of being able to configure these buttons on a product
    entity level.</li>
    <li><a href="#line-item-field">Line Item Field</a> - An Add-to-Cart
    button that is configured on the Line Item level.</li>
</ol>
<h3 id="product-reference-field">Product Reference Fields</h3>
<div class="screenshot screenshot-caption">
    <div class="img">
        <a href="/user/pages/02.commerce1/01.user-guide/04.Shopping-Cart/01.Add-to-Cart-Form/Add-to-Cart-Drupal-Commerce-Product-Reference-Field.png">
        <img src="/user/pages/02.commerce1/01.user-guide/04.Shopping-Cart/01.Add-to-Cart-Form/Add-to-Cart-Drupal-Commerce-Product-Reference-Field.png"
             alt="Product Reference Field Configuration Screen" /></a>
    </div>
    <div class="caption">
        <p class="caption-title">Product Reference Screenshot</p>
        <p>When you add a <a href="../products/Prod-Disp-Node.html">product
        reference field to an entity</a>, you have the option of injecting
        fields from the referenced products into the display of the referencing
        entity.</p>
    </div>
    <ul class="screenshot_breadcrumbs">
        <li class="first">Administration</li>
        <li>Structure</li>
        <li>Content Types</li>
        <li>Manage Product Display</li>
        <li>Fields</li>
        <li class="last">field_product</li>
    </ul>
</div>
<p>Any field attached to a product may be rendered into the display of an entity
(i.e. node). This feature must be enabled in the product reference field's
settings form. We call this <em>field injection</em>, because the field is
attached to the product itself but can be displayed in the referencing entities
to make this extra product data visible to customers.</p>

<div class="screenshot screenshot-caption">
    <div class="img">
        <a href="/user/pages/02.commerce1/01.user-guide/04.Shopping-Cart/01.Add-to-Cart-Form/Add-to-Cart-Drupal-Commerce-Product-Display-Formatter.png">
        <img src="/user/pages/02.commerce1/01.user-guide/04.Shopping-Cart/01.Add-to-Cart-Form/Add-to-Cart-Drupal-Commerce-Product-Display-Formatter.png"
             alt="Product Reference Field Configuration Screen" /></a>
    </div>
    <div class="caption">
        <p class="caption-title">Product Display Formatter</p>
        <p>Because these are fields attached to the product itself, you must
        update the field display settings on the product type to change the
        display formatter and/or the field's global visibility. </p>
    </div>
    <ul class="screenshot_breadcrumbs">
        <li class="first">Administration</li>
        <li>Store</li>
        <li>Products</li>
        <li>Product Types</li>
        <li class="last">Manage Display</li>
    </ul>
</div>
<p>Then in the field display settings for
each entity type that contains a product reference field, you will see all
available product reference fields to reorder them relative to other fields on
the entity or hide them.</p>
<p>A great example of a product reference field is the one found in the Product
display node type that Commerce Kickstart creates. The product reference field
enables prices, images, and other fields attached to your products to be
displayed in the node along with an Add-to-Cart button.</p>
<h3 id="add-to-cart-examples">Attribute Fields & Add-to-Cart Form Examples</h3>
<div class="screenshot">
    <a href="/user/pages/02.commerce1/01.user-guide/04.Shopping-Cart/01.Add-to-Cart-Form/Add-to-Cart-form-goal.png"><img
    src="/user/pages/02.commerce1/01.user-guide/04.Shopping-Cart/01.Add-to-Cart-Form/Add-to-Cart-form-goal.png" alt="Changing an attribute
    should update the price and picture." /></a>
</div>
<p>The most obvious example is the basic price field attached to products. In
most cases, you will need the price displayed along with the product description
and Add to Cart form.</p>
<div class="screenshot screenshot-caption">
    <div class="img">
        <a href="/user/pages/02.commerce1/01.user-guide/04.Shopping-Cart/01.Add-to-Cart-Form/Add-to-Cart-Custom-Field.png">
            <img src="/user/pages/02.commerce1/01.user-guide/04.Shopping-Cart/01.Add-to-Cart-Form/Add-to-Cart-Custom-Field.png"
                 alt="Custom Field Configuration" />
        </a>
    </div>
    <div class="caption">
        <p class="caption-title">Custom Field</p>
        <p>If you need to create a dropdown that will change the price, you can
        easily accomplish this by creating a custom field for your product
        entity and making sure to click the "Attribute Field Settings" on the
        field form.</p>
        <p>Be sure not to add this field to your Product Display content type,
        you want to add it to the Product Type.</p>
    </div>
    <ul class="screenshot_breadcrumbs">
        <li class="first">Administration</li>
        <li>Structure</li>
        <li>Content Types</li>
        <li>Product Display</li>
        <li class="last">Manage fields</li>
    </ul>
</div>
<p>Another use case is the product image field created during the Commerce
Kickstart installation. This is especially the case for groups of products where
each variation contains a unique image (e.g. for a different color of the
product, such as a t-shirt color or t-shirt size). You will want this image
rendered into the node display that groups these products together.</p>
<div class="screenshot screenshot-caption">
    <div class="img">
        <a href="/user/pages/02.commerce1/01.user-guide/04.Shopping-Cart/01.Add-to-Cart-Form/Add-to-Cart-Form-Manage-Display.png">
            <img src="/user/pages/02.commerce1/01.user-guide/04.Shopping-Cart/01.Add-to-Cart-Form/Add-to-Cart-Form-Manage-Display.png"
                 alt="Add to Cart Manage Display Form" />
        </a>
    </div>
    <div class="caption">
        <p class="caption-title">Manage Display Form</p>
        <p>How does it know that I want my sizes to show up in the drop down?
        The Product Display node is setup to aggregate the various attribute
        fields into one "Add to Cart form" as pictured here.</p>
    </div>
    <ul class="screenshot_breadcrumbs">
        <li class="first">Administration</li>
        <li>Store</li>
        <li>Products</li>
        <li class="last">Product Types</li>
    </ul>
</div>
<p>When the customer updates the Add to Cart form for a group of products to
select a different product from the group, the price, image, and other injected
fields will be updated to represent the newly selected product.</p>
<h4 id="line-item-field">Custom Line Items (AKA Customizable
Products/Donations/Services)</h4>
<p>Occasionally you may want to customize an attribute of the product for each
order. For example, if you wanted someone to add their own name to your t-shirts
or add an engraving for an additional charge. We cover this thoroughly in the <a
href="../lineitems/LineItem-Customize.html">Customizable Line Items</a>
topic.</p>
<p>There is also a video that goes through this idea of customizing the
product.</p>
<iframe src="https://player.vimeo.com/video/31459435?byline=0&amp;portrait=0" width="620" height="434" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe> <p><a href="http://vimeo.com/31459435">Introduction to Line Items in Drupal Commerce</a> from <a href="https://vimeo.com/user5912539">Randy Fay</a> on <a href="http://vimeo.com">Vimeo</a>.</p>
</div>