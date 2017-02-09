Orders and order items
======================

Creating order types
--------------------

.. code-block:: php

    /**
     * id [String]
     *   The primary key for this order type.
     *
     * label [String]
     *   The label for this order type.
     *
     * status [Bool] - [OPTIONAL, DEFAULTS TO TRUE]
     *   [AVAILABLE = FALSE, TRUE]
     *   Whether or not it's enabled or disabled. 1 for enabled.
     *
     * workflow [String] - [DEFAULT = order_default]
     *   [AVAILABLE = order_default, order_default_validation, order_fulfillment, order_fulfillment_validation]
     *   The workflow id to use as the workflow.
     *
     * refresh_mode [String] - [DEFAULT = always]
     *   [AVAILABLE = always, customer]
     *   The refresh mode to use as the refresh mode.
     *
     * refresh_frequency [Integer] - [DEFAULT = 30]
     *   The refresh freuency in seconds.
     */
    $order_type = \Drupal\commerce_order\Entity\OrderType::create([
      'status' => TRUE,
      'id' => 'custom_order_type',
      'label' => 'My custom order type',
      'workflow' => 'order_default',
      'refresh_mode' => 'always',
      'refresh_frequency' => 30,
    ]);
    $order_type->save();

    // This must be called after saving.
    commerce_order_add_order_items_field($order_type);


Loading an order type
---------------------

.. code-block:: php

    // Loading is based off of the primary key [String] that was defined when creating it.
    $order_type = \Drupal\commerce_order\Entity\OrderType::load('custom_order_type');

Creating order item types
-------------------------

.. code-block:: php

    /**
     * id [String]
     *   The primary key for this order item type.
     *
     * label [String]
     *   The label for this order item type.
     *
     * status [Bool] - [OPTIONAL, DEFAULTS TO TRUE]
     *   [AVAILABLE = FALSE, TRUE]
     *   Whether or not it's enabled or disabled. 1 for enabled.
     *
     * purchasableEntityType [String] - [DEFAULT = commerce_product_variation]
     *   Foreign key to use for the purchasable entity type.
     *
     * orderType [String] - [DEFAULT = default]
     *   Foreign key to use for the order type.
     */
    $order_item_type = \Drupal\commerce_order\Entity\OrderItemType::create([
      'id' => 'custom_order_item_type',
      'label' => 'My custom order item type',
      'status' => TRUE,
      'purchasableEntityType' => 'commerce_product_variation',
      'orderType' => 'custom_order_type',
    ]);
    $order_item_type->save();

Loading an order item type
--------------------------

.. code-block:: php

    // Loading is based off of the primary key [String] that was defined when creating it.
    $order_item_type = \Drupal\commerce_order\Entity\OrderItemType::load('custom_order_item_type');

Creating order items
--------------------

.. code-block:: php

    /**
     * type [String] - [DEFAULT = product_variation]
     *   Foreign key to use for the order item type.
     *
     * purchased_entity [Integer | \Drupal\commerce\PurchasableEntityInterface]
     *    Foreign key to use for the purchased entity. Either the id, or object implementing the interface.
     *
     * quantity [Integer]
     *   How many of the purchased items.
     *
     * unit_price [\Drupal\commerce_price\Price]
     *   The price per each item, not the total.
     *
     * adjustments [OPTIONAL] - [Array(Drupal\commerce_order\Adjustment)]
     *   Array of any price adjustments.
     */
    $order_item = \Drupal\commerce_order\Entity\OrderItem::create([
      'type' => 'custom_order_item_type',
      'purchased_entity' => $variation_red_medium,
      'quantity' => 2,
      'unit_price' => $variation_red_medium->getPrice(),
    ]);
    $order_item->save();

    // You can set the quantity with setQuantity.
    $order_item->setQuantity('1');
    $order_item->save();

    // You can also set the price with setUnitPrice.
    $unit_price = new \Drupal\commerce_price\Price('9.99', 'USD');
    $order_item->setUnitPrice($unit_price);
    $order_item->save();

Loading an order item
---------------------

.. code-block:: php

    // Loading is based off of the primary key [Integer]
    //   1 would be the first one saved, 2 the next, etc.
    $order_item = \Drupal\commerce_order\Entity\OrderItem::load(1);

Creating orders
---------------

.. code-block:: php

    /**
     * type [String] - [DEFAULT = default]
     *   Foreign key to use for the order type.
     *
     * state [String] - [DEFAULT = draft]
     *   [AVAILABLE = draft, completed, canceled]
     *   The state the order is in.
     *
     * mail [String]
     *   The email address the order belongs to.
     *
     * uid [Integer]
     *   The user id the order belongs to.
     *
     * ip_address [String]
     *   The ip address the order was created from.
     *
     * order_number [Integer | String] - [OPTIONAL, DEFAULTS TO id]
     *   The order number for the order. If left out, defaults to the order's id.
     *
     * billing_profile [\Drupal\profile\Entity\ProfileInterface]
     *   The billing profile for the order.
     *
     * store_id [Integer]
     *   The foreign key for the store that this order belongs to.
     *
     * order_items [Array(\Drupal\commerce_order\Entity\OrderItemInterface]
     *   Array of all the order items that belong to this order.
     *
     * adjustments [OPTIONAL] - [Array(Drupal\commerce_order\Adjustment)]
     *   Array of any price adjustments.
     *
     * placed [Timestamp]
     *   The time the order was placed.
     *
     * completed [OPTIONAL] - [Timestamp]
     *   The time the order was completed.
     */

    // Create the billing profile.
    $profile = \Drupal\profile\Entity\Profile::create([
      'type' => 'customer',
      'uid' => 1,
    ]);
    $profile->save();

    // Next, we create the order.
    $order = \Drupal\commerce_order\Entity\Order::create([
      'type' => 'custom_order_type',
      'state' => 'draft',
      'mail' => 'user@example.com',
      'uid' => 1,
      'ip_address' => '127.0.0.1',
      'order_number' => '6',
      'billing_profile' => $profile,
      'store_id' => $store->id(),
      'order_items' => [$order_item],
      'placed' => time(),
    ]);
    $order->save();

Loading an order
----------------

.. code-block:: php

    // Loading is based off of the primary key [Integer]
    //   1 would be the first one saved, 2 the next, etc.
    $order = \Drupal\commerce_order\Entity\Order::load(1);
