<?php
/**
 * WordPress Taxonomy Template
 *
 * @category Core Template
 * @version 1.0
 * @see https://codex.wordpress.org/Post_Type_Templates
 */
// Get taxonomy meta
$get_queried_object = get_queried_object();
$current_tax_name   = $get_queried_object->taxonomy;
$current_term_name  = $get_queried_object->name;
$current_term_slug  = $get_queried_object->slug;
$get_current_tax    = get_taxonomy($current_tax_name);

// Core template vars
$current_id      = $get_queried_object->term_id;
$get_post_type   = $get_current_tax->object_type[0];
$clean_post_type = str_replace('prefix-', '', $get_post_type); // TODO: update post type prefix
$template_name   = $current_tax_name;

require_once get_template_directory() . '/header.php';
require_once get_template_directory() . '/blocks/banner/' . $current_tax_name . '.php';
require_once get_template_directory() . '/templates/taxonomy/' . $current_tax_name . '.php';
require_once get_template_directory() . '/footer.php';

// Load page information in dev
if ('DEV' === getenv('ENV_SERVER_ENV')) {
    get_page_info();
}
