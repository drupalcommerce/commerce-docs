---
title: Profile configuration
taxonomy:
    category: docs
---

This section describes how you can use *Profiles* to capture and store information about your customers. In a default Drupal Commerce installation, the *Customer* profile type is provided for you. You can customize this *Customer* profile type to suit your needs and/or create additional profile types.

Access the administrative page for the *Customer* profile type and any others you create at `/admin/config/people/profiles`.

![Profile type configuration](../../images/profile-config-1.png)

### Customer profile fields
By default, profiles do not have any visible/editable fields; however, the Customer profile type includes an [Address](../../02.addresses) field. Each Customer profile has a single address. You can customize the Address field that's used by the Customer profile at `/admin/config/people/profile-types/manage/customer/fields/profile.customer.address`. If the Commerce Tax module is installed, a "Tax number" field will also be added to the Customer profile type.

You can add custom fields to a profile using its *Manage fields* administrative page.  As an example, let's add a *Contact phone* field to our *Customer* profile type.

#### Customization example: *contact phone* field
##### Add the *contact phone* field
1. If the Drupal core [Telephone module] is not already installed, navigate to the *Extend* administrative page and install it: `/admin/modules`. (Alternatively, you could just use a text field.)
2. Navigate to the *Manage fields* administrative page for the *Customer* profile type and click the *Add field* button.
3. Select *Telephone number* as the field type.
4. Enter *Contact phone* for the field label.
5. Click the *Save and continue* button.

![Add contact phone field](../../images/profile-config-2.png)

##### Configure the *contact phone* field
1. On the *Field settings* page, leave the *Allowed number of values* set to 1.
2. Click the *Save field settings* button.
3. On the *settings* administrative page for *Contact phone*, select the *This is a private field* setting. Private profile fields are visible only to the owner of the profile and administrative users.
4. Click the *Save settings* button.

![Configure contact phone field](../../images/profile-config-3.png)

Next, you can use the *Manage form display* and *Manage display* administration pages for the profile to customize how the new field appears on data entry forms and in a customer's *Address book*. In the "Custom display settings", there are two additional form modes, Billing and Shipping, that can be enabled. If enabled, these form modes will be used whenever profile data entry forms are rendered during checkout and on the order admin edit page.

![Profile form modes](../../images/profile-config-6.png)

#### Adding fields to the customer profile vs. creating new profile types
The *customer* profile should contain all the billing information needed to process an order. If you have physical products and use the *Commerce shipping* module, then *customer* profiles can also be used for the shipping information associated with orders. For simpler commerce sites, especially those that are B2C, the *address* field may be all you need for the *customer* profile. For additional information, you could create a separate profile type to manage information about your customer like name and phone number. With this architecture, your customers would only enter need to enter their contact information once, for that separate profile type. In contrast, if you added the contact name and phone number fields to the *customer* profile, your customers would need to repeatedly enter that information for every billing and shipping address added.

For other commerce sites, your customers may actually be purchasing agents who order on behalf of a number of end users. In that case, you might need a set of additional fields associated with *each* billing and shipping address, such as contact email, contact name, contact phone, a note field, reference to a customer organization, reference to an assigned sales representative, etc. So, you would add each of these fields to your *customer* profile type. Your customers would have the flexiblity to enter completely different sets of data for each of their *customer* profiles. Ultimately, you'll need to decide what information needs to be captured on a per-order basis vs. what customer information you need apart from that billing- and shipping-specific data.

### Create a profile type
To create a new profile type:
1. Navigate to the *Profile types* administrative page at `/admin/config/people/profile-types`.
2. Click the *Add profile type* button.
3. Enter the name of the profile type for the *Label*. You can use the default settings for all other options, for now.
4. Click the *Save* button.

![Profile type creation](../../images/profile-config-4.png)

#### Profile type configuration options
##### Label
This is the name of the profile type. Change the label to change how it's displayed to customers.

##### Description
The description field is only used for administrative purposes. It is displayed in the *Profile types* listing at `/admin/config/people/profiles`. If your store will have many different profile types, entering a description for each can be helpful for profile management.

##### Include in user registration form
By default, the *Customer* profile type is included in the user registration form. If this option is enabled for a profile type, then its data entry form will be embedded at the end of the new user registration form. In this example, *Contact phone* has been added to the *Customer profile* profile type, so it also appears on the registration form.

##### Allow multiple profiles
This option is enabled for the *Customer* profile type, to allow customers to create and save multiple addresses in their [*Address book*](../01.overview#address-book). If a user should only have a single set of data for a profile type, leave this option unselected. For example, if you create a *Contact information* profile type, you may want to have only one set of contact information per user.

##### Allowed roles
By default, there are no roles selected for the *Customer* profile type, which means that all users can have this profile type. If you allow customers to check out anonymously (i.e., "guest checkout"), then you need to allow *all* users to have *customer* profiles. Every order requires a *customer* profile for its *billing information* field. For other profile types, you may want to limit their usage to only certain, selected roles.

##### Create a new revision when a profile is modified
Profiles are revisionable. Select this option to force a profile entity to be saved as a new revision whenever the profile is updated. This setting is normally not necessary for profiles used by Drupal Commerce since copies of profiles are saved to individual orders.

[Telephone module]: https://www.drupal.org/docs/8/core/modules/telephone/overview
