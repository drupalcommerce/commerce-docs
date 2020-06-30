---
title: Architecture
taxonomy:
    category: docs
---

### Log entities

Logs are content entities that are generated programatically. Each is associated with a specific source entity. There is no user interface for creating or managing logs. Logs are rendered using simple [Inline templates]. Log entities store references to the templates and parameter values for those templates.

See `Drupal\commerce_log\Entity\LogInterface` for the getter/setter methods that can be used for its base fields:

| Base field         | Description |
| ------------------ | ----------- |
| uid                | The user for the log, set automatically to the current user when the log is created. |
| template_id        | Log template ID. (string) |
| category_id        | Log category ID. (string) |
| source_entity_id   | Source entity ID. (integer) |
| source_entity_type | Source entity type. (string) |
| params             | A serialized array of parameters for the log template. |
| created            | Time when the log was created. (timestamp) |


### Generating Logs

To create a new log entity, use the `generate(ContentEntityInterface $source, $template_id, array $params = [])` method provided by the `LogStorage` service. Typically, you will want to implement a custom Event Subscriber to generate logs in response to events. For example, the Commerce Log module has a `CartEventSubscriber` that generates logs whenever an item is added to or removed from a cart. Here is the actual code for generating the items-added logs:

```
public function onCartEntityAdd(CartEntityAddEvent $event) {
  $cart = $event->getCart();
  $this->logStorage->generate($cart, 'cart_entity_added', [
    'purchased_entity_label' => $event->getOrderItem()->label(),
  ])->save();
}
```

The `$source` content entity is the cart, a `commerce_order` entity. The `$template_id` is `cart_entity_added`. And the label for the item being added is passed in to the `generate()` method as an optional extra parameter. `$this->logStorage` is a variable that is set when the event subscriber is constructed. If you are unfamiliar with Drupal Event Subscrbers, Drupal.org provides [Subscribe to and dispatch events] documentation within its [Creating custom modules] guide.

Let's look at the components of the `generate()` functionality in more detail.

#### Source entity
We pass the `cart` entity into the generate function, which uses it to set the `source_entity_id` and `source_entity_type` field values for the Log entity. The Source entity Id will be the unique order Id of the cart, and the Source entity type will be set to `commerce_order`. We are able to get the Cart entity from the event, `Drupal\commerce_cart\Event\CartEntityAddEvent` in this case. That event provides the `getCart()` and `getOrderItem()` methods (as well as `getEntity()` and `getQuantity()`).

The Cart module provides a reference for all available Cart events in `Drupal\commerce_cart\Event\CartEvents`. Similar event definitions are also available in the Commerce Order, Payment, Price, Product, Promotion, Store, and Tax modules. Also, the [State machine module](../../core/state-machine) provides workflow transition events.

#### Log template
In the example above, `cart_entity_added` is the Id of a template provided by the Commerce Log module in `commerce_log.commerce_log_templates.yml`. Here's the start of that file:

```
cart_entity_added:
  category: commerce_cart
  label: 'Added to cart'
  template: '<p><em>{{ purchased_entity_label }}</em> added to the cart.</p>'
cart_item_removed:
  category: commerce_cart
  label: 'Removed from cart'
  template: '<p><em>{{ purchased_entity_label }}</em> removed from the cart.</p>'

order_placed:
  category: commerce_order
  label: 'Order placed'
  template: '<p>The order was placed.</p>'
```

All Log templates must be defined in a `commerce_log_templates` yaml file. You can create new templates in a custom module, by creating a `my_custom_module.commerce_log_templates.yml` file in the root of your custom module. For more information, see [An Introduction to YAML] or [Introduction to YAML in Drupal 8]. Commerce log templates have the following properties:

| Property     | Description |
| ------------ | ----------- |
| id           | A unique id for the template. |
| category     | Id of a template category. |
| label        | Administrative label for the template. |
| template     | Template used for rendering/displaying the log entry. |

##### Log categories
Log categories define the *entity* type associated with a particular log template. The Commerce Log module provides "Cart" and "Order" categories for order entities. When creating new log templates, you can use these existing categories or creat custom ones. Log categories are defined in `*.commerce_log_categories.yml` files. See `commerce_log.commerce_log_categories.yml` as an example. Log categories have the following properties:

| Property     | Description | Example |
| ------------ | ----------- | ------- |
| id           | A unique id for the category. | `commerce_cart` |
| label        | Administrative label for the category | `Cart`  |
| entity_type  | Id of the entity type. | `commerce_order` |

##### Templates
The template string must be safe for translation. It includes html entities and may include [Twig]. Log templates may include parameters, set when the log is generated, using Twig variables. For example, the "Added to cart" template includes a parameter for `purchased_entity_label`:

`<p><em>{{ purchased_entity_label }}</em> added to the cart.</p>`

In the `onCartEntityAdd()` method above, we pass in `$event->getOrderItem()->label()` as the value for this parameter. That text will be displayed in the log entries.

### Displaying logs
Log view builder
In views
Access control

[Inline templates]: https://api.drupal.org/api/drupal/core%21lib%21Drupal%21Core%21Render%21Element%21InlineTemplate.php/class/InlineTemplate/8.9.x
[Subscribe to and dispatch events]: https://www.drupal.org/docs/creating-custom-modules/subscribe-to-and-dispatch-events
[Creating custom modules]: https://www.drupal.org/docs/creating-custom-modules
[An Introduction to YAML]: https://drupalize.me/videos/introduction-yaml?p=3291
[Introduction to YAML in Drupal 8]: https://befused.com/drupal/yaml
[Twig]: https://www.drupal.org/docs/theming-drupal/twig-in-drupal
