<?php
App::uses('AppModel', 'Model');
/**
 * ShoppingList Model
 *
 * @property Status $Status
 * @property Store $Store
 * @property ShoppingListItem $ShoppingListItem
 */
class ShoppingList extends AppModel
{
	public $name = 'ShoppingList';
	public $displayField = 'name';

	var $actsAs = array(
		'Containable'
	);

	public $belongsTo = array(
		'Status',
		'Store'
	);

	public $hasMany = array(
		'ShoppingListItem'
	);

}
