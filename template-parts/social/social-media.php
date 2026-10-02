<?php
  $facebook = get_theme_mod( 'facebook_url' );
  $instagram = get_theme_mod( 'instagram_url' );
  $tiktok = get_theme_mod( 'tiktok_url' );
  $telegram = get_theme_mod( 'telegram_url' );
  $linkedin = get_theme_mod( 'linkedin_url' );
  $myspace = get_theme_mod( 'myspace_url' );
  $pinterest = get_theme_mod( 'pinterest_url' );
  $soundcloud = get_theme_mod( 'soundcloud_url' );
  $tumblr = get_theme_mod( 'tumblr_url' );
  $twitter = get_theme_mod( 'twitter_url' );
  $youtube = get_theme_mod( 'youtube_url' );
  $wikipedia = get_theme_mod( 'wikipedia_url' );

  if($facebook||$instagram||$linkedin||$myspace||$pinterest||$soundcloud||$tumblr||$twitter||$youtube||$wikipedia){
?>

<div class="social-media outline">
  <?php if ($facebook){ ?>
  <a class="fb" rel="nofollow noopener" target="_blank" href="<?= $facebook; ?>" aria-label="link">
    <?= file_get_contents(get_template_directory() . "/assets/icon/fi-brands-facebook.svg"); ?>
  </a>
  <?php } ?>

  <?php if ($instagram){ ?>
  <a class="ig" rel="nofollow noopener" target="_blank" href="<?= $instagram; ?>" aria-label="link">
    <?= file_get_contents(get_template_directory() . "/assets/icon/fi-brands-instagram.svg"); ?>
  </a>
  <?php } ?>

  <?php if ($tiktok){ ?>
  <a class="ti" rel="nofollow noopener" target="_blank" href="<?= $tiktok; ?>" aria-label="link">
    <?= file_get_contents(get_template_directory() . "/assets/icon/fi-brands-tiktok.svg"); ?>
  </a>
  <?php } ?>

  <?php if ($telegram){ ?>
  <a class="tl" rel="nofollow noopener" target="_blank" href="<?= $telegram; ?>" aria-label="link">
    <?= file_get_contents(get_template_directory() . "/assets/icon/fi-brands-telegram.svg"); ?>
  </a>
  <?php } ?>

  <?php if ($linkedin){ ?>
  <a class="ln" rel="nofollow noopener" target="_blank" href="<?= $linkedin; ?>" aria-label="link">
    <?= file_get_contents(get_template_directory() . "/assets/icon/fi-brands-linkedin.svg"); ?>
  </a>
  <?php } ?>

  <?php if ($myspace){ ?>
  <a class="ms" rel="nofollow noopener" target="_blank" href="<?= $myspace; ?>" aria-label="link">
    <?= file_get_contents(get_template_directory() . "/assets/icon/fi-rr-users.svg"); ?>
  </a>
  <?php } ?>

  <?php if ($pinterest){ ?>
  <a class="pn" rel="nofollow noopener" target="_blank" href="<?= $pinterest; ?>" aria-label="link">
    <?= file_get_contents(get_template_directory() . "/assets/icon/fi-brands-pinterest.svg"); ?>
  </a>
  <?php } ?>

  <?php if ($soundcloud){ ?>
  <a class="sc" rel="nofollow noopener" target="_blank" href="<?= $soundcloud; ?>" aria-label="link">
    <?= file_get_contents(get_template_directory() . "/assets/icon/fi-brands-soundcloud.svg"); ?>
  </a>
  <?php } ?>

  <?php if ($tumblr){ ?>
  <a class="tr" rel="nofollow noopener" target="_blank" href="<?= $tumblr; ?>" aria-label="link">
    <?= file_get_contents(get_template_directory() . "/assets/icon/fi-brands-tumblr.svg"); ?>
  </a>
  <?php } ?>

  <?php if ($twitter){ ?>
  <a class="tw" rel="nofollow noopener" target="_blank" href="<?= $twitter; ?>" aria-label="link">
    <?= file_get_contents(get_template_directory() . "/assets/icon/fi-brands-twitter.svg"); ?>
  </a>
  <?php } ?>

  <?php if ($youtube){ ?>
  <a class="yt" rel="nofollow noopener" target="_blank" href="<?= $youtube; ?>" aria-label="link">
    <?= file_get_contents(get_template_directory() . "/assets/icon/fi-brands-youtube.svg"); ?>
  </a>
  <?php } ?>

  <?php if ($wikipedia){ ?>
  <a class="wpd" rel="nofollow noopener" target="_blank" href="<?= $wikipedia; ?>" aria-label="link">
    <?= file_get_contents(get_template_directory() . "/assets/icon/fi-brands-wikipedia.svg"); ?>
  </a>
  <?php } ?>
</div>

<?php } ?>
