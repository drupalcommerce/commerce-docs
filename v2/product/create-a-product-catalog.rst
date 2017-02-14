Create a product catalog
========================

Install ``search_api`` module
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

Install `search_api <https://www.drupal.org/project/search_api>`_. Here we will
be using database search that is available in ``search_api`` by default. You can
also use other extension modules listed `here <https://www.drupal.org/node/1999262>`_.
If you do not have ``search_api`` installed, execute the following commands:

.. code-block:: bash

    composer require drupal/search_api
    drupal module:install search_api search_api_db

Create search server
~~~~~~~~~~~~~~~~~~~~

Go to ``admin/config/search/search-api/add-server``. Fill out the information as
follows:

.. figure:: images/search_create_server.png
   :alt: Search add server

Create search index
~~~~~~~~~~~~~~~~~~~

Go to ``admin/config/search/search-api/add-index``. Fill out the information as
follows:

.. figure:: images/search_create_index_1.png
   :alt: Search add server 1

.. figure:: images/search_create_index_2.png
   :alt: Search add server 2

.. figure:: images/search_create_index_3.png
   :alt: Search add server 3

Now you will be adding fields. The search data will be indexed based on these
fields, and these fields will be available when you create view, and you can
create facets out of these fields.

We will be showing the required fields to create a basic product catalog, you
can add other fields as necessary.

.. figure:: images/search_create_index_4.png
   :alt: Search add server 4

We will be showing variations in product catalog.

.. figure:: images/search_create_index_5.png
   :alt: Search add server 5

Click "Save changes".

Create view
~~~~~~~~~~~

Go to ``admin/structure/views/add``, fill out the information as follows:

.. figure:: images/search_create_view_1.png
   :alt: Search add view 1

Click "Save and edit"

Let's show the products in grid-style.

.. figure:: images/search_create_view_2.png
   :alt: Search add view 2

.. figure:: images/search_create_view_3.png
   :alt: Search add view 3

We will be showing the product title and "Add to cart" widget. You can change it
as you per your requirement.

.. figure:: images/search_create_view_4.png
   :alt: Search add view 4

.. figure:: images/search_create_view_5.png
   :alt: Search add view 5

.. figure:: images/search_create_view_6.png
   :alt: Search add view 6

Click "Add and configure fields".

.. figure:: images/search_create_view_7.png
   :alt: Search add view 7

Click "Apply and continue".

.. figure:: images/search_create_view_8.png
   :alt: Search add view 8

Click "Apply".

.. figure:: images/search_create_view_9.png
   :alt: Search add view 9

Click "Save".

Now go ahead and visit ``/products`` page.

.. figure:: images/product_catalog_page.png
   :alt: Product catalog page

Voila!! Your product catalog is ready.
