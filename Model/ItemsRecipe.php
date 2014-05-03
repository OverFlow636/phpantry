<?php

class ItemsRecipe extends AppModel
{
	var $name = 'ItemsRecipe';

  var $belongsTo = array(
    'Item',
    'Recipe'
  );

}