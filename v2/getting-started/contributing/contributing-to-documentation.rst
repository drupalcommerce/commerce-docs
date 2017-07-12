Contributing to Documentation
==============================
The beauty of an open source project is that anyone can contribute. To contribute to an open source project you need not to be a programmer, there are other ways to contribute to an open source project than through code. Easiest way for non-programmers is to contribute through documentation.

Choosing an issue
-----------------

Commerce uses GitHub for documentation and for tracking issues. To choose an
issue, go through `the open issues`_, pick one you like and **assign it to you** or if you don't have permission to assign, then simply inform by commenting.

If you need help choosing an issue or working on one, join the Commerce 2.x office hours.
They are held every wednesday at 3PM GMT+1 on the *#drupal-commerce* `IRC channel`_.

Working on issue
----------------------
Drupal Commerce uses Sphinx to generate documentation. You can install Sphinx locally. To install Sphinx refer `install notes`_.

``*emphasis*`` renders as *emphasis*

``**strong emphasis**`` renders as **strong emphasis**.

``.. _Drupal Commerce: https://drupalcommerce.org`` renders as `Drupal Commerce`_

.. code-block::
	.. figure:: images/example.jpg
		:alt: Example image

Will Render as -

.. figure:: images/example.jpg
	:alt: Example image

.. code-block::

	+----------------+---------------+
	| Name           | Status        |
	+================+===============+
	| Test 1         | pass          |
	+----------------+---------------+
	| Test 2         | pass          |
	+----------------+---------------+
	| Test 3         | fail          |
	+----------------+---------------+
	| Test 4         | pass          |
	+----------------+---------------+

Will render as -

+----------------+---------------+
| Name           | Status        |
+================+===============+
| Test 1         | pass          |
+----------------+---------------+
| Test 2         | pass          |
+----------------+---------------+
| Test 3         | fail          |
+----------------+---------------+
| Test 4         | pass          |
+----------------+---------------+

**For adding tabs**

.. code-block::
	.. tabs::
		.. tab:: Quickstart
			.. code-block:: php

					use Drupal\commerce_store\Entity\StoreType;

					/**
					 * id [String]
					 *   The primary key for this store type.
					 *
					 * label [String]
					 *   The label for this store type.
					 *
					 * description [String]
					 *   The description for this store type.
					 */
					$store_type = StoreType::create([
					  'id' => 'custom_store_type',
					  'label' => 'My custom store type',
					  'description' => 'This is my first custom store type!',
					]);

					$store_type->save();

		.. tab:: Tutorial

			 Tutorial goes here

Will render as -

.. tabs::
	.. tab:: Quickstart
		.. code-block:: php

				use Drupal\commerce_store\Entity\StoreType;

				/**
				 * id [String]
				 *   The primary key for this store type.
				 *
				 * label [String]
				 *   The label for this store type.
				 *
				 * description [String]
				 *   The description for this store type.
				 */
				$store_type = StoreType::create([
				  'id' => 'custom_store_type',
				  'label' => 'My custom store type',
				  'description' => 'This is my first custom store type!',
				]);

				$store_type->save();

	.. tab:: Tutorial

		 Tutorial goes here

Creating a pull request
-----------------------

Pull requests let you tell others about changes you've pushed to a repository on GitHub. Once a pull request is opened, you can discuss and review the potential changes with collaborators and add follow-up commits before the changes are merged into the repository.

Start by creating a branch for your work.
The branch name should contain a brief summary of its id and the issue, e.g **106-create-product-type**:

.. code-block:: terminal

	cd commerce-docs/v2
	git checkout -b 106-create-product-type

Once you’re done with documenting, push your commits to your fork:

.. code-block:: terminal

	git commit -am "Issue 106: Created documentation for product type."
	git push fork 106-create-product-type

You can now go to your fork’s GitHub page and `create a pull request`_.

Once you create a pull request on GitHub, it runs checks on your pull request. If your changes pass checks then it can be reviewed by repository maintainers. You can get details about checks by clicking on ``Show all checks`` link as shown in below image.

.. figure:: images/pull-request-1.png
	:alt: Show all checks image

To get the details about platform-based build for your pull request. Click on the ``details`` link.

.. figure:: images/pull-request-2.png
	:alt: Show platform-based build

**Note:** Only first 10 open PRs gets the full build.

**Getting feedback**

To get the feedback on your pull request you need to ask somebody to review it. And `Drupal Slack`_ member are ready to review the pull requests for you. But first you will need an invite, you can get invite by submitting your email id here.

In the above image, pull request was reviewed by reviewer and some changes are suggested. So we will make the suggested changes and push the changes.

.. code-block:: terminal

	# Change the desired files.
	git commit -am "Addressed feedback."
	git push fork 106-create-product-type

Updating the branch will automatically update the related pull request.


Keeping up to date
------------------

Your forked repository and the original one (called *origin*) will eventually get out of sync. Periodically update your fork by doing:

.. code-block:: terminal

	# Update your local branch.
	git checkout master
	git pull origin/master
	# Push the update to your GitHub fork.
	git push fork master

Your pull request might also need rebasing, to re-apply your changes on top of the latest code. Once you’ve updated the master branch, rebase your branch:

.. code-block:: terminal

	git checkout 106-create-product-type
	git rebase master
	git push -f fork 106-create-product-type

That’s it! Happy contributing!

.. _the open issues: https://github.com/drupalcommerce/commerce-docs/issues
.. _IRC channel: https://www.drupal.org/irc
.. _create a pull request: https://help.github.com/articles/using-pull-requests#initiating-the-pull-request
.. _install notes: http://www.sphinx-doc.org/en/stable/install.html
.. _Drupal Commerce: https://drupalcommerce.org
.. _here: http://drupalslack.herokuapp.com
.. _Drupal Slack: http://drupal.slack.com

.. toctree::
   :maxdepth: 3
   :hidden:

   development-environment
