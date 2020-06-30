---
title: Order workflow transitions
taxonomy:
    category: docs
---

Workflow Transitions are paths through which an order can move from one state to another. For example, in the default Fulfillment workflow, the order can move from the Draft state to the Fulfillment state, from the Fulfillment state to the Completed state, while it can move to the Canceled state either from the Draft or from the Fulfillment state.

Workflow Transitions are defined as part of the workflow definition in a YAML configuration file. Here is an example of how transitions for the Fulfillment order workflow are defined by the Commerce Order module.

```yaml
// commerce_order.workflows.yml

order_fulfillment:
  transitions:
    place:
      label: 'Place order'
      from: [draft]
      to:   fulfillment
    fulfill:
      label: 'Fulfill order'
      from: [fulfillment]
      to: completed
    cancel:
      label: 'Cancel order'
      from: [draft, fulfillment]
      to:   canceled
```
