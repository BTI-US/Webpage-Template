<?php

	// theme header
	get_header();

	//404 page metaboxes settings
	$crypterium_404_layout 				= 	ot_get_option( 'crypterium_404_layout' );

	//  error page action area, you can use this function for your custom codes
	do_action("crypterium_before_404");

?>

<div id="crypterium-404" class="crypterium-404">  <!-- 404 page general div -->

	<!-- HERO SECTION -->
	<?php crypterium_hero_section(); ?>

	<div id="error-page-container" class="bg-white c-section -space-large">
		<div class="grid grid--container">
			<div class="row row--xs-middle">

				<!-- Right sidebar -->
				<?php if( ( $crypterium_404_layout ) == 'right-sidebar' || ( $crypterium_404_layout ) == '') { ?>
				<div class="col col--lg-8  col--md-8 col-sm-12 posts content-error">

				<!-- left sidebar -->
				<?php } elseif( ( $crypterium_404_layout ) == 'left-sidebar') { ?>
				<?php crypterium_inner_page_sidebars(); ?>
				<div class="col col--lg-8  col--md-8 col-sm-12 posts content-error">

				<!-- Sidebar none -->
				<?php } elseif( ( $crypterium_404_layout ) == 'full-width') { ?>
				<div class="full-width-index col col--md-10 col--lg-8 content-error">
				<?php } ?>

					<h3 class="black"><?php esc_html_e( 'Hmm, we could not find what you are looking for.', 'crypterium' ); ?></h3>
					<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try a search?', 'crypterium' ); ?></p>

					<div class="search-form-page-container">
						<?php get_search_form(); ?>
					</div>

					<div class="clearfix m-bottom-50"></div>
					<div class="recent">
						<div class="col-header">
							<h3 class="black"><?php esc_html_e( 'Recent Posts', 'crypterium' ); ?></h3>
						</div>
						<ol>
							<?php wp_get_archives( array( 'type' => 'postbypost', 'limit' => 10, 'format' => 'custom', 'before' => '<li>', 'after' => '</li>' ) ); ?>
						</ol>
					</div>

				</div><!-- End sidebar + content -->

				<!-- Right sidebar -->
				<?php if( ( $crypterium_404_layout ) == 'right-sidebar' || ( $crypterium_404_layout ) == '') { ?>
					<?php crypterium_inner_page_sidebars();  ?>
				<?php	} ?>

			</div><!-- End row -->
		</div><!-- End container -->
	</div><!-- End div #blog-post -->

</div> <!-- End 404 page general div -->

<?php
	do_action("crypterium_after_404");
	get_footer();
?>
