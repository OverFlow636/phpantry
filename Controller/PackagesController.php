<?php

class PackagesController extends AppController
{
	var $name = "Packages";

	var $scaffold;

    public function addAjax()
    {
        if ($this->request->is('post'))
        {
            $this->Package->save($this->request->data);
        }

        die(json_encode($this->Package->find('all')));
    }
}