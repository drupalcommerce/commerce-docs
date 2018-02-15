---
title: Before you begin
taxonomy:
    category: docs
---

! We need help filling out this section! Feel free to follow the *edit this page* link and contribute.

The recommended way to install Commerce POS is with Composer.

```bash
composer require drupal/commerce_pos
```

Then enable the module, via Drush, Drupal Console or the UI.
```bash
drupal module:install commerce_pos commerce_pos_keypad
```

Commerce POS Keypad is a submodule of Commerce POS. It provides an keypad interface for touch enabled devices.