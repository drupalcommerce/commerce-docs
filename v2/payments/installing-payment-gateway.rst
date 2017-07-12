Installing and configuring a payment gateway
=======================================

While configuring your store you would probably want to install and configure a payment gateway provider module so that you can accept online payments. Currently available payment gateways for Commerce 2 are listed here :ref:`available-payment-gateways`.

This tutorial will guide you through configuring a payment gateway provider using the Commerce PayPal module as an example.

Install the Module
------------------

The first step is to install the module that provides integration with the desired payment gateway. In this case, Commerce PayPal. For information on how to install a module in Drupal 8 see `Installing Drupal 8 Modules <https://www.drupal.org/docs/8/extending-drupal-8/installing-drupal-8-modules>`_ and `Installing Modules from the Command Line <https://www.drupal.org/docs/8/extending-drupal-8/installing-modules-from-the-command-line>`_.

Add a Payment Gateway
---------------------

Once you have installed the Commerce PayPal module, visit ``/admin/commerce/config/payment-gateways`` and click the ``Add payment gateway`` button. Fill in the details in the form. The Plugin option that you choose will define which payment gateway provider and integration type will be associated with our store's payment gateway that we're creating. There may be multiple modules installed each providing a number of options, as seen in the example below. For the purposes of this example, we'll be using the PayPal Express Checkout option. Once you select the desired option, the form will update allowing you to enter the configuration that is specific to it, such as API credentials - have a look at all settings provided.

For the Mode setting, it is recommended that you choose the Test option while developing. You will be able to set the Mode to Live once you have tested the integration and deployed your site to the production environment.

.. figure:: images/adding_payment_gateway.jpg
   :alt: Adding a Payment Gateway

   Adding a Payment Gateway

Once the form is saved, you should be able to see the new payment gateway in the list.

.. figure:: images/added_payment_gateway.jpg
   :alt: After Adding a Payment Gateway

   After Adding a Payment Gateway

Paying at Checkout
------------------

Once a payment gateway is added it will be made available as a payment method to customers of the store during the checkout process (unless it has been disabled). If there is only one payment gateway defined, it will be used by default. If there are more than one, the customer will be given the choice to choose a payment method as in the example below.

.. figure:: images/payment_method_choices.jpg
   :alt: Choosing a Payment Method at Checkout

   After Choosing a Payment Method at Checkout
