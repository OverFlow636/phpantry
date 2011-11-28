<?php

echo $this->Form->create('Recipe', array(
	'action'=>'edit',
	'inputDefaults'=>array(
		'before'=>'<tr><td>',
		'after'=>'</td></tr>',
		'between'=>'</td><td>',
		'div'=>false
)));

echo "<table class=desc>
<tr><th colspan=2 class=head>Edit Recipe</th></tr>";
echo $this->Form->input('id');
echo $this->Form->input('name', array('size'=>50, 'type'=>'text'));
echo $this->Form->input('description');
echo $this->Form->input('directions');
echo $this->Form->input('recipe_type_id');

echo "<tr><td colspan=2>".$this->Form->end(array('label'=>'Save', 'div'=>false, 'class'=>'submit'))."</td></tr>";

echo "</table>";