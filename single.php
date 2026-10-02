<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package eiPro_Master
 */

get_header();

while ( have_posts() ) :
the_post();
?>

<?php eipro_float_ads(); ?>

	<div class="content-single">
		<div class="container">

			<?php
			$layout_set = get_theme_mod('layout_set');
			$sidebar_set = get_theme_mod('sidebar_set');

			if ( $layout_set != 'lbusiness' ) {
        eipro_ads_code( 'top_ad' );
    	}

			if($layout_set == 'lnews'){
				if($sidebar_set == 'no_sidebar_from_entire_site' || $sidebar_set == 'no_sidebar_on_single_post'){
					$layout_class = '';
				}else{
					$layout_class = 'c-two-col';
				}
			} else if($layout_set == 'lbusiness'){
			    if($sidebar_set == 'no_sidebar_from_entire_site' || $sidebar_set == 'no_sidebar_on_single_post'){
			        $layout_class = 'c-two-col c-no-sidebar';
			    }else{
			        $layout_class = 'c-two-col';
			    }
			} else {
				$layout_class = '';
			}
			?>

			<div class="<?= $layout_class; ?>">
				<div class="c-post-left">

					<?php
					if ( $layout_set == 'lbusiness' ) {
		        eipro_ads_code( 'top_ad' );
		    	}
					$hide_breadcrumb = get_theme_mod('set_hide_breadcrumbs');
					if($hide_breadcrumb != true) {
						if (function_exists('dimox_breadcrumbs')) dimox_breadcrumbs();
					}
					?>

					<h1 class="post-title">
			        <?php the_title(); ?>
			    </h1>

			    <?php if ( $layout_set == 'lnews' ) { ?>

			    	<?php
						$hide_author_name = get_theme_mod('set_hide_author_name');
						$hide_entry_meta = get_theme_mod('set_hide_entry_meta');
						$hide_comment_count = get_theme_mod('hide_comment_count');
						if($hide_entry_meta != true) {
						?>
			    	<div class="post-meta">

					  	<?php
					  	if($hide_author_name != true) {
					  	?>
							<span class="c-author">
								<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>">
									<?= get_avatar( get_the_author_meta('ID') ); ?>
									<span><?php the_author(); ?></span>
									<svg viewBox="0 0 24 24"><g><rect x="5" y="5" width="14" height="14" fill="#ffffff"/><path d="M12,2C6.5,2,2,6.5,2,12c0,5.5,4.5,10,10,10s10-4.5,10-10C22,6.5,17.5,2,12,2z M9.8,17.3l-4.2-4.1L7,11.8l2.8,2.7L17,7.4 l1.4,1.4L9.8,17.3z"></path></g></svg>
								</a>
							</span>
							<?php } ?>

							<span class="c-bottom">
								<span><?php echo get_the_date() . ' ' . get_the_time(); ?></span>
								<span class="dot">.</span>
								<span><?php eipro_master_reading_time(); ?></span>
							</span>

						</div>

						<?php } ?>

			  	<?php } else { ?>

			  		<div class="post-meta">

				  	<?php
				  	$hide_author_name = get_theme_mod('set_hide_author_name');
						$hide_entry_meta = get_theme_mod('set_hide_entry_meta');
				  	if($hide_author_name != true) {
				  	?>
						<span>
							<?php
              $custom_by_text = get_theme_mod('ei_custom_string_by');
              echo esc_html(!empty($custom_by_text) ? $custom_by_text : 'by');
              ?>
						</span>
						<span><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><span><?php the_author(); ?></span></a></span>
						<?php } ?>

						<?php
						if($hide_author_name == true || $hide_entry_meta == true) {} else {
							echo '<span class="dot">.</span>';
						}
						?>

						<?php
						if($hide_entry_meta != true) {
						?>
						<span><?php echo get_the_date(); ?></span>
						<span class="dot">.</span>
						<span><?php eipro_master_reading_time(); ?></span>
						<?php } ?>

					</div>

			  	<?php } ?>

					<?php
						$hide_social_share_btn = get_theme_mod('hide_social_share_button');
						$place_social_share_btn = get_theme_mod('placement_social_share_button');
						if($hide_social_share_btn != true) {
							if($place_social_share_btn == 'top' || $place_social_share_btn == 'topbottom') {
								echo '<div class="top-share-btn">';
								get_template_part( 'template-parts/social/social-share' );
								echo '</div>';
							}
						}
					?>
					
					<?php
					$hide_f_image = get_theme_mod('set_hide_f_image_in_single_post');
					if($hide_f_image != true) {
					?>
					<figure class="post-image">
						<?php eipro_master_post_thumbnail(); ?>
						<figcaption>
							<?php the_post_thumbnail_caption(); ?>
						</figcaption>
					</figure>
					<?php } ?>

					<?php eipro_ads_code( 'middle_ad' ); ?>

					<?php
						$hide_toc = get_theme_mod('hide_toc');
						$position_toc = get_theme_mod('set_position_toc');
						if($hide_toc == true || $position_toc){} else {
						require get_template_directory() . '/shortcodes/toc.php';
						}
					?>
					

					<div class="desc">
					    <?php
					    global $page, $numpages;

					    if (isset($_GET['show']) && $_GET['show'] === 'all') {
					        $post_id = get_the_ID();
					        $post = get_post($post_id);

					        if ($post) {
					          echo apply_filters('the_content', $post->post_content);
					        }
					    } else {
					    	the_content();
					    	if ($numpages > 1) {

					    		$page_text = (get_theme_mod('ei_custom_string_pages') != '') ? get_theme_mod('ei_custom_string_pages') : 'Pages';
					    		$show_all_text = (get_theme_mod('ei_custom_string_show_all') != '') ? get_theme_mod('ei_custom_string_show_all') : 'Show All';
					    		$previously_text = (get_theme_mod('ei_custom_string_previously') != '') ? get_theme_mod('ei_custom_string_previously') : 'Previously';
					    		$next_text = (get_theme_mod('ei_custom_string_next') != '') ? get_theme_mod('ei_custom_string_next') : 'Next';

					    		echo '<div class="post-nav-links">';

					    		echo '<div class="ei-nav">';
					    		if ($page > 1) {
							        echo '<a class="prev c-btn" href="' . get_permalink() . '?page=' . ($page - 1) . '"><svg xmlns="http://www.w3.org/2000/svg" id="Layer_1" data-name="Layer 1" viewBox="0 0 24 24" width="512" height="512"><path d="M19,11H9l3.293-3.293L10.879,6.293,6.586,10.586a2,2,0,0,0,0,2.828l4.293,4.293,1.414-1.414L9,13H19Z"/></svg>' . $previously_text . '</a>';
							    }
							    if ($page < $numpages) {
							        echo '<a class="next c-btn" href="' . get_permalink() . '?page=' . ($page + 1) . '">' . $next_text . '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="512" height="512"><g id="_01_align_center" data-name="01 align center"><path d="M17.414,10.586,13.121,6.293,11.707,7.707,15,11H5v2H15l-3.293,3.293,1.414,1.414,4.293-4.293A2,2,0,0,0,17.414,10.586Z"/></g></svg></a>';
							    }
					    		echo '</div>';

					    		echo '<div class="ei-page-numbers">';
							    echo '<span class="ei-label">' . $page_text . ':</span>';
							    wp_link_pages(
							        array(
							            'before' => '',
							            'after' => '',
							            'next_or_number' => 'number',
							        )
							    );
							    if ($page == $numpages) {
							        echo '<a href="' . get_permalink() . '?show=all" class="ei-show-all">' . $show_all_text . '</a>';
							    }
							    echo '</div>';

							    echo '</div>';

							    echo '<style>.table-of-contents {display: none;}</style>';
					    	}
					    }
					    ?>
					</div>

					<?php eipro_post_tags(); ?>

					<?php
						$hide_social_share_btn = get_theme_mod('hide_social_share_button');
						$place_social_share_btn = get_theme_mod('placement_social_share_button');
						if($hide_social_share_btn != true) {
							if($place_social_share_btn == 'bottom' || $place_social_share_btn == 'topbottom') {
								get_template_part( 'template-parts/social/social-share' );
							}
						}
					?>

		      <?php eipro_ads_code( 'middle_ad' ); ?>

          <?php get_template_part( 'template-parts/post/author' ); ?>

					<?php if ( comments_open() ) { comments_template(); } ?>

					<?php 
		        $hide_related = get_theme_mod('hide_related');
		        if($hide_related != true) {
		        	get_template_part( 'template-parts/post/related' );
		        }

		        if ( $layout_set == 'lbusiness' ) {
                eipro_ads_code( 'bottom_ad' );
            }
		      ?>

      	</div>

      	<?php 
      	if($layout_set != 'lpersonal'){
      		if($sidebar_set == 'no_sidebar_from_entire_site' || $sidebar_set == 'no_sidebar_on_single_post'){}else{
      	?>
        <div class="right-sidebar">
            <?php get_sidebar(); ?>
        </div>
        <?php } } ?>

    	</div>

		</div>
	</div>

<span class="post_views" style="display: none;">
  <?php gt_set_post_view(); ?>
  <?= gt_get_post_view(); ?>
</span>
<?php
endwhile;
get_footer();
