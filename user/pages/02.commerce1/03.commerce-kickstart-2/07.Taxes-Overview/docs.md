---
title: Taxes Overview
taxonomy:
    category: docs
---

<div class="docs-enhanced">
<h2>Types of Taxes</h2>
<p>Drupal Commerce can do lots of things, but it does two major kinds of taxes "out of the box".</p>
<ol><li><em>Sales Tax</em> is the style of tax often used in the US, where many governmental entities impose their own tax on every purchase. It's typically added as a line item in the subtotal.</li>
<li><em>VAT</em> is used in much of the rest of the world. In VAT, the total shown to the customer already includes the tax, and nothing is added in the subtotal section (although Drupal Commerce does itemize the tax portion of the total.)</li>
</ol><h2>Simple Taxes</h2>
<p>If you have a tax which is added to every order without any complex rules, there's nothing to it. Visit the tax rate configuration at Administration -&gt; Store -&gt; Configuration -&gt; Taxes (admin/commerce/config/taxes) and add a tax rate.</p>
<p>For example, to add a sales tax of 10%, I can click "Add a tax rate", fill in the form, put a rate of 0.10, and that's all there is to it. An extra 10% subtotal line item will be added to every order</p>
<h2>Conditional Taxes</h2>
<p>Unfortunately, the world is not set up to allow us to do simple taxes all the time, and we end up needing rules for them. Drupal Commerce, though, is up to the task. It uses the Rules engine to allow you great power.</p>
<p>Most of the time, we'll be applying different taxes based on the location of the buyer. There are other applications, but we'll demonstrate how to do it based on order address:</p>
<ol><li>Create a tax. Let's use a sales tax, a Colorado State Sales Tax of 4.3% (.043). </li>
<li>After creating the tax, you'll be on the Taxes page again. Click "configure component" next to your new tax. That lets you have direct access to the rule that will control this tax.</li>
<li>Note that there are no conditions yet (because the default is a tax that's always applied). We're going to add a condition.</li>
<li>Click "Add Condition"</li>
<li>Select the "Order Address Component Comparison" condition.</li>
<li>Choose <code>line-item:order</code> as the data selector.</li>
<li>Choose the address to work with. If you're using the Commerce Kickstart install profile, you'll probably have just one option here, "Address".</li>
<li>Choose the address component to work with. I'm going to use "Administrative area (State/Province)"</li>
<li>Set the operator to equals.</li>
<li>I'll set the value to "CO", the code for the state of Colorado that is used under the covers in Drupal Commerce forms.</li>
</ol><p>That's it. You can add other taxes based on other address components as demonstrated in the screencast.</p>

Here are two screencasts, the first on basic taxes and the second on conditional taxes.

<iframe src="http://player.vimeo.com/video/22096163" width="400" height="300" frameborder="0"></iframe><p><a href="http://vimeo.com/22096163">Drupal Commerce Tax Introduction: Sales Tax and VAT</a> from <a href="http://vimeo.com/user5912539">Randy Fay</a> on <a href="http://vimeo.com">Vimeo</a>.</p>

<iframe src="http://player.vimeo.com/video/22323135" width="400" height="300" frameborder="0"></iframe><p><a href="http://vimeo.com/22323135">Drupal Commerce Conditional Sales Tax</a> from <a href="http://vimeo.com/user5912539">Randy Fay</a> on <a href="http://vimeo.com">Vimeo</a>.</p>
</div>