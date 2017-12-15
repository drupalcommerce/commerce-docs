---
title: Customize Checkout Look and Feel
taxonomy:
    category: docs
---

There was a <a href="http://drupal.org/node/1098028">recent commit that made the checkout process table-less in the Commerce Issue Que</a>. It was reverted in favor of making such a large change to the codebase on a 2.x release. That code still exists and it's all possible using theme_ functions in your template.php...

<ol>
<li><strong>Step 1</strong> - Go here <code>/modules/checkout/includes/commerce_checkout.pages.inc</code> and look for functions that start with theme_</li>
<li><strong>Step 2</strong> - Add those functions that you want to your template.php in your theme or a custom module</li>
<li><strong>Step 3</strong> - change the function word "theme" with your theme name or module name.</li>
<li><strong>Step 4</strong> - Make an obvious change or two</li>
<li><strong>Step 5</strong> - Clear all caches and then go through the checkout process.</li>
</ol>

Let us know in the comments if this process worked for you! Also, post any tweaks to the Commerce Issue Que and they might be considered for inclusion for the 2.x release.