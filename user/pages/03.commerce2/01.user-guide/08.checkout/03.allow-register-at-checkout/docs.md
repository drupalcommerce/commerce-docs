---
title: Allow registration at checkout
taxonomy:
    category: docs
---

## Overview
To ensure all users have accounts you can restrict checkout and force users without accounts to make one before they can checkout. You can change this setting on a per Checkout Flow basis, so you can deny guest checkouts for some flows and not others as you need.

You can also allow registration at the end of Guest checkouts, see the [Contol Guest Checkout](../02.control-guest-checkout/docs.md) section for details.

## Enable / Disable Account Registration at Checkout

Visit the Commerce configuration page and go to the **Checkout Flows** section.

![Select Checkout Flows](commerce2-order-configuration.png)


Click **Edit** on the Checkout Flow you want to configure.

![Select Checkout Flow](commerce2-checkout-flows.png)


To **Allow Registration at Checkout**
 - Click the cog icon in the **Login or continue as guest**
 - Uncheck the **Allow guest checkout** box
 - Check the **Allow registration** box
 - click **update** and then **Save** at the bottom of the page.
 
![Check the Allow box](commerce2-checkout-allow-registration-admin.png)

With a Boostrap theme you page will look something like the below.

![Allow box checked user view](commerce2-checkout-allow-registration-bootstrap.png)

To **Deny Registraion at Checkout**
 - Click the cog icon in the **Login or continue as guest**
 - Uncheck the **Allow guest checkout** box
 - Uncheck the **Allow registration** box
 - click **update** and then **Save** at the bottom of the page.

![Uncheck the Allow box](commerce2-checkout-no-guest-no-registration-admin.png)

With a Boostrap theme you page will look something like the below.

![Allow box unchecked user view](commerce2-checkout-no-guest-no-registration-bootstrap.png)
