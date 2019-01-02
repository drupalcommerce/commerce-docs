---
title: Price calculation
taxonomy:
    category: docs
---

! We need help filling out this section! Feel free to follow the *edit this page* link and contribute.

Explain new price resolving and order refresh.

Price resolving is base price.

Order refresh allows adding adjustments.

---

*How to create your own price resolver*

You can implement your own price resolver by implementing interface `\Drupal\commerce_price\Resolver\PriceResolverInterface`.

1) Add new service to your `module.services.yml`:

```yml
services:
  my_module.commerce_price.advanced_price_resolver:
    class: Drupal\my_module\Resolver\AdvancedPriceResolver
    tags:
      - { name: commerce_price.price_resolver, priority: -50 }
```

2) Copy class `\Drupal\commerce_price\Resolver\DefaultPriceResolver` to your module and be free to modify it for you needs.

*Chaining resolvers*

In the comment for `\Drupal\commerce_price\Resolver\PriceResolverInterface::resolve()` you may find interesting fact that it possible that only first price resolver will be used during price calculation if it returns valid price object.

But because `DefaultPriceResolver` always returns price you have to set higher priority for your custom price resolvers. Return `null` if you want to use default price calculation for item.
