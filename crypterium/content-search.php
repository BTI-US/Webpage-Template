<?php
/**
 * The template part for displaying results in search pages
 *
 * Learn more: {@link https://codex.wordpress.org/Template_Hierarchy}
 *
 * @package WordPress
 * @subpackage Crypterium
 * @since Crypterium 1.0
 */

   if ( 'gallery' == get_post_format() ) {
       $crypterium_p_class = 'gallery';
   } elseif ( 'link' == get_post_format() ) {
      $crypterium_p_class = 'link';
   } elseif ( 'standart' == get_post_format() ) {
      $crypterium_p_class = 'standart';
   } elseif ( 'quote' == get_post_format() ) {
      $crypterium_p_class = 'quote';
   } else {
      $crypterium_p_class = 'standart';
   }

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
   <div class="c-blog-3-item -format-<?php echo esc_attr( $crypterium_p_class ); ?> <?php if ( is_sticky() ) : ?> -has-sticky <?php endif; ?> ">
      <div class="c-blog-3-item-inner">

         <?php if ( is_sticky() ) : ?>
            <div class="c-blog-3-sticky">
               <i class="fa fa-thumb-tack" aria-hidden="true"></i>
            </div>
         <?php endif; ?>

         <?php if ( has_post_thumbnail() ) : ?>
            <div class="c-blog-3-media">
               <div class="c-blog-3-media-photo">
                  <a class="c-blog-3-media-link" href="<?php echo esc_url( get_permalink() ); ?>"><?php the_post_thumbnail('full'); ?></a>
               </div>
            </div>
         <?php endif; ?>

      	<?php do_action('crypterium_formats_content_action'); ?>

      </div>
   </div>
</article><!-- End article -->
