<?php
/**
 * Disable gutenberg front end styles
 *
 * @package Theme ACF Supports
 * @category ACF + Gutenberg
 * @version 1.0
 */
function dequeue_gutenberg_library()
{
    wp_dequeue_style('wp-block-library');
}
add_action('wp_print_styles', 'dequeue_gutenberg_library', 100);

/**
 * Disable all default gutenberg blocks
 *
 * @package Theme ACF Supports
 * @category ACF + Gutenberg
 * @version 1.0
 * @see other uses for this function: https://rudrastyh.com/gutenberg/remove-default-blocks.html
 * @see a list of core blocks: https://wpdevelopment.courses/a-list-of-all-default-gutenberg-blocks-in-wordpress-5-0/
 */
function acf_blocks_allowed_types($allowed_blocks, $post)
{
    // add all custom acf blocks here, restrict to post types in register_custom_acf_blocks functions
    $allowed_blocks = array(

        // common
        'core/paragraph',
        'core/image',
        'core/heading',
        'core/list',
        'core/quote',
        // 'core/file', // TODO: consider to future implementation
        'core/video',

        // formatting
        // 'core/table', // TODO: create custom version or modify output
        'core/code', // TODO: consider to future implementation
        'core/html', // TODO: make visible only to admins

        // layout
        // 'core/button', // TODO: create custom version or modify output
        // 'core/columns', // TODO: create custom version or modify output
        // 'core/media-text', // TODO: create custom version or modify output

        // widgets
        'core/shortcode', // TODO: make visible only to admins for migration, removd once upgrade is complete

        'gravityforms/form',
    );

    return $allowed_blocks;
}
add_filter('allowed_block_types', 'acf_blocks_allowed_types', 10, 2);

/**
 * Modify Heading Block Rendering
 *
 * @package Block Rendering
 * @category Gutenberg Supports
 * @version 1.0
 * @see https://developer.wordpress.org/reference/functions/render_block/
 */
function modify_heading_block($block_content, $block)
{
    if ('core/heading' !== $block['blockName']) {
        return $block_content;
    }

    $return = '<div class="classname">';
    $return .= '<p>Custom Output</p>';
    $return .= $block_content;
    $return .= '</div>';

    return $return;
}
add_filter('render_block', 'modify_heading_block', 10, 2);
