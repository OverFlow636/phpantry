<?php

class AllocationPrice extends AppModel
{
	var $name = 'AllocationPrice';

	var $belongsTo = array(
		'Allocation',
		'Store',
	);

}