<?php
/**
 * This registers a custom post type and associated taxonomies for news
 *
 * @package PSEWEB Post Type
 * @category Post Types and Taxonomies
 * @version 1.0
 * @author webservices
 */

class PSEWEB_News {

	public function __construct() {

		// Register the post type
		add_action( 'init', array( &$this, 'register_post_type' ), 10 );

		// Register the taxonomies
		add_action( 'init', array( &$this, 'register_taxonomies' ), 0 );
	}

	// Register the post type
	public function register_post_type() {
		$labels  = array(
			'name'                  => 'News',
			'singular_name'         => 'News',
			'menu_name'             => 'News',
			'name_admin_bar'        => 'News',
			'archives'              => 'News Archives',
			'attributes'            => 'News Attributes',
			'parent_item_colon'     => 'News Person:',
			'all_items'             => 'All News',
			'add_new_item'          => 'Add New News',
			'add_new'               => 'Add New',
			'new_item'              => 'New News',
			'edit_item'             => 'Edit News',
			'update_item'           => 'Update News',
			'view_item'             => 'View News',
			'view_items'            => 'View News',
			'search_items'          => 'Search News',
			'not_found'             => 'Not found',
			'not_found_in_trash'    => 'Not found in Trash',
			'featured_image'        => 'Featured Image',
			'set_featured_image'    => 'Set featured image',
			'remove_featured_image' => 'Remove featured image',
			'use_featured_image'    => 'Use as featured image',
			'insert_into_item'      => 'Insert into news',
			'uploaded_to_this_item' => 'Uploaded to this news',
			'items_list'            => 'News list',
			'items_list_navigation' => 'News list navigation',
			'filter_items_list'     => 'Filter news list',
		);
		$rewrite = array(
			'slug'       => 'news',
			'with_front' => true,
			'pages'      => false,
			'feeds'      => false,
		);
		$args    = array(
			'label'               => 'News',
			'description'         => 'Past and Present News',
			'labels'              => $labels,
			'supports'            => array( 'title', 'editor', 'excerpt' ),
			'taxonomies'          => array( 'news-categories' ),
			'hierarchical'        => false,
			'public'              => true,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'menu_position'       => 5,
			'menu_icon'           => 'dashicons-media-document',
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
		register_post_type( 'pse-news', $args );
	}

	// Register the taxonomies (accommodates for more than 1 taxonomy)
	public function register_taxonomies() {
		$this->register_taxonomy_news_categories();
	}

	// Register the name taxonomy
	public function register_taxonomy_news_categories() {
		$labels  = array(
			'name'                       => 'News Categories',
			'singular_name'              => 'News Category',
			'menu_name'                  => 'News Categories',
			'all_items'                  => 'All News Categories',
			'parent_item'                => 'Parent News Category',
			'parent_item_colon'          => 'Parent News Category:',
			'new_item_name'              => 'New News Category Name',
			'add_new_item'               => 'Add New News Category',
			'edit_item'                  => 'Edit News Category',
			'update_item'                => 'Update News Category',
			'view_item'                  => 'View News Category',
			'separate_items_with_commas' => 'Separate news category with commas',
			'add_or_remove_items'        => 'Add or remove news categories',
			'choose_from_most_used'      => 'Choose from the most used',
			'popular_items'              => 'Popular news categories',
			'search_items'               => 'Search News Category',
			'not_found'                  => 'Not Found',
			'no_terms'                   => 'No news category',
			'items_list'                 => 'News category list',
			'items_list_navigation'      => 'News category list navigation',
		);
		$rewrite = array(
			'slug'         => 'news-category',
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
		register_taxonomy( 'news-categories', array( 'pse-news' ), $args );
	}
}

$pseweb_news = new PSEWEB_News();
