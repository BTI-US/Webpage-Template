<?php

// if not admin or plugin installed - die
if ( ! class_exists( 'OT_Loader' ) || ! is_admin() )
return false;

add_action( 'init', 'crypterium_custom_theme_options' );
function crypterium_custom_theme_options() {

    $crypterium_saved_settings = get_option( ot_settings_id(), array() );

    $crypterium_ot_custom_settings = array(
        'contextual_help' => array(
            'sidebar' => ''
        ),
        'sections' => array(

            array(
                'id' => 'general',
                'title' => esc_html__( 'General', 'crypterium' ),
            ),
            array(
                'id' => 'logo',
                'title' => esc_html__( 'Logo', 'crypterium' ),
            ),
            array(
                'id' => 'navigation',
                'title' => esc_html__( 'Header & Nav', 'crypterium' ),
            ),
            array(
                'id' => 'pre',
                'title' => esc_html__( 'Preloader', 'crypterium' ),
            ),
            array(
                'id' => 'sidebars',
                'title' => esc_html__( 'Sidebars', 'crypterium' ),
            ),
            array(
                'id' => 'sidebars_settings',
                'title' => esc_html__( 'Sidebar Colors', 'crypterium' ),
            ),
            array(
                'id' => 'blog_page',
                'title' => esc_html__( 'Blog Page', 'crypterium' ),
            ),
            array(
                'id' => 'single_page',
                'title' => esc_html__( 'Single Page', 'crypterium' ),
            ),
            array(
                'id' => 'single_port',
                'title' => esc_html__( 'Single Portfolio', 'crypterium' ),
            ),
            array(
                'id' => 'archive_page',
                'title' => esc_html__( 'Archive Page', 'crypterium' ),
            ),
            array(
                'id' => 'error_page',
                'title' => esc_html__( '404 Page', 'crypterium' ),
            ),
            array(
                'id' => 'search_page',
                'title' => esc_html__( 'Search Page', 'crypterium' ),
            ),
            array(
                'id' => 'footer_widgetize',
                'title' => esc_html__( 'Widgetize Footer', 'crypterium' ),
            ),
            array(
                'id' => 'google_fonts',
                'title' => esc_html__('Google Fonts', 'crypterium' )
            ),
            array(
                'id' => 'typography',
                'title' => esc_html__('Typography', 'crypterium' )
            ),
            array(
                'id' => 'cpt',
                'title' => esc_html__( 'CPT', 'crypterium' ),
            ),
        ),

        /**--- Options Start ---**/
        'settings' => array(

            /*************************************************
            ## GENERAL SETTINGS.
            *************************************************/

            array(
                'id' => 'crypterium_general_tab',
                'label' => esc_html__( 'General Settings', 'crypterium' ),
                'type' => 'tab',
                'section' => 'general'
            ),
            array(
                'id' => 'crypterium_theme_color',
                'label' => esc_html__( 'Theme general color 1 ( Green will change )', 'crypterium' ),
                'desc' => esc_html__( 'Please select your theme general color', 'crypterium' ),
                'type' => 'colorpicker-opacity',
                'section' => 'general'
            ),
            //Pagination settings
            array(
                'id' => 'crypterium_general_pagination_tab',
                'label' => esc_html__( 'Pagination Settings', 'crypterium' ),
                'type' => 'tab',
                'section' => 'general'
            ),
            array(
                'id' => 'crypterium_pag_type',
                'label' => esc_html__('Pagination types', 'crypterium' ),
                'desc' => esc_html__('Please choose a pagination type', 'crypterium' ),
                'std' => 'default',
                'type' => 'select',
                'section' => 'general',
                'operator' => 'and',
                'choices' => array(
                    array(
                        'value' => 'default',
                        'label' => esc_html__('Default', 'crypterium' ),
                    ),
                    array(
                        'value' => 'outline',
                        'label' => esc_html__('Outline', 'crypterium' ),
                    ),
                )
            ),
            array(
                'id' => 'crypterium_pag_size',
                'label' => esc_html__('Pagination size', 'crypterium' ),
                'desc' => esc_html__('Please choose a pagination size', 'crypterium' ),
                'std' => 'large',
                'type' => 'select',
                'section' => 'general',
                'operator' => 'and',
                'choices' => array(
                    array(
                        'value' => 'small',
                        'label' => esc_html__('small', 'crypterium' ),
                    ),
                    array(
                        'value' => 'medium',
                        'label' => esc_html__('medium', 'crypterium' ),
                    ),
                    array(
                        'value' => 'large',
                        'label' => esc_html__('large', 'crypterium' ),
                    ),
                )
            ),
            array(
                'id' => 'crypterium_pag_group',
                'label' => esc_html__('Pagination group', 'crypterium' ),
                'desc' => esc_html__('Please choose a pagination group type', 'crypterium' ),
                'std' => 'no',
                'type' => 'select',
                'section' => 'general',
                'operator' => 'and',
                'choices' => array(
                    array(
                        'value' => 'no',
                        'label' => esc_html__('default', 'crypterium' ),
                    ),
                    array(
                        'value' => 'yes',
                        'label' => esc_html__('group', 'crypterium' ),
                    ),
                    array(
                        'value' => 'no',
                        'label' => esc_html__('none', 'crypterium' ),
                    ),
                )
            ),
            array(
                'id' => 'crypterium_pag_corner',
                'label' => esc_html__('Pagination corner', 'crypterium' ),
                'desc' => esc_html__('Please choose a pagination corner type', 'crypterium' ),
                'std' => 'square',
                'type' => 'select',
                'section' => 'general',
                'operator' => 'and',
                'choices' => array(
                    array(
                        'value' => 'square',
                        'label' => esc_html__('default', 'crypterium' ),
                    ),
                    array(
                        'value' => 'square',
                        'label' => esc_html__('square', 'crypterium' ),
                    ),
                    array(
                        'value' => 'rounded',
                        'label' => esc_html__('rounded', 'crypterium' ),
                    ),
                    array(
                        'value' => 'circle',
                        'label' => esc_html__('circle', 'crypterium' ),
                    ),
                )
            ),
            array(
                'id' => 'crypterium_pag_align',
                'label' => esc_html__('Pagination align', 'crypterium' ),
                'desc' => esc_html__('Please choose a pagination align type', 'crypterium' ),
                'std' => 'left',
                'type' => 'select',
                'section' => 'general',
                'operator' => 'and',
                'choices' => array(
                    array(
                        'value' => 'left',
                        'label' => esc_html__('default', 'crypterium' ),
                    ),
                    array(
                        'value' => 'left',
                        'label' => esc_html__('left', 'crypterium' ),
                    ),
                    array(
                        'value' => 'right',
                        'label' => esc_html__('right', 'crypterium' ),
                    ),
                    array(
                        'value' => 'center',
                        'label' => esc_html__('center', 'crypterium' ),
                    ),
                )
            ),
            //Back to top button settings
            array(
                'id' => 'crypterium_backtotop_tab',
                'label' => esc_html__( 'Back To Top Settings', 'crypterium' ),
                'type' => 'tab',
                'section' => 'general'
            ),
            array(
                'id' => 'crypterium_backtotop',
                'label' => esc_html__( 'Back to top button display', 'crypterium' ),
                'desc' => sprintf( esc_html__( 'Backtotop button display %s or %s.', 'crypterium' ), '<code>on</code>', '<code>off</code>' ),
                'std' => 'on',
                'type' => 'on-off',
                'section' => 'general',
                'operator' => 'and'
            ),
            array(
                'id' => 'crypterium_backtotop_dimension',
                'label' => esc_html__( 'Back to top dimension', 'crypterium' ),
                'desc' => esc_html__( 'Please add backtotop dimension.', 'crypterium' ),
                'type' => 'dimension',
                'condition' => 'crypterium_backtotop:is(on)',
                'section' => 'general',
            ),
            array(
                'id' => 'crypterium_backtotop_border',
                'label' => esc_html__('Back to top border radius', 'crypterium' ),
                'desc' => esc_html__('Enter back to top border radius.', 'crypterium' ),
                'std' => '0',
                'type' => 'numeric-slider',
                'min_max_step'=> '0,500',
                'condition' => 'crypterium_backtotop:is(on)',
                'section' => 'general',
                'operator' => 'and'
            ),
            array(
                'id' => 'crypterium_backtotop_lineheight',
                'label' => esc_html__('Back to top line-height', 'crypterium' ),
                'desc' => esc_html__('Enter back to top line-height.', 'crypterium' ),
                'std' => '50',
                'type' => 'numeric-slider',
                'min_max_step'=> '0,200',
                'condition' => 'crypterium_backtotop:is(on)',
                'section' => 'general',
                'operator' => 'and'
            ),
            array(
                'id' => 'crypterium_backtotop_iconclass',
                'label' => esc_html__('Back to top icon class', 'crypterium' ),
                'desc' => esc_html__('Please Add back to top icon class.', 'crypterium' ),
                'std' => 'fa fa-angle-up',
                'type' => 'text',
                'condition' => 'crypterium_backtotop:is(on)',
                'section' => 'general'
            ),
            array(
                'id' => 'crypterium_backtotop_iconfs',
                'label' => esc_html__('Back to top icon font-size', 'crypterium' ),
                'desc' => esc_html__('Enter back to top icon font-size.', 'crypterium' ),
                'std' => '17',
                'type' => 'numeric-slider',
                'min_max_step'=> '0,100',
                'condition' => 'crypterium_backtotop:is(on)',
                'section' => 'general',
                'operator' => 'and'
            ),
            array(
                'id' => 'crypterium_backtotop_bg',
                'label' => esc_html__( 'Back to top background color', 'crypterium' ),
                'desc' => esc_html__( 'Please select color', 'crypterium' ),
                'type' => 'colorpicker-opacity',
                'condition' => 'crypterium_backtotop:is(on)',
                'section' => 'general'
            ),
            array(
                'id' => 'crypterium_backtotop_iconcolor',
                'label' => esc_html__( 'Back to top icon color', 'crypterium' ),
                'desc' => esc_html__( 'Please select color', 'crypterium' ),
                'type' => 'colorpicker-opacity',
                'condition' => 'crypterium_backtotop:is(on)',
                'section' => 'general'
            ),

            /*************************************************
            ## LOGO OPTIONS.
            *************************************************/

            array(
                'id' => 'crypterium_logogeneral_tab',
                'label' => esc_html__( 'General Settings', 'crypterium' ),
                'type' => 'tab',
                'section' => 'logo'
            ),
            array(
                'id' => 'crypterium_logo_display',
                'label' => esc_html__( 'Logo Display', 'crypterium' ),
                'desc' => sprintf( esc_html__( 'Logo display %s or %s.', 'crypterium' ), '<code>on</code>', '<code>off</code>' ),
                'std' => 'on',
                'type' => 'on-off',
                'section' => 'logo',
                'operator' => 'and'
            ),
            array(
                'id' => 'crypterium_logo_type',
                'label' => esc_html__('Logo Type', 'crypterium' ),
                'desc' => esc_html__('Choose logo type', 'crypterium' ),
                'std' => 'img',
                'type' => 'select',
                'section' => 'logo',
                'condition' => 'crypterium_logo_display:is(on)',
                'operator' => 'and',
                'choices' => array(
                    array(
                        'value'	=> 'img',
                        'label'	=> esc_html__('Image Logo', 'crypterium' ),
                        'src'	=> ''
                    ),
                    array(
                        'value'	=> 'text',
                        'label'	=> esc_html__('Text Logo', 'crypterium' ),
                        'src'	=> ''
                    ),
                )
            ),
            array(
                'id' => 'crypterium_logo_custom_link',
                'label' => esc_html__('Logo Custom Link', 'crypterium' ),
                'desc' => esc_html__('Logo Custom Link', 'crypterium' ),
                'std' => '',
                'type' => 'text',
                'condition' => 'crypterium_logo_display:is(on)',
                'section' => 'logo'
            ),
            array(
                'id' => 'crypterium_padding_logo',
                'label' => esc_html__( 'Logo padding', 'crypterium' ),
                'desc' => esc_html__( 'Logo padding', 'crypterium' ),
                'type' => 'spacing',
                'condition' => 'crypterium_logo_display:is(on)',
                'section' => 'logo',
            ),
            array(
                'id' => 'crypterium_margin_logo',
                'label' => esc_html__( 'Logo margin', 'crypterium' ),
                'desc' => esc_html__( 'Logo margin', 'crypterium' ),
                'type' => 'spacing',
                'condition' => 'crypterium_logo_display:is(on)',
                'section' => 'logo',
            ),
            array(
                'id' => 'crypterium_textlogo_tab',
                'label' => esc_html__( 'Text Logo Settings', 'crypterium' ),
                'type' => 'tab',
                'section' => 'logo'
            ),
            array(
                'id' => 'crypterium_textlogo',
                'label' => esc_html__('Text logo', 'crypterium' ),
                'desc' => esc_html__('Text logo', 'crypterium' ),
                'std' => 'crypterium',
                'type' => 'text',
                'condition' => 'crypterium_logo_type:is(text),crypterium_logo_display:is(on)',
                'section' => 'logo'
            ),
            array(
                'id' => 'crypterium_staticlogo_color',
                'label' => esc_html__( 'Static text logo color', 'crypterium' ),
                'desc' => esc_html__( 'Please select color for static menu text logo', 'crypterium' ),
                'type' => 'colorpicker-opacity',
                'condition' => 'crypterium_logo_type:is(text),crypterium_logo_display:is(on)',
                'section' => 'logo'
            ),
            array(
                'id' => 'crypterium_stickylogo_color',
                'label' => esc_html__( 'Sticky text logo color', 'crypterium' ),
                'desc' => esc_html__( 'Please select color for sticky menu text logo', 'crypterium' ),
                'type' => 'colorpicker-opacity',
                'condition' => 'crypterium_logo_type:is(text),crypterium_logo_display:is(on)',
                'section' => 'logo'
            ),
            array(
                'id' => 'crypterium_textlogo_fs',
                'label' => esc_html__('Font size', 'crypterium' ),
                'desc' => esc_html__('Font size for text logo', 'crypterium' ),
                'std' => '25',
                'type' => 'numeric-slider',
                'condition' => 'crypterium_logo_type:is(text),crypterium_logo_display:is(on)',
                'min_max_step'=> '0,100',
                'section' => 'logo',
                'operator' => 'and'
            ),
            array(
                'id' => 'crypterium_textlogo_fw',
                'label' => esc_html__('Font weight', 'crypterium' ),
                'desc' => esc_html__('Font weight for text logo', 'crypterium' ),
                'std' => '500',
                'type' => 'numeric-slider',
                'condition' => 'crypterium_logo_type:is(text),crypterium_logo_display:is(on)',
                'min_max_step'=> '100,900,100',
                'section' => 'logo',
                'operator' => 'and'
            ),
            array(
                'id' => 'crypterium_textlogo_lettersp',
                'label' => esc_html__('Letter spacing', 'crypterium' ),
                'desc' => esc_html__('Letter spacing for text logo', 'crypterium' ),
                'std' => '0',
                'type' => 'numeric-slider',
                'condition' => 'crypterium_logo_type:is(text),crypterium_logo_display:is(on)',
                'min_max_step'=> '0,10',
                'section' => 'logo',
                'operator' => 'and'
            ),
            array(
                'id' => 'crypterium_textlogo_fstyle',
                'label' => esc_html__('Font style', 'crypterium' ),
                'desc' => esc_html__('Choose font style for text logo', 'crypterium' ),
                'std' => 'normal',
                'type' => 'select',
                'section' => 'logo',
                'condition' => 'crypterium_logo_type:is(text),crypterium_logo_display:is(on)',
                'operator' => 'and',
                'choices' => array(
                    array(
                        'value'	=> 'normal',
                        'label'	=> esc_html__('Normal', 'crypterium' ),
                        'src'	=> ''
                    ),
                    array(
                        'value'	=> 'italic',
                        'label'	=> esc_html__('Italic', 'crypterium' ),
                        'src'	=> ''
                    )
                )
            ),
            array(
                'id' => 'crypterium_imglogo_tab',
                'label' => esc_html__( 'Img Logo Settings', 'crypterium' ),
                'type' => 'tab',
                'section' => 'logo'
            ),
            array(
                'id' => 'crypterium_img_staticlogo',
                'label' => esc_html__( 'Upload static logo image', 'crypterium' ),
                'desc' => esc_html__( 'Upload logo image', 'crypterium' ),
                'type' => 'upload',
                'condition' => 'crypterium_logo_type:is(img),crypterium_logo_display:is(on)',
                'section' => 'logo'
            ),
            array(
                'id' => 'crypterium_img_stickylogo',
                'label' => esc_html__( 'Upload sticky logo image', 'crypterium' ),
                'desc' => esc_html__( 'Upload logo image', 'crypterium' ),
                'type' => 'upload',
                'condition' => 'crypterium_logo_type:is(img),crypterium_logo_display:is(on)',
                'section' => 'logo'
            ),
            array(
                'id' => 'crypterium_logo_dimension',
                'label' => esc_html__( 'Logo dimension', 'crypterium' ),
                'desc' => esc_html__( 'Logo dimension', 'crypterium' ),
                'type' => 'dimension',
                'condition' => 'crypterium_logo_type:is(img),crypterium_logo_display:is(on)',
                'section' => 'logo',
            ),

            /*************************************************
            ## NAVIGATION SETTINGS.
            *************************************************/

            array(
                'id' => 'crypterium_nav_tab_set',
                'label' => esc_html__( 'General Settings', 'crypterium' ),
                'type' => 'tab',
                'section' => 'navigation'
            ),
            array(
                'id' => 'crypterium_sticky_header',
                'label' => esc_html__( 'Sticky Header', 'crypterium' ),
                'desc' => sprintf( esc_html__( 'Sticky %s or %s.', 'crypterium' ), '<code>on</code>', '<code>off</code>' ),
                'std' => 'off',
                'type' => 'on-off',
                'section' => 'navigation',
                'operator' => 'and'
            ),
            array(
                'id' => 'crypterium_header_menu_ifs',
                'label' => esc_html__('Header menu item font size', 'crypterium' ),
                'desc' => esc_html__('Enter menu item font size.', 'crypterium' ),
                'type' => 'numeric-slider',
                'std'=> '18',
                'min_max_step'=> '0,100',
                'section' => 'navigation',
                'operator' => 'and'
            ),
            array(
                'id' => 'crypterium_staticnav_tab',
                'label' => esc_html__( 'Static Navigation', 'crypterium' ),
                'type' => 'tab',
                'section' => 'navigation'
            ),
            array(
                'id' => 'crypterium_nav_bg',
                'label' => esc_html__( 'Theme navigation background color ', 'crypterium' ),
                'desc' => esc_html__( 'Please select color', 'crypterium' ),
                'type' => 'colorpicker-opacity',
                'section' => 'navigation'
            ),
            array(
                'id' => 'crypterium_navitem',
                'label' => esc_html__( 'Theme navigation menu item color', 'crypterium' ),
                'desc' => esc_html__( 'Please select color', 'crypterium' ),
                'type' => 'colorpicker-opacity',
                'section' => 'navigation'
            ),
            array(
                'id' => 'crypterium_navitemhover',
                'label' => esc_html__( 'Theme navigation menu item hover color', 'crypterium' ),
                'desc' => esc_html__( 'Please select color', 'crypterium' ),
                'type' => 'colorpicker-opacity',
                'section' => 'navigation'
            ),
            array(
                'id' => 'crypterium_navborder',
                'label' => esc_html__( 'Theme static menu border bottom color', 'crypterium' ),
                'desc' => esc_html__( 'Please select color', 'crypterium' ),
                'type' => 'colorpicker-opacity',
                'section' => 'navigation'
            ),
            array(
                'id' => 'crypterium_nav_padding',
                'label' => esc_html__( 'Theme static menu padding', 'crypterium' ),
                'desc' => esc_html__( 'The Spacing option type is used to set spacing values padding in the form of top, right, bottom, and left.', 'crypterium' ),
                'std' => '',
                'type' => 'spacing',
                'section' => 'navigation',
            ),
            array(
                'id' => 'crypterium_nav_margin',
                'label' => esc_html__( 'Theme static menu margin', 'crypterium' ),
                'desc' => esc_html__( 'The Spacing option type is used to set spacing values margin in the form of top, right, bottom, and left.', 'crypterium' ),
                'std' => '',
                'type' => 'spacing',
                'section' => 'navigation',
            ),
            //sticky nav
            array(
                'id' => 'crypterium_stickynav_tab',
                'label' => esc_html__( 'Sticky Navigation', 'crypterium' ),
                'type' => 'tab',
                'section' => 'navigation'
            ),
            array(
                'id' => 'crypterium_nav_fixed_display',
                'label' => esc_html__( 'Sticky menu on-off', 'crypterium' ),
                'desc' => sprintf( esc_html__( 'Sticky menu display %s or %s.', 'crypterium' ), '<code>on</code>', '<code>off</code>' ),
                'std' => 'on',
                'type' => 'on-off',
                'section' => 'navigation',
                'operator' => 'and'
            ),
            array(
                'id' => 'crypterium_nav_fixed_bg',
                'label' => esc_html__( 'Theme sticky navigation background color ', 'crypterium' ),
                'desc' => esc_html__( 'Please select color', 'crypterium' ),
                'type' => 'colorpicker-opacity',
                'condition' => 'crypterium_nav_fixed_display:is(on)',
                'section' => 'navigation'
            ),
            array(
                'id' => 'crypterium_fixed_navitem',
                'label' => esc_html__( 'Theme sticky menu item color', 'crypterium' ),
                'desc' => esc_html__( 'Please select color', 'crypterium' ),
                'type' => 'colorpicker-opacity',
                'condition' => 'crypterium_nav_fixed_display:is(on)',
                'section' => 'navigation'
            ),
            array(
                'id' => 'crypterium_fixed_navitemhover',
                'label' => esc_html__( 'Theme sticky menu item hover color', 'crypterium' ),
                'desc' => esc_html__( 'Please select color', 'crypterium' ),
                'type' => 'colorpicker-opacity',
                'condition' => 'crypterium_nav_fixed_display:is(on)',
                'section' => 'navigation'
            ),
            array(
                'id' => 'crypterium_fixed_navborder',
                'label' => esc_html__( 'Theme sticky menu border bottom color', 'crypterium' ),
                'desc' => esc_html__( 'Please select color', 'crypterium' ),
                'type' => 'colorpicker-opacity',
                'condition' => 'crypterium_nav_fixed_display:is(on)',
                'section' => 'navigation'
            ),
            array(
                'id' => 'crypterium_sticky_padding',
                'label' => esc_html__( 'Theme sticky menu padding', 'crypterium' ),
                'desc' => esc_html__( 'The Spacing option type is used to set spacing values padding in the form of top, right, bottom, and left.', 'crypterium' ),
                'std' => '',
                'type' => 'spacing',
                'condition' => 'crypterium_nav_fixed_display:is(on)',
                'section' => 'navigation',
            ),
            array(
                'id' => 'crypterium_sticky_margin',
                'label' => esc_html__( 'Theme sticky menu padding', 'crypterium' ),
                'desc' => esc_html__( 'The Spacing option type is used to set spacing values margin in the form of top, right, bottom, and left.', 'crypterium' ),
                'std' => '',
                'type' => 'spacing',
                'condition' => 'crypterium_nav_fixed_display:is(on)',
                'section' => 'navigation',
            ),
            //dropdown sub menu
            array(
                'id' => 'crypterium_dropdownnav_tab',
                'label' => esc_html__( 'Dropdown Style', 'crypterium' ),
                'type' => 'tab',
                'section' => 'navigation'
            ),
            array(
                'id' => 'crypterium_dropdown_bg',
                'label' => esc_html__( 'Dropdown menu background color', 'crypterium' ),
                'desc' => esc_html__( 'Please select color', 'crypterium' ),
                'type' => 'colorpicker-opacity',
                'section' => 'navigation'
            ),
            array(
                'id' => 'crypterium_dropdown_item',
                'label' => esc_html__( 'Dropdown menu item color', 'crypterium' ),
                'desc' => esc_html__( 'Please select color', 'crypterium' ),
                'type' => 'colorpicker-opacity',
                'section' => 'navigation'
            ),
            array(
                'id' => 'crypterium_dropdown_itemhover',
                'label' => esc_html__( 'Dropdown menu item hover color', 'crypterium' ),
                'desc' => esc_html__( 'Please select color', 'crypterium' ),
                'type' => 'colorpicker-opacity',
                'section' => 'navigation'
            ),
            array(
                'id' => 'crypterium_dropdown_itemhoverbg',
                'label' => esc_html__( 'Dropdown menu hover and active item background color', 'crypterium' ),
                'desc' => esc_html__( 'Please select color', 'crypterium' ),
                'type' => 'colorpicker-opacity',
                'section' => 'navigation'
            ),
            //mobile sub menu
            array(
                'id' => 'crypterium_mobilenav_tab',
                'label' => esc_html__( 'Mobile Navigation', 'crypterium' ),
                'type' => 'tab',
                'section' => 'navigation'
            ),
            array(
                'id' => 'crypterium_mobile_menubtnbghover',
                'label' => esc_html__( 'Mobile menu open and close button color', 'crypterium' ),
                'desc' => esc_html__( 'Please select color', 'crypterium' ),
                'type' => 'colorpicker-opacity',
                'section' => 'navigation'
            ),
            array(
                'id' => 'crypterium_mobile_bg',
                'label' => esc_html__( 'Mobile menu background color', 'crypterium' ),
                'desc' => esc_html__( 'Please select color', 'crypterium' ),
                'type' => 'colorpicker-opacity',
                'section' => 'navigation'
            ),
            array(
                'id' => 'crypterium_mobile_item',
                'label' => esc_html__( 'Mobile menu item color', 'crypterium' ),
                'desc' => esc_html__( 'Please select color', 'crypterium' ),
                'type' => 'colorpicker-opacity',
                'section' => 'navigation'
            ),
            array(
                'id' => 'crypterium_mobile_itemhover',
                'label' => esc_html__( 'Mobile menu item hover color', 'crypterium' ),
                'desc' => esc_html__( 'Please select color', 'crypterium' ),
                'type' => 'colorpicker-opacity',
                'section' => 'navigation'
            ),
            array(
                'id' => 'crypterium_mobile_itemhoverbg',
                'label' => esc_html__( 'Mobile menu hover and active item background color', 'crypterium' ),
                'desc' => esc_html__( 'Please select color', 'crypterium' ),
                'type' => 'colorpicker-opacity',
                'section' => 'navigation'
            ),
            array(
                'id' => 'crypterium_mobile_dropitem',
                'label' => esc_html__( 'Mobile menu dropdown item color', 'crypterium' ),
                'desc' => esc_html__( 'Please select color', 'crypterium' ),
                'type' => 'colorpicker-opacity',
                'section' => 'navigation'
            ),
            array(
                'id' => 'crypterium_mobile_dropitem_hover',
                'label' => esc_html__( 'Mobile menu dropdown item hover color', 'crypterium' ),
                'desc' => esc_html__( 'Please select color', 'crypterium' ),
                'type' => 'colorpicker-opacity',
                'section' => 'navigation'
            ),
            //mobile sub menu
            array(
                'id' => 'crypterium_buttons_tab',
                'label' => esc_html__( 'Header Buttons', 'crypterium' ),
                'type' => 'tab',
                'section' => 'navigation'
            ),
            array(
                'id' => 'crypterium_header_login_btn',
                'label' => esc_html__( 'Header login button visibility', 'crypterium' ),
                'desc' => sprintf( esc_html__( 'button display %s or %s.', 'crypterium' ), '<code>on</code>', '<code>off</code>' ),
                'std' => 'off',
                'type' => 'on-off',
                'section' => 'navigation',
                'operator' => 'and'
            ),
            array(
                'id' => 'crypterium_header_login_btn_url',
                'label' => esc_html__( 'Header login button url', 'crypterium' ),
                'desc' => esc_html__( 'Header login button url', 'crypterium' ),
                'type' => 'text',
                'condition' => 'crypterium_header_login_btn:is(on)',
                'section' => 'navigation'
            ),
            array(
                'id' => 'crypterium_header_login_btn_text',
                'label' => esc_html__( 'Header login button url text', 'crypterium' ),
                'desc' => esc_html__( 'Header login button url text', 'crypterium' ),
                'type' => 'text',
                'condition' => 'crypterium_header_login_btn:is(on)',
                'section' => 'navigation'
            ),
            array(
                'id' => 'crypterium_header_login_btn_target',
                'label' => esc_html__( 'Header login button target', 'crypterium' ),
                'desc' => esc_html__( 'Selectvheader login button target type. Default : _blank' , 'crypterium' ),
                'std' => '_blank',
                'type' => 'select',
                'section' => 'navigation',
                'condition' => 'crypterium_header_login_btn:is(on)',
                'operator' => 'and',
                'choices' => array(
                    array(
                        'value' => '_blank',
                        'label' => esc_html__( '_blank', 'crypterium' )
                    ),
                    array(
                        'value' => '_self',
                        'label' => esc_html__( '_self', 'crypterium' )
                    ),
                    array(
                        'value' => '_parent',
                        'label' => esc_html__( '_parent', 'crypterium' )
                    ),
                    array(
                        'value' => '_top',
                        'label' => esc_html__( '_top', 'crypterium' )
                    ),
                )
            ),
            array(
                'id' => 'crypterium_header_sign_btn',
                'label' => esc_html__( 'Header sign button visibility', 'crypterium' ),
                'desc' => sprintf( esc_html__( 'button display %s or %s.', 'crypterium' ), '<code>on</code>', '<code>off</code>' ),
                'std' => 'off',
                'type' => 'on-off',
                'section' => 'navigation',
                'operator' => 'and'
            ),
            array(
                'id' => 'crypterium_header_sign_btn_url',
                'label' => esc_html__( 'Header signup button url', 'crypterium' ),
                'desc' => esc_html__( 'Header signup button url', 'crypterium' ),
                'type' => 'text',
                'condition' => 'crypterium_header_sign_btn:is(on)',
                'section' => 'navigation'
            ),
            array(
                'id' => 'crypterium_header_sign_btn_text',
                'label' => esc_html__( 'Header signup button url text', 'crypterium' ),
                'desc' => esc_html__( 'Header signup button url text', 'crypterium' ),
                'type' => 'text',
                'condition' => 'crypterium_header_sign_btn:is(on)',
                'section' => 'navigation'
            ),
            array(
                'id' => 'crypterium_header_sign_btn_target',
                'label' => esc_html__( 'Header signup button target', 'crypterium' ),
                'desc' => esc_html__( 'Selectvheader signup button target type. Default : _blank' , 'crypterium' ),
                'std' => '_blank',
                'type' => 'select',
                'section' => 'navigation',
                'condition' => 'crypterium_header_sign_btn:is(on)',
                'operator' => 'and',
                'choices' => array(
                    array(
                        'value' => '_blank',
                        'label' => esc_html__( '_blank', 'crypterium' )
                    ),
                    array(
                        'value' => '_self',
                        'label' => esc_html__( '_self', 'crypterium' )
                    ),
                    array(
                        'value' => '_parent',
                        'label' => esc_html__( '_parent', 'crypterium' )
                    ),
                    array(
                        'value' => '_top',
                        'label' => esc_html__( '_top', 'crypterium' )
                    ),
                )
            ),
            array(
                'id' => 'crypterium_header_login_btn_c',
                'label' => esc_html__( 'Header login button color', 'crypterium' ),
                'desc' => esc_html__( 'Please select color', 'crypterium' ),
                'type' => 'colorpicker-opacity',
                'condition' => 'crypterium_header_login_btn:is(on)',
                'section' => 'navigation'
            ),
            array(
                'id' => 'crypterium_header_login_btn_bgc',
                'label' => esc_html__( 'Header login button background color', 'crypterium' ),
                'desc' => esc_html__( 'Please select color', 'crypterium' ),
                'type' => 'colorpicker-opacity',
                'condition' => 'crypterium_header_login_btn:is(on)',
                'section' => 'navigation'
            ),
            array(
                'id' => 'crypterium_header_login_btn_hc',
                'label' => esc_html__( 'Header login button hover color', 'crypterium' ),
                'desc' => esc_html__( 'Please select color', 'crypterium' ),
                'type' => 'colorpicker-opacity',
                'condition' => 'crypterium_header_login_btn:is(on)',
                'section' => 'navigation'
            ),
            array(
                'id' => 'crypterium_header_login_btn_hbgc',
                'label' => esc_html__( 'Header login button hover background color', 'crypterium' ),
                'desc' => esc_html__( 'Please select color', 'crypterium' ),
                'type' => 'colorpicker-opacity',
                'condition' => 'crypterium_header_login_btn:is(on)',
                'section' => 'navigation'
            ),
            array(
                'id' => 'crypterium_header_signup_btn_c',
                'label' => esc_html__( 'Header signup button color', 'crypterium' ),
                'desc' => esc_html__( 'Please select color', 'crypterium' ),
                'type' => 'colorpicker-opacity',
                'condition' => 'crypterium_header_sign_btn:is(on)',
                'section' => 'navigation'
            ),
            array(
                'id' => 'crypterium_header_signup_btn_hc',
                'label' => esc_html__( 'Header login signup button hover color', 'crypterium' ),
                'desc' => esc_html__( 'Please select color', 'crypterium' ),
                'type' => 'colorpicker-opacity',
                'condition' => 'crypterium_header_sign_btn:is(on)',
                'section' => 'navigation'
            ),
            array(
                'id' => 'crypterium_lang_tab',
                'label' => esc_html__( 'Header Language', 'crypterium' ),
                'type' => 'tab',
                'section' => 'navigation'
            ),
            array(
                'id' => 'crypterium_header_lang',
                'label' => esc_html__( 'Language switcher visibility', 'crypterium' ),
                'desc' => sprintf( esc_html__( 'Switcher display %s or %s.', 'crypterium' ), '<code>on</code>', '<code>off</code>' ),
                'std' => 'off',
                'type' => 'on-off',
                'section' => 'navigation',
                'operator' => 'and'
            ),
            array(
                'id' => 'crypterium_header_lang_first_item',
                'label' => esc_html__( 'Add first image for switcher', 'crypterium' ),
                'desc' => esc_html__( 'the best size for icon is 25px', 'crypterium' ),
                'type' => 'upload',
                'operator' => 'and',
                'class' => 'ot-upload-attachment-id',
                'condition' => 'crypterium_header_lang:is(on)',
                'section' => 'navigation',
            ),
            array(
                'id' => 'crypterium_header_lang_items',
                'label' => esc_html__( 'Header language', 'crypterium' ),
                'desc' => esc_html__( 'Add your lang img and url', 'crypterium' ),
                'type' => 'list-item',
                'section' => 'navigation',
                'condition' => 'crypterium_header_lang:is(on)',
                'operator' => 'and',
                'settings' => array(
                    array(
                        'id' => 'img',
                        'label' => esc_html__( 'Image', 'crypterium' ),
                        'desc' => esc_html__( 'the best size for icon is 25px', 'crypterium' ),
                        'type' => 'upload',
                        'rows' => '10',
                    ),
                    array(
                        'id' => 'url',
                        'label' => esc_html__( 'Header language image url text', 'crypterium' ),
                        'desc' => esc_html__( 'Add your lang url', 'crypterium' ),
                        'type' => 'text',
                    ),
                )
            ),

            /*************************************************
            ## PRELOADER SETTİNGS.
            *************************************************/

            array(
                'id' => 'crypterium_pre_settings',
                'label' => esc_html__( 'Preloader', 'crypterium' ),
                'desc' => sprintf( esc_html__( 'Preloader display %s or %s.', 'crypterium' ), '<code>on</code>', '<code>off</code>' ),
                'std' => 'on',
                'type' => 'on-off',
                'section' => 'pre',
                'operator' => 'and'
            ),
            array(
                'id' => 'crypterium_pre_type',
                'label' => esc_html__('Preloader types', 'crypterium' ),
                'desc' => esc_html__('Please choose a preloader type', 'crypterium' ),
                'std' => 'default',
                'type' => 'select',
                'section' => 'pre',
                'condition' => 'crypterium_pre_settings:is(on)',
                'operator' => 'and',
                'choices' => array(
                    array(
                        'value' => 'default',
                        'label' => esc_html__('Default', 'crypterium' ),
                    ),
                    array(
                        'value' => '01',
                        'label' => esc_html__('Type 1', 'crypterium' ),
                    ),
                    array(
                        'value' => '02',
                        'label' => esc_html__('Type 2', 'crypterium' ),
                    ),
                    array(
                        'value' => '03',
                        'label' => esc_html__('Type 3', 'crypterium' ),
                    ),
                    array(
                        'value' => '04',
                        'label' => esc_html__('Type 4', 'crypterium' ),
                    ),
                    array(
                        'value' => '05',
                        'label' => esc_html__('Type 5', 'crypterium' ),
                    ),
                    array(
                        'value' => '06',
                        'label' => esc_html__('Type 6', 'crypterium' ),
                    ),
                    array(
                        'value' => '07',
                        'label' => esc_html__('Type 7', 'crypterium' ),
                    ),
                    array(
                        'value' => '08',
                        'label' => esc_html__('Type 8', 'crypterium' ),
                    ),
                    array(
                        'value' => '09',
                        'label' => esc_html__('Type 9', 'crypterium' ),
                    ),
                    array(
                        'value' => '10',
                        'label' => esc_html__('Type 10', 'crypterium' ),
                    ),
                    array(
                        'value' => '11',
                        'label' => esc_html__('Type 11', 'crypterium' ),
                    ),
                    array(
                        'value' => '12',
                        'label' => esc_html__('Type 12', 'crypterium' ),
                    ),
                )
            ),
            array(
                'id' => 'crypterium_pre_bgcolor',
                'label' => esc_html__( 'Preloader BG color ', 'crypterium' ),
                'desc' => esc_html__( 'Please select color', 'crypterium' ),
                'type' => 'colorpicker-opacity',
                'condition' => 'crypterium_pre_settings:is(on)',
                'section' => 'pre'
            ),
            array(
                'id' => 'crypterium_pre_spincolor',
                'label' => esc_html__( 'Preloader spin color ', 'crypterium' ),
                'desc' => esc_html__( 'Please select color', 'crypterium' ),
                'type' => 'colorpicker-opacity',
                'condition' => 'crypterium_pre_settings:is(on)',
                'section' => 'pre'
            ),

            /*************************************************
            ## SIDEBAR TYPE SETTINGS.
            *************************************************/

            array(
                'id' => 'crypterium_sidebar_type',
                'label' => esc_html__('General sidebar', 'crypterium' ),
                'desc' => esc_html__('If you want to use same sidebar on all inner pages, select ON', 'crypterium' ),
                'std' => 'default',
                'type' => 'select',
                'section' => 'sidebars',
                'operator' => 'and',
                'choices' => array(

                    array(
                        'value' => 'default',
                        'label' => esc_html__('Default', 'crypterium' ),
                    ),
                    array(
                        'value' => 'custom',
                        'label' => esc_html__('Custom', 'crypterium' ),
                    ),
                )
            ),
            array(
                'id' => 'crypterium_blog_layout',
                'label' => esc_html__( 'Blog layout', 'crypterium' ),
                'desc' => esc_html__( 'Choose blog page layout type', 'crypterium' ),
                'std' => 'right-sidebar',
                'type' => 'radio-image',
                'section' => 'sidebars',
                'operator' => 'and'
            ),
            array(
                'id' => 'crypterium_post_layout',
                'label' => esc_html__( 'Blog single page layout', 'crypterium' ),
                'desc' => esc_html__( 'Choose post page layout type', 'crypterium' ),
                'std' => 'right-sidebar',
                'type' => 'radio-image',
                'section' => 'sidebars',
                'operator' => 'and'
            ),
            array(
                'id' => 'crypterium_search_layout',
                'label' => esc_html__( 'Search page Layout', 'crypterium' ),
                'desc' => esc_html__( 'Choose search page layout type', 'crypterium' ),
                'std' => 'right-sidebar',
                'type' => 'radio-image',
                'section' => 'sidebars',
                'operator' => 'and'
            ),
            array(
                'id' => 'crypterium_archive_layout',
                'label' => esc_html__( 'Archive page layout', 'crypterium' ),
                'desc' => esc_html__( 'Choose archive page layout type', 'crypterium' ),
                'std' => 'right-sidebar',
                'type' => 'radio-image',
                'section' => 'sidebars',
                'operator' => 'and'
            ),
            array(
                'id' => 'crypterium_404_layout',
                'label' => esc_html__( '404 page layout', 'crypterium' ),
                'desc' => esc_html__( 'Choose 404 page layout type', 'crypterium' ),
                'std' => 'right-sidebar',
                'type' => 'radio-image',
                'section' => 'sidebars',
                'operator' => 'and'
            ),
            array(
                'id' => 'crypterium_woosingle_layout',
                'label' => esc_html__( 'Woocommerce single page layout', 'crypterium' ),
                'desc' => esc_html__( 'Choose Woocommerce single page layout type', 'crypterium' ),
                'std' => 'right-sidebar',
                'type' => 'radio-image',
                'section' => 'sidebars',
                'operator' => 'and'
            ),
            array(
                'id' => 'crypterium_woopage_layout',
                'label' => esc_html__( 'Woocommerce page layout', 'crypterium' ),
                'desc' => esc_html__( 'Choose Woocommerce page layout type', 'crypterium' ),
                'std' => 'right-sidebar',
                'type' => 'radio-image',
                'section' => 'sidebars',
                'operator' => 'and'
            ),

            /*************************************************
            ## SIDEBAR SETTINGS.
            *************************************************/

            array(
                'id' => 'crypterium_sidebarwidgetareabgcolor',
                'label' => esc_html__('Theme Sidebar widget area background color', 'crypterium' ),
                'desc' => esc_html__('Please select color', 'crypterium' ),
                'type' => 'colorpicker-opacity',
                'section' => 'sidebars_settings',
                'operator' => 'and'
            ),
            array(
                'id' => 'crypterium_sidebarwidgetgeneralcolor',
                'label' => esc_html__( 'Theme Sidebar widget general color', 'crypterium' ),
                'desc' => esc_html__( 'Please select color', 'crypterium' ),
                'type' => 'colorpicker',
                'section' => 'sidebars_settings'
            ),
            array(
                'id' => 'crypterium_sidebarwidgettitlecolor',
                'label' => esc_html__( 'Theme Sidebar widget title color', 'crypterium' ),
                'desc' => esc_html__( 'Please select color', 'crypterium' ),
                'type' => 'colorpicker',
                'section' => 'sidebars_settings'
            ),
            array(
                'id' => 'crypterium_sidebarlinkcolor',
                'label' => esc_html__( 'Theme Sidebar link title color', 'crypterium' ),
                'desc' => esc_html__( 'Please select color', 'crypterium' ),
                'type' => 'colorpicker',
                'section' => 'sidebars_settings'
            ),
            array(
                'id' => 'crypterium_sidebarlinkhovercolor',
                'label' => esc_html__( 'Theme Sidebar link title hover color', 'crypterium' ),
                'desc' => esc_html__( 'Please select color', 'crypterium' ),
                'type' => 'colorpicker',
                'section' => 'sidebars_settings'
            ),
            array(
                'id' => 'crypterium_sidebarsearchsubmittextcolor',
                'label' => esc_html__( 'Theme Sidebar search submit text color', 'crypterium' ),
                'desc' => esc_html__( 'Please select color', 'crypterium' ),
                'type' => 'colorpicker',
                'section' => 'sidebars_settings'
            ),
            array(
                'id' => 'crypterium_sidebarsearchsubmitbgcolor',
                'label' => esc_html__( 'Theme Sidebar search submit background color', 'crypterium' ),
                'desc' => esc_html__( 'Please select color', 'crypterium' ),
                'type' => 'colorpicker',
                'section' => 'sidebars_settings'
            ),

            /*************************************************
            ## BLOG PAGE SETTINGS
            *************************************************/

            array(
                'id' => 'crypterium_blog_hero_tab',
                'label' =>  esc_html__( 'Blog Hero', 'crypterium' ),
                'type' => 'tab',
                'section' => 'blog_page',
            ),
            array(
                'id' => 'crypterium_blog_hero_display',
                'label' => esc_html__( 'Blog/Post page hero section display', 'crypterium' ),
                'desc' => sprintf( esc_html__( 'Please select blog post page hero section display %s or %s.', 'crypterium' ), '<code>on</code>', '<code>off</code>' ),
                'std' => 'on',
                'type' => 'on-off',
                'section' => 'blog_page',
                'operator' => 'and'
            ),
            array(
                'id' => 'crypterium_blog_hero_info',
                'label' => esc_html__( 'Blog/Post page hero section is off', 'crypterium' ),
                'type' => 'textblock-titled',
                'section' => 'blog_page',
                'condition' => 'crypterium_crypterium_blog_hero_display:is(off)',
                'operator' => 'or'
            ),
            array(
                'id' => 'crypterium_blog_hero_bg',
                'label' =>  esc_html__( 'Blog/Post page hero section background image', 'crypterium' ),
                'desc' =>  esc_html__( 'You can upload your image for header', 'crypterium' ),
                'type' => 'upload',
                'section' => 'blog_page',
                'condition' => 'crypterium_blog_hero_display:is(on)',
                'operator' => 'and'
            ),
            array(
                'id' => 'crypterium_blog_header_bgcolor',
                'label' => esc_html__( 'Blog/Post page hero section background color', 'crypterium' ),
                'desc' => esc_html__( 'Please select color', 'crypterium' ),
                'type' => 'colorpicker-opacity',
                'condition' => 'crypterium_blog_hero_display:is(on)',
                'section' => 'blog_page'
            ),
            array(
                'id' => 'crypterium_blog_header_bgheight',
                'label' => esc_html__('Blog/Post page hero section height', 'crypterium' ),
                'desc' => esc_html__('Blog/Post page hero section height', 'crypterium' ),
                'std' => '55',
                'type' => 'numeric-slider',
                'min_max_step'=> '0,100',
                'section' => 'blog_page',
                'condition' => 'crypterium_blog_hero_display:is(on)',
                'operator' => 'and'
            ),
            array(
                'id' => 'crypterium_blog_h_p',
                'label' => esc_html__( 'Blog/Post page hero section padding', 'crypterium' ),
                'desc' => esc_html__( 'Blog/Post page hero section padding', 'crypterium' ),
                'type' => 'spacing',
                'condition' => 'crypterium_blog_hero_display:is(on)',
                'section' => 'blog_page',
            ),
            array(
                'id' => 'crypterium_blog_h_m',
                'label' => esc_html__( 'Blog/Post page hero section margin', 'crypterium' ),
                'desc' => esc_html__( 'Blog/Post page hero section margin', 'crypterium' ),
                'type' => 'spacing',
                'condition' => 'crypterium_blog_hero_display:is(on)',
                'section' => 'blog_page',
            ),
            //Blog heading
            array(
                'id' => 'crypterium_blog_heading_tab',
                'label' =>  esc_html__( 'Blog Heading', 'crypterium' ),
                'type' => 'tab',
                'section' => 'blog_page',
            ),
            array(
                'id' => 'crypterium_blog_heading_display',
                'label' => esc_html__( 'Blog/Post page heading display', 'crypterium' ),
                'desc' => sprintf( esc_html__( 'Please select blog post page heading display %s or %s.', 'crypterium' ), '<code>on</code>', '<code>off</code>' ),
                'std' => 'on',
                'type' => 'on-off',
                'condition' => 'crypterium_blog_hero_display:is(on)',
                'section' => 'blog_page',
                'operator' => 'and'
            ),
            array(
                'id' => 'crypterium_blog_heading_info',
                'label' => esc_html__( 'Blog/Post page heading is off', 'crypterium' ),
                'type' => 'textblock-titled',
                'section' => 'blog_page',
                'condition' => 'crypterium_blog_heading_display:is(off)',
                'operator' => 'or'
            ),
            array(
                'id' => 'crypterium_blog_heading',
                'label' => esc_html__( 'Blog/Post page heading', 'crypterium' ),
                'desc' => esc_html__( 'Enter blog post page heading', 'crypterium' ),
                'type' => 'text',
                'condition' => 'crypterium_blog_heading_display:is(on),crypterium_blog_hero_display:is(on)',
                'section' => 'blog_page'
            ),
            array(
                'id' => 'crypterium_blog_heading_color',
                'label' => esc_html__( 'Blog/Post page heading color ', 'crypterium' ),
                'desc' => esc_html__( 'Please select color', 'crypterium' ),
                'type' => 'colorpicker-opacity',
                'condition' => 'crypterium_blog_heading_display:is(on),crypterium_blog_hero_display:is(on)',
                'section' => 'blog_page'
            ),
            array(
                'id' => 'crypterium_blog_heading_fontsize',
                'label' => esc_html__('Blog/Post page heading font size', 'crypterium' ),
                'desc' => esc_html__('Enter Blog post page heading font size', 'crypterium' ),
                'std' => '70',
                'type' => 'numeric-slider',
                'min_max_step'=> '0,200',
                'condition' => 'crypterium_blog_heading_display:is(on),crypterium_blog_hero_display:is(on)',
                'section' => 'blog_page',
                'operator' => 'and'
            ),
            //Blog slogan
            array(
                'id' => 'crypterium_blog_slogan_tab',
                'label' =>  esc_html__( 'Blog Slogan', 'crypterium' ),
                'type' => 'tab',
                'section' => 'blog_page',
            ),
            array(
                'id' => 'crypterium_blog_slogan_display',
                'label' => esc_html__( 'Blog/Post page slogan display', 'crypterium' ),
                'desc' => sprintf( esc_html__( 'Please select blog post page slogan display %s or %s.', 'crypterium' ), '<code>on</code>', '<code>off</code>' ),
                'std' => 'on',
                'type' => 'on-off',
                'condition' => 'crypterium_blog_hero_display:is(on)',
                'section' => 'blog_page',
                'operator' => 'and'
            ),
            array(
                'id' => 'crypterium_blog_slogan_info',
                'label' => esc_html__( 'Blog/Post Slogan is off', 'crypterium' ),
                'type' => 'textblock-titled',
                'section' => 'blog_page',
                'condition' => 'crypterium_blog_slogan_display:is(off)',
                'operator' => 'or'
            ),
            array(
                'id' => 'crypterium_blog_slogan',
                'label' => esc_html__( 'Blog/Post page slogan', 'crypterium' ),
                'desc' => esc_html__( 'Enter blog post page slogan', 'crypterium' ),
                'type' => 'text',
                'condition' => 'crypterium_blog_slogan_display:is(on),crypterium_blog_hero_display:is(on)',
                'section' => 'blog_page'
            ),
            array(
                'id' => 'crypterium_blog_slogan_color',
                'label' => esc_html__( 'Blog/Post page slogan color ', 'crypterium' ),
                'desc' => esc_html__( 'Please select color', 'crypterium' ),
                'type' => 'colorpicker-opacity',
                'condition' => 'crypterium_blog_slogan_display:is(on),crypterium_blog_hero_display:is(on)',
                'section' => 'blog_page'
            ),
            array(
                'id' => 'crypterium_blog_slogan_fontsize',
                'label' => esc_html__('Blog/Post page slogan font size', 'crypterium' ),
                'desc' => esc_html__('Enter blog post page slogan font size', 'crypterium' ),
                'std' => '16',
                'type' => 'numeric-slider',
                'min_max_step'=> '0,100',
                'condition' => 'crypterium_blog_slogan_display:is(on),crypterium_blog_hero_display:is(on)',
                'section' => 'blog_page',
                'operator' => 'and'
            ),
            //Blog desc
            array(
                'id' => 'crypterium_blog_desc_tab',
                'label' =>  esc_html__( 'Blog Description', 'crypterium' ),
                'type' => 'tab',
                'section' => 'blog_page',
            ),
            array(
                'id' => 'crypterium_blog_desc_display',
                'label' => esc_html__( 'Blog/Post page description display', 'crypterium' ),
                'desc' => sprintf( esc_html__( 'Please select blog post page description display %s or %s.', 'crypterium' ), '<code>on</code>', '<code>off</code>' ),
                'std' => 'on',
                'type' => 'on-off',
                'condition' => 'crypterium_blog_hero_display:is(on)',
                'section' => 'blog_page',
                'operator' => 'and'
            ),
            array(
                'id' => 'crypterium_desc_info',
                'label' => esc_html__( 'Blog/Post description is off', 'crypterium' ),
                'type' => 'textblock-titled',
                'section' => 'blog_page',
                'condition' => 'crypterium_blog_desc_display:is(off)',
                'operator' => 'or'
            ),
            array(
                'id' => 'crypterium_blog_desc',
                'label' => esc_html__( 'Blog/Post page description', 'crypterium' ),
                'desc' => esc_html__( 'Enter blog post page description', 'crypterium' ),
                'type' => 'text',
                'condition' => 'crypterium_blog_desc_display:is(on),crypterium_blog_hero_display:is(on)',
                'section' => 'blog_page'
            ),
            array(
                'id' => 'crypterium_blog_desc_color',
                'label' => esc_html__( 'Blog/Post page description color ', 'crypterium' ),
                'desc' => esc_html__( 'Please select color', 'crypterium' ),
                'type' => 'colorpicker-opacity',
                'condition' => 'crypterium_blog_desc_display:is(on),crypterium_blog_hero_display:is(on)',
                'section' => 'blog_page'
            ),
            array(
                'id' => 'crypterium_blog_desc_fontsize',
                'label' => esc_html__('Blog/Post page description font size', 'crypterium' ),
                'desc' => esc_html__('Enter blog post page description font size', 'crypterium' ),
                'std' => '16',
                'type' => 'numeric-slider',
                'min_max_step'=> '0,100',
                'condition' => 'crypterium_blog_desc_display:is(on),crypterium_blog_hero_display:is(on)',
                'section' => 'blog_page',
                'operator' => 'and'
            ),
            //Blog/post page hero button settings
            array(
                'id' => 'crypterium_blog_herobutton_tab',
                'label' => esc_html__( 'Blog Button', 'crypterium' ),
                'type' => 'tab',
                'section' => 'blog_page',
            ),
            array(
                'id' => 'crypterium_blog_hero_btn_display',
                'label' => esc_html__( 'Blog/Post page button display', 'crypterium' ),
                'desc' => sprintf( esc_html__( 'Please select blog post page button display %s or %s.', 'crypterium' ), '<code>on</code>', '<code>off</code>' ),
                'std' => 'off',
                'type' => 'on-off',
                'condition' => 'crypterium_blog_hero_display:is(on)',
                'section' => 'blog_page',
                'operator' => 'and'
            ),
            array(
                'id' => 'crypterium_blog_hero_btn',
                'label' => esc_html__( 'Blog/Post page button title', 'crypterium' ),
                'desc' => esc_html__( 'Enter blog post page button title', 'crypterium' ),
                'type' => 'text',
                'condition' => 'crypterium_blog_hero_display:is(on),crypterium_blog_hero_btn_display:is(on)',
                'section' => 'blog_page'
            ),
            array(
                'id' => 'crypterium_blog_hero_btn_url',
                'label' => esc_html__( 'Blog/Post page button URL', 'crypterium' ),
                'desc' => esc_html__( 'Enter blog post page button URL', 'crypterium' ),
                'type' => 'text',
                'condition' => 'crypterium_blog_hero_display:is(on),crypterium_blog_hero_btn_display:is(on)',
                'section' => 'blog_page'
            ),
            array(
                'id' => 'crypterium_blog_btn_color',
                'label' => esc_html__( 'Blog/Post page button color ', 'crypterium' ),
                'desc' => esc_html__( 'Please select color', 'crypterium' ),
                'type' => 'colorpicker-opacity',
                'condition' => 'crypterium_blog_hero_display:is(on),crypterium_blog_hero_btn_display:is(on)',
                'section' => 'blog_page'
            ),
            array(
                'id' => 'crypterium_blog_btn_bgcolor',
                'label' => esc_html__( 'Blog/Post page button bg color', 'crypterium' ),
                'desc' => esc_html__( 'Please select color', 'crypterium' ),
                'type' => 'colorpicker-opacity',
                'condition' => 'crypterium_blog_hero_display:is(on),crypterium_blog_hero_btn_display:is(on)',
                'section' => 'blog_page'
            ),
            //Blog/post page breadcrumb
            array(
                'id' => 'crypterium_blog_bred_tab',
                'label' => esc_html__( 'Blog Breadcrubms', 'crypterium' ),
                'type' => 'tab',
                'section' => 'blog_page',
            ),
            array(
                'id' => 'crypterium_blog_bread',
                'label' => esc_html__( 'Blog/Post page breadcrubms display', 'crypterium' ),
                'desc' => sprintf( esc_html__( 'Breadcrubms display %s or %s.', 'crypterium' ), '<code>on</code>', '<code>off</code>' ),
                'std' => 'on',
                'type' => 'on-off',
                'condition' => 'crypterium_blog_hero_display:is(on)',
                'section' => 'blog_page',
                'operator' => 'and'
            ),
            array(
                'id' => 'crypterium_blog_breadcrubms_color',
                'label' => esc_html__( 'Blog/Post page breadcrubms icon color ', 'crypterium' ),
                'desc' => esc_html__( 'Please select color', 'crypterium' ),
                'type' => 'colorpicker-opacity',
                'condition' => 'crypterium_blog_hero_display:is(on),crypterium_blog_bread:is(on)',
                'section' => 'blog_page'
            ),
            array(
                'id' => 'crypterium_blog_breadcrubms_currentcolor',
                'label' => esc_html__( 'Blog/Post page breadcrubms text color ', 'crypterium' ),
                'desc' => esc_html__( 'Please select color', 'crypterium' ),
                'type' => 'colorpicker-opacity',
                'condition' => 'crypterium_blog_hero_display:is(on),crypterium_blog_bread:is(on)',
                'section' => 'blog_page'
            ),
            array(
                'id' => 'crypterium_blog_breadcrubms_hovercolor',
                'label' => esc_html__( 'Blog/Post page breadcrubms hover color ', 'crypterium' ),
                'desc' => esc_html__( 'Please select color', 'crypterium' ),
                'type' => 'colorpicker-opacity',
                'condition' => 'crypterium_blog_hero_display:is(on),crypterium_blog_bread:is(on)',
                'section' => 'blog_page'
            ),
            array(
                'id' => 'crypterium_blog_breadcrubms_font_size',
                'label' => esc_html__('Blog/Post page breadcrubms font size', 'crypterium' ),
                'desc' => esc_html__('Enter breadcrubms font size', 'crypterium' ),
                'type' => 'numeric-slider',
                'std'			  => '11',
                'min_max_step'=> '0,100',
                'condition' => 'crypterium_blog_hero_display:is(on),crypterium_blog_bread:is(on)',
                'section' => 'blog_page',
                'operator' => 'and'
            ),
            //Blog/post page general setting
            array(
                'id' => 'crypterium_blog_generalsetting_tab',
                'label' => esc_html__( 'Blog General Settings', 'crypterium' ),
                'type' => 'tab',
                'section' => 'blog_page',
            ),
            array(
                'id' => 'crypterium_blog_hero_align',
                'label' => esc_html__( 'Blog/Post page hero align', 'crypterium' ),
                'desc' => esc_html__( 'Select Blog/Post page hero align. Default :center.' , 'crypterium' ),
                'std' => 'center',
                'type' => 'select',
                'condition' => 'crypterium_blog_hero_display:is(on)',
                'section' => 'blog_page',
                'operator' => 'and',
                'choices' => array(
                    array(
                        'value' => 'left',
                        'label' => esc_html__( 'Left', 'crypterium' )
                    ),
                    array(
                        'value' => 'center',
                        'label' => esc_html__( 'Center', 'crypterium' )
                    ),
                    array(
                        'value' => 'right',
                        'label' => esc_html__( 'Right', 'crypterium' )
                    ),
                )
            ),
            array(
                'id' => 'crypterium_blog_overlay_setting',
                'label' => esc_html__( 'Blog/Post page overlay display', 'crypterium' ),
                'desc' => sprintf( esc_html__( 'Overlay display %s or %s.', 'crypterium' ), '<code>on</code>', '<code>off</code>' ),
                'std' => 'on',
                'type' => 'on-off',
                'condition' => 'crypterium_blog_hero_display:is(on)',
                'section' => 'blog_page',
                'operator' => 'and'
            ),
            array(
                'id' => 'crypterium_blog_hero_overlay',
                'label' => esc_html__( 'Blog/Post page overlay color ', 'crypterium' ),
                'desc' => esc_html__( 'Please select color', 'crypterium' ),
                'condition' => 'crypterium_blog_hero_display:is(on),crypterium_blog_overlay_setting:is(on)',
                'type' => 'colorpicker-opacity',
                'section' => 'blog_page'
            ),

            /*************************************************
            ## SINGLE  HEADER SETTINGS
            *************************************************/

            array(
                'id' => 'crypterium_single_hero_tab',
                'label' =>  esc_html__( 'Hero', 'crypterium' ),
                'type' => 'tab',
                'section' => 'single_page',
            ),
            array(
                'id' => 'crypterium_single_hero_display',
                'label' => esc_html__( 'Single page hero section display', 'crypterium' ),
                'desc' => sprintf( esc_html__( 'Please select single page hero section display %s or %s.', 'crypterium' ), '<code>on</code>', '<code>off</code>' ),
                'std' => 'on',
                'type' => 'on-off',
                'section' => 'single_page',
                'operator' => 'and'
            ),
            array(
                'id' => 'crypterium_single_hero_info',
                'label' => esc_html__( 'Single page hero section is off', 'crypterium' ),
                'type' => 'textblock-titled',
                'section' => 'single_page',
                'condition' => 'crypterium_single_hero_display:is(off)',
                'operator' => 'or'
            ),
            array(
                'id' => 'crypterium_single_hero_bg',
                'label' =>  esc_html__( 'Single page hero section background image', 'crypterium' ),
                'desc' =>  esc_html__( 'You can upload your image for header', 'crypterium' ),
                'type' => 'upload',
                'section' => 'single_page',
                'condition' => 'crypterium_single_hero_display:is(on)',
                'operator' => 'and'
            ),
            array(
                'id' => 'crypterium_single_header_bgcolor',
                'label' => esc_html__( 'Single page hero section background color', 'crypterium' ),
                'desc' => esc_html__( 'Please select color', 'crypterium' ),
                'type' => 'colorpicker-opacity',
                'condition' => 'crypterium_single_hero_display:is(on)',
                'section' => 'single_page'
            ),
            array(
                'id' => 'crypterium_single_header_bgheight',
                'label' => esc_html__('Single page hero section height', 'crypterium' ),
                'desc' => esc_html__('Single page hero section height', 'crypterium' ),
                'std' => '55',
                'type' => 'numeric-slider',
                'min_max_step'=> '0,100',
                'section' => 'single_page',
                'condition' => 'crypterium_single_hero_display:is(on)',
                'operator' => 'and'
            ),
            array(
                'id' => 'crypterium_single_h_p',
                'label' => esc_html__( 'Single page hero section padding', 'crypterium' ),
                'desc' => esc_html__( 'Single page hero section padding', 'crypterium' ),
                'type' => 'spacing',
                'condition' => 'crypterium_single_hero_display:is(on)',
                'section' => 'single_page',
            ),
            array(
                'id' => 'crypterium_single_h_m',
                'label' => esc_html__( 'Single page hero section margin', 'crypterium' ),
                'desc' => esc_html__( 'Single page hero section margin', 'crypterium' ),
                'type' => 'spacing',
                'condition' => 'crypterium_single_hero_display:is(on)',
                'section' => 'single_page',
            ),
            //single heading
            array(
                'id' => 'crypterium_single_heading_tab',
                'label' =>  esc_html__( 'Heading', 'crypterium' ),
                'type' => 'tab',
                'section' => 'single_page',
            ),
            array(
                'id' => 'crypterium_single_heading_display',
                'label' => esc_html__( 'Single page heading display', 'crypterium' ),
                'desc' => sprintf( esc_html__( 'Please select single page heading display %s or %s.', 'crypterium' ), '<code>on</code>', '<code>off</code>' ),
                'std' => 'on',
                'type' => 'on-off',
                'condition' => 'crypterium_single_hero_display:is(on)',
                'section' => 'single_page',
                'operator' => 'and'
            ),
            array(
                'id' => 'crypterium_single_heading_info',
                'label' => esc_html__( 'Single page heading is off', 'crypterium' ),
                'type' => 'textblock-titled',
                'section' => 'single_page',
                'condition' => 'crypterium_single_heading_display:is(off)',
                'operator' => 'or'
            ),
            array(
                'id' => 'crypterium_single_heading',
                'label' => esc_html__( 'Single page heading', 'crypterium' ),
                'desc' => esc_html__( 'Enter single page heading', 'crypterium' ),
                'type' => 'text',
                'condition' => 'crypterium_single_heading_display:is(on),crypterium_single_hero_display:is(on)',
                'section' => 'single_page'
            ),
            array(
                'id' => 'crypterium_single_heading_color',
                'label' => esc_html__( 'Single page heading color ', 'crypterium' ),
                'desc' => esc_html__( 'Please select color', 'crypterium' ),
                'type' => 'colorpicker-opacity',
                'condition' => 'single_heading_display:is(on),crypterium_single_hero_display:is(on)',
                'section' => 'single_page'
            ),
            array(
                'id' => 'crypterium_single_heading_fontsize',
                'label' => esc_html__('Single page heading font size', 'crypterium' ),
                'desc' => esc_html__('Enter single  page heading font size', 'crypterium' ),
                'std' => '70',
                'type' => 'numeric-slider',
                'min_max_step'=> '0,200',
                'condition' => 'crypterium_single_heading_display:is(on),crypterium_single_hero_display:is(on)',
                'section' => 'single_page',
                'operator' => 'and'
            ),
            //single slogan
            array(
                'id' => 'crypterium_single_slogan_tab',
                'label' =>  esc_html__( 'Slogan', 'crypterium' ),
                'type' => 'tab',
                'section' => 'single_page',
            ),
            array(
                'id' => 'crypterium_single_slogan_display',
                'label' => esc_html__( 'Single page slogan display', 'crypterium' ),
                'desc' => sprintf( esc_html__( 'Please select single  page slogan display %s or %s.', 'crypterium' ), '<code>on</code>', '<code>off</code>' ),
                'std' => 'on',
                'type' => 'on-off',
                'condition' => 'crypterium_single_hero_display:is(on)',
                'section' => 'single_page',
                'operator' => 'and'
            ),
            array(
                'id' => 'crypterium_single_slogan_info',
                'label' => esc_html__( 'Single Slogan is off', 'crypterium' ),
                'type' => 'textblock-titled',
                'section' => 'single_page',
                'condition' => 'crypterium_single_slogan_display:is(off)',
                'operator' => 'or'
            ),
            array(
                'id' => 'crypterium_single_slogan',
                'label' => esc_html__( 'Single page slogan', 'crypterium' ),
                'desc' => esc_html__( 'Enter single  page slogan', 'crypterium' ),
                'type' => 'text',
                'condition' => 'crypterium_single_slogan_display:is(on),crypterium_single_hero_display:is(on)',
                'section' => 'single_page'
            ),
            array(
                'id' => 'crypterium_single_slogan_color',
                'label' => esc_html__( 'Single page slogan color ', 'crypterium' ),
                'desc' => esc_html__( 'Please select color', 'crypterium' ),
                'type' => 'colorpicker-opacity',
                'condition' => 'crypterium_single_slogan_display:is(on),crypterium_single_hero_display:is(on)',
                'section' => 'single_page'
            ),
            array(
                'id' => 'crypterium_single_slogan_fontsize',
                'label' => esc_html__('Single page slogan font size', 'crypterium' ),
                'desc' => esc_html__('Enter single  page slogan font size', 'crypterium' ),
                'std' => '16',
                'type' => 'numeric-slider',
                'min_max_step'=> '0,100',
                'condition' => 'crypterium_single_slogan_display:is(on),crypterium_single_hero_display:is(on)',
                'section' => 'single_page',
                'operator' => 'and'
            ),
            //single desc
            array(
                'id' => 'crypterium_single_desc_tab',
                'label' =>  esc_html__( 'Description', 'crypterium' ),
                'type' => 'tab',
                'section' => 'single_page',
            ),
            array(
                'id' => 'crypterium_single_desc_display',
                'label' => esc_html__( 'Single page description display', 'crypterium' ),
                'desc' => sprintf( esc_html__( 'Please select single  page description display %s or %s.', 'crypterium' ), '<code>on</code>', '<code>off</code>' ),
                'std' => 'on',
                'type' => 'on-off',
                'condition' => 'crypterium_single_hero_display:is(on)',
                'section' => 'single_page',
                'operator' => 'and'
            ),
            array(
                'id' => 'crypterium_desc_info',
                'label' => esc_html__( 'Single description is off', 'crypterium' ),
                'type' => 'textblock-titled',
                'section' => 'single_page',
                'condition' => 'crypterium_single_desc_display:is(off)',
                'operator' => 'or'
            ),
            array(
                'id' => 'crypterium_single_desc',
                'label' => esc_html__( 'Single page description', 'crypterium' ),
                'desc' => esc_html__( 'Enter single  page description', 'crypterium' ),
                'type' => 'text',
                'condition' => 'crypterium_single_desc_display:is(on),crypterium_single_hero_display:is(on)',
                'section' => 'single_page'
            ),
            array(
                'id' => 'crypterium_single_desc_color',
                'label' => esc_html__( 'Single page description color ', 'crypterium' ),
                'desc' => esc_html__( 'Please select color', 'crypterium' ),
                'type' => 'colorpicker-opacity',
                'condition' => 'crypterium_single_desc_display:is(on),crypterium_single_hero_display:is(on)',
                'section' => 'single_page'
            ),
            array(
                'id' => 'crypterium_single_desc_fontsize',
                'label' => esc_html__('Single page description font size', 'crypterium' ),
                'desc' => esc_html__('Enter single  page description font size', 'crypterium' ),
                'std' => '16',
                'type' => 'numeric-slider',
                'min_max_step'=> '0,100',
                'condition' => 'crypterium_single_desc_display:is(on),crypterium_single_hero_display:is(on)',
                'section' => 'single_page',
                'operator' => 'and'
            ),
            //single page hero button settings
            array(
                'id' => 'crypterium_single_herobutton_tab',
                'label' => esc_html__( 'Button', 'crypterium' ),
                'type' => 'tab',
                'section' => 'single_page',
            ),
            array(
                'id' => 'crypterium_single_hero_btn_display',
                'label' => esc_html__( 'Single page button display', 'crypterium' ),
                'desc' => sprintf( esc_html__( 'Please select single  page button display %s or %s.', 'crypterium' ), '<code>on</code>', '<code>off</code>' ),
                'std' => 'off',
                'type' => 'on-off',
                'condition' => 'crypterium_single_hero_display:is(on)',
                'section' => 'single_page',
                'operator' => 'and'
            ),
            array(
                'id' => 'crypterium_single_hero_btn',
                'label' => esc_html__( 'Single page button title', 'crypterium' ),
                'desc' => esc_html__( 'Enter single page button title', 'crypterium' ),
                'type' => 'text',
                'condition' => 'crypterium_single_hero_display:is(on),crypterium_single_hero_btn_display:is(on)',
                'section' => 'single_page'
            ),
            array(
                'id' => 'crypterium_single_hero_btn_url',
                'label' => esc_html__( 'Single page button URL', 'crypterium' ),
                'desc' => esc_html__( 'Enter single page button URL', 'crypterium' ),
                'type' => 'text',
                'condition' => 'crypterium_single_hero_display:is(on),crypterium_single_hero_btn_display:is(on)',
                'section' => 'single_page'
            ),
            array(
                'id' => 'crypterium_single_btn_color',
                'label' => esc_html__( 'Single page button color ', 'crypterium' ),
                'desc' => esc_html__( 'Please select color', 'crypterium' ),
                'type' => 'colorpicker-opacity',
                'condition' => 'crypterium_single_hero_display:is(on),crypterium_single_hero_btn_display:is(on)',
                'section' => 'single_page'
            ),
            array(
                'id' => 'crypterium_single_btn_bgcolor',
                'label' => esc_html__( 'Single page button bg color', 'crypterium' ),
                'desc' => esc_html__( 'Please select color', 'crypterium' ),
                'type' => 'colorpicker-opacity',
                'condition' => 'crypterium_single_hero_display:is(on),crypterium_single_hero_btn_display:is(on)',
                'section' => 'single_page'
            ),
            //single page breadcrumb
            array(
                'id' => 'crypterium_single_bred_tab',
                'label' => esc_html__( 'Breadcrubms', 'crypterium' ),
                'type' => 'tab',
                'section' => 'single_page',
            ),
            array(
                'id' => 'crypterium_single_bread',
                'label' => esc_html__( 'Single page breadcrubms display', 'crypterium' ),
                'desc' => sprintf( esc_html__( 'Breadcrubms display %s or %s.', 'crypterium' ), '<code>on</code>', '<code>off</code>' ),
                'std' => 'on',
                'type' => 'on-off',
                'condition' => 'crypterium_single_hero_display:is(on)',
                'section' => 'single_page',
                'operator' => 'and'
            ),
            array(
                'id' => 'crypterium_single_breadcrubms_color',
                'label' => esc_html__( 'Single page breadcrubms icon color ', 'crypterium' ),
                'desc' => esc_html__( 'Please select color', 'crypterium' ),
                'type' => 'colorpicker-opacity',
                'condition' => 'crypterium_single_hero_display:is(on),crypterium_single_bread:is(on)',
                'section' => 'single_page'
            ),
            array(
                'id' => 'crypterium_single_breadcrubms_currentcolor',
                'label' => esc_html__( 'Single page breadcrubms text color ', 'crypterium' ),
                'desc' => esc_html__( 'Please select color', 'crypterium' ),
                'type' => 'colorpicker-opacity',
                'condition' => 'crypterium_single_hero_display:is(on),crypterium_single_bread:is(on)',
                'section' => 'single_page'
            ),
            array(
                'id' => 'crypterium_single_breadcrubms_hovercolor',
                'label' => esc_html__( 'Single page breadcrubms hover color ', 'crypterium' ),
                'desc' => esc_html__( 'Please select color', 'crypterium' ),
                'type' => 'colorpicker-opacity',
                'condition' => 'crypterium_single_hero_display:is(on),crypterium_single_bread:is(on)',
                'section' => 'single_page'
            ),
            array(
                'id' => 'crypterium_single_breadcrubms_font_size',
                'label' => esc_html__('Single page breadcrubms font size', 'crypterium' ),
                'desc' => esc_html__('Enter breadcrubms font size', 'crypterium' ),
                'type' => 'numeric-slider',
                'std'			  => '11',
                'min_max_step'=> '0,100',
                'condition' => 'crypterium_single_hero_display:is(on),crypterium_single_bread:is(on)',
                'section' => 'single_page',
                'operator' => 'and'
            ),
            //single page general setting
            array(
                'id' => 'crypterium_single_generalsetting_tab',
                'label' => esc_html__( 'General Settings', 'crypterium' ),
                'type' => 'tab',
                'section' => 'single_page',
            ),
            array(
                'id' => 'crypterium_single_hero_align',
                'label' => esc_html__( 'Single page hero align', 'crypterium' ),
                'desc' => esc_html__( 'Select single page hero align. Default :center.' , 'crypterium' ),
                'std' => 'center',
                'type' => 'select',
                'condition' => 'crypterium_single_hero_display:is(on)',
                'section' => 'single_page',
                'operator' => 'and',
                'choices' => array(
                    array(
                        'value' => 'left',
                        'label' => esc_html__( 'Left', 'crypterium' )
                    ),
                    array(
                        'value' => 'center',
                        'label' => esc_html__( 'Center', 'crypterium' )
                    ),
                    array(
                        'value' => 'right',
                        'label' => esc_html__( 'Right', 'crypterium' )
                    ),
                )
            ),
            array(
                'id' => 'crypterium_single_overlay_setting',
                'label' => esc_html__( 'Single page overlay display', 'crypterium' ),
                'desc' => sprintf( esc_html__( 'Overlay display %s or %s.', 'crypterium' ), '<code>on</code>', '<code>off</code>' ),
                'std' => 'on',
                'type' => 'on-off',
                'condition' => 'crypterium_single_hero_display:is(on)',
                'section' => 'single_page',
                'operator' => 'and'
            ),
            array(
                'id' => 'crypterium_single_hero_overlay',
                'label' => esc_html__( 'Single page overlay color ', 'crypterium' ),
                'desc' => esc_html__( 'Please select color', 'crypterium' ),
                'condition' => 'crypterium_single_hero_display:is(on),crypterium_single_overlay_setting:is(on)',
                'type' => 'colorpicker-opacity',
                'section' => 'single_page'
            ),

            /*************************************************
            ## SINGLE PORTFOLIO HEADER SETTINGS.
            *************************************************/

            array(
                'id' => 'crypterium_single_portfolio_hero_tab',
                'label' =>  esc_html__( 'Single P. Hero', 'crypterium' ),
                'type' => 'tab',
                'section' => 'single_port',
            ),
            array(
                'id' => 'crypterium_single_portfolio_hero_display',
                'label' => esc_html__( 'Single portfolio page hero section display', 'crypterium' ),
                'desc' => sprintf( esc_html__( 'Please select single portfolio page hero section display %s or %s.', 'crypterium' ), '<code>on</code>', '<code>off</code>' ),
                'std' => 'on',
                'type' => 'on-off',
                'section' => 'single_port',
                'operator' => 'and'
            ),
            array(
                'id' => 'crypterium_single_portfolio_hero_info',
                'label' => esc_html__( 'Single portfolio page hero section is off', 'crypterium' ),
                'type' => 'textblock-titled',
                'section' => 'single_port',
                'condition' => 'crypterium_single_portfolio_hero_display:is(off)',
                'operator' => 'or'
            ),
            array(
                'id' => 'crypterium_single_portfolio_hero_bg',
                'label' =>  esc_html__( 'Single portfolio page hero section background image', 'crypterium' ),
                'desc' =>  esc_html__( 'You can upload your image for header', 'crypterium' ),
                'type' => 'upload',
                'section' => 'single_port',
                'condition' => 'crypterium_single_portfolio_hero_display:is(on)',
                'operator' => 'and'
            ),
            array(
                'id' => 'crypterium_single_portfolio_header_bgcolor',
                'label' => esc_html__( 'Single portfolio page hero section background color', 'crypterium' ),
                'desc' => esc_html__( 'Please select color', 'crypterium' ),
                'type' => 'colorpicker-opacity',
                'condition' => 'crypterium_single_portfolio_hero_display:is(on)',
                'section' => 'single_port'
            ),
            array(
                'id' => 'crypterium_single_portfolio_header_bgheight',
                'label' => esc_html__('Single portfolio page hero section height', 'crypterium' ),
                'desc' => esc_html__('Single portfolio page hero section height', 'crypterium' ),
                'std' => '55',
                'type' => 'numeric-slider',
                'min_max_step'=> '0,100',
                'section' => 'single_port',
                'condition' => 'crypterium_single_portfolio_hero_display:is(on)',
                'operator' => 'and'
            ),
            array(
                'id' => 'crypterium_single_portfolio_h_p',
                'label' => esc_html__( 'Single portfolio page hero section padding', 'crypterium' ),
                'desc' => esc_html__( 'Single portfolio page hero section padding', 'crypterium' ),
                'type' => 'spacing',
                'condition' => 'crypterium_single_portfolio_hero_display:is(on)',
                'section' => 'single_port',
            ),
            array(
                'id' => 'crypterium_single_portfolio_h_m',
                'label' => esc_html__( 'Single portfolio page hero section margin', 'crypterium' ),
                'desc' => esc_html__( 'Single portfolio page hero section margin', 'crypterium' ),
                'type' => 'spacing',
                'condition' => 'crypterium_single_portfolio_hero_display:is(on)',
                'section' => 'single_port',
            ),
            //Single portfolio heading
            array(
                'id' => 'crypterium_single_portfolio_heading_tab',
                'label' =>  esc_html__( 'Single P. Heading', 'crypterium' ),
                'type' => 'tab',
                'section' => 'single_port',
            ),
            array(
                'id' => 'crypterium_single_portfolio_heading_display',
                'label' => esc_html__( 'Single portfolio page heading display', 'crypterium' ),
                'desc' => sprintf( esc_html__( 'Please select single portfolio page heading display %s or %s.', 'crypterium' ), '<code>on</code>', '<code>off</code>' ),
                'std' => 'on',
                'type' => 'on-off',
                'condition' => 'crypterium_single_portfolio_hero_display:is(on)',
                'section' => 'single_port',
                'operator' => 'and'
            ),
            array(
                'id' => 'crypterium_single_portfolio_heading_info',
                'label' => esc_html__( 'Single portfolio page heading is off', 'crypterium' ),
                'type' => 'textblock-titled',
                'section' => 'single_port',
                'condition' => 'crypterium_single_portfolio_heading_display:is(off)',
                'operator' => 'or'
            ),
            array(
                'id' => 'crypterium_single_portfolio_heading',
                'label' => esc_html__( 'Single portfolio page heading', 'crypterium' ),
                'desc' => esc_html__( 'Enter single portfolio page heading', 'crypterium' ),
                'type' => 'text',
                'condition' => 'crypterium_single_portfolio_heading_display:is(on),crypterium_single_portfolio_hero_display:is(on)',
                'section' => 'single_port'
            ),
            array(
                'id' => 'crypterium_single_portfolio_heading_color',
                'label' => esc_html__( 'Single portfolio page heading color ', 'crypterium' ),
                'desc' => esc_html__( 'Please select color', 'crypterium' ),
                'type' => 'colorpicker-opacity',
                'condition' => 'crypterium_single_portfolio_heading_display:is(on),crypterium_single_portfolio_hero_display:is(on)',
                'section' => 'single_port'
            ),
            array(
                'id' => 'crypterium_single_portfolio_heading_fontsize',
                'label' => esc_html__('Single portfolio page heading font size', 'crypterium' ),
                'desc' => esc_html__('Enter single portfolio page heading font size', 'crypterium' ),
                'std' => '70',
                'type' => 'numeric-slider',
                'min_max_step'=> '0,200',
                'condition' => 'crypterium_single_portfolio_heading_display:is(on),crypterium_single_portfolio_hero_display:is(on)',
                'section' => 'single_port',
                'operator' => 'and'
            ),
            //Single portfolio slogan
            array(
                'id' => 'crypterium_single_portfolio_slogan_tab',
                'label' =>  esc_html__( 'Single P. Slogan', 'crypterium' ),
                'type' => 'tab',
                'section' => 'single_port',
            ),
            array(
                'id' => 'crypterium_single_portfolio_slogan_display',
                'label' => esc_html__( 'Single portfolio page slogan display', 'crypterium' ),
                'desc' => sprintf( esc_html__( 'Please select single portfolio page slogan display %s or %s.', 'crypterium' ), '<code>on</code>', '<code>off</code>' ),
                'std' => 'on',
                'type' => 'on-off',
                'condition' => 'crypterium_single_portfolio_hero_display:is(on)',
                'section' => 'single_port',
                'operator' => 'and'
            ),
            array(
                'id' => 'crypterium_single_portfolio_slogan_info',
                'label' => esc_html__( 'Single portfolio Slogan is off', 'crypterium' ),
                'type' => 'textblock-titled',
                'section' => 'single_port',
                'condition' => 'crypterium_single_portfolio_slogan_display:is(off)',
                'operator' => 'or'
            ),
            array(
                'id' => 'crypterium_single_portfolio_slogan',
                'label' => esc_html__( 'Single portfolio page slogan', 'crypterium' ),
                'desc' => esc_html__( 'Enter single portfolio page slogan', 'crypterium' ),
                'type' => 'text',
                'condition' => 'crypterium_single_portfolio_slogan_display:is(on),crypterium_single_portfolio_hero_display:is(on)',
                'section' => 'single_port'
            ),
            array(
                'id' => 'crypterium_single_portfolio_slogan_color',
                'label' => esc_html__( 'Single portfolio page slogan color ', 'crypterium' ),
                'desc' => esc_html__( 'Please select color', 'crypterium' ),
                'type' => 'colorpicker-opacity',
                'condition' => 'crypterium_single_portfolio_slogan_display:is(on),crypterium_single_portfolio_hero_display:is(on)',
                'section' => 'single_port'
            ),
            array(
                'id' => 'crypterium_single_portfolio_slogan_fontsize',
                'label' => esc_html__('Single portfolio page slogan font size', 'crypterium' ),
                'desc' => esc_html__('Enter single portfolio page slogan font size', 'crypterium' ),
                'std' => '16',
                'type' => 'numeric-slider',
                'min_max_step'=> '0,100',
                'condition' => 'crypterium_single_portfolio_slogan_display:is(on),crypterium_single_portfolio_hero_display:is(on)',
                'section' => 'single_port',
                'operator' => 'and'
            ),
            //Single portfolio desc
            array(
                'id' => 'crypterium_single_portfolio_desc_tab',
                'label' =>  esc_html__( 'Single P. Description', 'crypterium' ),
                'type' => 'tab',
                'section' => 'single_port',
            ),
            array(
                'id' => 'crypterium_single_portfolio_desc_display',
                'label' => esc_html__( 'Single portfolio page description display', 'crypterium' ),
                'desc' => sprintf( esc_html__( 'Please select single portfolio page description display %s or %s.', 'crypterium' ), '<code>on</code>', '<code>off</code>' ),
                'std' => 'on',
                'type' => 'on-off',
                'condition' => 'crypterium_single_portfolio_hero_display:is(on)',
                'section' => 'single_port',
                'operator' => 'and'
            ),
            array(
                'id' => 'crypterium_desc_info',
                'label' => esc_html__( 'Single portfolio description is off', 'crypterium' ),
                'type' => 'textblock-titled',
                'section' => 'single_port',
                'condition' => 'crypterium_single_portfolio_desc_display:is(off)',
                'operator' => 'or'
            ),
            array(
                'id' => 'crypterium_single_portfolio_desc',
                'label' => esc_html__( 'Single portfolio page description', 'crypterium' ),
                'desc' => esc_html__( 'Enter single portfolio page description', 'crypterium' ),
                'type' => 'text',
                'condition' => 'crypterium_single_portfolio_desc_display:is(on),crypterium_single_portfolio_hero_display:is(on)',
                'section' => 'single_port'
            ),
            array(
                'id' => 'crypterium_single_portfolio_desc_color',
                'label' => esc_html__( 'Single portfolio page description color ', 'crypterium' ),
                'desc' => esc_html__( 'Please select color', 'crypterium' ),
                'type' => 'colorpicker-opacity',
                'condition' => 'crypterium_single_portfolio_desc_display:is(on),crypterium_single_portfolio_hero_display:is(on)',
                'section' => 'single_port'
            ),
            array(
                'id' => 'crypterium_single_portfolio_desc_fontsize',
                'label' => esc_html__('Single portfolio page description font size', 'crypterium' ),
                'desc' => esc_html__('Enter single portfolio page description font size', 'crypterium' ),
                'std' => '16',
                'type' => 'numeric-slider',
                'min_max_step'=> '0,100',
                'condition' => 'crypterium_single_portfolio_desc_display:is(on),crypterium_single_portfolio_hero_display:is(on)',
                'section' => 'single_port',
                'operator' => 'and'
            ),
            //Single portfolio page hero button settings
            array(
                'id' => 'crypterium_single_portfolio_herobutton_tab',
                'label' => esc_html__( 'Single P. Button', 'crypterium' ),
                'type' => 'tab',
                'section' => 'single_port',
            ),
            array(
                'id' => 'crypterium_single_portfolio_hero_btn_display',
                'label' => esc_html__( 'Single portfolio page button display', 'crypterium' ),
                'desc' => sprintf( esc_html__( 'Please select single portfolio page button display %s or %s.', 'crypterium' ), '<code>on</code>', '<code>off</code>' ),
                'std' => 'off',
                'type' => 'on-off',
                'condition' => 'crypterium_single_portfolio_hero_display:is(on)',
                'section' => 'single_port',
                'operator' => 'and'
            ),
            array(
                'id' => 'crypterium_single_portfolio_hero_btn',
                'label' => esc_html__( 'Single portfolio page button title', 'crypterium' ),
                'desc' => esc_html__( 'Enter single portfolio page button title', 'crypterium' ),
                'type' => 'text',
                'condition' => 'crypterium_single_portfolio_hero_display:is(on),crypterium_single_portfolio_hero_btn_display:is(on)',
                'section' => 'single_port'
            ),
            array(
                'id' => 'crypterium_single_portfolio_hero_btn_url',
                'label' => esc_html__( 'Single portfolio page button URL', 'crypterium' ),
                'desc' => esc_html__( 'Enter single portfolio page button URL', 'crypterium' ),
                'type' => 'text',
                'condition' => 'crypterium_single_portfolio_hero_display:is(on),crypterium_single_portfolio_hero_btn_display:is(on)',
                'section' => 'single_port'
            ),
            array(
                'id' => 'crypterium_single_portfolio_btn_color',
                'label' => esc_html__( 'Single portfolio page button color ', 'crypterium' ),
                'desc' => esc_html__( 'Please select color', 'crypterium' ),
                'type' => 'colorpicker-opacity',
                'condition' => 'crypterium_single_portfolio_hero_display:is(on),crypterium_single_portfolio_hero_btn_display:is(on)',
                'section' => 'single_port'
            ),
            array(
                'id' => 'crypterium_single_portfolio_btn_bgcolor',
                'label' => esc_html__( 'Single portfolio page button bg color', 'crypterium' ),
                'desc' => esc_html__( 'Please select color', 'crypterium' ),
                'type' => 'colorpicker-opacity',
                'condition' => 'crypterium_single_portfolio_hero_display:is(on),crypterium_single_portfolio_hero_btn_display:is(on)',
                'section' => 'single_port'
            ),
            //Single portfolio page breadcrumb
            array(
                'id' => 'crypterium_single_portfolio_bred_tab',
                'label' => esc_html__( 'Single P. Breadcrubms', 'crypterium' ),
                'type' => 'tab',
                'section' => 'single_port',
            ),
            array(
                'id' => 'crypterium_single_portfolio_bread',
                'label' => esc_html__( 'Single portfolio page breadcrubms display', 'crypterium' ),
                'desc' => sprintf( esc_html__( 'Breadcrubms display %s or %s.', 'crypterium' ), '<code>on</code>', '<code>off</code>' ),
                'std' => 'on',
                'type' => 'on-off',
                'condition' => 'crypterium_single_portfolio_hero_display:is(on)',
                'section' => 'single_port',
                'operator' => 'and'
            ),
            array(
                'id' => 'crypterium_single_portfolio_breadcrubms_color',
                'label' => esc_html__( 'Single portfolio page breadcrubms icon color ', 'crypterium' ),
                'desc' => esc_html__( 'Please select color', 'crypterium' ),
                'type' => 'colorpicker-opacity',
                'condition' => 'crypterium_single_portfolio_hero_display:is(on),crypterium_single_portfolio_bread:is(on)',
                'section' => 'single_port'
            ),
            array(
                'id' => 'crypterium_single_portfolio_breadcrubms_currentcolor',
                'label' => esc_html__( 'Single portfolio page breadcrubms text color ', 'crypterium' ),
                'desc' => esc_html__( 'Please select color', 'crypterium' ),
                'type' => 'colorpicker-opacity',
                'condition' => 'crypterium_single_portfolio_hero_display:is(on),crypterium_single_portfolio_bread:is(on)',
                'section' => 'single_port'
            ),
            array(
                'id' => 'crypterium_single_portfolio_breadcrubms_hovercolor',
                'label' => esc_html__( 'Single portfolio page breadcrubms hover color ', 'crypterium' ),
                'desc' => esc_html__( 'Please select color', 'crypterium' ),
                'type' => 'colorpicker-opacity',
                'condition' => 'crypterium_single_portfolio_hero_display:is(on),crypterium_single_portfolio_bread:is(on)',
                'section' => 'single_port'
            ),
            array(
                'id' => 'crypterium_single_portfolio_breadcrubms_font_size',
                'label' => esc_html__('Single portfolio page breadcrubms font size', 'crypterium' ),
                'desc' => esc_html__('Enter breadcrubms font size', 'crypterium' ),
                'type' => 'numeric-slider',
                'std'			  => '11',
                'min_max_step'=> '0,100',
                'condition' => 'crypterium_single_portfolio_hero_display:is(on),crypterium_single_portfolio_bread:is(on)',
                'section' => 'single_port',
                'operator' => 'and'
            ),
            //Single portfolio page general setting
            array(
                'id' => 'crypterium_single_portfolio_generalsetting_tab',
                'label' => esc_html__( 'Single P. General Settings', 'crypterium' ),
                'type' => 'tab',
                'section' => 'single_port',
            ),
            array(
                'id' => 'crypterium_single_portfolio_hero_align',
                'label' => esc_html__( 'Single portfolio page hero align', 'crypterium' ),
                'desc' => esc_html__( 'Select single portfolio page hero align. Default :center.' , 'crypterium' ),
                'std' => 'center',
                'type' => 'select',
                'condition' => 'crypterium_single_portfolio_hero_display:is(on)',
                'section' => 'single_port',
                'operator' => 'and',
                'choices' => array(
                    array(
                        'value' => 'left',
                        'label' => esc_html__( 'Left', 'crypterium' )
                    ),
                    array(
                        'value' => 'center',
                        'label' => esc_html__( 'Center', 'crypterium' )
                    ),
                    array(
                        'value' => 'right',
                        'label' => esc_html__( 'Right', 'crypterium' )
                    ),
                )
            ),
            array(
                'id' => 'crypterium_single_portfolio_overlay_setting',
                'label' => esc_html__( 'Single portfolio page overlay display', 'crypterium' ),
                'desc' => sprintf( esc_html__( 'Overlay display %s or %s.', 'crypterium' ), '<code>on</code>', '<code>off</code>' ),
                'std' => 'on',
                'type' => 'on-off',
                'condition' => 'crypterium_single_portfolio_hero_display:is(on)',
                'section' => 'single_port',
                'operator' => 'and'
            ),
            array(
                'id' => 'crypterium_single_portfolio_hero_overlay',
                'label' => esc_html__( 'Single portfolio page overlay color ', 'crypterium' ),
                'desc' => esc_html__( 'Please select color', 'crypterium' ),
                'condition' => 'crypterium_single_portfolio_hero_display:is(on),crypterium_single_portfolio_overlay_setting:is(on)',
                'type' => 'colorpicker-opacity',
                'section' => 'single_port'
            ),

            /*************************************************
            ## ARCHIVE HEADER SETTINGS.
            *************************************************/

            array(
                'id' => 'crypterium_archive_hero_tab',
                'label' =>  esc_html__( 'Archive Hero', 'crypterium' ),
                'type' => 'tab',
                'section' => 'archive_page',
            ),
            array(
                'id' => 'crypterium_archive_hero_display',
                'label' => esc_html__( 'Archive page hero section display', 'crypterium' ),
                'desc' => sprintf( esc_html__( 'Please select archive page hero section display %s or %s.', 'crypterium' ), '<code>on</code>', '<code>off</code>' ),
                'std' => 'on',
                'type' => 'on-off',
                'section' => 'archive_page',
                'operator' => 'and'
            ),
            array(
                'id' => 'crypterium_archive_hero_info',
                'label' => esc_html__( 'Archive page hero section is off', 'crypterium' ),
                'type' => 'textblock-titled',
                'section' => 'archive_page',
                'condition' => 'crypterium_archive_hero_display:is(off)',
                'operator' => 'or'
            ),
            array(
                'id' => 'crypterium_archive_hero_bg',
                'label' =>  esc_html__( 'Archive page hero section background image', 'crypterium' ),
                'desc' =>  esc_html__( 'You can upload your image for header', 'crypterium' ),
                'type' => 'upload',
                'section' => 'archive_page',
                'condition' => 'crypterium_archive_hero_display:is(on)',
                'operator' => 'and'
            ),
            array(
                'id' => 'crypterium_archive_header_bgcolor',
                'label' => esc_html__( 'Archive page hero section background color', 'crypterium' ),
                'desc' => esc_html__( 'Please select color', 'crypterium' ),
                'type' => 'colorpicker-opacity',
                'condition' => 'crypterium_archive_hero_display:is(on)',
                'section' => 'archive_page'
            ),
            array(
                'id' => 'crypterium_archive_header_bgheight',
                'label' => esc_html__('Archive page hero section height', 'crypterium' ),
                'desc' => esc_html__('Archive page hero section height', 'crypterium' ),
                'std' => '55',
                'type' => 'numeric-slider',
                'min_max_step'=> '0,100',
                'section' => 'archive_page',
                'condition' => 'crypterium_archive_hero_display:is(on)',
                'operator' => 'and'
            ),
            array(
                'id' => 'crypterium_archive_h_p',
                'label' => esc_html__( 'Archive page hero section padding', 'crypterium' ),
                'desc' => esc_html__( 'Archive page hero section padding', 'crypterium' ),
                'type' => 'spacing',
                'condition' => 'crypterium_archive_hero_display:is(on)',
                'section' => 'archive_page',
            ),
            array(
                'id' => 'crypterium_archive_h_m',
                'label' => esc_html__( 'Archive page hero section margin', 'crypterium' ),
                'desc' => esc_html__( 'Archive page hero section margin', 'crypterium' ),
                'type' => 'spacing',
                'condition' => 'crypterium_archive_hero_display:is(on)',
                'section' => 'archive_page',
            ),
            //Archive heading
            array(
                'id' => 'crypterium_archive_heading_tab',
                'label' =>  esc_html__( 'Archive Heading', 'crypterium' ),
                'type' => 'tab',
                'section' => 'archive_page',
            ),
            array(
                'id' => 'crypterium_archive_heading_display',
                'label' => esc_html__( 'Archive page heading display', 'crypterium' ),
                'desc' => sprintf( esc_html__( 'Please select archive page heading display %s or %s.', 'crypterium' ), '<code>on</code>', '<code>off</code>' ),
                'std' => 'on',
                'type' => 'on-off',
                'condition' => 'crypterium_archive_hero_display:is(on)',
                'section' => 'archive_page',
                'operator' => 'and'
            ),
            array(
                'id' => 'crypterium_heading_info',
                'label' => esc_html__( 'Archive page heading is off', 'crypterium' ),
                'type' => 'textblock-titled',
                'section' => 'archive_page',
                'condition' => 'crypterium_archive_heading_display:is(off)',
                'operator' => 'or'
            ),
            array(
                'id' => 'crypterium_archive_heading',
                'label' => esc_html__( 'Archive page heading', 'crypterium' ),
                'desc' => esc_html__( 'Enter archive page heading', 'crypterium' ),
                'type' => 'text',
                'condition' => 'crypterium_archive_heading_display:is(on),crypterium_archive_hero_display:is(on)',
                'section' => 'archive_page'
            ),
            array(
                'id' => 'crypterium_archive_heading_color',
                'label' => esc_html__( 'Archive page heading color ', 'crypterium' ),
                'desc' => esc_html__( 'Please select color', 'crypterium' ),
                'type' => 'colorpicker-opacity',
                'condition' => 'crypterium_archive_heading_display:is(on),crypterium_archive_hero_display:is(on)',
                'section' => 'archive_page'
            ),
            array(
                'id' => 'crypterium_archive_heading_fontsize',
                'label' => esc_html__('Archive page heading font size', 'crypterium' ),
                'desc' => esc_html__('Enter archive page heading font size', 'crypterium' ),
                'std' => '70',
                'type' => 'numeric-slider',
                'min_max_step'=> '0,200',
                'condition' => 'crypterium_archive_heading_display:is(on),crypterium_archive_hero_display:is(on)',
                'section' => 'archive_page',
                'operator' => 'and'
            ),
            //Archive slogan
            array(
                'id' => 'crypterium_archive_slogan_tab',
                'label' =>  esc_html__( 'Archive Slogan', 'crypterium' ),
                'type' => 'tab',
                'section' => 'archive_page',
            ),
            array(
                'id' => 'crypterium_archive_slogan_display',
                'label' => esc_html__( 'Archive page slogan display', 'crypterium' ),
                'desc' => sprintf( esc_html__( 'Please select archive page slogan display %s or %s.', 'crypterium' ), '<code>on</code>', '<code>off</code>' ),
                'std' => 'on',
                'type' => 'on-off',
                'condition' => 'crypterium_archive_hero_display:is(on)',
                'section' => 'archive_page',
                'operator' => 'and'
            ),
            array(
                'id' => 'crypterium_archive_slogan_info',
                'label' => esc_html__( 'Archive Slogan is off', 'crypterium' ),
                'type' => 'textblock-titled',
                'section' => 'archive_page',
                'condition' => 'crypterium_archive_slogan_display:is(off)',
                'operator' => 'or'
            ),
            array(
                'id' => 'crypterium_archive_slogan',
                'label' => esc_html__( 'Archive page slogan', 'crypterium' ),
                'desc' => esc_html__( 'Enter archive page slogan', 'crypterium' ),
                'type' => 'text',
                'condition' => 'crypterium_archive_slogan_display:is(on),crypterium_archive_hero_display:is(on)',
                'section' => 'archive_page'
            ),
            array(
                'id' => 'crypterium_archive_slogan_color',
                'label' => esc_html__( 'Archive page slogan color ', 'crypterium' ),
                'desc' => esc_html__( 'Please select color', 'crypterium' ),
                'type' => 'colorpicker-opacity',
                'condition' => 'crypterium_archive_slogan_display:is(on),crypterium_archive_hero_display:is(on)',
                'section' => 'archive_page'
            ),
            array(
                'id' => 'crypterium_archive_slogan_fontsize',
                'label' => esc_html__('Archive page slogan font size', 'crypterium' ),
                'desc' => esc_html__('Enter archive page slogan font size', 'crypterium' ),
                'std' => '16',
                'type' => 'numeric-slider',
                'min_max_step'=> '0,100',
                'condition' => 'crypterium_archive_slogan_display:is(on),crypterium_archive_hero_display:is(on)',
                'section' => 'archive_page',
                'operator' => 'and'
            ),
            //Archive desc
            array(
                'id' => 'crypterium_archive_desc_tab',
                'label' =>  esc_html__( 'Archive Description', 'crypterium' ),
                'type' => 'tab',
                'section' => 'archive_page',
            ),
            array(
                'id' => 'crypterium_archive_desc_display',
                'label' => esc_html__( 'Archive page description display', 'crypterium' ),
                'desc' => sprintf( esc_html__( 'Please select archive page description display %s or %s.', 'crypterium' ), '<code>on</code>', '<code>off</code>' ),
                'std' => 'on',
                'type' => 'on-off',
                'condition' => 'crypterium_archive_hero_display:is(on)',
                'section' => 'archive_page',
                'operator' => 'and'
            ),
            array(
                'id' => 'crypterium_desc_info',
                'label' => esc_html__( 'Archive description is off', 'crypterium' ),
                'type' => 'textblock-titled',
                'section' => 'archive_page',
                'condition' => 'crypterium_archive_desc_display:is(off)',
                'operator' => 'or'
            ),
            array(
                'id' => 'crypterium_archive_desc',
                'label' => esc_html__( 'Archive page description', 'crypterium' ),
                'desc' => esc_html__( 'Enter archive page description', 'crypterium' ),
                'type' => 'text',
                'condition' => 'crypterium_archive_desc_display:is(on),crypterium_archive_hero_display:is(on)',
                'section' => 'archive_page'
            ),
            array(
                'id' => 'crypterium_archive_desc_color',
                'label' => esc_html__( 'Archive page description color ', 'crypterium' ),
                'desc' => esc_html__( 'Please select color', 'crypterium' ),
                'type' => 'colorpicker-opacity',
                'condition' => 'crypterium_archive_desc_display:is(on),crypterium_archive_hero_display:is(on)',
                'section' => 'archive_page'
            ),
            array(
                'id' => 'crypterium_archive_desc_fontsize',
                'label' => esc_html__('Archive page description font size', 'crypterium' ),
                'desc' => esc_html__('Enter archive page description font size', 'crypterium' ),
                'std' => '16',
                'type' => 'numeric-slider',
                'min_max_step'=> '0,100',
                'condition' => 'crypterium_archive_desc_display:is(on),crypterium_archive_hero_display:is(on)',
                'section' => 'archive_page',
                'operator' => 'and'
            ),
            //Archive page hero button settings
            array(
                'id' => 'crypterium_archive_herobutton_tab',
                'label' => esc_html__( 'Archive Button', 'crypterium' ),
                'type' => 'tab',
                'section' => 'archive_page',
            ),
            array(
                'id' => 'crypterium_archive_hero_btn_display',
                'label' => esc_html__( 'Archive page button display', 'crypterium' ),
                'desc' => sprintf( esc_html__( 'Please select archive page button display %s or %s.', 'crypterium' ), '<code>on</code>', '<code>off</code>' ),
                'std' => 'off',
                'type' => 'on-off',
                'condition' => 'crypterium_archive_hero_display:is(on)',
                'section' => 'archive_page',
                'operator' => 'and'
            ),
            array(
                'id' => 'crypterium_archive_hero_btn',
                'label' => esc_html__( 'Archive page button title', 'crypterium' ),
                'desc' => esc_html__( 'Enter archive page button title', 'crypterium' ),
                'type' => 'text',
                'condition' => 'crypterium_archive_hero_display:is(on),crypterium_archive_hero_btn_display:is(on)',
                'section' => 'archive_page'
            ),
            array(
                'id' => 'crypterium_archive_hero_btn_url',
                'label' => esc_html__( 'Archive page button URL', 'crypterium' ),
                'desc' => esc_html__( 'Enter archive page button URL', 'crypterium' ),
                'type' => 'text',
                'condition' => 'crypterium_archive_hero_display:is(on),crypterium_archive_hero_btn_display:is(on)',
                'section' => 'archive_page'
            ),
            array(
                'id' => 'crypterium_archive_btn_color',
                'label' => esc_html__( 'Archive page button color ', 'crypterium' ),
                'desc' => esc_html__( 'Please select color', 'crypterium' ),
                'type' => 'colorpicker-opacity',
                'condition' => 'crypterium_archive_hero_display:is(on),crypterium_archive_hero_btn_display:is(on)',
                'section' => 'archive_page'
            ),
            array(
                'id' => 'crypterium_archive_btn_bgcolor',
                'label' => esc_html__( 'Archive page button bg color', 'crypterium' ),
                'desc' => esc_html__( 'Please select color', 'crypterium' ),
                'type' => 'colorpicker-opacity',
                'condition' => 'crypterium_archive_hero_display:is(on),crypterium_archive_hero_btn_display:is(on)',
                'section' => 'archive_page'
            ),
            //Archive page breadcrumb
            array(
                'id' => 'crypterium_archive_bred_tab',
                'label' => esc_html__( 'Archive Breadcrubms', 'crypterium' ),
                'type' => 'tab',
                'section' => 'archive_page',
            ),
            array(
                'id' => 'crypterium_archive_bread',
                'label' => esc_html__( 'Archive page breadcrubms display', 'crypterium' ),
                'desc' => sprintf( esc_html__( 'Breadcrubms display %s or %s.', 'crypterium' ), '<code>on</code>', '<code>off</code>' ),
                'std' => 'on',
                'type' => 'on-off',
                'condition' => 'crypterium_archive_hero_display:is(on)',
                'section' => 'archive_page',
                'operator' => 'and'
            ),
            array(
                'id' => 'crypterium_archive_breadcrubms_color',
                'label' => esc_html__( 'Archive page breadcrubms icon color ', 'crypterium' ),
                'desc' => esc_html__( 'Please select color', 'crypterium' ),
                'type' => 'colorpicker-opacity',
                'condition' => 'crypterium_archive_hero_display:is(on),crypterium_archive_bread:is(on)',
                'section' => 'archive_page'
            ),
            array(
                'id' => 'crypterium_archive_breadcrubms_currentcolor',
                'label' => esc_html__( 'Archive page breadcrubms text color ', 'crypterium' ),
                'desc' => esc_html__( 'Please select color', 'crypterium' ),
                'type' => 'colorpicker-opacity',
                'condition' => 'crypterium_archive_hero_display:is(on),crypterium_archive_bread:is(on)',
                'section' => 'archive_page'
            ),
            array(
                'id' => 'crypterium_archive_breadcrubms_hovercolor',
                'label' => esc_html__( 'Archive page breadcrubms hover color ', 'crypterium' ),
                'desc' => esc_html__( 'Please select color', 'crypterium' ),
                'type' => 'colorpicker-opacity',
                'condition' => 'crypterium_archive_hero_display:is(on),crypterium_archive_bread:is(on)',
                'section' => 'archive_page'
            ),
            array(
                'id' => 'crypterium_archive_breadcrubms_font_size',
                'label' => esc_html__('Archive page breadcrubms font size', 'crypterium' ),
                'desc' => esc_html__('Enter breadcrubms font size', 'crypterium' ),
                'type' => 'numeric-slider',
                'std'			  => '11',
                'min_max_step'=> '0,100',
                'condition' => 'crypterium_archive_hero_display:is(on),crypterium_archive_bread:is(on)',
                'section' => 'archive_page',
                'operator' => 'and'
            ),
            //Archive page general setting
            array(
                'id' => 'crypterium_archive_generalsetting_tab',
                'label' => esc_html__( 'Archive General Settings', 'crypterium' ),
                'type' => 'tab',
                'section' => 'archive_page',
            ),
            array(
                'id' => 'crypterium_archive_hero_align',
                'label' => esc_html__( 'Archive page hero align', 'crypterium' ),
                'desc' => esc_html__( 'Select archive page hero align. Default :left.' , 'crypterium' ),
                'std' => 'center',
                'type' => 'select',
                'condition' => 'crypterium_archive_hero_display:is(on)',
                'section' => 'archive_page',
                'operator' => 'and',
                'choices' => array(
                    array(
                        'value' => 'left',
                        'label' => esc_html__( 'Left', 'crypterium' )
                    ),
                    array(
                        'value' => 'center',
                        'label' => esc_html__( 'Center', 'crypterium' )
                    ),
                    array(
                        'value' => 'right',
                        'label' => esc_html__( 'Right', 'crypterium' )
                    ),
                )
            ),
            array(
                'id' => 'crypterium_archive_overlay_setting',
                'label' => esc_html__( 'Archive page overlay display', 'crypterium' ),
                'desc' => sprintf( esc_html__( 'Overlay display %s or %s.', 'crypterium' ), '<code>on</code>', '<code>off</code>' ),
                'std' => 'on',
                'type' => 'on-off',
                'condition' => 'crypterium_archive_hero_display:is(on)',
                'section' => 'archive_page',
                'operator' => 'and'
            ),
            array(
                'id' => 'crypterium_archive_hero_overlay',
                'label' => esc_html__( 'Archive page overlay color ', 'crypterium' ),
                'desc' => esc_html__( 'Please select color', 'crypterium' ),
                'condition' => 'crypterium_archive_hero_display:is(on),crypterium_archive_overlay_setting:is(on)',
                'type' => 'colorpicker-opacity',
                'section' => 'archive_page'
            ),

            /*************************************************
            ## 404 PAGE HERO SETTINGS.
            *************************************************/

            array(
                'id' => 'crypterium_error_hero_tab',
                'label' =>  esc_html__( '404 Hero', 'crypterium' ),
                'type' => 'tab',
                'section' => 'error_page',
            ),
            array(
                'id' => 'crypterium_error_hero_display',
                'label' => esc_html__( '404 page hero section display', 'crypterium' ),
                'desc' => sprintf( esc_html__( 'Please select 404 page hero section display %s or %s.', 'crypterium' ), '<code>on</code>', '<code>off</code>' ),
                'std' => 'on',
                'type' => 'on-off',
                'section' => 'error_page',
                'operator' => 'and'
            ),
            array(
                'id' => 'crypterium_error_hero_info',
                'label' => esc_html__( '404 page hero section is off', 'crypterium' ),
                'type' => 'textblock-titled',
                'section' => 'error_page',
                'condition' => 'crypterium_error_hero_display:is(off)',
                'operator' => 'or'
            ),
            array(
                'id' => 'crypterium_error_hero_bg',
                'label' =>  esc_html__( '404 page hero section background image', 'crypterium' ),
                'desc' =>  esc_html__( 'You can upload your image for header', 'crypterium' ),
                'type' => 'upload',
                'section' => 'error_page',
                'condition' => 'crypterium_error_hero_display:is(on)',
                'operator' => 'and'
            ),
            array(
                'id' => 'crypterium_error_header_bgcolor',
                'label' => esc_html__( '404 page hero section background color', 'crypterium' ),
                'desc' => esc_html__( 'Please select color', 'crypterium' ),
                'type' => 'colorpicker-opacity',
                'condition' => 'crypterium_error_hero_display:is(on)',
                'section' => 'error_page'
            ),
            array(
                'id' => 'crypterium_error_header_bgheight',
                'label' => esc_html__('404 page hero section height', 'crypterium' ),
                'desc' => esc_html__('404 page hero section height', 'crypterium' ),
                'std' => '100',
                'type' => 'numeric-slider',
                'min_max_step'=> '0,100',
                'section' => 'error_page',
                'condition' => 'crypterium_error_hero_display:is(on)',
                'operator' => 'and'
            ),
            array(
                'id' => 'crypterium_error_h_p',
                'label' => esc_html__( '404 page hero section padding', 'crypterium' ),
                'desc' => esc_html__( '404 page hero section padding', 'crypterium' ),
                'type' => 'spacing',
                'condition' => 'crypterium_error_hero_display:is(on)',
                'section' => 'error_page',
            ),
            array(
                'id' => 'crypterium_error_h_m',
                'label' => esc_html__( '404 page hero section margin', 'crypterium' ),
                'desc' => esc_html__( '404 page hero section margin', 'crypterium' ),
                'type' => 'spacing',
                'condition' => 'crypterium_error_hero_display:is(on)',
                'section' => 'error_page',
            ),
            //404 heading
            array(
                'id' => 'crypterium_error_heading_tab',
                'label' =>  esc_html__( '404 Heading', 'crypterium' ),
                'type' => 'tab',
                'section' => 'error_page',
            ),
            array(
                'id' => 'crypterium_error_heading_display',
                'label' => esc_html__( '404 page heading display', 'crypterium' ),
                'desc' => sprintf( esc_html__( 'Please select 404 page heading display %s or %s.', 'crypterium' ), '<code>on</code>', '<code>off</code>' ),
                'std' => 'on',
                'type' => 'on-off',
                'condition' => 'crypterium_error_hero_display:is(on)',
                'section' => 'error_page',
                'operator' => 'and'
            ),
            array(
                'id' => 'crypterium_error_heading_info',
                'label' => esc_html__( '404 page heading is off', 'crypterium' ),
                'type' => 'textblock-titled',
                'section' => 'error_page',
                'condition' => 'crypterium_error_heading_display:is(off)',
                'operator' => 'or'
            ),
            array(
                'id' => 'crypterium_error_heading',
                'label' => esc_html__( '404 page heading', 'crypterium' ),
                'desc' => esc_html__( 'Enter 404 page heading', 'crypterium' ),
                'type' => 'text',
                'condition' => 'crypterium_error_heading_display:is(on),crypterium_error_hero_display:is(on)',
                'section' => 'error_page'
            ),
            array(
                'id' => 'crypterium_error_heading_color',
                'label' => esc_html__( '404 page heading color ', 'crypterium' ),
                'desc' => esc_html__( 'Please select color', 'crypterium' ),
                'type' => 'colorpicker-opacity',
                'condition' => 'crypterium_error_heading_display:is(on),crypterium_error_hero_display:is(on)',
                'section' => 'error_page'
            ),
            array(
                'id' => 'crypterium_error_heading_fontsize',
                'label' => esc_html__('404 page heading font size', 'crypterium' ),
                'desc' => esc_html__('Enter 404 page heading font size', 'crypterium' ),
                'std' => '70',
                'type' => 'numeric-slider',
                'min_max_step'=> '0,200',
                'condition' => 'crypterium_error_heading_display:is(on),crypterium_error_hero_display:is(on)',
                'section' => 'error_page',
                'operator' => 'and'
            ),
            //404 slogan
            array(
                'id' => 'crypterium_error_slogan_tab',
                'label' =>  esc_html__( '404 Slogan', 'crypterium' ),
                'type' => 'tab',
                'section' => 'error_page',
            ),
            array(
                'id' => 'crypterium_error_slogan_display',
                'label' => esc_html__( '404 page slogan display', 'crypterium' ),
                'desc' => sprintf( esc_html__( 'Please select 404 page slogan display %s or %s.', 'crypterium' ), '<code>on</code>', '<code>off</code>' ),
                'std' => 'on',
                'type' => 'on-off',
                'condition' => 'crypterium_error_hero_display:is(on)',
                'section' => 'error_page',
                'operator' => 'and'
            ),
            array(
                'id' => 'crypterium_error_slogan_info',
                'label' => esc_html__( '404 page slogan is off', 'crypterium' ),
                'type' => 'textblock-titled',
                'section' => 'error_page',
                'condition' => 'crypterium_error_slogan_display:is(off)',
                'operator' => 'or'
            ),
            array(
                'id' => 'crypterium_error_slogan',
                'label' => esc_html__( '404 page slogan', 'crypterium' ),
                'desc' => esc_html__( 'Enter 404 page slogan', 'crypterium' ),
                'type' => 'text',
                'condition' => 'crypterium_error_slogan_display:is(on),crypterium_error_hero_display:is(on)',
                'section' => 'error_page'
            ),
            array(
                'id' => 'crypterium_error_slogan_color',
                'label' => esc_html__( '404 page slogan color ', 'crypterium' ),
                'desc' => esc_html__( 'Please select color', 'crypterium' ),
                'type' => 'colorpicker-opacity',
                'condition' => 'crypterium_error_slogan_display:is(on),crypterium_error_hero_display:is(on)',
                'section' => 'error_page'
            ),
            array(
                'id' => 'crypterium_error_slogan_fontsize',
                'label' => esc_html__('404 page slogan font size', 'crypterium' ),
                'desc' => esc_html__('Enter 404 page slogan font size', 'crypterium' ),
                'std' => '16',
                'type' => 'numeric-slider',
                'min_max_step'=> '0,100',
                'condition' => 'crypterium_error_slogan_display:is(on),crypterium_error_hero_display:is(on)',
                'section' => 'error_page',
                'operator' => 'and'
            ),
            //404 desc
            array(
                'id' => 'crypterium_error_desc_tab',
                'label' =>  esc_html__( '404 Description', 'crypterium' ),
                'type' => 'tab',
                'section' => 'error_page',
            ),
            array(
                'id' => 'crypterium_error_desc_display',
                'label' => esc_html__( '404 page description display', 'crypterium' ),
                'desc' => sprintf( esc_html__( 'Please select 404 page description display %s or %s.', 'crypterium' ), '<code>on</code>', '<code>off</code>' ),
                'std' => 'on',
                'type' => 'on-off',
                'condition' => 'crypterium_error_hero_display:is(on)',
                'section' => 'error_page',
                'operator' => 'and'
            ),
            array(
                'id' => 'crypterium_desc_info',
                'label' => esc_html__( '404 page description is off', 'crypterium' ),
                'type' => 'textblock-titled',
                'section' => 'error_page',
                'condition' => 'crypterium_error_desc_display:is(off)',
                'operator' => 'or'
            ),
            array(
                'id' => 'crypterium_error_desc',
                'label' => esc_html__( '404 page description', 'crypterium' ),
                'desc' => esc_html__( 'Enter 404 page description', 'crypterium' ),
                'type' => 'text',
                'condition' => 'crypterium_error_desc_display:is(on),crypterium_error_hero_display:is(on)',
                'section' => 'error_page'
            ),
            array(
                'id' => 'crypterium_error_desc_color',
                'label' => esc_html__( '404 page description color ', 'crypterium' ),
                'desc' => esc_html__( 'Please select color', 'crypterium' ),
                'type' => 'colorpicker-opacity',
                'condition' => 'crypterium_error_desc_display:is(on),crypterium_error_hero_display:is(on)',
                'section' => 'error_page'
            ),
            array(
                'id' => 'crypterium_error_desc_fontsize',
                'label' => esc_html__('404 page description font size', 'crypterium' ),
                'desc' => esc_html__('Enter 404 page description font size', 'crypterium' ),
                'std' => '16',
                'type' => 'numeric-slider',
                'min_max_step'=> '0,100',
                'condition' => 'crypterium_error_desc_display:is(on),crypterium_error_hero_display:is(on)',
                'section' => 'error_page',
                'operator' => 'and'
            ),
            //404 page hero button settings
            array(
                'id' => 'crypterium_error_herobutton_tab',
                'label' => esc_html__( '404 Button', 'crypterium' ),
                'type' => 'tab',
                'section' => 'error_page',
            ),
            array(
                'id' => 'crypterium_error_hero_btn_display',
                'label' => esc_html__( '404 page button display', 'crypterium' ),
                'desc' => sprintf( esc_html__( 'Please select 404 page button display %s or %s.', 'crypterium' ), '<code>on</code>', '<code>off</code>' ),
                'std' => 'off',
                'type' => 'on-off',
                'condition' => 'crypterium_error_hero_display:is(on)',
                'section' => 'error_page',
                'operator' => 'and'
            ),
            array(
                'id' => 'crypterium_error_hero_btn',
                'label' => esc_html__( '404 page button title', 'crypterium' ),
                'desc' => esc_html__( 'Enter 404 page button title', 'crypterium' ),
                'type' => 'text',
                'condition' => 'crypterium_error_hero_display:is(on),crypterium_error_hero_btn_display:is(on)',
                'section' => 'error_page'
            ),
            array(
                'id' => 'crypterium_error_hero_btn_url',
                'label' => esc_html__( '404 page button URL', 'crypterium' ),
                'desc' => esc_html__( 'Enter 404 page button URL', 'crypterium' ),
                'type' => 'text',
                'condition' => 'crypterium_error_hero_display:is(on),crypterium_error_hero_btn_display:is(on)',
                'section' => 'error_page'
            ),
            array(
                'id' => 'crypterium_error_btn_color',
                'label' => esc_html__( '404 page button color ', 'crypterium' ),
                'desc' => esc_html__( 'Please select color', 'crypterium' ),
                'type' => 'colorpicker-opacity',
                'condition' => 'crypterium_error_hero_display:is(on),crypterium_error_hero_btn_display:is(on)',
                'section' => 'error_page'
            ),
            array(
                'id' => 'crypterium_error_btn_bgcolor',
                'label' => esc_html__( '404 page button bg color', 'crypterium' ),
                'desc' => esc_html__( 'Please select color', 'crypterium' ),
                'type' => 'colorpicker-opacity',
                'condition' => 'crypterium_error_hero_display:is(on),crypterium_error_hero_btn_display:is(on)',
                'section' => 'error_page'
            ),
            //404 page breadcrumb
            array(
                'id' => 'crypterium_error_bred_tab',
                'label' => esc_html__( '404 Breadcrubms', 'crypterium' ),
                'type' => 'tab',
                'section' => 'error_page',
            ),
            array(
                'id' => 'crypterium_error_bread',
                'label' => esc_html__( '404 page breadcrubms display', 'crypterium' ),
                'desc' => sprintf( esc_html__( 'Breadcrubms display %s or %s.', 'crypterium' ), '<code>on</code>', '<code>off</code>' ),
                'std' => 'on',
                'type' => 'on-off',
                'condition' => 'crypterium_error_hero_display:is(on)',
                'section' => 'error_page',
                'operator' => 'and'
            ),
            array(
                'id' => 'crypterium_error_breadcrubms_color',
                'label' => esc_html__( '404 page breadcrubms icon color ', 'crypterium' ),
                'desc' => esc_html__( 'Please select color', 'crypterium' ),
                'type' => 'colorpicker-opacity',
                'condition' => 'crypterium_error_hero_display:is(on),crypterium_error_bread:is(on)',
                'section' => 'error_page'
            ),
            array(
                'id' => 'crypterium_error_breadcrubms_currentcolor',
                'label' => esc_html__( '404 page breadcrubms text color ', 'crypterium' ),
                'desc' => esc_html__( 'Please select color', 'crypterium' ),
                'type' => 'colorpicker-opacity',
                'condition' => 'crypterium_error_hero_display:is(on),crypterium_error_bread:is(on)',
                'section' => 'error_page'
            ),
            array(
                'id' => 'crypterium_error_breadcrubms_hovercolor',
                'label' => esc_html__( '404 page breadcrubms hover color ', 'crypterium' ),
                'desc' => esc_html__( 'Please select color', 'crypterium' ),
                'type' => 'colorpicker-opacity',
                'condition' => 'crypterium_error_hero_display:is(on),crypterium_error_bread:is(on)',
                'section' => 'error_page'
            ),
            array(
                'id' => 'crypterium_error_breadcrubms_font_size',
                'label' => esc_html__('404 page breadcrubms font size', 'crypterium' ),
                'desc' => esc_html__('Enter breadcrubms font size', 'crypterium' ),
                'type' => 'numeric-slider',
                'std'			  => '11',
                'min_max_step'=> '0,100',
                'condition' => 'crypterium_error_hero_display:is(on),crypterium_error_bread:is(on)',
                'section' => 'error_page',
                'operator' => 'and'
            ),
            //404 page general setting
            array(
                'id' => 'crypterium_error_generalsetting_tab',
                'label' => esc_html__( '404 General Settings', 'crypterium' ),
                'type' => 'tab',
                'section' => 'error_page',
            ),
            array(
                'id' => 'crypterium_error_hero_align',
                'label' => esc_html__( '404 page hero align', 'crypterium' ),
                'desc' => esc_html__( 'Select 404 page hero align. Default :left.' , 'crypterium' ),
                'std' => 'center',
                'type' => 'select',
                'condition' => 'crypterium_error_hero_display:is(on)',
                'section' => 'error_page',
                'operator' => 'and',
                'choices' => array(
                    array(
                        'value' => 'left',
                        'label' => esc_html__( 'Left', 'crypterium' )
                    ),
                    array(
                        'value' => 'center',
                        'label' => esc_html__( 'Center', 'crypterium' )
                    ),
                    array(
                        'value' => 'right',
                        'label' => esc_html__( 'Right', 'crypterium' )
                    ),
                )
            ),
            array(
                'id' => 'crypterium_error_overlay_setting',
                'label' => esc_html__( '404 page overlay display', 'crypterium' ),
                'desc' => sprintf( esc_html__( 'Overlay display %s or %s.', 'crypterium' ), '<code>on</code>', '<code>off</code>' ),
                'std' => 'on',
                'type' => 'on-off',
                'condition' => 'crypterium_error_hero_display:is(on)',
                'section' => 'error_page',
                'operator' => 'and'
            ),
            array(
                'id' => 'crypterium_error_hero_overlay',
                'label' => esc_html__( '404 page overlay color ', 'crypterium' ),
                'desc' => esc_html__( 'Please select color', 'crypterium' ),
                'condition' => 'crypterium_error_hero_display:is(on),crypterium_error_overlay_setting:is(on)',
                'type' => 'colorpicker-opacity',
                'section' => 'error_page'
            ),

            /*************************************************
            ## SEARCH PAGE HERO SETTINGS.
            *************************************************/

            array(
                'id' => 'crypterium_search_hero_tab',
                'label' =>  esc_html__( 'Search Hero', 'crypterium' ),
                'type' => 'tab',
                'section' => 'search_page',
            ),
            array(
                'id' => 'crypterium_search_hero_display',
                'label' => esc_html__( 'Search page hero section display', 'crypterium' ),
                'desc' => sprintf( esc_html__( 'Please select search page hero section display %s or %s.', 'crypterium' ), '<code>on</code>', '<code>off</code>' ),
                'std' => 'on',
                'type' => 'on-off',
                'section' => 'search_page',
                'operator' => 'and'
            ),
            array(
                'id' => 'crypterium_search_hero_info',
                'label' => esc_html__( 'Search page hero section is off', 'crypterium' ),
                'type' => 'textblock-titled',
                'section' => 'search_page',
                'condition' => 'crypterium_search_hero_display:is(off)',
                'operator' => 'or'
            ),
            array(
                'id' => 'crypterium_search_hero_bg',
                'label' =>  esc_html__( 'Search page hero section background image', 'crypterium' ),
                'desc' =>  esc_html__( 'You can upload your image for header', 'crypterium' ),
                'type' => 'upload',
                'section' => 'search_page',
                'condition' => 'crypterium_search_hero_display:is(on)',
                'operator' => 'and'
            ),
            array(
                'id' => 'crypterium_search_header_bgcolor',
                'label' => esc_html__( 'Search page hero section background color', 'crypterium' ),
                'desc' => esc_html__( 'Please select color', 'crypterium' ),
                'type' => 'colorpicker-opacity',
                'condition' => 'crypterium_search_hero_display:is(on)',
                'section' => 'search_page'
            ),
            array(
                'id' => 'crypterium_search_header_bgheight',
                'label' => esc_html__('Search page hero section height', 'crypterium' ),
                'desc' => esc_html__('Search page hero section height', 'crypterium' ),
                'std' => '55',
                'type' => 'numeric-slider',
                'min_max_step'=> '0,100',
                'section' => 'search_page',
                'condition' => 'crypterium_search_hero_display:is(on)',
                'operator' => 'and'
            ),
            array(
                'id' => 'crypterium_search_h_p',
                'label' => esc_html__( 'Search page hero section padding', 'crypterium' ),
                'desc' => esc_html__( 'Search page hero section padding', 'crypterium' ),
                'type' => 'spacing',
                'condition' => 'crypterium_search_hero_display:is(on)',
                'section' => 'search_page',
            ),
            array(
                'id' => 'crypterium_search_h_m',
                'label' => esc_html__( 'Search page hero section margin', 'crypterium' ),
                'desc' => esc_html__( 'Search page hero section margin', 'crypterium' ),
                'type' => 'spacing',
                'condition' => 'crypterium_search_hero_display:is(on)',
                'section' => 'search_page',
            ),
            //Search heading
            array(
                'id' => 'crypterium_search_heading_tab',
                'label' =>  esc_html__( 'Search Heading', 'crypterium' ),
                'type' => 'tab',
                'section' => 'search_page',
            ),
            array(
                'id' => 'crypterium_search_heading_display',
                'label' => esc_html__( 'Search page heading display', 'crypterium' ),
                'desc' => sprintf( esc_html__( 'Please select search page heading display %s or %s.', 'crypterium' ), '<code>on</code>', '<code>off</code>' ),
                'std' => 'on',
                'type' => 'on-off',
                'condition' => 'crypterium_search_hero_display:is(on)',
                'section' => 'search_page',
                'operator' => 'and'
            ),
            array(
                'id' => 'crypterium_search_heading_info',
                'label' => esc_html__( 'Search page heading is off', 'crypterium' ),
                'type' => 'textblock-titled',
                'section' => 'search_page',
                'condition' => 'crypterium_search_heading_display:is(off)',
                'operator' => 'or'
            ),
            array(
                'id' => 'crypterium_search_heading',
                'label' => esc_html__( 'Search page heading', 'crypterium' ),
                'desc' => esc_html__( 'Enter search page heading', 'crypterium' ),
                'type' => 'text',
                'condition' => 'crypterium_search_heading_display:is(on),crypterium_search_hero_display:is(on)',
                'section' => 'search_page'
            ),
            array(
                'id' => 'crypterium_search_heading_color',
                'label' => esc_html__( 'Search page heading color ', 'crypterium' ),
                'desc' => esc_html__( 'Please select color', 'crypterium' ),
                'type' => 'colorpicker-opacity',
                'condition' => 'crypterium_search_heading_display:is(on),crypterium_search_hero_display:is(on)',
                'section' => 'search_page'
            ),
            array(
                'id' => 'crypterium_search_heading_fontsize',
                'label' => esc_html__('Search page heading font size', 'crypterium' ),
                'desc' => esc_html__('Enter search page heading font size', 'crypterium' ),
                'std' => '70',
                'type' => 'numeric-slider',
                'min_max_step'=> '0,200',
                'condition' => 'crypterium_search_heading_display:is(on),crypterium_search_hero_display:is(on)',
                'section' => 'search_page',
                'operator' => 'and'
            ),
            //Search slogan
            array(
                'id' => 'crypterium_search_slogan_tab',
                'label' =>  esc_html__( 'Search Slogan', 'crypterium' ),
                'type' => 'tab',
                'section' => 'search_page',
            ),
            array(
                'id' => 'crypterium_search_slogan_display',
                'label' => esc_html__( 'Search page slogan display', 'crypterium' ),
                'desc' => sprintf( esc_html__( 'Please select search page slogan display %s or %s.', 'crypterium' ), '<code>on</code>', '<code>off</code>' ),
                'std' => 'on',
                'type' => 'on-off',
                'condition' => 'crypterium_search_hero_display:is(on)',
                'section' => 'search_page',
                'operator' => 'and'
            ),
            array(
                'id' => 'crypterium_search_slogan_info',
                'label' => esc_html__( 'Search page slogan is off', 'crypterium' ),
                'type' => 'textblock-titled',
                'section' => 'search_page',
                'condition' => 'crypterium_search_slogan_display:is(off)',
                'operator' => 'or'
            ),
            array(
                'id' => 'crypterium_search_slogan',
                'label' => esc_html__( 'Search page slogan', 'crypterium' ),
                'desc' => esc_html__( 'Enter dearch page slogan', 'crypterium' ),
                'type' => 'text',
                'condition' => 'crypterium_search_slogan_display:is(on),crypterium_search_hero_display:is(on)',
                'section' => 'search_page'
            ),
            array(
                'id' => 'crypterium_search_slogan_color',
                'label' => esc_html__( 'Search page slogan color ', 'crypterium' ),
                'desc' => esc_html__( 'Please select color', 'crypterium' ),
                'type' => 'colorpicker-opacity',
                'condition' => 'crypterium_search_slogan_display:is(on),crypterium_search_hero_display:is(on)',
                'section' => 'search_page'
            ),
            array(
                'id' => 'crypterium_search_slogan_fontsize',
                'label' => esc_html__('Search page slogan font size', 'crypterium' ),
                'desc' => esc_html__('Enter search page slogan font size', 'crypterium' ),
                'std' => '16',
                'type' => 'numeric-slider',
                'min_max_step'=> '0,100',
                'condition' => 'crypterium_search_slogan_display:is(on),crypterium_search_hero_display:is(on)',
                'section' => 'search_page',
                'operator' => 'and'
            ),
            //Search desc
            array(
                'id' => 'crypterium_search_desc_tab',
                'label' =>  esc_html__( 'Search Description', 'crypterium' ),
                'type' => 'tab',
                'section' => 'search_page',
            ),
            array(
                'id' => 'crypterium_search_desc_display',
                'label' => esc_html__( 'Search page description display', 'crypterium' ),
                'desc' => sprintf( esc_html__( 'Please select search page description display %s or %s.', 'crypterium' ), '<code>on</code>', '<code>off</code>' ),
                'std' => 'on',
                'type' => 'on-off',
                'condition' => 'crypterium_search_hero_display:is(on)',
                'section' => 'search_page',
                'operator' => 'and'
            ),
            array(
                'id' => 'crypterium_desc_info',
                'label' => esc_html__( 'Search page description is off', 'crypterium' ),
                'type' => 'textblock-titled',
                'section' => 'search_page',
                'condition' => 'crypterium_search_desc_display:is(off)',
                'operator' => 'or'
            ),
            array(
                'id' => 'crypterium_search_desc',
                'label' => esc_html__( 'Search page description', 'crypterium' ),
                'desc' => esc_html__( 'Enter search page description', 'crypterium' ),
                'type' => 'text',
                'condition' => 'crypterium_search_desc_display:is(on),crypterium_search_hero_display:is(on)',
                'section' => 'search_page'
            ),
            array(
                'id' => 'crypterium_search_desc_color',
                'label' => esc_html__( 'Search page description color ', 'crypterium' ),
                'desc' => esc_html__( 'Please select color', 'crypterium' ),
                'type' => 'colorpicker-opacity',
                'condition' => 'crypterium_search_desc_display:is(on),crypterium_search_hero_display:is(on)',
                'section' => 'search_page'
            ),
            array(
                'id' => 'crypterium_search_desc_fontsize',
                'label' => esc_html__('Search page description font size', 'crypterium' ),
                'desc' => esc_html__('Enter search page description font size', 'crypterium' ),
                'std' => '16',
                'type' => 'numeric-slider',
                'min_max_step'=> '0,100',
                'condition' => 'crypterium_search_desc_display:is(on),crypterium_search_hero_display:is(on)',
                'section' => 'search_page',
                'operator' => 'and'
            ),
            //Search page hero button settings
            array(
                'id' => 'crypterium_search_herobutton_tab',
                'label' => esc_html__( 'Search Button', 'crypterium' ),
                'type' => 'tab',
                'section' => 'search_page',
            ),
            array(
                'id' => 'crypterium_search_hero_btn_display',
                'label' => esc_html__( 'Search page button display', 'crypterium' ),
                'desc' => sprintf( esc_html__( 'Please select search page button display %s or %s.', 'crypterium' ), '<code>on</code>', '<code>off</code>' ),
                'std' => 'off',
                'type' => 'on-off',
                'condition' => 'crypterium_search_hero_display:is(on)',
                'section' => 'search_page',
                'operator' => 'and'
            ),
            array(
                'id' => 'crypterium_search_hero_btn',
                'label' => esc_html__( 'Search page button title', 'crypterium' ),
                'desc' => esc_html__( 'Enter search page button title', 'crypterium' ),
                'type' => 'text',
                'condition' => 'crypterium_search_hero_display:is(on),crypterium_search_hero_btn_display:is(on)',
                'section' => 'search_page'
            ),
            array(
                'id' => 'crypterium_search_hero_btn_url',
                'label' => esc_html__( 'Search page button URL', 'crypterium' ),
                'desc' => esc_html__( 'Enter search page button URL', 'crypterium' ),
                'type' => 'text',
                'condition' => 'crypterium_search_hero_display:is(on),crypterium_search_hero_btn_display:is(on)',
                'section' => 'search_page'
            ),
            array(
                'id' => 'crypterium_search_btn_color',
                'label' => esc_html__( 'Search page button color ', 'crypterium' ),
                'desc' => esc_html__( 'Please select color', 'crypterium' ),
                'type' => 'colorpicker-opacity',
                'condition' => 'crypterium_search_hero_display:is(on),crypterium_search_hero_btn_display:is(on)',
                'section' => 'search_page'
            ),
            array(
                'id' => 'crypterium_search_btn_bgcolor',
                'label' => esc_html__( 'Search page button bg color', 'crypterium' ),
                'desc' => esc_html__( 'Please select color', 'crypterium' ),
                'type' => 'colorpicker-opacity',
                'condition' => 'crypterium_search_hero_display:is(on),crypterium_search_hero_btn_display:is(on)',
                'section' => 'search_page'
            ),
            //Search page breadcrumb
            array(
                'id' => 'crypterium_search_bred_tab',
                'label' => esc_html__( 'Search Breadcrubms', 'crypterium' ),
                'type' => 'tab',
                'section' => 'search_page',
            ),
            array(
                'id' => 'crypterium_search_bread',
                'label' => esc_html__( 'Search page breadcrubms display', 'crypterium' ),
                'desc' => sprintf( esc_html__( 'Breadcrubms display %s or %s.', 'crypterium' ), '<code>on</code>', '<code>off</code>' ),
                'std' => 'on',
                'type' => 'on-off',
                'condition' => 'crypterium_search_hero_display:is(on)',
                'section' => 'search_page',
                'operator' => 'and'
            ),
            array(
                'id' => 'crypterium_search_breadcrubms_color',
                'label' => esc_html__( 'Search page breadcrubms icon color ', 'crypterium' ),
                'desc' => esc_html__( 'Please select color', 'crypterium' ),
                'type' => 'colorpicker-opacity',
                'condition' => 'crypterium_search_hero_display:is(on),crypterium_search_bread:is(on)',
                'section' => 'search_page'
            ),
            array(
                'id' => 'crypterium_search_breadcrubms_currentcolor',
                'label' => esc_html__( 'Search page breadcrubms text color ', 'crypterium' ),
                'desc' => esc_html__( 'Please select color', 'crypterium' ),
                'type' => 'colorpicker-opacity',
                'condition' => 'crypterium_search_hero_display:is(on),crypterium_search_bread:is(on)',
                'section' => 'search_page'
            ),
            array(
                'id' => 'crypterium_search_breadcrubms_hovercolor',
                'label' => esc_html__( 'Search page breadcrubms hover color ', 'crypterium' ),
                'desc' => esc_html__( 'Please select color', 'crypterium' ),
                'type' => 'colorpicker-opacity',
                'condition' => 'crypterium_search_hero_display:is(on),crypterium_search_bread:is(on)',
                'section' => 'search_page'
            ),
            array(
                'id' => 'crypterium_search_breadcrubms_font_size',
                'label' => esc_html__('Search page breadcrubms font size', 'crypterium' ),
                'desc' => esc_html__('Enter breadcrubms font size', 'crypterium' ),
                'type' => 'numeric-slider',
                'std'			  => '11',
                'min_max_step'=> '0,100',
                'condition' => 'crypterium_search_hero_display:is(on),crypterium_search_bread:is(on)',
                'section' => 'search_page',
                'operator' => 'and'
            ),
            //Search page general setting
            array(
                'id' => 'crypterium_search_generalsetting_tab',
                'label' => esc_html__( 'Search General Settings', 'crypterium' ),
                'type' => 'tab',
                'section' => 'search_page',
            ),
            array(
                'id' => 'crypterium_search_hero_align',
                'label' => esc_html__( 'Search page hero align', 'crypterium' ),
                'desc' => esc_html__( 'Select search page hero align. Default :left.' , 'crypterium' ),
                'std' => 'center',
                'type' => 'select',
                'condition' => 'crypterium_search_hero_display:is(on)',
                'section' => 'search_page',
                'operator' => 'and',
                'choices' => array(
                    array(
                        'value' => 'left',
                        'label' => esc_html__( 'Left', 'crypterium' )
                    ),
                    array(
                        'value' => 'center',
                        'label' => esc_html__( 'Center', 'crypterium' )
                    ),
                    array(
                        'value' => 'right',
                        'label' => esc_html__( 'Right', 'crypterium' )
                    ),
                )
            ),
            array(
                'id' => 'crypterium_search_overlay_setting',
                'label' => esc_html__( 'Search page overlay display', 'crypterium' ),
                'desc' => sprintf( esc_html__( 'Overlay display %s or %s.', 'crypterium' ), '<code>on</code>', '<code>off</code>' ),
                'std' => 'on',
                'type' => 'on-off',
                'condition' => 'crypterium_search_hero_display:is(on)',
                'section' => 'search_page',
                'operator' => 'and'
            ),
            array(
                'id' => 'crypterium_search_hero_overlay',
                'label' => esc_html__( 'Search page overlay color ', 'crypterium' ),
                'desc' => esc_html__( 'Please select color', 'crypterium' ),
                'condition' => 'crypterium_search_hero_display:is(on),crypterium_search_overlay_setting:is(on)',
                'type' => 'colorpicker-opacity',
                'section' => 'search_page'
            ),

            /*************************************************
            ## WIDGETIZE FOOTER SETTINGS.
            *************************************************/
            array(
                'id' => 'crypterium_footer_general',
                'label' => esc_html__( 'Footer General', 'crypterium' ),
                'type' => 'tab',
                'section' => 'footer'
            ),
            array(
                'id' => 'crypterium_footer_template_type',
                'label' => esc_html__( 'Footer Template Type ( New )', 'crypterium' ),
                'std' => 'default',
                'type' => 'select',
                'section' => 'footer_widgetize',
                'operator' => 'and',
                'choices' =>  array(
                    array(
                        'value' => 'default',
                        'label' => esc_html__( 'Default', 'crypterium' )
                    ),
                    array(
                        'value' => 'page',
                        'label' => esc_html__( 'Page Content', 'crypterium' )
                    ),
                    array(
                        'value' => 'custom',
                        'label' => esc_html__( 'Shortcode or Custom HTML', 'crypterium' )
                    ),
                )
            ),
            array(
                'id' => 'crypterium_footer_custom_template',
                'label' => esc_html__( 'Custom Page Content', 'crypterium' ),
                'desc' => esc_html__( 'You can use your custom page instead of the default footer template.', 'crypterium' ),
                'type' => 'page-select',
                'section' => 'footer_widgetize',
                'condition' => 'crypterium_footer_template_type:is(page)',
                'operator' => 'and'
            ),
            array(
                'id' => 'crypterium_footer_custom_html',
                'label' => esc_html__( 'Custom HTML or Shortcode', 'crypterium' ),
                'desc' => esc_html__( 'Copy paste your shortcode here.', 'crypterium' ),
                'type' => 'textarea',
                'section' => 'footer_widgetize',
                'condition' => 'crypterium_footer_template_type:is(custom)',
                'operator' => 'and'
            ),
            array(
                'id' => 'crypterium_footer_widgetize',
                'label' => esc_html__( 'Footer Widget Area', 'crypterium' ),
                'type' => 'tab',
                'section' => 'footer_widgetize'
            ),
            array(
                'id' => 'crypterium_widgetize_footer',
                'label' => esc_html__( 'Footer widgetize area section', 'crypterium' ),
                'desc' => sprintf( esc_html__( 'Choose footer widgetize section %s or %s.', 'crypterium' ), '<code>on</code>', '<code>off</code>' ),
                'std' => 'off',
                'type' => 'on-off',
                'section' => 'footer_widgetize',
                'condition' => 'crypterium_footer_template_type:is(default)',
                'operator' => 'and'
            ),
            array(
                'id' => 'crypterium_widgetize_footer_info',
                'label' => esc_html__( 'Footer widgetize area section is off', 'crypterium' ),
                'type' => 'textblock-titled',
                'section' => 'footer_widgetize',
                'condition' => 'crypterium_footer_template_type:is(default),crypterium_widgetize_footer:is(off)',
                'operator' => 'or'
            ),
            array(
                'id' => 'crypterium_fw_bg_c',
                'label' => esc_html__( 'Footer widgetize background color ', 'crypterium' ),
                'desc' => esc_html__( 'Please select color', 'crypterium' ),
                'type' => 'colorpicker-opacity',
                'condition' => 'crypterium_footer_template_type:is(default),crypterium_widgetize_footer:is(on)',
                'section' => 'footer_widgetize'
            ),
            array(
                'id' => 'crypterium_fw_h_c',
                'label' => esc_html__( 'Footer widget heading color ', 'crypterium' ),
                'desc' => esc_html__( 'Please select color', 'crypterium' ),
                'type' => 'colorpicker-opacity',
                'condition' => 'crypterium_footer_template_type:is(default),crypterium_widgetize_footer:is(on)',
                'section' => 'footer_widgetize'
            ),
            array(
                'id' => 'crypterium_fw_t_c',
                'label' => esc_html__( 'Footer general text color ', 'crypterium' ),
                'desc' => esc_html__( 'Please select color', 'crypterium' ),
                'type' => 'colorpicker-opacity',
                'condition' => 'crypterium_footer_template_type:is(default),crypterium_widgetize_footer:is(on)',
                'section' => 'footer_widgetize'
            ),
            array(
                'id' => 'crypterium_fw_a_c',
                'label' => esc_html__( 'Footer general a(link/URL) color ', 'crypterium' ),
                'desc' => esc_html__( 'Please select color', 'crypterium' ),
                'type' => 'colorpicker-opacity',
                'condition' => 'crypterium_footer_template_type:is(default),crypterium_widgetize_footer:is(on)',
                'section' => 'footer_widgetize'
            ),
            array(
                'id' => 'crypterium_fw_a_hc',
                'label' => esc_html__( 'Footer general a(link/URL) hover color ', 'crypterium' ),
                'desc' => esc_html__( 'Please select color', 'crypterium' ),
                'type' => 'colorpicker-opacity',
                'condition' => 'crypterium_footer_template_type:is(default),crypterium_widgetize_footer:is(on)',
                'section' => 'footer_widgetize'
            ),
            array(
                'id' => 'crypterium_fw_padding',
                'label' => esc_html__( 'Footer widgetize padding', 'crypterium' ),
                'desc' => esc_html__( 'please add footer widgetize padding.', 'crypterium' ),
                'type' => 'spacing',
                'condition' => 'crypterium_footer_template_type:is(default),crypterium_widgetize_footer:is(on)',
                'section' => 'footer_widgetize',
            ),
            array(
                'id' => 'crypterium_fw_margin',
                'label' => esc_html__( 'Footer widgetize margin', 'crypterium' ),
                'desc' => esc_html__( 'please add footer widgetize margin.', 'crypterium' ),
                'type' => 'spacing',
                'condition' => 'crypterium_footer_template_type:is(default),crypterium_widgetize_footer:is(on)',
                'section' => 'footer_widgetize',
            ),
            array(
                'id' => 'crypterium_footer_widget_settings',
                'label' => esc_html__( 'Widget Settings', 'crypterium' ),
                'type' => 'tab',
                'section' => 'footer_widgetize'
            ),
            array(
                'id' => 'crypterium_footer_widget1_display',
                'label' => esc_html__( 'Footer Widget 1 display', 'crypterium' ),
                'desc' => sprintf( esc_html__( 'Footer widget 1 display %s or %s.', 'crypterium' ), '<code>on</code>', '<code>off</code>' ),
                'std' => 'on',
                'type' => 'on-off',
                'condition' => 'crypterium_footer_template_type:is(default)',
                'section' => 'footer_widgetize',
            ),
            array(
                'id' => 'crypterium_footer_widget1_column',
                'label' => esc_html__( 'Footer Widget 1 column', 'crypterium' ),
                'desc' => esc_html__( 'Select footer widget 1 column. Default :Column 3' , 'crypterium' ),
                'type' => 'select',
                'std' => '4',
                'section' => 'footer_widgetize',
                'condition' => 'crypterium_footer_template_type:is(default),crypterium_footer_widget1_display:is(on)',
                'operator' => 'and',
                'choices' => array(
                    array(
                        'value' => '3',
                        'label' => esc_html__( 'Column 3', 'crypterium' )
                    ),
                    array(
                        'value' => '4',
                        'label' => esc_html__( 'Column 4', 'crypterium' )
                    ),
                    array(
                        'value' => '5',
                        'label' => esc_html__( 'Column 5', 'crypterium' )
                    ),
                    array(
                        'value' => '6',
                        'label' => esc_html__( 'Column 6', 'crypterium' )
                    ),
                    array(
                        'value' => '7',
                        'label' => esc_html__( 'Column 7', 'crypterium' )
                    ),
                    array(
                        'value' => '8',
                        'label' => esc_html__( 'Column 8', 'crypterium' )
                    ),
                    array(
                        'value' => '9',
                        'label' => esc_html__( 'Column 9', 'crypterium' )
                    ),
                    array(
                        'value' => '10',
                        'label' => esc_html__( 'Column 10', 'crypterium' )
                    ),
                    array(
                        'value' => '11',
                        'label' => esc_html__( 'Column 11', 'crypterium' )
                    ),
                    array(
                        'value' => '12',
                        'label' => esc_html__( 'Column 12', 'crypterium' )
                    ),
                )
            ),
            array(
                'id' => 'crypterium_footer_widget2_display',
                'label' => esc_html__( 'Footer Widget 2 display', 'crypterium' ),
                'desc' => sprintf( esc_html__( 'Footer widget 2 display %s or %s.', 'crypterium' ), '<code>on</code>', '<code>off</code>' ),
                'std' => 'on',
                'type' => 'on-off',
                'section' => 'footer_widgetize',
                'condition' => 'crypterium_footer_template_type:is(default)',
                'operator' => 'and',
            ),
            array(
                'id' => 'crypterium_footer_widget2_column',
                'label' => esc_html__( 'Footer Widget 2 column', 'crypterium' ),
                'desc' => esc_html__( 'Select footer widget 2 column. Default :Column 3' , 'crypterium' ),
                'type' => 'select',
                'std' => '3',
                'section' => 'footer_widgetize',
                'condition' => 'crypterium_footer_template_type:is(default),crypterium_footer_widget2_display:is(on)',
                'operator' => 'and',
                'choices' => array(
                    array(
                        'value' => '3',
                        'label' => esc_html__( 'Column 3', 'crypterium' )
                    ),
                    array(
                        'value' => '4',
                        'label' => esc_html__( 'Column 4', 'crypterium' )
                    ),
                    array(
                        'value' => '5',
                        'label' => esc_html__( 'Column 5', 'crypterium' )
                    ),
                    array(
                        'value' => '6',
                        'label' => esc_html__( 'Column 6', 'crypterium' )
                    ),
                    array(
                        'value' => '7',
                        'label' => esc_html__( 'Column 7', 'crypterium' )
                    ),
                    array(
                        'value' => '8',
                        'label' => esc_html__( 'Column 8', 'crypterium' )
                    ),
                    array(
                        'value' => '9',
                        'label' => esc_html__( 'Column 9', 'crypterium' )
                    ),
                    array(
                        'value' => '10',
                        'label' => esc_html__( 'Column 10', 'crypterium' )
                    ),
                    array(
                        'value' => '11',
                        'label' => esc_html__( 'Column 11', 'crypterium' )
                    ),
                    array(
                        'value' => '12',
                        'label' => esc_html__( 'Column 12', 'crypterium' )
                    ),
                )
            ),
            array(
                'id' => 'crypterium_footer_widget3_display',
                'label' => esc_html__( 'Footer Widget 3 display', 'crypterium' ),
                'desc' => sprintf( esc_html__( 'Footer widget 3 display %s or %s.', 'crypterium' ), '<code>on</code>', '<code>off</code>' ),
                'std' => 'on',
                'type' => 'on-off',
                'section' => 'footer_widgetize',
                'condition' => 'crypterium_footer_template_type:is(default)',
                'operator' => 'and',
            ),
            array(
                'id' => 'crypterium_footer_widget3_column',
                'label' => esc_html__( 'Footer Widget 3 column', 'crypterium' ),
                'desc' => esc_html__( 'Select footer widget 3 column. Default :Column 3' , 'crypterium' ),
                'type' => 'select',
                'std' => '5',
                'section' => 'footer_widgetize',
                'condition' => 'crypterium_footer_template_type:is(default),crypterium_footer_widget3_display:is(on)',
                'operator' => 'and',
                'choices' => array(
                    array(
                        'value' => '3',
                        'label' => esc_html__( 'Column 3', 'crypterium' )
                    ),
                    array(
                        'value' => '4',
                        'label' => esc_html__( 'Column 4', 'crypterium' )
                    ),
                    array(
                        'value' => '5',
                        'label' => esc_html__( 'Column 5', 'crypterium' )
                    ),
                    array(
                        'value' => '6',
                        'label' => esc_html__( 'Column 6', 'crypterium' )
                    ),
                    array(
                        'value' => '7',
                        'label' => esc_html__( 'Column 7', 'crypterium' )
                    ),
                    array(
                        'value' => '8',
                        'label' => esc_html__( 'Column 8', 'crypterium' )
                    ),
                    array(
                        'value' => '9',
                        'label' => esc_html__( 'Column 9', 'crypterium' )
                    ),
                    array(
                        'value' => '10',
                        'label' => esc_html__( 'Column 10', 'crypterium' )
                    ),
                    array(
                        'value' => '11',
                        'label' => esc_html__( 'Column 11', 'crypterium' )
                    ),
                    array(
                        'value' => '12',
                        'label' => esc_html__( 'Column 12', 'crypterium' )
                    ),
                )
            ),
            array(
                'id' => 'crypterium_footer_widget4_display',
                'label' => esc_html__( 'Footer Widget 4 display', 'crypterium' ),
                'desc' => sprintf( esc_html__( 'Footer widget 4 display %s or %s.', 'crypterium' ), '<code>on</code>', '<code>off</code>' ),
                'std' => 'on',
                'type' => 'on-off',
                'section' => 'footer_widgetize',
                'condition' => 'crypterium_footer_template_type:is(default)',
                'operator' => 'and',
            ),
            array(
                'id' => 'crypterium_footer_widget4_column',
                'label' => esc_html__( 'Footer Widget 4 column', 'crypterium' ),
                'desc' => esc_html__( 'Select footer widget 4 column. Default :Column 3' , 'crypterium' ),
                'type' => 'select',
                'std' => '3',
                'section' => 'footer_widgetize',
                'condition' => 'crypterium_footer_template_type:is(default),crypterium_footer_widget4_display:is(on)',
                'operator' => 'and',
                'choices' => array(
                    array(
                        'value' => '3',
                        'label' => esc_html__( 'Column 3', 'crypterium' )
                    ),
                    array(
                        'value' => '4',
                        'label' => esc_html__( 'Column 4', 'crypterium' )
                    ),
                    array(
                        'value' => '5',
                        'label' => esc_html__( 'Column 5', 'crypterium' )
                    ),
                    array(
                        'value' => '6',
                        'label' => esc_html__( 'Column 6', 'crypterium' )
                    ),
                    array(
                        'value' => '7',
                        'label' => esc_html__( 'Column 7', 'crypterium' )
                    ),
                    array(
                        'value' => '8',
                        'label' => esc_html__( 'Column 8', 'crypterium' )
                    ),
                    array(
                        'value' => '9',
                        'label' => esc_html__( 'Column 9', 'crypterium' )
                    ),
                    array(
                        'value' => '10',
                        'label' => esc_html__( 'Column 10', 'crypterium' )
                    ),
                    array(
                        'value' => '11',
                        'label' => esc_html__( 'Column 11', 'crypterium' )
                    ),
                    array(
                        'value' => '12',
                        'label' => esc_html__( 'Column 12', 'crypterium' )
                    ),
                )
            ),
            // social_tab
            array(
                'id' => 'crypterium_social_tab',
                'label' => esc_html__( 'Social Icons', 'crypterium' ),
                'type' => 'tab',
                'section' => 'footer_widgetize'
            ),
            // footer_social_display
            array(
                'id' => 'crypterium_footer_social_display',
                'label' => esc_html__( 'Footer social display ', 'crypterium' ),
                'desc' => sprintf( esc_html__( 'Choose social section display %s or %s.', 'crypterium' ), '<code>on</code>', '<code>off</code>' ),
                'std' => 'on',
                'type' => 'on-off',
                'condition' => 'crypterium_footer_template_type:is(default),crypterium_footer_display:is(on)',
                'section' => 'footer_widgetize',
                'operator' => 'and'
            ),
            array(
                'id' => 'crypterium_footer_social',
                'label' => esc_html__( 'Footer Social Icons', 'crypterium' ),
                'desc' => esc_html__( 'Add social media icons', 'crypterium' ),
                'type' => 'list-item',
                'section' => 'footer_widgetize',
                'condition' => 'crypterium_footer_template_type:is(default),crypterium_footer_display:is(on),crypterium_footer_social_display:is(on)',
                'settings' => array(
                    array(
                        'id' => 'footer_social_text',
                        'label' => esc_html__( 'Social icon name', 'crypterium' ),
                        'desc' => esc_html__( 'Enter icon name. example : fa fa-facebook', 'crypterium' ),
                        'type' => 'text'
                    ),
                    array(
                        'id' => 'footer_social_link',
                        'label' => esc_html__( 'URL', 'crypterium' ),
                        'desc' => esc_html__( 'Enter a url for social media', 'crypterium' ),
                        'type' => 'text'
                    ),
                )
            ),
            array(
                'id' => 'crypterium_footer_social_target',
                'label' => esc_html__( 'Target social media', 'crypterium' ),
                'desc' => esc_html__( 'Select social media target type. Default : _blank' , 'crypterium' ),
                'std' => '_blank',
                'type' => 'select',
                'section' => 'footer_widgetize',
                'condition' => 'crypterium_footer_template_type:is(default),crypterium_footer_display:is(on),crypterium_footer_social_display:is(on)',
                'operator' => 'and',
                'choices' => array(
                    array(
                        'value' => '_blank',
                        'label' => esc_html__( '_blank', 'crypterium' )
                    ),
                    array(
                        'value' => '_self',
                        'label' => esc_html__( '_self', 'crypterium' )
                    ),
                    array(
                        'value' => '_parent',
                        'label' => esc_html__( '_parent', 'crypterium' )
                    ),
                    array(
                        'value' => '_top',
                        'label' => esc_html__( '_top', 'crypterium' )
                    ),
                )
            ),
            array(
                'id' => 'crypterium_footer_s_c',
                'label' => esc_html__( 'Footer social color ', 'crypterium' ),
                'desc' => esc_html__( 'Please select color', 'crypterium' ),
                'type' => 'colorpicker-opacity',
                'section' => 'footer_widgetize',
                'condition' => 'crypterium_footer_template_type:is(default),crypterium_footer_display:is(on),crypterium_footer_social_display:is(on)',
            ),
            array(
                'id' => 'crypterium_footer_s_hc',
                'label' => esc_html__( 'Footer social hover color ', 'crypterium' ),
                'desc' => esc_html__( 'Please select color', 'crypterium' ),
                'type' => 'colorpicker-opacity',
                'section' => 'footer_widgetize',
                'condition' => 'crypterium_footer_template_type:is(default),crypterium_footer_display:is(on),crypterium_footer_social_display:is(on)',
            ),
            array(
                'id' => 'crypterium_footer_s_fs',
                'label' => esc_html__('Footer social icon font-size', 'crypterium' ),
                'desc' => esc_html__('Enter footer social icon font-size.', 'crypterium' ),
                'type' => 'numeric-slider',
                'min_max_step'=> '0,100',
                'condition' => 'crypterium_footer_template_type:is(default),crypterium_footer_display:is(on),crypterium_footer_social_display:is(on)',
                'section' => 'footer_widgetize',
                'operator' => 'and'
            ),
            // footer_copyright
            array(
                'id' => 'crypterium_footer_copyright',
                'label' => esc_html__( 'Footer powered', 'crypterium' ),
                'type' => 'tab',
                'section' => 'footer_widgetize',
                'condition' => 'crypterium_footer_template_type:is(default),crypterium_footer_display:is(on)',
            ),
            //copyright_display
            array(
                'id' => 'crypterium_copyright_display',
                'label' => esc_html__( 'footer copyright section', 'crypterium' ),
                'desc' => sprintf( esc_html__( 'Choose footer copyright section %s or %s.', 'crypterium' ), '<code>on</code>', '<code>off</code>' ),
                'std' => 'on',
                'type' => 'on-off',
                'section' => 'footer_widgetize',
                'condition' => 'crypterium_footer_template_type:is(default),crypterium_footer_display:is(on)',
                'operator' => 'and'
            ),
            array(
                'id' => 'crypterium_copyright',
                'label' => 'Footer copyright',
                'std' => '2019 Crypterium. All Rights Reserved.',
                'type' => 'textarea',
                'condition' => 'crypterium_footer_template_type:is(default),crypterium_footer_display:is(on),crypterium_copyright_display:is(on)',
                'section' => 'footer_widgetize'
            ),

            array(
                'id' => 'crypterium_f_add_c',
                'label' => esc_html__( 'Footer copyright text color ', 'crypterium' ),
                'desc' => esc_html__( 'Please select color', 'crypterium' ),
                'type' => 'colorpicker-opacity',
                'section' => 'footer_widgetize',
                'condition' => 'crypterium_footer_template_type:is(default),crypterium_footer_display:is(on),crypterium_copyright_display:is(on)',
            ),

            /*************************************************
            ## GOOGLE FONTS SETTINGS.
            *************************************************/

            array(
                'id' => 'crypterium_body_google_fonts',
                'label' => esc_html__( 'Google Fonts', 'crypterium'  ),
                'desc' => esc_html__( 'Add Google Font and after the save settings follow these steps Dashbocrypterium > Appearance > Theme Options > Typography', 'crypterium' ),
                'type' => 'google-fonts',
                'section' => 'google_fonts',
                'operator' => 'and'
            ),

            /*************************************************
            ## TYPOGRAPHY  SETTINGS.
            *************************************************/

            array(
                'id' => 'crypterium_typgrph',
                'label' => esc_html__( 'Typography', 'crypterium' ),
                'desc' => esc_html__( 'The Typography option type is for adding typography styles to your site.', 'crypterium' ),
                'type' => 'typography',
                'section' => 'typography',
                'operator' => 'and'
            ),
            array(
                'id' => 'crypterium_typgrph1',
                'label' => esc_html__( 'Typography h1', 'crypterium' ),
                'desc' => esc_html__( 'The Typography option type is for adding typography styles to your site.', 'crypterium' ),
                'type' => 'typography',
                'section' => 'typography',
                'operator' => 'and'
            ),
            array(
                'id' => 'crypterium_typgrph2',
                'label' => esc_html__( 'Typography h2', 'crypterium' ),
                'desc' => esc_html__( 'The Typography option type is for adding typography styles to your site.', 'crypterium' ),
                'type' => 'typography',
                'section' => 'typography',
                'operator' => 'and'
            ),
            array(
                'id' => 'crypterium_typgrph3',
                'label' => esc_html__( 'Typography h3', 'crypterium' ),
                'desc' => esc_html__( 'The Typography option type is for adding typography styles to your site.', 'crypterium' ),
                'type' => 'typography',
                'section' => 'typography',
                'operator' => 'and'
            ),
            array(
                'id' => 'crypterium_typgrph4',
                'label' => esc_html__( 'Typography h4', 'crypterium' ),
                'desc' => esc_html__( 'The Typography option type is for adding typography styles to your site.', 'crypterium' ),
                'type' => 'typography',
                'section' => 'typography',
                'operator' => 'and'
            ),
            array(
                'id' => 'crypterium_typgrph5',
                'label' => esc_html__( 'Typography h5', 'crypterium' ),
                'desc' => esc_html__( 'The Typography option type is for adding typography styles to your site.', 'crypterium' ),
                'type' => 'typography',
                'section' => 'typography',
                'operator' => 'and'
            ),
            array(
                'id' => 'crypterium_typgrph6',
                'label' => esc_html__( 'Typography h6', 'crypterium' ),
                'desc' => esc_html__( 'The Typography option type is for adding typography styles to your site.', 'crypterium' ),
                'type' => 'typography',
                'section' => 'typography',
                'operator' => 'and'
            ),
            array(
                'id' => 'crypterium_typgrph7',
                'label' => esc_html__( 'Typography p', 'crypterium' ),
                'desc' => esc_html__( 'The Typography option type is for adding typography styles to your site.', 'crypterium' ),
                'type' => 'typography',
                'section' => 'typography',
                'operator' => 'and'
            ),

            /*************************************************
            ## CPT.
            *************************************************/
            array(
                'id' => 'cursornt_cpt2_display',
                'label' => esc_html( 'CPT Team Display', 'crypterium' ),
                'desc' => sprintf( esc_html( 'Enable or Disable CPT Team with %s or %s.', 'crypterium' ), '<code>on</code>', '<code>off</code>' ),
                'std' => 'on',
                'type' => 'on-off',
                'section' => 'cpt',
            ),
            array(
                'id' => 'cpt2',
                'label' => esc_html__('CPT Team Name', 'crypterium' ),
                'desc' => esc_html__('Add your CPT name.Default name is Team', 'crypterium' ),
                'std' => '',
                'type' => 'text',
                'section' => 'cpt',
                'condition' => 'cursornt_cpt2_display:is(on)',
            ),
            array(
                'id' => 'cursornt_cpt3_display',
                'label' => esc_html( 'CPT Price Display', 'crypterium' ),
                'desc' => sprintf( esc_html( 'Enable or Disable CPT Price with %s or %s.', 'crypterium' ), '<code>on</code>', '<code>off</code>' ),
                'std' => 'on',
                'type' => 'on-off',
                'section' => 'cpt'
            ),
            array(
                'id' => 'cpt3',
                'label' => esc_html__('CPT Price Name', 'crypterium' ),
                'desc' => esc_html__('Add your CPT name.Default name is Price', 'crypterium' ),
                'std' => '',
                'type' => 'text',
                'section' => 'cpt',
                'condition' => 'cursornt_cpt3_display:is(on)',
            ),

        ) // end array
    );

    // end function
    /* allow settings to be filtered before saving */
    $crypterium_ot_custom_settings = apply_filters( ot_settings_id() . '_args', $crypterium_ot_custom_settings );
    /* settings are not the same update the DB */
    if ( $crypterium_saved_settings !== $crypterium_ot_custom_settings ) {
        update_option( ot_settings_id(), $crypterium_ot_custom_settings );
    }
    /* Lets OptionTree know the UI Builder is being overridden */
    global $ot_has_custom_theme_options;
    $ot_has_custom_theme_options = true;
} // end function
