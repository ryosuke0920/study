<?php
if (!defined('ABSPATH')) exit;

require_once('madara.php');

if (class_exists('Madara_Main')) {
    Madara_Main::uninstall();
}
