---
title: Currency Overview
taxonomy:
    category: docs
---

<div class="docs-enhanced">
<p>There are a lot of topics that you might want to cover for "currency" for Commerce Kickstart 2. For example, when you install, you can pick the default currency, but Drupal Commerce supports <a href="/user-guide/currency-conversion">multiple currencies</a>. But, really, nearly everything that is wired to look pretty in the Demo Store for Kickstart 2 is the same as what Drupal Commerce ships with out of the box:</p>
<ul>
<li><a href="/user-guide/currency-conversion">Currency Conversion</a> - Not only does Commerce support multiple currencies, we support all kinds of currency conversions.</li>
<li><a href="/user-guide/discounts-and-coupons">Discounts and Coupons</a> - While we still work out the bugs on the Discount module that comes with Kickstart, checkout this resource for creating "Discounts" and "Coupons" the old fashioned way: using Price Calculation Rules.</li>
<li><a href="/user-guide/price-components">Price Components</a> - An important topic to learn is how Drupal Commerce handles the pieces of the puzzle that is "price." Was there a VAT tax applied? Are their discounts? How do we should these different pieces of the final price?</li>
<li><a href="/user-guide/rules-overview">Rules Overview</a> - The answer to all your Drupal Commerce problems: Rules. For currency, we're definitely going to get into how to use Rules to affect the price of a certain product.</li>
<li><a href="/user-guide/sell-price-calculation">Sell Price Calculation</a> - Last but certainly not least, we go over Price Calculation at length in this article.</li>
</ul>
<h3>Price Calculation</h3>
<p>For the novice, or perhaps a web developer who is only occasionally asked to create an e-commerce website, it might come as a surprise that the sale or sell price goes through a fair amount of tweaking before being represented on the site. Each step that our sell price goes through is designed to make discounts, taxes, currency conversion and many other possibilities have an impact.</p>
<p>Product sell prices are determined via a Rules based calculation process. If you are not up on your Rules module implementation tasks, you should check out the <a href="http://dev.nodeone.se/node/984">NodeOne Rules Videos</a> to get up to speed.</p>
<p><strong>The life of a Price Calculation</strong></p>
<ol>
    <li>A new line item is created representing the product as if it were in the user's current shopping cart order.</li>
    <li>The unit price of the line item is initialized to the product’s base price (commerce_price) value.</li>
    <li>The line item is then passed through Rules via the Calculating the sell price of a product event where its unit price may be manipulated as necessary.</li>
    <li>The final unit price of the line item becomes the sell price of the product displayed on product pages and Views.</li>
</ol>
</div>