---
title: Installing from scratch
taxonomy:
    category: docs
---

Your first step will be to perform a standard installation of Drupal 7.  For information on system requirements and database / file system configuration, please refer to the <a href="http://drupal.org/documentation/install">Installation guide</a> on drupal.org.

To install the Commerce modules, you need to download the latest versions of the following modules to your site's modules directory:

<ul>
<li><a href="http://drupal.org/project/addressfield">Address Field</a></li>
<li><a href="http://drupal.org/project/ctools">Chaos tool suite</a> (Views 3 dependency)</li>
<li><a href="http://drupal.org/project/entity">Entity API</a> (Rules 2 dependency)</li>
<li><a href="http://drupal.org/project/rules">Rules 2</a></li>
<li><a href="http://drupal.org/project/views">Views 3</a></li>
</ul>

Next you should download the latest version of Drupal Commerce to your site's modules directory.  You can find the latest supported release through the <a href="http://drupal.org/project/commerce">Drupal Commerce project page</a> (or get it from its <a href="http://drupal.org/project/commerce/git-instructions">Git repository</a> if you prefer).

With all of these modules in place, you can now enable the modules in the Commerce package on your module installation form.  Most sites will end up using most of the modules in the package, so for your first site you should just enable them all.  Note that advanced configurations may opt to not use the standard Cart module or provide a different administrative user interface.  The modular nature of Drupal Commerce supports this out of the box.

Once the modules have been enabled, you're ready to start configuring the Commerce components for your particular business needs.
