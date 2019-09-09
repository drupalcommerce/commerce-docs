---
title: Getting issues committed
taxonomy:
    category: docs
---

### How to get a Commerce issue committed
* Up to date issue summary
* Complete tests
  * If it is a bug report, tests are more important than the fix, they guarantee both that the bug exists and that the fix actually fixes it.
  * Make sure to have full test coverage, lazy test writing will stall your issue.
* Reports of the patch working for others
  * Explain what you’re doing and what the patch fixes for you
  * This is helpful even if one person has already RTBC’d
* Small single focus for each patch
  * Don’t try to fix 8 things at once. If needed, do the most common use case and can then cover additional use cases with additional patches.
  * A small patch means the reviewer can easily grasp the whole change quickly. Large and mixed patches require a lot more review and can’t be done quickly as the reviewer has to spend a lot of time understanding the whole patch. 4 little patches are faster than 1 big one.
* Change Record entry
  * Write a change record entry if the patch requires ANY manual work from the site owner or changes existing functionality that might be breaking or confusing.
