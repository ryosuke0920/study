<?php

class Bluex2_Util
{
	static function has_value($key, $arr)
	{
		if (!array_key_exists($key, $arr)) {
			return false;
		}
		if (strlen($arr[$key]) === 0) {
			return false;
		}
		return true;
	}
}
