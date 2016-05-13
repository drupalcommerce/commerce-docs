# Product Attributes

Attributes are now entity reference fields. Referencing field-able entities allows the usage of fields to hold things
such as the image representation of the attribute, the color value for a color swatch, etc.

## Creating Attributes

There are two entity types used for Product Attributes and their values: commerce_product_attribute, and
commerce_product_attribute_value. We're featuring a more optimized UI, which allows creating and re-ordering
multiple values at the same time:

... needs screenshot ...

Both attribute types and attribute values are fieldable entities. Any additional fields on the attribute type 
(e.g. image or price fields) will show up for editing beneath each value's Name field.

The next step was to create an API for managing attribute fields. Attribute fields are entity reference fields on
product variations which point to a specific attribute value assigned to the variation. Users can select attributes on
the product variation type form, automatically creating entity referenced fields as needed:

... needs screenshot  Adding product attributes to a product variation type. ...

## Editing Attributes

... needs description ...

... needs screenshot ...

## Optional Attributes

... needs description ... Optional attributes can be made by making them “not required”

... needs screenshot ...

## Products that don't have Attributes

But what happens if a variation type has no attributes? For example, a product is only selling a single file. In that
case, the Inline Entity Form widget will render the variation form as a regular fieldset on the product. 

... needs screenshot ...
