---
title: Order info hooks
taxonomy:
    category: docs
---

<ol>
<li><a href="#order-state">hook_commerce_order_state_info()</a></li>
<li><a href="#order-status">hook_commerce_order_status_info()</a></li>
</ol>

<a name="order-state"> </a>
<h3>hook_commerce_order_state_info()</h3>

The Order module uses this hook to gather information on order states defined by enabled modules.  An order state is a particular phase in the life-cycle of an order that is comprised of one or more order statuses.  In that regard, an order state is little more than a container for order statuses with a default status per state.  This is useful for categorizing orders and advancing orders from one state to the next without needing to know the particular status an order will end up in.

The Order modules defines several order states in its own implementation of this hook, commerce_order_commerce_order_state_info():
<ul>
<li>Canceled - Orders in this state have been canceled through some user action.</li>
<li>Pending - Orders in this state have been created and are awaiting further action.</li>
<li>Completed - Orders in this state have been completed as far as the customer is concerned.</li>
</ul>

Additionally, the Cart and Checkout modules define the following order states:
<ul>
<li>Shopping cart - Orders in this state have not been completed by the customer yet.</li>
<li>Checkout - Orders in this state have begun but not completed the checkout process.</li>
</ul>

The order state data structure is as follows:
<ul>
<li><em>name</em> - string identifying the order state, lowercase using alphanumerics, -, and _</li>
<li>title - the translatable title of the order state, used in administrative interfaces</li>
<li>description - a translatable description of the types of orders that would be in this state</li>
<li>weight - integer weight of the state used for determining the state order; defaults to 0</li>
<li>default_status - name of the default order status for this state</li>
</ul>

Example order state definition:

<?php
$order_states['completed'] = array(
 'name' => 'complete',
 'title' => t('Completed'),
 'description' => t('Orders in this state have been completed as far as the customer is concerned.'),
 'weight' => 10,
 'default_status' => 'complete',
);

// return $order_states //from hook function
?>

Order states may be altered using hook_commerce_order_state_info_alter(&$order_states) before being sorted by weight.

A single order state array is referred to as $order_state.
An array of order state arrays keyed by name is referred to as $order_states.
The name of an order state is referred to as $name.

<a name="order-status"> </a>
<h3>hook_commerce_order_status_info()</h3>

The Order module uses this hook to gather information on order statuses defined by enabled modules.  An order status is a single step in the life-cycle of an order that administrators can use to know at a glance what has occurred to the order already and/or what the next step in processing the order will be.

The Order modules defines several order statuses in its own implementation of this hook, commerce_order_commerce_order_status_info():
<ul>
<li>Canceled - default status of the Canceled state, used for orders that are marked as canceled via the administrative user interface</li>
<li>Pending - default status of the Pending state, used to indicate the order has completed checkout and is awaiting further action before being considered complete</li>
<li>Completed - default status of the Completed state, used for orders that don’t require any further attention or customer interaction</li>
</ul>

The Cart and Checkout modules also define order statuses and interact with them in special ways.  The Cart module actually uses the order status to identify an order as a user’s shopping cart order based on the special cart property of order statuses.  The Checkout module uses the order status to determine which page of the checkout process a customer is currently on when they go to the checkout URL.  As the order progresses through checkout, the order status is updated to reflect the new page.  The statuses defined for these things are as follows:
<ul>
<li>Shopping cart - default status of the Shopping cart state, used for orders that are pure shopping cart orders that have not begun the checkout process at all</li>
<li>Checkout: [page name] - each checkout page has a related order status containing the name of the checkout page the order has progressed to; orders in this status are either in checkout or have been abandoned at the indicated step of the checkout process</li>
</ul>

The order status data structure is as follows:
<ul>
<li><em>name</em> - string identifying the order status, lowercase using alphanumerics, -, and _</li>
<li>title - the translatable title of the order status, used in administrative interfaces</li>
<li>state - the name of the order state the order status belongs to</li>
<li>cart - TRUE or FALSE indicating whether or not orders with this status should be considered shopping cart orders</li>
<li>weight - integer weight of the state used for determining the status order; defaults to 0</li>
<li>status - TRUE or FALSE indicating the enabled status of this order status, with disabled statuses not being available for use; defaults to TRUE</li>
</ul>

Example order status definition:

<?php
$order_statuses['completed'] = array(
 'name' => 'completed',
 'title' => t('Completed'),
 'state' => 'completed',
);

// return $order_statuses;  // from hook fn
?>

Order statuses may be altered using hook_commerce_order_status_info_alter(&$order_statuses) after default values have been set and before being sorted by weight.

A single order status array is referred to as $order_status.
An array of order status arrays keyed by name is referred to as $order_statuses.
The name of an order status is referred to as $name.