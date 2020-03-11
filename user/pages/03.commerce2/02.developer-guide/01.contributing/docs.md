---
title: Contributing
taxonomy:
    category: docs
---


## Choosing an issue

Commerce uses patches for contributing code changes and drupal.org for tracking issues. To choose an
issue, go through [the open issues], pick one you like and **assign it to you**.

If you need help choosing an issue or working on one, join the Commerce 2.x office hours.
They are held every Wednesday at 5PM GMT+1 on the *#commerce* [Drupal Slack channel].

**Tip:** You can also view the issue queue as a [kanban board].

## Setting up a local repository

The Drupal Commerce [Version control page] includes instructions for setting up a local repository and keeping it up to date. See [Getting ready for development](setup-local-environment) for instructions on setting up a full local development environment.

## Creating a patch

Start by creating a branch for your work.
The branch name should contain a brief summary of its id and the issue, e.g **2276369-fix-product-form-notice**:

```bash
cd web/modules/contrib/commerce
git checkout -b 2276369-fix-product-form-notice
```

Once you’re done with writing your code and you've committed all changes to your branch, use `diff` to create a patch. For example, if the current version of Drupal Commerce is `8.x-2.x`, create a patch like this:

```bash
git diff 8.x-2.x > fix-product-form-notice-2276369-13.patch
```

Name your patch with this pattern: `[short-description]-[issue-number]-[comment-number].patch`

Note that the `[comment-number]` should be the number of the comment you *will post* to the issue; if the issue currently has 22 comments, then your comment number will be 23. If you have just created a new issue, then the comment number for your patch will be 2.

## Creating an interdiff

If your patch is not the initial patch for the issue, you should also create an interdiff. For an introduction to interdiffs and how to create them, see the Drupal.org documentation on [Creating an interdiff]. For example, you can use [patchutils] to create an interdiff for a new patch like this:

```bash
interdiff fix-product-form-notice-2276369-7.patch fix-product-form-notice-2276369-13.patch > interdiff-2276369-7-13.txt
```

The naming convention for interdiff files is: `interdiff-[issue-number]-[comment-number-for-previous-patch]-[new-comment-number].txt`

Using `.txt` as the extension ensures that the testbot will ignore your interdiff file.

## Update the issue and its status

Now that you've created the patch and interdiff locally, create a new comment on the issue and add your files. Typically, your patch will get automatically queued for testing. If not, you can click the `Add test / retest` link that appears below your uploaded patch to trigger the testbot.

If there are any test failures, you should leave the issue status set to "Needs work" until the problems are resolved. If all tests pass, update the issue status to "Needs review" to get feedback from other members of the community and reviews by the module maintainers.

Do *not* set the status to "Fixed" even though you've provided a "fix" in the form of your patch. The Fixed status is used by the module maintainers to indicate that either the latest patch has been committed to the development repository or the question asked in the issue has been sufficiently answered in the comments.

Typically, an issue will need several cycles of reviews and revisions before it is ready to be committed to the Drupal Commerce project.

## Reviewing patches

Reviewing patches created by other members of the community is another valuable way to contribute to Drupal Commerce. See the [Patching documentation](../install-update/patching) for information on how to apply an issue patch.

Once you've tested a patch, leave a comment on the issue. If the patch worked for you, you can change the issue status to "Reviewed & tested by the community". If the patch didn't work for you, you can change the issue status to "Needs work". Provide as many details as possible to help developers reproduce your results and figure out how to fix the patch.

That’s it! Happy contributing!

[the open issues]: https://www.drupal.org/project/issues/search/commerce?assigned=&submitted=&project_issue_followers=&status%5B0%5D=Open&version%5B0%5D=8.x&issue_tags_op=%3D&issue_tags=&text=&&&&order=field_issue_priority&sort=desc
[Drupal Slack channel]: https://www.drupal.org/slack
[kanban board]: https://contribkanban.com/board/commerce2x
[Version control page]: https://www.drupal.org/project/commerce/git-instructions
[Creating an interdiff]: https://www.drupal.org/documentation/git/interdiff
[patchutils]: http://freshmeat.sourceforge.net/projects/patchutils
