---
title: Patching
taxonomy:
    category: docs
---

Drupal uses a patch system to provide solutions to issues in between version
releases. If you are unfamiliar with the concept of patching, you can learn
about [Patches] at drupal.org.

You can use Composer to apply patches by modifying the `composer.json` file
that's at the root of your project. In the "extra" section, you will see
"installer-types" and "installer-paths". To add patches to your project, add a
new "patches" group to "extra".

For example, your "extra" section looks something like this without any patches:

```bash
    "extra": {
        "installer-types": [
            "bower-asset",
            "npm-asset"
        ],
        "installer-paths": {
            "web/core": [
                "type:drupal-core"
            ],
            "web/libraries/{$name}": [
                "type:drupal-library",
                "type:bower-asset",
                "type:npm-asset"
            ],
            "web/modules/contrib/{$name}": [
                "type:drupal-module"
            ],
            "web/profiles/contrib/{$name}": [
                "type:drupal-profile"
            ],
            "web/themes/contrib/{$name}": [
                "type:drupal-theme"
            ],
            "drush/contrib/{$name}": [
                "type:drupal-drush"
            ]
        }
    }
```

Then suppose you want to apply a patch for a Drupal Commerce Issue:
[Issue #2901939: Move variations form to its own tab]

1. Copy the link address for the patch you want to apply. In this case, the
link address for the patch is `https://www.drupal.org/files/issues/2018-05-18/commerce-product-variations-tab-2901939-40.patch`

2. Make the following addition to the "extra" section of your composer.json file:

```bash
"patches": {
	  "drupal/commerce": {
	  	  "2901939: Move variations form to its own tab": "https://www.drupal.org/files/issues/2018-05-18/commerce-product-variations-tab-2901939-40.patch"
    }
}
```

Note that "drupal/commerce" is the project name. Then for that project, you
provide the specific patch information. If you have multiple patches, the
"extra" section of your composer.json file should look something like this:

```bash
    "extra": {
        "installer-types": [
            "bower-asset",
            "npm-asset"
        ],
        "installer-paths": {
            "web/core": [
                "type:drupal-core"
            ],
            "web/libraries/{$name}": [
                "type:drupal-library",
                "type:bower-asset",
                "type:npm-asset"
            ],
            "web/modules/contrib/{$name}": [
                "type:drupal-module"
            ],
            "web/profiles/contrib/{$name}": [
                "type:drupal-profile"
            ],
            "web/themes/contrib/{$name}": [
                "type:drupal-theme"
            ],
            "drush/contrib/{$name}": [
                "type:drupal-drush"
            ]
        },
        "patches": {
            "drupal/commerce": {
                "2901939: Move variations form to its own tab": "https://www.drupal.org/files/issues/2018-05-18/commerce-product-variations-tab-2901939-40.patch"
            },
            "drupal/core": {
                "2904908: Fetch User ID from route context views' contextual filter for any entity": "https://www.drupal.org/files/issues/fetch_user_id_from_route_for_all-2904908-13.patch"
            },
            "drupal/serial": {
                "2946075: Support migrating existing values": "https://www.drupal.org/files/issues/2946075-2.serial.Support-migrating-existing-values.patch"
            }
        }
    }
```

Once you've made the changes to `composer.json`, you can apply the patch by running:

```bash
composer update drupal/commerce
```

[Patches]: https://www.drupal.org/patch
[Issue #2901939: Move variations form to its own tab]: https://www.drupal.org/project/commerce/issues/2901939
