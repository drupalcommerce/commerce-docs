---
title: Troubleshooting the Kickstart 2 Installation
taxonomy:
    category: docs
---

<div class="docs-enhanced">
<p>There are a few hiccups people have posted about and we've tried our best to give you next steps. Chances are, you won't have any problem installing Commerce Kickstart 2, but if you do, we have listed the bare minimum requirements and a few odd settings that sometimes cause problems.</p>
<p><span style="color: #FFF; background: red;">&nbsp;NOTE&nbsp;</span> &nbsp; A bug in MAMP causes seg faults in the php interpreter.</p>
<ul>
  <li>Disk Space: 45 MB</li>
  <li>RAM: minimum 128M, more is recommended because your server can fail with this memory if it is at all strained (<a href="http://drupal.org/node/207036">learn how to configure</a>).</li>
  <li>Web Server: Apache 1.3, Apache 2.x, or Microsoft IIS</li>
  <li>Database: MySQL 5.0.15 or higher with PDO, PostgreSQL 8.3 or higher with PDO, SQLite 3.3.7 or higher</li>
</ul>
<p>Details are offered on the <a href="http://drupal.org/requirements/">Drupal Requirements Page</a>.</p>
<h3>Odd Settings</h3>
<p>There are a few settings that default to good values, but can interfere with installation should you have changed defaults:</p>
<ul>
  <li>xdebug setup: If you are using xdebug, you'll want to make sure you have the nesting levels configured accurately. (http://drupal.org/node/1663314)</li>
  <li>apache setup: max_allowed_packet needs to be 16M minimum</li>
  <li>required php libraries: Commerce Kickstart 2 requires the Curl PHP Library to be installed.</li>
</ul>
<h3>Quick reminder about Memory</h3>
<p>Since the Commerce Kickstart 2 distribution can install an entire setup and configured working demo, the installation process requires a bit more sustained power. In our early beta tests, installations can sometimes silently fail when it uses close to your memory limit. Migrate will stop importing content and you will end up with the settings of a new store and very little content. The solution to fix this situation is to reinstall with a higher memory limit, or to rerun the migrations using the Drush command "drush ms" or by enabling the module "Migrate UI" and going to admin/content/migrate.</p>
</div>