<style>
	.strike
	{
		text-decoration: line-through;
	}
</style>
<script type="text/javascript">
	
$(document).ready(function () {
	$("input[type='checkbox']").bind( "change", function(event, ui) {
		console.log('changed ' + event.target.id + " " + event.target.checked);
		
		$.ajax({
			url: "/ShoppingListItems/updateStatus/" + event.target.id + "/" + event.target.checked,
			success: function() {
				if (event.target.checked)
					$(event.target.labels[0]).addClass('strike');
				else
					$(event.target.labels[0]).removeClass('strike');
			}
		});
		
	});	
});

</script><?php
//die(pr($shoppingList));
$content = '<fieldset data-role="controlgroup">';

foreach($shoppingList['ShoppingListItem'] as $item)
{
	if (!empty($item['Item']['name']))
	{
		$elementName = 'item-'.$item['Item']['id'];
		$elementLabel = $item['Item']['name'];
	}
	elseif(!empty($item['Package']['name']))
	{
		$elementName = 'package-'.$item['Package']['id'];
		$elementLabel = $item['Package']['name'];
	}
	
	$checked = false;
	if ($item['Status']['id'] == 3)
		$checked = true;
	$content .= "<input type=checkbox name=$elementName id={$item['id']} class=custom ".($checked?'checked':'')." />
		<label for={$item['id']} ".($checked?'class=strike':'').">$elementLabel</label>";
	
}

$content .= '</fieldset>';

echo $this->element('page', array(
	'title'=>$shoppingList['ShoppingList']['name'],
	'content'=>$content
));