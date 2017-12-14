---
title: Customer info hooks
taxonomy:
    category: docs
---

<h3>hook_commerce_customer_profile_type_info()</h3>

The Customer module uses this hook to gather information on the types of customer information profiles defined by enabled modules.  Each type is represented as a new bundle of the customer information profile entity and will have a corresponding checkout pane defined for it that may be used in the checkout form to collect information from the customer like name, address, tax information, etc.  Every bundle comes with a locked address field and additional fields may be added as necessary.

The Customer module defines a single customer information profile type in its own implementation of this hook, [commerce_customer_commerce_commerce_customer_profile_type_info()](http://api.drupalcommerce.org/api/Drupal%20Commerce/ommerce--modules--customer--commerce_customer.module/function/commerce_customer_commerce_customer_profile_type_info/DC):
<ul>
<li>Billing information - used to collect a billing name and address from the customer for use in processing payments.</li>
</ul>

The full list of properties for a profile type is as follows:
<ul>
<li><em>type</em> - string identifying the profile type, lowercase using alphanumerics, -, and _</li>
<li>name - the translatable name of the profile type, used as the title of the corresponding checkout pane</li>
<li>description - a translatable description of the intended use of data contained in this type of customer information profile</li>
<li>help - a translatable help message to be displayed at the top of the administrative add / edit form for profiles of this type</li>
<li>addressfield - boolean indicating whether or not the profile type should have a default address field; defaults to TRUE</li>
<li>module - the name of the module that defined the profile type; should not be set by the hook but will be populated automatically when the pane is loaded</li>
</ul>

Example customer information profile type definition:

<?php
$profile_types['billing'] = array(
 'type' => 'billing',
 'name' => t('Billing information'),
 'description' => t('The profile used to collect billing information on the checkout and order forms.'),
);
?>

Customer information profile types may be altered using hook_commerce_customer_profile_info_alter(&$profile_types) after the module has been set.

A single customer profile type array is referred to as $profile_type.
An array of customer profile type arrays keyed by type is referred to as $profile_types.
The type of a customer profile type is referred to as $type.