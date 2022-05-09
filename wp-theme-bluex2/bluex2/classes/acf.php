<?php

if (function_exists('acf_add_local_field_group')) {

	class Bluex2_Acf
	{
		const DEFAULT_PRIORITY = 10;
		const FIELD_NAME_INPUT_TYPE = 'input_type';
		const FIELD_VALUE_INPUT_TYPE = 'textbox';
		const FIELD_NAME_SAMPLE_TEXTBOX = 'sample_textbox';
		const FIELD_NAME_SAMPLE_TEXTAREA = 'sample_textarea';
		const FIELD_NAME_CHECKBOX = 'checkbox';
		const FIELD_NAME_IMAGE = 'image';
		const PAGE_SLUG_HOME = 'home';

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

			$home_post = get_page_by_path(self::PAGE_SLUG_HOME, OBJECT, ['page']);

			if (function_exists('acf_add_local_field_group') && $home_post->ID) :

				acf_add_local_field_group(
					array(
						'key' => 'group_625d586303479',
						'title' => 'Home Identify',
						'fields' => array(
							array(
								'key' => 'field_625d58876731c',
								'label' => 'Home Message',
								'name' => 'home_message',
								'type' => 'text',
								'instructions' => '',
								'required' => 0,
								'conditional_logic' => 0,
								'wrapper' => array(
									'width' => '',
									'class' => '',
									'id' => '',
								),
								'default_value' => '',
								'placeholder' => '',
								'prepend' => '',
								'append' => '',
								'maxlength' => '',
							),
							array(
								'key' => 'field_625d698d52b21',
								'label' => 'Home Image',
								'name' => 'home_image',
								'type' => 'image',
								'instructions' => '',
								'required' => 0,
								'conditional_logic' => 0,
								'wrapper' => array(
									'width' => '',
									'class' => '',
									'id' => '',
								),
								'return_format' => 'url',
								'preview_size' => 'medium',
								'library' => 'all',
								'min_width' => '',
								'min_height' => '',
								'min_size' => '',
								'max_width' => '',
								'max_height' => '',
								'max_size' => '',
								'mime_types' => '',
							),
							array(
								'key' => 'field_625d6de4588d0',
								'label' => 'Elastic Image',
								'name' => 'elastic_image',
								'type' => 'image',
								'instructions' => '',
								'required' => 0,
								'conditional_logic' => 0,
								'wrapper' => array(
									'width' => '',
									'class' => '',
									'id' => '',
								),
								'return_format' => 'id',
								'preview_size' => 'medium',
								'library' => 'all',
								'min_width' => '',
								'min_height' => '',
								'min_size' => '',
								'max_width' => '',
								'max_height' => '',
								'max_size' => '',
								'mime_types' => '',
							),
						),
						'location' => array(
							array(
								array(
									'param' => 'page',
									'operator' => '==',
									'value' => $home_post->ID,
								),
							),
						),
						'menu_order' => 0,
						'position' => 'normal',
						'style' => 'default',
						'label_placement' => 'top',
						'instruction_placement' => 'label',
						'hide_on_screen' => '',
						'active' => true,
						'description' => '',
						'show_in_rest' => 0,
					),
				);

			endif;
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
			if ($value === null) {
				$value = [];
			}
			return $value;
		}
	}
}
