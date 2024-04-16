<?php

if ( is_admin() )
return false;

/**
* Custom template parts for this theme.
*
* Eventually, some of the functionality here could be replaced by core features.
*
* @package crypterium
*/

/**********************************
***********************************

THEME DEFAULT FUNCTIONS

/**********************************
***********************************/
//Inner page bg image function
function crypterium_null_img($data){
    $url = esc_url( get_template_directory_uri() ) . '/framework/images/bg-4.jpg'; //
    $result = (! empty($data) ) ? $data : $url ;

    return $result;
}


/*************************************************
## START PRELOADER
*************************************************/

if ( ! function_exists( 'crypterium_preloader' ) ) {
    function crypterium_preloader() {

        if ( ot_get_option('crypterium_pre_settings') != 'off' ) { ?>

            <?php if ( ot_get_option('crypterium_pre_type') == 'default' OR  ot_get_option('crypterium_pre_type') == '' ) : ?>
                <div class="preloader default"><div></div></div>
            <?php else : ?>
                <div id="preloader" class="preloader"><div class="loader<?php echo esc_attr( ot_get_option('crypterium_pre_type') ); ?>"></div></div>
                <?php
            endif;
        }
    }
}
add_action( 'crypterium_preloader_action',  'crypterium_preloader', 10 );

/*************************************************
## START BACKTOP
*************************************************/

if ( ! function_exists( 'crypterium_backtop' ) ) {
    function crypterium_backtop() {
        $el_back = ot_get_option('crypterium_backtotop_iconclass');
        $back = ($el_back !='' ) ? $el_back : 'fa fa-angle-up';

        if ( ot_get_option('crypterium_backtotop') !== 'off' ) { ?>
            <!-- Back Top -->
            <div class="c-backtop-1 -js-backtop">
                <i class="c-backtop-1-icon <?php echo esc_attr( $back ) ?>"></i>
            </div>
            <!-- Back Top End -->
            <?php
        }
    }
}

add_action( 'crypterium_backtop_action',  'crypterium_backtop', 10 );

/*************************************************
## START LOGO
*************************************************/

if ( ! function_exists( 'crypterium_logo' ) ) {

    function crypterium_logo() {

        $logo_display = ( ot_get_option('crypterium_logo_display') );
        $logo_type = ( ot_get_option('crypterium_logo_type') );
        $text_logo = ( ot_get_option('crypterium_textlogo') );
        $img_staticlogo = ( ot_get_option('crypterium_img_staticlogo') );
        $img_stickylogo = ( ot_get_option('crypterium_img_stickylogo') );
        $logo_custom_link = ( ot_get_option('crypterium_logo_custom_link') );
        $logo_custom_link = '' != $logo_custom_link ? $logo_custom_link : get_home_url();

        if ( ( $logo_display ) !== 'off' ) {

            if ( ( $logo_type ) == 'img' || ( $logo_type ) == '' ) {
                $logo = esc_url( $img_stickylogo );
                $logo = esc_url( get_theme_file_uri() ) .'/framework/images/logo-dark.png';
            } elseif ( ( $logo_type ) == 'text' )  {
                $logo = ( $text_logo !='' ) ? esc_html( $text_logo ) : esc_html_e( 'Crypterium', 'crypterium' ) ;
            }

            // TEXT LOGO
            if ( ( $logo_type ) == 'text' ) {
                if ( $text_logo ) : ?>
                <a id="top-bar__logo" class="site-logo nt-text-logo nt-logo" href="<?php echo esc_url( $logo_custom_link ); ?>"><?php echo esc_html( $text_logo ); ?></a>
            <?php else : ?>
                <a id="top-bar__logo" class="site-logo nt-text-logo nt-logo" href="<?php echo esc_url( $logo_custom_link ); ?>"><?php echo esc_html_e( 'Crypterium', 'crypterium' ); ?></a>
            <?php endif;
        }

        // IMAGE LOGO
        if ( ( $logo_type ) == 'img' || ( $logo_type ) == '') { ?>
            <a id="top-bar__logo" class="site-logo nt-img-logo nt-logo" href="<?php echo esc_url( $logo_custom_link ); ?>">
                <?php  if ( $img_staticlogo || $img_stickylogo  ) { ?>
                    <img src="<?php echo esc_url( $img_staticlogo ); ?>" width="175" height="42" alt="<?php echo esc_attr_e('Logo','crypterium'); ?>" class="img-responsive">
                    <img src="<?php echo esc_url( $img_stickylogo ); ?>" width="175" height="42" alt="<?php echo esc_attr_e('Logo','crypterium'); ?>" class="img-responsive">
                <?php } else { ?>
                    <img class="img-responsive" width="175" height="42" src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/site_logo.png" alt="<?php echo esc_attr_e('Logo','crypterium'); ?>">
                    <img class="img-responsive" width="175" height="42" src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/site_logo_2.png" alt="<?php echo esc_attr_e('Logo','crypterium'); ?>">
                <?php } ?>
            </a>
        <?php	} // $logo_type

    } // $logo_display
}
}

add_action( 'crypterium_logo_action',  'crypterium_logo', 10 );

/*************************************************
## START METABOXMENU
*************************************************/

if ( ! function_exists( 'crypterium_header' ) ) {
    function crypterium_header() {

        $hd = ot_get_option( 'crypterium_header_display' );
        $sh = ot_get_option( 'crypterium_sticky_header' );
        $hl = ot_get_option( 'crypterium_header_lang' );
        $hlfi = ot_get_option( 'crypterium_header_lang_first_item' );
        $hli = ot_get_option( 'crypterium_header_lang_items', array() );
        $hlb = ot_get_option( 'crypterium_header_login_btn' );
        $hlbu = ot_get_option( 'crypterium_header_login_btn_url' );
        $hlbt = ot_get_option( 'crypterium_header_login_btn_text' );
        $hlbta = ot_get_option( 'crypterium_header_login_btn_target' );
        $hsb = ot_get_option( 'crypterium_header_sign_btn' );
        $hsbu = ot_get_option( 'crypterium_header_sign_btn_url' );
        $hsbt = ot_get_option( 'crypterium_header_sign_btn_text' );
        $hsbta = ot_get_option( 'crypterium_header_sign_btn_target' );

        $so = $sh == 'off' ? 'is-sticky-off' : '';

        $ct = rwmb_meta( 'crypterium_custom_header', true );
        $ht = rwmb_meta( 'crypterium_header_type', true );
        $hv = rwmb_meta( 'crypterium_header_visibility', true );
        $mt = rwmb_meta( 'crypterium_menutype', true );
        $mit = rwmb_meta( 'crypterium_section_name' );
        $miu = rwmb_meta( 'crypterium_section_url' );

        $el_ht = $ht == 'dark' ? 'top-bar--dark' : 'top-bar--light';

        ?>
        <?php if ( $hv != 'hide' ) { ?>
            <header id="top-bar" class="<?php echo esc_attr( $el_ht ); ?> <?php echo esc_attr( $so ); ?> crypterium-header">
                <div id="top-bar__inner">

                    <?php  do_action( 'crypterium_logo_action'); ?>

                    <a id="top-bar__navigation-toggler" href="javascript:void(0);"><span></span></a>

                    <div id="top-bar__navigation-wrap">
                        <div>
                            <nav id="top-bar__navigation" class="navigation">
                                <?php
                                wp_nav_menu( array(
                                    'menu' => 'primary',
                                    'theme_location' => 'primary',
                                    'depth' => 4,
                                    'menu_class' => 'framework-primary-menu',
                                    'menu_id' => 'primary-menu',
                                    'echo' => true,
                                    'fallback_cb' => 'Crypterium_Wp_Bootstrap_Navwalker::fallback',
                                    'walker' => new Crypterium_Wp_Bootstrap_Navwalker()
                                ));
                                ?>
                            </nav>

                            <br class="hide--lg">

                            <ul id="top-bar__subnavigation">

                                <?php if ( $hlb == 'on' ) { ?>
                                    <li><a class="custom-btn custom-btn--small custom-btn--style-3 login-btn" href="<?php echo esc_url($hlbu); ?>" target="<?php echo esc_attr($hlbta); ?>"><?php echo esc_html($hlbt); ?></a></li>
                                <?php } ?>
                                <?php if ($hsb == 'on' ) { ?>
                                    <li><a href="<?php echo esc_url($hsbu); ?>" class="sign-btn" target="<?php echo esc_attr($hsbta); ?>"><?php echo esc_html($hsbt); ?></a></li>
                                <?php } ?>

                                <?php if ( $hl == 'on' AND $hli != '' ) { ?>
                                    <li>
                                        <div id="top-bar__choose-lang">
                                            <div class="list-wrap">
                                                <ul class="list">
                                                    <?php foreach ( $hli as $item ) { ?>

                                                        <li><a href="<?php echo esc_url( $item['url'] ); ?>" class="lang-link">
                                                            <img class="img-responsive  circled" src="<?php echo esc_url( $item['img'] ); ?>" width="25" height="25" ></a>
                                                        </li>
                                                    <?php } ?>
                                                </ul>
                                            </div>

                                            <i><img class="img--active img-responsive  circled" src="<?php echo esc_url($hlfi); ?>" width="25" height="25" ></i>
                                        </div>
                                    </li>
                                <?php } ?>

                            </ul>
                        </div>
                    </div>
                </div>
            </header>
            <!-- Header End -->
            <?php
        }
    }
}

add_action( 'crypterium_header_action',  'crypterium_header', 10 );


/*************************************************
## START WIDGETIZE FOOTER
*************************************************/

if ( ! function_exists( 'crypterium_widgetize' ) ) {
    function crypterium_widgetize() {
        $hv = rwmb_meta( 'crypterium_footer_visibility', true );
        $cfs = ot_get_option('crypterium_footer_social', array() );
        $copyright = ot_get_option('crypterium_copyright');

        if ( $hv != 'hide' ) {
            if ( $cfs != '' OR $copyright != '' ) {
                ?>
                <footer id="footer" class="text--center text--lg-left footer-widget-area">
                    <div class="grid grid--container">
                        <div class="row row--xs-middle">

                            <?php
                            if ( is_active_sidebar( 'crypterium_footer_widget_1' )){ dynamic_sidebar( 'crypterium_footer_widget_1' ); }
                            if ( is_active_sidebar( 'crypterium_footer_widget_2' )){ dynamic_sidebar( 'crypterium_footer_widget_2' ); }
                            if ( is_active_sidebar( 'crypterium_footer_widget_3' )){ dynamic_sidebar( 'crypterium_footer_widget_3' ); }
                            do_action('crypterium_copyright_action');
                            ?>

                        </div>
                    </div>
                </footer>

                <?php
            } // copyright
        } // crypterium_footer_visibility
    } //Crypterium_widgetize_ function
} //Function exists

add_action( 'crypterium_widgetize_action',  'crypterium_widgetize', 10 );



/*************************************************
## START FOOTER COPYRIGHT
*************************************************/

if ( ! function_exists( 'crypterium_copyright' ) ) {
    function crypterium_copyright() {

        if ( ot_get_option('crypterium_copyright_display') != 'off') {

            $cfs = ot_get_option('crypterium_footer_social', array() );
            $copyright = ot_get_option('crypterium_copyright');
            $t = ot_get_option('crypterium_footer_social_target');
            $target = ($t !='') ? 'target="'. $t .'"' : '' ;

            ?>

            <div class="row row--xs-middle row--lg-between">

                <div class="col col--sm-10 col--md-8 col--lg-4">
                    <div class="__item">
                        <div class="social-btns">
                            <?php if ( $cfs != '' ) {
                                foreach ($cfs as $item ) { ?>
                                    <a class="<?php echo esc_attr( $item['footer_social_text'] ) ?>" <?php echo esc_attr( $target ) ?> href="<?php echo esc_url( $item['footer_social_link'] ) ?>"></a>
                            <?php } } ?>
                        </div>
                    </div>
                </div>

                <div class="col col--sm-10 col--md-8 col--lg-6  text--lg-right">
                    <?php if ( $copyright != '' ) { ?>
                        <div class="__item">
                            <div class="__copy"><?php echo wp_kses( $copyright, crypterium_allowed_html() ); ?></div>
                        </div>
                    <?php } else { ?>
                        <div class="__item">
                            <div class="__copy"><?php echo esc_html__( 'Ninetheme. All Rights Reserved..', 'crypterium' );  ?></div>
                        </div>
                    <?php } ?>
                </div>
            </div>
            <?php
        }
    }
}
add_action( 'crypterium_copyright_action',  'crypterium_copyright', 10 );



/*************************************************
## START POST_FORMAT FUNCTION
*************************************************/

if ( ! function_exists( 'crypterium_post_format' ) ) {
function crypterium_post_format() {

    $blog_style = ot_get_option( 'blog_style' );
    $blog_s = ( $blog_style !='' ) ? $blog_style : '3';
    $sticky = ( is_sticky() ) ? ' -has-sticky ' : '';


    if ( get_post_format() == 'aside' ) {
        $format_class = 'aside';
    } elseif ( get_post_format() == 'audio' ) {
        $format_class = 'audio';
    } elseif ( get_post_format() == 'chat' ) {
        $format_class = 'chat';
    } elseif ( get_post_format() == 'gallery' ) {
        $format_class = 'gallery';
    } elseif ( get_post_format() == 'link' ) {
        $format_class = 'link';
    } elseif ( get_post_format() == 'quote' ) {
        $format_class = 'quote';
    } elseif ( get_post_format() == 'status' ) {
        $format_class = 'status';
    } elseif ( get_post_format() == 'video' ) {
        $format_class = 'video';
    } else {
        $format_class = 'standart';
    }

    ?>

    <div id="post-<?php the_ID(); ?>" <?php post_class('c-blog-' . esc_attr($blog_s) . '-item '.esc_attr( $sticky ) . '-format-'.esc_attr($format_class)); ?>>
        <div class="c-blog-<?php echo esc_attr($blog_s); ?>-item-inner">

            <?php if ( is_sticky() ) : ?>
                <div class="c-blog-<?php echo esc_attr($blog_s); ?>-sticky">
                    <i class="fa fa-thumb-tack" aria-hidden="true"></i>
                </div>
            <?php endif; ?>

            <?php if ( false == get_post_format() ) { ?>

                <?php if ( has_post_thumbnail() ) : ?>
                    <div class="c-blog-<?php echo esc_attr($blog_s); ?>-media">
                        <div class="c-blog-<?php echo esc_attr($blog_s); ?>-media-photo">
                            <a class="c-blog-<?php echo esc_attr($blog_s); ?>-media-link" href="<?php echo esc_url( get_permalink() ); ?>"><?php the_post_thumbnail('full',array('class' => 'c-blog-1-media-image')); ?></a>
                        </div>
                    </div>
                <?php endif; ?>

            <?php } elseif ( get_post_format() == 'audio' ) { ?>

                <div class="c-blog-<?php echo esc_attr($blog_s); ?>-media">
                    <?php
                    $mp3 = rwmb_meta( 'crypterium_audio_mp3' );
                    $oga = rwmb_meta( 'crypterium_audio_ogg' );
                    $sc_iframe = rwmb_meta( 'crypterium_audio_sc' );
                    $sc_color = rwmb_meta( 'crypterium_audio_sc_color' );
                    $wp_audio = '[audio mp3="'.$mp3.'"  ogg="'.$oga.'"]';
                    ?>
                    <?php if($sc_iframe!='') : ?>
                        <div class="post-thumb" color="<?php esc_attr($sc_color) ?>"><?php echo wp_kses($sc_iframe,crypterium_allowed_html()); ?></div>
                    <?php else : ?>
                        <div class="post-thumb">
                            <?php if(has_post_thumbnail()) : the_post_thumbnail(); endif; ?>
                            <?php echo do_shortcode ( $wp_audio ); ?>
                        </div>
                    <?php endif; ?>
                </div>

            <?php } elseif ( get_post_format() == 'video' ) { ?>

                <div class="c-blog-<?php echo esc_attr($blog_s); ?>-media">
                    <?php
                    $embed = rwmb_meta( 'crypterium_video_embed' );
                    if( $embed!='' ) :
                        ?>
                        <div class="post-thumb blog-bg">
                            <div class="media-element video-responsive"><?php echo wp_kses($embed,crypterium_allowed_html()); ?></div>
                        </div>

                    <?php else :

                        $m4v = rwmb_meta( 'crypterium_video_m4v' );
                        $ogv = rwmb_meta( 'crypterium_video_ogv' );
                        $webm = rwmb_meta( 'crypterium_video_webm' );
                        $image_id = get_post_thumbnail_id();
                        $image_url = wp_get_attachment_image_src($image_id, true);
                        $wp_video = '[video poster="'.$image_url[0].'" mp4="'.$m4v.'"  webm="'.$webm.'"]';
                        ?>

                        <div class="post-thumb"><?php echo do_shortcode ($wp_video); ?></div>
                    <?php endif; ?>
                </div>


            <?php } elseif ( get_post_format() == 'quote' ) {

                $quote_text = rwmb_meta( 'crypterium_quote_text' );
                $quote_author = rwmb_meta( 'crypterium_quote_author' );
                $image_id = get_post_thumbnail_id();
                $image_url = wp_get_attachment_image_src($image_id, true);
                $quote_color = rwmb_meta( 'crypterium_quote_bg' );
                $q_opacity = rwmb_meta( 'crypterium_quote_bg_opacity' );
                $q_opacity = $q_opacity !='' ? $q_opacity / 100 : '' ;

                if ( $quote_text !='') { ?>
                    <div class="c-blog-<?php echo esc_attr($blog_s); ?>-media">

                        <div class="post-thumb">
                            <div class="content-quote-format-wrapper">
                                <?php if(has_post_thumbnail()) : ?>
                                    <div class="entry-media" style="background-image: url(<?php echo esc_url( $image_url[0] ); ?>); ">
                                    <?php else : ?>
                                        <div class="entry-media">
                                        <?php endif; ?>
                                        <div class="content-quote-format-overlay" style="background-color: <?php echo esc_attr( $quote_color ); ?>; opacity: <?php echo esc_attr( $q_opacity ); ?>;"></div>
                                        <div class="content-quote-format-textwrap">
                                            <h3><a href="<?php esc_url( the_permalink() ); ?>"><?php echo esc_html( $quote_text ); ?></a></h3>
                                            <p><a href="#0" target="_blank" style="color: #ffffff;"><?php echo esc_html( $quote_author ); ?></a></p>
                                        </div>
                                    </div>
                                    <div class="clear"></div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>

                <?php } elseif ( get_post_format() == 'gallery' )  { ?>

                    <div class="c-blog-<?php echo esc_attr($blog_s); ?>-media">
                        <div class="c-blog-<?php echo esc_attr($blog_s); ?>-media-gallery">
                            <?php
                            wp_enqueue_style( 'crypterium-custom-flexslider' );
                            wp_enqueue_script( 'crypterium-custom-flexslider' );
                            wp_enqueue_script( 'fitvids' );
                            wp_enqueue_script( 'crypterium-blog-settings' );
                            $format_gallery_images = rwmb_meta( 'crypterium_gallery_image','type=image_advanced' );
                            if(  !empty($format_gallery_images) ) {
                                ?>
                                <div class="flexslider">
                                    <ul class="slides">
                                        <?php
                                        foreach ( $format_gallery_images as $image ) {
                                            echo "<li><img src='{$image['full_url']}' alt='{$image['alt']}' /></li>";
                                        }
                                        ?>
                                    </ul>
                                </div>
                            <?php } ?>
                        </div>
                    </div>

                <?php } // end if get_post_format

                do_action('crypterium_formats_content_action');

                ?>

            </div>
        </div><!--End Post- -->
        <?php
    }
}

/*************************************************
## START FORMATS_CONTENT
*************************************************/

if ( ! function_exists( 'crypterium_formats_content' ) ) {
    function crypterium_formats_content() {

        wp_enqueue_style( 'crypterium-custom-flexslider');
        wp_enqueue_script( 'crypterium-custom-flexslider');
        wp_enqueue_script( 'fitvids');
        wp_enqueue_script( 'crypterium-blog-settings');
        $type = ot_get_option( 'blog_style' );
        $blog_s = ( $type !='' ) ? $type : '3';
        ?>

        <div class="c-blog-<?php echo esc_attr($blog_s); ?>-info">
            <h5 class="c-blog-<?php echo esc_attr($blog_s); ?>-info-category"><?php the_category(' - '); ?></h5>

            <?php
            if ( is_single() ) :
                the_title( '<h3 class="c-blog-'. esc_attr($blog_s).'-info-title">', '</h3>' );
                else :
                    the_title( sprintf( '<h3 class="c-blog-'. esc_attr($blog_s).'-info-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' );
                endif;
                ?>

                <ul class="c-blog-<?php echo esc_attr($blog_s); ?>-info-meta">

                    <li class="c-blog-<?php echo esc_attr($blog_s); ?>-info-meta-item the-date"><?php esc_html_e('On', 'crypterium'); ?> <a class="c-blog-<?php echo esc_attr($blog_s); ?>-info-meta-link" href="#"><?php echo get_the_date(); ?></a> - </li>
                    <li class="c-blog-<?php echo esc_attr($blog_s); ?>-info-meta-item"><a class="c-blog-<?php echo esc_attr($blog_s); ?>-info-meta-link" href="<?php esc_url( comments_link() ); ?>"><?php comments_number( '0 Comments', 'one response', '% responses' ); ?>.</a></li>
                    <li class="c-blog-<?php echo esc_attr($blog_s); ?>-info-meta-item"><?php esc_html_e('By', 'crypterium'); ?> <a class="c-blog-<?php echo esc_attr($blog_s); ?>-info-meta-link" href="#"><?php the_author(); ?></a></li>

                    <?php	if( has_tag() ) { ?>
                        <li class="c-blog-<?php echo esc_attr($blog_s); ?>-info-meta-item post-tags"><?php esc_html_e('Tags', 'crypterium'); ?>
                            <?php
                            $tags = get_the_tags(get_the_ID());
                            foreach($tags as $tag){
                                echo '<a href="'. esc_url( get_tag_link($tag->term_id) ).'" rel="tag" class="c-blog-'. esc_attr($blog_s) .'-info-meta-link blog-post-tag tag-'. esc_attr( $tag->name ).'">'. esc_html( $tag->name ).'</a> ';
                            }
                            ?>
                        </li>
                    <?php } ?>

                </ul>
                <div class="c-blog-<?php echo esc_attr($blog_s); ?>-info-summary">
                    <?php

                    if ( is_single() ) : 	the_content(); 	else : 	the_excerpt();  endif ;

                    wp_link_pages( array(
                        'before' => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'crypterium' ) . '</span>',
                        'after' => '</div>',
                        'link_before' => '<span>',
                        'link_after' => '</span>',
                        'pagelink' => '<span class="screen-reader-text">' . esc_html__( 'Page', 'crypterium' ) . ' </span>%',
                        'separator' => '<span class="screen-reader-text">, </span>',
                    )
                );
                ?>
            </div>

            <?php  if ( ! is_single() ) : ?>
                <div class="c-blog-<?php echo esc_attr($blog_s); ?>-info-link">
                    <a href="<?php echo esc_url( get_permalink() ); ?>" class="c-link-1"><?php esc_html_e('Read more', 'crypterium'); ?> <span class="c-link-1-icon -right ion-android-arrow-forward"></span></a>
                </div>
            <?php endif; // is_single() ?>

        </div>

        <?php
    }
}

add_action( 'crypterium_formats_content_action',  'crypterium_formats_content', 10 );

/*************************************************
## START CUSTOM FORMATS_CONTENT
*************************************************/

if ( ! function_exists( 'crypterium_single_post_formats_content' ) ) {
    function crypterium_single_post_formats_content() {

        $blog_style = ot_get_option( 'blog_style' );
        $blog_s = ( $blog_style !='' ) ? $blog_style : '3';

        if ( false == get_post_format() ) { ?>

            <?php if ( has_post_thumbnail() ) : ?>
                <div class="c-blog-<?php echo esc_attr($blog_s); ?>-media">
                    <div class="c-blog-<?php echo esc_attr($blog_s); ?>-media-photo">
                        <a class="c-blog-<?php echo esc_attr($blog_s); ?>-media-link" href="<?php echo esc_url( get_permalink() ); ?>"><?php the_post_thumbnail('full',array('class' => 'c-blog-1-media-image')); ?></a>
                    </div>
                </div>
            <?php endif;

        }	elseif ( get_post_format() == 'video' ) {

            $embed = rwmb_meta( 'crypterium_video_embed' );
            if( $embed!='' ) :
                ?>
                <div class="post-thumb blog-bg">
                    <div class="media-element video-responsive"><?php echo wp_kses($embed,crypterium_allowed_html()); ?></div>
                </div>

            <?php else :

                $m4v = rwmb_meta( 'crypterium_video_m4v' );
                $ogv = rwmb_meta( 'crypterium_video_ogv' );
                $webm = rwmb_meta( 'crypterium_video_webm' );
                $image_id = get_post_thumbnail_id();
                $image_url = wp_get_attachment_image_src($image_id, true);
                $wp_video = '[video poster="'.$image_url[0].'" mp4="'.$m4v.'"  webm="'.$webm.'"]';
                ?>

                <div class="post-thumb"><?php echo do_shortcode ($wp_video); ?></div>
            <?php endif;
        } elseif( get_post_format() == 'quote' ) { ?>
            <?php
            $quote_text = rwmb_meta( 'crypterium_quote_text' );
            $quote_author = rwmb_meta( 'crypterium_quote_author' );
            $image_id = get_post_thumbnail_id();
            $image_url = wp_get_attachment_image_src($image_id, true);
            $quote_color = rwmb_meta( 'crypterium_quote_bg' );
            $q_opacity = rwmb_meta( 'crypterium_quote_bg_opacity' );
            $q_opacity = $q_opacity !='' ? $q_opacity / 100 : '' ;
            if ( $quote_text !='') {
                ?>

                <div class="post-thumb">
                    <div class="content-quote-format-wrapper">
                        <?php if(has_post_thumbnail()) : ?>
                            <div class="entry-media" style="background-image: url(<?php echo esc_url( $image_url[0] ); ?>); ">
                            <?php else : ?>
                                <div class="entry-media">
                                <?php endif; ?>
                                <div class="content-quote-format-overlay" style="background-color: <?php echo esc_attr( $quote_color ); ?>; opacity: <?php echo esc_attr( $q_opacity ); ?>;"></div>
                                <div class="content-quote-format-textwrap">
                                    <h3><a href="<?php esc_url( the_permalink() ); ?>"><?php echo esc_html( $quote_text ); ?></a></h3>
                                    <p><a href="#0" target="_blank" style="color: #ffffff;"><?php echo esc_html( $quote_author ); ?></a></p>
                                </div>
                            </div>
                            <div class="clear"></div>
                        </div>
                    </div>
                </div>

            <?php } ?>
        <?php 	} elseif( get_post_format() == 'gallery' ) { ?>
            <?php
            wp_enqueue_style( 'crypterium-custom-flexslider' );
            wp_enqueue_script( 'crypterium-custom-flexslider' );
            wp_enqueue_script( 'fitvids' );
            wp_enqueue_script( 'crypterium-blog-settings' );
            $crypterium_images = rwmb_meta( 'crypterium_gallery_image','type=image_advanced' );
            if( !empty($crypterium_images)  ) :
                ?>
                <div class="flexslider">
                    <ul class="slides">
                        <?php
                        foreach ( $crypterium_images as $image ) {
                            echo "<li><img src='{$image['full_url']}' alt='{$image['alt']}' /></li>";
                        }
                        ?>
                    </ul>
                </div>
            <?php endif; ?>
        <?php } elseif( get_post_format() == 'audio' ) {

            $mp3 = rwmb_meta( 'crypterium_audio_mp3' );
            $oga = rwmb_meta( 'crypterium_audio_ogg' );
            $sc_iframe = rwmb_meta( 'crypterium_audio_sc' );
            $sc_color = rwmb_meta( 'crypterium_audio_sc_color' );
            $wp_audio = '[audio mp3="'.$mp3.'"  ogg="'.$oga.'"]';
            ?>

            <?php if($sc_iframe!='') : ?>
                <div class="post-thumb blog-bg" color="<?php esc_attr($sc_color) ?>"><?php echo wp_kses($sc_iframe,crypterium_allowed_html()); ?></div>
            <?php else : ?>
                <div class="post-thumb blog-bg">
                    <?php if(has_post_thumbnail()) : the_post_thumbnail(); endif; ?>
                    <?php echo do_shortcode ( $wp_audio ); ?>
                </div>
            <?php endif;
        }
    }
}


/*************************************************
## START PORT. NAVIGATION
*************************************************/

if ( ! function_exists( 'crypterium_port_navigation' ) ) {

    /**
    * Display navigation to next/previous post when applicable.
    *
    * @return void
    */

    function crypterium_port_navigation() {

        if ( empty( get_previous_post() ) ){
            $class = 'pag-next';
        } elseif ( empty( get_next_post() ) ) {
            $class = 'pag-previous';
        } else {
            $class = 'pag-previous-next';
        }

        ?>

        <div class="c-section">
            <div class="c-container -size-full">
                <!-- Project Pager -->
                <nav class="c-pager-1 -style-centered">
                    <ul class="c-pager-1-inner <?php echo esc_attr( $class );?>">

                        <?php	if ( get_previous_post() ) { ?>
                            <li class="c-pager-1-item -prev">
                                <h5 class="c-pager-1-title"><?php echo esc_html_e( 'PREVIOUS POST','crypterium' );?></h5>
                                <?php previous_post_link( '%link', _x( '%title ', 'Previous post link', 'crypterium' ) ); ?>
                            </li>
                        <?php } ?>

                        <?php	if ( get_next_post() ) { ?>
                            <li class="c-pager-1-item -next">
                                <h5 class="c-pager-1-title"><?php echo esc_html_e( 'NEXT POST','crypterium' );?></h5>
                                <?php next_post_link( '%link', _x( '%title', 'Next post link', 'crypterium' ) ); ?>
                            </li>
                        <?php } ?>

                    </ul>
                </nav>
                <!-- Project Pager End -->
            </div>
        </div>
        <?php
    }
}

/*************************************************
## NAVIGATION PAGINATION
*************************************************/

if ( ! function_exists( 'crypterium_paging_nav' ) ) {

    /**
    * Display navigation to next/previous set of posts when applicable.
    *
    * @return void
    */

    function crypterium_paging_nav() {

        // Don't print empty markup if there's only one page.
        if ( $GLOBALS['wp_query']->max_num_pages < 2 ) {
            return;
        }
        ?>
        <nav class="navigation paging-navigation">
            <ul class="pager">

                <?php if ( get_next_posts_link() ) : ?>
                    <li class="previous"><?php next_posts_link( esc_html__( ' Older posts', 'crypterium' ) ); ?></li>
                <?php endif; ?>

                <?php if ( get_previous_posts_link() ) : ?>
                    <li class="next"><span class="icon-facebook"></span><?php previous_posts_link( esc_html__( 'Newer posts ', 'crypterium' ) ); ?></li>
                <?php endif; ?>

            </ul><!-- End Nav-links -->
        </nav><!-- End Igation -->
        <?php
    }
}

/*************************************************
## POST NAVIGATION
*************************************************/

if ( ! function_exists( 'crypterium_post_nav' ) ) {

/**
* Display navigation to next/previous post when applicable.
*
* @return void
*/

    function crypterium_post_nav() {
        // Don't print empty markup if there's nowhere to navigate.
        $previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
        $next     = get_adjacent_post( false, '', false );

        if ( ! $next && ! $previous ) {
            return;
        }
        ?>
        <!-- Navigation -->
        <ul class="pager">
            <li class="previous"><?php previous_post_link( '%link', _x( '<i class="fa fa-angle-left"></i> %title ', 'Previous post link', 'crypterium' ) ); ?></li>
            <li class="next"><?php next_post_link(     '%link', _x( '%title <i class="fa fa-angle-right"></i> ', 'Next post link',     'crypterium' ) ); ?><li>
        </ul>
        <?php
    }
}

/*************************************************
## POST PAGINATION
*************************************************/

/**
* Display post navigation to next/previous post when applicable.
*
* @return void
*/

function crypterium_post_pagination($pages = '', $range = 2){
    $showitems = ($range * 2)+1;

    global $paged;
    if(empty($paged)) $paged = 1;

    if($pages == ''){
        global $wp_query;
        $pages = $wp_query->max_num_pages;
        if(!$pages)
        {
            $pages = 1;
        }
    }

    $type = ot_get_option( 'crypterium_pag_type' );
    $size = ot_get_option( 'crypterium_pag_size' );
    $group = ot_get_option( 'crypterium_pag_group' );
    $corner = ot_get_option( 'crypterium_pag_corner' );
    $align = ot_get_option( 'crypterium_pag_align' );
    $groupo = ( $group == 'yes' ) ? ' -group' : '';
    $typeo = ( $type == '' ) ? 'outline' : ''.$type.'';
    $sizeo = ( $size == '' ) ? 'large' : ''.$size.'';
    $aligno = ( $align == '' ) ? 'left' : ''.$align.'';
    $cornero = ( $corner == '' ) ? 'square' : ''.$corner.'';

    if(1 != $pages){
        echo "<div class='c-pagination-1 -style-".$typeo." -size-".$sizeo." -align-".$aligno." -corner-".$cornero." ".$groupo." '>";
        echo "<ul class='c-pagination-1-inner'>";
        echo "<li class='c-pagination-1-item'>".get_previous_posts_link('<i class="c-pagination-1-icon fa fa-angle-left" aria-hidden="true"></i>')."</li>";
        if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<li class='c-pagination-1-item'><a class='c-pagination-1-link -prev -is-disabled' href='". esc_url( get_pagenum_link(1) ) ."'>&laquo;</a></li>";
        if($paged > 1 && $showitems < $pages) echo "<li class='c-pagination-1-item'><a href='". esc_url( get_pagenum_link($paged - 1) )."'>&lsaquo;</a></li>";

        for ($i=1; $i <= $pages; $i++)
        {
            if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
            {
                echo esc_attr($paged == $i) ? "<li class='c-pagination-1-item'><a href='#0' class='c-pagination-1-link active' >".$i."</a></li>" : "<li class='c-pagination-1-item'><a href='". esc_url( get_pagenum_link($i) )."' class='c-pagination-1-link' >".$i."</a></li>";
            }
        }

        if ($paged < $pages && $showitems < $pages) echo "<li class='c-pagination-1-item'><a href='".esc_url(  get_pagenum_link($paged + 1) )."'>&rsaquo;</a></li>";
        if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<li class='c-pagination-1-item'><a class='c-pagination-1-link -next' href='".esc_url(  get_pagenum_link($pages) )."'>&laquo;</a></li>";

        echo "<li class='c-pagination-1-item'>". esc_url( get_next_posts_link('<i class="c-pagination-1-icon fa fa-angle-right" aria-hidden="true"></i>') )."</li>";
        echo "</ul>\n";
        echo "</div>\n";
    }
}


/*************************************************
## HERO FUNCTION
*************************************************/

if(! function_exists('crypterium_hero_section')){
    function crypterium_hero_section(){

        if ( is_404() ) {  // error page
            $name = 'error';
            $d_slogan = esc_html__( 'OOPS! THAT PAGE CAN NOT BE FOUND.', 'crypterium' );
            $d_heading = esc_html__( '404 - Not Found.', 'crypterium' );
        } elseif ( class_exists( 'woocommerce' ) AND is_shop() ) {  	// WooCommerce shop page
            $name = 'woocommerce_page';
            $d_slogan = esc_html__( 'Woocommerce Page.', 'crypterium' );
            $d_heading = esc_html__( 'Shop.', 'crypterium' );
        } elseif ( class_exists( 'woocommerce' ) AND is_product() ) {  	// WooCommerce single page
            $name = 'woocommerce_single';
            $d_slogan = esc_html__( 'Woocommerce Single Page.', 'crypterium' );
            $d_heading = esc_html__( 'Product.', 'crypterium' );
        } elseif ( is_archive() ) {  // blog and cpt archive page
            $name = 'archive';
            $d_slogan = esc_html__( 'Welcome To Our Archive', 'crypterium' );
            $d_heading = get_the_archive_title();
        } elseif ( is_search() ) {  // search page
            $name = 'search';
            $d_slogan = esc_html__( 'Search Completed.', 'crypterium' );
            $d_heading = esc_html__( 'Search Results Found For.', 'crypterium' );
        } elseif ( is_home() OR is_front_page() ) {  	// blog post loop page index.php or your choise on settings
            $name = 'blog';
            $d_slogan = esc_html__( 'CORPORATE BLOG.', 'crypterium' );
            $d_heading = 'BLOG';
        } elseif ( is_single() ) {  	// blog post single/singular page
            $name = 'single';
            $d_slogan = get_the_title();
            $d_heading = get_the_title();
        } elseif ( is_page() ) { 	// default or custom page
            $name = 'page';
            $d_slogan = esc_html__( 'Page.', 'crypterium' );
            $d_heading = get_the_title();
        }

        //Inner pages ot_get_option settings
        if ( ! is_page() ) {
            $hero_display = ot_get_option('crypterium_'.$name.'_hero_display' )  ;
            $hero_bg = crypterium_null_img( ot_get_option( 'crypterium_'.$name.'_hero_bg' ) ) ;
            $hero_slogan_display = ot_get_option( 'crypterium_'.$name.'_slogan_display' );
            $hero_slogan = ot_get_option( 'crypterium_'.$name.'_slogan' );
            $hero_heading_display = ot_get_option( 'crypterium_'.$name.'_heading_display' );
            $hero_heading = ot_get_option( 'crypterium_'.$name.'_heading' );
            $hero_desc_display = ot_get_option( 'crypterium_'.$name.'_desc_display' );
            $hero_desc = ot_get_option( 'crypterium_'.$name.'_desc' );
            $hero_bread_display = ot_get_option( 'crypterium_'.$name.'_bread' );
            $hero_align = ot_get_option( 'crypterium_'.$name.'_hero_align' );
            $hero_overlay_setting = ot_get_option( 'crypterium_'.$name.'_overlay_setting' );
            $herobtn_display = ot_get_option( 'crypterium_'.$name.'_hero_btn_display' );
            $herobtn = ot_get_option( 'crypterium_'.$name.'_hero_btn' );
            $herobtn_url = ot_get_option( 'crypterium_'.$name.'_hero_btn_url' );
            $herobtn_title = ( $herobtn != '' ) ? $herobtn : esc_html__( 'Back To Homepage', 'crypterium' );
            $hero_btn_url = ( $herobtn_url != '' ) ? $herobtn_url : home_url( '/' );
        }
        if ( is_page() ) {
            $hero_display = rwmb_meta( 'crypterium_page_hero_display' );
            $hero_bg = crypterium_null_img(wp_get_attachment_url( rwmb_meta('crypterium_page_bg_image'),'full' ));
            $hero_slogan_display = rwmb_meta( 'crypterium_page_slogan_display' );
            $hero_slogan = rwmb_meta( 'crypterium_page_slogan' );
            $hero_heading_display = rwmb_meta( 'crypterium_page_heading_display' );
            $hero_heading = rwmb_meta( 'crypterium_page_heading' );
            $hero_desc_display = rwmb_meta( 'crypterium_page_desc_display' );
            $hero_desc = rwmb_meta( 'crypterium_page_desc' );
            $hero_bread_display = rwmb_meta( 'crypterium_page_bread_display' );
            $hero_align = rwmb_meta( 'crypterium_page_hero_align' );
            $hero_overlay_setting = rwmb_meta( 'crypterium_disable_bgoverlay' );
            $herobtn_display = rwmb_meta( 'crypterium_page_herobtn_display' );
            $herobtn = rwmb_meta( 'crypterium_page_herobtn' );
            $herobtn_url = rwmb_meta( 'crypterium_page_herobtn_url' );
            $herobtn_title = ( $herobtn != '' ) ? $herobtn : esc_html__( 'Back To Homepage', 'crypterium' );
            $hero_btn_url = ( $herobtn_url != '' ) ? $herobtn_url : home_url( '/' );
        }

        $hero_align_item = ( $hero_align != '' ) ? 'text--'.$hero_align : 'text--center';
        $hero_d_setting = is_page() ? true : "off" ;
        $bg = ( $hero_bg !='' ) ? 'style="background-image: url('. esc_url( $hero_bg ) .');"' : '' ;

        $hero_attr = array();
        $hero_attr[] .= 'id="hero"';
        $hero_attr[] .= 'class="page-id-'. get_the_ID() .' hero-fullwidth parallax nt-inner-pages-hero"';
        $hero_attr[] .= $bg;
        $hero_attr[] .= 'data-speed="0.5"';

        if ( $hero_display != $hero_d_setting ) {
            ?>
            <!-- Start Hero Section -->
            <div <?php echo implode(' ', array_filter($hero_attr)); ?> >

                <!-- Overlay -->
                <?php if ( $hero_overlay_setting != $hero_d_setting ) { ?>
                    <div class="template-overlay"></div>
                <?php } ?>

                <div class="hero-content <?php echo esc_attr($hero_align_item) ?>">
                    <div class="grid grid--container">
                        <div class="row row--xs-middle">
                            <div class="hero-innner-last-child">

                                <?php //Slogan
                                if ( $hero_slogan_display != $hero_d_setting ) {
                                    if ( $hero_slogan != '' ) {
                                        ?>
                                        <h6 class="u-text-sup"><?php echo esc_html( $hero_slogan ); ?></h6>
                                        <?php
                                    }
                                }

                                //Title
                                if (  $hero_heading_display != $hero_d_setting ) {
                                    if ( $hero_heading  != '' ) { ?>
                                        <h1 class="u-text-hero"><?php echo esc_html( $hero_heading ); ?></h1>
                                    <?php } else { ?>
                                        <h1 class="u-text-hero"><?php echo wp_kses( apply_filters( 'crypterium_page_default_heading', $d_heading ), crypterium_allowed_html() ); ?></h1>
                                        <?php
                                    }
                                }

                                // Description
                                if ( $hero_desc_display != $hero_d_setting ) {
                                    if ( $hero_desc != '' ) {
                                        ?>
                                        <p class="u-text-lead"><?php echo wp_kses( $hero_desc, crypterium_allowed_html() ); ?></p>
                                        <?php
                                    }
                                }

                                //Breadcrubms
                                if ( $hero_bread_display != $hero_d_setting AND  function_exists( 'bcn_display') ) {
                                    ?>
                                    <p class="breadcrumb"><?php bcn_display(); ?></p>
                                    <?php
                                }

                                if ( is_single()  AND ( class_exists( 'woocommerce' ) AND  !is_product() ) ) {
                                    ?>
                                    <ul class="c-blog-2-info-meta single-hero">
                                        <li class="c-blog-2-info-meta-item"><?php the_time('F j, Y'); ?></li>
                                    </ul>
                                    <?php
                                }

                                 // Button
                                if ( $herobtn_display != $hero_d_setting  ) {
                                    if ( ! is_home() OR ! is_front_page() ) {
                                        ?>
                                        <a  href="<?php echo esc_url( $hero_btn_url  ); ?>" class="custom-btn custom-btn--small custom-btn--style-3"><i class="ion-chevron-left pr5"></i><?php echo esc_html( $herobtn_title ); ?></a>
                                        <?php
                                    }
                                }
                                ?>
                            </div>
                        </div>
                    </div><!-- End container -->
                </div><!-- End hero-content -->
            </div><!-- End Hero Section -->
            <?php
        } // hide hero area
    }
}

/*************************************************
## THEME SIDEBARS
*************************************************/

if ( ! function_exists( 'crypterium_inner_page_sidebars' ) ) {
    function crypterium_inner_page_sidebars() {
        ?>

        <div id="widget-area" class="widget-area col col--lg-4 col--xs-12 col--md-4 col--sm-12">
            <div class="c-sidebar-1">

                <?php
                if ( ot_get_option('crypterium_sidebar_type') == 'custom' OR ot_get_option('crypterium_sidebar_type') != '' ){
                    if (  is_active_sidebar( 'crypterium_error_sidebar' ) AND is_404()  ){
                        dynamic_sidebar( 'crypterium_error_sidebar' );
                    } elseif (  is_active_sidebar( 'crypterium_archive_sidebar' ) AND is_archive() ) {
                        dynamic_sidebar( 'crypterium_archive_sidebar' );
                    } elseif (  is_active_sidebar( 'crypterium_blog_sidebar' ) AND is_home() OR is_front_page() ) {
                        dynamic_sidebar( 'crypterium_blog_sidebar' );
                    } elseif (  is_active_sidebar( 'crypterium_page_sidebar' ) AND is_page() ) {
                        dynamic_sidebar( 'crypterium_page_sidebar' );
                    } elseif (  is_active_sidebar( 'crypterium_search_sidebar' ) AND is_search() ) {
                        dynamic_sidebar( 'crypterium_search_sidebar' );
                    } elseif (  is_active_sidebar( 'crypterium_single_sidebar' ) AND is_single() ) {
                        dynamic_sidebar( 'crypterium_single_sidebar' );
                    } elseif (  is_active_sidebar( 'crypterium_woocommerce_page_sidebar' ) AND class_exists( 'woocommerce' ) AND is_shop() ) {
                        dynamic_sidebar( 'crypterium_woocommerce_page_sidebar' );
                    } elseif (  is_active_sidebar( 'crypterium_woocommerce_single_sidebar' ) AND class_exists( 'woocommerce' ) AND is_product() ) {
                        dynamic_sidebar( 'crypterium_woocommerce_single_sidebar' );
                    } // endif is_active_sidebar
                } else {
                    get_sidebar();
                } // endif sidebar_type
                ?>

            </div>
        </div>

        <?php
    }
}
