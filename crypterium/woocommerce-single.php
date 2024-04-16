<?php

	get_header();

	do_action("crypterium_before_woo_single");

?> <!-- Woo shop page before code -->

<div id="crypterium-woo-single" class="crypterium-woo-single"> <!-- Woo shop page general div -->

	<!-- HERO SECTION -->
	<?php crypterium_hero_section(); ?>

	<div id="woocommerce-single-page-container" class="page-internal-content c-section -space-large">
		<div class="grid grid--container">
			<div class="row row--xs-middle">

				<!-- Right sidebar -->
				<?php if( ot_get_option( 'woosingle' ) == 'right-sidebar' || ot_get_option( 'woosingle' ) == '') { ?>
					<div class="col col--lg-8  col--md-8 col-sm-12 posts">

				<!-- Left sidebar -->
				<?php } elseif( ot_get_option( 'woosingle' ) == 'left-sidebar') { ?>
                    <?php dynamic_sidebar( 'crypterium_woocommerce_single_sidebar' ); ?>
				    <div class="col col--lg-8  col--md-8 col-sm-12 posts">

				<!-- Sidebar none -->col col--lg-8
				<?php } elseif( ot_get_option( 'woosingle' ) == 'full-width') { ?>
					<div class="full-width-index col col--md-10 col--lg-8">
				<?php } ?>

					<?php woocommerce_content(); ?>

			   </div><!-- End sidebar + content -->

				<?php if( ot_get_option( 'woosingle' ) == 'right-sidebar' || ot_get_option( 'woosingle' ) == '') {
                     dynamic_sidebar( 'crypterium_woocommerce_single_sidebar' );
                } ?>

			</div><!-- End row -->
		</div><!-- End #container -->
	</div><!-- End #blog -->
</div><!-- End woo shop page general div -->

<?php
	do_action("crypterium_after_woo_single");
	get_footer();
?>
