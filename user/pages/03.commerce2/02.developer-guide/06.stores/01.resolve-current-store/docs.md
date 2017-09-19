---
title: Resolve the current store
taxonomy:
    category: docs
---

The first store created in Commerce is saved as the default store in commerce_store.settings.yml.

This uses Drupal\commerce_store\Resolver\DefaultStoreResolver to retrieve it on page load.

In order to load a different store, create a new StoreResolver.

In this example, use a store ID set in a cookie to load the relevant store.

Copy DefaultStoreResolver to your module (in /src/Resolver/) and rename to CookieStoreResolver.
Change the code in resolve() to load the store ID from the cookie and return it.

```php
<?php

namespace Drupal\cookie_store\Resolver;

use Drupal\Core\Entity\EntityTypeManagerInterface;
use Drupal\commerce_store\Resolver\StoreResolverInterface;
use Symfony\Component\HttpFoundation\Request;
use Drupal\commerce_store\Entity\Store;

/**
 * Returns the store for an ID set in a cookie.
 */
class CookieStoreResolver implements StoreResolverInterface {

  /**
   * The store storage.
   *
   * @var \Drupal\commerce_store\StoreStorageInterface
   */
  protected $storage;

  /**
   * Constructs a new CookieStoreResolver object.
   *
   * @param \Drupal\Core\Entity\EntityTypeManagerInterface $entity_type_manager
   *   The entity type manager.
   */
  public function __construct(EntityTypeManagerInterface $entity_type_manager) {
    $this->storage = $entity_type_manager->getStorage('commerce_store');
  }

  /**
   * {@inheritdoc}
   */
  public function resolve() {
      $store_id = Request::createFromGlobals()->cookies->get('Drupal_visitor_store_id');

      if ($store_id) {
          $store = Store::load($store_id);
          return $store;
      }
  }
}
```

In your module's services file, add CookieStoreResolver with the commerce_store.store_resolver tag.

```YAML
cookie_store.cookie_store_resolver:
  class: Drupal\cookie_store\Resolver\CookieStoreResolver
  arguments: ['@entity_type.manager']
  tags:
    - { name: commerce_store.store_resolver, priority: 100 }
```
For more info about service tags: https://www.drupal.org/docs/8/api/services-and-dependency-injection/service-tags
ChainStoreResolver is a service_collector, and defines the commerce_store.store_resolver service tag. DefaultStoreResolver and CookieStoreResolver are services tagged with commerce_store.store_resolver. Note that CookieStoreResolver has a higher priority (100) than DefaultStoreResolver (-100), which allows it to override. Look at commerce_store.services.yml to see how this is defined.

! We need help filling out this section! Feel free to follow the *edit this page* link and contribute.
