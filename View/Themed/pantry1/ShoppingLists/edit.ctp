<div class="shoppingLists form">
<?php echo $this->Form->create('ShoppingList');?>
	<fieldset>
		<legend><?php echo __('Edit Shopping List'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
		echo $this->Form->input('status_id');
		echo $this->Form->input('store_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('ShoppingList.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('ShoppingList.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Shopping Lists'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Statuses'), array('controller' => 'statuses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Status'), array('controller' => 'statuses', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Stores'), array('controller' => 'stores', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Store'), array('controller' => 'stores', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Shopping List Items'), array('controller' => 'shopping_list_items', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Shopping List Item'), array('controller' => 'shopping_list_items', 'action' => 'add')); ?> </li>
	</ul>
</div>
