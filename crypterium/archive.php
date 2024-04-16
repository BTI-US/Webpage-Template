<?php

	get_header();

	// page layout option tree settings
	$crypterium_archive_layout 			= 	ot_get_option( 'crypterium_archive_layout' );

	// archive page layout before action area, you can use this function for your custom codes
	do_action("crypterium_before_archive");

?> <!-- Archive page before code -->

<div id="crypterium-archive" class="crypterium-archive" > <!-- Archive page general div -->

	<!-- HERO SECTION -->
	<?php crypterium_hero_section(); ?>

	<div id="archive-page-container" class="bg-white c-section -space-large">
		<div class="grid grid--container">
			<div class="row row--xs-middle">

				<!-- Right sidebar -->
				<?php if( ( $crypterium_archive_layout ) == 'right-sidebar' || ( $crypterium_archive_layout ) == '') { ?>
				<div class="col col--lg-8  col--md-8 col-sm-12 posts">

				<!-- left sidebar -->
				<?php } elseif( ( $crypterium_archive_layout ) == 'left-sidebar') { ?>
				<?php crypterium_inner_page_sidebars();  ?>
				<div class="col col--lg-8  col--md-8 col-sm-12 posts">

				<!-- Sidebar None -->
				<?php } elseif( ( $crypterium_archive_layout ) == 'full-width') { ?>
				<div class="full-width-index col col--md-10 col--lg-8">
				<?php }

					if ( have_posts() ) :
						while ( have_posts() ) : the_post();
							crypterium_post_format();
						endwhile;
					else :
						get_template_part( 'content', 'none' );
					endif;

					the_posts_pagination( array(
					'prev_text'          => esc_html__( 'Next', 'crypterium' ),
					'next_text'          => esc_html__( 'Prev', 'crypterium' ),
					'before_page_number' => '<span class="meta-nav screen-reader-text"></span>',
					) );
				?>
				</div><!-- End sidebar + content -->

				<!-- Right sidebar -->
				<?php if( ( $crypterium_archive_layout ) == 'right-sidebar' || ( $crypterium_archive_layout ) == '') {
					crypterium_inner_page_sidebars();
				} ?>

			</div><!-- End row -->
		</div><!-- End container -->
	</div><!-- End div #blog-post -->

</div> <!-- End archive page general div-->

<?php

	// archive page layout after action area, you can use this function for your custom codes
	do_action("crypterium_after_archive");

	// theme footer
	get_footer();

?>
