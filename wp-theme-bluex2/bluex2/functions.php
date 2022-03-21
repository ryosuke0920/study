<?php

if (!class_exists('BB_Theme_FunctionsClass')) {

    class BB_Theme_FunctionsClass
    {
        const PREFIX = 'BlueBlue';

        public function __construct()
        {
            $this->setup();
        }

        private function setup()
        {
            add_theme_support('wp-block-styles');
            add_editor_style('editor-style.css');
            add_action('after_setup_theme', [$this, 'after_setup_theme']);
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

    new BB_Theme_FunctionsClass();
}
