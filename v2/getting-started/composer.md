# Composer: the what, why, and how

## What is Composer?
**[Composer](https://getcomposer.org/)** is a tool for managing dependencies on the project level, a project being your site or web application. It has become the de facto dependency management tool for PHP. Composer allows PHP developers to easily build standalone distributable libraries that can be shared and integrated by others. This is possible in part by the PHP Framework Interoperability Group (FIG) and [PSR-4](http://www.php-fig.org/psr/psr-4/) for autoloading of class files. 

> Dependency management is not a new concept and not alone to PHP. NPM for NodeJS, Bower for front end libraries, Bundler/Gems for Ruby, PIP for Python, Maven for Java and so forth. 

If you’ve ever used [Drush](http://www.drush.org/en/master/) Make to download Drupal modules and themes, then all of this sounds familiar. You can think of Composer as the more advanced Drush Make that works for all PHP projects and packages. Compared to Drush Make, Composer has the benefit of being able to recursively resolve dependencies (downloading the dependencies of each dependency) and being able to detect conflicts.

## Why does Commerce need it?

Commerce utilizes various [libraries and dependencies](v2/building-blocks/index.md). Without Composer and the generated class autoloader you cannot use Commerce. The libraries we depend on will not be available, even if manually installed.

Composer also enables version constraints and prevents dependency conflicts. Without Composer there is no way to tell our users “make sure you also update this dependency as well.” 

This also means less work for you.

## How to use it

### [composer.json](https://getcomposer.org/doc/04-schema.md)
The `composer.json` file defines metadata about the project and dependencies for the project.

### [composer.lock](https://getcomposer.org/doc/01-basic-usage.md#composer-lock-the-lock-file)
The `composer.lock` file contains computed information about dependencies and expected install state.

### [composer install](https://getcomposer.org/doc/03-cli.md#install)
The `composer install` command will download and install dependencies. The install command will install off of lock file. However, if no lock file is available it will act as the update command.

The command will regenerate the class autoloader.

### [composer update](https://getcomposer.org/doc/03-cli.md#update)
The `composer update` command resolves dependencies and generates the `composer.lock` file. The update command will update dependencies to their latest versions.

The command will regenerate the class autoloader.
### [composer require](https://getcomposer.org/doc/03-cli.md#require)
The `composer require` command adds a new dependency to your project. This will update the `composer.json` and `composer.lock` files and regenerate the class autoloader.

If the new dependency has any conflicts with other dependencies, such as incompatible shared dependencies, it will not install.

### [composer remove](https://getcomposer.org/doc/03-cli.md#remove)
The `composer remove` command removes a new dependency to your project. This will update the `composer.json` and `composer.lock` files and regenerate the class autoloader.

If the dependency is required by another package, it will not be removed.

## Links and resources

*  [Managing Your Drupal Project with Composer](https://glamanate.com/blog/managing-your-drupal-project-composer), [slides version](https://docs.google.com/presentation/d/1PK9q2dBkGHfyEO76bEVpqS61wTgA0LGbru2PECiwUnk/edit?usp=sharing)
* [Drupal Commerce project template](https://github.com/drupalcommerce/project-base)
* [Drupal Composer project template](https://github.com/drupal-composer/drupal-project)
* [Platform.sh Drupal 8 + Composer template example](https://github.com/platformsh/platformsh-example-drupal8)
* [Amazee Labs Composer recipes](https://www.amazeelabs.com/en/blog/drupalcomposerrecipes)
* [Using Drupal + Composer project templates with Pantheon sites](https://pantheon.io/blog/using-composer-relocated-document-root-pantheon)
* [Using Composer - Drupal.org](https://www.drupal.org/docs/develop/using-composer)