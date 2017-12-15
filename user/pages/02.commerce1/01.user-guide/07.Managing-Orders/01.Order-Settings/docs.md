---
title: Order Settings
taxonomy:
    category: docs
---

<div class="docs-enhanced">
<p>In March 2014, Commerce 1.9 was released that included a number of feature enhancements involving order workflow on the administrative side. Below is a rundown of the various settings and how they affect the new features.</p>

<ul>
  <li><strong>Apply pricing rules</strong> - A new local action for orders that, when clicked, will run the pricing rules for that particular order.</li>
  <li><strong>Simulate checkout completion</strong> - A new local action for orders that, when clicked, will invoke the checkout completion events in rules.</li>
  <li><strong>Shopping cart refresh</strong> - These settings let you control how often the shopping cart orders are refreshed, a task that can impact speed at the cost of flexibility.</li>
</ul>

<div class="screenshot">
    <ul class="screenshot_breadcrumbs">
        <li class="first">Administration</li>
        <li>Store</li>
        <li>Configuration</li>
        <li class="last">Order settings</li>
    </ul>
    <div class="img">
        <a href="/sites/default/files/docs/screenshot_2014-11-18_14.58.46.png">
            <img src="/sites/default/files/docs/screenshot_2014-11-18_14.58.46.png" alt="Order configuration screenshot" />
        </a>
    </div>
</div>

<h2>Apply pricing rules</h2>
<p>A new local action for orders that, when clicked, will run the pricing rules for that particular order. </p>
<div class="screenshot">
    <div class="img">
        <a href="/sites/default/files/docs/screenshot_2014-11-18_15.14.25.png">
            <img src="/sites/default/files/docs/screenshot_2014-11-18_15.14.25.png" alt="Apply Pricing Rules screenshot" />
        </a>
    </div>
</div>
<p>When you click the "Apply pricing rules" button, a few things will happen:</p>
<ul>
  <li>All product prices will be reset and recalculated using the product pricing rules defined on this site.</li>
  <li>Non-product line items may or may not be updated depending on the type.</li>
  <li>Custom prices entered on the edit form will be lost.</li>
</ul>

<h2>Simulate checkout completion</h2>

<p>A new local action for orders that, when clicked, will invoke the checkout completion events in rules.</p>

<div class="screenshot">
    <div class="img">
        <a href="/sites/default/files/docs/screenshot_2014-11-18_15.22.53.png">
            <img src="/sites/default/files/docs/screenshot_2014-11-18_15.22.53.png" alt="Simulate Checkout Completion screenshot" />
        </a>
    </div>
</div>
<p>When you click the "Simulate checkout" button, a few things will happen:</p>
<ul>
<li>The normal checkout completion process will be invoked on this order.</li>
<li>This may involve order status updates and e-mail notifications.</li>
</ul>

<h2>Shopping cart refresh</h2>

<div class="screenshot">
    <div class="img">
        <a href="/sites/default/files/docs/screenshot_2014-11-18_15.41.45.png">
            <img src="/sites/default/files/docs/screenshot_2014-11-18_15.41.45.png" alt="Shopping cart refresh screenshot" />
        </a>
    </div>
</div>

<p>Shopping cart orders comprise orders in shopping cart and some checkout related order statuses. These settings let you control how the shopping cart orders are refreshed, the process during which product prices are recalculated, to improve site performance in the case of excessive refreshes on sites with less dynamic pricing needs.</p>

<h3>Refresh mode</h3>
<ul>
<li><strong>Refresh a shopping cart regardless of who it belongs to.</strong><br />This was the default setting pre Commerce 1.9. This has a performance impact but enables extremely dynamic pricing (assuming the pricing changes between each page request).<br /><br /></li>
<li><strong>Only refresh a shopping cart if it belongs to the current user.</strong><br />This is the new default and allows for dynamic pricing but prohibits the performance impact when the user viewing the information (presumably an administrator) views the cart, which enhances the speed for the administrator and limits the number of possible problems with dynamic pricing that relies on "current user" instead of "order owner."<br /><br /></li>
<li><strong>Only refresh a shopping cart if it is the current user's active shopping cart.</strong><br /> This setting further preserves pricing on older carts that are not currently the active cart.</li>
</ul>

<h3>Refresh frequency</h3>
<p>To further enhance the performance impact, we set a reasonable lifespan for calculated prices. If your pricing depends on up-to-the-second changes, then this setting can be set to zero so that it will always be calculated. Its likely the majority of use cases could have a large number of seconds here. Shopping carts will only be refreshed if more than the specified number of seconds have passed since they were last refreshed.</p>
<p>Note that, by default, we always recalculate on /cart and /checkout but you can turn off that setting here as well.</p>
</div>