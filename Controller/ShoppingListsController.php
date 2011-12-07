<?php
App::uses('AppController', 'Controller');

/**
 * ShoppingLists Controller
 *
 * @property ShoppingList $ShoppingList
 */
class ShoppingListsController extends AppController
{
	public $name = 'ShoppingLists';

	public $acp = array(
		'links'=>array(
			array(
				'title'=>'New List',
				'array'=>array('action'=>'add')
			),
			array(
				'title'=>'Stores',
				'array'=>array('controller'=>'Stores', 'action'=>'index'),
				'main'=>true
			)
		)
	);

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->ShoppingList->recursive = 0;
		$this->set('shoppingLists', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null)
	{
		$this->ShoppingList->id = $id;
		if (!$this->ShoppingList->exists())
			throw new NotFoundException(__('Invalid shopping list'));

		$this->ShoppingList->contain(array(
			'Store',
			'Status',
			'ShoppingListItem.Item.Unit',
			'ShoppingListItem.Package',
			'ShoppingListItem.Status'
		));
		$this->set('shoppingList', $this->ShoppingList->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->ShoppingList->create();
			if ($this->ShoppingList->save($this->request->data)) {
				$this->Session->setFlash(__('The shopping list has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The shopping list could not be saved. Please, try again.'));
			}
		}
		$statuses = $this->ShoppingList->Status->find('list');
		$stores = $this->ShoppingList->Store->find('list');
		$this->set(compact('statuses', 'stores'));
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->ShoppingList->id = $id;
		if (!$this->ShoppingList->exists()) {
			throw new NotFoundException(__('Invalid shopping list'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->ShoppingList->save($this->request->data)) {
				$this->Session->setFlash(__('The shopping list has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The shopping list could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->ShoppingList->read(null, $id);
		}
		$statuses = $this->ShoppingList->Status->find('list');
		$stores = $this->ShoppingList->Store->find('list');
		$this->set(compact('statuses', 'stores'));
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
		$this->ShoppingList->id = $id;
		if (!$this->ShoppingList->exists()) {
			throw new NotFoundException(__('Invalid shopping list'));
		}
		if ($this->ShoppingList->delete()) {
			$this->Session->setFlash(__('Shopping list deleted'));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Shopping list was not deleted'));
		$this->redirect(array('action' => 'index'));
	}



	function mobile_index()
	{
		$this->ShoppingList->recursive = 0;
		$this->set('shoppingLists', $this->paginate());
	}

	function mobile_view($id = null)
	{
		$this->ShoppingList->id = $id;
		if (!$this->ShoppingList->exists())
			throw new NotFoundException(__('Invalid shopping list'));

		$this->ShoppingList->contain(array(
			'Store',
			'Status',
			'ShoppingListItem.Item.Unit',
			'ShoppingListItem.Package',
			'ShoppingListItem.Status'
		));
		$this->set('shoppingList', $this->ShoppingList->read(null, $id));
	}
}
