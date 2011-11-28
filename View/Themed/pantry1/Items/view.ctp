<div class="top-bar">
	<h1><?php echo $this->data['Item']['name']; ?></h1>
	<div class="breadcrumbs">
		<?php
		echo $this->Html->link($this->Html->image('edit-icon.gif'), array('action'=>'edit', $this->data['Item']['id']), array('escape'=>false));
		echo $this->Html->link($this->Html->image('hr.gif'), array('action'=>'delete', $this->data['Item']['id']), array('escape'=>false), 'You Sure?');
		echo $this->Html->link($this->Html->image('add-icon.gif'), array('controller'=>'ItemsRecipes','action'=>'item2recipe', $this->data['Item']['id']), array('escape'=>false));
		?>
	</div>
</div>
<?php

echo "<table class=desc>
<tr><th colspan=2 class=head>Item Information</th></tr>";

if ($this->data['Item']['splitPrice'])
	echo "<tr><td>Piece Price</td><td>".$this->Number->currency($this->data['Item']['price']/$this->data['Item']['serving_count'])."</td></tr>";

echo "<tr><td>Price</td><td>".$this->Number->currency($this->data['Item']['price'])."</td></tr>";

echo "<tr><td>UPC</td><td>{$this->data['Item']['upc']}</td></tr>";
echo "<tr><td>Size</td><td>".$this->data['Item']['size']."</td></tr>";
echo "</table><BR/><BR/>";

if (!empty($this->data['ItemsRecipe']))
{
	echo $this->Html->div('select-bar', "<h2>Required for following Recpies</h2>");
	echo "<table class=listing>
		<tr>
			<th>Recipe Name</th>
			<th>Recipe Type</th>
			<th>".$this->data['Item']['name']." Required</th>
			<th>".$this->data['Item']['name']." Price</th>
		</tr>";

	foreach($this->data['ItemsRecipe'] as $ir)
	{
		$recipe = $ir['Recipe'];
		echo "<tr>";

		echo "<td class=style1>".$this->Html->link($recipe['name'], array('controller'=>'Recipes', 'action'=>'view', $recipe['id']))."</td>";

		echo "<td>".$recipeTypes[$recipe['recipe_type_id']]."</td>";
		echo "<td class=style1>".$this->Html->link($this->Plural->ize($ir['Unit']['name'], $ir['quantity']), array(
			'controller'=>'ItemsRecipes',
			'action'=>'edititem2recipe',
			$ir['id']
		))."</td>";

		if ($this->data['Item']['splitPrice'])
			echo "<td>".$this->Number->currency($ir['quantity']*($this->data['Item']['price']/$this->data['Item']['serving_count']))."</td>";
		else
			echo "<td>".$this->Number->currency($ir['quantity']*$this->data['Item']['price'])."</td>";
		echo "</tr>";
	}

	echo "</table>";
}
else
	echo "This item has not been added to any recipes.";

//pr($this->data);