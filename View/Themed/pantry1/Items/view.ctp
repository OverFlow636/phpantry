<div class="top-bar">
	<h1><?php echo $item['Item']['name']; ?></h1>
	<div class="breadcrumbs">
		<?php
		echo $this->Html->link($this->Html->image('edit-icon.gif'), array('action'=>'edit', $item['Item']['id']), array('escape'=>false));
		echo $this->Html->link($this->Html->image('hr.gif'), array('action'=>'delete', $item['Item']['id']), array('escape'=>false), 'You Sure?');
		echo $this->Html->link($this->Html->image('add-icon.gif'), array('controller'=>'ItemsRecipes','action'=>'item2recipe', $item['Item']['id']), array('escape'=>false));
		?>
	</div>
</div>
<?php

echo "<table class=desc>
<tr><th colspan=2 class=head>Item Information</th></tr>";

if ($item['Item']['splitPrice'])
	echo "<tr><td>Piece Price</td><td>".$this->Number->currency($item['Item']['price']/$item['Item']['serving_count'])."</td></tr>";

echo "<tr><td>Price</td><td>".$this->Number->currency($item['Item']['price'])."</td></tr>";

echo "<tr><td>UPC</td><td>{$item['Item']['upc']}</td></tr>";
echo "<tr><td>Size</td><td>".$item['Item']['size']."</td></tr>";
echo "</table><BR/><BR/>";

if (!empty($item['ItemsRecipe']))
{
	echo $this->Html->div('select-bar', "<h2>Required for following Recpies</h2>");
	echo "<table class=listing>
		<tr>
			<th>Recipe Name</th>
			<th>Recipe Type</th>
			<th>".$item['Item']['name']." Required</th>
			<th>".$item['Item']['name']." Price</th>
		</tr>";

	foreach($item['ItemsRecipe'] as $ir)
	{
		$recipe = $ir['Recipe'];
		echo "<tr>";

		echo "<td class=style1>".$this->Html->link($recipe['name'], array('controller'=>'Recipes', 'action'=>'view', $recipe['id']))."</td>";

		echo "<td>".$recipeTypes[$recipe['recipe_type_id']]."</td>";

		echo "<td class=style1>".$this->Html->link($item['Item']['useUnit']?$this->Plural->ize($ir['Unit']['name'], $ir['quantity']):$ir['quantity'], array(
			'controller'=>'ItemsRecipes',
			'action'=>'edititem2recipe',
			$ir['id']
		))."</td>";

		if ($item['Item']['splitPrice'])
			echo "<td>".$this->Number->currency($ir['quantity']*($item['Item']['price']/$item['Item']['serving_count']))."</td>";
		else
			echo "<td>".$this->Number->currency($ir['quantity']*$item['Item']['price'])."</td>";
		echo "</tr>";
	}

	echo "</table>";
}
else
	echo "This item has not been added to any recipes.";

//pr($item);