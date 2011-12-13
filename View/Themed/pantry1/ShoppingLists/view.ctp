<div class="top-bar">
	<h1><?php echo 'Shopping List'.$shoppingList['ShoppingList']['name']; ?></h1>
	<div class="breadcrumbs">
		<?php
		echo $this->Html->link($this->Html->image('edit-icon.gif'), array('action'=>'edit', $shoppingList['ShoppingList']['id']), array('escape'=>false));
		echo $this->Html->link($this->Html->image('hr.gif'), array('action'=>'delete', $shoppingList['ShoppingList']['id']), array('escape'=>false), 'You Sure?');
		echo $this->Html->link($this->Html->image('add-icon.gif'), array('controller'=>'ShoppingListItems','action'=>'add',$shoppingList['ShoppingList']['id']), array('escape'=>false));
		?>
	</div>
</div>
<?php

echo "<table class=desc>
<tr><th colspan=2 class=head>ShoppingList Information</th></tr>";
echo "<tr><td>Store</td><td>".$shoppingList['Store']['name']."</td></tr>";
echo "<tr><td>Recipe Start Date</td><td>{$shoppingList['ShoppingList']['created']}</td></tr>";
echo "<tr><td>Status</td><td>{$shoppingList['Status']['name']}</td></tr>";
echo "</table><BR/><BR/>";

echo "<form action=ShoppingLists/addSomething/ method=post>
	Item: <input id=searchtxt type=text name=search><br /><a href='http://zxing.appspot.com/scan?ret=http://pantry.overflow636.com/ShoppingListItems/add/{$shoppingList['ShoppingList']['id']}/barcode/{CODE}'>test</a><br>
	Quantity: <input type=text id=quantitytxt length=2><br />
	<input type=button onclick=sendRequest() value='Add'>
	</form>";

echo '<div id=sli>';
if (!empty($shoppingList['ShoppingListItem']))
{
	echo $this->Html->div('select-bar', "<h2>Shopping List Items</h2>");
	echo "<table class=listing>
		<tr>
			<th style=\"width:100px\">Quantity</th>
			<th>Item</th>
			<th>Status</th>
		</tr>";
	foreach($shoppingList['ShoppingListItem'] as $ir)
	{
		if (!empty($ir['Item']['id']))
			$item = $ir['Item'];

		if (!empty($ir['Package']['id']))
			$package = $ir['Package'];

		echo "<tr>";

		echo "<td class=style1>".$ir['quantity']."</td>";

		if (isset($ir['Item']['id']))
		{
			if ($item['useUnit'])
				echo "<td>". $item['Unit']['name']. ' of '. $item['name']. '</td>';
			else
				echo "<td>". $item['name']. '</td>';
		}
		elseif(isset($ir['Package']['id']))
			echo "<td>". $package['name']. '</td>';
		else
			echo '<td>'.$ir['custom'].'</td>';

		echo '<td>'. $ir['Status']['name'].'</td>';

		echo "</tr>";
	}
	echo "</table>";
}
else
	echo "This list has no items.";
echo '</div>';


?>
<script type="text/javascript" language="javascript">

	var item;

jQuery(document).ready(function(){

	jQuery("#searchtxt").autocomplete({
		source: "/ShoppingListItems/search",
		minLength: 2,
		select: function (event, ui) {
			item = ui.item
		}
	});

});


function sendRequest()
{
	jQuery.ajax({
		type: 'GET',
		url: "/ShoppingListItems/add/<?php echo $shoppingList['ShoppingList']['id'] ?>/" + item.type + "/" + item.id + "/" + jQuery('#quantitytxt').attr('value'),
		success: function (html) {
			jQuery('#sli').html(html);
		}
	});
}
</script>