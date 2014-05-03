<?php

class ItemServingNutrient extends AppModel
{
	var $name = 'ItemServingNutrient';

	var $belongsTo = array(
		'ItemServing',
		'Nutrient'
	);



}