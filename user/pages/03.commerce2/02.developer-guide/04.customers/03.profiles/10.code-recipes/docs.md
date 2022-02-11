---
title: Code recipes
taxonomy:
    category: docs
---

If you want to write custom code to programatically create or manage profiles, you can use these code recipes as a starting point.
- **Create:**
 - [Profile types](#creating-profile-types)
 - [Profiles](#creating-profiles)
- **Load:**
 - [Profile types](#loading-profile-types)
 - [Profiles](#loading-profiles)
- **Implement:**
 - [ProfileLabelSubscriber](#profilelabelsubscriber)
 - [Profile inline form alterations](#altering-profile-inline-forms)

### Creating profile types
```php
/**
 * id [String]
 *   The primary identifier of the profile type.
 *
 * label [String]
 *   The human-readable name of the profile type.
 *
 * status [Bool] - [OPTIONAL, DEFAULTS TO TRUE]
 *   [AVAILABLE = FALSE, TRUE]
 *   Whether or not it's enabled or disabled. 1 for enabled.
 *
 * description [String]
 *   The label for this profile type.
 *
 * registration [Bool] - [OPTIONAL, DEFAULTS TO FALSE]
 *   [AVAILABLE = FALSE, TRUE]
 *   Whether the profile type is shown during registration. 1 for enabled.
 *
 * multiple [Bool] - [OPTIONAL, DEFAULTS TO FALSE]
 *   [AVAILABLE = FALSE, TRUE]
 *   Whether the profile type allows multiple profiles. 1 for enabled.
 *
 * roles [Array(String)]
 *   Array of roles a user needs to have to attach profiles of this type.
 *
 * weight [Integer, DEFAULTS TO 0]
 *   The weight of the profile type compared to others.
 *
 * use_revisions [Bool] - [OPTIONAL, DEFAULTS TO FALSE]
 *   [AVAILABLE = FALSE, TRUE]
 *   Whether or not profiles of this type always generate revisions. 1 for enabled.
 */
$profile_type = \Drupal\profile\Entity\ProfileType::create([
  'id' => 'my_custom_profile_type',
  'label' => 'My custom profile type',
  'description' => 'A brief, administrative description for my custom profile type',
  'registration' => TRUE,
  'multiple' => TRUE,
  'roles' => ['authenticated', 'administrator'],
  'weight' => 10,
  'use_revisions' => TRUE,
]);
$profile_type->save();

// Add a custom field to a profile type.
$field_storage = \Drupal\field\Entity\FieldStorageConfig::create([
  'field_name' => 'profile_fullname',
  'entity_type' => 'profile',
  'type' => 'text',
]);
$field_storage->save();

$custom_field = \Drupal\field\Entity\FieldConfig::create([
  'field_storage' => $field_storage,
  'bundle' => 'my_custom_profile_type',
  'label' => 'Full name',
]);
$custom_field->save();

// Make the custom field private.
$custom_field->setThirdPartySetting('profile', 'profile_private', TRUE);
$custom_field->save();
```

### Creating profiles
```php
// Create a new, active profile for a user.
$user = user_load_by_mail('customer@example.com');
$profile = \Drupal\profile\Entity\Profile::create([
  'type' => 'customer',
  'uid' => $user->id(),
  'status' => TRUE,
  'address' => [
    'country_code' => 'US',
    'postal_code' => '53177',
    'locality' => 'Milwaukee',
    'address_line1' => 'Pabst Blue Ribbon Dr',
    'administrative_area' => 'WI',
    'given_name' => 'Frederick',
    'family_name' => 'Pabst',
  ],
]);
$profile->save();

// Create an anonymous customer profile.
$anonymous_profile = \Drupal\profile\Entity\Profile::create(['type' => 'customer']);
$anonymous_profile->save();
```

### Loading profile types
```php
// Loading is based off of the primary identifier [String] that was defined when creating it.
$profile_type = \Drupal\profile\Entity\ProfileType::load('my_custom_profile_type');
```

### Loading profiles
```php
$user = user_load_by_mail('customer@example.com');

// Get profile storage to use ProfileStorage methods.
$profile_storage = \Drupal::entityTypeManager()->getStorage('profile');

// Load an inactive customer profile for a user.
$customer_profile = $profile_storage->loadByUser($user, 'customer', FALSE);

// Load an active customer profile for a user.
$customer_profile = $profile_storage->loadByUser($user, 'customer');

// Load a specific profile.
$profile_id = $customer_profile->id();
$profile = $profile_storage->load($profile_id);

// Load all profiles for user.
$profiles = $profile_storage->loadByProperties(['uid' => $user->id()]);

// Load all active customer profiles for a user.
$customer_profiles = $profile_storage->loadMultipleByUser($user, 'customer');

// Load all inactive customer profiles for a user.
$customer_profiles = $profile_storage->loadMultipleByUser($user, 'customer', FALSE);

// Load default customer profile for a user.
$default_profile = $profile_storage->loadDefaultByUser($user, 'customer');
```

### ProfileLabelSubscriber
The default label for a profile is the name of the profile type followed by its unique id. For example: "Customer profile #10". In the *Commerce Order* module, Drupal Commerce uses the `ProfileLabelSubscriber` event subscriber to set the customer profile label to the first address line.

In this example, we assume that a *Nickname* field, `field_nickname` has been added to our *Customer* profile type and we want to use a profile's *Nickname* for the profile label whenever a *Nickname* has been entered. We give our event subscriber a lower priority `-100` so that it will run *after* the the event subscriber in the *Commerce Order* module.
```php
<?php

namespace Drupal\mymodule\EventSubscriber;

use Drupal\profile\Event\ProfileLabelEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class ProfileLabelSubscriber implements EventSubscriberInterface {

  /**
   * {@inheritdoc}
   */
  public static function getSubscribedEvents() {
    $events = [
      'profile.label' => ['onLabel', -100],
    ];
    return $events;
  }

  /**
   * Sets the customer profile label to the nickname if it exists, first address line otherwise.
   *
   * @param \Drupal\profile\Event\ProfileLabelEvent $event
   *   The profile label event.
   */
  public function onLabel(ProfileLabelEvent $event) {
    /** @var \Drupal\profile\Entity\ProfileInterface $order */
    $profile = $event->getProfile();
    if ($profile->bundle() == 'customer' && !$profile->address->isEmpty()) {
      if (!empty($nickname = $profile->get('field_nickname')->value)) {
        $event->setLabel($nickname);
      }
      else {
        $event->setLabel($profile->address->address_line1);
      }
    }
  }

}
```

Don't forget to add the event subscriber to your module's `services.yml` file and rebuild caches.
```php
services:
  mymodule.profile_label_subscriber:
    class: Drupal\mymodule\EventSubscriber\ProfileLabelSubscriber
    arguments: ['@entity_type.manager']
    tags:
      - { name: event_subscriber }
```

### Altering profile inline forms
Checkout panes and billing and shipping profile widgets use inline forms to render profile forms using specific form displays. These forms can be altered using the `hook_commerce_inline_form_alter` and `hook_commerce_inline_form_PLUGIN_ID_alter` hooks. For example, the Commerce shipping module implements the plugin-id specific version of the hook to attach the "Billing same as shipping" element to the `customer_profile` inline form:

```php
function commerce_shipping_commerce_inline_form_customer_profile_alter(array &$inline_form, FormStateInterface $form_state, array &$complete_form) {
  // Attach the "Billing same as shipping" element.
  $profile_field_copy = \Drupal::service('commerce_shipping.profile_field_copy');
  if ($profile_field_copy->supportsForm($inline_form, $form_state)) {
    $profile_field_copy->alterForm($inline_form, $form_state);
  }
}
```

When using the more generic form of the hook, you can use the `#inline_form` attribute of the inline form to identify a specific plugin and the `#profile_scope` attribute to identify the form mode, like this:

```php
function hook_commerce_inline_form_alter(array &$inline_form, FormStateInterface $form_state, array &$complete_form) {
  /** @var \Drupal\commerce\Plugin\Commerce\InlineForm\InlineFormInterface $plugin */
  $plugin = $inline_form['#inline_form'];
  if ($plugin->getPluginId() == 'customer_profile') {
    if ($inline_form['#profile_scope'] == 'billing' && !isset($inline_form['rendered'])) {
      // Modify the billing profile when in "form" mode.
      $inline_form['address']['widget'][0]['#type'] = 'fieldset';
      // Individual address elements (e.g. "address_line1") can only
      // be accessed from an #after_build callback.
      $inline_form['address']['widget'][0]['address']['#after_build'][] = 'your_callback';
    }
  }
}
```

