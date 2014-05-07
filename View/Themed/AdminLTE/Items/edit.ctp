<?php

echo $this->Form->create('Item', array(
	'action'=>'edit',
	'inputDefaults'=>array(
		'before'=>'<tr><td>',
		'after'=>'</td></tr>',
		'between'=>'</td><td>',
		'div'=>false
)));

echo "<table class=desc>
<tr><th colspan=2 class=head>Edit Item</th></tr>";
echo $this->Form->input('id');
echo $this->Form->input('name');
echo $this->Form->input('brand_id');
echo $this->Form->input('serving_size');
echo $this->Form->input('unit_id');
echo $this->Form->input('taxed');
echo $this->Form->input('inventoried');
echo $this->Form->input('category_id');

echo "<tr><td colspan=2>".$this->Form->end(array('label'=>'Save', 'div'=>false, 'class'=>'submit'))."</td></tr>";

echo "</table>";