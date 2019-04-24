---
title: On-site payment gateways
taxonomy:
    category: docs
---

On-site payment gateways allow the customer to enter credit card details directly on the site. The details might be safely tokenized before they reach the server (Braintree, Stripe, etc) or they might be transmitted directly to the server (PayPal Payments Pro).

#### On-site payment gateway flow:
 1. The customer enters checkout.
 2. The *PaymentInformation* checkout pane shows the *add-payment-method* plugin form, allowing the customer to enter their payment details.
 3. On submit, a payment method is created via `createPaymentMethod()` and attached to the customer and the order.
 4. The customer continues checkout, hits the *payment* checkout step.
 5. The PaymentProcess checkout pane calls `createPayment()`, which charges the provided payment method and creates a payment.

- If the payment method could not be charged (for example, because the credit card's daily limit was breached), the customer is redirected back to the checkout step that contains the *PaymentInformation* checkout pane, to provide a different payment method.

#### Creating On-site payment gateways
To create an On-site payment gateway, you'll want to start by creating a custom module, configuration schema, payment plugin, and configuration form methods, as described in the [Getting started documentation](../01.getting-started) for creating payment gateways.

Next, implement your gateway's `createPayment()` method, as described in the [Creating payments](01.creating-payments) documentation.

Then continue with the [Stored payment methods](02.stored-payment-methods) documentation to implement the required `createPaymentMethod` and `deletePaymentMethod` methods. If your payment gateway supports updating payment methods, you will also want to implement the `SupportsUpdatingStoredPaymentMethodsInterface` interface and its `updatePaymentMethod`.

If your payment gateway supports authorizations, voids, or refunds, read the [Authorizations, voids, and refunds](03.authorizations-voids-refunds) documentation for an overview and example code.

Finally, if your payment gateway supports IPNs, read the [Handling an IPN](04.handling-ipn) documentation for an overview and examples of IPN handling by existing payment gateways.
