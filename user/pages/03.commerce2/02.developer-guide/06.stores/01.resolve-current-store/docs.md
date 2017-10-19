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
use Drupal\commerce_store\Entity\Store;
use Symfony\Component\HttpFoundation\RequestStack;

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
   * The request stack.
   *
   * @var \Symfony\Component\HttpFoundation\RequestStack
   */
  protected $requestStack;

  /**
   * Constructs a new CookieStoreResolver object.
   *
   * @param \Drupal\Core\Entity\EntityTypeManagerInterface $entity_type_manager
   *   The entity type manager.
   * @param \Symfony\Component\HttpFoundation\RequestStack $request_stack
   *   The request stack.
   */
  public function __construct(EntityTypeManagerInterface $entity_type_manager RequestStack $request_stack) {
    $this->storage = $entity_type_manager->getStorage('commerce_store');
  }

  /**
   * {@inheritdoc}
   */
  public function resolve() {
      $current_request = $this->requestStack->getCurrentRequest();
      $store_id = current_request->cookies->get('Drupal_visitor_store_id');

      if ($store_id) {
          $store = $this->storage->load($store_id);
          return $store;
      }
  }
}
```

In your module's services file, add CookieStoreResolver with the `commerce_store.store_resolver` tag.

```YAML
cookie_store.cookie_store_resolver:
  class: Drupal\cookie_store\Resolver\CookieStoreResolver
  arguments: ['@entity_type.manager', '@request_stack']
  tags:
    - { name: commerce_store.store_resolver, priority: 100 }
```

For more info about service tags: https://www.drupal.org/docs/8/api/services-and-dependency-injection/service-tags.

ChainStoreResolver is a `service_collector`, and defines the `commerce_store.store_resolver` service tag. DefaultStoreResolver and CookieStoreResolver are services tagged with `commerce_store.store_resolver`. 

Note that CookieStoreResolver has a higher priority (100) than DefaultStoreResolver (-100), which allows it to override. Look at `commerce_store.services.yml` to see how this is defined. Having a higher priority means that the CookieStoreResolver has the first opportunity to determine the current store.

For more information about resolvers, see [Understanding resolvers](../../03.core/03.understanding-resolvers)
