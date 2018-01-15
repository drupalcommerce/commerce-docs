---
title: Setting up a Product Catalog
taxonomy:
    category: docs
---

<div class="docs-enhanced">
      <p>Catalogs or product display listings are critical to the success of your new eCommerce website. Fortunately for your site, it's running Drupal 7 and Views 3. This means just about anything is possible when it comes to displaying your Products. </p>
      <p>Before moving forward, you're going to need to know the difference between product displays and product entities. Additionally, it would help if you had more than a passing understanding of what <a href="http://dev.nodeone.se/en/taming-the-beast-learn-views-with-nodeone">Views</a> does. Particularly in the <a href="http://dev.nodeone.se/en/learn-views-with-nodeone-part-11-relationships">Views Relationship area</a>. </p>
      <h2>Drupal eCommerce Catalog Recipes</h2>
      <p>We have boiled down most catalogs into four approaches. Are there more? Probably. If you can master two or more of these, you are well on your way to making all kinds of eCommerce possibilities. </p>
      <ul>
         <li><a href="#display">Product Display Listing using Views</a></li>
         <li><a href="#simple">Simple Product Listing using Views</a></li>
         <li><a href="#advanced">Advanced Product Display Listing using Views</a></li>
         <li><a href="#taxonomy">Taxonomy Listing of Product Display Teasers</a></li>
      </ul>
      <h3 id="display">Product Display Listing using Views</h3>
      <p>The first catalog we will create is a simple View that will show product teasers. This is similar to the approach used by Drupal core to populate your homepage on install. Re-making it in Views means you could tweak it using the Views interface.</p>
      <div class="screenshot screenshot-caption">
         <div class="img">
            <a href="/user/pages/02.commerce1/01.01.user-guide/02.Products/04.Setting-up-a-Product-Catalog/Prod-Catalog-Disp-Step1.png">
            <img src="/user/pages/02.commerce1/01.01.user-guide/02.Products/04.Setting-up-a-Product-Catalog/Prod-Catalog-Disp-Step1.png" alt="Add a new View that is listing Product Displays." />
            </a>
         </div>
         <div class="caption">
            <p class="caption-title">New View</p>
            <p>This is the only step in this version of the catalog. You could pick table or perhaps "Grid" to spice it up a bit from the homepage that ships with all Drupal installations.</p>
         </div>
         <ul class="screenshot_breadcrumbs">
            <li class="first">Administration</li>
            <li>Structure</li>
            <li>Views</li>
            <li class="last">Add a View</li>
         </ul>
      </div>
      <div class="screenshot screenshot-caption">
         <div class="img">
            <a href="/user/pages/02.commerce1/01.01.user-guide/02.Products/04.Setting-up-a-Product-Catalog/Prod-Catalog-Disp-Step2.png">
            <img src="/user/pages/02.commerce1/01.01.user-guide/02.Products/04.Setting-up-a-Product-Catalog/Prod-Catalog-Disp-Step2.png" alt="Our new Catalog Page." />
            </a>
         </div>
         <div class="caption">
            <p class="caption-title">New Catalog Page</p>
            <p>The Product Teasers can be controlled via the Manage Display under the Store &gt; Products &gt; Product Types. </p>
         </div>
      </div>
      <h3 id="simple">Simple Product Listing using Views</h3>
      <p>This is a simple listing of Product Entities that have no link, just a simple Add to Cart Button and a price. This would be good for a one-page catalog, perhaps a table with available donations, etc.</p>
      <div class="screenshot screenshot-caption">
         <div class="img">
            <a href="/user/pages/02.commerce1/01.01.user-guide/02.Products/04.Setting-up-a-Product-Catalog/Prod-Catalog-Simple-Step1.png">
            <img src="/user/pages/02.commerce1/01.01.user-guide/02.Products/04.Setting-up-a-Product-Catalog/Prod-Catalog-Simple-Step1.png" alt="Name the view, Choose eCommerce Product, and use a grid display." />
            </a>
         </div>
         <div class="caption">
            <p class="caption-title">Name the View</p>
            <p>Navigate to the Add a New View and fill out the form in a similar manner to the way you see here. Of particular note is the fact that we aren't listing Content, we are listing eCommerce Products. Also note that this view is designed to be a single page with no product details. This has limited use cases. Typically you would want to list product displays and link to them.</p>
         </div>
         <ul class="screenshot_breadcrumbs">
            <li class="first">Administration</li>
            <li>Structure</li>
            <li>Views</li>
            <li class="last">Add a View</li>
         </ul>
      </div>
      <div class="screenshot screenshot-caption">
         <div class="img">
            <a href="/user/pages/02.commerce1/01.01.user-guide/02.Products/04.Setting-up-a-Product-Catalog/Prod-Catalog-Simple-Step2.png">
            <img src="/user/pages/02.commerce1/01.01.user-guide/02.Products/04.Setting-up-a-Product-Catalog/Prod-Catalog-Simple-Step2.png" alt="Add the Cart button and the price field." />
            </a>
         </div>
         <div class="caption">
            <p class="caption-title">Add Fields</p>
            <p>This is the first screen of two screens we're going to show you for adding fields.</p>
         </div>
         <ul class="screenshot_breadcrumbs">
            <li class="first">Administration</li>
            <li>Structure</li>
            <li>Views</li>
            <li>Edit View</li>
            <li class="last">Add Fields</li>
         </ul>
      </div>
      <div class="screenshot screenshot-caption">
         <div class="img">
            <a href="/user/pages/02.commerce1/01.01.user-guide/02.Products/04.Setting-up-a-Product-Catalog/Prod-Catalog-Simple-Step3.png">
            <img src="/user/pages/02.commerce1/01.01.user-guide/02.Products/04.Setting-up-a-Product-Catalog/Prod-Catalog-Simple-Step3.png" alt="Add the Product Title and the Product Image." />
            </a>
         </div>
         <div class="caption">
            <p class="caption-title">Add Fields</p>
            <p>This is the second screen of two screens we're going to show you for adding fields.</p>
         </div>
         <ul class="screenshot_breadcrumbs">
            <li class="first">Administration</li>
            <li>Structure</li>
            <li>Views</li>
            <li>Edit View</li>
            <li class="last">Add Fields</li>
         </ul>
      </div>
      <div class="screenshot screenshot-caption">
         <div class="img">
            <a href="/user/pages/02.commerce1/01.01.user-guide/02.Products/04.Setting-up-a-Product-Catalog/Prod-Catalog-Simple-Step4.png">
            <img src="/user/pages/02.commerce1/01.01.user-guide/02.Products/04.Setting-up-a-Product-Catalog/Prod-Catalog-Simple-Step4.png" alt="Add to Cart Field, leave off the label and check the link products towards the bottom." />
            </a>
         </div>
         <div class="caption">
            <p class="caption-title">Add to Cart Field</p>
            <p>When adding this field, you will want to check the "Link products added to the cart..." This means that when they add it to the cart, the link in the cart will bring them back to the view and not send them to the product page. </p>
         </div>
         <ul class="screenshot_breadcrumbs">
            <li class="first">Administration</li>
            <li>Structure</li>
            <li>Views</li>
            <li>Edit View</li>
            <li class="last">Add to Cart Field</li>
         </ul>
      </div>
      <div class="screenshot screenshot-caption">
         <div class="img">
            <a href="/user/pages/02.commerce1/01.01.user-guide/02.Products/04.Setting-up-a-Product-Catalog/Prod-Catalog-Simple-Step5.png">
            <img src="/user/pages/02.commerce1/01.01.user-guide/02.Products/04.Setting-up-a-Product-Catalog/Prod-Catalog-Simple-Step5.png" alt="Leave off the label, set the formatted amount and display to show calculated sell price." />
            </a>
         </div>
         <div class="caption">
            <p class="caption-title">Price Field</p>
            <p>Leave off the label, set the formatted amount and display to show calculated sell price. You could show with components if you have complex pricing rules.</p>
         </div>
         <ul class="screenshot_breadcrumbs">
            <li class="first">Administration</li>
            <li>Structure</li>
            <li>Views</li>
            <li>Edit View</li>
            <li class="last">Price Field</li>
         </ul>
      </div>
      <div class="screenshot screenshot-caption">
         <div class="img">
            <a href="/user/pages/02.commerce1/01.01.user-guide/02.Products/04.Setting-up-a-Product-Catalog/Prod-Catalog-Simple-Step6.png">
            <img src="/user/pages/02.commerce1/01.01.user-guide/02.Products/04.Setting-up-a-Product-Catalog/Prod-Catalog-Simple-Step6.png" alt="Product title field" />
            </a>
         </div>
         <div class="caption">
            <p class="caption-title">Product title field</p>
            <p>The product title field only needs you to remove the label. Do not link the field to the administrative view. Remember, this view should not link to any content.</p>
         </div>
         <ul class="screenshot_breadcrumbs">
            <li class="first">Administration</li>
            <li>Structure</li>
            <li>Views</li>
            <li>Edit View</li>
            <li class="last">Product title field</li>
         </ul>
      </div>
      <div class="screenshot screenshot-caption">
         <div class="img">
            <a href="/user/pages/02.commerce1/01.01.user-guide/02.Products/04.Setting-up-a-Product-Catalog/Prod-Catalog-Simple-Step7.png">
            <img src="/user/pages/02.commerce1/01.01.user-guide/02.Products/04.Setting-up-a-Product-Catalog/Prod-Catalog-Simple-Step7.png" alt="Let's rearrange fields." />
            </a>
         </div>
         <div class="caption">
            <p class="caption-title">Rearrange Fields</p>
            <p>Let's rearrange fields.</p>
         </div>
         <ul class="screenshot_breadcrumbs">
            <li class="first">Administration</li>
            <li>Structure</li>
            <li>Views</li>
            <li>Edit View</li>
            <li class="last">Rearrange Fields</li>
         </ul>
      </div>
      <div class="screenshot screenshot-caption">
         <div class="img">
            <a href="/user/pages/02.commerce1/01.01.user-guide/02.Products/04.Setting-up-a-Product-Catalog/Prod-Catalog-Simple-Step8.png">
            <img src="/user/pages/02.commerce1/01.01.user-guide/02.Products/04.Setting-up-a-Product-Catalog/Prod-Catalog-Simple-Step8.png" alt="Rearrange New Fields and Remove one Field" />
            </a>
         </div>
         <div class="caption">
            <p class="caption-title">Remove a Field</p>
            <p>Let's remove the Product ID and change the order to Image, Title, Price, Add to Cart.</p>
         </div>
         <ul class="screenshot_breadcrumbs">
            <li class="first">Administration</li>
            <li>Structure</li>
            <li>Views</li>
            <li>Edit View</li>
            <li class="last">Rearrange Fields</li>
         </ul>
      </div>
      <div class="screenshot screenshot-caption">
         <div class="img">
            <a href="/user/pages/02.commerce1/01.01.user-guide/02.Products/04.Setting-up-a-Product-Catalog/Prod-Catalog-Simple-Step9.png">
            <img src="/user/pages/02.commerce1/01.01.user-guide/02.Products/04.Setting-up-a-Product-Catalog/Prod-Catalog-Simple-Step9.png" alt="Final Product Catalog" />
            </a>
         </div>
         <div class="caption">
            <p class="caption-title">Final Catalog</p>
            <p>The final catalog looks pretty nice, but note we are not linking to any of the product display nodes.</p>
         </div>
      </div>
      <h3 id="advanced">Advanced Product Display Listing using Views</h3>
      <p>The Product Display and Simple Views integration are not likely the most convenient for the site builder to create. In order to create a product catalog for a store that uses Product Displays, you will want to use the following exercise and pay careful attention to when we create the Views Relationship.</p>
      <p>If your products have attributes such that product displays reference multiple products, establishing this relationship from the product display node to the referenced product will result in multiple rows in the View per node, basically 1 per referenced product.  The workaround for this is to filter on the delta value of the product reference field so that only the first item (delta 0) is displayed in the View.</p>
      <p>Additionally, if you're using attributes and want an Add to Cart form in the View, you need to render the product display node's product reference field to the View instead of using the Add to Cart form field from the product table itself.  Furthermore, if you want product fields in the View to update when attributes are selected, you can't just add the product fields directly to the View.  This is because injected field updating depends on a special wrapper around the product fields that only comes when the fields are rendered through the node output.  The solution for this is to render product fields through a view mode of the display node itself, such as putting a teaser of the node into the grid and having the node type configured to inject product fields into the teaser.  This will give the product fields the right wrapper to be updated when the Add to Cart form attribute select lists are updated.</p>
      <div class="screenshot screenshot-caption">
         <div class="img">
            <a href="/user/pages/02.commerce1/01.01.user-guide/02.Products/04.Setting-up-a-Product-Catalog/Prod-Catalog-Advanced-Step1.png">
            <img src="/user/pages/02.commerce1/01.01.user-guide/02.Products/04.Setting-up-a-Product-Catalog/Prod-Catalog-Advanced-Step1.png" alt="Choose Type Product Display and use Grid, Fields." />
            </a>
         </div>
         <div class="caption">
            <p class="caption-title">New View</p>
            <p>We're creating a new view based on Product Displays. Instead of relying on Teasers to get all of the fields, we're going to display fields the way we want them using a Relationship. If this seems dull, imagine adding a default argument for taxonomy and you instantly have a categorized catalog page.</p>
         </div>
         <ul class="screenshot_breadcrumbs">
            <li class="first">Administration</li>
            <li>Structure</li>
            <li>Views</li>
            <li class="last">Add a New View</li>
         </ul>
      </div>
      <div class="screenshot screenshot-caption">
         <div class="img">
            <a href="/user/pages/02.commerce1/01.01.user-guide/02.Products/04.Setting-up-a-Product-Catalog/Prod-Catalog-Advanced-Step2.png">
            <img src="/user/pages/02.commerce1/01.01.user-guide/02.Products/04.Setting-up-a-Product-Catalog/Prod-Catalog-Advanced-Step2.png" alt="Lets go ahead and expand the advanced tab and add a relationship." />
            </a>
         </div>
         <div class="caption">
            <p class="caption-title">Expand Advanced</p>
            <p>If this is your first time opening the View's advanced column, go ahead and expand it. Go ahead and click "Add" next to Relationships once it is expanded.</p>
         </div>
         <ul class="screenshot_breadcrumbs">
            <li class="first">Administration</li>
            <li>Structure</li>
            <li>Views</li>
            <li>Edit View</li>
            <li>Expand Advanced</li>
            <li class="last">Add Relationship</li>
         </ul>
      </div>
      <div class="screenshot screenshot-caption">
         <div class="img">
            <a href="/user/pages/02.commerce1/01.01.user-guide/02.Products/04.Setting-up-a-Product-Catalog/Prod-Catalog-Advanced-Step3.png">
            <img src="/user/pages/02.commerce1/01.01.user-guide/02.Products/04.Setting-up-a-Product-Catalog/Prod-Catalog-Advanced-Step3.png" alt="This is the magical Views Relationship that we will use." />
            </a>
         </div>
         <div class="caption">
            <p class="caption-title">Magical Relationship</p>
            <p>There is a product reference field on our Product Displays. This relationship in Views will make all of the product reference fields available to be used in the fields area.</p>
         </div>
         <ul class="screenshot_breadcrumbs">
            <li class="first">Administration</li>
            <li>Structure</li>
            <li>Views</li>
            <li>Edit View</li>
            <li class="last">Add Relationship</li>
         </ul>
      </div>
      <div class="screenshot screenshot-caption">
         <div class="img">
            <a href="/user/pages/02.commerce1/01.01.user-guide/02.Products/04.Setting-up-a-Product-Catalog/Prod-Catalog-Advanced-Step4.png">
            <img src="/user/pages/02.commerce1/01.01.user-guide/02.Products/04.Setting-up-a-Product-Catalog/Prod-Catalog-Advanced-Step4.png" alt="You only want Product Displays that have products associated with them." />
            </a>
         </div>
         <div class="caption">
            <p class="caption-title">Relationship</p>
            <p>You only want Product Displays that have products associated with them. Otherwise, not much to see here.</p>
         </div>
         <ul class="screenshot_breadcrumbs">
            <li class="first">Administration</li>
            <li>Structure</li>
            <li>Views</li>
            <li>Edit View</li>
            <li class="last">Add Relationship</li>
         </ul>
      </div>
      <div class="screenshot screenshot-caption">
         <div class="img">
            <a href="/user/pages/02.commerce1/01.01.user-guide/02.Products/04.Setting-up-a-Product-Catalog/Prod-Catalog-Advanced-Step5.png">
            <img src="/user/pages/02.commerce1/01.01.user-guide/02.Products/04.Setting-up-a-Product-Catalog/Prod-Catalog-Advanced-Step5.png" alt="Let's add a few fields" />
            </a>
         </div>
         <div class="caption">
            <p class="caption-title">Add fields</p>
            <p>Let's add a few fields</p>
         </div>
         <ul class="screenshot_breadcrumbs">
            <li class="first">Administration</li>
            <li>Structure</li>
            <li>Views</li>
            <li>Edit View</li>
            <li class="last">Add fields</li>
         </ul>
      </div>
      <div class="screenshot screenshot-caption">
         <div class="img">
            <a href="/user/pages/02.commerce1/01.01.user-guide/02.Products/04.Setting-up-a-Product-Catalog/Prod-Catalog-Advanced-Step6.png">
            <img src="/user/pages/02.commerce1/01.01.user-guide/02.Products/04.Setting-up-a-Product-Catalog/Prod-Catalog-Advanced-Step6.png" alt="Add these fields" />
            </a>
         </div>
         <div class="caption">
            <p class="caption-title">Add fields</p>
            <p>The three recommended fields are Add to Cart Form, Price, and Image. The best way to view all of these is to choose to filter the "Commerce Product." You might want to add a Product Title, but we will be using the Product Display Title.</p>
         </div>
         <ul class="screenshot_breadcrumbs">
            <li class="first">Administration</li>
            <li>Structure</li>
            <li>Views</li>
            <li>Edit View</li>
            <li class="last">Add fields</li>
         </ul>
      </div>
      <div class="screenshot screenshot-caption">
         <div class="img">
            <a href="/user/pages/02.commerce1/01.01.user-guide/02.Products/04.Setting-up-a-Product-Catalog/Prod-Catalog-Advanced-Step7.png">
            <img src="/user/pages/02.commerce1/01.01.user-guide/02.Products/04.Setting-up-a-Product-Catalog/Prod-Catalog-Advanced-Step7.png" alt="Add to Cart Form" />
            </a>
         </div>
         <div class="caption">
            <p class="caption-title">Add to Cart</p>
            <p>Make sure to use the new relationship, leave off the labels, and you can leave the "link products" unchecked.</p>
         </div>
         <ul class="screenshot_breadcrumbs">
            <li class="first">Administration</li>
            <li>Structure</li>
            <li>Views</li>
            <li>Edit View</li>
            <li class="last">Add to Cart</li>
         </ul>
      </div>
      <div class="screenshot screenshot-caption">
         <div class="img">
            <a href="/user/pages/02.commerce1/01.01.user-guide/02.Products/04.Setting-up-a-Product-Catalog/Prod-Catalog-Advanced-Step8.png">
            <img src="/user/pages/02.commerce1/01.01.user-guide/02.Products/04.Setting-up-a-Product-Catalog/Prod-Catalog-Advanced-Step8.png" alt="Price Field" />
            </a>
         </div>
         <div class="caption">
            <p class="caption-title">Price Field</p>
            <p>Use the new relationship, leave off the label, and choose formatted amount and opt in to the calculated price.</p>
         </div>
         <ul class="screenshot_breadcrumbs">
            <li class="first">Administration</li>
            <li>Structure</li>
            <li>Views</li>
            <li>Edit View</li>
            <li class="last">Price Field</li>
         </ul>
      </div>
      <div class="screenshot screenshot-caption">
         <div class="img">
            <a href="/user/pages/02.commerce1/01.01.user-guide/02.Products/04.Setting-up-a-Product-Catalog/Prod-Catalog-Advanced-Step9.png">
            <img src="/user/pages/02.commerce1/01.01.user-guide/02.Products/04.Setting-up-a-Product-Catalog/Prod-Catalog-Advanced-Step9.png" alt="Image Field" />
            </a>
         </div>
         <div class="caption">
            <p class="caption-title">Image Field</p>
            <p>Use the new relationship, leave off the label, and choose thumbnail to keep the image in a reasonable size.</p>
         </div>
         <ul class="screenshot_breadcrumbs">
            <li class="first">Administration</li>
            <li>Structure</li>
            <li>Views</li>
            <li>Edit View</li>
            <li class="last">Image Field</li>
         </ul>
      </div>
      <div class="screenshot screenshot-caption">
         <div class="img">
            <a href="/user/pages/02.commerce1/01.01.user-guide/02.Products/04.Setting-up-a-Product-Catalog/Prod-Catalog-Advanced-Step10.png">
            <img src="/user/pages/02.commerce1/01.01.user-guide/02.Products/04.Setting-up-a-Product-Catalog/Prod-Catalog-Advanced-Step10.png" alt="Rearrange Fields" />
            </a>
         </div>
         <div class="caption">
            <p class="caption-title">Rearrange Fields</p>
            <p>Rearrange Fields to this order: Image, Title, Price, Add to Cart button.</p>
         </div>
         <ul class="screenshot_breadcrumbs">
            <li class="first">Administration</li>
            <li>Structure</li>
            <li>Views</li>
            <li>Edit View</li>
            <li class="last">Rearrange Fields</li>
         </ul>
      </div>
      <div class="screenshot screenshot-caption">
         <div class="img">
            <a href="/user/pages/02.commerce1/01.01.user-guide/02.Products/04.Setting-up-a-Product-Catalog/Prod-Catalog-Advanced-Step11.png">
            <img src="/user/pages/02.commerce1/01.01.user-guide/02.Products/04.Setting-up-a-Product-Catalog/Prod-Catalog-Advanced-Step11.png" alt="Final Product Catalog" />
            </a>
         </div>
         <div class="caption">
            <p class="caption-title">Final Catalog</p>
            <p>The final catalog looks exactly the same as the "Simple" view except that this catalog has links to the Product Displays. This is a critical difference and can cause issues if you don't choose the right one.</p>
         </div>
         <ul class="screenshot_breadcrumbs">
            <li class="first">Administration</li>
            <li>Structure</li>
            <li>Views</li>
            <li>Edit View</li>
            <li class="last">Rearrange Fields</li>
         </ul>
      </div>
      <h3 id="taxonomy">Taxonomy Listing of Product Display Teasers</h3>
      <p>Alternatively, you can use the built-in Drupal Taxonomy pages to list products of a certain category. Ryan Szrama has an excellent video showing off this process:</p>
      <iframe src="http://player.vimeo.com/video/22748684?portrait=0" width="400" height="310" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
</div>