<?php
/**
 * WordPress Page Template
 *
 * @category Core Template
 * @version 1.0
 * @see https://developer.wordpress.org/themes/template-files-section/page-template-files/
 */
if (have_posts()) :
    while (have_posts()) :
        the_post();
        
        // Core template vars
        $current_id      = get_the_ID();
        $get_post_type   = get_post_type($current_id);
        $clean_post_type = str_replace('prefix-', '', $get_post_type); // TODO: document this option
        $template_name   = sanitize_title($clean_post_type);

        require_once get_template_directory() . '/header.php';
        require_once get_template_directory() . '/blocks/banner/' . $template_name . '.php';
        
        echo '<main class="l-singlecol">';
            echo '<div class="u-block u-block--grey">';
                echo '<h1>Block as first</h1>';
            echo '</div>';
            echo '<div class="u-block u-block--grey u-block--l">';
                echo '<h1>Block as first</h1>';
            echo '</div>';

            echo '<div class="u-block u-block--l">';
                echo '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum aliquam odio ut tortor varius luctus. Suspendisse eu libero sodales, mollis justo id, dapibus ligula. Pellentesque fermentum ut augue vel volutpat. In a egestas justo. In hac habitasse platea dictumst. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Aliquam facilisis tellus in neque viverra, eu tristique tellus rutrum. Mauris ut risus eu ante lacinia dictum ac sed leo.</p>';
            echo '</div>';
            echo '<div class="u-block">';
                echo '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum aliquam odio ut tortor varius luctus. Suspendisse eu libero sodales, mollis justo id, dapibus ligula. Pellentesque fermentum ut augue vel volutpat. In a egestas justo. In hac habitasse platea dictumst. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Aliquam facilisis tellus in neque viverra, eu tristique tellus rutrum. Mauris ut risus eu ante lacinia dictum ac sed leo.</p>';
            echo '</div>';

            echo '<div class="u-block u-block--grey">';
                echo '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum aliquam odio ut tortor varius luctus. Suspendisse eu libero sodales, mollis justo id, dapibus ligula. Pellentesque fermentum ut augue vel volutpat. In a egestas justo. In hac habitasse platea dictumst. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Aliquam facilisis tellus in neque viverra, eu tristique tellus rutrum. Mauris ut risus eu ante lacinia dictum ac sed leo.</p>';
            echo '</div>';
            
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
