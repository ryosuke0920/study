<?php

if (!class_exists('BB_Theme_FunctionsClass')) {

	require_once 'classes/acf.php';

	class Bluex2_Functions
	{
		const PREFIX = 'BlueBlue';

		function __construct()
		{
			$this->acf = new Bluex2_Acf();
		}

		function init()
		{
			$this->acf->init();
			add_action('wp_enqueue_scripts', [$this, 'enqueue_scripts']);

			add_theme_support('wp-block-styles');
			add_editor_style('editor-style.css');
			add_action('after_setup_theme', [$this, 'after_setup_theme']);
		}

		function enqueue_scripts()
		{
			wp_enqueue_style('style', get_stylesheet_uri());
		}

		function after_setup_theme()
		{
			$styled_blocks = ['latest-comments', 'paragraph'];
			foreach ($styled_blocks as $block_name) {
				$args = array(
					'handle' => self::PREFIX . "-$block_name",
					'src'    => get_theme_file_uri("assets/css/blocks/$block_name.css"),
					'path' => get_theme_file_path("assets/css/blocks/$block_name.css"),
				);
				wp_enqueue_block_style("core/$block_name", $args);
			}
		}
	}

	if (!isset($content_width)) {
		$content_width = 600;
	}
	$bb_theme = new Bluex2_Functions();
	$bb_theme->init();
}
