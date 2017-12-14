---
title: Installing with Commerce Kickstart 1.x
taxonomy:
    category: docs
---

<div style="border: 3px double #F3AD00; padding: 8px; margin: 0 -8px 16px -8px; background: #FFFFED"><strong style="color:white;background:#F3AD00;padding:4px;">&nbsp;NOTICE:&nbsp;</strong> This installation instruction page deals with Commerce Kickstart version 1.x. The first version of Kickstart is a developers "blank slate" that includes just the bare minimum to get a store up and running. The second version of Kickstart includes a developers "template" that includes 80+ contributed modules setup as a fully functioning store. <a href="/commerce-kickstart-2/install">Installing Commerce Kickstart 2</a>.</div>

Commerce Kickstart is an installation profile designed to get you up and running quickly with Drupal Commerce. It duplicates a standard Drupal installation and provides additional configuration for Commerce modules and components.  It is freely available through the <a href="http://drupal.org/project/commerce_kickstart">Commerce Kickstart project page</a>.

<h3>Commerce Kickstart Basics</h3>
<iframe src="https://drupalize.me/ajax/drupalizeme_embed/690" height="335" width="100%" frameborder="0" scrolling="no" allowfullscreen></iframe>

<h3>Simple Installation</h3>
Installing <a href="http://drupal.org/project/commerce_kickstart">Commerce Kickstart</a> is as easy as <a href="http://drupal.org/documentation/install">installing Drupal itself</a>, and in most cases is exactly the same procedure. Commerce Kickstart is just a copy of Drupal which includes the required modules and an install profile which does some sane initial setup for you.

<ol>
<li>Download the installation package from the <a href="http://drupal.org/project/commerce_kickstart">project page</a> (For example, the tar.gz or zip file).</li>
<li>Uncompress it into a directory where your webserver can find it. There are many ways to do this in many environments, but let's assume your webserver is looking for http://localhost in the /var/www directory. In that case, copy all the files (including the .htaccess, which may be hidden) into /var/www. </li>
<li>Point your browser at root of the site you have set up.  We'll assume it's http://localhost.</li> 
<li>Follow the instructions, choosing the "Commerce Kickstart" installation profile.</li>
</ol>

When you've completed this basic process, you have a Commerce install with the required modules in Drupal's profiles/commerce_kickstart/modules directory.

<h3>Alternatives, Recipes, and Issues</h3>

You have many options as an advanced sitebuilder:
<ul>
<li><span style="color:red;">This is considered bad practice.</span> <strike><b>Move modules into sites/all/modules or sites/all/modules/contrib:</b> Although installation profiles build with the modules in the profiles directory, many developers want them in sites/all/modules. <b><i>Before</i></b> running the installation process, just move the modules from profiles/commerce_kickstart/modules into sites/all/modules with any tool you like. For example, <code>mv profiles/commerce_kickstart/modules/* sites/all/modules/</code>.</strike> </li>
<li><b>Add Commerce Kickstart to an existing Drupal codebase:</b> Visit <a href="http://drupal.org/node/1079066/release">the releases page</a>, find your release, and download the -no-core.tar.gz or -no-core.zip version of commerce_kickstart and uncompress it into profiles/commerce_kickstart OR <code>drush dl commerce_kickstart</code>. Either of these will include the required modules.</li>
<li><b>Updating the PHP memory limit if necessary:</b> Commerce Kickstart installation involves the installation of 3 major contributed modules all at once on top of Drupal 7 itself, which may cause you to hit your memory limit during installation. If this happens, installation fails, and you will need to drop all tables from your database and reinstall with a higher memory limit (recommended 96M or higher to be safe; decrease as needed afterward).</li>
</ul>

<h3>Resources</h3>
Installing Commerce Kickstart requires no more knowledge than just installing Drupal, but depending on your starting point, that may seem like a lot. Here are some resources about installing Drupal:
<ul>
<li><a href="http://drupal.org/documentation/install">Complete Installation Guide</a></li>
<li><a href="http://drupal.org/documentation/install/beginners">Quick install for beginners.</a></li>
<li><a href="http://drupal.org/node/306267">Using an installation profile.</a></li>
</ul>