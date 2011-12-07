<?php

// Defaults
//if (!isset($filter))
//	$filter = true;




// HEADER
$headOptions = array(
	'data-role'=>'header'
);
if (!isset($headFixed))
	$headFixed = true;

if ($headFixed)
	$headOptions['data-position']='fixed';

if ($title)
	$headContent = $this->Html->tag('h1', $title);

$headContent .= $this->element('nav');

$header = $this->Html->tag('div', $headContent, $headOptions);




// CONTENT
$contentOptions = array(
	'data-role'=>'content'
);

$content = $this->Html->tag('div', $content, $contentOptions);




// PAGE
$options = array(
	'data-role'=>'page'
);

//if ($filter)
//	$options['data-filter'] = true;

if (!empty($id))
	$options['id'] = $id;

echo $this->Html->tag('div', $header.$content, $options);