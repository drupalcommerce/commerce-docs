---
title: Architecture
taxonomy:
    category: docs
---

[Workflow] and [WorkflowGroup] are plugins defined in YAML, similar to
menu links.

Example: `commerce_order.workflow_groups.yml`:

```yaml
order:
  label: Order
  entity_type: commerce_order
```

Groups can also override the default workflow class, for more advanced
use cases.

Example: `commerce_order.workflows.yml`:

```yaml
order_default_validation:
  id: order_default_validation
  group: commerce_order
  label: 'Default, with validation'
  states:
    draft:
      label: Draft
    validation:
      label: Validation
    completed:
      label: Completed
    canceled:
      label: Canceled
  transitions:
    place:
      label: 'Place order'
      from: [draft]
      to:   validation
    validate:
      label: 'Validate order'
      from: [validation]
      to: completed
    cancel:
      label: 'Cancel order'
      from: [draft, validation]
      to:   canceled
```

Transitions can be further restricted by [guards], which are implemented as tagged services:

```yaml
mymodule.fulfillment_guard:
        class: Drupal\mymodule\Guard\FulfillmentGuard
        tags:
          - { name: state_machine.guard, group: commerce_order }
```

The group argument allows the guard factory to only instantiate the guards relevant
to a specific workflow group.

The current state is stored in a [StateItem] field. A field setting specifies the used workflow, or a value callback that allows the workflow to be resolved at runtime (checkout workflow based on the used plugin, etc.). A validator is provided that ensures that the specified state is valid (exists in the workflow and is in the allowed transitions).

If a transition has been applied, the StateItem field will dispatch several [events] on entity save.
The pre_transition events are dispatched before the save (and allow the entity to be modified), while
the post_transition events are dispatched after the save.

[Workflow]: https://git.drupalcode.org/project/state_machine/blob/8.x-1.x/src/Plugin/Workflow/WorkflowInterface.php
[WorkflowGroup]: https://git.drupalcode.org/project/state_machine/blob/8.x-1.x/src/Plugin/WorkflowGroup/WorkflowGroupInterface.php
[guards]: https://git.drupalcode.org/project/state_machine/blob/8.x-1.x/src/Guard/GuardInterface.php
[StateItem]: https://git.drupalcode.org/project/state_machine/blob/8.x-1.x/src/Plugin/Field/FieldType/StateItem.php
[events]: https://git.drupalcode.org/project/state_machine/-/blob/8.x-1.x/src/Event/WorkflowTransitionEvent.php

