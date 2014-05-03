<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Joey
 * Date: 8/19/13
 * Time: 10:10 PM
 * To change this template use File | Settings | File Templates.
 */

class BrandsController extends AppController
{
    var $name = 'Brands';
    var $scaffold;

    public function addAjax()
    {
        if ($this->request->is('post'))
        {
            $this->Brand->save($this->request->data);
        }

        die(json_encode($this->Brand->find('all')));
    }
}