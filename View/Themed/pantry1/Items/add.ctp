<?php

echo $this->Form->create('Item', array(
	'action'=>'add',
	'inputDefaults'=>array(
		'before'=>'<tr><td>',
		'after'=>'</td></tr>',
		'between'=>'</td><td>',
		'div'=>false
)));

echo "<table class=desc>
<tr><th colspan=2 class=head>New Item</th></tr>";
echo $this->Form->input('item_type_id');
echo $this->Form->input('unit_id');
echo $this->Form->input('name', array('size'=>50));
echo $this->Form->input('price');

echo $this->Form->input('splitPrice');
echo $this->Form->input('oneUse');
echo $this->Form->input('useUnit');


echo $this->Form->input('upc');

echo $this->Form->input('serving_count');
echo $this->Form->input('serving_unit_id');

echo $this->Form->input('size');

echo "<tr><td colspan=2>".$this->Form->end(array('label'=>'Add', 'div'=>false, 'class'=>'submit'))."</td></tr>";

echo "</table>";
