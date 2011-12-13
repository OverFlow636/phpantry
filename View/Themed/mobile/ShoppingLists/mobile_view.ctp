<?php
//die(pr($shoppingList));

$content = '<center><table>
	<tr><th colspan=2><strong>'. $shoppingList['ShoppingList']['name']. '</strong></th></tr>
	<tr><td><strong>Created On:</strong></td><td>'. date('m-d-Y', strtotime($shoppingList['ShoppingList']['created'])).'</td></tr>
	<tr><td><strong>Store:</strong></td><td>'. $shoppingList['Store']['name'].'</td></tr></table></center>';



$content .= '<fieldset data-role="controlgroup" data-theme="a">';
foreach($shoppingList['ShoppingListItem'] as $item)
{
	if (!empty($item['Item']['name']))
	{
		$elementName = 'item-'.$item['Item']['id'];
		$elementLabel = $item['Item']['name'];
		if ($item['Item']['useUnit'])
			$elementLabel = $item['Item']['Unit']['name'] . ' of ' . $elementLabel;
	}
	elseif(!empty($item['Package']['name']))
	{
		$elementName = 'package-'.$item['Package']['id'];
		$elementLabel = $item['Package']['name'];
	}
	$elementQuantity = $item['quantity'];

	$checked = false;
	if ($item['Status']['id'] == 3)
		$checked = true;
	$content .= "<input type=checkbox name=$elementName id={$item['id']} ".($checked?'checked':'')." />
		<label for={$item['id']}>$elementQuantity $elementLabel</label>";

}

$content .= '</fieldset>';

$content .= '
<script type="text/javascript">

$(document).ready(function () {
	$("input[type=\'checkbox\']").bind( "change", function(event, ui) {
		$.ajax({
			url: "/ShoppingListItems/updateStatus/" + event.target.id + "/" + event.target.checked,
			success: function() {
				if (event.target.checked)
				{
				';
if (!$all)
	$content .= '$(event.target).closest(\'.ui-checkbox\').hide(\'slow\', function() {
		$(event.target).closest(\'.ui-controlgroup\').controlgroup();
	});';

$content .= '}

			}
		});


	});
});

</script>';

echo $this->element('page', array(
	'title'=>$shoppingList['ShoppingList']['name'],
	'content'=>$content,
	'backButton'=>true,
	'rightButton'=>$this->element('link', array(
		'title'=>'Finished',
		'location'=>array('action'=>'updateStatus', $shoppingList['ShoppingList']['id'], true),
		'icon'=>'check',
		'theme'=>'b',
		'classes'=>'ui-btn-right'
	)),
	'footNav'=>'<div data-role=navbar><ul><li><a href=/mobile/ShoppingLists/view/'.$shoppingList['ShoppingList']['id'].' class="'.($all?'':'ui-btn-active ui-state-persist').'">Still Need</a></li><li><a class="'.($all?'ui-btn-active ui-state-persist':'').'" href=/mobile/ShoppingLists/view/'.$shoppingList['ShoppingList']['id'].'/1 >All Items</a></li></ul></div>',
	'cache'=>'never'
));