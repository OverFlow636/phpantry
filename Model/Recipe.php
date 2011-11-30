<?php

class Recipe extends AppModel
{
	var $name = 'Recipe';

	var $hasMany = array(
		'ItemsRecipe'
	);

	var $belongsTo = array(
		'RecipeType'
	);

	var $actsAs = array(
		'Containable'
	);

	function afterFind($recipes, $primary)
	{
		if ($primary)
		{
			foreach($recipes as $idx => $recipe)
			{
				if (isset($recipe['ItemsRecipe']) && count($recipe['ItemsRecipe']))
				{
					$recipes[$idx]['Recipe']['price'] = 0;
					if (!isset($recipe['ItemsRecipe']['id']))
						foreach($recipe['ItemsRecipe'] as $ir)
						{
							$item = $this->ItemsRecipe->Item->findById($ir['item_id']);
							$item = $item['Item'];
							if ($item['splitPrice'] == 1)
								$recipes[$idx]['Recipe']['price'] += (($item['price']/$item['serving_count'])*$ir['quantity']);
							else
								$recipes[$idx]['Recipe']['price'] += ($item['price']*$ir['quantity']);
						}
				}
			}
		}
		return $recipes;
	}

}