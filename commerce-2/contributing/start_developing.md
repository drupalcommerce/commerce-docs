# Developing

Once you verified everything's working properly by [running the tests](testing.md), you're ready to go!


### Taking a look at the issue queue

While the coding is done on github, the issue queue is still taken care of on drupal.org: you can take a look at [the open issues](https://www.drupal.org/project/issues/search/rules?assigned=&submitted=&project_issue_followers=&status[0]=Open&version[0]=8.x&issue_tags_op=%3D&issue_tags=&text=&&&&order=field_issue_priority&sort=desc
), pick one you like and **assign it to you**.

### Coding and Pull Request-ing

Remember to create a branch before start developing! It's name should contain the issue id and a slug to tell what the thing you're working on is about, for example: **2276369-readme**.

Once you're done with the development, push your commits and [create a Pull Request](https://help.github.com/articles/using-pull-requests#initiating-the-pull-request) on github.

After your code has been reviewed, you might be asked to perform some changes and then have them reviewed again. After a number of iterations, you should get your code merged into the main repository. Hurray!

### Keeping your fork up to date

After some time your forked repository and the original one(called *upstream*) will eventually get out of sync leaving you with an old, unsupported version. In order to keep that up to date, you'll need to *fetch* (i.e: downloading without touching the code on your computer) the latest commits and then *merge* them in the branch you need, which most likely will be **8.x-3.x**. So enter your Rules module's directory and type:

    git remote add upstream git@github.com:fago/rules.git


This command will add the original Rules' repository reference to your local repository(you don't have to repeat it all the time, just the first one will do).
Then you can proceed with the download and merge on the wanted branch:

    git fetch upstream
    git checkout 8.x-3.x
    git merge upstream/8.x-3.x

And that's it! Your repository is up to date again so that you can start developing a new feature right away! Please check [Github's guide on how to sync a fork](https://help.github.com/articles/syncing-a-fork) for more information

### Keep the conventions in mind

* Always create an issue in the [drupal.org Rules issue queue](http://drupal.org/project/issues/rules)
  for every pull request you are working on.
* Always cross-reference the Issue in the Pull Request and the Pull Request in
  the Issue.
* Always create a new branch for every pull request: its name should contain a
  brief summary of the ticket and its issue id, e.g **2276369-readme**.
* Try to keep the history of your pull request as clean as possible by squashing
  your commits: you can look at the [Symfony documentation](http://symfony.com/doc/current/cmf/contributing/commits.html)
  or at the [Git book](http://git-scm.com/book/en/Git-Tools-Rewriting-History#Changing-Multiple-Commit-Messages)
  for more information on how to do that.
