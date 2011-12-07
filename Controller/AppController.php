<?php
App::uses('Controller', 'Controller');

/**
 * AppController sets the defaults for all other controllers.
 *
 */
class AppController extends Controller
{
	var $viewClass = 'Theme';

	var $helpers = array(
		'Html', 'Form', 'Session', 'Plural', 'Number', 'Paginator'
	);

	var $components = array(
		//'DebugKit.Toolbar',
		'Session'
	);

	public function beforeFilter()
	{
		if (!empty($this->request->params['prefix']) && $this->request->params['prefix'] == 'mobile')
			$this->theme = 'mobile';
		else
			$this->theme = 'pantry1';
	}

	public function constructClasses()
	{
		if (empty($this->request->params['prefix']) && $this->request->params['pass'][0] != 'mobile')
			$this->components[] = 'DebugKit.Toolbar';
		parent::constructClasses();
	}
}
