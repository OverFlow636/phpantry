<?php

class PluralHelper extends Helper
{
	function ize($s, $c, $printFull=true)
	{
		if ($c==1)
			if ($printFull)
				return $c. ' '. $s;
			else
				return $s;
		else
			if ($printFull)
				return $c. ' ' . Inflector::pluralize($s);
			else
				return Inflector::pluralize($s);
	}
}