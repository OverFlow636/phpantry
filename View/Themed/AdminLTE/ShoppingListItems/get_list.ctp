<?php

if (!empty($items))
{
	echo $this->Html->div('select-bar', "<h2>Shopping List Items</h2>");
	echo "<table class=listing>
		<tr>
			<th style=\"width:100px\">Quantity</th>
			<th>Item</th>
			<th>Status</th>
		</tr>";
	foreach($items as $ir)
	{
		if (!empty($ir['Item']['id']))
			$item = $ir['Item'];

		if (!empty($ir['Package']['id']))
			$package = $ir['Package'];

		echo "<tr>";

		echo "<td class=style1>".$ir['ShoppingListItem']['quantity']."</td>";

		if (isset($item))
			if ($item['useUnit'])
				echo "<td>". $item['Unit']['name']. ' of '. $item['name']. '</td>';
			else
				echo "<td>". $item['name']. '</td>';
		elseif(isset($package))
			echo "<td>". $package['name']. '</td>';
		else
			echo '<td>'.$ir['ShoppingListItem']['custom'].'</td>';

		echo '<td>'. $ir['Status']['name'].'</td>';

		echo "</tr>";
	}
	echo "</table>";
}
else
	echo "This list has no items.";