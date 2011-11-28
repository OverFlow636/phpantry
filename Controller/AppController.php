<?php

App::uses('Controller', 'Controller');
class AppController extends Controller
{
	var $viewClass = 'Theme';
	var $theme = 'pantry1';

	var $helpers = array(
		'Html', 'Form', 'Session', 'Plural', 'Number'
	);
}
