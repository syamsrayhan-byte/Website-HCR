( function ( $ ) {
    wp.customize.bind( 'ready', function() {

        function hideShowColorControls() {
            // array for our id titles
            var featuredSetIds = [
            'label_container_news',
            'set_container_width_news',
            'label_trending_news',
            'enable_trending_news',
            'title_trending_news',
            'number_post_trending_news',
            'trending_time_period_news',
            'label_featured_post_1_news',
            'enable_featured_post_1',
            'label_featured_post_2_news',
            'enable_featured_post_2',
            'title_weekly_top_news',
            'number_post_weekly_top_news',
            'time_period_weekly_top_news',
            'label_recent_posts_by_category',
            'hide_recent_posts_by_category',
            'number_recent_post_by_cat',
            'include_cat_id',
            'label_options_news',
            'hide_top_bar',
            'hide_p_time_ago',
            'hide_p_date',
            'hide_comment_count',
            'hide_prefooter'
            ];
            var featuredAttrId = '#customize-control-control_label_container_news, #customize-control-container_width_news_con, #customize-control-control_label_trending_news, #customize-control-control_enable_trending_news, #customize-control-control_title_trending_news, #customize-control-control_trending_time_period_news, #customize-control-number_post_trending_news_con, #customize-control-control_label_featured_post_1_news, #customize-control-control_enable_featured_post_1, #customize-control-control_label_featured_post_2_news, #customize-control-control_enable_featured_post_2, #customize-control-control_title_weekly_top_news, #customize-control-number_post_weekly_top_news_con, #customize-control-control_time_period_weekly_top_news, #customize-control-control_label_recent_posts_by_category, #customize-control-control_hide_recent_posts_by_category, #customize-control-number_recent_post_by_cat_con, #customize-control-include_cat_id_control, #customize-control-control_label_options_news, #customize-control-control_hide_top_bar, #customize-control-control_hide_p_time_ago, #customize-control-control_hide_p_date, #customize-control-control_hide_comment_count, #customize-control-control_hide_prefooter';

            if ( wp.customize.instance( 'layout_set' ).get() === 'lnews' ) {
                $.each( featuredSetIds, function ( i, value ) {    
                    $( '#customize-control-' + value ).show();
                    $( '#customize-control-control-' + value ).show();
                    $( featuredAttrId ).show();
                } );
            } else {
                $.each( featuredSetIds, function ( i, value ) { 
                    $( '#customize-control-' + value ).hide();
                    $( '#customize-control-control-' + value ).hide();
                    $( featuredAttrId ).hide();
                    //console.log( '#customize-control-' + value );
                } );
            }


            var businessSetIds = [
            'label_options_business',
            'hide_top_bar_business',
            'top_bar_business',
            'url_top_bar_business',
            'label_chat_wa',
            'hide_chat_wa',
            'phone_number_wa',
            'message_wa',
            'chat_wa_tooltip',
            'set_delay_chat_wa',
            'placement_chat_wa',
            'label_order_wa',
            'message_order_wa',
            'label_back_to_top',
            'hide_back_to_top'
            ];
            var businessAttrId = '#customize-control-control_label_options_business, #customize-control-control_hide_top_bar_business, #customize-control-control_top_bar_business, #customize-control-control_url_top_bar_business, #customize-control-control_label_chat_wa, #customize-control-control_hide_chat_wa, #customize-control-phone_number_wa_control, #customize-control-message_wa_control, #customize-control-chat_wa_tooltip_control, #customize-control-delay_chat_wa_con, #customize-control-placement_chat_wa_con, #customize-control-control_label_order_wa, #customize-control-message_order_wa_control, #customize-control-control_label_back_to_top, #customize-control-control_hide_back_to_top';

            if ( wp.customize.instance( 'layout_set' ).get() === 'lbusiness' ) {
                $.each( businessSetIds, function ( i, value ) {    
                    $( '#customize-control-' + value ).show();
                    $( '#customize-control-control-' + value ).show();
                    $( businessAttrId ).show();
                } );
            } else {
                $.each( businessSetIds, function ( i, value ) { 
                    $( '#customize-control-' + value ).hide();
                    $( '#customize-control-control-' + value ).hide();
                    $( businessAttrId ).hide();
                    //console.log( '#customize-control-' + value );
                } );
            }
            
            return hideShowColorControls;

        }

        // Call this function on page load
        hideShowColorControls();

        $( '#customize-control-layout_set_con' ).on( 'change', hideShowColorControls );
        
    } );
} ) (jQuery);
