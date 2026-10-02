<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package eiPro_Master
 */

$layout_set = get_theme_mod('layout_set');
$sidebar_set = get_theme_mod('sidebar_set');
if($layout_set == 'lnews'){
    if($sidebar_set == 'no_sidebar_from_entire_site'){
        $layout_class = '';
    }else{
        $layout_class = 'c-two-col';
    }
} else if($layout_set == 'lbusiness'){
    if($sidebar_set == 'no_sidebar_from_entire_site'){
        $layout_class = 'c-two-col c-no-sidebar';
    }else{
        $layout_class = 'c-two-col';
    }
} else {
    $layout_class = '';
}
?>

<?php //eipro_float_ads(); ?>

<div class="<?= $layout_class; ?>">
    
    <?php
    $hide_author_box = get_theme_mod('set_hide_author_box');
    if ( is_author() ) {
        if ( $hide_author_box == true ) {
            get_template_part( 'template-parts/post/title' );
        }
    } else if ( $layout_set == 'lbusiness' ) {

    } else {
        if ( is_page() ) {
            get_template_part( 'template-parts/post/title' );
        }
    }
    ?>

    <?php
    if($layout_set == 'lnews') {
        if(is_home()){
            get_template_part( 'template-parts/post/eipro-news' );

            $hide_recent_posts_by_cat = get_theme_mod('hide_recent_posts_by_category');
            if ( $hide_recent_posts_by_cat != true ) {
                get_template_part( 'template-parts/post/recent-post-by-category' );
            }
            
        }
    }
    ?>

    <div class="container">
        
        <div class="c-post-left">
            <?php
            if($layout_set == 'lnews') {
                if(is_home()){
                    //eipro_ads_code( 'middle_ad' );
                    $title_recently_sec = get_theme_mod('title_recently_sec');
                      if($title_recently_sec){
                          $title_recently_sec = $title_recently_sec;
                      } else {
                          $title_recently_sec = 'Recently';
                      }
                    echo '<div class="homepage-list c-recently"><div class="c-title-wrap"><div class="c-title">'. $title_recently_sec .'</div></div></div>';
                }
            }
            ?>
            <?php
                if($layout_set == 'lbusiness') {
                    get_template_part( 'template-parts/post/title' );
                    echo '<div class="c-post-wrap">';
                }
                get_template_part( 'template-parts/post/archive' );
                
                global $wp_query;
                $infinite_scroll = get_theme_mod('infinite_scroll_set');
                if ( $infinite_scroll == 'lbutton' ) {
                    if (  $wp_query->max_num_pages > 1 ) {
                        echo '<div class="eipro_loadmore">' . (get_theme_mod('ei_custom_string_more_posts') != '' ? get_theme_mod('ei_custom_string_more_posts') : 'More posts') . '</div>';
                    }
                }

                if($layout_set == 'lbusiness') {echo '</div>';}
            ?>

            <?php
            if ( $layout_set == 'lbusiness' ) {
                eipro_ads_code( 'bottom_ad' );
            }
            ?>
        
        </div>

        <?php 
        if($layout_set != 'lpersonal'){
            if($sidebar_set != 'no_sidebar_from_entire_site'){
        ?>
        <div class="right-sidebar">
            <?php get_sidebar(); ?>
        </div>
        <?php } } ?>

    </div>

</div>
