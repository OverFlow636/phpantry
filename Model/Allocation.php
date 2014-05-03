<?php

class Allocation extends AppModel
{
	var $name = 'Allocation';

	var $belongsTo = array(
		'Unit',
		'Item',
		'Package'
	);

	var $hasMany = array(
		'AllocationPrice'
	);

	public function afterFind($data)
	{

		if (isset($data[0]) && isset($data[0][$this->alias]))
		{
			foreach($data as $idx => $alloc)
			{
				$data[$idx][$this->alias]['Prices'] = $this->priceLookup($alloc[$this->alias]['id']);
				if (isset($data[$idx][$this->alias]['Prices']['avg']) && $alloc[$this->alias]['servings'])
				{
					$data[$idx][$this->alias]['perserving'] = $data[$idx][$this->alias]['Prices']['avg'] / $alloc[$this->alias]['servings'];
				}
			}
		}

		return $data;
	}

	public function priceLookup($id)
	{
		//die($id);
		$this->AllocationPrice->contain(array(
             'Store'
        ));
		$prices = $this->AllocationPrice->findAllByAllocationId($id);
		if ($prices)
		{
			$total = 0;
			$tcount = 0;
			$stores = array();
			foreach($prices as $entry)
			{
				@$stores[$entry['Store']['name']]['cost'] += $entry['AllocationPrice']['cost'];
				@$stores[$entry['Store']['name']]['count']++;

				$total += $entry['AllocationPrice']['cost'];
				$tcount++;
			}

			$ret = array(
				'avg'=>$total/$tcount,
				'Stores'=>array()
			);

			foreach($stores as $name => $data)
			{
				$ret['Stores'][] = array(
					'Name'  => $name,
					'avg'   => $data['cost'] / $data['count']
				);
			}

			return $ret;
		}
		else
		{
			return array();
		}
	}
}