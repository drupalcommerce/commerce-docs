---
title: Getting started
taxonomy:
    category: docs
---

Before you begin adding products to your Drupal Commerce store, it is important to understand the product structure. Let's go through an example.

Let us say that your store sells t-shirts. Your t-shirts come in various sizes; such as small, medium, and large. Each shirt has a graphic but can come in different colors. Each graphic t-shirt is its own product but has variations of sizes and colors available.

![T-shirt color and size product attributes](../../images/tshirt_drupalcon.png)

How does that translate into Drupal Commerce?

* There is a *t-shirt* ***product type***.
* There is a *size* ***product attribute***.
* There is a *color* ***product attribute***.
* Each graphic t-shirt will be its own ***product***, with ***variations*** of color and size.

The following table is an example of variations that could exist for a Drupal Commerce "Drupalcon" graphic t-shirt, corresponding to the above image.

| Product           | Size   | Color  |
|-------------------------------------|
| Drupalcon graphic | Large  | Green  |
| Drupalcon graphic | Medium | Blue   |
| Drupalcon graphic | Medium | Orange |
| Drupalcon graphic | Small  | Green  |
| Drupalcon graphic | Small  | Orange |
| Drupalcon graphic | Small  | Red    |
| Drupalcon graphic | Small  | Blue   |


How is this data represented in Drupal Commerce?

* There is a single *Drupalcon graphic* ***product***.
* This product has 7 different ***product variations***.
* The *size* ***product attribute*** has 3 different ***product attribute values***: Small, Medium, and Large.
* The *color* ***product attribute*** has 4 different ***product attribute values***: Green, Orange, Red, and Blue.

---
In the next section, we'll go through the Drupal Commerce product structure concepts and terminology in greater detail.
