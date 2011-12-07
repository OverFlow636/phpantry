<div class="shoppingListItems view">
<h2><?php  echo __('Shopping List Item');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($shoppingListItem['ShoppingListItem']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Shopping List'); ?></dt>
		<dd>
			<?php echo $this->Html->link($shoppingListItem['ShoppingList']['name'], array('controller' => 'shopping_lists', 'action' => 'view', $shoppingListItem['ShoppingList']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Item'); ?></dt>
		<dd>
			<?php echo $this->Html->link($shoppingListItem['Item']['name'], array('controller' => 'items', 'action' => 'view', $shoppingListItem['Item']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Package'); ?></dt>
		<dd>
			<?php echo $this->Html->link($shoppingListItem['Package']['name'], array('controller' => 'packages', 'action' => 'view', $shoppingListItem['Package']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Custom'); ?></dt>
		<dd>
			<?php echo h($shoppingListItem['ShoppingListItem']['custom']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo $this->Html->link($shoppingListItem['Status']['name'], array('controller' => 'statuses', 'action' => 'view', $shoppingListItem['Status']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Shopping List Item'), array('action' => 'edit', $shoppingListItem['ShoppingListItem']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Shopping List Item'), array('action' => 'delete', $shoppingListItem['ShoppingListItem']['id']), null, __('Are you sure you want to delete # %s?', $shoppingListItem['ShoppingListItem']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Shopping List Items'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Shopping List Item'), array('action' => 'add')); ?> </li>
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
