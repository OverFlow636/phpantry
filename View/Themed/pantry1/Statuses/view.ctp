<div class="statuses view">
<h2><?php  echo __('Status');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($status['Status']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($status['Status']['name']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Status'), array('action' => 'edit', $status['Status']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Status'), array('action' => 'delete', $status['Status']['id']), null, __('Are you sure you want to delete # %s?', $status['Status']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Statuses'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Status'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Shopping List Items'), array('controller' => 'shopping_list_items', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Shopping List Item'), array('controller' => 'shopping_list_items', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Shopping Lists'), array('controller' => 'shopping_lists', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Shopping List'), array('controller' => 'shopping_lists', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Shopping List Items');?></h3>
	<?php if (!empty($status['ShoppingListItem'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Shopping List Id'); ?></th>
		<th><?php echo __('Item Id'); ?></th>
		<th><?php echo __('Package Id'); ?></th>
		<th><?php echo __('Custom'); ?></th>
		<th><?php echo __('Status Id'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($status['ShoppingListItem'] as $shoppingListItem): ?>
		<tr>
			<td><?php echo $shoppingListItem['id'];?></td>
			<td><?php echo $shoppingListItem['shopping_list_id'];?></td>
			<td><?php echo $shoppingListItem['item_id'];?></td>
			<td><?php echo $shoppingListItem['package_id'];?></td>
			<td><?php echo $shoppingListItem['custom'];?></td>
			<td><?php echo $shoppingListItem['status_id'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'shopping_list_items', 'action' => 'view', $shoppingListItem['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'shopping_list_items', 'action' => 'edit', $shoppingListItem['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'shopping_list_items', 'action' => 'delete', $shoppingListItem['id']), null, __('Are you sure you want to delete # %s?', $shoppingListItem['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Shopping List Item'), array('controller' => 'shopping_list_items', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Shopping Lists');?></h3>
	<?php if (!empty($status['ShoppingList'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Status Id'); ?></th>
		<th><?php echo __('Store Id'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($status['ShoppingList'] as $shoppingList): ?>
		<tr>
			<td><?php echo $shoppingList['id'];?></td>
			<td><?php echo $shoppingList['name'];?></td>
			<td><?php echo $shoppingList['created'];?></td>
			<td><?php echo $shoppingList['status_id'];?></td>
			<td><?php echo $shoppingList['store_id'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'shopping_lists', 'action' => 'view', $shoppingList['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'shopping_lists', 'action' => 'edit', $shoppingList['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'shopping_lists', 'action' => 'delete', $shoppingList['id']), null, __('Are you sure you want to delete # %s?', $shoppingList['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Shopping List'), array('controller' => 'shopping_lists', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
