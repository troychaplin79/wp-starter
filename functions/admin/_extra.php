<?php
/**
 * Reorder the admin menu

 * @package Theme Admin Supports
 * @category Dashboard Modifications
 * @version 1.0
 */
function wpstarter_menu_order() {
	return array(
		'index.php',
		'edit.php?post_type=page',
		'edit.php',
		'edit.php?post_type=custom_post_type',
		'edit.php?post_type=custom_post_type',
	);
}
add_filter( 'custom_menu_order', '__return_true' );
add_filter( 'menu_order', 'wpstarter_menu_order' );
