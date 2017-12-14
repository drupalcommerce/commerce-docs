---
title: Payment transaction entity
taxonomy:
    category: docs
---

More information on the Payment transaction entity forthcoming.

See commerce_payment.module for now.

<b>From commerce_payment.module 7.x-1.2:</b>

<code>
// Local payment transaction status definitions:

// Pending is used when a transaction has been initialized but is still awaiting
// resolution; e.g. a CC authorization awaiting capture or an e-check payment
// pending at the payment provider.
define('COMMERCE_PAYMENT_STATUS_PENDING', 'pending');

// Success is used when a transaction has completed resulting in money being
