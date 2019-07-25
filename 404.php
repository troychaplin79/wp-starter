<?php
/**
 * WordPress 404 Template
 *
 * @package Theme Templates
 * @category Core Template
 * @version 1.0
 */
require_once get_template_directory() . '/header.php';
require_once get_template_directory() . '/blocks/banner/404.php';

// Get gutenberg blocks
echo '<main>';
    echo '<p>Apologies, but the page you requested could not be found.</p>';
echo '</main>';

require_once get_template_directory() . '/footer.php';
