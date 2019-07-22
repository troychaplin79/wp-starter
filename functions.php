<?php
/**
 * Include constants
 *
 * @since   Resource Includes
 * @package Constants
 * @version 1.0
 */
require_once get_template_directory() . '/constants/constants.php';

/**
 * Include global functions
 *
 * @since   Resource Includes
 * @package ACF Block Functions
 * @version 1.0
 */
require_once get_template_directory() . '/functions/acf-blocks/acf-blocks.php';

/**
 * Include global functions
 *
 * @since   Resource Includes
 * @package Global Functions
 * @version 1.0
 */
require_once get_template_directory() . '/functions/global/global.php';

/**
 * Include backend only functions
 * =============
 *
 * @since   Resource Includes
 * @package Admin Functions
 * @version 1.0
 */
if (is_admin()) {
    include_once get_template_directory() . '/functions/admin/admin.php';
}

/**
 * Include frontend only functions
 *
 * @since   Resource Includes
 * @package Public Functions
 * @version 1.0
 */

if (! is_admin()) {
    include_once get_template_directory() . '/functions/public/public.php';
}

/**
 * Examples on conditionally loading based on commonly used plugins
 *
 * @since   Resource Includes
 * @package Plugin Functions
 * @version 1.0
 */
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
