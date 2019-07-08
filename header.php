<!doctype html>
<html class="no-js" <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">

	<link rel="dns-prefetch" href="//ajax.googleapis.com" />
	<link rel="dns-prefetch" href="//google-analytics.com" />
	<link rel="dns-prefetch" href="//www.google-analytics.com" />

	<title><?php bloginfo( 'name' ); ?></title>

	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="HandheldFriendly" content="True" />
	<meta name="MobileOptimized" content="640" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

	<link rel="apple-touch-icon" sizes="180x180" href="<?php echo esc_url( get_template_directory_uri() ); ?>/dist/favicons/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="<?php echo esc_url( get_template_directory_uri() ); ?>/dist/favicons/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="<?php echo esc_url( get_template_directory_uri() ); ?>/dist/favicons/favicon-16x16.png">
	<link rel="manifest" href="<?php echo esc_url( get_template_directory_uri() ); ?>/dist/favicons/site.webmanifest">
	<link rel="mask-icon" href="<?php echo esc_url( get_template_directory_uri() ); ?>/dist/favicons/safari-pinned-tab.svg" color="#2E7F99">
	<link rel="shortcut icon" href="<?php echo esc_url( get_template_directory_uri() ); ?>/dist/favicons/favicon.ico">
	<meta name="msapplication-TileColor" content="#2e7f99">
	<meta name="msapplication-config" content="<?php echo esc_url( get_template_directory_uri() ); ?>/dist/favicons/browserconfig.xml">
	<meta name="theme-color" content="#ffffff">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
