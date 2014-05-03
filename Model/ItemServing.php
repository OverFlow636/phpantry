<?php

class ItemServing extends AppModel
{
	var $name = 'ItemServing';

	var $belongsTo = array(
		'Item',
		'Serving',
	);

	var $hasMany = array(
		'ItemServingNutrient'
	);
}