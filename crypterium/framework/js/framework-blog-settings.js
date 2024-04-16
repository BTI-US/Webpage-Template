(function ($) {

    "use strict";
    // preloader
    jQuery(window).load(function () {
        jQuery('.preloader').fadeOut('slow', function () {
            jQuery(this).remove();
        });
    });
    jQuery(document).ready(function( $ ) {

        // blog list
        jQuery('.flexslider').flexslider({controlNav:true});
        jQuery(".video-responsive").fitVids();
        jQuery(".single-inner-content table, .crypterium-post-class table" ).addClass( "table table-striped" );

    });

})(jQuery);
