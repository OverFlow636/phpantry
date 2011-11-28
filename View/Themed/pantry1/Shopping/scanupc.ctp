<?php

echo $this->Form->create('Shopping', array(
	'action'=>'scanGroceries',
	'inputDefaults'=>array(
		'before'=>'<tr><td>',
		'after'=>'</td></tr>',
		'between'=>'</td><td>',
		'div'=>false
)));

echo "<table class=desc>
<tr><th colspan=2 class=head>Enter or scan a UPC</th></tr>";
echo $this->Form->input('upc');
echo "<tr><td colspan=2>".$this->Form->end(array('label'=>'Enter', 'div'=>false, 'class'=>'submit'))."</td></tr>";

echo "</table>";

?>
<script>

var submitted = false;

$('document').ready(function(){
	$('#ShoppingUpc').focus();

	$('#ShoppingUpc').bind('keyup', function(){
		if ($('#ShoppingUpc').val().length == 12 && !submitted)
		{
			$('#ShoppingScanGroceriesForm').submit();
			submitted = true;
		}
	});
});

</script>