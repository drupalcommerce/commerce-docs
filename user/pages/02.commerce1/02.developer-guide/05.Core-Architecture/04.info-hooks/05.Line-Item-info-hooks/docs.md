---
title: Line Item info hooks
taxonomy:
    category: docs
---

<h3>hook_commerce_line_item_type_info()</h3>

Note: [Commerce Examples](http://drupal.org/project/commerce_examples) has a line item example demonstrating this, and [Commerce Custom Line Items](http://drupal.org/project/commerce_custom_line_items) actually will create custom line items for you. And here are two screencasts on custom line items: [Introduction to Custom Line Items](http://www.commerceguys.com/resources/articles/237) and [Using Custom Line Items to Provide a Donation Feature](http://www.commerceguys.com/resources/articles/238).

The Line Item module uses this hook to gather information on the types of line items defined by enabled modules.  Each type is represented as a new bundle of the line item entity.  Every bundle comes with a locked price field and additional fields may be added by the defining modules as necessary.  For example, the product line item type gets a product reference field attached to it that relates the line item to the product it represents.

The Line Item module doesn’t define any line item types on its own.  However, when other modules are enabled that implement hook_commerce_line_item_type_info(), the Line Item module will detect it and perform initial configuration via the use of a special callback in the line item type’s definition.  Currently defined line item types include:
<ul>
<li>Product - actually defined by the Product Reference module, this line item type references a product and uses the SKU and special view modes for display in line item interfaces</li>
</ul>

The full list of properties for a line item type is as follows (callback properties show arguments passed to the callbacks in parentheses):
<ul>
<li><em>type</em> - string identifying the line item type, lowercase using alphanumerics, -, and _</li>
<li>name - the translatable name of the line item type, used in administrative interfaces including the “Add line item” form on the order edit page</li>
<li>description - a translatable description of the intended use of line items of this type</li>
<li>product - boolean indicating whether or not this line item type can be used as a product line item type in interfaces like the Add to Cart form</li>
<li>add_form_submit_value - the translatable value of the submit button used for adding the line item</li>
<li>base - string used as the base for the magically constructed callback names, each of which will be defaulted to [base]_[callback] unless explicitly set; defaults to the type</li>
<li>callbacks - an array of callback function names for the various types of callback required for all the line item type operations, arguments per callback in parentheses:
<ul>
<li>configuration - () - configures the line item type for use, typically by adding additional fields to the line item type besides the default price field</li>
<li>title - ($line_item) - returns a sanitized title of the line item for use in Views and other displays</li>
<li>add_form - () - returns the form elements necessary to add a line item of this type to an order via a line item manager widget</li>
<li>add_form_submit - (&$line_item, $element, &$form_state, $form) - processes data inputted via the add line item form elements for this line item type, adding data to the new line item object; should return an error message if the line item should not be added for some reason</li>
</ul></li>
</ul>

Example line item type definition:

<?php
$line_item_types[‘product’] = array(
  'type' => 'product',
  'name' => t('Product'),
  'description' => t('References a product and displays it with the SKU as the label.'),
  'add_form_submit_value' => t('Add product'),
  'base' => 'commerce_product_line_item',
  'callbacks' => array(
    'configuration' => 'commerce_product_reference_configure_line_item',
  ),
);
?>

Line item types may be altered using hook_commerce_line_item_type_info_alter(&$line_item_types).

A single line item type array is referred to as $line_item_type.
An array of line item type arrays keyed by type is referred to as $line_item_types.
The type of a line item type is referred to as $type.