<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2011, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2011, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       Cake.View.Scaffolds
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
?>
<div class="top-bar <?php echo $pluralVar;?> index">
<h1>Scaffold Index for - <?php echo $pluralHumanName;?></h1>
</div>

<table class="listing" cellpadding="0" cellspacing="0">
<tr>
<?php foreach ($scaffoldFields as $_field):?>
	<th><?php echo $this->Paginator->sort($_field);?></th>
<?php endforeach;?>
	<th><?php echo __d('cake', 'Actions');?></th>
</tr>
<?php
$i = 0;
foreach (${$pluralVar} as ${$singularVar}):
	echo "<tr>";
		foreach ($scaffoldFields as $_field) {
			$isKey = false;
			if (!empty($associations['belongsTo'])) {
				foreach ($associations['belongsTo'] as $_alias => $_details) {
					if ($_field === $_details['foreignKey']) {
						$isKey = true;
						echo "<td>" . $this->Html->link(${$singularVar}[$_alias][$_details['displayField']], array('controller' => $_details['controller'], 'action' => 'view', ${$singularVar}[$_alias][$_details['primaryKey']])) . "</td>";
						break;
					}
				}
			}
			if ($isKey !== true) {
				echo "<td>" . h(${$singularVar}[$modelClass][$_field]) . "</td>";
			}
		}

		echo '<td class="actions">';
		echo $this->Html->link(__d('cake', 'View'), array('action' => 'view', ${$singularVar}[$modelClass][$primaryKey]));
		echo '</td>';
	echo '</tr>';

endforeach;

?>
</table>

<table class="paging">
	<tr>
		<th><?php echo $this->Paginator->prev('« Previous', null, null, array('class' => 'disabled')); ?></th>

		<th>
			<?php
			echo $this->Paginator->counter(array(
				'format' => 'Page %page% of %pages%, showing %current% records out of %count% total'
			));
			?>
		</th>

		<th><?php echo $this->Paginator->next('Next »', null, null, array('class' => 'disabled')); ?> </th>

	</tr>
</table>


<div class="actions">
	<h3><?php echo __d('cake', 'Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__d('cake', 'New %s', $singularHumanName), array('action' => 'add')); ?></li>
<?php
		$done = array();
		foreach ($associations as $_type => $_data) {
			foreach ($_data as $_alias => $_details) {
				if ($_details['controller'] != $this->name && !in_array($_details['controller'], $done)) {
					echo "<li>" . $this->Html->link(__d('cake', 'List %s', Inflector::humanize($_details['controller'])), array('controller' => $_details['controller'], 'action' => 'index')) . "</li>";
					echo "<li>" . $this->Html->link(__d('cake', 'New %s', Inflector::humanize(Inflector::underscore($_alias))), array('controller' => $_details['controller'], 'action' => 'add')) . "</li>";
					$done[] = $_details['controller'];
				}
			}
		}
?>
	</ul>
</div>
