---
title: Installing using WampServer
taxonomy:
    category: docs
---

<div style="float: right; margin: 0 0 5px 10px"><a href="http://www.wampserver.com"><img src="http://www.drupalcommerce.org/sites/default/files/docs/wampserver.png" alt="wampserver & drupal commerce" border="0" /></a></div>

Installing Commerce Kickstart 2.x on a Windows Server running WampServer is a great way to get your shop up and going on the latest 64 bit server technology. There are a few pointers below to help you get the most out of this setup.

<strong>Software versions<strong>
<ul>
<li>Commerce Kickstart 7.x-2.6 (or latest)</li>
<li>Windows 7 Enterprise SP1 64-bit</li>
<li>WampServer (64-bit & PHP 5.3) 2.2E</li>
</ul>

What follows are two problem areas where we present the issue and our solution.

<h3>Enabling cURL for WampServer</h3>

The stock Drupal Commerce Kickstart 2.x enables a number of modules that require a cURL library, so it needs to be enabled. The curl library for the WampServer can be easily done by using the tray menu and selecting it from the list of PHP extensions. However, it never gets loaded properly because of an outdated dll file. We figured out this was the problem by examining the PHP error log. 

To enable a working version of the cURL extension (php_curl-5.3.13-VC9-x64.zip), you must first download the new extension from the end of <a href="http://www.anindya.com/php-5-4-3-and-php-5-3-13-x64-64-bit-for-windows">this blogpost</a> and replace the one at [path-to-wamp]\bin\php\php5.3.13\ext\.

<h3>WampServer & Error 101 (XDebug issues)</h3>
Symptom: The page doesn’t load sometimes and the browser displays the following error:
Error 101 (net::ERR_CONNECTION_RESET) Additionally, items like these appear in the Apache error log.

Solution: Disable XDebug to avoid the error by manually editing php.ini. You can do this by searching the php.ini file found at path-to-wamp\bin\apache\apache2.2.22\bin\ for the word “xdebug” and commenting out the appropriate lines. Be sure to restart your server for the configuration to take effect.

Drupal.org issues which might be related:

<ul>
<li>http://drupal.org/node/1855800</li>
<li>http://drupal.org/node/1773742</li>
<li>http://drupal.org/node/1648992</li>
</ul>