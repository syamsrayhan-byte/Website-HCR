<div class="social-media" id="share-post">
	
	<?php
		$obj_id = get_queried_object_id();

		if ( is_page('home') ) {
			$title = '';
			$current_slug = get_permalink( $obj_id );

		} else if ( is_page('sitemap') ) {
			$title = 'Sitemap';
			$current_slug = get_permalink( $obj_id );

		} else if ( is_404() ) {
			$title = '';
			$current_slug = site_url();

		} else if ( is_author() ) {
			$title = '';
			$current_slug = get_author_posts_url( $obj_id );

		} else if ( is_home() ) {
			$title = 'Explore Articles';
			$current_slug = get_permalink( $obj_id );

		} else if ( is_search() ) {
			$title = '';
			$current_slug = get_search_link( $obj_id );

		} else if ( is_category() ) {
			$title = '';
			$current_slug = get_term_link( $obj_id );

		} else if ( is_tag() ) {
			$title = '';
			$current_slug = get_tag_link( $obj_id );

		} else {
			$title = get_the_title();
			$current_slug = get_permalink();
		}
	?>
	
	<?php
		$label_social_share_btn= get_theme_mod('label_social_share_button');
		$fb_social_share_button= get_theme_mod('fb_social_share_button');
		$wa_social_share_button= get_theme_mod('wa_social_share_button');
		$tw_social_share_button= get_theme_mod('tw_social_share_button');
		$em_social_share_button= get_theme_mod('em_social_share_button');
		$tl_social_share_button= get_theme_mod('tl_social_share_button');
		$ln_social_share_button= get_theme_mod('ln_social_share_button');
		$pn_social_share_button= get_theme_mod('pn_social_share_button');
		$copy_social_share_button= get_theme_mod('copy_social_share_button');
	?>
  <p>
  	<?php if($label_social_share_btn){
  		echo $label_social_share_btn;
  	} else {
  		echo 'Share this:';
  	} ?>
  </p>
  <?php if($fb_social_share_button == true){ ?>
  <a class="fb" rel="nofollow noopener" target="_blank" href="https://www.facebook.com/sharer.php?u=<?= $current_slug; ?>" aria-label="link">
    <?= file_get_contents(get_template_directory() . "/assets/icon/fi-brands-facebook.svg"); ?>
    <span class="socmed-title">Facebook</span>
  </a>
	<?php } if($wa_social_share_button == true){ ?>
  <a class="wa" rel="nofollow noopener" target="_blank" href="https://wa.me/?text=<?= $title; ?>%0A<?= $current_slug; ?>" aria-label="link">
    <?= file_get_contents(get_template_directory() . "/assets/icon/fi-brands-whatsapp.svg"); ?>
    <span class="socmed-title">WhatsApp</span>
  </a>
	<?php } if($tw_social_share_button == true){ ?>
  <a class="tw" rel="nofollow noopener" target="_blank" href="https://twitter.com/share?text=<?= $title; ?>&amp;url=<?= $current_slug; ?>" aria-label="link">
    <?= file_get_contents(get_template_directory() . "/assets/icon/fi-brands-twitter.svg"); ?>
    <span class="socmed-title">Twitter</span>
  </a>
  <?php } if($em_social_share_button == true){ ?>
  <a class="em" rel="nofollow noopener" target="_blank" href="mailto:?subject=<?= $title; ?>&amp;body=<?= $current_slug; ?>" aria-label="link">
    <?= file_get_contents(get_template_directory() . "/assets/icon/fi-rr-envelope.svg"); ?>
    <span class="socmed-title">Email</span>
  </a>
  <?php } if($tl_social_share_button == true){ ?>
  <a class="tl" rel="nofollow noopener" target="_blank" href="https://t.me/share/url?url=<?= $current_slug; ?>&amp;text=<?= $title; ?>" aria-label="link">
    <?= file_get_contents(get_template_directory() . "/assets/icon/fi-brands-telegram.svg"); ?>
    <span class="socmed-title">Telegram</span>
  </a>
  <?php } if($ln_social_share_button == true){ ?>
  <a class="ln" rel="nofollow noopener" target="_blank" href="http://www.linkedin.com/shareArticle?mini=true&amp;url=<?= $current_slug; ?>&amp;title=<?= $title; ?>" aria-label="link">
    <?= file_get_contents(get_template_directory() . "/assets/icon/fi-brands-linkedin.svg"); ?>
    <span class="socmed-title">LinkedIn</span>
  </a>
  <?php } if($pn_social_share_button == true){ ?>
  <a class="pn" rel="nofollow noopener" target="_blank" href="http://pinterest.com/pin/create/button/?url=<?= $current_slug; ?>&media=<?= esc_url( get_the_post_thumbnail_url( get_the_ID() ) ); ?>&description=<?= $title; ?>" aria-label="link">
    <?= file_get_contents(get_template_directory() . "/assets/icon/fi-brands-pinterest.svg"); ?>
    <span class="socmed-title">Pinterest</span>
  </a>
  <?php } ?>
	
</div>