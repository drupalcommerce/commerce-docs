---
title: Shipping
taxonomy:
    category: docs
---

<div class="docs-enhanced">
<div class="screenshot"><img src="/user/pages/02.commerce1/03.commerce-kickstart-2/08.ShippingCK-Shipping-02.png" alt="Shipping services listing in Drupal Commerce Kickstart 2" style="margin-bottom:0" /></div>
<p>Commerce Kickstart ships with the latest release of Commerce Shipping 2.x. Shipping subdivides shipping methods into individual shipping services, giving you granular control over when each individual service from a provider like UPS should be available for an order. For example, you can use USPS for all orders within the U.S.A. and UPS for all other territories while requiring that certain products only ship UPS Next Day Air regardless of where they're shipping to.</p>
<p>Shipping rate calculation functions much like the product sell price calculation in the core of Drupal Commerce. When shipping services are calculated for an order, they are represented as line items that have a base rate defined by the shipping method. The line item is then passed through Rules for additional calculation, allowing you to add taxes and handling fees or perform complex calculations based on weight, distance, quantity, etc. to determine the final calculated rate.</p>
<div class="screenshot"><img src="/user/pages/02.commerce1/03.commerce-kickstart-2/08.ShippingCK-Shipping-01_0.png" alt="Shipping services listing in Drupal Commerce Kickstart 2" style="margin-bottom:0" /></div>
<p>You are first presented with a listing of shipping services that are available in your store. This is a granular listing showing all of the services that every available shipping method provides. In the Demo Store Shipping Services list above you can see the three services defined using the Flat Rate module.</p>
<p>In Commerce Kickstart, by default, there is a "Flat Rate" shipping method that has many flat rate services (like Free Shipping, Express Shipping, etc). You can also install other shipping methods like UPS or FedEx and they will come with their own ability to handle new services (based on weight or location). The calculation rules handle when and how shipping methods show up and how they get applied.</p>
</div>