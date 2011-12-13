<div data-role="navbar">
	<ul>
		<li><a href="/Items/">Items</a></li>
		<li><a href="/Recipes/">Recipes</a></li>
		<li><a href="/mobile/ShoppingLists/" <?php if ($this->request->params['controller'] == 'ShoppingLists' && $this->request->params['action']=='mobile_index') echo 'class="ui-btn-active ui-state-persist"'; ?>>Shopping Lists</a></li>
	</ul>
</div>