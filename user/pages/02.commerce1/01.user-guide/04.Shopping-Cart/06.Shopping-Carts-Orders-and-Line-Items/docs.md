---
title: Shopping Carts, Orders, and Line Items
taxonomy:
    category: docs
---

<div class="docs-enhanced">
<div class="screenshot">
    <a href="/user/pages/02.commerce1/01.user-guide/04.Shopping-Cart/06.Shopping-Carts-Orders-and-Line-Items/Cart-Order-LineItems-Shopping-Cart.png"><img
    src="/user/pages/02.commerce1/01.user-guide/04.Shopping-Cart/06.Shopping-Carts-Orders-and-Line-Items/Cart-Order-LineItems-Shopping-Cart.png" alt="Drupal
    Commerce Shopping Cart" /></a>
    <ul class="screenshot_breadcrumbs">
        <li class="first">Click "Add to Cart"</li>
        <li>Click "View Cart"</li>
        <li class="last">Arrive at /cart</li>
    </ul>
</div>
<p>Quick! What's the difference between a shopping cart, an order, and a line
item? The answer? Not much. A shopping cart is just a kind of an order and an
order is just a revisioned group of line items. How about we try that again with
less Commerce-jargon?</p>
<ul>
    <li><strong>Shopping Cart</strong> &ndash; Also sometimes called a basket,
    it's the listing of products your customers wants to buy at checkout.</li>
    <li><strong>Order</strong> &ndash; An order is a list of products with a
    status. In our case, a shopping cart is simply an order with a status of
    "Shopping Cart."</li>
    <li><strong>Line Item</strong> &ndash; Every product on the order is
    referenced by a record that includes quantity and a reference to which order
    it belongs. This record is known as a line item. There are other kinds of
    line items (like taxes, or discounts) but those don't really play that much
    of a role in a shopping cart.</li>
</ul>
<h2>Shopping Cart Overview</h2>
<div class="screenshot screenshot-caption">
    <div class="img">
        <a href="/user/pages/02.commerce1/01.user-guide/04.Shopping-Cart/06.Shopping-Carts-Orders-and-Line-Items/Cart-Order-LineItems-Order-Status.png"><img
        src="/user/pages/02.commerce1/01.user-guide/04.Shopping-Cart/06.Shopping-Carts-Orders-and-Line-Items/Cart-Order-LineItems-Order-Status.png" alt="Order
        Status for Shopping Carts" /></a>
    </div>
    <div class="caption">
        <p class="caption-title">Order with Status</p>
        <p>A shopping cart in Drupal Commerce is simply an order with a
        particular cart order status. In fact, almost everything in Drupal
        Commerce revolves around changing the order status.</p>
    </div>
    <ul class="screenshot_breadcrumbs">
        <li class="first">Administration</li>
        <li>Store</li>
        <li>View Orders</li>
        <li>Add / Edit Order</li>
        <li class="last">Order Status at Bottom</li>
    </ul>
</div>
<p> As soon as a product is added to the cart, an order is created and
associated with the customer either via user ID if logged in or via an array in
the session if not (commerce_cart_orders).</p>
<p>The shopping cart is totally optional, meaning checkout is implemented in a
separate module and will still function properly for orders created by the
administrator. This allows for sites to do invoicing and payment collection
where users shouldn't be allowed to create and manage their own orders via a
cart.</p>
<div class="screenshot screenshot-caption">
    <div class="img">
        <a href="/user/pages/02.commerce1/01.user-guide/04.Shopping-Cart/06.Shopping-Carts-Orders-and-Line-Items/Cart-Order-LineItems-Admin.png"><img
        src="/user/pages/02.commerce1/01.user-guide/04.Shopping-Cart/06.Shopping-Carts-Orders-and-Line-Items/Cart-Order-LineItems-Admin.png" alt="Administrative
        View for Shopping Carts" /></a>
    </div>
    <div class="caption">
        <p class="caption-title">Administrative View</p>
        <p>When you view all of the open shopping carts, it is possible that one
        customer has multiple open shopping carts.</p>
    </div>
    <ul class="screenshot_breadcrumbs">
        <li class="first">Administration</li>
        <li>Store</li>
        <li>View Orders</li>
        <li class="last">Click "Shopping Carts" in the upper right.</li>
    </ul>
</div>
<p>Each change to a shopping cart order is saved as a revision. A user can also
have more than one cart, though the default is to present the most recent
shopping cart to the user. <a
href="http://api.drupalcommerce.org/api/Drupal%20Commerce/sites%21all%21modules%21commerce%21modules%21cart%21commerce_cart.api.php/function/hook_commerce_cart_order_id/DC">hook_commerce_cart_order_id()</a>
can be used to
introduce alternate logic to the cart load process if necessary.</p>
<p><strong>Note:</strong> As long as the order is still in the shopping cart state, its line
items will be re-validated on load against the latest product prices /
availability, etc.</p>
<h2>Modifying a Line Item in Cart Using Rules</h2>
<p>This is an advanced action that involves Rules and setting values, but we
thought it was worth documenting seeing as how we've gotten lots of issues and
requests regarding this kind of functionality. For example, lets say you can
only buy Product A if Product B is not in the cart. You can make Drupal Commerce
understand this using Rules. We describe the recommended rule below.</p>
<div class="screenshot screenshot-caption">
    <div class="img">
        <a href="/user/pages/02.commerce1/01.user-guide/04.Shopping-Cart/06.Shopping-Carts-Orders-and-Line-Items/Cart-Order-LineItems-UnsetLineItem.png"><img
        src="/user/pages/02.commerce1/01.user-guide/04.Shopping-Cart/06.Shopping-Carts-Orders-and-Line-Items/Cart-Order-LineItems-UnsetLineItem.png" alt="Clone
        the unset price rule to set up your own rule with your own logic" /></a>
    </div>
    <div class="caption">
        <p class="caption-title">Unset Price Rule</p>
        <p>To remove an item from the cart using rules, you must unset the price
        of the line item during "Calculating the sell price of a product."
        Deleting a line item just involves leaving the price amount empty.</p>
    </div>
    <ul class="screenshot_breadcrumbs">
        <li class="first">Administration</li>
        <li>Store</li>
        <li>Configuration</li>
        <li>Produt Pricing Rules</li>
        <li class="last">Click "Clone"</li>
    </ul>
</div>
<p>To remove an item from the cart using rules, you must unset the price of the
line item during "Calculating the sell price of a product." This is similar to
the rule "Unset the price of disabled products in the cart" that is included
with core. So you can refer to that as an example. Deleting a line item just
involves setting the price to NULL (i.e. no value, not 0).</p>
<p>Thanks to ressa over at Drupal.org, we know we need to further clarify
our advice: "For those trying to remove a line item by entering an empty field,
and setting the price to NULL, you do it under 'Add action' -> 'Data' -> 'Set a
data value'. Under Data Selector, enter
'commerce-line-item:commerce-unit-price:amount' ... and just leave the 'Value'
field empty, don't actually type "NULL" :-)"</p>


<h2>Related Assets</h2>
<p>Are you looking for how to modify the cart block? Checkout our entire article
on <a href="/user-guide/modifying-shopping-cart-using-views">modifying the Shopping Cart block using views</a>.</p>
</div>