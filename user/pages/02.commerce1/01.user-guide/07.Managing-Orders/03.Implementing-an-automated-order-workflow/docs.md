---
title: Implementing an automated order workflow
taxonomy:
    category: docs
---

The Drupal Commerce shopping cart and checkout systems handle advancing an order from the <em>Shopping cart</em> status through the various <em>Checkout: ####</em> statuses and finally to the <em>Pending</em> order status. While the Order module defines additional order statuses for <em>Canceled</em>, <em>Processing</em>, and <em>Completed</em> orders, it does not implement any rules specifically to place orders into these statuses. The only way orders will get to these statuses out of the box is if an administrator were to move the order to that status from its edit form.

When you build your store, it is up to you to implement your automated order workflow beyond what the shopping cart and checkout systems provide. You can do this via direct module integration or Rules configurations that interact with various events, such as moving an order that has been paid in full to the <em>Processing</em> status for fulfillment or directly to <em>Completed</em> if fulfillment is automated (e.g. in the case of a digital commerce site).

The primary thing to keep in mind is that an order may complete the checkout process without having been paid in full. This means any automated workflow steps that result in the fulfillment of the order should use the <em>When an order is first paid in full</em> event or <code>hook_commerce_payment_order_paid_in_full()</code> instead of the checkout completion event / hook. This is primarily the case when a site integrates a payment gateway that supports delayed payment (e.g. PayPal eCheck payments) or performs authorization only transactions during checkout that are meant to be captured later.

You do not have to use all the order statuses provided by default, and you can create your own either through code or a contributed module like <a href="http://www.drupalcommerce.org/extensions/module/project/commerce-custom-order-status">Commerce Customer Order Statues</a>.

For more information, refer to the <a href="http://www.drupalcommerce.org/user-guide/checkout-order-status-updates">related checkout documentation</a>.