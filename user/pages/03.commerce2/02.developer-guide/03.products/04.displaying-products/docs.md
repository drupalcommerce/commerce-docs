---
title: Displaying products
taxonomy:
    category: docs
---

- Describes displaying products:
- formatters, widgets, templates, css, preprocess functions, display modes
- theming product page
- add-to-cart form

- Possible section on decoupled/headless options?

- Add to Cart Form
- Show the form
- Explain how the attribute element translates to the add-to-cart form
- Quantity fields
- Attribute element type
- Ordering on the form is controlled on the form display of the product variation. This is found on the product - variation form display settings.

- Fancy Attributes
- Field Injection - Note: Look at the issue queue #2716417: Allow rendering of variation fields on the product entity.

> Q: Where can i alter commerce product twig template variables?
A: You can use hook_preprocess_commerce_product like so:

``function mymodule_preprocess_commerce_product(&$variables) {
  $product = $variables['elements']['#commerce_product'];
  ...
}
``

> Q: Using twig|without for a commerce product
A: https://drupal.stackexchange.com/questions/250147/using-twigwithout-for-a-commerce-product

> Q: How to print the product variation separately from the submit/pay button in a Commerce add to cart form?
A: https://drupal.stackexchange.com/questions/250509/how-to-print-the-product-variation-separately-from-the-submit-pay-button-in-a-co

> Q: Add product image to drupal commerce cart form
A: https://drupal.stackexchange.com/questions/255022/add-product-image-to-drupal-commerce-cart-form

> Q: How to index Drupal Commerce 2 products for the search?
A: https://drupal.stackexchange.com/questions/253205/how-to-index-drupal-commerce-2-products-for-the-search

> Q: How to create a page category of products in Commerce 2?
A: https://drupal.stackexchange.com/questions/238589/how-to-create-a-page-category-of-products-in-commerce-2

> Q: How to add 'add to cart' button in custom content type using Commerce 2?
A: https://drupal.stackexchange.com/questions/249600/how-to-add-add-to-cart-button-in-custom-content-type-using-commerce-2

> Q: Using twig|without for a commerce product
A: https://drupal.stackexchange.com/questions/250147/using-twigwithout-for-a-commerce-product/250150#250150

> Q: Where are the options to control labels/titles of product attributes...
A: https://www.drupal.org/project/commerce/issues/2911690
