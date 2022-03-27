<?php

if (!class_exists('Bluex2_Acf') && function_exists('acf_add_local_field_group')) {

	class Bluex2_Acf
	{
		const DEFAULT_PRIORITY = 10;
		const FIELD_NAME_INPUT_TYPE = 'input_type';
		const FIELD_VALUE_INPUT_TYPE = 'textbox';
		const FIELD_NAME_SAMPLE_TEXTBOX = 'sample_textbox';
		const FIELD_NAME_SAMPLE_TEXTAREA = 'sample_textarea';
		const FIELD_NAME_CHECKBOX = 'checkbox';

		function __construct()
		{
		}

		function init()
		{
			add_filter(
				'acf/load_value/name=' . self::FIELD_NAME_INPUT_TYPE,
				[$this, 'load_value_input_field'],
				self::DEFAULT_PRIORITY,
				3
			);
			add_filter(
				'acf/load_value/name=' . self::FIELD_NAME_CHECKBOX,
				[$this, 'load_value_checkbox'],
				self::DEFAULT_PRIORITY,
				3
			);
		}

		function load_value_input_field($value, $post_id, $field)
		{
			if ($value === null) {
				$value = [
					'value' => self::FIELD_VALUE_INPUT_TYPE,
				];
			}
			return $value;
		}

		function load_value_checkbox($value, $post_id, $field)
		{
			return $value;
		}
	}
}
