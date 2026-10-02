<article itemscope itemtype="http://schema.org/Article" <?php post_class(); ?>>
	<div class="post-content">

		<div>
			<?php
				$hide_cat = get_theme_mod('set_hide_cat_in_post');
				if($hide_cat != true) {
			?>
			<div class="post-category">
				<?php the_category( '   ' ); ?>
			</div>
			<?php } ?>
			<figure itemprop="image" itemscope itemtype="https://schema.org/ImageObject" class="post-image">
				<?php eipro_master_post_thumbnail(); ?>
			</figure>
		</div>

		<div>
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
			<div class="post-meta">
				<?php
			  	$hide_author_name = get_theme_mod('set_hide_author_name');
				$hide_entry_meta = get_theme_mod('set_hide_entry_meta');
			  	if($hide_author_name != true) {
			  	?>
				<span>
					<?php
	                $custom_by = get_theme_mod('ei_custom_string_by');
	                echo esc_html(!empty($custom_by) ? $custom_by : 'by');
	                ?>
				</span>
				<span itemprop="author" itemscope itemtype="https://schema.org/Person"><a itemprop="url" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><span itemprop="name"><?php the_author(); ?></span></a></span>
				<?php } ?>
			</div>
		</div>

	</div>
</article>