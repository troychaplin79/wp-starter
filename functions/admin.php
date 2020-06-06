<?php
/**
 * Add editor stylesheet
 */

add_theme_support('editor-styles');
add_editor_style('dist/admin/editor.css');

/**
 * Register theme specific image sizes
 *
 * @package Theme Admin Supports
 * @category Update Options
 * @version 1.0
 *
 * TODO: customize this option if more images sizes are needed
 */

// add_image_size('give_me_a_name', 200, 200, true);

/**
 * Reorder the admin menu

 * @package Theme Admin Supports
 * @category Dashboard Modifications
 * @version 1.0
 *
 * TODO: customize admin menu order, include custom post types
 */

function wpstarterMenuOrder()
{
    return array(
        'index.php',
        'edit.php?post_type=page',
        'edit.php',
        // 'edit.php?post_type=custom_post_type_1',
        // 'edit.php?post_type=custom_post_type_2',
    );
}
// add_filter('custom_menu_order', '__return_true');
// add_filter('menu_order', 'wpstarterMenuOrder');
