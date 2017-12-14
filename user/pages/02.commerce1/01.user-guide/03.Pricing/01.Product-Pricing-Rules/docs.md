---
title: Product Pricing Rules (with screencasts)
taxonomy:
    category: docs
---

<p>Discounts in Drupal Commerce</p>
<h1>Overview</h1>
<ul><li>Create a discount using a rule</li>
<li>Create a weekend (date-based) sale discount using a rule</li>
<li>Create a tag-based weekend sale discount using a rule</li>
</ul><h2>Simple Discount</h2>
<p>An example of a simple discount: You want to take 10% off everything in your store until further notice.</p>
<ol><li>Go to Store -&gt; Configuration -&gt; Product Pricing Rules</li>
<li>Click "Add a pricing rule"</li>
<li>Give your rule a name</li>
<li>Under "Actions" click "Add Action"</li>
<li>Under "Commmerce Line Item" choose "Multiply the Unit Price by Some Amount"</li>
<li>The data selector should be "line_item"</li>
<li>The amount should be .9 (in other words, multiply the price by .9).</li>
<li>Now all products have 10% taken off of them.</li>
</ol>

</ol><h2>Adding a Date Window to the Discount</h2>
<p>Now we need to take our simple discount and make it effective for just one period of time. We'll use the "Simple Discount" approach above, but now we'll make it only applicable during this upcoming weekend.</p>
<ol><li>Create a discount as in the "Simple Discount" above. </li>
<li>This time we'll add two conditions to the product pricing rule:
<ul><li>System Date is Greater than Midnight April 23</li>
<li>System Date is Less than Midnight April 25.</li>
</ul></li>
</ol><p>That's it. To test in a Linux environment you can temporarily change the server date using</p>
<p><code>sudo date MMDDHHMM</code></p>
<p>for example</p>
<p><code>sudo date 04231237</code></p>
<p>Don't forget to change the time back. Changing it like this makes a big mess of things.<br><code>sudo ntpdate pool.ntp.org</code></p>

<iframe src="https://player.vimeo.com/video/22619046?title=0&amp;byline=0&amp;portrait=0" width="400" height="300" frameborder="0"></iframe><p><a href="http://vimeo.com/22619046">Drupal Commerce Date-Based Discounts</a> from <a href="http://vimeo.com/user5912539">Randy Fay</a> on <a href="http://vimeo.com">Vimeo</a>.</p>

<h2>Adding a Taxonomy Term To Drive Discounts</h2>
<p>Now we're going to go much farther. We'll add a taxonomy term to our product entity to determine which sale events it should be subject to, and <em>also</em> add a date range.</p>
<p>There is a rather major complexity in this one. Rules does not have the ability currently to follow references (like product references and term references) very well, so we have to jump through some hoops to get access to them. It is do-able, but a bit mind-bending. We hope to see <a href="http://drupal.org/node/1053850">the rules issue relating to this</a> land soon, but for now we have to use the tools we have.</p>
<ol><li>Add a taxonomy vocabulary called "Sales Events"</li>
<li>Add a term to the vocabulary called "April Weekend Madness Sale"</li>
<li>Add a term reference field to the "Product" product type referencing "Sales Events"</li>
<li>Set the "Sales Events" value in one or more products to "April Weekend Madness Sale". We're essentially marking them for this sale.</li>
<li>Create a rules component that determines whether the weekend is here:
<ul><li>Administer -&gt; Configuration -&gt; Workflow -&gt; Rules -&gt; Components -&gt; Add new component.</li>
<li>Component plugin is "Condition set (AND)"</li>
<li>Name is "Weekend of April 23"</li>
<li>Continue</li>
<li>Add two conditions which do data comparison against system date to select the weekend timeframe just as we did in the earlier, simpler example.</li>
</ul></li>
<li>Create another rules component that accepts a product as a variable which will determine whether the product is marked to be part of the sale. Note that the first three conditions we're adding here are just to force Rules to understand how to traverse the data. They seem quite complex at first, but it's actually just cookbook stuff.
<ul><li>Administer -&gt; Configuration -&gt; Workflow -&gt; Rules -&gt; Components -&gt; Add new component.</li>
<li>Condition set (AND)</li>
<li>Name: "Product is on sale"</li>
<li>Variables: Data type "Entity - Product", Label "Product", Machine name "product"</li>
<li>Add a condition</li>
<li>Entity has field</li>
<li>Data selector: product</li>
<li>Field: field_sales_event</li>
<li>Add another condition</li>
<li>Data value is empty</li>
<li>Data selector: product:field-sales-event</li>
<li>Click negate.</li>
<li>Add another condition</li>
<li>Data value is empty</li>
<li>Data selector: product:field-sales-event:tid</li>
<li>Click negate.</li>
<li>Add a final condition</li>
<li>Data comparison</li>
<li>Data Selector: product:field-sales-event:tid</li>
<li>Value equals (the tid of the taxonomy term we created)</li>
</ul></li>
<li>
<p>Now we'll create a product pricing rule at Store -&gt; Configuration -&gt; Product Pricing Rules.</p>
<ul><li>Add a pricing rule with the name "April weekend sale"</li>
<li>Under actions, add an action to multiply the price by 0.8 (we'll give them an even bigger discount than we did last time!)</li>
<li>Under conditions:</li>
<li>Add condition "Component: April Weekend Sale", which will add the date-based conditions to our rule.</li>
<li>Add condition "Entity has field" (This is just to bring the product into scope due to the Rules issue mentioned above.)
<ul><li>Data selector: line-item</li>
<li>Field: commerce_product</li>
</ul></li>
<li>Add condition "Component: Product is on sale."
<ul><li>Data selector: line-item:commerce-product</li>
</ul></li>
</ul><p>Now we have a product pricing rule that does two things. First it checks the conditions in the "Weekend of April 23" to see if the date is correct, and then it uses the "Product is on sale" component (to which we pass the line item's product) to determine whether the item is on this sale.</p>
<p>We can change the server date to experiment, and should see that the products we marked now have their sale prices.</p>
</li>
</ol>

<iframe src="https://player.vimeo.com/video/22625018?title=0&amp;byline=0&amp;portrait=0" width="400" height="300" frameborder="0"></iframe><p><a href="http://vimeo.com/22625018">Drupal Commerce Complex Pricing Rules</a> from <a href="http://vimeo.com/user5912539">Randy Fay</a> on <a href="http://vimeo.com">Vimeo</a>.</p>