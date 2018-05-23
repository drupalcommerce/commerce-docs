---
title: Customize the shopping cart block
taxonomy:
    category: docs
---

Drupal Commerce provides highly customizable "Shopping Cart" block which can be placed anywhere on site , using block , showing cart contents on all pages, and the ability for customers to add or remove cart contents. Shopping cart lets customers continue browsing the website but still know how many items has been added to their shopping cart and manage their current order. Both the block and checkout page are quite dynamic, and can easily be customized_ via the Views user interface and themed to match your site, just like any other listing built in the View module.
 
Your shopping cart and checkout process should look great right out of the box. But everybody wants something a little different and so there is a lot you can do to make your cart page unique to your store. We'll outline the tweaks which are available below so you can personalize your cart to just how you like it.  The html markup as well as the associated stylesheets of Cart Block can be easily adapted to match existing theme style.
 
The shopping cart is represented by a Drupal block shown in *figure 1* that consists of a View Listing(*fig 2*) the line items on the cart order with a footer summarizing the items on the order and linking to the cart page and checkout form. 

![Collapsible Shopping cart](../images/collapsible-shopping-cart.png)

   Fig 1 A Collapsible Shopping Cart showing number of items per product and cost.

## Customizing the Mini Cart templates and styles

1. Copy files ``commerce-cart-block.html.twig`` and ``commerce-cart-empty-page.html.twig`` from ``\modules\contrib\commerce\modules\cart\templates`` to your theme folder. For better folder organization you can copy these files to ``your-theme-folder/templates/cart`` i.e. ``your-theme-folder/templates/cart/commerce-cart-block.html.twig`` and ``your-theme-folder/templates/cart/commerce-cart-empty-page.html.twig``
2. Once the files have been copied, you will need to clear Drupal Cache from ``Administration > Configuration > Development``. You will then be able to customize the look and feel of the cart using twig and css.

Manipulating Fields in the Cart Summary
---------------------------------------
**Shopping cart Summary view** allows you to easily manipulate cart fields it works seamlessly out of the box. 

- Open the Views admin page by selecting ``Structure > Views`` from the Drupal admin menu.
- Locate the **Shopping cart summary** view and click the associated edit button.
- You can edit/remove the fields under Fields Row.

![Shopping Cart View](../images/shopping-cart-view.jpg)
   
 Fig 2 The default shipping cart block is entirely configurable via the Views user interface.

- Once Done, Save the field and the view

Overriding the cart stylesheets
-------------------------------

Often you might find yourself undoing what the core cart stylesheets have defined. Instead of fighting with styles, you can actually replace or outright remove the stylesheet using your theme's info.yml file. Below we walk you through the process.
The ``commerce_cart.layout.css`` and ``commerce_cart.theme.css`` files provide the styling which you can override in your own stylesheets using regular `Drupal`_ theme procedures. To override the cart stylesheet you can add following to your ``yourtheme.info.yml`` file.


```yaml
libraries-override:
  commerce_cart/cart_block:
    css:
      layout:
        css/commerce_cart.layout.css: css/commerce_cart.layout.css
```

Or to completely disable the Cart stylesheet:


```yaml
libraries-override:
  commerce_cart/cart_block:
    css:
      layout:
        css/commerce_cart.layout.css: false
```
 
In this case the file has been overridden with **false**.

![Customized Shopping Cart Block](../images/customized-cart.jpg)
   
Fig 3 Illustrates how you can turn Shopping Cart into a fully custom shopping cart.


<https://www.drupal.org/docs/8/theming-drupal-8/adding-stylesheets-css-and-javascript-js-to-a-drupal-8-theme#override-extend>
