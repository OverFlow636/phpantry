<div class="top-bar">
	<h1>Recipes</h1>
</div>
<table class=listing>
	<tr>
		<th>Name</th>
		<th>Type</th>
		<th>Price</th>
	</tr>

	<?php
	foreach($recipes as $recipe)
	{
		echo "<tr>";
		echo "<td class=style1>".$this->Html->link($recipe['Recipe']['name'], array('action'=>'view', $recipe['Recipe']['id']))."</td>";
		echo "<td>".$recipe['RecipeType']['type']."</td>";
		echo "<td>".$this->Number->currency($recipe['Recipe']['price'])."</td>";
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
