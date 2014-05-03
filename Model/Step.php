<?php

class Step extends AppModel
{
	var $name = 'Step';

	var $belongsTo = array(
		'Recipe'
	);

  var $hasAndBelongsToMany = array(
    'ItemsRecipe' => array(
      'conditions' => 'ItemsRecipe.recipe_id = recipe_id'
    )
  );
	

}