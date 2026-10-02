<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package eiPro_Master
 */

$layout_set = get_theme_mod('layout_set');
?>

<?php
if ( $layout_set != 'lbusiness' ) {
      $custom_no_results = get_theme_mod('ei_custom_string_search_no_results');
if ( is_search() ) { ?>
    <div class="c-alert">
      <?php
      echo esc_html(!empty($custom_no_results) ? $custom_no_results : 'Sorry, but nothing matched your search terms.');
      ?>
    </div>
    <?php } elseif ( is_category() || is_tag() || is_author() ) { ?>
    <div class="c-alert">
      <?php
      $custom_coming_soon = get_theme_mod('ei_custom_string_coming_soon');
      echo esc_html(!empty($custom_coming_soon) ? $custom_coming_soon : 'Coming Soon...');
      ?>
    </div>
    <?php } else { ?>
    <div class="c-alert">
      <?php
      echo esc_html(!empty($custom_no_results) ? $custom_no_results : 'Sorry, but nothing matched your search terms.');
      ?>
    </div>
<?php } } ?>

<?php
if ( $layout_set == 'lbusiness' ) {
  get_template_part( 'template-parts/post/recently' );
} else {
  $title_recently_sec = get_theme_mod('title_recently_sec');
  if($title_recently_sec){
      $title_recently_sec = $title_recently_sec;
  } else {
      $title_recently_sec = 'Recently';
  }
  ?>
  <div class="sec-title"><?= $title_recently_sec; ?></div>
  <div>
  	<?php get_template_part( 'template-parts/post/recently' ); ?>
  </div>
<?php } ?>