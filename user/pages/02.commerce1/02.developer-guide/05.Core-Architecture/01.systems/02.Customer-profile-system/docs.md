---
title: Customer profile system
taxonomy:
    category: docs
---

<strong>NOTE</strong>: This section is an outdated description of a system that was about to be written. The new home for this documentation is http://www.drupalcommerce.org/node/297

<hr>

Customer profiles contain collections of data required to process orders, whether it be billing information, shipping information, or other types of details.  These customer profiles are not unique to a user, meaning a single user may have multiple instances of each type of profile.  This allows us to use the data collected to provide address book functionality where a user has a default profile of each type but may create a unique profile for a given order or choose from other previously generated profiles.

Customer profiles come from three different locations:

<ol>
<li>Checkout - each profile type has an associated checkout pane that allows the customer to enter their details on the checkout form.  If a customer is not using a past profile or has modified a previously used profile in any way, a new profile is created using the values entered on the form.  This profile is then related to the customer's order via a customer profile reference field.</li>
<li>Order edit form - each profile type is also represented on orders via default customer profile reference fields. These reference fields are populated by the relevant checkout panes but may also be filled out by administrators on the order edit form.  Profile creation works the same here as in Checkout.</li>
<li>Customer profile administration - the main menu item that lists out all the customer profiles in a View has a local action link allowing administrators to create customer profiles.  These are not linked to orders but may be associated with users to pre-populate orders and address books.  Existing profiles can also be edited, but if a profile is currently referenced by any customer profile reference field, a new profile will be created for it upon save.
</ol>

As indicated above, it is important for customer profiles to be preserved in the state they are in on any given order that references them to prevent data loss.  The only exception is if a customer profile is being edited via a form that represents the only place a profile is being referenced.  This logic will allow us to prevent unnecessary duplication of profile data while ensuring data relevant to previous orders is never lost.

The only profile type the Customer module defines is a billing information profile.  This profile has the default address field and nothing more, but it may be extended to include other fields pertinent to payment (like VAT numbers for B2B sales) by modules or the manage fields UI for that type.

An example of a module that extending the billing information profile is commerce_firstdata.  The payment method required a phone number and the module added a field instance to the existing "Billing" profile type.  If extending a field consider using the payment method settings form to let the admin select the appropriate field to pull a phone number from in case they had already made one.