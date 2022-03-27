<?php
/*
Template name: index
*/

get_header();
if (have_posts()) {
    while (have_posts()) {
        the_post();
        get_template_part(
            'template-parts/content',
            get_post_format()
        );
    }
    the_post_navigation();
}
get_footer();
