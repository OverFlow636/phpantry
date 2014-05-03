<?php

class Tag extends AppModel
{
	var $name = 'Tag';

	var $hasAndBelongsToMany = array(
		'Recipe'
	);
	

}