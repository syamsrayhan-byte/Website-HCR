<?php
/**
 * eiPro Master Theme Customizer
 *
 * @package eiPro_Master
 */

function sanitize_text( $input ) {
    $allowed_html = array(
        'br' => array(),
        'span' => array(
          'class' => array()
        ),
    );
    return wp_kses( $input, $allowed_html );
}

function sanitize_comma_separated_numbers($input) {
    $numbers = explode(',', $input);
    $numbers = array_map('trim', $numbers);
    $numbers = array_filter($numbers, 'is_numeric');
    return implode(',', $numbers);
}

add_action( 'customize_register', 'customize_register_init' );
function customize_register_init( $wpc ){
    //$wpc->remove_control('blogdescription');

    $custom_choices = array(
        'auto' => __('Auto', 'eipro-master'),
        'custom' => __('Custom', 'eipro-master'),
    );

    // Logo White
    $wpc->add_setting( 'logo_white', array(
        'sanitize_callback' => 'esc_url_raw'
    ) );
    $wpc->add_control( new WP_Customize_Image_Control( $wpc, 'logo_white_control', array(
        'label'    => esc_html__( 'Logo (White)', 'eipro-master' ),
        'section'  => 'title_tagline',
        'settings' => 'logo_white',
        'priority' => 8,
    )));

    // Logo Size
    $wpc->add_setting( 'logosize', array(
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text',
    ) );
    $wpc->add_control( 'logosize', array(
        'label'   => esc_html__( 'Size (Desktop)', 'eipro-master' ),
        'description' => sprintf(
        '<p>' . __( 'Example: 300px' ) . '</p>'),
        'type' => 'text',
        'section' => 'title_tagline',
        'settings' => 'logosize',
        'priority' => 8,
    ) );

    // Logo Mobile
    $wpc->add_setting( 'logomobile_size', array(
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text',
    ) );
    $wpc->add_control( 'logomobile_size', array(
        'label'   => esc_html__( 'Size (Mobile)', 'eipro-master' ),
        'description' => sprintf(
        '<p>' . __( 'Example: 250px', 'eipro-master' ) . '</p>'),
        'type' => 'text',
        'section' => 'title_tagline',
        'settings' => 'logomobile_size',
        'priority' => 8,
    ) );

    // Typography
    $wpc->add_panel( 'c_typography', array(
        'title'       => __('Typography', 'eipro-master'),
        'description' => __('Several settings pertaining your theme', 'eipro-master'),
        'priority'    => 29
    ) );

    // Global Font
    $wpc->add_section( 'c_font' , array(
        'title'    => __( 'Global Font', 'eipro-master' ),
        'panel'    => 'c_typography',
        'priority' => 1
    ) );

    $wpc->add_setting( 'set_c_font', array(
        'sanitize_callback' => false,
    ) );
    $wpc->add_control( 'c_font_con', array(
        'label' => __( 'Embed URL/Link (Google Fonts)', 'eipro-master' ),
        'description' => __( 'Visit: <a href="https://fonts.google.com/" target="_blank">fonts.google.com</a>', 'eipro-master' ),
        'section' => 'c_font',
        'settings' => 'set_c_font',
        'type' => 'textarea',
        'input_attrs' => array(
            'placeholder' => 'https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap',
        ),
    ) );

    $wpc->add_setting( 'set_css_font', array(
        'sanitize_callback' => false,
    ) );
    $wpc->add_control( 'css_font_con', array(
        'label' => __( 'font-family:', 'eipro-master' ),
        'section' => 'c_font',
        'settings' => 'set_css_font',
        'type' => 'text',
        'input_attrs' => array(
            'placeholder' => "'Inter', sans-serif",
        ),
    ) );

    // Font - Single Post
    $wpc->add_section( 'c_font_single_post' , array(
        'title'    => __( 'Single Post', 'eipro-master' ),
        'panel'    => 'c_typography',
        'priority' => 3
    ) );

    // Body - Font size
    $wpc->add_setting( 'body_fontsize_single_post', array(
        'sanitize_callback' => false,
    ) );
    $wpc->add_control( 'body_fontsize_single_post_con', array(
        'label' => __( 'Body - Font size', 'eipro-master' ),
        'description' => __( 'Default: 16px', 'eipro-master' ),
        'section' => 'c_font_single_post',
        'settings' => 'body_fontsize_single_post',
        'type' => 'number',
        'input_attrs' => array(
            'placeholder' => "16",
        ),
    ) );

    $wpc->add_setting( 'body_lineheight_single_post', array(
        'sanitize_callback' => false,
    ) );
    $wpc->add_control( 'body_lineheight_single_post_con', array(
        'label' => __( 'Line Height', 'eipro-master' ),
        'description' => __( 'Default: 27px', 'eipro-master' ),
        'section' => 'c_font_single_post',
        'settings' => 'body_lineheight_single_post',
        'type' => 'number',
        'input_attrs' => array(
            'placeholder' => "27",
        ),
    ) );

    // H1 - Font size
    $wpc->add_setting( 'h1_fontsize_single_post', array(
        'sanitize_callback' => false,
    ) );
    $wpc->add_control( 'h1_fontsize_single_post_con', array(
        'label' => __( 'H1 - Font size', 'eipro-master' ),
        'description' => __( 'Default: 30px', 'eipro-master' ),
        'section' => 'c_font_single_post',
        'settings' => 'h1_fontsize_single_post',
        'type' => 'number',
        'input_attrs' => array(
            'placeholder' => "30",
        ),
    ) );

    $wpc->add_setting( 'h1_lineheight_single_post', array(
        'sanitize_callback' => false,
    ) );
    $wpc->add_control( 'h1_lineheight_single_post_con', array(
        'label' => __( 'Line Height', 'eipro-master' ),
        'description' => __( 'Default: 39px', 'eipro-master' ),
        'section' => 'c_font_single_post',
        'settings' => 'h1_lineheight_single_post',
        'type' => 'number',
        'input_attrs' => array(
            'placeholder' => "39",
        ),
    ) );

    // H2 - Font size
    $wpc->add_setting( 'h2_fontsize_single_post', array(
        'sanitize_callback' => false,
    ) );
    $wpc->add_control( 'h2_fontsize_single_post_con', array(
        'label' => __( 'H2 - Font size', 'eipro-master' ),
        'description' => __( 'Default: 24px', 'eipro-master' ),
        'section' => 'c_font_single_post',
        'settings' => 'h2_fontsize_single_post',
        'type' => 'number',
        'input_attrs' => array(
            'placeholder' => "24",
        ),
    ) );

    $wpc->add_setting( 'h2_lineheight_single_post', array(
        'sanitize_callback' => false,
    ) );
    $wpc->add_control( 'h2_lineheight_single_post_con', array(
        'label' => __( 'Line Height', 'eipro-master' ),
        'description' => __( 'Default: 32px', 'eipro-master' ),
        'section' => 'c_font_single_post',
        'settings' => 'h2_lineheight_single_post',
        'type' => 'number',
        'input_attrs' => array(
            'placeholder' => "32",
        ),
    ) );

    // H3 - Font size
    $wpc->add_setting( 'h3_fontsize_single_post', array(
        'sanitize_callback' => false,
    ) );
    $wpc->add_control( 'h3_fontsize_single_post_con', array(
        'label' => __( 'H3 - Font size', 'eipro-master' ),
        'description' => __( 'Default: 20px', 'eipro-master' ),
        'section' => 'c_font_single_post',
        'settings' => 'h3_fontsize_single_post',
        'type' => 'number',
        'input_attrs' => array(
            'placeholder' => "20",
        ),
    ) );

    $wpc->add_setting( 'h3_lineheight_single_post', array(
        'sanitize_callback' => false,
    ) );
    $wpc->add_control( 'h3_lineheight_single_post_con', array(
        'label' => __( 'Line Height', 'eipro-master' ),
        'description' => __( 'Default: 30px', 'eipro-master' ),
        'section' => 'c_font_single_post',
        'settings' => 'h3_lineheight_single_post',
        'type' => 'number',
        'input_attrs' => array(
            'placeholder' => "30",
        ),
    ) );

    // H4 - Font size
    $wpc->add_setting( 'h4_fontsize_single_post', array(
        'sanitize_callback' => false,
    ) );
    $wpc->add_control( 'h4_fontsize_single_post_con', array(
        'label' => __( 'H4 - Font size', 'eipro-master' ),
        'description' => __( 'Default: 18px', 'eipro-master' ),
        'section' => 'c_font_single_post',
        'settings' => 'h4_fontsize_single_post',
        'type' => 'number',
        'input_attrs' => array(
            'placeholder' => "18",
        ),
    ) );

    $wpc->add_setting( 'h4_lineheight_single_post', array(
        'sanitize_callback' => false,
    ) );
    $wpc->add_control( 'h4_lineheight_single_post_con', array(
        'label' => __( 'Line Height', 'eipro-master' ),
        'description' => __( 'Default: 28px', 'eipro-master' ),
        'section' => 'c_font_single_post',
        'settings' => 'h4_lineheight_single_post',
        'type' => 'number',
        'input_attrs' => array(
            'placeholder' => "28",
        ),
    ) );

    // H5 - Font size
    $wpc->add_setting( 'h5_fontsize_single_post', array(
        'sanitize_callback' => false,
    ) );
    $wpc->add_control( 'h5_fontsize_single_post_con', array(
        'label' => __( 'H5 - Font size', 'eipro-master' ),
        'description' => __( 'Default: 17px', 'eipro-master' ),
        'section' => 'c_font_single_post',
        'settings' => 'h5_fontsize_single_post',
        'type' => 'number',
        'input_attrs' => array(
            'placeholder' => "17",
        ),
    ) );

    $wpc->add_setting( 'h5_lineheight_single_post', array(
        'sanitize_callback' => false,
    ) );
    $wpc->add_control( 'h5_lineheight_single_post_con', array(
        'label' => __( 'Line Height', 'eipro-master' ),
        'description' => __( 'Default: 25px', 'eipro-master' ),
        'section' => 'c_font_single_post',
        'settings' => 'h5_lineheight_single_post',
        'type' => 'number',
        'input_attrs' => array(
            'placeholder' => "25",
        ),
    ) );

    // H6 - Font size
    $wpc->add_setting( 'h6_fontsize_single_post', array(
        'sanitize_callback' => false,
    ) );
    $wpc->add_control( 'h6_fontsize_single_post_con', array(
        'label' => __( 'H6 - Font size', 'eipro-master' ),
        'description' => __( 'Default: 16px', 'eipro-master' ),
        'section' => 'c_font_single_post',
        'settings' => 'h6_fontsize_single_post',
        'type' => 'number',
        'input_attrs' => array(
            'placeholder' => "16",
        ),
    ) );

    $wpc->add_setting( 'h6_lineheight_single_post', array(
        'sanitize_callback' => false,
    ) );
    $wpc->add_control( 'h6_lineheight_single_post_con', array(
        'label' => __( 'Line Height', 'eipro-master' ),
        'description' => __( 'Default: 24px', 'eipro-master' ),
        'section' => 'c_font_single_post',
        'settings' => 'h6_lineheight_single_post',
        'type' => 'number',
        'input_attrs' => array(
            'placeholder' => "24",
        ),
    ) );

    // Mobile
    $wpc->add_setting( 'custom_label_font_mobile', array(
        'sanitize_callback' => false,
    ));
    $wpc->add_control( 'custom_label_font_mobile_con', array(
        'label' => __( 'Mobile', 'eipro-master' ),
        'section' => 'c_font_single_post',
        'settings' => 'custom_label_font_mobile',
        'type' => 'text',
    ));

    // Body - Font size
    $wpc->add_setting( 'm_body_fontsize_single_post', array(
        'sanitize_callback' => false,
    ) );
    $wpc->add_control( 'm_body_fontsize_single_post_con', array(
        'label' => __( 'Body - Font size', 'eipro-master' ),
        'description' => __( 'Default: 15px', 'eipro-master' ),
        'section' => 'c_font_single_post',
        'settings' => 'm_body_fontsize_single_post',
        'type' => 'number',
        'input_attrs' => array(
            'placeholder' => "15",
        ),
    ) );

    $wpc->add_setting( 'm_body_lineheight_single_post', array(
        'sanitize_callback' => false,
    ) );
    $wpc->add_control( 'm_body_lineheight_single_post_con', array(
        'label' => __( 'Line Height', 'eipro-master' ),
        'description' => __( 'Default: 24px', 'eipro-master' ),
        'section' => 'c_font_single_post',
        'settings' => 'm_body_lineheight_single_post',
        'type' => 'number',
        'input_attrs' => array(
            'placeholder' => "24",
        ),
    ) );

    // H1 - Font size
    $wpc->add_setting( 'm_h1_fontsize_single_post', array(
        'sanitize_callback' => false,
    ) );
    $wpc->add_control( 'm_h1_fontsize_single_post_con', array(
        'label' => __( 'H1 - Font size', 'eipro-master' ),
        'description' => __( 'Default: 20px', 'eipro-master' ),
        'section' => 'c_font_single_post',
        'settings' => 'm_h1_fontsize_single_post',
        'type' => 'number',
        'input_attrs' => array(
            'placeholder' => "20",
        ),
    ) );

    $wpc->add_setting( 'm_h1_lineheight_single_post', array(
        'sanitize_callback' => false,
    ) );
    $wpc->add_control( 'm_h1_lineheight_single_post_con', array(
        'label' => __( 'Line Height', 'eipro-master' ),
        'description' => __( 'Default: 26px', 'eipro-master' ),
        'section' => 'c_font_single_post',
        'settings' => 'm_h1_lineheight_single_post',
        'type' => 'number',
        'input_attrs' => array(
            'placeholder' => "26",
        ),
    ) );

    // H2 - Font size
    $wpc->add_setting( 'm_h2_fontsize_single_post', array(
        'sanitize_callback' => false,
    ) );
    $wpc->add_control( 'm_h2_fontsize_single_post_con', array(
        'label' => __( 'H2 - Font size', 'eipro-master' ),
        'description' => __( 'Default: 18px', 'eipro-master' ),
        'section' => 'c_font_single_post',
        'settings' => 'm_h2_fontsize_single_post',
        'type' => 'number',
        'input_attrs' => array(
            'placeholder' => "18",
        ),
    ) );

    $wpc->add_setting( 'm_h2_lineheight_single_post', array(
        'sanitize_callback' => false,
    ) );
    $wpc->add_control( 'm_h2_lineheight_single_post_con', array(
        'label' => __( 'Line Height', 'eipro-master' ),
        'description' => __( 'Default: 25px', 'eipro-master' ),
        'section' => 'c_font_single_post',
        'settings' => 'm_h2_lineheight_single_post',
        'type' => 'number',
        'input_attrs' => array(
            'placeholder' => "25",
        ),
    ) );

    // H3 - Font size
    $wpc->add_setting( 'm_h3_fontsize_single_post', array(
        'sanitize_callback' => false,
    ) );
    $wpc->add_control( 'm_h3_fontsize_single_post_con', array(
        'label' => __( 'H3 - Font size', 'eipro-master' ),
        'description' => __( 'Default: 16px', 'eipro-master' ),
        'section' => 'c_font_single_post',
        'settings' => 'm_h3_fontsize_single_post',
        'type' => 'number',
        'input_attrs' => array(
            'placeholder' => "16",
        ),
    ) );

    $wpc->add_setting( 'm_h3_lineheight_single_post', array(
        'sanitize_callback' => false,
    ) );
    $wpc->add_control( 'm_h3_lineheight_single_post_con', array(
        'label' => __( 'Line Height', 'eipro-master' ),
        'description' => __( 'Default: 24px', 'eipro-master' ),
        'section' => 'c_font_single_post',
        'settings' => 'm_h3_lineheight_single_post',
        'type' => 'number',
        'input_attrs' => array(
            'placeholder' => "24",
        ),
    ) );

    // H4 - Font size
    $wpc->add_setting( 'm_h4_fontsize_single_post', array(
        'sanitize_callback' => false,
    ) );
    $wpc->add_control( 'm_h4_fontsize_single_post_con', array(
        'label' => __( 'H4 - Font size', 'eipro-master' ),
        'description' => __( 'Default: 15px', 'eipro-master' ),
        'section' => 'c_font_single_post',
        'settings' => 'm_h4_fontsize_single_post',
        'type' => 'number',
        'input_attrs' => array(
            'placeholder' => "15",
        ),
    ) );

    $wpc->add_setting( 'm_h4_lineheight_single_post', array(
        'sanitize_callback' => false,
    ) );
    $wpc->add_control( 'm_h4_lineheight_single_post_con', array(
        'label' => __( 'Line Height', 'eipro-master' ),
        'description' => __( 'Default: 22px', 'eipro-master' ),
        'section' => 'c_font_single_post',
        'settings' => 'm_h4_lineheight_single_post',
        'type' => 'number',
        'input_attrs' => array(
            'placeholder' => "22",
        ),
    ) );

    // H5 - Font size
    $wpc->add_setting( 'm_h5_fontsize_single_post', array(
        'sanitize_callback' => false,
    ) );
    $wpc->add_control( 'm_h5_fontsize_single_post_con', array(
        'label' => __( 'H5 - Font size', 'eipro-master' ),
        'description' => __( 'Default: 15px', 'eipro-master' ),
        'section' => 'c_font_single_post',
        'settings' => 'm_h5_fontsize_single_post',
        'type' => 'number',
        'input_attrs' => array(
            'placeholder' => "15",
        ),
    ) );

    $wpc->add_setting( 'm_h5_lineheight_single_post', array(
        'sanitize_callback' => false,
    ) );
    $wpc->add_control( 'm_h5_lineheight_single_post_con', array(
        'label' => __( 'Line Height', 'eipro-master' ),
        'description' => __( 'Default: 22px', 'eipro-master' ),
        'section' => 'c_font_single_post',
        'settings' => 'm_h5_lineheight_single_post',
        'type' => 'number',
        'input_attrs' => array(
            'placeholder' => "22",
        ),
    ) );

    // H6 - Font size
    $wpc->add_setting( 'm_h6_fontsize_single_post', array(
        'sanitize_callback' => false,
    ) );
    $wpc->add_control( 'm_h6_fontsize_single_post_con', array(
        'label' => __( 'H6 - Font size', 'eipro-master' ),
        'description' => __( 'Default: 15px', 'eipro-master' ),
        'section' => 'c_font_single_post',
        'settings' => 'm_h6_fontsize_single_post',
        'type' => 'number',
        'input_attrs' => array(
            'placeholder' => "15",
        ),
    ) );

    $wpc->add_setting( 'm_h6_lineheight_single_post', array(
        'sanitize_callback' => false,
    ) );
    $wpc->add_control( 'm_h6_lineheight_single_post_con', array(
        'label' => __( 'Line Height', 'eipro-master' ),
        'description' => __( 'Default: 22px', 'eipro-master' ),
        'section' => 'c_font_single_post',
        'settings' => 'm_h6_lineheight_single_post',
        'type' => 'number',
        'input_attrs' => array(
            'placeholder' => "22",
        ),
    ) );

    // Reset
    $wpc->add_section( 'reset_font_single_post' , array(
        'title'    => __( 'Reset', 'eipro-master' ),
        'panel'    => 'c_typography',
        'priority' => 4
    ) );

    $wpc->add_setting( 'reset_default_font', array(
        'default' => false,
    ) );
    $wpc->add_control( 'reset_default_font_con', array(
        'label' => __( 'Reset (Default Font)', 'eipro-master' ),
        'section' => 'reset_font_single_post',
        'settings' => 'reset_default_font',
        'type' => 'checkbox',
    ) );

    // Theme Options
    $wpc->add_panel( 'panel_id', array(
        'title'       => __('Theme Options', 'eipro-master'),
        'description' => __('Several settings pertaining your theme', 'eipro-master'),
        'priority'    => 30
    ) );

    // Profile
    $wpc->add_section( 'profile_sec' , array(
        'title'    => __( 'Profile', 'eipro-master' ),
        'panel'    => 'panel_id',
        'priority' => 10
    ) );

    $wpc->add_setting( 'profile_picture_set', array(
        'sanitize_callback' => 'esc_url_raw'
    ) );
    $wpc->add_control( new WP_Customize_Image_Control( $wpc, 'profile_picture_con', array(
        'label'    => esc_html__( 'Picture', 'eilink' ),
        'section'  => 'profile_sec',
        'settings' => 'profile_picture_set',
    )));

    $wpc->add_setting( 'profile_name_set', array(
        'sanitize_callback' => false,
    ));
    $wpc->add_control( 'profile_name_con', array(
        'label' => __( 'Name', 'eilink' ),
        'section' => 'profile_sec',
        'settings' => 'profile_name_set',
        'type' => 'text',
    ) );

    $wpc->add_setting( 'profile_short_desc_set', array(
        'sanitize_callback' => false,
    ));
    $wpc->add_control( 'profile_short_desc_con', array(
        'label' => __( 'Short Description', 'eilink' ),
        'section' => 'profile_sec',
        'settings' => 'profile_short_desc_set',
        'type' => 'textarea',
    ) );


    // Color
    $wpc->add_section( 'color' , array(
        'title'    => __( 'Color', 'eipro-master' ),
        'panel'    => 'panel_id',
        'priority' => 10
    ) );

    $wpc->add_setting( 'accent' , array(
        'default'   => '#2CAE76',
        'transport' => 'refresh',
    ) );
    $wpc->add_control( new WP_Customize_Color_Control( $wpc, 'link_color', array(
        'label'    => __( 'Accent', 'eipro-master' ),
        'section'  => 'color',
        'settings' => 'accent',
    ) ) );

    $wpc->add_setting( 'secondary_bg' , array(
        'default'   => '#FFC062',
        'transport' => 'refresh',
    ) );
    $wpc->add_control( new WP_Customize_Color_Control( $wpc, 'link_secondary_bg', array(
        'label'    => __( 'Background', 'eipro-master' ),
        'section'  => 'color',
        'settings' => 'secondary_bg',
    ) ) );

    $wpc->add_setting( 'secondary_text' , array(
        'default'   => '#04121F',
        'transport' => 'refresh',
    ) );
    $wpc->add_control( new WP_Customize_Color_Control( $wpc, 'link_secondary_text', array(
        'label'    => __( 'Text', 'eipro-master' ),
        'section'  => 'color',
        'settings' => 'secondary_text',
    ) ) );

    // Blog
    $wpc->add_section( 'c_blog', array(
        'title'     => __( 'Blog', 'eipro-master' ),
        'panel'    => 'panel_id',
        'priority'  => 20
    ) );

    $wpc->add_setting( 'hide_c_blogtitle', array(
        'default' => false,
    ) );
    $wpc->add_control( 'hide_c_blogtitle_con', array(
        'label' => __( 'Hide (Title)', 'eipro-master' ),
        'section' => 'c_blog',
        'settings' => 'hide_c_blogtitle',
        'type' => 'checkbox',
    ) );

    $wpc->add_setting( 'blogtitle', array(
        'sanitize_callback' => false,
    ) );
    $wpc->add_control( 'blogtitle_control', array(
        'label' => __( 'Title', 'eipro-master' ),
        'section' => 'c_blog',
        'settings' => 'blogtitle',
        'type' => 'text',
        'input_attrs' => array(
            'placeholder' => 'Explore Articles',
        ),
    ) );

    // Recently
    $wpc->add_section( 'recently_sec' , array(
        'title'    => __( 'Recently', 'eipro-master' ),
        'panel'    => 'panel_id',
        'priority' => 20
    ) );

    $wpc->add_setting( 'title_recently_sec', array(
        'sanitize_callback' => false,
    ) );
    $wpc->add_control( 'title_recently_sec_con', array(
        'label' => __( 'Title', 'eipro-master' ),
        'section' => 'recently_sec',
        'settings' => 'title_recently_sec',
        'type' => 'text',
        'input_attrs' => array(
            'placeholder' => 'Recently',
        ),
    ) );

    // Exclude Category ID
    $wpc->add_setting( 'exclude_cat_id_recently', array(
        'sanitize_callback' => false,
    ) );
    $wpc->add_control( 'exclude_cat_id_recently_control', array(
        'label' => __( 'Exclude Category (ID)', 'eipro-master' ),
        'description' => __( 'Example: 1,2,3,4,5,6', 'eipro-master' ),
        'section' => 'recently_sec',
        'settings' => 'exclude_cat_id_recently',
        'type' => 'text',
    ) );

    // Number of posts to show
    // $wpc->add_setting( 'number_post_recently', array(
    //     'sanitize_callback' => false,
    // ) );
    // $wpc->add_control( 'number_post_recently_con', array(
    //     'label' => __( 'Number of posts to show', 'eipro-master' ),
    //     'description' => __( 'Example: 8', 'eipro-master' ),
    //     'section' => 'recently_sec',
    //     'settings' => 'number_post_recently',
    //     'type' => 'number'
    // ) );

    // Related
    $wpc->add_section( 'related_sec' , array(
        'title'    => __( 'Related', 'eipro-master' ),
        'panel'    => 'panel_id',
        'priority' => 20
    ) );

    // Hide Related
    $wpc->add_setting( 'hide_related', array(
        'default' => false,
    ) );
    $wpc->add_control( 'control_hide_related', array(
        'label' => __( 'Hide Related Posts', 'eipro-master' ),
        'section' => 'related_sec',
        'settings' => 'hide_related',
        'type' => 'checkbox',
    ) );

    $wpc->add_setting( 'title_related_sec', array(
        'sanitize_callback' => false,
    ) );
    $wpc->add_control( 'title_related_sec_con', array(
        'label' => __( 'Title', 'eipro-master' ),
        'section' => 'related_sec',
        'settings' => 'title_related_sec',
        'type' => 'text',
        'input_attrs' => array(
            'placeholder' => 'You might also like',
        ),
    ) );

    // Number of posts to show
    $wpc->add_setting( 'number_post_related', array(
        'sanitize_callback' => false,
    ) );
    $wpc->add_control( 'number_post_related_con', array(
        'label' => __( 'Number of posts to show', 'eipro-master' ),
        'description' => __( 'Example: 3', 'eipro-master' ),
        'section' => 'related_sec',
        'settings' => 'number_post_related',
        'type' => 'number'
    ) );

    // Editor
    $wpc->add_section( 'editortheme' , array(
        'title'    => __( 'Editor', 'eipro-master' ),
        'panel'    => 'panel_id',
        'priority' => 50
    ) );

    // Enable Gutenberg
    $wpc->add_setting( 'enable_gutenberg_theme', array(
        'default' => false,
    ) );
    $wpc->add_control( 'control_enable_gutenberg_theme', array(
        'label' => __( 'Enable Gutenberg', 'eipro-master' ),
        'section' => 'editortheme',
        'settings' => 'enable_gutenberg_theme',
        'type' => 'checkbox',
    ) );

    // Layout
    $wpc->add_section( 'section_layout', array(
        'title' => __( 'Layout', 'eipro-master' ),
        'panel' => 'panel_id',
    ) );

    $wpc->add_setting( 'layout_set', array(
      'default' => 'lpersonal',
    ) );

    $wpc->add_control( 'layout_set_con', array(
      'label' => __( 'Layout Options', 'eipro-master' ),
      'type' => 'radio',
      'section' => 'section_layout',
      'settings' => 'layout_set',
      'choices' => array(
        'lpersonal' => __( 'Personal' ),
        'lbusiness' => __( 'Business' ),
        'lnews' => __( 'News' ),
      ),
    ) );

    // Sidebar
    $wpc->add_section( 'section_sidebar', array(
        'title' => __( 'Sidebar', 'eipro-master' ),
        'panel' => 'panel_id',
    ) );

    // Enable Sticky Sidebar
    $wpc->add_setting( 'set_enable_sticky_sidebar', array(
        'default' => false,
    ) );
    $wpc->add_control( 'con_enable_sticky_sidebar', array(
        'label' => __( 'Enable Sticky Sidebar', 'eipro-master' ),
        'section' => 'section_sidebar',
        'settings' => 'set_enable_sticky_sidebar',
        'type' => 'checkbox',
    ) );

    $wpc->add_setting( 'sidebar_set', array(
      'default' => 'right_sidebar_default',
    ) );

    $wpc->add_control( 'sidebar_set_con', array(
      'label' => __( 'Right Sidebar Options', 'eipro-master' ),
      'type' => 'radio',
      'section' => 'section_sidebar',
      'settings' => 'sidebar_set',
      'choices' => array(
        'right_sidebar_default' => __( 'Default' ),
        'no_sidebar_from_entire_site' => __( 'No sidebar from entire site' ),
        'no_sidebar_on_single_post' => __( 'No sidebar on single post' ),
      ),
    ) );

    // TOC (Table of Contents)
    $wpc->add_section( 'toc_sec', array(
        'title' => __( 'TOC (Table of Contents)', 'eipro-master' ),
        'panel' => 'panel_id',
    ) );

    // Hide
    $wpc->add_setting( 'hide_toc', array(
        'default' => false,
    ) );
    $wpc->add_control( 'hide_toc_con', array(
        'label' => __( 'Hide (Table of Contents)', 'eipro-master' ),
        'section' => 'toc_sec',
        'settings' => 'hide_toc',
        'type' => 'checkbox',
    ) );

    // Collapsible
    $wpc->add_setting( 'c_collapsible', array(
        'default' => false,
    ) );
    $wpc->add_control( 'c_collapsible_con', array(
        'label' => __( 'Collapsible', 'eipro-master' ),
        'section' => 'toc_sec',
        'settings' => 'c_collapsible',
        'type' => 'checkbox',
    ) );

    // Heading
    $wpc->add_setting( 'heading_toc', array(
        'sanitize_callback' => false,
    ) );
    $wpc->add_control( 'toc_con', array(
        'label' => __( 'Headline', 'eipro-master' ),
        'section' => 'toc_sec',
        'settings' => 'heading_toc',
        'type' => 'text',
        'input_attrs' => array(
            'placeholder' => 'Table of Contents',
        ),
    ) );

    // Tags
    $wpc->add_setting( 'tag_toc', array(
      'default' => 'p',
    ) );

    $wpc->add_control( 'tag_toc_con', array(
      'label' => __( 'Insert TOC after paragraph / heading', 'eipro-master' ),
      'type' => 'select',
      'section' => 'toc_sec',
      'settings' => 'tag_toc',
      'choices' => array(
        'p' => __( 'P' ),
        'h2' => __( 'H2' ),
        'h3' => __( 'H3' ),
        'h4' => __( 'H4' ),
        'h5' => __( 'H5' ),
        'h6' => __( 'H6' ),
      ),
    ) );

    // Options
    $wpc->add_setting( 'set_position_toc', array(
        'sanitize_callback' => false,
    ) );
    $wpc->add_control( 'position_toc_con', array(
        'label' => __( 'Position', 'eipro-master' ),
        'description' => __( 'Example: 1, 2, 3, 4, 5, 6', 'eipro-master' ),
        'section' => 'toc_sec',
        'settings' => 'set_position_toc',
        'type' => 'number',
    ) );

    // Inline Related Posts
    $wpc->add_section( 'c_inline_related_posts', array(
        'title' => __( 'Inline Related Posts', 'eipro-master' ),
        'panel' => 'panel_id',
    ) );

    // Hide
    $wpc->add_setting( 'hide_inline_related_posts', array(
        'default' => false,
    ) );
    $wpc->add_control( 'hide_inline_related_posts_con', array(
        'label' => __( 'Hide (Related Posts)', 'eipro-master' ),
        'section' => 'c_inline_related_posts',
        'settings' => 'hide_inline_related_posts',
        'type' => 'checkbox',
    ) );

    $wpc->add_setting( 'set_label_inline_related_posts', array(
        'capability' => 'edit_theme_options',
    ) );
    $wpc->add_control( 'control_label_inline_related_posts', array(
        'label' => __( 'Label', 'eipro-master' ),
        'section' => 'c_inline_related_posts',
        'settings' => 'set_label_inline_related_posts',
        'type' => 'text',
        'input_attrs' => array(
            'placeholder' => __( 'Also Read:', 'eipro-master' ),
        ),
    ) );

    // Type
    $wpc->add_setting( 'type_inline_related_posts', array(
      'default' => 't_default',
    ) );
    $wpc->add_control( 'type_inline_related_posts_con', array(
      'label' => __( 'Type', 'eipro-master' ),
      'type' => 'select',
      'section' => 'c_inline_related_posts',
      'settings' => 'type_inline_related_posts',
      'choices' => array(
        't_default' => __( 'Default' ),
        't_image' => __( 'Image' ),
      ),
    ) );

    // Insert Related Post
    $wpc->add_setting('ei_insert_inline_related_post',array(
        'default' => '',
        'sanitize_callback' => 'wp_kses_post',
    ));
    $wpc->add_control('ei_insert_inline_related_post_con',array(
        'label' => __('Insert related post after paragraph', 'eipro-master'),
        'type' => 'select',
        'choices' => $custom_choices,
        'section' => 'c_inline_related_posts',
        'settings' => 'ei_insert_inline_related_post',
    ));

    // Position
    $wpc->add_setting('ei_custom_position_inline_related_post', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_comma_separated_numbers',
    ));
    $wpc->add_control('ei_custom_position_inline_related_post_con', array(
        'label' => __('Position', 'eipro-master'),
        'description' => __('Example: 4,8,12', 'eipro-master'),
        'section' => 'c_inline_related_posts',
        'settings' => 'ei_custom_position_inline_related_post',
        'type' => 'text',
        'active_callback' => 'ei_custom_inline_related_post_set',
    ));

    $wpc->add_setting('ei_position_inline_related_post', array(
        'default' => '',
        'sanitize_callback' => 'absint',
    ));
    $wpc->add_control('ei_position_inline_related_post_con', array(
        'label' => __('Position', 'eipro-master'),
        'description' => __('Example: 3', 'eipro-master'),
        'section' => 'c_inline_related_posts',
        'settings' => 'ei_position_inline_related_post',
        'type' => 'number',
        'active_callback' => 'ei_auto_inline_related_post_set',
    ));

    // Number of posts to show
    $wpc->add_setting('ei_number_inline_related_post', array(
        'default' => '',
        'sanitize_callback' => 'absint',
    ));
    $wpc->add_control('ei_number_inline_related_post_con', array(
        'label' => __('Number of posts to show', 'eipro-master'),
        'description' => __('Example: 5', 'eipro-master'),
        'section' => 'c_inline_related_posts',
        'settings' => 'ei_number_inline_related_post',
        'type' => 'number',
    ));

    // Ad Settings
    $wpc->add_panel( 'ad_settings', array(
        'title'     => __( 'Ad Settings', 'eipro-master' ),
        'priority'  => 40,
    ) );

    // Adsense
    $wpc->add_section( 'c_adsense', array(
        'title' => __( 'Adsense', 'eipro-master' ),
        'panel' => 'ad_settings',
    ) );

    // data-ad-client
    $wpc->add_setting( 'set_data_ad_client', array(
        'sanitize_callback' => false,
    ) );
    $wpc->add_control( 'control_data_ad_client', array(
        'label' => __( 'Data Ad Client', 'eipro-master' ),
        'section' => 'c_adsense',
        'settings' => 'set_data_ad_client',
        'type' => 'text',
        'input_attrs' => array(
            'placeholder' => 'pub-24905248295xxxxx',
        ),
    ) );

    // Enable (Lazyload AdSense)
    $wpc->add_setting( 'enable_lazyload_adsense', array(
        'default' => false,
    ) );
    $wpc->add_control( 'enable_lazyload_adsense_con', array(
        'label' => __( 'Enable (Lazyload AdSense)', 'eipro-master' ),
        'section' => 'c_adsense',
        'settings' => 'enable_lazyload_adsense',
        'type' => 'checkbox',
    ) );


    $wpc->add_section( 'top_ad', array(
        'title' => __( 'Top', 'eipro-master' ),
        'panel' => 'ad_settings',
    ) );
    $wpc->add_setting( 'set_top_ad', array(
        'sanitize_callback' => false,
    ) );
    $wpc->add_control( 'control_top_ad', array(
        'label' => __( 'Ad Code', 'eipro-master' ),
        'section' => 'top_ad',
        'settings' => 'set_top_ad',
        'type' => 'textarea',
    ) );

    $wpc->add_section( 'middle_ad', array(
        'title' => __( 'Middle', 'eipro-master' ),
        'panel' => 'ad_settings',
    ) );
    $wpc->add_setting( 'set_middle_ad', array(
        'sanitize_callback' => false,
    ) );
    $wpc->add_control( 'control_middle_ad', array(
        'label' => __( 'Ad Code', 'eipro-master' ),
        'section' => 'middle_ad',
        'settings' => 'set_middle_ad',
        'type' => 'textarea',
    ) );

    $wpc->add_section( 'sidebar_ad', array(
        'title' => __( 'Sidebar', 'eipro-master' ),
        'panel' => 'ad_settings',
    ) );
    $wpc->add_setting( 'set_sidebar_ad', array(
        'sanitize_callback' => false,
    ) );
    $wpc->add_control( 'control_sidebar_ad', array(
        'label' => __( 'Ad Code', 'eipro-master' ),
        'section' => 'sidebar_ad',
        'settings' => 'set_sidebar_ad',
        'type' => 'textarea',
    ) );

    $wpc->add_section( 'bottom_ad', array(
        'title' => __( 'Bottom', 'eipro-master' ),
        'panel' => 'ad_settings',
    ) );
    $wpc->add_setting( 'set_bottom_ad', array(
        'sanitize_callback' => false,
    ) );
    $wpc->add_control( 'control_bottom_ad', array(
        'label' => __( 'Ad Code', 'eipro-master' ),
        'section' => 'bottom_ad',
        'settings' => 'set_bottom_ad',
        'type' => 'textarea',
    ) );


    $wpc->add_section( 'single_post_ad', array(
        'title' => __( 'Single Post', 'eipro-master' ),
        'panel' => 'ad_settings',
    ) );

    // Enable Ads - Single Post
    $wpc->add_setting( 'enable_ad_single_post', array(
        'default' => false,
    ) );
    $wpc->add_control( 'control_enable_ad_single_post', array(
        'label' => __( 'Enable ads', 'eipro-master' ),
        'section' => 'single_post_ad',
        'settings' => 'enable_ad_single_post',
        'type' => 'checkbox',
    ) );

    $wpc->add_setting( 'set_single_post_ad', array(
        'sanitize_callback' => false,
    ) );
    $wpc->add_control( 'control_single_post_ad', array(
        'label' => __( 'Ad Code', 'eipro-master' ),
        'section' => 'single_post_ad',
        'settings' => 'set_single_post_ad',
        'type' => 'textarea',
    ) );

    $wpc->add_setting( 'set_position_single_post_ad', array(
        'capability' => 'edit_theme_options',
    ) );
    $wpc->add_control( 'control_position_single_post_ad', array(
        'label' => __( 'Insert ad after paragraph', 'eipro-master' ),
        'description' => __( 'Example: 1,2,3,4,5,6', 'eipro-master' ),
        'section' => 'single_post_ad',
        'settings' => 'set_position_single_post_ad',
        'type' => 'text',
    ) );

    $wpc->add_section( 'in_feed_ad', array(
        'title' => __( 'In-feed', 'eipro-master' ),
        'panel' => 'ad_settings',
    ) );

    // Enable Ads - In-feed
    $wpc->add_setting( 'enable_ad_in_feed', array(
        'default' => false,
    ) );
    $wpc->add_control( 'control_enable_ad_in_feed', array(
        'label' => __( 'Enable In-feed ads', 'eipro-master' ),
        'section' => 'in_feed_ad',
        'settings' => 'enable_ad_in_feed',
        'type' => 'checkbox',
    ) );

    $wpc->add_setting( 'set_in_feed_ad_desktop', array(
        'sanitize_callback' => false,
    ) );
    $wpc->add_control( 'control_in_feed_ad_desktop', array(
        'label' => __( 'Ad Code - Desktop', 'eipro-master' ),
        'section' => 'in_feed_ad',
        'settings' => 'set_in_feed_ad_desktop',
        'type' => 'textarea',
    ) );

    $wpc->add_setting( 'set_in_feed_ad_mobile', array(
        'sanitize_callback' => false,
    ) );
    $wpc->add_control( 'control_in_feed_ad_mobile', array(
        'label' => __( 'Ad Code - Mobile', 'eipro-master' ),
        'section' => 'in_feed_ad',
        'settings' => 'set_in_feed_ad_mobile',
        'type' => 'textarea',
    ) );

    $wpc->add_setting( 'set_position_in_feed_ad', array(
        'capability' => 'edit_theme_options',
    ) );
    $wpc->add_control( 'control_position_in_feed_ad', array(
        'label' => __( 'Position', 'eipro-master' ),
        'description' => __( 'Example: 1, 2, 3', 'eipro-master' ),
        'section' => 'in_feed_ad',
        'settings' => 'set_position_in_feed_ad',
        'type' => 'number',
    ) );

    // Float Ads
    $wpc->add_section( 'fload_ads', array(
        'title' => __( 'Float Ads', 'eipro-master' ),
        'panel' => 'ad_settings',
    ) );

    // Enable - Float Ads
    $wpc->add_setting( 'enable_fload_ad', array(
        'default' => false,
    ) );
    $wpc->add_control( 'control_enable_fload_ad', array(
        'label' => __( 'Enable Float Ads', 'eipro-master' ),
        'section' => 'fload_ads',
        'settings' => 'enable_fload_ad',
        'type' => 'checkbox',
    ) );

    $wpc->add_setting( 'hide_close_btn_fload_ad', array(
        'default' => false,
    ) );
    $wpc->add_control( 'control_hide_close_btn_fload_ad', array(
        'label' => __( 'Hide Close Button', 'eipro-master' ),
        'section' => 'fload_ads',
        'settings' => 'hide_close_btn_fload_ad',
        'type' => 'checkbox',
    ) );

    $wpc->add_setting( 'set_fload_ad_left', array(
        'sanitize_callback' => false,
    ) );
    $wpc->add_control( 'control_fload_ad_left', array(
        'label' => __( 'Ad Code - Left', 'eipro-master' ),
        'section' => 'fload_ads',
        'settings' => 'set_fload_ad_left',
        'type' => 'textarea',
    ) );

    $wpc->add_setting( 'set_fload_ad_right', array(
        'sanitize_callback' => false,
    ) );
    $wpc->add_control( 'control_fload_ad_right', array(
        'label' => __( 'Ad Code - Right', 'eipro-master' ),
        'section' => 'fload_ads',
        'settings' => 'set_fload_ad_right',
        'type' => 'textarea',
    ) );


    // Social Media Links
    $wpc->add_section( 'social_media', array(
        'title'     => __( 'Social Media', 'eipro-master' ),
        'priority'  => 40,
        'panel'    => 'panel_id',
    ) );

    $wpc->add_setting( 'facebook_url', array(
        'sanitize_callback' => 'sanitize_url',
    ) );
    $wpc->add_control( 'facebook_url_control', array(
        'label' => __( 'Facebook', 'eipro-master' ),
        'section' => 'social_media',
        'settings' => 'facebook_url',
        'type' => 'url',
        'input_attrs' => array(
            'placeholder' => 'https://www.facebook.com/',
        ),
    ) );

    $wpc->add_setting( 'instagram_url', array(
        'sanitize_callback' => 'sanitize_url',
    ) );
    $wpc->add_control( 'instagram_url_control', array(
        'label' => __( 'Instagram', 'eipro-master' ),
        'section' => 'social_media',
        'settings' => 'instagram_url',
        'type' => 'url',
        'input_attrs' => array(
            'placeholder' => 'https://instagram.com/',
        ),
    ) );

    $wpc->add_setting( 'tiktok_url', array(
        'sanitize_callback' => 'sanitize_url',
    ) );
    $wpc->add_control( 'tiktok_url_control', array(
        'label' => __( 'Tiktok', 'eipro-master' ),
        'section' => 'social_media',
        'settings' => 'tiktok_url',
        'type' => 'url',
        'input_attrs' => array(
            'placeholder' => 'https://tiktok.com/',
        ),
    ) );

    $wpc->add_setting( 'telegram_url', array(
        'sanitize_callback' => 'sanitize_url',
    ) );
    $wpc->add_control( 'telegram_url_control', array(
        'label' => __( 'Telegram', 'eipro-master' ),
        'section' => 'social_media',
        'settings' => 'telegram_url',
        'type' => 'url',
        'input_attrs' => array(
            'placeholder' => 'https://t.me/username',
        ),
    ) );

    $wpc->add_setting( 'linkedin_url', array(
        'sanitize_callback' => 'sanitize_url',
    ) );
    $wpc->add_control( 'linkedin_url_control', array(
        'label' => __( 'Linkedin', 'eipro-master' ),
        'section' => 'social_media',
        'settings' => 'linkedin_url',
        'type' => 'url',
        'input_attrs' => array(
            'placeholder' => 'https://linkedin.com/',
        ),
    ) );

    $wpc->add_setting( 'myspace_url', array(
        'sanitize_callback' => 'sanitize_url',
    ) );
    $wpc->add_control( 'myspace_url_control', array(
        'label' => __( 'Myspace', 'eipro-master' ),
        'section' => 'social_media',
        'settings' => 'myspace_url',
        'type' => 'url',
        'input_attrs' => array(
            'placeholder' => 'https://myspace.com/',
        ),
    ) );

    $wpc->add_setting( 'pinterest_url', array(
        'sanitize_callback' => 'sanitize_url',
    ) );
    $wpc->add_control( 'pinterest_url_control', array(
        'label' => __( 'Pinterest', 'eipro-master' ),
        'section' => 'social_media',
        'settings' => 'pinterest_url',
        'type' => 'url',
        'input_attrs' => array(
            'placeholder' => 'https://pinterest.com/',
        ),
    ) );

    $wpc->add_setting( 'soundcloud_url', array(
        'sanitize_callback' => 'sanitize_url',
    ) );
    $wpc->add_control( 'soundcloud_url_control', array(
        'label' => __( 'Soundcloud', 'eipro-master' ),
        'section' => 'social_media',
        'settings' => 'soundcloud_url',
        'type' => 'url',
        'input_attrs' => array(
            'placeholder' => 'https://soundcloud.com/',
        ),
    ) );

    $wpc->add_setting( 'tumblr_url', array(
        'sanitize_callback' => 'sanitize_url',
    ) );
    $wpc->add_control( 'tumblr_url_control', array(
        'label' => __( 'Tumblr', 'eipro-master' ),
        'section' => 'social_media',
        'settings' => 'tumblr_url',
        'type' => 'url',
        'input_attrs' => array(
            'placeholder' => 'https://tumblr.com/',
        ),
    ) );

    $wpc->add_setting( 'twitter_url', array(
        'sanitize_callback' => 'sanitize_url',
    ) );
    $wpc->add_control( 'twitter_url_control', array(
        'label' => __( 'Twitter', 'eipro-master' ),
        'section' => 'social_media',
        'settings' => 'twitter_url',
        'type' => 'url',
        'input_attrs' => array(
            'placeholder' => 'https://twitter.com/',
        ),
    ) );

    $wpc->add_setting( 'youtube_url', array(
        'sanitize_callback' => 'sanitize_url',
    ) );
    $wpc->add_control( 'youtube_url_control', array(
        'label' => __( 'YouTube', 'eipro-master' ),
        'section' => 'social_media',
        'settings' => 'youtube_url',
        'type' => 'url',
        'input_attrs' => array(
            'placeholder' => 'https://youtube.com/',
        ),
    ) );

    $wpc->add_setting( 'wikipedia_url', array(
        'sanitize_callback' => 'sanitize_url',
    ) );
    $wpc->add_control( 'wikipedia_url_control', array(
        'label' => __( 'Wikipedia', 'eipro-master' ),
        'section' => 'social_media',
        'settings' => 'wikipedia_url',
        'type' => 'url',
        'input_attrs' => array(
            'placeholder' => 'https://www.wikipedia.org/',
        ),
    ) );

    // Social Share Buttons
    $wpc->add_section( 'social_share_button', array(
        'title'     => __( 'Social Share Buttons', 'eipro-master' ),
        'priority'  => 40,
        'panel'    => 'panel_id',
    ) );

    // Label Share
    $wpc->add_setting( 'hide_social_share_button', array(
        'default' => false,
    ) );
    $wpc->add_control( 'hide_social_share_button_con', array(
        'label' => __( 'Hide (Social Share Buttons)', 'eipro-master' ),
        'section' => 'social_share_button',
        'settings' => 'hide_social_share_button',
        'type' => 'checkbox',
    ) );
    
    $wpc->add_setting( 'label_social_share_button', array(
        'sanitize_callback' => false,
    ) );
    $wpc->add_control( 'label_social_share_button_con', array(
        'label' => __( 'Label', 'eipro-master' ),
        'section' => 'social_share_button',
        'settings' => 'label_social_share_button',
        'type' => 'text',
        'input_attrs' => array(
            'placeholder' => 'Share this:',
        ),
    ) );

    // Placement
    $wpc->add_setting( 'placement_social_share_button', array(
      'sanitize_callback' => false,
    ) );

    $wpc->add_control( 'control_placement_social_share_button', array(
      'label' => __( 'Placement', 'eipro-master' ),
      'type' => 'radio',
      'section' => 'social_share_button',
      'settings' => 'placement_social_share_button',
      'choices' => array(
        'bottom' => __( 'Display at the bottom of posts' ),
        'top' => __( 'Display at the top of posts' ),
        'topbottom' => __( 'Display at the top & bottom of posts' ),
      ),
    ) );

    // Custom label share button
    $wpc->add_setting( 'custom_label_share_btn', array(
        'sanitize_callback' => false,
    ));
    $wpc->add_control( 'custom_label_share_btn_con', array(
        'label' => __( 'Share Buttons', 'eipro-master' ),
        'section' => 'social_share_button',
        'settings' => 'custom_label_share_btn',
        'type' => 'text',
    ));

    $wpc->add_setting( 'fb_social_share_button', array(
        'default' => false,
    ) );
    $wpc->add_control( 'fb_social_share_button_con', array(
        'label' => __( 'Facebook', 'eipro-master' ),
        'section' => 'social_share_button',
        'settings' => 'fb_social_share_button',
        'type' => 'checkbox',
    ) );

    $wpc->add_setting( 'wa_social_share_button', array(
        'default' => false,
    ) );
    $wpc->add_control( 'wa_social_share_button_con', array(
        'label' => __( 'WhatsApp', 'eipro-master' ),
        'section' => 'social_share_button',
        'settings' => 'wa_social_share_button',
        'type' => 'checkbox',
    ) );

    $wpc->add_setting( 'tw_social_share_button', array(
        'default' => false,
    ) );
    $wpc->add_control( 'tw_social_share_button_con', array(
        'label' => __( 'Twitter', 'eipro-master' ),
        'section' => 'social_share_button',
        'settings' => 'tw_social_share_button',
        'type' => 'checkbox',
    ) );

    $wpc->add_setting( 'em_social_share_button', array(
        'default' => false,
    ) );
    $wpc->add_control( 'em_social_share_button_con', array(
        'label' => __( 'Email', 'eipro-master' ),
        'section' => 'social_share_button',
        'settings' => 'em_social_share_button',
        'type' => 'checkbox',
    ) );

    $wpc->add_setting( 'tl_social_share_button', array(
        'default' => false,
    ) );
    $wpc->add_control( 'tl_social_share_button_con', array(
        'label' => __( 'Telegram', 'eipro-master' ),
        'section' => 'social_share_button',
        'settings' => 'tl_social_share_button',
        'type' => 'checkbox',
    ) );

    $wpc->add_setting( 'ln_social_share_button', array(
        'default' => false,
    ) );
    $wpc->add_control( 'ln_social_share_button_con', array(
        'label' => __( 'LinkedIn', 'eipro-master' ),
        'section' => 'social_share_button',
        'settings' => 'ln_social_share_button',
        'type' => 'checkbox',
    ) );

    $wpc->add_setting( 'pn_social_share_button', array(
        'default' => false,
    ) );
    $wpc->add_control( 'pn_social_share_button_con', array(
        'label' => __( 'Pinterest', 'eipro-master' ),
        'section' => 'social_share_button',
        'settings' => 'pn_social_share_button',
        'type' => 'checkbox',
    ) );

    $wpc->add_setting( 'copy_social_share_button', array(
        'default' => false,
    ) );
    $wpc->add_control( 'copy_social_share_button_con', array(
        'label' => __( 'Copy to Clipboard', 'eipro-master' ),
        'section' => 'social_share_button',
        'settings' => 'copy_social_share_button',
        'type' => 'checkbox',
    ) );

    // Navbar
    $wpc->add_section( 'c_navbar', array(
        'title'     => __( 'Navbar', 'eipro-master' ),
        'priority'  => 10,
        'panel'    => 'panel_id',
    ) );

    // Label CTA Button
    $wpc->add_setting( 'lbl_cta_btn', array(
        'sanitize_callback' => false,
    ));
    $wpc->add_control( 'lbl_cta_btn', array(
        'label' => __( 'Call To Action Button', 'eipro-master' ),
        'section' => 'c_navbar',
        'settings' => 'lbl_cta_btn',
        'type' => 'text',
    ));

    // Enable CTA
    $wpc->add_setting( 'set_enable_cta_btn', array(
        'default' => false,
    ) );
    $wpc->add_control( 'con_enable_cta_btn', array(
        'label' => __( 'Enable (CTA)', 'eipro-master' ),
        'section' => 'c_navbar',
        'settings' => 'set_enable_cta_btn',
        'type' => 'checkbox',
    ) );

    // Link Text CTA
    $wpc->add_setting( 'navbar_link_txt_cta', array(
        'sanitize_callback' => false,
    ) );
    $wpc->add_control( 'navbar_link_txt_cta_con', array(
        'label' => __( 'Link Text', 'eipro-master' ),
        'section' => 'c_navbar',
        'settings' => 'navbar_link_txt_cta',
        'type' => 'text',
    ) );

    // URL CTA
    $wpc->add_setting( 'navbar_url_cta', array(
        'sanitize_callback' => false,
    ) );
    $wpc->add_control( 'navbar_url_cta_con', array(
        'label' => __( 'URL', 'eipro-master' ),
        'section' => 'c_navbar',
        'settings' => 'navbar_url_cta',
        'type' => 'url',
    ) );

    // Background Color CTA
    $wpc->add_setting( 'bg_color_cta' , array(
        'default'   => '',
        'transport' => 'refresh',
    ) );
    $wpc->add_control( new WP_Customize_Color_Control( $wpc, 'bg_color_cta_con', array(
        'label'    => __( 'Background Color', 'eipro-master' ),
        'description' => __( 'ex: #1a8917', 'eipro-master' ),
        'section'  => 'c_navbar',
        'settings' => 'bg_color_cta',
    ) ) );

    // Text Color CTA
    $wpc->add_setting( 'text_color_cta' , array(
        'default'   => '',
        'transport' => 'refresh',
    ) );
    $wpc->add_control( new WP_Customize_Color_Control( $wpc, 'text_color_cta_con', array(
        'label'    => __( 'Text Color', 'eipro-master' ),
        'description' => __( 'ex: #ffffff', 'eipro-master' ),
        'section'  => 'c_navbar',
        'settings' => 'text_color_cta',
    ) ) );


    // Disqus Comment
    $wpc->add_section( 'disqus_comment', array(
        'title'     => __( 'Comment System', 'eipro-master' ),
        'priority'  => 30,
        'panel'    => 'panel_id',
    ) );

    $wpc->add_setting( 'enable_wp_default_comment', array(
        'default' => false,
    ) );
    $wpc->add_control( 'control_enable_wp_default_comment', array(
        'label' => __( 'Enable WP (Default Comment)', 'eipro-master' ),
        'section' => 'disqus_comment',
        'settings' => 'enable_wp_default_comment',
        'type' => 'checkbox',
    ) );

    $wpc->add_setting( 'shortname', array(
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text',
    ) );
    $wpc->add_control( 'shortname_control', array(
        'label' => __( 'Disqus Shortname', 'eipro-master' ),
        'section' => 'disqus_comment',
        'settings' => 'shortname',
        'type' => 'text',
        'input_attrs' => array(
            'placeholder' => '',
        ),
    ) );

    // Popup
    $wpc->add_section( 'section_popup', array(
        'title' => __( 'Popup', 'eipro-master' ),
        'panel' => 'panel_id',
    ) );

    $wpc->add_setting( 'enable_popup', array(
        'default' => false,
    ) );
    $wpc->add_control( 'control_enable_popup', array(
        'label' => __( 'Enable Popup', 'eipro-master' ),
        'section' => 'section_popup',
        'settings' => 'enable_popup',
        'type' => 'checkbox',
    ) );

    $wpc->add_setting( 'setting_popup', array(
        'sanitize_callback' => false,
    ) );
    $wpc->add_control( 'control_popup', array(
        'label' => __( 'Content', 'eipro-master' ),
        'section' => 'section_popup',
        'settings' => 'setting_popup',
        'type' => 'textarea',
    ) );

    $wpc->add_setting( 'set_delay_popup', array(
        'sanitize_callback' => false,
    ) );
    $wpc->add_control( 'delay_popup_con', array(
        'label' => __( 'Delay', 'eipro-master' ),
        'description' => __( 'Default: 10 (seconds)', 'eipro-master' ),
        'section' => 'section_popup',
        'settings' => 'set_delay_popup',
        'type' => 'number',
        'input_attrs' => array(
            'placeholder' => "10",
        ),
    ) );

    $wpc->add_setting( 'placement_popup_set', array(
      'default' => 'pop_entiresite',
    ) );

    $wpc->add_control( 'placement_popup_set_con', array(
      'label' => __( 'Placement', 'eipro-master' ),
      'type' => 'radio',
      'section' => 'section_popup',
      'settings' => 'placement_popup_set',
      'choices' => array(
        'pop_entiresite' => __( 'Entire Site' ),
        'pop_home' => __( 'Homepage' ),
        'pop_singlepost' => __( 'Single Post' ),
      ),
    ) );

    // Infinite Scroll
    $wpc->add_section( 'section_infinite_scroll', array(
        'title' => __( 'Infinite Scroll', 'eipro-master' ),
        'panel' => 'panel_id',
    ) );

    $wpc->add_setting( 'infinite_scroll_set', array(
      'default' => 'lscroll',
    ) );

    $wpc->add_control( 'infinite_scroll_set_con', array(
      'label' => __( 'Load More Button or Just Load Posts by Scroll', 'eipro-master' ),
      'type' => 'radio',
      'section' => 'section_infinite_scroll',
      'settings' => 'infinite_scroll_set',
      'choices' => array(
        'lscroll' => __( 'Load posts by scroll' ),
        'lbutton' => __( 'Load more button' ),
      ),
    ) );

    // Strings
    $wpc->add_section( 'ei_custom_string' , array(
        'title'    => 'Strings',
        'panel'    => 'panel_id',
    ) );

    $wpc->add_setting( 'ei_custom_string_page_not_found', array(
        'sanitize_callback' => false,
    ) );
    $wpc->add_control( 'ei_custom_string_page_not_found_control', array(
        'label' => 'Page not found!',
        'description' => 'Halaman tidak ditemukan!',
        'section' => 'ei_custom_string',
        'settings' => 'ei_custom_string_page_not_found',
        'type' => 'text',
        'input_attrs' => array(
            'placeholder' => 'Page not found!',
        ),
    ) );

    $wpc->add_setting( 'ei_custom_string_error404', array(
        'sanitize_callback' => false,
    ) );
    $wpc->add_control( 'ei_custom_string_error404_control', array(
        'label' => 'Sorry, the page you were looking for was not found.',
        'description' => 'Maaf, halaman yang Anda cari tidak ditemukan.',
        'section' => 'ei_custom_string',
        'settings' => 'ei_custom_string_error404',
        'type' => 'text',
        'input_attrs' => array(
            'placeholder' => 'Sorry, the page you were looking for was not found.',
        ),
    ) );

    $wpc->add_setting( 'ei_custom_string_back_home', array(
        'sanitize_callback' => false,
    ) );
    $wpc->add_control( 'ei_custom_string_back_home_control', array(
        'label' => 'Back Home',
        'description' => 'Kembali ke Beranda',
        'section' => 'ei_custom_string',
        'settings' => 'ei_custom_string_back_home',
        'type' => 'text',
        'input_attrs' => array(
            'placeholder' => 'Back Home',
        ),
    ) );

    $wpc->add_setting( 'ei_custom_string_one_thought_on', array(
        'sanitize_callback' => false,
    ) );
    $wpc->add_control( 'ei_custom_string_one_thought_on_control', array(
        'label' => 'One thought on',
        'description' => 'Satu komentar tentang',
        'section' => 'ei_custom_string',
        'settings' => 'ei_custom_string_one_thought_on',
        'type' => 'text',
        'input_attrs' => array(
            'placeholder' => 'One thought on',
        ),
    ) );

    $wpc->add_setting( 'ei_custom_string_thoughts_on', array(
        'sanitize_callback' => false,
    ) );
    $wpc->add_control( 'ei_custom_string_thoughts_on_control', array(
        'label' => 'thoughts on',
        'description' => 'komentar tentang',
        'section' => 'ei_custom_string',
        'settings' => 'ei_custom_string_thoughts_on',
        'type' => 'text',
        'input_attrs' => array(
            'placeholder' => 'thoughts on',
        ),
    ) );

    $wpc->add_setting( 'ei_custom_string_comments_are_closed', array(
        'sanitize_callback' => false,
    ) );
    $wpc->add_control( 'ei_custom_string_comments_are_closed_control', array(
        'label' => 'Comments are closed.',
        'description' => 'Komentar ditutup.',
        'section' => 'ei_custom_string',
        'settings' => 'ei_custom_string_comments_are_closed',
        'type' => 'text',
        'input_attrs' => array(
            'placeholder' => 'Comments are closed.',
        ),
    ) );

    $wpc->add_setting( 'ei_custom_string_show_comments', array(
        'sanitize_callback' => false,
    ) );
    $wpc->add_control( 'ei_custom_string_show_comments_control', array(
        'label' => 'Show Comments',
        'description' => 'Tampilkan Komentar',
        'section' => 'ei_custom_string',
        'settings' => 'ei_custom_string_show_comments',
        'type' => 'text',
        'input_attrs' => array(
            'placeholder' => 'Show Comments',
        ),
    ) );

    $wpc->add_setting( 'ei_custom_string_type_here', array(
        'sanitize_callback' => false,
    ) );
    $wpc->add_control( 'ei_custom_string_type_here_control', array(
        'label' => 'Type here...',
        'description' => 'Ketik di sini...',
        'section' => 'ei_custom_string',
        'settings' => 'ei_custom_string_type_here',
        'type' => 'text',
        'input_attrs' => array(
            'placeholder' => 'Type here...',
        ),
    ) );

    $wpc->add_setting( 'ei_custom_string_input_name', array(
        'sanitize_callback' => false,
    ) );
    $wpc->add_control( 'ei_custom_string_input_name_control', array(
        'label' => 'Name',
        'description' => 'Nama',
        'section' => 'ei_custom_string',
        'settings' => 'ei_custom_string_input_name',
        'type' => 'text',
        'input_attrs' => array(
            'placeholder' => 'Name',
        ),
    ) );

    $wpc->add_setting( 'ei_custom_string_input_email', array(
        'sanitize_callback' => false,
    ) );
    $wpc->add_control( 'ei_custom_string_input_email_control', array(
        'label' => 'Email',
        'description' => 'Email',
        'section' => 'ei_custom_string',
        'settings' => 'ei_custom_string_input_email',
        'type' => 'text',
        'input_attrs' => array(
            'placeholder' => 'Email',
        ),
    ) );

    $wpc->add_setting( 'ei_custom_string_input_comment_cookies_consent', array(
        'sanitize_callback' => false,
    ) );
    $wpc->add_control( 'ei_custom_string_input_comment_cookies_consent_control', array(
        'label' => 'Save my name and email in this browser for the next time I comment.',
        'description' => 'Simpan nama dan email saya di browser ini untuk komentar saya berikutnya.',
        'section' => 'ei_custom_string',
        'settings' => 'ei_custom_string_input_comment_cookies_consent',
        'type' => 'text',
        'input_attrs' => array(
            'placeholder' => 'Save my name and email in this browser for the next time I comment.',
        ),
    ) );

    $wpc->add_setting( 'ei_custom_string_min_read', array(
        'sanitize_callback' => false,
    ) );
    $wpc->add_control( 'ei_custom_string_min_read_control', array(
        'label' => 'min read',
        'description' => 'menit membaca',
        'section' => 'ei_custom_string',
        'settings' => 'ei_custom_string_min_read',
        'type' => 'text',
        'input_attrs' => array(
            'placeholder' => 'min read',
        ),
    ) );

    $wpc->add_setting( 'ei_custom_string_ago', array(
        'sanitize_callback' => false,
    ) );
    $wpc->add_control( 'ei_custom_string_ago_control', array(
        'label' => 'ago',
        'description' => 'yang lalu',
        'section' => 'ei_custom_string',
        'settings' => 'ei_custom_string_ago',
        'type' => 'text',
        'input_attrs' => array(
            'placeholder' => 'ago',
        ),
    ) );

    $wpc->add_setting( 'ei_custom_string_comment', array(
        'sanitize_callback' => false,
    ) );
    $wpc->add_control( 'ei_custom_string_comment_control', array(
        'label' => 'Comment',
        'description' => 'Komentar',
        'section' => 'ei_custom_string',
        'settings' => 'ei_custom_string_comment',
        'type' => 'text',
        'input_attrs' => array(
            'placeholder' => 'Comment',
        ),
    ) );

    $wpc->add_setting( 'ei_custom_string_comments', array(
        'sanitize_callback' => false,
    ) );
    $wpc->add_control( 'ei_custom_string_comments_control', array(
        'label' => 'Comments',
        'description' => 'Komentar',
        'section' => 'ei_custom_string',
        'settings' => 'ei_custom_string_comments',
        'type' => 'text',
        'input_attrs' => array(
            'placeholder' => 'Comments',
        ),
    ) );

    $wpc->add_setting( 'ei_custom_string_home', array(
        'sanitize_callback' => false,
    ) );
    $wpc->add_control( 'ei_custom_string_home_control', array(
        'label' => 'Home',
        'description' => 'Beranda',
        'section' => 'ei_custom_string',
        'settings' => 'ei_custom_string_home',
        'type' => 'text',
        'input_attrs' => array(
            'placeholder' => 'Home',
        ),
    ) );

    $wpc->add_setting( 'ei_custom_string_search_results_for', array(
        'sanitize_callback' => false,
    ) );
    $wpc->add_control( 'ei_custom_string_search_results_for_control', array(
        'label' => 'Search Results for:',
        'description' => 'Hasil Pencarian untuk:',
        'section' => 'ei_custom_string',
        'settings' => 'ei_custom_string_search_results_for',
        'type' => 'text',
        'input_attrs' => array(
            'placeholder' => 'Search Results for:',
        ),
    ) );

    $wpc->add_setting( 'ei_custom_string_post_title', array(
        'sanitize_callback' => false,
    ) );
    $wpc->add_control( 'ei_custom_string_post_title_control', array(
        'label' => 'Post Title',
        'description' => 'Judul Postingan',
        'section' => 'ei_custom_string',
        'settings' => 'ei_custom_string_post_title',
        'type' => 'text',
        'input_attrs' => array(
            'placeholder' => 'Post Title',
        ),
    ) );

    $wpc->add_setting( 'ei_custom_string_date', array(
        'sanitize_callback' => false,
    ) );
    $wpc->add_control( 'ei_custom_string_date_control', array(
        'label' => 'Date',
        'description' => 'Tanggal',
        'section' => 'ei_custom_string',
        'settings' => 'ei_custom_string_date',
        'type' => 'text',
        'input_attrs' => array(
            'placeholder' => 'Date',
        ),
    ) );

    $wpc->add_setting( 'ei_custom_string_categories', array(
        'sanitize_callback' => false,
    ) );
    $wpc->add_control( 'ei_custom_string_categories_control', array(
        'label' => 'Categories',
        'description' => 'Kategori',
        'section' => 'ei_custom_string',
        'settings' => 'ei_custom_string_categories',
        'type' => 'text',
        'input_attrs' => array(
            'placeholder' => 'Categories',
        ),
    ) );

    $wpc->add_setting( 'ei_custom_string_search_no_results', array(
        'sanitize_callback' => false,
    ) );
    $wpc->add_control( 'ei_custom_string_search_no_results_control', array(
        'label' => 'Sorry, but nothing matched your search terms.',
        'description' => 'Maaf, tapi tidak ada yang cocok dengan kata kunci pencarian Anda.',
        'section' => 'ei_custom_string',
        'settings' => 'ei_custom_string_search_no_results',
        'type' => 'text',
        'input_attrs' => array(
            'placeholder' => 'Sorry, but nothing matched your search terms.',
        ),
    ) );

    $wpc->add_setting( 'ei_custom_string_coming_soon', array(
        'sanitize_callback' => false,
    ) );
    $wpc->add_control( 'ei_custom_string_coming_soon_control', array(
        'label' => 'Coming Soon...',
        'description' => 'Segera Hadir...',
        'section' => 'ei_custom_string',
        'settings' => 'ei_custom_string_coming_soon',
        'type' => 'text',
        'input_attrs' => array(
            'placeholder' => 'Coming Soon...',
        ),
    ) );

    $wpc->add_setting( 'ei_custom_string_more_posts', array(
        'sanitize_callback' => false,
    ) );
    $wpc->add_control( 'ei_custom_string_more_posts_control', array(
        'label' => 'More posts',
        'description' => 'Lihat Postingan Lainnya',
        'section' => 'ei_custom_string',
        'settings' => 'ei_custom_string_more_posts',
        'type' => 'text',
        'input_attrs' => array(
            'placeholder' => 'More posts',
        ),
    ) );

    $wpc->add_setting( 'ei_custom_string_all_categories', array(
        'sanitize_callback' => false,
    ) );
    $wpc->add_control( 'ei_custom_string_all_categories_control', array(
        'label' => 'All categories',
        'description' => 'Semua kategori',
        'section' => 'ei_custom_string',
        'settings' => 'ei_custom_string_all_categories',
        'type' => 'text',
        'input_attrs' => array(
            'placeholder' => 'All categories',
        ),
    ) );

    $wpc->add_setting( 'ei_custom_string_search_here', array(
        'sanitize_callback' => false,
    ) );
    $wpc->add_control( 'ei_custom_string_search_here_control', array(
        'label' => 'Search here...',
        'description' => 'Cari di sini...',
        'section' => 'ei_custom_string',
        'settings' => 'ei_custom_string_search_here',
        'type' => 'text',
        'input_attrs' => array(
            'placeholder' => 'Search here...',
        ),
    ) );

    $wpc->add_setting( 'ei_custom_string_by', array(
        'sanitize_callback' => false,
    ) );
    $wpc->add_control( 'ei_custom_string_by_control', array(
        'label' => 'by',
        'description' => 'oleh',
        'section' => 'ei_custom_string',
        'settings' => 'ei_custom_string_by',
        'type' => 'text',
        'input_attrs' => array(
            'placeholder' => 'by',
        ),
    ) );

    $wpc->add_setting( 'ei_custom_string_more_cat_articles', array(
        'sanitize_callback' => false,
    ) );
    $wpc->add_control( 'ei_custom_string_more_cat_articles_control', array(
        'label' => 'More %s Articles',
        'description' => 'Artikel %s Lainnya',
        'section' => 'ei_custom_string',
        'settings' => 'ei_custom_string_more_cat_articles',
        'type' => 'text',
        'input_attrs' => array(
            'placeholder' => 'More %s Articles',
        ),
    ) );

    $wpc->add_setting( 'ei_custom_string_404', array(
        'sanitize_callback' => false,
    ) );
    $wpc->add_control( 'ei_custom_string_404_control', array(
        'label' => '404',
        'description' => '404',
        'section' => 'ei_custom_string',
        'settings' => 'ei_custom_string_404',
        'type' => 'text',
        'input_attrs' => array(
            'placeholder' => '404',
        ),
    ) );

    $wpc->add_setting( 'ei_custom_string_pages', array(
        'sanitize_callback' => false,
    ) );
    $wpc->add_control( 'ei_custom_string_pages_control', array(
        'label' => 'Pages',
        'description' => 'Halaman',
        'section' => 'ei_custom_string',
        'settings' => 'ei_custom_string_pages',
        'type' => 'text',
        'input_attrs' => array(
            'placeholder' => 'Pages',
        ),
    ) );

    $wpc->add_setting( 'ei_custom_string_show_all', array(
        'sanitize_callback' => false,
    ) );
    $wpc->add_control( 'ei_custom_string_show_all_control', array(
        'label' => 'Show All',
        'description' => 'Tampilkan Semua',
        'section' => 'ei_custom_string',
        'settings' => 'ei_custom_string_show_all',
        'type' => 'text',
        'input_attrs' => array(
            'placeholder' => 'Show All',
        ),
    ) );

    $wpc->add_setting( 'ei_custom_string_previously', array(
        'sanitize_callback' => false,
    ) );
    $wpc->add_control( 'ei_custom_string_previously_control', array(
        'label' => 'Previously',
        'description' => 'Sebelumnya',
        'section' => 'ei_custom_string',
        'settings' => 'ei_custom_string_previously',
        'type' => 'text',
        'input_attrs' => array(
            'placeholder' => 'Previously',
        ),
    ) );

    $wpc->add_setting( 'ei_custom_string_next', array(
        'sanitize_callback' => false,
    ) );
    $wpc->add_control( 'ei_custom_string_next_control', array(
        'label' => 'Next',
        'description' => 'Berikutnya',
        'section' => 'ei_custom_string',
        'settings' => 'ei_custom_string_next',
        'type' => 'text',
        'input_attrs' => array(
            'placeholder' => 'Next',
        ),
    ) );


    // Add script tags
    $wpc->add_section( 'section_add_script_tags', array(
        'title' => __( 'Adding Script', 'eipro-master' ),
        'panel' => 'panel_id',
    ) );

    $wpc->add_setting( 'setting_add_script_tags_head', array(
        'sanitize_callback' => false,
    ) );

    $wpc->add_setting( 'setting_add_script_tags_body', array(
        'sanitize_callback' => false,
    ) );

    $wpc->add_control( 'control_add_script_tags_head', array(
        'label' => __( 'Add Script (Head)', 'eipro-master' ),
        'description' => __( 'Add a special script in &lt;head&gt;...&lt;/head&gt;', 'eipro-master' ),
        'section' => 'section_add_script_tags',
        'settings' => 'setting_add_script_tags_head',
        'type' => 'textarea',
    ) );

    $wpc->add_control( 'control_add_script_tags_body', array(
        'label' => __( 'Add Script (Body)', 'eipro-master' ),
        'description' => __( 'Add a special script in &lt;body&gt;...&lt;/body&gt;', 'eipro-master' ),
        'section' => 'section_add_script_tags',
        'settings' => 'setting_add_script_tags_body',
        'type' => 'textarea',
    ) );


    // Optimization
    $wpc->add_section( 'section_optimization', array(
        'title' => __( 'Optimization', 'eipro-master' ),
        'panel' => 'panel_id',
    ) );

    $wpc->add_setting( 'setting_minify_css_js', array(
        'default' => false,
    ) );

    $wpc->add_control( 'control_minify_css_js', array(
        'label' => __( 'Minify (CSS and Javascript)', 'eipro-master' ),
        'description' => __( 'This feature will remove unnecessary lines and spaces in css and javascript code, so websites can load faster.', 'eipro-master' ),
        'section' => 'section_optimization',
        'settings' => 'setting_minify_css_js',
        'type' => 'checkbox',
    ) );

    // Options
    $wpc->add_section( 'section_options', array(
        'title' => __( 'Options', 'eipro-master' ),
        'panel' => 'panel_id',
    ) );

    // Enable (Dark Mode)
    $wpc->add_setting( 'enable_darkmode', array(
        'default' => false,
    ) );
    $wpc->add_control( 'enable_darkmode_con', array(
        'label' => __( 'Enable Dark Mode', 'eipro-master' ),
        'section' => 'section_options',
        'settings' => 'enable_darkmode',
        'type' => 'checkbox',
    ) );

    // Image Zoom Effect
    $wpc->add_setting( 'set_imgzoomeffect', array(
        'default' => false,
    ) );
    $wpc->add_control( 'con_imgzoomeffect', array(
        'label' => __( 'Enable Image Zoom Effect in single post', 'eipro-master' ),
        'section' => 'section_options',
        'settings' => 'set_imgzoomeffect',
        'type' => 'checkbox',
    ) );

    // Hide Featured Image in single post
    $wpc->add_setting( 'set_hide_f_image_in_single_post', array(
        'default' => false,
    ) );
    $wpc->add_control( 'con_hide_f_image_in_single_post', array(
        'label' => __( 'Hide Featured Image in single post', 'eipro-master' ),
        'section' => 'section_options',
        'settings' => 'set_hide_f_image_in_single_post',
        'type' => 'checkbox',
    ) );

    // Hide Category in post
    $wpc->add_setting( 'set_hide_cat_in_post', array(
        'default' => false,
    ) );
    $wpc->add_control( 'con_hide_cat_in_post', array(
        'label' => __( 'Hide Category in post', 'eipro-master' ),
        'section' => 'section_options',
        'settings' => 'set_hide_cat_in_post',
        'type' => 'checkbox',
    ) );

    // Hide Breadcrumbs
    $wpc->add_setting( 'set_hide_breadcrumbs', array(
        'default' => false,
    ) );
    $wpc->add_control( 'con_hide_breadcrumbs', array(
        'label' => __( 'Hide Breadcrumbs', 'eipro-master' ),
        'section' => 'section_options',
        'settings' => 'set_hide_breadcrumbs',
        'type' => 'checkbox',
    ) );

    // Hide entry-meta
    $wpc->add_setting( 'set_hide_entry_meta', array(
        'default' => false,
    ) );
    $wpc->add_control( 'con_hide_entry_meta', array(
        'label' => __( 'Hide entry-meta', 'eipro-master' ),
        'section' => 'section_options',
        'settings' => 'set_hide_entry_meta',
        'type' => 'checkbox',
    ) );

    // Hide post excerpt
    $wpc->add_setting( 'set_hide_post_excerpt', array(
        'default' => false,
    ) );
    $wpc->add_control( 'con_hide_post_excerpt', array(
        'label' => __( 'Hide Post Excerpt', 'eipro-master' ),
        'section' => 'section_options',
        'settings' => 'set_hide_post_excerpt',
        'type' => 'checkbox',
    ) );

    // Hide Author Name
    $wpc->add_setting( 'set_hide_author_name', array(
        'default' => false,
    ) );
    $wpc->add_control( 'con_hide_author_name', array(
        'label' => __( 'Hide Author Name', 'eipro-master' ),
        'section' => 'section_options',
        'settings' => 'set_hide_author_name',
        'type' => 'checkbox',
    ) );

    // Hide Author Box
    $wpc->add_setting( 'set_hide_author_box', array(
        'default' => false,
    ) );
    $wpc->add_control( 'con_hide_author_box', array(
        'label' => __( 'Hide Author Box', 'eipro-master' ),
        'section' => 'section_options',
        'settings' => 'set_hide_author_box',
        'type' => 'checkbox',
    ) );

    // Hide Search Form
    $wpc->add_setting( 'set_hide_search_form', array(
        'default' => false,
    ) );
    $wpc->add_control( 'con_hide_search_form', array(
        'label' => __( 'Hide Search Form', 'eipro-master' ),
        'section' => 'section_options',
        'settings' => 'set_hide_search_form',
        'type' => 'checkbox',
    ) );

    // Footer
    $wpc->add_section( 'c_footer' , array(
        'title'    => __( 'Footer', 'eipro-master' ),
        'panel'    => 'panel_id'
    ) );

    $wpc->add_setting( 'c_hide_footer', array(
        'default' => false,
    ) );
    $wpc->add_control( 'c_hide_footer_con', array(
        'label' => __( 'Hide Footer', 'eipro-master' ),
        'section' => 'c_footer',
        'settings' => 'c_hide_footer',
        'type' => 'checkbox',
    ) );

    // Label Column 1
    $wpc->add_setting( 'f_lbl_col_1', array(
        'sanitize_callback' => false,
    ));
    $wpc->add_control( 'f_lbl_col_1', array(
        'label' => __( 'Column 1', 'eipro-master' ),
        'section' => 'c_footer',
        'settings' => 'f_lbl_col_1',
        'type' => 'text',
    ));

    // Hide Menu - Column 1
    $wpc->add_setting( 'f_hide_menu', array(
        'default' => false,
    ) );
    $wpc->add_control( 'f_hide_menu_con', array(
        'label' => __( 'Hide Menu', 'eipro-master' ),
        'section' => 'c_footer',
        'settings' => 'f_hide_menu',
        'type' => 'checkbox',
    ) );

    // Add Script - Column 1
    $wpc->add_setting( 'f_add_script_col_1', array(
        'sanitize_callback' => false,
    ) );
    $wpc->add_control( 'control_f_add_script_col_1', array(
        'label' => __( 'Add Script', 'eipro-master' ),
        'section' => 'c_footer',
        'settings' => 'f_add_script_col_1',
        'type' => 'textarea',
    ) );

    // Label Column 2
    $wpc->add_setting( 'f_lbl_col_2', array(
        'sanitize_callback' => false,
    ));
    $wpc->add_control( 'f_lbl_col_2', array(
        'label' => __( 'Column 2', 'eipro-master' ),
        'section' => 'c_footer',
        'settings' => 'f_lbl_col_2',
        'type' => 'text',
    ));

    // Hide Copyright - Column 2
    $wpc->add_setting( 'f_hide_copyright', array(
        'default' => false,
    ) );
    $wpc->add_control( 'f_hide_copyright_con', array(
        'label' => __( 'Hide Copyright', 'eipro-master' ),
        'section' => 'c_footer',
        'settings' => 'f_hide_copyright',
        'type' => 'checkbox',
    ) );

    // Custom Text (Copyright) - Column 2
    $wpc->add_setting( 'custom_txt_copyright', array(
        'sanitize_callback' => false,
    ) );
    $wpc->add_control( 'custom_txt_copyright_con', array(
        'label' => __( 'Custom Text (Copyright)', 'eipro-master' ),
        'section' => 'c_footer',
        'settings' => 'custom_txt_copyright',
        'type' => 'text',
    ) );

    // Add Script - Column 2
    $wpc->add_setting( 'f_add_script_col_2', array(
        'sanitize_callback' => false,
    ) );
    $wpc->add_control( 'control_f_add_script_col_2', array(
        'label' => __( 'Add Script', 'eipro-master' ),
        'section' => 'c_footer',
        'settings' => 'f_add_script_col_2',
        'type' => 'textarea',
    ) );

}

function ei_auto_inline_related_post_set($control) {
    return $control->manager->get_setting('ei_insert_inline_related_post')->value() == 'auto' ? true : false;
}
function ei_custom_inline_related_post_set($control) {
    return $control->manager->get_setting('ei_insert_inline_related_post')->value() == 'custom' ? true : false;
}

// Display Count Views Post
function gt_get_post_view() {
    $count = get_post_meta( get_the_ID(), 'post_views_count', true );
    return "$count";
    // return "$count Views";
}
function gt_set_post_view() {
    $key = 'post_views_count';
    $post_id = get_the_ID();
    $count = (int) get_post_meta( $post_id, $key, true );
    $count++;
    update_post_meta( $post_id, $key, $count );
}
function gt_posts_column_views( $columns ) {
    $columns['post_views'] = 'Views';
    return $columns;
}
function gt_posts_custom_column_views( $column ) {
    if ( $column === 'post_views') {
        echo gt_get_post_view();
    }
}
add_filter( 'manage_posts_columns', 'gt_posts_column_views' );
add_action( 'manage_posts_custom_column', 'gt_posts_custom_column_views' );
// Display Count Views Post

// Search Post
add_action('pre_get_posts', 'search_post', 1000);
function search_post($query) {

    if($query->is_search()) {
        // category terms search.
        if (isset($_GET['category']) && !empty($_GET['category'])) {
            $query->set('tax_query', array(array(
                'taxonomy' => 'category',
                'field' => 'slug',
                'terms' => array($_GET['category']) )
            ));
        }
    }
    return $query;
}

// Admin Logo
add_action( 'login_enqueue_scripts', 'login_logo' );
function login_logo() { 
    $custom_logo_id = get_theme_mod( 'custom_logo' );
    $logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
    $logosize = get_theme_mod('logosize');
    if ($logo):
?> 
<style type="text/css">
    
    /* Login */
    body.login div#login h1 a {
        background-image: url(<?= $logo[0]; ?>) !important;
        background-size: calc(<?php if ($logosize){echo $logosize;}else{echo "150px";} ?> / 2) !important;
    background-position: center bottom !important;
        width: calc(<?php if ($logosize){echo $logosize;}else{echo "150px";} ?> / 2) !important;
        height: calc(<?php if ($logosize){echo $logosize;}else{echo "150px";} ?> / 2) !important;
        pointer-events: none;
    }

</style>
<?php endif; }

add_action('customize_controls_print_styles', 'customize_theme'); 
function customize_theme() { ?> <style type="text/css"> body #customize-control-infinite_scroll_set_con>span.customize-control-title, body #customize-control-layout_set_con>span.customize-control-title, body #customize-control-sidebar_set_con>span.customize-control-title { margin-bottom: 10px; } body #customize-control-logosize>label.customize-control-title, body #customize-control-logomobile_size>label.customize-control-title { margin-bottom: -10px !important; } body #customize-control-logomobile_control { margin-top: 30px !important; } body #customize-control-shortname_control, body #customize-control-f_lbl_col_1, body #customize-control-f_lbl_col_2 { margin-top: 10px; padding-top: 20px; border-top: 1px solid #8c8f94; } body #customize-control-lbl_cta_btn, body #customize-control-f_lbl_col_1, body #customize-control-f_lbl_col_2 { margin-top: 15px !important; margin-bottom: 3px !important; } body #customize-control-blogname { margin-top: 30px; } body #customize-control-control_toc_lbl { margin-top: -30px; } body input#_customize-input-control_toc_lbl, body label[for="_customize-input-control_toc_lbl"], #_customize-input-custom_label_share_btn_con, #_customize-input-lbl_cta_btn, #_customize-input-f_lbl_col_1, #_customize-input-f_lbl_col_2, #_customize-input-custom_label_font_mobile_con, #customize-control-copy_social_share_button_con { display: none; } #sub-accordion-section-c_font_single_post>li:first-child { width: 100% !important; clear: both !important; } #sub-accordion-section-c_font_single_post>li { width: 48% !important; clear: none !important; } #customize-control-body_lineheight_single_post_con, #customize-control-h1_lineheight_single_post_con, #customize-control-h2_lineheight_single_post_con, #customize-control-h3_lineheight_single_post_con, #customize-control-h4_lineheight_single_post_con, #customize-control-h5_lineheight_single_post_con, #customize-control-h6_lineheight_single_post_con, #customize-control-m_body_lineheight_single_post_con, #customize-control-m_h1_lineheight_single_post_con, #customize-control-m_h2_lineheight_single_post_con, #customize-control-m_h3_lineheight_single_post_con, #customize-control-m_h4_lineheight_single_post_con, #customize-control-m_h5_lineheight_single_post_con, #customize-control-m_h6_lineheight_single_post_con { float: right !important; } label[for="_customize-input-custom_label_font_mobile_con"], label[for="_customize-input-custom_label_share_btn_con"], label[for="_customize-input-f_lbl_col_1"], label[for="_customize-input-f_lbl_col_2"], #customize-control-layout_set_con>.customize-control-title { font-size: 16px; font-weight: 700; } body li#customize-control-custom_label_font_mobile_con { width: 100% !important; margin: 30px 0 20px !important; } [for="_customize-input-ei_custom_string_error404_control"], [for="_customize-input-ei_custom_string_input_comment_cookies_consent_control"], [for="_customize-input-ei_custom_string_search_no_results_control"] { line-height: normal; margin-top: 2px; margin-bottom: 8px; } </style> <?php } if(!defined('ABSPATH')){exit;} function enqueue_admin_style_sheet(){ echo '<style type="text/css">.toplevel_page_eipro-master #setting-error-tgmpa{display:none;}</style>'; } add_action('admin_print_styles','enqueue_admin_style_sheet'); function ei_disbl_ntfs($value){ global $eionup; if (!$eionup && isset($value) && is_object($value)) { unset($value->response[get_option('template')]); unset($value->response[get_option('stylesheet')]); } return $value; } add_filter('site_transient_update_themes', 'ei_disbl_ntfs'); function ei_cpntfs($ei_transc){ global $eionup; if (function_exists('get_plugins')) { $ei_csbl = array('eipro-addon'); $ei_inspc = get_plugins(); if ($ei_inspc) { foreach ($ei_inspc as $ei_insc_path => $ei_insc_info) { $ei_insc_slug = dirname($ei_insc_path); if (in_array($ei_insc_slug, $ei_csbl)) { if (!$eionup && isset($ei_transc->response[$ei_insc_path])) { unset($ei_transc->response[$ei_insc_path]); } } } } } return $ei_transc; } add_filter('site_transient_update_plugins', 'ei_cpntfs'); add_action('admin_print_styles','customize_admin_style'); function customize_admin_style(){?> <style type="text/css"> .relation-wrap{width:535px;text-align:center;border-radius:20px;background-color:#ffffff;margin:50px auto!important;padding:30px;box-shadow:0px 0px 19px 5px rgb(132 132 133 / 5%);} .relation-wrap h2{font-size:20px!important;font-weight:bold!important;margin:0!important;padding:9px 0 35px!important;line-height:1.3!important;} .relation-wrap h2>span{color:#00a32a!important;} .relation-wrap h2>span.inactive{color:#ff3733!important;} .relation-wrap .eipro-field-label>label,.relation-wrap input[name="purchase_code"]{font-weight:bold;color:#3c434a;} .relation-wrap input[name="purchase_code"],.relation-wrap input[name="purchase_code"]:focus,.relation-wrap input[name="purchase_code"]:active,.relation-wrap input[type="submit"],.relation-wrap input[type="submit"]:focus{width:100%;background-color:#ffffff;border-color:#3454CF!important;border-radius:8px;padding:4px 15px 7px;margin-top:20px;margin-bottom:5px;text-align:center;outline:none;box-shadow:none;} .relation-wrap .notice-info.ei-lbl { border: 0 !important; margin: -33px 0 15px !important; outline: none !important; box-shadow: none !important; } .relation-wrap input[name="purchase_code"]::placeholder{color:#cccccc!important;opacity:1;font-weight:500;} .relation-wrap input[name="purchase_code"]:-ms-input-placeholder{color:#cccccc!important;font-weight:500;} .relation-wrap input[name="purchase_code"]::-ms-input-placeholder{color:#cccccc!important;font-weight:500;} .relation-wrap input[type="submit"]{width:100%;background-color:#3454CF!important;font-weight:normal;margin-top:-8px!important;margin-bottom:10px!important;} .relation-wrap p.description{font-size:11px;font-weight:600;color:#8c8f94;} .relation-wrap p.description a,.relation-wrap p.description a:focus{font-weight:bold;color:#3454CF;outline:none;box-shadow:none;} .toplevel_page_eipro-master .notice.notice-error,.toplevel_page_eipro-master .notice.notice-success{color:#ff3733;border:0!important;box-shadow:none;margin:-33px 0 15px!important;} .toplevel_page_eipro-master .notice.notice-success{color:#00a32a!important;} .toplevel_page_eipro-master .wp-mail-smtp-review-notice,.toplevel_page_eipro-master .e-notice--dismissible{display:none!important;} .relation-wrap .ei-info{text-align: left;color: #664d03;background-color: #fff3cd;border-color: #ffecb5;border-radius: 8px;padding: 16px 20px;margin-top: 50px;}.relation-wrap .ei-info>strong{font-weight: bold;} .relation-wrap .ei-info ul{list-style: none;padding: 0;margin-top: 14px;margin-bottom: 0;counter-reset: post-counter;} .relation-wrap .ei-info ul li {position: relative;padding-left: 45px;padding-bottom: 20px;margin-bottom: 0;} .relation-wrap .ei-info ul li:before {content: '';position: absolute;left: 14px;width: 1px;height: 100%;background: rgb(102 77 3 / 20%);} .relation-wrap .ei-info ul li:last-child {padding-bottom: 13px;} .relation-wrap .ei-info ul li:last-child:before {display: none;} .relation-wrap .ei-info ul li span:before {position: absolute;width: 25px;height: 25px;font-size: 14px;line-height: 23px;border: 2px solid #fff;border-radius: 100%;font-weight: 600;color: #ffffff;background-color: #d63638;text-align: center;left: 0;counter-increment: post-counter;content: counter(post-counter);box-shadow: 0 3px 8px -1px rgb(133 132 132 / 63%);} @media only screen and (max-width: 1024px) { body .relation-wrap { width: 70% !important; margin: 20px 10px !important; border-radius: 8px !important; } .relation-wrap .ei-info ul li br { display: none; } .relation-wrap .ei-info ul li span:before { line-height: 25px; } } </style> <?php }