---
title: Create a product catalog
taxonomy:
    category: docs
---

## Install the Search API module

Install [Search API](https://www.drupal.org/project/search_api). Here we will
be using database search that is available in the `search_api` module by default. You can
also use other extension modules listed [here](https://www.drupal.org/node/1999262).
If you do not have `search_api` installed, execute the following commands:

```bash
composer require drupal/search_api
drupal module:install search_api search_api_db
```

## Create search server

Go to `/admin/config/search/search-api/add-server`. Fill out the information as
follows:

![Search add server](../images/search_create_server.png)

## Create search index

Go to `/admin/config/search/search-api/add-index`. Fill out the information as follows:

![Search add server 1](../images/search_create_index_1.png) 

![Search add server 2](../images/search_create_index_2.png)

![Search add server 3](../images/search_create_index_3.png)

Now you will be adding fields. The search data will be indexed based on these
fields, and these fields will be available when you create view, and you can
create facets out of these fields.

We will be showing the required fields to create a basic product catalog, you
can add other fields as necessary.

![Search add server 4](../images/search_create_index_4.png)

We will be showing variations in product catalog.

![Search add server 5](../images/search_create_index_5.png)

Click **Save changes**.

## Create view

Go to `/admin/structure/views/add`, fill out the information as follows:

![Search add view 1](../images/search_create_view_1.png)

Click "Save and edit"

Let's show the products in grid-style.

![Search add view 2](../images/search_create_view_2.png)

![Search add view 3](../images/search_create_view_3.png)

We will be showing the product title and "Add to cart" widget. You can change it
as you per your requirement.

![Search add view 4](../images/search_create_view_4.png)

![Search add view 5](../images/search_create_view_5.png)

![Search add view 6](../images/search_create_view_6.png)

Click "Add and configure fields".

![Search add view 7](../images/search_create_view_7.png)

Click "Apply and continue".

![Search add view 8](../images/search_create_view_8.png)

Click "Apply".

![Search add view 9](../images/search_create_view_9.png)

Click "Save".

Now go ahead and visit `/products` page.

![Product catalog page](../images/product_catalog_page.png)

Voila!! Your product catalog is ready.

## Create facets

We are going to add facets to the product catalog. Your catalog will look like
this:

![Product catalog page with facets](../images/product_catalog_page_facets.png)

First things first, install [Facets](https://www.drupal.org/project/facets) module. Execute the following commands:

```bash
composer require drupal/facets
drupal module:install facets
```

The **Facets** module is now installed. Now, we will be adding the facets.

Go to `/admin/config/search/facets`. Since we have already added a view of type
DB index, it should show there.

![Sample facet setting](../images/search_create_facet_sample.png)

Click **+ Add facet**.

Earlier we have added "Brand" and "Category" fields while creating the search
index. Now we are going to use them as facets.

Do the settings as follows:

![Create facet 1](../images/search_create_facet_1.png)

![Create facet 2](../images/search_create_facet_2.png)

![Create facet 3](../images/search_create_facet_3.png)

![Create facet 4](../images/search_create_facet_4.png)

Click **Save**.

Repeat the above steps for adding the "Category" facet.

![Create facet 5](../images/search_create_facet_5.png)

Finally, you will have two facets.

![Create facet 6](../images/search_create_facet_6.png)

These facets are now available as blocks. We will place them in the catalog
page.

Go to `/admin/structure/block`.

Select any block region. In this case *Bartik* theme is used, and the facet
blocks will be placed inside *Sidebar first*.
   
![Place facet 1](../images/search_place_facet_1.png)

Place "Brand" facet.

![Place facet 2](../images/search_place_facet_2.png)

![Place facet 3](../images/search_place_facet_3.png)

Similarly, place "Category" facet.

![Place facet 4](../images/search_place_facet_4.png)

**Rebuild the cache.**

Visit ``/products`` page, and...

![Product catalog page with facets](../images/product_catalog_page_facets.png)
