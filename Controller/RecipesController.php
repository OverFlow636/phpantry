<?php

class RecipesController extends AppController
{
	var $name = 'Recipes';

	var $acp = array(
		'links'=>array(
			array(
				'title'=>'Recipe List',
				'array'=>array('action'=>'index')
			),
			array(
				'title'=>'New Recipe',
				'array'=>array('action'=>'add')
			),
			array(
				'title'=>'What can i make?',
				'array'=>array('action'=>'index', 'available')
			)
	));

	/**
	 * Index function sets $recipes to a paginated list of all recipes in the database
	 */
	function index($what = 'all')
	{

		switch($what)
		{
			case 'all':
				$recipes = $this->paginate();
			break;

			case 'available':
				$this->Recipe->recursive = 2;
				die(pr($this->paginate()));
			break;
		}

		$this->set('recipes', $recipes);
	}

	/**
	 * View function sets $recipe to recipe data from db
	 *
	 * @param type $id
	 */
	function view($id)
	{
		$this->Recipe->id = $id;
		if (!$this->Recipe->exists())
			throw new NotFoundException(__('Invalid recipe'));

		$this->Recipe->contain(array(
			'ItemsRecipe.Item.Inventory',
			'ItemsRecipe.Unit',
			'RecipeType'
		));
		$this->set('recipe', $this->Recipe->read());
	}

	/**
	 * Edit a recipe
	 *
	 * @param type $id
	 */
	function edit($id=null)
	{
		$this->Recipe->id = $id;
		if (!$this->Recipe->exists())
			throw new NotFoundException(__('Invalid recipe'));

		if($this->request->isPost())
		{
			$this->Recipe->save($this->request->data);
			$this->redirect(array('action'=>'view', $this->request->data['Recipe']['id']));
		}

		$this->request->data = $this->Recipe->read(null, $id);
		$this->set('recipeTypes', $this->Recipe->RecipeType->find('list'));
	}

	/**
	 * Add new recipe
	 *
	 * @return void
	 */
	function add()
	{
		if($this->request->isPost())
		{
			$this->Recipe->save($this->request->data);
			$this->redirect(array('action'=>'view', $this->Recipe->getLastInsertID()));
		}
		$this->set('recipeTypes', $this->Recipe->RecipeType->find('list'));
	}
}

