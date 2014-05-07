<?php
App::uses('Controller', 'Controller');

/**
 * AppController sets the defaults for all other controllers.
 *
 */
class AppController extends Controller {
  var $viewClass = 'Theme';
  var $theme = 'AdminLTE';

  var $helpers = array(
    'Html', 'Form', 'Session', 'Plural', 'Number', 'Paginator'
  );

  var $components = array(
    'DebugKit.Toolbar',
    'Session',
    'RequestHandler',
    'Auth' => array(
      'loginRedirect'   => array('controller' => 'items', 'action' => 'index'),
      'logoutRedirect'  => array('controller' => 'pages', 'action' => 'display', 'home'),
      'authorize'       => array('Controller')
    )
  );

  public function isAuthorized($user) {
    return true;
  }

  public function beforeFilter() {
    $this->Auth->allow('index', 'view', 'bst');
  }
}
