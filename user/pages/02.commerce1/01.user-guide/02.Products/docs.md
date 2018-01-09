---
title: Products
taxonomy:
    category: docs
---
<div class="docs-enhanced">
<p>Product Types represent a standalone product or potentially a single variation in a group of related products (such as a single size of a style of t-shirt). Every product must have a Title, a unique merchant-defined SKU, and a base price in the default Price field.  Additional fields to represent internal data or product attributes may be added as necessary, and new product types can be created to facilitate multiple sets of fields.</p>


![Drupal Commerce Entities](commerce-docs/user/pages/02.commerce1/01.user-guide/02.Products/Entity.png) 

</div>
<p>The above graphic shows all of the Drupal Commerce Entities. Note the ubiquitous Drupal node is "grouping" or "referencing" various products. We achieve this with a product reference field. When you add a product to your cart and/or you go to checkout, an order is created with a line item that references your product. Finally, the customer is taken through the checkout process and the order status is hopefully updated to "complete."</p>

<div class="screenshot">
    <a href="/sites/default/files/docs/CK-Product-Entity.png">
        <img src="/sites/default/files/docs/CK-Product-Entity.png" alt="Drupal Commerce Product Entity Graph" />
    </a>
</div>

<p>Next, we have a quick look at the product entity. The graphic above shows us that the standard Product Entity can be used to create "bundles" (similar to content types) that have various fields. Some of the fields are absolutely required for each kind of product type (note the properties list).</p>


<h2>Product Variations</h2>

<div class="screenshot screenshot-caption">
    <div class="img">
        <a href="/sites/default/files/docs/CK-Entity-or-Node.jpg">
            <img src="/sites/default/files/docs/CK-Entity-or-Node.jpg" alt="Drupal Commerce Entity Graph" />
        </a>
    </div>
    <div class="caption">
        <p class="caption-title">Page or Variation?</p>
        <p>This illustration explains the differences between product pages (nodes) and product variations (products).</p>
    </div>
</div>

<p>Let's say you have a t-shirt shop. One of your products is a very cool blue Drupal-or-Nothing shirt. This shirt comes in a variety of catchy colors and sizes. The way Drupal Commerce works is that it makes no assumption about how you want to organize your products. Very much like a retail outlet, each specific variation ("blue" and "xl") have their own SKU and potentially their own price. But for this t-shirt shop you want to have a product page called "Drupal-or-Nothing" that displays all the sizes in a nice, configurable shopping experience that we've all seen around the web.</p>
<p>That's where the node comes in. In Drupal Commerce, you need to add products separately from product pages. So, to make our Drupal-or-Nothing page, we simply create a product display node and reference all of our Drupal-or-Nothing shirts using the product reference field.</p>

<iframe src="http://player.vimeo.com/video/40933753?portrait=0" width="400" height="225" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>

<iframe src="http://player.vimeo.com/video/34385004?portrait=0" width="400" height="225" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>

<h2>Product Types</h2>

<div class="screenshot">
    <a href="/sites/default/files/docs/CK-Product-Entity.png">
        <img src="/sites/default/files/docs/CK-Product-Entity.png" alt="Drupal Commerce Product Entity Graph" />
    </a>
</div>

<p>Using Drupal 7's entity system has provided us with a very simple paradigm: Nodes have Content Types. Content Types have fields and made lots of sense for content-related items. Product Entities are similar to Content Types. You can create Product Types with various fields.</p>
<p>For example, you may want to sell physical books, ebook downloads, and have a donation system similar to Kickstarter for up-and-coming authors. Each product type can have it's own set of fields, rules, display settings, etc. You can add and edit product types right there in core using strikingly familiar forms (they are literally the same as the content type forms, minus all of the unnecessary content type settings). Let's quickly examine three different product types, with a few fields:</p>
<ul>
  <li>Physical Books
    <ul>
      <li>Front Cover Image</li>
      <li>Author Image</li>
      <li>eBook Reference Field</li>
    </ul>
  </li>
  <li>Downloadable eBooks
    <ul>
      <li>eBook Free Preview</li>
      <li>eBook Full PDF Download</li>
    </ul>
  </li>
  <li>Author Kickstarter Donations
    <ul>
      <li>Donation Level (custom line item type)</li>
      <li>Words of Encouragement (custom line item type)</li>
      <li>T-shirt size (custom line item type)</li>
    </ul>
  </li>
</ul></p>
<p>We're sure you can come up with your own set of really interesting cross-selling kinds of products that push our Product entities to their limits! Let us know here if you have a site that you would like featured in the Showcase.</p>
</div>



<ul>
<li><a href="https://docs.drupalcommerce.org/commerce1/user-guide/products/product-attributes-and-variations">Product Attributes and Variations</a></li>  
<li><a href="https://docs.drupalcommerce.org/commerce1/user-guide/products/product-displays">Product Displays</a></li>  
<li><a href="https://docs.drupalcommerce.org/commerce1/user-guide/products/administering-products">Administering Products</a></li>  
<li><a href="https://docs.drupalcommerce.org/commerce1/user-guide/products/setting-up-a-product-catalog">Setting up a Product Catalog</a></li>  
<li><a href="https://docs.drupalcommerce.org/commerce1/user-guide/products/importing-products-using-feeds">Importing Products using Feeds</a></li>  
</ul>