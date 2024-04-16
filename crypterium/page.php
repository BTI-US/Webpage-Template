<?php

	// theme header
	get_header();

	//Page settings
	$crypterium_pagelayout 			= 	rwmb_meta( 'crypterium_pagelayout' );

	// page action area
	do_action("crypterium_before_page");

	?> <!-- Page before code -->

<div id="crypterium-index" class="crypterium-index"> <!-- Page general div -->

		<!-- HERO SECTION -->
		<?php crypterium_hero_section(); ?>

	<div id="default-page-container" class="c-section -space-large">
		<div class="grid grid--container">
			<div class="row row--xs-middle">

					<!-- Right sidebar -->
					<?php if( ( $crypterium_pagelayout ) =='right-sidebar' || ( $crypterium_pagelayout ) =='' ){ ?>
					<div class="col col--lg-8  col--md-8 col-sm-12 posts">

					<!-- Left sidebar -->
					<?php } elseif( ( $crypterium_pagelayout ) == 'left-sidebar' ) { ?>
					<?php crypterium_inner_page_sidebars(); ?>
					<div class="col--lg-8  col--md-8 col-sm-12 posts">

					<?php } elseif( ( $crypterium_pagelayout ) == 'full-width' ) { ?>
					<div class="full-width-index col col--md-10 col--lg-8">
					<?php } ?>

						<?php
							// Start the loop.
							while ( have_posts() ) : the_post();

								// Include the page content template.
								get_template_part( 'content', 'page' );

								// If comments are open or we have at least one comment, load up the comment template.
								if ( comments_open() || get_comments_number() ) :
									comments_template();
								endif;

							// End the loop.
							endwhile;
						?>
					</div>

					<?php if( ( $crypterium_pagelayout ) =='right-sidebar' || ( $crypterium_pagelayout ) =='' ){ crypterium_inner_page_sidebars(); } ?>

			</div><!--End row -->
		</div><!--End container -->
	</div><!--End #blog -->

</div><!--End page general div -->

	<?php do_action("crypterium_after_page"); ?><!--End after code -->

	<?php get_footer(); ?>
