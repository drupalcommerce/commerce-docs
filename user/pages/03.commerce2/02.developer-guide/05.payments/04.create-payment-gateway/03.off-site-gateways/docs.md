---
title: Off-site payment gateways
taxonomy:
    category: docs
---

Drupal Commerce supports two types of *Off site* payment gateways: *redirect* and *iframe*. The difference between the two types is how the **Checkout** process is handled. In the *redirect* approach, the customer is taken to the third party payment gateway website. In the *iframe* approach, the "off-site" portion is handled within an embedded iFrame. For either approach, you'll want to start by creating a custom module, configuration schema, payment plugin, and configuration form methods, as described in the [Getting started documentation](../01.getting-started) for creating payment gateways.

In both types of off-site payment gateways, the overall payment flow is the same:
 1. Customer hits the *payment* checkout step.
 2. The *PaymentProcess* checkout pane shows the *offsite-payment* plugin form.
 3. The plugin form performs a redirect or shows an iFrame.
 4. The customer provides their payment details to the payment provider.
 5. The payment provider redirects the customer back to the return url.
 6. A payment is created in either *onReturn()* or *onNotify()*.

- If the customer declines to provide their payment details, and cancels the payment at the payment provider, they will be redirected back to the cancel url.

#### [Off site (redirect) payment gateways](01.off-site-redirect)
- TBD

#### [Off site (iframe) payment gateways](02.off-site-iframe)
- TBD

#### [Handling an IPN](03.handling-ipn)
- Learn how to handle IPNs in your custom payment gateway module.
- See examples of IPN handling by existing payment gateways.

#### [Security considerations](04.security-considerations)
- Off-site gateways *must* implement their gateway's documented CSRF protections.
- Learn about the approaches used by several off-site payment gateways.
