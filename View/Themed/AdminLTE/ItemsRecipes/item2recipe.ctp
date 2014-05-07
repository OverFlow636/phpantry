<?php

echo $this->Form->create('ItemsRecipe', array('action'=>'item2recipe'));

echo $this->Form->input('item_id', array('selected'=>$item));
echo $this->Form->input('recipe_id', array('selected'=>$recipe));
echo $this->Form->input('quantity');
echo $this->Form->input('unit_id');

echo $this->Form->end('Add');