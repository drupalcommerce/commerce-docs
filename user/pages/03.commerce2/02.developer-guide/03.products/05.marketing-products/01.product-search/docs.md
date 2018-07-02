---
title: Basic product search
taxonomy:
    category: docs
---

> NOTE: this page needs to be updated. Want to simplify this by using Fields instead of Rendered entity for the View display. The current stage of this page is very much an "initial draft" and will be revised soon.

##### Install Search API modules
1. Install the [Search API module]. (*see the extending docs.*)
2. Navigate to the "Extend" page at `/admin/modules`.
3. Install the "Database Search" and "Search API" modules.
4. Also, it is recommended that you *uninstall* the Core "Search" module whenever you are using Seach API.

![Install search api modules](../../images/product-search-1.jpg)

##### Add a server
1. Navigate to the Search API configuration page at `/admin/config/search/search-api`.
2. Click the "Add server" button to add a server.
3. Enter "Database" for the server name.
4. Click the "Save" button.

![Add server](../../images/product-search-2.jpg)

##### Add an index
From the documentation:
>An index is a configuration object defining a set of data to be indexed. The index's settings determine what data is indexed and how it is indexed.

1. Return to the Search API configuration page at `/admin/config/search/search-api`.
2. Click the "Add index" button to add an index.
3. Enter "Products" for the index name.
4. Scroll down the list of "Data sources" until you see "Product".
5. Select "Product" as the type of data you want to index and search with this index.
6. Select "Database" (*the server we just created*) for the "Server".
7. Click the "Save and add fields" button.

![Add search index](../../images/product-search-3.jpg)

##### Select the indexed fields
Add fields for all properties for which you want to store data on the search server.
We'll select all the fields we want indexed for our search. Explain this here...
Title, Body: Processed text, Variations (SKU and title)
Only fulltext fields can be used in fulltext searched. Use it to find individual words contained in this field, not just the whole field value. completely searched for filtering.
Boost value affects score, weighting.

![Add index fields](../../images/product-search-4.jpg)

##### Configure processors
Maybe link to "Processors" section of search api documentation guide.
1. Enable the processors you want to use. We'll select "Entity status", "HTML filter", and "Ignore case".
2. We'll use the default settings for the "Processor order" settings.
3. For the "HTML filter" processor settings, we only need the processor to be enabled for the product Body field. So deselect the other options. We'll leave the "Tag boosts" as is.
4. For the "Ignore case" processor settings, we'll just use the default settings.

![Configure processors](../../images/product-search-5.jpg)

#### Create a products search view
1. Navigate to the Views administration page at `/admin/structure/views` and click the "Add view" button.
2. Enter "Product search" for the view name.
3. Select "Index Products" for the "Show" setting, under "View settings". This is the index we created previously and named "Products".
4. Select "Create a page", under "Page settings".
5. Enter "Products" for the page title and "products" for the path.
6. For the "Page display settings", select "Unformatted list" of "Fields".
5. Click the "Save and edit" button.

![Create product search view](../../images/product-search-8.jpg)

##### Configure the products search view
fix this here for fields instead of rendered entity...
1. Click on the "Settings" link to the right of "Show: Rendered entity", in the "Format" section, and change the "View mode" for each product type to "Search".
2. Click on the "Add" button in the "Filter criteria" section, select the "Fulltext search" option, and click the "Add and configure filter criteria" button.
3. Configure the Fulltext search filter:
 - Select "Expose this filter to visitors, and allow them to change it".
 - Select the "Required" option.
 - Enter "Search products" for the "Label".
 - Select "Contains any of these words" for the "Operator".

![Add fulltext search filter](../../images/product-search-9.jpg)

4. Click on the "Add" button in the "Sort criteria" section, select the "Relevance" option, and click the "Add and configure sort criteria" button. Select "Sort descending" for the "Order".
5. In the "Exposed form" section of the "Advanced" settings, click the "No" link next to "Exposed form in block" to change the setting to "Yes".
6. Also in the "Exposed form" section of the "Advanced" settings, click the "Settings" link next to "Exposed form style" to change the "Submit button text" to "Search".
7. Click the "Save" button to save your changes.

#### Add the search block to your pages
1. Navigate to the "Block layout" administration page at `/admin/structure/block`.
2. Click the "Place block" button for the "Header" region.
3. Click the "Place block" button for the "Exposed form: product_search-page_1" block.

This isn't working...I think because of the product template. Need to use fields instead, I think... Yes, need to re-write this to use fields instead of rendered entity.

### Links and resources
* Link to User guide page on Views
* Link to user guide on Block layout config

---
In the next section, we'll look at how we can extend this basic product search with facets to create a product catalog for our site.

[Search API module]: https://www.drupal.org/project/search_api