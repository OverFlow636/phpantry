<?php
App::uses('AppController', 'Controller');
/**
 * ShoppingListItems Controller
 *
 * @property ShoppingListItem $ShoppingListItem
 */
class ShoppingListItemsController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->ShoppingListItem->recursive = 0;
		$this->set('shoppingListItems', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->ShoppingListItem->id = $id;
		if (!$this->ShoppingListItem->exists()) {
			throw new NotFoundException(__('Invalid shopping list item'));
		}
		$this->set('shoppingListItem', $this->ShoppingListItem->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add($shoppingList=null, $addType=null, $addId=null, $addQuantity=1)
	{
		if ($this->request->is('ajax'))
		{
			if ($shoppingList != null && $addType!=null && $addId!=null)
			{
				switch ($addType)
				{
					case 'Recipe':
						$this->loadModel('Recipe');
						$recipe = $this->Recipe->read(null, $addId);

						foreach($recipe['ItemsRecipe'] as $ir)
							$this->ShoppingListItem->addItemToList($shoppingList, $ir['item_id'], $ir['quantity']);
					break;

					case 'Item':
						$this->ShoppingListItem->addItemToList($shoppingList, $addId, $addQuantity);
					break;

					case 'Package':
						$this->ShoppingListItem->addPackageToList($shoppingList, $addId, $addQuantity);
					break;
				}
				$this->ShoppingListItem->ShoppingList->save(array(
					'id'=>$shoppingList,
					'status'=>1
				));

				$this->redirect(array('action'=>'getList', $shoppingList));
			}
			die('error');
		}
		else
		{
			if ($this->request->is('post')) {
				$this->ShoppingListItem->create();
				if ($this->ShoppingListItem->save($this->request->data)) {
					$this->Session->setFlash(__('The shopping list item has been saved'));
					$this->redirect(array('action' => 'index'));
				} else {
					$this->Session->setFlash(__('The shopping list item could not be saved. Please, try again.'));
				}
			}
			$shoppingLists = $this->ShoppingListItem->ShoppingList->find('list');
			$items = $this->ShoppingListItem->Item->find('list');
			$items[0] = 'None';
			$packages = $this->ShoppingListItem->Package->find('list');
			$packages[0] = 'None';
			$statuses = $this->ShoppingListItem->Status->find('list');
			$this->set(compact('shoppingLists', 'items', 'packages', 'statuses'));
		}
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null, $editType=null, $editId=null, $status=null)
	{
		$this->ShoppingListItem->id = $id;
		if (!$this->ShoppingListItem->exists())
			throw new NotFoundException(__('Invalid shopping list item'));

		if ($this->request->is('post') || $this->request->is('put'))
		{
			if ($this->ShoppingListItem->save($this->request->data))
			{
				$this->Session->setFlash(__('The shopping list item has been saved'));
				$this->redirect(array('action' => 'index'));
			}
			else
				$this->Session->setFlash(__('The shopping list item could not be saved. Please, try again.'));
		}
		else
			$this->request->data = $this->ShoppingListItem->read(null, $id);

		$shoppingLists = $this->ShoppingListItem->ShoppingList->find('list');
		$items = $this->ShoppingListItem->Item->find('list');
		$packages = $this->ShoppingListItem->Package->find('list');
		$statuses = $this->ShoppingListItem->Status->find('list');
		$this->set(compact('shoppingLists', 'items', 'packages', 'statuses'));

	}

/**
 * delete method
 *
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->ShoppingListItem->id = $id;
		if (!$this->ShoppingListItem->exists()) {
			throw new NotFoundException(__('Invalid shopping list item'));
		}
		if ($this->ShoppingListItem->delete()) {
			$this->Session->setFlash(__('Shopping list item deleted'));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Shopping list item was not deleted'));
		$this->redirect(array('action' => 'index'));
	}




	public function search($term=null)
	{
		if ($term == null)
			if (isset($_GET['term']))
				$term = $_GET['term'];
			else
				$this->redirect('/');

		$results = array();

		$this->loadModel('Item');
		$items = $this->Item->find('all', array(
			'conditions'=>array(
				'Item.name LIKE "'.$term.'%"'
			),
			'contain'=>array()
		));
		if (!empty($items))
			foreach($items as $item)
				$results[] = array(
					'id'	=> $item['Item']['id'],
					'label'	=> 'Item: '.$item['Item']['name'],
					'value'	=> $item['Item']['name'],
					'type'	=> 'Item'
				);

		$this->loadModel('Recipe');
		$recipes = $this->Recipe->find('all', array(
			'conditions'=>array(
				'Recipe.name LIKE "%'.$term.'%"'
			),
			'contain'=>array()
		));
		if (!empty($recipes))
			foreach($recipes as $recipe)
				$results[] = array(
					'id'	=> $recipe['Recipe']['id'],
					'label'	=> 'Recipe: '.$recipe['Recipe']['name'],
					'value'	=> $recipe['Recipe']['name'],
					'type'	=> 'Recipe'
				);

		$this->loadModel('Package');
		$packages = $this->Package->find('all', array(
			'conditions'=>array(
				'Package.name LIKE "%'.$term.'%"'
			),
			'contain'=>array()
		));
		if (!empty($packages))
			foreach($packages as $package)
				$results[] = array(
					'id'	=> $package['Package']['id'],
					'label'	=> 'Package: '.$package['Package']['name'],
					'value'	=> $package['Package']['name'],
					'type'	=> 'Package'
				);

		die(json_encode($results));
	}

	public function getList($shoppingList=null)
	{
		$this->ShoppingListItem->contain(array(
			'Item.Unit',
			'Package',
			'Status'
		));
		$this->set('items', $this->ShoppingListItem->findAllByShoppingListId($shoppingList));

		if ($this->request->is('ajax'))
			$this->layout = 'ajax';
	}

	public function updateStatus($id=null, $status='false')
	{
		if ($status == 'true')
			$status = 3;
		else
			$status = 1;

		if ($this->request->is('ajax'))
		{
			$details = array(
				'id'		=> $id,
				'status_id'	=> $status
			);

			$this->ShoppingListItem->save($details);
			die('success');

		}
		die('error');
	}
}
