# Executing the automated tests

This module comes with PHPUnit and SimpleTest tests. You need a working Drupal 8
installation and a checkout of the Rules module in the modules folder.

#### PHPUnit

    ./core/vendor/phpunit/phpunit/phpunit -c ./core/phpunit.xml.dist ./modules/rules

#### Simpletest

Make sure simpletest is enabled:

    drush en -y simpletest rules

And then run the tests

    drush test-run 'Rules, Rules conditions'

    php ./core/scripts/run-tests.sh --verbose --color "rules"

You can also execute the test cases from the web interface at ``/admin/config/development/testing``.
