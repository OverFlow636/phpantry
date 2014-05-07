<div class="top-bar">
	<h1><?php echo __('Shopping Lists');?></h1>
</div>

	<table class=listing cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('name');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
			<th><?php echo $this->Paginator->sort('status_id');?></th>
			<th><?php echo $this->Paginator->sort('store_id');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($shoppingLists as $shoppingList): ?>
	<tr>
		<td><?php echo $this->Html->link($shoppingList['ShoppingList']['name'], array('action' => 'view', $shoppingList['ShoppingList']['id'])); ?>&nbsp;</td>
		<td><?php echo h($shoppingList['ShoppingList']['created']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($shoppingList['Status']['name'], array('controller' => 'statuses', 'action' => 'view', $shoppingList['Status']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($shoppingList['Store']['name'], array('controller' => 'stores', 'action' => 'view', $shoppingList['Store']['id'])); ?>
		</td>
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
