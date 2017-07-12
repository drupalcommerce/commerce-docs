Overriding Payment Gateway Configuration
========================================

There are cases where a developer or site admin would want to define certain configuration related to a payment gateway in the site's settings.php file, instead of storing them in the database or define them in the code as exported configuration. Not exposing API credentials for security reasons would be such a case. In such cases, we would want to define the payment gateway using test credentials, and then override them in our settings.php file.

This tutorial will guide you through overriding a payment gateway's configuration using the Commerce PayPal module as an example. It is assumed that this or another payment gateway provider module is installed and a payment gateway has been created in the store - see `Installing and Configuring a Payment Gateway <installing-payment-gateway.html>`_. Building on that example, we will override the API credentials configuration for the PayPal Express Checkout payment gateway. In a production site, the payment gateway may have been exported in the code as configuration - see `Managing your site's configuration <https://www.drupal.org/docs/8/configuration-management/managing-your-sites-configuration>`_.

Finding the Configuration Settings Names
----------------------------------------

In order to override the configuration settings in our settings.php file we need to know their machine names. An easy way to find them is by visiting the Configuration Export page at ``/admin/config/development/configuration/single/export``. At the "Configuration type" dropdown choose "Payment gateway", and then at the "Configuration name" dropdown choose the name of the payment gateway, in this case "PayPal Express Checkout". You will then be displayed all available configuration for it.

.. figure:: images/payment_gateway_export.jpg
   :alt: Locating a Payment Gateway's Configuration

   Locating a Payment Gateway's Configuration

We will first need the ID assigned to the payment gateway. This is the value of the ``id`` key, in this case "paypal_express_checkout". Make a note of this value.

The ``configuration`` key includes a list of all configuration settings for the chosen payment gateway. In this case, we are interested in the ``api_username``, ``api_password`` and ``signature`` settings. Make a note of the keys for the settings that you want to override.

Adding the Overrides
--------------------

With the information that we have obtained, it is straightforward to override these settings in the site's settings.php file. Add to the file the following code, making sure that you use the real values for the settings. Also, in the array's key ``$config['commerce_payment.commerce_payment_gateway.paypal_express_checkout']`` replace "paypal_express_checkout" with the ID of your payment gateway that you obtained above e.g. ``$config['commerce_payment.commerce_payment_gateway.MY_PAYMENT_GATEWAY_ID']``.

.. code-block:: php

    // settings.php

    $config['commerce_payment.commerce_payment_gateway.paypal_express_checkout']['configuration'] = [
      'api_username' => 'MY_API_USERNAME',
      'api_password' => 'MY_API_PASSWORD',
      'signature' => 'MY_SIGNATURE',
    ];

Once you've set them, these will be the settings that will be used when a customer chooses to pay using this payment gateway. Note that due to how configuration management works in Drupal 8, the admin pages such as the payment gateway's Edit page or the configuration export page used above will still display the values of the settings defined in the code as exported configuration or in the database.

How to Test if It Works
-----------------------

To ensure that the correct settings are being used, we can make a test by checking out a test order. In the PayPal example above, the test credentials can be linked to an account that has a different name than the production account. PayPal will be also indicating that an account is a sandbox account by appending the word Test after its name. When the user is redirected to PayPal, the page's title should read "Test Store".
