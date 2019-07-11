<?php
/**
 * Add editor stylesheet

 * @package Theme Admin Supports
 * @category Admin Enqueues
 * @version 1.0
 */
add_theme_support( 'editor-styles' );
add_editor_style( 'dist/admin/editor.css' );

/**
 * Enqueue admin scripts and styles

 * @package Theme Admin Supports
 * @category Admin Enqueues
 * @version 1.0
 */
function wpstarter_admin_enqueue() {
	wp_enqueue_style( 'admin-css', get_template_directory_uri() . '/dist/admin/css/admin.css', false, THEME_VERSION, 'screen' );

	// TODO: if scripts are being added to admin
	// wp_enqueue_script( 'admin-js', get_template_directory_uri() . '/dist/admin/js/admin.js', array( 'jquery' ), THEME_VERSION, true );
}
add_action( 'admin_enqueue_scripts', 'wpstarter_admin_enqueue' );

/**
 * Set default posts per page
 *
 * @package Theme Admin Supports
 * @category Update Options
 * @version 1.0
 */
update_option( 'posts_per_page', 12 );

/**
 * Set default media sizes
 *
 * @package Theme Admin Supports
 * @category Update Options
 * @version 1.0
 */
update_option( 'thumbnail_size_w', 250 );
update_option( 'thumbnail_size_h', 0 );
update_option( 'medium_size_w', 400 );
update_option( 'medium_size_h', 0 );
update_option( 'large_size_w', 1024 );
update_option( 'large_size_h', 0 );
