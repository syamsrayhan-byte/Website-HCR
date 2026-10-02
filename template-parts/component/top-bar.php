<?php
$layout_set = get_theme_mod('layout_set');
$hide_top_bar = get_theme_mod('hide_top_bar');
$hide_top_bar_business = get_theme_mod('hide_top_bar_business');
$top_bar_business = get_theme_mod('top_bar_business');
$url_top_bar_business = get_theme_mod('url_top_bar_business');
?>

<?php
if($layout_set == 'lnews'){
    if($hide_top_bar != true){
?>
<div class="top-bar">
	<div class="container">
		<div class="c-col">
            <div class="menu-toggle">
                <div class="bar1"></div>
                <div class="bar2"></div>
                <div class="bar3"></div>
            </div>
			<div class="c-menu">
                <?php
                wp_nav_menu(
                    array(
                        'container'      => '',
                        'theme_location' => 'top-bar-menu',
                        'menu_class'     => '',
                        'add_li_class'   => '',
                    )
                );
                ?>
            </div>
		</div>
		<div class="c-col">
			<?php get_template_part( 'template-parts/social/social-media' ); ?>
		</div>
	</div>
</div>
<?php } } ?>

<?php
if($layout_set == 'lbusiness'){
    if($hide_top_bar_business != true){
    if($top_bar_business){
?>
<div class="top-bar">
    <div class="container">
        <a href="<?= $url_top_bar_business; ?>"><?= $top_bar_business; ?></a>
    </div>
</div>
<?php } } } ?>