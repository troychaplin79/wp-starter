<?php
/**
 * WordPress 404 Template
 *
 * @category Core Template
 * @version 1.0
 * @see https://codex.wordpress.org/Creating_an_Error_404_Page
 */
require_once get_template_directory() . '/header.php';
require_once get_template_directory() . '/blocks/banner/404.php';

echo '<main>';
    echo '<p>Apologies, but the page you requested could not be found.</p>';
echo '</main>';

require_once get_template_directory() . '/footer.php';
