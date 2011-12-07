<?php
App::uses('AppController', 'Controller');
/**
 * Stores Controller
 *
 * @property Store $Store
 */
class StoresController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Store->recursive = 0;
		$this->set('stores', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Store->id = $id;
		if (!$this->Store->exists()) {
			throw new NotFoundException(__('Invalid store'));
		}
		$this->set('store', $this->Store->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Store->create();
			if ($this->Store->save($this->request->data)) {
				$this->Session->setFlash(__('The store has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The store could not be saved. Please, try again.'));
			}
		}
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Store->id = $id;
		if (!$this->Store->exists()) {
			throw new NotFoundException(__('Invalid store'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Store->save($this->request->data)) {
				$this->Session->setFlash(__('The store has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The store could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Store->read(null, $id);
		}
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
		$this->Store->id = $id;
		if (!$this->Store->exists()) {
			throw new NotFoundException(__('Invalid store'));
		}
		if ($this->Store->delete()) {
			$this->Session->setFlash(__('Store deleted'));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Store was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
