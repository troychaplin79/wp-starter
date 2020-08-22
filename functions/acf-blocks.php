<?php

/**
 * Add custom block categories
 */
// function acfBlockCategories($categories, $post)
// {
//     return array_merge(
//         $categories,
//         array(
//             array(
//                 'slug'  => 'content-blocks',
//                 'title' => __('Content Blocks', 'content-blocks'),
//             ),
//         )
//     );
// }
// add_filter('block_categories', 'acfBlockCategories', 10, 2);

/**
 * Register the Blocks
 *
 * @see https://www.advancedcustomfields.com/resources/acf_register_block/
 */
// function registerCustomAcfBlocks()
// {
//     if (function_exists('acf_register_block')) {
        
//         // Register a text content block
//         acf_register_block(
//             array(
//                 'name'            => 'text-content',
//                 'title'           => 'Text Content',
//                 'description'     => 'A custom content block.',
//                 'category'        => 'content-blocks',
//                 'icon'            => 'text',
//                 'mode'            => 'auto',
//                 'keywords'        => array( 'content', 'text' ),
//                 'post_types'      => array( 'page', 'post' ),
//                 'render_template' => 'blocks/content/content.php',
//             )
//         );
//     }
// }
// add_action('acf/init', 'registerCustomAcfBlocks');
