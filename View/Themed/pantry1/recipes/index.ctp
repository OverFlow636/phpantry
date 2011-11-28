<div class="top-bar">
	<h1>Recipes</h1>
</div>
<table class=listing>
	<tr>
		<th><?php echo $this->Paginator->sort('Name', 'name'); ?></th>
		<th><?php echo $this->Paginator->sort('Type', 'price'); ?></th>
		<th><?php echo $this->Paginator->sort('Price', 'package_quantity'); ?></th>
	</tr>

	<?php
	foreach($this->data as $item)
	{
		echo "<tr>";
		echo "<td class=style1>".$this->Html->link($item['Recipe']['name'], array('action'=>'view', $item['Recipe']['id']))."</td>";
		echo "<td>".$item['RecipeType']['type']."</td>";
		echo "<td>".$item['Recipe']['price']."</td>";
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