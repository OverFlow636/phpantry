<?php

echo $this->Html->link('Add new Item', array('controller'=>'Items', 'action'=>'add', $this->data['Shopping']['upc']), array('class'=>'button'));

echo $this->Html->link('Add new Package', array('controller'=>'Packages', 'action'=>'add', $this->data['Shopping']['upc']), array('class'=>'button'));