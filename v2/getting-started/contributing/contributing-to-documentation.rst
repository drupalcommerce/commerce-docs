Contributing to Documentation
===========================
The beauty of an open source project is that anyone can contribute. To contribute to an open source project you need not to be a programmer, there are other ways to contribute to an open source project than through code. Easiest way for non-programmers is to contribute through documentation.

Choosing an issue
-----------------

Commerce uses GitHub for documentation and for tracking issues. To choose an
issue, go through `the open issues`_, pick one you like and **assign it to you** or if you don't have permission to assign, then simply inform by commenting.

If you need help choosing an issue or working on one, join the Commerce 2.x office hours.
They are held every wednesday at 3PM GMT+1 on the *#drupal-commerce* `IRC channel`_.

Creating a pull request
-----------------------

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

After your code has been reviewed, you might be asked to perform some
changes and then have them reviewed again:

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

Your pull request might also need rebasing, to re-apply your changes on top of the latest code. Once you’ve updated the master branch (8.x-2.x), rebase your branch:

.. code-block:: terminal

    git checkout 106-create-product-type
    git rebase master
    git push -f fork 106-create-product-type

That’s it! Happy contributing!

.. _the open issues: https://github.com/drupalcommerce/commerce-docs/issues
.. _IRC channel: https://www.drupal.org/irc
.. _create a pull request: https://help.github.com/articles/using-pull-requests#initiating-the-pull-request

.. toctree::
   :maxdepth: 3
   :hidden:

   development-environment
