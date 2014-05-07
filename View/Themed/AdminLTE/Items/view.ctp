<div class="top-bar">
	<h1><?php echo $item['Item']['name']; ?></h1>
	<div class="breadcrumbs">
		<?php
		echo $this->Html->link($this->Html->image('edit-icon.gif'), array('action'=>'edit', $item['Item']['id']), array('escape'=>false));
		echo $this->Html->link($this->Html->image('hr.gif'), array('action'=>'delete', $item['Item']['id']), array('escape'=>false), 'You Sure?');
		echo $this->Html->link($this->Html->image('add-icon.gif'), array('controller'=>'ItemsRecipes','action'=>'item2recipe', $item['Item']['id']), array('escape'=>false));
		?>
	</div>
</div>
<?php

echo "<table class=desc>
<tr><th colspan=2 class=head>Item Information</th></tr>";
echo "<tr>
	<td>Brand</td>
	<td>{$item['Brand']['name']}</td>
</tr>";
echo "<tr>
	<td>Serving Size</td>
	<td>{$item['Item']['serving_size']} {$item['Unit']['abbr']}</td>
</tr>";
echo "<tr>
	<td>Taxed</td>
	<td>{$item['Item']['taxed']}</td>
</tr>";
echo "<tr>
	<td>Inventoried</td>
	<td>{$item['Item']['inventoried']}</td>
</tr>";
echo "<tr>
	<td>Category</td>
	<td>{$item['Category']['name']}</td>
</tr>";
echo "</table><BR/><BR/>";

if (!empty($item['Allocation']))
{
	echo "<h2>Allocations</h2><table class=desc>
		<tr>
			<th>Size</th>
			<th>Package</th>
			<th>Upc</th>
			<th>Serving Count</th>
			<th>Price</th>
			<th>$ per Serving</th>
		</tr>";

	foreach($item['Allocation'] as $alloc)
	{
		echo "<tr>
			<td>{$alloc['quantity']} {$alloc['Unit']['abbr']}</td>
			<td>{$alloc['Package']['name']}</td>
			<td>{$alloc['upc']}</td>
			<td>{$alloc['servings']}</td>
			<td>".(isset($alloc['Prices']['avg'])?$this->Number->currency($alloc['Prices']['avg']):'Unk')."</td>
			<td>".(isset($alloc['perserving'])?$this->Number->currency($alloc['perserving']):'Unk')."</td>
		</tr>";
	}



	echo "</table><BR/><BR/>";
}
else
{
	echo "No allocations for this item.<br>";
}



if (!empty($item['ItemsRecipe']))
{
	echo $this->Html->div('select-bar', "<h2>Required for following Recpies</h2>");
	echo "<table class=listing>
		<tr>
			<th>Recipe Name</th>
			<th>Recipe Type</th>
			<th>".$item['Item']['name']." Required</th>
			<th>".$item['Item']['name']." Price</th>
		</tr>";

	foreach($item['ItemsRecipe'] as $ir)
	{
		$recipe = $ir['Recipe'];
		echo "<tr>";

		echo "<td class=style1>".$this->Html->link($recipe['name'], array('controller'=>'Recipes', 'action'=>'view', $recipe['id']))."</td>";

		echo "<td>".$recipeTypes[$recipe['recipe_type_id']]."</td>";

		echo "<td class=style1>".$this->Html->link($item['Item']['useUnit']?$this->Plural->ize($ir['Unit']['name'], $ir['quantity']):$ir['quantity'], array(
			'controller'=>'ItemsRecipes',
			'action'=>'edititem2recipe',
			$ir['id']
		))."</td>";

		if ($item['Item']['splitPrice'])
			echo "<td>".$this->Number->currency($ir['quantity']*($item['Item']['price']/$item['Item']['serving_count']))."</td>";
		else
			echo "<td>".$this->Number->currency($ir['quantity']*$item['Item']['price'])."</td>";
		echo "</tr>";
	}

	echo "</table>";
}
else
	echo "This item has not been added to any recipes.";




echo $this->Html->div('select-bar', "<h2>Serving/Nutrition Information</h2>" . $this->Html->link('Add', array('controller'=>'Nutrients', 'action'=>'findItem', $item['Brand']['name'] . ' ' . $item['Item']['name'])));
if (!empty($item['ItemServing']))
{
    echo "<table class=listing>
		<tr>
			<th>Description</th>
			<th>Amount</th>
			<th>Primary</th>
			<th>Nutrition</th>
		</tr>";

    foreach($item['ItemServing'] as $is)
    {
        echo '<tr>';
        echo '<td>'.$is['Serving']['description'].'</td>';
        echo '<td>'.decToFraction($is['Serving']['value']).' '.$is['Serving']['Unit']['abbr'].'</td>';
        echo '<td>'.($is['primary']?'X':'').'</td>';
        echo '<td>'.$this->Html->link('View', array('controller'=>'ItemServings', 'action'=>'nutInfo', $is['id'])).'</td>';
        echo '</tr>';
    }

    echo "</table>";
}
else
    echo "<hr>No defined servings.";





function decToFraction($float) {
    // 1/2, 1/4, 1/8, 1/16, 1/3 ,2/3, 3/4, 3/8, 5/8, 7/8, 3/16, 5/16, 7/16,
    // 9/16, 11/16, 13/16, 15/16
    $whole = floor ( $float );
    $decimal = $float - $whole;
    $leastCommonDenom = 48; // 16 * 3;
    $denominators = array (2, 3, 4, 8, 16, 24, 48 );
    $roundedDecimal = round ( $decimal * $leastCommonDenom ) / $leastCommonDenom;
    if ($roundedDecimal == 0)
        return $whole;
    if ($roundedDecimal == 1)
        return $whole + 1;
    foreach ( $denominators as $d ) {
        if ($roundedDecimal * $d == floor ( $roundedDecimal * $d )) {
            $denom = $d;
            break;
        }
    }
    return ($whole == 0 ? '' : $whole) . " " . ($roundedDecimal * $denom) . "/" . $denom;
}

//pr($item);