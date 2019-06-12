<?php
/**
 * This registers a custom post type and associated taxonomies for sessions
 *
 * @package PSEWEB Post Type
 * @category Post Types and Taxonomies
 * @version 1.0
 * @author webservices
 */

class PSEWEB_Homepage {

	public function __construct() {

		// Register the post type
		add_action( 'init', array( &$this, 'register_post_type' ), 10 );

		// Include Options Page
		if ( function_exists( 'acf_add_options_page' ) ) {
			$this->post_type_theme_options();
		}
	}

	// Include Options Page
	private function post_type_theme_options() {
		acf_add_options_page(
			array(
				'page_title' => 'Homepage Options',
				'menu_title' => 'Homepage Options',
				'menu_slug'  => 'Homepage-options',
				'capability' => 'edit_posts',
				'parent'     => 'edit.php?post_type=pse-homepage',
				'post_id'    => 'pse_homepage_options',
			)
		);
	}

	// Register the post type
	public function register_post_type() {
		$labels  = array(
			'name'                  => 'Homepage',
			'singular_name'         => 'Homepage',
			'menu_name'             => 'Homepage',
			'name_admin_bar'        => 'Homepage',
			'archives'              => 'Homepage Archives',
			'attributes'            => 'Homepage Attributes',
			'parent_item_colon'     => 'Homepage Person:',
			'all_items'             => 'All Homepage',
			'add_new_item'          => 'Add New Homepage',
			'add_new'               => 'Add New',
			'new_item'              => 'New Homepage',
			'edit_item'             => 'Edit Homepage',
			'update_item'           => 'Update Homepage',
			'view_item'             => 'View Homepage',
			'view_items'            => 'View Homepage',
			'search_items'          => 'Search Homepage',
			'not_found'             => 'Not found',
			'not_found_in_trash'    => 'Not found in Trash',
			'featured_image'        => 'Featured Image',
			'set_featured_image'    => 'Set featured image',
			'remove_featured_image' => 'Remove featured image',
			'use_featured_image'    => 'Use as featured image',
			'insert_into_item'      => 'Insert into homepage',
			'uploaded_to_this_item' => 'Uploaded to this homepage',
			'items_list'            => 'Homepage list',
			'items_list_navigation' => 'Homepage list navigation',
			'filter_items_list'     => 'Filter homepage list',
		);
		$rewrite = array(
			'slug'       => 'homepage',
			'with_front' => true,
			'pages'      => false,
			'feeds'      => false,
		);
		$args    = array(
			'label'               => 'Homepage',
			'description'         => 'Homepage',
			'labels'              => $labels,
			'supports'            => array( 'title', 'editor' ),
			'hierarchical'        => false,
			'public'              => true,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'menu_position'       => 5,
			'menu_icon'           => 'dashicons-admin-home',
			'show_in_admin_bar'   => true,
			'show_in_nav_menus'   => false,
			'can_export'          => true,
			'has_archive'         => false,
			'exclude_from_search' => false,
			'publicly_queryable'  => true,
			'rewrite'             => $rewrite,
			'capability_type'     => 'page',
			'show_in_rest'        => true,
		);
		register_post_type( 'pse-homepage', $args );
	}
}

$pseweb_homepage = new PSEWEB_Homepage();
