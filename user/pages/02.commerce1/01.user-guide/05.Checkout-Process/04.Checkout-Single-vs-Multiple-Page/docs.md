---
title: Checkout Single vs. Multiple Page
taxonomy:
    category: docs
---

<div class="docs-enhanced">
<p>The checkout form represents any of a number of checkout pages that are comprised of fieldsets (or container divs) called checkout panes. The normal progression through the checkout form goes from one non-empty checkout page to the next until the Completion page is reached.</p>
<p>The checkout form can safely be altered to suit your needs via the drag and drop checkout form builder. Existing checkout pages can be ignored by removing any checkout panes from them, and additional checkout pages can also be defined using hook_commerce_checkout_page_info().</p>
<p>The Payment page is solely used for the off-site payment redirect checkout pane. It is purely a point of departure and return for off-site payment methods and should not be used to hold any other checkout panes. This page contains no continue or back buttons, as such movement is meant to occur in conjunction with requests from the payment service.</p>
<p>Additionally, orders on this page of the checkout form will no longer be considered shopping carts so the total of the order does not change while the customer is submitting payment.</p>
<h2>Overview of screenshots</h2>
<div class="screenshot ">
    <a href="/sites/default/files/docs/Checkout-Pages-1.png">
        <img src="/sites/default/files/docs/Checkout-Pages-1.png" alt="Default Checkout Page" />
    </a>
</div>

<div class="screenshot ">
    <a href="/sites/default/files/docs/Checkout-Pages-2.png">
        <img src="/sites/default/files/docs/Checkout-Pages-2.png" alt="Example Payment" />
    </a>
</div>

<div class="screenshot ">
    <a href="/sites/default/files/docs/Checkout-Pages-2.png">
        <img src="/sites/default/files/docs/Checkout-Pages-3.png" alt="Checkout Complete Page" />
    </a>
</div>
</div>