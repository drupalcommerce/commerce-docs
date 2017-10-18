---
title: Allow registration at checkout
taxonomy:
    category: docs
---

## Overview
To give your customers the ease of creating an account at the end of their checkout you need to enable the "Guest Registration after checkout" pane in your checkout flow.

At the time of writing you site will not have this feature by default. You need to apply a [patch]. The below instructions then apply to your site.

## Enable / Disable Account Registration at Checkout
You need to enable / disable registration for each Checkout Flow you are using.
Visit the Commerce configuration page and go to the **Checkout Flows** section.

Click **Edit** on the Checkout Flow you want to configure.

To **Enable** Locate the "Disabled" section and drag the **Guest registration after checkout** into the "Complete" section and click **Save**.

To **Disable** Locate the "Complete" section and drag the **Guest registration after checkout** into the "Disabled" section and click **Save**.

[patch] https://www.drupal.org/node/2857157
