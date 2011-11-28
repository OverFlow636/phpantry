<?php

App::uses('Controller', 'Controller');
class ItemsController extends AppController
{
	var $name = 'Items';

	var $acp = array(
		'links'=>array(
			array(
				'title'=>'Packages',
				'array'=>array('controller'=>'Packages', 'action'=>'index')
			),array(
				'title'=>'Item List',
				'array'=>array('action'=>'index')
			),
			array(
				'title'=>'New Item',
				'array'=>array('action'=>'add')
			),
			array(
				'title'=>'Import',
				'array'=>array('action'=>'import')
			)
		)
	);

	function index()
	{
		$this->data = $this->paginate();
	}

	function view($id)
	{
		$this->set('recipeTypes', $this->Item->ItemsRecipe->Recipe->RecipeType->find('list'));
		$this->Item->contain(array(
			'Inventory',
			'ItemsRecipe.Recipe',
			'ItemsRecipe.Unit',
			'Unit'
		));
		$this->data = $this->Item->read(null, $id);
	}

	function add($upc=null)
	{
		if ($this->request->isPost())
		{
			if (isset($this->request->data['Item']['upc']))
			{
				$upc = str_pad(ltrim($this->request->data['Item']['upc'],'0'), 12, '0', STR_PAD_LEFT);

				$exists = $this->Item->findByUpc($upc);
				if ($exists)
					$this->redirect(array('action'=>'edit', $exists['Item']['id']));

				unset($this->request->data);
			}
		}

		if ($upc==null)
		{
			if (isset($this->request->data))
			{

			}

			$this->render('scanupc');
		}
		else
		{
			if (isset($this->request->data))
			{
				$this->Item->save($this->request->data);
				$this->redirect(array('action'=>'view', $this->Item->getLastInsertID()));
			}

			$this->request->data['Item'] = $this->lookup($upc);
			if (empty($this->request->data['Item']['upc']))
				$this->request->data['Item']['upc'] = $upc;
		}

	}

	function edit($id=null)
	{
		if ($this->request->isPost())
		{
			$this->Item->save($this->request->data);
			$this->redirect(array('action'=>'view', $this->data['Item']['id']));
		}

		$this->data = $this->Item->read(null, $id);
		$this->set('itemTypes', $this->Item->ItemType->find('list'));
		$units = $this->Item->Unit->find('list');
		$this->set('units', $units);
		$this->set('servingUnits', $units);
	}

	private function lookup($upc)
	{
		$upc = str_pad(ltrim($upc,'0'), 12, '0', STR_PAD_LEFT);
		App::import('Vendor', 'xmlrpc'.DS.'rpc');

		$rpc_key = '1d29c45ae795b00e26013d8be3ae5d4e807855a0';
		$client = new XML_RPC_Client('/xmlrpc', 'http://www.upcdatabase.com');
		$params = array( new XML_RPC_Value( array(
			'rpc_key' => new XML_RPC_Value($rpc_key, 'string'),
			'upc' => new XML_RPC_Value($upc, 'string'),
		), 'struct'));
		$msg = new XML_RPC_Message('lookup', $params);
		$resp = $client->send($msg);
		if (!$resp)
		{
			echo 'Communication error: ' . $client->errstr;
			exit;
		}

		if(!$resp->faultCode())
		{
			$val = $resp->value();
			$data = XML_RPC_decode($val);
			if (isset($data['description']))
				$data['name'] = $data['description'];
			return $data;
		}
		else
		{
			echo 'Fault Code: ' . $resp->faultCode() . "\n";
			echo 'Fault Reason: ' . $resp->faultString() . "\n";

			die();
		}
	}


	/*
	 * myfitnesspal stuff
	 */
	private function login()
	{
		$this->loadModel('Curl');
		$this->Curl->start();
		$this->Curl->url = 'http://www.myfitnesspal.com/account/login';
		$this->Curl->getReady();
		$this->Curl->execute();

		if (strpos($this->Curl->output, 'overflow636') > 0)
			return true;

		$token = $this->Curl->grabInside('<input name="authenticity_token" type="hidden" value="', '" />');

		$this->loadModel('Curl');
		$this->Curl->start();
		$this->Curl->url = 'http://www.myfitnesspal.com/account/login';
		$this->Curl->post = true;
		$this->Curl->postFields = array(
			'authenticity_token'	=> $token,
			'username'				=> '',
			'password'				=> '',//replace with your user info here
			'remember_me'			=> '1'
		);
		$this->Curl->getReady();
		$this->Curl->execute();
		$result = strpos($this->Curl->output, 'overflow636')>0;
		return $result;
	}

	function search($name)
	{
		if ($this->login())
		{
			echo "Login was true\n\n\n\n";
			$this->loadModel('Curl');
			$this->Curl->start();
			$this->Curl->url = 'http://www.myfitnesspal.com/food/calorie-chart-nutrition-facts';
			$this->Curl->post = true;
			$this->Curl->postFields = array(
				'search'	=> $name
			);
			$this->Curl->getReady();
			$this->Curl->execute();

			$results = $this->Curl->grabInside('<ul id="matching">','</ul>');

			$out = array();
			$arr = explode("<li>", $results);
			foreach($arr as $item)
				if (strlen(trim($item)))
				{
					$item = trim($item);
					$arrr['code'] = substr($item, 87, strpos($item, '?')-87);
					$carat = strpos($item, '>');
					$arrr['name'] = substr($item, $carat, strpos($item, '<', $carat)-$carat);
					$out[] = $arrr;
				}

			die(pr($out));

		}
		else
			die('cant login');
	}


	function testParse()
	{
		$str = '<tbody>
		<tr>
			<td class="col-1">Calories</td>
			<td class="col-2">445</td>
			<td class="col-1">Sodium</td>
			<td class="col-2">2385 mg</td>
		</tr>
		<tr>
			<td class="col-1">Total Fat</td>
			<td class="col-2">20 g</td>
			<td class="col-1">Potassium</td>
			<td class="col-2">0 mg</td>
		</tr>

		<tr>
			<td class="col-1 sub">Saturated</td>
			<td class="col-2">0 g</td>
			<td class="col-1">Total Carbs</td>
			<td class="col-2">26 g</td>
		</tr>

		<tr>
			<td class="col-1 sub">Polyunsaturated</td>
			<td class="col-2">0 g</td>
			<td class="col-1">Dietary Fiber</td>
			<td class="col-2">6 g</td>
		</tr>

		<tr>
			<td class="col-1 sub">Monounsaturated</td>
			<td class="col-2">0 g</td>
			<td class="col-1">Sugars</td>
			<td class="col-2">2 g</td>
		</tr>

		<tr>
			<td class="col-1 sub">Trans</td>
			<td class="col-2">0 g</td>
			<td class="col-1">Protein</td>
			<td class="col-2">49 g</td>
		</tr>

		<tr class="last">
			<td class="col-1">Cholesterol</td>
			<td class="col-2">110 mg</td>
			<td class="col-1">&nbsp;</td>
			<td class="col-2">&nbsp;</td>
		</tr>

		<tr class="alt">
			<td class="col-1">Vitamin A</td>
			<td class="col-2">0%</td>
			<td class="col-1">Calcium</td>
			<td class="col-2">0%</td>
		</tr>

		<tr class="last">
			<td class="col-1">Vitamin C</td>
			<td class="col-2">0%</td>
			<td class="col-1">Iron</td>
			<td class="col-2">0%</td>
		</tr>


	</tbody> ';

		$out = array();
		$arr = explode("<td class=\"col-1", $str);


		die(pr($arr));
		foreach($arr as $item)
			if (strlen(trim($item)))
			{
				$item = trim($item);
				$arrr['code'] = substr($item, 87, strpos($item, '?')-87);
				$carat = strpos($item, '>');
				$arrr['name'] = substr($item, $carat, strpos($item, '<', $carat)-$carat);
				$out[] = $arrr;
			}

		die(pr($out));
	}


	function getNut($itemcode)
	{
		$this->loadModel('Curl');
		$this->Curl->start();
		$this->Curl->url = 'http://www.myfitnesspal.com/food/update_nutrition_facts/'.$itemcode;
		$this->Curl->getReady();
		$this->Curl->execute();
		die($this->Curl->output);
	}
}