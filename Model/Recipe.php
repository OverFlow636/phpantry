<?php

class Recipe extends AppModel
{
	var $name = 'Recipe';

	var $belongsTo = array(
		'Type'
	);

	var $hasAndBelongsToMany = array(
    'Tag',
    'Item'
  );

  var $hasMany = array(
    'Step'
  );

}