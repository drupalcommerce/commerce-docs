# State Machine

See Also: [module on drupal.org](https://www.drupal.org/project/state_machine)

Provides code-driven workflow functionality.

A workflow is a set of states and transitions that an entity goes through during its lifecycle.
A transition represents a one-way link between two states and has its own label.
The current state of a workflow is stored in a state field, which provides an API for getting and
applying transitions. An entity can have multiple workflows, each in its own state field.
An order might have checkout and payment workflows. A node might have legal and marketing workflows.
Workflow groups are used to group workflows used for the same purpose (e.g. payment workflows).

## Architecture

[Workflow](https://github.com/bojanz/state_machine/blob/8.x-1.x/src/Plugin/Workflow/WorkflowInterface.php) and [WorkflowGroup](https://github.com/bojanz/state_machine/blob/8.x-1.x/src/Plugin/WorkflowGroup/WorkflowGroupInterface.php) are plugins defined in YAML, similar to menu links.

Example: commerce_order.workflow_groups.yml:
```yaml
order:
  label: Order
  entity_type: commerce_order
```
Groups can also override the default workflow class, for more advanced use cases.

Example: commerce_order.workflows.yml:
```yaml
order_default_validation:
  id: order_default_validation
  group: order
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

Transitions can be further restricted by [guards](https://github.com/bojanz/state_machine/blob/8.x-1.x/src/Guard/GuardInterface.php), which are implemented as tagged services:
```yaml
  mymodule.fulfillment_guard:
    class: Drupal\mymodule\Guard\FulfillmentGuard
    tags:
      - { name: state_machine.guard, group: order }
```
The group argument allows the guard factory to only instantiate the guards relevant
to a specific workflow group.

The current state is stored in a [StateItem](https://github.com/bojanz/state_machine/blob/8.x-1.x/src/Plugin/Field/FieldType/StateItem.php) field.
A field setting specifies the used workflow, or a value callback that allows the workflow to be resolved at runtime 
(checkout workflow based on the used plugin, etc.).

A validator is provided that ensures that the specified state is valid (exists in the workflow and is in the allowed 
transitions).
