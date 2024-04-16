
<?php

	// theme header
	get_header();

	// check WooCommerce plugin is active or hide layouts
	if ( class_exists( 'woocommerce' ) ) {

		if (is_product()) {
			get_template_part( 'woocommerce', 'single' );
			} else {
			get_template_part( 'woocommerce', 'page' );
		}

	}

	// theme footer
	get_footer();

?>
