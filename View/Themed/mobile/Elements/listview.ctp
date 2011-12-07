<?php
//Set Defaults
if (!isset($filter))
	$filter = true;

if (!isset($inset))
	$inset = true;

$options = array(
	'data-role'=>'listview'
);

if ($filter)
	$options['data-filter'] = true;

if ($inset)
	$options['data-inset'] = true;

$content = '';
foreach($items as $item)
	$content .= $this->Html->tag('li', $this->Html->link($item['text'], $item['linkargs']), $item['liargs']);

echo $this->Html->tag('ul', $content, $options);