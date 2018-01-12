---
title: Installing & Upgrading
taxonomy:
    category: docs
---

<div class="docs-enhanced">
<p>Downloading and installing the Commerce Kickstart project is now easier than ever. If you have ever downloaded and installed a distribution for Drupal, then this should seem very familiar to you.</p>
<p>If you are having trouble installing, please check out our "<a href="/commerce-kickstart-2/troubleshooting-kickstart-2-installation">Troubleshooting the Installation Guide</a>."</p>
<h3>Upgrading</h3>
<h4>Preserving customizations</h4>
<p>Chances are you have customized Commerce Kickstart, and you should capture those overrides in a module <em>before</em> upgrading! If you do not, you may not be able to receive updates to distribution components, or possibly lose changes.</p>
<p>Check if any of Commerce Kickstart's Features are overridden:<p>
<ol>
<li>Open the admin menu, and click "Structure" -> "Features"</li>
<li>Click on "Commerce Kickstart" in the vertical tabs</li>
<li>Watch the "State" column and wait for the values to change from "Checking..." to either "Default" or "Overridden". This can take a few seconds to a few minutes, depending on how many Features you're using on your site.</li>
<li>If any of the Commerce Kickstart Features have a state of "Overridden" it means your changes would be lost if all Features were reverted -which may be necessary to fully complete the upgrade!</li>
</ol>

<p>To prevent your changes getting lost when Features are reverted, you have to capture them in an override module. The easiest way to do this is with <a href="https://www.drupal.org/project/features_override">Features Override</a>, which is bundled with Commerce Kickstart (but not enabled) since version 2.27</p>
<p>See these great articles on the Phase2 blog about using Features Override:</p>
<ul>
<li><a href="http://www.phase2technology.com/blog/a-new-paradigm-for-overriding-drupal-features/">A new paradigm for overriding Drupal Features</a></li>
<li><a href="http://www.phase2technology.com/blog/features-and-overrides-part-deux/">Features and Overrides – Part Deux</a></li>
<li><a href="http://www.phase2technology.com/blog/features-and-overrides-part-iii/">Features and Overrides – Part III</a></li>
</ul>

<p><small style="font-size: smaller;">Features Override upgrade documentation borrowed from <a href="https://www.drupal.org/node/2272177">Updating Panopoly</a> documentation</small></p>

<h4>Updating your files</h4>
<p>If you are upgrading your site from a previous release of Commerce Kickstart (since 2.x RC1 forward), we support an upgrade path.</p>
<p><STRONG>IMPORTANT</STRONG> - Drush 8.x-6.x supports an upgrade for Kickstart 2, but it is not the common "drush up" command. Use the following code snippets (and make sure to backup everything):</p>
<code>
$ drush dl commerce_kickstart
$ drush updatedb -y
</code>
<p>Or you can follow the step by step instructions below.</p>
<ol>
<li>Log in to your site as admin (user 1)</li>
<li>Create a complete backup of your files and database. (This can be accomplished with <a href="http://drupal.org/project/backup_migrate">Backup & Migrate</a> or <a href="http://drupal.org/project/drush">Drush</a>)</li>
<li>Download the <a href="http://drupal.org/project/commerce_kickstart">latest release of Kickstart 2</a> by scrolling down to the bottom of the page and choosing between a tar.gz and a .zip file.<br /><span style="color: #FFF; background: red;">&nbsp;NOTE&nbsp;</span> &nbsp; You absolutely want to download the full package with core, as Kickstart 2 does ship with core patches</li>
<li>Extract to an empty folder</li>
<li>Delete all files and folders on your site except the sites folder (remember you should have a backup before doing this)</li>
<li>Copy or Move all files and folders except the sites/ folder from the new release to your current site.</li>
<li>Go to /update.php and run any and all updates.</li>
<li>Be happy because you are now on the latest release of all that is fantastic with Kickstart 2</li>
</ol>
<h3>Pre-Installation Checklist</h3>
<p><span style="color: #FFF; background: red;">&nbsp;NOTE&nbsp;</span> &nbsp; A bug in MAMP causes seg faults in the php interpreter.</p>
<p><span style="color: #FFF; background: red;">&nbsp;NOTE&nbsp;</span> &nbsp; A bug in Windows extractor causes filename path issues, to avoid please use 7zip or similar third-party extractor program.</p>
<ul>
  <li><strong>New Site or Existing?</strong> This is a distribution and will not work with existing sites. A lot of the new modules developed can be installed separately (inline entity form, for example), but you will break your site if you try to install this distribution on your current site. See http://drupal.org/node/1680332 and http://drupal.org/node/1705356</li>
  <li><strong>Server or local?</strong> You need to decide if you are going to install the Commerce Kickstart locally or on a server somewhere. Local setup is typically free and pretty easy. Server installation can be pretty simple too, but requires that you know the command line or are willing to wait for FTP to get it on your server so you can do something.<ul>
    <li><a href="http://drupal.org/documentation/install/">Drupal Installation Guide</a></li>
    <li>For information about setting up a web server on a local computer, see the <a href="http://drupal.org/node/157602">Local Server Setup</a> section of the <a href="http://drupal.org/documentation/develop">Developing for Drupal guide</a>.</li>
    <li>For information about setting up a Drupal site on Windows, see the <a href="http://drupal.org/documentation/install/windows">Installing Drupal on Windows</a> Drupal.org article.</li>
  </ul></li>
  <li><strong>Database?</strong> You will need an empty database for your new kickstart installation to use. If you are using a host, you will likely find a control panel that lets you create a database. <a href="http://drupal.org/documentation/install/create-database">Creating a database</a> can be complicated if you’ve never done it before.</li>
  <li><strong>RAM and load time?</strong> Unfortunately, most server installations keep a very minimal default setting for your website to use per instance. This includes the local installations as well. For more information on how to increase your RAM on apache, see the <a href="http://drupal.org/node/207036">Increase PHP memory limit</a> Drupal.org article. </li>
</ul>
<h3>Installing Drupal Commerce Kickstart 2</h3>
<p>Did you skip the pre-installation checklist? Shame on you. Make sure you have everything ready for the actual installation, then proceed:</p>
<div class="screenshot screenshot-caption">
    <div class="img">
        <a href="/user/pages/02.commerce1/03.commerce-kickstart-2/Installing-and-Upgrading/CK-Install-1.png">
            <img src="/user/pages/02.commerce1/03.commerce-kickstart-2/Installing-and-Upgrading/CK-Install-1.png" alt="Download Commerce Kickstart Options" />
        </a>
    </div>
    <div class="caption">
        <p class="caption-title">Download Kickstart</p>
        <p>Make sure you click on “Notes” so you can see all of the various download options. You absolutely want to download the full core version as Kickstart 2 ships with core patches.</p>
    </div>
    <ul class="screenshot_breadcrumbs">
        <li class="first">Download</li>
    </ul>
</div>
<div class="screenshot screenshot-caption">
    <div class="img">
        <a href="/user/pages/02.commerce1/03.commerce-kickstart-2/Installing-and-Upgrading/CK-Install-2.png">
            <img src="/user/pages/02.commerce1/03.commerce-kickstart-2/Installing-and-Upgrading/CK-Install-2.png" alt="Extract the Files" />
        </a>
    </div>
    <div class="caption">
        <p class="caption-title">Extract the Files</p>
        <p>The files come compressed in either zip or tar.gz. Once you have them extracted, you will want to place the entire folder in your site's root folder (also called www root or docroot). Make sure you move the entire folder, because it is very easy to forget to copy the typically hidden .htaccess file, which is required for lots of important functions.</p>
    </div>
    <ul class="screenshot_breadcrumbs">
        <li class="first">Download</li>
        <li class="last">Extract</li>
    </ul>
</div>
<div class="screenshot screenshot-caption">
    <div class="img">
        <a href="/user/pages/02.commerce1/03.commerce-kickstart-2/Installing-and-Upgrading/CK-Install-3.png">
            <img src="/user/pages/02.commerce1/03.commerce-kickstart-2/Installing-and-Upgrading/CK-Install-3.png" alt="Installation Screen, welcome." />
        </a>
    </div>
    <div class="caption">
        <p class="caption-title">Welcome Screen</p>
        <p>This is the first installation screen. If you see the welcome message, then you have successfully copied your files into the right folder. Congrats!</p>
    </div>
    <ul class="screenshot_breadcrumbs">
        <li class="first">Download</li>
        <li class="">Extract</li>
        <li class="last">Welcome</li>
    </ul>
</div>
<div class="screenshot screenshot-caption">
    <div class="img">
        <a href="/user/pages/02.commerce1/03.commerce-kickstart-2/Installing-and-Upgrading/CK-Install-4.png">
            <img src="/user/pages/02.commerce1/03.commerce-kickstart-2/Installing-and-Upgrading/CK-Install-4.png" alt="Requirements Problem Screen" />
        </a>
    </div>
    <div class="caption">
        <p class="caption-title">Requirements</p>
        <p>If you happen to have a requirements problem, this page will help you resolve those issues.</p>
    </div>
    <ul class="screenshot_breadcrumbs">
        <li class="first">Welcome</li>
        <li class="last">Requirements</li>
    </ul>
</div>
<div class="screenshot screenshot-caption">
    <div class="img">
        <a href="/user/pages/02.commerce1/03.commerce-kickstart-2/Installing-and-Upgrading/CK-Install-5.png">
            <img src="/user/pages/02.commerce1/03.commerce-kickstart-2/Installing-and-Upgrading/CK-Install-5.png" alt="Setting up the database configuration" />
        </a>
    </div>
    <div class="caption">
        <p class="caption-title">Database Config</p>
        <p>Connecting to your database is probably the most important step in the installation. It’s possible you will see this screen a couple of times as you hone your ability to choose the right combination of passwords and database name.</p>
    </div>
    <ul class="screenshot_breadcrumbs">
        <li class="first">Welcome</li>
        <li class="">Requirements</li>
        <li class="last">Database Config</li>
    </ul>
</div>
<div class="screenshot screenshot-caption">
    <div class="img">
        <a href="/user/pages/02.commerce1/03.commerce-kickstart-2/Installing-and-Upgrading/CK-Install-6.png">
            <img src="/user/pages/02.commerce1/03.commerce-kickstart-2/Installing-and-Upgrading/CK-Install-6.png" alt="Installation running through." />
        </a>
    </div>
    <div class="caption">
        <p class="caption-title">Install Profile</p>
        <p>This screen requires no interaction on your part. It’s designed to handle as many actions as your server can handle per page load.</p>
    </div>
</div>
<div class="screenshot screenshot-caption">
    <div class="img">
        <a href="/user/pages/02.commerce1/03.commerce-kickstart-2/Installing-and-Upgrading/CK-Install-7.png">
            <img src="/user/pages/02.commerce1/03.commerce-kickstart-2/Installing-and-Upgrading/CK-Install-7.png" alt="Site Configuration" />
        </a>
    </div>
    <div class="caption">
        <p class="caption-title">Site Configuration</p>
        <p>This is where you can set the Store Name, Store Email Address and timezone information.</p>
    </div>
</div>
<div class="screenshot screenshot-caption">
    <div class="img">
        <a href="/user/pages/02.commerce1/03.commerce-kickstart-2/Installing-and-Upgrading/CK-Install-8.png">
            <img src="/user/pages/02.commerce1/03.commerce-kickstart-2/Installing-and-Upgrading/CK-Install-8.png" alt="Configure Store Content" />
        </a>
    </div>
    <div class="caption">
        <p class="caption-title">Store Content</p>
        <p>You’re so close to having a complete Commerce Kickstart installation! All that is left is to determine whether you want to install the demo store. <b>Be careful:</b> once installed, the demo store is not removable without reinstalling the whole site!</p>
    </div>
</div>
<div class="screenshot screenshot-caption">
    <div class="img">
        <a href="/user/pages/02.commerce1/03.commerce-kickstart-2/Installing-and-Upgrading/CK-Install-9.png">
            <img src="/user/pages/02.commerce1/03.commerce-kickstart-2/Installing-and-Upgrading/CK-Install-9.png" alt="Importing Products" />
        </a>
    </div>
    <div class="caption">
        <p class="caption-title">Importing Products</p>
        <p>This screen shouldn’t take too long to complete. It’s simply showing you the progress of importing the content to your site. If you’re interested in how we do it, we are simply using the commerce migrate module to handle the import and features to set it up.</p>
    </div>
</div>
<div class="screenshot screenshot-caption">
    <div class="img">
        <a href="/user/pages/02.commerce1/03.commerce-kickstart-2/Installing-and-Upgrading/CK-Install-10.png">
            <img src="/user/pages/02.commerce1/03.commerce-kickstart-2/Installing-and-Upgrading/CK-Install-10.png" alt="Getting Started" />
        </a>
    </div>
    <div class="caption">
        <p class="caption-title">Getting Started</p>
        <p>The getting started screen and "help" tab are there to give you guidance for using Drupal Commerce Kickstart 2 and all of it's features.</p>
    </div>
</div>
</div>s