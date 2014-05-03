<?php

class AllocationsController extends AppController
{
	var $scaffold;

	public function addToItem($item, $upc, $sizeData)
	{
        if ($this->request->is('post') || $this->request->is('put'))
        {
            $this->request->data['Allocation']['upc'] = $upc;
            $this->request->data['Allocation']['item_id'] = $item;
            if ($this->Allocation->save($this->request->data))
            {
                $this->loadModel('AllocationPrice');
                $this->AllocationPrice->save(array(
                    'allocation_id' => $this->Allocation->getLastInsertId(),
                    'store_id'      => $this->request->data['Allocation']['store_id'],
                    'cost'          => $this->request->data['Allocation']['price'],
                ));

                $this->Session->setFlash('Successfully added new item allocation.');
                $this->redirect(array('controller'=>'Items', 'action'=>'add'));
            }
        }
        else
        {
            $item = $this->Allocation->Item->read(null, $item);

            $this->set('item', $item);
            $this->set('upc', $upc);

            $units = $this->Allocation->Unit->find('list');
            $units[0] = 'New Unit';
            $this->set('units', $units);

            $packages = $this->Allocation->Package->find('list');
            $packages[0] = 'New Package';
            $this->set('packages', $packages);

            $this->set('size', $sizeData);

            $this->loadModel('Store');
            $this->set('stores', $this->Store->find('list'));
        }
	}
}