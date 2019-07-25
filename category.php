<?php
/**
 * Include taxonomy template
 *
 * If category.php doesn't exist, WordPress looks for archive.php by default, then looks for index
 * To avoid replication of code, we'll load the taxonomy template as the functionality is shared
 *
 * @package Theme Templates
 * @category Core Template
 * @version 1.0
 * @see https://wphierarchy.com
 */
require_once get_template_directory() . '/taxonomy.php';
