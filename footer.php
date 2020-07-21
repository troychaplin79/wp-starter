<?php
wp_footer(); // @codingStandardsIgnoreLine

// Load page information in dev
if ('local' === getenv('ENV_CURRENT_ENV')) {
    echo '<main>';
    include_once get_template_directory() . '/_examples/content.php';
    include_once get_template_directory() . '/_examples/wp-images.php';
    include_once get_template_directory() . '/_examples/grid.php';
    echo '</main>';

    getPageInfo();
}
?>

</body>
</html>
