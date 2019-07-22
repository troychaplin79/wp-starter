<?php
// Set current post id
$current_id      = ''; // TODO: bring this back to get homepage content by ID --> get_field('active_homepage', 'wp_homepage_options');
$get_post_type   = get_post_type($current_id);
$clean_post_type = str_replace('wp-', '', $get_post_type); // remove post type prefix, if applicable

require_once get_template_directory() . '/header.php';
require_once get_template_directory() . '/blocks/banner/home.php';

echo '<main>';
echo get_post_field( 'post_content', $current_id ); // @codingStandardsIgnoreLine
require_once get_template_directory() . '/templates/_examples/grid.php'; // TODO: remove, example only
echo '</main>';

require_once get_template_directory() . '/footer.php';
