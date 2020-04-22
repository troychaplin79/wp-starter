<?php
wp_footer();

// Load page information in dev
if ('local' === getenv('ENV_CURRENT_ENV')) {
    get_page_info();
    // require_once get_template_directory() . '/_examples/grid.php';
}
?>

</body>
</html>
