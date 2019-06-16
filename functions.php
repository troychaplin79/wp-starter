<?php
/**
 * Include constants
 * =============
 *
 * @since   Theme Includes
 * @package Includes
 * @version 1.0
 */

require_once get_template_directory() . '/constants/constants.php';



/**
 * Include common functions
 * =============
 *
 * @since   Theme Includes
 * @package Includes
 * @version 1.0
 */

require_once get_template_directory() . '/functions/global/global.php';

// // ACF specific common functions
// if (function_exists('get_field') ) {
//     include_once get_template_directory() . '/functions/wp-plugins/acf/global.php';
// }

// // Gravityfoms specific common functions
// if (class_exists('GFCommon') ) {
//     include_once get_template_directory() . '/functions/wp-plugins/gravityforms/global.php';
// }

// // WordPress SEO specific common functions
// if (defined('WPSEO_VERSION') ) {
//     include_once get_template_directory() . '/functions/wp-plugins/wordpress-seo/global.php';
// }


/**
 * Include backend only functions
 * =============
 *
 * @since   Theme Includes
 * @package Includes
 * @version 1.0
 */

if (is_admin() ) {
    include_once get_template_directory() . '/functions/admin/admin.php';

    // // ACF specific common functions
    // if ( function_exists( 'get_field' ) ) {
    //     require_once get_template_directory() . '/functions/wp-plugins/acf/admin.php';
    // }

    // // Gravityfoms specific common functions
    // if ( class_exists( 'GFCommon' ) ) {
    //     require_once get_template_directory() . '/functions/wp-plugins/gravityforms/admin.php';
    // }

    // // WordPress SEO specific common functions
    // if ( defined( 'WPSEO_VERSION' ) ) {
    //     require_once get_template_directory() . '/functions/wp-plugins/wordpress-seo/admin.php';
    // }
}


/**
 * Include frontend only functions
 * =============
 *
 * @since   Theme Includes
 * @package Includes
 * @version 1.0
 */

if (! is_admin() ) {
    include_once get_template_directory() . '/functions/public/public.php';

    // // ACF specific common functions
    // if (function_exists('get_field') ) {
    //     include_once get_template_directory() . '/functions/wp-plugins/acf/public.php';
    // }

    // // Gravityfoms specific common functions
    // if ( class_exists( 'GFCommon' ) ) {
    //     require_once get_template_directory() . '/functions/wp-plugins/gravityforms/public.php';
    // }

    // // WordPress SEO specific common functions
    // if ( defined( 'WPSEO_VERSION' ) ) {
    //     require_once get_template_directory() . '/functions/wp-plugins/wordpress-seo/public.php';
    // }
}
