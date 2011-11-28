<?php

class Package extends AppModel
{
	var $name = 'Package';

	var $belongsTo = array(
		'Item'
	);
}