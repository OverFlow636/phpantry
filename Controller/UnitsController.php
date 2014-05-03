<?php

class UnitsController extends AppController
{
	var $name = "Units";

	var $scaffold;


    public function addAjax()
    {
        if ($this->request->is('post'))
        {
            $this->Unit->save($this->request->data);
        }

        die(json_encode($this->Unit->find('all')));
    }

}