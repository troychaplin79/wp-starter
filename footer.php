<?php
wp_footer();

// Load page information in dev
if ('DEV' === getenv('ENV_CURRENT_ENV')) {
    get_page_info();
    require_once get_template_directory() . '/functions/dev/grid.php';
}
?>

</body>
</html>
