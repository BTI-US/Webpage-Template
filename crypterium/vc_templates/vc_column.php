<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

/**
 * Shortcode attributes
 * @var $atts
 * @var $el_class
 * @var $width
 * @var $css
 * @var $offset
 * @var $content - shortcode content
 * @var $css_animation
 * Shortcode class
 * @var $this WPBakeryShortCode_VC_Column
 */
$el_class = $width = $css = $offset = $css_animation = $crypterium_vc_column_992 = $crypterium_vc_column_768 = $crypterium_vc_column_480 = $crypterium_vc_column_aos = '';
$output = '';
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

$width = wpb_translateColumnWidthToSpan( $width );
$width = vc_column_offset_class_merge( $offset, $width );

$css_classes = array(
	$this->getExtraClass( $el_class ) . $this->getCSSAnimation( $css_animation ),
	'wpb_column',
	'vc_column_container',
	vc_shortcode_custom_css_class( $crypterium_vc_column_992 ),
	vc_shortcode_custom_css_class( $crypterium_vc_column_768 ),
	vc_shortcode_custom_css_class( $crypterium_vc_column_480 ),
	$width,
);

if ( vc_shortcode_custom_css_has_property( $css, array(
	'border',
	'background',
) ) ) {
	$css_classes[] = 'vc_col-has-fill';
}

$wrapper_attributes = array();

$css_class = preg_replace( '/\s+/', ' ', apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, implode( ' ', array_filter( $css_classes ) ), $this->settings['base'], $atts ) );
$wrapper_attributes[] = 'class="' . esc_attr( trim( $css_class ) ) . '"';

// custom code start
if( $crypterium_vc_column_992 != '' OR $crypterium_vc_column_480 != '' ) {

	$crypterium_col_992=preg_replace('/.vc_custom_[0-9]*/',esc_attr( trim( vc_shortcode_custom_css_class( $css ) ) ),$crypterium_vc_column_992);
	$crypterium_col_768=preg_replace('/.vc_custom_[0-9]*/',esc_attr( trim( vc_shortcode_custom_css_class( $css ) ) ),$crypterium_vc_column_768);
	$crypterium_col_480=preg_replace('/.vc_custom_[0-9]*/',esc_attr( trim( vc_shortcode_custom_css_class( $css ) ) ),$crypterium_vc_column_480);

	$output .= '<style type="text/css" data-nt-theme="crypterium-vc-custom-css">';
		if( $crypterium_vc_column_992 != '' ) {$output .= ' @media only screen and (max-width: 992px) { .'.esc_attr($crypterium_vc_column_992).' }'; }
		if( $crypterium_vc_column_768 != '' ) {$output .= ' @media only screen and (max-width: 768px) { .'.esc_attr($crypterium_vc_column_768).' }'; }
		if( $crypterium_vc_column_480 != '' ) {$output .= ' @media only screen and (max-width: 480px) { .'.esc_attr($crypterium_vc_column_480).' }'; }
	$output .= '</style>';
}
$output .= '<div ' . $crypterium_vc_column_aos . ' ' . implode( ' ', $wrapper_attributes ) . '>';
	$output .= '<div class="vc_column-inner ' . esc_attr( trim( vc_shortcode_custom_css_class( $css ) ) ) . '">';
		$output .= '<div class="wpb_wrapper">';
			$output .= wpb_js_remove_wpautop( $content );
		$output .= '</div>';
	$output .= '</div>';
$output .= '</div>';

echo crypterium_vc_sanitize_data($output);
