<?php

	get_header();

	// single page layout ot settings
	$crypterium_post_layout_ot	=	ot_get_option('crypterium_post_layout');
	$crypterium_post_layout_mb	=		get_post_meta(get_the_ID(), 'crypterium_post_layout', true );

	if( ( $crypterium_post_layout_mb ) != '' ) {
		$crypterium_post_layout = $crypterium_post_layout_mb;
	} else {
		$crypterium_post_layout = $crypterium_post_layout_ot;
	}

	do_action("crypterium_before_post_single");

?>

<div id="crypterium-single" class="crypterium-single"> <!-- Single page general div -->

	<!-- HERO SECTION -->
	<?php	crypterium_hero_section(); ?>

	<div id="single-page-container" class="bg-white c-section -space-large">
		<div class="grid grid--container">
			<div class="row row--xs-middle">

				<!-- Right sidebar -->
				<?php	if( ( $crypterium_post_layout ) == 'right-sidebar' || ( $crypterium_post_layout ) == '') { ?>
				<div class="col col--lg-8  col--md-8 col-sm-12 posts">

				<!-- left sidebar -->
				<?php } elseif( ( $crypterium_post_layout ) == 'left-sidebar') { ?>
				<?php crypterium_inner_page_sidebars(); ?>
				<div class="col col--lg-8  col--md-8 col-sm-12 posts">

				<!-- Sidebar none -->
				<?php } elseif( ( $crypterium_post_layout ) == 'full-width') { ?>
				<div class="full-width-index col col--md-10 col--lg-8">
				<?php } ?>

					<div class="single-inner">
						<?php
							crypterium_single_post_formats_content(); // Slider , gallery and more
							//Content Area
							while ( have_posts() ) : the_post();
								echo '<div class="single-inner-content">';
									the_content();
								echo '</div>';
							endwhile;

							//Post Comments Start
							if ( comments_open() || '0' != get_comments_number() ) :
								comments_template();
							endif;
							//Post Comments End
						?>
					</div><!-- single-inner -->

				</div><!-- End sidebar + content -->

				<!-- Right sidebar -->
				<?php if( ( $crypterium_post_layout ) == 'right-sidebar' || ( $crypterium_post_layout ) == '') { crypterium_inner_page_sidebars(); } ?>

				</div><!-- End row -->
			</div><!-- End container -->
		</div><!-- End #blog-post -->

		<?php crypterium_port_navigation();?>

</div><!--End search page general div -->

<?php
	do_action("crypterium_after_post_single");
	get_footer();
?>
