---
title: Before you begin
taxonomy:
    category: docs
---

! We need help filling out this section! Feel free to follow the *edit this page* link and contribute.

If you only need flat rates for shipments, you will be able to install only
Commerce Shipping. The recommended way to install Commerce shipping is with Composer.

```bash
composer require drupal/commerce_shipping
```

Then enable the module, via Drush, Drupal Console or the UI.
```bash
drupal module:install commerce_shipping
```

However, you will likely also want a specific plugin for calculating shipping rates
for your shipper(s) of choice. For example, Fedex, at this time, there are limited
plugins created and you may need to create your own. See the list on the main [shipping page](../).
In general, installing those plugins is as simple as installing the Drupal module
that includes them, although they may have specific installation instructions, in
which case, please follow them. For example, to install the Fedex plugin, you would:

```bash
composer require drupal/commerce_fedex
drupal module:install commerce_fedex
```

Explain core concepts (packaging, boxes, shipments.)
