<?php
/**  The template for displaying the footer 	**/

echo "</main>"; // Site Wrapper End

if ( 'page' == ot_get_option( 'crypterium_footer_template_type' ) && function_exists( 'crypterium_vc_inject_shortcode_css' ) ) {

    if ( '' != ot_get_option( 'crypterium_footer_custom_template' ) ) {

        crypteriumvc_inject_shortcode_css( ot_get_option( 'crypterium_footer_custom_template' ) );

        $content = get_post_field( 'post_content', ot_get_option( 'crypterium_footer_custom_template' ) );

        echo '<footer class="footer-template-'.ot_get_option( 'crypterium_footer_custom_template' ).'">'.do_shortcode( $content ).'</footer>';
    }

} elseif ( 'custom' == ot_get_option( 'crypterium_footer_template_type' ) ) {

    if ( '' != ot_get_option( 'crypterium_footer_custom_html' ) ) {

        echo do_shortcode( ot_get_option( 'crypterium_footer_custom_html' ) );

    }

} else {
    // theme footer area
    do_action('crypterium_widgetize_action');

}
    // action for add elements after theme footer
    do_action('crypterium_after_footer');

    wp_footer();

    ?>

</body>
</html>
