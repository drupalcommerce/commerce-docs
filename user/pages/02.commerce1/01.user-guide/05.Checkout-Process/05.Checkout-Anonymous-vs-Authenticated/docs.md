---
title: Checkout: Anonymous vs. Authenticated
taxonomy:
    category: docs
---

<div class="docs-enhanced">
<p>Customers to your store are not required to be logged in (authenticated) or anonymous. To setup your site to always be anonymous, you would only have to delete the two rules mentioned here:</p>

<div class="screenshot screenshot-caption">
    <div class="img">
        <a href="/user/pages/02.commerce1/01.user-guide/05.Checkout-Process/05.Checkout-Anonymous-vs-Authenticated/Checkout-Anon-Auth-1.png">
            <img src="/user/pages/02.commerce1/01.user-guide/05.Checkout-Process/05.Checkout-Anonymous-vs-Authenticated/Checkout-Anon-Auth-1.png" alt="Anonymous Rules" />
        </a>
    </div>
    <div class="caption">
        <p class="caption-title">Account Creation Rules</p>
        <p>Disabling these rules would mean the users can't login to see their Orders, but would have absolutely no side affect to being able to purchase items, etc.</p>
    </div>
</div>

<p>What is the difference between an authenticated and anonymous checkout?</p>
<p>There is not much. Both authenticated and anonymous users will still have to fill out any information required by customer profiles. Customer profiles are not user profiles (multiple data fields per user), they are uniquely assigned to each order (multiple data fields per order). This allows the same customer to have multiple addresses for each order and other types of situations. But this does cause a bit of confusion as the user expects their address to appear if they are logged in.</p>
<p>If you are curious as to what happens with anonymous users, you can checkout the following screens and read through each rule.</p>

<div class="screenshot screenshot-caption">
    <div class="img">
        <a href="/user/pages/02.commerce1/01.user-guide/05.Checkout-Process/05.Checkout-Anonymous-vs-Authenticated/Checkout-Anon-Auth-1.png">
            <img src="/user/pages/02.commerce1/01.user-guide/05.Checkout-Process/05.Checkout-Anonymous-vs-Authenticated/Checkout-Anon-Auth-1.png" alt="Anonymous Rules" />
        </a>
    </div>
    <div class="caption">
        <p class="caption-title">Anonymous Rules</p>
        <p>The rules you see here can be found by going to the Store Configuration screen and selecting "Checkout Settings" and then selecting "Checkout Rules." This kind of functionality is usually handled by an obscure bit of code and an interface that can be very limiting. Instead, here we use Rules to not only make the store work as expected, but also give the site builder the tools to modify this process as needed.</p>
    </div>
</div>

<div class="screenshot screenshot-caption">
    <div class="img">
        <a href="/user/pages/02.commerce1/01.user-guide/05.Checkout-Process/05.Checkout-Anonymous-vs-Authenticated/Checkout-Anon-Auth-2.png">
            <img src="/user/pages/02.commerce1/01.user-guide/05.Checkout-Process/05.Checkout-Anonymous-vs-Authenticated/Checkout-Anon-Auth-2.png" alt="The first rule we are looking at has a simple job: If the new user already exists, assign the order to the user that already exists. Imagine business logic that requires this user supply a password to merge these two accounts. Lots of possibilities with this rule exposed." />
        </a>
    </div>
    <div class="caption">
        <p class="caption-title">Merge Account Rule</p>
        <p>The first rule we are looking at has a simple job: If the new user already exists, assign the order to the user that already exists. Imagine business logic that requires this user supply a password to merge these two accounts. Lots of possibilities with this rule exposed.</p>
    </div>
</div>

<div class="screenshot screenshot-caption">
    <div class="img">
        <a href="/user/pages/02.commerce1/01.user-guide/05.Checkout-Process/05.Checkout-Anonymous-vs-Authenticated/Checkout-Anon-Auth-3.png">
            <img src="/user/pages/02.commerce1/01.user-guide/05.Checkout-Process/05.Checkout-Anonymous-vs-Authenticated/Checkout-Anon-Auth-3.png" alt="New Account Rule" />
        </a>
    </div>
    <div class="caption">
        <p class="caption-title">New Account Rule</p>
        <p>The final anonymous checkout rule deals with creating a new user for anonymous accounts. In here you could add an email notification with a link to reset their password and verify their new account.</p>
    </div>
</div>
<h2>How does checking out work with address information?</h2>
<p>Customer information collected for orders on separate entities called customer profiles that are associated with the order through customer profile reference fields. By default the Billing information customer profile type just includes an address field, but it can be edited through the field interface to include any additional fields you require. These fields will automatically be visible on the related checkout pane for the customer profile.</p>
<p>Some modules define additional customer profile types, such as the Shipping information customer profile type defined in the <a href="http://drupal.org/project/commerce_shipping">Commerce Shipping</a> module.</p>
<p>During a default checkout process, customers cannot reuse previously created customer profiles. A new customer profile will be saved each time, though modules like <a href="http://drupal.org/project/commerce_addressbook">Commerce Addressbook</a> bring simple and elegant solutions to help save your customers time.</p>
</div>