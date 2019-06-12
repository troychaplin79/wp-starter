<?php
/**
 * This registers a custom post type and associated taxonomies for sponsors
 *
 * @package PSEWEB Post Type
 * @category Post Types and Taxonomies
 * @version 1.0
 * @author webservices
 */

class PSEWEB_Page_Type {

	public function __construct() {

		// Register the taxonomies
		add_action( 'init', array( &$this, 'register_taxonomies' ), 0 );
	}

	// Register the taxonomies (accommodates for more than 1 taxonomy)
	public function register_taxonomies() {
		$this->register_taxonomy_page_type();
	}

	// Register the name taxonomy
	public function register_taxonomy_page_type() {
		$labels  = array(
			'name'                       => 'Page Categories',
			'singular_name'              => 'Page Category',
			'menu_name'                  => 'Page Categories',
			'all_items'                  => 'All Page Categories',
			'parent_item'                => 'Parent Page Category',
			'parent_item_colon'          => 'Parent Page Category:',
			'new_item_name'              => 'New Page Category Name',
			'add_new_item'               => 'Add New Page Category',
			'edit_item'                  => 'Edit Page Category',
			'update_item'                => 'Update Page Category',
			'view_item'                  => 'View Page Category',
			'separate_items_with_commas' => 'Separate page categories with commas',
			'add_or_remove_items'        => 'Add or remove page categories',
			'choose_from_most_used'      => 'Choose from the most used',
			'popular_items'              => 'Popular page categories',
			'search_items'               => 'Search Page Category',
			'not_found'                  => 'Not Found',
			'no_terms'                   => 'No sponsor level',
			'items_list'                 => 'Page category list',
			'items_list_navigation'      => 'Page category list navigation',
		);
		$rewrite = array(
			'slug'         => 'page-type',
			'with_front'   => true,
			'hierarchical' => false,
		);
		$args    = array(
			'labels'            => $labels,
			'hierarchical'      => true,
			'public'            => true,
			'show_ui'           => true,
			'show_admin_column' => true,
			'show_in_nav_menus' => false,
			'show_tagcloud'     => true,
			'rewrite'           => $rewrite,
			'show_in_rest'      => true,
		);
		register_taxonomy( 'page-type', array( 'page' ), $args );
	}
}

$pseweb_page_type = new PSEWEB_Page_Type();
