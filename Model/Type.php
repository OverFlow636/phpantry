<?php

class Type extends AppModel
{
	var $name = 'Type';

	var $hasMany = array(
		'Recipe'
	);
	

}