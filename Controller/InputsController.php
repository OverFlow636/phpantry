<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Joey
 * Date: 8/11/13
 * Time: 11:38 PM
 * To change this template use File | Settings | File Templates.
 */

class InputsController extends AppController
{

    public function bst($scanner, $barcode)
    {
        //possibilities
        //new item and allocation
        //existing allocation, inventory increase
        $this->loadModel('Allocation');
        $exist = $this->Allocation->findByUpc($barcode);
        if ($exist)
        {
            $this->loadModel('Inventory');
            $this->Inventory->save(array(
                'item_id'   => $exist['Allocation']['item_id'],
                'quantity'  => $exist['Allocation']['servings'],
                'unit_id'   => $exist['Item']['unit_id']
            ));
            $msg = $exist['Item']['name'] . ' added to inventory.';
        }
        else
        {
            $this->Input->save(array(
                'barcode'   => $barcode,
                'source'    => $scanner
            ));
            $msg = 'Queued for Creation';
        }

        die(json_encode(array('status'=>'ok', 'result_msg'=>$msg)));
    }
}