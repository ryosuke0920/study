<?php

/**
 * Plugin Name:       Madata Study
 * Requires at least: 5.9
 * Requires PHP:      7.4
 * Version:           1.0.0
 */

if (!class_exists('Madara_Main')) {

    require_once('includes/madara_setting.php');

    class Madara_Main
    {
        public function __construct()
        {
            $this->setting = new Madara_Setting();
        }

        function init()
        {
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
