<div class="top-bar">
	<h1><?php echo $this->data['Recipe']['name']; ?></h1>
	<div class="breadcrumbs">
		<?php
		echo $this->Html->link($this->Html->image('edit-icon.gif'), array('action'=>'edit', $this->data['Recipe']['id']), array('escape'=>false));
		echo $this->Html->link($this->Html->image('hr.gif'), array('action'=>'delete', $this->data['Recipe']['id']), array('escape'=>false), 'You Sure?');
		echo $this->Html->link($this->Html->image('add-icon.gif'), array('controller'=>'ItemsRecipes','action'=>'item2recipe',0,$this->data['Recipe']['id']), array('escape'=>false));
		?>
	</div>
</div>
<?php

echo "<table class=desc>
<tr><th colspan=2 class=head>Recipe Information</th></tr>";
echo "<tr><td>Price</td><td>".$this->Number->currency($this->data['Recipe']['price'])."</td></tr>";
echo "<tr><td>Type</td><td>{$this->data['RecipeType']['type']}</td></tr>";
echo "<tr><td>Description</td><td>{$this->data['Recipe']['description']}</td></tr>";
echo "<tr><td>Directions</td><td>".$this->data['Recipe']['directions']."</td></tr>";
echo "</table><BR/><BR/>";


if (!empty($this->data['ItemsRecipe']))
{
	echo $this->Html->div('select-bar', "<h2>Required Items for Recpie</h2>");
	echo "<table class=listing>
		<tr>
			<th style=\"width:100px\">Quantity</th>
			<th>Unit</th>
			<th>Of</th>
			<th>Qutantity Available</th>
			<th>Price</th>
		</tr>";
	foreach($this->data['ItemsRecipe'] as $ir)
	{
		$item = $ir['Item'];
		echo "<tr>";

		echo "<td class=style1>".$this->Html->link($ir['quantity'], array(
			'controller'=>'ItemsRecipes',
			'action'=>'edititem2recipe',
			$ir['id']
		))."</td>";

		echo "<td>".$this->Plural->ize($ir['Unit']['name'], $ir['quantity'], false).'</td>';

		echo "<td class=style1>".$this->Html->link($item['name'], array('controller'=>'Items', 'action'=>'view', $item['id']))."</td>";

		if (isset($item['Inventory']['servings']))
			echo "<td>".$item['Inventory']['servings']."</td>";
		else
			echo "<td>0</td>";

		if ($item['splitPrice'])
			echo "<td>".$this->Number->currency($ir['quantity']*($item['price']/$item['serving_count']))."</td>";
		else
			echo "<td>".$this->Number->currency($ir['quantity']*$item['price'])."</td>";
		echo "</tr>";
	}
	echo "</table>";
}
else
	echo "This recipe has no items.";

//pr($this->data);