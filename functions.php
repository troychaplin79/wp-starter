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
 * Include dev only functions
 *
 * @since   Resource Includes
 * @package Dev Functions
 * @version 1.0
 */
if ('DEV' === getenv('ENV_SERVER_ENV')) {
    include_once get_template_directory() . '/functions/dev/dev.php';
}
