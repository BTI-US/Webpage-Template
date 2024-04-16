<?php
/**
 * Comments.php
 * The template for displaying Comments.
 * @package WordPress
 * @subpackage Crypterium
 * @since Crypterium 1.0
 */
?>

<?php
	/*
	 * If the current post is protected by a password and
	 * the visitor has not yet entered the password we will
	 * return early without loading the comments.
	 */
	if ( post_password_required() )
		return;
?>

<div id="comments" class="comments-area comment-form-container page-post-2-comments-form crypterium-post-class">
	<!-- Comments -->
	<?php if ( have_comments() ) : ?>
		<h4 class="page-post-2-title">
		<?php
			printf( _n( 'One thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', get_comments_number(), 'crypterium' ),
			number_format_i18n( get_comments_number() ), '<span>' . get_the_title() . '</span>' );
		?>
		</h4>
		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
			<nav role="navigation" id="comment-nav-above" class="site-navigation comment-navigation">
				<h4 class="assistive-text"><?php esc_html_e( 'Comment navigation', 'crypterium' ); ?></h4>
				<div class="nav-previous"><?php previous_comments_link( esc_html__( '&larr; Older Comments', 'crypterium' ) ); ?></div>
				<div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments &rarr;', 'crypterium' ) ); ?></div>
			</nav><!--End #comment-nav-before -->
			<?php endif; // check for comment navigation ?>

			<ol class="commentlist">
				<?php
					/* Loop through and list the comments. Tell wp_list_comments()
					 * to use crypterium_comment() to format the comments.
					 * If you want to overload this in a child theme then you can
					 * define crypterium_comment() and that will be used instead.
					 * See crypterium_comment() in inc/template-tags.php for more.
					 */
					wp_list_comments();
				?>
				<!-- .commentlist -->
			</ol><!-- .commentlist -->

			<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
			<nav role="navigation" id="comment-nav-below" class="site-navigation comment-navigation">
				<h4 class="assistive-text"><?php esc_html_e( 'Comment navigation', 'crypterium' ); ?></h4>
				<div class="nav-previous"><?php previous_comments_link( esc_html__( '&larr; Older Comments', 'crypterium' ) ); ?></div>
				<div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments &rarr;', 'crypterium' ) ); ?></div>
			</nav>
			<?php endif; // check for comment navigation ?>

		<?php endif; // have_comments() ?>

		<?php  if ( ! comments_open() && '0' != get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : 	?>
			<p class="nocomments text-center"><?php esc_html_e( 'Comments are closed.', 'crypterium' ); ?></p>
		<?php endif; ?>

		<?php if ( comments_open() ) : ?>

			<?php if ( get_option('comment_registration') && !is_user_logged_in() ) : ?>
			<p class="alert"><?php esc_html_e( 'You must be ', 'crypterium' ); ?><a href="<?php echo esc_url( wp_login_url( get_permalink() ) ); ?>"><?php esc_html_e( 'logged in', 'crypterium' ); ?></a> <?php esc_html_e( 'to post a comment.', 'crypterium' ); ?></p>
			<?php else : ?>
			  <?php comment_form(); ?>
			<?php endif; // If registration required and not logged in ?>
		<?php endif; // If you delete this the sky will fall on your head ?>

</div>
