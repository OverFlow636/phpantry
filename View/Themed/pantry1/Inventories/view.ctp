<div class="top-bar">
	<h1><?php echo 'Inventory record of ' .$inventory['Item']['name']; ?></h1>
	<div class="breadcrumbs">
		<?php
		echo $this->Html->link($this->Html->image('edit-icon.gif'), array('action'=>'edit', $inventory['Inventory']['id']), array('escape'=>false));
		echo $this->Html->link($this->Html->image('hr.gif'), array('action'=>'delete', $inventory['Inventory']['id']), array('escape'=>false), 'You Sure?');
		echo $this->Html->link($this->Html->image('add-icon.gif'), array('controller'=>'ItemsRecipes','action'=>'item2recipe', $inventory['Inventory']['id']), array('escape'=>false));
		?>
	</div>
</div>
<?php

echo "<table class=desc>
<tr><th colspan=2 class=head>Inventory Information</th></tr>";

echo "<tr><td>Item</td><td>".$this->Html->link($inventory['Item']['name'], array('controller' => 'items', 'action' => 'view', $inventory['Item']['id']))."</td></tr>";
echo "<tr><td>Quantity</td><td>{$inventory['Inventory']['quantity']}</td></tr>";
echo "<tr><td>Servings</td><td>{$inventory['Inventory']['servings']}</td></tr>";

echo "</table>";
