---
title: Overview
taxonomy:
    category: docs
---

The [Profile module] is a contributed Drupal module that is required by Drupal Commerce yet maintained separately from the core Drupal Commerce module. When you manage your Drupal Commerce site using [Composer](../../../../01.getting-started/01.using-composer), the *Profile* module will be automatically added to your project.

*Profiles* are fieldable entities that represent a set of user information. The *Drupal Commerce* module provides one specific profile type, called the *Customer profile*. *Customer* profiles are used to collect customer information necessary for billing, payment, and shipping. Each *Customer* profile has a single address and can optionally include other information like phone number or contact name.

#### Address book
A customer can have an *address book* of multiple stored addresses, which is actually just the collection of *Customer* profiles owned by that customer. One of these stored addresses is designated as the *default* profile. For each profile types, there is one *default* profile per user. For example, this customer named *John Smith* has his home address as his *default* customer profile and a second address, for a relative, stored in an additional profile:

![Address book](../../images/profile-overview-1.png)


- where does profile appear within checkout process, show "Billing information" pane image for checkout. Address plus additional field.

- usage for payments
- profiles vs user accounts: profile includes anything needed for billing/shipping business logic, revisionable, multiple variations per customer. User information is the same for all profiles, things like age, gender, etc. Doesn't change on a per-order or per-profile basis.

- profile is not translatable


[Profile module]: https://www.drupal.org/project/profile
