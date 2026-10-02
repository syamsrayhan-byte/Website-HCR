<?php
add_action( 'customize_register', 'customize_register_init_news' );
function customize_register_init_news( $wpc ){

    // Label Container
    $wpc->add_setting( 'label_container_news', array(
        'sanitize_callback' => false,
    ) );
    $wpc->add_control( 'control_label_container_news', array(
        'label' => __( 'Container', 'eipro-master' ),
        'section' => 'section_layout',
        'settings' => 'label_container_news',
        'type' => 'text',
    ) );

    // Container Width - News
    $wpc->add_setting( 'set_container_width_news', array(
        'sanitize_callback' => false,
    ) );
    $wpc->add_control( 'container_width_news_con', array(
        'label' => __( 'Width', 'eipro-master' ),
        'description' => __( 'Default: 970 (px)', 'eipro-master' ),
        'section' => 'section_layout',
        'settings' => 'set_container_width_news',
        'type' => 'number',
        'input_attrs' => array(
            'placeholder' => "970",
        ),
    ) );

    // Label Trending
    $wpc->add_setting( 'label_trending_news', array(
        'sanitize_callback' => false,
    ) );
    $wpc->add_control( 'control_label_trending_news', array(
        'label' => __( 'Trending', 'eipro-master' ),
        'section' => 'section_layout',
        'settings' => 'label_trending_news',
        'type' => 'text',
    ) );

    // Enable Trending
    $wpc->add_setting( 'enable_trending_news', array(
        'default' => false,
    ) );
    $wpc->add_control( 'control_enable_trending_news', array(
        'label' => __( 'Enable', 'eipro-master' ),
        'section' => 'section_layout',
        'settings' => 'enable_trending_news',
        'type' => 'checkbox',
    ) );

    // Title Trending Now
    $wpc->add_setting( 'title_trending_news', array(
        'sanitize_callback' => false,
    ) );
    $wpc->add_control( 'control_title_trending_news', array(
        'label' => __( 'Title', 'eipro-master' ),
        'section' => 'section_layout',
        'settings' => 'title_trending_news',
        'type' => 'text',
        'input_attrs' => array(
            'placeholder' => "Trending :",
        ),
    ) );

    // Number of posts to show
    $wpc->add_setting( 'number_post_trending_news', array(
        'sanitize_callback' => false,
    ) );
    $wpc->add_control( 'number_post_trending_news_con', array(
        'label' => __( 'Number of posts to show', 'eipro-master' ),
        'description' => __( 'Example: 5', 'eipro-master' ),
        'section' => 'section_layout',
        'settings' => 'number_post_trending_news',
        'type' => 'number'
    ) );

    // Time Period
    $wpc->add_setting( 'trending_time_period_news', array(
        'default' => 'all_time',
    ) );
    $wpc->add_control( 'control_trending_time_period_news', array(
        'label' => __( 'Time Period', 'eipro-master' ),
        'section' => 'section_layout',
        'settings' => 'trending_time_period_news',
        'type' => 'select',
        'choices' => array(
            'all_time' => __( 'All Time', 'eipro-master' ),
            '1_day' => __( '1 Day', 'eipro-master' ),
            '1_week' => __( '1 Week', 'eipro-master' ),
            '1_month' => __( '1 Month', 'eipro-master' ),
            '1_year' => __( '1 Year', 'eipro-master' ),
        ),
    ) );

    // Label Featured Post 1
    $wpc->add_setting( 'label_featured_post_1_news', array(
        'sanitize_callback' => false,
    ) );
    $wpc->add_control( 'control_label_featured_post_1_news', array(
        'label' => __( 'Featured Post', 'eipro-master' ),
        'section' => 'section_layout',
        'settings' => 'label_featured_post_1_news',
        'type' => 'text',
    ) );

    // Enable Featured Post 1
    $wpc->add_setting( 'enable_featured_post_1', array(
        'default' => false,
    ) );
    $wpc->add_control( 'control_enable_featured_post_1', array(
        'label' => __( 'Enable', 'eipro-master' ),
        'section' => 'section_layout',
        'settings' => 'enable_featured_post_1',
        'type' => 'checkbox',
    ) );

    // Label Featured Post 2
    $wpc->add_setting( 'label_featured_post_2_news', array(
        'sanitize_callback' => false,
    ) );
    $wpc->add_control( 'control_label_featured_post_2_news', array(
        'label' => __( 'Weekly Top News', 'eipro-master' ),
        'section' => 'section_layout',
        'settings' => 'label_featured_post_2_news',
        'type' => 'text',
    ) );

    // Enable Featured Post 2
    $wpc->add_setting( 'enable_featured_post_2', array(
        'default' => false,
    ) );
    $wpc->add_control( 'control_enable_featured_post_2', array(
        'label' => __( 'Enable', 'eipro-master' ),
        'section' => 'section_layout',
        'settings' => 'enable_featured_post_2',
        'type' => 'checkbox',
    ) );

    // Title Weekly Top News
    $wpc->add_setting( 'title_weekly_top_news', array(
        'sanitize_callback' => false,
    ) );
    $wpc->add_control( 'control_title_weekly_top_news', array(
        'label' => __( 'Title', 'eipro-master' ),
        'section' => 'section_layout',
        'settings' => 'title_weekly_top_news',
        'type' => 'text',
        'input_attrs' => array(
            'placeholder' => "Weekly Top News",
        ),
    ) );

    // Number of posts to show
    $wpc->add_setting( 'number_post_weekly_top_news', array(
        'sanitize_callback' => false,
    ) );
    $wpc->add_control( 'number_post_weekly_top_news_con', array(
        'label' => __( 'Number of posts to show', 'eipro-master' ),
        'description' => __( 'Example: 5', 'eipro-master' ),
        'section' => 'section_layout',
        'settings' => 'number_post_weekly_top_news',
        'type' => 'number'
    ) );

    // Time Period
    $wpc->add_setting( 'time_period_weekly_top_news', array(
        'default' => 'all_time',
    ) );
    $wpc->add_control( 'control_time_period_weekly_top_news', array(
        'label' => __( 'Time Period', 'eipro-master' ),
        'section' => 'section_layout',
        'settings' => 'time_period_weekly_top_news',
        'type' => 'select',
        'choices' => array(
            'all_time' => __( 'All Time', 'eipro-master' ),
            '1_day' => __( '1 Day', 'eipro-master' ),
            '1_week' => __( '1 Week', 'eipro-master' ),
            '1_month' => __( '1 Month', 'eipro-master' ),
            '1_year' => __( '1 Year', 'eipro-master' ),
        ),
    ) );

    // Label Recent Posts By Category
    $wpc->add_setting( 'label_recent_posts_by_category', array(
        'sanitize_callback' => false,
    ) );
    $wpc->add_control( 'control_label_recent_posts_by_category', array(
        'label' => __( 'Recent Posts By Category', 'eipro-master' ),
        'section' => 'section_layout',
        'settings' => 'label_recent_posts_by_category',
        'type' => 'text',
    ) );

    // Hide
    $wpc->add_setting( 'hide_recent_posts_by_category', array(
        'default' => false,
    ) );
    $wpc->add_control( 'control_hide_recent_posts_by_category', array(
        'label' => __( 'Hide', 'eipro-master' ),
        'section' => 'section_layout',
        'settings' => 'hide_recent_posts_by_category',
        'type' => 'checkbox',
    ) );

    // Number of posts to show
    $wpc->add_setting( 'number_recent_post_by_cat', array(
        'sanitize_callback' => false,
    ));
    $wpc->add_control( 'number_recent_post_by_cat_con', array(
        'label' => __( 'Number of posts to show', 'eipro-master' ),
        'section' => 'section_layout',
        'settings' => 'number_recent_post_by_cat',
        'type' => 'number',
    ) );

    // Include Category ID
    $wpc->add_setting( 'include_cat_id', array(
        'sanitize_callback' => false,
    ) );
    $wpc->add_control( 'include_cat_id_control', array(
        'label' => __( 'Include Category (ID)', 'eipro-master' ),
        'description' => __( 'Example: 1,2,3,4,5,6', 'eipro-master' ),
        'section' => 'section_layout',
        'settings' => 'include_cat_id',
        'type' => 'text',
    ) );

    // Label Options - News
    $wpc->add_setting( 'label_options_news', array(
        'sanitize_callback' => false,
    ) );
    $wpc->add_control( 'control_label_options_news', array(
        'label' => __( 'Options', 'eipro-master' ),
        'section' => 'section_layout',
        'settings' => 'label_options_news',
        'type' => 'text',
    ) );

    // Hide Top Bar
    $wpc->add_setting( 'hide_top_bar', array(
        'default' => false,
    ) );
    $wpc->add_control( 'control_hide_top_bar', array(
        'label' => __( 'Hide Top Bar', 'eipro-master' ),
        'section' => 'section_layout',
        'settings' => 'hide_top_bar',
        'type' => 'checkbox',
    ) );

    // Hide "time ago"
    $wpc->add_setting( 'hide_p_time_ago', array(
        'default' => false,
    ) );
    $wpc->add_control( 'control_hide_p_time_ago', array(
        'label' => __( 'Hide "time ago"', 'eipro-master' ),
        'section' => 'section_layout',
        'settings' => 'hide_p_time_ago',
        'type' => 'checkbox',
    ) );

    // Hide date
    $wpc->add_setting( 'hide_p_date', array(
        'default' => false,
    ) );
    $wpc->add_control( 'control_hide_p_date', array(
        'label' => __( 'Hide Date', 'eipro-master' ),
        'section' => 'section_layout',
        'settings' => 'hide_p_date',
        'type' => 'checkbox',
    ) );

    // Hide comment count
    $wpc->add_setting( 'hide_comment_count', array(
        'default' => false,
    ) );
    $wpc->add_control( 'control_hide_comment_count', array(
        'label' => __( 'Hide Comment Count', 'eipro-master' ),
        'section' => 'section_layout',
        'settings' => 'hide_comment_count',
        'type' => 'checkbox',
    ) );

    // Hide Prefooter
    $wpc->add_setting( 'hide_prefooter', array(
        'default' => false,
    ) );
    $wpc->add_control( 'control_hide_prefooter', array(
        'label' => __( 'Hide Prefooter', 'eipro-master' ),
        'section' => 'section_layout',
        'settings' => 'hide_prefooter',
        'type' => 'checkbox',
    ) );

}

function eipro_news_customizer_script() { 
    wp_enqueue_script( 'layout_set', get_template_directory_uri().'/inc/assets/js/customize-controls.js', array( 'jquery' ), time(), true );
}
add_action( 'customize_controls_enqueue_scripts', 'eipro_news_customizer_script' );

function wp_body_classes( $classes ) {
    $sidebar_set = get_theme_mod('sidebar_set');
    $layout_set = get_theme_mod('layout_set');

    if($layout_set == 'lnews') {
        if($sidebar_set == 'no_sidebar_from_entire_site' || $sidebar_set == 'no_sidebar_on_single_post'){
            $classes[] = 'eipro-news c-no-sidebar';
        } else {
            $classes[] = 'eipro-news';
        }
    }
     
    return $classes;
}
add_filter( 'body_class','wp_body_classes' );

// Customizer Style
add_action( 'customize_controls_print_styles', 'customize_news' );
function customize_news() { ?> 
<style type="text/css">
    
    #_customize-input-control_label_options_news, #_customize-input-control_label_recent_posts_by_category, #_customize-input-control_label_container_news, #_customize-input-control_label_trending_news, #_customize-input-control_label_featured_post_1_news, #_customize-input-control_label_featured_post_2_news {
        display: none !important;
    }
    #customize-control-control_label_container_news, #customize-control-control_label_trending_news {
        padding-top: 20px;
        margin-top: -3px;
        margin-bottom: 8px;
        border-top: 1px solid #9d9da0;
    }
    #customize-control-control_label_trending_news {
        margin-top: 18px;
    }
    #customize-control-control_label_featured_post_1_news, #customize-control-control_label_featured_post_2_news {
        margin-top: 18px;
        padding-top: 20px;
        margin-bottom: 8px;
        border-top: 1px solid #9d9da0;
    }
    #customize-control-control_label_options_news, #customize-control-control_label_recent_posts_by_category {
        margin-top: 20px;
        padding-top: 20px;
        border-top: 1px solid #9d9da0;
    }
    [for="_customize-input-control_enable_featured_post_1"], [for="_customize-input-control_enable_featured_post_2"] {
        font-weight: 600;
    }
    [for="_customize-input-control_label_options_news"], [for="_customize-input-control_label_recent_posts_by_category"], [for="_customize-input-control_label_container_news"], [for="_customize-input-control_label_trending_news"], [for="_customize-input-control_label_featured_post_1_news"], [for="_customize-input-control_label_featured_post_2_news"] {
        font-size: 16px;
        font-weight: 700;
    }

</style>
<?php }
