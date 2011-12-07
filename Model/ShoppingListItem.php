<?php
App::uses('AppModel', 'Model');
/**
 * ShoppingListItem Model
 *
 * @property ShoppingList $ShoppingList
 * @property Item $Item
 * @property Package $Package
 * @property Status $Status
 */
class ShoppingListItem extends AppModel
{
	public $name = 'ShoppingListItem';
	public $displayField = 'custom';

	var $actsAs = array(
		'Containable'
	);

	public $belongsTo = array(
		'ShoppingList',
		'Item',
		'Package',
		'Status'
	);
}
