---
title: Choosing between Page or Variation
taxonomy:
    category: docs
---

<div class="docs-enhanced">
<iframe width="100%" height="315" src="https://www.youtube.com/embed/sNTXFIiYoo4" frameborder="0" allowfullscreen></iframe>
<div class="screenshot screenshot-caption" style="margin-top: 25px">
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
<p>There are lots of questions you might be asking yourself about how to put your store together. This article will be tackling the question of choosing whether you should put a field on your Product Data or your Product Node. The difference is simple, products are more there for inventory (sizes and colors of one kind of shirt) and product nodes are more there for display (here's all the Commerce Guys t-shirts).</p>
<p>This question comes in lots of forms:</p>

<ul>
<li>Should I add the picture to the product page (node) or the product variation?</li>
<li>Should I add the product category to the node or the product variation?</li>
<li>Why is there a difference between products and nodes?</li>
<li>etc.</li>
</ul>

<p>The fact is that there are two different places you can add categories and pictures:</p>
<p>1. Nodes or "Product Pages" - Product pages are great for images and/or categories that represent all of that one kind of product. For example, if we had an online shoe website, we would add an "athletic" category to the Nike Jordan product page, but we wouldn't want to add a "size" or "color" to the product page, because those belong in Product variations.</p>
<p>2. Product Variations - These are the specific product listings that include price and "variation categories" like size, color, weight, etc.</p>
<p>In the graphic above we have created a visual of the difference between product pages and product variations. Typically, Product variations include the photo, but if a product's photo won't change based on size or color, then it makes more sense to add that directly to a page.</p>
<p>The whole point of deciding between a product page and product variation is that every field on a product variation will be loaded in javascript every time a user selects a small variation. So product variations that have photos will be replaced if the user changes the size or the color. </p>
</div>