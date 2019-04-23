---
title: Off-site payment gateways
taxonomy:
    category: docs
---

This documentation page will explain how to set up an off-site payment gateway. Off-site payment is enabled through a redirect from the Payment checkout page to the payment service, with customers ideally being returned back to the Payment page upon success or failure so they can be moved forward or backward in the checkout process as the case may require.

Drupal Commerce supports two types of *Off-site* payment gateways: *redirect* and *iframe*. The difference between the two types is how the **Checkout** process is handled. In the *redirect* approach, the customer is taken to the third party payment gateway website. In the *iframe* approach, the "off-site" portion is handled within an embedded iFrame.

#### Off-site payment gateway flow:

In both types of off-site payment gateways, the overall payment flow is the same:
 1. Customer hits the *payment* checkout step.
 2. The *PaymentProcess* checkout pane shows the *offsite-payment* plugin form.
 3. The plugin form performs a redirect or shows an iFrame.
 4. The customer provides his payment details to the payment provider.
 5. The payment provider redirects the customer back to the return url.
 6. A payment is created in either the `onReturn()` or `onNotify()` payment gateway method.

- If the customer declines to provide their payment details, and cancels the payment at the payment provider, he will be redirected back to the cancel url.

#### Creating Off-site payment gateways
To create an Off-site payment gateway, you'll want to start by creating a custom module, configuration schema, payment plugin, and configuration form methods, as described in the [Getting started documentation](../01.getting-started) for creating payment gateways. 

Then continue with either the Off-site [Redirect](01.off-site-redirect) or [iFrame](02.off-site-iframe) payment gateway documentation for creating the payment off-site form. 

Next, implement your gateway's `onReturn()` method, as described in the [Return from payment provider](03.return-from-payment-provider) documentation.

If your payment gateway supports IPNs, read the [Handling an IPN](04.handling-ipn) documentation for an overview and examples of IPN handling by existing payment gateways.

Finally, Off-site gateways *must* implement their gateway's documented CSRF protections. Read the [Security considerations](05.security-considerations) documentation to learn about the approaches used by several off-site payment gateways.
