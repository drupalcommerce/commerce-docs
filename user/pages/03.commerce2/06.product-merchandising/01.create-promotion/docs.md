---
title: Create a promotion
taxonomy:
    category: docs
---

Creating a Promotion
==================

Imagine that your store is currently running a special New Year campaign where you'd like to give customers a 10% discount on orders worth $50 or more. With the default offers and conditions provided by the promotion system, it is quite simple.

Adding a New Promotion
----------------------

- You can create a new promotion by going to ``/admin/commerce/promotions`` and clicking the "Add a new promotion" button.

.. image:: images/creating_a_promotion.png

- Give your promotion a descriptive name, for example, "10% off on $50 or more orders"
  
Setting the Offer
-----------------

- Let's now decide on the type of offer you'd like to give users. As our goal is to give customers a 10% discount on orders worth $50 or more, let's select the "Percentage off the order total" radio button under ``Offer``.
- Now enter the percentage you'd like to give the user, for example, "10%".

.. image:: images/promotion_offer.png

  
Adding Conditions
-----------------

The conditions section allows you to further manage the promotions so that you can tell the system to apply the promotion only if the order meets certain criteria. Currently, by default, Commerce gives us the ability to limit applying a promotion based on the following parameters:

- Customer - Limit by the customer's billing address or limit by the customer's role
- Order - Limit by total price
- Product - Limit by the quantity of products the customer purchases, or limit by the products that are in the cart
Note: You can use the autocomplete to enter a comma separated list of products to apply the promotion to.

Going back to the campaign for your store, let's go ahead and add an "Order" condition by checking the ``Limit by total price`` checkbox and selecting the ``Greater than`` operator and set the "Amount" to ``50.00``.

.. image:: images/promotion_conditions.png


More Configuration
------------------

You can set further limitations on the promotion, including:

- Dates
  - Set a start and end date for the promotion
- Usage Limits
  - Limit the number of times the promotion can be used
- Compatibility
  - Denote if the promotion can be combined with other promotions

.. image:: images/promotion_more_configuration.png


Now, that you've entered the necessary conditions let's "Save" the promotion. You can test this out by adding a product or a number of products to the cart. Once the order total reaches $50 or more, note, a discount is automatically applied to the order total.

.. image:: images/promotion_discount_applied.png

