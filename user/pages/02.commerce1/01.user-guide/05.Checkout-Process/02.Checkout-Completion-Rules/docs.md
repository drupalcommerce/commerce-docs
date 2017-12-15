---
title: Checkout Completion Rules
taxonomy:
    category: docs
---

<div class="docs-enhanced">
<p>Drupal Commerce defines several default checkout completion rules that perform the following operations when an order in checkout first reaches the checkout completion page:</p>
<ul>
    <li>Updates the order status to the default status of the Pending state (typically the matching Pending status).</li>
    <li>Assigns an anonymous order with a known e-mail address to the appropriate user account -or-</li>
    <li>Creates a new user and sends the new account e-mail notification to the customer.</li>
    <li>Send an order notification e-mail to the customer.</li>
</ul>
<p>You are free to customize these defaults rules, disable them entirely, and add your own rules to address your business logic pertaining to what must happen on checkout completion. Note that payment may not have been completed at this time; it may still be pending or it may have been submitted as an authorization awaiting a later capture.</p>
<p>If you have business logic that depends on payment being completed, you should add rules to the When an order is first paid in full event instead.</p>
<h2>Excercise: Fulfillment Email</h2>
<p>To demonstrate the Checkout Rules, we've created an exercise that will send an email to our fulfillment shop once the payment is complete. This is a particularly interesting case because we will not use the event that Commerce picks for us by default. All is explained in the captions.</p>
<div class="screenshot screenshot-caption">
    <div class="img">
        <a href="/sites/default/files/docs/Checkout-Rules-Exercise-1.png">
            <img src="/sites/default/files/docs/Checkout-Rules-Exercise-1.png" alt="Create a Fulfillment Email Action" />
        </a>
    </div>
    <div class="caption">
        <p class="caption-title">Add Checkout Rule</p>
        <p>By click on "Add Checkout Rule" you have taken the first step. Though, technically this rule is not a checkout rule because of the event we will be using, it's not a bad place to start.</p>
    </div>
    <ul class="screenshot_breadcrumbs">
        <li class="first">Administration</li>
        <li>Store</li>
        <li>Store Configuraiton</li>
        <li>Checkout</li>
        <li class="last">Checkout Rules: Add Rule</li>
    </ul>
</div>

<div class="screenshot screenshot-caption">
    <div class="img">
        <a href="/sites/default/files/docs/Checkout-Rules-Exercise-2.png">
            <img src="/sites/default/files/docs/Checkout-Rules-Exercise-2.png" alt="We need to replace an event." />
        </a>
    </div>
    <div class="caption">
        <p class="caption-title">Replace Event</p>
        <p>First, go ahead and delete the event that is at the top. Next, you will want to click "Add Event." This is because we don't want to send our fulfillment email until we've received payment.</p>
    </div>
    <ul class="screenshot_breadcrumbs">
        <li class="first">Administration</li>
        <li>Workflow</li>
        <li>Rules</li>
        <li>Edit Rule</li>
        <li class="last">Rule Overview</li>
    </ul>
</div>

<div class="screenshot screenshot-caption">
    <div class="img">
        <a href="/sites/default/files/docs/Checkout-Rules-Exercise-3.png">
            <img src="/sites/default/files/docs/Checkout-Rules-Exercise-3.png" alt="Choose this event. " />
        </a>
    </div>
    <div class="caption">
        <p class="caption-title">Choose this event.</p>
        <p>This event will only fire after payment is paid in full. "Completing the Checkout" is not "Paid in Full" and this distinction can be a common mistake. That might allow your customer to fraudulently use a payment that doesn't complete and you find out after you have given them access or sent them the physical product.</p>
    </div>
    <ul class="screenshot_breadcrumbs">
        <li class="first">Administration</li>
        <li>Workflow</li>
        <li>Rules</li>
        <li>Edit Rule</li>
        <li class="last">Add Event</li>
    </ul>
</div>

<div class="screenshot screenshot-caption">
    <div class="img">
        <a href="/sites/default/files/docs/Checkout-Rules-Exercise-4.png">
            <img src="/sites/default/files/docs/Checkout-Rules-Exercise-4.png" alt="Add Action for sending email." />
        </a>
    </div>
    <div class="caption">
        <p class="caption-title">Add Action</p>
        <p>Up until now, this rule could be used for anything. Perhaps you want to assign "Valued Customer" role and send them a 50% coupon code? Anything is possible with Rules. Here, we just want to add an action that will send an email. Can be found under "System &gt; Send Mail"</p>
    </div>
    <ul class="screenshot_breadcrumbs">
        <li class="first">Administration</li>
        <li>Workflow</li>
        <li>Rules</li>
        <li>Edit Rule</li>
        <li class="last">Add Action</li>
    </ul>
</div>

<div class="screenshot screenshot-caption">
    <div class="img">
        <a href="/sites/default/files/docs/Checkout-Rules-Exercise-5.png">
            <img src="/sites/default/files/docs/Checkout-Rules-Exercise-5.png" alt="Add email, subject" />
        </a>
    </div>
    <div class="caption">
        <p class="caption-title">Configure Action</p>
        <p>This is the straightforward email action page. This replaces the .tpl for ubercart, which means only plain text emails are possible. If you want HTML emails, we recommend <a href="http://drupal.org/project/mimemail">Mime Mail</a> for Drupal (it's designed to work within Rules very well).</p>
    </div>
    <ul class="screenshot_breadcrumbs">
        <li class="first">Administration</li>
        <li>Workflow</li>
        <li>Rules</li>
        <li>Edit Rule</li>
        <li class="last">Configure Action</li>
    </ul>
</div>

<div class="screenshot screenshot-caption">
    <div class="img">
        <a href="/sites/default/files/docs/Checkout-Rules-Exercise-6.png">
            <img src="/sites/default/files/docs/Checkout-Rules-Exercise-6.png" alt="Final Rule" />
        </a>
    </div>
    <div class="caption">
        <p class="caption-title">Final Rule</p>
        <p>This is what our Fulfillment Email Rule looks like when we're done. It reads, "When an order is paid in full, Send Mail." You can't have gone through this and not absolutely fallen in love with Actions.</p>
    </div>
    <ul class="screenshot_breadcrumbs">
        <li class="first">Administration</li>
        <li>Workflow</li>
        <li>Rules</li>
        <li>Edit Rule</li>
        <li class="last">Rule Overview</li>
    </ul>
</div>

<div class="screenshot screenshot-caption">
    <div class="img">
        <a href="/sites/default/files/docs/Checkout-Rules-Exercise-7.png">
            <img src="/sites/default/files/docs/Checkout-Rules-Exercise-7.png" alt="Notice that even after checkout, the status is pending." />
        </a>
    </div>
    <div class="caption">
        <p class="caption-title">Testing the Rule</p>
        <p>We added a product to our cart, checked out, and nothing seemed to happen. Notice that even after checkout, the status on the order is "Pending." This is what happens with the default testing payment method. But the event does happen, it just won't show a "display message" action.</p>
    </div>
    <ul class="screenshot_breadcrumbs">
        <li class="first">Administration</li>
        <li>Store</li>
        <li>Store Configuraiton</li>
        <li>Orders</li>
        <li class="last">Edit Order</li>
    </ul>
</div>
<p>To get the event to fire in a way you can see, simply create an order and apply a payment manually.</p>
</div>