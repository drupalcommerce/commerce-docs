---
title: Miscellaneous Data
taxonomy:
    category: docs
---

Saving and retreiving misc data on and order
--------------------------------------------

There may be some scenarios that it would be beneficial to store some data on an order. You could make a field on the order, but perhaps that is overkill or not appropriate for your use case. 

Just like in commerce 1.x, in commerce 2.x you can store miscellaneous data as a key/value pair.

```php
    $order->setData('unique_key', 'value');
    // Depending where you are setting data, you may need to call:
    // $order->save();
    
    ...
    
    echo $order->getData('unique_key'); // 'value'
```
