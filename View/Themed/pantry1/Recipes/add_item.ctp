<?php

echo $this->Form->create('Recipe', array(
	'inputDefaults'=>array(
		'before'=>'<tr><td>',
		'after'=>'</td></tr>',
		'between'=>'</td><td>',
		'div'=>false
)));

echo "<table class=desc>
<tr><th colspan=2 class=head>Add Item To Recipe</th></tr>";
echo $this->Form->input('item_id');
echo $this->Form->input('quantity');
echo $this->Form->input('unit_id');
echo $this->Form->input('extra');

echo "<tr><td colspan=2>".$this->Form->end(array('label'=>'Add', 'div'=>false, 'class'=>'submit'))."</td></tr>";

echo "</table>";
