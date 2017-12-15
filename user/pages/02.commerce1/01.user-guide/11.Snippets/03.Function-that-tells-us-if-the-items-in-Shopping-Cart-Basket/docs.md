---
title: Function that tells us if the items in Shopping Cart / Basket
taxonomy:
    category: docs
---

<?php
// Provided by stevetook in the forums.
function items_on_cart() {
  global $user;
  $cart = commerce_cart_order_load($user->uid); 
  $line_items = count($cart->commerce_line_items) ? TRUE : FALSE;
  return $line_items;
}
?>