<?php
$get_queried_object = get_queried_object();
$current_tax_name   = $get_queried_object->taxonomy;
$current_term_name  = $get_queried_object->name;
$current_term_slug  = $get_queried_object->slug;
$get_current_tax    = get_taxonomy($current_tax_name);
$template_name      = $current_tax_name;

require_once get_template_directory() . '/header.php';
// require_once get_template_directory() . '/blocks/banner/taxonomy.php';
// require_once get_template_directory() . '/templates/taxonomy/' . $current_tax_name . '.php';
require_once get_template_directory() . '/templates/_examples/grid.php'; // TODO: remove, example only
require_once get_template_directory() . '/footer.php';

// TODO: remove everything between these todos
if ('DEV' === getenv('ENV_SERVER_ENV')) {
    echo '<div class="u-block u-block--white" style="overflow: hidden;"><div>';
    echo '<p>These var_dumps exist in <code>' . esc_url(get_template_directory()) . '/taxonomy.php</code> and are intended to provide key template info on proejct startup</p>';
	var_dump( 'Current Tax Slug: ' . $current_tax_name ); // @codingStandardsIgnoreLine
	var_dump( 'Current Term Slug: ' . $current_term_slug ); // @codingStandardsIgnoreLine
	var_dump( 'Attached Post Type: ' . $get_current_tax->object_type[0] ); // @codingStandardsIgnoreLine
	var_dump( 'Template Path: /assets/templates/taxonomy/' . $current_tax_name . '.php' ); // @codingStandardsIgnoreLine
    echo '</div></div>';
}

// TODO: remove everything between these todos
if ('DEV' === getenv('ENV_SERVER_ENV')) {
    echo '<div class="u-block u-block--white"><div>';
        echo '<h2>Page Information</h2>';
        echo '<ul>';
        echo '<li>Current taxonomy slug is ' . $current_tax_name . '</li>';
        echo '<li>Current term slug is ' . $current_term_slug . '</li>';
        echo '<li>Current post type being loaded is ' . $get_current_tax->object_type[0] . '</li>';
        echo '<li>Additional file being included: ' . dirname(__FILE__) . '/' . $template_name . '.php</li>';
        echo '</ul>';
    echo '</div></div>';
}
