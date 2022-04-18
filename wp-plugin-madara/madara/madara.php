<?php

/**
 * Plugin Name:       Madara Study
 * Description:       For my study. Madara is just a Manga title that now I'm reading.
 * Requires at least: 5.9
 * Requires PHP:      7.4
 * Version:           1.0.0
 */

if (!defined('ABSPATH')) exit;

if (!class_exists('Madara_Main')) {

	require_once('classes/acf.php');
	require_once('classes/setting.php');
	require_once('classes/schedule.php');

	class Madara_Main
	{
		public function __construct()
		{
			$this->acf = new Madara_Acf();
			$this->setting = new Madara_Setting();
			$this->schedule = new Madara_Schedule();
		}

		function init()
		{
			$this->setting->init();
			$this->schedule->init();
		}

		public static function uninstall()
		{
			Madara_Setting::uninstall();
		}
	}

	(new Madara_Main())->init();
}
