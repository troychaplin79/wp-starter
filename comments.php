<?php
/**
 * Single post comment template
 *
 * @category Core Template
 * @version 1.0
 * @see https://developer.wordpress.org/themes/template-files-section/partial-and-miscellaneous-template-files/comment-template/
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
