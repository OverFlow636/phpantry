<?php

class NutrientsController extends AppController
{
	var $name = "Nutrients";

	var $scaffold;

    public function findItem($search = null)
    {
        $this->loadModel('FatSecret');
        if (!empty($_GET['kw']))
            $search = $_GET['kw'];
        if ($search)
        {
            $r = $this->FatSecret->foodSearch($search);
            if ($r['foods']['total_results'] == 1)
                $r['foods']['food'] = array($r['foods']['food']);
            $this->set('results', $r);
            $this->set('kw', $search);
        }
    }

    public function viewFatSecretFood($id)
    {
        $this->loadModel('FatSecret');
        $this->set('food', $this->FatSecret->getFood($id));
    }
}