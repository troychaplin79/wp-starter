<?php
/**
 * WordPress Page Template
 *
 * @see https://developer.wordpress.org/themes/template-files-section/page-template-files/
 */

if (have_posts()) :
    while (have_posts()) :
        the_post();
        
        // Core template vars
        $current_id      = get_the_ID();
        $get_post_type   = get_post_type($current_id);
        $clean_post_type = str_replace('prefix-', '', $get_post_type);
        $template_name   = sanitize_title($clean_post_type);

        include_once get_template_directory() . '/header.php';
        include_once get_template_directory() . '/blocks/banner/' . $template_name . '.php';

        echo '<main>';
            echo '<h1>' . get_the_title() . '</h1>';
            the_content();
        echo '</main>';

        include_once get_template_directory() . '/footer.php';
    endwhile;
endif;

wp_reset_postdata();
