<?php
/**
 * Theme Constants
 *
 * @see https://www.php.net/manual/en/language.constants.php
 */

define('THEME_VERSION', '0.0.1');

// Include core block functions
require_once get_template_directory() . '/functions/core-blocks.php';

// Include acf block functions
// require_once get_template_directory() . '/functions/acf-blocks.php';

// Include global functions
require_once get_template_directory() . '/functions/global.php';

// Include backend only functions
require_once get_template_directory() . '/functions/admin.php';

// Include frontend only functions
require_once get_template_directory() . '/functions/public.php';

// Include dev only functions
if ('local' === getenv('ENV_CURRENT_ENV')) {
    include_once get_template_directory() . '/functions/dev.php';
}
