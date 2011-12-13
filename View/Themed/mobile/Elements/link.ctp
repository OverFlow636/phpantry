<?php


$options = array(
);

if (!empty($icon))
	$options['data-icon'] = $icon;

if (!empty($theme))
	$options['data-theme'] = $theme;

if (!empty($classes))
	$options['class'] = $classes;

echo $this->Html->link($title, $location, $options);