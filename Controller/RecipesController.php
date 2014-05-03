<?php

class RecipesController extends AppController
{
	var $name = "Recipes";
  var $scaffold;


  public function addItem($id)
  {
    if ($this->request->is('post')||$this->request->is('put')) {

      $data = $this->request->data['Recipe'];
      $data['recipe_id'] = $id;
      if ($this->Recipe->ItemsRecipe->save($data)) {
        $this->Session->setFlash('Added item to recipe.');
        $this->redirect(array('action'=>'view', $id));
      }

    } else {

      $this->set('items', $this->Recipe->Item->find('list'));
      $this->set('units', $this->Recipe->Item->Unit->find('list'));

    }
  }
}