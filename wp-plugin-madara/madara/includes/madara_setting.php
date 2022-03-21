<?php
if (!class_exists('Madara_Setting')) {

	class Madara_Setting
	{
		const OPTION_GROUP = 'general';
		// const OPTION_GROUP = 'Madara_Setting__Group';
		const OPTION_TITLE_ENV_ID = '環境識別子';
		const OPTION_KEY_ENV_ID = 'Madara_Setting__EnvId';

		const SETTIONG_SECTION_ID = 'Madara_Setting__SettingSectionId';
		const SETTIONG_SECTION_TITLE = 'Madara Study Setting';

		const PRIORITY_DEFAULT = 10;

		function __construct()
		{
		}

		function init()
		{
			add_action('admin_init', [$this, 'add_setting']);
			add_action(
				'update_option_' . self::OPTION_KEY_ENV_ID,
				[$this, 'after_update'],
				self::PRIORITY_DEFAULT,
				3
			);
		}

		function add_setting()
		{
			register_setting(
				self::OPTION_GROUP,
				self::OPTION_KEY_ENV_ID,
				[
					'type' => 'string',
					'description' => 'Environment identifier.',
					'sanitize_callback' => null,
					'show_in_rest' => false,
					'default' => '',
				]
			);

			add_settings_section(
				self::SETTIONG_SECTION_ID,
				self::SETTIONG_SECTION_TITLE,
				[$this, 'echo_setting_section'],
				self::OPTION_GROUP
			);

			add_settings_field(
				self::OPTION_KEY_ENV_ID,
				self::OPTION_TITLE_ENV_ID,
				[$this, 'echo_filed_env_id'],
				self::OPTION_GROUP,
				self::SETTIONG_SECTION_ID,
				[
					'label_for' => self::OPTION_KEY_ENV_ID,
				]
			);
		}

		function echo_setting_section()
		{
			echo 'setting section.';
		}

		function echo_filed_env_id()
		{
			$value = get_option(self::OPTION_KEY_ENV_ID, '');

			echo '<input type="text" id="';
			echo esc_attr(self::OPTION_KEY_ENV_ID);
			echo '" name="';
			echo esc_attr(self::OPTION_KEY_ENV_ID);
			echo '" value="';
			echo esc_attr($value);
			echo '" />';
		}

		function after_update($old_value, $value, $option)
		{
		}

		public static function uninstall()
		{
			delete_option(self::OPTION_KEY_ENV_ID);
		}
	}
}
