<?php
global $wp_query;

$layout_set = get_theme_mod('layout_set');
$hide_author_box = get_theme_mod('set_hide_author_box');

if ($layout_set != 'lbusiness') {
	if ( is_author() ) {
		if ( $hide_author_box != true ) {
			get_template_part( 'template-parts/post/author' );
		}
	} else { 
		get_template_part( 'template-parts/post/title' );
} }

if (have_posts()) :
	while (have_posts()) : the_post();

		$current_post = $wp_query->current_post;
		$enable_ad_in_feed = get_theme_mod( 'enable_ad_in_feed' );
		$in_feed_ad_desktop = get_theme_mod( 'set_in_feed_ad_desktop' );
		$in_feed_ad_mobile = get_theme_mod( 'set_in_feed_ad_mobile' );
		$position_in_feed_ad = get_theme_mod( 'set_position_in_feed_ad' );

		if ($position_in_feed_ad) {
			$p_in_feed_ad = $position_in_feed_ad;
		} else {
			$p_in_feed_ad = 2;
		}

		if ($enable_ad_in_feed == true) {
			if ($current_post == $p_in_feed_ad) {
				if ($in_feed_ad_desktop) {
					echo '<div class="in-feed-ad-desktop">' . $in_feed_ad_desktop . '</div>';
				} if ($in_feed_ad_mobile) {
					echo '<div class="in-feed-ad-mobile">' . $in_feed_ad_mobile . '</div>';
				}
	        }
		}

		if ($layout_set == 'lbusiness') {
			get_template_part( 'template-parts/post/main-post-business' );
		} elseif ($layout_set == 'lnews') {
			get_template_part( 'template-parts/post/main-post-news' );
		} else {
			get_template_part( 'template-parts/post/main-post' );
		}
		
	endwhile;
else :
	get_template_part( 'template-parts/content-none' );
endif;
?>