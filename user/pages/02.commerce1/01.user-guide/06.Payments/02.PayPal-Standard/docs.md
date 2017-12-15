---
title: PayPal Standard
taxonomy:
    category: docs
---

This guide walk you through setting up PayPal Website Payments Standard (WPS) for use with your Drupal Commerce site. It has been adapted from instructions at http://drupal.org/node/1126786. This guide is almost complete, but if you need to do this, please test it and leave feedback on whether it needs changing (or better, just change it yourself).

<h3>Developer account creation</h3>
<ul>
<li>Head to http://developer.paypal.com and create a developer account to use with the sandbox.</li>
<li><strong>Important:</strong> this is your <em>master</em> sandbox account. <em>Within</em> this account you are going to create further accounts. Think of it like the movie <a href="http://www.imdb.com/title/tt1375666/">Inception</a>, only the PayPal version: horribly badly laid out, and barely functional.
<li>Check your email for the confirmation link and click it to verify your developer account.</li>
<li>Log into the sandbox using the credentials you have created.</li>
</ul>

<h3>Buyer account creation</h3>

<ul>
<li>Under "Test Accounts", choose "create a pre-configured account".</li>
<li>Choose to create a buyer account.</li>
<li><strong><em>Take note</em></strong> of the password here or choose something you will remember as I do not see a way of retrieving it or editing it later.</li>
<li>"Add bank account" should be "yes".</li>
<li>Set the other options as you wish.</li>
<li>When asked for a balance, choose something high enough that you won't run out. For example, if most of your site's sale items are around $10, a balance of $9999 should be fine.</li>
<li>You should now see the "test accounts" page in the sandbox master account, with your account present.</li>
<li>Check the radio button next to your account, if it is not already checked, and choose "Enter Sandbox Test Site" at the bottom.</li>
<li>A popup window will appear. (What is this, 1995?) The username will already be filled in, and you will need to enter the password that you set up on the <em>buyer</em> account. This is <em>not</em> your master developer account password.</li>
<li>Make sure the login works properly. If it does, you can now close this window and return to the master developer account window.</li>
</ul>

<h3>Seller account creation</h3>

<ul>
<li>Under "Test Accounts", choose "create a pre-configured account".</li>
<li>Choose to create a seller account this time.</li>
<li><strong><em>Take note</em></strong> of the password here or choose something you will remember as I do not see a way of retrieving it or editing it later.</li>
<li>"Add bank account" should be "yes".</li>
<li>Set the other options as you wish.</li>
<li>When asked for a balance, choose anything you like.</li>
<li>On the "test accounts" page in the sandbox master account, you should now have two accounts.</li>
<li>Check the radio button next to your new seller account, if it is not already checked, and choose "Enter Sandbox Test Site" at the bottom.</li>
<li>That popup appears again. The username will already be filled in, and you will need to enter the password that you set up on the <em>seller</em> account. This is <em>not</em> your master developer account password.</li>
<li>Make sure the login works properly. If it does, you can now close this window and return to the master developer account window.</li>
</ul>

<h3>Drupal Commerce setup</h3>

<ul>
<li>This assumes you have already set up Drupal Commerce with a shop and everything else you need it for, and just need to link it to a payment processor, which is why you're reading this, so it won't walk you through Drupal Commerce setup itself.</li>
<li>Make sure you have the <a href="http://drupal.org/project/commerce_paypal">commerce_paypal</a> module downloaded and placed inside one of the appropriate module directories.</li>
<li>Enable the PayPal and PayPal WPS modules.</li>
<li>On your site, visit <em>admin/commerce/config/payment-methods</em> and you should see the "PayPal WPS" method. (if you don't try clearing your cache: http://drupal.org/node/1365728 )</li>
<li>Click "enable" on the right side.</li>
<li>Click "edit" on the right side.</li>
<li>You are now editing a rule. There are 2 parts to the rule: an event, which is "Select available payment methods for an order", and is filled for you, and an action, "Enable payment method: PayPal WPS". There are no conditions to this rule.</li>
<li>Next to the action, "Enable payment method: PayPal WPS", click "edit".</li>
<li>There are a number of PayPal-specific options here. For "PayPal email address", make <strong><em>sure</em></strong> you enter the <em>seller</em> account's email address. This is <em>not</em> the email address you used when signing up for a master developer account, nor is it the email address you created when you set up a buyer account. It is likely to have a bunch of random numbers in it. If in doubt, go to the "Test Accounts" page in your master developer account in the PayPal sandbox, and check what email addresses you have. It will be the one associated with the "Business" account.</li>
<li>Set up your currency and language as desired.</li>
<li>Use the "sandbox" server, the "sale" method, and I recommend using the "log notifications with the full IPN" option, as this is good for debugging.</li>
<li>Save this</li>
</ul>

<h3>Make a test order</h3>

<ul>
<li>Go through your checkout process. On the order review page, you should see that the "payment method" appears as "PayPal WPS". Once you proceed past the order review page, you should have the option to be redirected to the PayPal site.</li>
<li>If this does <em>not</em> happen, check that you have sane checkout settings on your site at <em>admin/commerce/config/checkout</em>, otherwise this might affect Drupal Commerce's ability to redirect you to PayPal as part of the checkout process.</li>
<li>When you arrive at PayPal, <em>check</em> that the URL has "sandbox" in it. If it does not, you are using the live gateway, so go back to the PayPal WPS settings above, and ensure you've chosen to use the sandbox.</li>
<li>Enter the login credentials for the <em>buyer</em> account you set up earlier. This is <strong><em>not</em></strong> the master developer account, and not the seller account either. If you can't remember the email for this, you can return to your PayPal developer master account, go to "Test Accounts", and check the email address next to the "Personal" account.</li>
<li>You should be able to proceed though the payment process now, including being redirected back to your website once the payment is complete.</li>
</ul>

<h3>Orders are still pending</h3>

Orders will remain in the "pending" state unless the funds have been accepted by the seller using PayPal. In the sandbox, this means you would have to log into the developer master account, select the seller account, log into the sandbox, and from there, choose to accept the payments.

<h3>Converting to a live process</h3>

<ul>
<li>In order to make the switch to live, first, breathe a sigh of relief that you never have to deal with PayPal's sandbox again (unless something goes wrong).</li>
<li>On your site, at <em>admin/commerce/config/payment-methods</em>, edit your PayPal WPS settings.</li>
<li>Enter the email address of your real PayPal seller account.</li>
<li>Switch over from "sandbox" to "live", and I would also recommend switching off the debugging mode at this stage.</li>
<li>It is always best to test the live account is working properly by sending through a low-value order using your own credit card. You can then refund the order later if it works.</li>
</ul>