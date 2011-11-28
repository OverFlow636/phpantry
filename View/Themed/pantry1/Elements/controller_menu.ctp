<?php

$controller = strtolower($this->params['controller']);

?>
<ul id="top-navigation">
	<li><a href="/Items" <?php echo ($controller == 'items' || $controller == 'packages'?"class='active'":''); ?>>Items</a></li>
	<li><a href="/Recipes" <?php echo ($controller == 'recipes'?"class='active'":''); ?>>Recipes</a></li>
	<li><a href="/Inventories" <?php echo ($controller == 'inventories'?"class='active'":''); ?>>Inventory</a></li>
	<li><a href="/Shopping" <?php echo ($controller == 'shopping'?"class='active'":''); ?>>Shopping</a></li>
	<li><a href="/full_calendar" <?php echo ($controller == 'full_calendar'?"class='active'":''); ?>>Calendar</a></li>
</ul>
