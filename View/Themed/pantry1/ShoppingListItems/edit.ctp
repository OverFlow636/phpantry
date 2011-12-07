<div class="shoppingListItems form">
<?php echo $this->Form->create('ShoppingListItem');?>
	<fieldset>
		<legend><?php echo __('Edit Shopping List Item'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('shopping_list_id');
		echo $this->Form->input('item_id');
		echo $this->Form->input('package_id');
		echo $this->Form->input('custom');
		echo $this->Form->input('status_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('ShoppingListItem.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('ShoppingListItem.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Shopping List Items'), array('action' => 'index'));?></li>
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
