---
title: Order workflows
taxonomy:
    category: docs
---

! We need help filling out this section! Feel free to follow the *edit this page* link and contribute.

## Workflows

Workflows describe states that an order can be in, and the possible transitions between these states.

Drupal Commerce provides four workflows:

![order_states](https://user-images.githubusercontent.com/4939441/150187067-ae61bf63-2417-43f0-9dbf-d7254510e107.png)

The *Default* workflow is the simplest, and suitable if the store doesn't need to keep track of different order states once an order has been placed.

The *Fulfillment* workflow adds in a state where the order has been placed, but has not yet been fulfilled. This workflow is suitable if the store wishes to track which placed orders have been fulfilled and which still need to be fulfilled.

The *Validation* workflow is very similar to the *Fulfillment* workflow, but stores whether an order has been validated rather than fulfilled.

The *Fulfillment with validation* workflow adds states to record whether an order has been validated, and then whether it has been fulfilled.

Select the workflow to use from Commerce > Configuration > Order types and changing the Workflow selection on the order type Edit form.
