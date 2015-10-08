# Executing the automated tests

This module comes with PHPUnit and SimpleTest tests. You need a working Drupal 8
installation and a checkout of the Commerce module in the modules folder.

#### PHPUnit

    ./core/vendor/phpunit/phpunit/phpunit -c ./core/phpunit.xml.dist ./modules/commerce

#### Simpletest

Make sure simpletest is enabled:

    drush en -y simpletest commerce

And then run the tests

    drush test-run 'Commerce'

    php ./core/scripts/run-tests.sh --verbose --color "commerce"

You can also execute the test cases from the web interface at ``/admin/config/development/testing``.
