---
title: Paypal WPP
taxonomy:
    category: docs
---

The primary advantage of WPP over WPS is that your customer stays on your website throughout the payment process. It offers a more professional user experience than being diverted to a Paypal page. From the customer's point of view, it is as if you have a full merchant account. 

This page builds on the previous page that enabled WPS. While WPS is not a requirement for WPP, you might find it easier to work through that first.
<!--break-->
<ul>
<li>Install and enable cURL with php support, if you don't already have it. For example (assumes PHP5 and FPM): 
<code>sudo apt-get install php5-curl
service php5-fpm restart</code>
Using shared hosting? Many hosts already enable cURL. Check whether cURL is installed properly by viewing your phpinfo page. (<a href="http://www.phpinfofile.com/">Make a phpinfo page</a>.) If not, you'll have to convince your host to install it.</li>

<li>Log into your Paypal developer account and make a new sandbox test account. Choose the preconfigured "Website Payments Pro" account type. It's not, as you might expect, the same as your previous seller accounts. To add to the confusion, after you create it, it'll be listed on the sandbox accounts page as another "business" account, same as your "standard" seller. To help distinguish, you might want to set either the country or initial balance to something different. That way, at least you'll be able to expand the "View Details" section to get a hint of which account to select. Make a note of your password or set your own.</li>

<li>Back on the developer page, choose API credentials. You will see a set of API credentials for each seller account you've created. On <em>this</em> page, perhaps the easiest way to distinguish the one you want is probably by the creation date.</li>

<li>In your Drupal tab, go to <em>Store » Configuration » Payment methods</em>. Enable "PayPal WPP - Credit Card" (assuming you previously enabled it on your site's modules page, and perhaps cleared cache.) Click Edit. On the next page scroll down to Actions and click Edit. Under Payment Settings, paste your info from your Paypal API credentials page, choose other settings as you like; make sure transaction type is "Authorization and capture". Save and exit.</li>

<li>Test it by using the credit card details from the View Details link on your Paypal sandbox account page. (Don't log in into the sandbox account, they're cleverly hidden there.) Use any name and address, and any 3-digit security code.</li>

<li>From the sandbox test account home page, select the account you just created, and log in.</li>
</ul>