---
title: Working with other contrib modules
taxonomy:
    category: docs
---

Drupal Commerce works well with most other modules in the Drupal contrib space. However, some modules may require specific steps to best integrate.

# Field Group
To use field groups within Drupal commerce you will need to implement a hook within your custom module/site. For example:
```php
/**
 * Implements hook_field_group_content_element_keys_alter().
 *
 * Allow products to render fields groups defined from Fields UI.
 */
function HOOK_field_group_content_element_keys_alter(&$keys) {
  $keys['commerce_product'] = 'product';
}

```
