
<?php
/**
 * The template part for displaying results in search pages
 *
 * Learn more: {@link https://codex.wordpress.org/Template_Hierarchy}
 *
 * @package WordPress
 * @subpackage Crypterium 1.0
 * @since Crypterium 1.0
 */
?>

<article>

	<h3 class="page-title"><?php esc_html_e( 'Nothing Found', 'crypterium' ); ?></h3>

	<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

		<p><?php printf( esc_html__( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'crypterium' ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>

	<?php elseif ( is_search() ) : ?>

		<p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'crypterium' ); ?></p>
		<div class="search-form-page-container">
			<?php get_search_form(); ?>
		</div>
	<?php else : ?>

		<p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'crypterium' ); ?></p>
		<div class="search-form-page-container">
			<?php get_search_form(); ?>
		</div>

	<?php endif; ?>

	<div class="clearfix m-bottom-50"></div>

	<div class="recent">
		<div class="col-header">
			<h3><?php esc_html_e( 'Recent Posts', 'crypterium' ); ?></h3>
		</div>
		<ol>
			<?php wp_get_archives(
				array(
					'type'		=> 'postbypost',
					'limit'		=> 10,
					'format'		=> 'custom',
					'before'		=> '<li>',
					'after'		=> '</li>'
				)
			); ?>
		</ol>
	</div>

</article> <!-- End article -->
