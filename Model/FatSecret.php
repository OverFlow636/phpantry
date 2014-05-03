<?php
require_once(APP. 'Lib/fat-secret/FatSecretAPI.php');

class FatSecret extends AppModel
{
	var $useTable = false;
	var $API = null;
	var $key = 'a35cdbd0c8a541119c044bc2d3f2bf51';
	var $secret = '111b3b887ae348ad943bc0fda4ea8c83';
	var $url = 'http://platform.fatsecret.com/js?';

	var $auth;

	public function __construct()
	{
		$token2 =  $secret2 = '';

		$this->API = new FatSecretAPI($this->key, $this->secret);

		$this->API->ProfileGetAuth('overflow636@gmail.com', $token2, $secret2);
		$this->auth = array('token'=>$token2, 'secret'=>$secret2);
	}

	public function getFood($id)
	{
		$sessionKey = '';


		$this->API->ProfileRequestScriptSessionKey($this->auth, null, null, null, false, $sessionKey);

		return $this->API->foodget($id, $this->auth, $sessionKey);
	}

	public function foodSearch($term)
	{
		$sessionKey = '';

		$this->API->ProfileRequestScriptSessionKey($this->auth, null, null, null, false, $sessionKey);

		return $this->API->foodsearch($term, $this->auth, $sessionKey);
	}

}