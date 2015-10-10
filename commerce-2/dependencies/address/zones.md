# Zones
See Also: [Zone Library](https://github.com/commerceguys/zone) &nbsp; | &nbsp; [Addressing Library](https://github.com/commerceguys/addressing) &nbsp; | &nbsp; [Address Drupal Module](https://www.drupal.org/project/address)

## Overview
[![Build Status](https://travis-ci.org/commerceguys/zone.svg?branch=master)](https://github.com/commerceguys/zone)

A PHP 5.4+ zone management library that is included using Composer Manager in Drupal 8. Requires [commerceguys/addressing](https://github.com/commerceguys/addressing).

Zones are territorial groupings mostly used for shipping or tax purposes.
For example, a set of shipping rates associated with a zone where the rates
become available only if the customer's address matches the zone.

A zone can match other zones, countries, subdivisions (states/provinces/municipalities), postal codes.
Postal codes can also be expressed using ranges or regular expressions.

Examples of zones:
- California and Nevada
- Belgium, Netherlands, Luxemburg
- European Union
- Germany and a set of Austrian postal codes (6691, 6991, 6992, 6993)
- Austria without specific postal codes (6691, 6991, 6992, 6993)

## Configuring Zones

Zones may be a PHP library, but the Address module uses it to help grouping of certain areas. This can be used for shipping pricing or taxes. Often tax zones are simplified to a specific country, where in reality they include most of a country and exclude a few regions and include a few others. 

To locate Zones in your Drupal Commerce install, (1) click on Configuration and (2) click on Zones:

![Navigate to zones](images/zones-navigate.png)

Often you will not be creating zones directly, though you can easily click on "Add a new zone" and create one. As of the time of this writing, the interfaces and how to actually create zones is still in flux.

## Taxes and Zones

The Commerce Tax module (that comes with Commerce 2) comes with zones that are predefined for all of the countries' tax rates and tax zones. For example, when you import the Serbian VAT rate, it comes with a tax zone that automatically includes Belgrade. 

