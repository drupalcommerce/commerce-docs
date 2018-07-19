---
title: Concepts
taxonomy:
    category: docs
---

#### Product SKUs -- What are they and why are they important?
If you're building a Drupal Commerce site for a well-defined list of products, each with a SKU, price, and other data fields, then you probably don't need to spend too much time thinking about SKUs. As long as each SKU is unique, you're good.

However, in other cases, creating the template/structure for your product SKUs may be one of your very first design tasks. SKU stands for "stock keeping unit" and is a unique code that identifies the products you sell. Companies that are direct manufacturers (as opposed to resellers) may use MPNs, or "manufacturing part numbers" (or just "part numbers") instead of SKUs. In Drupal Commerce, SKUs can be any strings up to 255 characters long, but typically, you will want to keep your SKUs as short and simple as possible, avoid spaces and special characters, and be consistent with your format.

For stores that sell physical products, SKUs are critically important for inventory management. A complete list of all product SKUs along with a quantity value for each provides the information you need to monitor stock levels. What about stores that sell non-physical products, like services or virutal products for which there may be *unlimited* inventory? SKUs are important for sales and financial reporting for all types of products.

In the context of developing a Drupal Commerce site, properly defining your product SKUs will help you design the structure of your products. **In Drupal Commerce, every product SKU corresponds to exactly one product variation.** In the most basic terms, a product variation is the thing you're selling. It has a SKU, a price, a name/title, and a status (active/inactive). When a customer adds an item to a cart, he's adding a specific quantity of a product variation. (do I need a footnote here about purchasable entities?)...something transitional here...

#### Products and product variations
Every product has at least one product variation. And every product variation  is associated with exactly one product. For some products, there may be a one-to-one correspondence between products and product variations. (example here: books, all offered in an electronic format) In other cases, a single product may have multiple variations. (for example, books also offered in hardcover, softcover, etc.)

And an extended example

#### Product attributes
In the book example, you might define the attribute as the "format". Other common attributes are color and size.

What are these things:
1. Product types, Default product type, Products
2. Variation types, Default product variation type, Variations, default order item type, Sku uniqueness
3. Product attributes, attribute values
4. Purchasable entities

### Links and Resources
* [SKU Best Practices for Online Shopping Sites], by Andrew Brett Watson

[SKU Best Practices for Online Shopping Sites]: http://andrewbrettwatson.com/index.php/help/187-sku-best-practices-for-online-shopping-sites
