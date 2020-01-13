<?php // @codingStandardsIgnoreLine
/**
 * Enqueue Front End Style and Scripts
 * =============
 *
 * @package  Public Supports
 * @category Scripts and Styles
 * @version  1.0
 */

function wpstarter_front_end_enqueues()
{
    // Remove jQuery on Front End
    if (! is_admin()) {
        wp_deregister_script('jquery');

        // TODO: document this option
        // wp_enqueue_script( 'jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js', false, '3.4.1', true );
    }

    // Enqueue Google Fonts
    // TODO: document this option
    // wp_enqueue_style( 'googlefonts', 'https://fonts.googleapis.com/css?family=Roboto+Condensed:400,700|Roboto:400,700', false, THEME_VERSION );

    // Enqueued Resource Path
    $theme_stylesheet_path = get_template_directory_uri() . '/dist/css/styles.css.gz';
    $theme_javascript_path = get_template_directory_uri() . '/dist/js/scripts.js.gz';

    // Change Paths for Local Development
    if ('DEV' === getenv('ENV_CURRENT_ENV')) {
        $theme_stylesheet_path = get_template_directory_uri() . '/dist/css/styles.css';
        $theme_javascript_path = get_template_directory_uri() . '/dist/js/scripts.js';
    }

    // Theme Scripts and Styles
    wp_enqueue_style('styles', $theme_stylesheet_path, false, THEME_VERSION, 'screen');
    wp_enqueue_script('scripts', $theme_javascript_path, null, THEME_VERSION, true);
}
add_action('wp_enqueue_scripts', 'wpstarter_front_end_enqueues');


/**
 * Enqueue comment reply script
 * =============
 *
 * @package  Public Supports
 * @category Scripts and Styles
 * @version  1.0
 */

function wpstarter_enqueue_comments_reply()
{
    if (get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('comment_form_before', 'wpstarter_enqueue_comments_reply');
