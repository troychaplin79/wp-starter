<?php
/**
 * Disable gutenberg front end styles
 *
 * @package Blocks
 * @category Gutenberg Supports
 * @version 1.0
 */
function dequeue_gutenberg_library()
{
    wp_dequeue_style('wp-block-library');
}
add_action('wp_print_styles', 'dequeue_gutenberg_library', 100);

/**
 * Specify allowed core blocks
 *
 * @package Blocks
 * @category Gutenberg Supports
 * @version 1.0
 * @see other uses for this function: https://rudrastyh.com/gutenberg/remove-default-blocks.html
 * @see a list of core blocks: https://wpdevelopment.courses/a-list-of-all-default-gutenberg-blocks-in-wordpress-5-0/
 */
function set_allowed_core_blocks($final_blocks, $post)
{
    // Set available core blocks
    $core_blocks = array(
        'core/paragraph',
        'core/image',
        'core/heading',
        'core/list',
        'core/quote',
        'core/video',
        'core/block', // reusable blocks
        // 'core/table', // TODO: create custom render_block function
        // 'core/code', // TODO: create custom render_block function
        // 'core/button', // TODO: create custom render_block function
        // 'core/columns', // TODO: create custom render_block function
        // 'core/media-text', // TODO: create custom render_block function
    );
    
    // Register custom blocks
    $custom_blocks = array();
    
    // Display specific blocks only to admins
    $admin_blocks = array();
    
    if (current_user_can('administrator')) {
        $admin_blocks = array(
            'core/html',
            'core/shortcode',
        );
    }
    
    $plugin_blocks = array(
        'gravityforms/form',
    );

    $final_blocks = array_merge($core_blocks, $custom_blocks, $admin_blocks, $plugin_blocks);
    return $final_blocks;
}
add_filter('allowed_block_types', 'set_allowed_core_blocks', 10, 2);

/**
 * Remove / Customize Block Inspector Elements
 *
 * @package Blocks
 * @category Gutenberg Supports
 * @version 1.0
 * @see https://developer.wordpress.org/block-editor/developers/themes/theme-support/#block-font-sizes
 */
add_theme_support('disable-custom-font-sizes'); // Disable manually entered font sizes
add_theme_support('editor-font-sizes'); // Remove preset font sizes
add_theme_support('disable-custom-colors'); // Disable custom color options
add_theme_support('editor-color-palette'); // Remove color picker
