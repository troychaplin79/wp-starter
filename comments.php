<?php
/**
 * Single post comment template
 *
 * @package Theme Templates
 * @category Core Template
 * @version 1.0
 * @see https://www.gavsblog.com/blog/adding-comments-to-a-wordpress-theme-template
 */
if (have_comments()) :
    echo '<ol class="c-comments">';
        wp_list_comments(
            array(
                'style'      => 'ol',
                'short_ping' => true,
            )
        );
    echo '</ol>';
endif;
