<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

/**
 * Shortcode attributes
 * @var $atts
 * @var $el_class
 * @var $full_width
 * @var $full_height
 * @var $equal_height
 * @var $columns_placement
 * @var $content_placement
 * @var $parallax
 * @var $parallax_image
 * @var $css
 * @var $el_id
 * @var $video_bg
 * @var $video_bg_url
 * @var $video_bg_parallax
 * @var $parallax_speed_bg
 * @var $parallax_speed_video
 * @var $content - shortcode content
 * Shortcode class
 * @var $this WPBakeryShortCode_VC_Row
*/

$el_class = $full_height = $parallax_speed_bg = $parallax_speed_video = $full_width = $equal_height = $flex_row = $columns_placement =
$content_placement = $parallax = $parallax_image = $css = $el_id = $video_bg = $video_bg_url = $video_bg_parallax = $overlaybg = $overlaybg2 =
$crypterium_bg_position = $crypterium_bg_onmobile = $crypterium_bg_onphone = $crypterium_vc_row_992_responsive = $crypterium_vc_row_768_responsive =
$crypterium_vc_row_480_responsive =  $crypterium_bg_ontablet = $crypterium_vc_row_overflow = $crypterium_row_classess =
$crypterium_row_bg_classess = $crypterium_vc_row_jarallax = $crypterium_vc_row_jarallax_speed = $p_img ='';

$disable_element 	= '';
$output 			= $after_output = '';
$atts 				= vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

wp_enqueue_script( 'wpb_composer_front_js' );

$el_class = $this->getExtraClass( $el_class );

$css_classes = array(
	'vc_row',
	'wpb_row', //deprecated
	'vc_row-fluid',
	$el_class,
	vc_shortcode_custom_css_class( $crypterium_vc_row_992_responsive ), // add class for media 992px
	vc_shortcode_custom_css_class( $crypterium_vc_row_768_responsive ),
	vc_shortcode_custom_css_class( $crypterium_vc_row_480_responsive ),
	vc_shortcode_custom_css_class( $css ),
);

if ( 'yes' === $disable_element ) {
	if ( vc_is_page_editable() ) {
		$css_classes[] = 'vc_hidden-lg vc_hidden-xs vc_hidden-sm vc_hidden-md';
	} else {
		return '';
	}
}

if ( 'hidden' === $crypterium_vc_row_overflow ) {
	$css_classes[] = 'overflow-none';
}

if (vc_shortcode_custom_css_has_property( $css, array('border', 'background') ) || $video_bg || $parallax) {
	$css_classes[]='vc_row-has-fill';
}

if (!empty($atts['gap'])) {
	$css_classes[] = 'vc_column-gap-'.$atts['gap'];
}

$wrapper_attributes = array();
// build attributes for wrapper
if ( ! empty( $el_id ) ) {
	$wrapper_attributes[] = 'id="' . esc_attr( $el_id ) . '"';
}
if ( ! empty( $full_width ) ) {
	$wrapper_attributes[] = 'data-vc-full-width="true"';
	$wrapper_attributes[] = 'data-vc-full-width-init="false"';
	if ( 'stretch_row_content' === $full_width ) {
		$wrapper_attributes[] = 'data-vc-stretch-content="true"';
	} elseif ( 'stretch_row_content_no_spaces' === $full_width ) {
		$wrapper_attributes[] = 'data-vc-stretch-content="true"';
		$css_classes[] = 'vc_row-no-padding';
	}
	$after_output .= '<div class="vc_row-full-width vc_clearfix"></div>';
}

if ( ! empty( $full_height ) ) {
	$css_classes[] = 'vc_row-o-full-height';
	if ( ! empty( $columns_placement ) ) {
		$flex_row = true;
		$css_classes[] = 'vc_row-o-columns-' . $columns_placement;
		if ( 'stretch' === $columns_placement ) {
			$css_classes[] = 'vc_row-o-equal-height';
		}
	}
}

if ( ! empty( $equal_height ) ) {
	$flex_row = true;
	$css_classes[] = 'vc_row-o-equal-height';
}

if ( ! empty( $content_placement ) ) {
	$flex_row = true;
	$css_classes[] = 'vc_row-o-content-' . $content_placement;
}

if ( ! empty( $flex_row ) ) {
	$css_classes[] = 'vc_row-flex';
}

$has_video_bg = ( ! empty( $video_bg ) && ! empty( $video_bg_url ) && vc_extract_youtube_id( $video_bg_url ) );

$parallax_speed = $parallax_speed_bg;
if ( $has_video_bg ) {
	$parallax = $video_bg_parallax;
	$parallax_speed = $parallax_speed_video;
	$parallax_image = $video_bg_url;
	$css_classes[] = 'vc_video-bg-container';
	wp_enqueue_script( 'vc_youtube_iframe_api_js' );
}

if ( ! empty( $parallax ) ) {

	$wrapper_attributes[] = 'data-vc-parallax="' . esc_attr( $parallax_speed ) . '"'; // parallax speed
	$css_classes[] = 'vc_general vc_parallax vc_parallax-' . $parallax;
	if ( false !== strpos( $parallax, 'fade' ) ) {
		$css_classes[] = 'js-vc_parallax-o-fade';
		$wrapper_attributes[] = 'data-vc-parallax-o-fade="on"';
	} elseif ( false !== strpos( $parallax, 'fixed' ) ) {
		$css_classes[] = 'js-vc_parallax-o-fixed';
	}
}

if ( $overlaybg != '' || $overlaybg2 != '' ) {
$css_classes[] = 'nt-theme-before-row';

}
if( $crypterium_bg_position != '' ) {
$css_classes[] = 'nt-theme-extra-row-bgposition-'.vc_shortcode_custom_css_class( $css ).'';
}

$crypterium_bg_ontablet  = ( $crypterium_bg_ontablet  != '' ) ? $crypterium_bg_ontablet  : 'show';
$crypterium_bg_onmobile  = ( $crypterium_bg_onmobile  != '' ) ? $crypterium_bg_onmobile  : 'show';
$crypterium_bg_onphone   = ( $crypterium_bg_onphone   != '' ) ? $crypterium_bg_onphone   : 'show';

if( $crypterium_bg_ontablet == 'hide' ) {
	$css_classes[] = 'row-bg-image-hide-992';
}
if( $crypterium_bg_onmobile == 'hide' ) {
	$css_classes[] = 'row-bg-image-hide-768';
}
if( $crypterium_bg_onphone == 'hide' ) {
	$css_classes[] = 'row-bg-image-hide-480';
}
if( $crypterium_row_classess != '' ) {
	$css_classes[] =  $crypterium_row_classess ;
}
if( $crypterium_row_bg_classess != '' ) {
	$css_classes[] =  $crypterium_row_bg_classess ;
}
if( $crypterium_vc_row_jarallax == 'yes' ) {
	$css_classes[] =  'jarallax' ;
	$wrapper_attributes[] = 'data-speed="' . esc_attr( $crypterium_vc_row_jarallax_speed ) . '"'; // parallax speed
}

if ( ! empty( $parallax_image ) ) {
	if ( $has_video_bg ) {
		$parallax_image_src = $parallax_image;
	} else {
		$parallax_image_id = preg_replace( '/[^\d]/', '', $parallax_image );
		$parallax_image_src = wp_get_attachment_image_src( $parallax_image_id, 'full' );
		if ( ! empty( $parallax_image_src[0] ) ) {
			$parallax_image_src = $parallax_image_src[0];
		}
	}
	$wrapper_attributes[] = 'data-vc-parallax-image="' . esc_attr( $parallax_image_src ) . '"';
}
if ( ! $parallax && $has_video_bg ) {
	$wrapper_attributes[] = 'data-vc-video-bg="' . esc_attr( $video_bg_url ) . '"';
}
$css_class = preg_replace( '/\s+/', ' ', apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, implode( ' ', array_filter( array_unique( $css_classes ) ) ), $this->settings['base'], $atts ) );
$wrapper_attributes[] = 'class="' . esc_attr( trim( $css_class ) ) . '"';


// custom code start

	$crypterium_992row=preg_replace('/.vc_custom_[0-9]*/',esc_attr( trim( vc_shortcode_custom_css_class( $css ) ) ),$crypterium_vc_row_992_responsive);
	$crypterium_768row=preg_replace('/.vc_custom_[0-9]*/',esc_attr( trim( vc_shortcode_custom_css_class( $css ) ) ),$crypterium_vc_row_768_responsive);
	$crypterium_480row=preg_replace('/.vc_custom_[0-9]*/',esc_attr( trim( vc_shortcode_custom_css_class( $css ) ) ),$crypterium_vc_row_480_responsive);

	$crypterium_bgpositiony = ( $crypterium_bg_positiony != '' ) ? $crypterium_bg_positiony : '';
	$crypterium_bgpositionx = ( $crypterium_bg_positionx != '' ) ? $crypterium_bg_positionx : '';
	$crypterium_bgxoffset   = ( $crypterium_bg_xoffset   != '' ) ? $crypterium_bg_xoffset   : '';
	$crypterium_bgsize      = ( $crypterium_bg_size      != '' ) ? $crypterium_bg_size      : '';

	$crypterium_bgposition = ( $crypterium_bg_position == 'custom' ) ? ''.$crypterium_bg_positionx.' '.$crypterium_bg_positiony.'' : $crypterium_bg_position;
	if ( $crypterium_vc_row_992_responsive != '' || $crypterium_vc_row_480_responsive != '' || $crypterium_bgposition != '' || $crypterium_bgsize != '' ) {
		$output .= '<style type="text/css" data-nt-theme="crypterium-vc-custom-css">';
			if ( $crypterium_vc_row_992_responsive != '' ) {$output .= ' @media only screen and (min-width: 768px) { '. $crypterium_vc_row_992_responsive .' }'; } // add strings via this value
			if ( $crypterium_vc_row_768_responsive != '' ) {$output .= ' @media only screen and (max-width: 768px) { '. $crypterium_vc_row_768_responsive .' }'; }
			if ( $crypterium_vc_row_480_responsive != '' ) {$output .= ' @media only screen and (max-width: 480px) { '. $crypterium_vc_row_480_responsive .' }'; }

			if ( $crypterium_bgposition != '' || $crypterium_bgsize != '' ) {
				$output .= '.vc_row.nt-theme-extra-row-bgposition-'.vc_shortcode_custom_css_class( $css ).'{';
					if( $crypterium_bgposition != '' ) { $output .= 'background-position:'.$crypterium_bgposition.' '.$crypterium_bgxoffset.'!important;'; }
					if( $crypterium_bgsize     != '' ) { $output .= 'background-size: '.$crypterium_bg_size.' !important;'; }
				$output .= '}';
			}
		$output .= '</style>';
	}

// custom code start - for container
if ( 'stretch_row' === $full_width ) { $output .= '<div class="grid grid--container">'; }
if ( empty($full_width) ) { $output .= '<div class="grid grid--container">'; }
// custom code end - for container

$output .= '<div ' . implode( ' ', $wrapper_attributes ) . '>';

if( $crypterium_vc_row_jarallax == 'yes' && $p_img ) {
    $image  = wp_get_attachment_url( $p_img,'full' );
    $lazsrc = function_exists( 'vc_is_inline' ) && vc_is_inline() ? ' src="'.$image.'"' : '';
    $output .= '<img class="jarallax-img lazy"'.$lazsrc.' data-src="'.$image.'"/>';
}

//OVERLAY1 OVERLAY2
if( $overlaybg != '' ) {

	$overlay_bg    = ( $overlaybg    != '' ) ? ' background:'.$overlaybg.';' 	: '';
	$overlay_width = ( $overlaywidth != '' ) ? ' width:'.$overlaywidth.';' 		: '';
	$overlay_height= ( $overlayheight!= '' ) ? ' height:'.$overlayheight.';' 	: '';
	$overlay_right = ( $overlayright != '' ) ? ' right:'.$overlayright.';' 		: '';
	$overlay_left  = ( $overlayleft  != '' ) ? ' left:'.$overlayleft.';' 		: '';
	$overlay_top   = ( $overlaytop   != '' ) ? ' top:'.$overlaytop.';' 			: '';
	$overlay_bottom= ( $overlaybottom!= '' ) ? ' bottom:'.$overlaybottom.';' 	: '';
	$overlay_992   = ( $overlay992 =='hide' ) ? ' disable-992' : '';
	$overlay_768   = ( $overlay768 =='hide' ) ? ' disable-768' : '';
	$overlay_480   = ( $overlay480 =='hide' ) ? ' disable-480' : '';
	$overlay_total_res  = ( $overlay_992 != '' || $overlay_768 != '' || $overlay_480 != '' ) ? $overlay_992.$overlay_768.$overlay_480 : '';

	$total_overlay = ' style="position:absolute!important;'.$overlay_bg.$overlay_width.$overlay_height.$overlay_right.$overlay_left.$overlay_top.$overlay_bottom.'"';
	$output .= '<div class="'.$overlay_total_res.' nt-theme-before-row-overlay nt-theme-before-row-'.vc_shortcode_custom_css_class( $css ).'" '.$total_overlay.'></div>';
}
if( $overlaybg2 != '' ) {

	$overlay_bg2    = ( $overlaybg2    != '' ) ? ' background:'.$overlaybg2.';' 	: '';
	$overlay_width2 = ( $overlaywidth2 != '' ) ? ' width:'.$overlaywidth2.';' 		: '';
	$overlay_height2= ( $overlayheight2!= '' ) ? ' height:'.$overlayheight2.';' 	: '';
	$overlay_right2 = ( $overlayright2 != '' ) ? ' right:'.$overlayright2.';' 		: '';
	$overlay_left2  = ( $overlayleft2  != '' ) ? ' left:'.$overlayleft2.';' 		: '';
	$overlay_top2   = ( $overlaytop2   != '' ) ? ' top:'.$overlaytop2.';' 			: '';
	$overlay_bottom2= ( $overlaybottom2!= '' ) ? ' bottom:'.$overlaybottom2.';' 	: '';
	$overlay2_992  	= ( $overlay2_992 =='hide' ) ? ' disable-992' : '';
	$overlay2_768  	= ( $overlay2_768 =='hide' ) ? ' disable-768' : '';
	$overlay2_480  	= ( $overlay2_480 =='hide' ) ? ' disable-480' : '';
	$overlay2_total_res  = ( $overlay2_992 != '' || $overlay2_768 != '' || $overlay2_480 != '' ) ? $overlay2_992.$overlay2_768.$overlay2_480 : '';
	$total_overlay2 = ' style="position:absolute!important;'.$overlay_bg2.$overlay_width2.$overlay_height2.$overlay_right2.$overlay_left2.$overlay_top2.$overlay_bottom2.'"';
	$output .= '<div class="'.$overlay2_total_res.' nt-theme-before-row-overlay2 nt-theme-before-row-'.vc_shortcode_custom_css_class( $css ).'" '.$total_overlay2.'></div>';
}

// custom code end

$output .= wpb_js_remove_wpautop( $content );

$output .= '</div>';
if ( empty($full_width) ) { $output .= '</div>'; } // custom line start - for container

$output .= $after_output;
if ( 'stretch_row' === $full_width ) { $output .= '</div>'; } // custom line start - for container

echo crypterium_vc_sanitize_data($output);
