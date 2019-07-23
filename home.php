<?php
// Set current post id
$current_id      = get_field('active_homepage', 'wp_homepage_options');
$get_post_type   = get_post_type($current_id);
$clean_post_type = str_replace('wp-', '', $get_post_type); // remove post type prefix, if applicable

require_once get_template_directory() . '/header.php';
require_once get_template_directory() . '/blocks/banner/home.php';

echo '<main>';
echo get_post_field( 'post_content', $current_id ); // @codingStandardsIgnoreLine
require_once get_template_directory() . '/templates/_examples/grid.php'; // TODO: remove, example only
echo '</main>';

require_once get_template_directory() . '/footer.php';

// TODO: remove everything between these todos
if ('DEV' === getenv('ENV_SERVER_ENV')) {
    echo '<div class="u-block u-block--white"><div>';
        echo '<h2>Page Information</h2>';
        echo '<ul>';
        echo '<li>Current post id is <strong>' . $current_id . '</strong>, current post type is <strong>' . $get_post_type . '</strong></li>';
        echo '<li><strong>Core file being loaded:</strong> ' . dirname(__FILE__) . '/home.php</li>';
    if (! empty($template_name)) {
        echo '<li><strong>Additional file being included:</strong> ' . dirname(__FILE__) . '/' . $template_name . '.php</li>';
    }
        echo '</ul>';
    echo '</div></div>';
}
