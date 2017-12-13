---
title: Create a payment gateway
taxonomy:
    category: docs
---

The Commerce 2 Payment API provides a framework for online payment gateway implementation. Most of the code you will need to write is gateway specific.

## Create a new module

The first thing you will need to do is create a new module with a YAML file that includes the `commerce_payment` dependency. It will look something like the following:

```php
name: Gazillionaire Gateway
type: module
description: Provides Commerce integration for the Gazillionaire Gateway.
core: 8.x
package: Commerce (contrib)
dependencies:
  - commerce:commerce_payment
```

If the gateway depends on a vendor-supplied library, you may need to include a `composer.json` file with a pointer to its repository.

## Configuration Fields

First, figure out which configuration fields your gateway requires and create fields for them in the module's `config/schema/commerce_gazillionaire.schema.yml` file. They will be fields like API Key, Merchant Account ID, API username, password, etc.

Then, create a payment gateway plugin by subclassing `Drupal\commerce_payment\Plugin\Commerce\PaymentGateway\OnsitePaymentGatewayBase`.

To display the fields in the `Add payment gateway` form, add them as Form API fields in the `buildConfigurationForm` method.

Finally, set the default values to be returned in the `defaultConfiguration` method and save them in the `submitConfigurationForm` method.

## OnsitePaymentGatewayBase Plugin Methods

The following is a brief overview of what the OnsitePaymentGatewayBase plugin methods do.

### createPaymentMethod

During the checkout process, this method is called when the 'Continue to review' button has been clicked on the 'Order information' page. The `$payment_details` array contains all credit card information collected from the 'Payment Information' form. Billing address and credit card information is typically stored or updated on the payment gateway inside of this method. After the information has been stored on the gateway, payment method details are typically saved locally in the `$payment_method` variable.

### createPayment

The `createPayment` method is called when the 'Pay and complete purchase' button has been clicked on the final page of the checkout process; the 'Review' page. If `$capture` is TRUE, a sale transaction should be run; if FALSE, an authorize only transaction should be run.

### capturePayment

Previously authorized transactions are captured and moved to the current batch for settlement in this method.

### voidPayment

The `voidPayment` method could also be called delete payment. It is called when the 'Delete' operations button is clicked on a specific payment on the payments page. It will void a transaction that was previously authorized but has not been settled.

### refundPayment

The `refundPayment` method is called from the 'Payments' tab of an order when the 'Refund' operations button is click on a payment. This method serves to refund all or part of a sale.

### deletePaymentMethod

The `deletePaymentMethod` deletes a stored payment method from an existing customer's record. It is called from the 'Payment methods' tab of a user's account. It should delete a saved payment method both on the Commerce site and in the gateway customer records.
