<?php

	// theme header
	get_header();

	//Index Settings
	$crypterium_blog_layout 				= 	ot_get_option( 'crypterium_blog_layout' );

	// blog index page layout before action area, you can use this function for your custom codes
 	do_action("crypterium_before_index")

?> <!-- Index before code -->

<div id="crypterium-index" class="crypterium-index"> <!-- Index general div -->

		<!-- theme hero section -->
		<?php crypterium_hero_section(); ?>

	<div id="blog-page-container" class="blog-classic c-section -space-large">
		<div class="grid grid--container">
			<div class="row row--xs-middle">

				<!-- Right sidebar -->
				<?php if( ( $crypterium_blog_layout ) =='right-sidebar' || ($crypterium_blog_layout ) =='' ){ ?>
				<div class="col col--lg-8  col--md-8 col-sm-12 posts">

				<!-- Left sidebar -->
				<?php } elseif(( $crypterium_blog_layout ) == 'left-sidebar') {
					crypterium_inner_page_sidebars(); ?>
				<div class="col col--lg-8  col--md-8 col-sm-12 posts">

				<!-- Sidebar none -->
				<?php } elseif(( $crypterium_blog_layout ) == 'full-width') { ?>
				<div class="full-width-index col col--md-10 col--lg-8">
				<?php }

					if ( have_posts() ) :

						while ( have_posts() ) : the_post();
							crypterium_post_format();
						endwhile;

						echo '<div class="u-space"></div>';

						crypterium_post_pagination();

					else :

						get_template_part( 'content', 'none' );

					endif;
				?>

				</div>

				<?php
					if( ( $crypterium_blog_layout ) =='right-sidebar' || ($crypterium_blog_layout ) =='' ){
						crypterium_inner_page_sidebars();
					}
				?>

			</div><!--End row -->
		</div><!--End container -->
	</div><!--End #blog -->

</div> <!--End index general div -->


<?php

	// blog index page layout after action area, you can use this function for your custom codes
	do_action("crypterium_after_index");

	// theme footer
	get_footer();

?>
