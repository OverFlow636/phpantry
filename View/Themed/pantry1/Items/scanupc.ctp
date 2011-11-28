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
<tr><th colspan=2 class=head>Enter or scan a UPC</th></tr>";
echo $this->Form->input('upc');
echo "<tr><td colspan=2>".$this->Form->end(array('label'=>'Enter', 'div'=>false, 'class'=>'submit'))."</td></tr>";

echo "</table>";

?>
<script>

var scanned = false;

$('document').ready(function(){
	$('#ItemUpc').focus();

	$('#ItemUpc').bind('keyup', function(){
		if ($('#ItemUpc').val().length == 12 && !scanned)
		{
			$('#ItemAddForm').submit();
			scanned = true;
		}
	});
});

</script>