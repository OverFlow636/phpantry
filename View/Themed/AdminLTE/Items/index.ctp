<div class="top-bar">
	<h1>Items</h1>
</div>
<table class=listing>
	<tr>
		<th>Brand</th>
		<th>Name</th>
	</tr>

	<?php
	foreach($items as $item)
	{
		echo "<tr>
			<td>{$item['Brand']['name']}</td>";
		echo "<td class=style1>".$this->Html->link($item['Item']['name'], array('action'=>'view', $item['Item']['id']))."</td>";
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