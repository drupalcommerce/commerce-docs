# Setting up the environment

## LAMP

The very first step for starting contributing to Drupal Commerce is to setup a classic
"LAMP" environment: that's a bit out of the scope of this document, so please
take a look at [Drupal Installation Guide](https://drupal.org/documentation/install)
and especially at its [System requirements section](https://drupal.org/requirements).

## Drush

Installing the powerful Drupal Shell is not mandatory but it can definitely be helpful during development. The recommended way to install it is through composer. Unfortunately, due to a (temporary?) dependency-clash between Drupal 8 and Drush 7, it's not possible to just install it within your Drupal 8's vendors directory.
So fire the following in your terminal:

    composer global require drush/drush=dev-master

## Drupal 8

Once you've got your system ready to host Drupal 8, the next step is to go and
clone its repository in the directory where your web server will expect it to be
by using the following command, being careful to replace "MINOR_VERSION" and "DESTINATION_DIRECTORY" as needed:

    git clone --branch 8.MINOR_VERSION.x http://git.drupal.org/project/drupal.git DESTINATION_DIRECTORY

Please look at the [Drupal Git Instructions](https://drupal.org/project/drupal/git-instructions)
for more information about how to clone Drupal.

Once you finished cloning Drupal, set up a database for it and proceed with the
installation: after it's completed, the only thing's missing is the Drupal Commerce
module.

## Drupal Commerce 2.x

### NOTE: you will need a working GitHub account for contributing.

In order to start working on Drupal Commerce 2.x, you have to visit its
[module page on GitHub](https://github.com/commerceguys/commerce) and click the **fork**
button.

That will create a copy of the Drupal Commerce repository on your GitHub account. At this
point you're ready to clone it in your working environment in a directory of your choice by using the following command (don't forget to replace YOUR_USER with
the name of your GitHub user):

    git clone git@github.com:YOUR_USER/commerce.git

Once you did all of that, symlink the cloned commerce directory under the Drupal's ``modules``
directory.

**NOTE: directly cloning Drupal Commerce within Drupal's ``modules`` directory is discouraged for development.**

The only thing left to do now is to head to the module page clicking on the
**Extend** button in the top menu and enable Drupal Commerce.
