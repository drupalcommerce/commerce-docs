---
title: Cart Events
taxonomy:
    category: docs
---

If you want to customize the Cart functionality of your site, Drupal Commerce provides a full range of "events" for your custom functionality and contrib modules to react to. See also, [Commerce Without Rules]((https://docs.drupalcommerce.org/commerce2/developer-guide/adapting-from-1x/commerce-without-rules)).

The events use Drupal's standard [Symphony based event system](https://www.drupal.org/docs/8/creating-custom-modules/subscribe-to-and-dispatch-events#s-event-systems-overview). So a solid understanding of that is useful. Events are defined in `\Drupal\commerce_cart\Event\CartEvents`.

Events provided:
- `CartEvents::CART_EMPTY`: Fired after emptying the cart.
- `CartEvents::CART_ENTITY_ADD`: Fired after adding a purchasable entity to the cart.
- `CartEvents::CART_ORDER_ITEM_UPDATE`: Fired after updating an order item.
- `CartEvents::CART_ORDER_ITEM_REMOVE`: Fired after removing an order item form the cart.
- `CartEvents::CART_ITEM_COMPARISON_FIELDS`: Fired when altering the list of comparison fields - comparison fields is how Drupal commerce determines when you add an item to the cart if it can be combined with an existing item.

## Basic Example

This adds a related product when a specified product is added. For the purpose of this example, we used a hardcoded entity ID of a specific Product Variation. Under most situations dynamic IDs that an administrator can configure per product/variation will allow more control. See also, [Commerce Product Add-on](https://www.drupal.org/project/commerce_pado) contrib module.

`modulename.services.yml`
```yaml
services:
  modulename.event_subscriber:
    class: Drupal\modulename\EventSubscriber\CartEventSubscriber
    arguments: ['@messenger', '@commerce_cart.cart_manager']
    tags:
      - { name: event_subscriber }
```

`CartEventSubscriber.php`
```php
<?php

namespace Drupal\modulename\EventSubscriber;

use Drupal\commerce_cart\CartManagerInterface;
use Drupal\commerce_cart\Event\CartEntityAddEvent;
use Drupal\commerce_cart\Event\CartEvents;
use Drupal\commerce_product\Entity\ProductVariation;
use Drupal\Core\Messenger\MessengerInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;


/**
 * Cart Event Subscriber.
 */
class CartEventSubscriber implements EventSubscriberInterface {

  /**
   * The messenger.
   *
   * @var \Drupal\Core\Messenger\MessengerInterface
   */
  protected $messenger;

  /**
   * The cart manager.
   *
   * @var \Drupal\commerce_cart\CartManagerInterface
   */
  protected $cartManager;

  /**
   * Constructs event subscriber.
   *
   * @param \Drupal\Core\Messenger\MessengerInterface $messenger
   *   The messenger.
   */
  public function __construct(MessengerInterface $messenger, CartManagerInterface $cart_manager) {
    $this->messenger = $messenger;
    $this->cartManager = $cart_manager;
  }

  /**
   * {@inheritdoc}
   */
  public static function getSubscribedEvents() {
    return [
      CartEvents::CART_ENTITY_ADD => [['addToCart', 100]]
    ];
  }

  /**
   * Add a related product automatically
   *
   * @param \Drupal\commerce_cart\Event\CartEntityAddEvent $event
   *   The cart add event.
   *
   * @throws \Drupal\Core\TypedData\Exception\ReadOnlyException
   */
  public function addToCart(CartEntityAddEvent $event) {
    /** @var \Drupal\commerce_product\Entity\ProductVariationInterface $product_variation */
    $product_variation = $event->getEntity();
    if ($product_variation->getSku() === 'some_sku') {
      $cart = $event->getCart();
      
      // Load a known other product variation.
      $variation = ProductVariation::load(5);
      
      // Create a new order item based on the loaded variation.
      $new_order_item = $this->cartManager->createOrderItem($variation);
      $new_order_item->setQuantity(1);
      
      // Add it to the cart.
      $this->cartManager->addOrderItem($cart, $new_order_item);
     
    }
  }

}

```
