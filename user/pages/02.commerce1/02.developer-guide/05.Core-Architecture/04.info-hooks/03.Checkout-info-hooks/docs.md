---
title: Checkout info hooks
taxonomy:
    category: docs
---

<ol>
<li><a href="#checkout-page">hook_commerce_checkout_page_info()</a></li>
<li><a href="#checkout-pane">hook_commerce_checkout_pane_info()</a></li>
</ol>

<a name="checkout-page"> </a>
<h3>hook_commerce_checkout_page_info()</h3>

The Checkout module uses this hook to collect information on all the available pages in the checkout process.  The checkout form is not a true multi-step form in the Drupal sense, but it does use a series of connected menu items and the same form builder function to present the contents of each checkout page.  Furthermore, as the customer progresses through checkout, their order’s status will be updated to reflect their current step in checkout.

The Checkout module defines several checkout pages in its own implementation of this hook, commerce_checkout_commerce_checkout_page_info():
<ul>
<li>Checkout - the basic page where the customer will enter their order information</li>
<li>Review - a page where they can verify that the details of their order are correct (and the default location of the payment checkout pane if the Payment module is enabled)</li>
<li>Complete - the final step in checkout displaying pertinent order details and links</li>
</ul>

The Payment module adds an additional page:
<ul>
<li>Payment - a page that only appears when the customer selected an offsite payment method; the related checkout pane handles building the form and automatically submitting it to send the customer to the payment provider</li>
</ul>

The checkout page array contains properties that define how the page should interact with the shopping cart and order status systems.  It also contains properties that define the appearance and use of buttons on the page.  The full list of properties is as follows:
<ul>
<li><em>page_id</em> - string identifying the page, lowercase using alphanumerics, -, and _</li>
<li>title - the Drupal page title used for this checkout page</li>
<li>name - the translatable name of the page, used in administrative displays and the page’s corresponding order status; if not specified, defaults to the title</li>
<li>help - the translatable help text displayed in a .checkout-help div at the top of the checkout page (defined as part of the form array, not displayed via hook_help())</li>
<li>weight - integer weight of the page used for determining the page order; populated automatically if not specified</li>
<li>status_cart - TRUE or FALSE indicating whether or not this page’s corresponding order status should be considered a shopping cart order status (this is necessary because the shopping cart module relies on order status to identify the user’s current shopping cart); defaults to TRUE</li>
<li>buttons - TRUE or FALSE indicating whether or not the checkout page should have buttons for continuing and going back in the checkout process; defaults to TRUE</li>
<li>back_value - the translatable value of the submit button used for going back in the checkout process; defaults to ‘Back’</li>
<li>submit_value - the translatable value of the submit button used for going forward in the checkout process; defaults to ‘Continue’</li>
<li>prev_page - the page_id of the previous page in the checkout process; should not be set by the hook but will be populated automatically when the page is loaded</li>
<li>next_page - the page_id of the next page in the checkout process; should not be set by the hook but will be populated automatically when the page is loaded</li>
</ul>

Example checkout page definition:

<?php
$checkout_pages['complete'] = array(
 'name' => t('Complete'),
 'title' => t('Checkout complete'),
 'weight' => 50,
 'status_cart' => FALSE,
 'buttons' => FALSE,
);
?>

At this point there is no way to add checkout pages via the UI, so sites wishing to add extra steps to the checkout process will need to define custom pages.  Existing pages may be altered using hook_commerce_checkout_page_info_alter(&$checkout_pages) before the defaults are merged in and the pages are sorted by weight.

A single checkout page array is referred to as $checkout_page.
An array of checkout page array keyed by page_id is referred to as $checkout_pages.
The page_id of a checkout page is referred to as $page_id.

<a name="checkout-pane"> </a>
<h3>hook_commerce_checkout_pane_info()</h3>

The Checkout module uses this hook to collect information on all the available checkout panes that may be assigned to checkout pages to build the checkout form.  Any number of panes may be assigned to a page and reordered using the checkout form builder.  Each pane may also have its own settings form accessible from the builder.  On the checkout page, a pane is represented as a fieldset.  Panes possess a variety of callbacks used to define settings and checkout form elements and validate / process submitted data.

The Checkout module defines a couple of checkout panes in its own implementation of this hook, commerce_checkout_commerce_checkout_pane_info():
<ul>
<li>Review - the main pane on the default Review page that displays details from other checkout panes for the user to review prior to completion</li>
<li>Completion message - the main pane on the default Complete page that displays the checkout completion message and links</li>
</ul>

Other checkout panes are defined by the Cart, Customer, and Payment modules as follows:
<ul>
<li>Shopping cart contents - displays a View listing the contents of the shopping cart order with a summary including the total cost and number of items but no links (as used in the cart block)</li>
<li>Customer profile panes - the Customer module defines one for each type of customer information profile using the name of the profile type as the title of the pane</li>
<li>Payment - the main payment pane that lets the customer select a payment method and supply any necessary payment details; appears on the Review page beneath the Review pane by default, allowing payments to be processed immediately on submission for security purposes</li>
<li>Off-site payment redirect - a pane that handles redirected payment services with some specialized behavior; should be the only pane on the actual payment page</li>
</ul>

The checkout pane array contains properties that directly affect the pane’s fieldset display on the checkout form.  It also contains a property used to automatically populate an array of callback function names.  The full list of properties is as follows:
<ul>
<li><em>pane_id</em> - string identifying the pane, lowercase using alphanumerics, -, and _</li>
<li>title - the translatable title used for this checkout pane as the fieldset title in checkout</li>
<li>name - the translatable name of the pane, used in administrative displays; if not specified, defaults to the title</li>
<li>page - the page_id of the checkout page the pane should appear on by default; defaults to ‘checkout’</li>
<li>collapsible - TRUE or FALSE indicating whether or not the checkout pane’s fieldset should be collapsible; defaults to FALSE</li>
<li>collapsed - TRUE or FALSE indicating whether or not the checkout pane’s fieldset should be collapsed by default; defaults to FALSE</li>
<li>weight - integer weight of the page used for determining the page order; defaults to 0</li>
<li>enabled - TRUE or FALSE indicating whether or not the pane is enabled by default; defaults to TRUE</li>
<li>review - TRUE or FALSE indicating whether or not the pane should be included in the review checkout pane; defaults to TRUE</li>
<li>module - the name of the module that defined the pane; should not be set by the hook but will be populated automatically when the pane is loaded</li>
<li>file - the filepath of an include file relative to the pane’s module containing the callback functions for this pane, allowing modules to store checkout pane code in include files that only get loaded when necessary (like the menu item file property)</li>
<li>base - string used as the base for the magically constructed callback names, each of which will be defaulted to [base]_[callback] unless explicitly set; defaults to the pane_id</li>
<li>callbacks - an array of callback function names for the various types of callback required for all the checkout pane operations, arguments per callback in parentheses:
<ul>
<li>settings_form - ($checkout_pane) - returns form elements for the pane’s settings form</li>
<li>checkout_form - ($form, &$form_state, $checkout_pane, $order) - returns form elements for the pane’s checkout form fieldset</li>
<li>checkout_form_validate - ($form, &$form_state, $checkout_pane, $order) - validates data inputted via the pane’s elements on the checkout form and returns TRUE or FALSE indicating whether or not all the data passed validation</li>
<li>checkout_form_submit - ($form, &$form_state, $checkout_pane, $order) - processes data inputted via the pane’s elements on the checkout form, often updating parts of the order object based on the data</li>
<li>review - ($form, $form_state, $checkout_pane, $order) - returns data used in the construction of the Review checkout pane</li>
</ul></li>
</ul>

The helper function commerce_checkout_pane_callback() will include a checkout pane’s include file if specified and check for the existence of a callback, returning either the name of the function or FALSE if the specified callback does not exist for the specified pane.

Example checkout pane definition:

<?php
$checkout_panes['checkout_completion_message'] = array(
  'title' => t('Completion message'),
  'file' => 'includes/commerce_checkout.checkout_pane.inc',
  'base' => 'commerce_checkout_completion_message_pane',
  'page' => 'complete',
);
?>

Checkout panes may be altered using hook_commerce_checkout_pane_info_alter(&$checkout_panes) before the defaults are merged in and the panes are sorted by weight (but after the module has been set).

A single checkout pane array is referred to as $checkout_pane.
An array of checkout pane array keyed by pane_id is referred to as $checkout_panes.
The pane_id of a checkout pane is referred to as $pane_id.