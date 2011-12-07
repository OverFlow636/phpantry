<?php

foreach($shoppingLists as $list)
	$items[] = array(
		'text'=>$list['ShoppingList']['name'],
		'linkargs'=>array('action'=>'view', $list['ShoppingList']['id']),
		'liargs'=>array()
	);

$content = $this->element('listview', array(
	'items'=>$items
));

echo $this->element('page', array(
	'title'		=> 'Shopping Lists',
	'content'	=> $content
));