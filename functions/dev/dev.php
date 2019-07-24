<?php
function get_page_info()
{

    global $current_id, $get_post_type, $template_name, $current_tax_name, $current_term_slug;

    $output = '<div class="u-block u-block--white"><div>';

    // Theme meta
    $get_current_theme     = wp_get_theme();
    $current_theme_name    = $get_current_theme->get('Name');
    $current_theme_version = $get_current_theme->get('Version');
    $current_theme_dir  = $get_current_theme->template;

    $output .= '<h3>Theme Meta</h3>';
    $output .= '<ul>';
    $output .= '<li>Active theme: ' . $current_theme_name . '</li>';
    $output .= '<li>Theme version: ' . $current_theme_version . '</li>';
    $output .= '</ul>';

    $output .= '<h3>Page Information</h3>';
    $output .= '<ul>';

    // home / page
    if (is_home() || is_page()) {
        $output .= '<li>Current ID: ' . $current_id . '</li>';
        $output .= '<li>Active post type: ' . $get_post_type . '</li>';
        $output .= '<li>Core file loaded: ' . $current_theme_dir . '/home.php</li>';
    }

    // tax
    if (is_category() || is_tax()) {
        $output .= '<li>Term ID: ' . $current_id . '</li>';
        $output .= '<li>Core file loaded: ' . $current_theme_dir . '/taxonomy.php</li>';
        $output .= '<li>Current taxonomy slug: ' . $current_tax_name . '</li>';
        $output .= '<li>Current term slug: ' . $current_term_slug . '</li>';
        $output .= '<li>Associated post type: ' . $get_post_type . '</li>';
        $output .= '<li>Template include: ' . $current_theme_dir . '/templates/taxonomy/' . $template_name . '.php</li>';
    }

    $output .= '</ul>';
    $output .= '</div></div>';

    echo $output;
}
