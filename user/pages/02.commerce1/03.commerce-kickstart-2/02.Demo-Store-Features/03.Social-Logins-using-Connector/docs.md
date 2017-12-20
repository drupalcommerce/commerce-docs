---
title: Social Logins using Connector
taxonomy:
    category: docs
---

<div class="docs-enhanced">
<img src="/sites/default/files/styles/dc_blog_full/public/blog-images/social-login-screenshot.png" alt="Social Login Example" width="100%" />
<p>This documentation page was recently featured on the Commerce Kickstart Tip series. To see the blog post that featured this process, <a href="http://www.drupalcommerce.org/blog/4571/kickstart-tip-extend-your-site-social-logins">click here</a>.</p>
<iframe width="420" height="315" src="http://www.youtube.com/embed/ER3fXQBlcDk?rel=0" frameborder="0" allowfullscreen></iframe>
<h3>Overview of Setup</h3>
<p><img src="http://www.drupalcommerce.org/sites/default/files/social-logins-v1-edited.png" alt="Overview Graphic of Social Logins" /></p>
<p>The setup is pretty simple. We are taking the OAuth Connector module, a few pre-defined services for Twitter, Facebook, or Google, and connecting them to a simple and free OAuth API. Most of these API services require that you register an "App" to gain access to the API. This is how they can limit your API calls and help you keep track of traffic being generated using these services. The process is very similar to setting up a Google Maps API call.</p>
<h3>Setting up OAuth Connector</h3>
<p><strong>Step 1</strong>: Go to admin/structure/oauthconnector/list and create a new provider by using one of the presets the list, or by creating your own. You will need an App Key, a secret key, and a callback URL for each provider (see list below).</p>
<p>URLs to apply for App Keys (as of Mar. 2012):</p>
<ul>
<li>Facebook: https://graph.facebook.com/</li>
<li>Twitter: https://api.twitter.com/</li>
<li>Google: https://code.google.com/apis/console</li>
<li>LinkedIn: https://www.linkedin.com/secure/developer</li>
<li>Flickr: http://www.flickr.com/services</li>
</ul>
<p>Signing up for App Keys is a very different process for each service. The trick usually is that you have to declare that you want to create an "app" or a service or something that needs an API access.</p>
<p><strong>Step 2</strong>: Make sure you provide the correct "Callback URL"</p>
<p>The other trick is to make sure that you are using the right callback URL. To get the right callback URL, I'd recommend you go ahead and fill out the "App Secret" and "App ID" with a bogus number. The page on admin/structure/oauthconnector/list will then give you the callback URL that you can use to give to the service to get the API credentials.</p>
<p><strong>Step 3</strong>: Make sure permissions are setup correctly.</p>
<p>To allow anonymous users the ability to login using a facebook account, you must give anonymous users the permission to "Connect with [Provider]." So, for example, the permission that you'll want to change for Facebook is "Connect with Facebook."</p>
<h3>Facebook Graph API</h3>
<p>In order to access Facebook's Graph API for access to the OAuth Consumer Key and OAuth Consumer Secret we will go to the following URL:</p>
<p><strong>Step 1</strong>: https://developers.facebook.com/apps</p>
<p>Here, you should register and create an app that represents your website. For local sites, "localhost" worked for the App Domain, for me.</p>
<p><strong>Step 2</strong>: Select "Website with Facebook Login" and provide your website's URL, plus "/oauth/authorized2/1" (see the step #2 above)</p>
<p><strong>Step 3</strong>: Grab the App ID/API Key</p>
<p><strong>Step 4</strong>: Grab the App Secret</p>
</div>