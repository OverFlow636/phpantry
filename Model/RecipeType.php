<?php

class RecipeType extends AppModel
{
	var $name = 'RecipeType';
	var $displayField = 'type';

	var $hasMany = array(
		'Recipe'
	);
}