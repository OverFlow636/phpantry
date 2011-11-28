<?php

if (!$this->params['plugin'])
{
	$model = strtolower($this->params['controller']);
	$model = Inflector::camelize($model, '_controller');
	App::import('Controller', $model);
	$controllerName = $model.'Controller';
	if (class_exists($controllerName))
	{
		$controller = new $controllerName;

		if (isset($controller->acp))
		{
			$acp = $controller->acp;

			echo '<ul class=nav>';
			foreach($acp['links'] as $link)
				echo '<li>'. $this->Html->link($link['title'], $link['array']).'</li>';
			echo '</ul>';
		}
	}

}