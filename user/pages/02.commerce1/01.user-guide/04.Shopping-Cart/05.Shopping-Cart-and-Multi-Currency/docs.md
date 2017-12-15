---
title: Shopping Cart and Multi-Currency
taxonomy:
    category: docs
---

<div class="docs-enhanced">
<p>Converting from one currency to another is possible through Rules. We
recommend using only core for this if you want the conversion rate to be input
as a static variable. For example, you simply want to say that 1 US dollar is
equal to .76 Euros, that would be a fine and relatively easy thing to produce
using rules.</p>
<p>Additionally with being able to handle simple conversions, Drupal Commerce
core will properly handle mixed currency orders by converting line items to the
site's default currency if present on the order or using the currency of the
first line item on the order if the default currency isn't represented.</p>
<p>For more complex situations, there is a great contributed module called
Commerce Multi-currency that we have highlighted in a recent Commerce Module
Tuesday Video (seen below).</p>
<iframe src="http://player.vimeo.com/video/38010721?portrait=0" width="400"
height="225" frameborder="0" webkitAllowFullScreen mozallowfullscreen
allowFullScreen></iframe>
<h2>Multi-Currency Support in Core</h2>
<p>We have lots of use-cases for handling multiple currencies. As stated above,
Drupal Commerce supports a small subset of currency support.</p>
<div class="screenshot screenshot-caption">
    <div class="img">
        <a href="/sites/default/files/docs/Cart-MultiCurrency-Overview.png"><img
        src="/sites/default/files/docs/Cart-MultiCurrency-Overview.png" alt="Currency
        Settings Screen" /></a>
    </div>
    <div class="caption">
        <p class="caption-title">Currency Settings</p>
        <p>The currency settings screen under Store &gt; Configuration &gt;
        Currency is where you can enable additional currencies. If you are going
        to do the "Static Currency Exchange Rate" exercise below, you should
        enable a few currencies here.</p>
    </div>
    <ul class="screenshot_breadcrumbs">
        <li class="first">Administration</li>
        <li>Store</li>
        <li>Configuration</li>
        <li class="last">Currency Settings</li>
    </ul>
</div>
<h2>Static Currency Exchange Rate</h2>
<p>Converting from one currency to another is possible through Rules. We
recommend using only core for this if you want the conversion rate to be input
as a static variable. For example, you simply want to say that 1 US dollar is
equal to .76 Euros, that would be a fine and relatively easy thing to produce
using rules. </p>
<p>Below we work through an entire exercise where we use Rules to create such a
scenario as mentioned above.</p>
<div class="screenshot screenshot-caption">
    <div class="img">
        <a href="/sites/default/files/docs/Cart-MultiCurrency-Step1.png"><img
        src="/sites/default/files/docs/Cart-MultiCurrency-Step1.png" alt="Let's create a
        static currency conversion for these products!" /></a>
    </div>
    <div class="caption">
        <p class="caption-title">Original Pricing</p>
        <p>The original pricing is shown here for three products. Our goal is to
        create a rule that affects the prices and changes the currency. Note
        that you need to enable a few other currencies to make this work.</p>
    </div>
    <ul class="screenshot_breadcrumbs">
        <li class="first">Administration</li>
        <li>Store</li>
        <li class="last">View Products</li>
    </ul>
</div>

<div class="screenshot screenshot-caption">
    <div class="img">
        <a href="/sites/default/files/docs/Cart-MultiCurrency-Step2.png"><img
        src="/sites/default/files/docs/Cart-MultiCurrency-Step2.png" alt="First, Navigate
        to Product pricing rules" /></a>
    </div>
    <div class="caption">
        <p class="caption-title">Product Pricing Rules</p>
        <p>The first step is to click on Store and then "Configuration" and,
        finally, Product Pricing Rules. That is where the magic all happens when
        dealing with currency exchange.</p>
    </div>
    <ul class="screenshot_breadcrumbs">
        <li class="first">Administration</li>
        <li>Store</li>
        <li class="last">Product Pricing Rules</li>
    </ul>
</div>

<div class="screenshot screenshot-caption">
    <div class="img">
        <a href="/sites/default/files/docs/Cart-MultiCurrency-Step3.png"><img
        src="/sites/default/files/docs/Cart-MultiCurrency-Step3.png" alt="Click on Add a
        Pricing Rule and Add event" /></a>
    </div>
    <div class="caption">
        <p class="caption-title">Pricing Rule</p>
        <p>We need to click on add a pricing rule. If this is your first time on
        this screen, maybe navigate around and look at how some of these other
        rules are setup. If this is your first time dealing with Rules, we
        highly recommend <a href="http://dev.nodeone.se/node/984">additional
        tutorials</a>.</p>
    </div>
    <ul class="screenshot_breadcrumbs">
        <li class="first">Administration</li>
        <li>Store</li>
        <li>Product Pricing Rules</li>
        <li class="last">Click Add a Price</li>
    </ul>
</div>

<div class="screenshot screenshot-caption">
    <div class="img">
        <a href="/sites/default/files/docs/Cart-MultiCurrency-Step4.png"><img
        src="/sites/default/files/docs/Cart-MultiCurrency-Step4.png" alt="Name your new
        rules so that it makes sense to you." /></a>
    </div>
    <div class="caption">
        <p class="caption-title">Name Rule</p>
        <p>After you have created a name, click "Add Condition."</p>
    </div>
    <ul class="screenshot_breadcrumbs">
        <li class="first">Administration</li>
        <li>Store</li>
        <li>Product Pricing Rules</li>
        <li>Name Rule</li>
        <li class="last">Click Add Condition</li>
    </ul>
</div>

<div class="screenshot screenshot-caption">
    <div class="img">
        <a href="/sites/default/files/docs/Cart-MultiCurrency-Step5.png"><img
        src="/sites/default/files/docs/Cart-MultiCurrency-Step5.png" alt="Write or find the
        following code: commerce-line-item:commerce-unit-price:currency-code"
        /></a>
    </div>
    <div class="caption">
        <p class="caption-title">Data Comparison</p>
        <p>After clicking "Add Condition…"</p>
        <p>You will want to choose "Data Comparison" and then select
        "<code>commerce-line-item:commerce-unit-price:currency-code</code>" using the object
        navigator.</p>
    </div>
    <ul class="screenshot_breadcrumbs">
        <li class="first">Administration</li>
        <li>Store</li>
        <li>Product Pricing Rules</li>
        <li>Edit Rule</li>
        <li>Click Add Condition</li>
        <li class="last">Choose "Data Comparison"</li>
    </ul>
</div>

<div class="screenshot screenshot-caption">
    <div class="img">
        <a href="/sites/default/files/docs/Cart-MultiCurrency-Step6.png"><img
        src="/sites/default/files/docs/Cart-MultiCurrency-Step6.png" alt="Choose the
        currency you want to convert. For our example, we are converting US $ to
        something else."
        /></a>
    </div>
    <div class="caption">
        <p class="caption-title">Currency to Filter</p>
        <p>Note that we are creating a filter that will only allow US dollars
        into our actions. Without this filter, all line items would go through
        this rule.</p>
    </div>
    <ul class="screenshot_breadcrumbs">
        <li class="first">Administration</li>
        <li>Store</li>
        <li>Product Pricing Rules</li>
        <li>Click Add Condition</li>
        <li class="last">Choose Which Currency to Act On</li>
    </ul>
</div>

<div class="screenshot screenshot-caption">
    <div class="img">
        <a href="/sites/default/files/docs/Cart-MultiCurrency-Step7.png"><img
        src="/sites/default/files/docs/Cart-MultiCurrency-Step7.png" alt="Select multiply
        to change the unit price." /></a>
    </div>
    <div class="caption">
        <p class="caption-title">Convert Numbers</p>
        <p>Click "Add Action"</p>
        <p>In order to actually create a currency conversion we need to do a
        little math. This next step is where you add the currency exchange
        rate.</p>
    </div>
    <ul class="screenshot_breadcrumbs">
        <li class="first">Administration</li>
        <li>Store</li>
        <li>Product Pricing Rules</li>
        <li>Click Add Action</li>
        <li class="last">Select Multiply</li>
    </ul>
</div>

<div class="screenshot screenshot-caption">
    <div class="img">
        <a href="/sites/default/files/docs/Cart-MultiCurrency-Step8.png"><img
        src="/sites/default/files/docs/Cart-MultiCurrency-Step8.png" alt="The current
        currency exchange is 0.76 EUR to 1 US Dollars. So we multiply by 0.76"
        /></a>
    </div>
    <div class="caption">
        <p class="caption-title">Doing the Exchange</p>
        <p>If you had 1 US dollar, how much would that equal in your other
        currency? It changes, but for our exercise we're going to assume a
        static number works for us. (Dynamic currency conversion is possible
        with <a href="http://drupal.org/project/commerce_multicurrency">Commerce
        Multicurrency</a>).</p>
    </div>
    <ul class="screenshot_breadcrumbs">
        <li class="first">Administration</li>
        <li>Store</li>
        <li>Product Pricing Rules</li>
        <li>Click Add Action</li>
        <li>Select Multiply</li>
        <li class="last">Multiply by 0.76</li>
    </ul>
</div>

<div class="screenshot screenshot-caption">
    <div class="img">
        <a href="/sites/default/files/docs/Cart-MultiCurrency-Step9.png"><img
        src="/sites/default/files/docs/Cart-MultiCurrency-Step9.png" alt="Create a new
        action using the convert to new currency rule." /></a>
    </div>
    <div class="caption">
        <p class="caption-title">Convert Currency Symbol</p>
        <p>Click Add Action.</p>
        <p>Select "Convert the unit price to a different currency" so that we
        can actually convert the currency from US dollars to a new currency.
        This exchange is only going to change the currency symbol, it will not
        actually tweak the numbers.</p>
    </div>
    <ul class="screenshot_breadcrumbs">
        <li class="first">Administration</li>
        <li>Store</li>
        <li>Product Pricing Rules</li>
        <li class="last">Click Add Action</li>
    </ul>
</div>

<div class="screenshot screenshot-caption">
    <div class="img">
        <a href="/sites/default/files/docs/Cart-MultiCurrency-Step10.png"><img
        src="/sites/default/files/docs/Cart-MultiCurrency-Step10.png" alt="Select the final
        currency destination. For our example, it will be EUR." /></a>
    </div>
    <div class="caption">
        <p class="caption-title">Final Currency</p>
        <p>We are simply selecting the final currency symbol. You can safely
        ignore the data selector.</p>
    </div>
    <ul class="screenshot_breadcrumbs">
        <li class="first">Administration</li>
        <li>Store</li>
        <li>Product Pricing Rules</li>
        <li>Click Add Action</li>
        <li class="last">Select Currency Symbol</li>
    </ul>
</div>

<div class="screenshot screenshot-caption">
    <div class="img">
        <a href="/sites/default/files/docs/Cart-MultiCurrency-Step11.png"><img
        src="/sites/default/files/docs/Cart-MultiCurrency-Step11.png" alt="Final rule
        screen for Static Currency Exchange Rate." /></a>
    </div>
    <div class="caption">
        <p class="caption-title">Final Screen</p>
        <p>The final screen for the rule. If yours doesn't look like this, go
        through the steps above carefully.</p>
    </div>
    <ul class="screenshot_breadcrumbs">
        <li class="first">Administration</li>
        <li>Store</li>
        <li>Product Pricing Rules</li>
        <li class="last">Review Custom Rule</li>
    </ul>
</div>

<div class="screenshot screenshot-caption">
    <div class="img">
        <a href="/sites/default/files/docs/Cart-MultiCurrency-Step12.png"><img
        src="/sites/default/files/docs/Cart-MultiCurrency-Step12.png" alt="Notice how the
        cart and the product page show the converted price." /></a>
    </div>
    <div class="caption">
        <p class="caption-title">Example Cart</p>
        <p>We have not modified any of the products prices, but we have
        successfully converted all of the currency to Euros and exchanged the
        prices. For example, Product Three is listed as $32.00 US dollars.</p>
    </div>
</div>
</div>