<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package eiPro_Master
 */

if ( ! function_exists( 'eipro_master_custom_logo' ) ) :
    /**
     * eipro_master custom logo.
     */
    function eipro_master_custom_logo() {
        $custom_logo_id = get_theme_mod( 'custom_logo' );
        $logo = wp_get_attachment_image_src( $custom_logo_id, 'full' );
        $logo_white = get_theme_mod('logo_white');
        $logosize = get_theme_mod('logosize');

        if ( has_custom_logo() ) :
            echo '<a href="' . esc_url( home_url( '/' ) ) . '" class="logo-black"><img src="' . esc_url( $logo[0] ) . '" alt="' . get_bloginfo( 'name' ) . '" style="width: calc(' . ($logosize=$logosize?:'150px') . ' / 2);height: auto;border-radius: 0;"></a>';

            if ($logo_white) :
                echo '<a href="' . esc_url( home_url( '/' ) ) . '" class="logo-white"><img src="' . esc_url( $logo_white ) . '" alt="' . get_bloginfo( 'name' ) . '" style="width: calc(' . ($logosize=$logosize?:'150px') . ' / 2);height: auto;border-radius: 0;"></a>';
            else :
                echo '<a href="' . esc_url( home_url( '/' ) ) . '" class="logo-white"><img src="' . esc_url( $logo[0] ) . '" alt="' . get_bloginfo( 'name' ) . '" style="width: calc(' . ($logosize=$logosize?:'150px') . ' / 2);height: auto;border-radius: 0;"></a>';
            endif;

        else :
            echo '<h1><a href="' . esc_url( home_url( '/' ) ) . '" rel="home">' . get_bloginfo( 'name' ) . '</a></h1>';
        endif;
    }
endif;

if ( ! function_exists( 'eipro_master_post_thumbnail' ) ) :
    /**
     * eipro_master post thumbnail.
     */
    function eipro_master_post_thumbnail() {
        $thumb_post = get_the_post_thumbnail_url( get_the_ID() );
        $img_blank = get_template_directory_uri() . '/assets/img/blank.jpg';
        if($thumb_post) { $url = $thumb_post; } else { $url = $img_blank; }

        echo '<a itemprop="url" href="' . get_permalink() . '"><img src="' . esc_url( $url ) . '" alt="' . esc_attr( get_the_title() ) . '" /></a>';
    }
endif;

if ( ! function_exists( 'eipro_master_reading_time' ) ) :
    /**
     * eipro_master reading time.
     */
    function eipro_master_reading_time() {
        $content = get_the_content();
        $word_count = str_word_count( strip_tags( $content ) );
        $readingtime = ceil($word_count / 200);
        if ($readingtime == 1) {
            $timer = (get_theme_mod('ei_custom_string_min_read') != '') ? get_theme_mod('ei_custom_string_min_read') : 'min read';
        } else {
            $timer = (get_theme_mod('ei_custom_string_min_read') != '') ? get_theme_mod('ei_custom_string_min_read') : 'min read';
        }
        $totalreadingtime = $readingtime . ' ' . $timer;
        echo $totalreadingtime;
    }
endif;

if ( ! function_exists( 'eipro_master_time_ago' ) ) :
    /**
     * eipro_master time ago.
     */
    function eipro_master_time_ago() {
        global $post;
        $date = $post->post_date;
        $time = get_post_time('G', true, $post);
        $ago_text = (get_theme_mod('ei_custom_string_ago') != '') ? get_theme_mod('ei_custom_string_ago') : 'ago';
        $display = sprintf('%s <span>'. $ago_text .'</span>', human_time_diff( $time ) );
        echo $display;
    }
endif;

if ( ! function_exists( 'eipro_master_comment_count' ) ) :
    /**
     * eipro_master comment count.
     */
    function eipro_master_comment_count() {
        $layout_set = get_theme_mod('layout_set');
        $wp_default_comment = get_theme_mod( 'enable_wp_default_comment' );
        $shortname = get_theme_mod('shortname');

        if($layout_set == 'lnews'){
            $comment_text = (get_theme_mod('ei_custom_string_comment') != '') ? get_theme_mod('ei_custom_string_comment') : 'Comment';
            $comments_text = (get_theme_mod('ei_custom_string_comments') != '') ? get_theme_mod('ei_custom_string_comments') : 'Comments';
            if($wp_default_comment == true){
                if (comments_open()) {
                    $comment_count = get_comments_number();
                    $comment_link = get_comments_link();
                    if ($comment_count == 0) {
                        echo '<a href="' . esc_url($comment_link) . '">0 ' . $comments_text . '</a>';
                    } elseif ($comment_count == 1) {
                        echo '<a href="' . esc_url($comment_link) . '">1 ' . $comment_text . '</a>';
                    } else {
                        $comment_message = sprintf('%s ' . $comments_text, number_format_i18n($comment_count));
                        echo '<a href="' . esc_url($comment_link) . '">' . $comment_message . '</a>';
                    }
                }
            } else {
                if($shortname){
                    $disqus_identifier = get_the_ID();
                        echo '<a href="'. get_permalink() .'#disqus_thread" data-disqus-url="'. get_permalink() .'">0 ' . $comments_text . '</a>';
                }
            }
        }
    }
endif;

if ( ! function_exists( 'eipro_ads_code' ) ) :
    /**
     * eipro_master advertisement code.
     */
    function eipro_ads_code( $ads ) {
        $top_ad = get_theme_mod( 'set_top_ad' );
        $middle_ad = get_theme_mod( 'set_middle_ad' );
        $sidebar_ad = get_theme_mod( 'set_sidebar_ad' );
        $bottom_ad = get_theme_mod( 'set_bottom_ad' );

        if ( $ads == "top_ad" ) {
            if ($top_ad) {
                echo '<div class="c-ads top_ad"> ' . do_shortcode($top_ad) . ' </div>';
            }
        } else if ( $ads == "home_news_top_ad" ) {
            if ($top_ad) {
                echo '<div class="c-ads top_ad container"> ' . do_shortcode($top_ad) . ' </div>';
            }
        } else if ( $ads == "middle_ad" ) {
            if ($middle_ad) {
                echo '<div class="c-ads middle_ad"> ' . do_shortcode($middle_ad) . ' </div>';
            }
        } else if ( $ads == "sidebar_ad" ) {
            if ($sidebar_ad) {
                echo '<div class="c-ads sidebar_ad"> ' . do_shortcode($sidebar_ad) . ' </div>';
            }
        } else if ( $ads == "bottom_ad" ) {
            if ($bottom_ad) {
                echo '<div class="c-ads container bottom_ad"> ' . do_shortcode($bottom_ad) . ' </div>';
            }
        }
    }
endif;

if ( ! function_exists( 'eipro_float_ads' ) ) :
    /**
     * eipro_master float ads.
     */
    function eipro_float_ads() {
        $enable_fload_ad = get_theme_mod('enable_fload_ad');
        $hide_close_btn_fload_ad = get_theme_mod('hide_close_btn_fload_ad');
        $set_fload_ad_left = get_theme_mod('set_fload_ad_left');
        $set_fload_ad_right = get_theme_mod('set_fload_ad_right');

        $layout_set = get_theme_mod('layout_set');
        if($layout_set == 'lnews') {
            if($enable_fload_ad == true){ ?>
                <div class="c-float-ads">

                    <?php if($set_fload_ad_left){ ?>
                    <div class="c-float-ad-left">
                        <?php if($hide_close_btn_fload_ad != true){ ?>
                        <span class="c-close">
                           <span><?= file_get_contents(get_template_directory() . "/assets/icon/close.svg"); ?></span>
                        </span>
                        <?php } ?>
                        <?= $set_fload_ad_left; ?>
                    </div>
                    <?php } ?>

                    <?php if($set_fload_ad_right){ ?>
                    <div class="c-float-ad-right">
                        <?php if($hide_close_btn_fload_ad != true){ ?>
                        <span class="c-close">
                           <span><?= file_get_contents(get_template_directory() . "/assets/icon/close.svg"); ?></span>
                        </span>
                        <?php } ?>
                        <?= $set_fload_ad_right; ?>
                    </div>
                    <?php } ?>

                </div>
            <?php
            }
        }
    }
endif;

if ( ! function_exists( 'eipro_post_tags' ) ) :
    /**
     * eipro_master post tags.
     */
    function eipro_post_tags() {
        $post_tags = get_the_tags();
        if ( !empty( $post_tags ) ) {
            echo '<div class="tag">';
            foreach ( $post_tags as $tags ) {
                echo '<a href="' . get_tag_link( $tags ) . '" class="btn-tag">' . $tags->name . '</a>';
            }
            echo '</div>';
        }
    }
endif;

if ( ! function_exists( 'float_chat_wa' ) ) :
    /**
     * eipro_master float chat wa.
     */
    function float_chat_wa() {
    $chat_wa_tooltip = get_theme_mod('chat_wa_tooltip');
    ?>
        <div class="chat-wa"<?php echo get_theme_mod('set_delay_chat_wa') ? ' style="display: none;"' : ''; ?>>
            <div class="direct-chat" style="cursor: pointer;">
                <svg aria-hidden="true" class="ico_d " width="39" height="39" viewBox="0 0 39 39" fill="none" xmlns="http://www.w3.org/2000/svg" style="transform: rotate(0deg);"><circle class="color-element" cx="19.4395" cy="19.4395" r="19.4395" fill="#49E670"></circle><path d="M12.9821 10.1115C12.7029 10.7767 11.5862 11.442 10.7486 11.575C10.1902 11.7081 9.35269 11.8411 6.84003 10.7767C3.48981 9.44628 1.39593 6.25317 1.25634 6.12012C1.11674 5.85403 2.13001e-06 4.39053 2.13001e-06 2.92702C2.13001e-06 1.46351 0.83755 0.665231 1.11673 0.399139C1.39592 0.133046 1.8147 1.01506e-06 2.23348 1.01506e-06C2.37307 1.01506e-06 2.51267 1.01506e-06 2.65226 1.01506e-06C2.93144 1.01506e-06 3.21063 -2.02219e-06 3.35022 0.532183C3.62941 1.19741 4.32736 2.66092 4.32736 2.79397C4.46696 2.92702 4.46696 3.19311 4.32736 3.32616C4.18777 3.59225 4.18777 3.59224 3.90858 3.85834C3.76899 3.99138 3.6294 4.12443 3.48981 4.39052C3.35022 4.52357 3.21063 4.78966 3.35022 5.05576C3.48981 5.32185 4.18777 6.38622 5.16491 7.18449C6.42125 8.24886 7.39839 8.51496 7.81717 8.78105C8.09636 8.91409 8.37554 8.9141 8.65472 8.648C8.93391 8.38191 9.21309 7.98277 9.49228 7.58363C9.77146 7.31754 10.0507 7.1845 10.3298 7.31754C10.609 7.45059 12.2841 8.11582 12.5633 8.38191C12.8425 8.51496 13.1217 8.648 13.1217 8.78105C13.1217 8.78105 13.1217 9.44628 12.9821 10.1115Z" transform="translate(12.9597 12.9597)" fill="#FAFAFA"></path><path d="M0.196998 23.295L0.131434 23.4862L0.323216 23.4223L5.52771 21.6875C7.4273 22.8471 9.47325 23.4274 11.6637 23.4274C18.134 23.4274 23.4274 18.134 23.4274 11.6637C23.4274 5.19344 18.134 -0.1 11.6637 -0.1C5.19344 -0.1 -0.1 5.19344 -0.1 11.6637C-0.1 13.9996 0.624492 16.3352 1.93021 18.2398L0.196998 23.295ZM5.87658 19.8847L5.84025 19.8665L5.80154 19.8788L2.78138 20.8398L3.73978 17.9646L3.75932 17.906L3.71562 17.8623L3.43104 17.5777C2.27704 15.8437 1.55796 13.8245 1.55796 11.6637C1.55796 6.03288 6.03288 1.55796 11.6637 1.55796C17.2945 1.55796 21.7695 6.03288 21.7695 11.6637C21.7695 17.2945 17.2945 21.7695 11.6637 21.7695C9.64222 21.7695 7.76778 21.1921 6.18227 20.039L6.17557 20.0342L6.16817 20.0305L5.87658 19.8847Z" transform="translate(7.7758 7.77582)" fill="white" stroke="white" stroke-width="0.2"></path></svg>
               <span class="label-mini">Chat WhatsApp</span>
            </div>
            <div class="chat-wa-tooltip"><div><?= $chat_wa_tooltip; ?></div></div>
        </div>
    <?php }
endif;

if ( ! function_exists( 'direct_whatsapp_chat' ) ) :
    /**
     * eipro_master direct whatsapp chat.
     */
    function direct_whatsapp_chat() {
        $set_delay = get_theme_mod('set_delay_chat_wa');
    ?>
        <script type="text/javascript">
            jQuery('.direct-chat').click(direct_wa);

            function direct_wa() {
              var phone_number = <?php echo json_encode(get_theme_mod('phone_number_wa')); ?>;
              var title = <?php echo json_encode(get_the_title()); ?>;
              var url = <?php echo json_encode(get_permalink()); ?>;
              var message_wa = <?php echo json_encode(get_theme_mod('message_wa')); ?>;
              var message = message_wa.replace('{title}', title).replace('{url}', url);
              
              var encoded_message = encodeURIComponent(message);
              var url_wa = 'https://web.whatsapp.com/send?phone=' + phone_number + '&text=' + encoded_message + '&pre-filled=true';
              
              if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
                url_wa = 'whatsapp://send/?phone=' + phone_number + '&text=' + encoded_message;
              }
              
              var w = 960,
                h = 540,
                left = Number((screen.width / 2) - (w / 2)),
                tops = Number((screen.height / 2) - (h / 2)),
                popupWindow = window.open(url_wa, '', 'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=yes, resizable=1, copyhistory=no, width=' + w + ', height=' + h + ', top=' + tops + ', left=' + left);
              
              popupWindow.focus();
              return false;
            }

            <?php if ($set_delay) { ?>
            window.setTimeout(function(){
                jQuery('.chat-wa').fadeIn();
            }, <?= $set_delay . '000'; ?>);
            <?php } ?>

        </script>
    <?php }
endif;

if ( ! function_exists( 'eipro_add_custom_script' ) ) :
    /**
     * eipro_master Add custom script to the head and body.
     */
    function eipro_add_custom_script( $loc ) {
        $add_script_tags_head = get_theme_mod( 'setting_add_script_tags_head' );
        $add_script_tags_body = get_theme_mod( 'setting_add_script_tags_body' );

        if ( $loc == "head" ) :
            echo $add_script_tags_head;
        elseif ( $loc == "body" ) :
            echo $add_script_tags_body;
        endif;
    }
endif;

if ( ! function_exists( 'wp_body_open' ) ) :
	/**
	 * Shim for sites older than 5.2.
	 *
	 * @link https://core.trac.wordpress.org/ticket/12563
	 */
	function wp_body_open() {
		do_action( 'wp_body_open' );
	}
endif;

/*
 * WordPress Breadcrumbs
 * author: Dimox
 * version: 2019.03.03
 * license: MIT
*/
function dimox_breadcrumbs() {

    /* === OPTIONS === */
    $text['home']     = (get_theme_mod('ei_custom_string_home') != '') ? get_theme_mod('ei_custom_string_home') : 'Home'; // text for the 'Home' link
    $text['category'] = __('Arsip Berdasarkan Kategori "%s"', 'eipro-master'); // text for a category page
    $text['search']   = __('Hasil Pencarian untuk Permintaan "%s"', 'eipro-master'); // text for a search results page
    $text['tag']      = __('Posting dengan Tag "%s"', 'eipro-master'); // text for a tag page
    $text['author']   = __('Artikel yang Diposting oleh %s', 'eipro-master'); // text for an author page
    $text['404']      = __('Eror 404', 'eipro-master'); // text for the 404 page
    $text['page']     = __('Halaman %s', 'eipro-master'); // text 'Page N'
    $text['cpage']    = __('Halaman Komentar %s', 'eipro-master'); // text 'Comment Page N'

    $wrap_before    = '<div class="breadcrumbs" itemscope itemtype="http://schema.org/BreadcrumbList">'; // the opening wrapper tag
    $wrap_after     = '</div><!-- .breadcrumbs -->'; // the closing wrapper tag
    $sep            = '<span class="breadcrumbs__separator"> › </span>'; // separator between crumbs
    $before         = '<span class="breadcrumbs__current">'; // tag before the current crumb
    $after          = '</span>'; // tag after the current crumb

    $show_on_home   = 0; // 1 - show breadcrumbs on the homepage, 0 - don't show
    $show_home_link = 1; // 1 - show the 'Home' link, 0 - don't show
    $show_current   = 1; // 1 - show current page title, 0 - don't show
    $show_last_sep  = 1; // 1 - show last separator, when current page title is not displayed, 0 - don't show
    /* === END OF OPTIONS === */

    global $post;
    $home_url       = home_url('/');
    $link           = '<span itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">';
    $link          .= '<a class="breadcrumbs__link" href="%1$s" itemprop="item"><span itemprop="name">%2$s</span></a>';
    $link          .= '<meta itemprop="position" content="%3$s" />';
    $link          .= '</span>';
    $parent_id      = ( $post ) ? $post->post_parent : '';
    $home_link      = sprintf( $link, $home_url, $text['home'], 1 );

    if ( is_home() || is_front_page() ) {

        if ( $show_on_home ) echo $wrap_before . $home_link . $wrap_after;

    } else {

        $position = 0;

        echo $wrap_before;

        if ( $show_home_link ) {
            $position += 1;
            echo $home_link;
        }

        if ( is_category() ) {
            $parents = get_ancestors( get_query_var('cat'), 'category' );
            foreach ( array_reverse( $parents ) as $cat ) {
                $position += 1;
                if ( $position > 1 ) echo $sep;
                echo sprintf( $link, get_category_link( $cat ), get_cat_name( $cat ), $position );
            }
            if ( get_query_var( 'paged' ) ) {
                $position += 1;
                $cat = get_query_var('cat');
                echo $sep . sprintf( $link, get_category_link( $cat ), get_cat_name( $cat ), $position );
                echo $sep . $before . sprintf( $text['page'], get_query_var( 'paged' ) ) . $after;
            } else {
                if ( $show_current ) {
                    if ( $position >= 1 ) echo $sep;
                    echo $before . sprintf( $text['category'], single_cat_title( '', false ) ) . $after;
                } elseif ( $show_last_sep ) echo $sep;
            }

        } elseif ( is_search() ) {
            if ( get_query_var( 'paged' ) ) {
                $position += 1;
                if ( $show_home_link ) echo $sep;
                echo sprintf( $link, $home_url . '?s=' . get_search_query(), sprintf( $text['search'], get_search_query() ), $position );
                echo $sep . $before . sprintf( $text['page'], get_query_var( 'paged' ) ) . $after;
            } else {
                if ( $show_current ) {
                    if ( $position >= 1 ) echo $sep;
                    echo $before . sprintf( $text['search'], get_search_query() ) . $after;
                } elseif ( $show_last_sep ) echo $sep;
            }

        } elseif ( is_year() ) {
            if ( $show_home_link && $show_current ) echo $sep;
            if ( $show_current ) echo $before . get_the_time('Y') . $after;
            elseif ( $show_home_link && $show_last_sep ) echo $sep;

        } elseif ( is_month() ) {
            if ( $show_home_link ) echo $sep;
            $position += 1;
            echo sprintf( $link, get_year_link( get_the_time('Y') ), get_the_time('Y'), $position );
            if ( $show_current ) echo $sep . $before . get_the_time('F') . $after;
            elseif ( $show_last_sep ) echo $sep;

        } elseif ( is_day() ) {
            if ( $show_home_link ) echo $sep;
            $position += 1;
            echo sprintf( $link, get_year_link( get_the_time('Y') ), get_the_time('Y'), $position ) . $sep;
            $position += 1;
            echo sprintf( $link, get_month_link( get_the_time('Y'), get_the_time('m') ), get_the_time('F'), $position );
            if ( $show_current ) echo $sep . $before . get_the_time('d') . $after;
            elseif ( $show_last_sep ) echo $sep;

        } elseif ( is_single() && ! is_attachment() ) {
            if ( get_post_type() != 'post' ) {
                $position += 1;
                $post_type = get_post_type_object( get_post_type() );
                if ( $position > 1 ) echo $sep;
                echo sprintf( $link, get_post_type_archive_link( $post_type->name ), $post_type->labels->name, $position );
                if ( $show_current ) echo $sep . $before . get_the_title() . $after;
                elseif ( $show_last_sep ) echo $sep;
            } else {
                $cats = get_the_category();
                $leaf_cat = null;

                foreach ( $cats as $c ) {
                    $is_child = true;
                    foreach ( $cats as $other ) {
                        if ( $c->term_id != $other->term_id && $c->term_id == $other->parent ) {
                            $is_child = false;
                            break;
                        }
                    }
                    if ( $is_child ) {
                        $leaf_cat = $c;
                        break;
                    }
                }

                if ( $leaf_cat ) {
                    $catID = $leaf_cat->term_id;
                } else {
                    $catID = $cats[0]->term_id;
                }

                $parents = get_ancestors( $catID, 'category' );
                $parents = array_reverse( $parents );
                $parents[] = $catID;
                foreach ( $parents as $cat ) {
                    $position += 1;
                    if ( $position > 1 ) echo $sep;
                    echo sprintf( $link, get_category_link( $cat ), get_cat_name( $cat ), $position );
                }
                if ( get_query_var( 'cpage' ) ) {
                    $position += 1;
                    echo $sep . sprintf( $link, get_permalink(), get_the_title(), $position );
                    echo $sep . $before . sprintf( $text['cpage'], get_query_var( 'cpage' ) ) . $after;
                } else {

                    $layout_set = get_theme_mod('layout_set');
                    if ($layout_set == 'lnews') {
                        //if ( $show_current ) echo $sep . $before . get_the_title() . $after;
                    } else {
                        if ( $show_current ) echo $sep . $before . get_the_title() . $after;
                        elseif ( $show_last_sep ) echo $sep;
                    }
                }
            }

        } elseif ( is_post_type_archive() ) {
            $post_type = get_post_type_object( get_post_type() );
            if ( get_query_var( 'paged' ) ) {
                $position += 1;
                if ( $position > 1 ) echo $sep;
                echo sprintf( $link, get_post_type_archive_link( $post_type->name ), $post_type->label, $position );
                echo $sep . $before . sprintf( $text['page'], get_query_var( 'paged' ) ) . $after;
            } else {
                if ( $show_home_link && $show_current ) echo $sep;
                if ( $show_current ) echo $before . $post_type->label . $after;
                elseif ( $show_home_link && $show_last_sep ) echo $sep;
            }

        } elseif ( is_attachment() ) {
            $parent = get_post( $parent_id );
            $cat = get_the_category( $parent->ID ); $catID = $cat[0]->cat_ID;
            $parents = get_ancestors( $catID, 'category' );
            $parents = array_reverse( $parents );
            $parents[] = $catID;
            foreach ( $parents as $cat ) {
                $position += 1;
                if ( $position > 1 ) echo $sep;
                echo sprintf( $link, get_category_link( $cat ), get_cat_name( $cat ), $position );
            }
            $position += 1;
            echo $sep . sprintf( $link, get_permalink( $parent ), $parent->post_title, $position );
            if ( $show_current ) echo $sep . $before . get_the_title() . $after;
            elseif ( $show_last_sep ) echo $sep;

        } elseif ( is_page() && ! $parent_id ) {
            if ( $show_home_link && $show_current ) echo $sep;
            if ( $show_current ) echo $before . get_the_title() . $after;
            elseif ( $show_home_link && $show_last_sep ) echo $sep;

        } elseif ( is_page() && $parent_id ) {
            $parents = get_post_ancestors( get_the_ID() );
            foreach ( array_reverse( $parents ) as $pageID ) {
                $position += 1;
                if ( $position > 1 ) echo $sep;
                echo sprintf( $link, get_page_link( $pageID ), get_the_title( $pageID ), $position );
            }
            if ( $show_current ) echo $sep . $before . get_the_title() . $after;
            elseif ( $show_last_sep ) echo $sep;

        } elseif ( is_tag() ) {
            if ( get_query_var( 'paged' ) ) {
                $position += 1;
                $tagID = get_query_var( 'tag_id' );
                echo $sep . sprintf( $link, get_tag_link( $tagID ), single_tag_title( '', false ), $position );
                echo $sep . $before . sprintf( $text['page'], get_query_var( 'paged' ) ) . $after;
            } else {
                if ( $show_home_link && $show_current ) echo $sep;
                if ( $show_current ) echo $before . sprintf( $text['tag'], single_tag_title( '', false ) ) . $after;
                elseif ( $show_home_link && $show_last_sep ) echo $sep;
            }

        } elseif ( is_author() ) {
            $author = get_userdata( get_query_var( 'author' ) );
            if ( get_query_var( 'paged' ) ) {
                $position += 1;
                echo $sep . sprintf( $link, get_author_posts_url( $author->ID ), sprintf( $text['author'], $author->display_name ), $position );
                echo $sep . $before . sprintf( $text['page'], get_query_var( 'paged' ) ) . $after;
            } else {
                if ( $show_home_link && $show_current ) echo $sep;
                if ( $show_current ) echo $before . sprintf( $text['author'], $author->display_name ) . $after;
                elseif ( $show_home_link && $show_last_sep ) echo $sep;
            }

        } elseif ( is_404() ) {
            if ( $show_home_link && $show_current ) echo $sep;
            if ( $show_current ) echo $before . $text['404'] . $after;
            elseif ( $show_last_sep ) echo $sep;

        } elseif ( has_post_format() && ! is_singular() ) {
            if ( $show_home_link && $show_current ) echo $sep;
            echo get_post_format_string( get_post_format() );
        }

        echo $wrap_after;

    }
} // end of dimox_breadcrumbs()
