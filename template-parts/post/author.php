<?php
$layout_set = get_theme_mod('layout_set');
$hide_author_box = get_theme_mod('set_hide_author_box');
if($hide_author_box != true) {
?>
<div class="about-author">
	<div class="c-profile">
		<a href="<?= get_author_posts_url(get_the_author_meta('ID')); ?>">
            <?= get_avatar( get_the_author_meta('ID') ); ?>
            <span class="aut-title"><?php the_author(); ?></span>
        </a>
	</div>
	<div class="">
		<div class="c-name">
			<a href="<?= get_author_posts_url(get_the_author_meta('ID')); ?>">
				<?php 
				the_author();
				if ($layout_set == 'lnews') {
				?>
				<svg viewBox="0 0 24 24"><g><rect x="6" y="6" width="12" height="12" fill="#ffffff"/><path d="M12,2C6.5,2,2,6.5,2,12c0,5.5,4.5,10,10,10s10-4.5,10-10C22,6.5,17.5,2,12,2z M9.8,17.3l-4.2-4.1L7,11.8l2.8,2.7L17,7.4 l1.4,1.4L9.8,17.3z"></path></g></svg>
				<?php } ?>
				
			</a>
		</div>
		<?php 
		$author_desc = get_the_author_meta( 'description' );
		if($author_desc){
		?>
		<p><?= $author_desc; ?></p>
		<?php } ?>
	</div>
</div>
<?php } ?>