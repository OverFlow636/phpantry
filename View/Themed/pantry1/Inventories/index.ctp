<div class="top-bar">
	<h1>Inventory</h1>
</div>

<table class=listing>
	<tr>
		<th><?php echo $this->Paginator->sort('item_id');?></th>
		<th><?php echo $this->Paginator->sort('quantity');?></th>
		<th><?php echo $this->Paginator->sort('servings');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($inventories as $inventory): ?>
	<tr>
		<td>
			<?php echo $this->Html->link($inventory['Item']['name'], array('action' => 'view', $inventory['Inventory']['id'])); ?>
		</td>
		<td><?php echo h($inventory['Inventory']['quantity']); ?>&nbsp;</td>
		<td><?php echo h($inventory['Inventory']['servings']); ?>&nbsp;</td>
	</tr>
<?php endforeach; ?>
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
