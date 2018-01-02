---
title: Upgrading Shipping from 1.x to 2.x
taxonomy:
    category: docs
---

If you've previously installed Commerce Shipping 1.x and have used it in production, you'll want to ensure you get the update process right to prevent any data from being lost in the update. The full update process is as follows:

<ol><li>Ensure you're running the latest version of Commerce Shipping 1.x. As of right now, that is Commerce Shipping 1.1.</li>
<li>Backup your site - particularly the database.</li>
<li>Disable (but do not uninstall) any shipping method module on your site developed to work with Commerce Shipping 1.x. For example, if you have been using <a href="http://drupal.org/project/commerce_shipping_flat_rate" rel="nofollow">Commerce Shipping Flat Rate</a>, disable that module. You should not disable any of the actual Commerce Shipping modules from this project.</li>
<li>Replace the entire commerce_shipping module folder with the new Commerce Shipping 2.x module. Do not just copy the new files into the old directory, as the file structure has changed and you won't want to leave outdated files in the directory.</li>
<li>Run update.php. If you're updating from Commerce Shipping 1.1, you should see a single update function, update 7100. It will begin to process your existing shipping line items in batches of 25 to update them and the orders they're attached to for the new shipping API.</li>
<li>Uninstall the shipping method modules you disabled in step 3.</li>
<li>If you were using <a href="http://drupal.org/project/commerce_shipping_flat_rate" rel="nofollow">Commerce Shipping Flat Rate</a>, install instead the <a href="http://drupal.org/project/commerce_flat_rate" rel="nofollow">Commerce Flat Rate</a> module and rebuild your flat rate shipping services in the new interface.</li>
<li>Browse to <strong>Administration » Configuration » Workflow » Rules</strong>. Scan the list for "broken" rules that were created by Commerce Shipping 1.x shipping methods. Feel free to delete these rules after copying any necessary logic from them over to the new shipping method / service rule configurations.</li>
</ol>

Please note that because of the drastic differences in this module's API and points of integration with Rules, it simply isn't possible to automate the migration of shipping method rules from Commerce Shipping 1.x into Commerce Shipping 2.x. They will have to be manually recreated, so you should run the update in a test site to ensure you can recreate the shipping configurations used by your site post-update.

Additionally, the names of some fields, Rules conditions / actions, and price component types defined by the module have changed. If you have referenced these things from other Views, Rules, or custom code, you must update them when you migrate to Commerce Shipping 2.x.

We fully stand behind the migration and are happy to assist you if you have any difficulties. You can find us in the Commerce Shipping issue queue or in the #drupal-commerce on IRC.