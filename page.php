<?php
/**
 * WordPress Page Template
 *
 * @package Theme Templates
 * @category Core Template
 * @version 1.0
 */
if (have_posts()) :
    while (have_posts()) :
        the_post();
        
        // Vars shared in all base templates
        $current_id      = get_the_ID();
        $get_post_type   = get_post_type($current_id);
        $clean_post_type = str_replace('prefix-', '', $get_post_type); // TODO: document this option
        $template_name   = sanitize_title($clean_post_type);

        require_once get_template_directory() . '/header.php';
        require_once get_template_directory() . '/blocks/banner/' . $template_name . '.php';
        
        // Create main element and get the page content
        echo '<main>';
            the_content();
        echo '</main>';

        require_once get_template_directory() . '/footer.php';
    endwhile;
endif;

wp_reset_postdata();

// Load page information in dev
if ('DEV' === getenv('ENV_SERVER_ENV')) {
    get_page_info();
    require_once get_template_directory() . '/templates/_examples/grid.php';
}
