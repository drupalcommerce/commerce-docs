Manage Store Types
====================

.. tabs::
        .. tab:: Quickstart

             .. code-block:: php

                    use Drupal\commerce_store\Entity\StoreType;

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
                    $store_type = StoreType::create([
                      'id' => 'custom_store_type',
                      'label' => 'My custom store type',
                      'description' => 'This is my first custom store type!',
                    ]);

                    $store_type->save();

        .. tab:: Tutorial

             Tutorial goes here
