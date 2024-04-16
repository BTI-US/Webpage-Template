<?php
	get_header();

	do_action("crypterium_before_woo_shop_page");
?> <!-- Woo shop page before code -->

<div id="crypterium-woo" class="crypterium-woo"> <!-- Woo shop page general div -->

	<!-- HERO SECTION -->
	<?php crypterium_hero_section(); ?>

	<div id="woocommerce-page-container" class="page-internal-content c-section -space-large">
		<div class="grid grid--container">
			<div class="row row--xs-middle">

				<!-- Right sidebar -->
				<?php if( ot_get_option( 'woopage' ) == 'right-sidebar' || ot_get_option( 'woopage' ) == '') { ?>
				<div class="col col--lg-8  col--md-8 col-sm-12 posts">

				<!-- Left sidebar -->
				<?php } elseif( ot_get_option( 'woopage' ) == 'left-sidebar') {

                        dynamic_sidebar( 'crypterium_woocommerce_page_sidebar' );
                    ?>
				<div class="col col--lg-8  col--md-8 col-sm-12 posts">

				<!-- Sidebar none -->
				<?php } elseif( ot_get_option( 'woopage' ) == 'full-width') { ?>
					<div class="full-width-index col col--md-10 col--lg-8">
				<?php } ?>

					<?php woocommerce_content(); ?>

			   </div><!-- End sidebar + content -->

				<?php if( ot_get_option( 'woopage' ) == 'right-sidebar' || ot_get_option( 'woopage' ) == '') {
                    dynamic_sidebar( 'crypterium_woocommerce_page_sidebar' );
                } ?>

			</div><!-- End row -->
		</div><!-- End container -->
	</div><!-- End #blog -->
</div><!-- End woo shop page general div -->

<?php
	do_action("crypterium_after_woo_shop_page");
	get_footer();
?>
