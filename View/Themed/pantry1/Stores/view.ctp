<div class="stores view">
<h2><?php  echo __('Store');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($store['Store']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($store['Store']['name']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Store'), array('action' => 'edit', $store['Store']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Store'), array('action' => 'delete', $store['Store']['id']), null, __('Are you sure you want to delete # %s?', $store['Store']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Stores'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Store'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Shopping Lists'), array('controller' => 'shopping_lists', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Shopping List'), array('controller' => 'shopping_lists', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Shopping Lists');?></h3>
	<?php if (!empty($store['ShoppingList'])):?>
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
		foreach ($store['ShoppingList'] as $shoppingList): ?>
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
