<?php
/**
 * witnessai customizer
 *
 * @package witnessai
 */

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Added Panels & Sections
 */
function witnessai_customizer_panels_sections( $wp_customize ) {

    //Add panel
    $wp_customize->add_panel( 'witnessai_customizer', [
        'priority' => 10,
        'title'    => esc_html__( 'Witnessai Customizer', 'witnessai' ),
    ] );

    /**
     * Customizer Section
     */

    $wp_customize->add_section( 'global_enable_disable_settings', [
        'title'       => esc_html__( 'Global Enable/Disable', 'witnessai' ),
        'description' => '',
        'priority'    => 10,
        'capability'  => 'edit_theme_options',
        'panel'       => 'witnessai_customizer',
    ] );

    $wp_customize->add_section( 'header_social', [
        'title'       => esc_html__( 'Header Social', 'witnessai' ),
        'description' => '',
        'priority'    => 11,
        'capability'  => 'edit_theme_options',
        'panel'       => 'witnessai_customizer',
    ] );

    $wp_customize->add_section( 'section_header_logo', [
        'title'       => esc_html__( 'Header Setting', 'witnessai' ),
        'description' => '',
        'priority'    => 12,
        'capability'  => 'edit_theme_options',
        'panel'       => 'witnessai_customizer',
    ] );

    $wp_customize->add_section( 'blog_setting', [
        'title'       => esc_html__( 'Blog Setting', 'witnessai' ),
        'description' => '',
        'priority'    => 13,
        'capability'  => 'edit_theme_options',
        'panel'       => 'witnessai_customizer',
    ] );

    $wp_customize->add_section( 'header_side_setting', [
        'title'       => esc_html__( 'Side Info', 'witnessai' ),
        'description' => '',
        'priority'    => 14,
        'capability'  => 'edit_theme_options',
        'panel'       => 'witnessai_customizer',
    ] );

    $wp_customize->add_section( 'breadcrumb_setting', [
        'title'       => esc_html__( 'Breadcrumb Setting', 'witnessai' ),
        'description' => '',
        'priority'    => 16,
        'capability'  => 'edit_theme_options',
        'panel'       => 'witnessai_customizer',
    ] );

    $wp_customize->add_section( 'blog_setting', [
        'title'       => esc_html__( 'Blog Setting', 'witnessai' ),
        'description' => '',
        'priority'    => 17,
        'capability'  => 'edit_theme_options',
        'panel'       => 'witnessai_customizer',
    ] );

    $wp_customize->add_section( 'footer_setting', [
        'title'       => esc_html__( 'Footer Settings', 'witnessai' ),
        'description' => '',
        'priority'    => 19,
        'capability'  => 'edit_theme_options',
        'panel'       => 'witnessai_customizer',
    ] );

    $wp_customize->add_section( 'color_setting', [
        'title'       => esc_html__( 'Color Setting', 'witnessai' ),
        'description' => '',
        'priority'    => 21,
        'capability'  => 'edit_theme_options',
        'panel'       => 'witnessai_customizer',
    ] );

    $wp_customize->add_section( '404_page', [
        'title'       => esc_html__( '404 Page', 'witnessai' ),
        'description' => '',
        'priority'    => 23,
        'capability'  => 'edit_theme_options',
        'panel'       => 'witnessai_customizer',
    ] );

    $wp_customize->add_section( 'learndash_course_settings', [
        'title'       => esc_html__( 'Learndash Course Settings ', 'witnessai' ),
        'description' => '',
        'priority'    => 25,
        'capability'  => 'edit_theme_options',
        'panel'       => 'witnessai_customizer',
    ] );

    $wp_customize->add_section( 'typo_setting', [
        'title'       => esc_html__( 'Typography Setting', 'witnessai' ),
        'description' => '',
        'priority'    => 27,
        'capability'  => 'edit_theme_options',
        'panel'       => 'witnessai_customizer',
    ] );

    $wp_customize->add_section( 'slug_setting', [
        'title'       => esc_html__( 'Slug Settings', 'witnessai' ),
        'description' => '',
        'priority'    => 30,
        'capability'  => 'edit_theme_options',
        'panel'       => 'witnessai_customizer',
    ] );
}

add_action( 'customize_register', 'witnessai_customizer_panels_sections' );

function _global_enable_desable_fields( $fields ) {
    // global Enable disable seciton

    $fields[] = [
        'type'     => 'switch',
        'settings' => 'cursor_style_setting',
        'label'    => esc_html__( 'Cursor Style', 'witnessai' ),
        'section'  => 'global_enable_disable_settings',
        'description' => esc_html__( 'you can trun off Cursor Style globally For all page by desabling this.', 'witnessai' ),
        'default'  => '0',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__( 'Enable', 'witnessai' ),
            'off' => esc_html__( 'Disable', 'witnessai' ),
        ],
    ];

    $fields[] = [
        'type'     => 'switch',
        'settings' => 'page_sidebar_setting',
        'label'    => esc_html__( 'Page sidebar', 'witnessai' ),
        'section'  => 'global_enable_disable_settings',
        'description' => esc_html__( 'you can trun off page side bar globally For all page by desabling this.', 'witnessai' ),
        'default'  => '1',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__( 'Enable', 'witnessai' ),
            'off' => esc_html__( 'Disable', 'witnessai' ),
        ],
    ];

    $fields[] = [
        'type'     => 'switch',
        'settings' => 'witnessai_preloader',
        'label'    => esc_html__( 'Preloader On/Off', 'witnessai' ),
        'section'  => 'global_enable_disable_settings',
        'default'  => '0',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__( 'Enable', 'witnessai' ),
            'off' => esc_html__( 'Disable', 'witnessai' ),
        ],
    ];

    $fields[] = [
        'type'     => 'switch',
        'settings' => 'witnessai_preloader_spinner',
        'label'    => esc_html__( 'Spinner', 'witnessai' ),
        'section'  => 'global_enable_disable_settings',
        'default'  => '0',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__( 'Enable', 'witnessai' ),
            'off' => esc_html__( 'Disable', 'witnessai' ),
        ],
    ];

    $fields[] = [
        'type'        => 'image',
        'settings'    => 'preloader_logo',
        'label'       => esc_html__( 'Preloader Logo', 'witnessai' ),
        'description' => esc_html__( 'Upload Preloader Logo.', 'witnessai' ),
        'section'     => 'global_enable_disable_settings',
        'default'     => get_template_directory_uri() . '/assets/img/favicon.svg',
        'active_callback' => [
            [
                'setting'  => 'witnessai_preloader',
                'operator' => '==',
                'value'    => true,
            ],
        ],
    ];

    
    $fields[] = [
        'type'     => 'switch',
        'settings' => 'witnessai_header_right',
        'label'    => esc_html__( 'Header Right On/Off', 'witnessai' ),
        'section'  => 'global_enable_disable_settings',
        'default'  => '0',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__( 'Enable', 'witnessai' ),
            'off' => esc_html__( 'Disable', 'witnessai' ),
        ],
    ];

    // button for headers
    $fields[] = [
        'type'     => 'text',
        'settings' => 'witnessai_head_r_button_text_one',
        'label'    => esc_html__( 'Button Name', 'witnessai' ),
        'section'  => 'global_enable_disable_settings',
        'default'  => esc_html__( 'Login', 'witnessai' ),
        'priority' => 10,
        'active_callback' => [
            [
                'setting'  => 'witnessai_header_right',
                'operator' => '==',
                'value'    => true,
            ],
        ],
    ];

    $fields[] = [
        'type'     => 'url',
        'settings' => 'witnessai_head_r_button_link_one',
        'label'    => esc_html__( 'Button URL', 'witnessai' ),
        'section'  => 'global_enable_disable_settings',
        'default'  => esc_html__( '#', 'witnessai' ),
        'priority' => 10,
        'active_callback' => [
            [
                'setting'  => 'witnessai_header_right',
                'operator' => '==',
                'value'    => true,
            ],
        ],
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'witnessai_head_r_button_text_two',
        'label'    => esc_html__( 'Button Name', 'witnessai' ),
        'section'  => 'global_enable_disable_settings',
        'default'  => esc_html__( 'Sign Up', 'witnessai' ),
        'priority' => 10,
        'active_callback' => [
            [
                'setting'  => 'witnessai_header_right',
                'operator' => '==',
                'value'    => true,
            ],
        ],
    ];

    $fields[] = [
        'type'     => 'url',
        'settings' => 'witnessai_head_r_button_link_two',
        'label'    => esc_html__( 'Button URL', 'witnessai' ),
        'section'  => 'global_enable_disable_settings',
        'default'  => esc_html__( '#', 'witnessai' ),
        'priority' => 10,
        'active_callback' => [
            [
                'setting'  => 'witnessai_header_right',
                'operator' => '==',
                'value'    => true,
            ],
        ],
    ];

    return $fields;
}
add_filter( 'kirki/fields', '_global_enable_desable_fields' );

/*
Header Settings
 */
function _header_header_fields( $fields ) {
    $fields[] = [
        'type'        => 'radio-image',
        'settings'    => 'choose_witnessai_header',
        'label'       => esc_html__( 'Select Header Style', 'witnessai' ),
        'section'     => 'section_header_logo',
        'placeholder' => esc_html__( 'Select an option...', 'witnessai' ),
        'priority'    => 10,
        'multiple'    => 1,
        'choices'     => [
            'header-style-1'   => get_template_directory_uri() . '/inc/img/header/header-1.png',
            'header-style-2' => get_template_directory_uri() . '/inc/img/header/header-2.png',
            'header-style-3'  => get_template_directory_uri() . '/inc/img/header/header-3.png',
            'witnessai-template-builder'  => get_template_directory_uri() . '/inc/img/header/custom-header.png'
        ],
        'default'     => 'header-style-1',
    ];

    if(class_exists('Witnessai_Core')){
        $fields[] = [
            'type'        => 'select',
            'settings'    => 'header_custom_style',
            'label'       => esc_html__( 'Select Header', 'witnessai' ),
            'section'     => 'section_header_logo',
            'default'     => '4',
            'placeholder' => esc_html__( 'Select an option...', 'witnessai' ),
            'priority'    => 10,
            'multiple'    => 1,
            'choices'     => Kirki\Util\Helper::get_posts(
                array(
                    'posts_per_page' => 10,
                    'post_type'      => 'witnessai-blocks'
                ) ,
            ),
            'active_callback' => [
                [
                    'setting'  => 'choose_witnessai_header',
                    'operator' => '==',
                    'value'    => 'witnessai-template-builder',
                ],
            ],

        ];
    }

    $fields[] = [
        'type'        => 'image',
        'settings'    => 'logo',
        'label'       => esc_html__( 'Header Logo', 'witnessai' ),
        'description' => esc_html__( 'Upload Your Logo.', 'witnessai' ),
        'section'     => 'section_header_logo',
        'default'     => get_template_directory_uri() . '/assets/img/logo.png',
    ];

    return $fields;
}
add_filter( 'kirki/fields', '_header_header_fields' );


/*
_header_page_title_fields
 */
function _header_page_title_fields( $fields ) {
    
    // Breadcrumb Setting
    $fields[] = [
        'type'     => 'switch',
        'settings' => 'breadcrumb_switch',
        'label'    => esc_html__( 'Breadcrumb Info switch', 'witnessai' ),
        'section'  => 'breadcrumb_setting',
        'default'  => '1',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__( 'Enable', 'witnessai' ),
            'off' => esc_html__( 'Disable', 'witnessai' ),
        ],
    ];

    $fields[] = [
        'type'     => 'switch',
        'settings' => 'witnessai_breadcrumb_shape_switch',
        'label'    => esc_html__( 'Enable Shap', 'witnessai' ),
        'section'  => 'breadcrumb_setting',
        'default'  => '1',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__( 'Enable', 'witnessai' ),
            'off' => esc_html__( 'Disable', 'witnessai' ),
        ],
    ];

    $fields[] = [
        'type'        => 'image',
        'settings'    => 'breadcrumb_bg_img',
        'label'       => esc_html__( 'Background Image', 'witnessai' ),
        'description' => esc_html__( 'Background Image', 'witnessai' ),
        'section'     => 'breadcrumb_setting',
    ];



    $fields[] = [
        'type'        => 'color',
        'settings'    => 'breadcrumb_bg_color',
        'label'       => __( 'Breadcrumb BG Color', 'witnessai' ),
        'description' => esc_html__( 'This is a Breadcrumb bg color control.', 'witnessai' ),
        'section'     => 'breadcrumb_setting',
        'default'     => 'rgba(137, 118, 253, 0.1)',
        'priority'    => 10, 
    ];

    $fields[] = [
        'type'        => 'number',
        'settings'    => 'breadcrumb_pt',
        'label'       => esc_html__( 'Padding top', 'witnessai' ),
        'section'     => 'breadcrumb_setting',
        'default'     => '150'
    ];
    $fields[] = [
        'type'        => 'number',
        'settings'    => 'breadcrumb_pb',
        'label'       => esc_html__( 'Padding Bottom', 'witnessai' ),
        'section'     => 'breadcrumb_setting',
        'default'     => '150'
    ];

    return $fields;
}
add_filter( 'kirki/fields', '_header_page_title_fields' );


/*
_header_page_title_fields
 */


/*
Header Social
 */
function _header_blog_fields( $fields ) {
// Blog Setting
    $fields[] = [
        'type'     => 'switch',
        'settings' => 'witnessai_blog_btn_switch',
        'label'    => esc_html__( 'Blog BTN On/Off', 'witnessai' ),
        'section'  => 'blog_setting',
        'default'  => '1',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__( 'Enable', 'witnessai' ),
            'off' => esc_html__( 'Disable', 'witnessai' ),
        ],
    ];

    $fields[] = [
        'type'     => 'switch',
        'settings' => 'witnessai_blog_cat',
        'label'    => esc_html__( 'Blog Category Meta On/Off', 'witnessai' ),
        'section'  => 'blog_setting',
        'default'  => '1',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__( 'Enable', 'witnessai' ),
            'off' => esc_html__( 'Disable', 'witnessai' ),
        ],
    ];

    $fields[] = [
        'type'     => 'switch',
        'settings' => 'witnessai_blog_author',
        'label'    => esc_html__( 'Blog Author Meta On/Off', 'witnessai' ),
        'section'  => 'blog_setting',
        'default'  => '1',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__( 'Enable', 'witnessai' ),
            'off' => esc_html__( 'Disable', 'witnessai' ),
        ],
    ];
    $fields[] = [
        'type'     => 'switch',
        'settings' => 'witnessai_blog_date',
        'label'    => esc_html__( 'Blog Date Meta On/Off', 'witnessai' ),
        'section'  => 'blog_setting',
        'default'  => '1',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__( 'Enable', 'witnessai' ),
            'off' => esc_html__( 'Disable', 'witnessai' ),
        ],
    ];
    $fields[] = [
        'type'     => 'switch',
        'settings' => 'witnessai_blog_comments',
        'label'    => esc_html__( 'Blog Comments Meta On/Off', 'witnessai' ),
        'section'  => 'blog_setting',
        'default'  => '1',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__( 'Enable', 'witnessai' ),
            'off' => esc_html__( 'Disable', 'witnessai' ),
        ],
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'witnessai_blog_btn',
        'label'    => esc_html__( 'Blog Button text', 'witnessai' ),
        'section'  => 'blog_setting',
        'default'  => esc_html__( 'Read More', 'witnessai' ),
        'priority' => 10,
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'breadcrumb_blog_title',
        'label'    => esc_html__( 'Blog Title', 'witnessai' ),
        'section'  => 'blog_setting',
        'default'  => esc_html__( 'Blog', 'witnessai' ),
        'priority' => 10,
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'breadcrumb_blog_title_details',
        'label'    => esc_html__( 'Blog Details Title', 'witnessai' ),
        'section'  => 'blog_setting',
        'default'  => esc_html__( 'Blog Details', 'witnessai' ),
        'priority' => 10,
    ];
    return $fields;
}
add_filter( 'kirki/fields', '_header_blog_fields' );

/*
Footer
 */
function _header_footer_fields( $fields ) {
    // Footer Setting

    $fields[] = [
        'type'        => 'radio-image',
        'settings'    => 'choose_witnessai_footer',
        'label'       => esc_html__( 'Choose Footer Style', 'witnessai' ),
        'section'     => 'footer_setting',
        'default'     => '5',
        'placeholder' => esc_html__( 'Select an option...', 'witnessai' ),
        'priority'    => 10,
        'multiple'    => 1,
        'choices'     => [
            'footer-style-def' => get_template_directory_uri() . '/inc/img/footer/default-footer.png',
            'witnessai-template-builder' => get_template_directory_uri() . '/assets/img/custom-footer.png'
        ],
        'default'     => 'footer-style-def',
    ];

    if(class_exists('Witnessai_Core')){
        $fields[] = [
            'type'        => 'select',
            'settings'    => 'footer_custom_style',
            'label'       => esc_html__( 'Select Footer', 'witnessai' ),
            'section'     => 'footer_setting',
            'default'     => '4',
            'placeholder' => esc_html__( 'Select an option...', 'witnessai' ),
            'priority'    => 10,
            'multiple'    => 1,
            'choices'     => Kirki\Util\Helper::get_posts(
                array(
                    'posts_per_page' => 10,
                    'post_type'      => 'witnessai-blocks'
                ) ,
            ),
            'active_callback' => [
                [
                    'setting'  => 'choose_witnessai_footer',
                    'operator' => '==',
                    'value'    => 'witnessai-template-builder',
                ],
            ],

        ];
    }

    $fields[] = [
        'type'        => 'select',
        'settings'    => 'footer_widget_number',
        'label'       => esc_html__( 'Widget Number', 'witnessai' ),
        'section'     => 'footer_setting',
        'default'     => '4',
        'placeholder' => esc_html__( 'Select an option...', 'witnessai' ),
        'priority'    => 10,
        'multiple'    => 1,
        'choices'     => [
            '4' => esc_html__( 'Widget Number 4', 'witnessai' ),
            '3' => esc_html__( 'Widget Number 3', 'witnessai' ),
            '2' => esc_html__( 'Widget Number 2', 'witnessai' ),
        ],
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'witnessai_copyright',
        'label'    => esc_html__( 'Copy Right', 'witnessai' ),
        'section'  => 'footer_setting',
        'default'  => esc_html__( 'Copyright &copy; 2023 wprealizer. All Rights Reserved', 'witnessai' ),
        'priority' => 10,
    ];


    return $fields;
}
add_filter( 'kirki/fields', '_header_footer_fields' );

// color
function witnessai_color_fields( $fields ) {
    // Color Settings
    $fields[] = [
        'type'        => 'color',
        'settings'    => 'witnessai_color_option',
        'label'       => __( 'Theme Color', 'witnessai' ),
        'description' => esc_html__( 'This is a Theme color control.', 'witnessai' ),
        'section'     => 'color_setting',
        'default'     => '#2b4eff',
        'priority'    => 10,
    ];
    // Color Settings
    $fields[] = [
        'type'        => 'color',
        'settings'    => 'witnessai_color_option_2',
        'label'       => __( 'Primary Color', 'witnessai' ),
        'description' => esc_html__( 'This is a Primary color control.', 'witnessai' ),
        'section'     => 'color_setting',
        'default'     => '#f2277e',
        'priority'    => 10,
    ];
     // Color Settings
    $fields[] = [
        'type'        => 'color',
        'settings'    => 'witnessai_color_option_3',
        'label'       => __( 'Secondary Color', 'witnessai' ),
        'description' => esc_html__( 'This is a Secondary color control.', 'witnessai' ),
        'section'     => 'color_setting',
        'default'     => '#30a820',
        'priority'    => 10,
    ];
     // Color Settings
    $fields[] = [
        'type'        => 'color',
        'settings'    => 'witnessai_color_option_3_2',
        'label'       => __( 'Secondary Color 2', 'witnessai' ),
        'description' => esc_html__( 'This is a Secondary color 2 control.', 'witnessai' ),
        'section'     => 'color_setting',
        'default'     => '#ffb352',
        'priority'    => 10,
    ];
     // Color Settings
    $fields[] = [
        'type'        => 'color',
        'settings'    => 'witnessai_color_scrollup',
        'label'       => __( 'ScrollUp Color', 'witnessai' ),
        'description' => esc_html__( 'This is a ScrollUp colo control.', 'witnessai' ),
        'section'     => 'color_setting',
        'default'     => '#2b4eff',
        'priority'    => 10,
    ];

    return $fields;
}
add_filter( 'kirki/fields', 'witnessai_color_fields' );

// 404
function witnessai_404_fields( $fields ) {
    // 404 settings
    $fields[] = [
        'type'     => 'switch',
        'settings' => 'witnessai_404_breadcrumb',
        'label'    => esc_html__( 'Show Breadcrumb', 'witnessai' ),
        'section'  => '404_page',
        'default'  => 0,
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__( 'Enable', 'witnessai' ),
            'off' => esc_html__( 'Disable', 'witnessai' ),
        ],
    ];
    $fields[] = [
        'type'        => 'image',
        'settings'    => 'witnessai_404_bg',
        'label'       => esc_html__( '404 Image.', 'witnessai' ),
        'description' => esc_html__( '404 Image.', 'witnessai' ),
        'section'     => '404_page',
    ];
    $fields[] = [
        'type'     => 'text',
        'settings' => 'witnessai_error_title',
        'label'    => esc_html__( 'Not Found Title', 'witnessai' ),
        'section'  => '404_page',
        'default'  => esc_html__( 'Page not found', 'witnessai' ),
        'priority' => 10,
    ];
    $fields[] = [
        'type'     => 'textarea',
        'settings' => 'witnessai_error_desc',
        'label'    => esc_html__( '404 Description Text', 'witnessai' ),
        'section'  => '404_page',
        'default'  => esc_html__( 'Oops! The page you are looking for does not exist. It might have been moved or deleted', 'witnessai' ),
        'priority' => 10,
    ];
    $fields[] = [
        'type'     => 'text',
        'settings' => 'witnessai_error_link_text',
        'label'    => esc_html__( '404 Link Text', 'witnessai' ),
        'section'  => '404_page',
        'default'  => esc_html__( 'Back To Home', 'witnessai' ),
        'priority' => 10,
    ];
    return $fields;
}
add_filter( 'kirki/fields', 'witnessai_404_fields' );



/**
 * This is a short hand function for getting setting value from customizer
 *
 * @param string $name
 *
 * @return bool|string
 */
function witnessai_THEME_option( $name ) {
    $value = '';
    if ( class_exists( 'witnessai' ) ) {
        $value = Kirki::get_option( witnessai_get_theme(), $name );
    }

    return apply_filters( 'witnessai_THEME_option', $value, $name );
}

/**
 * Get config ID
 *
 * @return string
 */
function witnessai_get_theme() {
    return 'witnessai';
}