---
title: Drupal Commerce Extra Panes
taxonomy:
    category: docs
---

The module for extra panes can be found here:
<ul><li><a href="http://drupal.org/project/commerce_extra_panes">http://drupal.org/project/commerce_extra_panes</a></li></ul>

Then you can configure an extra pane for the checkout process at:
admin/commerce/config/checkout/extra

For instance, if you need the legal aspects (terms of service) information you can proceed as follows:
Create a new node with your information called "Terms of Service" (or something else...)
under: admin/commerce/config/checkout/extra you can now add this node to a pane.
A new pane is added to your checkout procedure: admin/commerce/config/checkout

Now you can configure the pane "Terms of Service" like this: 
Under: "Extra panes Terms of Service"
Check "Enable this pane as Terms of Service." &
Check "Make the terms of service required."
Please be aware that this pane should be shown during the checkout procedure, not under review or something else.

For my purposes, the Terms of Service did not need to be shown again on the review page, therefore I unchecked "Include this pane on the Review checkout pane"

Hope this helps a little bit since I was struggling with it for a couple of hours.