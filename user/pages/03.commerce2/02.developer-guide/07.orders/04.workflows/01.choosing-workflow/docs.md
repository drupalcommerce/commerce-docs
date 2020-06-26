---
title: Choosing a workflow
taxonomy:
    category: docs
---

## Associating an Order Type with a Workflow

An order type can be associated with a specific workflow, and that forces the order to follow that workflow's rules such as to only move through the defined transitions. To associate an order type with an order workflow, go to ``/admin/commerce/config/order-types`` and select to Edit the desired order type. You can then choose the desired workflow from the Workflow dropdown field. Save the form.

![Associating an Order Type with an Order Workflow](../../images/order_workflow_association.jpg)

Changing the Order Workflow
===========================

Order types can have different workflows depending on what type of products your store is selling and if the products are shippable etc. The default commerce order workflow just has two states, Draft and Completed. However, if you're running a big store with products that are shippable, the "Fulfillment, with Validation" workflow might be the best suited for your needs.

You can change the order type workflow by going to `/admin/commerce/config/order-types`. Then, select the order type you'd like to make the change to and click "Edit". You can now change the workflow by selecting the "Fulfillment, with validation" item fom the `Workflow` select list.

![](../../images/select_order_type_workflow.png)

Now, let's take a look at how this new workflow works.

## Order Fulfillment with Validation Workflow

The fulfillment, with validation, order process moves through the following cycle:

![](../../images/order_workflow.png)

It starts with the order being in the shopping cart, which is the Draft/Cart state, then, once the order is placed, it is put in the Validation state. Once you're ready to ship the goods, the order is moved to the Fulfillment state. And finally, once it leaves our store, the order is officially Completed.

