<?php

class Serving extends AppModel
{
	var $name = 'Serving';
	var $displayField = 'description';

	var $belongsTo = array(
		'Unit'
	);

	var $hasMany  = array(
		'ItemServing'
	);

}