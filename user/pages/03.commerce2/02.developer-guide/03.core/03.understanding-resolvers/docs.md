---
title: Understanding resolvers
taxonomy:
    category: docs
---

### Concept
In Drupal Commerce, a *Resolver* is a service that provides an "answer" to a potentially complex question. That question might be, "what is the price of this product?" (in a spectific context). A `PriceResolver` provides that answer. Or, "what series of steps should a customer take to move their order through the checkout process?" A `CheckoutFlowResolver` provides that answer. Drupal Commerce provides default resolvers, but custom resolvers can also be created, so it's possible to have multiple Price resolvers or multiple Checkout flow resolvers or multiples of other types of resolvers, all active at the same time on a site. So how do you know which Resolver is going to be used? That's the job of *Chain resolvers*.

Each type of Resolver has a special Resolver, called a *Chain resolver*. You can think of a Chain resolver as the "boss" of all the other resolvers of that type. When you want to know the Price of a product, for example, you go to the *Chain price resolver* to get the answer. And being an effective "boss", the Chain price resolver immediately delegates all the actual work to other Price resolvers. Chain resolvers never include the business logic needed to provide the answer. Instead, they simply go to the other Resolvers of that type, their "minions", and ask them one-at-a-time for the "answer". Once they get an answer, they stop asking and return that value as the result.

>Image of stick figures here

So that's the summary. You have a question that might require complex business logic to answer. You ask a chain resolver. That resolver asks all the other resolvers of that type, one-at-a-time, in a specific order, until they get an answer. For every type of resolver, there's a "default" resolver that gets "asked" last and always provides an answer.


### Structure
Drupal Commerce provides the following types of Resolvers, which will be described in greater detail in other documentation sections:
- CheckoutFlow
- Country
- Locale
- OrderType
- Price
- Store
- TaxRate

The Interface for a Resolver defines the `resolve()` method and its parameters. This is the method that returns the "answer" we're trying to find. Different types of resolvers will require different parameters. For example, a Checkout flow resolver requires an *Order* entity; a Tax rate resolver requires a *Tax zone* entity, an *Order item* entity, and a *Customer profile* entity.

So for our *Custom* resolver, we'll have a `CustomResolverInterface` with just the single method, with no parameters in this case:

```php
public function resolve();
```

The structure for all these types is identical, so let's just look at the structure for a generic `CustomResolver` resolver. First, each type of Resolver has its own Interface: `CustomResolverInterface` defines the `resolve()` method. 

In Drupal Commerce, Resolvers provide answers.
Price Resolver: I want to charge different prices in different situations. For example: one set of prices for wholesale customers, another set for all other customers.
Checkout Flow Resolver: I want the checkout process to vary based on properties of the order. For example: physical products vs. digital products vs. orders with a mix of product types.
Store resolver: I want to control which store is selected for a given customer.
Tax rate resolver: I want to charge different tax rates in different situations.

No, this is too confusing. 

Why does Drupal Commerce use chain resolvers. Commerce 2.x without Rules.  Different values in different scenarios. Business logic. blah blah.

I ask somebody to get me some information. That somebody is going to try to get it from X, Y, and Z, and there's a default value.
How do they work.
I want to buy my brother a gift, but I don't know what he wants for his birthday. So my plan is to ask several people in a specific order for an idea. If somebody has an idea, that's what I'll get my brother. I figure my brother's best friend probably knows him best, so I start there. He doesn't know what my brother wants, so I move on to our sister and then my father and then so on. If all else fails, I'll just ask my brother directly. He's the "default value" that will end my sequence of queries.


So I start by asking my brother's best friend. If he doesn't give me an answer, I move on and ask my sister. If she doesn't know, I ask my father. And so on. If nobody gives me an answer, I 

Explain our pattern of chain resolvers, since it is used often.

Link to documentation pages involving them.


### Links and resources
- [Apply a VAT rate on a product with Drupal Commerce 2](https://www.flocondetoile.fr/blog/apply-vat-rate-product-drupal-commerce-2)
- [Working with the Drupal Commerce 2 checkout flows](https://www.flocondetoile.fr/blog/working-drupal-commerce-2-checkout-flows)
- [Drupal 8 Documentation: Service Tags](https://www.drupal.org/docs/8/api/services-and-dependency-injection/service-tags)
- [Implementing a Checkout Flow resolver in Drupal Commerce 2.0](https://glamanate.com/blog/implementing-checkout-flow-resolver-drupal-commerce-20)