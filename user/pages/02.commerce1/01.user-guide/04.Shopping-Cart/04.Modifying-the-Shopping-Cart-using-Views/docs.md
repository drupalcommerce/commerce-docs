---
title: Modifying the Shopping Cart using Views
taxonomy:
    category: docs
---

<div class="docs-enhanced">
<p>Drupal's strength is that the modules work together. Imagine a world where
you can build the most amazing content lister. It could give you as much or even
more control than raw SQL. Now, imagine a world where an ecommerce platform
completely worked with that amazing content lister. We each have our focus and
leave the "annoying" stuff to the other guy. The end result is everything we can
do is pluggable and has more use cases than we can possibly imagine.</p>
<p><strong>That world exists.</strong> The content lister is called <a
href="http://dev.nodeone.se/en/taming-the-beast-learn-views-with-nodeone">Views</a>
and here we document how you can use Views to do just about anything with your
shopping cart or shopping basket.</p>
<h2>Shopping Cart Block and Page</h2>
<p>You would be tempted to think that the shopping cart block and the cart page
are from the same view with different displays. After all, that is a very common
pattern in Drupal. However for Drupal Commerce 1.x, Views 3.x was very much in
beta and to avoid forgotten bugs, the decision was made to make both the block
and the page separate views that only have a master display. This means, if you
want to edit either the block or the page, know that you must edit both
individually.</p>
<h3>Editing the Shopping Cart Block</h3>
<div class="screenshot screenshot-caption">
    <div class="img">
        <a href="/sites/default/files/docs/Cart-BlockandViews-HoverEditBlock.png"><img
        src="/sites/default/files/docs/Cart-BlockandViews-HoverEditBlock.png" alt="Click edit
        to configure the shopping cart block View" /></a>
    </div>
    <div class="caption">
        <p class="caption-title">Shopping Cart Config</p>
        <p>Navigate to any page and make sure to have an item in your shopping
        cart block. You can then hover over the table there, you will see in the
        upper right a link for "Edit view."</p>
    </div>
    <ul class="screenshot_breadcrumbs">
        <li class="first">Commerce Kickstart</li>
        <li>Add item to cart</li>
        <li class="last">Hover over shopping cart, click Edit</li>
    </ul>
</div>
<h3>Editing the Shopping Cart Page</h3>
<div class="screenshot screenshot-caption">
    <div class="img">
        <a href="/sites/default/files/docs/Cart-Anon2Auth-Views-ClickEdit.png"><img
        src="/sites/default/files/docs/Cart-Anon2Auth-Views-ClickEdit.png" alt="Click edit
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
<h3>What views looks like when you click edit.</h3>
<div class="screenshot">
    <a href="/sites/default/files/docs/Cart-BlockandViews-Overview.png"><img
    src="/sites/default/files/docs/Cart-BlockandViews-Overview.png" alt="Drupal
    Commerce Shopping Cart Block Views" /></a>
    <ul class="screenshot_breadcrumbs">
        <li class="first">Administration</li>
        <li>Structure</li>
        <li>Views</li>
        <li>commerce_cart_form</li>
        <li class="last">Click "Edit"</li>
    </ul>
    <ul class="screenshot_breadcrumbs">
        <li class="first">Or... Navigate to /cart</li>
        <li class="last">Hover over table and click "Edit"</li>
    </ul>
</div>
<h2>Creating a Shopping Cart from Scratch</h2>
<p>"Sometimes the best way to learn is to rebuild it." I imagine Tony Stark
would have said that at some point. Let's play the engineer and see how the
Commerce Guys were able to build a shopping cart in Views.</p>
<h3>Create a View</h3>
<div class="screenshot screenshot-caption">
    <div class="img">
        <a href="/sites/default/files/docs/Cart-BlockandViews-CreateView.png"><img
        src="/sites/default/files/docs/Cart-BlockandViews-CreateView.png" alt="Create a
        View block based on Commerce Order with Display Table" /></a>
    </div>
    <div class="caption">
        <p class="caption-title">Create a View</p>
        <p>Simply navigate to Structure, Views, Create a new View. Make your
        screen look like the one to the left and then click "Continue and
        Edit."</p>
    </div>
    <ul class="screenshot_breadcrumbs">
        <li class="first">Administration</li>
        <li>Structure</li>
        <li>Views</li>
        <li class="last">Add a New View</li>
    </ul>
</div>
<br />
<div class="screenshot screenshot-caption">
    <div class="img">
        <a href="/sites/default/files/docs/Cart-BlockandViews-Step1.png"><img
        src="/sites/default/files/docs/Cart-BlockandViews-Step1.png" alt="Add Commerce
        Order ID to Contextual Filters" /></a>
    </div>
    <div class="caption">
        <p class="caption-title">Contextual Filters</p>
        <p>The first bit of magic includes add a contextual filter in the
        advanced column. Click add and then search for "Order ID" and add that
        filter.</p>
    </div>
    <ul class="screenshot_breadcrumbs">
        <li class="first">Administration</li>
        <li>Structure</li>
        <li>Views</li>
        <li>new_shopping_cart</li>
        <li class="last">Edit</li>
    </ul>
</div>
<br />
<div class="screenshot screenshot-caption">
    <div class="img">
        <a href="/sites/default/files/docs/Cart-BlockandViews-Step1.5.png"><img
        src="/sites/default/files/docs/Cart-BlockandViews-Step1.5.png" alt="VERY IMPORTANT:
        Supply Default Value and choose current user's order ID" /></a>
    </div>
    <div class="caption">
        <p class="caption-title">Contextual Filters Config</p>
        <p>This is very important. When setting up the contextual filter, be
        sure to provide default value and select "Current user's cart order
        ID."</p>
    </div>
    <ul class="screenshot_breadcrumbs">
        <li class="first">Administration</li>
        <li>Structure</li>
        <li>Views</li>
        <li>new_shopping_cart</li>
        <li>Edit</li>
        <li class="last">Contextual Filters Edit</li>
    </ul>
</div>
<br />
<div class="screenshot screenshot-caption">
    <div class="img">
        <a href="/sites/default/files/docs/Cart-BlockandViews-Step2.png"><img
        src="/sites/default/files/docs/Cart-BlockandViews-Step2.png" alt="Add a
        relationship to Reference Line Item" /></a>
    </div>
    <div class="caption">
        <p class="caption-title">Relationship</p>
        <p>Add a relationship. Choose Referenced Line Item. Also select "require
        this relationship."</p>
    </div>
    <ul class="screenshot_breadcrumbs">
        <li class="first">Administration</li>
        <li>Structure</li>
        <li>Views</li>
        <li>new_shopping_cart</li>
        <li>Edit</li>
        <li class="last">Add Relationship</li>
    </ul>
</div>
<br />
<div class="screenshot screenshot-caption">
    <div class="img">
        <a href="/sites/default/files/docs/Cart-BlockandViews-Step3.png"><img
        src="/sites/default/files/docs/Cart-BlockandViews-Step3.png" alt="Add a field,
        search for title" /></a>
    </div>
    <div class="caption">
        <p class="caption-title">Fields</p>
        <p>When you add a field, simply start with the title. You could also add
        a new relationship to the referenced product and add product details.
        For our example, we added a product photo.</p>
    </div>
    <ul class="screenshot_breadcrumbs">
        <li class="first">Administration</li>
        <li>Structure</li>
        <li>Views</li>
        <li>new_shopping_cart</li>
        <li>Edit</li>
        <li class="last">Add Fields</li>
    </ul>
</div>
<br />
<div class="screenshot screenshot-caption">
    <div class="img">
        <a href="/sites/default/files/docs/Cart-BlockandViews-Step4.png"><img
        src="/sites/default/files/docs/Cart-BlockandViews-Step4.png" alt="Add a Footer called the Line Item Summary" /></a>
    </div>
    <div class="caption">
        <p class="caption-title">Footer</p>
        <p>Views 3 has a feature called "Area Handlers" and this is what
        powers the footer. Add a footer and you will see
        a Line Item Summary near the top. Add that and configure to
        your liking. We chose to show the Total and Checkout links.</p>
    </div>
    <ul class="screenshot_breadcrumbs">
        <li class="first">Administration</li>
        <li>Structure</li>
        <li>Views</li>
        <li>new_shopping_cart</li>
        <li>Edit</li>
        <li class="last">Add Footer</li>
    </ul>
</div>
<br />
<div class="screenshot screenshot-caption">
    <div class="img">
        <a href="/sites/default/files/docs/Cart-BlockandViews-Step4.5.png"><img
        src="/sites/default/files/docs/Cart-BlockandViews-Step4.5.png" alt="Add a filter to
        make sure you are only seeing products." /></a>
    </div>
    <div class="caption">
        <p class="caption-title">Filters</p>
        <p>Since line items can be anything from products, to shipping, to
        discounts, we want to make sure we are only showing products. Though
        there is a case where you might want to include other kinds of line
        items.</p>
    </div>
    <ul class="screenshot_breadcrumbs">
        <li class="first">Administration</li>
        <li>Structure</li>
        <li>Views</li>
        <li>new_shopping_cart</li>
        <li>Edit</li>
        <li class="last">Add Filter</li>
    </ul>
</div>
<br />
<div class="screenshot screenshot-caption">
    <div class="img">
        <a href="/sites/default/files/docs/Cart-BlockandViews-Step5.png"><img
        src="/sites/default/files/docs/Cart-BlockandViews-Step5.png" alt="Custom Shopping Cart Preview." /></a>
    </div>
    <div class="caption">
        <p class="caption-title">Views Preview</p>
        <p>Note that we have one item in our shopping cart while making this
        view. If you didn't have anything the preview would show something
        different.</p>
    </div>
    <ul class="screenshot_breadcrumbs">
        <li class="first">Administration</li>
        <li>Structure</li>
        <li>Views</li>
        <li>new_shopping_cart</li>
        <li>Edit</li>
        <li class="last">Preview at the Bottom.</li>
    </ul>
</div>
<br />
<div class="screenshot screenshot-caption">
    <div class="img">
        <a href="/sites/default/files/docs/Cart-BlockandViews-Step6.png"><img
        src="/sites/default/files/docs/Cart-BlockandViews-Step6.png" alt="Drag new block to
        a region of your choosing." /></a>
    </div>
    <div class="caption">
        <p class="caption-title">Blocks</p>
        <p>Save and Exit out of Views. Go to Structure > Blocks and drag your
        new block to a region of your choosing. For this example, it's going to
        Sidebar-First.</p>
    </div>
    <ul class="screenshot_breadcrumbs">
        <li class="first">Administration</li>
        <li>Structure</li>
        <li>Blocks</li>
        <li class="last">Drag Block to Region</li>
    </ul>
</div>
<br />
<div class="screenshot screenshot-caption">
    <div class="img">
        <a href="/sites/default/files/docs/Cart-BlockandViews-Step7.png"><img
        src="/sites/default/files/docs/Cart-BlockandViews-Step7.png" alt="Default Shopping
        Cart vs. New Custom Shopping Cart" /></a>
    </div>
    <div class="caption">
        <p class="caption-title">Final Result</p>
        <p>The final result is definitely custom. And hopefully this exercise
        has inspired you to work through and explore other kinds of shopping
        cart scenarios. For example, it would be possible to do what Amazon does
        and attach a view to this to show related products, etc.</p>
    </div>
</div>
</div>