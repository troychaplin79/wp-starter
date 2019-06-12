<?php
/**
 * Add custom block categories
 * =============
 *
 * @package Theme Functions
 * @category ACF + Gutenberg
 * @version 1.0
 * @see https://loomo.ca/gutenberg-creating-custom-block-categories/
 */

function pse_block_category( $categories, $post ) {
	return array_merge(
		$categories,
		array(
			array(
				'slug'  => 'content-blocks',
				'title' => __( 'Content Blocks', 'content-blocks' ),
			),
		)
	);
}
add_filter( 'block_categories', 'pse_block_category', 10, 2 );


/**
 * Disable all default gutenberg blocks
 * =============
 *
 * @package Shared Libraries
 * @category ACF Gutenberg
 * @version 1.0
 * @see other uses for this function: https://rudrastyh.com/gutenberg/remove-default-blocks.html
 * @see a list of core blocks: https://wpdevelopment.courses/a-list-of-all-default-gutenberg-blocks-in-wordpress-5-0/
 */

function pseweb_allowed_block_types( $allowed_blocks, $post ) {

	// add all acf/blocks here, restrict to post types in acf_register_block functions
	$allowed_blocks = array(
		'acf/text-content',
	);

	return $allowed_blocks;
}
add_filter( 'allowed_block_types', 'pseweb_allowed_block_types', 10, 2 );


/**
 * Register the Blocks
 * =============
 *
 * @package Theme Includes
 * @category ACF + Gutenberg
 * @version 1.0
 * @author troychaplin
 * @see https://www.advancedcustomfields.com/resources/acf_register_block/
 */

function pseweb_register_acf_blocks() {

	// check function exists
	if ( function_exists( 'acf_register_block' ) ) {

		// Register a text content block
		acf_register_block(
			array(
				'name'            => 'text-content',
				'title'           => 'Text Content',
				'description'     => 'A custom content block.',
				'category'        => 'content-blocks',
				'icon'            => 'text',
				'mode'            => 'auto',
				'keywords'        => array( 'content', 'text' ),
				'post_types'      => array( 'page', 'post', 'pse-homepage', 'pse-news', 'pse-sessions', 'pse-sponsors' ),
				'render_template' => 'blocks/content/content.php',
			)
		);
	}
}
add_action( 'acf/init', 'pseweb_register_acf_blocks' );


/**
 * Disable gutenberg front end styles
 * =============
 *
 * @package Theme Functions
 * @category ACF + Gutenberg
 * @version 1.0
 */

// TODO: wrap in acf option

function pseweb_deregister_styles() {
	wp_dequeue_style( 'wp-block-library' );
}
add_action( 'wp_print_styles', 'pseweb_deregister_styles', 100 );
