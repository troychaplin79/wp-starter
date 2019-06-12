<?php
/**
 * This registers a custom post type and associated taxonomies for GIVEMEANAME
 *
 * @package PSEWEB Post Type
 * @category Post Types and Taxonomies
 * @version 1.0
 * @author webservices
 */

class PSEWEB_RENAME {

	public function __construct() {

		// Register the post type
		add_action( 'init', array( &$this, 'register_post_type' ), 10 );

		// Register the taxonomies
		add_action( 'init', array( &$this, 'register_taxonomies' ), 0 );

		// Add ACF Groups
		add_action( 'init', array( &$this, 'post_type_options' ) );

		// Include Options Page
		// TODO: inlude this when `post_type_theme_options` has been configured
		// if ( function_exists( 'acf_add_options_page' ) ) {
		// 	$this->post_type_theme_options();
		// }
	}

	// Register the post type
	public function register_post_type() {
		//
	}

	// Register the taxonomies (accommodates for more than 1 taxonomy)
	public function register_taxonomies() {
		$this->register_taxonomy_GIVENAME();
	}

	// Register the name taxonomy
	public function register_taxonomy_GIVENAME() {
		//
	}

	// Add ACF Groups
	// TODO: rename the included acf files
	public function post_type_options() {
		require_once 'options/options.php';
	}

	// Include Options Page
	private function post_type_theme_options() {
		acf_add_options_page(
			array(
				'page_title' => 'GIVENAME Options',
				'menu_title' => 'GIVENAME Options',
				'menu_slug'  => 'GIVENAME-options',
				'capability' => 'edit_posts',
				'parent'     => 'edit.php?post_type=cu-posttypename',
				'post_id'    => 'cu_posttypename_options',
			)
		);
	}
}

$pseweb_rename = new PSEWEB_RENAME();
