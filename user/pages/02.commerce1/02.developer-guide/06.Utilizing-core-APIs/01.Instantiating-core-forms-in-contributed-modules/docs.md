---
title: Instantiating core forms in contributed modules
taxonomy:
    category: docs
---

One of the primary development standards of Drupal Commerce is a strict <a href="http://www.drupalcommerce.org/development/standards#ui">separation of core APIs from the default user interfaces</a>.  This means when you install the Product module you actually don't have any place to add, edit, or view products without enabling the Product UI module.  This allows site builders and module developers to provide completely customized user interfaces for Drupal Commerce sites without having to undo or work around an existing user interface.  To achieve this behavior, we had to make some special considerations with entity and bundle forms.

The gist of it is forms necessary to add, edit, and delete core entities / bundles are included in the API module but are only "instantiated" by the UI module.  If you enable the Product module, even though the forms are included in that module's includes/commerce_product.forms.inc file, there are no URLs you can browse to to actually submit those forms.  Instead you have to enable the Product UI module which provides menu items for each of these forms.

It does this by using Drupal's <a href="http://api.drupal.org/api/function/hook_form/7">hook_forms()</a> to create unique form IDs for each form it wants to create a menu item for.  The menu items call wrapper functions which include the commerce_product.forms.inc file and then use <a href="http://api.drupal.org/api/function/drupal_get_form/7">drupal_get_form()</a> on the UI module's unique form ID.  This allows the UI module to use <a href="http://api.drupal.org/api/function/hook_form_FORM_ID_alter/7">hook_form_FORM_ID_alter()</a> to specifically add form elements and submit handlers to the forms to make them fit in the menu items.  This includes things like cancel links going to proper URLs and redirect paths being set on form submission.

If you have a need to instantiate an entity / bundle form at a different URL, you should follow the same method.  This will allow you to assume one form ID exists for each path at which the form is displayed.  It is much easier to make assumptions about alterations and redirection using a form ID than parsing a URL or some other method.  Even if you're using the default Product UI module, you should still use this method to add additional instances of the form to your site's IA if necessary.

For a complete example, refer to the following functions to see how the product type form is instantiated by the Product UI module:

<ul>
<li>commerce_product_product_type_form() is defined in commerce_product.forms.inc. Notice it includes the name of the file that contains the form builder function in the $form_state['build_info'].</li>
<li>commerce_product_ui_forms() implements hook_forms() for the Product UI module to add a form ID commerce_product_ui_product_type_form for the product type form.</li>
<li>commerce_product_ui_menu() defines a menu item at the path admin/commerce/products/types/add which calls the commerce_product_ui_product_type_form_wrapper() callback. This function includes the form.inc file and outputs the form using the custom form ID.</li>
<li>commerce_product_ui_form_commerce_product_ui_product_type_form_alter() implements hook_form_FORM_ID_alter() on the custom form ID to add a submit callback and additional action buttons to the form that connect the form to other paths defined by the Product UI module.</li>
</ul>