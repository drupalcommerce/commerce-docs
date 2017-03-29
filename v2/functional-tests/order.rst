Order Administration (see OrderAdminTest.php)
=============================================

Contains tests for order administration.

Create orders
-------------

Tests the commerce_order entity forms by ensuring that we can create/edit/delete orders.

- Confirms that we can create an order by going to the /admin/commerce/orders page and clicking on the 'Create a new order' link and selecting the current user as the customer:

.. code-block:: php

        $this->drupalGet('/admin/commerce/orders');
        $this->getSession()->getPage()->clickLink('Create a new order');
        $user = $this->loggedInUser->getAccountName() . ' (' . $this->loggedInUser->id() . ')';
        $edit = [
        'customer_type' => 'existing',
        'uid' => $user,
        ];
        $this->submitForm($edit, t('Create'));

- Ensures that the next page displays the following fields:
    - Billing information
    - Product Variation

- The test goes on to fill out the product variation fields and creates a new order item.

- Next, the test confirms that the order item can be successfully updated.

- Finally, the order is created by adding the billing information and submitting the form.

- It then, confirms that the order exists in the table and the order totals are the same as expected.

Edit orders
-----------

Tests that we can edit an existing order.
- An order gets created:

.. code-block:: php

        $order = Order::create([
          'type' => 'default',
          'state' => 'completed',
          'uid' => $this->loggedInUser,
          'store_id' => $this->store,
        ]);
        $order->save();

- The test goes on to add a couple of adjustments for the newly created order:

.. code-block:: php

        $adjustments = [];
        $adjustments[] = new Adjustment([
        'type' => 'custom',
        'label' => '10% off',
        'amount' => new Price('-1.00', 'USD'),
        ]);
        $adjustments[] = new Adjustment([
        'type' => 'custom',
        'label' => 'Handling fee',
        'amount' => new Price('10.00', 'USD'),
        ]);
        $order->addAdjustment($adjustments[0]);
        $order->addAdjustment($adjustments[1]);
        $order->save();

- It then, goes to the edit page of the order and confirms that only those two adjustments are visible for that order.

Delete orders
-------------

Tests that we can delete an existing order
- The tests creates a new order and goes to the delete url of the order and ensures that we are successfully taken to the delete confirm form and can finalize the deletion from there.

Test Admin permissions for viewing orders
-----------------------------------------

Finally, the test ensures that only the admin user can view an order's details.
- First, the test creates an order item and an order:

.. code-block:: php

        $order_item = $this->createEntity('commerce_order_item', [
        'type' => 'default',
        'unit_price' => [
          'number' => '999',
          'currency_code' => 'USD',
        ],
        ]);
        $order = $this->createEntity('commerce_order', [
        'type' => 'default',
        'store_id' => $this->store->id(),
        'mail' => $this->loggedInUser->getEmail(),
        'order_items' => [$order_item],
        'state' => 'draft',
        'uid' => $this->loggedInUser,
        ]);

- Confirms the admin can see the order as well as the 'Place order'/'Cancel order' buttons.
- Ensures that anonymous users get a 403 error if they try to access the order admin page.


