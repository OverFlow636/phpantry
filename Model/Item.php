<?php

class Item extends AppModel
{
	var $name = 'Item';

	var $belongsTo = array(
		'Unit',
	);
	
	

}