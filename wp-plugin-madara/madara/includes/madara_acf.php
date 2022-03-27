<?php

if (!class_exists('Madara_Acf')) {

	class Madara_Acf
	{
		const FIELD_NAME_INPUT_TYPE = 'input_type';

		function init()
		{
			add_filter(
				'acf/load_field/name=' . self::FIELD_NAME_INPUT_TYPE,
				[$this, 'load_field']
			);
		}

		public function load_field($field)
		{
			return $field;
		}
	}
}
