<?php //eipro_ads_code( 'home_news_top_ad' ); ?>

<?php
$enable_featured_post_1 = get_theme_mod('enable_featured_post_1');
if($enable_featured_post_1 == true) {
	$hide_author_name = get_theme_mod('set_hide_author_name');
	$hide_entry_meta = get_theme_mod('set_hide_entry_meta');
	$hide_comment_count = get_theme_mod('hide_comment_count');
	$hide_p_time_ago = get_theme_mod('hide_p_time_ago');
	$hide_p_date = get_theme_mod('hide_p_date');
?>
<div class="post-news-style1">
	<div class="container">

		<div class="c-col-1">

			<div class="post_carousel">
				<?php
				$recentpost = new WP_Query(array(
			      'post_type' => 'post',
			      'posts_per_page' => 3,
			      'orderby' => 'DATE',
			      'order' => 'DESC'
			    ));   
			    if ( $recentpost->have_posts() ) {
			    	while ( $recentpost->have_posts() ) : $recentpost->the_post();
				?>
				<article <?php post_class(); ?>>
					<figure class="post-image">
						<?php eipro_master_post_thumbnail(); ?>
					</figure>
					<div class="post-content <?php if($hide_entry_meta == true) {echo 'no_post-meta';} ?>">

						<h2 class="post-title">
							<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
						</h2>

						<?php if($hide_entry_meta != true) { ?>
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
								<?php if($hide_comment_count != true) { ?>
								<span class="c-comment">
									<?php eipro_master_comment_count(); ?>
								</span>
								<?php if($hide_p_date != true) {
									echo '<span class="dot">.</span>';
								} ?>
								<?php } ?>

								<?php
								if($hide_p_date != true) {
								if($hide_p_time_ago != true) {
								?>
								<span class="c-time_ago">
									<?php eipro_master_time_ago(); ?>
								</span>
								<?php } else {
									echo '<span>' . get_the_date() . '</span>';
								}} ?>
							</span>

						</div>
						<?php } ?>

					</div>
				</article>
				<?php 
				endwhile;
				wp_reset_postdata();
				} else {
                    echo '<p>No recent posts.</p>';
                }
				?>
			</div>

		</div>

		<div class="c-col-2">
			
			<?php
			$recentpost = new WP_Query(array(
		      'post_type' => 'post',
		      'posts_per_page' => 2,
		      'offset' => 3,
		      'orderby' => 'DATE',
		      'order' => 'DESC'
		    ));   
		    if ( $recentpost->have_posts() ) {
		    	while ( $recentpost->have_posts() ) : $recentpost->the_post();
			?>
			<article <?php post_class(); ?>>
				<div class="post-content">

					<h2 class="post-title">
						<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
					</h2>

					<?php
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
							<?php if($hide_comment_count != true) { ?>
							<span class="c-comment">
								<?php eipro_master_comment_count(); ?>
							</span>
							<?php if($hide_p_date != true) {
								echo '<span class="dot">.</span>';
							} ?>
							<?php } ?>

							<?php
							if($hide_p_date != true) {
							if($hide_p_time_ago != true) {
							?>
							<span class="c-time_ago">
								<?php eipro_master_time_ago(); ?>
							</span>
							<?php } else {
								echo '<span>' . get_the_date() . '</span>';
							}} ?>
						</span>
						
					</div>
					<?php } ?>

				</div>
				<figure class="post-image">
					<?php eipro_master_post_thumbnail(); ?>
				</figure>
			</article>
			<?php 
			endwhile;
			wp_reset_postdata();
			} else {
                echo '<p>No recent posts.</p>';
            }
			?>

		</div>

	</div>
</div>
<?php } ?>

<?php
$enable_featured_post_2 = get_theme_mod('enable_featured_post_2');
if ($enable_featured_post_2) {
    $title_weekly_top_news = get_theme_mod('title_weekly_top_news') ?: 'Weekly Top News';
    $number_post_weekly_top_news = get_theme_mod('number_post_weekly_top_news') ?: 5;
    $time_period_weekly_top_news = get_theme_mod('time_period_weekly_top_news');

    $weeklyy_args = array(
        'post_type'      => 'post',
        'meta_key'       => 'post_views_count',
        'orderby'        => 'meta_value_num',
        'order'          => 'DESC',
        'posts_per_page' => $number_post_weekly_top_news,
    );

    if ($time_period_weekly_top_news) {
        $weeklyy_args['date_query'] = array(
            array(
                'after'  => '1 ' . substr($time_period_weekly_top_news, 2) . ' ago',
            ),
        );
    }

    $post_weeklyy = new WP_Query($weeklyy_args);

    if ($post_weeklyy->have_posts() && $post_weeklyy->post_count >= 3) {
?>
    <div class="post-news-grid-style1">
		<div class="container">
			<div style="background-image: url(<?= get_template_directory_uri() . '/assets/img/element_1.webp';?>);">
				<span class="sec-title"><?= $title_weekly_top_news; ?></span>
				<div class="news-grid-style1-wrap">
					<?php while ( $post_weeklyy->have_posts() ) { $post_weeklyy->the_post(); ?>
			        <div class="c-col">
						<article <?php post_class(); ?>>
							<figure class="post-image">
								<?php eipro_master_post_thumbnail(); ?>
							</figure>
							<div class="post-content">

								<h2 class="post-title">
									<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
								</h2>

								<?php
								$hide_entry_meta = get_theme_mod('set_hide_entry_meta');
								$hide_p_time_ago = get_theme_mod('hide_p_time_ago');
								$hide_p_date = get_theme_mod('hide_p_date');
								if(!$hide_entry_meta && !$hide_p_date) {
								?>
								<div class="post-meta">

									<span class="c-bottom">
										<?php if($hide_p_time_ago != true) { ?>
										<span class="c-time_ago">
											<?php eipro_master_time_ago(); ?>
										</span>
										<?php } else {
											echo '<span>' . get_the_date() . '</span>';
										} ?>
									</span>
									
								</div>
								<?php } ?>

							</div>
						</article>
					</div>
					<?php } wp_reset_postdata(); ?>
				</div>
			</div>
		</div>
	</div>
<?php
    }
}
?>