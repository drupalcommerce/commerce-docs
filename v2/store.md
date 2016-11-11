# Setting up stores

![Store landing page](images/store-landing-page.png)

For Commerce 2, we have native support for stores. Stores are used for invoicing, tax types, and any other settings necessary for understanding orders. This has many applications and its important to understand what use cases are supported out of the box and how that impacts checkout and other order workflows.

## Create a store

**Shortcut!** - The getting started process can be quickly done using Drupal Console command:

>`drupal commerce:create:store`
>![example workflow](images/drupal-commerce-create-store.gif)


## Overview & Architecture

![Store Entity Diagram. Stores are M:M for products and M:1 for Orders.](images/store-entity-diagram.png)

**Orders** will only ever have one store, and it is stored as an entity attribute.

* Carts \(which are Orders with additional functionality\) can only contain products from one store. 
* You can use this architecture to limit which products can be put into carts together, based on physical location or for billing\/taxes purposes.

**Products**, by default, have an entity reference field that targets stores and allows one or more stores to be selected.

**Stores** are fieldable content entities \(not configuration entities\) that contain a lot of information about the physical location of the merchant. By default stores collect the following:

* Name
* Email Address
* Default Currency
* Address \(used for determining taxes\)
* Supported billing countries
* Owner
* Default status \(used to select a store when one isn't given\)
* Tax information

## Use Cases

We optimize for the two use cases:

1. One business that has one or more locations

  **or**

2. The marketplace model \(where you have sellers\)


For these use cases and possibly others, it is up to the developer to fill in the gaps that are present in the order workflow. This is different from Commerce 1.x in that we will support stores by default, allowing for community contributions to extend the functionality instead of trying to build store functionality from scratch.

### 1. One or more locations

This is the most common eCommerce situation where we have a single person, company, or organization that is taking payments online.

### 2. Marketplace model

The marketplace model is where you have many sellers who are taking payment for unique products.

## Stores and Carts

A customer can have one or more Carts \(which are a type of Order\), if they have chosen a product from different stores.

