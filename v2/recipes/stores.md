# Store recipes
Everything starts with a store. Products can belong to many stores, and orders belong to a single store.

## Creating a store type
```
// String - Primary key for store type.
$id = 'custom_store_type';

// String - The label for the store.
$label = 'My custom store type';

// [OPTIONAL] String - The description for the store.
$description = 'The description for the store';

// Create the store type.
$storeType = \Drupal\commerce_store\Entity\StoreType::create([
  'id' => $id,
  'label' => $label,
  'description' => $description,
]);
$storeType->save();
```

## Creating a store
```
// String - The store type id. Default is 'online'.
$type = 'online';
// Can use the custom type by selecting it here.
$type = 'custom_store_type';
 
// Integer|String - The user id the store belongs to. (Most likely admin)
$uid = 1;

// String - The store's name.
$name = 'My Store';

// String - Store's email address.
$mail = 'admin@example.com';

// String - The country code.
$country = 'US';

// Array - The store's address.
$address = [
  'country_code' => $country,
  'address_line1' => '123 Street Drive',
  'locality' => 'Beverly Hills',
  'administrative_area' => 'CA',
  'postal_code' => '90210',
];

// String - The currency code.
$currency = 'USD';

// If needed, this will import the currency.
$currency_importer = \Drupal::service('commerce_price.currency_importer');
$currency_importer->import($currency);

// Array - The billing countries you want selected for the store.
$billingCountries = [$country];

// Create the store.
$store = \Drupal\commerce_store\Entity\Store::create([
  'type' => $type,
  'uid' => $uid,
  'name' => $name,
  'mail' => $mail,
  'address' => $address,
  'default_currency' => $currency,
  'billing_countries' => $billingCountries,
]);
$store->save();

// If needed, this sets the store as the default store.
$store_storage = \Drupal::service('entity_type.manager')->getStorage('commerce_store');
$store_storage->markAsDefault($store);
```