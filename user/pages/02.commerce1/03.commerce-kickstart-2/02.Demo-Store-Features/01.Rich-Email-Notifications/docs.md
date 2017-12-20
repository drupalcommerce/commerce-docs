---
title: Rich Email Notifications
taxonomy:
    category: docs
---

<div class="docs-enhanced">
<p>The Commerce Kickstart team decided early on that the current implementation rich HTML email notifications was a clear necessity and the existing solutions didn't match some of the biggest concerns. To handle the email notifications, Commerce Kickstart has integrated the <a href="http://drupal.org/project/message">Messages</a> module and the <a href="http://drupal.org/project/mimemail">Mime</a> mail module.</p>
<p>To edit the various templates that come standard with Kickstart, you simply need to go to <strong>Site Settings &gt; Advanced Settings &gt; Structure &gt; Message Types</p>
<div class="screenshot"><img src="/sites/default/files/docs/CK-Email-Notifications-01.png" alt="Message Types Overview" /></div>
<p>Each Message Type is like a Content Type for Email Notifications. Commerce Kickstart then is designed to use Rules to send create a Message of a certain type.</p>
<div class="screenshot screenshot-caption">
    <div class="img">
        <a href="/sites/default/files/docs/CK-Email-Notifications-02.png">
            <img src="/sites/default/files/docs/CK-Email-Notifications-02.png" alt="Rules that trigger the Email Notifications" />
        </a>
    </div>
    <div class="caption">
        <p class="caption-title">Trigger Rules</p>
        <p>The rules listed here are responsible for creating "Messages of a certain type" that will get sent. You can go here to disable a certain message type, or add an additional event or even setup a new message type.</p>
    </div>
    <ul class="screenshot_breadcrumbs">
        <li class="first">Site Settings</li>
        <li>Advanced</li>
        <li>Configuration</li>
        <li class="last">Rules</li>
    </ul>
</div>
<p><a href="http://drupal.org/project/message_notify">Message Notify</a> allows messages to be sent as emails using <a href="http://drupal.org/project/rules">Rules</a>, which Commerce Kickstart happily enables by default. Admittedly, this functionality is a bit hidden from the average user and it's in the long term goals to expose more of this functionality to the user interface in a more understandable way. Until then, please feel free to share your favorite templates and rules for sending out receipts, invoices, etc.</p>
<div class="screenshot screenshot-caption">
    <div class="img">
        <a href="/sites/default/files/docs/CK-Email-Notifications-03.png">
            <img src="/sites/default/files/docs/CK-Email-Notifications-03.png" alt="Example Rule that sends Message" />
        </a>
    </div>
    <div class="caption">
        <p class="caption-title">Example Rule</p>
        <p>Here is an example rule that demonstrates a message of a certain type being created and then sent via <a href="http://drupal.org/project/message_notify">Message Notify</a>.</p>
    </div>
    <ul class="screenshot_breadcrumbs">
        <li class="first">Site Settings</li>
        <li>Configuration</li>
        <li>Rules</li>
        <li>Order Notification</li>
        <li class="last">Edit</li>
    </ul>
</div>