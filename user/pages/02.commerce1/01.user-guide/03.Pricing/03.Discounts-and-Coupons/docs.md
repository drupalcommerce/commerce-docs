---
title: Discounts and Coupons
taxonomy:
    category: docs
---

<div class="docs-enhanced">
<p>The core product pricing system is great for flat / percentage discounts of products on the site and for alternate price lists. Special offers, such as "Buy one get one free," are not supported in Drupal Commerce core. They depend on the creation and management of alternate line items (e.g. one line item for the paid product and another for the free product).</p>
<p>Drupal Commerce's sell price pre-calculation mechanism limits what types of data you can access in the conditions and actions of product pricing rules. Very few sites actually make use of this functionality, but the gist of it is your conditions cannot use data specific to the product (i.e. product type or SKU) and your actions can only use data specific to the product (i.e. not the day of the week or user roles).</p>
<p>Even with those limitations, it is still possible to create quite complex pricing scenarios. One Drupal Commerce site currently uses approximately 1500+ Rules!</p>
<p><strong>Note about Coupons.</strong> Using Drupal Commerce Core, it is very possible to allow users to add coupons via line item (when someone clicks an add to cart link) or via Checkout. To do the checkout method, you can follow the same principles as outlined in our "Simple Coupon" exercise, however you will need to add the field to your Order type via code and expose it on the checkout pane using <a href="http://drupal.org/project/commerce_fieldgroup_panes">Commerce Fieldgroup Panes</a>.</p>
<h2>Administrator's Special</h2>
<div class="screenshot">
    <a href="#">
        <img src="Price-Calc-step10.png" alt="Administrators see the discount" />
    </a>
    <ul class="screenshot_breadcrumbs">
        <li class="first">Administration</li>
        <li>Store</li>
        <li>Products</li>
        <li>Product Types</li>
        <li>Manage Display</li>
        <li class="last">Edit Price</li>
    </ul>
</div>
<p>In the <a href="Price-Calc.html">Price Calculations article</a>, we went over how to create a conditional discount for a user role.</p>
<h2 id="simplecoupon">Simple Coupon Code per Line Item</h2>
<p>Add a coupon code textfield to the product line item type. Create a Rule that looks for this value and applies a discount based on the code entered.</p>

<div class="screenshot screenshot-caption">
    <div class="img">
        <a href="/user/pages/02.commerce1/01.01.user-guide/03.Pricing/03.Discounts-and-Coupons/Price-Coupon-01.png">
            <img src="/user/pages/02.commerce1/01.01.user-guide/03.Pricing/03.Discounts-and-Coupons/Price-Coupon-01.png" alt="We're going to add a coupon field to the default Line Item Type." />
            </a>
     </div>


<div class="caption">
        <p class="caption-title">Store Configuration</p>
        <p>To start with, we will navigate to the Store Configuration Screen and click "Line Item Types." In order to add a discount to our line items, we need to add a field.</p>
    </div>
<ul class="screenshot_breadcrumbs">
        <li class="first">Administration</li>
        <li>Store</li>
        <li class="last">Configuration</li>
    </ul>
</div>


<div class="screenshot screenshot-caption">
    <div class="img">
        <a href="/user/pages/02.commerce1/01.01.user-guide/03.Pricing/03.Discounts-and-Coupons/Price-Coupon-02.png">
            <img src="/user/pages/02.commerce1/01.01.user-guide/03.Pricing/03.Discounts-and-Coupons/Price-Coupon-02.png" alt="Add field to Line Item." />
            </a>
     </div>


<div class="caption">
        <p class="caption-title">Line Item Types</p>
        <p>Add field to Line Item</p>
    </div>
<ul class="screenshot_breadcrumbs">
        <li class="first">Administration</li>
        <li>Store</li>
        <li>Configuration</li>
        <li class="last">Line Item Types</li>
    </ul>
</div>


<div class="screenshot screenshot-caption">
    <div class="img">
        <a href="/user/pages/02.commerce1/01.user-guide/03.Pricing/03.Discounts-and-Coupons/Price-Coupon-03.png">
            <img src="/user/pages/02.commerce1/01.user-guide/03.Pricing/03.Discounts-and-Coupons/Price-Coupon-03.png" alt="We're adding a coupon field here." />
            </a>
     </div>



<div class="caption">
        <p class="caption-title">Add Field</p>
        <p>We're adding a text field in the manage fields screen for our custom line type. If you want to be able to create unique line item types, there is a great contributed module for that called: <a href="http://drupal.org/project/commerce_custom_product">Commerce Customizable Products</a>.</p>
    </div>
<ul class="screenshot_breadcrumbs">
        <li class="first">Administration</li>
        <li>Store</li>
        <li>Configuration</li>
        <li>Line Item Types</li>
        <li class="last">Manage Fields</li>
    </ul>
</div>

![Any additional field that you want to be configurable before clicking Add to Cart needs to be enabled here.](Price-Coupon-04.png)
    <div class="caption">
        <p class="caption-title">Field Configuration</p>
        <p>This is the screen you will see after clicking "Continue" when you've "Added" a field. Make sure you configure the "Add to Cart" settings correctly, or you will not be able to edit this field before adding the product to cart.</p>
        <p>Any additional field that you want to be configurable before clicking Add to Cart needs to be enabled here.</p>
        <p>The idea is that the customer would add a coupon before checkout.</p>
    </div>
    <ul class="screenshot_breadcrumbs">
        <li class="first">Administration</li>
        <li>Store</li>
        <li>Configuration</li>
        <li>Line Item Types</li>
        <li>Manage Fields</li>
        <li class="last">Field Configuration</li>
    </ul>
</div>

<div class="screenshot screenshot-caption">
    <div class="img">
        <a href="/user/pages/02.commerce1/01.user-guide/03.Pricing/03.Discounts-and-Coupons/Price-Coupon-05.png">
            <img src="/user/pages/02.commerce1/01.user-guide/03.Pricing/03.Discounts-and-Coupons/Price-Coupon-05.png" alt="This is what the Coupon Code field should look like on an add to cart form." />
        </a>
    </div>
<div class="caption">
        <p class="caption-title">Add to Cart Preview</p>
        <p>This is what the Coupon Code field should look like on an add to cart form.</p>
    </div>
<ul class="screenshot_breadcrumbs">
        <li class="first">Commerce Kickstart</li>
        <li>Add a Product to your cart</li>
        <li class="last">Add to Cart Preview</li>
    </ul>
</div>

<div class="screenshot screenshot-caption">
    <div class="img">
        <a href="/user/pages/02.commerce1/01.user-guide/03.Pricing/03.Discounts-and-Coupons/Price-Coupon-06.png">
            <img src="/user/pages/02.commerce1/01.user-guide/03.Pricing/03.Discounts-and-Coupons/Price-Coupon-06.png" alt="Go ahead and add a product to your cart, then click View Cart and then click edit view as shown here." />
        </a>
    </div>


<div class="caption">
        <p class="caption-title">Edit View</p>
        <p>Go ahead and add a product to your cart, then click View Cart and then click edit view as shown here.</p>
    </div>
<ul class="screenshot_breadcrumbs">
        <li class="first">Commerce Kickstart</li>
        <li>Add a Product to your cart</li>
        <li>Click "View Cart"</li>
        <li class="last">Click "Edit View"</li>
    </ul>
</div>

<div class="screenshot screenshot-caption">
    <div class="img">
        <a href="/user/pages/02.commerce1/01.01.user-guide/03.Pricing/03.Discounts-and-Coupons/Price-Coupon-07.png">
            <img src="/user/pages/02.commerce1/01.01.user-guide/03.Pricing/03.Discounts-and-Coupons/Price-Coupon-07.png" alt="Add our coupon field." />
            </a>
     </div>



<div class="caption">
        <p class="caption-title">Add Field</p>
        <p>In order to view our coupon on the shopping cart, we will add the field. Same could be done with the checkout views and/or Shopping Cart block.</p>
    </div>
<ul class="screenshot_breadcrumbs">
        <li class="first">Administration</li>
        <li>Structure</li>
        <li>Views</li>
        <li>Edit Shopping Cart</li>
        <li class="last">Click "Add" next to Fields</li>
    </ul>
</div>


<div class="screenshot screenshot-caption">
    <div class="img">
        <a href="/user/pages/02.commerce1/01.01.user-guide/03.Pricing/03.Discounts-and-Coupons/Price-Coupon-08.png">
            <img src="/user/pages/02.commerce1/01.01.user-guide/03.Pricing/03.Discounts-and-Coupons/Price-Coupon-08.png" alt="Add Components" />
            </a>
     </div>


</div>

<div class="screenshot screenshot-caption">
    <div class="img">
        <a href="/user/pages/02.commerce1/01.01.user-guide/03.Pricing/03.Discounts-and-Coupons/Price-Coupon-09.png">
            <img src="/user/pages/02.commerce1/01.01.user-guide/03.Pricing/03.Discounts-and-Coupons/Price-Coupon-09.png" alt="Our new cart." />
            </a>
     </div>
</div>

<div class="screenshot screenshot-caption">
    <div class="img">
        <a href="/user/pages/02.commerce1/01.01.user-guide/03.Pricing/03.Discounts-and-Coupons/Price-Coupon-10.png">
            <img src="/user/pages/02.commerce1/01.01.user-guide/03.Pricing/03.Discounts-and-Coupons/Price-Coupon-10.png" alt="Adding a new Product Pricing Rule." />
            </a>
     </div>

<div class="caption">
        <p class="caption-title">Product Price Rule</p>
        <p>Adding a new Product Pricing Rule.</p>
    </div>
<ul class="screenshot_breadcrumbs">
        <li class="first">Administration</li>
        <li>Store</li>
        <li>Configuration</li>
        <li class="last">Product Pricing Rules</li>
    </ul>
</div>

<div class="screenshot screenshot-caption">
    <div class="img">
        <a href="/user/pages/02.commerce1/01.01.user-guide/03.Pricing/03.Discounts-and-Coupons/Price-Coupon-11.png">
            <img src="/user/pages/02.commerce1/01.01.user-guide/03.Pricing/03.Discounts-and-Coupons/Price-Coupon-11.png" alt="Make up a pricing rule." />
            </a>
     </div>

<div class="caption">
        <p class="caption-title">Add Price Rule</p>
        <p>Make up a pricing rule name on this form. Mostly showing this screen so people don't get too confused with all of this jumping around.</p>
    </div>
<ul class="screenshot_breadcrumbs">
        <li class="first">Administration</li>
        <li>Store</li>
        <li>Configuration</li>
        <li>Product Pricing Rules</li>
        <li class="last">Add Price Rule</li>
    </ul>
</div>

<div class="screenshot screenshot-caption">
    <div class="img">
        <a href="/user/pages/02.commerce1/01.01.user-guide/03.Pricing/03.Discounts-and-Coupons/Price-Coupon-12.png">
            <img src="/user/pages/02.commerce1/01.01.user-guide/03.Pricing/03.Discounts-and-Coupons/Price-Coupon-12.png" alt="This is where we will be spending the next few minutes. Hang in there, it's pretty easy." />
            </a>
     </div>



<div class="caption">
        <p class="caption-title">Editing Rule</p>
        <p>This is where we will be spending the next few minutes. The plan is to add two conditions, separated by an "And" and finally add an action that applies the discount.</p>
    </div>
<ul class="screenshot_breadcrumbs">
        <li class="first">Administration</li>
        <li>Store</li>
        <li>Configuration</li>
        <li>Product Pricing Rules</li>
        <li class="last">Rule Overview</li>
    </ul>
</div>

<div class="screenshot screenshot-caption">
    <div class="img">
        <a href="/user/pages/02.commerce1/01.01.user-guide/03.Pricing/03.Discounts-and-Coupons/Price-Coupon-13.png">
            <img src="/user/pages/02.commerce1/01.01.user-guide/03.Pricing/03.Discounts-and-Coupons/Price-Coupon-13.png" alt="First, add a condition for our new field." />
            </a>
     </div>

<div class="caption">
        <p class="caption-title">Add Condition</p>
        <p>First, add a condition for our new field called "Entity has field." This is a critical step to making that field available in our next condition. Do not skip this step.</p>
    </div>
<ul class="screenshot_breadcrumbs">
        <li class="first">Administration</li>
        <li>Store</li>
        <li>Configuration</li>
        <li>Product Pricing Rules</li>
        <li>Edit Rule</li>
        <li class="last">Add Condition</li>
    </ul>
</div>

<div class="screenshot screenshot-caption">
    <div class="img">
        <a href="/user/pages/02.commerce1/01.01.user-guide/03.Pricing/03.Discounts-and-Coupons/Price-Coupon-14.png">
            <img src="/user/pages/02.commerce1/01.01.user-guide/03.Pricing/03.Discounts-and-Coupons/Price-Coupon-14.png" alt="For this condition, we need the commerce-line-item data selector and our new field." />
            </a>
     </div>

<div class="caption">
        <p class="caption-title">Configure Condition</p>
        <p>For this condition, we need the commerce-line-item data selector and our new field.</p>
    </div>
<ul class="screenshot_breadcrumbs">
        <li class="first">Administration</li>
        <li>Store</li>
        <li>Configuration</li>
        <li>Product Pricing Rules</li>
        <li>Edit Rule</li>
        <li class="last">Configure Condition</li>
    </ul>
</div>

<div class="screenshot screenshot-caption">
    <div class="img">
        <a href="/user/pages/02.commerce1/01.01.user-guide/03.Pricing/03.Discounts-and-Coupons/Price-Coupon-15.png">
            <img src="/user/pages/02.commerce1/01.01.user-guide/03.Pricing/03.Discounts-and-Coupons/Price-Coupon-15.png" alt="Next, add and to require our final data comparison condition." />
            </a>
     </div>


<div class="caption">
        <p class="caption-title">Add And Condition</p>
        <p>Next, add and to require our final data comparison condition. This is required to force both conditions.</p>
    </div>
<ul class="screenshot_breadcrumbs">
        <li class="first">Administration</li>
        <li>Store</li>
        <li>Configuration</li>
        <li>Product Pricing Rules</li>
        <li>Edit Rule</li>
        <li class="last">Add "And" Condition</li>
    </ul>
</div>

<div class="screenshot screenshot-caption">
    <div class="img">
        <a href="/user/pages/02.commerce1/01.01.user-guide/03.Pricing/03.Discounts-and-Coupons/Price-Coupon-16.png">
            <img src="/user/pages/02.commerce1/01.01.user-guide/03.Pricing/03.Discounts-and-Coupons/Price-Coupon-16.png" alt="Now lets add data comparison condition." />
            </a>
     </div>


<div class="caption">
        <p class="caption-title">Add Data Comparison</p>
        <p>For our final condition, click "Add condition" and select "Data comparison."</p>
    </div>
<ul class="screenshot_breadcrumbs">
        <li class="first">Administration</li>
        <li>Store</li>
        <li>Configuration</li>
        <li>Product Pricing Rules</li>
        <li>Edit Rule</li>
        <li class="last">Add Data Compairson</li>
    </ul>
</div>

<div class="screenshot screenshot-caption">
    <div class="img">
        <a href="/user/pages/02.commerce1/01.01.user-guide/03.Pricing/03.Discounts-and-Coupons/Price-Coupon-17.png">
            <img src="/user/pages/02.commerce1/01.01.user-guide/03.Pricing/03.Discounts-and-Coupons/Price-Coupon-17.png" alt="Find our new field." />
            </a>
     </div>


<div class="caption">
        <p class="caption-title">Configure Condition</p>
        <p>Find our new field, called something like "commerce-line-item:field-xxx."</p>
    </div>
<ul class="screenshot_breadcrumbs">
        <li class="first">Administration</li>
        <li>Store</li>
        <li>Configuration</li>
        <li>Product Pricing Rules</li>
        <li>Edit Rule</li>
        <li class="last">Configure Condition</li>
    </ul>
</div>

<div class="screenshot screenshot-caption">
    <div class="img">
        <a href="/user/pages/02.commerce1/01.01.user-guide/03.Pricing/03.Discounts-and-Coupons/Price-Coupon-18.png">
            <img src="/user/pages/02.commerce1/01.01.user-guide/03.Pricing/03.Discounts-and-Coupons/Price-Coupon-18.png" alt="Adding the coupon code here." />
            </a>
     </div>


<div class="caption">
        <p class="caption-title">Configure Condition</p>
        <p>This is part of the magic. I'm setting my coupon code to be an arbitrary four digit number, but you could set it to just about anything that a person could type into their field. You could even potentially be a bit more creative here. This could be a role that a user has or perhaps a previously visited page.</p>
    </div>
<ul class="screenshot_breadcrumbs">
        <li class="first">Administration</li>
        <li>Store</li>
        <li>Configuration</li>
        <li>Product Pricing Rules</li>
        <li>Edit Rule</li>
        <li class="last">Configure Condition</li>
    </ul>
</div>

<div class="screenshot screenshot-caption">
    <div class="img">
        <a href="/user/pages/02.commerce1/01.01.user-guide/03.Pricing/03.Discounts-and-Coupons/Price-Coupon-19.png">
            <img src="/user/pages/02.commerce1/01.01.user-guide/03.Pricing/03.Discounts-and-Coupons/Price-Coupon-19.png" alt="Add discount action." />
            </a>
     </div>


<div class="caption">
        <p class="caption-title">Add Action</p>
        <p>Add discount action. For this action, we chose the "Multiply the unit price by some amount" underneath the "Commerce Line Item." Next screen is configuration settings.</p>
    </div>
<ul class="screenshot_breadcrumbs">
        <li class="first">Administration</li>
        <li>Store</li>
        <li>Configuration</li>
        <li>Product Pricing Rules</li>
        <li>Edit Rule</li>
        <li class="last">Add Action</li>
    </ul>
</div>

    
<div class="screenshot screenshot-caption">
    <div class="img">
        <a href="/user/pages/02.commerce1/01.01.user-guide/03.Pricing/03.Discounts-and-Coupons/Price-Coupon-20.png">
            <img src="/user/pages/02.commerce1/01.01.user-guide/03.Pricing/03.Discounts-and-Coupons/Price-Coupon-20.png" alt="Be sure to set multiply value and change component type to discount." />
            </a>
     </div>


<div class="caption">
        <p class="caption-title">Configure Action</p>
        <p>Be sure to set multiply value and change component type to discount. There is a lot to learn about <a href="Price-Components.html">Price Component Types</a> if you are interested.</p>
    </div>
<ul class="screenshot_breadcrumbs">
        <li class="first">Administration</li>
        <li>Store</li>
        <li>Configuration</li>
        <li>Product Pricing Rules</li>
        <li>Edit Rule</li>
        <li class="last">Configure Action</li>
    </ul>
</div>


<div class="screenshot screenshot-caption">
    <div class="img">
        <a href="/user/pages/02.commerce1/01.01.user-guide/03.Pricing/03.Discounts-and-Coupons/Price-Coupon-21.png">
            <img src="/user/pages/02.commerce1/01.01.user-guide/03.Pricing/03.Discounts-and-Coupons/Price-Coupon-21.png" alt="Final Shopping Cart using our new coupon rule" />
            </a>
     </div>


<div class="caption">
        <p class="caption-title">Final Cart</p>
        <p>Final Shopping Cart using our new coupon rule.</p>
    </div>
<ul class="screenshot_breadcrumbs">
        <li class="first">Commerce Kickstart</li>
        <li>View /cart</li>
        <li class="last">Final Cart</li>
    </ul>
</div>
</div>