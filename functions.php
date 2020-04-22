<?php // @codingStandardsIgnoreLine
/**
 * Theme Constants
 *
 * @package Theme Includes
 *
 * @category Constants
 *
 * @version 1.0
 */

define('THEME_VERSION', '0.0.1');

// Include global functions
require_once get_template_directory() . '/functions/core-blocks.php';
// require_once get_template_directory() . '/functions/acf-blocks.php';

// Include global functions
require_once get_template_directory() . '/functions/global.php';

// Include backend only functions
require_once get_template_directory() . '/functions/admin.php';

// Include frontend only functions
require_once get_template_directory() . '/functions/public.php';

// Include dev only functions
if ('local' === getenv('ENV_CURRENT_ENV')) {
    require_once get_template_directory() . '/functions/dev.php';
}
