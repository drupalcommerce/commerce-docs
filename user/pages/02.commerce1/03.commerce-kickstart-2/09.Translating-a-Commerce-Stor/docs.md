---
title: Translating a Commerce Store
taxonomy:
    category: docs
---

The following are notes from Bojan from Commerce Guys. A nicer version with screenshots and "How tos" is in the works.

- Use Commerce 1.8 or newer.
The Commerce team has worked in https://drupal.org/node/2015797 on a wide variety of fixes to make the translation process easier, and they made it into the 1.8 release.
- Use i18n 1.10 or newer. The i18n 1.8 release was broken and we had to contribute major fixes to 1.9 to make i18n_field work again.

Translating the UI
Drupal uses the t() function to translate any strings hardcoded in the source code.
This doesn't work for any strings that are provided by the user, such as the checkout completion message.

Additionally, Drupal is not able to translate the field labels (such as Shipping Information, Order Total, the add to cart fields, etc) without external help.

That external help is the Internationalization module (i18n). You need two modules, i18n_string and i18n_field. admin/config/regional/translate/i18n_string will show a "Drupal Commerce" string group that can be refreshed, and after it is refreshed the admin/config/regional/translate/translate page will show the order completion message and the order creation help text in the "Drupal Commerce" group, while the "Fields" group will show all the field labels, field descriptions, etc.

<h3>Translating entities</h3>
There are many legacy approaches to translating entities in D7. One might use translation (the module that ships with core) to translate nodes, i18n_taxonomy to translate terms, and entity_translation to translate products. Multiple approaches case multiple headaches. Always use entity_translation + title for all entity types (node, product, term).

The title module replaces the title column of an entity with a field, allowing it to be translated with entity_translation (and allowing it to be styled with Fences, making it easier to reposition it in relation to other fields, and many other benefits).

Inline Entity Form note.

IEF currently doesn't have entity_translation integration, so it can't create a translation of a product when the product_display is being
translated. There is a patch in progress at https://drupal.org/node/1545896 and it requires the latest -dev release of entity_translation

Translating the add to cart form attributes
There are different solutions based on the field type that's used for the add to cart attribute:

- list(text): The options are translated using i18n_field, when editing the field there is a Translate tab
- entityreference pointing to a vocabulary: Works automatically (if entity_translation + title is used for the terms)
- taxonomy_term_reference pointing to a vocabulary: Requires the title patch from https://drupal.org/node/2013985

Search API
Search API facets are translated automatically by i18n. Fulltext search isn't multilingual by default and it will only search the default language. This is fixed by the sandbox at https://drupal.org/sandbox/maciej.zgadzaj/2056241, it has been approved and reviewed by the Search API maintainer and should become a full project or be merged into Search API after DrupalConPrague

Discounts
Discounts in the VAT situation are supposed to be applied post-tax. So a fixed-rate discount is supposed to include a VAT component. This is currently not supported in Commerce. There is a Commerce patch at https://drupal.org/node/1825886 to make this possible (or for now just use percentage discounts).
Percentage discounts have the same problem, but they can be applied pre-tax to get the correct amounts.

This will eventually be handled correctly by Commerce Discount, taking advantage of the Commerce rules once the patch gets committed.