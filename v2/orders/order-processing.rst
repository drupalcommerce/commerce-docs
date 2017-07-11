Order Processing
================

Order processing is part of the order refresh process. This is run when
on draft orders to ensure that it has up to date adjustments and that
its order items are up to date.

In Commerce Core, the order process moves throug, h the following cycle: Cart -> Validation -> Fulfillment -> Completed. It starts with the order being in the shopping cart, which is the Cart state, then, once the order is placed, it is put in the Validation state. Once we're ready to ship the goods, the order is moved to the Fulfillment state. And finally, once it leaves our store, the order is officially Completed.

Now, that we know the process, let's take a look at how we can create orders on behalf of customers and move them along the order life cycle.

Creating an Order
-----------------
Site administrators can create orders on behalf of their customers by going to ``/admin/commerce/orders/add``. From here, we can either create a new order for an existing customer (chosen from the autocomplete search box). Or, we can create a new customer on the fly by providing just an email address.

.. image:: https://user-images.githubusercontent.com/11439056/28088259-c5191542-66a2-11e7-9e3f-016ed0e5f60f.png

Note: We also have the option to create the order for a different date.

Once we've made the appropriate selections, we are taken to the order creation page where we enter the billing details and the products in the order.

.. image:: https://user-images.githubusercontent.com/11439056/28088341-009a8696-66a3-11e7-8725-8a427b8787a6.png

As we move further down, we'll see that there is an "Adjustments" section. This where we can add promotions, add a shipping amount, add tax, as well as, any custom amount to the order total.
 
 And finally, we can apply coupons to the order.
 
.. image:: https://user-images.githubusercontent.com/11439056/28088650-f8d08a4a-66a3-11e7-9992-0b14612e4ee5.png

If we already have promotions running, this will automatically be reflected in the item pricing and the overall order total.

Now that we've added all the order details, let's save the order. We also have the option of saving this new order to our cart. This will automatically add the products in this order to our shopping cart so we can complete the checkout by going to ``/cart``. 

.. image:: https://user-images.githubusercontent.com/11439056/28088833-9d349bb2-66a4-11e7-8ead-b2b8ee0c356d.png

Now, click to view the order. Notice that a discount has been automatically applied to the order total as we had a "20% Off" promotion running store-wide. Also, notice that the order is currently in "Draft" state. 

As an admin, once we've got all the order details done, our next job would be to complete payment on the order. That's where the 'Payments' tab comes in. The payments page allows us to process a Credit Card/Email Money Transfer/Bank Transfer/Cheque payment for the order using the store's preferred Payment Gateway.

Now, that we've got money for our products from the customer, let's go ahead and officially place the order by clicking on the "Place order" button. This will put the order in 'Validation' state.

.. image:: https://user-images.githubusercontent.com/11439056/28089153-ab0757b0-66a5-11e7-807d-184b794b26f0.png 
