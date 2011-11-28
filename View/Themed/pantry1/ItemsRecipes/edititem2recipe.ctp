<?php

echo $this->Form->create('ItemsRecipe', array('action'=>'edititem2recipe'));

echo $this->Form->input('id');
echo $this->Form->input('item_id');
echo $this->Form->input('recipe_id');
echo $this->Form->input('quantity');
echo $this->Form->input('unit_id');

echo $this->Form->end('Change');