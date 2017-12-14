---
title: Importing Products using Feeds
taxonomy:
    category: docs
---

<p>The wonderful <a href="http://drupal.org/project/commerce_feeds">Commerce Feeds</a> module, with its parent <a href="http://drupal.org/project/feeds">Feeds</a> allow you to import various kinds of feeds as products and/or as product reference nodes. Edit: You may be also be interested in <a href="http://drupal.org/project/commerce_migrate">Commerce Migrate</a> and <a href="http://www.commerceguys.com/resources/articles/215">this screencast on how to use it to import Ubercart stores</a>.]</p>

<iframe src="https://player.vimeo.com/video/22731881?title=0&amp;byline=0&amp;portrait=0" width="400" height="300" frameborder="0"></iframe><p><a href="http://vimeo.com/22731881">Importing Products with Commerce Feeds</a> from <a href="http://vimeo.com/user5912539">Randy Fay</a> on <a href="http://vimeo.com">Vimeo</a>.</p>

<p>In this example we'll be bringing in a CSV feed and turning it into both products and product reference nodes in two separate operations.</p>
<p>Our CSV has just a few fields and the first couple of lines look like this:<br><code>"SKU","Title","Price","Image","Description"<br>"0023548568","Computer Graphics Using Open GL (2nd Edition)","11000","http://ecx.images-amazon.com/images/I/51JQbhO0MmL.jpg","Great book blah blah..."</code></p>
<p>The SKU is the unique identifier for the product, and of course the other items are self-descriptive. The Image is a URL to an image.</p>
<p><s>You can view and explore the feed at <a href="http://d7.randyfay.com/books/feed">http://d7.randyfay.com/books/feed</a>. Note that this is just an example feed - it could be something other than CSV, the fields could be named differently, etc. We do need a unique identifier (the SKU), which we'll also use to map the product reference nodes to products.</s></p>
<h2>An Outline</h2>
<ul>
<li>Install and enable feeds and commerce_feeds</li>
<li>Create a new feed importer named "Product Importer" at Administration -&gt; Structure -&gt; Feeds
<ul><li>Change the parser to "CSV Parser"</li>
<li>Change processor to "Commerce Product Processor"</li>
<li>In "Commerce Product Processor" settings use product type "product" (or whatever your product is) and change the "Author" to your username.</li>
<li>In "mapping", map</li>
<li>SKU -&gt; Product SKU</li>
<li>Title -&gt; Product Title</li>
<li>Price -&gt; Price: Amount</li>
<li>Image -&gt; Image</li>
<li>Set ID as unique target.</li>
</ul></li>
<li>Visit /import, use the Product Importer.
<ul><li><s>Use <a href="http://d7.randyfay.com/books/feed">http://d7.randyfay.com/books/feed</s></a> for the URL</li>
<li>Import your products</li>
</ul></li>
<li>Visit the products page (admin/commerce/products) to view your new products</li>
<li>Note that you can delete items using the feed or with commerce_vbo</li>

<li>Now we'll import the same data again, but this time we'll turn it into product display nodes.</li>
<li>Go to admin/structure/feeds and create a new feeds importer</li>
<li>Change the parser to CSV</li>
<li>Change the processor to Node Processor</li>
<li>Choose the "Product Display" node type</li>
<li>Set the author to yourself</li>
<li>Under mappings
<ul><li>SKU -&gt; GUID (and set unique target)</li>
<li>Title -&gt; Title</li>
<li>Description -&gt; Body</li>
<li>SKU -&gt; Product SKU</li>
</ul></li>
<li>Visit /import
<ul><li>Use the Product Reference Importer</li>
<li><s>Use the same feed URL: <a href="http://d7.randyfay.com/books/feed">http://d7.randyfay.com/books/feed</a></s></li>
<li>Now you have 100 shiny new product reference nodes, pointing to products.</li>
</ul></li>
</ul>

If you need to import products with additional attributes or other fields, that works fine too; you'll need the "Feeds Tamper" module for it.

Here's the screencast demonstrating it, followed by the recipe.
<iframe src="https://player.vimeo.com/video/25668519?title=0&amp;byline=0&amp;portrait=0" width="400" height="300" frameborder="0"></iframe>

<b>Update 26 Sept 2011: The "Feeds Tamper" tab is now an Operation as "Tamper" in Feeds</b>
<ol>
<li>Add your attribute to the product type</li>
<li>Add the attribute to your csv file</li>
<li>Change the mappings in the product importer to add the attribute</li>
<li>Import.
<li>Create a node import CSV file that has the list of products as comma-separated within the quotes: "SKU1,SKU2,SKU3"</li>
<li>Create a node import feeds importer (or just use the standard one from commerce_feeds_example)</li>
<li>Create a feeds tamper rule at admin/structure/feeds tamper that explodes the SKU field in the node as it imports.</li>
<li>Import your nodes.
</ol>


If you need to import prices that are not in minor units (they're $1.50 instead of 150) then this screencast explains how to use Feeds Tamper to transform them on import:

<iframe src="https://player.vimeo.com/video/25722743?title=0&amp;byline=0&amp;portrait=0" width="400" height="300" frameborder="0"></iframe><p><a href="https://vimeo.com/25722743">Drupal Commerce: Using Feeds Tamper to change Dollars/Cents to Minor Units</a> from <a href="https://vimeo.com/user5912539">Randy Fay</a> on <a href="http://vimeo.com">Vimeo</a>.</p>
<p><span color="red">NOTE: the above tutorial references an example product feed that is no longer available. We suggest you create your own example file with the required fields to complete the import</span> </p>