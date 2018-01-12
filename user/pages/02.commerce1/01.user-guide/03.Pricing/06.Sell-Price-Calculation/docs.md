---
title: Sell Price Calculation
taxonomy:
    category: docs
---

<div class="docs-enhanced">
<div class="screenshot">
    <a href="/user/pages/02.commerce1/01.user-guide/03.Pricing/06.Sell-Price-Calculation/Price-Calc-Overview.png">
        <img src="/user/pages/02.commerce1/01.user-guide/03.Pricing/06.Sell-Price-Calculation/Price-Calc-Overview.png"
             alt="Product Price Calculations happen under store configuration product pricing rules" />
    </a>
    <ul class="screenshot_breadcrumbs">
        <li class="first">Administration</li>
        <li>Store</li>
        <li>Configure</li>
        <li class="last">Product Pricing Rules</li>
    </ul>
</div>
<p>For the novice, or perhaps a web developer who is only occasionally asked to create an e-commerce website, it might come as a surprise that the sale or sell price goes through a fair amount of tweaking before being represented on the site. Each step that our sell price goes through is designed to make discounts, taxes, currency conversion and many other possibilities have an impact.</p>
<p>Product sell prices are determined via a Rules based calculation process. If you are not up on your Rules module implementation tasks, you should check out the <a href="http://dev.nodeone.se/node/984">NodeOne Rules Videos</a> to get up to speed.</p>
<p><strong>The life of a Price Calculation</strong></p>
<ol>
    <li>A new line item is created representing the product as if it were in the user's current shopping cart order.</li>
    <li>The unit price of the line item is initialized to the product’s base price (commerce_price) value.</li>
    <li>The line item is then passed through Rules via the Calculating the sell price of a product event where its unit price may be manipulated as necessary.</li>
    <li>The final unit price of the line item becomes the sell price of the product displayed on product pages and Views.</li>
</ol>
<p>See a <a href="http://bit.ly/cgprezi-price-calculation">Prezi slideshow visualizing the process</a>.</p>
<div class="prezi-player"><style type="text/css" media="screen">.prezi-player { width: 400px; } .prezi-player-links { text-align: center; }</style><object id="prezi_e7mfg8u5qldv" name="prezi_e7mfg8u5qldv" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="400" height="300"><param name="movie" value="http://prezi.com/bin/preziloader.swf"/><param name="allowfullscreen" value="true"/><param name="allowscriptaccess" value="always"/><param name="bgcolor" value="#ffffff"/><param name="flashvars" value="prezi_id=e7mfg8u5qldv&amp;lock_to_path=0&amp;color=ffffff&amp;autoplay=no&amp;autohide_ctrls=0"/><embed id="preziEmbed_e7mfg8u5qldv" name="preziEmbed_e7mfg8u5qldv" src="http://prezi.com/bin/preziloader.swf" type="application/x-shockwave-flash" allowfullscreen="true" allowscriptaccess="always" width="400" height="300" bgcolor="#ffffff" flashvars="prezi_id=e7mfg8u5qldv&amp;lock_to_path=0&amp;color=ffffff&amp;autoplay=no&amp;autohide_ctrls=0"></embed></object><div class="prezi-player-links"><p><a title="Sell Price Calculation" href="http://prezi.com/e7mfg8u5qldv/sell-price-calculation/">Sell Price Calculation</a> on <a href="http://prezi.com">Prezi</a></p></div></div>
<p>Sell price calculations can include discounts, taxes, currency conversion, and more. Each manipulation of the price is tracked as a price component in the price field’s data array, so you can see exactly what happened to result in a particular sell price at the end of the process. You can even set the Display of any price field to show all components. This is handy for showing a user that you are giving them a discount.</p>
<p>The actions for manipulating unit prices include:</p>
<ul>
    <li>Add an amount to the unit price</li>
    <li>Convert the unit price to a different currency</li>
    <li>Divide the unit price by some amount</li>
    <li>Multiply the unit price by some amount</li>
    <li>Set the unit price to a specific amount</li>
    <li>Set the unit price's currency code</li>
    <li>Subtract an amount from the unit price</li>
</ul>
<p>When configuring each action, you can specify the type of price component to use. If you need additional component types for the site (more than addition/subtract, divide/multiply, etc), you currently have to write them into a module. Not sure how to create your own price component? Look into <a href="http://drupalize.me/series/coding-rules">Drupalize.me's Coding for Rules videos</a>; they are a free and well-produced series of videos!</p>
<h2 id="adminspecial">Administrator's Special</h2>
<p>We are going to learn the sell price calculation process by setting up a conditional discount for our administrators. We will use a condition to apply a 50% discount for any user with the role "Administrator" and show the price with components.</p>
<p>Our base price: $30</p>
<p>What the sell price should be on checkout with 50% discount if I'm an administrator: $15</p>
<div class="screenshot screenshot-caption">
    <div class="img">
        <a href="/user/pages/02.commerce1/01.user-guide/03.Pricing/06.Sell-Price-Calculation/Price-Calc-step1.png">
            <img src="/user/pages/02.commerce1/01.user-guide/03.Pricing/06.Sell-Price-Calculation/Price-Calc-step1.png" alt="Create a product pricing rule" />
        </a>
    </div>
    <div class="caption">
        <p class="caption-title">Pricing Rule</p>
        <p>Create a Product pricing rule.</p>
    </div>
    <ul class="screenshot_breadcrumbs">
        <li class="first">Administration</li>
        <li>Store</li>
        <li>Configuration</li>
        <li>Product Pricing Rules</li>
        <li class="last">Add a Pricing Rule</li>
    </ul>
</div>

<div class="screenshot screenshot-caption">
    <div class="img">
        <a href="/user/pages/02.commerce1/01.user-guide/03.Pricing/06.Sell-Price-Calculation/Price-Calc-step2.png">
            <img src="/user/pages/02.commerce1/01.user-guide/03.Pricing/06.Sell-Price-Calculation/Price-Calc-step2.png" alt="Calculating sale price event should be selected by default. We're going to add a condition for only affecting prices if users are administrators. We're going to reduce the price the by 50%." />
        </a>
    </div>
    <div class="caption">
        <p class="caption-title">Rule Overview</p>
        <p>Calculating sale price event should be selected by default. We're going to add a condition for only affecting prices if users are administrators. We're going to reduce the price the by 50%.</p>
    </div>
    <ul class="screenshot_breadcrumbs">
        <li class="first">Administration</li>
        <li>Store</li>
        <li>Configuration</li>
        <li>Product Pricing Rules</li>
        <li class="last">Overview</li>
    </ul>
</div>

<div class="screenshot screenshot-caption">
    <div class="img">
        <a href="/user/pages/02.commerce1/01.user-guide/03.Pricing/06.Sell-Price-Calculation/Price-Calc-step3.png">
            <img src="/user/pages/02.commerce1/01.user-guide/03.Pricing/06.Sell-Price-Calculation/Price-Calc-step3.png" alt="Select the user has roles condition." />
        </a>
    </div>
    <div class="caption">
        <p class="caption-title">Add Condition</p>
        <p>When creating a condition, it will ask you what you want to look at. For our discount, we want to look at user's roles.</p>
    </div>
    <ul class="screenshot_breadcrumbs">
        <li class="first">Administration</li>
        <li>Store</li>
        <li>Configuration</li>
        <li>Product Pricing Rules</li>
        <li class="last">Add Condition</li>
    </ul>
</div>

<div class="screenshot screenshot-caption">
    <div class="img">
        <a href="/user/pages/02.commerce1/01.user-guide/03.Pricing/06.Sell-Price-Calculation/Price-Calc-step4.png">
            <img src="/user/pages/02.commerce1/01.user-guide/03.Pricing/06.Sell-Price-Calculation/Price-Calc-step4.png" alt="Select the administrator role." />
        </a>
    </div>
    <div class="caption">
        <p class="caption-title">Administrator</p>
        <p>Selecting the appropriate role is all you have to do for this screen.</p>
    </div>
    <ul class="screenshot_breadcrumbs">
        <li class="first">Administration</li>
        <li>Store</li>
        <li>Configuration</li>
        <li>Product Pricing Rules</li>
        <li class="last">Configure Condition</li>
    </ul>
</div>

<div class="screenshot screenshot-caption">
    <div class="img">
        <a href="/user/pages/02.commerce1/01.user-guide/03.Pricing/06.Sell-Price-Calculation/Price-Calc-step5.png">
            <img src="/user/pages/02.commerce1/01.user-guide/03.Pricing/06.Sell-Price-Calculation/Price-Calc-step5.png" alt="Next, we've already clicked on Add Action and are now selecting the multiply unit price option." />
        </a>
    </div>
    <div class="caption">
        <p class="caption-title">Add Action</p>
        <p>Next, we've already clicked on Add Action and are now selecting the multiply unit price option.</p>
    </div>
    <ul class="screenshot_breadcrumbs">
        <li class="first">Administration</li>
        <li>Store</li>
        <li>Configuration</li>
        <li>Product Pricing Rules</li>
        <li class="last">Add Action</li>
    </ul>
</div>

<div class="screenshot screenshot-caption">
    <div class="img">
        <a href="/user/pages/02.commerce1/01.user-guide/03.Pricing/06.Sell-Price-Calculation/Price-Calc-step6.png">
            <img src="/user/pages/02.commerce1/01.user-guide/03.Pricing/06.Sell-Price-Calculation/Price-Calc-step6.png" alt="Set .5 for 50% off, and select Discount for the price component type." />
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

<div class="screenshot screenshot-caption">
    <div class="img">
        <a href="/user/pages/02.commerce1/01.user-guide/03.Pricing/06.Sell-Price-Calculation/Price-Calc-step7.png">
            <img src="/user/pages/02.commerce1/01.user-guide/03.Pricing/06.Sell-Price-Calculation/Price-Calc-step7.png" alt="Final Rule Screen Overview" />
        </a>
    </div>
    <div class="caption">
        <p class="caption-title">Rule Overview</p>
        <p>The final screen for the rule that will set all prices to be 50% for administrators.</p>
    </div>
    <ul class="screenshot_breadcrumbs">
        <li class="first">Administration</li>
        <li>Store</li>
        <li>Configuration</li>
        <li>Product Pricing Rules</li>
        <li class="last">Rule Overview</li>
    </ul>
</div>

<div class="screenshot screenshot-caption">
    <div class="img">
        <a href="/user/pages/02.commerce1/01.user-guide/03.Pricing/06.Sell-Price-Calculation/Price-Calc-step8.png">
            <img src="/user/pages/02.commerce1/01.user-guide/03.Pricing/06.Sell-Price-Calculation/Price-Calc-step8.png" alt="Lets reveal the price components" />
        </a>
    </div>
    <div class="caption">
        <p class="caption-title">Reveal Price</p>
        <p>We could show you a screenshot of the new product, but that would not show us that the rule is really working. To see the discount on your product, you must go to the manage display.</p>
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
        <a href="/user/pages/02.commerce1/01.user-guide/03.Pricing/06.Sell-Price-Calculation/Price-Calc-step9.png">
            <img src="/user/pages/02.commerce1/01.user-guide/03.Pricing/06.Sell-Price-Calculation/Price-Calc-step9.png" alt="Set the price field to show formatted with components." />
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
        <a href="/user/pages/02.commerce1/01.user-guide/03.Pricing/06.Sell-Price-Calculation/Price-Calc-step10.png">
            <img src="/user/pages/02.commerce1/01.user-guide/03.Pricing/06.Sell-Price-Calculation/Price-Calc-step10.png" alt="Administrators see the discount" />
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
</div>