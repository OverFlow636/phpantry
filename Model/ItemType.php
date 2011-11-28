<?php

class ItemType extends AppModel
{
	var $name = 'ItemType';

	var $hasMany = array(
		'Item'
	);
}