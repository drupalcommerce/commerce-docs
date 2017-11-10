---
title: Configure checkout
taxonomy:
    category: docs
---

## Checkout Flows

Checkout flow page is under Home >> Administration >> Commerce >> Configuration >> Checkout flows

![checkout_1](commerce-docs/images/contributing/checkout_1.JPG)

Drupal Commerce comes with a drag-and-drop checkout form builder that lets you decide what information you need to collect from or display to customers during the checkout process. It supports single and multi-page checkout depending on your requirements and can be easily extended with new components through the use of contributed or custom modules.

![checkout_2](commerce-docs/images/contributing/checkout_2.JPG)

Content of panes is split in this 7 parts, but it can be modular, so you can drag and drop them as you wish or even disable them.

Login - offers option for users to login or continue as guest, enables guest checkout
Order information - the initial form used to collect basic order details
Review - a review of all the order details with the pane for submitting paymen
Payment -  used to select Transaction Mode - Authorize and capture or Authorize only
Complete -  the final landing page showing the checkout completion message.
Sidebar - order summary and coupon redemptions
Disabled - Panes that you want to disable

Order information:
	Contains from Contact information and Payment information.

	Contact information is only visible for anonymous users, allowing them to specify an e-mail address to use for their order. 
	For authenticated users, the pane is not shown, because Drupal Commerce initializes the order e-mail address field to the same e-mail address on file in their user account. 
	Upon checkout completion, anonymous users who supplied an existing e-mail address will be notified that the order was associated with their existing account, while other anonymous users will have an account created for them. This behavior is configurable in the checkout completion rules.

	Payment information checkout pane functions as an add / edit form for the billing customer profile to be associated with the order. By default, this pane will always result in the creation of a new billing customer profile, with addressbook functionality like reusing previous addresses being supplied by a contributed module.

Review:
	This checkout pane displays a full summary of the order details, including data from any other checkout pane on the form that exposes it to this pane. It will include by default the cart contents again, the user's account information, and the billing address. Other checkout panes may or may not expose data to this pane, and any that does may be directed to the relevant checkbox on the pane's configuration form.

Payment:
	This checkout pane presents all payment methods available to the customer in a radio select list.

Completion message:
	This checkout pane displays a simple checkout completion message that links to the order details page in the user's account. Even anonymous users will be able to view their completed orders for the duration of their current session. The checkout completion message is configurable via the pane's configuration form for single language sites, but multilingual sites will want to leave it set to the default message and translate the default string to the desired message through the translation interface.
