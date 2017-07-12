Order Workflow Groups
=====================

Order Workflows that are related to each other can be grouped together in groups. For example, all default workflows provided by the Commerce Order module are grouped together in a group called Order. The only requirement is that all members of a group are of the same entity type, since workflows can be defined not only for Orders but for other entities as well.

Workflow Groups are defined in a YAML configuration file. Here is the definition of the default Order group:

-- code-block:: yaml

    // commerce_order.workflow_groups.yml

    commerce_order:
      label: Order
      entity_type: commerce_order
