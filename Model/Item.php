<?php

class Item extends AppModel
{
	var $name = 'Item';

	var $belongsTo = array(
		'ItemType',
		'Unit',
		'ServingUnit'=>array(
			'className'=>'Unit',
			'foreignKey'=>'serving_unit_id'
		)
	);

	var $hasMany = array(
		'ItemsRecipe'
	);

	var $hasOne = array(
		'Inventory'
	);

	var $actsAs = array(
		'Containable'
	);

}