# Multiprice and multicurrency

We want to define a specific price and currency for each language. 

We need a new multiple commerce_price field in product variation in place of default price field.

Add following field in a custom module or add your own multiple commerce_price field to product variation.

## Creating field
```yaml
# config/install/field.field.commerce_product_variation.default.multiprice.yml
langcode: en
status: true
dependencies:
  config:
    - commerce_product.commerce_product_variation_type.default
    - field.storage.commerce_product_variation.multiprice
  module:
    - commerce_price
id: commerce_product_variation.default.multiprice
field_name: multiprice
entity_type: commerce_product_variation
bundle: default
label: Multiprice
description: 'Define differents prices depending of currency'
required: true
translatable: false
default_value: {  }
default_value_callback: ''
settings: {  }
field_type: commerce_price
```

```yaml
# config/install/field.storage.commerce_product_variation.multiprice.yml
langcode: en
status: true
dependencies:
  module:
    - commerce_price
    - commerce_product
id: commerce_product_variation.multiprice
field_name: multiprice
entity_type: commerce_product_variation
type: commerce_price
settings: {  }
module: commerce_price
locked: false
cardinality: -1
translatable: true
indexes: {  }
persist_with_no_fields: false
custom_storage: false
```

* Hide default price field from product variation form display and display mode.
* Display multiprice field in form display and display mode.
 
## Creating resolver

### Add resolver to services

```yaml
services:
  commerce_multiprice_example.commerce_multicurrency_resolver:
    class: Drupal\commerce_multiprice_example\Resolvers\CommerceMulticurrencyResolver
    arguments: ['@request_stack']
    tags:
      - { name: commerce_price.price_resolver, priority: 600 }
```

### Creating resolver

Replace multiprice field name by your own field if needed.

```php
<?php
namespace Drupal\commerce_multiprice_example\Resolvers;

use Drupal\commerce\Context;
use Drupal\commerce\PurchasableEntityInterface;
use Drupal\commerce_price\Price;
use Drupal\commerce_price\Resolver\PriceResolverInterface;

/**
 * Returns a price and currency depending of language.
 */
class CommerceMulticurrencyResolver implements PriceResolverInterface {

  /**
   * {@inheritdoc}
   */
  public function resolve(PurchasableEntityInterface $entity, $quantity, Context $context) {
    // Define mapping between language and currency.
    $currency_by_language = ['en' => 'USD', 'fr' => 'EUR', 'ja' => 'JPY'];

    // Get current language.
    $language = \Drupal::languageManager()->getCurrentLanguage()->getId();

    // Get default language.
    $default_language = \Drupal::languageManager()->getDefaultLanguage()->getId();

    // Set default price to null. Default price will be used to return currency
    // of default language if no currency has been found for current language.
    $default_price = NULL;

    // Find price for current language depending of its currency.
    foreach ($entity->get('multiprice') as $price) {
      if ($price->get('currency_code')->getValue() == $currency_by_language[$language]) {
        return new Price($price->get('number')->getValue(), $price->get('currency_code')->getValue());
      }
      elseif ($price->get('currency_code')->getValue() == $currency_by_language[$default_language]) {
        $default_price = new Price($price->get('number')->getValue(), $price->get('currency_code')->getValue());
      }
    }

    return $default_price;
  }
}
```

