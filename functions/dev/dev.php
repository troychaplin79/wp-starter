<?php
function get_page_info()
{

    global $current_id, $get_post_type, $template_name, $current_tax_name, $current_term_slug;

    $meta = '<div class="u-block u-block--white"><div>';

    // Theme meta
    $get_current_theme     = wp_get_theme();
    $current_theme_name    = $get_current_theme->get('Name');
    $current_theme_version = $get_current_theme->get('Version');
    $current_theme_dir  = $get_current_theme->template;

    $meta .= '<h3>Theme Meta</h3>';
    $meta .= '<ul>';
    $meta .= '<li>Active theme: ' . $current_theme_name . '</li>';
    $meta .= '<li>Theme version: ' . $current_theme_version . '</li>';
    $meta .= '</ul>';

    $meta .= '<h3>Page Information</h3>';
    $meta .= '<ul>';

    // home / page
    if (is_home() || is_page()) {
        $meta .= '<li>Current ID: ' . $current_id . '</li>';
        $meta .= '<li>Active post type: ' . $get_post_type . '</li>';
        $meta .= '<li>Core file loaded: ' . $current_theme_dir . '/home.php</li>';
    }

    // tax
    if (is_category() || is_tax()) {
        $meta .= '<li>Term ID: ' . $current_id . '</li>';
        $meta .= '<li>Core file loaded: ' . $current_theme_dir . '/taxonomy.php</li>';
        $meta .= '<li>Current taxonomy slug: ' . $current_tax_name . '</li>';
        $meta .= '<li>Current term slug: ' . $current_term_slug . '</li>';
        $meta .= '<li>Associated post type: ' . $get_post_type . '</li>';
        $meta .= '<li>Included template: ' . $current_theme_dir . '/templates/taxonomy/' . $template_name . '.php</li>';
    }

    $meta .= '</ul>';
    $meta .= '</div></div>';

    echo $meta;
}
