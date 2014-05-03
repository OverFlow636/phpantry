<?php

class Item extends AppModel
{
	var $name = 'Item';

	var $belongsTo = array(
		'Unit',
		'Brand',
		'Category',
		//'SubCategory',
	);

	var $hasMany = array(
		'Allocation',
		'ItemServing'
	);

  var $hasAndBelongsToMany = array(
    'Recipe'
  );

}