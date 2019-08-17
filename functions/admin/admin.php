<?php
/**
 * Add editor stylesheet

 * @package Theme Admin Supports
 * @category Admin Enqueues
 * @version 1.0
 */
add_theme_support('editor-styles');
add_editor_style('dist/admin/editor.css');

/**
 * Enqueue admin scripts and styles

 * @package Theme Admin Supports
 * @category Admin Enqueues
 * @version 1.0
 *
 * TODO: add admin resources to webpack builder
 * TODO: document this option
 */
function wpstarter_admin_enqueue()
{
    $theme_admin_support_path = get_template_directory_uri() . '/dist/admin';

    wp_enqueue_style('admin-css', $theme_admin_support_path . '/css/admin.css', false, THEME_VERSION, 'screen');
    wp_enqueue_script('admin-js', $theme_admin_support_path . '/js/admin.js', array( 'jquery' ), THEME_VERSION, true);
}
add_action('admin_enqueue_scripts', 'wpstarter_admin_enqueue');

/**
 * Register theme specific image sizes
 *
 * @package Theme Admin Supports
 * @category Update Options
 * @version 1.0
 *
 * TODO: customize this option if more images sizes are needed
 */

add_image_size('give_me_a_name', 200, 200, true);

/**
 * Reorder the admin menu

 * @package Theme Admin Supports
 * @category Dashboard Modifications
 * @version 1.0
 *
 * TODO: customize admin menu order, include custom post types
 */
function wpstarter_menu_order()
{
    return array(
        'index.php',
        'edit.php?post_type=page',
        'edit.php',
        'edit.php?post_type=custom_post_type_1',
        'edit.php?post_type=custom_post_type_2',
    );
}
add_filter('custom_menu_order', '__return_true');
add_filter('menu_order', 'wpstarter_menu_order');
