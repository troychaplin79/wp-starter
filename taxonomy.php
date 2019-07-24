<?php
// Get taxonomy meta
$get_queried_object = get_queried_object();
$current_tax_name   = $get_queried_object->taxonomy;
$current_term_name  = $get_queried_object->name;
$current_term_slug  = $get_queried_object->slug;
$get_current_tax    = get_taxonomy($current_tax_name);

// Vars shared in all base templates
$current_id    = $get_queried_object->term_id;
$get_post_type = $get_current_tax->object_type[0];
$template_name = $current_tax_name;

require_once get_template_directory() . '/header.php';
// require_once get_template_directory() . '/blocks/banner/taxonomy.php';
// require_once get_template_directory() . '/templates/taxonomy/' . $current_tax_name . '.php';
require_once get_template_directory() . '/footer.php';

// Load page information in dev
if ('DEV' === getenv('ENV_SERVER_ENV')) {
    get_page_info();
    require_once get_template_directory() . '/templates/_examples/grid.php'; // TODO: remove, example only
}
