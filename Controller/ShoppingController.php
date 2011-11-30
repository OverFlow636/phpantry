<?php

class ShoppingController extends AppController
{
	public $name = 'Shopping';
	public $uses = array();

	var $acp = array(
		'links'=>array(
			array(
				'title'=>'Scan Groceries',
				'array'=>array('action'=>'scanGroceries')
			),
			array(
				'title'=>'Shopping Lists',
				'array'=>array('controller'=>'ShoppingLists', 'action'=>'index'),
				'main'=>true
			)
		)
	);

	function index()
	{

	}

	function scanGroceries($upc = null)
	{
		if ($this->request->isPost())
		{
			//search for an item or package with the upc
			$this->loadModel('Item');
			$items = $this->Item->findByUpc($this->request->data['Shopping']['upc']);
			if ($items)
			{
				//add x number of items to inventory for this item
				//example scanning a jar of peanut butter
				//need to add 1 unit to inventory and x number of servings
				$this->loadModel('Inventory');
				$this->Inventory->addStock($items['Item']['id'], 1, $items['Item']['serving_count']);
				$this->Session->setFlash('Added 1 '. $items['Item']['name']. ' to inventory. ('.$items['Item']['serving_count'].' servings)', 'notice_success');
				$this->redirect(array('action'=>'scanGroceries'));
			}

			$this->loadModel('Package');
			$packages = $this->Package->findByUpc($this->request->data['Shopping']['upc']);
			if ($packages)
			{
				//add x number of items to inventory for this package
				//example scanning a 12 pack of green beans
				//need to add 12 to item_id to inventory

				$this->loadModel('Inventory');
				$this->Inventory->addStock($packages['Item']['id'], $packages['Package']['item_quantity'], $packages['Item']['serving_count']);
				$this->Session->setFlash('Added '.$packages['Package']['item_quantity'].' '. $packages['Item']['name']. ' to inventory. ('.$packages['Item']['serving_count'].' servings)', 'notice_success');
				$this->redirect(array('action'=>'scanGroceries'));
			}

			//upc is not in database, we need to ask user if it is an item or package
			$this->render('choosetype');
		}
		else
		{
			if ($upc == null)
			{
				$this->render('scanupc');
			}
			else
			{

			}
		}
	}
}
