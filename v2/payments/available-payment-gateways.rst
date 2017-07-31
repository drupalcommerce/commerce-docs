Available payment gateways
==========================

Here is a running document of known and supported payment gateways.

+------------------------------------+----------------+-------------------------------------------------------------------+
| Name / Machine name                | Version        | Description                                                       |
+====================================+================+===================================================================+
| | `Braintree`_                     |                | This module integrates Braintree Payments with Drupal Commerce    |
| | commerce_braintree               | 8.x-1.0-beta15 | to accept credit card payments on-site and store card data in     |
| |                                  |                | the Braintree vault for later processing.                         |
+------------------------------------+----------------+-------------------------------------------------------------------+
| | `PayPal`_                        |                | This project integrates PayPal into the Drupal Commerce payment   |
| | commerce_paypal                  | 8.x-1.0-beta15 | and checkout systems. It currently supports off-site payment via  |
| |                                  |                | PayPal Payments Standard (WPS) and PayPal Express Checkout (EC),  |
| |                                  |                | off-site or on-site payment via PayPal Payments Advanced (PPA)    |
| |                                  |                | and Payflow Link (PFL), and on-site credit card payment via Link  |
| |                                  |                | (PFL), and on-site credit card payment via PayPal Payments Pro.   |
+------------------------------------+----------------+-------------------------------------------------------------------+
| | `Stripe`_                        |                | This module integrates Stripe with Drupal Commerce, providing a   |
| | commerce_stripe                  | 8.x-1.0-beta17 | tokenized payment gateway. Customers can make payments in your    |
| |                                  |                | Drupal Commerce shop in a secure way without leaving your site.   |
+------------------------------------+----------------+-------------------------------------------------------------------+
| | `Authorize.Net`_                 |                | Authorize.Net integration for the Drupal Commerce payment and     |
| | commerce_authnet                 | 8.x-1.0-beta29 | checkout system. Currently supports credit card payments on the   |
| |                                  |                | checkout form via the AIM API using the latest Commerce release.  |
+------------------------------------+----------------+-------------------------------------------------------------------+
| | `Vantiv`_                        |                | This project integrates Vantiv payment solution into the Drupal   |
| | commerce_vantiv                  | 8.x-1.1        | Commerce payment and checkout systems.                            |
+------------------------------------+----------------+-------------------------------------------------------------------+
| | `Square`_                        |                | Square is the payment / POS company making commerce easy and      |
| | commerce_square                  | 8.x-1.0-beta55 | accessible to everyone. This module integrates with their         |
| |                                  |                | eCommerce API for online payments into Drupal Commerce.           |
+------------------------------------+----------------+-------------------------------------------------------------------+
| | `Paymill`_                       |                | Commerce Paymill is Drupal Commerce module that integrates the    |
| | commerce_paymill                 | 8.x-1.x-dev/a  | Paymill payement gateway into your Drupal Commerce shop.          |
+------------------------------------+----------------+-------------------------------------------------------------------+
| | `Ingenico`_                      |                | This module integrates the Ingenico payment gateway with Drupal   |
| | commerce_ingenico                | 8.x-1.x-dev    | Commerce. Ingenico is the new name for Ogone one of the leading   |
| |                                  |                | European payment solutions.                                       |
+------------------------------------+----------------+-------------------------------------------------------------------+
| | `Paytrail`_                      |                | As Suomen Verkkomaksut became Paytrail, this module will replace  |
| | commerce_paytrail                | 8.x-1.0-beta4  | the `commerce_suomenverkkomaksut`_ module.                        |
+------------------------------------+----------------+-------------------------------------------------------------------+
| | `Payplug`_                       |                | This module integrates PayPlug payment as a gateway for your      |
| | commerce_payplug                 | 8.x-1.0        | Drupal Commerce 2.x website.                                      |
+------------------------------------+----------------+-------------------------------------------------------------------+
| | `PayU Money`_                    |                | Allows Drupal Commerce orders to be paid using PayUmoney payment  |
| | commerce_payumoney               | 8.x-1.22       | methods.                                                          |
+------------------------------------+----------------+-------------------------------------------------------------------+
| | `CC Avenue`_                     |                | The CCAvenue Payment Gateway module implements the CCAvenue       |
| | commerce_ccavenue                | 8.x-1.0-beta1  | payment processing service (www.ccavenue.com) in Drupal Commerce. |
+------------------------------------+----------------+-------------------------------------------------------------------+
| | `Alipay`_                        |                | Alipay integration for the Drupal Commerce payment and checkout   |
| | commerce_alipay                  | 8.x-1.0-alpha1 | system.                                                           |
+------------------------------------+----------------+-------------------------------------------------------------------+
| | `WeChat Pay`_                    |                | This module provides the WeChat Pay integration for Drupal        |
| | commerce_wechat_pay              | 8.x-1.0-alpha2 | Commerce 2 on Drupal 8.                                           |
+------------------------------------+----------------+-------------------------------------------------------------------+
| | `Worldline`_                     |                | This module provides an implementation for drupal commerce 8 of   |
| | commerce_worldline               | 8.x-1.0-alpha2 | the atos worldline payment provider.                              |
+------------------------------------+----------------+-------------------------------------------------------------------+
| | `Datatrans`_                     |                | This project provides a Datatrans integration for the Drupal      |
| | commerce_datatrans               | 8.x-1.x-dev    | Commerce payment and checkout system.                             |
+------------------------------------+----------------+-------------------------------------------------------------------+
| | `EasyPaybg`_                     |                | Module implements Bulgarian EasyPay as payment method for         |
| | commerce_easypaybg               | 8.x-1.x-dev    | commerce module.                                                  |
+------------------------------------+----------------+-------------------------------------------------------------------+
| | `Epaybg`_                        |                | Bulgarian payments gateway http://epay.bg for Commerce module.    |
| | commerce_epaybg                  | 8.x-1.x-dev    |                                                                   |
+------------------------------------+----------------+-------------------------------------------------------------------+
| | `Mollie`_                        |                | Drupal Commerce Payment module for Mollie Payment Services.       |
| | commerce_mollie                  | 8.x-1.x-dev    | Implements Mollie payment services for use with Drupal Commerce.  |
+------------------------------------+----------------+-------------------------------------------------------------------+
| | `Moneris`_                       |                | Moneris is a payment solution for Canada and US. It supports also |
| | commerce_moneris                 | 8.x-2.0-alpha1 | Moneris HPP payment system (included as a separate module in 2.x) |
+------------------------------------+----------------+-------------------------------------------------------------------+
| | `Open Payment Platform`_         |                | This module integrates PAY.ON Open Payment Platform with Drupal   |
| | commerce_opp                     | 8.x-1.0-alpha9 | Commerce, integrating their COPYandPAY widget in Drupal Commerce  |
| |                                  |                | checkout flow.                                                    |
+------------------------------------+----------------+-------------------------------------------------------------------+
| | `smartpay`_                      |                | Supports Barclaycard Hosted Payment Pages for Drupal Commerce.    |
| | commerce_smartpay                | 8.x-1.0        |                                                                   |
+------------------------------------+----------------+-------------------------------------------------------------------+
| | `payjp`_                         |                | Pay.JP integration for the Drupal Commerce payment system.        |
| | commerce_payjp                   | 8.x-1.x-dev/a  |                                                                   |
+------------------------------------+----------------+-------------------------------------------------------------------+
| | `banklink`_                      |                | This is a generic banklink payment gateway for drupal             |
| | commerce_banklink                | 8.x-1.0-beta3  | Commerce 2.x.                                                     |
| |                                  |                |                                                                   |
+------------------------------------+----------------+-------------------------------------------------------------------+
| | `Razorpay Payment Integration`_  |                | This module serve as Payment Gateway porvided by Razorpay.        |
| | commerce_razorpay                | 8.x-1.x-dev/a  |                                                                   |
+------------------------------------+----------------+-------------------------------------------------------------------+
| | `CommercePaytm`_                 |                | Integrate paytm payment gateway with drupal commerce.             |
| | commercepaytm                    | 8.x-1.x-dev    |                                                                   |
+------------------------------------+----------------+-------------------------------------------------------------------+
| | `Commerce sermepa`_              |                | Commerce support for Spanish banks that use Sermepa/Redsys        |
| | commerce_sermepa                 | 8.x-2.x-dev    | systems. Full list of banks managed by sermepa:                   |
| |                                  |                | www.redsys.es/wps/portal/redsys/publica/acercade/nuestrosSocios   |
+------------------------------------+----------------+-------------------------------------------------------------------+
| | `Bitpayir`_                      |                | Provides an integration between Drupal commerce version 2 and     |
| | commerce_bitpayir                | 8.x-1.0        | Iranian Bitpay gateway.                                           |
+------------------------------------+----------------+-------------------------------------------------------------------+
| | `PayONE (sandbox)`_              |                | This module integrates the German PAYONE Payment Provider         |
|                                    |                | with Drupal Commerce 2.x (D8) to accept credit card payments      |
|                                    |                | on-site and PayPal Express payments off-line.                     |
+------------------------------------+----------------+-------------------------------------------------------------------+
| | `Klarna Checkout`_               |                | This project integrates Klarna Checkout payment into the          |
| | commerce_klarna_checkout         | 8.x-1.x-dev    | Drupal Commerce payment and checkout systems.                     |
| |                                  |                |                                                                   |
+------------------------------------+----------------+-------------------------------------------------------------------+

.. _Braintree: https://www.drupal.org/project/commerce_braintree
.. _PayPal: https://www.drupal.org/project/commerce_paypal
.. _Stripe: https://www.drupal.org/project/commerce_Stripe
.. _Authorize.Net: https://www.drupal.org/project/commerce_Authnet
.. _Vantiv: https://www.drupal.org/project/commerce_Vantiv
.. _Square: https://www.drupal.org/project/commerce_Square
.. _Paymill: https://www.drupal.org/project/commerce_Paymill
.. _Ingenico: https://www.drupal.org/project/commerce_Ingenico
.. _Paytrail: https://www.drupal.org/project/commerce_Paytrail
.. _Payplug: https://www.drupal.org/project/commerce_Payplug
.. _PayU Money: https://www.drupal.org/project/commerce_payumoney
.. _CC Avenue: https://www.drupal.org/project/commerce_ccavenue
.. _Alipay: https://www.drupal.org/project/commerce_Alipay
.. _WeChat Pay: https://www.drupal.org/project/commerce_wechat_pay
.. _Worldline: https://www.drupal.org/project/commerce_Worldline
.. _Datatrans: https://www.drupal.org/project/commerce_Datatrans
.. _EasyPaybg: https://www.drupal.org/project/commerce_EasyPaybg
.. _Epaybg: https://www.drupal.org/project/commerce_Epaybg
.. _Mollie: https://www.drupal.org/project/commerce_Mollie
.. _Moneris: https://www.drupal.org/project/commerce_Moneris
.. _Open Payment Platform: https://www.drupal.org/project/commerce_opp
.. _smartpay: https://www.drupal.org/project/commerce_smartpay
.. _payjp: https://www.drupal.org/project/commerce_payjp
.. _banklink: https://www.drupal.org/project/commerce_banklink
.. _Razorpay Payment Integration: https://www.drupal.org/project/commerce_razorpay
.. _CommercePaytm: https://www.drupal.org/project/commercepaytm
.. _Commerce sermepa: https://www.drupal.org/project/commerce_sermepa
.. _Bitpayir: https://www.drupal.org/project/commerce_bitpayir
.. _PayONE (sandbox): https://www.drupal.org/sandbox/mitrpaka/2849906
.. _Klarna Checkout: https://github.com/mitrpaka/commerce_klarna_checkout
.. _commerce_suomenverkkomaksut: https://drupal.org/project/commerce_suomenverkkomaksut
