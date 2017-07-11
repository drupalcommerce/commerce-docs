Create a promotion
==================

Imagine that your store is currently running a special New Year campaign where you'd like to give customers a 10% discount on orders worth $50 or more. With Commerce Core, it is quite simple.

Adding a New Promotion
----------------------

- We can create a new promotion by going to ``/admin/commerce/promotions`` and clicking the "Add a new promotion" button.

![image](https://user-images.githubusercontent.com/11439056/28079277-4c4d0d2a-6685-11e7-9888-1c5eeeaf7a3a.png)

- Give your promotion a descriptive name, for example, "10% off on $50 or more orders"
  
Setting the Offer
-----------------

  - Let's now decide on the type of offer we'd like to give users. As our goal is to give customers a 10% discount on orders worth $50 or more, let's select the "Percentage off the order total" radio button under ``Offer``.
  - Now enter the percentage you'd like to give the user, example, "10%".

![image](https://user-images.githubusercontent.com/11439056/28079321-7fcfe500-6685-11e7-9ecf-f54d15077ff9.png)

  
Adding Conditions
-----------------

The most interesting part of managing promotions is definitely the conditions section. Currently, Commerce Core gives us the ability to limit applying a promotion based on the following paramters:
- Customer
  - Limit by the customer's billing address
  - Limit by the customer's role
- Order
  - Limit by total price
- Product
  - Limit by the quantity of products the customer purchases
  - Limit by the products that are in the cart
    - You can use the autocomplete to enter a comma separated list of products to apply the promotion to.

Going back to the campaign for our store, we'll go ahead and add an "Order" condition by checking the ``Limit by total price`` checkbox and selecting the ``Greater than`` operator and set the "Amount" to ``50.00``.

![image](https://user-images.githubusercontent.com/11439056/28079344-97513580-6685-11e7-999a-419d2e6427a9.png)


More Configuration
------------------

We can set further limitations on the promotion, including:
- Dates
  - Set a start and end date for the promotion
- Usage Limits
  - Limit the number of times the promotion can be used
- Compatibility
  - Denote if the promotion can be combined with other promotions

![image](https://user-images.githubusercontent.com/11439056/28079352-a4c92ee8-6685-11e7-82db-25b22c311e28.png)


Now, that we've entered the necessary conditions let's "Save" the promotion. We can test this out by adding a product or a number of products to the cart. Once the order total reaches $50 or more, note, a discount is automatically applied to our order total.

![image](https://user-images.githubusercontent.com/11439056/28079863-8d8b92e6-6687-11e7-869b-f25eecfe276f.png)
