<?php
if ( ! function_exists( 'rwmb_meta' ) || ! is_admin() )
return false;

add_filter( 'rwmb_meta_boxes', 'crypterium_register_meta_boxes' );
function crypterium_register_meta_boxes( $meta_boxes ) {

    $meta_boxes = array();

    /* ----------------------------------------------------- */
    // PAGE HEADER COLOR
    /* ----------------------------------------------------- */
    $meta_boxes[] = array(
        'title' => esc_html__( 'Header - Footer', 'crypterium' ),
        'id' => 'pageheadersettings',
        'pages' => array( 'page' ),
        'context' => 'normal',
        'tab_style' => 'box',
        'priority'=> 'high',
        'tabs' => array(
            'tab1' => 'Header Design',
            'tab2' => 'Footer Design',
        ),
        'fields' => array(
            // tab1
            array(
                'type' => 'heading',
                'id' => 'crypterium_page_design_section',
                'name' => esc_html__( 'Header Options', 'crypterium' ),
                'tab' => 'tab1',
            ),
            // hero align
            array(
                'name' => esc_html__('Header type', 'crypterium'),
                'desc' => esc_html__('Select header color type', 'crypterium'),
                'id' => 'crypterium_header_type',
                'type' => 'select',
                'options' => array(
                    'light' => esc_html__( 'Light', 'crypterium' ),
                    'dark' => esc_html__( 'Dark', 'crypterium' ),
                ),
                'tab' => 'tab1',
                'std' => 'light'
            ),
            array(
                'name' => esc_html__('Header visibility', 'crypterium'),
                'desc' => esc_html__('Select header visibility', 'crypterium'),
                'id' => 'crypterium_header_visibility',
                'type' => 'select',
                'options' => array(
                    'show' => esc_html__( 'Show', 'crypterium' ),
                    'hide' => esc_html__( 'Hide', 'crypterium' ),
                ),
                'tab' => 'tab1',
                'std' => 'show'
            ),
            // color
            array(
                'name' => esc_html__( 'Header navigation background color', 'crypterium' ),
                'id' => 'crypterium_page_nav_bgcolor',
                'type' => 'color',
                'tab' => 'tab1',
            ),
            array(
                'name' => esc_html__( 'Header navigation menu item color', 'crypterium' ),
                'id' => 'crypterium_page_nav_color',
                'type' => 'color',
                'tab' => 'tab1',
            ),
            array(
                'name' => esc_html__( 'Header navigation menu item hover color', 'crypterium' ),
                'id' => 'crypterium_page_nav_hovercolor',
                'type' => 'color',
                'tab' => 'tab1',
            ),
            array(
                'name' => esc_html__( 'Header navigation border bottom Color', 'crypterium' ),
                'id' => 'crypterium_page_nav_border_color',
                'type' => 'color',
                'tab' => 'tab1',
            ),
            array(
                'name' => esc_html__( 'Header sticky navigation background color', 'crypterium' ),
                'id' => 'crypterium_page_sticky_bg',
                'type' => 'color',
                'tab' => 'tab1',
            ),
            array(
                'name' => esc_html__( 'Header sticky navigation menu item color', 'crypterium' ),
                'id' => 'crypterium_page_sticky_nav_color',
                'type' => 'color',
                'tab' => 'tab1',
            ),
            array(
                'name' => esc_html__( 'Header sticky navigation menu item hover color', 'crypterium' ),
                'id' => 'crypterium_page_sticky_hovercolor',
                'type' => 'color',
                'tab' => 'tab1',
            ),
            array(
                'name' => esc_html__( 'Header sticky navigation border bottom Color', 'crypterium' ),
                'id' => 'crypterium_page_sticky_border_color',
                'type' => 'color',
                'tab' => 'tab1',
            ),
            // tab2
            array(
                'type' => 'heading',
                'id' => 'crypterium_page_design_section',
                'name' => esc_html__( 'Page Footer Design', 'crypterium' ),
                'tab' => 'tab2',
            ),
            array(
                'name' => esc_html__('Footer visibility', 'crypterium'),
                'desc' => esc_html__('Select footer visibility', 'crypterium'),
                'id' => 'crypterium_footer_visibility',
                'type' => 'select',
                'options' => array(
                    'show' => esc_html__( 'Show', 'crypterium' ),
                    'hide' => esc_html__( 'Hide', 'crypterium' ),
                ),
                'tab' => 'tab2',
                'std' => 'show'
            ),
            array(
                'name' => esc_html__( 'Footer background color', 'crypterium' ),
                'id' => 'crypterium_f_bgcolor',
                'type' => 'color',
                'tab' => 'tab2',
            ),
            array(
                'name' => esc_html__( 'Footer text color', 'crypterium' ),
                'id' => 'crypterium_f_text_c',
                'type' => 'color',
                'tab' => 'tab2',
            ),
            array(
                'name' => esc_html__( 'Footer link color', 'crypterium' ),
                'id' => 'crypterium_f_th_c',
                'type' => 'color',
                'tab' => 'tab2',
            ),
            array(
                'name' => esc_html__( 'Footer link hover color', 'crypterium' ),
                'id' => 'crypterium_f_p_c',
                'type' => 'color',
                'tab' => 'tab2',
            ),
            array(
                'name' => esc_html__( 'Footer social icon color', 'crypterium' ),
                'id' => 'crypterium_f_social_i',
                'type' => 'color',
                'tab' => 'tab2',
            ),
            array(
                'name' => esc_html__( 'Footer social icon hover Color', 'crypterium' ),
                'id' => 'crypterium_f_social_i_h',
                'type' => 'color',
                'tab' => 'tab2',
            ),
        )
    );
    /* ----------------------------------------------------- */
    // PAGE HEADER COLOR
    /* ----------------------------------------------------- */
    $meta_boxes[] = array(
        'title' => esc_html__( 'Hero Options', 'crypterium' ),
        'id' => 'pageherosettings',
        'pages' => array( 'page' ),
        'context' => 'normal',
        'priority'=> 'high',
        'hide' => array( 'template' => 'custom-page.php' ),
        'tabs' => array(
            'tab1' => 'Hero Display',
            'tab2' => 'Subtitle',
            'tab3' => 'Title',
            'tab4' => 'Description',
            'tab5' => 'Breadcrumb',
            'tab6' => 'Button',
            'tab7' => 'Hero Style',
            'tab8' => 'Page Sidebar',
        ),
        'fields' => array(
            // tab1
            // heading
            array(
                'type' => 'heading',
                'id' => 'crypterium_page_hero_display_settings',
                'name' => esc_html__( 'Page Hero Display', 'crypterium' ),
                'tab' => 'tab1',
            ),
            array(
                'name' => esc_html__( 'Disable page hero section', 'crypterium' ),
                'id' => 'crypterium_page_hero_display',
                'type' => 'checkbox',
                'std' => 0,
                'tab' => 'tab1',
            ),
            // tab2 start
            array(
                'type' => 'heading',
                'id' => 'crypterium_page_slogan_settings',
                'name' => esc_html__( 'Page Slogan Options', 'crypterium' ),
                'tab' => 'tab2',
            ),
            array(
                'name' => esc_html__( 'Disable Page Slogan', 'crypterium' ),
                'id' => 'crypterium_page_slogan_display',
                'type' => 'checkbox',
                'std' => 0,
                'tab' => 'tab2',
            ),
            array(
                'name' => esc_html__( 'Page Slogan', 'crypterium' ),
                'id' => 'crypterium_page_slogan',
                'type' => 'text',
                'clone' => false,
                'tab' => 'tab2',
            ),
            array(
                'name' => esc_html__( 'Page Slogan Color', 'crypterium' ),
                'id' => 'crypterium_page_slogan_color',
                'type' => 'color',
                'tab' => 'tab2',
            ),
            array(
                'name' => esc_html__( 'Page Slogan Font Size', 'crypterium' ),
                'id' => 'crypterium_page_slogan_fs',
                'type' => 'number',
                'min' => 0,
                'step' => 1,
                'tab' => 'tab2',
            ),
            array(
                'name' => esc_html__( 'Page Slogan max-width', 'crypterium' ),
                'id' => 'crypterium_page_slogan_mw',
                'type' => 'number',
                'min' => 0,
                'step' => 1,
                'tab' => 'tab2',
            ),
            array(
                'name' => esc_html__( 'Page Slogan margin-bottom', 'crypterium' ),
                'id' => 'crypterium_page_slogan_mb',
                'type' => 'number',
                'min' => 0,
                'step' => 1,
                'tab' => 'tab2',
            ),
            // tab3
            array(
                'type' => 'heading',
                'id' => 'crypterium_page_heading_settings',
                'name' => esc_html__( 'Page Heading Options', 'crypterium' ),
                'tab' => 'tab3',
            ),
            array(
                'name' => esc_html__( 'Disable Page Heading', 'crypterium' ),
                'id' => 'crypterium_page_heading_display',
                'type' => 'checkbox',
                'std' => 0,
                'tab' => 'tab3',
            ),
            array(
                'name' => esc_html__( 'Alternate Page Heading', 'crypterium' ),
                'id' => 'crypterium_page_heading',
                'clone' => false,
                'type' => 'text',
                'std' => '',
                'tab' => 'tab3',
            ),
            array(
                'name' => esc_html__( 'Page Heading Color', 'crypterium' ),
                'id' => 'crypterium_page_heading_color',
                'type' => 'color',
                'tab' => 'tab3',
            ),
            array(
                'name' => esc_html__( 'Page Heading Font Size', 'crypterium' ),
                'id' => 'crypterium_page_heading_fs',
                'type' => 'number',
                'min' => 0,
                'step' => 1,
                'tab' => 'tab3',
            ),
            array(
                'name' => esc_html__( 'Page Heading margin-bottom', 'crypterium' ),
                'id' => 'crypterium_page_heading_mb',
                'type' => 'number',
                'min' => 0,
                'step' => 1,
                'tab' => 'tab3',
            ),
            // tab4
            array(
                'type' => 'heading',
                'id' => 'crypterium_page_description_settings',
                'name' => esc_html__( 'Page Description Options', 'crypterium' ),
                'tab' => 'tab4',
            ),
            array(
                'name' => esc_html__( 'Disable Page Description', 'crypterium' ),
                'id' => 'crypterium_page_desc_display',
                'type' => 'checkbox',
                'std' => 0,
                'tab' => 'tab4',
            ),
            array(
                'name' => esc_html__( 'Page Description', 'crypterium' ),
                'id' => 'crypterium_page_desc',
                'clone' => false,
                'tab' => 'tab4',
                'type' => 'text',
                'std' => '',
            ),
            array(
                'name' => esc_html__( 'Page Description Color', 'crypterium' ),
                'id' => 'crypterium_page_desc_color',
                'type' => 'color',
                'tab' => 'tab4',
            ),
            array(
                'name' => esc_html__( 'Page Description Font Size', 'crypterium' ),
                'id' => 'crypterium_page_desc_fs',
                'type' => 'number',
                'min' => 0,
                'step' => 1,
                'tab' => 'tab4',
            ),
            array(
                'name' => esc_html__( 'Page Description margin-bottom', 'crypterium' ),
                'id' => 'crypterium_page_desc_mb',
                'type' => 'number',
                'min' => 0,
                'step' => 1,
                'tab' => 'tab4',
            ),
            // tab5
            // heading
            array(
                'type' => 'heading',
                'id' => 'crypterium_page_design_section',
                'name' => esc_html__( 'Page Breadcrumbs', 'crypterium' ),
                'tab' => 'tab5',
            ),
            array(
                'name' => esc_html__( 'Disable page breadcrumbs section', 'crypterium' ),
                'id' => 'crypterium_page_bread_display',
                'type' => 'checkbox',
                'std' => 0,
                'tab' => 'tab5',
            ),
            array(
                'name' => esc_html__( 'Page Breadcrumb Icon Color', 'crypterium' ),
                'id' => 'crypterium_page_bred_iconcolor',
                'type' => 'color',
                'tab' => 'tab5',
            ),
            array(
                'name' => esc_html__( 'Page Breadcrumb Text Color', 'crypterium' ),
                'id' => 'crypterium_page_bred_textcolor',
                'type' => 'color',
                'tab' => 'tab5',
            ),
            array(
                'name' => esc_html__( 'Page Breadcrumb Text Hover Color', 'crypterium' ),
                'id' => 'crypterium_page_bred_htextcolor',
                'type' => 'color',
                'tab' => 'tab5',
            ),
            array(
                'name' => esc_html__( 'Page Breadcrumb Font Size', 'crypterium' ),
                'id' => 'crypterium_page_bred_fs',
                'type' => 'number',
                'min' => 0,
                'step' => 1,
                'tab' => 'tab5',
            ),
            // tab6
            array(
                'type' => 'heading',
                'id' => 'crypterium_page_button_settings',
                'name' => esc_html__( 'Page Button Options', 'crypterium' ),
                'tab' => 'tab6',
            ),
            array(
                'name' => esc_html__( 'Disable page button section', 'crypterium' ),
                'id' => 'crypterium_page_herobtn_display',
                'type' => 'checkbox',
                'std' => 0,
                'tab' => 'tab6',
            ),
            array(
                'name' => esc_html__( 'Button custom title', 'crypterium' ),
                'id' => 'crypterium_page_herobtn',
                'clone' => false,
                'type' => 'text',
                'tab' => 'tab6',
                'std' => ''
            ),
            array(
                'name' => esc_html__( 'Button custom URL', 'crypterium' ),
                'id' => 'crypterium_page_herobtn_url',
                'clone' => false,
                'type' => 'text',
                'tab' => 'tab6',
                'std' => ''
            ),
            array(
                'type' => 'divider',
                'id' => 'crypterium_fake_divider_id_btnstyle',
                'tab' => 'tab6',
            ),
            array(
                'name' => esc_html__( 'Disable button icon', 'crypterium' ),
                'id' => 'crypterium_page_herobtn_icon_display',
                'type' => 'checkbox',
                'std' => 0,
                'tab' => 'tab6',
            ),
            array(
                'name' => esc_html__( 'Button background color', 'crypterium' ),
                'id' => 'crypterium_page_herobtn_custombg',
                'type' => 'color',
                'tab' => 'tab6',
            ),
            array(
                'name' => esc_html__( 'Button hover background color', 'crypterium' ),
                'id' => 'crypterium_page_herobtn_hoverbg',
                'type' => 'color',
                'tab' => 'tab6',
            ),
            array(
                'name' => esc_html__( 'Button title color', 'crypterium' ),
                'id' => 'crypterium_page_herobtn_titlecolor',
                'type' => 'color',
                'tab' => 'tab6',
            ),
            array(
                'name' => esc_html__( 'Button hover title color', 'crypterium' ),
                'id' => 'crypterium_page_herobtn_titlehover',
                'type' => 'color',
                'tab' => 'tab6',
            ),
            // tab7
            // heading
            array(
                'type' => 'heading',
                'id' => 'crypterium_page_general_settings',
                'name' => esc_html__( 'Page Hero Style', 'crypterium' ),
                'tab' => 'tab7',
            ),
            array(
                'name' => esc_html__( 'Background Image', 'crypterium' ),
                'id' => 'crypterium_page_bg_image',
                'type' => 'image_advanced',
                'max_file_uploads' => 1,
                'tab' => 'tab7',
            ),
            // color
            array(
                'name' => esc_html__( 'Background Color', 'crypterium' ),
                'id' => 'crypterium_page_bg_color',
                'type' => 'color',
                'tab' => 'tab7',
            ),
            array(
                'type' => 'divider',
                'id' => 'crypterium_fake_divider_id',
                'tab' => 'tab7',
            ),
            array(
                'name' => esc_html__( 'Hero Height', 'crypterium' ),
                'id' => 'crypterium_page_hero_height',
                'type' => 'number',
                'min' => 0,
                'step' => 1,
                'tab' => 'tab7',
            ),
            array(
                'name' => esc_html__( 'Padding Top', 'crypterium' ),
                'id' => 'crypterium_header_p_top',
                'type' => 'number',
                'min' => 0,
                'step' => 1,
                'tab' => 'tab7',
            ),
            array(
                'name' => esc_html__( 'Padding Right', 'crypterium' ),
                'id' => 'crypterium_header_p_right',
                'type' => 'number',
                'min' => 0,
                'step' => 1,
                'tab' => 'tab7',
            ),
            array(
                'name' => esc_html__( 'Padding Bottom', 'crypterium' ),
                'id' => 'crypterium_header_p_bottom',
                'type' => 'number',
                'min' => 0,
                'step' => 1,
                'tab' => 'tab7',
            ),
            array(
                'name' => esc_html__( 'Padding Left', 'crypterium' ),
                'id' => 'crypterium_header_p_left',
                'type' => 'number',
                'min' => 0,
                'step' => 1,
                'tab' => 'tab7',
            ),
            array(
                'name' => esc_html__( 'Margin Top', 'crypterium' ),
                'id' => 'crypterium_header_m_top',
                'type' => 'number',
                'min' => 0,
                'step' => 1,
                'tab' => 'tab7',
            ),
            array(
                'name' => esc_html__( 'Margin Right', 'crypterium' ),
                'id' => 'crypterium_header_m_right',
                'type' => 'number',
                'min' => 0,
                'step' => 1,
                'tab' => 'tab7',
            ),
            array(
                'name' => esc_html__( 'Margin Bottom', 'crypterium' ),
                'id' => 'crypterium_header_m_bottom',
                'type' => 'number',
                'min' => 0,
                'step' => 1,
                'tab' => 'tab7',
            ),
            array(
                'name' => esc_html__( 'Margin Left', 'crypterium' ),
                'id' => 'crypterium_header_m_left',
                'type' => 'number',
                'min' => 0,
                'step' => 1,
                'tab' => 'tab7',
            ),
            // hero align
            array(
                'name' => esc_html__('Hero Align', 'crypterium'),
                'desc' => esc_html__('Select hero area align.', 'crypterium'),
                'id' => 'crypterium_page_hero_align',
                'type' => 'select',
                'options' => array(
                    'left' => esc_html__( 'Left', 'crypterium' ),
                    'center' => esc_html__( 'Center', 'crypterium' ),
                    'right' => esc_html__( 'Right', 'crypterium' ),
                ),
                'tab' => 'tab7',
                'std' => 'center'
            ),
            // overlay
            array(
                'name' => esc_html__( 'Disable Page Background Overlay', 'crypterium' ),
                'id' => 'crypterium_disable_bgoverlay',
                'type' => 'checkbox',
                'std' => 0,
                'tab' => 'tab7',
            ),
            array(
                'name' => esc_html__( 'Background Overlay', 'crypterium' ),
                'desc' => esc_html__('Please enter the color as rgba.', 'crypterium'),
                'id' => 'crypterium_background_overlay_color',
                'type' => 'color',
                'tab' => 'tab7',
            ),
            // tab8
            array(
                'type' => 'heading',
                'id' => 'crypterium_page_design_section',
                'name' => esc_html__( 'Page Sidebar', 'crypterium' ),
                'tab' => 'tab8',
            ),
            array(
                'name' => esc_html__( 'Page sidebar', 'crypterium' ),
                'id' => 'crypterium_pagelayout',
                'type' => 'select',
                'options' => array(
                    'left-sidebar' => esc_html__( 'left', 'crypterium' ),
                    'right-sidebar' => esc_html__( 'right', 'crypterium' ),
                    'full-width' => esc_html__( 'full', 'crypterium' ),
                ),
                'multiple' => false,
                'std' => 'right-sidebar',
                'placeholder' => esc_html__( 'Select an Item', 'crypterium' ),
                'tab' => 'tab8',
            )
        )
    );
    $ot_register_cpt1 = ot_get_option( 'cpt1' );
    $cpt_slug1 = ( $ot_register_cpt1 != '' ) ? strtolower( esc_html( $ot_register_cpt1 ) ) : 'portfolio';
    /* ----------------------------------------------------- */
    // PORTFOLIO SETTINGS
    /* ----------------------------------------------------- */
    $meta_boxes[] = array(
        'id' => 'portfoliosettings',
        'title' => esc_html__( 'Portfolio Post General', 'crypterium' ),
        'pages' => array( ''.$cpt_slug1.'' ),
        'context' => 'normal',
        'priority' => 'high',
        'fields' => array(
            array(
                'type' => 'heading',
                'id' => 'crypterium_page_design_section',
                'name' => esc_html__( 'Portfolio Post General', 'crypterium' ),
            ),
            array(
                'name' => esc_html__( 'Select link type', 'crypterium' ),
                'id' => 'crypterium_port_linktype',
                'type' => 'select',
                'multiple' => false,
                'std' => 'lightbox',
                'options' => array(
                    'lightbox' => esc_html__( 'Open in Lightbox', 'crypterium' ),
                    'single-popup' => esc_html__( 'Open in Single Popup', 'crypterium' ),
                    'single' => esc_html__( 'Open in Single Page', 'crypterium' ),
                )
            ),
            array(
                'name' => esc_html__('Select Images', 'crypterium'),
                'desc' => esc_html__('Select the images from the media library or upload your new ones for popup slider', 'crypterium'),
                'id' => 'crypterium_port_gallery_image',
                'type' => 'image_advanced',
            ),
            array(
                'name' => esc_html__( 'Video url ( for simple in Lightbox )', 'crypterium' ),
                'desc' => sprintf( esc_html__( 'You can add youtube or vimeo video for portfolio item. %s %s and %s %s', 'crypterium' ), '<b>Youtube URL format:</b>', '<code>https://www.youtube.com/watch?v=ZqnAGgjQ7Rs</code>', '<b>Vimeo URL format:</b>', '<code>https://vimeo.com/203116933</code>' ),
                'id' => 'crypterium_port_vidurl',
                'clone' => false,
                'type' => 'text',
            ),
            array(
                'type' => 'divider',
                'id' => 'crypterium_fake_divider_id_posttitle',
            ),
            array(
                'name' => esc_html__( 'Disable post title ?', 'crypterium' ),
                'id' => 'crypterium_show_post_title',
                'type' => 'checkbox',
                'std' => 0,
            ),
            array(
                'type' => 'divider',
                'id' => 'crypterium_fake_divider_id_author',
            ),
            array(
                'name' => esc_html__( 'Disable author name ?', 'crypterium' ),
                'id' => 'crypterium_show_author_name',
                'type' => 'checkbox',
                'std' => 0,
            ),
            array(
                'name' => esc_html__('Before Author Text', 'crypterium'),
                'desc' => esc_html__('Enter before author text if you want to use before author name.Please leave blank if you do not use.', 'crypterium'),
                'id' => 'crypterium_before_author_text',
                'type' => 'text',
            )
        )
    );
    /* ----------------------------------------------------- */
    // GENERAL PORTFOLIO SINGLE SETINGS
    /* ----------------------------------------------------- */
    $meta_boxes[] = array(
        'id' => 'portfolioallmetasingle',
        'title' => esc_html__( 'Post Meta Detail', 'crypterium' ),
        'pages' => array( ''.$cpt_slug1.'' ),
        'context' => 'normal',
        'priority' => 'high',
        'fields' => array(
            array(
                'type' => 'heading',
                'id' => 'crypterium_page_design_section',
                'name' => esc_html__( 'Post Meta Detail', 'crypterium' ),
            ),
            array(
                'name' => esc_html__( 'Disable post all detail meta ?', 'crypterium' ),
                'id' => 'crypterium_show_portfolio_all_meta',
                'type' => 'checkbox',
                'std' => 0,
            )
        )
    );
    /* ----------------------------------------------------- */
    // GENERAL PORTFOLIO SINGLE SETINGS
    /* ----------------------------------------------------- */
    $meta_boxes[] = array(
        'id' => 'portfoliopopupsingle',
        'title' => esc_html__( 'Post Detail', 'crypterium' ),
        'pages' => array( ''.$cpt_slug1.'' ),
        'context' => 'normal',
        'priority' => 'high',
        'fields' => array(
            array(
                'type' => 'heading',
                'id' => 'crypterium_page_design_section',
                'name' => esc_html__( 'Post Detail', 'crypterium' ),
            ),
            array(
                'name' => esc_html__( 'Disable post content ?', 'crypterium' ),
                'id' => 'crypterium_show_post_content',
                'type' => 'checkbox',
                'std' => 0,
            ),
            array(
                'type' => 'divider',
                'id' => 'crypterium_fake_divider_id',
            ),
            array(
                'name' => esc_html__( 'Disable client name ?', 'crypterium' ),
                'id' => 'crypterium_show_portfolio_client_meta',
                'type' => 'checkbox',
                'std' => 0,
            ),
            array(
                'name' => esc_html__('Client Name for Project', 'crypterium'),
                'desc' => esc_html__('Enter Client Name for this post', 'crypterium'),
                'id' => 'crypterium_portfolio_single_client_name',
                'type' => 'text',
            ),
            array(
                'name' => esc_html__('Add custom link for Client', 'crypterium'),
                'desc' => esc_html__('Enter link for Client or leave blank.Default Client link is Author link', 'crypterium'),
                'id' => 'crypterium_portfolio_client_link',
                'type' => 'text',
            ),
            array(
                'type' => 'divider',
                'id' => 'crypterium_fake_divider_id',
            ),
            array(
                'name' => esc_html__( 'Disable post date ?', 'crypterium' ),
                'id' => 'crypterium_show_portfolio_date_meta',
                'type' => 'checkbox',
                'std' => 0,
            ),
            array(
                'name' => esc_html__( 'Disable post categories ?', 'crypterium' ),
                'id' => 'crypterium_show_portfolio_category_meta',
                'type' => 'checkbox',
                'std' => 0,
            ),
            array(
                'type' => 'divider',
                'id' => 'crypterium_fake_divider_id',
            ),
            array(
                'name' => esc_html__( 'Disable button ?', 'crypterium' ),
                'id' => 'crypterium_show_portfolio_custom_btn',
                'type' => 'crypterium_checkbox',
                'std' => 0,
            ),
            array(
                'name' => esc_html__('Button Title', 'crypterium'),
                'desc' => esc_html__('Enter button title.', 'crypterium'),
                'id' => 'crypterium_portfolio_custom_btn_title',
                'type' => 'text',
            ),
            array(
                'name' => esc_html__('Button Custom Link', 'crypterium'),
                'desc' => esc_html__('Enter button custom link.', 'crypterium'),
                'id' => 'crypterium_portfolio_custom_btn_link',
                'type' => 'text',
            ),
            array(
                'name' => 'Select target type',
                'id' => 'crypterium_portfolio_custom_btn_target',
                'type' => 'select',
                'desc' => 'Select button target type',
                'multiple' => false,
                'std' => '_blank',
                'options' => array(
                    '_blank' => '_blank',
                    '_self' => '_self',
                    '_parent' => '_parent',
                    '_top' => '_top',
                )
            ),
        )
    );

    /* ----------------------------------------------------- */
    // PORTFOLIO SHARE SETTINGS
    /* ----------------------------------------------------- */
    $meta_boxes[] = array(
        'id' => 'portfoliosharesettings',
        'title' => esc_html__( 'Portfolio Share Options', 'crypterium' ),
        'pages' => array( ''.$cpt_slug1.'' ),
        'context' => 'normal',
        'priority' => 'high',
        'fields' => array(
            array(
                'type' => 'heading',
                'id' => 'crypterium_page_design_section',
                'name' => esc_html__( 'Portfolio Share Options', 'crypterium' ),
            ),
            array(
                'name' => esc_html__( 'Disable Post Share?', 'crypterium' ),
                'id' => 'crypterium_share',
                'type' => 'checkbox',
                'std' => 0,
            ),
            array(
                'type' => 'divider',
                'id' => 'crypterium_fake_divider_id_share',
            ),
            array(
                'name' => esc_html__( 'Share on Facebook?', 'crypterium' ),
                'id' => 'crypterium_share_face',
                'type' => 'checkbox',
                'std' => 0,
            ),
            array(
                'name' => esc_html__( 'Share on Twitter?', 'crypterium' ),
                'id' => 'crypterium_share_twitter',
                'type' => 'checkbox',
                'std' => 0,
            ),
            array(
                'name' => esc_html__( 'Share on Google plus?', 'crypterium' ),
                'id' => 'crypterium_share_gplus',
                'type' => 'checkbox',
                'std' => 0,
            ),
            array(
                'name' => esc_html__( 'Share on Pinterest?', 'crypterium' ),
                'id' => 'crypterium_share_pinterest',
                'type' => 'checkbox',
                'std' => 0,
            )
        )
    );
    /* ----------------------------------------------------- */
    // PORTFOLIO RELATED SETTINGS
    /* ----------------------------------------------------- */
    $meta_boxes[] = array(
        'id' => 'portfoliorelated',
        'title' => esc_html__( 'Related Portfolio', 'crypterium' ),
        'pages' => array( ''.$cpt_slug1.'' ),
        'context' => 'normal',
        'priority' => 'high',
        'fields' => array(
            array(
                'type' => 'heading',
                'id' => 'crypterium_page_design_section',
                'name' => esc_html__( 'Related Portfolio', 'crypterium' ),
            ),
            array(
                'name' => esc_html__( 'Disable Related Post ?', 'crypterium' ),
                'id' => 'crypterium_show_portfolio_related',
                'type' => 'checkbox',
                'std' => 0,
            ),
            array(
                'name' => esc_html__( 'Related Post Count', 'crypterium' ),
                'id' => 'crypterium_related_post_count',
                'type' => 'number',
                'min' => 0,
                'step' => 1,
            ),
            array(
                'name' => esc_html__('Related Section Title', 'crypterium'),
                'desc' => esc_html__('Enter custom title for related post section.', 'crypterium'),
                'id' => 'crypterium_related_title',
                'type' => 'text',
                'std' => esc_html__('Related Post', 'crypterium'),
            )
        )
    );

    /* ----------------------------------------------------- */
    // PORTFOLIO CUSTOM STYLE SETTINGS
    /* ----------------------------------------------------- */

    $meta_boxes[] = array(
        'id' => 'changeportpoststyle',
        'title' => esc_html__( 'Post Custom Style', 'crypterium' ),
        'pages' => array( ''.$cpt_slug1.'' ),
        'context' => 'normal',
        'priority' => 'high',
        'fields' => array(
            array(
                'type' => 'heading',
                'id' => 'crypterium_page_design_section',
                'name' => esc_html__( 'Post Custom Style', 'crypterium' ),
            ),
            array(
                'name' => esc_html__('Caption active wrap background color', 'crypterium'),
                'desc' => esc_html__('Change the background color for this post.', 'crypterium'),
                'id' => 'crypterium_port_activewrapbg',
                'type' => 'color'
            ),
            array(
                'name' => esc_html__( 'Caption active wrap background opacity', 'crypterium' ),
                'id' => 'crypterium_port_activewrapbgopacity',
                'type' => 'number',
                'min' => 0,
                'max' => 1,
                'step' => 0.1,
            ),
            array(
                'name' => esc_html__('Post category color', 'crypterium'),
                'desc' => esc_html__('Change the category color for this post.', 'crypterium'),
                'id' => 'crypterium_port_catcolor',
                'type' => 'color'
            ),
            array(
                'name' => esc_html__('Post title color', 'crypterium'),
                'desc' => esc_html__('category the title color for this post.', 'crypterium'),
                'id' => 'crypterium_port_titlecolor',
                'type' => 'color'
            ),
            array(
                'name' => esc_html__('Post icon color', 'crypterium'),
                'desc' => esc_html__('category the icon color for this post.', 'crypterium'),
                'id' => 'crypterium_port_iconcolor',
                'type' => 'color'
            ),
        )
    );
    /* ----------------------------------------------------- */
    // TEAM PLUGINS SETTINGS
    /* ----------------------------------------------------- */
    $ot_register_cpt2 = ot_get_option( 'cpt2' );
    $cpt_slug2 = ( $ot_register_cpt2 != '' ) ? strtolower( esc_html( $ot_register_cpt2 ) ) : 'team';
    $meta_boxes[] = array(
        'title' => esc_html__( 'Team Shortcode Options', 'crypterium' ),
        'pages' => array( ''.$cpt_slug2.'' ),
        'clone-group' => 'my-clone-group','clone-group' => 'my-clone-group',
        'id' => 'mm_review',
        'context' => 'normal',
        'priority' => 'high',
        'fields' => array(
            array(
                'type' => 'heading',
                'id' => 'crypterium_page_design_section',
                'name' => esc_html__( 'Team Shortcode Options', 'crypterium' ),
            ),
            array(
                'name' => esc_html__('Team Job', 'crypterium'),
                'id' => 'crypterium_team_job',
                'clone' => false,
                'type' => 'text',
                'std' => 'Developer'
            ),
            array(
                'type' => 'divider',
                'id' => 'crypterium_fake_divider_7',
            ),
            array(
                'name' => esc_html__( 'Social Icon Name', 'crypterium' ),
                'desc' => esc_html__( 'Format: icon-facebook. Enter social icon name here', 'crypterium' ),
                'id' => 'crypterium_social_icon',
                'type' => 'text',
                'std' => 'icon-facebook',
                'class' => 'custom-class',
                'clone' => true,
                'clone-group' => 'my-clone-group','clone-group' => 'my-clone-group',
            ),
            array(
                'name' => esc_html__( 'Social Url', 'crypterium' ),
                'desc' => esc_html__( 'Format: http://facebook.com', 'crypterium' ),
                'id' => 'crypterium_social_url',
                'type' => 'text',
                'std' => '#',
                'class' => 'custom-class',
                'clone' => true,
                'clone-group' => 'my-clone-group',
            ),
            array(
                'type' => 'divider',
                'id' => 'crypterium_fake_divider_8', // Not used, but needed
            ),
            array(
                'name' => esc_html__( 'Select target type', 'crypterium' ),
                'id' => 'crypterium_social_target',
                'type' => 'select',
                'multiple' => false,
                'std' => '_blank',
                'options' => array(
                    '_blank' => '_blank',
                    '_self' => '_self',
                    '_parent' => '_parent',
                    '_top' => '_top',
                )
            )
        )
    );
    $ot_register_cpt3 = ot_get_option( 'cpt3' );
    $cpt_slug3 = ( $ot_register_cpt3 != '' ) ? strtolower( esc_html( $ot_register_cpt3 ) ) : 'pricing';
    /* ----------------------------------------------------- */
    // PRICE TABLE SETTINGS
    /* ----------------------------------------------------- */
    $meta_boxes[] = array(
        'id' => 'pricesettings',
        'title' => esc_html__( 'Price Table Options', 'crypterium' ),
        'pages' => array( ''.$cpt_slug3.'' ),
        'context' => 'normal',
        'priority' => 'high',
        'fields' => array(
            array(
                'type' => 'heading',
                'id' => 'crypterium_page_design_section',
                'name' => esc_html__( 'Price Table Options', 'crypterium' ),
            ),
            array(
                'name' => esc_html__( 'Featured ?', 'crypterium' ),
                'id' => 'crypterium_pricing_active',
                'type' => 'checkbox',
                'std' => 0,
            ),
            array(
                'name' => esc_html__( 'Select table type', 'crypterium' ),
                'id' => 'crypterium_prc_type',
                'type' => 'select',
                'multiple' => false,
                'std' => '_blank',
                'options' => array(
                    'type1' => esc_html__( 'Type 1', 'crypterium' ),
                    'type2' => esc_html__( 'Type 2', 'crypterium' ),
                    'type3' => esc_html__( 'Type 3', 'crypterium' ),
                    'type4' => esc_html__( 'Type 4', 'crypterium' ),
                )
            ),
            array(
                'name' => esc_html__( 'Price active title', 'crypterium' ),
                'id' => 'crypterium_pricing_active_title',
                'clone' => false,
                'type' => 'text',
                'std' => 'Best'
            ),
            array(
                'name' => esc_html__( 'Price header image', 'crypterium' ),
                'id' => 'crypterium_price_image',
                'type' => 'image_advanced',
                'max_file_uploads' => 1,
            ),
            array(
                'name' => esc_html__( 'Image width', 'crypterium' ),
                'id' => 'crypterium_price_img_width',
                'clone' => false,
                'type' => 'text',
                'std' => '46'
            ),
            array(
                'name' => esc_html__( 'Image height', 'crypterium' ),
                'id' => 'crypterium_price_img_height',
                'clone' => false,
                'type' => 'text',
                'std' => '60'
            ),
            array(
                'name' => esc_html__( 'Price title', 'crypterium' ),
                'id' => 'crypterium_price_title',
                'clone' => false,
                'type' => 'text',
                'std' => 'Advanced'
            ),
            array(
                'name' => esc_html__( 'Price subtitle', 'crypterium' ),
                'id' => 'crypterium_price_subtitle',
                'clone' => false,
                'type' => 'text',
                'std' => 'Package for Advanced'
            ),
            array(
                'name' => esc_html__( 'Currency', 'crypterium' ),
                'id' => 'crypterium_price_currency',
                'clone' => false,
                'type' => 'text',
                'std' => esc_html__( 'Per Month', 'crypterium' ),
                'std' => '$'
            ),
            array(
                'name' => esc_html__( 'Price', 'crypterium' ),
                'id' => 'crypterium_price_price',
                'clone' => false,
                'type' => 'text',
                'std' => esc_html__( 'Per Month', 'crypterium' ),
                'std' => '245'
            ),
            array(
                'name' => esc_html__( 'Price period', 'crypterium' ),
                'id' => 'crypterium_period',
                'clone' => false,
                'type' => 'text',
                'std' => esc_html__( 'Per Month', 'crypterium' ),
                'std' => 'monthly'
            ),
            array(
                'name' => esc_html__('Table Features List', 'crypterium'),
                'desc' => esc_html__( 'Add features for this pack', 'crypterium' ),
                'id' => 'crypterium_features_list',
                'type' => 'textarea',
                'std' => '',
                'class' => 'custom-class',
                'clone_default' => true,
                'clone' => true,
                'sort_clone' => true,
                'clone-group' => 'price-clone-group',
            ),
            // Price button opt
            array(
                'name' => esc_html__( 'Price button title', 'crypterium' ),
                'id' => 'crypterium_prcbtntitle',
                'type' => 'text',
                'clone' => false,
                'std' => esc_html__( 'Purchase Now', 'crypterium' ),
            ),
            array(
                'name' => esc_html__( 'Price button link / URL', 'crypterium' ),
                'id' => 'crypterium_prcbtnlink',
                'type' => 'text',
                'clone' => false,
                'std' => '#0',
            ),
            array(
                'name' => esc_html__( 'Select button target type', 'crypterium' ),
                'id' => 'crypterium_prcbtntarget',
                'type' => 'select',
                'multiple' => false,
                'std' => '_blank',
                'options' => array(
                    '_blank' => '_blank',
                    '_self' => '_self',
                    '_parent' => '_parent',
                    '_top' => '_top',
                )
            ),
            array(
                'name' => esc_html__( 'Price custom column', 'crypterium' ),
                'desc' => esc_html__('You can use theme column classes, col--lg-6 col--md-6 col--sm-6 (1-12 numbers)', 'crypterium'),
                'id' => 'crypterium_price_column',
                'type' => 'text',
                'clone' => false,
                'std' => '',
            ),
            array(
                'name' => esc_html__('Price pack background color', 'crypterium'),
                'desc' => esc_html__('Choose pack background color.', 'crypterium'),
                'id' => 'prc_bgcolor',
                'type' => 'color'
            ),
            array(
                'name' => esc_html__( 'Price table animate type', 'crypterium' ),
                'id' => 'crypterium_prc_aos',
                'type' => 'text',
                'clone' => false,
            ),
            array(
                'name' => esc_html__( 'Price table animate delay', 'crypterium' ),
                'id' => 'crypterium_prc_aos_delay',
                'type' => 'text',
                'clone' => false,
            ),
            array(
                'name' => esc_html__( 'Price table animate duration', 'crypterium' ),
                'id' => 'crypterium_prc_aos_duration',
                'type' => 'text',
                'clone' => false,
            ),
            array(
                'name' => esc_html__( 'Price table animate offset', 'crypterium' ),
                'id' => 'crypterium_prc_aos_offsetaos',
                'type' => 'text',
                'clone' => false,
            ),
            array(
                'name' => esc_html__( 'Price table animate easing', 'crypterium' ),
                'id' => 'crypterium_prc_aos_easing',
                'type' => 'text',
                'clone' => false,
            ),
            array(
                'name' => esc_html__( 'Price table animate anchor', 'crypterium' ),
                'id' => 'crypterium_prc_aos_anchor',
                'type' => 'text',
                'clone' => false,
            ),
            array(
                'name' => esc_html__( 'Price table animate placement', 'crypterium' ),
                'id' => 'crypterium_prc_aos_placement',
                'type' => 'text',
                'clone' => false,
            ),
            array(
                'name' => esc_html__( 'Price table animate once', 'crypterium' ),
                'id' => 'crypterium_prc_aos_once',
                'type' => 'text',
                'clone' => false,
            )
        )
    );
    /* ----------------------------------------------------- */
    // SINGLE POST SIDEBAR
    /* ----------------------------------------------------- */
    $meta_boxes[] = array(
        'title' => esc_html__( 'Single Post Sidebar Settings', 'crypterium' ),
        'id' => 'postsidebarsettings',
        'pages' => array( 'post' ),
        'context' => 'advanced',
        'priority'=> 'high',
        'fields' => array(
            // heading
            array(
                'type' => 'heading',
                'id' => 'crypterium_post_sidebar_heading',
                'name' => esc_html__( 'Single Post Sidebar Settings', 'crypterium' ),
            ),
            array(
                'name' => esc_html__( 'Single Post Sidebar', 'crypterium' ),
                'id' => 'crypterium_post_layout',
                'type' => 'select',
                'options' => array(
                    'left-sidebar' => esc_html__( 'left', 'crypterium' ),
                    'right-sidebar' => esc_html__( 'right', 'crypterium' ),
                    'full-width' => esc_html__( 'full', 'crypterium' ),
                ),
                'multiple' => false,
                'std' => 'full-width',
                'placeholder' => esc_html__( 'Select an Item', 'crypterium' ),
            )
        )
    );
    /*----------------------------------------------------------------------------------*/
    /*  GALLERY POST FORMAT
    /*-----------------------------------------------------------------------------------*/
    $meta_boxes[] = array(
        'title' => esc_html__('Gallery Settings', 'crypterium'),
        'pages' => array('post'),
        'fields' => array(
            array(
                'name' => esc_html__('Select Images', 'crypterium'),
                'desc' => esc_html__('Select the images from the media library or upload your new ones.', 'crypterium'),
                'id' => 'crypterium_gallery_image',
                'type' => 'image_advanced',
            )
        )
    );
    /*----------------------------------------------------------------------------------*/
    /*  QUOTE POST FORMAT
    /*-----------------------------------------------------------------------------------*/
    $meta_boxes[] = array(
        'title' => esc_html__('Quote Settings', 'crypterium'),
        'pages' => array('post'),
        'fields' => array(
            array(
                'name' => esc_html__('The Quote', 'crypterium'),
                'desc' => esc_html__('Write your quote in this field.', 'crypterium'),
                'id' => 'crypterium_quote_text',
                'type' => 'textarea',
                'rows' => 5
            ),
            array(
                'name' => esc_html__('The Author', 'crypterium'),
                'desc' => esc_html__('Enter the name of the author of this quote.', 'crypterium'),
                'id' => 'crypterium_quote_author',
                'type' => 'text'
            ),
            array(
                'name' => esc_html__('Background Color', 'crypterium'),
                'desc' => esc_html__('Choose the background color for this quote.', 'crypterium'),
                'id' => 'crypterium_quote_bg',
                'type' => 'color'
            ),
            array(
                'name' => esc_html__('Background Opacity', 'crypterium'),
                'desc' => esc_html__('Choose the opacity of the background color.', 'crypterium'),
                'id' => 'crypterium_quote_bg_opacity',
                'type' => 'text',
                'std' => 80
            )
        )
    );
    /*----------------------------------------------------------------------------------*/
    /*  AUDIO POST FORMAT
    /*-----------------------------------------------------------------------------------*/
    $meta_boxes[] = array(
        'title' => esc_html__('Audio Settings', 'crypterium'),
        'pages' => array('post'),
        'fields' => array(
            array(
                'type' => 'heading',
                'name' => esc_html__( 'These settings enable you to embed audio in your posts. Note that for audio, you must supply both MP3 and OGG files to satisfy all browsers. For poster you can select a featured image.', 'crypterium' ),
                'id' => 'crypterium_audio_head'
            ),
            array(
                'name' => esc_html__('MP3 File URL', 'crypterium'),
                'desc' => esc_html__('The URL to the .mp3 audio file.', 'crypterium'),
                'id' => 'crypterium_audio_mp3',
                'type' => 'text',
            ),
            array(
                'name' => esc_html__('OGA File URL', 'crypterium'),
                'desc' => esc_html__('The URL to the .oga, .ogg audio file.', 'crypterium'),
                'id' => 'crypterium_audio_ogg',
                'type' => 'text',
            ),
            array(
                'name' => esc_html__('Divider', 'crypterium'),
                'desc' => esc_html__('divider.', 'crypterium'),
                'id' => 'crypterium_audio_divider',
                'type' => 'divider'
            ),
            array(
                'name' => esc_html__('SoundCloud', 'crypterium'),
                'desc' => esc_html__('Enter the iframe of the soundcloud audio.', 'crypterium'),
                'id' => 'crypterium_audio_sc',
                'type' => 'text',
            ),
            array(
                'name' => esc_html__('Color', 'crypterium'),
                'desc' => esc_html__('Choose the color.', 'crypterium'),
                'id' => 'crypterium_audio_sc_color',
                'type' => 'color',
                'std' => '#ff7700'
            )
        )
    );
    /*----------------------------------------------------------------------------------*/
    /*  VIDEO POST FORMAT
    /*-----------------------------------------------------------------------------------*/
    $meta_boxes[] = array(
        'title' => esc_html__('Video Settings', 'crypterium'),
        'pages' => array('post'),
        'fields' => array(
            array(
                'type' => 'heading',
                'name' => esc_html__( 'These settings enable you to embed videos into your posts. Note that for video, you must supply an M4V file to satisfy both HTML5 and Flash solutions. The optional OGV format is used to increase x-browser support for HTML5 browsers such as Firefox and Opera. For the poster, you can select a featured image.', 'crypterium' ),
                'id' => 'crypterium_video_head'
            ),
            array(
                'name' => esc_html__('M4V File URL', 'crypterium'),
                'desc' => esc_html__('The URL to the .m4v video file.', 'crypterium'),
                'id' => 'crypterium_video_m4v',
                'type' => 'text',
            ),
            array(
                'name' => esc_html__('OGV File URL', 'crypterium'),
                'desc' => esc_html__('The URL to the .ogv video file.', 'crypterium'),
                'id' => 'crypterium_video_ogv',
                'type' => 'text',
            ),
            array(
                'name' => esc_html__('WEBM File URL', 'crypterium'),
                'desc' => esc_html__('The URL to the .webm video file.', 'crypterium'),
                'id' => 'crypterium_video_webm',
                'type' => 'text',
            ),
            array(
                'name' => esc_html__('Embeded Code', 'crypterium'),
                'desc' => esc_html__('Select the preview image for this video.', 'crypterium'),
                'id' => 'crypterium_video_embed',
                'type' => 'textarea',
                'rows' => 8
            )
        )
    );
    //end
    return $meta_boxes;
}
?>
