<?php
// Avoid replication of code, category template is shared with taxonomy template
// If category.php doesn't exist, WordPress looks for archive.php by default, so we need to share taxonomy.php
require_once get_template_directory() . '/taxonomy.php';
