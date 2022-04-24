<?php
/*
Template name: page-home.php
*/


get_header();
if (have_posts()) {
	while (have_posts()) {
		the_post();
		echo "<article>\n";

		echo '<div id="home_image">';

		echo '<p>';
		the_field('home_image');
		echo "</p>\n";

		echo '<p>';
		echo '<img src="' . get_field('home_image') . '"/>';
		echo "</p>\n";

		echo "</div>\n";


		echo '<div id="elastic_image">';

		echo '<p>';
		the_field('elastic_image');
		echo "</p>\n";

		$url = wp_get_attachment_url(get_field('elastic_image'), [10, 10]);
		echo '<p>' . $url . "</p>\n";

		echo '<img src="' . $url . '"/>';
		echo "</div>\n";

		echo '<div id="home_message">';
		the_field('home_message');
		echo "</div>\n";


		echo '<h1 id="the_title">';
		the_title();
		echo "</h1>\n";

		echo '<div id="the_content">';
		the_content();
		echo "</div>\n";

		echo "</article>\n";
	}
	the_post_navigation();
}
get_footer();

echo '<!--page-home-->';
