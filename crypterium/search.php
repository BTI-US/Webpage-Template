<?php

	get_header();

	//Search page settings
	$crypterium_search_layout 				= 	ot_get_option( 'crypterium_search_layout' );

	do_action("crypterium_before_search");

?> <!-- Search page before code -->

<div id="crypterium-search" class="crypterium-search"> <!-- Search page general div -->

		<!-- HERO SECTION -->
		<?php crypterium_hero_section(); ?>

	<div id="search-page-container" class="bg-white c-section -space-large">
		<div class="grid grid--container">
			<div class="row row--xs-middle">

				<!-- Right sidebar -->
				<?php	if( ( $crypterium_search_layout ) == 'right-sidebar' || ( $crypterium_search_layout ) == '') { ?>
				<div class="col col--lg-8  col--md-8 col-sm-12 posts">

				<!-- left sidebar -->
				<?php } elseif( ( $crypterium_search_layout ) == 'left-sidebar') { ?>
				<?php crypterium_inner_page_sidebars(); ?>
				<div class="col col--lg-8  col--md-8 col-sm-12 posts">

				<!-- Sidebar none -->
				<?php } elseif( ( $crypterium_search_layout ) == 'full-width') { ?>
				<div class="full-width-index col col--md-10 col--lg-8">
				<?php }

					if ( have_posts() ) :
						while ( have_posts() ) : the_post();
							get_template_part( 'content', 'search' );
						endwhile;
					else :
						get_template_part( 'content', 'none' );
					endif;

					the_posts_pagination(
						array(
							'prev_text'          => esc_html__( 'Next', 'crypterium' ),
							'next_text'          => esc_html__( 'Prev', 'crypterium' ),
							'before_page_number' => '<span class="meta-nav screen-reader-text"></span>',
						)
					);

				?>
				</div><!-- End sidebar + content -->

				<!-- Right sidebar -->
				<?php if( ( $crypterium_search_layout ) == 'right-sidebar' || ( $crypterium_search_layout ) == '') { crypterium_inner_page_sidebars(); } ?>

			</div><!-- End row -->
		</div><!-- End container -->
	</div><!-- End #blog-post -->
</div><!--End search page general div -->

<?php do_action("crypterium_after_search") ?><!-- Search page after code -->

<?php get_footer(); ?>
