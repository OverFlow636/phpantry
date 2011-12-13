<?php

// Defaults
if (!isset($backButton))
	$backButton = false;

$header = $footer = '';


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

if (isset($rightButton))
	$headContent .= $rightButton;

$headContent .= $this->element('nav');

$header = $this->Html->tag('div', $headContent, $headOptions);




// CONTENT
$contentOptions = array(
	'data-role'=>'content'
);

$content = $this->Html->tag('div', $content, $contentOptions);






// FOOTER
if (!empty($footNav))
{
	$footOptions = array(
		'data-role'=>'footer'
	);
	if (!isset($footFixed))
		$footFixed = true;

	if ($footFixed)
		$footOptions['data-position']='fixed';

	$footContent = $footNav;

	$footer = $this->Html->tag('div', $footContent, $footOptions);
}






// PAGE
$options = array(
	'data-role'=>'page'
);

if ($backButton)
	$options['data-add-back-btn'] = 'true';

if (!empty($cache))
	$options['data-cache'] = $cache;

if (!empty($id))
	$options['id'] = $id;

echo $this->Html->tag('div', $header.$content.$footer, $options);