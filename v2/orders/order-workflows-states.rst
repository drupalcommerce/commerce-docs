Order Workflow States
=====================

Workflow States are the different states that an Order can exist at. For example, in the default Fulfillment workflow, the order is in the Draft state when a customer is adding products to the shopping cart, after it has been submitted it is in the Fulfillment state (awaiting for the store to fulfill the order), and after the products have been shipped the order is in the Completed State.

The default states for the default workflows are:

+-----------+-------------------------+--------------+-----------------------------+
| Default   | Default with validation | Fulfillment  | Fulfillment with validation |
+===========+=========================+==============+=============================+
| Draft     | Draft                   | Draft        | Draft                       |
+-----------+-------------------------+--------------+-----------------------------+
| Completed | Validation              | Fulfillment  | Validation                  |
+-----------+-------------------------+--------------+-----------------------------+
| Canceled  | Completed               | Completed    | Fulfillment                 |
+-----------+-------------------------+--------------+-----------------------------+
|           | Canceled                | Canceled     | Completed                   |
+-----------+-------------------------+--------------+-----------------------------+
|           |                         |              | Canceled                    |
+-----------+-------------------------+--------------+-----------------------------+

Workflow States are defined as part of the workflow definition in a YAML configuration file. Here is an example of how states for the Fulfillment order workflow are defined by the Commerce Order module.

.. code-block:: yaml

    // commerce_order.workflows.yml

    order_fulfillment:
      states:
        draft:
          label: Draft
        fulfillment:
          label: Fulfillment
        completed:
          label: Completed
        canceled:
          label: Canceled
