<?php
if (have_posts()) :
    while (have_posts()) :
        the_post();

        // Vars shared in all base templates
        $current_id      = get_the_ID();
        $get_post_type   = get_post_type($current_id);
        $clean_post_type = str_replace('prefix-', '', $get_post_type); // TODO: update post type prefix
        $template_name   = sanitize_title($clean_post_type);

        require_once get_template_directory() . '/header.php';
        require_once get_template_directory() . '/blocks/banner/' . $template_name . '.php';
        require_once get_template_directory() . '/templates/single/' . $template_name . '.php';
        require_once get_template_directory() . '/footer.php';
    endwhile;
endif;

wp_reset_postdata();

// Load page information in dev
if ('DEV' === getenv('ENV_SERVER_ENV')) {
    get_page_info();
}
