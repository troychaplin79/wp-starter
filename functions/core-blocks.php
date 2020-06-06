<?php // @codingStandardsIgnoreLine
/**
 * Disable gutenberg front end styles
 */
function dequeueGutenbergLibrary()
{
    wp_dequeue_style('wp-block-library');
}
add_action('wp_print_styles', 'dequeueGutenbergLibrary', 100);

/**
 * Remove / Customize Block Inspector Elements
 *
 * @see https://developer.wordpress.org/block-editor/developers/themes/theme-support/#block-font-sizes
 */
add_theme_support('disable-custom-font-sizes'); // Disable manually entered font sizes
add_theme_support('editor-font-sizes'); // Remove preset font sizes
add_theme_support('disable-custom-colors'); // Disable custom color options
add_theme_support('editor-color-palette'); // Remove color picker

/**
 * Disable all default gutenberg blocks
 *
 * @see https://rudrastyh.com/gutenberg/remove-default-blocks.html
 * @see https://wpdevelopment.courses/a-list-of-all-default-gutenberg-blocks-in-wordpress-5-0/
 */
function acfAllowedBlockTypes($allowed_blocks, $post)
{
    // Register core blocks
    $core_blocks = array(
        'core/heading',
        'core/gallery',
        'core/image',
        'core/list',
        'core/paragraph',
        'core/quote',
        'core/table',
        'core/code',
        'core-embed/youtube',
    );

    // Register custom blocks
    $custom_blocks = array(
        // 'acf/text-content',
    );

    // Register admin specific blocks
    $admin_blocks = array();

    if (current_user_can('administrator')) {
        $admin_blocks = array(
            // 'core/html',
        );
    }

    // Register plugin specific blocks
    $plugin_blocks = array(
        'gravityforms/form',
    );

    $allowed_blocks = array_merge($core_blocks, $custom_blocks, $admin_blocks, $plugin_blocks);
    return $allowed_blocks;
}
add_filter('allowed_block_types', 'acfAllowedBlockTypes', 10, 2);
