---
title: Info Hooks
taxonomy:
    category: docs
---

Info hooks of the format hook_commerce_*_info() are used to define a variety of non-entity / field data structures and even some default entity bundles in Drupal Commerce.  In most cases, the structures defined in these hooks are alterable by other modules.  
Currently every info hook is expected to return an associative array keyed by a unique ID after all the info hooks have been modified by this issue: <a href="http://drupal.org/node/875034">an issue</a>.

The hooks are categorized by module with information on all the properties acceptable to a data structure (including the unique key used as the array key in the hook’s return value) and notes regarding alteration and “magic” properties (i.e. properties that receive default values based on other properties in the structure).  In lists of properties, the unique key will be placed first and italicized.  This key serves as the key in the array returned by the info hooks and is also present as a property on the object itself.

<ul>
<li><a href="https://docs.drupalcommerce.org/commerce1/developer-guide/core-architecture/info-hooks/currency-info-hooks">Currency info hooks</a></li>
<li><a href="https://docs.drupalcommerce.org/commerce1/developer-guide/core-architecture/info-hooks/payment-info-hooks">Payment info hooks</a></li>
<li><a href="https://docs.drupalcommerce.org/commerce1/developer-guide/core-architecture/info-hooks/checkout-info-hooks">Checkout info hooks</a></li>
<li><a href="https://docs.drupalcommerce.org/commerce1/developer-guide/core-architecture/info-hooks/customer-info-hooks">Customer info hooks</a></li>
<li><a href=https://docs.drupalcommerce.org/commerce1/developer-guide/core-architecture/info-hooks/line-item-info-hooks"">Line Item info hooks</a></li>
<li><a href="https://docs.drupalcommerce.org/commerce1/developer-guide/core-architecture/info-hooks/order-info-hooks">Order info hooks</a></li>

</ul>
