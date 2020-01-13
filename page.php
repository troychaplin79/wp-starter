<?php // @codingStandardsIgnoreLine
/**
 * WordPress Page Template
 *
 * @category Core Template
 *
 * @version 1.0
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

        require_once get_template_directory() . '/header.php';
        require_once get_template_directory() . '/blocks/banner/' . $template_name . '.php';
        
        echo '<main>';
            echo '<h1>' . get_the_title() . '</h1>'; // TODO temporary, can be removed

            echo '<div class="u-block u-block--grey">';
            echo '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum aliquam odio ut tortor varius luctus. Suspendisse eu libero sodales, mollis justo id, dapibus ligula. Pellentesque fermentum ut augue vel volutpat. In a egestas justo. In hac habitasse platea dictumst. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Aliquam facilisis tellus in neque viverra, eu tristique tellus rutrum. Mauris ut risus eu ante lacinia dictum ac sed leo.</p>';
            echo '</div>';

            echo '<div class="u-block u-block--grey">';
            echo '<h1>Title Test</h1>';
            echo '<h2>Title Test</h2>';
            echo '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum aliquam odio ut tortor varius luctus. Suspendisse eu libero sodales, mollis justo id, dapibus ligula. Pellentesque fermentum ut augue vel volutpat. In a egestas justo. In hac habitasse platea dictumst. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Aliquam facilisis tellus in neque viverra, eu tristique tellus rutrum. Mauris ut risus eu ante lacinia dictum ac sed leo.</p>';
            echo '</div>';

            echo '<div class="u-block">';
            echo '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum aliquam odio ut tortor varius luctus. Suspendisse eu libero sodales, mollis justo id, dapibus ligula. Pellentesque fermentum ut augue vel volutpat. In a egestas justo. In hac habitasse platea dictumst. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Aliquam facilisis tellus in neque viverra, eu tristique tellus rutrum. Mauris ut risus eu ante lacinia dictum ac sed leo.</p>';
            echo '</div>';

            echo '<div class="u-block">';
            echo '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum aliquam odio ut tortor varius luctus. Suspendisse eu libero sodales, mollis justo id, dapibus ligula. Pellentesque fermentum ut augue vel volutpat. In a egestas justo. In hac habitasse platea dictumst. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Aliquam facilisis tellus in neque viverra, eu tristique tellus rutrum. Mauris ut risus eu ante lacinia dictum ac sed leo.</p>';
            echo '</div>';

            the_content();
        echo '</main>';

        require_once get_template_directory() . '/footer.php';
    endwhile;
endif;

wp_reset_postdata();
