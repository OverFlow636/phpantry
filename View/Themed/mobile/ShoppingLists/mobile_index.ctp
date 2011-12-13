<?php

foreach($shoppingLists as $list)
{
	$liargs = array();

	if ($list['Status']['id'] == 3)
		$liargs['data-theme'] = 'b';
	else
		$liargs['data-theme'] = 'c';

	$items[] = array(
		'text'=>$list['ShoppingList']['name'],
		'linkargs'=>array('action'=>'view', $list['ShoppingList']['id']),
		'liargs'=>$liargs
	);

}

$content = $this->element('listview', array(
	'items'=>$items
));

echo $this->element('page', array(
	'title'			=> 'Shopping Lists',
	'content'		=> $content,
	'rightButton'	=> $this->Html->link('New List', array(), array())
));