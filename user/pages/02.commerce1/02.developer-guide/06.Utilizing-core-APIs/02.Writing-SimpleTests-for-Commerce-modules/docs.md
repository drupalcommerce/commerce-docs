---
title: Writing SimpleTests for Commerce modules
taxonomy:
    category: docs
---

Drupal Commerce has an automated testing suite based on the SimpleTest module in Drupal Core. 

SimpleTest resources:
<ul>
<li><a href="http://drupal.org/node/890654">SimpleTest tutorial</a></li>
<li><a href="http://drupal.org/node/265828">SimpleTest Assertions</a></li>
<li><a href="http://drupal.org/node/265762">SimpleTest API Functions</a></li>
<li><a href="http://drupal.org/project/test_notifier">Test Notifier</a> user script. Notifies you when a test has been completed so you don't have to sit and stare at your browser for 2 minutes while the test runs.</li>
</ul>

All tests should extend the class <code>CommerceBaseTestCase</code> which adds helper functions to <a href="http://api.drupal.org/api/drupal/modules--simpletest--drupal_web_test_case.php/7/source"><code>DrupalWebTestCase</code></a>. The Commerce base test class lets you quickly create products and set up different store environments for other tests.

Take a look at the <code>CommerceBaseTestCase</code> to see which functions are available when writing other Commerce tests. <em>(Need a link once the code is committed. Could also use it's own API page eventually).</em>


<h2>Best Practices for Test Development</h2>
Here are some best practices that came about while the base class was being developed.
<ul>
<li>Follow the <a href="http://www.drupalcommerce.org/developer-guide">Drupal Commerce Developer Guide</a></li>
<li>Ease your test development with: http://drupal.org/project/test_notifier</li>
<li>Save user creation for the test unless it is used more than once (user creation leads to many page loads!)</li>
<li>Capitalize module names in the comments</li>
<li>Test the default state of Drupal Commerce before considering edge cases
<ul><li>Example: Provide test coverage and consideration to the default Product entity before considering custom product entities</li></ul></li>
<li>Functional tests vs. Unit tests
<ul><li>Functional tests (UI tests) - These test the UI using form submissions and other UI interaction.
<ul><li>Test coverage should begin with functional tests since it tests the UI and the API simultaneously. If a test fails when there are only functional tests available, it is not always clear if the error resides in the UI or the API module. Because of this, test coverage should quickly expand to include unit tests.</li></ul></li>
<li>Unit tests (API tests) - These test the API using API functions and database queries.
<ul><li>Note: Unit tests do not have to extend DrupalUnitTestCase. That class is only for tests that do not require the Drupal database. Unit tests (in gneral) can extend DrupalWebTestCase to have access to the Drupal database and then use API functions and databse queries to check if the functions are behaving as expected.</li>
<li>Drupal Commerce unit tests sould extend CommerceBaseTestCase just like anything else would.</li></ul></li></ul></li>
</ul>

<h2>Separation of Tests &amp; Files</h2>

<ul>
<li>commerce_base.test - contains CommerceBaseTestCase class that all Commerce test classes should extend.</li>
<li>commerce_full.test - contains tests that are cross-system</li>
<li>[module].test - contains tests specific to code inside [module].module. These are unit tests (see description above).</li>
<li>[module]_ui.test - contains tests specific to code inside [module]_ui.module. These are usually functional tests (see description above).</li>
</ul>

