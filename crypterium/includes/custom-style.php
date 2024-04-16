<?php

// if admin - die file
if ( is_admin() )
return false;

function crypterium_theme_css_options() {

    /* CSS to output */
    $theCSS = '';

    /*************************************************
    ## Admin Bar
    *************************************************/

    if( is_admin_bar_showing() && ! is_customize_preview() ) {
        $theCSS .= '
        #top-bar.is-fixed,#top-bar { top: 32px!important; }
        html.js { margin-top: 0px!important; }
        @media (max-width: 992px){ #top-bar.is-fixed { top: 32px!important; } }
        @media (max-width: 1350px){ nav#top-bar.is-expanded#top-bar.is-expanded-collaps { top: 32px!important; } }
        @media (max-width: 782px){ nav#top-bar.is-expanded#top-bar.is-expanded-collaps { top: 46px!important; } }
        @media (max-width: 782px){ .mobile-help-class-adminbar nav#top-bar.is-expanded#top-bar.is-expanded-collaps { top: 0px!important; } }
        @media (max-width: 768px){
            #top-bar{ top: 46px!important; }
            #top-bar.is-fixed{ top: 98px!important; }
            #top-bar.is-fixed.is-visible{ top: 0px!important; }
        }
        @media (max-width: 600px){
            #top-bar.is-fixed { top: 0px!important; margin-top: 0px !important; }
        }';
    }

    /*************************************************
    ## Color Brightness Settings
    *************************************************/
    if ( !function_exists( 'crypterium_colourBrightness' ) ) {
        function crypterium_colourBrightness($hex, $percent) {
            // Work out if hash given
            $hash = '';
            if (stristr($hex,'#')) {
                $hex = str_replace('#','',$hex);
                $hash = '#';
            }
            // Hex to rgb
            $rgb = array(hexdec(substr($hex,0,2)), hexdec(substr($hex,2,2)), hexdec(substr($hex,4,2)));
            // Calculate
            for ($i=0; $i<3; $i++) {
                // See if brighter or darker
                if ($percent > 0) {
                    // Lighter
                    $rgb[$i] = round($rgb[$i] * $percent) + round(255 * (1-$percent));
                } else {
                    // Darker
                    $positivePercent = $percent - ($percent*2);
                    $rgb[$i] = round($rgb[$i] * $positivePercent) + round(0 * (1-$positivePercent));
                }
                // In case rounding up causes us to go to 256
                if ($rgb[$i] > 255) {
                    $rgb[$i] = 255;
                }
            }
            // RBG to Hex
            $hex = '';
            for($i=0; $i < 3; $i++) {
                // Convert the decimal digit to hex
                $hexDigit = dechex($rgb[$i]);
                // Add a leading zero if necessary
                if(strlen($hexDigit) == 1) {
                    $hexDigit = "0" . $hexDigit;
                }
                // Append to the hex string
                $hex .= $hexDigit;
            }
            return $hash.$hex;
        }
    }
    /*************************************************
    ## Filter Function
    *************************************************/
    if ( !function_exists( 'crypterium_hex2rgb' ) ) {
        function crypterium_hex2rgb($hex) {
            $hex = str_replace("#", "", $hex);

            if(strlen($hex) == 3) {
                $r = hexdec(substr($hex,0,1).substr($hex,0,1));
                $g = hexdec(substr($hex,1,1).substr($hex,1,1));
                $b = hexdec(substr($hex,2,1).substr($hex,2,1));
            } else {
                $r = hexdec(substr($hex,0,2));
                $g = hexdec(substr($hex,2,2));
                $b = hexdec(substr($hex,4,2));
            }
            $rgb = array($r, $g, $b);

            return $rgb; // returns an array with the rgb values
        }
    }

    /*************************************************
    ## Preloader Settings
    *************************************************/

    if ( ot_get_option( 'crypterium_pre_settings' ) !='off' ) {
    if ( ot_get_option( 'crypterium_pre_type' ) !='default' ) {
    $theCSS .= 'div#preloader {';
    if ( ot_get_option( 'crypterium_pre_bgcolor' ) !='' ) {
    $theCSS .= 'background-color: '.esc_attr( ot_get_option( 'crypterium_pre_bgcolor' ) ).';';
    } else {
    $theCSS .= 'background-color: #000;';
    }

    $theCSS .= ' overflow: hidden;
    background-repeat: no-repeat;
    background-position: center center;
    height: 100%;
    left: 0;
    position: fixed;
    top: 0;
    width: 100%;
    z-index: 10000;
    }';

    if ( ot_get_option( 'crypterium_pre_spincolor' ) !='' ) {

    $prespincolor    = ot_get_option( 'crypterium_pre_spincolor' );
    $pre_spincolor   = crypterium_hex2rgb($prespincolor);
    $pre_spin_color  = implode(", ", $pre_spincolor);

    if ( ot_get_option( 'crypterium_pre_type' ) =='01' ) { $theCSS .= '.loader01:after { background: '.$prespincolor.'!important;}';
    $theCSS .= '.loader01 { border:8px solid '.$prespincolor.'!important; border-right-color: transparent!important;}';}
    if ( ot_get_option( 'crypterium_pre_type' ) =='02' ) { $theCSS .= '.loader02 { border: 8px solid rgba('.$pre_spin_color.', 0.25)!important;}';
    $theCSS .= '.loader02 { border-top-color: '.$prespincolor.'!important;}'; }
    if ( ot_get_option( 'crypterium_pre_type' ) =='03' ) { $theCSS .= '.loader03{ border-top-color: '.$prespincolor.'!important;}';
    $theCSS .= '.loader03 { border-bottom-color: '.$prespincolor.'!important;}';}
    if ( ot_get_option( 'crypterium_pre_type' ) =='04' ) { $theCSS .= '.loader04 { border: 2px solid rgba('.$pre_spin_color.', 0.5)!important;}';
    $theCSS .= '.loader04:after { background: '.$prespincolor.'!important;}';}
    if ( ot_get_option( 'crypterium_pre_type' ) =='05' ) { $theCSS .= '.loader05 { border-color: '.$prespincolor.'!important;}'; }
    if ( ot_get_option( 'crypterium_pre_type' ) =='06' ) { $theCSS .= '.loader06:before { border: 4px solid rgba('.$pre_spin_color.', 0.5)!important;}';
    $theCSS .= '.loader06:after { border: 4px solid '.$prespincolor.';}';}

    if ( ot_get_option( 'crypterium_pre_type' ) =='07' ) {
    $theCSS .= '@keyframes loader-circles {
    0% {
    box-shadow: 0 -27px 0 0 rgba('.$pre_spin_color.', 0.05), 19px -19px 0 0 rgba('.$pre_spin_color.', 0.1), 27px 0 0 0 rgba('.$pre_spin_color.', 0.2), 19px 19px 0 0 rgba('.$pre_spin_color.', 0.3), 0 27px 0 0 rgba('.$pre_spin_color.', 0.4), -19px 19px 0 0 rgba('.$pre_spin_color.', 0.6), -27px 0 0 0 rgba('.$pre_spin_color.', 0.8), -19px -19px 0 0 '.$prespincolor.'; }
    12.5% {
    box-shadow: 0 -27px 0 0 '.$prespincolor.', 19px -19px 0 0 rgba('.$pre_spin_color.', 0.05), 27px 0 0 0 rgba('.$pre_spin_color.', 0.1), 19px 19px 0 0 rgba('.$pre_spin_color.', 0.2), 0 27px 0 0 rgba('.$pre_spin_color.', 0.3), -19px 19px 0 0 rgba('.$pre_spin_color.', 0.4), -27px 0 0 0 rgba('.$pre_spin_color.', 0.6), -19px -19px 0 0 rgba('.$pre_spin_color.', 0.8); }
    25% {
    box-shadow: 0 -27px 0 0 rgba('.$pre_spin_color.', 0.8), 19px -19px 0 0 '.$prespincolor.', 27px 0 0 0 rgba('.$pre_spin_color.', 0.05), 19px 19px 0 0 rgba('.$pre_spin_color.', 0.1), 0 27px 0 0 rgba('.$pre_spin_color.', 0.2), -19px 19px 0 0 rgba('.$pre_spin_color.', 0.3), -27px 0 0 0 rgba('.$pre_spin_color.', 0.4), -19px -19px 0 0 rgba('.$pre_spin_color.', 0.6); }
    37.5% {
    box-shadow: 0 -27px 0 0 rgba('.$pre_spin_color.', 0.6), 19px -19px 0 0 rgba('.$pre_spin_color.', 0.8), 27px 0 0 0 '.$prespincolor.', 19px 19px 0 0 rgba('.$pre_spin_color.', 0.05), 0 27px 0 0 rgba('.$pre_spin_color.', 0.1), -19px 19px 0 0 rgba('.$pre_spin_color.', 0.2), -27px 0 0 0 rgba('.$pre_spin_color.', 0.3), -19px -19px 0 0 rgba('.$pre_spin_color.', 0.4); }
    50% {
    box-shadow: 0 -27px 0 0 rgba('.$pre_spin_color.', 0.4), 19px -19px 0 0 rgba('.$pre_spin_color.', 0.6), 27px 0 0 0 rgba('.$pre_spin_color.', 0.8), 19px 19px 0 0 '.$prespincolor.', 0 27px 0 0 rgba('.$pre_spin_color.', 0.05), -19px 19px 0 0 rgba('.$pre_spin_color.', 0.1), -27px 0 0 0 rgba('.$pre_spin_color.', 0.2), -19px -19px 0 0 rgba('.$pre_spin_color.', 0.3); }
    62.5% {
    box-shadow: 0 -27px 0 0 rgba('.$pre_spin_color.', 0.3), 19px -19px 0 0 rgba('.$pre_spin_color.', 0.4), 27px 0 0 0 rgba('.$pre_spin_color.', 0.6), 19px 19px 0 0 rgba('.$pre_spin_color.', 0.8), 0 27px 0 0 '.$prespincolor.', -19px 19px 0 0 rgba('.$pre_spin_color.', 0.05), -27px 0 0 0 rgba('.$pre_spin_color.', 0.1), -19px -19px 0 0 rgba('.$pre_spin_color.', 0.2); }
    75% {
    box-shadow: 0 -27px 0 0 rgba('.$pre_spin_color.', 0.2), 19px -19px 0 0 rgba('.$pre_spin_color.', 0.3), 27px 0 0 0 rgba('.$pre_spin_color.', 0.4), 19px 19px 0 0 rgba('.$pre_spin_color.', 0.6), 0 27px 0 0 rgba('.$pre_spin_color.', 0.8), -19px 19px 0 0 '.$prespincolor.', -27px 0 0 0 rgba('.$pre_spin_color.', 0.05), -19px -19px 0 0 rgba('.$pre_spin_color.', 0.1); }
    87.5% {
    box-shadow: 0 -27px 0 0 rgba('.$pre_spin_color.', 0.1), 19px -19px 0 0 rgba('.$pre_spin_color.', 0.2), 27px 0 0 0 rgba('.$pre_spin_color.', 0.3), 19px 19px 0 0 rgba('.$pre_spin_color.', 0.4), 0 27px 0 0 rgba('.$pre_spin_color.', 0.6), -19px 19px 0 0 rgba('.$pre_spin_color.', 0.8), -27px 0 0 0 '.$prespincolor.', -19px -19px 0 0 rgba('.$pre_spin_color.', 0.05); }
    100% {
    box-shadow: 0 -27px 0 0 rgba('.$pre_spin_color.', 0.05), 19px -19px 0 0 rgba('.$pre_spin_color.', 0.1), 27px 0 0 0 rgba('.$pre_spin_color.', 0.2), 19px 19px 0 0 rgba('.$pre_spin_color.', 0.3), 0 27px 0 0 rgba('.$pre_spin_color.', 0.4), -19px 19px 0 0 rgba('.$pre_spin_color.', 0.6), -27px 0 0 0 rgba('.$pre_spin_color.', 0.8), -19px -19px 0 0 '.$prespincolor.'; } }';
    }
    if ( ot_get_option( 'crypterium_pre_type' ) =='08' ) {
    $theCSS .= '@keyframes loader08 {
    0%, 100% {
    box-shadow: -13px 20px 0 '.$prespincolor.', 13px 20px 0 rgba('.$pre_spin_color.', 0.2), 13px 46px 0 rgba('.$pre_spin_color.', 0.2), -13px 46px 0 rgba('.$pre_spin_color.', 0.2); }
    25% {
    box-shadow: -13px 20px 0 rgba('.$pre_spin_color.', 0.2), 13px 20px 0 '.$prespincolor.', 13px 46px 0 rgba('.$pre_spin_color.', 0.2), -13px 46px 0 rgba('.$pre_spin_color.', 0.2); }
    50% {
    box-shadow: -13px 20px 0 rgba('.$pre_spin_color.', 0.2), 13px 20px 0 rgba('.$pre_spin_color.', 0.2), 13px 46px 0 '.$prespincolor.', -13px 46px 0 rgba('.$pre_spin_color.', 0.2); }
    75% {
    box-shadow: -13px 20px 0 rgba('.$pre_spin_color.', 0.2), 13px 20px 0 rgba('.$pre_spin_color.', 0.2), 13px 46px 0 rgba('.$pre_spin_color.', 0.2), -13px 46px 0 '.$prespincolor.'; } }';
    }
    if ( ot_get_option( 'crypterium_pre_type' ) =='09' ) {
    $theCSS .= '.loader09, .loader09:after, .loader09:before { background: '.$prespincolor.'!important;}';

    $theCSS .= '@keyframes loader09 {
    0%, 100% {
    box-shadow: 0 0 0 '.$prespincolor.', 0 0 0 '.$prespincolor.'; }
    50% {
    box-shadow: 0 -8px 0 '.$prespincolor.', 0 8px 0 '.$prespincolor.'; } }
    }';
    }
    if ( ot_get_option( 'crypterium_pre_type' ) =='10' ) {
    $theCSS .= '@keyframes loader10 {
    0% {
    box-shadow: 0 28px 0 -28px '.$prespincolor.'; }
    100% {
    box-shadow: 0 28px 0 '.$prespincolor.'; } }';
    }
    if ( ot_get_option( 'crypterium_pre_type' ) =='11' ) {

    $theCSS .= ' .loader11::after, .loader11::before {box-shadow: 0 40px 0 '.$prespincolor.'; }';
    $theCSS .= '@keyframes loader11 {
    0% {
    box-shadow: 0 40px 0 '.$prespincolor.'; }
    100% {
    box-shadow: 0 20px 0 '.$prespincolor.'; } }';
    }
    if ( ot_get_option( 'crypterium_pre_type' ) =='12' ) {
    $theCSS .= '@keyframes loader12 {
    0% {
    box-shadow: -60px 40px 0 2px '.$prespincolor.', -30px 40px 0 0 rgba('.$pre_spin_color.', 0.2), 0 40px 0 0 rgba('.$pre_spin_color.', 0.2), 30px 40px 0 0 rgba('.$pre_spin_color.', 0.2), 60px 40px 0 0 rgba('.$pre_spin_color.', 0.2); }
    25% {
    box-shadow: -60px 40px 0 0 rgba('.$pre_spin_color.', 0.2), -30px 40px 0 2px '.$prespincolor.', 0 40px 0 0 rgba('.$pre_spin_color.', 0.2), 30px 40px 0 0 rgba('.$pre_spin_color.', 0.2), 60px 40px 0 0 rgba('.$pre_spin_color.', 0.2); }
    50% {
    box-shadow: -60px 40px 0 0 rgba('.$pre_spin_color.', 0.2), -30px 40px 0 0 rgba('.$pre_spin_color.', 0.2), 0 40px 0 2px '.$prespincolor.', 30px 40px 0 0 rgba('.$pre_spin_color.', 0.2), 60px 40px 0 0 rgba('.$pre_spin_color.', 0.2); }
    75% {
    box-shadow: -60px 40px 0 0 rgba('.$pre_spin_color.', 0.2), -30px 40px 0 0 rgba('.$pre_spin_color.', 0.2), 0 40px 0 0 rgba('.$pre_spin_color.', 0.2), 30px 40px 0 2px '.$prespincolor.', 60px 40px 0 0 rgba('.$pre_spin_color.', 0.2); }
    100% {
    box-shadow: -60px 40px 0 0 rgba('.$pre_spin_color.', 0.2), -30px 40px 0 0 rgba('.$pre_spin_color.', 0.2), 0 40px 0 0 rgba('.$pre_spin_color.', 0.2), 30px 40px 0 0 rgba('.$pre_spin_color.', 0.2), 60px 40px 0 2px '.$prespincolor.'; } }';
    }
    }
    } else {
    $preloaderbg     = ( ot_get_option( 'crypterium_pre_bgcolor' ) != '' ) ?  ot_get_option( 'crypterium_pre_bgcolor' )  : '#090909';
    $prespincolor    = ot_get_option( 'crypterium_pre_spincolor' );
    $pre_spincolor   = crypterium_hex2rgb($prespincolor);
    $pre_spin_color  = implode(", ", $pre_spincolor);
    $prespincolor    = ( $prespincolor != '' ) ? $pre_spin_color : '255,255,255';

    $theCSS .= '.preloader {
    background-color: '.$preloaderbg.';
    width: 100%;
    height: 100%;
    position: fixed;
    top: 0;
    left: 0;
    z-index: 1000000000;
    z-index: 99999999;
    opacity: 1;
    -webkit-transition: opacity .3s;
    -moz-transition: opacity .3s;
    transition: opacity .3s;
    }
    .preloader div {
    position: absolute;
    top: 50%;
    margin: 0 auto;
    position: relative;
    text-indent: -9999em;

    top: 50%;
    height: 50px;
    width: 50px;
    position: relative;
    margin: -25px auto 0 auto;
    display: block;

    border-top: 2px solid rgba('.$prespincolor.', 0.2);
    border-right: 2px solid rgba('.$prespincolor.', 0.2);
    border-bottom: 2px solid rgba('.$prespincolor.', 0.2);
    border-left: 2px solid rgb('.$prespincolor.');

    -webkit-transform: translateZ(0);
    -ms-transform: translateZ(0);
    transform:  translateY(50%);
    -webkit-animation: load9 1.1s infinite linear;
    animation: load9 1.1s infinite linear;
    }
    .preloader div,
    .preloader div:after {
    border-radius: 50%;
    width: 40px;
    height: 40px;
    }
    @-webkit-keyframes load9 {
    0% {
    -webkit-transform: rotate(0deg);
    transform: rotate(0deg);
    }
    100% {
    -webkit-transform: rotate(360deg);
    transform: rotate(360deg);
    }
    }
    @keyframes load9 {
    0% {
    -webkit-transform: rotate(0deg);
    transform: rotate(0deg);
    }
    100% {
    -webkit-transform: rotate(360deg);
    transform: rotate(360deg);
    }
    }';
    }
    }

    /*************************************************
    ## Theme General Color Settings
    *************************************************/

    $theme_color     = ot_get_option( 'crypterium_theme_color' ) ;
    $theme_color_2    = ot_get_option( 'crypterium_theme_color_2' ) ;
    $theme_color_3    = ot_get_option( 'crypterium_theme_color_3' ) ;

    if ( $theme_color !='' ) {

    $theCSS .= '
    ,#widget-area .widget a, .blog-post-social ul li a:hover i, .single-style-1 .pager .previous a, .single-style-1 .pager .next a, .single-style-2 .pager .previous a, .single-style-2 .pager .next a {
    color: '.esc_attr( $theme_color ).';
    }
    #back-to-top, .single-style-1 .pager .previous a:hover, .single-style-1 .pager .next a:hover, .single-style-2 .pager .previous a:hover, .single-style-2 .pager .next a:hover,
    body.error404 .index .searchform input[type="submit"]:hover, body.search article .searchform input[type="submit"]:hover,
    .custom-btn.custom-btn--style-2, .pricing-table--style-4 .__item--active,
    .custom-btn.custom-btn--style-1:focus, .custom-btn.custom-btn--style-1:hover, .custom-btn.custom-btn--style-1,
    .feature--style-1 .__item--third, #btn-to-top, .section--base-bg, .timeline--dark-color .__point:before,
    .timeline .__line--active,.steps .__item .__point:before,.pricing-table--style-3 .__item--active,.pricing-table--style-3 .__price,
    .pricing-table--style-4 .__item--active,.pricing-table--style-5 .__label,.pricing-table--style-5 .__price,
    .pricing-table--style-6 .__item--active, .top-bar--dark #top-bar__navigation a span:after, .custom-btn.custom-btn--style-3, .c-backtop-1 { 	background-color: '.esc_attr( $theme_color ).'!important; }

    .single-style-1 .pager .previous a, .single-style-1 .pager .next a, .single-style-2 .pager .previous a, .single-style-2 .pager .next a,
    .pricing-table--style-4 .__item--color-3,.timeline .__item--active .__point,.steps .__item .__point {
    border-color: '.esc_attr( $theme_color ).'!important;
    }

    body.error404 .index .searchform input[type="submit"], .pager li > a:hover,body.search article .searchform input[type="submit"],
    #widget-area #searchform input#searchsubmit, #respond input:hover, .pager li > span, .nav-links span.current,
    body.error404 .content-error .searchform input[type="submit"]{background-color:'.esc_attr( $theme_color ).';}

    .widget-title:after, a, .goods .__item .__price, .accordion-item.active .accordion-toggler i { color:'.esc_attr( $theme_color ).'; }
    a:hover, a:focus{ color: '.crypterium_colourBrightness($theme_color,-0.8).'; }
    #widget-area .widget ul li a:hover, .entry-title a:hover, .entry-meta a, #share-buttons i:hover,
    .documents--style-2 .__document .__ico,.facts--dark-color .num,.pricing-table .fontello-check,.pricing-table--style-6 .__price { color:'.esc_attr( $theme_color ).'; }

    { background-color: '.crypterium_colourBrightness($theme_color,-0.9).';}
    .breadcrubms, .breadcrubms span a span { color: '.crypterium_colourBrightness($theme_color,0.7).';}
    .breadcrubms span { color: '.crypterium_colourBrightness($theme_color,-0.6).';}
    .breadcrubms span a span:hover, .text-logo:hover { color: '.crypterium_colourBrightness($theme_color,-0.8).';}';

    }

  /*************************************************
  ## Back To Top Button settings
  *************************************************/

  $backtotop_dimension    = ( ot_get_option( 'crypterium_backtotop_dimension', array() ) );
  $backtotop_lineheight   = ot_get_option( 'crypterium_backtotop_lineheight');
  $backtotop_fontsize     = ot_get_option( 'crypterium_backtotop_iconfs');
  $backtotop_bgcolor      = ot_get_option( 'crypterium_backtotop_bg');
  $backtotop_iconcolor    = ot_get_option( 'crypterium_backtotop_iconcolor');
  $backtotop_border       = ot_get_option( 'crypterium_backtotop_border');
  //Backtotop Dimension
  if ( !empty($backtotop_dimension) ) {
     if(!empty($backtotop_dimension['unit']))   { $backtotopunit = $backtotop_dimension['unit'];}else{ $backtotopunit = 'px'; }
     if(!empty($backtotop_dimension['width']))   { $theCSS .= '.c-backtop-1{ width:' . esc_attr($backtotop_dimension['width']) .''. esc_attr($backtotopunit) . ' !important; }'; }
     if(!empty($backtotop_dimension['height']))  { $theCSS .= '.c-backtop-1{ height:' . esc_attr($backtotop_dimension['height']) .''. esc_attr($backtotopunit) . ' !important; }'; }
  }
  //Backtotop Design Settings
  if(!empty($backtotop_lineheight))   { $theCSS .= '.c-backtop-1{ line-height:' . esc_attr($backtotop_lineheight). 'px!important; }'; }
  if(!empty($backtotop_fontsize))     { $theCSS .= '.c-backtop-1 i:before{font-size:' . esc_attr($backtotop_fontsize). 'px!important; }'; }
  if(!empty($backtotop_bgcolor))      { $theCSS .= '.c-backtop-1{background:' . esc_attr($backtotop_bgcolor). '!important; }'; }
  if(!empty($backtotop_iconcolor))    { $theCSS .= '.c-backtop-1 i{color:' . esc_attr($backtotop_iconcolor). '!important; }'; }
  if(!empty($backtotop_border))       { $theCSS .= '.c-backtop-1{border-radius:' . esc_attr($backtotop_border). 'px!important; }'; }

   /*************************************************
   ## Logo Settings
   *************************************************/

   $theme_logo_type     = esc_attr( ot_get_option( 'crypterium_logo_type' ) );
   $textlogo_fs         = esc_attr( ot_get_option( 'crypterium_textlogo_fs' ) );
   $textlogo_fw         = esc_attr( ot_get_option( 'crypterium_textlogo_fw' ) );
   $textlogo_fstyle     = esc_attr( ot_get_option( 'crypterium_textlogo_fstyle' ) );
   $textlogo_ltsp       = esc_attr( ot_get_option( 'crypterium_textlogo_lettersp' ) );
   $staticlogo_color    = esc_attr( ot_get_option( 'crypterium_staticlogo_color' ) );
   $stickylogo_color    = esc_attr( ot_get_option( 'crypterium_stickylogo_color' ) );
   $logo                = ( ot_get_option( 'crypterium_logo_dimension', array() ) );
   $logo_p              = ( ot_get_option( 'crypterium_padding_logo', array() ) );
   $logo_m              = ( ot_get_option( 'crypterium_margin_logo', array() ) );

   if ( $theme_logo_type == 'text' ){

      //Static Menu Text logo
      $theCSS .= '.nt-text-logo {';
      if ( $textlogo_fw        != '' ){ $theCSS .= 'font-weight:'.$textlogo_fw.';'; }
      if ( $textlogo_ltsp      != '' ){ $theCSS .= 'letter-spacing:'.$textlogo_ltsp.'px;';}
      if ( $textlogo_fs        != '' ){ $theCSS .= 'font-size:'.$textlogo_fs.'px;';}
      if ( $textlogo_fstyle    != '' ){ $theCSS .= 'font-style:'.$textlogo_fstyle.';';}
      if ( $staticlogo_color   != '' ){ $theCSS .= 'color:'.$staticlogo_color.'!important;';}
      $theCSS .= '}';

      //Sticky Menu Text logo
      $theCSS .= '#top-bar.is-fixed .nt-text-logo {';
      if ( $textlogo_fw        != '' ){ $theCSS .= 'font-weight:'.$textlogo_fw.';'; }
      if ( $textlogo_ltsp      != '' ){ $theCSS .= 'letter-spacing:'.$textlogo_ltsp.'px;';}
      if ( $textlogo_fs        != '' ){ $theCSS .= 'font-size:'.$textlogo_fs.'px;';}
      if ( $textlogo_fstyle    != '' ){ $theCSS .= 'font-style:'.$textlogo_fstyle.';';}
      if ( $stickylogo_color   != '' ){ $theCSS .= 'color:'.$stickylogo_color.'!important;';}
      $theCSS .= '}';

   }

  // logo Dimension
   if ( !empty($logo) ) {
      if(!empty($logo['unit']))   { $logounit = $logo['unit'];}else{ $logounit = 'px'; }
      if(!empty($logo['width']))   { $theCSS .= '.nt-img-logo img{ width:' . $logo['width'] .''. $logounit . ' !important; }'; }
      if(!empty($logo['height']))  { $theCSS .= '.nt-img-logo img{ height:' . $logo['height'] .''. $logounit . ' !important; }'; }
   }
  // logo Padding
  if ( !empty($logo_p) ) {
    if(!empty($logo_p['unit']))   { $logopadunit = $logo_p['unit'];}else{ $logopadunit = 'px'; }
    if(!empty($logo_p['top']))    { $theCSS .= '.nt-img-logo img{ padding-top:' . $logo_p['top'] .''. $logopadunit . ' !important; }'; }
    if(!empty($logo_p['bottom'])) { $theCSS .= '.nt-img-logo img{ padding-bottom:' . $logo_p['bottom'] .''. $logopadunit . ' !important; }'; }
    if(!empty($logo_p['right']))  { $theCSS .= '.nt-img-logo img{ padding-right:' . $logo_p['right'] .''. $logopadunit . ' !important; }'; }
    if(!empty($logo_p['left']))   { $theCSS .= '.nt-img-logo img{ padding-left:' . $logo_p['left'] .''. $logopadunit . ' !important; }'; }
  }
  // logo Margin
   if ( !empty($logo_m) ) {
      if(!empty($logo_m['unit']))   { $logomarunit = $logo_m['unit'];}else{ $logomarunit = 'px'; }
      if(!empty($logo_m['top']))    { $theCSS .= '.nt-img-logo img{ margin-top:' . $logo_m['top'] .''. $logomarunit . ' !important; }'; }
      if(!empty($logo_m['bottom'])) { $theCSS .= '.nt-img-logo img{ margin-bottom:' . $logo_m['bottom'] .''. $logomarunit . ' !important; }'; }
      if(!empty($logo_m['right']))  { $theCSS .= '.nt-img-logo img{ margin-right:' . $logo_m['right'] .''. $logomarunit . ' !important; }'; }
      if(!empty($logo_m['left']))   { $theCSS .= '.nt-img-logo img{ margin-left:' . $logo_m['left'] .''. $logomarunit . ' !important; }'; }
   }

   /*************************************************
   ## Navigation Settings
   *************************************************/

   //Static Navigation
   $header_menu_ifs        =  ot_get_option( 'crypterium_header_menu_ifs' );
   $nav_padding            = ( ot_get_option( 'crypterium_nav_padding', array() ) );
   $nav_margin             = ( ot_get_option( 'crypterium_nav_margin', array() ) );
   $static_nav_bg          = esc_attr( ot_get_option( 'crypterium_nav_bg' ) );
   $static_navitem         = esc_attr( ot_get_option( 'crypterium_navitem' ) );
   $static_navitemhover    = esc_attr( ot_get_option( 'crypterium_navitemhover' ) );
   $static_navborder       = esc_attr( ot_get_option( 'crypterium_navborder' ) );
   //Sticky Navigation
   $nav_sticky_pad         = ( ot_get_option( 'crypterium_sticky_padding', array() ) );
   $nav_sticky_mar         = ( ot_get_option( 'crypterium_sticky_margin', array() ) );
   $nav_fixed_display      = esc_attr( ot_get_option( 'crypterium_sticky_header' ) );
   $sticky_navbg           = esc_attr( ot_get_option( 'crypterium_nav_fixed_bg' ) );
   $sticky_navitem         = esc_attr( ot_get_option( 'crypterium_fixed_navitem' ) );
   $sticky_navitemhover    = esc_attr( ot_get_option( 'crypterium_fixed_navitemhover' ) );
   $sticky_navborder       = esc_attr( ot_get_option( 'crypterium_fixed_navborder' ) );
   //Dropdown Navigation
   $dropdownbg             = esc_attr( ot_get_option( 'crypterium_dropdown_bg' ) );
   $dropdownitem           = esc_attr( ot_get_option( 'crypterium_dropdown_item' ) );
   $dropdownitemhover      = esc_attr( ot_get_option( 'crypterium_dropdown_itemhover' ) );
   $dropdownitemhoverbg    = esc_attr( ot_get_option( 'crypterium_dropdown_itemhoverbg' ) );
   //Mobile Navigation
   $mobile_bg              = esc_attr( ot_get_option( 'crypterium_mobile_bg' ) );
   $mobile_item            = esc_attr( ot_get_option( 'crypterium_mobile_item' ) );
   $mobile_i_h             = esc_attr( ot_get_option( 'crypterium_mobile_itemhover' ) );
   $mobile_i_hbg           = esc_attr( ot_get_option( 'crypterium_mobile_itemhoverbg' ) );
   $mobile_d_i             = esc_attr( ot_get_option( 'crypterium_mobile_dropitem' ) );
   $mobile_d_hi            = esc_attr( ot_get_option( 'crypterium_mobile_dropitem_hover' ) );
   $mobile_d_hi            = esc_attr( ot_get_option( 'crypterium_mobile_dropitem_hover' ) );
   $mobile_menubtnbg       = esc_attr( ot_get_option( 'crypterium_mobile_menubtnbghover' ) );


   //Static Navigation Color
   if ( $header_menu_ifs !='' ) 		{ $theCSS .= '#top-bar  .framework-primary-menu > li > a{font-size:' . $header_menu_ifs . 'px!important;}'; }
   if ( $static_nav_bg !='' ) 		{ $theCSS .= '#top-bar {background-color:' . $static_nav_bg . '!important;}'; }
	if ( $static_navitem !='' ) 	   { $theCSS .= '#top-bar  .framework-primary-menu > li > a {color:' . $static_navitem . '!important;}'; }
	if ( $static_navitemhover !='' ) { $theCSS .= '#top-bar  .framework-primary-menu > li > a:hover {color:' . $static_navitemhover . '!important;}'; }
	if ( $static_navborder !='' )    { $theCSS .= '#top-bar__navigation li.current-menu-ancestor a:after  {background-color:' . $static_navborder . '!important;}'; }
	//Navigation Padding
	if ( !empty($nav_padding) ) {
		if(!empty($nav_padding['unit']))   { $navpadunit = $nav_padding['unit']; }else{ $navpadunit = 'px'; }
		if(!empty($nav_padding['top']))    { $theCSS .= '#top-bar { padding-top:'.$nav_padding['top'].''.$navpadunit.' !important; }'; }
		if(!empty($nav_padding['bottom'])) { $theCSS .= '#top-bar { padding-bottom:'.$nav_padding['bottom'].''.$navpadunit.' !important; }'; }
		if(!empty($nav_padding['right']))  { $theCSS .= '#top-bar { padding-right:'.$nav_padding['right'].''.$navpadunit.' !important; }'; }
		if(!empty($nav_padding['left']))   { $theCSS .= '#top-bar { padding-left:'.$nav_padding['left'].''.$navpadunit.' !important; }'; }
	}
   //Navigation Margin
	if ( !empty($nav_margin) ) {
		if(!empty($nav_margin['unit']))   { $navmarunit = $nav_margin['unit']; }else{ $navmarunit = 'px'; }
		if(!empty($nav_margin['top']))    { $theCSS .= '#top-bar { margin-top:'.$nav_margin['top'].''.$navmarunit.' !important; }'; }
		if(!empty($nav_margin['bottom'])) { $theCSS .= '#top-bar { margin-bottom:'.$nav_margin['bottom'].''.$navmarunit.' !important; }'; }
		if(!empty($nav_margin['right']))  { $theCSS .= '#top-bar { margin-right:'.$nav_margin['right'].''.$navmarunit.' !important; }'; }
		if(!empty($nav_margin['left']))   { $theCSS .= '#top-bar { margin-left:'.$nav_margin['left'].''.$navmarunit.' !important; }'; }
	}

   //Sticky Navigation Settings
	if ( $nav_fixed_display == 'off' ) {$theCSS .= '#top-bar.is-fixed.is-sticky-off {position: absolute !important;}';}
	if ( $nav_fixed_display != 'off' ) {
      //Sticky Navigation Color
      if ( $sticky_navbg !='' ) 	   {$theCSS .= '#top-bar.is-fixed {background-color:'.$sticky_navbg.'!important;}'; }
      if ( $sticky_navitem !='' )    {$theCSS .= '#top-bar.is-fixed .framework-primary-menu > li > a {color:'.$sticky_navitem.'!important;}'; }
      if ( $sticky_navitemhover !=''){$theCSS .= '#top-bar.is-fixed .framework-primary-menu > li > a:hover{color:'.$sticky_navitemhover.'!important;}';}
      if ( $sticky_navborder !='' )  {$theCSS .= '#top-bar.is-fixed li.current-menu-ancestor a:after{background-color:'.$sticky_navborder.'!important;}'; }
      //Sticky Navigation Padding
		if ( !empty($nav_sticky_pad) ) {
			if(!empty($nav_sticky_pad['unit']))   { $navspunit = $nav_sticky_pad['unit'];}else{ $navspunit = 'px'; }
			if(!empty($nav_sticky_pad['top']))    { $theCSS .= '#top-bar.is-fixed{ padding-top:'.$nav_sticky_pad['top'].''.$navspunit.' !important; }'; }
			if(!empty($nav_sticky_pad['bottom'])) { $theCSS .= '#top-bar.is-fixed{ padding-bottom:'.$nav_sticky_pad['bottom'].''.$navspunit.' !important; }'; }
			if(!empty($nav_sticky_pad['right']))  { $theCSS .= '#top-bar.is-fixed{ padding-right:'.$nav_sticky_pad['right'].''.$navspunit.' !important; }'; }
			if(!empty($nav_sticky_pad['left']))   { $theCSS .= '#top-bar.is-fixed{ padding-left:'.$nav_sticky_pad['left'].''.$navspunit.' !important; }'; }
		}
      //Sticky Navigation Margin
      if ( !empty($nav_sticky_mar) ) {
			if(!empty($nav_sticky_mar['unit']))   { $navsmunit = $nav_sticky_mar['unit'];}else{ $navsmunit = 'px'; }
			if(!empty($nav_sticky_mar['top']))    { $theCSS .= '#top-bar.is-fixed{ margin-top:'.$nav_sticky_mar['top'].''.$navsmunit.' !important; }'; }
			if(!empty($nav_sticky_mar['bottom'])) { $theCSS .= '#top-bar.is-fixed{ margin-bottom:'.$nav_sticky_mar['bottom'].''.$navsmunit.' !important; }'; }
			if(!empty($nav_sticky_mar['right']))  { $theCSS .= '#top-bar.is-fixed{ margin-right:'.$nav_sticky_mar['right'].''.$navsmunit.' !important; }'; }
			if(!empty($nav_sticky_mar['left']))   { $theCSS .= '#top-bar.is-fixed{ margin-left:'.$nav_sticky_mar['left'].''.$navsmunit.' !important; }'; }
		}
	}

   //Dropdown Navigation
	if ( $dropdownbg !='' )  { $theCSS .= '.submenu {background-color:'.$dropdownbg.'!important;}'; }
	if ( $dropdownitem !='' ){ $theCSS .= '.submenu > li > a{color:'.$dropdownitem.'!important;}'; }
	if ( $dropdownitemhover !='' ) 	{ $theCSS .= '.submenu > li > a:focus, .submenu > li > a:hover, .submenu > li.active > a{color:'.$dropdownitemhover . '!important;}'; }
	if ( $dropdownitemhoverbg !='' ){ $theCSS .= '.submenu > li > a:focus, .submenu > li > a:hover, .submenu > li.active > a{background-color:'.$dropdownitemhoverbg.'!important;}'; }

   //Mobile Navigation
	$theCSS .= '@media (max-width: 768px){';
		if ( $mobile_bg !='' )         { $theCSS .= '#top-bar.is-expanded {background-color:'.$mobile_bg.'!important;}#top-bar.is-expanded .submenu{background-color: transparent!important}';}
		if ( $mobile_item !='' )       { $theCSS .= '#top-bar.is-expanded  .framework-primary-menu > li > a{color:'.$mobile_item.'!important;}';}
		if ( $mobile_i_h !='' )        { $theCSS .= '#top-bar.is-expanded  .framework-primary-menu > li > a:hover{color:'.$mobile_i_h.'!important;}';}
		if ( $mobile_i_hbg !='' )      { $theCSS .= '#top-bar.is-expanded .submenu > li.active > a, #top-bar.is-expanded .submenu > li > a:hover, #top-bar.is-expanded .submenu > li > a:focus, #top-bar.is-expanded li.active > a, #top-bar.is-expanded li > a:hover, #top-bar.is-expanded li > a:focus{background-color:' . $mobile_i_hbg . ' !important;}';}
		if ( $mobile_d_i !='' )        { $theCSS .= '#top-bar.is-expanded .submenu > li > a{color:'.$mobile_d_i.'!important;}';}
		if ( $mobile_d_hi !='' )       { $theCSS .= '#top-bar.is-expanded .submenu > li > a:hover{color:'.$mobile_d_hi.'!important;}';}
		if ( $mobile_d_hi !='' )       { $theCSS .= '.submenu > li > a:focus, .submenu > li > a:hover, .submenu > li.active > a{color:'.$mobile_d_hi . '!important;}'; }
		if ( $mobile_menubtnbg !='' )  { $theCSS .= '#top-bar #top-bar__navigation a span:after, #top-bar #top-bar__navigation-toggler span, #top-bar #top-bar__navigation-toggler span:after, #top-bar #top-bar__navigation-toggler span:before{background-color:'.$mobile_menubtnbg.'!important;}';}
	$theCSS .= '}';

  //Header Buttons Color Options
  $header_login_btn_c              = esc_attr( ot_get_option( 'crypterium_header_login_btn_c' ) );
  $header_login_btn_bgc            = esc_attr( ot_get_option( 'crypterium_header_login_btn_bgc' ) );
  $header_login_btn_hc             = esc_attr( ot_get_option( 'crypterium_header_login_btn_hc' ) );
  $header_login_btn_hbgc           = esc_attr( ot_get_option( 'crypterium_header_login_btn_hbgc' ) );
  $header_signup_btn_c             = esc_attr( ot_get_option( 'crypterium_header_signup_btn_c' ) );
  $header_signup_btn_hc            = esc_attr( ot_get_option( 'crypterium_header_signup_btn_hc' ) );

  if ( $header_login_btn_c !='' )    { $theCSS .= '.login-btn {color:'.$header_login_btn_c.'!important;}'; }
  if ( $header_login_btn_bgc !='' )  { $theCSS .= '.login-btn {background-color:'.$header_login_btn_bgc.'!important;}'; }
  if ( $header_login_btn_hc !='' )   { $theCSS .= '.login-btn:hover {color:'.$header_login_btn_hc.'!important;}'; }
  if ( $header_login_btn_hbgc !='' ) { $theCSS .= '.login-btn:hover {background-color:'.$header_login_btn_hbgc.'!important;}'; }
  if ( $header_signup_btn_c !='' )   { $theCSS .= '.sign-btn {color:'.$header_signup_btn_c.'!important;}'; }
  if ( $header_signup_btn_hc !='' )  { $theCSS .= '.sign-btn:hover {color:'.$header_signup_btn_hc.'!important;}'; }

   /*************************************************
   ## Sidebar Settings
   *************************************************/

  $sb_bg          = esc_attr( ot_get_option( 'crypterium_sidebarwidgetareabgcolor' ) );
  $sb_c           = esc_attr( ot_get_option( 'crypterium_sidebarwidgetgeneralcolor' ) );
  $sb_t_c         = esc_attr( ot_get_option( 'crypterium_sidebarwidgettitlecolor' ) );
  $sb_l_c         = esc_attr( ot_get_option( 'crypterium_sidebarlinkcolor' ) );
  $sb_l_c_h       = esc_attr( ot_get_option( 'crypterium_sidebarlinkhovercolor' ) );
  $sb_s_t         = esc_attr( ot_get_option( 'crypterium_sidebarsearchsubmittextcolor' ) );
  $sb_s_bg        = esc_attr( ot_get_option( 'crypterium_sidebarsearchsubmitbgcolor' ) );

	if ( $sb_bg !='' )    { $theCSS .= '#widget-area { background-color:' . $sb_bg . '!important; padding: 20px;}'; }
	if ( $sb_t_c !='' )   { $theCSS .= '#widget-area .c-sidebar-1-widget-title, .widget-title:after{ color:' . $sb_t_c . '!important;}'; }
	if ( $sb_c !='' )     { $theCSS .= '#widget-area .c-sidebar-1-widget  ul{ background-color:' . $sb_c . '!important;}'; }
	if ( $sb_l_c !='' )   { $theCSS .= '#widget-area .c-sidebar-1-widget ul li a{ color:' . $sb_l_c . '!important;}'; }
	if ( $sb_l_c_h !='' ) { $theCSS .= '#widget-area .c-sidebar-1-widget ul li a:hover{ color:' . $sb_l_c_h . '!important;}'; }
	if ( $sb_s_t !='' )   { $theCSS .= '#widget-area .c-sidebar-1-widget .c-sidebar-1-search-field{ color:' . $sb_s_t . '!important;}'; }
	if ( $sb_s_bg !='' )  { $theCSS .= '#widget-area .c-sidebar-1-widget { background-color:' . $sb_s_bg . '!important;}'; }


   /*************************************************
   ## Inner Pages Hero Settings
   *************************************************/

   if ( is_404() ) { 																							// error page
		$name 			= 'error';
	}elseif ( is_archive() ) { 																				// blog and cpt archive page
		$name 			= 'archive';
	}elseif ( is_search() ) { 																					// search page
		$name 			= 'search';
	}elseif ( is_home() OR is_front_page() ) { 															// blog post loop page index.php or your choise on settings
		$name 			= 'blog';
	}elseif ( is_single() AND ! is_singular('portfolio')) { 																					// blog post single/singular page
		$name 			= 'single';
	}elseif ( is_singular("portfolio") ) { 																// it is cpt and if you want use another clone this condition and add your cpt name as portfolio
		$name 			= 'single_portfolio';
	}elseif ( is_page() ) {																					   // default or custom page
		$name 			= 'page';
	}elseif ( class_exists( 'woocommerce' ) AND ! is_shop() ) { 									// WooCommerce shop page
		$name 			= 'woocommerce_page';
	}elseif ( class_exists( 'woocommerce' ) AND ! is_product() ) { 								// WooCommerce single page
		$name 			= 'woocommerce_single';
	}

   //Hero Bg Color
	$hero_bg_color            = esc_attr( ot_get_option( 'crypterium_'.$name.'_header_bgcolor' ) );
   //Hero Bg Height
	$hero_height              = esc_attr( ot_get_option( 'crypterium_'.$name.'_header_bgheight' ) );
   //Hero Slogan
	$hero_slogan_color        = esc_attr( ot_get_option( 'crypterium_'.$name.'_slogan_color' ) );
	$hero_slogan_fs           = esc_attr( ot_get_option( 'crypterium_'.$name.'_slogan_fontsize' ) );
   //Hero Heading
	$hero_heading_color       = esc_attr( ot_get_option( 'crypterium_'.$name.'_heading_color' ) );
	$hero_heading_fs          = esc_attr( ot_get_option( 'crypterium_'.$name.'_heading_fontsize' ) );
   //Hero Description
   $hero_desc_color          = esc_attr( ot_get_option( 'crypterium_'.$name.'_desc_color' ) );
   $hero_desc_fs             = esc_attr( ot_get_option( 'crypterium_'.$name.'_desc_fontsize' ) );
   //Hero Button
   $hero_btn_color           = esc_attr( ot_get_option( 'crypterium_'.$name.'_btn_color' ) );
   $hero_btn_bgcolor         = esc_attr( ot_get_option( 'crypterium_'.$name.'_btn_bgcolor' ) );
   //Hero Bredcrumbs
   $hero_bred_color          = esc_attr( ot_get_option( 'crypterium_'.$name.'_breadcrubms_color' ) );
   $hero_bred_tcolor         = esc_attr( ot_get_option( 'crypterium_'.$name.'_breadcrubms_currentcolor' ) );
   $hero_bred_hcolor         = esc_attr( ot_get_option( 'crypterium_'.$name.'_breadcrubms_hovercolor' ) );
   $hero_bred_fs             = esc_attr( ot_get_option( 'crypterium_'.$name.'_breadcrubms_font_size' ) );
   //Hero Overlay
   $hero_overlay             = esc_attr( ot_get_option( 'crypterium_'.$name.'_hero_overlay' ) );
   //Hero Padding
	$hero_padding             = ( ot_get_option( 'crypterium_'.$name.'_h_p', array() ) );
   //Hero Margin
	$hero_margin              = ( ot_get_option( 'crypterium_'.$name.'_h_m', array() ) );


   //Hero Bg Color
	if ( $hero_bg_color !='' )     { $theCSS .= '.page-id-'. get_the_ID().'.hero-fullwidth { background-color: '.$hero_bg_color .'!important; }';
      $theCSS .= '.page-id-'. get_the_ID().'.hero-fullwidth .background-image img{display: none!important; }';
      $theCSS .= '.page-id-'. get_the_ID().'.hero-fullwidth {background-image:none!important; }';
   }
   //Hero Height
	if ( $hero_height !='' )       { $theCSS .= '.page-id-'. get_the_ID().'.hero-fullwidth { height: '.$hero_height.'vh !important; max-height: 100%; }';
      $theCSS .= '@media (max-width: 767px){.page-id-'. get_the_ID().'.hero-fullwidth { max-height : 60vh !important; }}';
	}
   //Hero Heading
	if ( $hero_heading_color !='' ){
      $theCSS .= '.page-id-'. get_the_ID().' .hero-content .hero-innner-last-child .u-text-hero{color: '.$hero_heading_color.' !important; }';
   }
	if ( $hero_heading_fs !='' )   {
      $theCSS .= '.page-id-'. get_the_ID().' .hero-content .hero-innner-last-child .u-text-hero{font-size: '.$hero_heading_fs.'px !important; }';
      $theCSS .= '@media (max-width: 767px){ .page-id-'. get_the_ID().' .hero-content .hero-innner-last-child .u-text-hero{font-size: 27px !important; }}';
   }
   //Hero Slogan
	if ( $hero_slogan_color !='' ) {
       $theCSS .= '.page-id-'. get_the_ID().' h6.u-text-sup{color: '.$hero_slogan_color.' !important; }';
   }
	if ( $hero_slogan_fs !='' )    {
       $theCSS .= '.page-id-'. get_the_ID().' h6.u-text-sup{font-size: '.$hero_slogan_fs.'px !important; }';
   }
   //Hero Description
   if ( $hero_desc_color !='' )   {
       $theCSS .= '.page-id-'. get_the_ID().' .hero-content .hero-innner-last-child .u-text-lead{color: '.$hero_desc_color.' !important; }';
   }
   if ( $hero_desc_fs !='' )      {
      $theCSS .= '.page-id-'. get_the_ID().' .hero-content .hero-innner-last-child .u-text-lead{font-size: '.$hero_desc_fs.'px !important; }';
   }
   //Hero Button
   if ( $hero_btn_color !='' )    {
      $theCSS .= '.page-id-'. get_the_ID().' .hero-content .hero-innner-last-child .custom-btn{color: '.$hero_btn_color.'!important; }';
   }
   if ( $hero_btn_bgcolor !='' )  {
       $theCSS .= '.page-id-'. get_the_ID().' .hero-content .hero-innner-last-child .custom-btn{background-color: '.$hero_btn_bgcolor.'!important; }';
   }
   //Hero Bredcrumbs
   if ( $hero_bred_color !='' )   {
       $theCSS .= '.page-id-'. get_the_ID().' .breadcrumb,.single .breadcrumb span a span{color: '.$hero_bred_color.'!important; }';
   }
   if ( $hero_bred_tcolor !='' )  {
       $theCSS .= '.page-id-'. get_the_ID().' .breadcrumb span {color: '.$hero_bred_tcolor.'!important; }';
   }
   if ( $hero_bred_hcolor !='' )  {
      $theCSS .= '.page-id-'. get_the_ID().' .breadcrumb span a span:hover{color: '.$hero_bred_hcolor.'!important; }';
   }
   if ( $hero_bred_fs !='' )      {
       $theCSS .= '.page-id-'. get_the_ID().' .breadcrumb span,.single .breadcrumb{font-size: '.$hero_bred_fs.'px!important; }';
   }
   //Hero Overlay
   if ( $hero_overlay !='' )      {
       $theCSS .= '.page-id-'. get_the_ID().' .template-overlay{background-color: '.$hero_overlay.'!important; }';
   }
   //Hero Padding
	if ( !empty($hero_padding) ) {
		$heropunit = (!empty($hero_padding['unit'])) ? $hero_padding['unit'] : 'px';
		if(!empty($hero_padding['top']))    { $theCSS .= '.page-id-'.get_the_ID().'.hero-fullwidth { padding-top:'.$hero_padding['top'].''.$heropunit.' !important; }'; }
		if(!empty($hero_padding['bottom'])) { $theCSS .= '.page-id-'.get_the_ID().'.hero-fullwidth { padding-bottom:'.$hero_padding['bottom'].''.$heropunit.' !important; }'; }
		if(!empty($hero_padding['right']))  { $theCSS .= '.page-id-'.get_the_ID().'.hero-fullwidth { padding-right:'.$hero_padding['right'].''.$heropunit.' !important; }'; }
		if(!empty($hero_padding['left']))   { $theCSS .= '.page-id-'.get_the_ID().'.hero-fullwidth { padding-left:'.$hero_padding['left'].''.$heropunit.' !important; }'; }
	}
   //Hero Margin
	if ( !empty($hero_margin) ) {
		$heromunit = (!empty($hero_margin['unit'])) ? $hero_margin['unit'] : 'px';
		if(!empty($hero_margin['top']))   { $theCSS .= '.page-id-'.get_the_ID().'.hero-fullwidth { margin-top:'.$hero_margin['top'].''.$heromunit.' !important; }'; }
		if(!empty($hero_margin['bottom'])){ $theCSS .= '.page-id-'.get_the_ID().'.hero-fullwidth { margin-bottom:'.$hero_margin['bottom'].''.$heromunit.' !important; }'; }
		if(!empty($hero_margin['right'])) { $theCSS .= '.page-id-'.get_the_ID().'.hero-fullwidth { margin-right:'.$hero_margin['right'].''.$heromunit.' !important; }'; }
		if(!empty($hero_margin['left']))  { $theCSS .= '.page-id-'.get_the_ID().'.hero-fullwidth { margin-left:'.$hero_margin['left'].''.$heromunit.' !important; }'; }
	}

   /*************************************************
   ## Page Settings
   *************************************************/

   //Page Navigation Color
   $page_nav_bgcolor       =  esc_attr( get_post_meta(get_the_ID(), 'crypterium_page_nav_bgcolor', true ) );
   $page_nav_border        =  esc_attr( get_post_meta(get_the_ID(), 'crypterium_page_nav_border_color', true ) );
   $page_nav_color         =  esc_attr( get_post_meta(get_the_ID(), 'crypterium_page_nav_color', true ) );
   $page_nav_hover         =  esc_attr( get_post_meta(get_the_ID(), 'crypterium_page_nav_hovercolor', true ) );
   //Page Sticky Navigation Color
   $page_sticky_bg         =  esc_attr( get_post_meta(get_the_ID(), 'crypterium_page_sticky_bg', true ) );
   $page_stickynav_color   =  esc_attr( get_post_meta(get_the_ID(), 'crypterium_page_sticky_nav_color', true ) );
   $page_stickyhover_color =  esc_attr( get_post_meta(get_the_ID(), 'crypterium_page_sticky_hovercolor', true ) );
   $page_stickyborder_color=  esc_attr( get_post_meta(get_the_ID(), 'crypterium_page_sticky_border_color', true ) );

   //Page Footer Color
   $page_footer_bg         =  esc_attr( get_post_meta(get_the_ID(), 'crypterium_f_bgcolor', true ) );
   $page_footer_t_color    =  esc_attr( get_post_meta(get_the_ID(), 'crypterium_f_text_c', true ) );
   $page_footer_s_i_color  =  esc_attr( get_post_meta(get_the_ID(), 'crypterium_f_social_i', true ) );
   $page_footer_s_i_hcolor =  esc_attr( get_post_meta(get_the_ID(), 'crypterium_f_social_i_h', true ) );
   $crypterium_f_th_c      =  esc_attr( get_post_meta(get_the_ID(), 'crypterium_f_th_c', true ) );
   $crypterium_f_p_c       =  esc_attr( get_post_meta(get_the_ID(), 'crypterium_f_p_c', true ) );

   //Hero Bg Color
   $page_bg_color          =  esc_attr( get_post_meta(get_the_ID(), 'crypterium_page_bg_color', true ) );
   //Hero Height
   $page_hero_height       =  esc_attr( get_post_meta(get_the_ID(), 'crypterium_page_hero_height', true ) );
   //Hero Padding
   $page_p_top             =  esc_attr( get_post_meta(get_the_ID(), 'crypterium_header_p_top', true ) );
   $page_p_right           =  esc_attr( get_post_meta(get_the_ID(), 'crypterium_header_p_right', true ) );
   $page_p_bottom          =  esc_attr( get_post_meta(get_the_ID(), 'crypterium_header_p_bottom', true ) );
   $page_p_left            =  esc_attr( get_post_meta(get_the_ID(), 'crypterium_header_p_left', true ) );
   //Hero Margin
   $page_m_top             =  esc_attr( get_post_meta(get_the_ID(), 'crypterium_header_m_top', true ) );
   $page_m_right           =  esc_attr( get_post_meta(get_the_ID(), 'crypterium_header_m_right', true ) );
   $page_m_bottom          =  esc_attr( get_post_meta(get_the_ID(), 'crypterium_header_m_bottom', true ) );
   $page_m_left            =  esc_attr( get_post_meta(get_the_ID(), 'crypterium_header_m_left', true ) );
   //Hero Overlay
   $page_overlay_c         =  esc_attr( get_post_meta(get_the_ID(), 'crypterium_background_overlay_color', true ) );
   //Hero Slogan
   $page_slogan_c          =  esc_attr( get_post_meta(get_the_ID(), 'crypterium_page_slogan_color', true ) );
   $page_slogan_fs         =  esc_attr( get_post_meta(get_the_ID(), 'crypterium_page_slogan_fs', true ) );
   $page_slogan_mw         =  esc_attr( get_post_meta(get_the_ID(), 'crypterium_page_slogan_mw', true ) );
   $page_slogan_mb         =  esc_attr( get_post_meta(get_the_ID(), 'crypterium_page_slogan_mb', true ) );
   //Hero Heading
   $page_heading_c         =  esc_attr( get_post_meta(get_the_ID(), 'crypterium_page_heading_color', true ) );
   $page_heading_fs        =  esc_attr( get_post_meta(get_the_ID(), 'crypterium_page_heading_fs', true ) );
   $page_heading_mb        =  esc_attr( get_post_meta(get_the_ID(), 'crypterium_page_heading_mb', true ) );
   //Hero Description
   $page_desc_c            =  esc_attr( get_post_meta(get_the_ID(), 'crypterium_page_desc_color', true ) );
   $page_desc_fs           =  esc_attr( get_post_meta(get_the_ID(), 'crypterium_page_desc_fs', true ) );
   $page_desc_mb           =  esc_attr( get_post_meta(get_the_ID(), 'crypterium_page_desc_mb', true ) );
   //Hero Button
   $page_herobtn_id        =  esc_attr( get_post_meta(get_the_ID(), 'crypterium_page_herobtn_icon_display', true ) );
   $page_herobtn_cbg       =  esc_attr( get_post_meta(get_the_ID(), 'crypterium_page_herobtn_custombg', true ) );
   $page_herobtn_hbg       =  esc_attr( get_post_meta(get_the_ID(), 'crypterium_page_herobtn_hoverbg', true ) );
   $page_herobtn_tc        =  esc_attr( get_post_meta(get_the_ID(), 'crypterium_page_herobtn_titlecolor', true ) );
   $page_herobtn_th        =  esc_attr( get_post_meta(get_the_ID(), 'crypterium_page_herobtn_titlehover', true ) );
   //Hero Bredcrumbs
   $page_bred_ic           =  esc_attr( get_post_meta(get_the_ID(), 'crypterium_page_bred_iconcolor', true ) );
   $page_bred_tc           =  esc_attr( get_post_meta(get_the_ID(), 'crypterium_page_bred_textcolor', true ) );
   $page_bred_htc          =  esc_attr( get_post_meta(get_the_ID(), 'crypterium_page_bred_htextcolor', true ) );
   $page_bred_fs           =  esc_attr( get_post_meta(get_the_ID(), 'crypterium_page_bred_fs', true ) );

   //Page Navigation Color
   if ( $page_nav_bgcolor !='' )  {
      $theCSS .= '.page-id-'.get_the_ID().' #top-bar{background-color:'.$page_nav_bgcolor.' !important;}';
   }
   if ( $page_nav_border  !='' )  {
      $theCSS .= '.page-id-'.get_the_ID().' #top-bar .framework-primary-menu > li > a:after{background-color:'.$page_nav_border.' !important;}';
   }
   if ( $page_nav_color   !='' )  {
      $theCSS .= '.page-id-'.get_the_ID().' #top-bar .framework-primary-menu > li > a {color:'.$page_nav_color.' !important;}';
   }
   if ( $page_nav_hover   !='' )  {
      $theCSS .= '.page-id-'.get_the_ID().' #top-bar .framework-primary-menu > li > a:hover{color:'.$page_nav_hover.' !important;}';
   }

   //Page Sticky Navigation Color
   if ( $page_sticky_bg   !='' )  {
      $theCSS .= '.page-id-'.get_the_ID().' #top-bar.is-fixed {background-color:'.$page_sticky_bg.' !important;}';
   }
   if ( $page_stickyborder_color  !='' )  {
      $theCSS .= '.page-id-'.get_the_ID().' #top-bar.is-fixed .framework-primary-menu > li > a:after{background-color:'.$page_stickyborder_color.' !important;}';
   }
   if ( $page_stickynav_color   !='' )  {
      $theCSS .= '.page-id-'.get_the_ID().' #top-bar.is-fixed .framework-primary-menu > li > a {color:'.$page_stickynav_color.' !important;}';
   }
   if ( $page_stickyhover_color   !='' )  {
      $theCSS .= '.page-id-'.get_the_ID().' #top-bar.is-fixed .framework-primary-menu > li > a:hover{color:'.$page_stickyhover_color.' !important;}';
   }

   //Page Footer Color
   if ( $page_footer_bg   !='' )  {
      $theCSS .= '.page-id-'.get_the_ID().' #footer{background-color:'.$page_footer_bg.' !important;}';
   }
   if ( $page_footer_t_color   !='' )  {
      $theCSS .= '.page-id-'.get_the_ID().' #footer .__copy{color:'.$page_footer_t_color.' !important;}';
   }
   if ( $page_footer_s_i_color   !='' )  {
      $theCSS .= '.page-id-'.get_the_ID().' .social-btns a{color:'.$page_footer_s_i_color.' !important;}';
   }
   if ( $page_footer_s_i_hcolor   !='' )  {
      $theCSS .= '.page-id-'.get_the_ID().' .social-btns a:hover{color:'.$page_footer_s_i_hcolor.' !important;}';
   }
   if ( $crypterium_f_th_c   !='' )  {
      $theCSS .= '.page-id-'.get_the_ID().' #footer__navigation a{color:'.$crypterium_f_th_c.' !important;}';
   }
   if ( $crypterium_f_p_c   !='' )  {
      $theCSS .= '.page-id-'.get_the_ID().' #footer__navigation a:hover{color:'.$crypterium_f_p_c.' !important;}';
   }
   //Hero Bg Color
   if ( $page_bg_color         !='' ) {
      $theCSS .= '.page-id-'.get_the_ID().'.hero-fullwidth{background-color:'.$page_bg_color.' !important;}';
      $theCSS .= '.page-id-'.get_the_ID().'.hero-fullwidth .background-image img{display:none!important;}';
      $theCSS .= '.page-id-'.get_the_ID().'.hero-fullwidth {background-image:none!important;}';
   }
   //Hero Height
   if ( $page_hero_height !='' ) {
      $theCSS .= '.page-id-'.get_the_ID().'.hero-fullwidth { height : '.$page_hero_height.'vh !important; max-height:100%; }';
      $theCSS .= '@media (max-width: 767px){.page-id-'.get_the_ID().'.hero-fullwidth { max-height : 60vh !important; }}';
   }
   //Hero Padding
   if ( $page_p_top !='' ) {
      $theCSS .= '.page-id-'.get_the_ID().'.hero-fullwidth { padding-top : '.$page_p_top.'px !important; }';
   }
   if ( $page_p_right !='' ) {
      $theCSS .= '.page-id-'.get_the_ID().'.hero-fullwidth { padding-right : '.$page_p_right.'px !important; }';
   }
   if ( $page_p_bottom !='' ) {
      $theCSS .= '.page-id-'.get_the_ID().'.hero-fullwidth { padding-bottom : '.$page_p_bottom .'px !important; }';
   }
   if ( $page_p_left !='' ) {
      $theCSS .= '.page-id-'.get_the_ID().'.hero-fullwidth { padding-left : '.$page_p_left.'px !important; }';
   }
   //Hero Margin
   if ( $page_m_top !='' ) {
      $theCSS .= '.page-id-'.get_the_ID().'.hero-fullwidth { margin-top : '.$page_m_top.'px !important; }';
   }
   if ( $page_m_right !='' ) {
      $theCSS .= '.page-id-'.get_the_ID().'.hero-fullwidth { margin-right : '.$page_m_right.'px !important; }';
   }
   if ( $page_m_bottom !='' ) {
      $theCSS .= '.page-id-'.get_the_ID().'.hero-fullwidth { margin-bottom : '.$page_m_bottom .'px !important; }';
   }
   if ( $page_m_left !='' ) {
      $theCSS .= '.page-id-'.get_the_ID().'.hero-fullwidth { margin-left : '.$page_m_left.'px !important; }';
   }
   //Hero Overlay
   if ( $page_overlay_c !='' ) {
      $theCSS .= '.page-id-'.get_the_ID().'.hero-fullwidth .template-overlay{ background-color: '.$page_overlay_c.' !important; }';
   }
   //Hero Slogan
   if ( $page_slogan_c !='' ) {
      $theCSS .= '.page-id-'.get_the_ID().'.hero-fullwidth .hero-innner-last-child .u-text-sup{color: '.$page_slogan_c.'!important; }';
   }
   if ( $page_slogan_fs !='' ) {
      $theCSS .= '.page-id-'.get_the_ID().'.hero-fullwidth .hero-innner-last-child .u-text-sup{font-size: '.$page_slogan_fs.'px!important; }';
   }
   if ( $page_slogan_mw !='' ) {
      $theCSS .= '.page-id-'.get_the_ID().'.hero-fullwidth .hero-innner-last-child .u-text-sup{ max-width: ' .$page_slogan_mw.'px !important; margin-left:auto;margin-right:auto;padding-left:15px;padding-right:15px; }';
   }
   if ( $page_slogan_mb !='' ) {
      $theCSS .= '.page-id-'.get_the_ID().'.hero-fullwidth .hero-innner-last-child .u-text-sup{margin-bottom: '.$page_slogan_mb.'px!important; }';
   }
   //Hero Heading
   if ( $page_heading_c !='' ) {
      $theCSS .= '.page-id-'.get_the_ID().'.hero-fullwidth .hero-innner-last-child .u-text-hero{color: '.$page_heading_c.'!important; }';
   }
   if ( $page_heading_fs !='' ) {
      $theCSS .= '.page-id-'.get_the_ID().'.hero-fullwidth .hero-innner-last-child .u-text-hero{font-size: '.$page_heading_fs.'px!important; }';
   }
   if ( $page_heading_mb !='' ) {
      $theCSS .= '.page-id-'.get_the_ID().'.hero-fullwidth .hero-innner-last-child .u-text-hero{margin-bottom: '.$page_heading_mb.'px!important; }';
   }
   //Hero Description
   if ( $page_desc_c !='' ) {
      $theCSS .= '.page-id-'.get_the_ID().'.hero-fullwidth .hero-innner-last-child .u-text-lead{color: '.$page_desc_c.'!important; }';
   }
   if ( $page_desc_fs !='' ) {
      $theCSS .= '.page-id-'.get_the_ID().'.hero-fullwidth .hero-innner-last-child .u-text-lead{font-size: '.$page_desc_fs.'px!important; }';
   }
   if ( $page_desc_mb !='' ) {
      $theCSS .= '.page-id-'.get_the_ID().'.hero-fullwidth .hero-innner-last-child .u-text-lead{margin-bottom: '.$page_desc_mb.'px!important; }';
   }
   //Hero Button
   if ( $page_herobtn_id == true ) {
      $theCSS .= '.page-id-'.get_the_ID().'.hero-fullwidth .hero-innner-last-child .custom-btn i{ display :none!important; }';
   }
   if ( $page_herobtn_cbg !='' ) {
      $theCSS .= '.page-id-'.get_the_ID().'.hero-fullwidth .hero-innner-last-child .custom-btn { background-color : '.$page_herobtn_cbg .' !important; border-color : '.$page_herobtn_cbg .' !important;  }';
   }
   if ( $page_herobtn_hbg !='' ) {
      $theCSS .= '.page-id-'.get_the_ID().'.hero-fullwidth .hero-innner-last-child .custom-btn:hover{ background-color : '.$page_herobtn_hbg .' !important; border-color : '.$page_herobtn_hbg .' !important; }';
   }
   if ( $page_herobtn_tc !='' ) {
      $theCSS .= '.page-id-'.get_the_ID().'.hero-fullwidth .hero-innner-last-child .custom-btn { color : '.$page_herobtn_tc .' !important; }';
   }
   if ( $page_herobtn_th !='' ) {
      $theCSS .= '.page-id-'.get_the_ID().'.hero-fullwidth .hero-innner-last-child .custom-btn:hover{ color : '.$page_herobtn_th .' !important; }';
   }
   //Hero Bredcrumbs
   if ( $page_bred_ic !='' ) {
      $theCSS .= '.page-id-'.get_the_ID().'.hero-fullwidth .breadcrumb,.page-id-'.get_the_ID().'.hero-fullwidth .breadcrumb span a span{ color : '.$page_bred_ic .' !important; }';
   }
   if ( $page_bred_tc !='' ) {
      $theCSS .= '.page-id-'.get_the_ID().'.hero-fullwidth .breadcrumb span{ color : '.$page_bred_tc .' !important; }';
   }
   if ( $page_bred_htc !='' ) {
      $theCSS .= '.page-id-'.get_the_ID().'.hero-fullwidth .breadcrumb span:hover{ color : '.$page_bred_htc .' !important; }';
   }
   if ( $page_bred_fs !='' ) {
      $theCSS .= '.page-id-'.get_the_ID().'.hero-fullwidth .breadcrumb span,.page-id-'.get_the_ID().'.hero-fullwidth .breadcrumb{ font-size : '.$page_bred_fs .'px !important; }';
   }

   /*************************************************
   ## Footer Settings
   *************************************************/

	$f_p_c       = 	esc_attr( ot_get_option( 'crypterium_footer_p_c' ) );
	$f_s_c       = 	esc_attr( ot_get_option( 'crypterium_footer_s_c' ) );
	$f_s_hc      = 	esc_attr( ot_get_option( 'crypterium_footer_s_hc' ) );
	$f_add_c     = 	esc_attr( ot_get_option( 'crypterium_f_add_c' ) );
	$footer_s_fs = 	esc_attr( ot_get_option( 'crypterium_footer_s_fs' ) );

   if ( $f_p_c !='' ) 	{
      $theCSS .= '#footer .footer-copyright{ color: '.  $f_p_c .'; }';
   }
   if ( $f_s_c !='' ) 	{
      $theCSS .= '#footer .social-btns  a{ color: '.  $f_s_c .'; }';
   }
   if ( $f_s_hc !='' ) 	{
      $theCSS .= '#footer .social-btns a:hover{ color: '.  $f_s_hc .'; }';
   }
   if ( $f_add_c !='' ) 	{
      $theCSS .= '#footer .__copy{ color: '.  $f_add_c .'!important; }';
   }
   if ( $footer_s_fs !=0 ) 	{
      $theCSS .= '#footer .social-btns a{font-size: '.  $footer_s_fs .'px!important; }';
   }
   /*************************************************
   ## Typography Settings
   *************************************************/

	$typgrph = ot_get_option( 'crypterium_typgrph', array() );
	if ( !empty($typgrph) ) :
   	$theCSS .= 'body{';
      	if ( !empty($typgrph['font-color']) ) {$theCSS .= 'color:'.esc_attr( $typgrph['font-color'] ).'!important;'; }
      	if ( !empty($typgrph['font-family']) ) {$theCSS .= 'font-family:"'.esc_attr( $typgrph['font-family'] ).'"!important;'; }
      	if ( !empty($typgrph['font-size']) ) {$theCSS .= 'font-size:'.esc_attr( $typgrph['font-size'] ).'!important;'; }
      	if ( !empty($typgrph['font-style']) ) {$theCSS .= 'font-style:'.esc_attr( $typgrph['font-style'] ).'!important;'; }
      	if ( !empty($typgrph['font-variant']) ) {$theCSS .= 'font-variant:'.esc_attr( $typgrph['font-variant'] ).'!important;'; }
      	if ( !empty($typgrph['font-weight']) ) {$theCSS .= 'font-weight:'.esc_attr( $typgrph['font-weight'] ).'!important;'; }
      	if ( !empty($typgrph['letter-spacing']) ) {$theCSS .= 'letter-spacing:'.esc_attr( $typgrph['letter-spacing'] ).'!important;'; }
      	if ( !empty($typgrph['line-height'])) {$theCSS .= 'line-height:'.esc_attr( $typgrph['line-height'] ).'!important;'; }
      	if ( !empty($typgrph['text-decoration'])){$theCSS .= 'text-decoration:'.esc_attr($typgrph['text-decoration']).'!important;'; }
      	if ( !empty($typgrph['text-transform'])){$theCSS .= 'text-transform:'.esc_attr($typgrph['text-transform']).'!important;'; }
   	$theCSS .= '}';
	endif;
	//
	$typgrph1 = ot_get_option( 'crypterium_typgrph1', array() );
	if ( !empty($typgrph1) ) :
   	$theCSS .= 'body h1{';
      	if ( !empty($typgrph1['font-color']) ) {$theCSS .= 'color:'.esc_attr( $typgrph1['font-color'] ).'!important;'; }
      	if ( !empty($typgrph1['font-family']) ) {$theCSS .= 'font-family:"'.esc_attr( $typgrph1['font-family'] ).'"!important;'; }
      	if ( !empty($typgrph1['font-size']) ) {$theCSS .= 'font-size:'.esc_attr( $typgrph1['font-size'] ).'!important;'; }
      	if ( !empty($typgrph1['font-style']) ) {$theCSS .= 'font-style:'.esc_attr( $typgrph1['font-style'] ).'!important;'; }
      	if ( !empty($typgrph1['font-variant']) ) {$theCSS .= 'font-variant:'.esc_attr( $typgrph1['font-variant'] ).'!important;'; }
      	if ( !empty($typgrph1['font-weight']) ) {$theCSS .= 'font-weight:'.esc_attr( $typgrph1['font-weight'] ).'!important;'; }
      	if ( !empty($typgrph1['letter-spacing']) ) {$theCSS .= 'letter-spacing:'.esc_attr( $typgrph1['letter-spacing'] ).'!important;'; }
      	if ( !empty($typgrph1['line-height'])) {$theCSS .= 'line-height:'.esc_attr( $typgrph1['line-height'] ).'!important;'; }
      	if ( !empty($typgrph1['text-decoration'])){$theCSS .= 'text-decoration:'.esc_attr($typgrph1['text-decoration']).'!important;'; }
      	if ( !empty($typgrph1['text-transform'])){$theCSS .= 'text-transform:'.esc_attr($typgrph1['text-transform']).'!important;'; }
   	$theCSS .= '}';
	endif;
	//
	$typgrph2 = ot_get_option( 'crypterium_typgrph2', array() );
	if ( !empty($typgrph2) ) :
   	$theCSS .= 'body h2{';
      	if ( !empty($typgrph2['font-color']) ) {$theCSS .= 'color:'.esc_attr( $typgrph2['font-color'] ).'!important;'; }
      	if ( !empty($typgrph2['font-family']) ) {$theCSS .= 'font-family:'.esc_attr( $typgrph2['font-family'] ).'!important;'; }
      	if ( !empty($typgrph2['font-size']) ) {$theCSS .= 'font-size:'.esc_attr( $typgrph2['font-size'] ).'!important;'; }
      	if ( !empty($typgrph2['font-style']) ) {$theCSS .= 'font-style:'.esc_attr( $typgrph2['font-style'] ).'!important;'; }
      	if ( !empty($typgrph2['font-variant']) ) {$theCSS .= 'font-variant:'.esc_attr( $typgrph2['font-variant'] ).'!important;'; }
      	if ( !empty($typgrph2['font-weight']) ) {$theCSS .= 'font-weight:'.esc_attr( $typgrph2['font-weight'] ).'!important;'; }
      	if ( !empty($typgrph2['letter-spacing']) ) {$theCSS .= 'letter-spacing:'.esc_attr( $typgrph2['letter-spacing'] ).'!important;'; }
      	if ( !empty($typgrph2['line-height'])) {$theCSS .= 'line-height:'.esc_attr( $typgrph2['line-height'] ).'!important;'; }
      	if ( !empty($typgrph2['text-decoration'])){$theCSS .= 'text-decoration:'.esc_attr($typgrph2['text-decoration']).'!important;'; }
      	if ( !empty($typgrph2['text-transform'])){$theCSS .= 'text-transform:'.esc_attr($typgrph2['text-transform']).'!important;'; }
   	$theCSS .= '}';
	endif;
	//
	$typgrph3 = ot_get_option( 'crypterium_typgrph3', array() );
	if ( !empty($typgrph3) ) :
   	$theCSS .= 'body h3{';
      	if ( !empty($typgrph3['font-color']) ) {$theCSS .= 'color:'.esc_attr( $typgrph3['font-color'] ).'!important;'; }
      	if ( !empty($typgrph3['font-family']) ) {$theCSS .= 'font-family:'.esc_attr( $typgrph3['font-family'] ).'!important;'; }
      	if ( !empty($typgrph3['font-size']) ) {$theCSS .= 'font-size:'.esc_attr( $typgrph3['font-size'] ).'!important;'; }
      	if ( !empty($typgrph3['font-style']) ) {$theCSS .= 'font-style:'.esc_attr( $typgrph3['font-style'] ).'!important;'; }
      	if ( !empty($typgrph3['font-variant']) ) {$theCSS .= 'font-variant:'.esc_attr( $typgrph3['font-variant'] ).'!important;'; }
      	if ( !empty($typgrph3['font-weight']) ) {$theCSS .= 'font-weight:'.esc_attr( $typgrph3['font-weight'] ).'!important;'; }
      	if ( !empty($typgrph3['letter-spacing']) ) {$theCSS .= 'letter-spacing:'.esc_attr( $typgrph3['letter-spacing'] ).'!important;'; }
      	if ( !empty($typgrph3['line-height'])) {$theCSS .= 'line-height:'.esc_attr( $typgrph3['line-height'] ).'!important;'; }
      	if ( !empty($typgrph3['text-decoration'])){$theCSS .= 'text-decoration:'.esc_attr($typgrph3['text-decoration']).'!important;'; }
      	if ( !empty($typgrph3['text-transform'])){$theCSS .= 'text-transform:'.esc_attr($typgrph3['text-transform']).'!important;'; }
   	$theCSS .= '}';
	endif;
	//
	$typgrph4 = ot_get_option( 'crypterium_typgrph4', array() );
	if ( !empty($typgrph4) ) :
   	$theCSS .= 'body h4{';
      	if ( !empty($typgrph4['font-color']) ) {$theCSS .= 'color:'.esc_attr( $typgrph4['font-color'] ).'!important;'; }
      	if ( !empty($typgrph4['font-family']) ) {$theCSS .= 'font-family:'.esc_attr( $typgrph4['font-family'] ).'!important;'; }
      	if ( !empty($typgrph4['font-size']) ) {$theCSS .= 'font-size:'.esc_attr( $typgrph4['font-size'] ).'!important;'; }
      	if ( !empty($typgrph4['font-style']) ) {$theCSS .= 'font-style:'.esc_attr( $typgrph4['font-style'] ).'!important;'; }
      	if ( !empty($typgrph4['font-variant']) ) {$theCSS .= 'font-variant:'.esc_attr( $typgrph4['font-variant'] ).'!important;'; }
      	if ( !empty($typgrph4['font-weight']) ) {$theCSS .= 'font-weight:'.esc_attr( $typgrph4['font-weight'] ).'!important;'; }
      	if ( !empty($typgrph4['letter-spacing']) ) {$theCSS .= 'letter-spacing:'.esc_attr( $typgrph4['letter-spacing'] ).'!important;'; }
      	if ( !empty($typgrph4['line-height'])) {$theCSS .= 'line-height:'.esc_attr( $typgrph4['line-height'] ).'!important;'; }
      	if ( !empty($typgrph4['text-decoration'])){$theCSS .= 'text-decoration:'.esc_attr($typgrph4['text-decoration']).'!important;'; }
      	if ( !empty($typgrph4['text-transform'])){$theCSS .= 'text-transform:'.esc_attr($typgrph4['text-transform']).'!important;'; }
   	$theCSS .= '}';
	endif;
	//
	$typgrph5 = ot_get_option( 'crypterium_typgrph5', array() );
	if ( !empty($typgrph5) ) :
   	$theCSS .= 'body h5{';
      	if ( !empty($typgrph5['font-color']) ) {$theCSS .= 'color:'.esc_attr( $typgrph5['font-color'] ).'!important;'; }
      	if ( !empty($typgrph5['font-family']) ) {$theCSS .= 'font-family:'.esc_attr( $typgrph5['font-family'] ).'!important;'; }
      	if ( !empty($typgrph5['font-size']) ) {$theCSS .= 'font-size:'.esc_attr( $typgrph5['font-size'] ).'!important;'; }
      	if ( !empty($typgrph5['font-style']) ) {$theCSS .= 'font-style:'.esc_attr( $typgrph5['font-style'] ).'!important;'; }
      	if ( !empty($typgrph5['font-variant']) ) {$theCSS .= 'font-variant:'.esc_attr( $typgrph5['font-variant'] ).'!important;'; }
      	if ( !empty($typgrph5['font-weight']) ) {$theCSS .= 'font-weight:'.esc_attr( $typgrph5['font-weight'] ).'!important;'; }
      	if ( !empty($typgrph5['letter-spacing']) ) {$theCSS .= 'letter-spacing:'.esc_attr( $typgrph5['letter-spacing'] ).'!important;'; }
      	if ( !empty($typgrph5['line-height'])) {$theCSS .= 'line-height:'.esc_attr( $typgrph5['line-height'] ).'!important;'; }
      	if ( !empty($typgrph5['text-decoration'])){$theCSS .= 'text-decoration:'.esc_attr($typgrph5['text-decoration']).'!important;'; }
      	if ( !empty($typgrph5['text-transform'])){$theCSS .= 'text-transform:'.esc_attr($typgrph5['text-transform']).'!important;'; }
   	$theCSS .= '}';
	endif;
	//
	$typgrph6 = ot_get_option( 'crypterium_typgrph6', array() );
	if ( !empty($typgrph6) ) :
   	$theCSS .= 'body h6{';
      	if ( !empty($typgrph6['font-color']) ) {$theCSS .= 'color:'.esc_attr( $typgrph6['font-color'] ).'!important;'; }
      	if ( !empty($typgrph6['font-family']) ) {$theCSS .= 'font-family:'.esc_attr( $typgrph6['font-family'] ).'!important;'; }
      	if ( !empty($typgrph6['font-size']) ) {$theCSS .= 'font-size:'.esc_attr( $typgrph6['font-size'] ).'!important;'; }
      	if ( !empty($typgrph6['font-style']) ) {$theCSS .= 'font-style:'.esc_attr( $typgrph6['font-style'] ).'!important;'; }
      	if ( !empty($typgrph6['font-variant']) ) {$theCSS .= 'font-variant:'.esc_attr( $typgrph6['font-variant'] ).'!important;'; }
      	if ( !empty($typgrph6['font-weight']) ) {$theCSS .= 'font-weight:'.esc_attr( $typgrph6['font-weight'] ).'!important;'; }
      	if ( !empty($typgrph6['letter-spacing']) ) {$theCSS .= 'letter-spacing:'.esc_attr( $typgrph6['letter-spacing'] ).'!important;'; }
      	if ( !empty($typgrph6['line-height'])) {$theCSS .= 'line-height:'.esc_attr( $typgrph6['line-height'] ).'!important;'; }
      	if ( !empty($typgrph6['text-decoration'])){$theCSS .= 'text-decoration:'.esc_attr($typgrph6['text-decoration']).'!important;'; }
      	if ( !empty($typgrph6['text-transform'])){$theCSS .= 'text-transform:'.esc_attr($typgrph6['text-transform']).'!important;'; }
   	$theCSS .= '}';
	endif;
	$typgrph7 = ot_get_option( 'crypterium_typgrph7', array() );
	if ( !empty($typgrph7) ) :
   	$theCSS .= 'body p{';
      	if ( !empty($typgrph7['font-color']) ) {$theCSS .= 'color:'.esc_attr( $typgrph7['font-color'] ).'!important;'; }
      	if ( !empty($typgrph7['font-family']) ) {$theCSS .= 'font-family:'.esc_attr( $typgrph7['font-family'] ).'!important;'; }
      	if ( !empty($typgrph7['font-size']) ) {$theCSS .= 'font-size:'.esc_attr( $typgrph7['font-size'] ).'!important;'; }
      	if ( !empty($typgrph7['font-style']) ) {$theCSS .= 'font-style:'.esc_attr( $typgrph7['font-style'] ).'!important;'; }
      	if ( !empty($typgrph7['font-variant']) ) {$theCSS .= 'font-variant:'.esc_attr( $typgrph7['font-variant'] ).'!important;'; }
      	if ( !empty($typgrph7['font-weight']) ) {$theCSS .= 'font-weight:'.esc_attr( $typgrph7['font-weight'] ).'!important;'; }
      	if ( !empty($typgrph7['letter-spacing']) ) {$theCSS .= 'letter-spacing:'.esc_attr( $typgrph7['letter-spacing'] ).'!important;'; }
      	if ( !empty($typgrph7['line-height'])) {$theCSS .= 'line-height:'.esc_attr( $typgrph7['line-height'] ).'!important;'; }
      	if ( !empty($typgrph7['text-decoration'])){$theCSS .= 'text-decoration:'.esc_attr($typgrph7['text-decoration']).'!important;'; }
      	if ( !empty($typgrph7['text-transform'])){$theCSS .= 'text-transform:'.esc_attr($typgrph7['text-transform']).'!important;'; }
   	$theCSS .= '}';
	endif;

    /* Add CSS to style.css */
    wp_add_inline_style( 'crypterium-custom-style', $theCSS );
	}

add_action( 'wp_enqueue_scripts', 'crypterium_theme_css_options' );
