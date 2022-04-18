<?php

if (!class_exists('Madara_Setting')) {

	class Madara_Setting
	{
		const MENU_BAR_TITLE = 'Madara';
		const MENU_PAGE_TITLE = 'Madara Setting Page';
		const MENU_CAPABILITY = 'manage_options';
		const MENU_MAIN_SLUG = 'madara_setting';

		const OPTION_GROUP = __CLASS__ . '__Group';
		const SETTING_ERROR = __CLASS__ . '__Error';
		const OPTION_TITLE_ENV_ID = '環境識別子';
		const OPTION_KEY_ENV_ID = __CLASS__ . '__EnvId';

		const SETTIONG_SECTION_ID = __CLASS__ . '__SettingSectionId';
		const SETTIONG_SECTION_TITLE = 'Madara Sectioin Title';

		const PRIORITY_DEFAULT = 10;

		function init()
		{
			add_action('admin_menu', [$this, 'admin_menu']);
			add_action('admin_init', [$this, 'admin_init']);
			add_action(
				'update_option_' . self::OPTION_KEY_ENV_ID,
				[$this, 'after_update'],
				self::PRIORITY_DEFAULT,
				3
			);
		}

		function admin_menu()
		{
			$hook = add_menu_page(
				self::MENU_PAGE_TITLE,
				self::MENU_BAR_TITLE,
				self::MENU_CAPABILITY,
				self::MENU_MAIN_SLUG,
				[$this, 'echo_menu_page'],
				'',
				0
			);
			// error_log($hook);
		}

		function admin_init()
		{
			register_setting(
				self::OPTION_GROUP,
				self::OPTION_KEY_ENV_ID,
				[
					'type' => 'string',
					'description' => 'Environment identifier.',
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

		function echo_menu_page()
		{
			require plugin_dir_path(__FILE__) . '../templates/menu.php';
		}

		function echo_setting_section($args)
		{
			echo '<p id="' . esc_attr($args['id']) . '">Setting Section.</p>';
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
