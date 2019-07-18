<?php
if ( have_posts() ) :
	while ( have_posts() ) :
		the_post();

		$current_id      = get_the_ID(); // get current post id
		$get_post_type   = get_post_type( $current_id ); // get current post type from post id
		$clean_post_type = str_replace( 'prefix-', '', $get_post_type ); // remove prefix from registered post type name (if prefix exists)
		$template_name   = sanitize_title( $clean_post_type ); // sanitize cleaned post type name

		require_once get_template_directory() . '/header.php';
		// require_once get_template_directory() . '/blocks/banner/' . $template_name . '.php';
		// require_once get_template_directory() . '/templates/single/' . $template_name . '.php';
		require_once get_template_directory() . '/footer.php';

	endwhile;
endif;

wp_reset_postdata();

// TODO: remove everything between these todos
if ( 'DEV' === getenv( 'ENV_SERVER_ENV' ) ) {
	echo '<div class="u-block u-block--white" style="overflow: hidden;"><div>';
		print_r( '<br><br>The current post id is ' . $current_id . ' and the current post type is ' . $get_post_type ); // @codingStandardsIgnoreLine
		print_r( '<br><br>You are currently loading core template file: ' . esc_url( get_template_directory() ) . '/single.php' ); // @codingStandardsIgnoreLine
		print_r( '<br><br>Content type template being included is: /assets/templates/single/' . $template_name . '.php' ); // @codingStandardsIgnoreLine
	echo '</div></div>';
}
