---
title: State Machine
taxonomy:
    category: docs
---

See Also: [State machine module on drupal.org]

The State Machine module provides code-driven workflow functionality.

A workflow is a set of states and transitions that an entity goes through during
its lifecycle. A transition represents a one-way link between two states and has its
own label. The current state of a workflow is stored in a state field, which
provides an API for getting and applying transitions. An entity can have multiple
workflows, each in its own state field. An order might have checkout and payment
workflows. A node might have legal and marketing workflows. Workflow groups are
used to group workflows used for the same purpose (e.g. payment workflows).

#### [Architecture](01.architecture)
- Provides a technical overview of the State Machine module's architecture.

#### [Working with State fields](02.state-fields)
- Learn how State fields are used within Drupal Commerce.
- Learn how to create custom State fields, workflows, and workflow groups.
- Includes example for a custom Order item fulfillment State field.

#### [State transition Guards](03.state-transition-guards)
 - Guards can be used to add business logic constraints to State transitions.
 - Includes example code for an Order fulfillment workflow Guard.

#### [State transition event subscribers](03.state-transition-event-subscribers)
 - Learn about the different types of Events provided by the State machine module.
 - Includes example code for reacting to the transitions of a custom Order item fulfillment field.

#### [Code recipes](10.code-recipes)
- Alter existing workflows.
- Get State field values.
- Apply State transitions programatically.

[State machine module on drupal.org]: https://www.drupal.org/project/state_machine
