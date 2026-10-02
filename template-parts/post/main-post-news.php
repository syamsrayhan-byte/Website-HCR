<article itemscope itemtype="http://schema.org/Article" <?php post_class(); ?>>
	<div class="post-content">

		<h2 class="post-title">
			<a itemprop="headline" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
		</h2>

		<?php
		$hide_post_excerpt = get_theme_mod( 'set_hide_post_excerpt' );
		if($hide_post_excerpt != true) {
		?>
		<div class="post-excerpt">
			<p><?= get_the_excerpt(); ?></p>
		</div>
		<?php } ?>

		<?php
		$hide_author_name = get_theme_mod('set_hide_author_name');
		$hide_entry_meta = get_theme_mod('set_hide_entry_meta');
		$hide_comment_count = get_theme_mod('hide_comment_count');
		$hide_p_time_ago = get_theme_mod('hide_p_time_ago');
		$hide_p_date = get_theme_mod('hide_p_date');
		if($hide_entry_meta != true) {
		?>
		<div class="post-meta">

			<?php
		  	if($hide_author_name != true) {
		  	?>
			<span class="c-author" itemprop="author" itemscope itemtype="https://schema.org/Person">
				<a itemprop="url" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>">
					<?= get_avatar( get_the_author_meta('ID') ); ?>
					<span itemprop="name"><?php the_author(); ?></span>
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
	<figure itemprop="image" itemscope itemtype="https://schema.org/ImageObject" class="post-image">
		<?php eipro_master_post_thumbnail(); ?>
	</figure>
</article>