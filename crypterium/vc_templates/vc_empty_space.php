<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}
/**
 * Shortcode attributes
 * @var $atts
 * @var $height
 * @var $el_class
 * @var $el_id
 * @var $css
 * Shortcode class
 * @var WPBakeryShortCode_Vc_Empty_space $this
 */
$height = $el_class = $el_id = $css = '';
$crypterium_vc_space = '';
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

$pattern = '/^(\d*(?:\.\d+)?)\s*(px|\%|in|cm|mm|em|rem|ex|pt|pc|vw|vh|vmin|vmax)?$/';
// allowed metrics: https://www.w3schools.com/cssref/css_units.asp
$regexr = preg_match( $pattern, $height, $matches );
$value = isset( $matches[1] ) ? (float) $matches[1] : (float) WPBMap::getParam( 'vc_empty_space', 'height' );
$unit = isset( $matches[2] ) ? $matches[2] : 'px';
$height = $value . $unit;

$inline_css = ( (float) $height >= 0.0 ) ? ' style="height: ' . esc_attr( $height ) . '"' : '';

$class = 'vc_empty_space ' . $this->getExtraClass( $el_class ) . vc_shortcode_custom_css_class( $css, ' ' );
$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $class, $this->settings['base'], $atts );
$wrapper_attributes = array();
if ( ! empty( $el_id ) ) {
	$wrapper_attributes[] = 'id="' . esc_attr( $el_id ) . '"';
}

$crypterium_space = $crypterium_vc_space ? ' '.$crypterium_vc_space : '';
$output = '';
$output .= '<div class="' . esc_attr( trim( $css_class ) ) . esc_attr( $crypterium_space ) . '" ';
$output .= implode( ' ', $wrapper_attributes ) . ' ' . $inline_css;
$output .= '><span class="vc_empty_space_inner"></span></div>';

return $output;
