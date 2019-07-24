<?php
function get_page_info()
{

    global $current_id, $get_post_type, $template_name, $current_tax_name, $current_term_slug;

    $output = '<div class="u-block u-block--white"><div>';
    $output .= '<h2>Page Information</h2>';
    $output .= '<ul>';

    

    // home / page
    if (is_home() || is_page()) {
        $output .= '<li>Current ID: ' . $current_id . '</li>';
        $output .= '<li>Active Post Type: ' . $get_post_type . '</li>';
        $output .= '<li>Core File Loaded: ' . dirname(__FILE__) . '/home.php</li>';
    }

    // tax
    if (is_category() || is_tax()) {
        $output .= '<li>Term ID: ' . $current_id . '</li>';
        $output .= '<li>Core File Loaded: ' . dirname(__FILE__) . '/taxonomy.php</li>';

        $output .= '<br>';

        $output .= '<li>Associated Post Type: ' . $get_post_type . '</li>';

        $output .= '<br>';

        $output .= '<li>Current taxonomy slug is ' . $current_tax_name . '</li>';
        $output .= '<li>Current term slug is ' . $current_term_slug . '</li>';
        $output .= '<li>Current post type being loaded is ' . $get_post_type . '</li>';
        $output .= '<li>Additional file being included: ' . dirname(__FILE__) . '/' . $template_name . '.php</li>';
    }

    $output .= '</ul>';
    $output .= '</div></div>';

    echo $output;
}
// add_action('wp_head', 'get_page_info');
