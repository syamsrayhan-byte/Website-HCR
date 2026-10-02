<?php
add_action( 'customize_register', 'customize_register_init_business' );
function customize_register_init_business( $wpc ){

    // Label Options - Business
    $wpc->add_setting( 'label_options_business', array(
        'sanitize_callback' => false,
    ) );
    $wpc->add_control( 'control_label_options_business', array(
        'label' => __( 'Top Bar', 'eipro-master' ),
        'section' => 'section_layout',
        'settings' => 'label_options_business',
        'type' => 'text',
    ) );

    // Top Bar
    $wpc->add_setting( 'hide_top_bar_business', array(
        'default' => false,
    ) );
    $wpc->add_control( 'control_hide_top_bar_business', array(
        'label' => __( 'Hide', 'eipro-master' ),
        'section' => 'section_layout',
        'settings' => 'hide_top_bar_business',
        'type' => 'checkbox',
    ) );

    $wpc->add_setting( 'top_bar_business', array(
        'sanitize_callback' => false,
    ) );
     $wpc->add_control( 'control_top_bar_business', array(
        'label' => __( 'Text', 'eipro-master' ),
        'section' => 'section_layout',
        'settings' => 'top_bar_business',
        'type' => 'textarea',
    ) );

    $wpc->add_setting( 'url_top_bar_business', array(
        'sanitize_callback' => false,
    ) );
    $wpc->add_control( 'control_url_top_bar_business', array(
        'label' => __( 'URL', 'eipro-master' ),
        'section' => 'section_layout',
        'settings' => 'url_top_bar_business',
        'type' => 'url',
    ) );

    // Label Chat
    $wpc->add_setting( 'label_chat_wa', array(
        'sanitize_callback' => false,
    ) );
    $wpc->add_control( 'control_label_chat_wa', array(
        'label' => __( 'Direct WhatsApp Chat', 'eipro-master' ),
        'section' => 'section_layout',
        'settings' => 'label_chat_wa',
        'type' => 'text',
    ) );

    $wpc->add_setting( 'hide_chat_wa', array(
        'default' => false,
    ) );
    $wpc->add_control( 'control_hide_chat_wa', array(
        'label' => __( 'Hide', 'eipro-master' ),
        'section' => 'section_layout',
        'settings' => 'hide_chat_wa',
        'type' => 'checkbox',
    ) );

    $wpc->add_setting( 'phone_number_wa', array(
        'sanitize_callback' => false,
    ) );
    $wpc->add_control( 'phone_number_wa_control', array(
        'label' => __( 'Phone Number', 'eipro-master' ),
        'section' => 'section_layout',
        'settings' => 'phone_number_wa',
        'type' => 'number',
        'input_attrs' => array(
            'placeholder' => '628194872xxxx',
        ),
    ) );

    $wpc->add_setting( 'message_wa', array(
        'sanitize_callback' => false,
    ) );
    $wpc->add_control( 'message_wa_control', array(
        'label' => __( 'Message', 'eipro-master' ),
        'description' => __( 'Optional: {title}, {url}', 'eipro-master' ),
        'section' => 'section_layout',
        'settings' => 'message_wa',
        'type' => 'textarea',
    ) );

    $wpc->add_setting( 'chat_wa_tooltip', array(
        'sanitize_callback' => false,
    ) );
    $wpc->add_control( 'chat_wa_tooltip_control', array(
        'label' => __( 'Tooltip', 'eipro-master' ),
        'section' => 'section_layout',
        'settings' => 'chat_wa_tooltip',
        'type' => 'text',
        'input_attrs' => array(
            'placeholder' => 'WhatsApp',
        ),
    ) );

    $wpc->add_setting( 'set_delay_chat_wa', array(
        'sanitize_callback' => false,
    ) );
    $wpc->add_control( 'delay_chat_wa_con', array(
        'label' => __( 'Delay', 'eipro-master' ),
        'description' => __( 'Example: 5 (seconds)', 'eipro-master' ),
        'section' => 'section_layout',
        'settings' => 'set_delay_chat_wa',
        'type' => 'number',
        'input_attrs' => array(
            'placeholder' => "0",
        ),
    ) );

    $wpc->add_setting( 'placement_chat_wa', array(
      'default' => 'chat_wa_entiresite',
    ) );

    $wpc->add_control( 'placement_chat_wa_con', array(
      'label' => __( 'Placement', 'eipro-master' ),
      'type' => 'radio',
      'section' => 'section_layout',
      'settings' => 'placement_chat_wa',
      'choices' => array(
        'chat_wa_entiresite' => __( 'Entire Site' ),
        'chat_wa_home' => __( 'Home' ),
        'chat_wa_singlepage' => __( 'Single Page' ),
      ),
    ) );

    // Label Order via WhatsApp
    $wpc->add_setting( 'label_order_wa', array(
        'sanitize_callback' => false,
    ) );
    $wpc->add_control( 'control_label_order_wa', array(
        'label' => __( 'Order via WhatsApp', 'eipro-master' ),
        'section' => 'section_layout',
        'settings' => 'label_order_wa',
        'type' => 'text',
    ) );

    $wpc->add_setting( 'message_order_wa', array(
        'sanitize_callback' => false,
    ) );
    $wpc->add_control( 'message_order_wa_control', array(
        'label' => __( 'Message', 'eipro-master' ),
        'description' => __( 'Optional: {sitename}, {title}, {url}, {package}, {price}', 'eipro-master' ),
        'section' => 'section_layout',
        'settings' => 'message_order_wa',
        'type' => 'textarea',
    ) );

    // Label Back-to-Top button
    $wpc->add_setting( 'label_back_to_top', array(
        'sanitize_callback' => false,
    ) );
    $wpc->add_control( 'control_label_back_to_top', array(
        'label' => __( 'Back-to-Top Button', 'eipro-master' ),
        'section' => 'section_layout',
        'settings' => 'label_back_to_top',
        'type' => 'text',
    ) );

    $wpc->add_setting( 'hide_back_to_top', array(
        'default' => false,
    ) );
    $wpc->add_control( 'control_hide_back_to_top', array(
        'label' => __( 'Hide', 'eipro-master' ),
        'section' => 'section_layout',
        'settings' => 'hide_back_to_top',
        'type' => 'checkbox',
    ) );

}
function wp_body_classes_b( $classes ) {
    $sidebar_set = get_theme_mod('sidebar_set');
    $layout_set = get_theme_mod('layout_set');

    if($layout_set == 'lbusiness') {
        if($sidebar_set == 'no_sidebar_from_entire_site' || $sidebar_set == 'no_sidebar_on_single_post'){
            $classes[] = 'eipro-business c-no-sidebar';
        } else {
            $classes[] = 'eipro-business';
        }
    }
     
    return $classes;
}
add_filter( 'body_class','wp_body_classes_b' );

// Customizer Style
add_action( 'customize_controls_print_styles', 'customize_business' );
function customize_business() { ?> 
<style type="text/css">
    
    #_customize-input-control_label_options_business, #_customize-input-control_label_chat_wa, #_customize-input-control_label_order_wa, #_customize-input-control_label_back_to_top {
        display: none !important;
    }
    #customize-control-control_label_options_business, #customize-control-control_label_chat_wa, #customize-control-control_label_order_wa, #customize-control-control_label_back_to_top {
        padding-top: 20px;
        border-top: 1px solid #9d9da0;
    }
    [for="_customize-input-control_label_options_business"], [for="_customize-input-control_label_chat_wa"], [for="_customize-input-control_label_order_wa"], [for="_customize-input-control_label_back_to_top"] {
        font-size: 16px;
        font-weight: 700;
    }
    #customize-control-control_label_chat_wa, #customize-control-control_label_order_wa, #customize-control-control_label_back_to_top {
        margin-top: 20px;
    }
    #customize-control-message_order_wa_control {
        margin-bottom: 5px;
    }
    #customize-control-placement_chat_wa_con>span.customize-control-title {
        padding-bottom: 10px;
    }
    #customize-control-placement_chat_wa_con {
        padding-bottom: 0;
        margin-bottom: 0;
    }

</style>
<?php }
