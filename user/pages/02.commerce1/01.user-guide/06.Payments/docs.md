---
title: Payments
taxonomy:
    category: docs
---

<div class="docs-enhanced">
<p>First, what are payment gateways? Payment gateways are a pluggable system that allows you to interface with a payment provider to handle the secure payment transactions for whatever you are selling. Paypal or Authorize.net are good examples of payment providers. The systems that sends your orders off to your payment provider and brings them back to your site are called payment gateways. These gateways are all unique because they have very different features and requirements.</p>
<p>There are two kinds of payment methods that payment providers use: On-Site and Off-Site. Each of those are described below:</p>
<ul>
    <li><strong>On-Site</strong>: You can think of on-site payment as having the credit card field on your website. The software is specifically designed to not let you store that information, only to send it to a payment provider.</li>
    <li><strong>Off-Site</strong>: This is the common form of payment where you send your user, with order details, off to another site that will process the transaction and then send them back (hopefully) to your site.</li>
</ul>
<h2>On-site Payment Methods</h2>
<p><strong>Example Payment Method</strong> - Drupal Commerce ships with an example payment method that is simply there for testing purposes to demonstrate how basic payment appears on the checkout form. It also shows how to integrate a submit form callback for the payment method that collects additional data related to the payment method during checkout.</p>
<p><strong>Credit Card</strong> - The core Payment module includes a file of helper forms and functions for creating credit card payment method modules. Nothing in it allows for the storage of credit card data after the initial form submission. Instead, credit card payment method modules are responsible for immediately acting on the payment details input by the customer.</p>
<p>If the site needs delayed payment or recurring payment, the module should leverage some facility of the payment gateway to either retain authorization IDs for later capture or store credit card data securely at the gateway. For example implementations see the Commerce Authorize.Net and CyberSource integration modules.</p>
<h3>Showing Authorize.net Configuration for On-Site Payments</h3>
<div class="screenshot screenshot-caption">
    <div class="img">
        <a href="/user/pages/02.commerce1/01.user-guide/06.Payments/Pay-OnOffSite-On-1.png">
            <img src="/user/pages/02.commerce1/01.user-guide/06.Payments/Pay-OnOffSite-On-1.png" alt="Enable Authorize.net for example On-Site Payment configuration." />
        </a>
    </div>
    <div class="caption">
        <p class="caption-title">Enable Module</p>
        <p>Enable the Authorize.net module for example On-Site Payment configuration.</p>
    </div>
    <ul class="screenshot_breadcrumbs">
        <li class="first">Administration</li>
        <li class="last">Modules</li>
    </ul>
</div>

<div class="screenshot screenshot-caption">
    <div class="img">
        <a href="/user/pages/02.commerce1/01.user-guide/06.Payments/Pay-OnOffSite-On-2.png">
            <img src="/user/pages/02.commerce1/01.user-guide/06.Payments/Pay-OnOffSite-On-2.png" alt="You must enable Payment Methods before you can use them." />
        </a>
    </div>
    <div class="caption">
        <p class="caption-title">Enable Payment Methods</p>
        <p>Once you've enabled the modules, they will appear in the Payment Methods section of the Store Configuration. A lot of people will go here first before enabling the modules.</p>
    </div>
    <ul class="screenshot_breadcrumbs">
        <li class="first">Administration</li>
        <li>Store</li>
        <li class="last">Store Configuration</li>
    </ul>
</div>

<div class="screenshot screenshot-caption">
    <div class="img">
        <a href="/user/pages/02.commerce1/01.user-guide/06.Payments/Pay-OnOffSite-On-3.png">
            <img src="/user/pages/02.commerce1/01.user-guide/06.Payments/Pay-OnOffSite-On-3.png" alt="Enable the On-Site Payment Method example Authorize.net" />
        </a>
    </div>
    <div class="caption">
        <p class="caption-title">Enable Method Rule</p>
        <p>Before you can configure, let's go ahead and enable the on-site payment method example Authorize.net</p>
    </div>
    <ul class="screenshot_breadcrumbs">
        <li class="first">Administration</li>
        <li>Store</li>
        <li>Store Configuration</li>
        <li class="last">Payment Methods</li>
    </ul>
</div>

<div class="screenshot screenshot-caption">
    <div class="img">
        <a href="/user/pages/02.commerce1/01.user-guide/06.Payments/Pay-OnOffSite-On-4.png">
            <img src="/user/pages/02.commerce1/01.user-guide/06.Payments/Pay-OnOffSite-On-4.png" alt="Configure Authorize.net" />
        </a>
    </div>
    <div class="caption">
        <p class="caption-title">Configure Payment Method</p>
        <p>After you have enabled the rule, you can now click "edit" to configure your payment method.</p>
    </div>
    <ul class="screenshot_breadcrumbs">
        <li class="first">Administration</li>
        <li>Store</li>
        <li>Store Configuration</li>
        <li>Payment Methods</li>
        <li class="last">Configure Payment Method</li>
    </ul>
</div>

<div class="screenshot screenshot-caption">
    <div class="img">
        <a href="/user/pages/02.commerce1/01.user-guide/06.Payments/Pay-OnOffSite-ON-5.png">
            <img src="/user/pages/02.commerce1/01.user-guide/06.Payments/Pay-OnOffSite-ON-5.png" alt="This is where you configure the Payment Method." />
        </a>
    </div>
    <div class="caption">
        <p class="caption-title">Configure Payment Method</p>
        <p>Once you click "Edit" you are presented with the rule configuration screen. To edit your credentials/etc you need to click "edit" on the actions. You could also add conditions to when this payment method should be used (only on orders over $50, perhaps?).</p>
    </div>
    <ul class="screenshot_breadcrumbs">
        <li class="first">Administration</li>
        <li>Store</li>
        <li>Store Configuration</li>
        <li>Payment Methods</li>
        <li class="last">Configure Payment Method</li>
    </ul>
</div>

<div class="screenshot screenshot-caption">
    <div class="img">
        <a href="/user/pages/02.commerce1/01.user-guide/06.Payments/Pay-OnOffSite-On-6.png">
            <img src="/user/pages/02.commerce1/01.user-guide/06.Payments/Pay-OnOffSite-On-6.png" alt="This is an example Authorize.net configuration screen." />
        </a>
    </div>
    <div class="caption">
        <p class="caption-title">Example Config Screen</p>
        <p>Highlighted here on a functional Authorize.net configuration screen are the two recommended options just for testing purposes.</p>
    </div>
    <ul class="screenshot_breadcrumbs">
        <li class="first">Administration</li>
        <li>Store</li>
        <li>Store Configuration</li>
        <li>Payment Methods</li>
        <li class="last">Configure Payment Method</li>
    </ul>
</div>

<div class="screenshot screenshot-caption">
    <div class="img">
        <a href="/user/pages/02.commerce1/01.user-guide/06.Payments/Pay-OnOffSite-On-7.png">
            <img src="/user/pages/02.commerce1/01.user-guide/06.Payments/Pay-OnOffSite-On-7.png" alt="You can see our credit card payment method has been enabled." />
        </a>
    </div>
    <div class="caption">
        <p class="caption-title">On-Site Payment</p>
        <p>On-Site Payment Method is now functional for Authorize.net.</p>
    </div>
</div>
<h2>Off-site Payment Methods</h2>
<h3>Redirected Payment Workflow</h3>
<p>Drupal Commerce does its best to handle the redirected payment workflow in a like manner to on-site payment methods in the checkout process. Customers will leave from and return to the same place in checkout, so both your on-site and off-site customers should see all the same pages and have their orders processed identically with the sole exception of the optional payment redirect page that only appears when necessary.</p>
<p>Most redirected payment methods send some sort of asynchronous message to your site to provide an authoritative payment notification. Often, this can arrive at your site before the customer actually returns from the payment gateway. In this case, your payment notification listener should update the order as necessary on receipt of the successful payment notification and use the API to move the order forward to the next checkout page.</p>
<h3>Off-site Payment Method Examples</h3>
<p>For an example implementation, see the PayPal WPS module of the Commerce PayPal integration. The base PayPal module in that project defines a pluggable IPN listener that demonstrates how to listen for and handle asynchronous payment notifications from the payment gateway, though your implementation doesn’t necessarily need to be pluggable.</p>
<h3>Showing PayPal Configuration for Off-Site Payments</h3>
<div class="screenshot screenshot-caption">
    <div class="img">
        <a href="/user/pages/02.commerce1/01.user-guide/06.Payments/Pay-OnOffSite-Off-1.png">
            <img src="/user/pages/02.commerce1/01.user-guide/06.Payments/Pay-OnOffSite-Off-1.png" alt="Enable PayPal for example Off-Site Payment configuration." />
        </a>
    </div>
    <div class="caption">
        <p class="caption-title">Enable Module</p>
        <p>Enable the PayPal module for example Off-Site Payment configuration.</p>
    </div>
    <ul class="screenshot_breadcrumbs">
        <li class="first">Administration</li>
        <li class="last">Modules</li>
    </ul>
</div>

<div class="screenshot screenshot-caption">
    <div class="img">
        <a href="/user/pages/02.commerce1/01.user-guide/06.Payments/Pay-OnOffSite-Off-2.png">
            <img src="/user/pages/02.commerce1/01.user-guide/06.Payments/Pay-OnOffSite-Off-2.png" alt="You must enable Payment Methods before you can use them." />
        </a>
    </div>
    <div class="caption">
        <p class="caption-title">Enable Payment Methods</p>
        <p>Once you've enabled the modules, they will appear in the Payment Methods section of the Store Configuration. A lot of people will go here first before enabling the modules.</p>
    </div>
    <ul class="screenshot_breadcrumbs">
        <li class="first">Administration</li>
        <li>Store</li>
        <li class="last">Store Configuration</li>
    </ul>
</div>

<div class="screenshot screenshot-caption">
    <div class="img">
        <a href="/user/pages/02.commerce1/01.user-guide/06.Payments/Pay-OnOffSite-Off-3.png">
            <img src="/user/pages/02.commerce1/01.user-guide/06.Payments/Pay-OnOffSite-Off-3.png" alt="Enable the Off-Site Payment Method example PayPal" />
        </a>
    </div>
    <div class="caption">
        <p class="caption-title">Enable Method Rule</p>
        <p>Before you can configure, let's go ahead and enable the off-site payment method example PayPal</p>
    </div>
    <ul class="screenshot_breadcrumbs">
        <li class="first">Administration</li>
        <li>Store</li>
        <li>Store Configuration</li>
        <li class="last">Payment Methods</li>
    </ul>
</div>

<div class="screenshot screenshot-caption">
    <div class="img">
        <a href="/user/pages/02.commerce1/01.user-guide/06.Payments/Pay-OnOffSite-Off-4.png">
            <img src="/user/pages/02.commerce1/01.user-guide/06.Payments/Pay-OnOffSite-Off-4.png" alt="Configure PayPal" />
        </a>
    </div>
    <div class="caption">
        <p class="caption-title">Configure Payment Method</p>
        <p>After you have enabled the rule, you can now click "edit" to configure your payment method.</p>
    </div>
    <ul class="screenshot_breadcrumbs">
        <li class="first">Administration</li>
        <li>Store</li>
        <li>Store Configuration</li>
        <li>Payment Methods</li>
        <li class="last">Configure Payment Method</li>
    </ul>
</div>

<div class="screenshot screenshot-caption">
    <div class="img">
        <a href="/user/pages/02.commerce1/01.user-guide/06.Payments/Pay-OnOffSite-Off-5.png">
            <img src="/user/pages/02.commerce1/01.user-guide/06.Payments/Pay-OnOffSite-Off-5.png" alt="This is where you configure the Payment Method." />
        </a>
    </div>
    <div class="caption">
        <p class="caption-title">Configure Payment Method</p>
        <p>Once you click "Edit" you are presented with the rule configuration screen. To edit your credentials/etc you need to click "edit" on the actions. You could also add conditions to when this payment method should be used (only on orders over $50, perhaps?).</p>
    </div>
    <ul class="screenshot_breadcrumbs">
        <li class="first">Administration</li>
        <li>Store</li>
        <li>Store Configuration</li>
        <li>Payment Methods</li>
        <li class="last">Configure Payment Method</li>
    </ul>
</div>

<div class="screenshot screenshot-caption">
    <div class="img">
        <a href="/user/pages/02.commerce1/01.user-guide/06.Payments/Pay-OnOffSite-Off-6.png">
            <img src="/user/pages/02.commerce1/01.user-guide/06.Payments/Pay-OnOffSite-Off-6.png" alt="You can see our PayPal payment method has been enabled." />
        </a>
    </div>
    <div class="caption">
        <p class="caption-title">Off-Site Payment</p>
        <p>Off-Site Payment Method is now functional for PayPal.</p>
    </div>
</div>
</div>