---
title: Sending HTML emails
taxonomy:
    category: docs
---

You can find more information on how to send HTML emails with Symfony mailer on [Sending HTML emails with Symfony mailer](https://www.centarro.io/blog/replace-swift-mailer-symfony-mailer-html-email).

## Debugging emails

The Drupal.org documentation handbook has a great article for working with email in a development and testing environment: [https://www.drupal.org/docs/develop/local-server-setup/managing-mail-handling-for-development-or-testing](https://www.drupal.org/docs/develop/local-server-setup/managing-mail-handling-for-development-or-testing)

The Drupal Commerce team recommends using [Mailhog](https://github.com/mailhog/MailHog) for local email testing and development. [DrupalVM will send emails to it by default](http://docs.drupalvm.com/en/latest/extras/mailhog/) and it is easily installed locally or through a [Docker container](https://hub.docker.com/r/mailhog/mailhog/).
