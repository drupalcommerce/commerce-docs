# Composer: the what, why, and how

## What is Composer?
**[Composer](https://getcomposer.org/)** is the de facto dependency management tool for PHP. Composer allows PHP developers to easily build standalone distributable libraries that can be shared and integrated by others. This is possible in part by the PHP Framework Interoperability Group (FIG) and [PSR-4](http://www.php-fig.org/psr/psr-4/) for autoloading of class files. 

[PEAR](http://pear.php.net/) is another management tool, however it installs PHP libraries in a global context via `include` and `require`. Composer supports both per-project and global usages. PEAR also does not handle dependency management.

> Dependency management is not a new concept and not alone to PHP. NPM for NodeJS, Bower for front end libraries, Bundler/Gems for Ruby, PIP for Python, Maven for Java and so forth. 

## Basics

### [composer.json](https://getcomposer.org/doc/04-schema.md)
defines metadata about the project and dependencies for the project

### [composer.lock](https://getcomposer.org/doc/01-basic-usage.md#composer-lock-the-lock-file)
computed information about dependencies and expected install state

### [composer install](https://getcomposer.org/doc/03-cli.md#install)
* downloads and installs dependencies
* will install off of lock file
* if no lock file, acts as update

### [composer update](https://getcomposer.org/doc/03-cli.md#update)
* updates defined dependencies
* rebuilds the lock file
* generates autoloader

### [composer require](https://getcomposer.org/doc/03-cli.md#require)
* adds a new dependency
* updates the JSON and .lock file.
* updates autoloader

### [composer remove](https://getcomposer.org/doc/03-cli.md#remove)
* removes a dependency
* updates the JSON and .lock file
* updates autoloader

## Links and resources

*  [Managing Your Drupal Project with Composer](https://glamanate.com/blog/managing-your-drupal-project-composer), [slides version](https://docs.google.com/presentation/d/1PK9q2dBkGHfyEO76bEVpqS61wTgA0LGbru2PECiwUnk/edit?usp=sharing)
* [Drupal Commerce project template](https://github.com/drupalcommerce/project-base)
* [Drupal Composer project template](https://github.com/drupal-composer/drupal-project)
* [Platform.sh Drupal 8 + Composer template example](https://github.com/platformsh/platformsh-example-drupal8)
* [Amazee Labs Composer recipes](https://www.amazeelabs.com/en/blog/drupalcomposerrecipes)
* [Using Drupal + Composer project templates with Pantheon sites](https://pantheon.io/blog/using-composer-relocated-document-root-pantheon)