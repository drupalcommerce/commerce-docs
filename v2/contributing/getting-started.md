# Getting started

## Preparing the local environment

Start by setting up a web server, PHP and MySQL. <br>
We recommend [Drupal VM](http://www.drupalvm.com/) for advanced users, [Acquia Dev Desktop](https://www.acquia.com/products-services/dev-desktop) for beginners.

You will also need [Git](https://git-scm.com/) and [Composer](https://getcomposer.org/doc/00-intro.md#installation-linux-unix-osx).
Note that Drupal VM comes with Composer included.

## Getting Commerce

The following command will download Drupal 8 + Commerce 2.x with all dependencies to the `mystore` folder:

    composer create-project drupalcommerce/project-base mystore --prefer-source --stability dev

The --prefer-source option tells Composer to use Git clone as the download method.
When prompted, answer n to:

    Do you want to remove the existing VCS (.git, .svn..) history? [Y,n]?

This will keep the downloaded git repositories inside their parent folders (such as `web/modules/contrib/commerce`).

Tips:

- The `bin` folder contains [Drupal Console](https://drupalconsole.com) and [PHPUnit](https://phpunit.de/). <br>
- The `web` folder represents the document root. <br>
- Composer commands are always run from the site root (`mystore` in this case). <br>
- Downloading additional modules: `composer require "drupal/devel:1.x-dev"` <br>
- Updating an existing module: `composer update drupal/address` --with-dependencies

See the [project-base README](https://github.com/drupalcommerce/project-base/blob/8.x/README.md) for more details.

## Preparing your fork

**Note:** You will need a GitHub account for contributing.

Visit the Commerce [repository on GitHub](https://github.com/drupalcommerce/commerce) and click the **fork** button.
That will create a copy of the repository on your GitHub account.

Now go to the Commerce folder and add your fork:

    cd web/modules/contrib/commerce
    git remote add fork git@github.com:YOUR_USER/commerce.git

Replace YOUR_USER with your username (the full url is shown on your fork's GitHub page).

You will now be able to push new branches to your fork and create [pull requests](https://help.github.com/articles/using-pull-requests) against the main repository.

## Running tests

**Note:** You will need to install Drupal before running tests.

    cd mystore/web
    # Run only PHPUnit tests
    ../bin/phpunit -c core/ modules/contrib/commerce
    # Install the simpletest module to run all tests.
    ../bin/drupal module:install simpletest
    # Run all tests
    php core/scripts/run-tests.sh --verbose --concurrency 4 --url http://d8.d.dev "commerce"

Replace `http://d8.d.dev` with the url to your installation.
