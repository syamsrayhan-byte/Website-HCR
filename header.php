<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package eiPro_Master
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    
    <?php
    $accent = get_theme_mod('accent');
    if($accent){ $accent = $accent; } else { $accent = '#ffffff'; }
    ?>
    <meta name="theme-color" content="<?= $accent; ?>" />
	<meta name="msapplication-navbutton-color" content="<?= $accent; ?>">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-status-bar-style" content="<?= $accent; ?>">

	<?php 
	$set_c_font = get_theme_mod( 'set_c_font' );
	$reset_default_font = get_theme_mod( 'reset_default_font' );
	if($reset_default_font == true || !$set_c_font) {
		$set_c_font = 'https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap';
	} else {
		$set_c_font = $set_c_font;
	}
	?>
	<!-- connect to domain of font files -->
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

	<!-- optionally increase loading priority -->
	<link rel="preload" as="style" href="<?= $set_c_font; ?>">

	<!-- async CSS -->
	<link rel="stylesheet" media="print" onload="this.onload=null;this.removeAttribute('media');" href="<?= $set_c_font; ?>">

	<!-- no-JS fallback -->
	<noscript>
	    <link rel="stylesheet" href="<?= $set_c_font; ?>">
	</noscript>

	<?php 
	require get_template_directory() . '/inc/custom-head.php';
	eipro_add_custom_script( 'head' );
	?>

	<?php
	$data_ad_client = get_theme_mod( 'set_data_ad_client' );
	$enable_lazyload_adsense = get_theme_mod( 'enable_lazyload_adsense' );
	if($enable_lazyload_adsense != true) {
		if($data_ad_client) {
	?>
	<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-<?= $data_ad_client; ?>"
     crossorigin="anonymous"></script>
 	<?php } } ?>
 	
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<?php 
$layout_set = get_theme_mod('layout_set');
$enable_darkmode = get_theme_mod('enable_darkmode');
$enable_cta_btn = get_theme_mod('set_enable_cta_btn');
$link_txt_cta = get_theme_mod('navbar_link_txt_cta');
$url_cta = get_theme_mod('navbar_url_cta');

$hide_search_form = get_theme_mod('set_hide_search_form');

// if($layout_set == 'lbusiness') {
// 	get_template_part( 'template-parts/coming-soon/coming-soon' );
// }
?>
	
<div class="wrapper <?php if($layout_set == 'lbusiness' || $layout_set == 'lnews'){echo 'hide-p-sidebar';} else { echo 'p-sidebar';} ?>">

	<div class="c-profile sidebar">
		<div class="container">
			<span class="c-close">
		       <span><?= file_get_contents(get_template_directory() . "/assets/icon/close.svg"); ?></span>
		    </span>
		</div>

				<?php if($layout_set == 'lnews' || $layout_set == 'lbusiness'){ ?>
				<div class="c-logo">
					<?php eipro_master_custom_logo(); ?>
				</div>
				<?php if($enable_cta_btn == true) { ?>
            	<a href="<?= $url_cta; ?>" class="c-btn" rel="noopener" target="_blank">
            		<?php if($link_txt_cta){ echo $link_txt_cta; } else { echo 'Beli Sekarang'; } ?>
            	</a>
            	<?php } ?>
				<div class="container">
            	<?php
                    wp_nav_menu(
                        array(
                            'container'      => '',
                            'theme_location' => 'mobile-menu',
                            'menu_class'     => '',
                            'add_li_class'   => '',
                        )
                    );
                ?>
	            </div>
				<?php }else{?>
			<div class="container">
				<div class="c-content">
				<div>
					<?php
					$prof_picture = get_theme_mod('profile_picture_set');
					$prof_name = get_theme_mod('profile_name_set');
					$prof_short_desc = get_theme_mod('profile_short_desc_set');
					?>

					<?php if($prof_picture){ ?>
					<div class="profile">
						<a href="<?= site_url(); ?>">
							<img src="<?= $prof_picture; ?>" alt="<?= $prof_name; ?>">
						</a>
					</div>
					<?php } ?>

					<?php if($prof_name){ ?>
					<div class="name">
						<a href="<?= site_url(); ?>">
							<?= $prof_name; ?>
						</a>
					</div>
					<?php } ?>

					<?php if($prof_short_desc){ ?>
					<div class="description">
						<?= $prof_short_desc; ?>
					</div>
					<?php } ?>
					
					<?php get_template_part( 'template-parts/social/social-media' ); ?>

					<?php eipro_ads_code( 'sidebar_ad' ); ?>
				</div>
				</div>
			</div>
				<?php } ?>
	</div>
	<div class="sidebar-overlay"></div>

	<div class="content <?php if($layout_set == 'lbusiness'){echo 'c-fullwidth';} if($layout_set == 'lnews'){echo 'c-fullwidth c-lnews';} ?>">

		<?php eipro_float_ads(); ?>

		<?php
		$hide_top_bar_business = get_theme_mod('hide_top_bar_business');
		$hide_top_bar = get_theme_mod('hide_top_bar');
		?>
		<nav id="site-navigation" class="main-navigation<?php if($layout_set == 'lbusiness'){if($hide_top_bar_business == true){echo ' no-top-bar';}} if($layout_set == 'lnews'){if(get_theme_mod('enable_trending_news') == true) {echo ' ltrending';} if($hide_top_bar == true){echo ' no-top-bar';}}?>">
			<?php
				get_template_part( 'template-parts/component/top-bar' );
			?>
			<div class="container">
				<?php if($layout_set == 'lbusiness' || $layout_set == 'lnews'){ ?>
					<div class="c-logo">
						<?php eipro_master_custom_logo(); ?>
					</div>
				<?php } ?>

				<?php
				if($layout_set == 'lnews'){
					if(get_theme_mod('enable_trending_news') == true) {
						get_template_part( 'template-parts/component/trending-now' );
					}
				}
				?>

				<div class="nav-collapse">
					<?php if($layout_set == 'lbusiness' || $layout_set == 'lnews'){ ?>
						<div class="c-logo">
							<?php if($layout_set == 'lbusiness'){ ?>
								<div class="menu-toggle">
					                <div class="bar1"></div>
					                <div class="bar2"></div>
					                <div class="bar3"></div>
					            </div>
					        <?php } ?>
							<?php eipro_master_custom_logo(); ?>
						</div>
					<?php } ?>
					<?php 
					if($layout_set == 'lbusiness' || $layout_set == 'lnews'){}else{
					if($prof_picture){ 
					?>
						<div class="profile">
							<img src="<?= $prof_picture; ?>" alt="<?= $prof_name; ?>">
						</div>
					<?php } } ?>

					<div class="nav-right">

						<?php if ($hide_search_form != true) { ?>
	                	<span class="search pointer">
	                		<?= file_get_contents(get_template_directory() . "/assets/icon/search.svg"); ?>
	                	</span>
	                	<?php } ?>

	                	<?php
	                	if($layout_set != 'lbusiness'){
	                		if($enable_darkmode == true){
	                	?>
	                	<span class="c-dark-mode pointer">
	                		<?= file_get_contents(get_template_directory() . "/assets/icon/sun.svg"); ?>
	          				<?= file_get_contents(get_template_directory() . "/assets/icon/moon.svg"); ?>
	                	</span>
	                	<?php } } ?>

	                	<?php if($enable_cta_btn == true) { ?>
	                	<a href="<?= $url_cta; ?>" class="c-btn" rel="noopener" target="_blank">
	                		<?php if($link_txt_cta){ echo $link_txt_cta; } else { echo 'Beli Sekarang'; } ?>
	                	</a>
	                	<?php } ?>
	                </div>
					<div class="nav-left">
		                <div class="navwrap">
			                <?php
			                    wp_nav_menu(
			                        array(
			                            'container'      => '',
			                            'theme_location' => 'top-menu',
			                            'menu_class'     => 'nav',
			                            'add_li_class'   => '',
			                        )
			                    );
			                ?>
			            </div>
					</div>
				</div>
			</div>
		</nav>

		<?php 
		if($layout_set == 'lnews') {
			if(is_home()) {
				eipro_ads_code( 'home_news_top_ad' );
			}
		}
		?>