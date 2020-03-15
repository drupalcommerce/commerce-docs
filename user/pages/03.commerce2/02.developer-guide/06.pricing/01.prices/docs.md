---
title: Prices
taxonomy:
    category: docs
---

A Drupal Commerce `Price` consists of a number and a currency code. For example, to create a Price with the value of 5 US dollars, you would write:

```php
$my_price = new Price('5.00', 'USD');
```

**Important**: note that the number value is actually a *string*, not a float. To summarize, a `Drupal\commerce_price\Price` object has the following properties:
* Number: a decimal number, stored as a string.
* Currency code: a three letter currency code, stored as a string.

When working with prices, they must be in the same currency. You can convert a `Price` from one currency to another using the `Price::convert()` method. If you attempt to perform arithmetic operations or compare prices with different currencies, you'll get a `CurrencyMismatchException`.


The `Price` class provides the following arithmetic and comparison methods, all of which rely on the `Calculator` class for helper methods:
* add
* subtract
* multiply
* divide
* compareTo
* isPositive
* isNegative
* isZero
* equals
* greaterThan
* greaterThanOrEqual
* lessThan
* lessThanOrEqual

For example, if we want to add $10.00 to our $5.00 example Price created above, we can do this:

```php
$new_price = $my_price->add(new Price('10', 'USD'));
```

And we can compare those two Prices like this:

```php
if ($new_price->greaterThan($my_price)) {
	// do something.
}
```

 For full documentation of these methods, see `Drupal\commerce_price\Price` and `Drupal\commerce_price\Calculator` in the Drupal Commerce Price module. Also, the `Drupal\Tests\commerce_price\Unit\PriceTest` test code provides comprehensive example code for these methods.


### Price Rounding
Drupal Commerce provides a service for rounding a Price to the correct number of decimal places, based on its currency. By default, a half value will be rounded up, making 1.5 into 2. Optionally, any of the php rounding mode constants can be used. See the [php round() documentation] for additional information.

#### Rounding service example: round $3.3698 to $3.37

```php
$rounded_price = \Drupal::getContainer()->get('commerce_price.rounder')->round(new Price('3.3698', 'USD'));
if ($rounded_price->equals(new Price('3.37', 'USD'))) {
	// This is true.
}
```

### Price Fields
The Commerce Price module defines a *Price* field type which is used within Drupal Commerce for product variations, orders, order items, and payments. These fields store a Price value, as represented by number and currency strings.

#### Product prices
Product prices are associated with individual product variations, not with the parent product entities. See [Product informatation structure](../../../products/overview/product-information-structure) for an explanation of the differences between products and product variations. Product variations have two price fields:
* `Price` is a required field; it is the default price value that is transferred to the order when the product variation is added to the cart.
* `List price` is an optional field that is hidden by default. It is meant for display only and is usually crossed out in some way.

Both these price fields can be *resolved*, meaning that their values can be calculated automatically to support multicurrency or other complex pricing needs. See the [Price resolvers](../price-resolvers) documentation for more information on this process.

Additionally, the [Commerce Pricelist module] supports creating price lists for different dates, stores, individual roles or users. Each price list holds prices for different purchasable entities and quantity tiers. Prices can be defined manually or imported from CSV.

#### Order and order item prices
An order has two Price fields: Total price and Total paid.

The total price value gets updated automatically whenenver order items or adjustments are updated for the order. The total price takes into account both the prices of the order items and all adjustments that are included in the price. If you are looking for just the sum of order item prices without adjustments, you can use the `getSubtotalPrice()` method to calculate this total.

The total paid value is the sum of all payments made on the order. You can use the `getBalance()` method to get the difference between the total price and the total paid for the order. The `isPaid()` method will return `TRUE` if the order balance is less than or equal to zero.

An order item also has two Price fields: Total price and Unit price.

The total price value is the product of the order item unit price and the order item quantity, rounded to the correct number of decimal places (based on the currency of the unit price). It is recalculated automatically whenever the unit price or quantity is updated or the order item is saved. This value does not take into account any adjustments on the order item. You can use the `getAdjustedTotalPrice()` method to get the adjusted total price, which is also rounded based on currency.

The value for the Unit price for an order item can be set in a variety of ways throughout the shopping and order management processes. If you want to have complete control over its value, you can set the "Overridden unit price" boolean field value for an order item to `TRUE`. This can be done by administrative users through the order admin UI or programatically using the `setUnitPrice()` method (with the optional `override` parameter set to `TRUE`).

Initially, the Unit price is set using the resolved price for the purchased entity (product variation). A resolved price is based on a dynamic calculation that takes into account the quantity, customer, store, and time of the request. See [Price resolvers](../price-resolvers) for a detailed explanation. For existing order items, Unit prices get updated during the [Order refresh process](../../../order-refresh-and-process). First, the resolved price is recalculated. Then, order processors can also affect the value of the price. For example, if there are any display inclusive promotions that apply to the order item, they will update the value of the Unit price.

#### Payment prices
Payments have two Price fields: Amount and Refunded amount. Additionally, a `getBalance()` method calculates the difference beween the Amount and the Refunded amount. These values are managed by payment gateway methods. For an overview, see the [Payments](../../../payments) documentation.

[php round() documentation]: https://www.php.net/manual/en/function.round.php
[Commerce Pricelist module]: https://www.drupal.org/project/commerce_pricelist
[Commerce shipping]: https://www.drupal.org/project/commerce_shipping

