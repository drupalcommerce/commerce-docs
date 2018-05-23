---
title: Quickstart with ddev
taxonomy:
    category: docs
---

**Installing Commerce to contribute back?** Check out our [Getting ready for development](../04.contributing/01.development-environment) guide.

Requirements

 -Commerce 2.x requires Drupal 8.5.0 or newer.
 -Install [Composer].
 -Install [ddev]


 ## Create your Drupal Commerce project.

 The following command will download Drupal 8 + Commerce 2.x with all
 dependencies to the `mystore` folder:

 ```bash
 composer create-project drupalcommerce/project-base mystore --stability dev
 ```

 ## Configure ddev for local development.
 Navigate to the project directory (which is 'mystore', unless you changed it
 in the above command).

 Configure ddev:
 ```bash
 ddev config
 ```

 When prompted:
   Leave the project name set to the name of your project directory (mystore).
   Leave the docroot location set to 'web'.
   Leave the project type set to 'drupal8'.

 At this point, you can start up your project environment. However, you may
 want to first change the http and https ports for your site, which are 80 and
 443 by default. If these ports are already in use on your machine, you will
 get the following error message:

>  Failed to start commerce-docs: Unable to listen on required ports, localhost
>  port 80 is in use, Troubleshooting suggestions at
>  https://ddev.readthedocs.io/en/latest/users/troubleshooting/#unable-listen

 To change the ports used by ddev, open the file `.ddev/config.yaml` in your
 project. Edit the `router_http_port` and `router_https_port` values and save
 the file.

 Start running your project:
 ```bash
 ddev start
 ```

 When the project successfully starts, you will be given the address for your
 new site. For example: `http://mystore.ddev.local:8080`. Copy and paste your
 site address into a browser.

 ## Install Drupal 8
 The first time you access your site, you will be asked for some basic
 configuration information. For the database configuration, use `ddev describe`
 to view your MySQL Credentials:

 ```bash
 MySQL Credentials
 -----------------
 Username:     	db
 Password:     	db
 Database name:	db
 Host:         	db
 Port:         	3306
 ```
 Note that you need to open the 'Advanced options' section of the form to
 enter the `Host`.

 ## Getting started
 The very first thing you'll want to do to get started with Drupal
 Commerce is to create a store. Under the Commerce menu in the toolbar,
 navigate to Configuration > Store > Stores and click the `Add store` button.
 Once you've created a store, you'll be able to create products and start
 developing the rest of your site.

![create_new_store](../images/create-new-store.jpg)

 Tips:

  - Composer commands are always run from the site root (`mystore` in this case).
  - Downloading additional modules:   `composer require "drupal/devel:1.x-dev"`
  - Updating an existing module: `composer update drupal/address -–with-dependencies`

 See the `project-base README`_ for more details.


 [ddev]: https://www.drud.com/what-is-ddev/
 [Composer]: https://getcomposer.org/
 [Drupal Console]: https://drupalconsole.com
 [project-base README]: https://github.com/drupalcommerce/project-base/blob/8.x/README.md
