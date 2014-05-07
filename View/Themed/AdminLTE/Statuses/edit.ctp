<div class="statuses form">
<?php echo $this->Form->create('Status');?>
	<fieldset>
		<legend><?php echo __('Edit Status'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Status.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Status.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Statuses'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Shopping List Items'), array('controller' => 'shopping_list_items', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Shopping List Item'), array('controller' => 'shopping_list_items', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Shopping Lists'), array('controller' => 'shopping_lists', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Shopping List'), array('controller' => 'shopping_lists', 'action' => 'add')); ?> </li>
	</ul>
</div>
