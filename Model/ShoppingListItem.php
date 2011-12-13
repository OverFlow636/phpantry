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

	public function addItemToList($listId, $itemId=null, $quantity=1)
	{
		echo 'add item to list '. $listId.' '.$itemId. ' '. $quantity.'<hr>';
		if ($listId)
		{
			$existing = $this->findByShoppingListIdAndItemId($listId, $itemId);
			if ($existing)
				$data = array(
					'id'		=> $existing['ShoppingListItem']['id'],
					'quantity'	=> $existing['ShoppingListItem']['quantity']+$quantity
				);
			else
			{
				$this->create();
				$data = array(
					'shopping_list_id'	=> $listId,
					'item_id'			=> $itemId,
					'quantity'			=> $quantity
				);
			}
			return $this->save($data);
		}
		return false;
	}

	public function addPackageToList($listId, $itemId=null, $quantity=1)
	{
		if ($listId)
		{
			$existing = $this->findByShoppingListIdAndPackageId($listId, $itemId);
			if ($existing)
				$data = array(
					'id'		=> $existing['ShoppingListItem']['id'],
					'quantity'	=> $existing['ShoppingListItem']['quantity']+$quantity
				);
			else
			{
				$this->create();
				$data = array(
					'shopping_list_id'	=> $listId,
					'package_id'		=> $itemId,
					'quantity'			=> $quantity
				);
			}
			return $this->save($data);
		}
		return false;
	}
}
