<?php
if ( !function_exists( 'crypterium_get_all_posts_by_type') ) {
    function crypterium_get_all_posts_by_type( $post_type )
    {
        $list = get_posts(
            array(
                'post_type' => $post_type,
                'orderby' => 'date',
                'order' => 'DESC',
                'posts_per_page' => -1
            )
        );

        $posts = array();

        if ( ! empty( $list ) && ! is_wp_error( $list ) ) {
            foreach ( $list as $post ) {
                $posts[ $post->post_title ] = $post->ID;
            }
        }

        return $posts;
    }
}

/*-----------------------------------------------------------------------------------*/
/*	HOME HERO PARALLAX
/*-----------------------------------------------------------------------------------*/
add_action( 'vc_before_init', 'crypterium_home_hero_shortcode_integrateWithVC' );
function crypterium_home_hero_shortcode_integrateWithVC() {
    vc_map(
        array(
            'name' => esc_html__( 'Home Hero', 'crypterium' ),
            'base' => 'crypterium_home_hero_shortcode',
            'icon' => 'icon-wpb-row',
            'category' => esc_html__( 'Crypterium Hero', 'crypterium'),
            'params' => array(

                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__('Gradient', 'crypterium' ),
                    'param_name' => 'pattern',
                    'description' => esc_html__('You can use this option for control gradient', 'crypterium' ),
                    'value' => array(
                        esc_html__('Select option', 'crypterium' ) => '',
                        esc_html__('show', 'crypterium' ) => 'show',
                        esc_html__('Hide', 'crypterium' ) => 'hide',
                    ),
                ),
                array(
                    'type' => 'attach_image',
                    'heading' => esc_html__('Background parallax image', 'crypterium'),
                    'param_name' => 'img',
                    'description' => esc_html__('Add your parallax image', 'crypterium'),
                ),
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__('Scroll', 'crypterium' ),
                    'param_name' => 'scroll',
                    'description' => esc_html__('You can use this option for control scroll button', 'crypterium' ),
                    'value' => array(
                        esc_html__('Select option', 'crypterium' ) => '',
                        esc_html__('show', 'crypterium' ) => 'show',
                        esc_html__('Hide', 'crypterium' ) => 'hide',
                    ),
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Scroll title', 'crypterium'),
                    'param_name' => 's_text',
                    'description' => esc_html__('Add title.', 'crypterium'),
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Title', 'crypterium'),
                    'param_name' => 'title',
                    'description' => esc_html__('Add title.', 'crypterium'),
                ),
                array(
                    'type' => 'textarea',
                    'heading' => esc_html__('Detail', 'crypterium'),
                    'param_name' => 'desc',
                    'description' => esc_html__('Add description or text block.', 'crypterium'),
                ),
                array(
                    'type' => 'textarea_html',
                    'heading' => esc_html__('Content Area', 'crypterium'),
                    'param_name' => 'content',
                    'description' => esc_html__('You can add your form and other html parts', 'crypterium'),
                ),
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__('Count', 'crypterium' ),
                    'param_name' => 'count',
                    'group' => esc_html__('Count', 'crypterium' ),
                    'description' => esc_html__('You can use this option for control count area', 'crypterium' ),
                    'value' => array(
                        esc_html__('Select option', 'crypterium' ) => '',
                        esc_html__('show', 'crypterium' ) => 'show',
                        esc_html__('Hide', 'crypterium' ) => 'hide',
                    ),
                ),
                array(
                    'type' => 'param_group',
                    'heading' => esc_html__('Count items', 'crypterium' ),
                    'param_name' => 'count_loop',
                    'group' => esc_html__('Count', 'crypterium' ),
                    'params' => array(
                        array(
                            'type' => 'textfield',
                            'heading' => esc_html__('from', 'crypterium'),
                            'param_name' => 'from',
                            'description' => esc_html__('Add number for from data, example 10', 'crypterium'),
                        ),
                        array(
                            'type' => 'textfield',
                            'heading' => esc_html__('to', 'crypterium'),
                            'param_name' => 'to',
                            'description' => esc_html__('Add number for to data, example 120', 'crypterium'),
                        ),
                        array(
                            'type' => 'textfield',
                            'heading' => esc_html__('decimals', 'crypterium'),
                            'param_name' => 'dec',
                            'description' => esc_html__('Add number for decimals data, example 1', 'crypterium'),
                        ),
                        array(
                            'type' => 'textfield',
                            'heading' => esc_html__('before', 'crypterium'),
                            'param_name' => 'before',
                            'description' => esc_html__('Add number for before data, example $', 'crypterium'),
                        ),
                        array(
                            'type' => 'textfield',
                            'heading' => esc_html__('after', 'crypterium'),
                            'param_name' => 'after',
                            'description' => esc_html__('Add number for after data, example M', 'crypterium'),
                        ),
                        array(
                            'type' => 'textfield',
                            'heading' => esc_html__('datatitle', 'crypterium'),
                            'param_name' => 'datatitle',
                            'description' => esc_html__('Add number for title data, example : The amount of finance in the system', 'crypterium'),
                        ),
                    ), // params
                ), // array

                //title
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Title font-size', 'crypterium'),
                    'param_name' => 'tsize',
                    'description' => esc_html__('Change title font-size. Use number in ( px or unit )', 'crypterium'),
                    'group' => esc_html__('Custom Style', 'crypterium' ),
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Title line-height', 'crypterium'),
                    'param_name' => 'tlineh',
                    'description' => esc_html__('Change title line-height. Use number in ( px or unit )', 'crypterium'),
                    'group' => esc_html__('Custom Style', 'crypterium' ),
                ),
                array(
                    'type' => 'colorpicker',
                    'heading' => esc_html__('Title color', 'crypterium'),
                    'param_name' => 'tcolor',
                    'description' => esc_html__('Change title color.', 'crypterium'),
                    'group' => esc_html__('Custom Style', 'crypterium' ),
                ),
                //detail
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Detail font-size', 'crypterium'),
                    'param_name' => 'dsize',
                    'description' => esc_html__('Change detail font-size. Use number in ( px or unit )', 'crypterium'),
                    'group' => esc_html__('Custom Style', 'crypterium' ),
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Detail line-height', 'crypterium'),
                    'param_name' => 'dlineh',
                    'description' => esc_html__('Change detail line-height. Use number in ( px or unit )', 'crypterium'),
                    'group' => esc_html__('Custom Style', 'crypterium' ),
                ),
                array(
                    'type' => 'colorpicker',
                    'heading' => esc_html__('Detail color', 'crypterium'),
                    'param_name' => 'dcolor',
                    'description' => esc_html__('Change detail color.', 'crypterium'),
                    'group' => esc_html__('Custom Style', 'crypterium' ),
                ),
                array(
                    'type' => 'css_editor',
                    'heading' => esc_html__('Background CSS', 'crypterium' ),
                    'param_name' => 'css',
                    'group' => esc_html__('Background options', 'crypterium' ),
                ),
                // arrays end
            )
        )
    );
}
class Crypterium_Hero_Class extends WPBakeryShortCode {
}

/*-----------------------------------------------------------------------------------*/
/*	HOME HERO PARALLAX
/*-----------------------------------------------------------------------------------*/
add_action( 'vc_before_init', 'crypterium_home_farm_hero_shortcode_integrateWithVC' );
function crypterium_home_farm_hero_shortcode_integrateWithVC() {
    vc_map(
        array(
            'name' => esc_html__( 'Home Hero Mining Farm', 'crypterium' ),
            'base' => 'crypterium_home_farm_hero_shortcode',
            'icon' => 'icon-wpb-row',
            'category' => esc_html__( 'Crypterium Hero', 'crypterium'),
            'params' => array(
                array(
                    'type' => 'attach_image',
                    'heading' => esc_html__('Background image', 'crypterium'),
                    'param_name' => 'img',
                    'description' => esc_html__('Add your image', 'crypterium'),
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Title', 'crypterium'),
                    'param_name' => 'title',
                    'description' => esc_html__('Add title.', 'crypterium'),
                ),
                array(
                    'type' => 'textarea',
                    'heading' => esc_html__('Detail', 'crypterium'),
                    'param_name' => 'desc',
                    'description' => esc_html__('Add description or text block.', 'crypterium'),
                ),
                array(
                    'type' => 'vc_link',
                    'heading' => esc_html__('Button left', 'crypterium' ),
                    'param_name' => 'btnlink',
                    'description' => esc_html__('Add button title and link.', 'crypterium' ),
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Video button url', 'crypterium'),
                    'param_name' => 'url',
                    'description' => esc_html__('Add your vimeo or youtube url.', 'crypterium'),
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Video button url title', 'crypterium'),
                    'param_name' => 'text',
                    'description' => esc_html__('Add your title', 'crypterium'),
                ),
                array(
                    'type' => 'textarea_html',
                    'heading' => esc_html__('Content Area', 'crypterium'),
                    'param_name' => 'content',
                    'description' => esc_html__('You can add your form and other html parts', 'crypterium'),
                ),
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__('Counter visibility', 'crypterium' ),
                    'param_name' => 'count',
                    'group' => esc_html__('Count', 'crypterium' ),
                    'description' => esc_html__('You can use this option for control count area', 'crypterium' ),
                    'value' => array(
                        esc_html__('Select option', 'crypterium' ) => '',
                        esc_html__('show', 'crypterium' ) => 'show',
                        esc_html__('Hide', 'crypterium' ) => 'hide',
                    ),
                ),
                array(
                    'type' => 'param_group',
                    'heading' => esc_html__('Count items', 'crypterium' ),
                    'param_name' => 'count_loop',
                    'group' => esc_html__('Count', 'crypterium' ),
                    'params' => array(
                        array(
                            'type' => 'textfield',
                            'heading' => esc_html__('from', 'crypterium'),
                            'param_name' => 'from',
                            'description' => esc_html__('Add number for from data, example 10', 'crypterium'),
                        ),
                        array(
                            'type' => 'textfield',
                            'heading' => esc_html__('to', 'crypterium'),
                            'param_name' => 'to',
                            'description' => esc_html__('Add number for to data, example 120', 'crypterium'),
                        ),
                        array(
                            'type' => 'textfield',
                            'heading' => esc_html__('decimals', 'crypterium'),
                            'param_name' => 'dec',
                            'description' => esc_html__('Add number for decimals data, example 1', 'crypterium'),
                        ),
                        array(
                            'type' => 'textfield',
                            'heading' => esc_html__('before', 'crypterium'),
                            'param_name' => 'before',
                            'description' => esc_html__('Add number for before data, example $', 'crypterium'),
                        ),
                        array(
                            'type' => 'textfield',
                            'heading' => esc_html__('after', 'crypterium'),
                            'param_name' => 'after',
                            'description' => esc_html__('Add number for after data, example M', 'crypterium'),
                        ),
                        array(
                            'type' => 'textfield',
                            'heading' => esc_html__('datatitle', 'crypterium'),
                            'param_name' => 'datatitle',
                            'description' => esc_html__('Add number for title data, example : The amount of finance in the system', 'crypterium'),
                        ),
                    ),
                ), // array

                //title
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Title font-size', 'crypterium'),
                    'param_name' => 'tsize',
                    'description' => esc_html__('Change title font-size. Use number in ( px or unit )', 'crypterium'),
                    'group' => esc_html__('Custom Style', 'crypterium' ),
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Title line-height', 'crypterium'),
                    'param_name' => 'tlineh',
                    'description' => esc_html__('Change title line-height. Use number in ( px or unit )', 'crypterium'),
                    'group' => esc_html__('Custom Style', 'crypterium' ),
                ),
                array(
                    'type' => 'colorpicker',
                    'heading' => esc_html__('Title color', 'crypterium'),
                    'param_name' => 'tcolor',
                    'description' => esc_html__('Change title color.', 'crypterium'),
                    'group' => esc_html__('Custom Style', 'crypterium' ),
                ),
                //detail
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Detail font-size', 'crypterium'),
                    'param_name' => 'dsize',
                    'description' => esc_html__('Change detail font-size. Use number in ( px or unit )', 'crypterium'),
                    'group' => esc_html__('Custom Style', 'crypterium' ),
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Detail line-height', 'crypterium'),
                    'param_name' => 'dlineh',
                    'description' => esc_html__('Change detail line-height. Use number in ( px or unit )', 'crypterium'),
                    'group' => esc_html__('Custom Style', 'crypterium' ),
                ),
                array(
                    'type' => 'colorpicker',
                    'heading' => esc_html__('Detail color', 'crypterium'),
                    'param_name' => 'dcolor',
                    'description' => esc_html__('Change detail color.', 'crypterium'),
                    'group' => esc_html__('Custom Style', 'crypterium' ),
                ),
                array(
                    'type' => 'css_editor',
                    'heading' => esc_html__('Background CSS', 'crypterium' ),
                    'param_name' => 'css',
                    'group' => esc_html__('Background options', 'crypterium' ),
                ),
                // arrays end
            )
        )
    );
}
class Crypterium_Home_Farm_Hero_Class extends WPBakeryShortCode {
}

/*-----------------------------------------------------------------------------------*/
/*	HOME HERO AGENCY
/*-----------------------------------------------------------------------------------*/
add_action( 'vc_before_init', 'crypterium_home_agency_hero_shortcode_integrateWithVC' );
function crypterium_home_agency_hero_shortcode_integrateWithVC() {
    vc_map(
        array(
            'name' => esc_html__( 'Home Hero Agency', 'crypterium' ),
            'base' => 'crypterium_home_agency_hero_shortcode',
            'icon' => 'icon-wpb-row',
            'category' => esc_html__( 'Crypterium Hero', 'crypterium'),
            'params' => array(
                array(
                    'type' => 'attach_image',
                    'heading' => esc_html__('Background image', 'crypterium'),
                    'param_name' => 'img',
                    'description' => esc_html__('Add your image', 'crypterium'),
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Title', 'crypterium'),
                    'param_name' => 'title',
                    'description' => esc_html__('Add title.', 'crypterium'),
                ),
                array(
                    'type' => 'textarea',
                    'heading' => esc_html__('Detail', 'crypterium'),
                    'param_name' => 'desc',
                    'description' => esc_html__('Add description or text block.', 'crypterium'),
                ),
                array(
                    'type' => 'vc_link',
                    'heading' => esc_html__('Button left', 'crypterium' ),
                    'param_name' => 'btnlink',
                    'description' => esc_html__('Add button title and link.', 'crypterium' ),
                ),
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__('Video icon visibility', 'crypterium' ),
                    'param_name' => 'video',
                    'group' => esc_html__('Video', 'crypterium' ),
                    'description' => esc_html__('You can use this option for control video area', 'crypterium' ),
                    'value' => array(
                        esc_html__('Select option', 'crypterium' ) => '',
                        esc_html__('show', 'crypterium' ) => 'show',
                        esc_html__('Hide', 'crypterium' ) => 'hide',
                    ),
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Video button url', 'crypterium'),
                    'param_name' => 'url',
                    'description' => esc_html__('Add your vimeo or youtube url.', 'crypterium'),
                    'group' => esc_html__('Video', 'crypterium' ),
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Video button url title', 'crypterium'),
                    'param_name' => 'text',
                    'description' => esc_html__('Add your title', 'crypterium'),
                    'group' => esc_html__('Video', 'crypterium' ),
                ),
                array(
                    'type' => 'textarea_html',
                    'heading' => esc_html__('Content Area', 'crypterium'),
                    'param_name' => 'content',
                    'description' => esc_html__('You can add your form and other html parts', 'crypterium'),
                ),
                //section
                array(
                    'type' => 'colorpicker',
                    'heading' => esc_html__('Section BG gradient color 1', 'crypterium'),
                    'param_name' => 'secgrad1',
                    'group' => esc_html__('Custom Style', 'crypterium' ),
                ),
                array(
                    'type' => 'colorpicker',
                    'heading' => esc_html__('Section BG gradient color 2', 'crypterium'),
                    'param_name' => 'secgrad2',
                    'group' => esc_html__('Custom Style', 'crypterium' ),
                ),

                //title
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Title font-size', 'crypterium'),
                    'param_name' => 'tsize',
                    'description' => esc_html__('Change title font-size. Use number in ( px or unit )', 'crypterium'),
                    'group' => esc_html__('Custom Style', 'crypterium' ),
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Title line-height', 'crypterium'),
                    'param_name' => 'tlineh',
                    'description' => esc_html__('Change title line-height. Use number in ( px or unit )', 'crypterium'),
                    'group' => esc_html__('Custom Style', 'crypterium' ),
                ),
                array(
                    'type' => 'colorpicker',
                    'heading' => esc_html__('Title color', 'crypterium'),
                    'param_name' => 'tcolor',
                    'description' => esc_html__('Change title color.', 'crypterium'),
                    'group' => esc_html__('Custom Style', 'crypterium' ),
                ),
                //detail
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Detail font-size', 'crypterium'),
                    'param_name' => 'dsize',
                    'description' => esc_html__('Change detail font-size. Use number in ( px or unit )', 'crypterium'),
                    'group' => esc_html__('Custom Style', 'crypterium' ),
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Detail line-height', 'crypterium'),
                    'param_name' => 'dlineh',
                    'description' => esc_html__('Change detail line-height. Use number in ( px or unit )', 'crypterium'),
                    'group' => esc_html__('Custom Style', 'crypterium' ),
                ),
                array(
                    'type' => 'colorpicker',
                    'heading' => esc_html__('Detail color', 'crypterium'),
                    'param_name' => 'dcolor',
                    'description' => esc_html__('Change detail color.', 'crypterium'),
                    'group' => esc_html__('Custom Style', 'crypterium' ),
                ),
                //detail
                array(
                    'type' => 'colorpicker',
                    'heading' => esc_html__('Button background color', 'crypterium'),
                    'param_name' => 'btnbg',
                    'group' => esc_html__('Custom Style', 'crypterium' ),
                ),
                array(
                    'type' => 'colorpicker',
                    'heading' => esc_html__('Hover Button background color', 'crypterium'),
                    'param_name' => 'btnhvrbg',
                    'group' => esc_html__('Custom Style', 'crypterium' ),
                ),
                array(
                    'type' => 'colorpicker',
                    'heading' => esc_html__('Button title color', 'crypterium'),
                    'param_name' => 'btncolor',
                    'group' => esc_html__('Custom Style', 'crypterium' ),
                ),
                array(
                    'type' => 'colorpicker',
                    'heading' => esc_html__('Hover Button title color', 'crypterium'),
                    'param_name' => 'btnhvrcolor',
                    'group' => esc_html__('Custom Style', 'crypterium' ),
                ),
                array(
                    'type' => 'colorpicker',
                    'heading' => esc_html__('Video icon color', 'crypterium'),
                    'param_name' => 'videoicon',
                    'group' => esc_html__('Custom Style', 'crypterium' ),
                ),
                array(
                    'type' => 'colorpicker',
                    'heading' => esc_html__('Video icon border color', 'crypterium'),
                    'param_name' => 'videoiconbrd',
                    'group' => esc_html__('Custom Style', 'crypterium' ),
                ),
                array(
                    'type' => 'colorpicker',
                    'heading' => esc_html__('Hover video icon color', 'crypterium'),
                    'param_name' => 'videohvricon',
                    'group' => esc_html__('Custom Style', 'crypterium' ),
                ),
                array(
                    'type' => 'colorpicker',
                    'heading' => esc_html__('Hover video icon background color', 'crypterium'),
                    'param_name' => 'videoiconhvrbg',
                    'group' => esc_html__('Custom Style', 'crypterium' ),
                ),
                array(
                    'type' => 'colorpicker',
                    'heading' => esc_html__('Video title color', 'crypterium'),
                    'param_name' => 'videotitleclr',
                    'group' => esc_html__('Custom Style', 'crypterium' ),
                ),
                array(
                    'type' => 'css_editor',
                    'heading' => esc_html__('Background CSS', 'crypterium' ),
                    'param_name' => 'css',
                    'group' => esc_html__('Background options', 'crypterium' ),
                ),
                // arrays end
            )
        )
    );
}
class Crypterium_Home_Agency_Hero_Class extends WPBakeryShortCode {
}


/*-----------------------------------------------------------------------------------*/
/*	HOME HERO PARALLAX
/*-----------------------------------------------------------------------------------*/
add_action( 'vc_before_init', 'crypterium_home_hero_progress_shortcode_integrateWithVC' );
function crypterium_home_hero_progress_shortcode_integrateWithVC() {
    vc_map(
        array(
            'name' => esc_html__( 'Home Landing Hero Progress', 'crypterium' ),
            'base' => 'crypterium_home_hero_progress_shortcode',
            'icon' => 'icon-wpb-row',
            'category' => esc_html__( 'Crypterium Hero', 'crypterium'),
            'params' => array(
                array(
                    'type' => 'attach_image',
                    'heading' => esc_html__('Background parallax image', 'crypterium'),
                    'param_name' => 'img',
                    'description' => esc_html__('Add your parallax image', 'crypterium'),
                ),
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__('Scroll', 'crypterium' ),
                    'param_name' => 'scroll',
                    'description' => esc_html__('You can use this option for control scroll button', 'crypterium' ),
                    'value' => array(
                        esc_html__('Select option', 'crypterium' ) => '',
                        esc_html__('show', 'crypterium' ) => 'show',
                        esc_html__('Hide', 'crypterium' ) => 'hide',
                    ),
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Scroll title', 'crypterium'),
                    'param_name' => 's_text',
                    'description' => esc_html__('Add title.', 'crypterium'),
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Title', 'crypterium'),
                    'param_name' => 'title',
                    'description' => esc_html__('Add title.', 'crypterium'),
                ),
                array(
                    'type' => 'textarea',
                    'heading' => esc_html__('Detail', 'crypterium'),
                    'param_name' => 'desc',
                    'description' => esc_html__('Add description or text block.', 'crypterium'),
                ),
                array(
                    'type' => 'textarea_html',
                    'heading' => esc_html__('Content Area', 'crypterium'),
                    'param_name' => 'content',
                    'description' => esc_html__('You can add your form and other html parts', 'crypterium'),
                ),
                array(
                    'type' => 'vc_link',
                    'heading' => esc_html__('Button 1', 'crypterium' ),
                    'param_name' => 'btnlink',
                    'description' => esc_html__('Add button title and link.', 'crypterium' ),
                    'group' => esc_html__('Button', 'crypterium' ),
                ),
                array(
                    'type' => 'vc_link',
                    'heading' => esc_html__('Button 2', 'crypterium' ),
                    'param_name' => 'btnlink2',
                    'description' => esc_html__('Add button title and link.', 'crypterium' ),
                    'group' => esc_html__('Button', 'crypterium' ),
                ),
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__('Progress bar size', 'crypterium' ),
                    'param_name' => 'size',
                    'description' => esc_html__('You can choise 3 size', 'crypterium'),
                    'value' => array(
                        esc_html__('Select options', 'crypterium' ) => 'progress--big',
                        esc_html__('Small', 'crypterium' ) => 'progress--small',
                        esc_html__('Medium', 'crypterium' ) => 'progress--medium',
                        esc_html__('Big', 'crypterium' ) => 'progress--big',
                    ),
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Progress green bar width', 'crypterium'),
                    'param_name' => 'bar',
                    'description' => esc_html__('Add number between 1-100', 'crypterium'),
                    'group' => esc_html__('Progress', 'crypterium' ),
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Progress bar inner max coin total text', 'crypterium'),
                    'param_name' => 'max',
                    'description' => esc_html__('Add title', 'crypterium'),
                    'group' => esc_html__('Progress', 'crypterium' ),
                ),
                array(
                    'type' => 'param_group',
                    'heading' => esc_html__('Progress Items', 'crypterium' ),
                    'param_name' => 'pitems',
                    'group' => esc_html__('Progress', 'crypterium' ),
                    'params' => array(
                        array(
                            'type' => 'textfield',
                            'heading' => esc_html__('Percent', 'crypterium'),
                            'param_name' => 'percent',
                            'description' => esc_html__('Add percent for item.', 'crypterium'),
                        ),
                        array(
                            'type' => 'textfield',
                            'heading' => esc_html__('Percent title', 'crypterium'),
                            'param_name' => 'percent_title',
                            'description' => esc_html__('Add title for item.', 'crypterium'),
                        ),
                    ),
                ), // param_group

                //title
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Title font-size', 'crypterium'),
                    'param_name' => 'tsize',
                    'description' => esc_html__('Change title font-size. Use number in ( px or unit )', 'crypterium'),
                    'group' => esc_html__('Custom Style', 'crypterium' ),
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Title line-height', 'crypterium'),
                    'param_name' => 'tlineh',
                    'description' => esc_html__('Change title line-height. Use number in ( px or unit )', 'crypterium'),
                    'group' => esc_html__('Custom Style', 'crypterium' ),
                ),
                array(
                    'type' => 'colorpicker',
                    'heading' => esc_html__('Title color', 'crypterium'),
                    'param_name' => 'tcolor',
                    'description' => esc_html__('Change title color.', 'crypterium'),
                    'group' => esc_html__('Custom Style', 'crypterium' ),
                ),
                //detail
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Detail font-size', 'crypterium'),
                    'param_name' => 'dsize',
                    'description' => esc_html__('Change detail font-size. Use number in ( px or unit )', 'crypterium'),
                    'group' => esc_html__('Custom Style', 'crypterium' ),
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Detail line-height', 'crypterium'),
                    'param_name' => 'dlineh',
                    'description' => esc_html__('Change detail line-height. Use number in ( px or unit )', 'crypterium'),
                    'group' => esc_html__('Custom Style', 'crypterium' ),
                ),
                array(
                    'type' => 'colorpicker',
                    'heading' => esc_html__('Detail color', 'crypterium'),
                    'param_name' => 'dcolor',
                    'description' => esc_html__('Change detail color.', 'crypterium'),
                    'group' => esc_html__('Custom Style', 'crypterium' ),
                ),
                array(
                    'type' => 'css_editor',
                    'heading' => esc_html__('Background CSS', 'crypterium' ),
                    'param_name' => 'css',
                    'group' => esc_html__('Background options', 'crypterium' ),
                ),
                // arrays end
            )
        )
    );
}class Crypterium_Home_Hero_Progress_Shortcode extends WPBakeryShortCode {
}

/*-----------------------------------------------------------------------------------*/
/*	HOME HERO ICO 1
/*-----------------------------------------------------------------------------------*/
add_action( 'vc_before_init', 'crypterium_home_hero_ico_shortcode_integrateWithVC' );
function crypterium_home_hero_ico_shortcode_integrateWithVC() {
    vc_map(
        array(
            'name' => esc_html__( 'Home Hero ICO', 'crypterium' ),
            'base' => 'crypterium_home_hero_ico_shortcode',
            'icon' => 'icon-wpb-row',
            'category' => esc_html__( 'Crypterium Hero', 'crypterium'),
            'params' => array(

                array(
                    'type' => 'attach_image',
                    'heading' => esc_html__('Background parallax image', 'crypterium'),
                    'param_name' => 'img',
                    'description' => esc_html__('Add your parallax image', 'crypterium'),
                ),
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__('Alignment', 'crypterium' ),
                    'param_name' => 'alignment',
                    'description' => esc_html__('You can change content position with alignment', 'crypterium' ),
                    'value' => array(
                        esc_html__('Select position', 'crypterium' ) => '',
                        esc_html__('Left', 'crypterium' ) => 'text--left',
                        esc_html__('Right', 'crypterium' ) => 'text--right',
                        esc_html__('Center', 'crypterium' ) => 'text--center',
                    ),
                ),
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__('Scroll', 'crypterium' ),
                    'param_name' => 'scroll',
                    'description' => esc_html__('You can use this option for control scroll button', 'crypterium' ),
                    'value' => array(
                        esc_html__('Select option', 'crypterium' ) => '',
                        esc_html__('show', 'crypterium' ) => 'show',
                        esc_html__('Hide', 'crypterium' ) => 'hide',
                    ),
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Scroll title', 'crypterium'),
                    'param_name' => 's_text',
                    'description' => esc_html__('Add title.', 'crypterium'),
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Title', 'crypterium'),
                    'param_name' => 'title',
                    'description' => esc_html__('Add title.', 'crypterium'),
                ),
                array(
                    'type' => 'textarea',
                    'heading' => esc_html__('Detail', 'crypterium'),
                    'param_name' => 'desc',
                    'description' => esc_html__('Add description or text block.', 'crypterium'),
                ),
                array(
                    'type' => 'textarea_html',
                    'heading' => esc_html__('Content Area', 'crypterium'),
                    'param_name' => 'content',
                    'description' => esc_html__('You can add your form and other html parts', 'crypterium'),
                ),
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__('Count', 'crypterium' ),
                    'param_name' => 'count',
                    'group' => esc_html__('Count', 'crypterium' ),
                    'description' => esc_html__('You can use this option for control count area', 'crypterium' ),
                    'value' => array(
                        esc_html__('Select option', 'crypterium' ) => '',
                        esc_html__('show', 'crypterium' ) => 'show',
                        esc_html__('Hide', 'crypterium' ) => 'hide',
                    ),
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Countdown heading', 'crypterium'),
                    'param_name' => 'counttitle',
                    'description' => esc_html__('Add title', 'crypterium'),
                    'group' => esc_html__('Count', 'crypterium' ),
                ),
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__('Count title alignment', 'crypterium' ),
                    'param_name' => 'ct_align',
                    'description' => esc_html__('You can change content position with alignment', 'crypterium' ),
                    'value' => array(
                        esc_html__('Select position', 'crypterium' ) => '',
                        esc_html__('Left', 'crypterium' ) => 'text--left',
                        esc_html__('Right', 'crypterium' ) => 'text--right',
                        esc_html__('Center', 'crypterium' ) => 'text--center',
                    ),
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Countdown date', 'crypterium'),
                    'param_name' => 'date',
                    'description' => esc_html__('Format : 2018-08-12', 'crypterium'),
                    'group' => esc_html__('Count', 'crypterium' ),
                ),
                array(
                    'type' => 'param_group',
                    'heading' => esc_html__('Social items', 'crypterium' ),
                    'param_name' => 'social_loop',
                    'group' => esc_html__('Social', 'crypterium' ),
                    'params' => array(
                        array(
                            'type' => 'textfield',
                            'heading' => esc_html__('icon', 'crypterium'),
                            'param_name' => 'icon',
                            'description' => esc_html__('Add icon classes', 'crypterium'),
                        ),
                        array(
                            'type' => 'textfield',
                            'heading' => esc_html__('url', 'crypterium'),
                            'param_name' => 'url',
                            'description' => esc_html__('Add icon url', 'crypterium'),
                        ),
                    ), // params
                ), // array
                array(
                    'type' => 'vc_link',
                    'heading' => esc_html__('Heading area button (Link)', 'crypterium' ),
                    'param_name' => 'btnlink',
                    'description' => esc_html__('Add button title and link.', 'crypterium' ),
                    'group' => esc_html__('Button', 'crypterium' ),
                ),
                array(
                    'type' => 'vc_link',
                    'heading' => esc_html__('Heading area button 2 (Link)', 'crypterium' ),
                    'param_name' => 'btnlink1',
                    'description' => esc_html__('Add button title and link.', 'crypterium' ),
                    'group' => esc_html__('Button', 'crypterium' ),
                ),
                //title
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Title font-size', 'crypterium'),
                    'param_name' => 'tsize',
                    'description' => esc_html__('Change title font-size. Use number in ( px or unit )', 'crypterium'),
                    'group' => esc_html__('Custom Style', 'crypterium' ),
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Title line-height', 'crypterium'),
                    'param_name' => 'tlineh',
                    'description' => esc_html__('Change title line-height. Use number in ( px or unit )', 'crypterium'),
                    'group' => esc_html__('Custom Style', 'crypterium' ),
                ),
                array(
                    'type' => 'colorpicker',
                    'heading' => esc_html__('Title color', 'crypterium'),
                    'param_name' => 'tcolor',
                    'description' => esc_html__('Change title color.', 'crypterium'),
                    'group' => esc_html__('Custom Style', 'crypterium' ),
                ),
                //detail
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Detail font-size', 'crypterium'),
                    'param_name' => 'dsize',
                    'description' => esc_html__('Change heading font-size. Use number in ( px or unit )', 'crypterium'),
                    'group' => esc_html__('Custom Style', 'crypterium' ),
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Detail line-height', 'crypterium'),
                    'param_name' => 'dlineh',
                    'description' => esc_html__('Change heading line-height. Use number in ( px or unit )', 'crypterium'),
                    'group' => esc_html__('Custom Style', 'crypterium' ),
                ),
                array(
                    'type' => 'colorpicker',
                    'heading' => esc_html__('Detail color', 'crypterium'),
                    'param_name' => 'dcolor',
                    'description' => esc_html__('Change heading color.', 'crypterium'),
                    'group' => esc_html__('Custom Style', 'crypterium' ),
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Count heading font-size', 'crypterium'),
                    'param_name' => 'csize',
                    'description' => esc_html__('Change heading font-size. Use number in ( px or unit )', 'crypterium'),
                    'group' => esc_html__('Custom Style', 'crypterium' ),
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Count heading line-height', 'crypterium'),
                    'param_name' => 'clineh',
                    'description' => esc_html__('Change heading line-height. Use number in ( px or unit )', 'crypterium'),
                    'group' => esc_html__('Custom Style', 'crypterium' ),
                ),
                array(
                    'type' => 'colorpicker',
                    'heading' => esc_html__('Count heading color', 'crypterium'),
                    'param_name' => 'ccolor',
                    'description' => esc_html__('Change heading color.', 'crypterium'),
                    'group' => esc_html__('Custom Style', 'crypterium' ),
                ),
                array(
                    'type' => 'css_editor',
                    'heading' => esc_html__('Background CSS', 'crypterium' ),
                    'param_name' => 'css',
                    'group' => esc_html__('Background options', 'crypterium' ),
                ),
                // arrays end
            )
        ));
    }
    class Crypterium_Home_Hero_Ico_Shortcode  extends WPBakeryShortCode {
    }

    /*-----------------------------------------------------------------------------------*/
    /*	HOME HERO ICO 2
    /*-----------------------------------------------------------------------------------*/
    add_action( 'vc_before_init', 'crypterium_home_hero_2_ico_shortcode_integrateWithVC' );
    function crypterium_home_hero_2_ico_shortcode_integrateWithVC() {
        vc_map(
            array(
                'name' => esc_html__( 'Home Hero ICO 2', 'crypterium' ),
                'base' => 'crypterium_home_hero_2_ico_shortcode',
                'icon' => 'icon-wpb-row',
                'category' => esc_html__( 'Crypterium Hero', 'crypterium'),
                'params' => array(

                    array(
                        'type' => 'attach_image',
                        'heading' => esc_html__('Background parallax image', 'crypterium'),
                        'param_name' => 'img',
                        'description' => esc_html__('Add your parallax image', 'crypterium'),
                    ),
                    array(
                        'type' => 'dropdown',
                        'heading' => esc_html__('Scroll', 'crypterium' ),
                        'param_name' => 'scroll',
                        'description' => esc_html__('You can use this option for control scroll button', 'crypterium' ),
                        'value' => array(
                            esc_html__('Select option', 'crypterium' ) => '',
                            esc_html__('show', 'crypterium' ) => 'show',
                            esc_html__('Hide', 'crypterium' ) => 'hide',
                        ),
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Scroll title', 'crypterium'),
                        'param_name' => 's_text',
                        'description' => esc_html__('Add title.', 'crypterium'),
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Title', 'crypterium'),
                        'param_name' => 'title',
                        'description' => esc_html__('Add title.', 'crypterium'),
                        'group' => esc_html__('Left', 'crypterium' ),
                    ),
                    array(
                        'type' => 'textarea',
                        'heading' => esc_html__('Detail', 'crypterium'),
                        'param_name' => 'desc',
                        'description' => esc_html__('Add description or text block.', 'crypterium'),
                        'group' => esc_html__('Left', 'crypterium' ),
                    ),
                    array(
                        'type' => 'textarea_html',
                        'heading' => esc_html__('Content Area', 'crypterium'),
                        'param_name' => 'content',
                        'description' => esc_html__('You can add your form and other html parts', 'crypterium'),
                        'group' => esc_html__('Left', 'crypterium' ),
                    ),
                    array(
                        'type' => 'vc_link',
                        'heading' => esc_html__('Left button', 'crypterium' ),
                        'param_name' => 'btnlink',
                        'description' => esc_html__('Add button title and link.', 'crypterium' ),
                        'group' => esc_html__('Left', 'crypterium' ),
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Video button', 'crypterium'),
                        'param_name' => 'vid_url',
                        'description' => esc_html__('Add your youtube or vimeo url.', 'crypterium'),
                        'group' => esc_html__('Left', 'crypterium' ),
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Title', 'crypterium'),
                        'param_name' => 'title2',
                        'description' => esc_html__('Add title.', 'crypterium'),
                        'group' => esc_html__('Right', 'crypterium' ),
                    ),
                    array(
                        'type' => 'textarea',
                        'heading' => esc_html__('Detail', 'crypterium'),
                        'param_name' => 'desc2',
                        'description' => esc_html__('Add description or text block.', 'crypterium'),
                        'group' => esc_html__('Right', 'crypterium' ),
                    ),
                    array(
                        'type' => 'textarea',
                        'heading' => esc_html__('Note', 'crypterium'),
                        'param_name' => 'desc3',
                        'description' => esc_html__('Add note or text block.', 'crypterium'),
                        'group' => esc_html__('Right', 'crypterium' ),
                    ),

                    array(
                        'type' => 'vc_link',
                        'heading' => esc_html__('Right button', 'crypterium' ),
                        'param_name' => 'btnlink1',
                        'description' => esc_html__('Add button title and link.', 'crypterium' ),
                        'group' => esc_html__('Right', 'crypterium' ),
                    ),
                    array(
                        'type' => 'attach_image',
                        'heading' => esc_html__('Payment image', 'crypterium'),
                        'param_name' => 'img2',
                        'description' => esc_html__('Add your parallax image', 'crypterium'),
                        'group' => esc_html__('Right', 'crypterium' ),
                    ),
                    array(
                        'type' => 'dropdown',
                        'heading' => esc_html__('Count', 'crypterium' ),
                        'param_name' => 'count',
                        'group' => esc_html__('Count', 'crypterium' ),
                        'description' => esc_html__('You can use this option for control count area', 'crypterium' ),
                        'value' => array(
                            esc_html__('Select option', 'crypterium' ) => '',
                            esc_html__('show', 'crypterium' ) => 'show',
                            esc_html__('Hide', 'crypterium' ) => 'hide',
                        ),
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Countdown date', 'crypterium'),
                        'param_name' => 'date',
                        'description' => esc_html__('Format : 2018-08-12', 'crypterium'),
                        'group' => esc_html__('Count', 'crypterium' ),
                    ),
                    array(
                        'type' => 'dropdown',
                        'heading' => esc_html__('Progress bar size', 'crypterium' ),
                        'param_name' => 'size',
                        'description' => esc_html__('You can choise 3 size', 'crypterium'),
                        'group' => esc_html__('Progress', 'crypterium' ),
                        'value' => array(
                            esc_html__('Select options', 'crypterium' ) => 'progress--big',
                            esc_html__('Small', 'crypterium' ) => 'progress--small',
                            esc_html__('Medium', 'crypterium' ) => 'progress--medium',
                            esc_html__('Big', 'crypterium' ) => 'progress--big',
                        ),
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Progress green bar width', 'crypterium'),
                        'param_name' => 'bar',
                        'description' => esc_html__('Add number between 1-100', 'crypterium'),
                        'group' => esc_html__('Progress', 'crypterium' ),
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Soft cap text', 'crypterium'),
                        'param_name' => 'soft',
                        'description' => esc_html__('Add text', 'crypterium'),
                        'group' => esc_html__('Progress', 'crypterium' ),
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Raised cap text', 'crypterium'),
                        'param_name' => 'raised',
                        'description' => esc_html__('Add text', 'crypterium'),
                        'group' => esc_html__('Progress', 'crypterium' ),
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Progress bar inner max coin total text', 'crypterium'),
                        'param_name' => 'max',
                        'description' => esc_html__('Add text', 'crypterium'),
                        'group' => esc_html__('Progress', 'crypterium' ),
                    ),
                    array(
                        'type' => 'param_group',
                        'heading' => esc_html__('Progress Items', 'crypterium' ),
                        'param_name' => 'pitems',
                        'group' => esc_html__('Progress', 'crypterium' ),
                        'params' => array(
                            array(
                                'type' => 'textfield',
                                'heading' => esc_html__('Percent', 'crypterium'),
                                'param_name' => 'percent',
                                'description' => esc_html__('Add percent for item.', 'crypterium'),
                            ),
                            array(
                                'type' => 'textfield',
                                'heading' => esc_html__('Percent title', 'crypterium'),
                                'param_name' => 'percent_title',
                                'description' => esc_html__('Add title for item.', 'crypterium'),
                            ),
                        ),
                    ), // param_group
                    //title
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Title font-size', 'crypterium'),
                        'param_name' => 'tsize',
                        'description' => esc_html__('Change title font-size. Use number in ( px or unit )', 'crypterium'),
                        'group' => esc_html__('Custom Style', 'crypterium' ),
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Title line-height', 'crypterium'),
                        'param_name' => 'tlineh',
                        'description' => esc_html__('Change title line-height. Use number in ( px or unit )', 'crypterium'),
                        'group' => esc_html__('Custom Style', 'crypterium' ),
                    ),
                    array(
                        'type' => 'colorpicker',
                        'heading' => esc_html__('Title color', 'crypterium'),
                        'param_name' => 'tcolor',
                        'description' => esc_html__('Change title color.', 'crypterium'),
                        'group' => esc_html__('Custom Style', 'crypterium' ),
                    ),
                    //detail
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Detail font-size', 'crypterium'),
                        'param_name' => 'dsize',
                        'description' => esc_html__('Change heading font-size. Use number in ( px or unit )', 'crypterium'),
                        'group' => esc_html__('Custom Style', 'crypterium' ),
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Detail line-height', 'crypterium'),
                        'param_name' => 'dlineh',
                        'description' => esc_html__('Change heading line-height. Use number in ( px or unit )', 'crypterium'),
                        'group' => esc_html__('Custom Style', 'crypterium' ),
                    ),
                    array(
                        'type' => 'colorpicker',
                        'heading' => esc_html__('Detail color', 'crypterium'),
                        'param_name' => 'dcolor',
                        'description' => esc_html__('Change heading color.', 'crypterium'),
                        'group' => esc_html__('Custom Style', 'crypterium' ),
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Count heading font-size', 'crypterium'),
                        'param_name' => 'csize',
                        'description' => esc_html__('Change heading font-size. Use number in ( px or unit )', 'crypterium'),
                        'group' => esc_html__('Custom Style', 'crypterium' ),
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Count heading line-height', 'crypterium'),
                        'param_name' => 'clineh',
                        'description' => esc_html__('Change heading line-height. Use number in ( px or unit )', 'crypterium'),
                        'group' => esc_html__('Custom Style', 'crypterium' ),
                    ),
                    array(
                        'type' => 'colorpicker',
                        'heading' => esc_html__('Count heading color', 'crypterium'),
                        'param_name' => 'ccolor',
                        'description' => esc_html__('Change heading color.', 'crypterium'),
                        'group' => esc_html__('Custom Style', 'crypterium' ),
                    ),
                    array(
                        'type' => 'css_editor',
                        'heading' => esc_html__('Background CSS', 'crypterium' ),
                        'param_name' => 'css',
                        'group' => esc_html__('Background options', 'crypterium' ),
                    ),
                    // arrays end
                )
            )
        );
    }
    class Crypterium_Home_Hero_2_Ico_Shortcode  extends WPBakeryShortCode {
    }

    /*-----------------------------------------------------------------------------------*/
    /*	HOME HERO ICO 2
    /*-----------------------------------------------------------------------------------*/
    add_action( 'vc_before_init', 'crypterium_home_hero_3_ico_shortcode_integrateWithVC' );
    function crypterium_home_hero_3_ico_shortcode_integrateWithVC() {
        vc_map(
            array(
                'name' => esc_html__( 'Home Hero ICO 3', 'crypterium' ),
                'base' => 'crypterium_home_hero_3_ico_shortcode',
                'icon' => 'icon-wpb-row',
                'category' => esc_html__( 'Crypterium Hero', 'crypterium'),
                'params' => array(

                    array(
                        'type' => 'attach_image',
                        'heading' => esc_html__('Background parallax image', 'crypterium'),
                        'param_name' => 'img',
                        'description' => esc_html__('Add your parallax image', 'crypterium'),
                    ),
                    array(
                        'type' => 'dropdown',
                        'heading' => esc_html__('Scroll', 'crypterium' ),
                        'param_name' => 'scroll',
                        'description' => esc_html__('You can use this option for control scroll button', 'crypterium' ),
                        'value' => array(
                            esc_html__('Select option', 'crypterium' ) => '',
                            esc_html__('show', 'crypterium' ) => 'show',
                            esc_html__('Hide', 'crypterium' ) => 'hide',
                        ),
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Scroll title', 'crypterium'),
                        'param_name' => 's_text',
                        'description' => esc_html__('Add title.', 'crypterium'),
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Title', 'crypterium'),
                        'param_name' => 'title',
                        'description' => esc_html__('Add title.', 'crypterium'),
                    ),
                    array(
                        'type' => 'textarea',
                        'heading' => esc_html__('Detail', 'crypterium'),
                        'param_name' => 'desc',
                        'description' => esc_html__('Add description or text block.', 'crypterium'),
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Date', 'crypterium'),
                        'param_name' => 'date',
                        'description' => esc_html__('Add hours', 'crypterium'),
                    ),
                    array(
                        'type' => 'textarea_html',
                        'heading' => esc_html__('Content Area', 'crypterium'),
                        'param_name' => 'content',
                        'description' => esc_html__('You can add your form and other html parts', 'crypterium'),
                    ),
                    array(
                        'type' => 'vc_link',
                        'heading' => esc_html__('Left button', 'crypterium' ),
                        'param_name' => 'btnlink',
                        'description' => esc_html__('Add button title and link.', 'crypterium' ),
                    ),

                    //title
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Title font-size', 'crypterium'),
                        'param_name' => 'tsize',
                        'description' => esc_html__('Change title font-size. Use number in ( px or unit )', 'crypterium'),
                        'group' => esc_html__('Custom Style', 'crypterium' ),
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Title line-height', 'crypterium'),
                        'param_name' => 'tlineh',
                        'description' => esc_html__('Change title line-height. Use number in ( px or unit )', 'crypterium'),
                        'group' => esc_html__('Custom Style', 'crypterium' ),
                    ),
                    array(
                        'type' => 'colorpicker',
                        'heading' => esc_html__('Title color', 'crypterium'),
                        'param_name' => 'tcolor',
                        'description' => esc_html__('Change title color.', 'crypterium'),
                        'group' => esc_html__('Custom Style', 'crypterium' ),
                    ),
                    //detail
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Detail font-size', 'crypterium'),
                        'param_name' => 'dsize',
                        'description' => esc_html__('Change heading font-size. Use number in ( px or unit )', 'crypterium'),
                        'group' => esc_html__('Custom Style', 'crypterium' ),
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Detail line-height', 'crypterium'),
                        'param_name' => 'dlineh',
                        'description' => esc_html__('Change heading line-height. Use number in ( px or unit )', 'crypterium'),
                        'group' => esc_html__('Custom Style', 'crypterium' ),
                    ),
                    array(
                        'type' => 'colorpicker',
                        'heading' => esc_html__('Detail color', 'crypterium'),
                        'param_name' => 'dcolor',
                        'description' => esc_html__('Change heading color.', 'crypterium'),
                        'group' => esc_html__('Custom Style', 'crypterium' ),
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Count heading font-size', 'crypterium'),
                        'param_name' => 'csize',
                        'description' => esc_html__('Change heading font-size. Use number in ( px or unit )', 'crypterium'),
                        'group' => esc_html__('Custom Style', 'crypterium' ),
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Count heading line-height', 'crypterium'),
                        'param_name' => 'clineh',
                        'description' => esc_html__('Change heading line-height. Use number in ( px or unit )', 'crypterium'),
                        'group' => esc_html__('Custom Style', 'crypterium' ),
                    ),
                    array(
                        'type' => 'colorpicker',
                        'heading' => esc_html__('Count heading color', 'crypterium'),
                        'param_name' => 'ccolor',
                        'description' => esc_html__('Change heading color.', 'crypterium'),
                        'group' => esc_html__('Custom Style', 'crypterium' ),
                    ),
                    array(
                        'type' => 'css_editor',
                        'heading' => esc_html__('Background CSS', 'crypterium' ),
                        'param_name' => 'css',
                        'group' => esc_html__('Background options', 'crypterium' ),
                    ),
                    // arrays end
                )
            )
        );
    }
    class Crypterium_Home_Hero_3_Ico_Shortcode  extends WPBakeryShortCode {
    }

    /*-----------------------------------------------------------------------------------*/
    /*	HOME HERO SLIDER
    /*-----------------------------------------------------------------------------------*/
    add_action( 'vc_before_init', 'crypterium_home_slider_shortcode_integrateWithVC' );
    function crypterium_home_slider_shortcode_integrateWithVC() {
        vc_map(
            array(
                'name' => esc_html__( 'Home Hero Slider', 'crypterium' ),
                'base' => 'crypterium_home_slider_shortcode',
                'icon' => 'icon-wpb-row',
                'category' => esc_html__( 'Crypterium Hero', 'crypterium'),
                'params' => array(
                    array(
                        'type' => 'dropdown',
                        'heading' => esc_html__('Scroll', 'crypterium' ),
                        'param_name' => 'scroll',
                        'description' => esc_html__('You can use this option for control scroll button', 'crypterium' ),
                        'value' => array(
                            esc_html__('Select option', 'crypterium' ) => '',
                            esc_html__('show', 'crypterium' ) => 'show',
                            esc_html__('Hide', 'crypterium' ) => 'hide',
                        ),
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Scroll title', 'crypterium'),
                        'param_name' => 's_text',
                        'description' => esc_html__('Add title.', 'crypterium'),
                    ),
                    array(
                        'type' => 'param_group',
                        'heading' => esc_html__('Count items', 'crypterium' ),
                        'param_name' => 'loop',
                        'group' => esc_html__('Count', 'crypterium' ),
                        'params' => array(
                            array(
                                'type' => 'dropdown',
                                'heading' => esc_html__('Alignment', 'crypterium' ),
                                'param_name' => 'alignment',
                                'description' => esc_html__('You can change content position with alignment', 'crypterium' ),
                                'value' => array(
                                    esc_html__('Select position', 'crypterium' ) => '',
                                    esc_html__('Left', 'crypterium' ) => 'text--left',
                                    esc_html__('Right', 'crypterium' ) => 'text--right',
                                    esc_html__('Center', 'crypterium' ) => 'text--center',
                                ),
                            ),
                            array(
                                'type' => 'attach_image',
                                'heading' => esc_html__('Background image', 'crypterium'),
                                'param_name' => 'img',
                                'description' => esc_html__('Add your partner image', 'crypterium'),
                            ),
                            array(
                                'type' => 'textarea',
                                'heading' => esc_html__('Content Area', 'crypterium'),
                                'param_name' => 'contents',
                                'description' => esc_html__('You can add your form and other html parts', 'crypterium'),
                            ),
                        ), // params
                    ), // array
                    //title
                    array(
                        'type' => 'dropdown',
                        'heading' => esc_html__('Autoplay', 'crypterium' ),
                        'param_name' => 'autoplay',
                        'group' => esc_html__('Count', 'crypterium' ),
                        'value' => array(
                            esc_html__('Select option', 'crypterium' ) => '',
                            esc_html__('Yes', 'crypterium' ) => 'yes',
                            esc_html__('No', 'crypterium' ) => 'no',
                        ),
                    ),
                    array(
                        'type' => 'dropdown',
                        'heading' => esc_html__('Loop', 'crypterium' ),
                        'param_name' => 'infinite',
                        'group' => esc_html__('Count', 'crypterium' ),
                        'value' => array(
                            esc_html__('Select option', 'crypterium' ) => '',
                            esc_html__('Yes', 'crypterium' ) => 'yes',
                            esc_html__('No', 'crypterium' ) => 'no',
                        ),
                    ),
                    array(
                        'type' => 'dropdown',
                        'heading' => esc_html__('Dots', 'crypterium' ),
                        'param_name' => 'dots',
                        'group' => esc_html__('Count', 'crypterium' ),
                        'value' => array(
                            esc_html__('Select option', 'crypterium' ) => '',
                            esc_html__('Yes', 'crypterium' ) => 'yes',
                            esc_html__('No', 'crypterium' ) => 'no',
                        ),
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Speed ( ms )', 'crypterium'),
                        'param_name' => 'speed',
                        'group' => esc_html__('Count', 'crypterium' ),
                        'description' => esc_html__('Default : 1200', 'crypterium'),
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Title font-size', 'crypterium'),
                        'param_name' => 'tsize',
                        'description' => esc_html__('Change title font-size. Use number in ( px or unit )', 'crypterium'),
                        'group' => esc_html__('Custom Style', 'crypterium' ),
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Title line-height', 'crypterium'),
                        'param_name' => 'tlineh',
                        'description' => esc_html__('Change title line-height. Use number in ( px or unit )', 'crypterium'),
                        'group' => esc_html__('Custom Style', 'crypterium' ),
                    ),
                    array(
                        'type' => 'colorpicker',
                        'heading' => esc_html__('Title color', 'crypterium'),
                        'param_name' => 'tcolor',
                        'description' => esc_html__('Change title color.', 'crypterium'),
                        'group' => esc_html__('Custom Style', 'crypterium' ),
                    ),
                    //detail
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Detail font-size', 'crypterium'),
                        'param_name' => 'dsize',
                        'description' => esc_html__('Change detail font-size. Use number in ( px or unit )', 'crypterium'),
                        'group' => esc_html__('Custom Style', 'crypterium' ),
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Detail line-height', 'crypterium'),
                        'param_name' => 'dlineh',
                        'description' => esc_html__('Change detail line-height. Use number in ( px or unit )', 'crypterium'),
                        'group' => esc_html__('Custom Style', 'crypterium' ),
                    ),
                    array(
                        'type' => 'colorpicker',
                        'heading' => esc_html__('Detail color', 'crypterium'),
                        'param_name' => 'dcolor',
                        'description' => esc_html__('Change detail color.', 'crypterium'),
                        'group' => esc_html__('Custom Style', 'crypterium' ),
                    ),
                    array(
                        'type' => 'css_editor',
                        'heading' => esc_html__('Background CSS', 'crypterium' ),
                        'param_name' => 'css',
                        'group' => esc_html__('Background options', 'crypterium' ),
                    ),
                )
            )
        );
    }
    class Crypterium_Hero_Slider_Class extends WPBakeryShortCode {
    }

    /*-----------------------------------------------------------------------------------*/
    /*	LOGOS
    /*-----------------------------------------------------------------------------------*/
    add_action( 'vc_before_init', 'crypterium_logos_shortcode_integrateWithVC' );
    function crypterium_logos_shortcode_integrateWithVC() {
        vc_map(
            array(
                'name' => esc_html__( 'Logos', 'crypterium' ),
                'base' => 'crypterium_logos_shortcode',
                'icon' => 'icon-wpb-row',
                'category' => esc_html__( 'Crypterium', 'crypterium'),
                'params' => array(
                    array(
                        'type' => 'dropdown',
                        'heading' => esc_html__('Theme section classes', 'crypterium' ),
                        'param_name' => 'sp',
                        'description' => esc_html__('You can select an option for default section paddings', 'crypterium'),
                        'value' => array(
                            esc_html__('Select options', 'crypterium' ) => '',
                            esc_html__('section (140px padding)', 'crypterium' ) => 'section',
                            esc_html__('section no padding top', 'crypterium' ) => 'section section--no-pt',
                            esc_html__('section no padding bottom', 'crypterium' ) => 'section section--no-pb',
                            esc_html__('section no padding top and bottom', 'crypterium' ) => 'section section--no-pb section--no-pt',
                        ),
                    ),
                    array(
                        'type' => 'dropdown',
                        'heading' => esc_html__('Theme section default backgrounds', 'crypterium' ),
                        'param_name' => 'bg',
                        'description' => esc_html__('You can select an option for default section paddings', 'crypterium'),
                        'value' => array(
                            esc_html__('Select options', 'crypterium' ) => 'section-no-bg',
                            esc_html__('Base background', 'crypterium' ) => 'section--base-bg',
                            esc_html__('Light background', 'crypterium' ) => 'section--light-bg',
                            esc_html__('Blue background', 'crypterium' ) => 'section--blue-bg',
                            esc_html__('Light blue background', 'crypterium' ) => 'section--light-blue-bg',
                            esc_html__('Dark background', 'crypterium' ) => 'section--dark-bg',
                        ),
                    ),
                    //Partner loop
                    array(
                        'type' => 'param_group',
                        'heading' => esc_html__('Partner items', 'crypterium' ),
                        'param_name' => 'ploop',
                        'group' => esc_html__('Items', 'crypterium' ),
                        'params' => array(
                            array(
                                'type' => 'textfield',
                                'heading' => esc_html__('Column', 'crypterium'),
                                'param_name' => 'column',
                                'description' => esc_html__('Add column classes if you need. Examples : col--sm-4 col--md-4 col--lg-4', 'crypterium'),
                            ),
                            array(
                                'type' => 'attach_image',
                                'heading' => esc_html__('Partner image', 'crypterium'),
                                'param_name' => 'img',
                                'description' => esc_html__('Add your partner image', 'crypterium'),
                            ),
                            array(
                                'type' => 'textfield',
                                'heading' => esc_html__('URL', 'crypterium'),
                                'param_name' => 'href',
                                'description' => esc_html__('Please add url', 'crypterium'),
                            ),
                            array(
                                'type' => 'dropdown',
                                'heading' => esc_html__('Target', 'crypterium' ),
                                'param_name' => 'target',
                                'description' => esc_html__('You can select an button target', 'crypterium'),
                                'value' => array(
                                    esc_html__('Select target', 'crypterium' ) => '',
                                    esc_html__('Blank', 'crypterium' ) => '_blank',
                                    esc_html__('Self', 'crypterium' ) => '_self',
                                    esc_html__('Parent', 'crypterium' ) => '_parent',
                                    esc_html__('Top', 'crypterium' ) => '_top',
                                ),
                            ),
                        ), // params
                    ), // param_group
                    array(
                        'type' => 'css_editor',
                        'heading' => esc_html__('Background CSS', 'crypterium' ),
                        'param_name'=> 'css',
                        'group' => esc_html__('Background options', 'crypterium' ),
                    )
                )
            )
        );
    }
    class Crypterium_Logos_Shortcode extends WPBakeryShortCode {
    }

    /*-----------------------------------------------------------------------------------*/
    /*	LOGOS
    /*-----------------------------------------------------------------------------------*/
    add_action( 'vc_before_init', 'crypterium_projects_shortcode_integrateWithVC' );
    function crypterium_projects_shortcode_integrateWithVC() {
        vc_map(
            array(
                'name' => esc_html__( 'Projects', 'crypterium' ),
                'base' => 'crypterium_projects_shortcode',
                'icon' => 'icon-wpb-row',
                'category' => esc_html__( 'Crypterium', 'crypterium'),
                'params' => array(

                    // loop
                    array(
                        'type' => 'param_group',
                        'heading' => esc_html__('Project items', 'crypterium' ),
                        'param_name' => 'loop',
                        'group' => esc_html__('Items', 'crypterium' ),
                        'params' => array(
                            array(
                                'type' => 'attach_image',
                                'heading' => esc_html__('Project image', 'crypterium'),
                                'param_name' => 'img',
                                'description' => esc_html__('Add your project image', 'crypterium'),
                            ),
                            array(
                                'type' => 'vc_link',
                                'heading' => esc_html__('Category with (Link)', 'crypterium' ),
                                'param_name' => 'btnlink',
                                'description' => esc_html__('Add title and link.', 'crypterium' ),
                            ),
                            array(
                                'type' => 'vc_link',
                                'heading' => esc_html__('Heading with (Link)', 'crypterium' ),
                                'param_name' => 'btnlink2',
                                'description' => esc_html__('Add title and link.', 'crypterium' ),
                            )
                        ) // params
                    ) // param_group
                ) // params
            )
        );
    }
    class Crypterium_Projects_Shortcode extends WPBakeryShortCode {
    }

    /*-----------------------------------------------------------------------------------*/
    /*	FEATURES
    /*-----------------------------------------------------------------------------------*/

    add_action( 'vc_before_init', 'crypterium_features_shortcode_integrateWithVC' );
    function crypterium_features_shortcode_integrateWithVC() {
        vc_map(
            array(
                'name' => esc_html__( 'Features', 'crypterium' ),
                'base' => 'crypterium_features_shortcode',
                'icon' => 'icon-wpb-row',
                'category' => esc_html__( 'Crypterium', 'crypterium'),
                'params' => array(
                    array(
                        'type' => 'dropdown',
                        'heading' => esc_html__('Theme section classes', 'crypterium' ),
                        'param_name' => 'sp',
                        'description' => esc_html__('You can select an option for default section paddings', 'crypterium'),
                        'value' => array(
                            esc_html__('Select options', 'crypterium' ) => '',
                            esc_html__('section (140px padding)', 'crypterium' ) => 'section',
                            esc_html__('section no padding top', 'crypterium' ) => 'section section--no-pt',
                            esc_html__('section no padding bottom', 'crypterium' ) => 'section section--no-pb',
                            esc_html__('section no padding top and bottom', 'crypterium' ) => 'section section--no-pb section--no-pt',
                        ),
                    ),
                    array(
                        'type' => 'dropdown',
                        'heading' => esc_html__('Theme section default backgrounds', 'crypterium' ),
                        'param_name' => 'bg',
                        'description' => esc_html__('You can select an option for default section paddings', 'crypterium'),
                        'value' => array(
                            esc_html__('Select options', 'crypterium' ) => 'section-no-bg',
                            esc_html__('Base background', 'crypterium' ) => 'section--base-bg',
                            esc_html__('Light background', 'crypterium' ) => 'section--light-bg',
                            esc_html__('Blue background', 'crypterium' ) => 'section--blue-bg',
                            esc_html__('Light blue background', 'crypterium' ) => 'section--light-blue-bg',
                            esc_html__('Dark background', 'crypterium' ) => 'section--dark-bg',
                        ),
                    ),
                    array(
                        'type' => 'param_group',
                        'heading' => esc_html__('Items', 'crypterium' ),
                        'param_name' => 'ploop',
                        'group' => esc_html__('Items', 'crypterium' ),
                        'params' => array(
                            array(
                                'type' => 'dropdown',
                                'heading' => esc_html__('Item align', 'crypterium' ),
                                'param_name' => 'type',
                                'description'=> esc_html__('You can select layout type', 'crypterium' ),
                                'value' => array(
                                    esc_html__('Select type', 'crypterium' ) => '',
                                    esc_html__('Default - Image left', 'crypterium' ) => 'left',
                                    esc_html__('Image right', 'crypterium' ) => 'right',
                                ),
                            ),
                            array(
                                'type' => 'dropdown',
                                'heading' => esc_html__('Item row margin bottom', 'crypterium' ),
                                'param_name' => 'imargin',
                                'description' => esc_html__('You can select tag for subheading font-size', 'crypterium' ),
                                'value' => array(
                                    esc_html__('Select', 'crypterium' ) => '',
                                    esc_html__('0', 'crypterium' ) => '0',
                                    esc_html__('5', 'crypterium' ) => '5',
                                    esc_html__('10', 'crypterium' ) => '10',
                                    esc_html__('15', 'crypterium' ) => '15',
                                    esc_html__('20', 'crypterium' ) => '20',
                                    esc_html__('25', 'crypterium' ) => '25',
                                    esc_html__('30', 'crypterium' ) => '30',
                                    esc_html__('35', 'crypterium' ) => '35',
                                    esc_html__('40', 'crypterium' ) => '40',
                                    esc_html__('45', 'crypterium' ) => '45',
                                    esc_html__('50', 'crypterium' ) => '50',
                                    esc_html__('55', 'crypterium' ) => '55',
                                    esc_html__('60', 'crypterium' ) => '60',
                                ),
                            ),
                            array(
                                'type' => 'textfield',
                                'heading' => esc_html__('Offset', 'crypterium'),
                                'param_name' => 'offset',
                                'description' => esc_html__('You can use this class : col--lg-offset-1 , between 1-12 number ', 'crypterium'),
                            ),
                            array(
                                'type' => 'textfield',
                                'heading' => esc_html__('Title', 'crypterium'),
                                'param_name' => 'title',
                                'description' => esc_html__('Add title.', 'crypterium'),
                            ),
                            array(
                                'type' => 'textfield',
                                'heading' => esc_html__('Subtitle', 'crypterium'),
                                'param_name' => 'subtitle',
                                'description' => esc_html__('Add subtitle.', 'crypterium'),
                            ),
                            array(
                                'type' => 'textarea',
                                'heading' => esc_html__('Detail', 'crypterium'),
                                'param_name' => 'desc',
                                'description' => esc_html__('Add description or text block.', 'crypterium'),
                            ),
                            array(
                                'type' => 'dropdown',
                                'heading' => esc_html__('Heading color', 'crypterium' ),
                                'param_name' => 'h_color',
                                'description' => esc_html__('You can select color for heading general', 'crypterium' ),
                                'value' => array(
                                    esc_html__('Select tag', 'crypterium' ) => '',
                                    esc_html__('Default', 'crypterium' ) => 'default',
                                    esc_html__('White', 'crypterium' ) => 'white',
                                ),
                            ),
                            array(
                                'type' => 'dropdown',
                                'heading' => esc_html__('Alignment', 'crypterium' ),
                                'param_name' => 'alignment',
                                'description' => esc_html__('You can select text position with alignment', 'crypterium' ),
                                'value' => array(
                                    esc_html__('Select position', 'crypterium' ) => '',
                                    esc_html__('Left', 'crypterium' ) => 'text--left',
                                    esc_html__('Right', 'crypterium' ) => 'text--lg-right',
                                    esc_html__('Center', 'crypterium' ) => 'section-heading--center',
                                ),
                            ),
                            array(
                                'type' => 'dropdown',
                                'heading' => esc_html__('Margin bottom', 'crypterium' ),
                                'param_name' => 'margin',
                                'description' => esc_html__('You can select tag for subheading font-size', 'crypterium' ),
                                'value' => array(
                                    esc_html__('Select', 'crypterium' ) => '',
                                    esc_html__('0', 'crypterium' ) => '0',
                                    esc_html__('5', 'crypterium' ) => '5',
                                    esc_html__('10', 'crypterium' ) => '10',
                                    esc_html__('15', 'crypterium' ) => '15',
                                    esc_html__('20', 'crypterium' ) => '20',
                                    esc_html__('25', 'crypterium' ) => '25',
                                    esc_html__('30', 'crypterium' ) => '30',
                                    esc_html__('35', 'crypterium' ) => '35',
                                    esc_html__('40', 'crypterium' ) => '40',
                                    esc_html__('45', 'crypterium' ) => '45',
                                    esc_html__('50', 'crypterium' ) => '50',
                                    esc_html__('55', 'crypterium' ) => '55',
                                    esc_html__('60', 'crypterium' ) => '60',
                                ),
                            ),
                            array(
                                'type' => 'attach_image',
                                'heading' => esc_html__('Column image', 'crypterium'),
                                'param_name' => 'img',
                                'description' => esc_html__('Add your column image', 'crypterium'),
                            ),
                            array(
                                'type' => 'vc_link',
                                'heading' => esc_html__('Heading area button (Link)', 'crypterium' ),
                                'param_name' => 'btnlink',
                                'description' => esc_html__('Add button title and link.', 'crypterium' ),
                            ),
                            array(
                                'type' => 'dropdown',
                                'heading' => esc_html__('Button style', 'crypterium' ),
                                'param_name' => 'btnstyle',
                                'description'=> esc_html__('You can select button color style', 'crypterium' ),
                                'group' => esc_html__('Button1', 'crypterium' ),
                                'value' => array(
                                    esc_html__('Select option','crypterium' ) => '',
                                    esc_html__('Style 1','crypterium' ) => 'custom-btn--style-1',
                                    esc_html__('Style 2','crypterium' ) => 'custom-btn--style-2',
                                    esc_html__('Style 3','crypterium' ) => 'custom-btn--style-3',
                                    esc_html__('Style 4','crypterium' ) => 'custom-btn--style-4',
                                    esc_html__('Style 5','crypterium' ) => 'custom-btn--style-5',
                                    esc_html__('Style 6','crypterium' ) => 'custom-btn--style-6',
                                ),
                            ),
                            array(
                                'type' => 'textfield',
                                'heading' => esc_html__('Button icon', 'crypterium' ),
                                'param_name' => 'i',
                                'description' => esc_html__('Add button icon.', 'crypterium' ),
                            ),
                            //animate
                            array(
                                'type' => 'textfield',
                                'heading' => esc_html__('Aos animate', 'crypterium'),
                                'param_name' => 'aos',
                                'description' => esc_html__('Please check docs for details', 'crypterium'),
                                'group' => esc_html__('Animate', 'crypterium' ),
                            ),
                            array(
                                'type' => 'textfield',
                                'heading' => esc_html__('Aos animate delay', 'crypterium'),
                                'param_name' => 'delay',
                                'description' => esc_html__('You can use numbers. Please check docs for details', 'crypterium'),
                                'group' => esc_html__('Animate', 'crypterium' ),
                            ),
                            array(
                                'type' => 'textfield',
                                'heading' => esc_html__('Aos animate duration', 'crypterium'),
                                'param_name' => 'duration',
                                'description' => esc_html__('You can use numbers. Please check docs for details', 'crypterium'),
                                'group' => esc_html__('Animate', 'crypterium' ),
                            ),
                            array(
                                'type' => 'textfield',
                                'heading' => esc_html__('Aos animate offset', 'crypterium'),
                                'param_name' => 'offsetaos',
                                'description' => esc_html__('You can use numbers. Please check docs for details', 'crypterium'),
                                'group' => esc_html__('Animate', 'crypterium' ),
                            ),
                            array(
                                'type' => 'textfield',
                                'heading' => esc_html__('Aos animate easing', 'crypterium'),
                                'param_name' => 'easing',
                                'description' => esc_html__('You can use numbers. Please check docs for details', 'crypterium'),
                                'group' => esc_html__('Animate', 'crypterium' ),
                            ),
                            array(
                                'type' => 'textfield',
                                'heading' => esc_html__('Aos animate anchor', 'crypterium'),
                                'param_name' => 'anchor',
                                'description' => esc_html__('You can use numbers. Please check docs for details', 'crypterium'),
                                'group' => esc_html__('Animate', 'crypterium' ),
                            ),
                            array(
                                'type' => 'textfield',
                                'heading' => esc_html__('Aos animate placement', 'crypterium'),
                                'param_name' => 'placement',
                                'description' => esc_html__('You can use numbers. Please check docs for details', 'crypterium'),
                                'group' => esc_html__('Animate', 'crypterium' ),
                            ),
                            array(
                                'type' => 'textfield',
                                'heading' => esc_html__('Aos animate once', 'crypterium'),
                                'param_name' => 'once',
                                'description' => esc_html__('You can use numbers. Please check docs for details', 'crypterium'),
                                'group' => esc_html__('Animate', 'crypterium' ),
                            ),
                            //toptitle
                            array(
                                'type' => 'textfield',
                                'heading' => esc_html__('Title font-size', 'crypterium'),
                                'param_name' => 'ttsize',
                                'description' => esc_html__('Change title font-size. Use number in ( px or unit )', 'crypterium'),
                                'group' => esc_html__('Custom Style', 'crypterium' ),
                            ),
                            array(
                                'type' => 'textfield',
                                'heading' => esc_html__('Title line-height', 'crypterium'),
                                'param_name' => 'ttlineh',
                                'description' => esc_html__('Change title line-height. Use number in ( px or unit )', 'crypterium'),
                                'group' => esc_html__('Custom Style', 'crypterium' ),
                            ),
                            array(
                                'type' => 'colorpicker',
                                'heading' => esc_html__('Title color', 'crypterium'),
                                'param_name' => 'ttcolor',
                                'description' => esc_html__('Change title color.', 'crypterium'),
                                'group' => esc_html__('Custom Style', 'crypterium' ),
                            ),
                            //title
                            array(
                                'type' => 'textfield',
                                'heading' => esc_html__('Title font-size', 'crypterium'),
                                'param_name' => 'tsize',
                                'description' => esc_html__('Change title font-size. Use number in ( px or unit )', 'crypterium'),
                                'group' => esc_html__('Custom Style', 'crypterium' ),
                            ),
                            array(
                                'type' => 'textfield',
                                'heading' => esc_html__('Title line-height', 'crypterium'),
                                'param_name' => 'tlineh',
                                'description' => esc_html__('Change title line-height. Use number in ( px or unit )', 'crypterium'),
                                'group' => esc_html__('Custom Style', 'crypterium' ),
                            ),
                            array(
                                'type' => 'colorpicker',
                                'heading' => esc_html__('Title color', 'crypterium'),
                                'param_name' => 'tcolor',
                                'description' => esc_html__('Change title color.', 'crypterium'),
                                'group' => esc_html__('Custom Style', 'crypterium' ),
                            ),
                            //detail
                            array(
                                'type' => 'textfield',
                                'heading' => esc_html__('Detail font-size', 'crypterium'),
                                'param_name' => 'dsize',
                                'description' => esc_html__('Change detail font-size. Use number in ( px or unit )', 'crypterium'),
                                'group' => esc_html__('Custom Style', 'crypterium' ),
                            ),
                            array(
                                'type' => 'textfield',
                                'heading' => esc_html__('Detail line-height', 'crypterium'),
                                'param_name' => 'dlineh',
                                'description' => esc_html__('Change detail line-height. Use number in ( px or unit )', 'crypterium'),
                                'group' => esc_html__('Custom Style', 'crypterium' ),
                            ),
                            array(
                                'type' => 'colorpicker',
                                'heading' => esc_html__('Detail color', 'crypterium'),
                                'param_name' => 'dcolor',
                                'description' => esc_html__('Change detail color.', 'crypterium'),
                                'group' => esc_html__('Custom Style', 'crypterium' ),
                            )
                        ) // params
                    ) // param_group
                )
            )
        );
    }
    class Crypterium_Features_Shortcode extends WPBakeryShortCode {
    }

    /*-----------------------------------------------------------------------------------*/
    /*	FEATURES2
    /*-----------------------------------------------------------------------------------*/
    add_action( 'vc_before_init', 'crypterium_features_2_shortcode_integrateWithVC' );
    function crypterium_features_2_shortcode_integrateWithVC() {
        vc_map(
            array(
                'name' => esc_html__( 'Features 2', 'crypterium' ),
                'base' => 'crypterium_features_2_shortcode',
                'icon' => 'icon-wpb-row',
                'category'=> esc_html__( 'Crypterium', 'crypterium'),
                'params' => array(
                    array(
                        'type' => 'dropdown',
                        'heading' => esc_html__('Theme section classes', 'crypterium' ),
                        'param_name' => 'sp',
                        'description' => esc_html__('You can select an option for default section paddings', 'crypterium'),
                        'value' => array(
                            esc_html__('Select options', 'crypterium' ) => '',
                            esc_html__('section (140px padding)', 'crypterium' ) => 'section',
                            esc_html__('section no padding top', 'crypterium' ) => 'section section--no-pt',
                            esc_html__('section no padding bottom', 'crypterium' ) => 'section section--no-pb',
                            esc_html__('section no padding top and bottom', 'crypterium' ) => 'section section--no-pb section--no-pt',
                        ),
                    ),
                    array(
                        'type' => 'dropdown',
                        'heading' => esc_html__('Theme section default backgrounds', 'crypterium' ),
                        'param_name' => 'bg',
                        'description' => esc_html__('You can select an option for default section paddings', 'crypterium'),
                        'value' => array(
                            esc_html__('Select options', 'crypterium' ) => 'section-no-bg',
                            esc_html__('Base background', 'crypterium' ) => 'section--base-bg',
                            esc_html__('Light background', 'crypterium' ) => 'section--light-bg',
                            esc_html__('Blue background', 'crypterium' ) => 'section--blue-bg',
                            esc_html__('Light blue background', 'crypterium' ) => 'section--light-blue-bg',
                            esc_html__('Dark background', 'crypterium' ) => 'section--dark-bg',
                        ),
                    ),
                    array(
                        'type' => 'attach_image',
                        'heading' => esc_html__('Box image', 'crypterium'),
                        'param_name' => 'img',
                        'description' => esc_html__('Add your background image', 'crypterium'),
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Top title', 'crypterium'),
                        'param_name' => 'toptitle',
                        'description' => esc_html__('Add title for item.', 'crypterium'),
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Title', 'crypterium'),
                        'param_name' => 'title',
                        'description' => esc_html__('Add title for item.', 'crypterium'),
                    ),
                    array(
                        'type' => 'textarea',
                        'heading' => esc_html__('Detail', 'crypterium'),
                        'param_name' => 'desc',
                        'description' => esc_html__('Add detail for item.', 'crypterium'),
                    ),
                    array(
                        'type' => 'dropdown',
                        'heading' => esc_html__('Heading color', 'crypterium' ),
                        'param_name' => 'h_color',
                        'description' => esc_html__('You can select color for heading general', 'crypterium' ),
                        'value' => array(
                            esc_html__('Select tag', 'crypterium' ) => '',
                            esc_html__('Default', 'crypterium' ) => 'default',
                            esc_html__('White', 'crypterium' ) => 'white',
                        ),
                    ),
                    array(
                        'type' => 'dropdown',
                        'heading' => esc_html__('Alignment', 'crypterium' ),
                        'param_name' => 'alignment',
                        'description' => esc_html__('You can select text position with alignment', 'crypterium' ),
                        'value' => array(
                            esc_html__('Select position', 'crypterium' ) => '',
                            esc_html__('Left', 'crypterium' ) => 'text--left',
                            esc_html__('Right', 'crypterium' ) => 'text--lg-right',
                            esc_html__('Center', 'crypterium' ) => 'section-heading--center',
                        ),
                    ),
                    array(
                        'type' => 'dropdown',
                        'heading' => esc_html__('Margin bottom', 'crypterium' ),
                        'param_name' => 'margin',
                        'description' => esc_html__('You can select tag for subheading font-size', 'crypterium' ),
                        'value' => array(
                            esc_html__('Select', 'crypterium' ) => '',
                            esc_html__('0', 'crypterium' ) => '0',
                            esc_html__('5', 'crypterium' ) => '5',
                            esc_html__('10', 'crypterium' ) => '10',
                            esc_html__('15', 'crypterium' ) => '15',
                            esc_html__('20', 'crypterium' ) => '20',
                            esc_html__('25', 'crypterium' ) => '25',
                            esc_html__('30', 'crypterium' ) => '30',
                            esc_html__('35', 'crypterium' ) => '35',
                            esc_html__('40', 'crypterium' ) => '40',
                            esc_html__('45', 'crypterium' ) => '45',
                            esc_html__('50', 'crypterium' ) => '50',
                            esc_html__('55', 'crypterium' ) => '55',
                            esc_html__('60', 'crypterium' ) => '60',
                        ),
                    ),
                    array(
                        'type' => 'textarea_html',
                        'heading' => esc_html__('Content', 'crypterium'),
                        'param_name' => 'content',
                        'description' => esc_html__('You can add any content', 'crypterium'),
                    ),
                    array(
                        'type' => 'vc_link',
                        'heading' => esc_html__('Button (Link)', 'crypterium' ),
                        'param_name' => 'btnlink',
                        'description' => esc_html__('Add button title and link.', 'crypterium' ),
                        'group' => esc_html__('Button', 'crypterium' ),
                    ),
                    //animate
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Aos animate', 'crypterium'),
                        'param_name' => 'aos',
                        'description' => esc_html__('Please check docs for details', 'crypterium'),
                        'group' => esc_html__('Animate', 'crypterium' ),
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Aos animate delay', 'crypterium'),
                        'param_name' => 'delay',
                        'description' => esc_html__('You can use numbers. Please check docs for details', 'crypterium'),
                        'group' => esc_html__('Animate', 'crypterium' ),
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Aos animate duration', 'crypterium'),
                        'param_name' => 'duration',
                        'description' => esc_html__('You can use numbers. Please check docs for details', 'crypterium'),
                        'group' => esc_html__('Animate', 'crypterium' ),
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Aos animate offset', 'crypterium'),
                        'param_name' => 'offset',
                        'description' => esc_html__('You can use numbers. Please check docs for details', 'crypterium'),
                        'group' => esc_html__('Animate', 'crypterium' ),
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Aos animate easing', 'crypterium'),
                        'param_name' => 'easing',
                        'description' => esc_html__('You can use numbers. Please check docs for details', 'crypterium'),
                        'group' => esc_html__('Animate', 'crypterium' ),
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Aos animate anchor', 'crypterium'),
                        'param_name' => 'anchor',
                        'description' => esc_html__('You can use numbers. Please check docs for details', 'crypterium'),
                        'group' => esc_html__('Animate', 'crypterium' ),
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Aos animate placement', 'crypterium'),
                        'param_name' => 'placement',
                        'description' => esc_html__('You can use numbers. Please check docs for details', 'crypterium'),
                        'group' => esc_html__('Animate', 'crypterium' ),
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Aos animate once', 'crypterium'),
                        'param_name' => 'once',
                        'description' => esc_html__('You can use numbers. Please check docs for details', 'crypterium'),
                        'group' => esc_html__('Animate', 'crypterium' ),
                    ),
                    //custom style
                    //title
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Top Title font-size', 'crypterium'),
                        'param_name' => 'ttsize',
                        'description' => esc_html__('Change item title font-size. Use number in ( px or unit )', 'crypterium'),
                        'group' => esc_html__('Custom Style', 'crypterium' ),
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Top Title line-height', 'crypterium'),
                        'param_name' => 'ttlineh',
                        'description' => esc_html__('Change item title line-height. Use number in ( px or unit )', 'crypterium'),
                        'group' => esc_html__('Custom Style', 'crypterium' ),
                    ),
                    array(
                        'type' => 'colorpicker',
                        'heading' => esc_html__('Top Title color', 'crypterium'),
                        'param_name' => 'ttcolor',
                        'description' => esc_html__('Change item title color.', 'crypterium'),
                        'group' => esc_html__('Custom Style', 'crypterium' ),
                    ),
                    //title
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Title font-size', 'crypterium'),
                        'param_name' => 'tsize',
                        'description' => esc_html__('Change item title font-size. Use number in ( px or unit )', 'crypterium'),
                        'group' => esc_html__('Custom Style', 'crypterium' ),
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Title line-height', 'crypterium'),
                        'param_name' => 'tlineh',
                        'description' => esc_html__('Change item title line-height. Use number in ( px or unit )', 'crypterium'),
                        'group' => esc_html__('Custom Style', 'crypterium' ),
                    ),
                    array(
                        'type' => 'colorpicker',
                        'heading' => esc_html__('Title color', 'crypterium'),
                        'param_name' => 'tcolor',
                        'description' => esc_html__('Change item title color.', 'crypterium'),
                        'group' => esc_html__('Custom Style', 'crypterium' ),
                    ),
                    //detail
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Detail font-size', 'crypterium'),
                        'param_name' => 'dtsize',
                        'description' => esc_html__('Change item detail font-size. Use number in ( px or unit )', 'crypterium'),
                        'group' => esc_html__('Custom Style', 'crypterium' ),
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Detail line-height', 'crypterium'),
                        'param_name' => 'dtlineh',
                        'description' => esc_html__('Change item detail line-height. Use number in ( px or unit )', 'crypterium'),
                        'group' => esc_html__('Custom Style', 'crypterium' ),
                    ),
                    array(
                        'type' => 'colorpicker',
                        'heading' => esc_html__('Detail color', 'crypterium'),
                        'param_name' => 'dtcolor',
                        'description' => esc_html__('Change item detail color.', 'crypterium'),
                        'group' => esc_html__('Custom Style', 'crypterium' ),
                    ),
                    //bg style
                    array(
                        'type' => 'css_editor',
                        'heading' => esc_html__('Background CSS', 'crypterium' ),
                        'param_name' => 'css',
                        'group' => esc_html__('Design', 'crypterium' ),
                    ), // and type arrays
                ) // end params
            )
        );
    }
    class Crypterium_Features_2_Shortcode extends WPBakeryShortCode {
    }


    /*-----------------------------------------------------------------------------------*/
    /*	FEATURES
    /*-----------------------------------------------------------------------------------*/
    add_action( 'vc_before_init', 'crypterium_features_3_shortcode_integrateWithVC' );
    function crypterium_features_3_shortcode_integrateWithVC() {
        vc_map(
            array(
                'name' => esc_html__( 'Features 3 - Colored', 'crypterium' ),
                'base' => 'crypterium_features_3_shortcode',
                'icon' => 'icon-wpb-row',
                'category' => esc_html__( 'Crypterium', 'crypterium'),
                'params' => array(
                    array(
                        'type' => 'dropdown',
                        'heading' => esc_html__('Shortcode type', 'crypterium' ),
                        'param_name' => 'type',
                        'description'=> esc_html__('You can select layout type', 'crypterium' ),
                        'value' => array(
                            esc_html__('Select type', 'crypterium' ) => '',
                            esc_html__('Grid', 'crypterium' ) => 'type1',
                            esc_html__('Carousel', 'crypterium' ) => 'type2',
                        ),
                    ),
                    array(
                        'type' => 'dropdown',
                        'heading' => esc_html__('Theme section classes', 'crypterium' ),
                        'param_name' => 'sp',
                        'description' => esc_html__('You can select an option for default section paddings', 'crypterium'),
                        'value' => array(
                            esc_html__('Select options', 'crypterium' ) => '',
                            esc_html__('section (140px padding)', 'crypterium' ) => 'section',
                            esc_html__('section no padding top', 'crypterium' ) => 'section section--no-pt',
                            esc_html__('section no padding bottom', 'crypterium' ) => 'section section--no-pb',
                            esc_html__('section no padding top and bottom', 'crypterium' ) => 'section section--no-pb section--no-pt',
                        ),
                    ),
                    array(
                        'type' => 'dropdown',
                        'heading' => esc_html__('Theme section default backgrounds', 'crypterium' ),
                        'param_name' => 'bg',
                        'description' => esc_html__('You can select an option for default section paddings', 'crypterium'),
                        'value' => array(
                            esc_html__('Select options', 'crypterium' ) => 'section-no-bg',
                            esc_html__('Base background', 'crypterium' ) => 'section--base-bg',
                            esc_html__('Light background', 'crypterium' ) => 'section--light-bg',
                            esc_html__('Blue background', 'crypterium' ) => 'section--blue-bg',
                            esc_html__('Light blue background', 'crypterium' ) => 'section--light-blue-bg',
                            esc_html__('Dark background', 'crypterium' ) => 'section--dark-bg',
                        ),
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Top title', 'crypterium'),
                        'param_name' => 'subtitle',
                        'description' => esc_html__('Add title for item.', 'crypterium'),
                        'dependency' => array(
                            'element' => 'type',
                            'value' => 'type2'
                        ),
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Title', 'crypterium'),
                        'param_name' => 'title',
                        'description' => esc_html__('Add title for item.', 'crypterium'),
                        'dependency' => array(
                            'element' => 'type',
                            'value' => 'type2'
                        ),
                    ),
                    array(
                        'type' => 'textarea',
                        'heading' => esc_html__('Detail', 'crypterium'),
                        'param_name' => 'desc',
                        'description' => esc_html__('Add detail for item.', 'crypterium'),
                        'dependency' => array(
                            'element' => 'type',
                            'value' => 'type2'
                        ),
                    ),

                    array(
                        'type' => 'param_group',
                        'heading' => esc_html__('Items', 'crypterium' ),
                        'param_name' => 'ploop',
                        'group' => esc_html__('Items', 'crypterium' ),
                        'params' => array(
                            array(
                                'type' => 'dropdown',
                                'heading' => esc_html__('Item color type', 'crypterium' ),
                                'param_name' => 'type',
                                'description'=> esc_html__('You can select layout type', 'crypterium' ),
                                'value' => array(
                                    esc_html__('Select type', 'crypterium' ) => '',
                                    esc_html__('Blue', 'crypterium' ) => '__item--first',
                                    esc_html__('Purple', 'crypterium' ) => '__item--second',
                                    esc_html__('Green', 'crypterium' ) => '__item--third',
                                    esc_html__('Custom Color', 'crypterium' ) => 'custom-color',
                                ),
                            ),
                            array(
                                'type' => 'colorpicker',
                                'heading' => esc_html__('Custom color', 'crypterium'),
                                'param_name' => 'customclr',
                                'description' => esc_html__('Change item color.', 'crypterium'),
                                'dependency' => array(
                                    'element' => 'type',
                                    'value' => 'custom-color'
                                ),
                            ),
                            array(
                                'type' => 'textfield',
                                'heading' => esc_html__('Title', 'crypterium'),
                                'param_name' => 'title',
                                'description' => esc_html__('Add title.', 'crypterium'),
                            ),
                            array(
                                'type' => 'textarea',
                                'heading' => esc_html__('Detail', 'crypterium'),
                                'param_name' => 'desc',
                                'description' => esc_html__('Add description or text block.', 'crypterium'),
                            ),
                            array(
                                'type' => 'attach_image',
                                'heading' => esc_html__('Column image', 'crypterium'),
                                'param_name' => 'img',
                                'description' => esc_html__('Add your column image', 'crypterium'),
                            ),
                            array(
                                'type' => 'textfield',
                                'heading' => esc_html__('Item image width', 'crypterium'),
                                'param_name' => 'img_w',
                                'description' => esc_html__('Change post image width', 'crypterium'),
                                'group' => esc_html__('Image Options', 'crypterium' ),
                            ),
                            array(
                                'type' => 'textfield',
                                'heading' => esc_html__('Item image height', 'crypterium'),
                                'param_name' => 'img_h',
                                'description' => esc_html__('Change post image height', 'crypterium'),
                                'group' => esc_html__('Image Options', 'crypterium' ),
                            ),
                            array(
                                'type' => 'vc_link',
                                'heading' => esc_html__('Icon (Link)', 'crypterium' ),
                                'param_name' => 'btnlink',
                                'description' => esc_html__('Add button title and link.', 'crypterium' ),
                            ),
                            //animate
                            array(
                                'type' => 'textfield',
                                'heading' => esc_html__('Aos animate', 'crypterium'),
                                'param_name' => 'aos',
                                'description' => esc_html__('Please check docs for details', 'crypterium'),
                                'group' => esc_html__('Animate', 'crypterium' ),
                            ),
                            array(
                                'type' => 'textfield',
                                'heading' => esc_html__('Aos animate delay', 'crypterium'),
                                'param_name' => 'delay',
                                'description' => esc_html__('You can use numbers. Please check docs for details', 'crypterium'),
                                'group' => esc_html__('Animate', 'crypterium' ),
                            ),
                            array(
                                'type' => 'textfield',
                                'heading' => esc_html__('Aos animate duration', 'crypterium'),
                                'param_name' => 'duration',
                                'description' => esc_html__('You can use numbers. Please check docs for details', 'crypterium'),
                                'group' => esc_html__('Animate', 'crypterium' ),
                            ),
                            array(
                                'type' => 'textfield',
                                'heading' => esc_html__('Aos animate offset', 'crypterium'),
                                'param_name' => 'offset',
                                'description' => esc_html__('You can use numbers. Please check docs for details', 'crypterium'),
                                'group' => esc_html__('Animate', 'crypterium' ),
                            ),
                            array(
                                'type' => 'textfield',
                                'heading' => esc_html__('Aos animate easing', 'crypterium'),
                                'param_name' => 'easing',
                                'description' => esc_html__('You can use numbers. Please check docs for details', 'crypterium'),
                                'group' => esc_html__('Animate', 'crypterium' ),
                            ),
                            array(
                                'type' => 'textfield',
                                'heading' => esc_html__('Aos animate anchor', 'crypterium'),
                                'param_name' => 'anchor',
                                'description' => esc_html__('You can use numbers. Please check docs for details', 'crypterium'),
                                'group' => esc_html__('Animate', 'crypterium' ),
                            ),
                            array(
                                'type' => 'textfield',
                                'heading' => esc_html__('Aos animate placement', 'crypterium'),
                                'param_name' => 'placement',
                                'description' => esc_html__('You can use numbers. Please check docs for details', 'crypterium'),
                                'group' => esc_html__('Animate', 'crypterium' ),
                            ),
                            array(
                                'type' => 'textfield',
                                'heading' => esc_html__('Aos animate once', 'crypterium'),
                                'param_name' => 'once',
                                'description' => esc_html__('You can use numbers. Please check docs for details', 'crypterium'),
                                'group' => esc_html__('Animate', 'crypterium' ),
                            ),
                        ), // param_group params
                    ), // param_group

                    //title
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('SubTitle font-size', 'crypterium'),
                        'param_name' => 'ttsize',
                        'description' => esc_html__('Change title font-size. Use number in ( px or unit )', 'crypterium'),
                        'group' => esc_html__('Custom Style', 'crypterium' ),
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('SubTitle line-height', 'crypterium'),
                        'param_name' => 'ttlineh',
                        'description' => esc_html__('Change title line-height. Use number in ( px or unit )', 'crypterium'),
                        'group' => esc_html__('Custom Style', 'crypterium' ),
                    ),
                    array(
                        'type' => 'colorpicker',
                        'heading' => esc_html__('SubTitle color', 'crypterium'),
                        'param_name' => 'ttcolor',
                        'description' => esc_html__('Change title color.', 'crypterium'),
                        'group' => esc_html__('Custom Style', 'crypterium' ),
                    ),
                    //title
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Title font-size', 'crypterium'),
                        'param_name' => 'tsize',
                        'description' => esc_html__('Change title font-size. Use number in ( px or unit )', 'crypterium'),
                        'group' => esc_html__('Custom Style', 'crypterium' ),
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Title line-height', 'crypterium'),
                        'param_name' => 'tlineh',
                        'description' => esc_html__('Change title line-height. Use number in ( px or unit )', 'crypterium'),
                        'group' => esc_html__('Custom Style', 'crypterium' ),
                    ),
                    array(
                        'type' => 'colorpicker',
                        'heading' => esc_html__('Title color', 'crypterium'),
                        'param_name' => 'tcolor',
                        'description' => esc_html__('Change title color.', 'crypterium'),
                        'group' => esc_html__('Custom Style', 'crypterium' ),
                    ),
                    //detail
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Detail font-size', 'crypterium'),
                        'param_name' => 'dsize',
                        'description' => esc_html__('Change detail font-size. Use number in ( px or unit )', 'crypterium'),
                        'group' => esc_html__('Custom Style', 'crypterium' ),
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Detail line-height', 'crypterium'),
                        'param_name' => 'dlineh',
                        'description' => esc_html__('Change detail line-height. Use number in ( px or unit )', 'crypterium'),
                        'group' => esc_html__('Custom Style', 'crypterium' ),
                    ),
                    array(
                        'type' => 'colorpicker',
                        'heading' => esc_html__('Detail color', 'crypterium'),
                        'param_name' => 'dcolor',
                        'description' => esc_html__('Change detail color.', 'crypterium'),
                        'group' => esc_html__('Custom Style', 'crypterium' ),
                    ),
                    //bg style
                    array(
                        'type' => 'css_editor',
                        'heading' => esc_html__('Background CSS', 'crypterium' ),
                        'param_name' => 'css',
                        'group' => esc_html__('Design', 'crypterium' ),
                    ),
                )
            )
        );
    }
    class Crypterium_Features_3_Shortcode extends WPBakeryShortCode {
    }


    /*-----------------------------------------------------------------------------------*/
    /*	FEATURES_4
    /*-----------------------------------------------------------------------------------*/
    add_action( 'vc_before_init', 'crypterium_features_4_shortcode_integrateWithVC' );
    function crypterium_features_4_shortcode_integrateWithVC() {
        vc_map(
            array(
                'name' => esc_html__( 'Features 4', 'crypterium' ),
                'base' => 'crypterium_features_4_shortcode',
                'icon' => 'icon-wpb-row',
                'category'=> esc_html__( 'Crypterium', 'crypterium'),
                'params' => array(
                    array(
                        'type' => 'dropdown',
                        'heading' => esc_html__('Theme section classes', 'crypterium' ),
                        'param_name' => 'sp',
                        'description' => esc_html__('You can select an option for default section paddings', 'crypterium'),
                        'value' => array(
                            esc_html__('Select options', 'crypterium' ) => '',
                            esc_html__('section (140px padding)', 'crypterium' ) => 'section',
                            esc_html__('section no padding top', 'crypterium' ) => 'section section--no-pt',
                            esc_html__('section no padding bottom', 'crypterium' ) => 'section section--no-pb',
                            esc_html__('section no padding top and bottom', 'crypterium' ) => 'section section--no-pb section--no-pt',
                        ),
                    ),
                    array(
                        'type' => 'dropdown',
                        'heading' => esc_html__('Theme section default backgrounds', 'crypterium' ),
                        'param_name' => 'bg',
                        'description' => esc_html__('You can select an option for default section paddings', 'crypterium'),
                        'value' => array(
                            esc_html__('Select options', 'crypterium' ) => 'section-no-bg',
                            esc_html__('Base background', 'crypterium' ) => 'section--base-bg',
                            esc_html__('Light background', 'crypterium' ) => 'section--light-bg',
                            esc_html__('Blue background', 'crypterium' ) => 'section--blue-bg',
                            esc_html__('Light blue background', 'crypterium' ) => 'section--light-blue-bg',
                            esc_html__('Dark background', 'crypterium' ) => 'section--dark-bg',
                        ),
                    ),
                    array(
                        'type' => 'attach_image',
                        'heading' => esc_html__('Box image', 'crypterium'),
                        'param_name' => 'img',
                        'description' => esc_html__('Add your background image', 'crypterium'),
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Top title', 'crypterium'),
                        'param_name' => 'subtitle',
                        'description' => esc_html__('Add title for item.', 'crypterium'),
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Title', 'crypterium'),
                        'param_name' => 'title',
                        'description' => esc_html__('Add title for item.', 'crypterium'),
                    ),
                    array(
                        'type' => 'textarea',
                        'heading' => esc_html__('Detail', 'crypterium'),
                        'param_name' => 'desc',
                        'description' => esc_html__('Add detail for item.', 'crypterium'),
                    ),
                    array(
                        'type' => 'dropdown',
                        'heading' => esc_html__('Heading color', 'crypterium' ),
                        'param_name' => 'h_color',
                        'description' => esc_html__('You can select color for heading general', 'crypterium' ),
                        'value' => array(
                            esc_html__('Select tag', 'crypterium' ) => '',
                            esc_html__('Default', 'crypterium' ) => 'default',
                            esc_html__('White', 'crypterium' ) => 'white',
                        ),
                    ),
                    array(
                        'type' => 'dropdown',
                        'heading' => esc_html__('Alignment', 'crypterium' ),
                        'param_name' => 'alignment',
                        'description' => esc_html__('You can select text position with alignment', 'crypterium' ),
                        'value' => array(
                            esc_html__('Select position', 'crypterium' ) => '',
                            esc_html__('Left', 'crypterium' ) => 'text--left',
                            esc_html__('Right', 'crypterium' ) => 'text--lg-right',
                            esc_html__('Center', 'crypterium' ) => 'section-heading--center',
                        ),
                    ),
                    array(
                        'type' => 'dropdown',
                        'heading' => esc_html__('Margin bottom', 'crypterium' ),
                        'param_name' => 'margin',
                        'description' => esc_html__('You can select tag for subheading font-size', 'crypterium' ),
                        'value' => array(
                            esc_html__('Select', 'crypterium' ) => '',
                            esc_html__('0', 'crypterium' ) => '0',
                            esc_html__('5', 'crypterium' ) => '5',
                            esc_html__('10', 'crypterium' ) => '10',
                            esc_html__('15', 'crypterium' ) => '15',
                            esc_html__('20', 'crypterium' ) => '20',
                            esc_html__('25', 'crypterium' ) => '25',
                            esc_html__('30', 'crypterium' ) => '30',
                            esc_html__('35', 'crypterium' ) => '35',
                            esc_html__('40', 'crypterium' ) => '40',
                            esc_html__('45', 'crypterium' ) => '45',
                            esc_html__('50', 'crypterium' ) => '50',
                            esc_html__('55', 'crypterium' ) => '55',
                            esc_html__('60', 'crypterium' ) => '60',
                        ),
                    ),
                    array(
                        'type' => 'textarea_html',
                        'heading' => esc_html__('Content', 'crypterium'),
                        'param_name' => 'content',
                        'description' => esc_html__('You can add any content', 'crypterium'),
                    ),
                    array(
                        'type' => 'attach_image',
                        'heading' => esc_html__('Google playstore button image', 'crypterium'),
                        'param_name' => 'img1',
                        'description' => esc_html__('Add your background image', 'crypterium'),
                        'group' => esc_html__('Button', 'crypterium' ),
                    ),
                    array(
                        'type' => 'attach_image',
                        'heading' => esc_html__('Appstore play button', 'crypterium'),
                        'param_name' => 'img2',
                        'description' => esc_html__('Add your background image', 'crypterium'),
                        'group' => esc_html__('Button', 'crypterium' ),
                    ),
                    array(
                        'type' => 'vc_link',
                        'heading' => esc_html__('Google playstore button (Link)', 'crypterium' ),
                        'param_name' => 'btnlink',
                        'description' => esc_html__('Add button title and link.', 'crypterium' ),
                        'group' => esc_html__('Button', 'crypterium' ),
                    ),
                    array(
                        'type' => 'vc_link',
                        'heading' => esc_html__('Button (Link)', 'crypterium' ),
                        'param_name' => 'btnlink1',
                        'description' => esc_html__('Add button title and link.', 'crypterium' ),
                        'group' => esc_html__('Button', 'crypterium' ),
                    ),
                    //animate
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Aos animate', 'crypterium'),
                        'param_name' => 'aos',
                        'description' => esc_html__('Please check docs for details', 'crypterium'),
                        'group' => esc_html__('Animate', 'crypterium' ),
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Aos animate delay', 'crypterium'),
                        'param_name' => 'delay',
                        'description' => esc_html__('You can use numbers. Please check docs for details', 'crypterium'),
                        'group' => esc_html__('Animate', 'crypterium' ),
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Aos animate duration', 'crypterium'),
                        'param_name' => 'duration',
                        'description' => esc_html__('You can use numbers. Please check docs for details', 'crypterium'),
                        'group' => esc_html__('Animate', 'crypterium' ),
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Aos animate offset', 'crypterium'),
                        'param_name' => 'offset',
                        'description' => esc_html__('You can use numbers. Please check docs for details', 'crypterium'),
                        'group' => esc_html__('Animate', 'crypterium' ),
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Aos animate easing', 'crypterium'),
                        'param_name' => 'easing',
                        'description' => esc_html__('You can use numbers. Please check docs for details', 'crypterium'),
                        'group' => esc_html__('Animate', 'crypterium' ),
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Aos animate anchor', 'crypterium'),
                        'param_name' => 'anchor',
                        'description' => esc_html__('You can use numbers. Please check docs for details', 'crypterium'),
                        'group' => esc_html__('Animate', 'crypterium' ),
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Aos animate placement', 'crypterium'),
                        'param_name' => 'placement',
                        'description' => esc_html__('You can use numbers. Please check docs for details', 'crypterium'),
                        'group' => esc_html__('Animate', 'crypterium' ),
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Aos animate once', 'crypterium'),
                        'param_name' => 'once',
                        'description' => esc_html__('You can use numbers. Please check docs for details', 'crypterium'),
                        'group' => esc_html__('Animate', 'crypterium' ),
                    ),
                    //animate
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Aos animate', 'crypterium'),
                        'param_name' => 'aos2',
                        'description' => esc_html__('Please check docs for details', 'crypterium'),
                        'group' => esc_html__('Animate 2', 'crypterium' ),
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Aos animate delay', 'crypterium'),
                        'param_name' => 'delay2',
                        'description' => esc_html__('You can use numbers. Please check docs for details', 'crypterium'),
                        'group' => esc_html__('Animate 2', 'crypterium' ),
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Aos animate duration', 'crypterium'),
                        'param_name' => 'duration2',
                        'description' => esc_html__('You can use numbers. Please check docs for details', 'crypterium'),
                        'group' => esc_html__('Animate 2', 'crypterium' ),
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Aos animate offset', 'crypterium'),
                        'param_name' => 'offset2',
                        'description' => esc_html__('You can use numbers. Please check docs for details', 'crypterium'),
                        'group' => esc_html__('Animate 2', 'crypterium' ),
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Aos animate easing', 'crypterium'),
                        'param_name' => 'easing2',
                        'description' => esc_html__('You can use numbers. Please check docs for details', 'crypterium'),
                        'group' => esc_html__('Animate 2', 'crypterium' ),
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Aos animate anchor', 'crypterium'),
                        'param_name' => 'anchor2',
                        'description' => esc_html__('You can use numbers. Please check docs for details', 'crypterium'),
                        'group' => esc_html__('Animate 2', 'crypterium' ),
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Aos animate placement', 'crypterium'),
                        'param_name' => 'placement2',
                        'description' => esc_html__('You can use numbers. Please check docs for details', 'crypterium'),
                        'group' => esc_html__('Animate 2', 'crypterium' ),
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Aos animate once', 'crypterium'),
                        'param_name' => 'once2',
                        'description' => esc_html__('You can use numbers. Please check docs for details', 'crypterium'),
                        'group' => esc_html__('Animate 2', 'crypterium' ),
                    ),
                    //custom style
                    //title
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Top Title font-size', 'crypterium'),
                        'param_name' => 'ttsize',
                        'description' => esc_html__('Change item title font-size. Use number in ( px or unit )', 'crypterium'),
                        'group' => esc_html__('Custom Style', 'crypterium' ),
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Top Title line-height', 'crypterium'),
                        'param_name' => 'ttlineh',
                        'description' => esc_html__('Change item title line-height. Use number in ( px or unit )', 'crypterium'),
                        'group' => esc_html__('Custom Style', 'crypterium' ),
                    ),
                    array(
                        'type' => 'colorpicker',
                        'heading' => esc_html__('Top Title color', 'crypterium'),
                        'param_name' => 'ttcolor',
                        'description' => esc_html__('Change item title color.', 'crypterium'),
                        'group' => esc_html__('Custom Style', 'crypterium' ),
                    ),
                    //title
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Title font-size', 'crypterium'),
                        'param_name' => 'tsize',
                        'description' => esc_html__('Change item title font-size. Use number in ( px or unit )', 'crypterium'),
                        'group' => esc_html__('Custom Style', 'crypterium' ),
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Title line-height', 'crypterium'),
                        'param_name' => 'tlineh',
                        'description' => esc_html__('Change item title line-height. Use number in ( px or unit )', 'crypterium'),
                        'group' => esc_html__('Custom Style', 'crypterium' ),
                    ),
                    array(
                        'type' => 'colorpicker',
                        'heading' => esc_html__('Title color', 'crypterium'),
                        'param_name' => 'tcolor',
                        'description' => esc_html__('Change item title color.', 'crypterium'),
                        'group' => esc_html__('Custom Style', 'crypterium' ),
                    ),
                    //detail
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Detail font-size', 'crypterium'),
                        'param_name' => 'dtsize',
                        'description' => esc_html__('Change item detail font-size. Use number in ( px or unit )', 'crypterium'),
                        'group' => esc_html__('Custom Style', 'crypterium' ),
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Detail line-height', 'crypterium'),
                        'param_name' => 'dtlineh',
                        'description' => esc_html__('Change item detail line-height. Use number in ( px or unit )', 'crypterium'),
                        'group' => esc_html__('Custom Style', 'crypterium' ),
                    ),
                    array(
                        'type' => 'colorpicker',
                        'heading' => esc_html__('Detail color', 'crypterium'),
                        'param_name' => 'dtcolor',
                        'description' => esc_html__('Change item detail color.', 'crypterium'),
                        'group' => esc_html__('Custom Style', 'crypterium' ),
                    ),
                    //bg style
                    array(
                        'type' => 'css_editor',
                        'heading' => esc_html__('Background CSS', 'crypterium' ),
                        'param_name' => 'css',
                        'group' => esc_html__('Design', 'crypterium' ),
                    ), // and type arrays
                ) // end params
            )
        );
    }
    class Crypterium_Features_4_Shortcode extends WPBakeryShortCode {
    }

    /*-----------------------------------------------------------------------------------*/
    /*	FEATURES_4
    /*-----------------------------------------------------------------------------------*/
    add_action( 'vc_before_init', 'crypterium_features_5_shortcode_integrateWithVC' );
    function crypterium_features_5_shortcode_integrateWithVC() {
        vc_map(
            array(
                'name' => esc_html__( 'Features Grid', 'crypterium' ),
                'base' => 'crypterium_features_5_shortcode',
                'icon' => 'icon-wpb-row',
                'category'=> esc_html__( 'Crypterium', 'crypterium'),
                'params' => array(
                    array(
                        'type' => 'dropdown',
                        'heading' => esc_html__('Alignment', 'crypterium' ),
                        'param_name' => 'alignment',
                        'description' => esc_html__('You can select text position with alignment', 'crypterium' ),
                        'value' => array(
                            esc_html__('Select position', 'crypterium' ) => '',
                            esc_html__('Left', 'crypterium' ) => 'text--sm-left',
                            esc_html__('Right', 'crypterium' ) => 'text--sm-right',
                            esc_html__('Center', 'crypterium' ) => 'text--sm-center',
                        ),
                    ),
                    array(
                        'type' => 'attach_image',
                        'heading' => esc_html__('Box image', 'crypterium'),
                        'param_name' => 'img',
                        'description' => esc_html__('Add your background image', 'crypterium'),
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Image width', 'crypterium'),
                        'param_name' => 'img_w',
                        'description' => esc_html__('Control your image width', 'crypterium'),
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Image height', 'crypterium'),
                        'param_name' => 'img_h',
                        'description' => esc_html__('Control your image width', 'crypterium'),
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Title', 'crypterium'),
                        'param_name' => 'title',
                        'description' => esc_html__('Add title for item.', 'crypterium'),
                    ),
                    array(
                        'type' => 'textarea',
                        'heading' => esc_html__('Detail', 'crypterium'),
                        'param_name' => 'desc',
                        'description' => esc_html__('Add detail for item.', 'crypterium'),
                    ),
                    array(
                        'type' => 'textarea_html',
                        'heading' => esc_html__('Content', 'crypterium'),
                        'param_name' => 'content',
                        'description' => esc_html__('You can add any content', 'crypterium'),
                    ),
                    //animate
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Aos animate', 'crypterium'),
                        'param_name' => 'aos',
                        'description' => esc_html__('Please check docs for details', 'crypterium'),
                        'group' => esc_html__('Animate', 'crypterium' ),
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Aos animate delay', 'crypterium'),
                        'param_name' => 'delay',
                        'description' => esc_html__('You can use numbers. Please check docs for details', 'crypterium'),
                        'group' => esc_html__('Animate', 'crypterium' ),
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Aos animate duration', 'crypterium'),
                        'param_name' => 'duration',
                        'description' => esc_html__('You can use numbers. Please check docs for details', 'crypterium'),
                        'group' => esc_html__('Animate', 'crypterium' ),
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Aos animate offset', 'crypterium'),
                        'param_name' => 'offset',
                        'description' => esc_html__('You can use numbers. Please check docs for details', 'crypterium'),
                        'group' => esc_html__('Animate', 'crypterium' ),
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Aos animate easing', 'crypterium'),
                        'param_name' => 'easing',
                        'description' => esc_html__('You can use numbers. Please check docs for details', 'crypterium'),
                        'group' => esc_html__('Animate', 'crypterium' ),
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Aos animate anchor', 'crypterium'),
                        'param_name' => 'anchor',
                        'description' => esc_html__('You can use numbers. Please check docs for details', 'crypterium'),
                        'group' => esc_html__('Animate', 'crypterium' ),
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Aos animate placement', 'crypterium'),
                        'param_name' => 'placement',
                        'description' => esc_html__('You can use numbers. Please check docs for details', 'crypterium'),
                        'group' => esc_html__('Animate', 'crypterium' ),
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Aos animate once', 'crypterium'),
                        'param_name' => 'once',
                        'description' => esc_html__('You can use numbers. Please check docs for details', 'crypterium'),
                        'group' => esc_html__('Animate', 'crypterium' ),
                    ),
                    //custom style
                    //title
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Title font-size', 'crypterium'),
                        'param_name' => 'tsize',
                        'description' => esc_html__('Change item title font-size. Use number in ( px or unit )', 'crypterium'),
                        'group' => esc_html__('Custom Style', 'crypterium' ),
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Title line-height', 'crypterium'),
                        'param_name' => 'tlineh',
                        'description' => esc_html__('Change item title line-height. Use number in ( px or unit )', 'crypterium'),
                        'group' => esc_html__('Custom Style', 'crypterium' ),
                    ),
                    array(
                        'type' => 'colorpicker',
                        'heading' => esc_html__('Title color', 'crypterium'),
                        'param_name' => 'tcolor',
                        'description' => esc_html__('Change item title color.', 'crypterium'),
                        'group' => esc_html__('Custom Style', 'crypterium' ),
                    ),
                    //detail
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Detail font-size', 'crypterium'),
                        'param_name' => 'dtsize',
                        'description' => esc_html__('Change item detail font-size. Use number in ( px or unit )', 'crypterium'),
                        'group' => esc_html__('Custom Style', 'crypterium' ),
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Detail line-height', 'crypterium'),
                        'param_name' => 'dtlineh',
                        'description' => esc_html__('Change item detail line-height. Use number in ( px or unit )', 'crypterium'),
                        'group' => esc_html__('Custom Style', 'crypterium' ),
                    ),
                    array(
                        'type' => 'colorpicker',
                        'heading' => esc_html__('Detail color', 'crypterium'),
                        'param_name' => 'dtcolor',
                        'description' => esc_html__('Change item detail color.', 'crypterium'),
                        'group' => esc_html__('Custom Style', 'crypterium' ),
                    ),
                    //bg style
                    array(
                        'type' => 'css_editor',
                        'heading' => esc_html__('Background CSS', 'crypterium' ),
                        'param_name' => 'css',
                        'group' => esc_html__('Design', 'crypterium' ),
                    ), // and type arrays
                )
            )
        ); // vc_map end
    }
    class Crypterium_Features_5_Shortcode extends WPBakeryShortCode {
    }


    /*-----------------------------------------------------------------------------------*/
    /*	Heading
    /*-----------------------------------------------------------------------------------*/
    add_action( 'vc_before_init', 'crypterium_section_heading_shortcode_integrateWithVC' );
    function crypterium_section_heading_shortcode_integrateWithVC() {
        vc_map(
            array(
                'name' => esc_html__( 'Section Heading', 'crypterium' ),
                'base' => 'crypterium_section_heading_shortcode',
                'icon' => 'icon-wpb-row',
                'category' => esc_html__( 'Crypterium', 'crypterium'),
                'params' => array(
                    array(
                        'type' => 'dropdown',
                        'heading' => esc_html__('Heading color', 'crypterium' ),
                        'param_name' => 'h_color',
                        'description' => esc_html__('You can select color for heading general', 'crypterium' ),
                        'value' => array(
                            esc_html__('Select tag', 'crypterium' ) => '',
                            esc_html__('Default', 'crypterium' ) => 'default',
                            esc_html__('White', 'crypterium' ) => 'white',
                        ),
                    ),
                    array(
                        'type' => 'textarea',
                        'heading' => esc_html__('Subheading', 'crypterium'),
                        'param_name' => 'subtitle',
                        'description' => esc_html__('Add subheading for section.', 'crypterium'),
                    ),
                    array(
                        'type' => 'dropdown',
                        'heading' => esc_html__('Subtitle tag', 'crypterium' ),
                        'param_name' => 'subtag',
                        'description' => esc_html__('You can select tag for subheading', 'crypterium' ),
                        'value' => array(
                            esc_html__('Select tag', 'crypterium' ) => '',
                            esc_html__('h1', 'crypterium' ) => 'h1',
                            esc_html__('h2', 'crypterium' ) => 'h2',
                            esc_html__('h3', 'crypterium' ) => 'h3',
                            esc_html__('h4', 'crypterium' ) => 'h4',
                            esc_html__('h5', 'crypterium' ) => 'h5',
                            esc_html__('h6', 'crypterium' ) => 'h6',
                            esc_html__('p', 'crypterium' ) => 'p',
                            esc_html__('div', 'crypterium' ) => 'div',
                        ),
                    ),
                    //title
                    array(
                        'type' => 'textarea',
                        'heading' => esc_html__('Heading', 'crypterium'),
                        'param_name' => 'title',
                        'description' => esc_html__('Add heading for section.', 'crypterium'),
                    ),
                    array(
                        'type' => 'dropdown',
                        'heading' => esc_html__('Heading tag', 'crypterium' ),
                        'param_name' => 'titletag',
                        'description' => esc_html__('You can select tag for title', 'crypterium' ),
                        'value' => array(
                            esc_html__('Select tag', 'crypterium' ) => '',
                            esc_html__('h1', 'crypterium' ) => 'h1',
                            esc_html__('h2', 'crypterium' ) => 'h2',
                            esc_html__('h3', 'crypterium' ) => 'h3',
                            esc_html__('h4', 'crypterium' ) => 'h4',
                            esc_html__('h5', 'crypterium' ) => 'h5',
                            esc_html__('h6', 'crypterium' ) => 'h6',
                            esc_html__('p', 'crypterium' ) => 'p',
                            esc_html__('div', 'crypterium' ) => 'div',
                        ),
                    ),
                    //desc
                    array(
                        'type' => 'textarea',
                        'heading' => esc_html__('Description', 'crypterium'),
                        'param_name' => 'desc',
                        'description' => esc_html__('Add description for section.', 'crypterium'),
                    ),
                    array(
                        'type' => 'dropdown',
                        'heading' => esc_html__('Description tag', 'crypterium' ),
                        'param_name' => 'desctag',
                        'description' => esc_html__('You can select tag for description', 'crypterium' ),
                        'value' => array(
                            esc_html__('Select tag', 'crypterium' ) => '',
                            esc_html__('h1', 'crypterium' ) => 'h1',
                            esc_html__('h2', 'crypterium' ) => 'h2',
                            esc_html__('h3', 'crypterium' ) => 'h3',
                            esc_html__('h4', 'crypterium' ) => 'h4',
                            esc_html__('h5', 'crypterium' ) => 'h5',
                            esc_html__('h6', 'crypterium' ) => 'h6',
                            esc_html__('p', 'crypterium' ) => 'p',
                            esc_html__('div', 'crypterium' ) => 'div',
                        ),
                    ),
                    array(
                        'type' => 'dropdown',
                        'heading' => esc_html__('Alignment', 'crypterium' ),
                        'param_name' => 'alignment',
                        'description' => esc_html__('You can select text position with alignment', 'crypterium' ),
                        'value' => array(
                            esc_html__('Select position', 'crypterium' ) => '',
                            esc_html__('Left', 'crypterium' ) => 'text--left',
                            esc_html__('Right', 'crypterium' ) => 'text--lg-right',
                            esc_html__('Center', 'crypterium' ) => 'section-heading--center',
                        ),
                    ),
                    array(
                        'type' => 'dropdown',
                        'heading' => esc_html__('Margin bottom', 'crypterium' ),
                        'param_name' => 'margin',
                        'description' => esc_html__('You can select tag for subheading font-size', 'crypterium' ),
                        'value' => array(
                            esc_html__('Select', 'crypterium' ) => '',
                            esc_html__('0', 'crypterium' ) => '0',
                            esc_html__('5', 'crypterium' ) => '5',
                            esc_html__('10', 'crypterium' ) => '10',
                            esc_html__('15', 'crypterium' ) => '15',
                            esc_html__('20', 'crypterium' ) => '20',
                            esc_html__('25', 'crypterium' ) => '25',
                            esc_html__('30', 'crypterium' ) => '30',
                            esc_html__('35', 'crypterium' ) => '35',
                            esc_html__('40', 'crypterium' ) => '40',
                            esc_html__('45', 'crypterium' ) => '45',
                            esc_html__('50', 'crypterium' ) => '50',
                            esc_html__('55', 'crypterium' ) => '55',
                            esc_html__('60', 'crypterium' ) => '60',
                        ),
                    ),
                    //animate
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Aos animate', 'crypterium'),
                        'param_name' => 'aos',
                        'description' => esc_html__('Please check docs for details', 'crypterium'),
                        'group' => esc_html__('Animate', 'crypterium' ),
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Aos animate delay', 'crypterium'),
                        'param_name' => 'delay',
                        'description' => esc_html__('You can use numbers. Please check docs for details', 'crypterium'),
                        'group' => esc_html__('Animate', 'crypterium' ),
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Aos animate duration', 'crypterium'),
                        'param_name' => 'duration',
                        'description' => esc_html__('You can use numbers. Please check docs for details', 'crypterium'),
                        'group' => esc_html__('Animate', 'crypterium' ),
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Aos animate offset', 'crypterium'),
                        'param_name' => 'offset',
                        'description' => esc_html__('You can use numbers. Please check docs for details', 'crypterium'),
                        'group' => esc_html__('Animate', 'crypterium' ),
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Aos animate easing', 'crypterium'),
                        'param_name' => 'easing',
                        'description' => esc_html__('You can use numbers. Please check docs for details', 'crypterium'),
                        'group' => esc_html__('Animate', 'crypterium' ),
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Aos animate anchor', 'crypterium'),
                        'param_name' => 'anchor',
                        'description' => esc_html__('You can use numbers. Please check docs for details', 'crypterium'),
                        'group' => esc_html__('Animate', 'crypterium' ),
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Aos animate placement', 'crypterium'),
                        'param_name' => 'placement',
                        'description' => esc_html__('You can use numbers. Please check docs for details', 'crypterium'),
                        'group' => esc_html__('Animate', 'crypterium' ),
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Aos animate once', 'crypterium'),
                        'param_name' => 'once',
                        'description' => esc_html__('You can use numbers. Please check docs for details', 'crypterium'),
                        'group' => esc_html__('Animate', 'crypterium' ),
                    ),
                    //custom style
                    //title
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Subtitle font-size', 'crypterium'),
                        'param_name' => 'ttsize',
                        'description' => esc_html__('Change subtitle font-size. Use number in ( px or unit )', 'crypterium'),
                        'group' => esc_html__('Custom Style', 'crypterium' ),
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Subtitle line-height', 'crypterium'),
                        'param_name' => 'ttlineh',
                        'description' => esc_html__('Change subtitle line-height. Use number in ( px or unit )', 'crypterium'),
                        'group' => esc_html__('Custom Style', 'crypterium' ),
                    ),
                    array(
                        'type' => 'colorpicker',
                        'heading' => esc_html__('Subtitle color', 'crypterium'),
                        'param_name' => 'ttcolor',
                        'description' => esc_html__('Change subtitle color.', 'crypterium'),
                        'group' => esc_html__('Custom Style', 'crypterium' ),
                    ),
                    //title
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Heading font-size', 'crypterium'),
                        'param_name' => 'tsize',
                        'description' => esc_html__('Change heading font-size. Use number in ( px or unit )', 'crypterium'),
                        'group' => esc_html__('Custom Style', 'crypterium' ),
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Heading line-height', 'crypterium'),
                        'param_name' => 'tlineh',
                        'description' => esc_html__('Change heading line-height. Use number in ( px or unit )', 'crypterium'),
                        'group' => esc_html__('Custom Style', 'crypterium' ),
                    ),
                    array(
                        'type' => 'colorpicker',
                        'heading' => esc_html__('Heading color', 'crypterium'),
                        'param_name' => 'tcolor',
                        'description' => esc_html__('Change heading color.', 'crypterium'),
                        'group' => esc_html__('Custom Style', 'crypterium' ),
                    ),
                    //detail
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Description font-size', 'crypterium'),
                        'param_name' => 'dtsize',
                        'description' => esc_html__('Change description font-size. Use number in ( px or unit )', 'crypterium'),
                        'group' => esc_html__('Custom Style', 'crypterium' ),
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Description line-height', 'crypterium'),
                        'param_name' => 'dtlineh',
                        'description' => esc_html__('Change description line-height. Use number in ( px or unit )', 'crypterium'),
                        'group' => esc_html__('Custom Style', 'crypterium' ),
                    ),
                    array(
                        'type' => 'colorpicker',
                        'heading' => esc_html__('Description color', 'crypterium'),
                        'param_name' => 'dtcolor',
                        'description' => esc_html__('Change description color.', 'crypterium'),
                        'group' => esc_html__('Custom Style', 'crypterium' ),
                    ),
                    //bg style
                    array(
                        'type' => 'css_editor',
                        'heading' => esc_html__('Background CSS', 'crypterium' ),
                        'param_name' => 'css',
                        'group' => esc_html__('Background options', 'crypterium' ),
                    ),
                )
            )
        );
    }
    class Crypterium_Section_Heading_Shortcode extends WPBakeryShortCode {
    }

    /*-----------------------------------------------------------------------------------*/
    /*	Calculator
    /*-----------------------------------------------------------------------------------*/
    add_action( 'vc_before_init', 'crypterium_crypto_calc_shortcode_integrateWithVC' );
    function crypterium_crypto_calc_shortcode_integrateWithVC() {
        vc_map(
            array(
                'name' => esc_html__( 'Calculator', 'crypterium' ),
                'base' => 'crypterium_crypto_calc_shortcode',
                'icon' => 'icon-wpb-row',
                'category' => esc_html__( 'Crypterium', 'crypterium'),
                'params' => array(
                    array(
                        'type' => 'dropdown',
                        'heading' => esc_html__('Theme section classes', 'crypterium' ),
                        'param_name' => 'sp',
                        'description' => esc_html__('You can select an option for default section paddings', 'crypterium'),
                        'value' => array(
                            esc_html__('Select options', 'crypterium' ) => '',
                            esc_html__('section (140px padding)', 'crypterium' ) => 'section',
                            esc_html__('section no padding top', 'crypterium' ) => 'section section--no-pt',
                            esc_html__('section no padding bottom', 'crypterium' ) => 'section section--no-pb',
                            esc_html__('section no padding top and bottom', 'crypterium' ) => 'section section--no-pb section--no-pt',
                        ),
                    ),
                    array(
                        'type' => 'dropdown',
                        'heading' => esc_html__('Theme section default backgrounds', 'crypterium' ),
                        'param_name' => 'bg',
                        'description' => esc_html__('You can select an option for default section paddings', 'crypterium'),
                        'value' => array(
                            esc_html__('Select options', 'crypterium' ) => 'section-no-bg',
                            esc_html__('Base background', 'crypterium' ) => 'section--base-bg',
                            esc_html__('Light background', 'crypterium' ) => 'section--light-bg',
                            esc_html__('Blue background', 'crypterium' ) => 'section--blue-bg',
                            esc_html__('Light blue background', 'crypterium' ) => 'section--light-blue-bg',
                            esc_html__('Dark background', 'crypterium' ) => 'section--dark-bg',
                        ),
                    ),
                    array(
                        'type' => 'dropdown',
                        'heading' => esc_html__('Gradient', 'crypterium' ),
                        'param_name' => 'pattern',
                        'description' => esc_html__('You can use this option for control gradient', 'crypterium' ),
                        'value' => array(
                            esc_html__('Select option', 'crypterium' ) => '',
                            esc_html__('show', 'crypterium' ) => 'show',
                            esc_html__('Hide', 'crypterium' ) => 'hide',
                        ),
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Top title', 'crypterium'),
                        'param_name' => 'subtitle',
                        'description' => esc_html__('Add subtitle', 'crypterium'),
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Title', 'crypterium'),
                        'param_name' => 'title',
                        'description' => esc_html__('Add title', 'crypterium'),
                    ),
                    array(
                        'type' => 'dropdown',
                        'heading' => esc_html__('Heading color', 'crypterium' ),
                        'param_name' => 'h_color',
                        'description' => esc_html__('You can select color for heading general', 'crypterium' ),
                        'value' => array(
                            esc_html__('Select tag', 'crypterium' ) => '',
                            esc_html__('Default', 'crypterium' ) => 'default',
                            esc_html__('White', 'crypterium' ) => 'white',
                        ),
                    ),
                    array(
                        'type' => 'dropdown',
                        'heading' => esc_html__('Alignment', 'crypterium' ),
                        'param_name' => 'alignment',
                        'description' => esc_html__('You can select text position with alignment', 'crypterium' ),
                        'value' => array(
                            esc_html__('Select position', 'crypterium' ) => '',
                            esc_html__('Left', 'crypterium' ) => 'text--left',
                            esc_html__('Right', 'crypterium' ) => 'text--lg-right',
                            esc_html__('Center', 'crypterium' ) => 'section-heading--center',
                        ),
                    ),
                    array(
                        'type' => 'dropdown',
                        'heading' => esc_html__('Margin bottom', 'crypterium' ),
                        'param_name' => 'margin',
                        'description' => esc_html__('You can select tag for subheading font-size', 'crypterium' ),
                        'value' => array(
                            esc_html__('Select', 'crypterium' ) => '',
                            esc_html__('0', 'crypterium' ) => '0',
                            esc_html__('5', 'crypterium' ) => '5',
                            esc_html__('10', 'crypterium' ) => '10',
                            esc_html__('15', 'crypterium' ) => '15',
                            esc_html__('20', 'crypterium' ) => '20',
                            esc_html__('25', 'crypterium' ) => '25',
                            esc_html__('30', 'crypterium' ) => '30',
                            esc_html__('35', 'crypterium' ) => '35',
                            esc_html__('40', 'crypterium' ) => '40',
                            esc_html__('45', 'crypterium' ) => '45',
                            esc_html__('50', 'crypterium' ) => '50',
                            esc_html__('55', 'crypterium' ) => '55',
                            esc_html__('60', 'crypterium' ) => '60',
                        ),
                    ),
                    array(
                        'type' => 'vc_link',
                        'heading' => esc_html__('Button (Link)', 'crypterium' ),
                        'param_name' => 'btnlink',
                        'description' => esc_html__('Add button title and link.', 'crypterium' ),
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Give title', 'crypterium'),
                        'param_name' => 'give',
                        'description' => esc_html__('Add title', 'crypterium'),
                        'group' => esc_html__('Form', 'crypterium' ),
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Get title', 'crypterium'),
                        'param_name' => 'get',
                        'description' => esc_html__('Add title', 'crypterium'),
                        'group' => esc_html__('Form', 'crypterium' ),
                    ),
                    //detail
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Description font-size', 'crypterium'),
                        'param_name' => 'tsize',
                        'description' => esc_html__('Change description font-size. Use number in ( px or unit )', 'crypterium'),
                        'group' => esc_html__('Custom Style', 'crypterium' ),
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Description line-height', 'crypterium'),
                        'param_name' => 'tlineh',
                        'description' => esc_html__('Change description line-height. Use number in ( px or unit )', 'crypterium'),
                        'group' => esc_html__('Custom Style', 'crypterium' ),
                    ),
                    array(
                        'type' => 'colorpicker',
                        'heading' => esc_html__('Description color', 'crypterium'),
                        'param_name' => 'tcolor',
                        'description' => esc_html__('Change description color.', 'crypterium'),
                        'group' => esc_html__('Custom Style', 'crypterium' ),
                    ),
                    //detail
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Top title font-size', 'crypterium'),
                        'param_name' => 'ttsize',
                        'description' => esc_html__('Change top title font size. Use number in ( px or unit )', 'crypterium'),
                        'group' => esc_html__('Custom Style', 'crypterium' ),
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Top title line-height', 'crypterium'),
                        'param_name' => 'ttlineh',
                        'description' => esc_html__('Change top title line-height. Use number in ( px or unit )', 'crypterium'),
                        'group' => esc_html__('Custom Style', 'crypterium' ),
                    ),
                    array(
                        'type' => 'colorpicker',
                        'heading' => esc_html__('Top title color', 'crypterium'),
                        'param_name' => 'ttcolor',
                        'description' => esc_html__('Change top title color.', 'crypterium'),
                        'group' => esc_html__('Custom Style', 'crypterium' ),
                    ),
                    array(
                        'type' => 'css_editor',
                        'heading' => esc_html__('Background CSS', 'crypterium' ),
                        'param_name' => 'bgcss',
                        'group' => esc_html__('Background options', 'crypterium' ),
                    ),
                )
            )
        );
    }
    class Crypterium_Crypto_Calc_Shortcode extends WPBakeryShortCode {
    }

    /*-----------------------------------------------------------------------------------*/
    /*	BLOG Crypterium
    /*-----------------------------------------------------------------------------------*/
    add_action( 'vc_before_init', 'crypterium_blog_shortcode_integrateWithVC' );
    function crypterium_blog_shortcode_integrateWithVC() {
        vc_map(
            array(
                'name' => esc_html__('Blog ( Default Post )', 'crypterium'),
                'base' => 'crypterium_blog_shortcode',
                'icon' => 'icon-wpb-row',
                'category' => esc_html__('Crypterium', 'crypterium'),
                'params' => array(
                    array(
                        'type' => 'dropdown',
                        'heading' => esc_html__('Blog layout', 'crypterium' ),
                        'param_name' => 'type',
                        'description' => esc_html__('Select a type', 'crypterium'),
                        'value' => array(
                            esc_html__('Select options', 'crypterium' ) => '',
                            esc_html__('Carousel', 'crypterium' ) => 'b1',
                            esc_html__('Masonry', 'crypterium' ) => 'b2',
                        ),
                    ),
                    array(
                        'type' => 'dropdown',
                        'heading' => esc_html__('Theme section classes', 'crypterium' ),
                        'param_name' => 'sp',
                        'description' => esc_html__('You can select an option for default section paddings', 'crypterium'),
                        'value' => array(
                            esc_html__('Select options', 'crypterium' ) => '',
                            esc_html__('section (140px padding)', 'crypterium' ) => 'section',
                            esc_html__('section no padding top', 'crypterium' ) => 'section section--no-pt',
                            esc_html__('section no padding bottom', 'crypterium' ) => 'section section--no-pb',
                            esc_html__('section no padding top and bottom', 'crypterium' ) => 'section section--no-pb section--no-pt',
                        ),
                    ),
                    array(
                        'type' => 'dropdown',
                        'heading' => esc_html__('Theme section default backgrounds', 'crypterium' ),
                        'param_name' => 'bg',
                        'description' => esc_html__('You can select an option for default section paddings', 'crypterium'),
                        'value' => array(
                            esc_html__('Select options', 'crypterium' ) => 'section-no-bg',
                            esc_html__('Base background', 'crypterium' ) => 'section--base-bg',
                            esc_html__('Light background', 'crypterium' ) => 'section--light-bg',
                            esc_html__('Blue background', 'crypterium' ) => 'section--blue-bg',
                            esc_html__('Light blue background', 'crypterium' ) => 'section--light-blue-bg',
                            esc_html__('Dark background', 'crypterium' ) => 'section--dark-bg',
                        ),
                    ),
                    array(
                        'type' => 'dropdown',
                        'heading' => esc_html__('Box image visibility', 'crypterium' ),
                        'param_name' => 'showimg',
                        'description' => esc_html__('You can select button link type', 'crypterium' ),
                        'value' => array(
                            esc_html__('Select type', 'crypterium' ) => '',
                            esc_html__('show', 'crypterium' ) => 'yes',
                            esc_html__('hide', 'crypterium' ) => 'no',
                        ),
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Image width', 'crypterium'),
                        'param_name' => 'imgw',
                        'description' => esc_html__('Use simple number.Default 642', 'crypterium'),
                        'edit_field_class' => 'vc_col-sm-6',
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Image height', 'crypterium'),
                        'param_name' => 'imgh',
                        'description' => esc_html__('Use simple number.Default 430', 'crypterium'),
                        'edit_field_class' => 'vc_col-sm-6',
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Section sub title', 'crypterium'),
                        'param_name' => 'subtitle',
                        'description' => esc_html__('Add section subtitle', 'crypterium'),
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Section title', 'crypterium'),
                        'param_name' => 'title',
                        'description' => esc_html__('Add section heading', 'crypterium'),
                    ),
                    array(
                        'type' => 'textarea',
                        'heading' => esc_html__('Section description', 'crypterium'),
                        'param_name' => 'desc',
                        'description' => esc_html__('Add section heading', 'crypterium'),
                    ),
                    array(
                        'type' => 'dropdown',
                        'heading' => esc_html__('Heading color', 'crypterium' ),
                        'param_name' => 'h_color',
                        'description' => esc_html__('You can select color for heading general', 'crypterium' ),
                        'value' => array(
                            esc_html__('Select tag', 'crypterium' ) => '',
                            esc_html__('Default', 'crypterium' ) => 'default',
                            esc_html__('White', 'crypterium' ) => 'white',
                        ),
                    ),
                    array(
                        'type' => 'dropdown',
                        'heading' => esc_html__('Alignment', 'crypterium' ),
                        'param_name' => 'alignment',
                        'description' => esc_html__('You can select text position with alignment', 'crypterium' ),
                        'value' => array(
                            esc_html__('Select position', 'crypterium' ) => '',
                            esc_html__('Left', 'crypterium' ) => 'text--left',
                            esc_html__('Right', 'crypterium' ) => 'text--lg-right',
                            esc_html__('Center', 'crypterium' ) => 'section-heading--center',
                        ),
                    ),
                    array(
                        'type' => 'dropdown',
                        'heading' => esc_html__('Margin bottom', 'crypterium' ),
                        'param_name' => 'margin',
                        'description' => esc_html__('You can select tag for subheading font-size', 'crypterium' ),
                        'value' => array(
                            esc_html__('Select', 'crypterium' ) => '',
                            esc_html__('0', 'crypterium' ) => '0',
                            esc_html__('5', 'crypterium' ) => '5',
                            esc_html__('10', 'crypterium' ) => '10',
                            esc_html__('15', 'crypterium' ) => '15',
                            esc_html__('20', 'crypterium' ) => '20',
                            esc_html__('25', 'crypterium' ) => '25',
                            esc_html__('30', 'crypterium' ) => '30',
                            esc_html__('35', 'crypterium' ) => '35',
                            esc_html__('40', 'crypterium' ) => '40',
                            esc_html__('45', 'crypterium' ) => '45',
                            esc_html__('50', 'crypterium' ) => '50',
                            esc_html__('55', 'crypterium' ) => '55',
                            esc_html__('60', 'crypterium' ) => '60',
                        ),
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Content limit', 'crypterium'),
                        'param_name' => 'limit',
                        'description' => esc_html__('You can control with limit content text.', 'crypterium'),
                        'group' => esc_html__('Post Options', 'crypterium'),
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Post per page', 'crypterium' ),
                        'param_name' => 'perpage',
                        'description' => esc_html__('You can control with number your post.Please enter a number or leave a blank', 'crypterium'),
                        'group' => esc_html__('Post Options', 'crypterium'),
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Post Category', 'crypterium' ),
                        'param_name' => 'postcat',
                        'description' => esc_html__('Enter post category or write all', 'crypterium'),
                        'group' => esc_html__('Post Options', 'crypterium'),
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Post Order', 'crypterium' ),
                        'param_name' => 'order',
                        'description' => esc_html__('Enter post order. DESC or ASC', 'crypterium'),
                        'group' => esc_html__('Post Options', 'crypterium'),
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Post Orderby', 'crypterium' ),
                        'param_name' => 'orderby',
                        'description' => esc_html__('Enter post orderby. Default is : date', 'crypterium'),
                        'group' => esc_html__('Post Options', 'crypterium'),
                    ),
                    // custom style
                    // Section subtitle
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Section subtitle font-size', 'crypterium'),
                        'param_name' => 'tsize',
                        'description' => esc_html__('Change subtitle font-size.use number in ( px or unit )', 'crypterium'),
                        'group' => esc_html__('Custom Style', 'crypterium' ),
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Section subtitle line-height', 'crypterium'),
                        'param_name' => 'tlineh',
                        'description' => esc_html__('Change subtitle line-height. Use number in ( px or unit )', 'crypterium'),
                        'group' => esc_html__('Custom Style', 'crypterium' ),
                    ),
                    array(
                        'type' => 'colorpicker',
                        'heading' => esc_html__('Section subtitle color', 'crypterium'),
                        'param_name' => 'tcolor',
                        'description' => esc_html__('Change title color.', 'crypterium'),
                        'group' => esc_html__('Custom Style', 'crypterium' ),
                    ),
                    // BG style
                    array(
                        'type' => 'css_editor',
                        'heading' => esc_html__('Design', 'crypterium' ),
                        'param_name' => 'bgcss',
                        'group' => esc_html__('Design', 'crypterium' ),
                    ),
                )
            )
        );
    }
    class Crypterium_Blog_Shortcode extends WPBakeryShortCode {
    }

    /*-----------------------------------------------------------------------------------*/
    /*	TESTIMONIAL
    /*-----------------------------------------------------------------------------------*/
    add_action( 'vc_before_init', 'crypterium_testimonial_shortcode_integrateWithVC' );
    function crypterium_testimonial_shortcode_integrateWithVC() {
        vc_map(
            array(
                'name' => esc_html__( 'Testimonial Section', 'crypterium' ),
                'base' => 'crypterium_testimonial_shortcode',
                'icon' => 'icon-wpb-row',
                'category' => esc_html__( 'Crypterium', 'crypterium'),
                'params' => array(
                    array(
                        'type' => 'dropdown',
                        'heading' => esc_html__('Icon visibility', 'crypterium' ),
                        'param_name' => 'icon_v',
                        'description' => esc_html__('Select an option', 'crypterium'),
                        'value' => array(
                            esc_html__('Select options', 'crypterium' ) => '',
                            esc_html__('show', 'crypterium' ) => 'yes',
                            esc_html__('hide', 'crypterium' ) => 'no',
                        ),
                    ),
                    array(
                        'type' => 'dropdown',
                        'heading' => esc_html__('Theme section classes', 'crypterium' ),
                        'param_name' => 'sp',
                        'description' => esc_html__('You can select an option for default section paddings', 'crypterium'),
                        'value' => array(
                            esc_html__('Select options', 'crypterium' ) => '',
                            esc_html__('section (140px padding)', 'crypterium' ) => 'section',
                            esc_html__('section no padding top', 'crypterium' ) => 'section section--no-pt',
                            esc_html__('section no padding bottom', 'crypterium' ) => 'section section--no-pb',
                            esc_html__('section no padding top and bottom', 'crypterium' ) => 'section section--no-pb section--no-pt',
                        ),
                    ),
                    array(
                        'type' => 'dropdown',
                        'heading' => esc_html__('Theme section default backgrounds', 'crypterium' ),
                        'param_name' => 'bg',
                        'description' => esc_html__('You can select an option for default section paddings', 'crypterium'),
                        'value' => array(
                            esc_html__('Select options', 'crypterium' ) => 'section-no-bg',
                            esc_html__('Base background', 'crypterium' ) => 'section--base-bg',
                            esc_html__('Light background', 'crypterium' ) => 'section--light-bg',
                            esc_html__('Blue background', 'crypterium' ) => 'section--blue-bg',
                            esc_html__('Light blue background', 'crypterium' ) => 'section--light-blue-bg',
                            esc_html__('Dark background', 'crypterium' ) => 'section--dark-bg',
                        ),
                    ),
                    //testimonial loop
                    array(
                        'type' => 'param_group',
                        'heading' => esc_html__('Testimonial items', 'crypterium' ),
                        'param_name' => 'testiloop',
                        'group' => esc_html__('Items', 'crypterium' ),
                        'params' => array(
                            array(
                                'type' => 'textarea',
                                'heading' => esc_html__('Quote', 'crypterium'),
                                'param_name' => 'quote',
                                'description' => esc_html__('Add testimonial quote.', 'crypterium'),
                            ),
                            array(
                                'type' => 'textfield',
                                'heading' => esc_html__('Name', 'crypterium'),
                                'param_name' => 'name',
                                'description' => esc_html__('Add testimonial name.', 'crypterium'),
                            ),
                            array(
                                'type' => 'textfield',
                                'heading' => esc_html__('Job', 'crypterium'),
                                'param_name' => 'job',
                                'description' => esc_html__('Add testimonial job.', 'crypterium'),
                            ),
                        )
                    ), // end param_group
                    //custom style
                    //quote
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Quote font-size', 'crypterium'),
                        'param_name' => 'qsize',
                        'description' => esc_html__('Change quote font-size. Use number in ( px or unit )', 'crypterium'),
                        'group' => esc_html__('Custom Style', 'crypterium' ),
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Quote line-height', 'crypterium'),
                        'param_name' => 'qlineh',
                        'description' => esc_html__('Change quote line-height. Use number in  ( px or unit )', 'crypterium'),
                        'group' => esc_html__('Custom Style', 'crypterium' ),
                    ),
                    array(
                        'type' => 'colorpicker',
                        'heading' => esc_html__('Quote color', 'crypterium'),
                        'param_name' => 'qcolor',
                        'description' => esc_html__('Change quote color.', 'crypterium'),
                        'group' => esc_html__('Custom Style', 'crypterium' ),
                    ),
                    //name
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Name font-size', 'crypterium'),
                        'param_name' => 'nsize',
                        'description' => esc_html__('Change testimonial name font-size. Use number in ( px or unit )', 'crypterium'),
                        'group' => esc_html__('Custom Style', 'crypterium' ),
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Name line-height', 'crypterium'),
                        'param_name' => 'nlineh',
                        'description' => esc_html__('Change testimonial name line-height. Use number in ( px or unit )', 'crypterium'),
                        'group' => esc_html__('Custom Style', 'crypterium' ),
                    ),
                    array(
                        'type' => 'colorpicker',
                        'heading' => esc_html__('Name color', 'crypterium'),
                        'param_name' => 'ncolor',
                        'description' => esc_html__('Change testimonial name color.', 'crypterium'),
                        'group' => esc_html__('Custom Style', 'crypterium' ),
                    ),
                    //Job
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Job font-size', 'crypterium'),
                        'param_name' => 'jsize',
                        'description' => esc_html__('Change testimonial job font-size. Use number in ( px or unit )', 'crypterium'),
                        'group' => esc_html__('Custom Style', 'crypterium' ),
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Job line-height', 'crypterium'),
                        'param_name' => 'jlineh',
                        'description' => esc_html__('Change testimonial job line-height. Use number in ( px or unit )', 'crypterium'),
                        'group' => esc_html__('Custom Style', 'crypterium' ),
                    ),
                    array(
                        'type' => 'colorpicker',
                        'heading' => esc_html__('Job color', 'crypterium'),
                        'param_name' => 'jcolor',
                        'description' => esc_html__('Change testimonial job color.', 'crypterium'),
                        'group' => esc_html__('Custom Style', 'crypterium' ),
                    ),
                    array(
                        'type' => 'css_editor',
                        'heading' => esc_html__('Background CSS', 'crypterium' ),
                        'param_name' => 'css',
                        'group' => esc_html__('Background', 'crypterium' ),
                    ),
                )
            )
        );
    }
    class Crypterium_Testimonial_Shortcode extends WPBakeryShortCode {
    }

    /*-----------------------------------------------------------------------------------*/
    /*	REVIEWS
    /*-----------------------------------------------------------------------------------*/
    add_action( 'vc_before_init', 'crypterium_reviews_shortcode_integrateWithVC' );
    function crypterium_reviews_shortcode_integrateWithVC() {
        vc_map(
            array(
                'name' => esc_html__( 'Reviews', 'crypterium' ),
                'base' => 'crypterium_reviews_shortcode',
                'icon' => 'icon-wpb-row',
                'category' => esc_html__( 'Crypterium', 'crypterium'),
                'params' => array(
                    array(
                        'type' => 'dropdown',
                        'heading' => esc_html__('Timeline type', 'crypterium' ),
                        'param_name' => 'type',
                        'description' => esc_html__('You can select timeline type for item placement', 'crypterium' ),
                        'value' => array(
                            esc_html__('Select type', 'crypterium' ) => '',
                            esc_html__('Type 1', 'crypterium' ) => 'r1',
                            esc_html__('Type 2', 'crypterium' ) => 'r2',
                        ),
                    ),
                    //testimonial loop
                    array(
                        'type' => 'param_group',
                        'heading' => esc_html__('Items', 'crypterium' ),
                        'param_name' => 'loop',
                        'group' => esc_html__('Items', 'crypterium' ),
                        'params' => array(
                            array(
                                'type' => 'attach_image',
                                'heading' => esc_html__('Company image', 'crypterium'),
                                'param_name' => 'img',
                                'description' => esc_html__('Add image', 'crypterium'),
                            ),
                            array(
                                'type' => 'attach_image',
                                'heading' => esc_html__('Author image', 'crypterium'),
                                'param_name' => 'a_img',
                                'description' => esc_html__('Add image', 'crypterium'),
                            ),
                            array(
                                'type' => 'textarea',
                                'heading' => esc_html__('Quote', 'crypterium'),
                                'param_name' => 'quote',
                                'description' => esc_html__('Add quote.', 'crypterium'),
                            ),
                            array(
                                'type' => 'textfield',
                                'heading' => esc_html__('Name', 'crypterium'),
                                'param_name' => 'name',
                                'description' => esc_html__('Add name.', 'crypterium'),
                            ),
                            array(
                                'type' => 'textfield',
                                'heading' => esc_html__('Job', 'crypterium'),
                                'param_name' => 'job',
                                'description' => esc_html__('Add job.', 'crypterium'),
                            ),
                        )
                    ), // end param_group
                    //custom style
                    //quote
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Quote font-size', 'crypterium'),
                        'param_name' => 'qsize',
                        'description' => esc_html__('Change quote font-size. Use number in ( px or unit )', 'crypterium'),
                        'group' => esc_html__('Custom Style', 'crypterium' ),
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Quote line-height', 'crypterium'),
                        'param_name' => 'qlineh',
                        'description' => esc_html__('Change quote line-height. Use number in  ( px or unit )', 'crypterium'),
                        'group' => esc_html__('Custom Style', 'crypterium' ),
                    ),
                    array(
                        'type' => 'colorpicker',
                        'heading' => esc_html__('Quote color', 'crypterium'),
                        'param_name' => 'qcolor',
                        'description' => esc_html__('Change quote color.', 'crypterium'),
                        'group' => esc_html__('Custom Style', 'crypterium' ),
                    ),
                    //name
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Name font-size', 'crypterium'),
                        'param_name' => 'nsize',
                        'description' => esc_html__('Change testimonial name font-size. Use number in ( px or unit )', 'crypterium'),
                        'group' => esc_html__('Custom Style', 'crypterium' ),
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Name line-height', 'crypterium'),
                        'param_name' => 'nlineh',
                        'description' => esc_html__('Change testimonial name line-height. Use number in ( px or unit )', 'crypterium'),
                        'group' => esc_html__('Custom Style', 'crypterium' ),
                    ),
                    array(
                        'type' => 'colorpicker',
                        'heading' => esc_html__('Name color', 'crypterium'),
                        'param_name' => 'ncolor',
                        'description' => esc_html__('Change testimonial name color.', 'crypterium'),
                        'group' => esc_html__('Custom Style', 'crypterium' ),
                    ),
                    //Job
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Job font-size', 'crypterium'),
                        'param_name' => 'jsize',
                        'description' => esc_html__('Change testimonial job font-size. Use number in ( px or unit )', 'crypterium'),
                        'group' => esc_html__('Custom Style', 'crypterium' ),
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Job line-height', 'crypterium'),
                        'param_name' => 'jlineh',
                        'description' => esc_html__('Change testimonial job line-height. Use number in ( px or unit )', 'crypterium'),
                        'group' => esc_html__('Custom Style', 'crypterium' ),
                    ),
                    array(
                        'type' => 'colorpicker',
                        'heading' => esc_html__('Job color', 'crypterium'),
                        'param_name' => 'jcolor',
                        'description' => esc_html__('Change testimonial job color.', 'crypterium'),
                        'group' => esc_html__('Custom Style', 'crypterium' ),
                    ),
                )
            )
        );
    }
    class Crypterium_Reviews_Shortcode extends WPBakeryShortCode {
    }

    /*-----------------------------------------------------------------------------------*/
    /*	HOME CONTACT
    /*-----------------------------------------------------------------------------------*/

    add_action( 'vc_before_init', 'crypterium_contact_shortcode_integrateWithVC' );
    function crypterium_contact_shortcode_integrateWithVC() {
        vc_map(
            array(
                'name' => esc_html__( 'Contact', 'crypterium' ),
                'base' => 'crypterium_contact_shortcode',
                'icon' => 'icon-wpb-row',
                'category' => esc_html__( 'Crypterium', 'crypterium'),
                'params' => array(
                    array(
                        'type' => 'dropdown',
                        'heading' => esc_html__('Contact types', 'crypterium' ),
                        'param_name' => 'type',
                        'description' => esc_html__('There are 2 layout, full width non form and adress detail', 'crypterium' ),
                        'value' => array(
                            esc_html__('Select type', 'crypterium' ) => '',
                            esc_html__('Full width', 'crypterium' ) => 'c1',
                            esc_html__('Adress details', 'crypterium' ) => 'c2',
                        ),
                    ),
                    array(
                        'type' => 'dropdown',
                        'heading' => esc_html__('Theme section classes', 'crypterium' ),
                        'param_name' => 'sp',
                        'description' => esc_html__('You can select an option for default section paddings', 'crypterium'),
                        'value' => array(
                            esc_html__('Select options', 'crypterium' ) => '',
                            esc_html__('section (140px padding)', 'crypterium' ) => 'section',
                            esc_html__('section no padding top', 'crypterium' ) => 'section section--no-pt',
                            esc_html__('section no padding bottom', 'crypterium' ) => 'section section--no-pb',
                            esc_html__('section no padding top and bottom', 'crypterium' ) => 'section section--no-pb section--no-pt',
                        ),
                        'dependency' => array(
                            'element' => 'type',
                            'value' => 'c1'
                        ),
                    ),
                    array(
                        'type' => 'dropdown',
                        'heading' => esc_html__('Theme section default backgrounds', 'crypterium' ),
                        'param_name' => 'bg',
                        'description' => esc_html__('You can select an option for default section paddings', 'crypterium'),
                        'value' => array(
                            esc_html__('Select options', 'crypterium' ) => 'section-no-bg',
                            esc_html__('Base background', 'crypterium' ) => 'section--base-bg',
                            esc_html__('Light background', 'crypterium' ) => 'section--light-bg',
                            esc_html__('Blue background', 'crypterium' ) => 'section--blue-bg',
                            esc_html__('Light blue background', 'crypterium' ) => 'section--light-blue-bg',
                            esc_html__('Dark background', 'crypterium' ) => 'section--dark-bg',
                        ),
                        'dependency' => array(
                            'element' => 'type',
                            'value' => 'c1'
                        ),
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Section title', 'crypterium'),
                        'param_name' => 'title',
                        'description' => esc_html__('Add title for this section.', 'crypterium'),
                    ),
                    array(
                        'type' => 'dropdown',
                        'heading' => esc_html__('Heading color', 'crypterium' ),
                        'param_name' => 'h_color',
                        'description' => esc_html__('You can select color for heading general', 'crypterium' ),
                        'value' => array(
                            esc_html__('Select tag', 'crypterium' ) => '',
                            esc_html__('Default', 'crypterium' ) => 'default',
                            esc_html__('White', 'crypterium' ) => 'white',
                        ),
                    ),
                    array(
                        'type' => 'dropdown',
                        'heading' => esc_html__('Alignment', 'crypterium' ),
                        'param_name' => 'alignment',
                        'description' => esc_html__('You can select text position with alignment', 'crypterium' ),
                        'value' => array(
                            esc_html__('Select position', 'crypterium' ) => '',
                            esc_html__('Left', 'crypterium' ) => 'text--left',
                            esc_html__('Right', 'crypterium' ) => 'text--lg-right',
                            esc_html__('Center', 'crypterium' ) => 'section-heading--center',
                        ),
                    ),
                    array(
                        'type' => 'dropdown',
                        'heading' => esc_html__('Margin bottom', 'crypterium' ),
                        'param_name' => 'margin',
                        'description' => esc_html__('You can select tag for subheading font-size', 'crypterium' ),
                        'value' => array(
                            esc_html__('Select', 'crypterium' ) => '',
                            esc_html__('0', 'crypterium' ) => '0',
                            esc_html__('5', 'crypterium' ) => '5',
                            esc_html__('10', 'crypterium' ) => '10',
                            esc_html__('15', 'crypterium' ) => '15',
                            esc_html__('20', 'crypterium' ) => '20',
                            esc_html__('25', 'crypterium' ) => '25',
                            esc_html__('30', 'crypterium' ) => '30',
                            esc_html__('35', 'crypterium' ) => '35',
                            esc_html__('40', 'crypterium' ) => '40',
                            esc_html__('45', 'crypterium' ) => '45',
                            esc_html__('50', 'crypterium' ) => '50',
                            esc_html__('55', 'crypterium' ) => '55',
                            esc_html__('60', 'crypterium' ) => '60',
                        ),
                    ),
                    array(
                        'type' => 'textarea_html',
                        'heading' => esc_html__('Content', 'crypterium' ),
                        'param_name' => 'content',
                        'description' => esc_html__('Add any content', 'crypterium' ),
                        'dependency' => array(
                            'element' => 'type',
                            'value' => 'c2'
                        ),
                    ),
                    array(
                        'type' => 'attach_image',
                        'heading' => esc_html__('BG parallax image', 'crypterium'),
                        'param_name' => 'img',
                        'description' => esc_html__('Add your background image', 'crypterium'),
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Image width', 'crypterium'),
                        'param_name' => 'img_w',
                        'description' => esc_html__('Control your image width', 'crypterium'),
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Image height', 'crypterium'),
                        'param_name' => 'img_h',
                        'description' => esc_html__('Control your image width', 'crypterium'),
                    ),
                    array(
                        'type' => 'param_group',
                        'heading' => esc_html__('Info items', 'crypterium' ),
                        'param_name' => 'infoloop',
                        'dependency' => array(
                            'element' => 'type',
                            'value' => 'c1'
                        ),
                        'params' => array(
                            array(
                                'type' => 'textarea',
                                'heading' => esc_html__('Add contact details', 'crypterium'),
                                'param_name' 	 => 'info',
                                'description' => esc_html__('Add any text', 'crypterium'),
                            ),
                        )
                    ),
                    //custom style
                    //title
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Title font-size', 'crypterium'),
                        'param_name' => 'tsize',
                        'description' => esc_html__('Change title font-size. Use number in ( px or unit )', 'crypterium'),
                        'group' => esc_html__('Custom Style', 'crypterium' ),
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Title line-height', 'crypterium'),
                        'param_name' => 'tlineh',
                        'description' => esc_html__('Change title line-height. Use number in ( px or unit )', 'crypterium'),
                        'group' => esc_html__('Custom Style', 'crypterium' ),
                    ),
                    array(
                        'type' => 'colorpicker',
                        'heading' => esc_html__('Title color', 'crypterium'),
                        'param_name' => 'tcolor',
                        'description' => esc_html__('Change title color.', 'crypterium'),
                        'group' => esc_html__('Custom Style', 'crypterium' ),
                    ),
                    //info
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Info font-size', 'crypterium'),
                        'param_name' => 'dtsize',
                        'description' => esc_html__('Change info font-size. Use number in ( px or unit )', 'crypterium'),
                        'group' => esc_html__('Custom Style', 'crypterium' ),
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Info line-height', 'crypterium'),
                        'param_name' => 'dtlineh',
                        'description' => esc_html__('Change info line-height. Use number in ( px or unit )', 'crypterium'),
                        'group' => esc_html__('Custom Style', 'crypterium' ),
                    ),
                    array(
                        'type' => 'colorpicker',
                        'heading' => esc_html__('Info color', 'crypterium'),
                        'param_name' => 'dtcolor',
                        'description' => esc_html__('Change info job color.', 'crypterium'),
                        'group' => esc_html__('Custom Style', 'crypterium' ),
                    ),
                    // BG style
                    array(
                        'type' => 'css_editor',
                        'heading' => esc_html__('Background CSS', 'crypterium' ),
                        'param_name' => 'bgcss',
                        'group' => esc_html__('Background options', 'crypterium' ),
                    ),
                )
            )
        );
    }
    class Crypterium_Contact_Shortcode extends WPBakeryShortCode {
    }

    /*-----------------------------------------------------------------------------------*/
    /*	HOME CONTACT
    /*-----------------------------------------------------------------------------------*/

    add_action( 'vc_before_init', 'crypterium_maps_shortcode_integrateWithVC' );
    function crypterium_maps_shortcode_integrateWithVC() {
        vc_map(
            array(
                'name' => esc_html__( 'Maps', 'crypterium' ),
                'base' => 'crypterium_maps_shortcode',
                'icon' => 'icon-wpb-row',
                'category' => esc_html__( 'Crypterium', 'crypterium'),
                'params' => array(
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('API key', 'crypterium'),
                        'param_name' => 'api',
                        'description' => esc_html__('You need to add your google maps api key', 'crypterium'),
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Longitude', 'crypterium'),
                        'param_name' => 'long',
                        'description' => esc_html__('Add longitude', 'crypterium'),
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Latitude', 'crypterium'),
                        'param_name' => 'lat',
                        'description' => esc_html__('Add latitude', 'crypterium'),
                    ),
                    array(
                        'type' => 'attach_image',
                        'heading' => esc_html__('Marker image', 'crypterium'),
                        'param_name' => 'img',
                        'description' => esc_html__('Add image', 'crypterium'),
                    ),
                )
            )
        );
    }
    class Crypterium_Maps_Shortcode extends WPBakeryShortCode {
    }

    /*-----------------------------------------------------------------------------------*/
    /*	SCREENSHOTS
    /*-----------------------------------------------------------------------------------*/
    add_action( 'vc_before_init', 'crypterium_gallery_shortcode_integrateWithVC' );
    function crypterium_gallery_shortcode_integrateWithVC() {
        vc_map(array(
            'name' => esc_html__( 'Screenshots Slider and Grid Gallery', 'crypterium' ),
            'base' => 'crypterium_gallery_shortcode',
            'icon' => 'icon-wpb-row',
            'category' => esc_html__( 'Crypterium', 'crypterium'),
            'params' => array(
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__('Gallery type', 'crypterium' ),
                    'param_name' => 'type',
                    'description' => esc_html__('There are 2 layout, grid and carousel slider', 'crypterium' ),
                    'value' => array(
                        esc_html__('Select type', 'crypterium' ) => '',
                        esc_html__('Slider', 'crypterium' ) => 'slider',
                        esc_html__('Grid', 'crypterium' ) => 'grid',
                    ),
                ),
                array(
                    'type' => 'param_group',
                    'heading' => esc_html__('Gallery items', 'crypterium' ),
                    'param_name' => 'gallery_loop',
                    'group' => esc_html__('Images', 'crypterium' ),
                    'params' => array(
                        array(
                            'type' => 'attach_image',
                            'heading' => esc_html__('BG image', 'crypterium'),
                            'param_name' => 'img',
                            'description' => esc_html__('Add your background image icon', 'crypterium'),
                        ),
                        array(
                            'type' => 'textfield',
                            'heading' => esc_html__('Hover title', 'crypterium'),
                            'param_name' => 'title',
                            'description' => esc_html__('Add title', 'crypterium'),
                            'dependency' => array(
                                'element' => 'type',
                                'value' => 'grid'
                            ),
                        ),
                        array(
                            'type' => 'textfield',
                            'heading' => esc_html__('Grid column', 'crypterium'),
                            'param_name' => 'column',
                            'description' => esc_html__('col--md-7 or col--lg-5 ( you can use 1-12 numbers)', 'crypterium'),
                            'dependency' => array(
                                'element' => 'type',
                                'value' => 'grid'
                            ),
                        ),
                        array(
                            'type' => 'dropdown',
                            'heading' => esc_html__('Grid item height', 'crypterium' ),
                            'param_name' => 'datay',
                            'description' => esc_html__('Select an option', 'crypterium' ),
                            'value' => array(
                                esc_html__('Select type', 'crypterium' ) => '',
                                esc_html__('Small height', 'crypterium' ) => '1',
                                esc_html__('Medium height', 'crypterium' ) => '2',
                            ),
                            'dependency' => array(
                                'element' => 'type',
                                'value' => 'grid'
                            ),
                        ),
                        //animate
                        array(
                            'type' => 'textfield',
                            'heading' => esc_html__('Aos animate', 'crypterium'),
                            'param_name' => 'aos',
                            'group' => esc_html__('Animate', 'crypterium' ),
                        ),
                        array(
                            'type' => 'textfield',
                            'heading' => esc_html__('Aos animate delay', 'crypterium'),
                            'param_name' => 'delay',
                            'group' => esc_html__('Animate', 'crypterium' ),
                        ),
                        array(
                            'type' => 'textfield',
                            'heading' => esc_html__('Aos animate duration', 'crypterium'),
                            'param_name' => 'duration',
                            'group' => esc_html__('Animate', 'crypterium' ),
                        ),
                        array(
                            'type' => 'textfield',
                            'heading' => esc_html__('Aos animate offset', 'crypterium'),
                            'param_name' => 'offset',
                            'group' => esc_html__('Animate', 'crypterium' ),
                        ),
                        array(
                            'type' => 'textfield',
                            'heading' => esc_html__('Aos animate easing', 'crypterium'),
                            'param_name' => 'easing',
                            'group' => esc_html__('Animate', 'crypterium' ),
                        ),
                        array(
                            'type' => 'textfield',
                            'heading' => esc_html__('Aos animate anchor', 'crypterium'),
                            'param_name' => 'anchor',
                            'group' => esc_html__('Animate', 'crypterium' ),
                        ),
                        array(
                            'type' => 'textfield',
                            'heading' => esc_html__('Aos animate placement', 'crypterium'),
                            'param_name' => 'placement',
                            'group' => esc_html__('Animate', 'crypterium' ),
                        ),
                        array(
                            'type' => 'textfield',
                            'heading' => esc_html__('Aos animate once', 'crypterium'),
                            'param_name' => 'once',
                            'group' => esc_html__('Animate', 'crypterium' ),
                        ),
                    )
                ),
                // BG style
                array(
                    'type' => 'css_editor',
                    'heading' => esc_html__('Background CSS', 'crypterium' ),
                    'param_name' => 'css',
                    'group' => esc_html__('Background options', 'crypterium' ),
                ),
            )
        )
    );
}
class Crypterium_Gallery_Shortcode extends WPBakeryShortCode {
}

/*-----------------------------------------------------------------------------------*/
/*	BUTTON Crypterium
/*-----------------------------------------------------------------------------------*/
add_action( 'vc_before_init', 'crypterium_button_shortcode_integrateWithVC' );
function crypterium_button_shortcode_integrateWithVC() {
    vc_map(
        array(
            'name' => esc_html__( 'Button', 'crypterium' ),
            'base' => 'crypterium_button_shortcode',
            'icon' => 'icon-wpb-row',
            'category' => esc_html__( 'Crypterium', 'crypterium'),
            'params' => array(
                //button
                array(
                    'type' => 'vc_link',
                    'heading' => esc_html__('Button (Link)', 'crypterium' ),
                    'param_name' => 'btnlink',
                    'description' => esc_html__('Add button title and link.', 'crypterium' ),
                    'group' => esc_html__('Button1', 'crypterium' ),
                ),
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__('Button link type', 'crypterium' ),
                    'param_name' => 'linktype',
                    'description' => esc_html__('You can select button link type', 'crypterium' ),
                    'group' => esc_html__('Button1', 'crypterium' ),
                    'value' => array(
                        esc_html__('Select type', 'crypterium' ) => '',
                        esc_html__('Internal link', 'crypterium' ) => 'internal',
                        esc_html__('External link', 'crypterium' ) => 'external',
                    ),
                ),
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__('Button style', 'crypterium' ),
                    'param_name' => 'btnstyle',
                    'description'=> esc_html__('You can select button color style', 'crypterium' ),
                    'group' => esc_html__('Button1', 'crypterium' ),
                    'value' => array(
                        esc_html__('Select option','crypterium' ) => '',
                        esc_html__('Style 1','crypterium' ) => 'custom-btn--style-1',
                        esc_html__('Style 2','crypterium' ) => 'custom-btn--style-2',
                        esc_html__('Style 3','crypterium' ) => 'custom-btn--style-3',
                        esc_html__('Style 4','crypterium' ) => 'custom-btn--style-4',
                        esc_html__('Style 5','crypterium' ) => 'custom-btn--style-5',
                        esc_html__('Style 6','crypterium' ) => 'custom-btn--style-6',
                    ),
                ),
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__('Button size', 'crypterium' ),
                    'param_name' => 'btnsize',
                    'description' => esc_html__('You can select button size', 'crypterium' ),
                    'group' => esc_html__('Button1', 'crypterium' ),
                    'value' => array(
                        esc_html__('Select option', 'crypterium' ) => '',
                        esc_html__('Small', 'crypterium' ) => 'custom-btn-small',
                        esc_html__('Medium', 'crypterium' ) => 'custom-btn--medium',
                    ),
                ),
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__('Button alignment', 'crypterium' ),
                    'param_name' => 'btnpos',
                    'description' => esc_html__('You can select button position', 'crypterium' ),
                    'group' => esc_html__('Button1', 'crypterium' ),
                    'value' => array(
                        esc_html__('Select option', 'crypterium' ) => '',
                        esc_html__('Left', 'crypterium' ) => 'text--left',
                        esc_html__('Center','crypterium' ) => 'text--center',
                        esc_html__('Right', 'crypterium' ) => 'text--right',
                    ),
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Button Icon', 'crypterium'),
                    'param_name' => 'icon_class',
                    'description' => esc_html__('Add your any font icon class or leave blank', 'crypterium'),
                    'group' => esc_html__('Button1', 'crypterium' ),
                ),
                //button2
                array(
                    'type' => 'vc_link',
                    'heading' => esc_html__('Button (Link)', 'crypterium' ),
                    'param_name' => 'btnlink2',
                    'description' => esc_html__('Add button title and link.', 'crypterium' ),
                    'group' => esc_html__('Button2', 'crypterium' ),
                ),
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__('Button link type', 'crypterium' ),
                    'param_name' => 'linktype2',
                    'description' => esc_html__('You can select button link type', 'crypterium' ),
                    'group' => esc_html__('Button2', 'crypterium' ),
                    'value' => array(
                        esc_html__('Select type', 'crypterium' ) => '',
                        esc_html__('Internal link', 'crypterium' ) => 'internal',
                        esc_html__('External link', 'crypterium' ) => 'external',
                    ),
                ),
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__('Button style', 'crypterium' ),
                    'param_name' => 'btnstyle2',
                    'description'=> esc_html__('You can select button color style', 'crypterium' ),
                    'group' => esc_html__('Button2', 'crypterium' ),
                    'value' => array(
                        esc_html__('Select option','crypterium' ) => '',
                        esc_html__('Style 1','crypterium' ) => 'custom-btn--style-1',
                        esc_html__('Style 2','crypterium' ) => 'custom-btn--style-2',
                        esc_html__('Style 3','crypterium' ) => 'custom-btn--style-3',
                        esc_html__('Style 4','crypterium' ) => 'custom-btn--style-4',
                    ),
                ),
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__('Button size', 'crypterium' ),
                    'param_name' => 'btnsize2',
                    'description' => esc_html__('You can select button size', 'crypterium' ),
                    'group' => esc_html__('Button2', 'crypterium' ),
                    'value' => array(
                        esc_html__('Select option', 'crypterium' ) => '',
                        esc_html__('Small', 'crypterium' ) => 'custom-btn-small',
                        esc_html__('Medium', 'crypterium' ) => 'custom-btn--medium',
                    ),
                ),
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__('Button alignment', 'crypterium' ),
                    'param_name' => 'btnpos2',
                    'description' => esc_html__('You can select button position', 'crypterium' ),
                    'group' => esc_html__('Button2', 'crypterium' ),
                    'value' => array(
                        esc_html__('Select option', 'crypterium' ) => '',
                        esc_html__('Left', 'crypterium' ) => 'text--left',
                        esc_html__('Center','crypterium' ) => 'text--center',
                        esc_html__('Right', 'crypterium' ) => 'text--right',
                    ),
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Button Icon', 'crypterium'),
                    'param_name' => 'icon_class2',
                    'description' => esc_html__('Add your any font icon class or leave blank', 'crypterium'),
                    'group' => esc_html__('Button2', 'crypterium' ),
                ),
                //animate
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Aos animate', 'crypterium'),
                    'param_name' => 'aos',
                    'description' => esc_html__('Please check docs for details', 'crypterium'),
                    'group' => esc_html__('Animate', 'crypterium' ),
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Aos animate delay', 'crypterium'),
                    'param_name' => 'delay',
                    'description' => esc_html__('You can use numbers. Please check docs for details', 'crypterium'),
                    'group' => esc_html__('Animate', 'crypterium' ),
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Aos animate duration', 'crypterium'),
                    'param_name' => 'duration',
                    'description' => esc_html__('You can use numbers. Please check docs for details', 'crypterium'),
                    'group' => esc_html__('Animate', 'crypterium' ),
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Aos animate offset', 'crypterium'),
                    'param_name' => 'offset',
                    'description' => esc_html__('You can use numbers. Please check docs for details', 'crypterium'),
                    'group' => esc_html__('Animate', 'crypterium' ),
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Aos animate easing', 'crypterium'),
                    'param_name' => 'easing',
                    'description' => esc_html__('You can use numbers. Please check docs for details', 'crypterium'),
                    'group' => esc_html__('Animate', 'crypterium' ),
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Aos animate anchor', 'crypterium'),
                    'param_name' => 'anchor',
                    'description' => esc_html__('You can use numbers. Please check docs for details', 'crypterium'),
                    'group' => esc_html__('Animate', 'crypterium' ),
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Aos animate placement', 'crypterium'),
                    'param_name' => 'placement',
                    'description' => esc_html__('You can use numbers. Please check docs for details', 'crypterium'),
                    'group' => esc_html__('Animate', 'crypterium' ),
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Aos animate once', 'crypterium'),
                    'param_name' => 'once',
                    'description' => esc_html__('You can use numbers. Please check docs for details', 'crypterium'),
                    'group' => esc_html__('Animate', 'crypterium' ),
                ),
                // button1style
                array(
                    'type' => 'colorpicker',
                    'heading' => esc_html__('Button BG color', 'crypterium'),
                    'param_name' => 'btnbg',
                    'description' => esc_html__('Change right button background color.', 'crypterium'),
                    'group' => esc_html__('Custom Style 1', 'crypterium' ),
                ),
                array(
                    'type' => 'colorpicker',
                    'heading' => esc_html__('Button title color', 'crypterium'),
                    'param_name' => 'btncolor',
                    'description' => esc_html__('Change right button title color.', 'crypterium'),
                    'group' => esc_html__('Custom Style 1', 'crypterium' ),
                ),
                array(
                    'type' => 'colorpicker',
                    'heading' => esc_html__('Button border color', 'crypterium'),
                    'param_name' => 'btnborder',
                    'description' => esc_html__('Change right button border color.', 'crypterium'),
                    'group' => esc_html__('Custom Style 1', 'crypterium' ),
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Button border width', 'crypterium'),
                    'param_name' => 'border_width',
                    'description' => esc_html__('Change button border width.', 'crypterium'),
                    'group' => esc_html__('Custom Style 1', 'crypterium' ),
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Button padding', 'crypterium'),
                    'param_name' => 'padding',
                    'description' => esc_html__('Change button margin.', 'crypterium'),
                    'group' => esc_html__('Custom Style 1', 'crypterium' ),
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Button margin', 'crypterium'),
                    'param_name' => 'margin',
                    'description' => esc_html__('Change button margin.', 'crypterium'),
                    'group' => esc_html__('Custom Style 1', 'crypterium' ),
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Button border radius', 'crypterium'),
                    'param_name' => 'radius',
                    'description' => esc_html__('Change button border radius. 50px 60px', 'crypterium'),
                    'group' => esc_html__('Custom Style 1', 'crypterium' ),
                ),
                // button2style
                array(
                    'type' => 'colorpicker',
                    'heading' => esc_html__('Button BG color', 'crypterium'),
                    'param_name' => 'btnbg2',
                    'description' => esc_html__('Change right button background color.', 'crypterium'),
                    'group' => esc_html__('Custom Style 2', 'crypterium' ),
                ),
                array(
                    'type' => 'colorpicker',
                    'heading' => esc_html__('Button title color', 'crypterium'),
                    'param_name' => 'btncolor2',
                    'description' => esc_html__('Change right button title color.', 'crypterium'),
                    'group' => esc_html__('Custom Style 2', 'crypterium' ),
                ),
                array(
                    'type' => 'colorpicker',
                    'heading' => esc_html__('Button border color', 'crypterium'),
                    'param_name' => 'btnborder2',
                    'description' => esc_html__('Change right button border color.', 'crypterium'),
                    'group' => esc_html__('Custom Style 2', 'crypterium' ),
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Button border width', 'crypterium'),
                    'param_name' => 'border_width2',
                    'description' => esc_html__('Change button border width.', 'crypterium'),
                    'group' => esc_html__('Custom Style 2', 'crypterium' ),
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Button padding', 'crypterium'),
                    'param_name' => 'padding2',
                    'description' => esc_html__('Change button margin.', 'crypterium'),
                    'group' => esc_html__('Custom Style 2', 'crypterium' ),
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Button margin', 'crypterium'),
                    'param_name' => 'margin2',
                    'description' => esc_html__('Change button margin.', 'crypterium'),
                    'group' => esc_html__('Custom Style 2', 'crypterium' ),
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Button border radius', 'crypterium'),
                    'param_name' => 'radius2',
                    'description' => esc_html__('Change button border radius. 50px 60px', 'crypterium'),
                    'group' => esc_html__('Custom Style 2', 'crypterium' ),
                ),
            )
        )
    );
}
class Crypterium_Button_Shortcode extends WPBakeryShortCode {
}

/*-----------------------------------------------------------------------------------*/
/*	VIDEO
/*-----------------------------------------------------------------------------------*/
add_action( 'vc_before_init', 'crypterium_video_shortcode_integrateWithVC' );
function crypterium_video_shortcode_integrateWithVC() {
    vc_map(
        array(
            'name' => esc_html__( 'Video Lightbox', 'crypterium' ),
            'base' => 'crypterium_video_shortcode',
            'icon' => 'icon-wpb-row',
            'category' => esc_html__( 'Crypterium', 'crypterium'),
            'params' => array(
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Title ', 'crypterium'),
                    'param_name' => 'title',
                    'description' => esc_html__('Add title', 'crypterium'),
                ),
                array(
                    'type' => 'attach_image',
                    'heading' => esc_html__('Image', 'crypterium'),
                    'param_name' => 'img',
                    'description' => esc_html__('Add your background image icon', 'crypterium'),
                ),
                array(
                    'type' => 'attach_image',
                    'heading' => esc_html__('Video button background image', 'crypterium'),
                    'param_name' => 'bg',
                    'description' => esc_html__('Add your background image icon', 'crypterium'),
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Video button max width', 'crypterium'),
                    'param_name' => 'max',
                    'description' => esc_html__('Use number, example : 300', 'crypterium'),
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Video url', 'crypterium'),
                    'param_name' => 'url',
                    'description' => esc_html__('Example : http://player.vimeo.com/video/44309170', 'crypterium'),
                ),
                //animate
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Aos animate', 'crypterium'),
                    'param_name' => 'aos',
                    'description' => esc_html__('Please check docs for details', 'crypterium'),
                    'group' => esc_html__('Animate', 'crypterium' ),
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Aos animate delay', 'crypterium'),
                    'param_name' => 'delay',
                    'description' => esc_html__('You can use numbers. Please check docs for details', 'crypterium'),
                    'group' => esc_html__('Animate', 'crypterium' ),
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Aos animate duration', 'crypterium'),
                    'param_name' => 'duration',
                    'description' => esc_html__('You can use numbers. Please check docs for details', 'crypterium'),
                    'group' => esc_html__('Animate', 'crypterium' ),
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Aos animate offset', 'crypterium'),
                    'param_name' => 'offset',
                    'description' => esc_html__('You can use numbers. Please check docs for details', 'crypterium'),
                    'group' => esc_html__('Animate', 'crypterium' ),
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Aos animate easing', 'crypterium'),
                    'param_name' => 'easing',
                    'description' => esc_html__('You can use numbers. Please check docs for details', 'crypterium'),
                    'group' => esc_html__('Animate', 'crypterium' ),
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Aos animate anchor', 'crypterium'),
                    'param_name' => 'anchor',
                    'description' => esc_html__('You can use numbers. Please check docs for details', 'crypterium'),
                    'group' => esc_html__('Animate', 'crypterium' ),
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Aos animate placement', 'crypterium'),
                    'param_name' => 'placement',
                    'description' => esc_html__('You can use numbers. Please check docs for details', 'crypterium'),
                    'group' => esc_html__('Animate', 'crypterium' ),
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Aos animate once', 'crypterium'),
                    'param_name' => 'once',
                    'description' => esc_html__('You can use numbers. Please check docs for details', 'crypterium'),
                    'group' => esc_html__('Animate', 'crypterium' ),
                ),
                //title
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Title font-size', 'crypterium'),
                    'param_name' => 'tsize',
                    'description' => esc_html__('Change title font-size. Use number in ( px or unit )', 'crypterium'),
                    'group' => esc_html__('Custom Style', 'crypterium' ),
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Title line-height', 'crypterium'),
                    'param_name' => 'tlineh',
                    'description' => esc_html__('Change title line-height. Use number in ( px or unit )', 'crypterium'),
                    'group' => esc_html__('Custom Style', 'crypterium' ),
                ),
                array(
                    'type' => 'colorpicker',
                    'heading' => esc_html__('Title color', 'crypterium'),
                    'param_name' => 'tcolor',
                    'description' => esc_html__('Change title color.', 'crypterium'),
                    'group' => esc_html__('Custom Style', 'crypterium' ),
                ),
            )
        )
    );
}
class Crypterium_Video_Shortcode extends WPBakeryShortCode {
}

/*-----------------------------------------------------------------------------------*/
/*	HOME HERO PARALLAX
/*-----------------------------------------------------------------------------------*/
add_action( 'vc_before_init', 'crypterium_facts_shortcode_integrateWithVC' );
function crypterium_facts_shortcode_integrateWithVC() {
    vc_map(
        array(
            'name' => esc_html__( 'Facts', 'crypterium' ),
            'base' => 'crypterium_facts_shortcode',
            'icon' => 'icon-wpb-row',
            'category' => esc_html__( 'Crypterium', 'crypterium'),
            'params' => array(
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__('Theme section classes', 'crypterium' ),
                    'param_name' => 'type',
                    'description' => esc_html__('You can select an option for default section paddings', 'crypterium'),
                    'value' => array(
                        esc_html__('Select options', 'crypterium' ) => '',
                        esc_html__('light', 'crypterium' ) => 'facts--light-color',
                        esc_html__('dark', 'crypterium' ) => 'facts--dark-color',
                    ),
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Row', 'crypterium'),
                    'param_name' => 'row',
                    'description' => esc_html__('Add row classes. Examples : row--md-middle row--xs-middle', 'crypterium'),
                ),
                array(
                    'type' => 'param_group',
                    'heading' => esc_html__('Count items', 'crypterium' ),
                    'param_name' => 'count_loop',
                    'group' => esc_html__('Items', 'crypterium' ),
                    'params' => array(
                        array(
                            'type' => 'textfield',
                            'heading' => esc_html__('Column', 'crypterium'),
                            'param_name' => 'column',
                            'description' => esc_html__('Add column classes. Examples : col--sm-4 col--md-4 col--lg-4', 'crypterium'),
                        ),
                        array(
                            'type' => 'textfield',
                            'heading' => esc_html__('from', 'crypterium'),
                            'param_name' => 'from',
                            'description' => esc_html__('Add number for from data, example 10', 'crypterium'),
                        ),
                        array(
                            'type' => 'textfield',
                            'heading' => esc_html__('to', 'crypterium'),
                            'param_name' => 'to',
                            'description' => esc_html__('Add number for to data, example 120', 'crypterium'),
                        ),
                        array(
                            'type' => 'textfield',
                            'heading' => esc_html__('decimals', 'crypterium'),
                            'param_name' => 'dec',
                            'description' => esc_html__('Add number for decimals data, example 1', 'crypterium'),
                        ),
                        array(
                            'type' => 'textfield',
                            'heading' => esc_html__('before', 'crypterium'),
                            'param_name' => 'before',
                            'description' => esc_html__('Add number for before data, example $', 'crypterium'),
                        ),
                        array(
                            'type' => 'textfield',
                            'heading' => esc_html__('after', 'crypterium'),
                            'param_name' => 'after',
                            'description' => esc_html__('Add number for after data, example M', 'crypterium'),
                        ),
                        array(
                            'type' => 'textfield',
                            'heading' => esc_html__('datatitle', 'crypterium'),
                            'param_name' => 'datatitle',
                            'description' => esc_html__('Add number for title data, example : The amount of finance in the system', 'crypterium'),
                        ),
                        array(
                            'type' => 'colorpicker',
                            'heading' => esc_html__('Item color', 'crypterium'),
                            'param_name' => 'color',
                            'description' => esc_html__('Change  color.', 'crypterium'),
                        ),
                    )
                ), // array
                //title
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Title font-size', 'crypterium'),
                    'param_name' => 'tsize',
                    'description' => esc_html__('Change title font-size. Use number in ( px or unit )', 'crypterium'),
                    'group' => esc_html__('Custom Style', 'crypterium' ),
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Title line-height', 'crypterium'),
                    'param_name' => 'tlineh',
                    'description' => esc_html__('Change title line-height. Use number in ( px or unit )', 'crypterium'),
                    'group' => esc_html__('Custom Style', 'crypterium' ),
                ),
                array(
                    'type' => 'colorpicker',
                    'heading' => esc_html__('Title color', 'crypterium'),
                    'param_name' => 'tcolor',
                    'description' => esc_html__('Change title color.', 'crypterium'),
                    'group' => esc_html__('Custom Style', 'crypterium' ),
                ),
                //detail
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Detail font-size', 'crypterium'),
                    'param_name' => 'dsize',
                    'description' => esc_html__('Change detail font-size. Use number in ( px or unit )', 'crypterium'),
                    'group' => esc_html__('Custom Style', 'crypterium' ),
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Detail line-height', 'crypterium'),
                    'param_name' => 'dlineh',
                    'description' => esc_html__('Change detail line-height. Use number in ( px or unit )', 'crypterium'),
                    'group' => esc_html__('Custom Style', 'crypterium' ),
                ),
                array(
                    'type' => 'colorpicker',
                    'heading' => esc_html__('Detail color', 'crypterium'),
                    'param_name' => 'dcolor',
                    'description' => esc_html__('Change detail color.', 'crypterium'),
                    'group' => esc_html__('Custom Style', 'crypterium' ),
                ),
                array(
                    'type' => 'css_editor',
                    'heading' => esc_html__('Background CSS', 'crypterium' ),
                    'param_name' => 'css',
                    'group' => esc_html__('Background options', 'crypterium' ),
                ),
            )
        )
    );
}
class Crypterium_Facts_Shortcode_Class extends WPBakeryShortCode {
}

/*-----------------------------------------------------------------------------------*/
/*	TIMELINE
/*-----------------------------------------------------------------------------------*/
add_action( 'vc_before_init', 'crypterium_timeline_shortcode_integrateWithVC' );
function crypterium_timeline_shortcode_integrateWithVC() {
    vc_map(
        array(
            'name' => esc_html__( 'Timeline', 'crypterium' ),
            'base' => 'crypterium_timeline_shortcode',
            'icon' => 'icon-wpb-row',
            'category' => esc_html__( 'Crypterium', 'crypterium'),
            'params' => array(
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__('Theme section classes', 'crypterium' ),
                    'param_name' => 'sp',
                    'description' => esc_html__('You can select an option for default section paddings', 'crypterium'),
                    'value' => array(
                        esc_html__('Select options', 'crypterium' ) => '',
                        esc_html__('section (140px padding)', 'crypterium' ) => 'section',
                        esc_html__('section no padding top', 'crypterium' ) => 'section section--no-pt',
                        esc_html__('section no padding bottom', 'crypterium' ) => 'section section--no-pb',
                        esc_html__('section no padding top and bottom', 'crypterium' ) => 'section section--no-pb section--no-pt',
                    ),
                ),
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__('Theme section default backgrounds', 'crypterium' ),
                    'param_name' => 'bg',
                    'description' => esc_html__('You can select an option for default section paddings', 'crypterium'),
                    'value' => array(
                        esc_html__('Select options', 'crypterium' ) => 'section-no-bg',
                        esc_html__('Base background', 'crypterium' ) => 'section--base-bg',
                        esc_html__('Light background', 'crypterium' ) => 'section--light-bg',
                        esc_html__('Blue background', 'crypterium' ) => 'section--blue-bg',
                        esc_html__('Light blue background', 'crypterium' ) => 'section--light-blue-bg',
                        esc_html__('Dark background', 'crypterium' ) => 'section--dark-bg',
                    ),
                ),
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__('Timeline type', 'crypterium' ),
                    'param_name' => 'type',
                    'description' => esc_html__('You can select timeline type for item placement', 'crypterium' ),
                    'value' => array(
                        esc_html__('Select type', 'crypterium' ) => 'timeline--style-2',
                        esc_html__('Type 1 - Horizontal', 'crypterium' ) => 'timeline--style-1',
                        esc_html__('Type 2 - Vertical', 'crypterium' ) => 'timeline--style-2',
                    ),
                ),
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__('Timeline color', 'crypterium' ),
                    'param_name' => 'type_color',
                    'description' => esc_html__('Choise color', 'crypterium' ),
                    'value' => array(
                        esc_html__('Select type', 'crypterium' ) => 'timeline--dark-color',
                        esc_html__('Type 1 - Dark', 'crypterium' ) => 'timeline--dark-color',
                        esc_html__('Type 2 - Light', 'crypterium' ) => 'timeline--light-color',
                    ),
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Title', 'crypterium'),
                    'param_name' => 'title',
                    'description' => esc_html__('Add title', 'crypterium'),
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Top title', 'crypterium'),
                    'param_name' => 'subtitle',
                    'description' => esc_html__('Add subtitle', 'crypterium'),
                ),
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__('Heading color', 'crypterium' ),
                    'param_name' => 'h_color',
                    'description' => esc_html__('You can select color for heading general', 'crypterium' ),
                    'value' => array(
                        esc_html__('Select tag', 'crypterium' ) => '',
                        esc_html__('Default', 'crypterium' ) => 'default',
                        esc_html__('White', 'crypterium' ) => 'white',
                    ),
                ),
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__('Alignment', 'crypterium' ),
                    'param_name' => 'alignment',
                    'description' => esc_html__('You can select text position with alignment', 'crypterium' ),
                    'value' => array(
                        esc_html__('Select position', 'crypterium' ) => '',
                        esc_html__('Left', 'crypterium' ) => 'text--left',
                        esc_html__('Right', 'crypterium' ) => 'text--lg-right',
                        esc_html__('Center', 'crypterium' ) => 'section-heading--center',
                    ),
                ),
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__('Margin bottom', 'crypterium' ),
                    'param_name' => 'margin',
                    'description' => esc_html__('You can select tag for subheading font-size', 'crypterium' ),
                    'value' => array(
                        esc_html__('Select', 'crypterium' ) => '',
                        esc_html__('0', 'crypterium' ) => '0',
                        esc_html__('5', 'crypterium' ) => '5',
                        esc_html__('10', 'crypterium' ) => '10',
                        esc_html__('15', 'crypterium' ) => '15',
                        esc_html__('20', 'crypterium' ) => '20',
                        esc_html__('25', 'crypterium' ) => '25',
                        esc_html__('30', 'crypterium' ) => '30',
                        esc_html__('35', 'crypterium' ) => '35',
                        esc_html__('40', 'crypterium' ) => '40',
                        esc_html__('45', 'crypterium' ) => '45',
                        esc_html__('50', 'crypterium' ) => '50',
                        esc_html__('55', 'crypterium' ) => '55',
                        esc_html__('60', 'crypterium' ) => '60',
                    ),
                ),
                //timeline loop
                array(
                    'type' => 'param_group',
                    'heading' => esc_html__('Items', 'crypterium' ),
                    'param_name' => 'items',
                    'params' => array(
                        array(
                            'type' => 'dropdown',
                            'heading' => esc_html__('Active', 'crypterium' ),
                            'param_name' => 'active',
                            'description' => esc_html__('Active items - green', 'crypterium' ),
                            'value' => array(
                                esc_html__('Select type', 'crypterium' ) => '',
                                esc_html__('yes', 'crypterium' ) => 'y',
                                esc_html__('no', 'crypterium' ) => 'n',
                            ),
                        ),
                        array(
                            'type' => 'dropdown',
                            'heading' => esc_html__('Current', 'crypterium' ),
                            'param_name' => 'current',
                            'description' => esc_html__('Current item - green bordered', 'crypterium' ),
                            'value' => array(
                                esc_html__('Select type', 'crypterium' ) => '',
                                esc_html__('yes', 'crypterium' ) => 'y',
                                esc_html__('no', 'crypterium' ) => 'n',
                            ),
                        ),
                        array(
                            'type' => 'textfield',
                            'heading' => esc_html__('Date', 'crypterium'),
                            'param_name' => 'date',
                            'description' => esc_html__('Add hours', 'crypterium'),
                        ),
                        array(
                            'type' => 'textfield',
                            'heading' => esc_html__('Title', 'crypterium'),
                            'param_name' => 'title',
                            'description' => esc_html__('Add title', 'crypterium'),
                        ),
                        array(
                            'type' => 'textfield',
                            'heading' => esc_html__('Description', 'crypterium'),
                            'param_name' => 'desc',
                            'description' => esc_html__('Add Description', 'crypterium'),
                        ),// items end
                    )
                )
            )
        )
    );
}
class Crypterium_Timeline_Shortcode extends WPBakeryShortCode {
}

/*-----------------------------------------------------------------------------------*/
/*	HOWITWORKS
/*-----------------------------------------------------------------------------------*/
add_action( 'vc_before_init', 'crypterium_howitworks_shortcode_integrateWithVC' );
function crypterium_howitworks_shortcode_integrateWithVC() {
    vc_map(
        array(
            'name' => esc_html__( 'How It Works', 'crypterium' ),
            'base' => 'crypterium_howitworks_shortcode',
            'icon' => 'icon-wpb-row',
            'category' => esc_html__( 'Crypterium', 'crypterium'),
            'params' => array(
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__('Theme section classes', 'crypterium' ),
                    'param_name' => 'sp',
                    'description' => esc_html__('You can select an option for default section paddings', 'crypterium'),
                    'value' => array(
                        esc_html__('Select options', 'crypterium' ) => '',
                        esc_html__('section (140px padding)', 'crypterium' ) => 'section',
                        esc_html__('section no padding top', 'crypterium' ) => 'section section--no-pt',
                        esc_html__('section no padding bottom', 'crypterium' ) => 'section section--no-pb',
                        esc_html__('section no padding top and bottom', 'crypterium' ) => 'section section--no-pb section--no-pt',
                    ),
                ),
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__('Theme section default backgrounds', 'crypterium' ),
                    'param_name' => 'bg',
                    'description' => esc_html__('You can select an option for default section paddings', 'crypterium'),
                    'value' => array(
                        esc_html__('Select options', 'crypterium' ) => 'section-no-bg',
                        esc_html__('Base background', 'crypterium' ) => 'section--base-bg',
                        esc_html__('Light background', 'crypterium' ) => 'section--light-bg',
                        esc_html__('Blue background', 'crypterium' ) => 'section--blue-bg',
                        esc_html__('Light blue background', 'crypterium' ) => 'section--light-blue-bg',
                        esc_html__('Dark background', 'crypterium' ) => 'section--dark-bg',
                    ),
                ),
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__('Type', 'crypterium' ),
                    'param_name' => 'type',
                    'description' => esc_html__('You can select timeline type for item placement', 'crypterium' ),
                    'value' => array(
                        esc_html__('Select type', 'crypterium' ) => '1',
                        esc_html__('Type 1', 'crypterium' ) => '1',
                        esc_html__('Type 2', 'crypterium' ) => '2',
                        esc_html__('Type 3', 'crypterium' ) => '3',
                    ),
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Title', 'crypterium'),
                    'param_name' => 'title',
                    'description' => esc_html__('Add title', 'crypterium'),
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Top title', 'crypterium'),
                    'param_name' => 'subtitle',
                    'description' => esc_html__('Add subtitle', 'crypterium'),
                ),
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__('Heading color', 'crypterium' ),
                    'param_name' => 'h_color',
                    'description' => esc_html__('You can select color for heading general', 'crypterium' ),
                    'value' => array(
                        esc_html__('Select tag', 'crypterium' ) => '',
                        esc_html__('Default', 'crypterium' ) => 'default',
                        esc_html__('White', 'crypterium' ) => 'white',
                    ),
                ),
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__('Alignment', 'crypterium' ),
                    'param_name' => 'alignment',
                    'description' => esc_html__('You can select text position with alignment', 'crypterium' ),
                    'value' => array(
                        esc_html__('Select position', 'crypterium' ) => '',
                        esc_html__('Left', 'crypterium' ) => 'text--left',
                        esc_html__('Right', 'crypterium' ) => 'text--lg-right',
                        esc_html__('Center', 'crypterium' ) => 'section-heading--center',
                    ),
                ),
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__('Margin bottom', 'crypterium' ),
                    'param_name' => 'margin',
                    'description' => esc_html__('You can select tag for subheading font-size', 'crypterium' ),
                    'value' => array(
                        esc_html__('Select', 'crypterium' ) => '',
                        esc_html__('0', 'crypterium' ) => '0',
                        esc_html__('5', 'crypterium' ) => '5',
                        esc_html__('10', 'crypterium' ) => '10',
                        esc_html__('15', 'crypterium' ) => '15',
                        esc_html__('20', 'crypterium' ) => '20',
                        esc_html__('25', 'crypterium' ) => '25',
                        esc_html__('30', 'crypterium' ) => '30',
                        esc_html__('35', 'crypterium' ) => '35',
                        esc_html__('40', 'crypterium' ) => '40',
                        esc_html__('45', 'crypterium' ) => '45',
                        esc_html__('50', 'crypterium' ) => '50',
                        esc_html__('55', 'crypterium' ) => '55',
                        esc_html__('60', 'crypterium' ) => '60',
                    ),
                ),
                //timeline loop
                array(
                    'type' => 'param_group',
                    'heading' => esc_html__('Items', 'crypterium' ),
                    'param_name' => 'items',
                    'params' => array(
                        array(
                            'type' => 'textfield',
                            'heading' => esc_html__('Title', 'crypterium'),
                            'param_name' => 'title',
                            'description' => esc_html__('Add title', 'crypterium'),
                        ),
                        //animate
                        array(
                            'type' => 'textfield',
                            'heading' => esc_html__('Aos animate', 'crypterium'),
                            'param_name' => 'aos',
                            'description' => esc_html__('Please check docs for details', 'crypterium'),
                            'group' => esc_html__('Animate', 'crypterium' ),
                        ),
                        array(
                            'type' => 'textfield',
                            'heading' => esc_html__('Aos animate delay', 'crypterium'),
                            'param_name' => 'delay',
                            'description' => esc_html__('You can use numbers. Please check docs for details', 'crypterium'),
                            'group' => esc_html__('Animate', 'crypterium' ),
                        ),
                        array(
                            'type' => 'textfield',
                            'heading' => esc_html__('Aos animate duration', 'crypterium'),
                            'param_name' => 'duration',
                            'description' => esc_html__('You can use numbers. Please check docs for details', 'crypterium'),
                            'group' => esc_html__('Animate', 'crypterium' ),
                        ),
                        array(
                            'type' => 'textfield',
                            'heading' => esc_html__('Aos animate offset', 'crypterium'),
                            'param_name' => 'offset',
                            'description' => esc_html__('You can use numbers. Please check docs for details', 'crypterium'),
                            'group' => esc_html__('Animate', 'crypterium' ),
                        ),
                        array(
                            'type' => 'textfield',
                            'heading' => esc_html__('Aos animate easing', 'crypterium'),
                            'param_name' => 'easing',
                            'description' => esc_html__('You can use numbers. Please check docs for details', 'crypterium'),
                            'group' => esc_html__('Animate', 'crypterium' ),
                        ),
                        array(
                            'type' => 'textfield',
                            'heading' => esc_html__('Aos animate anchor', 'crypterium'),
                            'param_name' => 'anchor',
                            'description' => esc_html__('You can use numbers. Please check docs for details', 'crypterium'),
                            'group' => esc_html__('Animate', 'crypterium' ),
                        ),
                        array(
                            'type' => 'textfield',
                            'heading' => esc_html__('Aos animate placement', 'crypterium'),
                            'param_name' => 'placement',
                            'description' => esc_html__('You can use numbers. Please check docs for details', 'crypterium'),
                            'group' => esc_html__('Animate', 'crypterium' ),
                        ),
                        array(
                            'type' => 'textfield',
                            'heading' => esc_html__('Aos animate once', 'crypterium'),
                            'param_name' => 'once',
                            'description' => esc_html__('You can use numbers. Please check docs for details', 'crypterium'),
                            'group' => esc_html__('Animate', 'crypterium' ),
                        ),
                    )
                )
            )
        )
    );
}
class Crypterium_Howitworks_Shortcode extends WPBakeryShortCode {
}

/*-----------------------------------------------------------------------------------*/
/*	PROGRESS
/*-----------------------------------------------------------------------------------*/
add_action( 'vc_before_init', 'crypterium_progress_shortcode_integrateWithVC' );
function crypterium_progress_shortcode_integrateWithVC() {
    vc_map(
        array(
            'name' => esc_html__( 'Ico Progress Bar', 'crypterium' ),
            'base' => 'crypterium_progress_shortcode',
            'icon' => 'icon-wpb-row',
            'category' => esc_html__( 'Crypterium', 'crypterium'),
            'params' => array(
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__('Theme section classes', 'crypterium' ),
                    'param_name' => 'sp',
                    'description' => esc_html__('You can select an option for default section paddings', 'crypterium'),
                    'value' => array(
                        esc_html__('Select options', 'crypterium' ) => '',
                        esc_html__('section (140px padding)', 'crypterium' ) => 'section',
                        esc_html__('section no padding top', 'crypterium' ) => 'section section--no-pt',
                        esc_html__('section no padding bottom', 'crypterium' ) => 'section section--no-pb',
                        esc_html__('section no padding top and bottom', 'crypterium' ) => 'section section--no-pb section--no-pt',
                    ),
                ),
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__('Theme section default backgrounds', 'crypterium' ),
                    'param_name' => 'bg',
                    'description' => esc_html__('You can select an option for default section paddings', 'crypterium'),
                    'value' => array(
                        esc_html__('Select options', 'crypterium' ) => 'section-no-bg',
                        esc_html__('Base background', 'crypterium' ) => 'section--base-bg',
                        esc_html__('Light background', 'crypterium' ) => 'section--light-bg',
                        esc_html__('Blue background', 'crypterium' ) => 'section--blue-bg',
                        esc_html__('Light blue background', 'crypterium' ) => 'section--light-blue-bg',
                        esc_html__('Dark background', 'crypterium' ) => 'section--dark-bg',
                    ),
                ),
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__('Progress bar size', 'crypterium' ),
                    'param_name' => 'size',
                    'description' => esc_html__('You can choise 3 size', 'crypterium'),
                    'value' => array(
                        esc_html__('Select options', 'crypterium' ) => 'progress--big',
                        esc_html__('Small', 'crypterium' ) => 'progress--small',
                        esc_html__('Medium', 'crypterium' ) => 'progress--medium',
                        esc_html__('Big', 'crypterium' ) => 'progress--big',
                    ),
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Title', 'crypterium'),
                    'param_name' => 'title',
                    'description' => esc_html__('Add title', 'crypterium'),
                    'group' => esc_html__('General', 'crypterium' ),
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Top title', 'crypterium'),
                    'param_name' => 'subtitle',
                    'description' => esc_html__('Add subtitle', 'crypterium'),
                    'group' => esc_html__('General', 'crypterium' ),
                ),
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__('Heading color', 'crypterium' ),
                    'param_name' => 'h_color',
                    'description' => esc_html__('You can select color for heading general', 'crypterium' ),
                    'group' => esc_html__('General', 'crypterium' ),
                    'value' => array(
                        esc_html__('Select tag', 'crypterium' ) => '',
                        esc_html__('Default', 'crypterium' ) => 'default',
                        esc_html__('White', 'crypterium' ) => 'white',
                    ),
                ),
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__('Alignment', 'crypterium' ),
                    'param_name' => 'alignment',
                    'description' => esc_html__('You can select text position with alignment', 'crypterium' ),
                    'group' => esc_html__('General', 'crypterium' ),
                    'value' => array(
                        esc_html__('Select position', 'crypterium' ) => '',
                        esc_html__('Left', 'crypterium' ) => 'text--left',
                        esc_html__('Right', 'crypterium' ) => 'text--lg-right',
                        esc_html__('Center', 'crypterium' ) => 'section-heading--center',
                    ),
                ),
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__('Margin bottom', 'crypterium' ),
                    'param_name' => 'margin',
                    'description' => esc_html__('You can select tag for subheading font-size', 'crypterium' ),
                    'group' => esc_html__('General', 'crypterium' ),
                    'value' => array(
                        esc_html__('Select', 'crypterium' ) => '',
                        esc_html__('0', 'crypterium' ) => '0',
                        esc_html__('5', 'crypterium' ) => '5',
                        esc_html__('10', 'crypterium' ) => '10',
                        esc_html__('15', 'crypterium' ) => '15',
                        esc_html__('20', 'crypterium' ) => '20',
                        esc_html__('25', 'crypterium' ) => '25',
                        esc_html__('30', 'crypterium' ) => '30',
                        esc_html__('35', 'crypterium' ) => '35',
                        esc_html__('40', 'crypterium' ) => '40',
                        esc_html__('45', 'crypterium' ) => '45',
                        esc_html__('50', 'crypterium' ) => '50',
                        esc_html__('55', 'crypterium' ) => '55',
                        esc_html__('60', 'crypterium' ) => '60',
                    ),
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Progress green bar width', 'crypterium'),
                    'param_name' => 'bar',
                    'description' => esc_html__('Add number between 1-100', 'crypterium'),
                    'group' => esc_html__('Progress', 'crypterium' ),
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Progress bar inner max coin total text', 'crypterium'),
                    'param_name' => 'max',
                    'description' => esc_html__('Add title', 'crypterium'),
                    'group' => esc_html__('Progress', 'crypterium' ),
                ),
                array(
                    'type' => 'param_group',
                    'heading' => esc_html__('Progress Items', 'crypterium' ),
                    'param_name' => 'pitems',
                    'group' => esc_html__('Progress', 'crypterium' ),
                    'params' => array(
                        array(
                            'type' => 'textfield',
                            'heading' => esc_html__('Percent', 'crypterium'),
                            'param_name' => 'percent',
                            'description' => esc_html__('Add percent for item.', 'crypterium'),
                        ),
                        array(
                            'type' => 'textfield',
                            'heading' => esc_html__('Percent title', 'crypterium'),
                            'param_name' => 'percent_title',
                            'description' => esc_html__('Add title for item.', 'crypterium'),
                        ),
                    )
                ), // param_group
                array(
                    'type' => 'param_group',
                    'heading' => esc_html__('Bottom coin items', 'crypterium' ),
                    'param_name' => 'citems',
                    'group' => esc_html__('Progress', 'crypterium' ),
                    'params' => array(
                        array(
                            'type' => 'attach_image',
                            'heading' => esc_html__('Total recevied coin image', 'crypterium'),
                            'param_name' => 'img',
                            'description' => esc_html__('Add your coin image', 'crypterium'),
                        ),
                        array(
                            'type' => 'textfield',
                            'heading' => esc_html__('Total recevied coin number', 'crypterium'),
                            'param_name' => 'coin_total',
                            'description' => esc_html__('Add total', 'crypterium'),
                        ),
                        array(
                            'type' => 'textfield',
                            'heading' => esc_html__('Total recevied coin name', 'crypterium'),
                            'param_name' => 'coin_title',
                            'description' => esc_html__('Add title for item.', 'crypterium'),
                        ),
                    )
                ), // param_group
                array(
                    'type' => 'vc_link',
                    'heading' => esc_html__('Heading area button (Link)', 'crypterium' ),
                    'param_name' => 'btnlink',
                    'description' => esc_html__('Add button title and link.', 'crypterium' ),
                    'group' => esc_html__('Button', 'crypterium' ),
                ),
            )
        )
    );
}
class Crypterium_Progress_Shortcode extends WPBakeryShortCode {
}

/*-----------------------------------------------------------------------------------*/
/*	HOWITWORKS
/*-----------------------------------------------------------------------------------*/
add_action( 'vc_before_init', 'crypterium_documents_shortcode_integrateWithVC' );
function crypterium_documents_shortcode_integrateWithVC() {
    vc_map(
        array(
            'name' => esc_html__( 'Documents', 'crypterium' ),
            'base' => 'crypterium_documents_shortcode',
            'icon' => 'icon-wpb-row',
            'category' => esc_html__( 'Crypterium', 'crypterium'),
            'params' => array(
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__('Timeline type', 'crypterium' ),
                    'param_name' => 'type',
                    'description' => esc_html__('You can select timeline type for item placement', 'crypterium' ),
                    'value' => array(
                        esc_html__('Select type', 'crypterium' ) => '1',
                        esc_html__('Type 1', 'crypterium' ) => '1',
                        esc_html__('Type 2', 'crypterium' ) => '2',
                        esc_html__('Type 3', 'crypterium' ) => '3',
                    ),
                ),
                //timeline loop
                array(
                    'type' => 'param_group',
                    'heading' => esc_html__('Items', 'crypterium' ),
                    'param_name' => 'items',
                    'params' => array(
                        array(
                            'type' => 'textfield',
                            'heading' => esc_html__('URL', 'crypterium'),
                            'param_name' => 'url',
                            'description' => esc_html__('Add url', 'crypterium'),
                        ),
                        array(
                            'type' => 'textfield',
                            'heading' => esc_html__('Icon', 'crypterium'),
                            'param_name' => 'icon',
                            'description' => esc_html__('Add title', 'crypterium'),
                        ),
                        array(
                            'type' => 'textfield',
                            'heading' => esc_html__('Title', 'crypterium'),
                            'param_name' => 'title',
                            'description' => esc_html__('Add title', 'crypterium'),
                        ),
                        //animate
                        array(
                            'type' => 'textfield',
                            'heading' => esc_html__('Aos animate', 'crypterium'),
                            'param_name' => 'aos',
                            'description' => esc_html__('Please check docs for details', 'crypterium'),
                            'group' => esc_html__('Animate', 'crypterium' ),
                        ),
                        array(
                            'type' => 'textfield',
                            'heading' => esc_html__('Aos animate delay', 'crypterium'),
                            'param_name' => 'delay',
                            'description' => esc_html__('You can use numbers. Please check docs for details', 'crypterium'),
                            'group' => esc_html__('Animate', 'crypterium' ),
                        ),
                        array(
                            'type' => 'textfield',
                            'heading' => esc_html__('Aos animate duration', 'crypterium'),
                            'param_name' => 'duration',
                            'description' => esc_html__('You can use numbers. Please check docs for details', 'crypterium'),
                            'group' => esc_html__('Animate', 'crypterium' ),
                        ),
                        array(
                            'type' => 'textfield',
                            'heading' => esc_html__('Aos animate offset', 'crypterium'),
                            'param_name' => 'offset',
                            'description' => esc_html__('You can use numbers. Please check docs for details', 'crypterium'),
                            'group' => esc_html__('Animate', 'crypterium' ),
                        ),
                        array(
                            'type' => 'textfield',
                            'heading' => esc_html__('Aos animate easing', 'crypterium'),
                            'param_name' => 'easing',
                            'description' => esc_html__('You can use numbers. Please check docs for details', 'crypterium'),
                            'group' => esc_html__('Animate', 'crypterium' ),
                        ),
                        array(
                            'type' => 'textfield',
                            'heading' => esc_html__('Aos animate anchor', 'crypterium'),
                            'param_name' => 'anchor',
                            'description' => esc_html__('You can use numbers. Please check docs for details', 'crypterium'),
                            'group' => esc_html__('Animate', 'crypterium' ),
                        ),
                        array(
                            'type' => 'textfield',
                            'heading' => esc_html__('Aos animate placement', 'crypterium'),
                            'param_name' => 'placement',
                            'description' => esc_html__('You can use numbers. Please check docs for details', 'crypterium'),
                            'group' => esc_html__('Animate', 'crypterium' ),
                        ),
                        array(
                            'type' => 'textfield',
                            'heading' => esc_html__('Aos animate once', 'crypterium'),
                            'param_name' => 'once',
                            'description' => esc_html__('You can use numbers. Please check docs for details', 'crypterium'),
                            'group' => esc_html__('Animate', 'crypterium' ),
                        ),
                        // title
                        array(
                            'type' => 'textfield',
                            'heading' => esc_html__('Title font-size', 'crypterium'),
                            'param_name' => 'tsize',
                            'description' => esc_html__('Change title font-size. Use number in ( px or unit )', 'crypterium'),
                            'group' => esc_html__('Custom Style', 'crypterium' ),
                        ),
                        array(
                            'type' => 'textfield',
                            'heading' => esc_html__('Title line-height', 'crypterium'),
                            'param_name' => 'tlineh',
                            'description' => esc_html__('Change title line-height. Use number in ( px or unit )', 'crypterium'),
                            'group' => esc_html__('Custom Style', 'crypterium' ),
                        ),
                        array(
                            'type' => 'colorpicker',
                            'heading' => esc_html__('Title color', 'crypterium'),
                            'param_name' => 'tcolor',
                            'description' => esc_html__('Change title color.', 'crypterium'),
                            'group' => esc_html__('Custom Style', 'crypterium' ),
                        ),
                        // icon
                        array(
                            'type' => 'textfield',
                            'heading' => esc_html__('Post icon font-size', 'crypterium'),
                            'param_name' => 'isize',
                            'description' => esc_html__('Change icon font-size. Use number in( px or unit )', 'crypterium'),
                            'group' => esc_html__('Custom Style', 'crypterium' ),
                        ),
                        array(
                            'type' => 'colorpicker',
                            'heading' => esc_html__('Post icon color', 'crypterium'),
                            'param_name' => 'icolor',
                            'description' => esc_html__('Change icon color.', 'crypterium'),
                            'group' => esc_html__('Custom Style', 'crypterium' ),
                        ),
                    )
                ) // param_group
            )
        )
    );
}
class Crypterium_Documents_Shortcode extends WPBakeryShortCode {
}

/*-----------------------------------------------------------------------------------*/
/*	TABLE
/*-----------------------------------------------------------------------------------*/
add_action( 'vc_before_init', 'crypterium_table_shortcode_integrateWithVC' );
function crypterium_table_shortcode_integrateWithVC() {
    vc_map(
        array(
            'name' => esc_html__( 'Table - List', 'crypterium' ),
            'base' => 'crypterium_table_shortcode',
            'icon' => 'icon-wpb-row',
            'category' => esc_html__( 'Crypterium', 'crypterium'),
            'params' => array(
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__('Timeline type', 'crypterium' ),
                    'param_name' => 'type',
                    'description' => esc_html__('You can select timeline type for item placement', 'crypterium' ),
                    'value' => array(
                        esc_html__('Select type', 'crypterium' ) => '',
                        esc_html__('table', 'crypterium' ) => 'table',
                        esc_html__('list', 'crypterium' ) => 'list',
                    ),
                ),
                //timeline loop
                array(
                    'type' => 'param_group',
                    'heading' => esc_html__('Items', 'crypterium' ),
                    'param_name' => 'items',
                    'params' => array(
                        array(
                            'type' => 'textfield',
                            'heading' => esc_html__('Icon', 'crypterium'),
                            'param_name' => 'icon',
                            'description' => esc_html__('Add icon', 'crypterium'),
                            'dependency' => array(
                                'element' => 'type',
                                'value' => 'list'
                            ),
                        ),
                        array(
                            'type' => 'textfield',
                            'heading' => esc_html__('Title', 'crypterium'),
                            'param_name' => 'title',
                            'description' => esc_html__('Add title', 'crypterium'),
                        ),
                        array(
                            'type' => 'textfield',
                            'heading' => esc_html__('Description', 'crypterium'),
                            'param_name' => 'desc',
                            'description' => esc_html__('Add title', 'crypterium'),
                            'dependency' => array(
                                'element' => 'type',
                                'value' => 'table'
                            ),
                        ),
                        //animate
                        array(
                            'type' => 'textfield',
                            'heading' => esc_html__('Aos animate', 'crypterium'),
                            'param_name' => 'aos2',
                            'description' => esc_html__('Please check docs for details', 'crypterium'),
                            'group' => esc_html__('Animate', 'crypterium' ),
                        ),
                        array(
                            'type' => 'textfield',
                            'heading' => esc_html__('Aos animate delay', 'crypterium'),
                            'param_name' => 'delay2',
                            'description' => esc_html__('You can use numbers. Please check docs for details', 'crypterium'),
                            'group' => esc_html__('Animate', 'crypterium' ),
                        ),
                        array(
                            'type' => 'textfield',
                            'heading' => esc_html__('Aos animate duration', 'crypterium'),
                            'param_name' => 'duration2',
                            'description' => esc_html__('You can use numbers. Please check docs for details', 'crypterium'),
                            'group' => esc_html__('Animate', 'crypterium' ),
                        ),
                        array(
                            'type' => 'textfield',
                            'heading' => esc_html__('Aos animate offset', 'crypterium'),
                            'param_name' => 'offset2',
                            'description' => esc_html__('You can use numbers. Please check docs for details', 'crypterium'),
                            'group' => esc_html__('Animate', 'crypterium' ),
                        ),
                        array(
                            'type' => 'textfield',
                            'heading' => esc_html__('Aos animate easing', 'crypterium'),
                            'param_name' => 'easing2',
                            'description' => esc_html__('You can use numbers. Please check docs for details', 'crypterium'),
                            'group' => esc_html__('Animate', 'crypterium' ),
                        ),
                        array(
                            'type' => 'textfield',
                            'heading' => esc_html__('Aos animate anchor', 'crypterium'),
                            'param_name' => 'anchor2',
                            'description' => esc_html__('You can use numbers. Please check docs for details', 'crypterium'),
                            'group' => esc_html__('Animate', 'crypterium' ),
                        ),
                        array(
                            'type' => 'textfield',
                            'heading' => esc_html__('Aos animate placement', 'crypterium'),
                            'param_name' => 'placement2',
                            'description' => esc_html__('You can use numbers. Please check docs for details', 'crypterium'),
                            'group' => esc_html__('Animate', 'crypterium' ),
                        ),
                        array(
                            'type' => 'textfield',
                            'heading' => esc_html__('Aos animate once', 'crypterium'),
                            'param_name' => 'once2',
                            'description' => esc_html__('You can use numbers. Please check docs for details', 'crypterium'),
                            'group' => esc_html__('Animate', 'crypterium' ),
                        ),
                    )
                ), // param_group
                //animate
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Aos animate', 'crypterium'),
                    'param_name' => 'aos',
                    'description' => esc_html__('Please check docs for details', 'crypterium'),
                    'group' => esc_html__('Animate', 'crypterium' ),
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Aos animate delay', 'crypterium'),
                    'param_name' => 'delay',
                    'description' => esc_html__('You can use numbers. Please check docs for details', 'crypterium'),
                    'group' => esc_html__('Animate', 'crypterium' ),
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Aos animate duration', 'crypterium'),
                    'param_name' => 'duration',
                    'description' => esc_html__('You can use numbers. Please check docs for details', 'crypterium'),
                    'group' => esc_html__('Animate', 'crypterium' ),
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Aos animate offset', 'crypterium'),
                    'param_name' => 'offset',
                    'description' => esc_html__('You can use numbers. Please check docs for details', 'crypterium'),
                    'group' => esc_html__('Animate', 'crypterium' ),
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Aos animate easing', 'crypterium'),
                    'param_name' => 'easing',
                    'description' => esc_html__('You can use numbers. Please check docs for details', 'crypterium'),
                    'group' => esc_html__('Animate', 'crypterium' ),
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Aos animate anchor', 'crypterium'),
                    'param_name' => 'anchor',
                    'description' => esc_html__('You can use numbers. Please check docs for details', 'crypterium'),
                    'group' => esc_html__('Animate', 'crypterium' ),
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Aos animate placement', 'crypterium'),
                    'param_name' => 'placement',
                    'description' => esc_html__('You can use numbers. Please check docs for details', 'crypterium'),
                    'group' => esc_html__('Animate', 'crypterium' ),
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Aos animate once', 'crypterium'),
                    'param_name' => 'once',
                    'description' => esc_html__('You can use numbers. Please check docs for details', 'crypterium'),
                    'group' => esc_html__('Animate', 'crypterium' ),
                ),
                // title
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Title font-size', 'crypterium'),
                    'param_name' => 'tsize',
                    'description' => esc_html__('Change title font-size. Use number in ( px or unit )', 'crypterium'),
                    'group' => esc_html__('Custom Style', 'crypterium' ),
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Title line-height', 'crypterium'),
                    'param_name' => 'tlineh',
                    'description' => esc_html__('Change title line-height. Use number in ( px or unit )', 'crypterium'),
                    'group' => esc_html__('Custom Style', 'crypterium' ),
                ),
                array(
                    'type' => 'colorpicker',
                    'heading' => esc_html__('Title color', 'crypterium'),
                    'param_name' => 'tcolor',
                    'description' => esc_html__('Change title color.', 'crypterium'),
                    'group' => esc_html__('Custom Style', 'crypterium' ),
                ),
                array(
                    'type' => 'css_editor',
                    'heading' => esc_html__('Background CSS', 'crypterium' ),
                    'param_name' => 'css',
                    'group' => esc_html__('Background options', 'crypterium' ),
                ),
            )
        )
    );
}
class Crypterium_Table_Shortcode extends WPBakeryShortCode {
}

/*-----------------------------------------------------------------------------------*/
/*	TEAM_VC
/*-----------------------------------------------------------------------------------*/
add_action( 'vc_before_init', 'crypterium_team_vc_type_shortcode_integrateWithVC' );
function crypterium_team_vc_type_shortcode_integrateWithVC() {
    vc_map(
        array(
            'name' => esc_html__( 'Team', 'crypterium' ),
            'base' => 'crypterium_team_vc_type_shortcode',
            'icon' => 'icon-wpb-row',
            'category' => esc_html__( 'Crypterium', 'crypterium'),
            'params' => array(
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__('Theme section classes', 'crypterium' ),
                    'param_name' => 'sp',
                    'description' => esc_html__('You can select an option for default section paddings', 'crypterium'),
                    'value' => array(
                        esc_html__('Select options', 'crypterium' ) => '',
                        esc_html__('section (140px padding)', 'crypterium' ) => 'section',
                        esc_html__('section no padding top', 'crypterium' ) => 'section section--no-pt',
                        esc_html__('section no padding bottom', 'crypterium' ) => 'section section--no-pb',
                        esc_html__('section no padding top and bottom', 'crypterium' ) => 'section section--no-pb section--no-pt',
                    ),
                ),
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__('Theme section default backgrounds', 'crypterium' ),
                    'param_name' => 'bg',
                    'description' => esc_html__('You can select an option for default section paddings', 'crypterium'),
                    'value' => array(
                        esc_html__('Select options', 'crypterium' ) => 'section-no-bg',
                        esc_html__('Base background', 'crypterium' ) => 'section--base-bg',
                        esc_html__('Light background', 'crypterium' ) => 'section--light-bg',
                        esc_html__('Blue background', 'crypterium' ) => 'section--blue-bg',
                        esc_html__('Light blue background', 'crypterium' ) => 'section--light-blue-bg',
                        esc_html__('Dark background', 'crypterium' ) => 'section--dark-bg',
                    ),
                ),
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__('Box style', 'crypterium' ),
                    'param_name' => 'type',
                    'description' => esc_html__('Team box styles', 'crypterium' ),
                    'value' => array(
                        esc_html__('Select style', 'crypterium' ) => '',
                        esc_html__('Style 1', 'crypterium' ) => 'team--style-1',
                        esc_html__('Style 2', 'crypterium' ) => 'team--style-2',
                    ),
                ),
                array(
                    'type' => 'attach_image',
                    'heading' => esc_html__('Team member image', 'crypterium'),
                    'param_name' => 'img',
                    'description' => esc_html__('Add image', 'crypterium'),
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Image width', 'crypterium'),
                    'param_name' => 'img_w',
                    'description' => esc_html__('Control your image width', 'crypterium'),
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Image height', 'crypterium'),
                    'param_name' => 'img_h',
                    'description' => esc_html__('Control your image width', 'crypterium'),
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Title', 'crypterium'),
                    'param_name' => 'title',
                    'description' => esc_html__('Add title', 'crypterium'),
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Icon', 'crypterium'),
                    'param_name' => 'icon',
                    'description' => esc_html__('Add icon', 'crypterium'),
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Icon url', 'crypterium'),
                    'param_name' => 'url',
                    'description' => esc_html__('Add url', 'crypterium'),
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Subtitle', 'crypterium'),
                    'param_name' => 'subtitle',
                    'description' => esc_html__('Add subtitle', 'crypterium'),
                ),
                array(
                    'type' => 'textarea',
                    'heading' => esc_html__('Description', 'crypterium'),
                    'param_name' => 'desc',
                    'description' => esc_html__('Add description', 'crypterium'),
                ),
                //animate
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Aos animate', 'crypterium'),
                    'param_name' => 'aos',
                    'description' => esc_html__('Please check docs for details', 'crypterium'),
                    'group' => esc_html__('Animate', 'crypterium' ),
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Aos animate delay', 'crypterium'),
                    'param_name' => 'delay',
                    'description' => esc_html__('You can use numbers. Please check docs for details', 'crypterium'),
                    'group' => esc_html__('Animate', 'crypterium' ),
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Aos animate duration', 'crypterium'),
                    'param_name' => 'duration',
                    'description' => esc_html__('You can use numbers. Please check docs for details', 'crypterium'),
                    'group' => esc_html__('Animate', 'crypterium' ),
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Aos animate offset', 'crypterium'),
                    'param_name' => 'offset',
                    'description' => esc_html__('You can use numbers. Please check docs for details', 'crypterium'),
                    'group' => esc_html__('Animate', 'crypterium' ),
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Aos animate easing', 'crypterium'),
                    'param_name' => 'easing',
                    'description' => esc_html__('You can use numbers. Please check docs for details', 'crypterium'),
                    'group' => esc_html__('Animate', 'crypterium' ),
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Aos animate anchor', 'crypterium'),
                    'param_name' => 'anchor',
                    'description' => esc_html__('You can use numbers. Please check docs for details', 'crypterium'),
                    'group' => esc_html__('Animate', 'crypterium' ),
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Aos animate placement', 'crypterium'),
                    'param_name' => 'placement',
                    'description' => esc_html__('You can use numbers. Please check docs for details', 'crypterium'),
                    'group' => esc_html__('Animate', 'crypterium' ),
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Aos animate once', 'crypterium'),
                    'param_name' => 'once',
                    'description' => esc_html__('You can use numbers. Please check docs for details', 'crypterium'),
                    'group' => esc_html__('Animate', 'crypterium' ),
                ),
                // title
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Title font-size', 'crypterium'),
                    'param_name' => 'tsize',
                    'description' => esc_html__('Change title font-size. Use number in ( px or unit )', 'crypterium'),
                    'group' => esc_html__('Custom Style', 'crypterium' ),
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Title line-height', 'crypterium'),
                    'param_name' => 'tlineh',
                    'description' => esc_html__('Change title line-height. Use number in ( px or unit )', 'crypterium'),
                    'group' => esc_html__('Custom Style', 'crypterium' ),
                ),
                array(
                    'type' => 'colorpicker',
                    'heading' => esc_html__('Title color', 'crypterium'),
                    'param_name' => 'tcolor',
                    'description' => esc_html__('Change title color.', 'crypterium'),
                    'group' => esc_html__('Custom Style', 'crypterium' ),
                ),
                array(
                    'type' => 'css_editor',
                    'heading' => esc_html__('Background CSS', 'crypterium' ),
                    'param_name' => 'css',
                    'group' => esc_html__('Background options', 'crypterium' ),
                ),
            )
        )
    );
}
class Crypterium_Team_Vc_Type_Shortcode extends WPBakeryShortCode {
}

/*----------------------------------------------------------------------------------*/
/*	calltoaction
/*-----------------------------------------------------------------------------------*/
add_action( 'vc_before_init', 'crypterium_calltoaction_shortcode_integrateWithVC' );
function crypterium_calltoaction_shortcode_integrateWithVC() {
    vc_map(
        array(
            'name' => esc_html__( 'Call To Action', 'crypterium' ),
            'base' => 'crypterium_calltoaction_shortcode',
            'icon' => 'icon-wpb-row',
            'category' => esc_html__( 'Crypterium', 'crypterium'),
            'params' => array(
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__('Forms', 'crypterium' ),
                    'param_name' => 'type',
                    'description' => esc_html__('Forms', 'crypterium' ),
                    'value' => array(
                        esc_html__('Select style', 'crypterium' ) => '',
                        esc_html__('Center + Green Button', 'crypterium' ) => 'type1',
                        esc_html__('Left + Parallax', 'crypterium' ) => 'type2',
                    ),
                ),
                array(
                    'type' => 'textarea_html',
                    'heading' => esc_html__('Content', 'crypterium' ),
                    'param_name' => 'content',
                    'description' => esc_html__('Add any content', 'crypterium' ),
                ),
                array(
                    'type' => 'vc_link',
                    'heading' => esc_html__('Right Button', 'crypterium' ),
                    'param_name' => 'btnlink',
                    'description' => esc_html__('Add button title and link.', 'crypterium' ),
                ),
                //animate
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Aos animate', 'crypterium'),
                    'param_name' => 'aos',
                    'description' => esc_html__('Please check docs for details', 'crypterium'),
                    'group' => esc_html__('Animate', 'crypterium' ),
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Aos animate delay', 'crypterium'),
                    'param_name' => 'delay',
                    'description' => esc_html__('You can use numbers. Please check docs for details', 'crypterium'),
                    'group' => esc_html__('Animate', 'crypterium' ),
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Aos animate duration', 'crypterium'),
                    'param_name' => 'duration',
                    'description' => esc_html__('You can use numbers. Please check docs for details', 'crypterium'),
                    'group' => esc_html__('Animate', 'crypterium' ),
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Aos animate offset', 'crypterium'),
                    'param_name' => 'offset',
                    'description' => esc_html__('You can use numbers. Please check docs for details', 'crypterium'),
                    'group' => esc_html__('Animate', 'crypterium' ),
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Aos animate easing', 'crypterium'),
                    'param_name' => 'easing',
                    'description' => esc_html__('You can use numbers. Please check docs for details', 'crypterium'),
                    'group' => esc_html__('Animate', 'crypterium' ),
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Aos animate anchor', 'crypterium'),
                    'param_name' => 'anchor',
                    'description' => esc_html__('You can use numbers. Please check docs for details', 'crypterium'),
                    'group' => esc_html__('Animate', 'crypterium' ),
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Aos animate placement', 'crypterium'),
                    'param_name' => 'placement',
                    'description' => esc_html__('You can use numbers. Please check docs for details', 'crypterium'),
                    'group' => esc_html__('Animate', 'crypterium' ),
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Aos animate once', 'crypterium'),
                    'param_name' => 'once',
                    'description' => esc_html__('You can use numbers. Please check docs for details', 'crypterium'),
                    'group' => esc_html__('Animate', 'crypterium' ),
                ),
                //animate
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Aos animate', 'crypterium'),
                    'param_name' => 'aos2',
                    'description' => esc_html__('Please check docs for details', 'crypterium'),
                    'group' => esc_html__('Animate button', 'crypterium' ),
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Aos animate delay', 'crypterium'),
                    'param_name' => 'delay2',
                    'description' => esc_html__('You can use numbers. Please check docs for details', 'crypterium'),
                    'group' => esc_html__('Animate button', 'crypterium' ),
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Aos animate duration', 'crypterium'),
                    'param_name' => 'duration2',
                    'description' => esc_html__('You can use numbers. Please check docs for details', 'crypterium'),
                    'group' => esc_html__('Animate button', 'crypterium' ),
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Aos animate offset', 'crypterium'),
                    'param_name' => 'offset2',
                    'description' => esc_html__('You can use numbers. Please check docs for details', 'crypterium'),
                    'group' => esc_html__('Animate button', 'crypterium' ),
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Aos animate easing', 'crypterium'),
                    'param_name' => 'easing2',
                    'description' => esc_html__('You can use numbers. Please check docs for details', 'crypterium'),
                    'group' => esc_html__('Animate button', 'crypterium' ),
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Aos animate anchor', 'crypterium'),
                    'param_name' => 'anchor2',
                    'description' => esc_html__('You can use numbers. Please check docs for details', 'crypterium'),
                    'group' => esc_html__('Animate button', 'crypterium' ),
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Aos animate placement', 'crypterium'),
                    'param_name' => 'placement2',
                    'description' => esc_html__('You can use numbers. Please check docs for details', 'crypterium'),
                    'group' => esc_html__('Animate button', 'crypterium' ),
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Aos animate once', 'crypterium'),
                    'param_name' => 'once2',
                    'description' => esc_html__('You can use numbers. Please check docs for details', 'crypterium'),
                    'group' => esc_html__('Animate button', 'crypterium' ),
                ),
                array(
                    'type' => 'css_editor',
                    'heading' => esc_html__('Background CSS', 'crypterium' ),
                    'param_name' => 'css',
                    'group' => esc_html__('Background options', 'crypterium' ),
                ),
            )
        )
    );
}
class Crypterium_Calltoaction_Shortcode extends WPBakeryShortCode {
}


/*-----------------------------------------------------------------------------------*/
/*	Login
/*-----------------------------------------------------------------------------------*/
add_action( 'vc_before_init', 'crypterium_login_shortcode_integrateWithVC' );
function crypterium_login_shortcode_integrateWithVC() {
    vc_map(
        array(
            'name' => esc_html__( 'Login/Sign Up Forms', 'crypterium' ),
            'base' => 'crypterium_login_shortcode',
            'icon' => 'icon-wpb-row',
            'category' => esc_html__( 'Crypterium', 'crypterium'),
            'params' => array(
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__('Forms', 'crypterium' ),
                    'param_name' => 'type',
                    'description' => esc_html__('Forms', 'crypterium' ),
                    'value' => array(
                        esc_html__('Select style', 'crypterium' ) => '',
                        esc_html__('Login form', 'crypterium' ) => 'log',
                        esc_html__('Register Form', 'crypterium' ) => 'reg',
                    ),
                ),
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__('Theme section classes', 'crypterium' ),
                    'param_name' => 'sp',
                    'description' => esc_html__('You can select an option for default section paddings', 'crypterium'),
                    'value' => array(
                        esc_html__('Select options', 'crypterium' ) => '',
                        esc_html__('section (140px padding)', 'crypterium' ) => 'section',
                        esc_html__('section no padding top', 'crypterium' ) => 'section section--no-pt',
                        esc_html__('section no padding bottom', 'crypterium' ) => 'section section--no-pb',
                        esc_html__('section no padding top and bottom', 'crypterium' ) => 'section section--no-pb section--no-pt',
                    ),
                ),
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__('Theme section default backgrounds', 'crypterium' ),
                    'param_name' => 'bg',
                    'description' => esc_html__('You can select an option for default section paddings', 'crypterium'),
                    'value' => array(
                        esc_html__('Select options', 'crypterium' ) => 'section-no-bg',
                        esc_html__('Base background', 'crypterium' ) => 'section--base-bg',
                        esc_html__('Light background', 'crypterium' ) => 'section--light-bg',
                        esc_html__('Blue background', 'crypterium' ) => 'section--blue-bg',
                        esc_html__('Light blue background', 'crypterium' ) => 'section--light-blue-bg',
                        esc_html__('Dark background', 'crypterium' ) => 'section--dark-bg',
                    ),
                ),
                array(
                    'type' => 'attach_image',
                    'heading' => esc_html__('Logo', 'crypterium'),
                    'param_name' => 'img',
                    'description' => esc_html__('Add your logo', 'crypterium'),
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Form title', 'crypterium' ),
                    'param_name' => 'title',
                    'description' => esc_html__('Add text', 'crypterium' ),
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Forgot link text', 'crypterium' ),
                    'param_name' => 'forgot',
                    'description' => esc_html__('Add text', 'crypterium' ),
                ),
                array(
                    'type' => 'vc_link',
                    'heading' => esc_html__('Heading area button (Link)', 'crypterium' ),
                    'param_name' => 'btnlink',
                    'description' => esc_html__('Add button title and link.', 'crypterium' ),
                    'group' => esc_html__('Button', 'crypterium' ),
                ),
                array(
                    'type' => 'css_editor',
                    'heading' => esc_html__('Background CSS', 'crypterium' ),
                    'param_name' => 'css',
                    'group' => esc_html__('Background options', 'crypterium' ),
                ),
            )
        )
    );
}
class crypterium_login_shortcode extends WPBakeryShortCode {
}

/*-----------------------------------------------------------------------------------*/
/*	searchform
/*-----------------------------------------------------------------------------------*/
add_action( 'vc_before_init', 'crypterium_searchform_shortcode_integrateWithVC' );
function crypterium_searchform_shortcode_integrateWithVC() {
    vc_map(
        array(
            'name' => esc_html__( 'Search form', 'crypterium' ),
            'base' => 'crypterium_searchform_shortcode',
            'icon' => 'icon-wpb-row',
            'category' => esc_html__( 'Crypterium', 'crypterium'),
            'params' => array(
                array(
                    'type' => 'colorpicker',
                    'heading' => esc_html__('Form background color', 'crypterium'),
                    'param_name' => 'bg',
                    'description' => esc_html__('Change color.', 'crypterium'),
                ),
                array(
                    'type' => 'colorpicker',
                    'heading' => esc_html__('Form button background color', 'crypterium'),
                    'param_name' => 'pbg',
                    'description' => esc_html__('Change color.', 'crypterium'),
                ),
                array(
                    'type' => 'colorpicker',
                    'heading' => esc_html__('Form button  color', 'crypterium'),
                    'param_name' => 'pc',
                    'description' => esc_html__('Change  color.', 'crypterium'),
                ),
            )
        )
    );
}
class crypterium_Searchform_shortcode extends WPBakeryShortCode {
}

/*-----------------------------------------------------------------------------------*/
/*	play button
/*-----------------------------------------------------------------------------------*/
add_action( 'vc_before_init', 'crypterium_play_btn_shortcode_integrateWithVC' );
function crypterium_play_btn_shortcode_integrateWithVC() {
    vc_map(
        array(
            'name' => esc_html__( 'Big play button', 'crypterium' ),
            'base' => 'crypterium_play_btn_shortcode',
            'icon' => 'icon-wpb-row',
            'category' => esc_html__( 'Crypterium', 'crypterium'),
            'params' => array(
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('CSS class', 'crypterium' ),
                    'param_name' => 'class',
                    'description' => esc_html__('Add your class for multiple usage', 'crypterium' ),
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Inline CSS area', 'crypterium' ),
                    'param_name' => 'style',
                    'description' => esc_html__('You can add any css lines, usage : .myclass { color:#fff;background:#333; } .myclass:after { color:#fff;background:#333; }', 'crypterium' ),
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Button url', 'crypterium' ),
                    'param_name' => 'url',
                    'description' => esc_html__('Add your youtube or vimeo url', 'crypterium' ),
                ),
            )
        )
    );
}
class Crypterium_Play_Button_shortcode extends WPBakeryShortCode {
}


/*-----------------------------------------------------------------------------------*/
/*	PRICING LOOP
/*-----------------------------------------------------------------------------------*/
add_action( 'vc_before_init', 'crypterium_pricing_shortcode_integrateWithVC' );
function crypterium_pricing_shortcode_integrateWithVC() {
    vc_map(
        array(
            'name' => esc_html__('Pricing Loop ( CPT )', 'crypterium'),
            'base' => 'crypterium_pricing_shortcode',
            'category'=> esc_html__('Crypterium', 'crypterium'),
            'content_element' => true,
            'icon' => 'icon-wpb-row',
            'params' => array(
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__('Box style', 'crypterium' ),
                    'param_name' => 'type',
                    'description' => esc_html__('Box styles - Style 5 disabled, will not use.', 'crypterium' ),
                    'value' => array(
                        esc_html__('Select style', 'crypterium' ) => '',
                        esc_html__('Style 1', 'crypterium' ) => 'type1',
                        esc_html__('Style 2', 'crypterium' ) => 'type2',
                        esc_html__('Style 3', 'crypterium' ) => 'type3',
                        esc_html__('Style 4', 'crypterium' ) => 'type4',
                        esc_html__('Style 5 - disabled', 'crypterium' ) => 'type5',
                        esc_html__('Style 6', 'crypterium' ) => 'type6',
                    ),
                ),
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__('Tabs shortcode', 'crypterium' ),
                    'param_name' => 'tabs',
                    'description' => esc_html__('If you want to add this shortcode in theme tabs shortcode, select yes', 'crypterium' ),
                    'value' => array(
                        esc_html__('Select style', 'crypterium' ) => '',
                        esc_html__('Yes', 'crypterium' ) => 'yes',
                        esc_html__('No', 'crypterium' ) => 'no',
                    ),
                ),
                array(
                    'type' => 'posttypes',
                    'heading' => esc_html__('Select your post type', 'crypterium'),
                    'param_name' => 'custompost',
                    'group' => esc_html__('Post Options', 'crypterium'),
                    'description' => esc_html__('You can select your created CPT.Default post type name is price.', 'crypterium'),
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Category', 'crypterium' ),
                    'param_name' => 'postcat',
                    'group' => esc_html__('Post Options', 'crypterium'),
                    'description' => esc_html__('Enter post category or write all', 'crypterium'),
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Order', 'crypterium' ),
                    'param_name' => 'order',
                    'group' => esc_html__('Post Options', 'crypterium'),
                    'description' => esc_html__('Enter post order. DESC or ASC', 'crypterium'),
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Orderby', 'crypterium' ),
                    'param_name' => 'orderby',
                    'group' => esc_html__('Post Options', 'crypterium'),
                    'description' => esc_html__('Enter post orderby. Default is : date', 'crypterium'),
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Title', 'crypterium'),
                    'param_name' => 'title',
                    'group' => esc_html__('Heading', 'crypterium'),
                    'description' => esc_html__('Add title.', 'crypterium'),
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Subtitle', 'crypterium'),
                    'param_name' => 'subtitle',
                    'group' => esc_html__('Heading', 'crypterium'),
                    'description' => esc_html__('Add subtitle.', 'crypterium'),
                ),
                array(
                    'type' => 'textarea',
                    'heading' => esc_html__('Detail', 'crypterium'),
                    'param_name' => 'desc',
                    'group' => esc_html__('Heading', 'crypterium'),
                    'description' => esc_html__('Add description or text block.', 'crypterium'),
                ),
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__('Heading color', 'crypterium' ),
                    'param_name' => 'h_color',
                    'group' => esc_html__('Heading', 'crypterium'),
                    'description' => esc_html__('You can select color for heading general', 'crypterium' ),
                    'value' => array(
                        esc_html__('Select tag', 'crypterium' ) => '',
                        esc_html__('Default', 'crypterium' ) => 'default',
                        esc_html__('White', 'crypterium' ) => 'white',
                    ),
                ),
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__('Alignment', 'crypterium' ),
                    'param_name' => 'alignment',
                    'group' => esc_html__('Heading', 'crypterium'),
                    'description' => esc_html__('You can select text position with alignment', 'crypterium' ),
                    'value' => array(
                        esc_html__('Select position', 'crypterium' ) => '',
                        esc_html__('Left', 'crypterium' ) => 'text--left',
                        esc_html__('Right', 'crypterium' ) => 'text--lg-right',
                        esc_html__('Center', 'crypterium' ) => 'section-heading--center',
                    ),
                ),
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__('Margin bottom', 'crypterium' ),
                    'param_name' => 'margin',
                    'group' => esc_html__('Heading', 'crypterium'),
                    'description' => esc_html__('You can select tag for subheading font-size', 'crypterium' ),
                    'value' => array(
                        esc_html__('Select', 'crypterium' ) => '',
                        esc_html__('0', 'crypterium' ) => '0',
                        esc_html__('5', 'crypterium' ) => '5',
                        esc_html__('10', 'crypterium' ) => '10',
                        esc_html__('15', 'crypterium' ) => '15',
                        esc_html__('20', 'crypterium' ) => '20',
                        esc_html__('25', 'crypterium' ) => '25',
                        esc_html__('30', 'crypterium' ) => '30',
                        esc_html__('35', 'crypterium' ) => '35',
                        esc_html__('40', 'crypterium' ) => '40',
                        esc_html__('45', 'crypterium' ) => '45',
                        esc_html__('50', 'crypterium' ) => '50',
                        esc_html__('55', 'crypterium' ) => '55',
                        esc_html__('60', 'crypterium' ) => '60',
                    ),
                ),
                //animate
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Aos animate', 'crypterium'),
                    'param_name' => 'aos',
                    'description' => esc_html__('Please check docs for details', 'crypterium'),
                    'group' => esc_html__('Animate', 'crypterium' ),
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Aos animate delay', 'crypterium'),
                    'param_name' => 'delay',
                    'description' => esc_html__('You can use numbers. Please check docs for details', 'crypterium'),
                    'group' => esc_html__('Animate', 'crypterium' ),
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Aos animate duration', 'crypterium'),
                    'param_name' => 'duration',
                    'description' => esc_html__('You can use numbers. Please check docs for details', 'crypterium'),
                    'group' => esc_html__('Animate', 'crypterium' ),
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Aos animate offset', 'crypterium'),
                    'param_name' => 'offset',
                    'description' => esc_html__('You can use numbers. Please check docs for details', 'crypterium'),
                    'group' => esc_html__('Animate', 'crypterium' ),
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Aos animate easing', 'crypterium'),
                    'param_name' => 'easing',
                    'description' => esc_html__('You can use numbers. Please check docs for details', 'crypterium'),
                    'group' => esc_html__('Animate', 'crypterium' ),
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Aos animate anchor', 'crypterium'),
                    'param_name' => 'anchor',
                    'description' => esc_html__('You can use numbers. Please check docs for details', 'crypterium'),
                    'group' => esc_html__('Animate', 'crypterium' ),
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Aos animate placement', 'crypterium'),
                    'param_name' => 'placement',
                    'description' => esc_html__('You can use numbers. Please check docs for details', 'crypterium'),
                    'group' => esc_html__('Animate', 'crypterium' ),
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Aos animate once', 'crypterium'),
                    'param_name' => 'once',
                    'description' => esc_html__('You can use numbers. Please check docs for details', 'crypterium'),
                    'group' => esc_html__('Animate', 'crypterium' ),
                ),
                // custom style
                // pack title
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Pack title font-size', 'crypterium'),
                    'param_name' => 'tsize',
                    'description' => esc_html__('Change pack title fontsize.use number in ( px or unit )', 'crypterium'),
                    'group' => esc_html__('Custom Style', 'crypterium' ),
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Pack title line-height', 'crypterium'),
                    'param_name' => 'tlineh',
                    'description' => esc_html__('Change pack title line-height.use number in ( px or unit )', 'crypterium'),
                    'group' => esc_html__('Custom Style', 'crypterium' ),
                ),
                array(
                    'type' => 'colorpicker',
                    'heading' => esc_html__('Pack title color', 'crypterium'),
                    'param_name' => 'tcolor',
                    'description' => esc_html__('Change pack title color.', 'crypterium'),
                    'group' => esc_html__('Custom Style', 'crypterium' ),
                ),
                // pack price
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Price font-size', 'crypterium'),
                    'param_name' => 'prcsize',
                    'description' => esc_html__('Change price font-size.use number in ( px or unit )example: 24', 'crypterium'),
                    'group' => esc_html__('Custom Style', 'crypterium' ),
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Pack price line-height', 'crypterium'),
                    'param_name' => 'prclineh',
                    'description' => esc_html__('Change pack price line-height.use number in ( px or unit )example: 44', 'crypterium'),
                    'group' => esc_html__('Custom Style', 'crypterium' ),
                ),
                array(
                    'type' => 'colorpicker',
                    'heading' => esc_html__('Price color', 'crypterium'),
                    'param_name' => 'prccolor',
                    'description' => esc_html__('Change price color.', 'crypterium'),
                    'group' => esc_html__('Custom Style', 'crypterium' ),
                ),
                // period
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Period font-size', 'crypterium'),
                    'param_name' => 'prysize',
                    'description' => esc_html__('Change period font-size.use number in ( px or unit )', 'crypterium'),
                    'group' => esc_html__('Custom Style', 'crypterium' ),
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Period line-height', 'crypterium'),
                    'param_name' => 'prylineh',
                    'description' => esc_html__('Change pack period line-height.use number in ( px or unit )', 'crypterium'),
                    'group' => esc_html__('Custom Style', 'crypterium' ),
                ),
                array(
                    'type' => 'colorpicker',
                    'heading' => esc_html__('Period color', 'crypterium'),
                    'param_name' => 'prycolor',
                    'description' => esc_html__('Change period color.', 'crypterium'),
                    'group' => esc_html__('Custom Style', 'crypterium' ),
                ),
                // list item
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Features font-size', 'crypterium'),
                    'param_name' => 'listsize',
                    'description' => esc_html__('Change features font-size.use number in ( px or unit )', 'crypterium'),
                    'group' => esc_html__('Custom Style', 'crypterium' ),
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Features line-height', 'crypterium'),
                    'param_name' => 'listlineh',
                    'description' => esc_html__('Change pack features line-height.use number in ( px or unit )', 'crypterium'),
                    'group' => esc_html__('Custom Style', 'crypterium' ),
                ),
                array(
                    'type' => 'colorpicker',
                    'heading' => esc_html__('Features color', 'crypterium'),
                    'param_name' => 'listcolor',
                    'description' => esc_html__('Change features color.', 'crypterium'),
                    'group' => esc_html__('Custom Style', 'crypterium' ),
                ),
                array(
                    'type' => 'colorpicker',
                    'heading' => esc_html__('Button background color', 'crypterium'),
                    'param_name' => 'btnbg',
                    'description' => esc_html__('Change button background color.', 'crypterium'),
                    'group' => esc_html__('Custom Style', 'crypterium' ),
                ),
                array(
                    'type' => 'colorpicker',
                    'heading' => esc_html__('Button title color', 'crypterium'),
                    'param_name' => 'btncolor',
                    'description' => esc_html__('Change button title color.', 'crypterium'),
                    'group' => esc_html__('Custom Style', 'crypterium' ),
                ),
            )
        )
    );
}
class WPBakeryShortCode_Crypterium_Pricing_Shortcode extends WPBakeryShortCode {
}

/*-----------------------------------------------------------------------------------*/
/*	PRICING LOOP
/*-----------------------------------------------------------------------------------*/
add_action( 'vc_before_init', 'crypterium_pricing_item_shortcode_integrateWithVC' );
function crypterium_pricing_item_shortcode_integrateWithVC() {
    vc_map(
        array(
            'name' => esc_html__('Pricing Item ( CPT )', 'crypterium'),
            'description' => esc_html__('For Pricing Post Type', 'crypterium' ),
            'base' => 'crypterium_pricing_item_shortcode',
            'category'=> esc_html__('Crypterium', 'crypterium'),
            'content_element' => true,
            'icon' => 'icon-wpb-row',
            'params' => array(
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__('Select Pack', 'crypterium' ),
                    'param_name' => 'pack_title',
                    'description' => esc_html__('Box styles.', 'crypterium' ),
                    'value' => crypterium_get_all_posts_by_type( 'pricing' )
                ),
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__('Box style', 'crypterium' ),
                    'param_name' => 'type',
                    'description' => esc_html__('Box styles.', 'crypterium' ),
                    'value' => array(
                        esc_html__('Select style', 'crypterium' ) => '',
                        esc_html__('Style 1', 'crypterium' ) => '1',
                        esc_html__('Style 2', 'crypterium' ) => '2',
                        esc_html__('Style 3', 'crypterium' ) => '3',
                        esc_html__('Style 4', 'crypterium' ) => '4',
                        esc_html__('Style 5', 'crypterium' ) => '6'
                    )
                ),
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__('Color type', 'crypterium' ),
                    'param_name' => 'color_type',
                    'description' => esc_html__('Box styles.', 'crypterium' ),
                    'value' => array(
                        esc_html__('Select type', 'crypterium' ) => '',
                        esc_html__('Style 1', 'crypterium' ) => '1',
                        esc_html__('Style 2', 'crypterium' ) => '2',
                        esc_html__('Style 3', 'crypterium' ) => '3',
                        esc_html__('Style 4', 'crypterium' ) => '4',
                        esc_html__('Custom', 'crypterium' ) => 'custom'
                    ),
                    'dependency' => array(
                        'element' => 'type',
                        'value' => array('2','4')
                    )
                ),
                array(
                    'type' => 'colorpicker',
                    'heading' => esc_html__('Custom color', 'crypterium'),
                    'param_name' => 'custom_color',
                    'description' => esc_html__('Change pack border color.', 'crypterium'),
                    'dependency' => array(
                        'element' => 'color_type',
                        'value' => 'custom'
                    )
                ),
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__('Featured Box', 'crypterium' ),
                    'param_name' => 'is_active',
                    'value' => array(
                        esc_html__('Select style', 'crypterium' ) => '',
                        esc_html__('Yes', 'crypterium' ) => 'yes',
                        esc_html__('No', 'crypterium' ) => 'no'
                    )
                ),
                //animate
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Aos animate', 'crypterium'),
                    'param_name' => 'aos',
                    'description' => esc_html__('Please check docs for details', 'crypterium'),
                    'group' => esc_html__('Animate', 'crypterium' ),
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Aos animate delay', 'crypterium'),
                    'param_name' => 'delay',
                    'description' => esc_html__('You can use numbers. Please check docs for details', 'crypterium'),
                    'group' => esc_html__('Animate', 'crypterium' ),
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Aos animate duration', 'crypterium'),
                    'param_name' => 'duration',
                    'description' => esc_html__('You can use numbers. Please check docs for details', 'crypterium'),
                    'group' => esc_html__('Animate', 'crypterium' ),
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Aos animate offset', 'crypterium'),
                    'param_name' => 'offset',
                    'description' => esc_html__('You can use numbers. Please check docs for details', 'crypterium'),
                    'group' => esc_html__('Animate', 'crypterium' ),
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Aos animate easing', 'crypterium'),
                    'param_name' => 'easing',
                    'description' => esc_html__('You can use numbers. Please check docs for details', 'crypterium'),
                    'group' => esc_html__('Animate', 'crypterium' ),
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Aos animate anchor', 'crypterium'),
                    'param_name' => 'anchor',
                    'description' => esc_html__('You can use numbers. Please check docs for details', 'crypterium'),
                    'group' => esc_html__('Animate', 'crypterium' ),
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Aos animate placement', 'crypterium'),
                    'param_name' => 'placement',
                    'description' => esc_html__('You can use numbers. Please check docs for details', 'crypterium'),
                    'group' => esc_html__('Animate', 'crypterium' ),
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Aos animate once', 'crypterium'),
                    'param_name' => 'once',
                    'description' => esc_html__('You can use numbers. Please check docs for details', 'crypterium'),
                    'group' => esc_html__('Animate', 'crypterium' ),
                ),
                // custom style
                // pack title
                array(
                    'type' => 'colorpicker',
                    'heading' => esc_html__('Pack background color', 'crypterium'),
                    'param_name' => 'packbg',
                    'description' => esc_html__('Change pack background color.', 'crypterium'),
                    'group' => esc_html__('Custom Style', 'crypterium' ),
                ),
                array(
                    'type' => 'colorpicker',
                    'heading' => esc_html__('Featured Pack Label background color', 'crypterium'),
                    'param_name' => 'packlabelbg',
                    'description' => esc_html__('Change featured pack label background color.', 'crypterium'),
                    'group' => esc_html__('Custom Style', 'crypterium' ),
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Pack title font-size', 'crypterium'),
                    'param_name' => 'tsize',
                    'description' => esc_html__('Change pack title fontsize.use number in ( px or unit )', 'crypterium'),
                    'group' => esc_html__('Custom Style', 'crypterium' ),
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Pack title line-height', 'crypterium'),
                    'param_name' => 'tlineh',
                    'description' => esc_html__('Change pack title line-height.use number in ( px or unit )', 'crypterium'),
                    'group' => esc_html__('Custom Style', 'crypterium' ),
                ),
                array(
                    'type' => 'colorpicker',
                    'heading' => esc_html__('Pack title color', 'crypterium'),
                    'param_name' => 'tcolor',
                    'description' => esc_html__('Change pack title color.', 'crypterium'),
                    'group' => esc_html__('Custom Style', 'crypterium' ),
                ),
                // pack price
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Price font-size', 'crypterium'),
                    'param_name' => 'prcsize',
                    'description' => esc_html__('Change price font-size.use number in ( px or unit )example: 24', 'crypterium'),
                    'group' => esc_html__('Custom Style', 'crypterium' ),
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Pack price line-height', 'crypterium'),
                    'param_name' => 'prclineh',
                    'description' => esc_html__('Change pack price line-height.use number in ( px or unit )example: 44', 'crypterium'),
                    'group' => esc_html__('Custom Style', 'crypterium' ),
                ),
                array(
                    'type' => 'colorpicker',
                    'heading' => esc_html__('Price color', 'crypterium'),
                    'param_name' => 'prccolor',
                    'description' => esc_html__('Change price color.', 'crypterium'),
                    'group' => esc_html__('Custom Style', 'crypterium' ),
                ),
                // period
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Period font-size', 'crypterium'),
                    'param_name' => 'prysize',
                    'description' => esc_html__('Change period font-size.use number in ( px or unit )', 'crypterium'),
                    'group' => esc_html__('Custom Style', 'crypterium' ),
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Period line-height', 'crypterium'),
                    'param_name' => 'prylineh',
                    'description' => esc_html__('Change pack period line-height.use number in ( px or unit )', 'crypterium'),
                    'group' => esc_html__('Custom Style', 'crypterium' ),
                ),
                array(
                    'type' => 'colorpicker',
                    'heading' => esc_html__('Period color', 'crypterium'),
                    'param_name' => 'prycolor',
                    'description' => esc_html__('Change period color.', 'crypterium'),
                    'group' => esc_html__('Custom Style', 'crypterium' ),
                ),
                // list item
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Features font-size', 'crypterium'),
                    'param_name' => 'listsize',
                    'description' => esc_html__('Change features font-size.use number in ( px or unit )', 'crypterium'),
                    'group' => esc_html__('Custom Style', 'crypterium' ),
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Features line-height', 'crypterium'),
                    'param_name' => 'listlineh',
                    'description' => esc_html__('Change pack features line-height.use number in ( px or unit )', 'crypterium'),
                    'group' => esc_html__('Custom Style', 'crypterium' ),
                ),
                array(
                    'type' => 'colorpicker',
                    'heading' => esc_html__('Features color', 'crypterium'),
                    'param_name' => 'listcolor',
                    'description' => esc_html__('Change features color.', 'crypterium'),
                    'group' => esc_html__('Custom Style', 'crypterium' ),
                ),
                array(
                    'type' => 'colorpicker',
                    'heading' => esc_html__('Button background color', 'crypterium'),
                    'param_name' => 'btnbg',
                    'description' => esc_html__('Change button background color.', 'crypterium'),
                    'group' => esc_html__('Custom Style', 'crypterium' ),
                ),
                array(
                    'type' => 'colorpicker',
                    'heading' => esc_html__('Button title color', 'crypterium'),
                    'param_name' => 'btncolor',
                    'description' => esc_html__('Change button title color.', 'crypterium'),
                    'group' => esc_html__('Custom Style', 'crypterium' ),
                )
            )
        )
    );
}
class WPBakeryShortCode_Crypterium_Pricing_Item_Shortcode extends WPBakeryShortCode {
}

/*-----------------------------------------------------------------------------------*/
/*	tabs container
/*-----------------------------------------------------------------------------------*/
add_action( 'vc_before_init', 'crypterium_tabs_shortcode_integrateWithVC' );
function crypterium_tabs_shortcode_integrateWithVC() {
    vc_map(
        array(
            'name' => esc_html__( 'Theme Tabs', 'crypterium' ),
            'base' => 'crypterium_tabs_shortcode',
            'icon' => 'icon-wpb-row',
            "content_element" => true,
            "show_settings_on_create" => false,
            "is_container" => true,
            'category' => esc_html__( 'Crypterium', 'crypterium'),
            'params' => array(
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('CSS class', 'crypterium' ),
                    'param_name' => 'class',
                    'description' => esc_html__('Add your class for multiple usage', 'crypterium' ),
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Inline CSS area', 'crypterium' ),
                    'param_name' => 'style',
                    'description' => esc_html__('You can add any css lines, usage : .myclass { color:#fff;background:#333; } .myclass:after { color:#fff;background:#333; }', 'crypterium' ),
                ),
                array(
                    'type' => 'param_group',
                    'heading' => esc_html__('Tab items', 'crypterium' ),
                    'param_name' => 'items',
                    'params' => array(
                        array(
                            'type' => 'attach_image',
                            'heading' => esc_html__('Background image', 'crypterium'),
                            'param_name' => 'img',
                            'description' => esc_html__('Add your partner image', 'crypterium'),
                        ),
                        array(
                            'type' => 'textarea',
                            'heading' => esc_html__('Content Area', 'crypterium'),
                            'param_name' => 'contents',
                            'description' => esc_html__('You can add your form and other html parts', 'crypterium'),
                        ),
                    )
                ), // array
            ),
            "js_view" => 'VcColumnView',
        )
    );
}
class WPBakeryShortCode_Crypterium_Tabs_shortcode extends WPBakeryShortCodesContainer {
}

/*-----------------------------------------------------------------------------------*/
/*	events
/*-----------------------------------------------------------------------------------*/
add_action( 'vc_before_init', 'crypterium_events_shortcode_integrateWithVC' );
function crypterium_events_shortcode_integrateWithVC() {
    vc_map(
        array(
            'name' => esc_html__( 'Events', 'crypterium' ),
            'base' => 'crypterium_events_shortcode',
            'icon' => 'icon-wpb-row',
            'category' => esc_html__( 'Crypterium', 'crypterium'),
            'params' => array(
                array(
                    'type' => 'param_group',
                    'heading' => esc_html__('Tab items', 'crypterium' ),
                    'param_name' => 'items',
                    'params' => array(
                        array(
                            'type' => 'vc_link',
                            'heading' => esc_html__('Title and url', 'crypterium' ),
                            'param_name' => 'btnlink',
                            'description' => esc_html__('Add title and link.', 'crypterium' ),
                        ),
                        array(
                            'type' => 'textfield',
                            'heading' => esc_html__('Day', 'crypterium'),
                            'param_name' => 'day',
                        ),
                        array(
                            'type' => 'textfield',
                            'heading' => esc_html__('Month', 'crypterium'),
                            'param_name' => 'month',
                        ),
                        array(
                            'type' => 'textfield',
                            'heading' => esc_html__('Year', 'crypterium'),
                            'param_name' => 'year',
                        ),
                        array(
                            'type' => 'textarea',
                            'heading' => esc_html__('Description', 'crypterium'),
                            'param_name' => 'contents',
                        ),
                    )
                )
            )
        )
    );
}
class WPBakeryShortCode_Crypterium_Events_shortcode extends WPBakeryShortCode {
}

/*-----------------------------------------------------------------------------------*/
/*	TEAM_VC
/*-----------------------------------------------------------------------------------*/
add_action( 'vc_before_init', 'crypterium_banner_shortcode_integrateWithVC' );
function crypterium_banner_shortcode_integrateWithVC() {
    vc_map(
        array(
            'name' => esc_html__( 'Banner', 'crypterium' ),
            'base' => 'crypterium_banner_shortcode',
            'icon' => 'icon-wpb-row',
            'category' => esc_html__( 'Crypterium', 'crypterium'),
            'params' => array(
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__('Theme section classes', 'crypterium' ),
                    'param_name' => 'sp',
                    'description' => esc_html__('You can select an option for default section paddings', 'crypterium'),
                    'value' => array(
                        esc_html__('Select options', 'crypterium' ) => '',
                        esc_html__('section (140px padding)', 'crypterium' ) => 'section',
                        esc_html__('section no padding top', 'crypterium' ) => 'section section--no-pt',
                        esc_html__('section no padding bottom', 'crypterium' ) => 'section section--no-pb',
                        esc_html__('section no padding top and bottom', 'crypterium' ) => 'section section--no-pb section--no-pt',
                    ),
                ),
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__('Theme section default backgrounds', 'crypterium' ),
                    'param_name' => 'bg',
                    'description' => esc_html__('You can select an option for default section paddings', 'crypterium'),
                    'value' => array(
                        esc_html__('Select options', 'crypterium' ) => 'section-no-bg',
                        esc_html__('Base background', 'crypterium' ) => 'section--base-bg',
                        esc_html__('Light background', 'crypterium' ) => 'section--light-bg',
                        esc_html__('Blue background', 'crypterium' ) => 'section--blue-bg',
                        esc_html__('Light blue background', 'crypterium' ) => 'section--light-blue-bg',
                        esc_html__('Dark background', 'crypterium' ) => 'section--dark-bg',
                    ),
                ),
                array(
                    'type' => 'attach_image',
                    'heading' => esc_html__('Background image', 'crypterium'),
                    'param_name' => 'img',
                    'description' => esc_html__('Add image', 'crypterium'),
                ),
                array(
                    'type' => 'attach_image',
                    'heading' => esc_html__('Background mobile image', 'crypterium'),
                    'param_name' => 'simg',
                    'description' => esc_html__('Add image', 'crypterium'),
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Subtitle', 'crypterium'),
                    'param_name' => 'subtitle',
                    'description' => esc_html__('Add subtitle', 'crypterium'),
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Title', 'crypterium'),
                    'param_name' => 'title',
                    'description' => esc_html__('Add title', 'crypterium'),
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Price', 'crypterium'),
                    'param_name' => 'price',
                    'description' => esc_html__('Add price', 'crypterium'),
                ),
                array(
                    'type' => 'textarea_html',
                    'heading' => esc_html__('Content Area', 'crypterium'),
                    'param_name' => 'content',
                    'description' => esc_html__('You can add your form and other html parts', 'crypterium'),
                ),
                //animate
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Aos animate', 'crypterium'),
                    'param_name' => 'aos',
                    'description' => esc_html__('Please check docs for details', 'crypterium'),
                    'group' => esc_html__('Animate', 'crypterium' ),
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Aos animate delay', 'crypterium'),
                    'param_name' => 'delay',
                    'description' => esc_html__('You can use numbers. Please check docs for details', 'crypterium'),
                    'group' => esc_html__('Animate', 'crypterium' ),
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Aos animate duration', 'crypterium'),
                    'param_name' => 'duration',
                    'description' => esc_html__('You can use numbers. Please check docs for details', 'crypterium'),
                    'group' => esc_html__('Animate', 'crypterium' ),
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Aos animate offset', 'crypterium'),
                    'param_name' => 'offset',
                    'description' => esc_html__('You can use numbers. Please check docs for details', 'crypterium'),
                    'group' => esc_html__('Animate', 'crypterium' ),
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Aos animate easing', 'crypterium'),
                    'param_name' => 'easing',
                    'description' => esc_html__('You can use numbers. Please check docs for details', 'crypterium'),
                    'group' => esc_html__('Animate', 'crypterium' ),
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Aos animate anchor', 'crypterium'),
                    'param_name' => 'anchor',
                    'description' => esc_html__('You can use numbers. Please check docs for details', 'crypterium'),
                    'group' => esc_html__('Animate', 'crypterium' ),
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Aos animate placement', 'crypterium'),
                    'param_name' => 'placement',
                    'description' => esc_html__('You can use numbers. Please check docs for details', 'crypterium'),
                    'group' => esc_html__('Animate', 'crypterium' ),
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Aos animate once', 'crypterium'),
                    'param_name' => 'once',
                    'description' => esc_html__('You can use numbers. Please check docs for details', 'crypterium'),
                    'group' => esc_html__('Animate', 'crypterium' ),
                ),
                // title
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Title font-size', 'crypterium'),
                    'param_name' => 'tsize',
                    'description' => esc_html__('Change title font-size. Use number in ( px or unit )', 'crypterium'),
                    'group' => esc_html__('Custom Style', 'crypterium' ),
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Title line-height', 'crypterium'),
                    'param_name' => 'tlineh',
                    'description' => esc_html__('Change title line-height. Use number in ( px or unit )', 'crypterium'),
                    'group' => esc_html__('Custom Style', 'crypterium' ),
                ),
                array(
                    'type' => 'colorpicker',
                    'heading' => esc_html__('Title color', 'crypterium'),
                    'param_name' => 'tcolor',
                    'description' => esc_html__('Change title color.', 'crypterium'),
                    'group' => esc_html__('Custom Style', 'crypterium' ),
                ),
                // title
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Subtitle font-size', 'crypterium'),
                    'param_name' => 'ttsize',
                    'description' => esc_html__('Change subtitle font-size. Use number in ( px or unit )', 'crypterium'),
                    'group' => esc_html__('Custom Style', 'crypterium' ),
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Subtitle line-height', 'crypterium'),
                    'param_name' => 'ttlineh',
                    'description' => esc_html__('Change subtitle line-height. Use number in ( px or unit )', 'crypterium'),
                    'group' => esc_html__('Custom Style', 'crypterium' ),
                ),
                array(
                    'type' => 'colorpicker',
                    'heading' => esc_html__('Subtitle color', 'crypterium'),
                    'param_name' => 'ttcolor',
                    'description' => esc_html__('Change subtitle color.', 'crypterium'),
                    'group' => esc_html__('Custom Style', 'crypterium' ),
                ),
                array(
                    'type' => 'css_editor',
                    'heading' => esc_html__('Background CSS', 'crypterium' ),
                    'param_name' => 'css',
                    'group' => esc_html__('Background options', 'crypterium' ),
                ),
            )
        )
    );
}
class Crypterium_Banner_Shortcode extends WPBakeryShortCode {
}

/*-----------------------------------------------------------------------------------*/
/*	TESTIMONIAL
/*-----------------------------------------------------------------------------------*/
add_action( 'vc_before_init', 'crypterium_products_shortcode_integrateWithVC' );
function crypterium_products_shortcode_integrateWithVC() {
    vc_map(
        array(
            'name' => esc_html__( 'Products - Mining', 'crypterium' ),
            'base' => 'crypterium_products_shortcode',
            'icon' => 'icon-wpb-row',
            'category' => esc_html__( 'Crypterium', 'crypterium'),
            'params' => array(
                array(
                    'type' => 'param_group',
                    'heading' => esc_html__('Items', 'crypterium' ),
                    'param_name' => 'loop',
                    'group' => esc_html__('Items', 'crypterium' ),
                    'params' => array(
                        array(
                            'type' => 'dropdown',
                            'heading' => esc_html__('Column', 'crypterium' ),
                            'param_name' => 'perpage',
                            'description' => esc_html__('Select an option', 'crypterium'),
                            'value' => array(
                                esc_html__('Select options', 'crypterium' ) => '',
                                esc_html__('2', 'crypterium' ) => '2',
                                esc_html__('3', 'crypterium' ) => '4',
                                esc_html__('4', 'crypterium' ) => '3',
                            ),
                        ),
                        array(
                            'type' => 'attach_image',
                            'heading' => esc_html__('Product image', 'crypterium'),
                            'param_name' => 'img',
                            'description' => esc_html__('Add your image', 'crypterium'),
                        ),
                        array(
                            'type' => 'textfield',
                            'heading' => esc_html__('Title', 'crypterium'),
                            'param_name' => 'title',
                            'description' => esc_html__('Add title', 'crypterium'),
                        ),
                        array(
                            'type' => 'textarea',
                            'heading' => esc_html__('Content Area', 'crypterium'),
                            'param_name' => 'desc',
                            'description' => esc_html__('You can add html parts', 'crypterium'),
                        ),
                        array(
                            'type' => 'textfield',
                            'heading' => esc_html__('Price', 'crypterium'),
                            'param_name' => 'price',
                            'description' => esc_html__('Add price', 'crypterium'),
                        ),
                        array(
                            'type' => 'vc_link',
                            'heading' => esc_html__('Button', 'crypterium' ),
                            'param_name' => 'btnlink',
                            'description' => esc_html__('Add button title and link.', 'crypterium' ),
                        ),
                        //animate
                        array(
                            'type' => 'textfield',
                            'heading' => esc_html__('Aos animate', 'crypterium'),
                            'param_name' => 'aos',
                            'description' => esc_html__('Please check docs for details', 'crypterium'),
                            'group' => esc_html__('Animate', 'crypterium' ),
                        ),
                        array(
                            'type' => 'textfield',
                            'heading' => esc_html__('Aos animate delay', 'crypterium'),
                            'param_name' => 'delay',
                            'description' => esc_html__('You can use numbers. Please check docs for details', 'crypterium'),
                            'group' => esc_html__('Animate', 'crypterium' ),
                        ),
                        array(
                            'type' => 'textfield',
                            'heading' => esc_html__('Aos animate duration', 'crypterium'),
                            'param_name' => 'duration',
                            'description' => esc_html__('You can use numbers. Please check docs for details', 'crypterium'),
                            'group' => esc_html__('Animate', 'crypterium' ),
                        ),
                        array(
                            'type' => 'textfield',
                            'heading' => esc_html__('Aos animate offset', 'crypterium'),
                            'param_name' => 'offsetaos',
                            'description' => esc_html__('You can use numbers. Please check docs for details', 'crypterium'),
                            'group' => esc_html__('Animate', 'crypterium' ),
                        ),
                        array(
                            'type' => 'textfield',
                            'heading' => esc_html__('Aos animate easing', 'crypterium'),
                            'param_name' => 'easing',
                            'description' => esc_html__('You can use numbers. Please check docs for details', 'crypterium'),
                            'group' => esc_html__('Animate', 'crypterium' ),
                        ),
                        array(
                            'type' => 'textfield',
                            'heading' => esc_html__('Aos animate anchor', 'crypterium'),
                            'param_name' => 'anchor',
                            'description' => esc_html__('You can use numbers. Please check docs for details', 'crypterium'),
                            'group' => esc_html__('Animate', 'crypterium' ),
                        ),
                        array(
                            'type' => 'textfield',
                            'heading' => esc_html__('Aos animate placement', 'crypterium'),
                            'param_name' => 'placement',
                            'description' => esc_html__('You can use numbers. Please check docs for details', 'crypterium'),
                            'group' => esc_html__('Animate', 'crypterium' ),
                        ),
                        array(
                            'type' => 'textfield',
                            'heading' => esc_html__('Aos animate once', 'crypterium'),
                            'param_name' => 'once',
                            'description' => esc_html__('You can use numbers. Please check docs for details', 'crypterium'),
                            'group' => esc_html__('Animate', 'crypterium' ),
                        ),
                    )
                ), // end param_group
                //custom style
                //quote
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Quote font-size', 'crypterium'),
                    'param_name' => 'qsize',
                    'description' => esc_html__('Change quote font-size. Use number in ( px or unit )', 'crypterium'),
                    'group' => esc_html__('Custom Style', 'crypterium' ),
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Quote line-height', 'crypterium'),
                    'param_name' => 'qlineh',
                    'description' => esc_html__('Change quote line-height. Use number in  ( px or unit )', 'crypterium'),
                    'group' => esc_html__('Custom Style', 'crypterium' ),
                ),
                array(
                    'type' => 'colorpicker',
                    'heading' => esc_html__('Quote color', 'crypterium'),
                    'param_name' => 'qcolor',
                    'description' => esc_html__('Change quote color.', 'crypterium'),
                    'group' => esc_html__('Custom Style', 'crypterium' ),
                ),
                //name
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Name font-size', 'crypterium'),
                    'param_name' => 'nsize',
                    'description' => esc_html__('Change testimonial name font-size. Use number in ( px or unit )', 'crypterium'),
                    'group' => esc_html__('Custom Style', 'crypterium' ),
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Name line-height', 'crypterium'),
                    'param_name' => 'nlineh',
                    'description' => esc_html__('Change testimonial name line-height. Use number in ( px or unit )', 'crypterium'),
                    'group' => esc_html__('Custom Style', 'crypterium' ),
                ),
                array(
                    'type' => 'colorpicker',
                    'heading' => esc_html__('Name color', 'crypterium'),
                    'param_name' => 'ncolor',
                    'description' => esc_html__('Change testimonial name color.', 'crypterium'),
                    'group' => esc_html__('Custom Style', 'crypterium' ),
                ),
                //Job
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Job font-size', 'crypterium'),
                    'param_name' => 'jsize',
                    'description' => esc_html__('Change testimonial job font-size. Use number in ( px or unit )', 'crypterium'),
                    'group' => esc_html__('Custom Style', 'crypterium' ),
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Job line-height', 'crypterium'),
                    'param_name' => 'jlineh',
                    'description' => esc_html__('Change testimonial job line-height. Use number in ( px or unit )', 'crypterium'),
                    'group' => esc_html__('Custom Style', 'crypterium' ),
                ),
                array(
                    'type' => 'colorpicker',
                    'heading' => esc_html__('Job color', 'crypterium'),
                    'param_name' => 'jcolor',
                    'description' => esc_html__('Change testimonial job color.', 'crypterium'),
                    'group' => esc_html__('Custom Style', 'crypterium' ),
                ),
                array(
                    'type' => 'css_editor',
                    'heading' => esc_html__('Background CSS', 'crypterium' ),
                    'param_name' => 'css',
                    'group' => esc_html__('Background', 'crypterium' ),
                ),
            )
        )
    );
}
class Crypterium_Products_Shortcode extends WPBakeryShortCode {
}
