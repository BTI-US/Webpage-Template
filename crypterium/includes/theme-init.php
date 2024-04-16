<?php
/**
*
* @package WordPress
* @subpackage crypterium
* @since crypterium 1.0
*
**/

/*************************************************
## Google Font
*************************************************/

if ( ! function_exists( 'crypterium_theme_fonts' ) ) :
    function crypterium_theme_fonts() {
        $fonts_url = '';

        $Open = _x( 'on', 'Open+Sans font: on or off', 'crypterium' );
        $Lato = _x( 'on', 'Lato font: on or off', 'crypterium' );
        $Poppins = _x( 'on', 'Poppins font: on or off', 'crypterium' );
        $Catamaran = _x( 'on', 'Catamaran font: on or off', 'crypterium' );

        if ( 'off' !== $Open OR 'off' !== $Lato OR 'off' !== $Poppins OR 'off' !== $Catamaran ) {
            $font_families = array();

            if ( 'off' !== $Open )
            $font_families[] = 'Open+Sans:300,400,500';

            if ( 'off' !== $Lato )
            $font_families[] = 'Lato:900';

            if ( 'off' !== $Poppins )
            $font_families[] = 'Poppins:400';

            if ( 'off' !== $Catamaran )
            $font_families[] = 'Catamaran:300,400,500,600,700';

            $query_args = array(
                'family' => urlencode( implode( '|', $font_families ) ),
                'subset' => urlencode( 'latin,latin-ext' ),
            );
            $fonts_url = add_query_arg( $query_args, "//fonts.googleapis.com/css" );
        }

        return $fonts_url;
    }
endif;

/*************************************************
## Styles and Scripts
*************************************************/


function crypterium_scripts() {

    if ( is_singular() ) wp_enqueue_script( 'comment-reply' );

    // flexslider css file for blog post
    if ( is_rtl() ) {
        wp_enqueue_style( 'crypterium-style', get_template_directory_uri() . '/css/style-rtl.css',false, '1.0');
    } else {
        wp_enqueue_style( 'crypterium-style', get_template_directory_uri() . '/css/style.css',false, '1.0');
    }

    wp_enqueue_style( 'ionicons', get_template_directory_uri() . '/framework/css/ionicon-stylesheet.css',false, '1.0');
    wp_enqueue_style( 'themify', get_template_directory_uri() . '/framework/css/themify-stylesheet.css',false, '1.0');
    wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/framework/css/fontawesome.min.css',false, '1.0');
    wp_enqueue_style( 'fontello', get_template_directory_uri() . '/framework/css/fontello.css',false, '1.0');
    wp_enqueue_style( 'crypterium-custom-flexslider', get_template_directory_uri() . '/framework/js/flexslider/flexslider.css',false, '1.0');

    // theme default css file for blog posts
    if ( is_rtl() ) {
        wp_enqueue_style( 'crypterium-theme-style', get_template_directory_uri() . '/framework/css/theme-blog-rtl.css',false, '1.0');
        wp_enqueue_style( 'crypterium-theme-defaults', get_template_directory_uri() . '/framework/css/theme-default-rtl.css',false, '1.0');
        wp_enqueue_style( 'crypterium-wordpress', get_template_directory_uri() . '/framework/css/framework-wordpress-rtl.css',false, '1.0');

        // WooCommerce
        if ( class_exists( 'woocommerce' ) ) {
            wp_enqueue_style( 'crypterium-woocommerce', get_template_directory_uri() . '/framework/css/framework-woocommerce-rtl.css',false, '1.0');
        }

        wp_enqueue_style( 'crypterium-extras', get_template_directory_uri() . '/framework/css/framework-extras-rtl.css',false, '1.0');
        wp_enqueue_style( 'crypterium-update', get_template_directory_uri() . '/framework/css/framework-update-rtl.css',false, '1.0');
    } else {
        wp_enqueue_style( 'crypterium-theme-style', get_template_directory_uri() . '/framework/css/theme-blog.css',false, '1.0');
        wp_enqueue_style( 'crypterium-theme-defaults', get_template_directory_uri() . '/framework/css/theme-default.css',false, '1.0');
        wp_enqueue_style( 'crypterium-wordpress', get_template_directory_uri() . '/framework/css/framework-wordpress.css',false, '1.0');

        // WooCommerce
        if ( class_exists( 'woocommerce' ) ) {
            wp_enqueue_style( 'crypterium-woocommerce', get_template_directory_uri() . '/framework/css/framework-woocommerce.css',false, '1.0');
        }

        wp_enqueue_style( 'crypterium-extras', get_template_directory_uri() . '/framework/css/framework-extras.css',false, '1.0');
        wp_enqueue_style( 'crypterium-update', get_template_directory_uri() . '/framework/css/framework-update.css',false, '1.0');
    }

    wp_enqueue_style( 'crypterium-custom-style', get_template_directory_uri() . '/framework/css/crypterium-custom.css',false, '1.0');
    wp_enqueue_style( 'crypterium-fonts', crypterium_theme_fonts(), array(), '1.0' );
    wp_enqueue_style( 'crypterium-style', get_stylesheet_uri() );

    // default scripts for theme
    wp_enqueue_script('crypterium-custom', get_template_directory_uri() . '/framework/js/crypterium-custom.js',array('jquery'), '1.0', true);

    // WP default scripts for theme
    wp_enqueue_script('crypterium-custom-flexslider', get_template_directory_uri() . '/framework/js/flexslider/flexslider-min.js',array('jquery'), '1.0', true);
    wp_enqueue_script('fitvids', get_template_directory_uri() . '/framework/js/fitvids.js',array('jquery'), '1.0', true);
    wp_enqueue_script('crypterium-blog-settings', get_template_directory_uri() . '/framework/js/framework-blog-settings.js',array('jquery'), '1.0', true);

    wp_enqueue_script('crypterium-main', get_template_directory_uri() . '/js/main.js',array('jquery'), '1.0', true);
    wp_enqueue_script('crypterium-theme-calc', get_template_directory_uri() . '/js/calc.js',array('jquery'), '1.0', true);

    wp_enqueue_script('device', get_template_directory_uri() . '/js/device.min.js',array('jquery'), '1.0', false);
    wp_add_inline_script( 'device',
    'var _html = document.documentElement,
    isTouch = (("ontouchstart" in _html) || (navigator.msMaxTouchPoints > 0) || (navigator.maxTouchPoints))
    _html.className = _html.className.replace("no-js", "js")
    isTouch ? _html.classList.add("touch") : _html.classList.add("no-touch")
    ',false );

    // included for theme calc parts
    wp_enqueue_script( 'jquery-ui-core' );
    wp_enqueue_script( 'jquery-ui-autocomplete' );

    // IE fixers
    wp_enqueue_script( 'modernizr', get_template_directory_uri() . '/framework/js/modernizr.min.js',array('jquery'), '1,0', false );
    wp_script_add_data('modernizr', 'conditional', 'lt IE 9' );
    wp_enqueue_script( 'respond', get_template_directory_uri() . '/framework/js/respond.min.js',array('jquery'), '1.0', false );
    wp_script_add_data('respond', 'conditional', 'lt IE 9' );
    wp_enqueue_script( 'html5shiv', get_template_directory_uri() . '/js/html5shiv.min.js',array('jquery'), '1.0', false );
    wp_script_add_data('html5shiv', 'conditional', 'lt IE 9' );

}
add_action( 'wp_enqueue_scripts', 'crypterium_scripts' );


/*************************************************
## Admin style and scripts
*************************************************/

function crypterium_admin_style() {

    // Update CSS within in Admin
    wp_enqueue_style( 'crypterium-custom-admin', get_template_directory_uri() . '/framework/css/framework-admin.css');
    wp_enqueue_script('crypterium-custom-admin', get_template_directory_uri() . '/framework/js/framework-custom.admin.js');

}
add_action('admin_enqueue_scripts', 'crypterium_admin_style');


/*************************************************
## Theme option & Metaboxes & shortcodes
*************************************************/

// Theme wpbakery page builder shortcodes settings
if(function_exists('vc_set_as_theme')) {

    require_once get_template_directory() . '/includes/vc-shortcodes.php';
    require_once get_template_directory() . '/includes/vc-custom-settings.php';

    vc_set_as_theme( $disable_updater = false );
    vc_is_updater_disabled();

}

// Metabox plugin check
if ( ! function_exists( 'rwmb_meta' ) ) {

    function rwmb_meta( $key, $args = '', $post_id = null ) {
        return false;
    }

}

// Option tree controllers
if ( ! class_exists( 'OT_Loader' )){

    function ot_get_option() {
        return false;
    }

}

// Theme post and page meta plugin for customization and more features
include get_template_directory() . '/includes/page-metaboxes.php';

// Theme css setting file
include get_template_directory() . '/includes/custom-style.php';

// Theme parts
include get_template_directory() . '/includes/template-parts.php';

// TGM plugin activation
include get_template_directory() . '/includes/class-tgm-plugin-activation.php';


// add filter for  options panel loader
add_filter( 'ot_show_pages', '__return_false' );
add_filter( 'ot_show_new_layout', '__return_false' );

// Theme options admin panel setings file
include get_template_directory() . '/includes/theme-options.php';

/*************************************************
## Default Categories Widget
*************************************************/

function crypterium_add_span_cat_count($links) {

    $links = str_replace('</a> (', '</a> <span class="widget-list-span">(', $links);
    $links = str_replace(')', ')</span>', $links);

    return $links;

}
add_filter('wp_list_categories', 'crypterium_add_span_cat_count');


/*************************************************
## Excerpt Filter
*************************************************/

function crypterium_custom_excerpt_more( $more ) {
    return '...';
}
add_filter( 'excerpt_more', 'crypterium_custom_excerpt_more' );

/*************************************************
## Theme Setup
*************************************************/

if ( ! isset( $content_width ) ) $content_width = 960;

function crypterium_theme_setup() {


    // Add default posts and comments RSS feed links to head.
    add_theme_support( 'automatic-feed-links' );

    /*
    * Enable support for Post Thumbnails on posts and pages.
    *
    * See: https://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
    */
    add_theme_support( 'post-thumbnails' );

    // WooCommerce
    if ( class_exists( 'woocommerce' ) ) {
        add_theme_support( 'woocommerce' );
        add_theme_support( 'wc-product-gallery-zoom' );
        add_theme_support( 'wc-product-gallery-lightbox' );
        add_theme_support( 'wc-product-gallery-slider' );
    }

    // theme standarts
    add_theme_support( 'title-tag' );
    add_theme_support( 'custom-background' );
    add_theme_support( 'custom-header' );
    add_theme_support( 'html5', array( 'search-form' ) );

    /*
    * Enable support for Post Formats.
    *
    * See: https://codex.wordpress.org/Post_Formats
    */
    add_theme_support( 'post-formats', array('gallery', 'quote', 'chat', 'link', 'status', 'video', 'aside', 'audio'));

    // add_post_type_support( 'portfolio', 'post-formats' );

    // Make theme available for translation
    // Translations can be filed in the /languages/ directory
    load_theme_textdomain( 'crypterium', get_theme_file_path() . '/languages' );

    register_nav_menus( array(
        'primary' => esc_html__( 'Primary Menu', 'crypterium' ),
        'primary2' => esc_html__( 'Primary 2 Menu', 'crypterium' ),
        'primary3' => esc_html__( 'Primary 3 Menu', 'crypterium' ),
        'primary4' => esc_html__( 'Primary 4 Menu', 'crypterium' ),
    ) );

}
add_action( 'after_setup_theme', 'crypterium_theme_setup' );


/*************************************************
## HEADER SEARCH FORM
*************************************************/

function crypterium_custom_search_form( $form ) {
    $form = '<div class="c-sidebar-1-search">
    <form class="c-sidebar-1-search-form" role="search" method="get" id="searchform" action="' . esc_url( home_url( '/' ) ) . '" >
    <input class="c-sidebar-1-search-field" type="text" value="' . get_search_query() . '" placeholder="'. esc_attr__( 'Search for...', 'crypterium' ) .'" name="s" id="s" >
    <button class="c-sidebar-1-search-button" id="searchsubmit" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
    </form>
    </div>';

    return $form;
}
add_filter( 'get_search_form', 'crypterium_custom_search_form' );

/*************************************************
## add custom post types in arciheve
*************************************************/

function crypterium_add_custom_types( $query ) {
    if( is_category() || is_tag() && empty( $query->query_vars['suppress_filters'] ) ) {
        $query->set( 'post_type', array(
            'post', 'nav_menu_item', 'portfolio'
        ));
        return $query;
    }
}
add_filter( 'pre_get_posts', 'crypterium_add_custom_types' );

/*************************************************
## CUSTOM BODY CLASS
*************************************************/

function crypterium_body_theme_classes($classes) {

    $theme_name =  'Ninetheme-' . wp_get_theme();
    $theme_version =  'Ninetheme-Version-' . wp_get_theme()->get( 'Version' );

    $classes[] =  $theme_name;
    $classes[] =  $theme_version;

    return $classes;
}
add_filter('body_class','crypterium_body_theme_classes');

/*************************************************
## CUSTOM HTML CLASS
*************************************************/

add_filter( 'language_attributes', 'crypterium_add_no_js_class_to_html_tag', 10, 2 );
/**
https://gist.github.com/nickdavis/73d91d674b843b77a1cd0a21f9c0353a
* Add 'no-js' class to <html> tag in order to work with Modernizr.
*
* (Modernizr will change class to 'js' if JavaScript is supported).
*
* @since 1.0.0
*
* @param string $output A space-separated list of language attributes.
* @param string $doctype The type of html document (xhtml|html).
*
* @return string $output A space-separated list of language attributes.
*/
function crypterium_add_no_js_class_to_html_tag( $output, $doctype ) {
    if ( 'html' !== $doctype ) {
        return $output;
    }
    $output .= ' class="no-js"';
    return $output;
}

/*************************************************
## CUSTOM BODY POST CLASS
*************************************************/

function crypterium_post_theme_class($classes) {

    $crypterium_blog_style = ot_get_option( 'blog_style' );
    $masonrycolumn = ot_get_option( 'blog_masonrycolumn' );
    $column = ( $masonrycolumn != '' ) ? $masonrycolumn : 4;
    $class ='';
    $class = $crypterium_blog_style == '1' OR $crypterium_blog_style == '' ? 'c-blog-1-item  crypterium-post-class' : '';

    if( is_home() OR is_front_page() ){}

        $classes[] = $class;

        return $classes;
}
add_filter('post_class','crypterium_post_theme_class');

// pagination next page attributes
function crypterium_posts_next_pag_attrs() {
    return 'class="c-pagination-1-link -next"';
}
add_filter('next_posts_link_attributes', 'crypterium_posts_next_pag_attrs');

// pagination prev page attributes
function crypterium_posts_prev_pag_attrs() {
    return 'class="c-pagination-1-link -previous"';
}
add_filter('previous_posts_link_attributes', 'crypterium_posts_prev_pag_attrs');

/*************************************************
## Widget columns
*************************************************/

function crypterium_widgets_init() {

    //Widgetize footer settings
    $footer_widget1_display = ot_get_option('crypterium_footer_widget1_display');
    $footer_widget1_column = ot_get_option('crypterium_footer_widget1_column');
    $footer_widget2_display = ot_get_option('crypterium_footer_widget2_display');
    $footer_widget2_column = ot_get_option('crypterium_footer_widget2_column');
    $footer_widget3_display = ot_get_option('crypterium_footer_widget3_display');
    $footer_widget3_column = ot_get_option('crypterium_footer_widget3_column');
    $footer_widget4_display = ot_get_option('crypterium_footer_widget4_display');
    $footer_widget4_column = ot_get_option('crypterium_footer_widget4_column');

    register_sidebar( array(
        'name' => esc_html__( 'General Sidebar', 'crypterium' ),
        'id' => 'sidebar-1',
        'description' => esc_html__( 'These widgets for the all inner pages.','crypterium' ),
        'before_widget' => '<div class="c-sidebar-1-widget  %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="c-sidebar-1-widget-title"><span>',
        'after_title' => '</span></h4>'
    ) );
    register_sidebar( array(
        'name' => esc_html__( 'Blog Index Page Sidebar', 'crypterium' ),
        'id' => 'crypterium_blog_sidebar',
        'description' => esc_html__( 'These widgets for the all inner pages.','crypterium' ),
        'before_widget' => '<div class="c-sidebar-1-widget  %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="c-sidebar-1-widget-title"><span>',
        'after_title' => '</span></h4>'
    ) );

    register_sidebar( array(
        'name' => esc_html__( 'Blog Single Page Sidebar', 'crypterium' ),
        'id' => 'crypterium_single_sidebar',
        'description' => esc_html__( 'These widgets for the blog single page.','crypterium' ),
        'before_widget' => '<div class="c-sidebar-1-widget  %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="c-sidebar-1-widget-title"><span>',
        'after_title' => '</span></h4>'
    ) );

    register_sidebar( array(
        'name' => esc_html__( 'Default Page Template Sidebar', 'crypterium' ),
        'id' => 'crypterium_page_sidebar',
        'description' => esc_html__( 'These widgets for the default pages.','crypterium' ),
        'before_widget' => '<div class="c-sidebar-1-widget  %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="c-sidebar-1-widget-title"><span>',
        'after_title' => '</span></h4>'
    ) );

    register_sidebar( array(
        'name' => esc_html__( 'Error Page Sidebar', 'crypterium' ),
        'id' => 'crypterium_error_sidebar',
        'description' => esc_html__( 'These widgets for the error/404 page.','crypterium' ),
        'before_widget' => '<div class="c-sidebar-1-widget  %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="c-sidebar-1-widget-title"><span>',
        'after_title' => '</span></h4>'
    ) );

    register_sidebar( array(
        'name' => esc_html__( 'Search Page Sidebar', 'crypterium' ),
        'id' => 'crypterium_search_sidebar',
        'description' => esc_html__( 'These widgets for the search page.','crypterium' ),
        'before_widget' => '<div class="c-sidebar-1-widget  %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="c-sidebar-1-widget-title"><span>',
        'after_title' => '</span></h4>'
    ) );

    register_sidebar( array(
        'name' => esc_html__( 'Archive Page Sidebar', 'crypterium' ),
        'id' => 'crypterium_archive_sidebar',
        'description' => esc_html__( 'These widgets for the archive page.','crypterium' ),
        'before_widget' => '<div class="c-sidebar-1-widget  %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="c-sidebar-1-widget-title"><span>',
        'after_title' => '</span></h4>'
    ) );

    register_sidebar( array(
        'name' => esc_html__( 'Woocommerce Shop Page Sidebar', 'crypterium' ),
        'id' => 'crypterium_woocommerce_page_sidebar',
        'description' => esc_html__( 'These widgets for the WooCommerce shop products page.','crypterium' ),
        'before_widget' => '<div class="c-sidebar-1-widget  %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="c-sidebar-1-widget-title"><span>',
        'after_title' => '</span></h4>'
    ) );


    register_sidebar( array(
        'name' => esc_html__( 'Woocommerce Single Page Sidebar', 'crypterium' ),
        'id' => 'crypterium_woocommerce_single_sidebar',
        'description' => esc_html__( 'These widgets for the WooCommerce single product page.','crypterium' ),
        'before_widget' => '<div class="c-sidebar-1-widget  %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="c-sidebar-1-widget-title"><span>',
        'after_title' => '</span></h4>'
    ) );

    //widgetize footer column and display settings
    if( $footer_widget1_display !=='off' AND $footer_widget1_column !='' ){
        register_sidebar( array(
            'name' => esc_html__( 'Footer Widget Area 1', 'crypterium' ),
            'id' => 'crypterium_footer_widget_1',
            'description' => esc_html__( 'Theme footer widget area first column.','crypterium' ),
            'before_widget' => '<div class="col col--sm-10 col--md-8 col--lg-'.esc_attr($footer_widget1_column).'"><div class="widget %2$s">',
            'after_widget' => '</div></div>',
            'before_title' => '<h4 class="__title">',
            'after_title' => '</h4>'
        ) );
    }
    if( $footer_widget2_display !=='off' AND $footer_widget2_column !='' ){
        register_sidebar( array(
            'name' => esc_html__( 'Footer Widget Area 2', 'crypterium' ),
            'id' => 'crypterium_footer_widget_2',
            'description' => esc_html__( 'Theme footer widget area second column.','crypterium' ),
            'before_widget' => '<div class="col--xl-offset-1 col col--sm-10 col--md-8 col--lg-'.esc_attr($footer_widget2_column).'"><div class="widget %2$s">',
            'after_widget' => '</div></div>',
            'before_title' => '<h4 class="__title">',
            'after_title' => '</h4>'
        ) );
    }
    if( $footer_widget3_display !='off' AND $footer_widget3_column !='' ){
        register_sidebar( array(
            'name' => esc_html__( 'Footer Widget Area 3', 'crypterium' ),
            'id' => 'crypterium_footer_widget_3',
            'description' => esc_html__( 'Theme footer widget area third column.','crypterium' ),
            'before_widget' => '<div class=" col--xl-4 col col--sm-10 col--md-8 col--lg-'.esc_attr($footer_widget3_column).'"><div class="widget %2$s">',
            'after_widget' => '</div></div>',
            'before_title' => '<h4 class="__title">',
            'after_title' => '</h4>'
        ) );
    }
}
add_action( 'widgets_init', 'crypterium_widgets_init' );


/*************************************************
## Include the TGM_Plugin_Activation class.
*************************************************/

function crypterium_register_required_plugins() {

    $url = 'https://ninetheme.com/documentation';

    $plugins = array(
        array(
            'name' => esc_html__('Breadcrumb NavXT', "crypterium"),
            'slug' => 'breadcrumb-navxt',
        ),
        array(
            'name' => esc_html__('Contact Form 7', "crypterium"),
            'slug' => 'contact-form-7',
        ),
        array(
            'name' => esc_html__('Classic Editor', "crypterium"),
            'slug' => 'classic-editor',
        ),
        array(
            'name' => esc_html__('Meta Box', "crypterium"),
            'slug' => 'meta-box',
            'required' => true,
        ),
        array(
            'name' => esc_html__('Theme Options Panel', "crypterium"),
            'slug' => 'option-tree',
            'required' => true,
        ),
        array(
            'name' => esc_html__('Metabox Tabs', "crypterium"),
            'slug' => 'meta-box-tabs',
            'source' => 'https://ninetheme.com/documentation/plugins/meta-box-tabs.zip',
            'required' => true,
            'version' => '1.1.5',
        ),
        array(
            'name' => esc_html__('Metabox Show/Hide', "crypterium"),
            'slug' => 'meta-box-show-hide',
            'source' => 'https://ninetheme.com/documentation/plugins/meta-box-show-hide.zip',
            'required' => true,
            'version' => '1.3',
        ),
        array(
            'name' => esc_html__('Envato Auto Update Theme', "crypterium"),
            'slug' => 'envato-market',
            'source' => 'https://ninetheme.com/documentation/plugins/envato-market.zip',
            'required' => false,
            'version' => '2.0.3',
        ),
        array(
            'name' => esc_html__('Page Builder', "crypterium"),
            'slug' => 'js_composer',
            'source' => 'https://ninetheme.com/documentation/plugins/js_composer.zip',
            'required' => true,
        ),
        array(
            'name' => esc_html__('Revolution Slider', "crypterium"),
            'slug' => 'revolution_slider',
            'source' => 'https://ninetheme.com/documentation/plugins/revolution_slider.zip',
            'required' => false,
        ),
        array(
            'name' => esc_html__('WP Crypterium Shortcodes', "crypterium"),
            'slug' => 'nt-theme-shortcodes',
            'source' => get_template_directory() . '/plugins/nt-theme-shortcodes.zip',
            'required' => true,
            'version' => '1.5.0',
        )
    );

    $config = array(
        'id' => 'tgmpa',
        'default_path' => '',
        'menu' => 'tgmpa-install-plugins',
        'parent_slug' => apply_filters( 'ninetheme_parent_slug', 'themes.php' ),
        'has_notices' => true,
        'dismissable' => true,
        'dismiss_msg' => '',
        'is_automatic' => true,
        'message' => '',
    );

    tgmpa( $plugins, $config );
}

add_action( 'tgmpa_register', 'crypterium_register_required_plugins' );


/*************************************************
## Navigation Customization
*************************************************/

function crypterium_sanitize_pagination($content) {

    // Remove role attribute
    $content = str_replace('role="navigation"', '', $content);

    // Remove h2 tag
    $content = preg_replace('#<h2.*?>(.*?)<\/h2>#si', '', $content);

    return $content;
}

add_action('navigation_markup_template', 'crypterium_sanitize_pagination');


/*************************************************
## Register Menu
*************************************************/

class Crypterium_Wp_Bootstrap_Navwalker extends Walker_Nav_Menu {
    /**
    * @see Walker::start_lvl()
    * @since 3.0.0
    */
    public function start_lvl( &$output, $depth = 0, $args = array() ) {
        $indent = str_repeat( "\t", $depth );
        $output .= "\n$indent<ul class=\"submenu\">\n";
    }

    /**
    * @see Walker::start_el()
    * @since 3.0.0
    */
    public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
        $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

        /**
        * Dividers, Headers or Disabled
        */
        if ( strcasecmp( $item->attr_title, 'divider' ) == 0 && $depth === 1 ) {
            $output .= $indent . '<li role="presentation" class="divider item-has-children has-submenu">';
        } else if ( strcasecmp( $item->title, 'divider') == 0 && $depth === 1 ) {
            $output .= $indent . '<li role="presentation" class="divider item-has-children has-submenu">';
        } else if ( strcasecmp( $item->attr_title, 'dropdown-header item-has-children') == 0 && $depth === 1 ) {
            $output .= $indent . '<li role="presentation" class="dropdown-header item-has-children has-submenu">' . esc_html( $item->title );
        } else if ( strcasecmp($item->attr_title, 'disabled' ) == 0 ) {
            $output .= $indent . '<li role="presentation" class="disabled"><a href="#">' . esc_html( $item->title ) . '</a>';
        } else {

            $class_names = $value = '';

            $classes = empty( $item->classes ) ? array() : (array) $item->classes;
            $classes[] = 'menu-item-' . $item->ID;

            $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );


            if($args->has_children && $depth === 0) {
                $class_names .= ' has-submenu item-has-children';
            }elseif($args->has_children && $depth > 0) {
                $class_names .= ' has-submenu ';
            }
            if ( in_array( 'current-menu-item', $classes ) )
            $class_names .= ' active';

            $class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

            $id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
            $id = $id ? ' id="' . esc_attr( $id ) . '"' : '';

            $output .= $indent . '<li' . $id . $value . $class_names .'>';

            $atts = array();
            $atts['title']  = ! empty( $item->title )	? $item->title	: '';
            $atts['target'] = ! empty( $item->target )	? $item->target	: '';
            $atts['rel']    = ! empty( $item->xfn )		? $item->xfn	: '';

            // If item has_children add atts to a.
            if ( $args->has_children && $depth === 0 ) {
                $atts['href']   		= $item->url;
            } else {
                $atts['href'] = ! empty( $item->url ) ? $item->url : '';
            }

            $atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args );

            $attributes = '';
            foreach ( $atts as $attr => $value ) {
                if ( ! empty( $value ) ) {
                    $value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
                    $attributes .= ' ' . $attr . '="' . $value . '"';
                }
            }

            $item_output = $args->before;

            /*
            * Glyphicons
            **/
            if ( ! empty( $item->attr_title ) )
            $item_output .= '<a'. $attributes .'><span class=" ' . esc_attr( $item->attr_title ) . '"></span>&nbsp;';
            else
            $item_output .= '<a '. $attributes .'>';

            $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
            $item_output .= ( $args->has_children && 0 === $depth ) ? '</a>' : '</a>';
            $item_output .= $args->after;

            $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
        }
    }

    /**
    * Traverse elements to create list from elements.
    **/
    public function display_element( $element, &$children_elements, $max_depth, $depth, $args, &$output ) {
        if ( ! $element )
        return;

        $id_field = $this->db_fields['id'];

        // Display this element.
        if ( is_object( $args[0] ) )
        $args[0]->has_children = ! empty( $children_elements[ $element->$id_field ] );

        parent::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );
    }

    /**
    * Menu Fallback
    **/
    public static function fallback( $args ) {
        if ( current_user_can( 'manage_options' ) ) {

            extract( $args );

            $fb_output = null;

            if ( $container ) {
                $fb_output = '<' . $container;

                if ( $container_id )
                $fb_output .= ' id="' . $container_id . '"';

                if ( $container_class )
                $fb_output .= ' class="' . $container_class . '"';

                $fb_output .= '>';
            }

            $fb_output .= '<ul';

            if ( $menu_id )
            $fb_output .= ' id="' . $menu_id . '"';

            if ( $menu_class )
            $fb_output .= ' class="' . $menu_class . '"';

            $fb_output .= '>';
            $fb_output .= '<li><a href="' . esc_url( admin_url( 'nav-menus.php' ) ) . '">' . esc_html__('Add a menu','crypterium') .'</a></li>';
            $fb_output .= '</ul>';

            if ( $container )
            $fb_output .= '</' . $container . '>';

            echo wp_kses( $fb_output, crypterium_allowed_html() );
        }
    }
}

// Unset URL from comment form
function crypterium_move_comment_form_below( $fields ) {
    $comment_field = $fields['comment'];
    unset( $fields['comment'] );
    $fields['comment'] = $comment_field;
    return $fields;
}
add_filter( 'comment_form_fields', 'crypterium_move_comment_form_below' );

// control comment form partials
function crypterium_move_modify_comment_form_fields($fields){

    $commenter = wp_get_current_commenter();
    $req = get_option( 'require_name_email' );
    $aria_req = ( $req ? " aria-required='true'" : '' );

    $fields['author'] = '<div class="row"><div class="col col--sm-4">' . '<input
    class="c-form-input"
    id="author"
    placeholder="'.esc_attr__('Your Name (No Keywords)','crypterium').'"
    name="author"
    type="text"
    value="' . esc_attr( $commenter['comment_author'] ) . '"
    size="30"' . $aria_req . '
    required />'. '</div>';
    $fields['email'] = '<div class="col col--sm-4">' . '<input
    class="c-form-input"
    id="email"
    placeholder="'.esc_attr__('your-real-email@example.com','crypterium').'"
    name="email"
    type="text"
    value="' . esc_attr(  $commenter['comment_author_email'] ) . '"
    size="30"' . $aria_req . '
    required/>' . '</div>';
    $fields['url'] = '<div class="col col--sm-4">' .
    '<input
    class="c-form-input" id="url"
    name="url"
    placeholder="'.esc_attr__('http://your-domain.com','crypterium').'"
    type="text"
    value="' . esc_attr( $commenter['comment_author_url'] ) . '"
    size="30"
    required/> ' . '</div></div>';

    return $fields;
}
add_filter('comment_form_default_fields','crypterium_move_modify_comment_form_fields');

// add classes comment form button
function crypterium_addclass_form_button( $arg ) {
    // $arg contains all the comment form defaults
    // simply redefine one of the existing array keys to change the comment form
    // see http://codex.wordpress.org/Function_Reference/comment_form for a list
    // of array keys
    // add Foundation classes to the button class
    $arg['class_submit'] = 'c-button-1 -color-green-outline -hover-green-default -size-small -corner-circle';
    // return the modified array
    return $arg;
}
// run the comment form defaults through the newly defined filter
add_filter( 'comment_form_defaults', 'crypterium_addclass_form_button' );

// add classes comment form replay link
function crypterium_replace_reply_link_class($class){
    $class = str_replace("class='c-comments-1-reply", "class='reply xxx", $class);
    return $class;
}
add_filter('comment_reply_link', 'crypterium_replace_reply_link_class');

// mce span fix
function crypterium_override_mce_options($initArray) {
    $opts = '*[*]';
    $initArray['valid_elements'] = $opts;
    $initArray['extended_valid_elements'] = $opts;
    return $initArray;
}
add_filter('tiny_mce_before_init', 'crypterium_override_mce_options');


/*************************************************
## OPTION TREE WEBFONTS API
*************************************************/

add_filter( 'ot_google_fonts_api_key', 'crypterium_change_ot_google_fonts_api_key' );

function crypterium_change_ot_google_fonts_api_key( $key ) {

    $api = ot_get_option( 'google_fonts' );
    return "$api";

}


/*************************************************
## ADMIN NOTICES
*************************************************/


function crypterium_theme_activation_notice()
{
    global $current_user;

    $user_id = $current_user->ID;

    if (!get_user_meta($user_id, 'crypterium_theme_activation_notice')) {
        ?>
        <div class="updated notice">
            <p>
                <?php
                echo sprintf(
                    esc_html__('If you need help about demodata installation, please read docs and %s', 'crypterium'),
                    '<a target="_blank" href="' . esc_url('https://ninetheme.com/contact/') . '">' . esc_html__('Open a ticket', 'crypterium') . '</a>
                    ' . esc_html__('or', 'crypterium') . ' <a href="' . esc_url( wp_nonce_url( add_query_arg( 'crypterium-ignore-notice', 'dismiss_admin_notices' ), 'crypterium-dismiss-' . get_current_user_id() ) ) . '">' . esc_html__('Dismiss this notice', 'crypterium') . '</a>');
                    ?>
            </p>
        </div>
        <?php
    }
}
add_action('admin_notices', 'crypterium_theme_activation_notice');

function crypterium_theme_activation_notice_ignore()
{
    global $current_user;

    $user_id = $current_user->ID;

    if (isset($_GET['crypterium-ignore-notice'])) {
        add_user_meta($user_id, 'crypterium_theme_activation_notice', 'true', true);
    }
}
add_action('admin_init', 'crypterium_theme_activation_notice_ignore');


/*************************************************
## SANITIZE MODIFIED VC-ELEMENTS OUTPUT
*************************************************/


if (!function_exists('crypterium_vc_sanitize_data')) {
    function crypterium_vc_sanitize_data($html_data)
    {
        return $html_data;
    }
}



/*************************************************
## VC COMPOSER PAGE CSS
*************************************************/
/*
*	get vc composer custom css from by page id
*	and add css to head by wp_head hook
*/
if( ! function_exists('crypterium_vc_inject_shortcode_css') )  {
    function crypterium_vc_inject_shortcode_css( $id ){
        $shortcodes_custom_css = get_post_meta( $id, '_wpb_shortcodes_custom_css', true );
        if ( ! empty( $shortcodes_custom_css ) ) {
            $shortcodes_custom_css = strip_tags( $shortcodes_custom_css );
            echo '<style type="text/css" data-type="nt-shortcodes-custom-css-page-'.$id.'">';
            echo esc_attr( $shortcodes_custom_css );
            echo '</style>';
        }
    }
    add_action('wp_head', 'crypterium_vc_inject_shortcode_css');
}

/**********************************
## THEME ALLOWED HTML TAG
/**********************************/

if (! function_exists('crypterium_allowed_html')) {
    function crypterium_allowed_html()
    {
        $allowed_tags = array(
            'a' => array(
                'class' => array(),
                'href' => array(),
                'rel' => array(),
                'title' => array(),
                'target' => array(),
            ),
            'abbr' => array(
                'title' => array(),
            ),
            'iframe' => array(
                'src' => array(),
            ),
            'b' => array(),
            'br' => array(),
            'blockquote' => array(
                'cite' => array(),
            ),
            'cite' => array(
                'title' => array(),
            ),
            'code' => array(),
            'del' => array(
                'datetime' => array(),
                'title' => array(),
            ),
            'dd' => array(),
            'div' => array(
                'class' => array(),
                'title' => array(),
                'style' => array(),
            ),
            'dl' => array(),
            'dt' => array(),
            'em' => array(),
            'h1' => array(),
            'h2' => array(),
            'h3' => array(),
            'h4' => array(),
            'h5' => array(),
            'h6' => array(),
            'i' => array(
                'class' => array(),
            ),
            'img' => array(
                'alt'    => array(),
                'class' => array(),
                'height' => array(),
                'src'    => array(),
                'width' => array(),
            ),
            'li' => array(
                'class' => array(),
            ),
            'ol' => array(
                'class' => array(),
            ),
            'p' => array(
                'class' => array(),
            ),
            'q' => array(
                'cite' => array(),
                'title' => array(),
            ),
            'span' => array(
                'class' => array(),
                'title' => array(),
                'style' => array(),
            ),
            'strike' => array(),
            'strong' => array(),
            'ul' => array(
                'class' => array(),
            ),
        );

        return $allowed_tags;
    }
}


/*************************************************
## THEME SETUP WIZARD
https://github.com/richtabor/MerlinWP
*************************************************/

require_once get_parent_theme_file_path( '/includes/merlin/admin-menu.php' );
require_once get_parent_theme_file_path( '/includes/merlin/class-merlin.php' );
require_once get_parent_theme_file_path( '/includes/demo-wizard-config.php' );

function crypterium_local_import_files() {
    return array(
        array(
            'import_file_name' => esc_html__( 'Demo Import', 'crypterium' ),
            'local_import_file' => get_parent_theme_file_path( '/includes/merlin/demodata/data.xml' ),
            'local_import_widget_file' => get_parent_theme_file_path( '/includes/merlin/demodata/widgets.wie' ),
            'local_import_option_tree_file' => get_parent_theme_file_path( '/includes/merlin/demodata/optiontree.txt' ),
        ),
    );
}
add_filter( 'merlin_import_files', 'crypterium_local_import_files' );

function crypterium_disable_size_images_during_import() {
    add_filter( 'intermediate_image_sizes_advanced', function( $sizes ){
        unset( $sizes['thumbnail'] );
        unset( $sizes['medium'] );
        unset( $sizes['medium_large'] );
        unset( $sizes['large'] );
        unset( $sizes['1536x1536'] );
        unset( $sizes['2048x2048'] );
        unset( $sizes['woocommerce_thumbnail'] );
        unset( $sizes['woocommerce_single'] );
        unset( $sizes['woocommerce_gallery_thumbnail'] );
        unset( $sizes['shop_catalog'] );
        unset( $sizes['shop_single'] );
        unset( $sizes['shop_thumbnail'] );
        return $sizes;
    });
}
add_action( 'import_start', 'crypterium_disable_size_images_during_import');

/**
* Execute custom code after the whole import has finished.
*/
function crypterium_merlin_after_import_setup() {

    // Assign menus to their locations.
    $primary = get_term_by( 'name', 'Primary Menu', 'nav_menu' );

    set_theme_mod(
        'nav_menu_locations', array(
            'primary' => $primary->term_id,
        )
    );
    $front_page_id = get_page_by_title( 'Agency' );
    $blog_page_id  = get_page_by_title( 'Blog' );

    update_option( 'show_on_front', 'page' );
    update_option( 'page_on_front', $front_page_id->ID );
    update_option( 'page_for_posts', $blog_page_id->ID );

}
add_action( 'merlin_after_all_import', 'crypterium_merlin_after_import_setup' );

add_action('init', 'do_output_buffer'); function do_output_buffer() { ob_start(); }

//woocommerce merlin stop code
add_filter( 'woocommerce_prevent_automatic_wizard_redirect', '__return_true' );

/*************************************************
## CUSTOM POST CLASS
*************************************************/

if (! function_exists('crypterium_post_theme_class')) {
    function crypterium_post_theme_class($classes)
    {

        if ( is_single() ) {
            $classes[] =  has_blocks() ? 'nt-single-has-block' : '';
        }

        return $classes;
    }
    add_filter('post_class', 'crypterium_post_theme_class');
}

add_action('admin_notices', 'crypterium_notice_for_activation');
if (!function_exists('crypterium_notice_for_activation')) {
    function crypterium_notice_for_activation() {
        global $pagenow;

        if ( !get_option('envato_purchase_code_22127776') ) {

            echo '<div class="notice notice-warning">
                <p>' . sprintf(
                esc_html__( 'Enter your Envato Purchase Code to receive agro Theme and plugin updates  %s', 'crypterium' ),
                '<a href="' . admin_url('admin.php?page=merlin&step=license') . '">' . esc_html__( 'Enter Purchase Code', 'crypterium' ) . '</a>') . '</p>
            </div>';
        }
    }
}


if ( !get_option('envato_purchase_code_22127776') ) {
    add_filter('auto_update_theme', '__return_false');
}

add_action('upgrader_process_complete', 'crypterium_upgrade_function', 10, 2);
if ( !function_exists('crypterium_upgrade_function') ) {
    function crypterium_upgrade_function($upgrader_object, $options) {
        $purchase_code = get_option('envato_purchase_code_22127776');

        if (($options['action'] == 'update' && $options['type'] == 'theme') && !$purchase_code) {
            wp_redirect(admin_url('admin.php?page=merlin&step=license'));
        }
    }
}

if ( !function_exists( 'crypterium_is_theme_registered') ) {
    function crypterium_is_theme_registered() {
        $purchase_code = get_option('envato_purchase_code_22127776');
        $registered_by_purchase_code = !empty($purchase_code);

        // Purchase code entered correctly.
        if ($registered_by_purchase_code) {
            return true;
        }
    }
}

function crypterium_deactivate_envato_plugin() {
    if (  function_exists( 'envato_market' ) && !get_option('envato_purchase_code_22127776') ) {
        deactivate_plugins('envato-market/envato-market.php');
    }
}
add_action( 'admin_init', 'crypterium_deactivate_envato_plugin' );
