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
 * TODO: add admin resources to webpack builder
 * TODO: document this option
 */
function wpstarter_admin_enqueue()
{
    $theme_admin_support_path = get_template_directory_uri() . '/dist/admin';

    wp_enqueue_style('admin-css', $theme_admin_support_path . '/css/admin.css', false, THEME_VERSION, 'screen');
    // wp_enqueue_script('admin-js', $theme_admin_support_path . '/js/admin.js', array( 'jquery' ), THEME_VERSION, true);
}
add_action('admin_enqueue_scripts', 'wpstarter_admin_enqueue');
