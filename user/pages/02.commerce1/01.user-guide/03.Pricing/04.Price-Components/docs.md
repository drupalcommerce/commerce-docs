---
title: Price Components
taxonomy:
    category: docs
---

<div class="docs-enhanced">
<p>Price Components represent a change record of what happened during price calculation to give you the final price of a line item or order. When building your price calculation rules, you have the ability to choose what type of price component should be used to represent the price change on the order, which is why we provide a couple generic types (like discount / fee).</p>

<ol>
    <li>Price components will keep track of the changes or additions to a price during price calculation</li>
    <li>You can specify which component to use in a price calculation rule</li>
</ol>

<p>Ultimately customizing these further will result in the best customer experience, so instead of just "Discount" a user might have visual feedback that they've received their "Member discount" or "Wholesale discount." The ability to customize the price component label is possible in a custom module or there have been rumors of a contributed module that provides an interface for this to work.</p>

<p>The unit price of line items includes an array of price components that show the breakdown of
how a particular price was calculated. These components will be multiplied by line item quantity
into the line item's total price field and added together into an order's order total price field.
Thus component data at the order level will show all the price components that went into the
order total.</p>
<p>Price component types are defined by modules installed on the site using
hook_commerce_price_component_type_info(). Core price component types include:</p>
<ul>
    <li>Base price &mdash; typically the base price of a product prior to calculation</li>
    <li>Discount &mdash; a simple price component type useful for price reductions</li>
    <li>Fee &mdash; a simple price component type useful for price increases</li>
    <li>Tax rates &mdash; each tax rate gets its own component type so the total tax collected for an
order can be found in its order total price field</li>
</ul>
<h2>Enable Price Components for Display</h2>
<p>In order to show you what price components look like, we've picked up the Sell Price Calculations example towards the end. To see the whole exercise, <a href="sell-price-calculation">check it out</a>.</p>
<div class="screenshot screenshot-caption">
    <div class="img">
        <a href="/user/pages/02.commerce1/01.user-guide/03.Pricing/04.Price-Components/Price-Calc-step8.png">
            <img src="/user/pages/02.commerce1/01.user-guide/03.Pricing/04.Price-Components/Price-Calc-step8.png" alt="Lets reveal the price components" />
        </a>
    </div>
    <div class="caption">
        <p class="caption-title">Reveal Price</p>
        <p>To see the discount on your product, you must go to the manage display.</p>
    </div>
    <ul class="screenshot_breadcrumbs">
        <li class="first">Administration</li>
        <li>Store</li>
        <li>Products</li>
        <li>Product Types</li>
        <li class="last">Manage Display</li>
    </ul>
</div>

<div class="screenshot screenshot-caption">
    <div class="img">
        <a href="/user/pages/02.commerce1/01.user-guide/03.Pricing/04.Price-Components/Price-Calc-step9.png">
            <img src="/user/pages/02.commerce1/01.user-guide/03.Pricing/04.Price-Components/Price-Calc-step9.png" alt="Set the price field to show formatted with components." />
        </a>
    </div>
    <div class="caption">
        <p class="caption-title">Price Field</p>
        <p>Set the price field to show formatted with components.</p>
    </div>
    <ul class="screenshot_breadcrumbs">
        <li class="first">Administration</li>
        <li>Store</li>
        <li>Products</li>
        <li>Product Types</li>
        <li>Manage Display</li>
        <li class="last">Edit Price</li>
    </ul>
</div>

<div class="screenshot screenshot-caption">
    <div class="img">
        <a href="/user/pages/02.commerce1/01.user-guide/03.Pricing/04.Price-Components/Price-Calc-step10.png">
            <img src="/user/pages/02.commerce1/01.user-guide/03.Pricing/04.Price-Components/Price-Calc-step10.png" alt="Administrators see the discount" />
        </a>
    </div>
    <div class="caption">
        <p class="caption-title">Final Discount</p>
        <p>Simply changing the price to show with components, it displays all that is necessary for the discount to be obvious. Also in the screenshot is the same site, not logged in. This is an important step to make sure that your condition is actually working.</p>
    </div>
    <ul class="screenshot_breadcrumbs">
        <li class="first">Administration</li>
        <li>Store</li>
        <li>Products</li>
        <li>Product Types</li>
        <li>Manage Display</li>
        <li class="last">Edit Price</li>
    </ul>
</div>
<h2>Enable Price Components via Rules</h2>
<p>In order to show you what price components using rules look like, we've picked up the Sell Price Calculations example in the very middle. To see the whole exercise, <a href="/sell-price-calculation">check it out</a>.</p>
<div class="screenshot screenshot-caption">
    <div class="img">
        <a href="/user/pages/02.commerce1/01.user-guide/03.Pricing/04.Price-Components/Price-Calc-step6.png">
            <img src="/user/pages/02.commerce1/01.user-guide/03.Pricing/04.Price-Components/Price-Calc-step6.png" alt="Set .5 for 50% off, and select Discount for the price component type." />
        </a>
    </div>
    <div class="caption">
        <p class="caption-title">Configure Action</p>
        <p>When you are setting the actual math part of the discount, we chose to simply multiply by 0.5 for a 50% discount. You could also divide by 2. Note also that we have changed the value of the price component type. The price component type will show up when you show the price with components. Note that if you want to add your own price component type it will likely need to be done in code.</p>
    </div>
    <ul class="screenshot_breadcrumbs">
        <li class="first">Administration</li>
        <li>Store</li>
        <li>Configuration</li>
        <li>Product Pricing Rules</li>
        <li class="last">Configure Action</li>
    </ul>
</div>
</div>
