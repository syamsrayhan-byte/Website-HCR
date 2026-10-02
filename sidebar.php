<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package eiPro_Master
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}

$enable_sticky_sidebar = get_theme_mod('set_enable_sticky_sidebar');
?>

<aside id="secondary" class="widget-area <?php if($enable_sticky_sidebar == true){echo 'c-sticky-on';} ?>">
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
</aside><!-- #secondary -->
