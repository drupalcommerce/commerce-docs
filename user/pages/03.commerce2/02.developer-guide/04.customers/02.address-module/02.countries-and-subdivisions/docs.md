---
title: Countries and Subdivisions
taxonomy:
    category: docs
---

The Address module provides a custom *Country* field type along with a custom form element, default formatter, and default widget. Country data is stored internally using standard 2-letter codes. Country codes are limited to the list of available countries.

### What is the list of available countries and how can I change it?
The *Commerce Guys Addressing library* provides a list of countries, with translations for over 250 locales. This library is a requirement for the Drupal Address Module (and part of the reason why you ought to use Composer to manage your Drupal Commerce project). The dataset is stored locally in JSON format. For the actual list, see the *CountryRepository* class: `commerceguys/addressing/src/Country/CountryRepository.php`. The *CountryRepository* class provides methods to retrieve this country data. Within the *Address* module, the *CountryRepository* service extends the *CountryRepository* class provided by the Addressing library and manages the cache backend.

Whenever a field type wants to provide a list of *available* countries for a select list, it can use the ***AvailableCountriesTrait*** and its ***getAvailableCountries()*** method. The Address module's *country*, *zone*, and *address* fields all use the *AvailableCountriesTrait*. You can customize the list of countries returned by the *AvailableCountriesTrait* by subscribing to the `AddressEvents::AVAILABLE_COUNTRIES` event. Here is a simple example of an event subscriber for the available countries event:

```php
<?php

namespace Drupal\my_module\EventSubscriber;

use Drupal\address\Event\AddressEvents;
use Drupal\address\Event\AvailableCountriesEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class AddressTestEventSubscriber implements EventSubscriberInterface {

  /**
   * {@inheritdoc}
   */
  public static function getSubscribedEvents() {
    $events[AddressEvents::AVAILABLE_COUNTRIES][] = ['onAvailableCountries'];
    return $events;
  }

  /**
   * Alters the available countries.
   *
   * @param \Drupal\address\Event\AvailableCountriesEvent $event
   *   The available countries event.
   */
  public function onAvailableCountries(AvailableCountriesEvent $event) {
  	$countries = ['AU' => 'AU', 'BR' => 'BR', 'CA' => 'CA', 'GB' => 'GB', 'JP' => 'JP'];
    $event->setAvailableCountries($countries);
  }

}
```

#### How do I set the default country for customers?
*Default country* is a setting for the default *Address* widget. To set the default country for customers, you need to configure the *Form display* for the *Customer* profile type. This administration page is located at `/admin/config/people/profiles/manage/customer/form-display`. Click on the gear for the Address field to alter the setting:

![Admin ui for default country](../../images/address-countries-1.png)

### Country subdivisions
A country can have several levels of subdivisions that are used for addressing. In the United States that would be the state. In Brazil it would be the state and the municipality. In China it would be the province, the prefecture-level city, and the county.

>TODO: fix this.

A user friendly address form would provide dropdowns for these subdivisions, thus speeding up the data entry process and reducing mistakes. Of course, the hard part is gathering the data for every country, which is why most sites only do this for the United States and / or the local market.

Subdivision data is provided by the Commerce Guys addressing library. Subdivisions are hierarchcial, with up to 3 levels: Administrative area -> Locality -> Dependent locality. For each level, there is a set list of options that is used to populate form select lists (dropdown menus). For example, both Australia and the United States have a single level of subdivisions, called *States*. If *United States* is selected as the country, then its 50 states and additional territories appear as *State* options. If *Australia* is selected, then its 8 state/territory options are displayed:

![Australian subdivisions](../../images/address-countries-2.png)

South Korea is an example of a country with an additional level of subdivisions. Once an administrative area, labeled *Do si*, is selected, a list of locality (City) options appears:

![South Korean subdivisions](../../images/address-countries-3.png)

The dataset is stored locally in JSON format. For the actual list, see `commerceguys/addressing/resources/subdivision`.


#### Why is country X missing subdivisions?
The Commerce Guys addressing data set only includes subdivisions that are required for addressing.

### How do I add or modify subdivisions for a country?
In the Commerce Guys addressing module, the *SubdivisionRepository* class provides methods to retrieve the subdivision data. Within the *Address* module, the *SubdivisionRepository* service extends the *SubdivisionRepository* class provided by the Addressing library and manages the cache backend. You can modify the subdivision data returned for a specific country by subscribing to the `AddressEvents::SUBDIVISIONS` event. The Address module includes an example *subdivisions* event subscriber in its text code. See `address/tests/modules/address_test/src/EventSubscriber/GreatBritainEventSubscriber.php`. In this example, a county field and a predefined list of counties are added for Great Britain.


### Links and resources:
* [Wikipedia page on Administrative division (country subdivision)](https://en.wikipedia.org/wiki/Administrative_division)
