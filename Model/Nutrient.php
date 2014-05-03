<?php

class Nutrient extends AppModel
{
	var $name = 'Nutrient';

	var $belongsTo = array(
		'Unit'
	);


}