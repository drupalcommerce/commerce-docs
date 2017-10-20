---
title: Controlling guest checkout
taxonomy:
    category: docs
---

## Overview

By default your site will allow guest checkouts.
You can change this and only allow registered users to checkout and/or allow users to register before they checkout.
You can change this setting on a per Checkout Flow basis, so you can allow guest checkouts for some flows and not others as you need.

### How to enable / disable Guest Checkout

Visit the Commerce configuration page and go to the **Checkout Flows** section.

![Select Checkout Flows](commerce2-order-configuration.png)

Click **Edit** on the Checkout Flow you want to configure.

![Select Checkout Flow](commerce2-checkout-flows.png)


To **Enable** Guest Registration
 - Click the cog icon in the **Login or continue as guest**
 - Check the **Allow guest checkout** box, click **update** and then **Save** at the bottom of the page.

To **Disable** Guest Registration
- Click the cog icon in the **Login or continue as guest**
- Uncheck the **Allow guest checkout** box, click **update** and then **Save** at the bottom of the page.

![Select Checkout Flow](commerce2-guest-checkout-allowed-admin.png)

Your first checkout page will then have the below sections, its exact appearance will vary as the below image uses the Bootstrap theme.

![Select Checkout Flow](commerce2-guest-checkout-allowed-bootstrap.png)

## Allow guests to create an account at the end of the checkout process

To give your customers the ease of creating an account at the end of their checkout you need to enable the "Guest Registration after checkout" pane in your checkout flow.

!At the time of writing your site will not have this feature by default. You need to apply the latest good [patch from this issue]. The below instructions will then apply to your site.

### Enable / Disable Account Registration at Checkout
You need to enable / disable registration for each Checkout Flow you are using.

Visit the Commerce configuration page and go to the **Checkout Flows** section.

![Select Checkout Flows](commerce2-order-configuration.png)


Click **Edit** on the Checkout Flow you want to configure.

![Select Checkout Flow](commerce2-checkout-flows.png)


To **Enable** Guest Registration
 - Locate the "Disabled" section and drag the **Guest registration after checkout** into the "Complete" section and click **Save**.

To **Disable** Guest Registration
 - Locate the "Complete" section and drag the **Guest registration after checkout** into the "Disabled" section and click **Save**.

![Drag and Drop Guest Registration]( 	commerce2-checkout-flow-complete.png)

[patch from this issue]: https://www.drupal.org/node/2857157

