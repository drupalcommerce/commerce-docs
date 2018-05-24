---
title: Maintaining
taxonomy:
    category: docs
---

In order to keep Drupal Commerce and your other installed modules up-to-date,
you can use Composer to produce a list of outdated modules with the Composer
`outdated` command:

```bash
composer outdated --direct
```

Then for each outdated project, you can use the Composer `update` command:

```bash
composer update drupal/token --with-dependencies
```

See [Updating](../03.updating) for additional information about how to make
updates using Composer.

Also, it is **critically important** that you keep up-to-date with [Drupal security advisories].
You can subscribe to the "Security announcements" newsletter in your [Drupal.org] user
profile settings.

[Drupal security advisories]: https://www.drupal.org/security
[Drupal.org]: https://www.drupal.org
