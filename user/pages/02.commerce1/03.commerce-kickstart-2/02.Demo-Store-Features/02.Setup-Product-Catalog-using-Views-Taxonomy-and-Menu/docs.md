---
title: Setup Product Catalog using Views, Taxonomy, and Menu
taxonomy:
    category: docs
---

<div class="docs-enhanced">
<p>The Commerce Kickstart 2 comes with a great catalog setup both in the Demo store and as a part of the non-demo store setup. First, we'll explain the various parts that are at play in making the catalog function. Next, we'll create a product catalog from scratch on a non-demo store that has nearly identical functionality.</p>
<h3>Kickstart 2 Catalog Ingredients</h3>
<p>The Commerce Kickstart 2 Catalog uses the following major concepts:</p>
<ul>
<li><strong>Taxonomy Organization</strong>: The menu, the view, and the nodes all use taxonomy as the underlying technology to create "catalog pages." If you think about a paper catalog, this categorization is a very common and easy to understand decision.</li>
<li><strong>Taxonomy Menu</strong>: The Menu at the top of the page for both the demo and non-demo installation is a generated menu using <a href="http://drupal.org/project/taxonomy_menu">Taxonomy Menu</a> and a custom module that comes with Kickstart, called "Commerce Kickstart Taxonomy" that modifies some of the way the menu is generated and comes with the default view.</li>
<li><strong>Search API</strong>: We use Search API to power the Views that show the catalog pages and the "All Products" view that shows you how to use the setup and working faceted search.</li>
<li><strong>Views</strong>: There are a number of views that are running the catalog system. The primary view that handles the category pages grabs the taxonomy term from the URL and uses that to narrow down the list of available products. We are using item-level grouping, not aggregation.</li>
<li><strong>Rendered Nodes, not Product Entities</strong>: For each product listed on the pages, we are rendering the product display, not the product variation. This is an architectural decision that has significant ramifications on how your site is built. Doing it this way is likely (maybe 80% of the time) the best way for your site, but there are other ways of showing products and there images / add to cart forms.</li>
</ul>
<h3>Search API</h3>
<p>The catalog pages depend heavily on Search API. To learn a bit more about search API and what it is capable of, take a look at the following Commerce Module Tuesday video:</p>
<iframe src="http://player.vimeo.com/video/53404289?portrait=0&amp;badge=0" width="400" height="250" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
</div>