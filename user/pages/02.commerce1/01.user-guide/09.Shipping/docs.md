---
title: Shipping
taxonomy:
    category: docs
---

(I used Shipping 7.x-2.x and Flat Rate 7.x-1.0 for this one. For now I’m going to assume that you have your Flat rate shipping method and flat rate service set up).

What we would like to do here is to tell Drupal Commerce to calculate a shipping service’s fee based on our customer’s shipping address. For example: If a customer would like her product shipped to Cooltown, the courier service will charge $15, if she’d like the product shipped to Supercooltown, the courier service will charge $5.

We will use Rules for this.

Step by step:
<ol>
	<li>Go to Store -> Configuration -> Shipping -> Calculation rules and add a new calculation rule.</li>
  <li>
    Deciding if the commerce line item’s type is Shipping
    <ol>
      <li>Add a new condition and select Data comparison.</li>
      <li>Data selector should be ‘commerce-line-item:type’</li>
      <li>The comparison operator will be ‘equals’</li>
      <li>Data value will be Shipping</li>
    </ol>
  </li>
  <li>
    Deciding if the shipping service is the one you want to change the rate for
    <ol>
      <li>Add a new condition and select Data comparison.</li>
      <li>Data selector should be ‘commerce-line-item:commerce-shipping-service’</li>
      <li>The comparison operator will be ‘equals’</li>
      <li>For data value you have to select the shipping service you want to change the rate for</li>
    </ol>
  </li>
<li>
Add a condition "Entity has field". The data selector should be commerce-line-item:order and the value should be the field that has your the shipping information you want. I think in most of the cases this will be commerce_customer_shipping field.
</li>
  <li>Add on OR to the condition list. Rules, by default, assumes that there is an AND connection between your added conditions and between the upcoming conditions there needs to be OR.</li>
  <li>Now we need to decide what component of the shipping address will we use to decide the shipping rate. For my situation, using the postal code was the best decision, so I’ll continue with that in this tutorial, but you can use any other available address component.
    <ol>
      <li>Add a new condition and select Order address component comparison</li>
      <li>Data selector should be ‘commerce-line-item:order’</li>
      <li>In the Address section choose Shipping information’s address</li>
      <li>In the Address component section select the component you want use to decide the shipping rate.</li>
      <li>Operator should be ‘equals’</li>
      <li>In the Value section, put the specific address component you want to apply this rule for. Example: If I want to use this rule for orders that will be shipped to Kaposvár, Hungary then I should give the value 7400 which is its postal code.</li>
      <li>Click Save</li>
      <li>Put this condition into the OR group and if you create new order address compontent conditions, put them into it as well.</li>
    </ol>
  </li>
  <li>
    We’ve finished with the conditions, now let’s go to the Actions section and create a new action which will set the shipping rate to a specific amount if the above conditions are met.
    <ol>
      <li>Add action and select Set the unit price to a specific amount</li>
      <li>Data selector should be commerce_line_item</li>
      <li>Value should be the price wou want to charge when shipping to this location you described in the conditions</li>
      <li>Price compontent type should be your shipping service’s name.</li>
      <li>Set the price rounding mode as you wish and hit Save</li>
    </ol>
  </li>
</ol>

That’s it! If everything goes well, the rule will change the our shipping service’s rate when it’s needed.

I attached a screenshot of my rule, in case it would be helpful to you to see what we just did.

If you have any questions or corrections to this tutorial feel free to let me know in the comments section below.