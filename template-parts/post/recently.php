<?php
    $layout_set = get_theme_mod('layout_set');
    $exclude_cat_id_recently = get_theme_mod('exclude_cat_id_recently');
    $excluded_categories = '';
    if ($exclude_cat_id_recently) {
        $exclude_cat_id_array = explode(',', $exclude_cat_id_recently);
        $excluded_categories = '-' . implode(', -', $exclude_cat_id_array);
    }

    $recentpost = new WP_Query(array(
      'post_type' => 'post',
      'posts_per_page' => get_option('posts_per_page'),
      'orderby' => 'DATE',
      'order' => 'DESC',
      'cat' => $excluded_categories,
    ));   
    if ( $recentpost->have_posts() ) :
    	while ( $recentpost->have_posts() ) : $recentpost->the_post();
    		if ($layout_set == 'lbusiness') {
                get_template_part( 'template-parts/post/main-post-business' );
            } elseif ($layout_set == 'lnews') {
                get_template_part( 'template-parts/post/main-post-news' );
            } else {
                get_template_part( 'template-parts/post/main-post' );
            }
    	endwhile;
        wp_reset_postdata();
	endif;
?>