<?php

class ItemsRecipesController extends AppController
{
	var $name = 'ItemsRecipes';

	function item2recipe($itemid=null, $recipeid=null)
	{
		if ($this->request->isPost())
		{
			$this->ItemsRecipe->save($this->request->data);
			$count = $this->ItemsRecipe->find('count', array('conditions'=>array('item_id'=>$this->request->data['ItemsRecipe']['item_id'])));
			$this->loadModel('Item');
			$this->Item->save(array(
				'id'=>$this->request->data['ItemsRecipe']['item_id'],
				'recipe_count'=>$count
			));
			$this->redirect(array('controller'=>'recipes', 'action'=>'view', $this->request->data['ItemsRecipe']['recipe_id']));
		}
		$this->set('item', $itemid);
		$this->set('recipe', $recipeid);

		$this->loadModel('Item');
		$this->set('items', $this->Item->find('list'));
		$this->loadModel('Recipe');
		$this->set('recipes', $this->Recipe->find('list'));
		$this->loadModel('Unit');
		$this->set('units', $this->Unit->find('list'));
	}

	function edititem2recipe($id=null)
	{
		if ($this->request->isPost())
		{
			$this->ItemsRecipe->save($this->request->data);
			$count = $this->ItemsRecipe->find('count', array('conditions'=>array('item_id'=>$this->request->data['ItemsRecipe']['item_id'])));
			$this->loadModel('Item');
			$this->Item->save(array(
				'id'=>$this->request->data['ItemsRecipe']['item_id'],
				'recipe_count'=>$count
			));
			$this->redirect(array('controller'=>'recipes', 'action'=>'view', $this->request->data['ItemsRecipe']['recipe_id']));
		}
		$this->request->data = $this->ItemsRecipe->read(null, $id);

		$this->loadModel('Item');
		$this->set('items', $this->Item->find('list'));
		$this->loadModel('Recipe');
		$this->set('recipes', $this->Recipe->find('list'));
		$this->loadModel('Unit');
		$this->set('units', $this->Unit->find('list'));
	}
}

