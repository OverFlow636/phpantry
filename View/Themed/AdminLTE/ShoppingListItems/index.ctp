<div class="shoppingListItems index">
	<h2><?php echo __('Shopping List Items');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('shopping_list_id');?></th>
			<th><?php echo $this->Paginator->sort('item_id');?></th>
			<th><?php echo $this->Paginator->sort('package_id');?></th>
			<th><?php echo $this->Paginator->sort('custom');?></th>
			<th><?php echo $this->Paginator->sort('status_id');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($shoppingListItems as $shoppingListItem): ?>
	<tr>
		<td><?php echo h($shoppingListItem['ShoppingListItem']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($shoppingListItem['ShoppingList']['name'], array('controller' => 'shopping_lists', 'action' => 'view', $shoppingListItem['ShoppingList']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($shoppingListItem['Item']['name'], array('controller' => 'items', 'action' => 'view', $shoppingListItem['Item']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($shoppingListItem['Package']['name'], array('controller' => 'packages', 'action' => 'view', $shoppingListItem['Package']['id'])); ?>
		</td>
		<td><?php echo h($shoppingListItem['ShoppingListItem']['custom']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($shoppingListItem['Status']['name'], array('controller' => 'statuses', 'action' => 'view', $shoppingListItem['Status']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $shoppingListItem['ShoppingListItem']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $shoppingListItem['ShoppingListItem']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $shoppingListItem['ShoppingListItem']['id']), null, __('Are you sure you want to delete # %s?', $shoppingListItem['ShoppingListItem']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>

	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Shopping List Item'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Shopping Lists'), array('controller' => 'shopping_lists', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Shopping List'), array('controller' => 'shopping_lists', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Items'), array('controller' => 'items', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Item'), array('controller' => 'items', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Packages'), array('controller' => 'packages', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Package'), array('controller' => 'packages', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Statuses'), array('controller' => 'statuses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Status'), array('controller' => 'statuses', 'action' => 'add')); ?> </li>
	</ul>
</div>
