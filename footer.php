<?php
wp_footer(); // @codingStandardsIgnoreLine

// Load page information in dev
if ('local' === getenv('ENV_CURRENT_ENV')) {
    include_once get_template_directory() . '/_examples/grid.php';
    get_page_info();
}
?>

</body>
</html>
