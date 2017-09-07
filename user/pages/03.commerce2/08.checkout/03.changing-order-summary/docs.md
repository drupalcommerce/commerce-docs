---
title: Changing the order summary
taxonomy:
    category: docs
---

Changing the order summary
==========================

Checkouts, by default, display an order summary on specific steps. This summary is powered by a view which can be modified. This is the *Checkout Order Summary* (`commerce_checkout_order_summary`) view. Changing this view will change how the order is displayed in summary during checkout.

.. figure:: images/order-checkout-summary.png
   :alt: Checkout Order Summary view

Changing the view
-----------------

There is no user interface for changing the view provided. The view is added by the `CheckoutFlowBase` class when building the checkout flow form:

.. code-block:: php

    if ($this->hasSidebar($step_id)) {
      $form['sidebar']['order_summary'] = [
        '#type' => 'view',
        '#name' => 'commerce_checkout_order_summary',
        '#display_id' => 'default',
        '#arguments' => [$this->order->id()],
        '#embed' => TRUE,
      ];
    }

To use a completely different view, you will need to use `hook_form_alter` to change the view name, or a provide a custom checkout flow plugin. 
