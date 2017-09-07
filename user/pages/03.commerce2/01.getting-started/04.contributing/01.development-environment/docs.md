---
title: Getting ready for development
taxonomy:
    category: docs
---


## Preparing the local environment

Start by setting up a web server, PHP and MySQL. We recommend [Drupal VM] for
advanced users, [Acquia Dev Desktop] for beginners.

You will also need [Git] and [Composer]. Note that Drupal VM comes with Composer included.

## Getting Commerce

The following command will download Drupal 8 + Commerce 2.x with all
dependencies to the `mystore` folder:

```bash
composer create-project drupalcommerce/project-base mystore --prefer-source --stability dev
```

The –prefer-source option tells Composer to use Git clone as the download method. 

When prompted, answer n to:

```text
Do you want to remove the existing VCS (.git, .svn..) history? [Y,n]? n
```

This will keep the downloaded git repositories inside their parent folders (such
as ``web/modules/contrib/commerce``).

Tips:

-  The ``bin`` folder contains [Drupal Console] and [PHPUnit].
-  The ``web`` folder represents the document root.
-  Composer commands are always run from the site root (``mystore`` in this case).
-  Downloading additional modules: ``composer require "drupal/devel:1.x-dev"``
-  Updating an existing module: ``composer update drupal/address –with-dependencies``

See the [project-base README] for more details.

## Preparing your fork

**Note:** You will need a GitHub account for contributing.

Visit the Commerce [repository on GitHub] and click the **fork** button. That
will create a copy of the repository on your GitHub account.

Now go to the Commerce folder and add your fork:

```bash
cd /path/to/mystore
cd web/modules/contrib/commerce
git remote add fork git@github.com:YOUR_USER/commerce.git
```

Replace YOUR\_USER with your username (the full url is shown on your
fork’s GitHub page).

You will now be able to push new branches to your fork and create [pull requests]
against the main repository.

## Running tests

All of the Drupal Commerce tests are based on the PHPUnit framework. In
order to run the tests you will need to copy the ``phpunit.xml.dist``
from the core directory and modify it for your environment. An in depth
article on getting ready to run the tests can be found here:
https://drupalcommerce.org/blog/45322/commerce-2x-unit-kernel-and-functional-tests-oh-my

```bash
cd /path/to/mystore/web
# Run PHPUnit tests
../bin/phpunit -c core/phpunit.xml modules/contrib/commerce
```

[Drupal VM]: http://www.drupalvm.com/
[Acquia Dev Desktop]: https://www.acquia.com/products-services/dev-desktop
[Git]: https://git-scm.com/
[Composer]: https://getcomposer.org/doc/00-intro.rst#installation-linux-unix-osx
[Drupal Console]: https://drupalconsole.com
[PHPUnit]: https://phpunit.de/
[project-base README]: https://github.com/drupalcommerce/project-base/blob/8.x/README.md
[repository on GitHub]: https://github.com/drupalcommerce/commerce
[pull requests]: https://help.github.com/articles/using-pull-requests
