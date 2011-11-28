<?php


class Inventory extends AppModel
{
	var $name = 'Inventory';

	var $belongsTo = array(
		'Item'
	);

	function addStock($itemId, $quantity, $servings=1)
	{
		$item = $this->findByItemId($itemId);
		if ($item)
		{
			$this->id = $item['Inventory']['id'];
			return $this->saveField('quantity', $item['Inventory']['quantity']+$quantity) && $this->saveField('servings', $item['Inventory']['servings']+($quantity*$servings));
		}
		else
			return $this->save(array(
				'item_id'=>$itemId,
				'quantity'=>$quantity,
				'servings'=>$servings*$quantity
			));
	}
}