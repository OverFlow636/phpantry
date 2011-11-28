<?php

class Unit extends AppModel
{
	var $name = 'Unit';

	var $hasMany = array(
		'Item'
	);
}