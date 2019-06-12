<?php
/**
 * Set loadmore arg and component
 * =============
 *
 * @since Theme Functions
 * @package Scripts and Styles
 * @version 2.0
 */

function load_posts_by_ajax() {
	// @todo: nonce verification
	$json_data = [];

	$loadmore_main_args = array(
		'post_type'      => sanitize_text_field( $_REQUEST['post_type'] ),
		'posts_per_page' => sanitize_text_field( $_REQUEST['posts_per_page'] ),
		'current'        => sanitize_text_field( $_REQUEST['page'] ),
		'post_status'    => sanitize_text_field( 'publish' ),
		'offset'         => sanitize_text_field( $_REQUEST['page'] * $_REQUEST['posts_per_page'] ),
		'order'          => sanitize_text_field( $_REQUEST['order'] ),
		'orderby'        => sanitize_text_field( $_REQUEST['orderby'] ),
	);

	// Clean registered post type name
	$clean_post_type_name = str_replace( 'pse-', '', $loadmore_main_args['post_type'] );

	// Add args for tax_query
	$loadmore_secondary_args = array();
	if ( 'undefined' !== $_REQUEST['taxonomy'] && ! empty( $_REQUEST['taxonomy'] ) ) {
		$loadmore_secondary_args = array(
			'tax_query' => array(
				array(
					'taxonomy' => sanitize_text_field( $_REQUEST['taxonomy'] ),
					'terms'    => sanitize_text_field( $_REQUEST['terms'] ),
					'field'    => sanitize_text_field( $_REQUEST['field'] ),
				),
			),
		);
	}

	// The Query
	$loadmore_query_args = array_merge( $loadmore_main_args, $loadmore_secondary_args );
	$loadmore_query      = new WP_Query( $loadmore_query_args );

	if ( $loadmore_query->have_posts() ) {

		// Set defaul component for new, shared with posts
		if ( 'news' === $clean_post_type_name ) {
			$clean_post_type_name = 'post';
		}

		// Set final component path
		$component_path = "/components/listings/$clean_post_type_name";

		while ( $loadmore_query->have_posts() ) {
			$loadmore_query->the_post();
			require get_template_directory() . $component_path . '.php';
		}
		wp_reset_postdata();
	}

	die();
}
add_action( 'wp_ajax_load_posts_by_ajax', 'load_posts_by_ajax' );
add_action( 'wp_ajax_nopriv_load_posts_by_ajax', 'load_posts_by_ajax' );
