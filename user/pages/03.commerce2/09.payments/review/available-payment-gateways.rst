Available payment gateways
==========================

Here is a running document of known and supported payment gateways.

+---------------------------------+---------------------------------------------------------+
| Name                            | Description                                             |
+=================================+=========================================================+
| `Braintree`_                    | | This module integrates Braintree Payments with        |
|                                 | | Drupal Commerce to accept credit card payments        |
|                                 | | on-site and store card data inthe Braintree vault     |
|                                 | | for later processing.                                 |
+---------------------------------+---------------------------------------------------------+
| `PayPal`_                       | | This project integrates PayPal into the Drupal        |
|                                 | | Commerce payment and checkout systems. It currently   |
|                                 | | supports off-site payment via  PayPal Payments        |
|                                 | | Standard (WPS) and PayPal Express Checkout (EC),      |
|                                 | | off-site or on-site payment via PayPal Payments       |
|                                 | | Advanced (PPA)and Payflow Link (PFL), and on-site     |
|                                 | | credit card payment via Link(PFL), and on-site credit |
|                                 | | card payment via PayPal Payments Pro.                 |
+---------------------------------+---------------------------------------------------------+
| `Stripe`_                       | | This module integrates Stripe with Drupal Commerce,   |
|                                 | | providing a tokenized payment gateway. Customers can  |
|                                 | | make payments in yourDrupal Commerce shop in a secure |
|                                 | | way without leaving your site.                        |
+---------------------------------+---------------------------------------------------------+
| `Authorize.Net`_                | | Authorize.Net integration for Drupal Commerce payment |
|                                 | | and checkout system. Currently supports credit card   |
|                                 | | payments on thecheckout form via the AIM API using    |
|                                 | | the latest Commerce release.                          |
+---------------------------------+---------------------------------------------------------+
| `Vantiv`_                       | | This project integrates Vantiv payment solution into  |
|                                 | | the Drupal Commerce payment and checkout systems.     |
+---------------------------------+---------------------------------------------------------+
| `Square`_                       | | Square is the payment / POS company making commerce   |
|                                 | | easy and accessible to everyone. This module          |
|                                 | | integrates with their eCommerce API for online        |
|                                 | | payments into Drupal Commerce.                        |
+---------------------------------+---------------------------------------------------------+
| `Paymill`_                      | | Commerce Paymill is Drupal Commerce module that       |
|                                 | | integrates the Paymill payement gateway into your     |
|                                 | | Drupal Commerce shop.                                 |
+---------------------------------+---------------------------------------------------------+
| `Ingenico`_                     | | This module integrates the Ingenico payment gateway   |
|                                 | | with Drupal Commerce. Ingenico is the new name for    |
|                                 | | Ogone one of the leading European payment solutions.  |
+---------------------------------+---------------------------------------------------------+
| `Paytrail`_                     | | As Suomen Verkkomaksut became Paytrail, this module   |
|                                 | | will replace `commerce_suomenverkkomaksut`_ module.   |
+---------------------------------+---------------------------------------------------------+
| `Payplug`_                      | | This module integrates PayPlug payment as a gateway   |
|                                 | | for your Drupal Commerce 2.x website.                 |
+---------------------------------+---------------------------------------------------------+
| `PayU Money`_                   | | Allows Drupal Commerce orders to be paid using        |
|                                 | | PayUmoney payment methods.                            |
+---------------------------------+---------------------------------------------------------+
| `CC Avenue`_                    | | The CCAvenue Payment Gateway module implements the    |
|                                 | | CCAvenue payment processing service                   |
|                                 | | (www.ccavenue.com) in Drupal Commerce.                |
+---------------------------------+---------------------------------------------------------+
| `Alipay`_                       | | Alipay integration for the Drupal Commerce payment    |
|                                 | | and checkout system.                                  |
+---------------------------------+---------------------------------------------------------+
| `WeChat Pay`_                   | | This module provides the WeChat Pay integration       |
|                                 | | for Drupal Commerce 2 on Drupal 8.                    |
+---------------------------------+---------------------------------------------------------+
| `Worldline`_                    | | This module provides an implementation for drupal     |
|                                 | | commerce 8 of the atos worldline payment provider.    |
+---------------------------------+---------------------------------------------------------+
| `Datatrans`_                    | | This project provides a Datatrans integration for the |
|                                 | | Drupal Commerce payment and checkout system.          |
+---------------------------------+---------------------------------------------------------+
| `EasyPaybg`_                    | | Module implements Bulgarian EasyPay as payment method |
|                                 | | for commerce module.                                  |
+---------------------------------+---------------------------------------------------------+
| `Epaybg`_                       | | Bulgarian payments gateway http://epay.bg for         |
|                                 | | Commerce module.                                      |
+---------------------------------+---------------------------------------------------------+
| `Mollie`_                       | | Drupal Commerce Payment module for Mollie Payment     |
|                                 | | Services. Implements Mollie payment services for use  |
|                                 | | with Drupal Commerce.                                 |
+---------------------------------+---------------------------------------------------------+
| `Moneris`_                      | | Moneris is a payment solution for Canada and US. It   |
|                                 | | supports also Moneris HPP payment system              |
|                                 | | (included as a separate module in 2.x)                |
+---------------------------------+---------------------------------------------------------+
| `Open Payment Platform`_        | | This module integrates PAY.ON Open Payment Platform   |
|                                 | | with Drupal Commerce, integrating their COPYandPAY    |
|                                 | | widget in Drupal Commerce checkout flow.              |
+---------------------------------+---------------------------------------------------------+
| `smartpay`_                     | | Supports Barclaycard Hosted Payment Pages for Drupal  |
|                                 | | Commerce.                                             |
+---------------------------------+---------------------------------------------------------+
| `payjp`_                        | | Pay.JP integration for the Drupal Commerce payment    |
|                                 | | system.                                               |
+---------------------------------+---------------------------------------------------------+
| `banklink`_                     | | This is a generic banklink payment gateway for drupal |
|                                 | | Commerce 2.x.                                         |
+---------------------------------+---------------------------------------------------------+
| `Razorpay Payment Integration`_ | | This module serve as Payment Gateway porvided by      |
|                                 | | Razorpay.                                             |
+---------------------------------+---------------------------------------------------------+
| `CommercePaytm`_                | | Integrate paytm payment gateway with drupal commerce. |
+---------------------------------+---------------------------------------------------------+
| `Commerce sermepa`_             | | Commerce support for Spanish banks that use           |
|                                 | | Sermepa/Redsys systems. Full list of banks managed by |
|                                 | | `sermepa`_                                            |
+---------------------------------+---------------------------------------------------------+
| `Bitpayir`_                     | | Provides an integration between Drupal commerce       |
|                                 | | version 2 and Iranian Bitpay gateway.                 |
+---------------------------------+---------------------------------------------------------+
| `PayONE (sandbox)`_             | | This module integrates the German PAYONE Payment      |
|                                 | | Provider with Drupal Commerce 2.x (D8) to accept      |
|                                 | | credit card payments on-site and PayPal Express       |
|                                 | | payments off-line.                                    |
+---------------------------------+---------------------------------------------------------+
| `Klarna Checkout`_              | | This project integrates Klarna Checkout payment into  |
|                                 | | the Drupal Commerce payment and checkout systems.     |
+---------------------------------+---------------------------------------------------------+

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
.. _sermepa: www.redsys.es/wps/portal/redsys/publica/acercade/nuestrosSocios
