---
title: Adding images to variations and dealing with image styles
taxonomy:
    category: docs
---

<div class="docs-enhanced">
<p>Adding images to your products sounds like an easy scenario. In fact. you might be surprised to see this in a documentation user guide. But there are a lot of questions you will need to answer before you can even begin to understand how you might want your website to handle images. For example, do you want each "size" of tshirt to have multiple photos? What about each size and each gender? What about just changing the photos on gender, regardless of size? Or perhaps you want a single gallery for all the variations per page. We don't answer everyone of the possibilities below, but perhaps you can learn how we're doing this and come up with your own ways to treat images on products.</p>
<h3>Per Variation (Demo Store Setup)</h3>
<p>The Kickstart 2 Demo Store chooses a relatively complicated setup to show you how that complexitity works through the entire site: Each variation has it's own set of images. Below are the two steps you'll need to take to add an image using the Kickstart 2 Demo Store</p>
<div class="screenshot screenshot-caption">
    <div class="img">
        <a href="/sites/default/files/docs/CK-Product-Images-01.png">
<img src="/sites/default/files/docs/CK-Product-Images-01.png" alt="Product Images - Add a Product" />
</a>
    </div>
    <div class="caption">
        <p class="caption-title">Step 1: Add Product</p>
        <p>To add a product with an image, first you mouseover "Products" and choose "Add a Product."</p>
    </div>
</div>
<div class="screenshot screenshot-caption">
    <div class="img">
        <a href="/sites/default/files/docs/CK-Product-Images-02.png">
<img src="/sites/default/files/docs/CK-Product-Images-02.png" alt="Product Images - Add a Product" />
</a>
    </div>
    <div class="caption">
        <p class="caption-title">Step 2: Add Variation Image</p>
        <p>In Drupal, image sizes are only limited by the amount you can safely upload and how big of an image your server can process. It usually gives you an idea of how big of an image you can upload based on maximum filesize. If unsure, try not to upload images greater than 5MB.</p>
    </div>
</div>
<p>To set this up on the "No Demo" kickstarter, you can follow these steps:</p>
<div class="screenshot screenshot-caption">
    <div class="img">
        <a href="/sites/default/files/docs/CK-Product-Images-03.png">
<img src="/sites/default/files/docs/CK-Product-Images-03.png" alt="Product Images - Add a Product" />
</a>
    </div>
    <div class="caption">
        <p class="caption-title">Step 1</p>
        <p>Let's go to the Product Variations so we can add a new one. If you don't need to add a new variation, skip to step 4 below.</p>
    </div>
    <ul class="screenshot_breadcrumbs">
        <li class="first">Products</li>
        <li class="last">Variations</li>
    </ul>
</div>
<div class="screenshot screenshot-caption">
    <div class="img">
        <a href="/sites/default/files/docs/CK-Product-Images-04.png">
<img src="/sites/default/files/docs/CK-Product-Images-04.png" alt="Product Images - Click Create a Variation" />
</a>
    </div>
    <div class="caption">
        <p class="caption-title">Step 2</p>
        <p>If you need a new Variation, let's go ahead and click on "Add a New Variation"</p>
    </div>
    <ul class="screenshot_breadcrumbs">
        <li class="first">Products</li>
        <li>Variations</li>
        <li class="last">Add a Variation</li>
    </ul>
</div>
<div class="screenshot screenshot-caption">
    <div class="img">
        <a href="/sites/default/files/docs/CK-Product-Images-05.png">
<img src="/sites/default/files/docs/CK-Product-Images-05.png" alt="Product Images - Create a Variation" />
</a>
    </div>
    <div class="caption">
        <p class="caption-title">Step 3</p>
        <p>This is what the form looks like to create a new Product Variation. Simply give it a name, make sure both checkmarks are checked and click "save product variation type."</p>
    </div>
    <ul class="screenshot_breadcrumbs">
        <li class="first">Products</li>
        <li>Variations</li>
        <li class="last">Add a Variation</li>
    </ul>
</div>
<div class="screenshot screenshot-caption">
    <div class="img">
        <a href="/sites/default/files/docs/CK-Product-Images-06.png">
<img src="/sites/default/files/docs/CK-Product-Images-06.png" alt="Product Images - Manage Fields" />
</a>
    </div>
    <div class="caption">
        <p class="caption-title">Step 4</p>
        <p>Now you want to locate your new Product Variation and click "Manage Fields" next to it.</p>
    </div>
    <ul class="screenshot_breadcrumbs">
        <li class="first">Products</li>
        <li>Variations</li>
        <li class="last">Manage Fields</li>
    </ul>
</div>
<div class="screenshot screenshot-caption">
    <div class="img">
        <a href="/sites/default/files/docs/CK-Product-Images-07.png">
<img src="/sites/default/files/docs/CK-Product-Images-07.png" alt="Product Images - Manage Fields" />
</a>
    </div>
    <div class="caption">
        <p class="caption-title">Step 5</p>
        <p>Let's go ahead and add an existing field. It's already got a database table and everything defaults to the one that comes with Kickstart 2 No Demo store. This is potentially more efficient and clean than creating a brand new field.</p>
    </div>
    <ul class="screenshot_breadcrumbs">
        <li class="first">Products</li>
        <li>Variations</li>
        <li>Manage Fields</li>
        <li class="last">Add Existing Field</li>
    </ul>
</div>
<div class="screenshot screenshot-caption">
    <div class="img">
        <a href="/sites/default/files/docs/CK-Product-Images-08.png">
<img src="/sites/default/files/docs/CK-Product-Images-08.png" alt="Product Images - Manage Fields" />
</a>
    </div>
    <div class="caption">
        <p class="caption-title">Step 6</p>
        <p>This is what the product variation type manage fields section should look like to create a gallery product field.</p>
    </div>
    <ul class="screenshot_breadcrumbs">
        <li class="first">Products</li>
        <li>Variations</li>
        <li class="last">Manage Fields</li>
    </ul>
</div><div class="screenshot screenshot-caption">
    <div class="img">
        <a href="/sites/default/files/docs/CK-Product-Images-09.png">
<img src="/sites/default/files/docs/CK-Product-Images-09.png" alt="Product Images - Add Photo" />
</a>
    </div>
    <div class="caption">
        <p class="caption-title">Example Product Form</p>
        <p>This is what adding a new product type should look like for you to add new images.</p>
    </div>
    <ul class="screenshot_breadcrumbs">
        <li class="first">Products</li>
        <li>Add a Product</li>
        <li class="last">Add a Widget</li>
    </ul>
</div>
<h3>Per Product Display</h3>
<p>You can follow the same procedure above to add an image gallery to your product displays. The advantage or difference is that you are adding the image field to the Content Type or the "group" of products. So, if you were selling tshirts and just had one image, this is how you would set that up.</p>
<div class="screenshot screenshot-caption">
    <div class="img">
        <a href="/sites/default/files/docs/CK-Product-Images-10.png">
<img src="/sites/default/files/docs/CK-Product-Images-10.png" alt="Product Images - Edit Content Type" />
</a>
    </div>
    <div class="caption">
        <p class="caption-title">Step 1</p>
        <p>Mouseover "Content" and select "Content Types." This will take you to the Product Displays.</p>
    </div>
    <ul class="screenshot_breadcrumbs">
        <li class="first">Content</li>
        <li class="last">Content Types</li>
    </ul>
</div>
<div class="screenshot screenshot-caption">
    <div class="img">
        <a href="/sites/default/files/docs/CK-Product-Images-11.png">
<img src="/sites/default/files/docs/CK-Product-Images-11.png" alt="Product Images - Manage Fields" />
</a>
    </div>
    <div class="caption">
        <p class="caption-title">Step 2</p>
        <p>Select "Manage Fields" next to your Product Display ... for me, this is the one next to "Widgets."</p>
    </div>
    <ul class="screenshot_breadcrumbs">
        <li class="first">Content</li>
        <li>Content Types</li>
        <li class="last">Manage Fields</li>
    </ul>
</div>
<div class="screenshot screenshot-caption">
    <div class="img">
        <a href="/sites/default/files/docs/CK-Product-Images-12.png">
<img src="/sites/default/files/docs/CK-Product-Images-12.png" alt="Product Images - Add Existing Field" />
</a>
    </div>
    <div class="caption">
        <p class="caption-title">Step 3</p>
        <p>Let's add the same existing field as we did in the last step.</p>
    </div>
    <ul class="screenshot_breadcrumbs">
        <li class="first">Content</li>
        <li>Content Types</li>
        <li>Manage Fields</li>
        <li class="last">Add Field</li>
    </ul>
</div>
<div class="screenshot screenshot-caption">
    <div class="img">
        <a href="/sites/default/files/docs/CK-Product-Images-13.png">
<img src="/sites/default/files/docs/CK-Product-Images-13.png" alt="Product Images - Example Form" />
</a>
    </div>
    <div class="caption">
        <p class="caption-title">Example Form</p>
        <p>This is the example form we have for adding images to the product display vs. product variations. As you can see, the image field is independent from the Product variations.</p>
    </div>
</div>
</div>