---
title: Working with Cart Rules events
taxonomy:
    category: docs
---

The Cart modules defines Rules events and related hooks that let you react:

<ul>
<li>Before adding a product to the cart</li>
<li>After adding a product to the cart</li>
<li>After removing a product from the cart</li>
</ul>

The events that are triggered after adding and removing products from the cart receive a line item parameter that contains the full product line item that is being added or removed from the cart.  If you want to update this line item after it is added to the cart, such as to restrict its quantity to a maximum value via a custom Rule, then you are also responsible for saving the shopping order after making your changes so the order total can recalculate with the updated line item data.

The following exported Rule demonstrates restricting the quantity of all purchases on a site to 1 and using the <em>Save entity</em> action to ensure the order is saved with the updated line item data. This is important because initially the order total may be recalculated for a quantity greater than you want to allow if the customer has used the Add to Cart form multiple times for a restricted product.

<code>
{ "rules_restrict_quantity_1" : {
    "LABEL" : "Restrict quantity to 1",
    "PLUGIN" : "reaction rule",
    "REQUIRES" : [ "rules", "commerce_cart" ],
    "ON" : [ "commerce_cart_product_add" ],
    "IF" : [
      { "data_is" : {
          "data" : [ "commerce-line-item:quantity" ],
          "op" : "\u003e",
          "value" : "1"
        }
      }
    ],
    "DO" : [
      { "data_set" : { "data" : [ "commerce-line-item:quantity" ], "value" : "1" } },
      { "entity_save" : { "data" : [ "commerce-line-item:order" ] } }
    ]
  }
}
</code>

Note: the same workflow holds true for line item alterations based in modules implementing hook_commerce_cart_product_add().