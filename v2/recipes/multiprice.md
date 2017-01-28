# Multiprice and multicurrency

We want to define a specific price and currency for each language. 

## Adding languages

Enable language module and add French and Japanese languages.

## Creating field

We need as many commerce_price fields as currency in product variation in place of default price field.

Add following fields in a custom module or add your own commerce_price fields to product variation.

```yaml
# config/install/field.field.commerce_product_variation.default.price_eur.yml
langcode: en
status: true
dependencies:
  config:
    - commerce_product.commerce_product_variation_type.default
    - field.storage.commerce_product_variation.price_eur
  module:
    - commerce_price
id: commerce_product_variation.default.price_eur
field_name: price_eur
entity_type: commerce_product_variation
bundle: default
label: Price EUR
description: 'Define price for EUR currency'
required: true
translatable: false
default_value: {  }
default_value_callback: ''
settings:
  available_currencies:
    - 'EUR'
field_type: commerce_price
```

```yaml
# config/install/field.storage.commerce_product_variation.price_eur.yml
langcode: en
status: true
dependencies:
  module:
    - commerce_price
    - commerce_product
id: commerce_product_variation.price_eur
field_name: price_eur
entity_type: commerce_product_variation
type: commerce_price
settings: {  }
module: commerce_price
locked: false
cardinality: 1
translatable: true
indexes: {  }
persist_with_no_fields: false
custom_storage: false
```

```yaml
# config/install/field.field.commerce_product_variation.default.price_usd.yml
langcode: en
status: true
dependencies:
  config:
    - commerce_product.commerce_product_variation_type.default
    - field.storage.commerce_product_variation.price_usd
  module:
    - commerce_price
id: commerce_product_variation.default.price_usd
field_name: price_usd
entity_type: commerce_product_variation
bundle: default
label: Price USD
description: 'Define price for USD currency'
required: true
translatable: false
default_value: {  }
default_value_callback: ''
settings:
  available_currencies:
    - 'USD'
field_type: commerce_price
```

```yaml
# config/install/field.storage.commerce_product_variation.price_usd.yml
langcode: en
status: true
dependencies:
  module:
    - commerce_price
    - commerce_product
id: commerce_product_variation.price_usd
field_name: price_usd
entity_type: commerce_product_variation
type: commerce_price
settings: {  }
module: commerce_price
locked: false
cardinality: 1
translatable: true
indexes: {  }
persist_with_no_fields: false
custom_storage: false
```

```yaml
# config/install/field.field.commerce_product_variation.default.price_jpy.yml
langcode: en
status: true
dependencies:
  config:
    - commerce_product.commerce_product_variation_type.default
    - field.storage.commerce_product_variation.price_jpy
  module:
    - commerce_price
id: commerce_product_variation.default.price_jpy
field_name: price_jpy
entity_type: commerce_product_variation
bundle: default
label: Price JPY
description: 'Define price for JPY currency'
required: true
translatable: false
default_value: {  }
default_value_callback: ''
settings:
  available_currencies:
    - 'JPY'
field_type: commerce_price
```

```yaml
# config/install/field.storage.commerce_product_variation.price_jpy.yml
langcode: en
status: true
dependencies:
  module:
    - commerce_price
    - commerce_product
id: commerce_product_variation.price_jpy
field_name: price_jpy
entity_type: commerce_product_variation
type: commerce_price
settings: {  }
module: commerce_price
locked: false
cardinality: 1
translatable: true
indexes: {  }
persist_with_no_fields: false
custom_storage: false
```

* Hide default price field from product variation form display.
* Display default price field format to 'Calculated price' in display mode.
 
## Creating resolver

### Add resolver to services

```yaml
services:
  commerce_multiprice_example.commerce_multicurrency_resolver:
    class: Drupal\commerce_multiprice_example\Resolvers\CommerceMulticurrencyResolver
    arguments: ['@language_manager']
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
   * The language manager.
   *
   * @var \Drupal\Core\Language\LanguageManagerInterface
   */
  protected $languageManager;

  /**
   * Constructs a new CommerceMulticurrencyResolver object.
   *
   * @param \Drupal\Core\Language\LanguageManagerInterface $language_manager
   *   The language manager.
   */
  public function __construct(LanguageManagerInterface $language_manager) {
    $this->languageManager = $language_manager;
  }

  /**
   * {@inheritdoc}
   */
  public function resolve(PurchasableEntityInterface $entity, $quantity, Context $context) {
    // Define mapping between language and currency.
    $currency_by_language = ['en' => 'USD', 'fr' => 'EUR', 'ja' => 'JPY'];

    // Get current language.
    $language = $this->languageManager->getCurrentLanguage()->getId();

    // Get value from currency price field.
    if ($entity->hasField('price_' . strtolower($currency_by_language[$language]))) {
      $price = $entity->get('price_' . strtolower($currency_by_language[$language]))->getValue();
      $price = reset($price);

      return new Price($price['number'], $price['currency_code']);
    }
  }
}
```

