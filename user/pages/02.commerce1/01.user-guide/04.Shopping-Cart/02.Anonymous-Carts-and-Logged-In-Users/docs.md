---
title: Anonymous Carts and Logged In Users
taxonomy:
    category: docs
---

<div class="docs-enhanced">
<p>There are many topics covered in this Drupal Commerce Anonymous Carts
article. The experience you want to give your customers can greatly depend on
how well you handle the Anonymous to Authenticated conversion process. Much of
this is automated, but there can be a few hang ups.</p>
<h2>Cart Conversion</h2>
<p>What happens when an anonymous customer finds a product and clicks "Add to
Cart?" An order is created for that customer's anonymous session. Like most
customers, they realize that logging in with their account can give them a
certain advantage during the checkout process. Perhaps they don't have to fill
out their customer profile information or perhaps they are a part of a "Free
Shipping" user role. What happens to their cart?</p>
<p>When anonymous users login to the site, if they have a shopping cart, that
order is moved to be a part of the authenticated session. Anonymous cart
conversion is that simple! To borrow from a certain hardware manufacturer, it
should just work. </p>
<h2>Hiding the Cart</h2>
<p>The methods described in this section show you how to hide the shopping carts
in various ways, but we do not describe how to keep users from purchasing
content if they are anonymous. That is a much more involved topic and possibly a
feature request for the <a
href="http://drupal.org/project/commerce_checkout_login">commerce_checkout_login
module</a>.</p>
<h3>Hide Shopping Cart Block from Anonymous</h3>
<p>In most cases, if you want the shopping cart to be hidden from anonymous
users, hiding the block is the easiest way to pull this off. Below are two
screenshots that will help you with this functionality. If you prefer the more
robust method of hiding the shopping cart using the Views interface, skip down
to that section below.</p>

<div class="screenshot screenshot-caption">
    <div class="img">
        <a href="/user/pages/02.commerce1/01.user-guide/04.Shopping-Cart/02.Anonymous-Carts-and-Logged-In-Users/Cart-Anon2Auth-Hide-Block.png"><img
        src="/user/pages/02.commerce1/01.user-guide/04.Shopping-Cart/02.Anonymous-Carts-and-Logged-In-Users/Cart-Anon2Auth-Hide-Block.png" alt="Configure
        Shopping Cart Block" /></a>
    </div>
    <div class="caption">
        <p class="caption-title">Shopping Cart Block</p>
        <p>Like all blocks in Drupal 7 with the core "<a
        href="http://drupal.org/documentation/modules/contextual">Contextual
        Links</a>" module turned on, you can simply hover over the shopping cart
        block and click "Configure block."</p>
    </div>
    <ul class="screenshot_breadcrumbs">
        <li class="first">Commerce Kickstart</li>
        <li>Front Page</li>
        <li class="last">Hover over Shopping Cart</li>
    </ul>
</div>

<div class="screenshot screenshot-caption">
    <div class="img">
        <a href="/user/pages/02.commerce1/01.user-guide/04.Shopping-Cart/02.Anonymous-Carts-and-Logged-In-Users/Cart-Anon2Auth-Hide-Block-2.png"><img
        src="/user/pages/02.commerce1/01.user-guide/04.Shopping-Cart/02.Anonymous-Carts-and-Logged-In-Users/Cart-Anon2Auth-Hide-Block-2.png" alt="Configure
        Visibility" /></a>
    </div>
    <div class="caption">
        <p class="caption-title">Configure Visibility</p>
        <p>Once the block configure screen is up you can scroll down to the
        Visibility Settings in the Vertical Tabs, Click on "Roles" and select
        "authenticated user."</p>
    </div>
    <ul class="screenshot_breadcrumbs">
        <li class="first">Administration</li>
        <li>Structure</li>
        <li>Block</li>
        <li>Manage</li>
        <li>commerce_cart</li>
        <li class="last">Configure</li>
    </ul>
</div>
<h3>Hide Shopping Cart from Anonymous using Views Permissions</h3>
<p>If you want to hide the /cart page, we have a very simple method that
requires editing a core View. Relax, that's why we use Views instead of our own
half-baked solutions. And think of it this way, if you edit your view and it
doesn't work out, you can always click "Revert" and everything will go back to
the fresh and shiny version that ships with Commerce.</p>
<div class="screenshot screenshot-caption">
    <div class="img">
        <a href="/user/pages/02.commerce1/01.user-guide/04.Shopping-Cart/02.Anonymous-Carts-and-Logged-In-Users/Cart-Anon2Auth-Views-ClickEdit.png"><img
        src="/user/pages/02.commerce1/01.user-guide/04.Shopping-Cart/02.Anonymous-Carts-and-Logged-In-Users/Cart-Anon2Auth-Views-ClickEdit.png" alt="Click edit
        to configure the shopping cart View" /></a>
    </div>
    <div class="caption">
        <p class="caption-title">Shopping Cart Config</p>
        <p>If you navigate to the Shopping cart page and hover over the table
        there, you will see in the upper right a link for "Edit view." Click
        that.</p>
    </div>
    <ul class="screenshot_breadcrumbs">
        <li class="first">Commerce Kickstart</li>
        <li class="last">Navigate to /cart</li>
    </ul>
</div>

<div class="screenshot screenshot-caption">
    <div class="img">
        <a href="/user/pages/02.commerce1/01.user-guide/04.Shopping-Cart/02.Anonymous-Carts-and-Logged-In-Users/Cart-Anon2Auth-Views-ClickAccess.png"><img
        src="/user/pages/02.commerce1/01.user-guide/04.Shopping-Cart/02.Anonymous-Carts-and-Logged-In-Users/Cart-Anon2Auth-Views-ClickAccess.png" alt="Click
        None under Access" /></a>
    </div>
    <div class="caption">
        <p class="caption-title">Access Controls</p>
        <p>When the view pops up, click on "Access: None"</p>
    </div>
    <ul class="screenshot_breadcrumbs">
        <li class="first">Administration</li>
        <li>Structure</li>
        <li>Views</li>
        <li>commerce_cart_form</li>
        <li class="last">Click "Edit"</li>
    </ul>
</div>

<div class="screenshot screenshot-caption">
    <div class="img">
        <a href="/user/pages/02.commerce1/01.user-guide/04.Shopping-Cart/02.Anonymous-Carts-and-Logged-In-Users/Cart-Anon2Auth-Views-AuthRole.png"><img
        src="/user/pages/02.commerce1/01.user-guide/04.Shopping-Cart/02.Anonymous-Carts-and-Logged-In-Users/Cart-Anon2Auth-Views-AuthRole.png" alt="Choose the
        authenticated role." /></a>
    </div>
    <div class="caption">
        <p class="caption-title">Access Options</p>
        <p>First, it will ask you what kind of access. We recommend User Roles.
        Then it will ask you which roles should be able to access this view, you
        can choose "Authenticated" to hide the shopping cart from anonymous
        users.</p>
    </div>
    <ul class="screenshot_breadcrumbs">
        <li class="first">Administration</li>
        <li>Structure</li>
        <li>Views</li>
        <li>commerce_cart_form</li>
        <li class="last">Click "Edit"</li>
    </ul>
</div>
<p>Be sure to click "Save" on the View and test your shopping cart for what an
anonymous user would experience.</p>
<h3>Hide Shopping Cart if nothing purchased</h3>
<p>Let's say you don't like the default "empty" shopping cart that appears in
the sidebar for Commerce Kickstart. There is a not-so-straightforward way to do this, so hang in there. The Shopping Cart Block that is enabled in the Commerce Kickstart project is actually setup in code. What we need to do is disable that block, create a new Views Block, and enable the Views block instead.</p>
<div class="screenshot screenshot-caption">
    <div class="img">
        <a href="/user/pages/02.commerce1/01.user-guide/04.Shopping-Cart/02.Anonymous-Carts-and-Logged-In-Users/Cart-Anon2Auth-Hide-Block.png"><img
        src="/user/pages/02.commerce1/01.user-guide/04.Shopping-Cart/02.Anonymous-Carts-and-Logged-In-Users/Cart-Anon2Auth-Hide-Block.png" alt="Configure
        Shopping Cart Block" /></a>
    </div>
    <div class="caption">
        <p class="caption-title">Shopping Cart Block</p>
        <p>Like all blocks in Drupal 7 with the core "<a
        href="http://drupal.org/documentation/modules/contextual">Contextual
        Links</a>" module turned on, you can simply hover over the shopping cart
        block and click "Configure block."</p>
    </div>
    <ul class="screenshot_breadcrumbs">
        <li class="first">Commerce Kickstart</li>
        <li>Front Page</li>
        <li class="last">Hover over Shopping Cart</li>
    </ul>
</div>

<div class="screenshot screenshot-caption">
    <div class="img">
        <a href="/user/pages/02.commerce1/01.user-guide/04.Shopping-Cart/02.Anonymous-Carts-and-Logged-In-Users/Cart-Anon2Auth-Block-Disable.png"><img
        src="/user/pages/02.commerce1/01.user-guide/04.Shopping-Cart/02.Anonymous-Carts-and-Logged-In-Users/Cart-Anon2Auth-Block-Disable.png" alt="Select None
        to remove the Shopping Cart from your theme." /></a>
    </div>
    <div class="caption">
        <p class="caption-title">Removing From Theme</p>
        <p>Select None to remove the Shopping Cart from your theme. We will
        enable a new block in just a second.</p>
    </div>
    <ul class="screenshot_breadcrumbs">
        <li class="first">Administration</li>
        <li>Structure</li>
        <li>Views</li>
        <li>commerce_cart_form</li>
        <li class="last">Click "Edit"</li>
    </ul>
</div>

<div class="screenshot screenshot-caption">
    <div class="img">
        <a href="/user/pages/02.commerce1/01.user-guide/04.Shopping-Cart/02.Anonymous-Carts-and-Logged-In-Users/Cart-Anon2Auth-Views-ClickEdit.png"><img
        src="/user/pages/02.commerce1/01.user-guide/04.Shopping-Cart/02.Anonymous-Carts-and-Logged-In-Users/Cart-Anon2Auth-Views-ClickEdit.png" alt="Click edit
        to configure the shopping cart View" /></a>
    </div>
    <div class="caption">
        <p class="caption-title">Shopping Cart Config</p>
        <p>If you navigate to the Shopping cart page and hover over the table
        there, you will see in the upper right a link for "Edit view." Click
        that.</p>
    </div>
    <ul class="screenshot_breadcrumbs">
        <li class="first">Commerce Kickstart</li>
        <li class="last">Navigate to /cart</li>
    </ul>
</div>

<div class="screenshot screenshot-caption">
    <div class="img">
        <a href="/user/pages/02.commerce1/01.user-guide/04.Shopping-Cart/02.Anonymous-Carts-and-Logged-In-Users/Cart-Anon2Auth-Views-AddBlock.png"><img
        src="/user/pages/02.commerce1/01.user-guide/04.Shopping-Cart/02.Anonymous-Carts-and-Logged-In-Users/Cart-Anon2Auth-Views-AddBlock.png" alt="Click Add
        Block" /></a>
    </div>
    <div class="caption">
        <p class="caption-title">Adding Views Block</p>
        <p>Instead of messing about with the View, we are simply going to create
        a block directly from Views. Don't forget to click "Save."</p>
    </div>
    <ul class="screenshot_breadcrumbs">
        <li class="first">Administration</li>
        <li>Structure</li>
        <li>Views</li>
        <li>commerce_cart_form</li>
        <li class="last">Click "Edit"</li>
    </ul>
</div>

<div class="screenshot screenshot-caption">
    <div class="img">
        <a href="/user/pages/02.commerce1/01.user-guide/04.Shopping-Cart/02.Anonymous-Carts-and-Logged-In-Users/Cart-Anon2Auth-Block-Enable.png"><img
        src="/user/pages/02.commerce1/01.user-guide/04.Shopping-Cart/02.Anonymous-Carts-and-Logged-In-Users/Cart-Anon2Auth-Block-Enable.png" alt="Click Configure to Enable your new block." /></a>
    </div>
    <div class="caption">
        <p class="caption-title">Enable new block</p>
        <p>Navigate to the Blocks administration screen and click configure next
        to "View: Shopping Cart Block." Enable it for any section on your site
        (sidebar-first to mimic Commerce Kickstart). And you're done!</p>
    </div>
    <ul class="screenshot_breadcrumbs">
        <li class="first">Administration</li>
        <li>Structure</li>
        <li class="last">Blocks</li>
    </ul>
</div>
<h2>Carts Expiration</h2>
<p>Old carts will remain indefinitely until they are checked out or manually
removed by administrators. Old cart orders can contain valuable information that
you may not want to erase before extracting the data for use particularly as
marketing research or contact information for follow-up sales contacts.</p>
<p>This can cause some confusion given the following scenario:</p>
<ol>
    <li>Authenticated user creates a cart, but logs out.</li>
    <li>Anonymous user re-creates their cart a few days later, and logs in.</li>
    <li>After checkout, the user is presented with their most recent cart which
    was the one they created in step 1.</li>
    <li>Worst case scenario is that the user thinks their checkout didn't happen
    and they go through it all again.</li>
</ol>
<p>In this case, you may find some nicely handled features in a contributed
module that can expire carts for you:
<a href="http://drupal.org/project/commerce_cart_expiration">commerce_cart_expiration</a>.</p>
<p>And a screencast on how to implement:</p>
<iframe src="http://player.vimeo.com/video/40541403?portrait=0" width="400" height="225" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
</div>