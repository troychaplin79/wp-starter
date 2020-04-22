<?php // @codingStandardsIgnoreLine
/**
 * Add custom block categories

 * @package Theme ACF Supports
 * @category ACF + Gutenberg
 * @version 1.0
 */

function acf_blocks_categories($categories, $post)
{
    return array_merge(
        $categories,
        array(
            array(
                'slug'  => 'content-blocks',
                'title' => __('Content Blocks', 'content-blocks'),
            ),
        )
    );
}
add_filter('block_categories', 'acf_blocks_categories', 10, 2);

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
        'acf/text-content',
        'gravityforms/form',
    );

    return $allowed_blocks;
}
add_filter('allowed_block_types', 'acf_blocks_allowed_types', 10, 2);

/**
 * Register the Blocks
 *
 * @package Theme ACF Supports
 * @category ACF + Gutenberg
 * @version 1.0
 * @see https://www.advancedcustomfields.com/resources/acf_register_block/
 */

function register_custom_acf_blocks()
{
    // check function exists
    if (function_exists('acf_register_block')) {
        // Register a text content block
        acf_register_block(
            array(
                'name'            => 'text-content',
                'title'           => 'Text Content',
                'description'     => 'A custom content block.',
                'category'        => 'content-blocks',
                'icon'            => 'text',
                'mode'            => 'auto',
                'keywords'        => array( 'content', 'text' ),
                'post_types'      => array( 'page', 'post' ),
                'render_template' => 'blocks/content/content.php',
            )
        );
    }
}
add_action('acf/init', 'register_custom_acf_blocks');

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
