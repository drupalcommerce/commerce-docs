---
title: Cart Refresh
taxonomy:
    category: docs
---

<div class="docs-enhanced"><h2>Price Recalculation on Load</h2>
<div class="screenshot screenshot-caption">
    <div class="img">
        <a href="/sites/default/files/docs/Cart-Refresh-Price-Rules.png"><img
        src="/sites/default/files/docs/Cart-Refresh-Price-Rules.png" alt="Shopping Cart
        refreshes prices on every page load." /></a>
    </div>
    <div class="caption">
        <p class="caption-title">Price Rules Screen</p>
        <p>Pictured here is the page that lists all of the price rules that
        calculate the sell price per user. This is where you can add discounts,
        taxes, and many other types of payment calculations.</p>
    </div>
    <ul class="screenshot_breadcrumbs">
        <li class="first">Administration</li>
        <li>Store</li>
        <li>Configuration</li>
        <li class="last">Product Pricing Rules</li>
    </ul>
</div>
<p>There is a shopping cart refresh that happens when cart orders are loaded. This
refresh involves at least the recalculation of all product prices in the cart.
Other modules may hook into the process to perform additional refreshes as
necessary. This process ensures that the cart will always reflect the most up to
date pricing and availability for products a customer intends to purchase
regardless of how long they’ve been in the customer’s cart.</p>
<p>Even though there is a Shopping cart order state and status, the designation
of a cart order status is not dependent on these. In fact, any order status that
includes the cart Boolean set to TRUE can function as a cart order status,
triggering a refresh of all product prices on load. In core, the Checkout: Review order statuses also function as cart statuses,
because you typically require product prices to be up to date until the time the
customer submits payment.</p>
<p>Prior to purchase, product sell prices are calculated using rule
configurations. Pricing rules can be used for things like discounts, price
lists, currency conversions, and tax application depending on the Rules elements
defined by your enabled modules. To apply the enabled pricing rules on product
display, you must ensure the display formatter settings for your product price
fields are configured to display the Calculated sell price for the current
user.</p></div>