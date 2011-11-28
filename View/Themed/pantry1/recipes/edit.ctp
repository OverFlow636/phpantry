<?php

echo $this->Form->create('Recipe', array('action'=>'edit'));

echo $this->Form->input('id');
echo $this->Form->input('name');
echo $this->Form->input('description');
echo $this->Form->input('directions');
echo $this->Form->input('recipe_type_id');

echo $this->Form->end('Save');