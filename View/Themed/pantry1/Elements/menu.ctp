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

			$list1 = $list2 = '';
			foreach($acp['links'] as $link)
				if (!empty($link['main']) && $link['main'])
					$list1 .= '<li>'. $this->Html->link($link['title'], $link['array']).'</li>';
				else
					$list2 .= '<li>'. $this->Html->link($link['title'], $link['array']).'</li>';

			if (!empty($list1))
				echo '<h3>Pages</h3><ul class=nav>'.$list1.'</ul>';

			if (!empty($list2))
				echo '<h3>Actions</h3><ul class=nav>'.$list2.'</ul>';
		}
	}

}