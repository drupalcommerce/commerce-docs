---
title: Payment info hooks
taxonomy:
    category: docs
---

<ol>
<li><a href="#payment-method">hook_commerce_payment_method_info()</a></li>
<li><a href="#payment-transaction-status">hook_commerce_payment_transaction_status_info()</a></li>
</ol>

<a name="payment-method"> </a>
<h3>hook_commerce_payment_method_info()</h3>

The Payment module uses this hook to gather information on payment methods defined by enabled modules.  Drupal Commerce doesn’t maintain Ubercart’s separation of payment methods from payment gateways but rather defines payment methods as any single way of collecting payment from a customer per payment provider.  This means there will not be a single Credit Card payment method with plugin modules for CyberSource, Authorize.Net, etc. but a separate CC payment method for each payment provider with a common base set of code for building credit card forms and handling the data securely.

Payment methods depend on a variety of callbacks that are used to configure the payment methods via Rules actions, integrate the payment method with the checkout form, handle display and manipulation of transactions after the fact, and allow for administrative payment entering after checkout.  The Payment module ships with payment method modules useful for testing and learning, but all integrations with real payment providers will be provided as contributed modules.  The Payment module will include helper code designed to make different types of payment services easier to integrate as mentioned above.

The payment method data structure is as follows:
<ul>
<li><em>method_id</em> - string identifying the payment method, lowercase using alphanumerics, -, and _</li>
<li>base - string used as the base for the magically constructed callback names, each of which will be defaulted to [base]_[callback] unless explicitly set; defaults to the method_id</li>
<li>title - the translatable full title of the payment method, used in administrative interfaces</li>
<li>display_title - the title to display on forms where the payment method is selected and may include HTML for methods that require images and special descriptions; defaults to the title</li>
<li>short_title - an abbreviated title that may simply include the payment provider’s name as it makes sense to the customer (i.e. you would display PayPal, not PayPal WPS to a customer); also defaults to the title</li>
<li>description - a translatable description of the payment method, including the nature of the payment and the payment gateway that actually captures the payment</li>
<li>active - TRUE of FALSE indicating whether or not the default payment method rule configuration for this payment method should be enabled by default</li>
<li>terminal - TRUE or FALSE indicating whether or not payments can be processed via this payment method through the administrative payment terminal on an order’s Payment tab</li>
<li>offsite - TRUE or FALSE indicating whether or not the customer must be redirected offsite to put in their payment information; used specifically by the Off-site payment redirect checkout pane</li>
<li>offsite_autoredirect - TRUE or FALSE indicating whether or not the customer should be automatically redirected to an offsite payment site on the payment step of checkout</li>
<li>callbacks - an array of callback function names for the various types of callback required for all the payment method operations, arguments per callback in parentheses:
<ul>
<li>settings_form - ($settings = NULL) - returns form elements for the payment method’s settings form included as part of the payment method’s enabling action in Rules</li>
<li>submit_form - ($payment_method, $pane_values, $checkout_pane, $order) - returns form elements to collect details from the customer required to process the payment</li>
<li>submit_form_validate - ($payment_method, $pane_form, $pane_values, $order, $form_parents = array()) - validates data inputted via the payment details form elements and returns TRUE or FALSE indicating whether or not all the data passed validation</li>
<li>submit_form_submit - ($payment_method, $pane_form, $pane_values, $order, $charge) - processes payment as necessary using data inputted via the payment details form elements on the form, resulting in the creation of a payment transaction</li>
<li>redirect_form - ($form, &$form_state, $order, $payment_method) - returns form elements that should be submitted to the redirected payment service; because of the array merge that happens upon return, the service’s URL that should receive the POST variables should be set in the #action property of the returned form array</li>
<li>redirect_form_validate - ($order, $payment_method) - upon return from a redirected payment service, this callback provides the payment method an opportunity to validate any returned data before proceeding to checkout completion; should return TRUE or FALSE indicating whether or not the customer should proceed to checkout completion or go back a step in the checkout process from the payment page</li>
<li>redirect_form_submit - ($order, $payment_method) - upon return from a redirected payment service, this callback provides the payment method an opportunity to perform any submission functions necessary before the customer is redirected to checkout completion</li>
</ul></li>
<li>file - the filepath of an include file relative to the method's module containing the callback functions for this method, allowing modules to store payment method code in include files that only get loaded when necessary (like the menu item file property)</li>
</ul>

Example payment method definition:

<?php
$payment_methods['paypal_wps'] = array(
  'base' => 'commerce_paypal_wps',
  'title' => t('PayPal WPS'),
  'short_title' => t('PayPal'),
  'description' => t('PayPal Website Payments Standard'),
  'terminal' => FALSE,
  'offsite' => TRUE,
  'offsite_autoredirect' => TRUE,
);
?>

Payment methods may be altered using hook_commerce_payment_method_info_alter(&$payment_methods) before default values and magic callbacks have been set.

A single payment method object is referred to as $payment_method.
An array of payment method objects keyed by method_id is referred to as $payment_methods.
The method_id of a payment method is referred to as $method_id.

<a name="payment-transaction-status"> </a>
<h3>hook_commerce_payment_transaction_status_info()</h3>

The Payment module uses this hook to gather information on payment transaction statuses defined by enabled modules.  A payment transaction represents any attempted payment via a payment method and includes a variety of properties used for tracking the amount, outcome, and parameters of the transaction.  One of these is the transaction’s local status, not to be confused with its remote_status that stores the exact status of the transaction at the payment provider.

Transaction statuses are used to visually represent in the order’s Payment tab whether or not the payment should be considered a success (meaning money was actually collected) and are accordingly considered when calculating the remaining balance of an order.  Because payment statuses are critical functionality components, the default statuses listed below are actually defined in the function used to load all payment transaction statuses:
<ul>
<li>Pending - further action is required to determine if the attempted payment was a success or failure; used for payment methods like e-checks that may require time to clear or credit card authorizations that haven’t been captured yet</li>
<li>Success - the transaction is complete and a success, meaning the amount of this transaction will be subtracted from the order total to determine the outstanding balance on the order</li>
<li>Failure - the attempted transaction failed and will not be counted in totals</li>
</ul>

Additional statuses may be defined via this hook, but there is no general alteration.  The properties of the default statuses may be altered as long as the actual status key is preserved via the use of array merging.  For more information, check out the comments for commerce_payment_transaction_statuses().

The payment transaction status data structure is as follows:
<ul>
<li><em>status</em> - string identifying the transaction status, lowercase using alphanumerics, -, and _</li>
<li>title - the translatable title of the transaction status, used in administrative interfaces</li>
<li>icon - the path to the status’s icon relative to the Drupal root directory</li>
<li>total - TRUE or FALSE indicating whether or not transactions in this status should be totaled to determine the balance of an order</li>
</ul>

Example payment transaction status definition:

<?php
$statuses[COMMERCE_PAYMENT_STATUS_SUCCESS] = array(
 'status' => COMMERCE_PAYMENT_STATUS_SUCCESS,
 'title' => t('Success'),
 'icon' => drupal_get_path('module', 'commerce_payment') . '/theme/icon-success.png',
 ‘total' => TRUE,
);
?>

(Note: COMMERCE_PAYMENT_STATUS_SUCCESS is a string constant defined in the Payment module.)

A single payment transaction status object is referred to as $transaction_status.
An array of payment transaction status objects keyed by status is referred to as $transaction_statuses.
The status of a payment transaction status is referred to as $status.