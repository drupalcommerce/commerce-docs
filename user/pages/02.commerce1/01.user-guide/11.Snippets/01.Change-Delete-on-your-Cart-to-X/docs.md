---
title: Change "Delete" on your Cart to X
taxonomy:
    category: docs
---

<?php
/**
* Implements hook_form_alter().
* Designed to be added to your template.php in your custom theme.
*/
function themename_form_alter(&$form, $form_state, $form_id) {
  switch ($form_id)  {
  case 'views_form_commerce_cart_form_default':
	  foreach ($form['edit_delete'] as $row_id => $row) {
		if(isset($form['edit_delete'][$row_id]['#value'])){
			$form['edit_delete'][$row_id]['#value'] = 'X';
			}
		}
  break;
  }
}
?>