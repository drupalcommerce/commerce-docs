---
title: Order workflow
taxonomy:
    category: docs
---

The fulfillment process of an order depends on the type of store a site is running and its operational processes. A store that sells digital products might receive an order, capture the payment, and send the products electronically and close the order all automatically in one go. A drop-shipping store may receive an order, forward the order to an external fulfillment service, verify availability, capture payment, and ship the products, all as separate steps of the process, some programmatically performed and some manually.

Commerce 2 allows developers the flexibility to customise the steps that an order goes through, from creation to completion. By default, it makes available four different workflows: Default, Default with validation, Fulfillment, and Fulfillment with validation. Custom workflows can be defined by developers. An order type can be associated with a specific workflow, and that forces the order to follow that workflow's rules.

This functionality is provided by the [State machine module], a core dependency for Drupal Commerce. See the [State machine documentation](../../core/libraries-and-dependencies/state-machine) to learn more about this module and its uses beyond Order workflows.

This documentation section covers the following topics:

#### [Choosing a workflow](01.choosing-workflow)
- Administration of Order workflows.

#### [Order workflow states](02.workflow-states)
- Comparison of the available States for the default Order workflows.

#### [Order workflow transitions](03.workflow-transitions)
- A brief overview of Order workflow transitions.

#### [How to Create a Custom Order Workflow](04.create-custom-workflow)
- Tutorial example for customizing the default Fulfillment Order workflow. 

#### [Subscribing to Transition Events](05.react-to-workflow-transitions)
- Tutorial example for reacting to Order workflow Transition events.

## Comparison to Commerce 1

Users of Commerce 1 might be wondering what are the differences in the architecture of Commerce 2. Commerce 1 defined order statuses grouped together in states. For example, an order going through the checkout process would move through the Checkout:Checkout, Checkout:Review, Checkout:Payment, Checkout:Complete statuses, all part of the Checkout state group. That setup was a source of confusion and it was causing some technical issues as well because it was forcing workflows that were only loosely related (order workflow, checkout workflow, payment workflow, fulfillment workflow) to form one single workflow. That made defining clear paths between states unnecessarily complicated.

Commerce 2 decouples workflows making transitions between states straightforward.

[State machine module]: https://www.drupal.org/project/state_machine

