<?php

if (!isset($options)) $options = array();
if (!isset($options['icon'])) $options['icon'] = false;
if (!isset($options['class'])) $options['class'] = 'primary';

$icon = '';
if ($options['icon']) {
  $icon = $this->Html->tag('i', '', array('class'=>'fa fa-' . $options['icon']));
}

echo $this->Html->tag('small', $icon . $options['text'], array('class'=>'label label-' . $options['class'], 'style'=>'margin-right:5px'));