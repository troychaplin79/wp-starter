<?php
/**
 * WordPress Single Post Template
 *
 * @category Core Template
 * @version 1.0
 * @see https://codex.wordpress.org/Theme_Development#Single_Post_.28single.php.29
 */
if (have_posts()) :
    while (have_posts()) :
        the_post();

        // Core template vars
        $current_id      = get_the_ID();
        $get_post_type   = get_post_type($current_id);
        $clean_post_type = str_replace('prefix-', '', $get_post_type);
        $template_name   = sanitize_title($clean_post_type);

        require_once get_template_directory() . '/header.php';
        require_once get_template_directory() . '/blocks/banner/' . $template_name . '.php';
        require_once get_template_directory() . '/templates/single/' . $template_name . '.php';
        require_once get_template_directory() . '/footer.php';
    endwhile;
endif;

wp_reset_postdata();
