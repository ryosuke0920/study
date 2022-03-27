<?php

/**
 * Plugin Name:       Madara Study
 * Description:       For my study. Madara is just a Manga title that now I'm reading.
 * Requires at least: 5.9
 * Requires PHP:      7.4
 * Version:           1.0.0
 */

if (!class_exists('Madara_Main')) {

	require_once('includes/madara_acf.php');
	require_once('includes/madara_setting.php');

	class Madara_Main
	{
		public function __construct()
		{
			$this->acf = new Madara_Acf();
			$this->setting = new Madara_Setting();
		}

		function init()
		{
			$this->acf->init();
			$this->setting->init();
		}

		public static function uninstall()
		{
			Madara_Setting::uninstall();
		}
	}

	$madaraMain = new Madara_Main();
	$madaraMain->init();
}
