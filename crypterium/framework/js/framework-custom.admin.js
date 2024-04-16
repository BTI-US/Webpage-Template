
(function ($) {

  "use strict";


/*-----------------------------------------------------------------------------------*/
/*	Custom JS - All back-end jQuery
-----------------------------------------------------------------------------------*/

jQuery(document).ready(function() {


	// A few overrides to the rwmb metaboxes.

	jQuery('.rwmb-text').addClass('widefat');
	jQuery('.rwmb-oembed').css('width', '80%');
	jQuery('.rwmb-textarea').removeClass('large-text').addClass('widefat');
	jQuery('.rwmb-delete-file').on(function(e) {
		e.preventDefault();
		jQuery(this).parent().parent().slideUp(600);
	});

	// Show metaboxes according to the current post format.



/*----------------------------------------------------------------------------------*/
/*	Gallery Options
/*----------------------------------------------------------------------------------*/

	var galleryOptions = jQuery('#gallery-settings');
	var galleryTrigger = jQuery('#post-format-gallery');

	galleryOptions.css('display', 'none');


/*----------------------------------------------------------------------------------*/
/*	Quote Options
/*----------------------------------------------------------------------------------*/

	var quoteOptions = jQuery('#quote-settings');
	var quoteTrigger = jQuery('#post-format-quote');

	quoteOptions.css('display', 'none');

/*----------------------------------------------------------------------------------*/
/*	Image Options
/*----------------------------------------------------------------------------------*/

	var imageOptions = jQuery('#image-settings');
	var imageTrigger = jQuery('#post-format-image');

	imageOptions.css('display', 'none');


/*----------------------------------------------------------------------------------*/
/*	Link Options
/*----------------------------------------------------------------------------------*/

	var linkOptions = jQuery('#link-settings');
	var linkTrigger = jQuery('#post-format-link');

	linkOptions.css('display', 'none');

/*----------------------------------------------------------------------------------*/
/*	Status Options
/*----------------------------------------------------------------------------------*/

	var statusOptions = jQuery('#status-settings');
	var statusTrigger = jQuery('#post-format-status');

	statusOptions.css('display', 'none');

/*----------------------------------------------------------------------------------*/
/*	Audio Options
/*----------------------------------------------------------------------------------*/

	var audioOptions = jQuery('#audio-settings');
	var audioTrigger = jQuery('#post-format-audio');

	audioOptions.css('display', 'none');

/*----------------------------------------------------------------------------------*/
/*	Video Options
/*----------------------------------------------------------------------------------*/

	var videoOptions = jQuery('#video-settings');
	var videoTrigger = jQuery('#post-format-video');

	videoOptions.css('display', 'none');

/*----------------------------------------------------------------------------------*/
/*	The Brain
/*----------------------------------------------------------------------------------*/

	var group = jQuery('#post-formats-select input');


	group.change( function() {

		if (jQuery(this).val() == 'gallery') {
			galleryOptions.css('display', 'block');
			ninethemeHideAll(galleryOptions);

		} else if(jQuery(this).val() == 'quote') {
			quoteOptions.css('display', 'block');
			ninethemeHideAll(quoteOptions);

		} else if(jQuery(this).val() == 'link') {
			linkOptions.css('display', 'block');
			ninethemeHideAll(linkOptions);

		} else if(jQuery(this).val() == 'status') {
			statusOptions.css('display', 'block');
			ninethemeHideAll(statusOptions);

		} else if(jQuery(this).val() == 'audio') {
			audioOptions.css('display', 'block');
			ninethemeHideAll(audioOptions);

		} else if(jQuery(this).val() == 'video') {
			videoOptions.css('display', 'block');
			ninethemeHideAll(videoOptions);

		} else if(jQuery(this).val() == 'image') {
			imageOptions.css('display', 'block');
			ninethemeHideAll(imageOptions);

		} else {
			quoteOptions.css('display', 'none');
			videoOptions.css('display', 'none');
			linkOptions.css('display', 'none');
			statusOptions.css('display', 'none');
			audioOptions.css('display', 'none');
			imageOptions.css('display', 'none');
		}

	});

	if(galleryTrigger.is(':checked'))
		galleryOptions.css('display', 'block');

	if(quoteTrigger.is(':checked'))
		quoteOptions.css('display', 'block');

	if(linkTrigger.is(':checked'))
		linkOptions.css('display', 'block');

	if(statusTrigger.is(':checked'))
		statusOptions.css('display', 'block');

	if(audioTrigger.is(':checked'))
		audioOptions.css('display', 'block');

	if(videoTrigger.is(':checked'))
		videoOptions.css('display', 'block');

	if(imageTrigger.is(':checked'))
		imageOptions.css('display', 'block');

	function ninethemeHideAll(notThisOne) {
		videoOptions.css('display', 'none');
		galleryOptions.css('display', 'none');
		quoteOptions.css('display', 'none');
		linkOptions.css('display', 'none');
		statusOptions.css('display', 'none');
		audioOptions.css('display', 'none');
		imageOptions.css('display', 'none');
		notThisOne.css('display', 'block');
	}

/*----------------------------------------------------------------------------------*/
/*	for displaying homepage opt
/*----------------------------------------------------------------------------------*/

	var pageoptions = jQuery('#crypterium_page_hero_display');

	if( pageoptions.is(':checked')) {
		jQuery('#pageheadingstylesettings').hide();
		jQuery('#pagetitlesettings').hide();
		jQuery('#pagesubtitlesettings').hide();
		jQuery('#pagebuttonsettings').hide();
		jQuery('#pagebreadsettings').hide();
	}
	else {
		jQuery('#pageheadingstylesettings').slideDown( "slow" );
		jQuery('#pagetitlesettings').slideDown( "slow" );
		jQuery('#pagesubtitlesettings').slideDown( "slow" );
		jQuery('#pagebuttonsettings').slideDown( "slow" );
		jQuery('#pagebreadsettings').slideDown( "slow" );
	}
	pageoptions.on('change', function(){
		if(pageoptions.is(':checked')) {
			jQuery('#pageheadingstylesettings').hide();
			jQuery('#pagetitlesettings').hide();
			jQuery('#pagesubtitlesettings').hide();
			jQuery('#pagebuttonsettings').hide();
			jQuery('#pagebreadsettings').hide();
		}
		else {
			jQuery('#pageheadingstylesettings').slideDown( "slow" );
			jQuery('#pagetitlesettings').slideDown( "slow" );
			jQuery('#pagesubtitlesettings').slideDown( "slow" );
			jQuery('#pagebuttonsettings').slideDown( "slow" );
			jQuery('#pagebreadsettings').slideDown( "slow" );
		}
	});
	//page title
	var titledisplay = jQuery('#crypterium_disable_title');
	var bigtitlewrapper = jQuery('label[for="crypterium_use_bigtitle"]').parents('.rwmb-checkbox-wrapper');
	var titlewrapper = jQuery('label[for="crypterium_alt_title"]').parents('.rwmb-text-wrapper');
	var colorwrapper = jQuery('label[for="crypterium_page_title_color"]').parents('.rwmb-color-wrapper');
	var titlemargin	 = jQuery('label[for="crypterium_page_title_mb"]').parents('.rwmb-number-wrapper');


	if( titledisplay.is(':checked')) {
		bigtitlewrapper.hide();
		titlewrapper.hide();
		colorwrapper.hide();
		titlemargin.hide();
	}
	else {
		bigtitlewrapper.slideDown( "slow" );
		titlewrapper.slideDown( "slow" );
		colorwrapper.slideDown( "slow" );
		titlemargin.slideDown( "slow" );
	}
	titledisplay.on('change', function(){
		if(titledisplay.is(':checked')) {
		bigtitlewrapper.hide();
		titlewrapper.hide();
		colorwrapper.hide();
		titlemargin.hide();
		}
		else {
		bigtitlewrapper.slideDown( "slow" );
		titlewrapper.slideDown( "slow" );
		colorwrapper.slideDown( "slow" );
		titlemargin.slideDown( "slow" );
		}
	});
	//page subtitle
	var subtitledisplay = jQuery('#crypterium_disable_subtitle');
	var subtitlewrapper = jQuery('label[for="crypterium_subtitle"]').parents('.rwmb-wysiwyg-wrapper');
	var subcolorwrapper = jQuery('label[for="crypterium_page_subtitle_color"]').parents('.rwmb-color-wrapper');
	var submaxwidth		= jQuery('label[for="crypterium_page_subtitle_maxw"]').parents('.rwmb-number-wrapper');
	var submarginwrapper= jQuery('label[for="crypterium_page_subtitle_mb"]').parents('.rwmb-number-wrapper');

	if( subtitledisplay.is(':checked')) {
		subtitlewrapper.hide();
		subcolorwrapper.hide();
		submarginwrapper.hide();
		submaxwidth.hide();
	}
	else {
		subtitlewrapper.slideDown( "slow" );
		subcolorwrapper.slideDown( "slow" );
		submarginwrapper.slideDown( "slow" );
		submaxwidth.slideDown( "slow" );
	}
	subtitledisplay.on('change', function(){
		if(subtitledisplay.is(':checked')) {
		subtitlewrapper.hide();
		subcolorwrapper.hide();
		submarginwrapper.hide();
		submaxwidth.hide();
		}
		else {
		subtitlewrapper.slideDown( "slow" );
		subcolorwrapper.slideDown( "slow" );
		submarginwrapper.slideDown( "slow" );
		submaxwidth.slideDown( "slow" );
		}
	});

  	//page metabox menu
	var menutype  	  = jQuery('#crypterium_menutype');
	var metaboxmenu1  = jQuery('label[for="crypterium_section_name"]').parents('.rwmb-text-wrapper');
	var metaboxmenu2  = jQuery('label[for="crypterium_section_url"]').parents('.rwmb-text-wrapper');

	if(menutype.val() == 'm') {
		metaboxmenu1.slideDown( "slow" );
		metaboxmenu2.slideDown( "slow" );
	}
	else {
		metaboxmenu1.hide();
		metaboxmenu2.hide();
	}
	menutype.on('change', function(){
		if(menutype.val() == 'm') {
		metaboxmenu1.slideDown( "slow" );
		metaboxmenu2.slideDown( "slow" );
		}
		else {
		metaboxmenu1.hide();
		metaboxmenu2.hide();
		}
	});

  	//portfolio link type
	var portlinktype  = jQuery('#crypterium_port_linktype');
	var portallmeta   = jQuery('#portfolioallmetasingle');
	var portshare  	  = jQuery('#portfoliosharesettings');
	var portdetail    = jQuery('#portfoliopopupsingle');
	var portrelatedd  = jQuery('#portfoliorelated');
	var portslider    = jQuery('label[for="crypterium_port_gallery_image"]').parents('.rwmb-image_advanced-wrapper');
	var portvideo     = jQuery('label[for="crypterium_port_vidurl"]').parents('.rwmb-text-wrapper');
	var topposttitle  = jQuery('label[for="crypterium_show_post_title"]').parents('.rwmb-checkbox-wrapper');
	var topauthor  	  = jQuery('label[for="crypterium_show_author_name"]').parents('.rwmb-checkbox-wrapper');
	var beforeauthor  = jQuery('label[for="crypterium_before_author_text"]').parents('.rwmb-text-wrapper');
	var divider1  	  = jQuery('#fake_divider_id_posttitle').parents('.rwmb-divider-wrapper');
	var divider2  	  = jQuery('#fake_divider_id_author').parents('.rwmb-divider-wrapper');

	if( portlinktype.val() == 'single-popup' ) {
		portslider.slideDown( "slow" );
		topposttitle.slideDown( "slow" );
		topauthor.slideDown( "slow" );
		beforeauthor.slideDown( "slow" );
		divider1.slideDown( "slow" );
		divider2.slideDown( "slow" );
		portallmeta.slideDown( "slow" );
		portdetail.slideDown( "slow" );
		portshare.slideDown( "slow" );
		portrelatedd.slideDown( "slow" );
		portvideo.hide();
	}else if( portlinktype.val() == 'single' ) {
		portslider.hide();
		topposttitle.hide();
		topauthor.hide();
		beforeauthor.hide();
		divider1.hide();
		divider2.hide();
		portallmeta.hide();
		portdetail.hide();
		portshare.hide();
		portrelatedd.hide();
		portvideo.hide();
	}else {
		portslider.hide();
		topposttitle.hide();
		topauthor.hide();
		beforeauthor.hide();
		divider1.hide();
		divider2.hide();
		portallmeta.hide();
		portdetail.hide();
		portshare.hide();
		portrelatedd.hide();
		portvideo.slideDown( "slow" );
	}
	portlinktype.on('change', function(){
		if( portlinktype.val() == 'single-popup' ) {
			portslider.slideDown( "slow" );
			topposttitle.slideDown( "slow" );
			topauthor.slideDown( "slow" );
			beforeauthor.slideDown( "slow" );
			divider1.slideDown( "slow" );
			divider2.slideDown( "slow" );
			portallmeta.slideDown( "slow" );
			portdetail.slideDown( "slow" );
			portshare.slideDown( "slow" );
			portrelatedd.slideDown( "slow" );
			portvideo.hide();
		}else if( portlinktype.val() == 'single' ) {
			portslider.hide();
			topposttitle.hide();
			topauthor.hide();
			beforeauthor.hide();
			divider1.hide();
			divider2.hide();
			portallmeta.hide();
			portdetail.hide();
			portshare.hide();
			portrelatedd.hide();
			portvideo.hide();
		}else {
			portslider.hide();
			topposttitle.hide();
			topauthor.hide();
			beforeauthor.hide();
			divider1.hide();
			divider2.hide();
			portallmeta.hide();
			portdetail.hide();
			portshare.hide();
			portrelatedd.hide();
			portvideo.slideDown( "slow" );
		}
	});
	var portauthor    = jQuery('#crypterium_show_author_name');
  	//portfolio author
	if( ( portauthor.is(':checked') ) && ( portlinktype.val() == 'single-popup' ) ) {
		beforeauthor.hide();
	}
	else if( portlinktype.val() == 'single' ) {
		beforeauthor.hide();
	}
	else if(  portlinktype.val() == 'lightbox' ) {
		beforeauthor.hide();
	}
	else {
		beforeauthor.slideDown( "slow" );
	}
	portauthor.on('change', function(){
		if( ( portauthor.is(':checked') ) && ( portlinktype.val() == 'single-popup' ) ) {
			beforeauthor.hide();
		}
		else if( portlinktype.val() == 'single' ) {
			beforeauthor.hide();
		}
		else if(  portlinktype.val() == 'lightbox' ) {
			beforeauthor.hide();
		}
		else {
			beforeauthor.slideDown( "slow" );
		}
	});

  	//portfolio all meta detail section
	var portmeta  = jQuery('#crypterium_show_portfolio_all_meta');
	if( ( portmeta.is(':checked') ) && ( portlinktype.val() == 'single-popup' ) ) {
		portdetail.hide();
		portshare.hide();
	}
	else if( portlinktype.val() == 'single' ) {
		portdetail.hide();
		portshare.hide();
	}
	else if(  portlinktype.val() == 'lightbox' ) {
		portdetail.hide();
		portshare.hide();
	}
	else {
		portdetail.slideDown( "slow" );
		portshare.slideDown( "slow" );
	}
	portmeta.on('change', function(){
		if( ( portmeta.is(':checked') ) && ( portlinktype.val() == 'single-popup' ) ) {
			portdetail.hide();
			portshare.hide();
		}
		else if( portlinktype.val() == 'single' ) {
			portdetail.hide();
			portshare.hide();
		}
		else if(  portlinktype.val() == 'lightbox' ) {
			portdetail.hide();
			portshare.hide();
		}
		else {
			portdetail.slideDown( "slow" );
			portshare.slideDown( "slow" );
		}
	});

  	//portfolio client
	var portclient  = jQuery('#crypterium_show_portfolio_client_meta');
	var clientname  = jQuery('label[for="crypterium_portfolio_single_client_name"]').parents('.rwmb-text-wrapper');
	var clientlink  = jQuery('label[for="crypterium_portfolio_client_link"]').parents('.rwmb-text-wrapper');

	if( portclient.is(':checked')) {
		clientname.hide();
		clientlink.hide();
	}
	else {
		clientname.slideDown( "slow" );
		clientlink.slideDown( "slow" );
	}
	portclient.on('change', function(){
		if(portclient.is(':checked')) {
			clientname.hide();
			clientlink.hide();
		}
		else {
			clientname.slideDown( "slow" );
			clientlink.slideDown( "slow" );
		}
	});

  	//portfolio button
	var portbtn  	= jQuery('#crypterium_show_portfolio_custom_btn');
	var btntitle    = jQuery('label[for="crypterium_portfolio_custom_btn_title"]').parents('.rwmb-text-wrapper');
	var btnlink     = jQuery('label[for="crypterium_portfolio_custom_btn_link"]').parents('.rwmb-text-wrapper');
	var btntarget   = jQuery('label[for="crypterium_portfolio_custom_btn_target"]').parents('.rwmb-select-wrapper');

	if( portbtn.is(':checked')) {
		btntitle.hide();
		btnlink.hide();
		btntarget.hide();
	}
	else {
		btntitle.slideDown( "slow" );
		btnlink.slideDown( "slow" );
		btntarget.slideDown( "slow" );
	}
	portbtn.on('change', function(){
		if(portbtn.is(':checked')) {
			btntitle.hide();
			btnlink.hide();
			btntarget.hide();
		}
		else {
			btntitle.slideDown( "slow" );
			btnlink.slideDown( "slow" );
			btntarget.slideDown( "slow" );
		}
	});
  	//portfolio share section
	var portshare  		= jQuery('#crypterium_share');
	var shareface 		= jQuery('label[for="crypterium_share_face"]').parents('.rwmb-checkbox-wrapper');
	var sharetwitter 	= jQuery('label[for="crypterium_share_twitter"]').parents('.rwmb-checkbox-wrapper');
	var sharegplus 		= jQuery('label[for="crypterium_share_gplus"]').parents('.rwmb-checkbox-wrapper');
	var sharepinterest 	= jQuery('label[for="crypterium_share_pinterest"]').parents('.rwmb-checkbox-wrapper');
	var sharedivider 	= jQuery('#fake_divider_id_share').parents('.rwmb-divider-wrapper');

	if( portshare.is(':checked')) {
		shareface.hide();
		sharetwitter.hide();
		sharegplus.hide();
		sharepinterest.hide();
		sharedivider.hide();
	}
	else {
		shareface.slideDown( "slow" );
		sharetwitter.slideDown( "slow" );
		sharegplus.slideDown( "slow" );
		sharepinterest.slideDown( "slow" );
		sharedivider.slideDown( "slow" );
	}
	portshare.on('change', function(){
		if(portshare.is(':checked')) {
			shareface.hide();
			sharetwitter.hide();
			sharegplus.hide();
			sharepinterest.hide();
			sharedivider.hide();
		}
		else {
			shareface.slideDown( "slow" );
			sharetwitter.slideDown( "slow" );
			sharegplus.slideDown( "slow" );
			sharepinterest.slideDown( "slow" );
			sharedivider.slideDown( "slow" );
		}
	});
  	//portfolio related section
	var portrelated  = jQuery('#crypterium_show_portfolio_related');
	var relatedcount = jQuery('label[for="crypterium_related_post_count"]').parents('.rwmb-number-wrapper');
	var relatedtitle = jQuery('label[for="crypterium_related_title"]').parents('.rwmb-text-wrapper');

	if( portrelated.is(':checked')) {
		relatedcount.hide();
		relatedtitle.hide();
	}
	else {
		relatedcount.slideDown( "slow" );
		relatedtitle.slideDown( "slow" );
	}
	portrelated.on('change', function(){
		if(portrelated.is(':checked')) {
			relatedcount.hide();
			relatedtitle.hide();
		}
		else {
			relatedcount.slideDown( "slow" );
			relatedtitle.slideDown( "slow" );
		}
	});

});
})(jQuery);
