---
title: Getting ready for development
taxonomy:
    category: docs
---

Getting ready for development
=============================

Preparing the local environment
-------------------------------

Start by setting up a web server, PHP and MySQL. We recommend `Drupal VM`_ for
advanced users, `Acquia Dev Desktop`_ for beginners.

You will also need `Git`_ and `Composer`_. Note that Drupal VM comes with Composer included.

Getting Commerce
----------------

The following command will download Drupal 8 + Commerce 2.x with all
dependencies to the ``mystore`` folder:

.. code-block:: terminal

    composer create-project drupalcommerce/project-base mystore --prefer-source --stability dev

| The –prefer-source option tells Composer to use Git clone as the
  download method.
| When prompted, answer n to:

.. code-block:: terminal

    Do you want to remove the existing VCS (.git, .svn..) history? [Y,n]?

This will keep the downloaded git repositories inside their parent folders (such
as ``web/modules/contrib/commerce``).

Tips:

-  The ``bin`` folder contains `Drupal Console`_ and `PHPUnit`_.
-  The ``web`` folder represents the document root.
-  Composer commands are always run from the site root (``mystore`` in this case).
-  Downloading additional modules: ``composer require "drupal/devel:1.x-dev"``
-  Updating an existing module: ``composer update drupal/address –with-dependencies``

See the `project-base README`_ for more details.

Preparing your fork
-------------------

**Note:** You will need a GitHub account for contributing.

Visit the Commerce `repository on GitHub`_ and click the **fork** button. That
will create a copy of the repository on your GitHub account.

Now go to the Commerce folder and add your fork:

.. code-block:: terminal

    cd web/modules/contrib/commerce
    git remote add fork git@github.com:YOUR_USER/commerce.git

Replace YOUR\_USER with your username (the full url is shown on your
fork’s GitHub page).

You will now be able to push new branches to your fork and create `pull requests`_
against the main repository.

Running tests
-------------

All of the Drupal Commerce tests are based on the PHPUnit framework. In
order to run the tests you will need to copy the ``phpunit.xml.dist``
from the core directory and modify it for your environment. An in depth
article on getting ready to run the tests can be found here:
https://drupalcommerce.org/blog/45322/commerce-2x-unit-kernel-and-functional-tests-oh-my

.. code-block:: terminal

    cd mystore/web
    # Run PHPUnit tests
    ../bin/phpunit -c core/phpunit.xml modules/contrib/commerce

.. _Drupal VM: http://www.drupalvm.com/
.. _Acquia Dev Desktop: https://www.acquia.com/products-services/dev-desktop
.. _Git: https://git-scm.com/
.. _Composer: https://getcomposer.org/doc/00-intro.rst#installation-linux-unix-osx
.. _Drupal Console: https://drupalconsole.com
.. _PHPUnit: https://phpunit.de/
.. _project-base README: https://github.com/drupalcommerce/project-base/blob/8.x/README.md
.. _repository on GitHub: https://github.com/drupalcommerce/commerce
.. _pull requests: https://help.github.com/articles/using-pull-requests
