<?php

echo $this->Form->create('Item', array(
	'action'=>'import',
	'inputDefaults'=>array(
		'before'=>'<tr><td>',
		'after'=>'</td></tr>',
		'between'=>'</td><td>',
		'div'=>false
)));
echo "<table class=desc>
<tr><th colspan=2 class=head>Import Items</th></tr>";
echo $this->Form->input('csv', array('type'=>'textarea'));

echo "<tr><td colspan=2>".$this->Form->end(array('label'=>'Load', 'div'=>false, 'class'=>'submit'))."</td></tr>";

echo "</table>";
