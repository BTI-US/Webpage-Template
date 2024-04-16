<!DOCTYPE html>
<html <?php language_attributes(); ?> >

<head>
	<!-- Meta UTF8 charset -->
	<meta charset="<?php bloginfo( 'charset' ); ?>">

	<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
	<meta name="viewport" content="user-scalable=no, width=device-width, height=device-height, initial-scale=1, maximum-scale=1, minimum-scale=1, minimal-ui" />

	<meta name="theme-color" content="#3F6EBF" />
	<meta name="msapplication-navbutton-color" content="#3F6EBF" />
	<meta name="apple-mobile-web-app-status-bar-style" content="#3F6EBF" />

	<?php wp_head(); ?>
</head>

	<!-- BODY START -->
	<body <?php body_class(); ?> >

    <?php

        if ( function_exists( 'wp_body_open' ) ) {
            wp_body_open();
        }


		do_action('crypterium_preloader_action');
		do_action('crypterium_header_action');
		do_action('crypterium_backtop_action');
		do_action('crypterium_before_header');
        
	?>

	<!-- Site Wrapper -->
	<main>
