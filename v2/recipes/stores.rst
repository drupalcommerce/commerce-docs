Store recipes
=============

Everything starts with a store. Products can belong to many stores, and
orders belong to a single store.

Creating a store type
---------------------

.. code-block:: php

    /**
     * id [String]
     *   The primary key for this store type.
     *
     * label [String]
     *   The label for this store type.
     *
     * description [String]
     *   The description for this store type.
     */
    $store_type = \Drupal\commerce_store\Entity\StoreType::create([
      'id' => 'custom_store_type',
      'label' => 'My custom store type',
      'description' => 'This is my first custom store type!',
    ]);
    $store_type->save();

Loading a store type
--------------------

.. code-block:: php

    // Loading is based off of the primary key [String] that was defined when creating it.
    $store_type = \Drupal\commerce_store\Entity\StoreType::load('custom_store_type');

Creating a store
----------------

.. code-block:: php

    /**
     * type [String] - [DEFAULT = 'online']
     *   Foreign key for the store type to yse.
     *
     * uid [Integer]
     *   The user id that created the store.
     *
     * name [String]
     *   The store's name.
     *
     * mail [String]
     *   The store's email address.
     *
     * address [\Drupal\address\AddressInterface]
     *   The store's address.
     *
     * default_currency [String]
     *   The currency the store uses.
     *
     * billing_countries [Array(String)]
     *   Array of country codes selected for the store.
     */

    // The store's address.
    $address = [
      'country_code' => 'US',
      'address_line1' => '123 Street Drive',
      'locality' => 'Beverly Hills',
      'administrative_area' => 'CA',
      'postal_code' => '90210',
    ];

    // The currency code.
    $currency = 'USD';

    // If needed, this will import the currency.
    $currency_importer = \Drupal::service('commerce_price.currency_importer');
    $currency_importer->import($currency);

    $store = \Drupal\commerce_store\Entity\Store::create([
      'type' => 'custom_store_type',
      'uid' => 1,
      'name' => 'My Store',
      'mail' => 'admin@example.com',
      'address' => $address,
      'default_currency' => $currency,
      'billing_countries' => ['US'],
    ]);
    $store->save();

    // If needed, this sets the store as the default store.
    $store_storage = \Drupal::service('entity_type.manager')->getStorage('commerce_store');
    $store_storage->markAsDefault($store);

Loading a store
---------------

.. code-block:: php

    // Loading is based off of the primary key [Integer]
    //   1 would be the first one saved, 2 the next, etc.
    $store = \Drupal\commerce_store\Entity\Store::load(1);
