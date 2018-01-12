---
title: Adding a New Product
taxonomy:
    category: docs
---

<div class="docs-enhanced">
  <p>There are two topics at play here. </p>
<ol>
  <li>First, we have the simple "How do I add another product to my site?" question that is easy to answer (see below). <a href="#howaddproducts">Read More</a>.</li>
  <li>Second, we have the much more common "How do I add a new type of product variation?" This is typically asked at the beginning of creating a site. And we have worked hard in Commerce Kickstart 2 to make the interface for creating your first Product Variation Type very simple. <a href="#">Read More</a>.</li>
</ol>

<h3 id="howaddproducts">How do I add another product to my site?</h3>

<div class="screenshot screenshot-caption">
    <div class="img">
        <a href="/user/pages/02.commerce1/03.commerce-kickstart-2/03.Products/01.Adding-a-New-Product/CK-Product-New-01_1.png">
          <img src="/user/pages/02.commerce1/03.commerce-kickstart-2/03.Products/01.Adding-a-New-Product/CK-Product-New-01_1.png" alt="Mouseover the word Products in the menu and select Add a Product." />
       </a>
    </div>
    <div class="caption">
        <p class="caption-title">Add a Product</p>
        <p>Mouseover the word "Products" in the menu and select "Add a Product." That will give  you a nice listing of the available Products that you can add to your site. If you want to create a new kind of product, definitely checkout the next section, "How do I add a new type of product variation?"</p>
    </div>
    <ul class="screenshot_breadcrumbs">
        <li class="first">Administration</li>
        <li>Products</li>
        <li>Actions</li>
        <li class="last">Add a Product</li>
    </ul>
</div>
<div class="screenshot screenshot-caption">
    <div class="img">
        <a href="/user/pages/02.commerce1/03.commerce-kickstart-2/03.Products/01.Adding-a-New-Product/CK-Product-New-02.png">
          <img src="/user/pages/02.commerce1/03.commerce-kickstart-2/03.Products/01.Adding-a-New-Product/CK-Product-New-02.png" alt="The Product Creation Form has three sections: Title/Description, Product Variations, and Catalog Management." />
       </a>
    </div>
    <div class="caption">
        <p class="caption-title">Product Form</p>
        <p>The Product Creation Form has three sections: Title/Description, Product Variations, and Catalog Management. The Title/Description area is the Product Display and should be filled out in a way that describes the entire product, not a specific variation. For products that have a price and other attributes, you can create variations. This could one product variation or many. Finally, at the end we have our Catalog Options. These are really just a set of taxonomy vocabularies that we use to create Facets and organize our Catalog on the Demo store.</p>
    </div>
    <ul class="screenshot_breadcrumbs">
        <li class="first">Administration</li>
        <li>Products</li>
        <li>Actions</li>
        <li class="last">Add a Product</li>
    </ul>
</div>

<h3>How do I add a new type of product variation?</h3>
<div class="screenshot screenshot-caption">
    <div class="img">
        <a href="/user/pages/02.commerce1/03.commerce-kickstart-2/03.Products/01.Adding-a-New-Product/CK-Product-New-03.png">
          <img src="/user/pages/02.commerce1/03.commerce-kickstart-2/03.Products/01.Adding-a-New-Product/CK-Product-New-03.png" alt="Mouseover the word Products in the menu and select Variation types." />
       </a>
    </div>
    <div class="caption">
        <p class="caption-title">Navigate</p>
        <p>Mouseover the word "Products" in the menu and select "Variation types."</p>
    </div>
    <ul class="screenshot_breadcrumbs">
        <li class="first">Administration</li>
        <li>Store Settings</li>
        <li>Product Settings</li>
        <li class="last">Variation Types</li>
    </ul>
</div>
<div class="screenshot screenshot-caption">
    <div class="img">
        <a href="/user/pages/02.commerce1/03.commerce-kickstart-2/03.Products/01.Adding-a-New-Product/CK-Product-New-04.png">
          <img src="/user/pages/02.commerce1/03.commerce-kickstart-2/03.Products/01.Adding-a-New-Product/CK-Product-New-04.png" alt="First, you should read the disclaimer at the top of the page. Second, go ahead and click on the button." />
       </a>
    </div>
    <div class="caption">
        <p class="caption-title">Click Add Product Variation</p>
        <p>First, you should read the disclaimer at the top of the page. Second, go ahead and click on the button titled "Add product variation type."</p>
    </div>
    <ul class="screenshot_breadcrumbs">
        <li class="first">Administration</li>
        <li>Store Settings</li>
        <li>Product Settings</li>
        <li class="last">Variation Types</li>
    </ul>
</div>
<div class="screenshot screenshot-caption">
    <div class="img">
        <a href="/user/pages/02.commerce1/03.commerce-kickstart-2/03.Products/01.Adding-a-New-Product/CK-Product-New-05.png">
          <img src="/user/pages/02.commerce1/03.commerce-kickstart-2/03.Products/01.Adding-a-New-Product/CK-Product-New-05.png" alt="Just like any entity type creation form (think Content Types) you can name the type of product variation." />
       </a>
    </div>
    <div class="caption">
        <p class="caption-title">Variation Type Form</p>
        <p>Just like any entity type creation form (think Content Types) you can name the type of product variation. Additionally, there are three checkboxes here that will save you gobs of time: Revisions, Automatic SKU, and Create matching product display type. That third option will save you an amazing amount of time that you can quickly get up and running.</p>
    </div>
    <ul class="screenshot_breadcrumbs">
        <li class="first">Administration</li>
        <li>Store Settings</li>
        <li>Product Settings</li>
        <li class="last">Variation Types</li>
    </ul>
</div>

<p>Now, we will stop the screenshots here for a second to pause and think on what we have created here. When you click "Save product variation type" there will be a content type created as well named the exact same thing with a product reference field added to it and the inline entity reference settings set up for you.</p>

<p>But you now have two things: A Product Variation Type and a Content type that displays Products of the new variation. Put another way, you now have your Product Display and Product Variation set up for you. The trick is now determining whether you want your fields to be on the Product Variations (things that change the price) or if  you want to add fields to the Product Display (things that singularly describe the group of products for each URL).</p> 

<p>So this means you have a set of fields for both the Product Display (the node that keeps track of product variations and gives us a viewable path, among other things) and the Product Variation (the actual product entity that can have more than one added to each display).</p>

<p>So from this point, we recommend you read more on Product Variations and Product Displays:</p>

<ul>
  <li><a href="/commerce-kickstart-2/choosing-between-page-or-variation">Choosing between Page or Variation</a></li>
  <li><a href="/user-guide/product-attributes-variations">Product Attributes &amp; Variations</a></li>
  <li><a href="/user-guide/product-displays">Product Displays</a></li>
  <li><a href="/user-guide/administering-products">Administering Products</a></li>
</ul>
</div>