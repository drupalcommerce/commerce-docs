---
title: Customize order receipt emails
taxonomy:
    category: docs
---

Order receipt emails are powered through Twig templates. There is no user interface for customizing the email content. In most cases email require inline styling and full HTML. This is where Twig excels. 

The order receipt email, which customers receive, is controlled through the `commerce_order_receipt` theme hook. The following information is available to the theme hook

* The order, as `order_entity`
* Billing information, as `billing_information`
* Shipping information, as `shipping_information`
* Payment method information as `payment_method`
* Order total sumary as `totals`

The default `commerce-order-receipt.html.twig` can be found in the `commerce_order` module. 

The email can be customized by overriding the Twig template into your theme.

You must also make sure your Drupal site is sending emails in HTML properly. Out of the box, Drupal does not do this. See [Sending HTML emails](../../03.core/02.html-emails) on how to ensure emails are being formatted properly, and that your theme's template is being used t render the emails.

! If your Drupal site is not using your theme to render emails, it may not pick up your overridden template.
