---
title: Configuring / Creating Customer Profiles
taxonomy:
    category: docs
---

<div class="docs-enhanced">
<p>Customer information is collected for orders on separate entities called customer profiles that
are associated with the order through customer profile reference fields. By default the Billing
information customer profile type just includes an address field, but it can be edited through
the field interface to include any additional fields you require. These fields will automatically be
visible on the related checkout pane for the customer profile.</p>
<p>Some modules define additional customer profile types, such as the Shipping information
customer profile type defined in the Commerce Shipping module.</p>
<p>During a default checkout process, customers cannot reuse previously created customer
profiles. A new customer profile will be saved each time, though modules like Commerce
Addressbook seek to alleviate this problem with a nice UI. Customer profiles edited through the
back-end UI may also result in duplicate customer profiles being saved to avoid the loss of data
when a customer profile is edited that has been referenced by a previous order.</p>
<h2>Adding and Editing a Customer Profile Field</h2>
<p>We're going to do the following: Add a custom field to the Billing information customer profile type, such as phone
number, and complete checkout with the new field. After completing checkout, go edit
the newly created customer profile and save it to view the resulting message.</p>
<div class="screenshot screenshot-caption">
    <div class="img">
        <a href="/sites/default/files/docs/Profile-Admin-1.png">
            <img src="/sites/default/files/docs/Profile-Admin-1.png" alt="Go to Store, then click Customer Profiles." />
        </a>
    </div>
    <div class="caption">
        <p class="caption-title">Navigate to Store</p>
        <p>Customer Profiles are a top-level configuration option in your store. Use this screenshot to help you find it.</p>
    </div>
    <ul class="screenshot_breadcrumbs">
        <li class="first">Administration</li>
        <li class="last">Store</li>
    </ul>
</div>

<div class="screenshot screenshot-caption">
    <div class="img">
        <a href="/sites/default/files/docs/Profile-Admin-2.png">
            <img src="/sites/default/files/docs/Profile-Admin-2.png" alt="Let's add phone number" />
        </a>
    </div>
    <div class="caption">
        <p class="caption-title">Click Manage Fields</p>
        <p>The first tab you will find yourself on is the "List" tab. That will show you all of the available customer profiles. If you click "Profile Types" in the upper right, you will see all of your profile types (similar to content types for nodes). If you have installed Shipping, that includes a new profile type. Click Manage Fields to add a phone number.</p>
    </div>
    <ul class="screenshot_breadcrumbs">
        <li class="first">Administration</li>
        <li>Store</li>
        <li>Customer profiles</li>
        <li class="last">Profile Types</li>
    </ul>
</div>

<div class="screenshot screenshot-caption">
    <div class="img">
        <a href="/sites/default/files/docs/Profile-Admin-3.png">
            <img src="/sites/default/files/docs/Profile-Admin-3.png" alt="Add a Field" />
        </a>
    </div>
    <div class="caption">
        <p class="caption-title">Add a Field</p>
        <p>Just like any other Drupal interface, you can add any fields you would like to your customer profiles. For this example, we're just going to use the built-in text field, but you could add the <a href="http://drupal.org/project/phone">phone field module</a> and have access to phone number validation.</p>
    </div>
    <ul class="screenshot_breadcrumbs">
        <li class="first">Administration</li>
        <li>Store</li>
        <li>Customer profiles</li>
        <li class="last">Profile Types</li>
    </ul>
</div>

<div class="screenshot screenshot-caption">
    <div class="img">
        <a href="/sites/default/files/docs/Profile-Admin-4.png">
            <img src="/sites/default/files/docs/Profile-Admin-4.png" alt="Checkout Example" />
        </a>
    </div>
    <div class="caption">
        <p class="caption-title">Checkout Example</p>
        <p>Here on checkout you can see our address field which is a part of the default Commerce Kistart. Additionally, below that you now see the Phone number field we've added. Let's go ahead and checkout to get to the next step.</p>
    </div>
</div>

<div class="screenshot screenshot-caption">
    <div class="img">
        <a href="/sites/default/files/docs/Profile-Admin-5.png">
            <img src="/sites/default/files/docs/Profile-Admin-5.png" alt="Read the disclaimer on the customer profile edit screen." />
        </a>
    </div>
    <div class="caption">
        <p class="caption-title">Edit Customer Profile</p>
        <p>Here we are editing the customer profile. Normally this might need to be updated to account for a customer who needs to change their shipping address or other kinds of updates. Note that the original customer profile does not get lost, we simply clone a copy of the original and make the changes. We are doing this action to show you how this process works. Note that this means, by default, if you edit a customer profile it does not change the original order.</p>
    </div>
    <ul class="screenshot_breadcrumbs">
        <li class="first">Administration</li>
        <li>Store</li>
        <li>Customer profiles</li>
        <li class="last">Edit Customer Profile</li>
    </ul>
</div>

<div class="screenshot screenshot-caption">
    <div class="img">
        <a href="/sites/default/files/docs/Profile-Admin-6.png">
            <img src="/sites/default/files/docs/Profile-Admin-6.png" alt="Cloned message." />
        </a>
    </div>
    <div class="caption">
        <p class="caption-title">Cloned message.</p>
        <p>This is the message you get after editing the customer profile.</p>
    </div>
    <ul class="screenshot_breadcrumbs">
        <li class="first">Administration</li>
        <li>Store</li>
        <li>Customer profiles</li>
        <li class="last">Cloned message.</li>
    </ul>
</div>
</div>