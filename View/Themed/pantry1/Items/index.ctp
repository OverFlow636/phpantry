<div class="top-bar">
	<h1>Items</h1>
</div>
<table class=listing>
	<tr>
		<th><?php echo $this->Paginator->sort('Name', 'name'); ?></th>
		<th><?php echo $this->Paginator->sort('Piece Price', 'price'); ?></th>
		<th><?php echo $this->Paginator->sort('Servings/Unit', 'package_quantity'); ?></th>
		<th>Stock</th>
		<th><?php echo $this->Paginator->sort('Recipes', 'recipe_count'); ?></th>
	</tr>

	<?php
	foreach($this->data as $item)
	{
		echo "<tr>";

		if ($item['Item']['useUnit'])
			$name = $item['Unit']['name'].' of '.$item['Item']['name'];
		else
			$name = $item['Item']['name'];

		echo "<td class=style1>".$this->Html->link($name, array('action'=>'view', $item['Item']['id']))."</td>";

		if ($item['Item']['splitPrice'] == 1)
			echo "<td>".$this->Number->currency($item['Item']['price']/$item['Item']['serving_count'])."</td>";
		else
			echo "<td>".$this->Number->currency($item['Item']['price'])."</td>";

		if ($item['Item']['oneUse'])
			echo "<td>".$this->Plural->ize($item['ServingUnit']['name'], 1)."</td>";
		else
			echo "<td>".$this->Plural->ize($item['ServingUnit']['name'],$item['Item']['serving_count'])."</td>";

		if (isset($item['Inventory']['quantity']))
			echo "<td>".$item['Inventory']['quantity']."</td>";
		else
			echo "<td>0</td>";

		echo "<td>".$item['Item']['recipe_count']."</td>";
		echo "</tr>";
	}
	?>
</table>
<table class="paging">
	<tr>
		<th><?php echo $this->Paginator->prev('« Previous', null, null, array('class' => 'disabled')); ?></th>

		<th>
			<?php
			echo $this->Paginator->counter(array(
				'format' => 'Page %page% of %pages%, showing %current% records out of %count% total'
			));
			?>
		</th>

		<th><?php echo $this->Paginator->next('Next »', null, null, array('class' => 'disabled')); ?> </th>

	</tr>
</table>