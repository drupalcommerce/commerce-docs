---
title: Allowing guest checkout, or account login
taxonomy:
    category: docs
---

Allowing guest checkout, or account login
=========================================

By default guest checkout is enabled in Drupal Commerce. You can find the
existing checkout flows here ``admin/commerce/config/checkout-flows``.

There is a default checkout flow available. Go to ``admin/commerce/config/checkout-flows/manage/default``
and find this section:

.. figure:: images/checkout_guest_login_1.png
   :alt: Guest login default settings

.. figure:: images/checkout_guest_login_2.png
   :alt: Guest login default settings

After making changes click **Update** and **Save** the form.

If you *disable* the **Allow guest checkout**, anonymous users will be asked to
login when they are going to checkout.

If you *enable* the **Allow registration**, a registration form will be
presented during the checkout process like this:

.. figure:: images/checkout_guest_login_3.png
   :alt: Guest login with registration enabled
