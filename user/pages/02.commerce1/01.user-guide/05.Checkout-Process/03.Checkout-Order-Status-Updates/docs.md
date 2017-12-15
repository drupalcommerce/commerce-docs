---
title: Checkout Order Status Updates
taxonomy:
    category: docs
---

<div class="docs-enhanced">
<div class="screenshot">
    <a href="/sites/default/files/docs/Checkout-Order-Default-Status.png">
        <img src="/sites/default/files/docs/Checkout-Order-Default-Status.png" alt="Default Drupal Commerce Order Statuses" />
    </a>
    <ul class="screenshot_breadcrumbs">
        <li class="first">Administration</li>
        <li>Store</li>
        <li>Configuration</li>
        <li>Orders</li>
        <li class="last">Add Order</li>
    </ul>
</div>
<p>As customers progress through checkout, their cart orders are continually being updated. This makes the checkout form act as a multi-step order edit form with the end result being a fully formed order that is ready for fulfillment or completion.</p>

<p>In addition to customer data being saved to the order, the order status is also updated to reflect its current place in the checkout process. The checkout router uses the order status to determine a customer's access to visit a requested checkout page for a particular order.</p>
<p>Upon checkout completion, the <em>Completing the checkout process</em> event/hook is invoked, allowing you to affect what happens to orders and what sort of communication needs to occur on checkout completion.</p>
<div class="screenshot">
    <a href="/sites/default/files/docs/Checkout-Order-When-Order-is-Paid.png">
        <img src="/sites/default/files/docs/Checkout-Order-When-Order-is-Paid.png" alt="Select this if you need an event to trigger after payment." />
    </a>
    <ul class="screenshot_breadcrumbs">
        <li class="first">Administration</li>
        <li>Configuration</li>
        <li>Workflow: Rules</li>
        <li>Add New Rule</li>
        <li class="last">Add Event</li>
    </ul>
</div>
<p><strong>Note</strong> &mdash; There is a more reliable event called <em>When an order is first paid in full</em> that should be used to update or process an order based on payment. Checkout can complete with payment still pending, so it is best not to mark orders completed on the basis of checkout completion alone.</p>
<div class="screenshot">
    <a href="/sites/default/files/docs/Checkout-Order-Default-Rules.png">
        <img src="/sites/default/files/docs/Checkout-Order-Default-Rules.png" alt="Default Drupal Commerce Rules" />
    </a>
    <ul class="screenshot_breadcrumbs">
        <li class="first">Administration</li>
        <li>Store</li>
        <li>Configuration</li>
        <li>Checkout settings</li>
        <li class="last">Checkout Rules</li>
    </ul>
</div>
<p>By default Drupal Commerce executes the following checkout completion rules:</p>
<ol>
    <li>Update the order status on checkout completion.</li>
    <li>Assign an anonymous order to a pre-existing user. Or...</li>
    <li>Create a new account for an anonymous order.</li>
    <li>Send an order notification e-mail.</li>
</ol>

<p>The Pending order status simply means that the order is now out of the customer's hands and in yours. You don't need to use this status at all if you don't need it, but the basic idea is that orders first appear to you and the customer as Pending until you acknowledge them and begin Processing them. Once fulfillment occurs or payment is complete for orders that require no additional fulfillment, orders can then be considered Completed.</p>
</div>