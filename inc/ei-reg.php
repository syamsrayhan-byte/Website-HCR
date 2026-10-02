<?php
ei_Relations::instance()->initialization();
require_once get_template_directory().'/inc/class-tgm.php';
require_once get_template_directory().'/inc/opt/init/admin-init.php';
require_once get_template_directory().'/inc/opt/admin/notices.php';
require_once get_template_directory().'/inc/opt/wp/setup.php';

function tgm_act() {

	global $eion;

	$layout_set = get_theme_mod('layout_set');
	if ($layout_set == 'lbusiness'){

		$plugins = array(
			array(
				'name' => __('Contact Form 7', 'eipro-master'),
				'slug' => 'contact-form-7',
				'required' => true
			),
			array(
				'name' => __('Elementor', 'eipro-master'),
				'slug' => 'elementor',
				'required' => true
			),
			array(
				'name' => __('One Click Demo Import', 'eipro-master'),
				'slug' => 'one-click-demo-import',
				'required' => true
			),
			array(
				'name' => __('eiPro Addon', 'eipro-master'),
				'slug' => 'eipro-addon',
				'source' => get_stylesheet_directory() . '/inc/addon/eipro-addon.zip',
				'required' => true
			)
		);

	} elseif ($layout_set == 'lnews') {

		$plugins = array(
			array(
				'name' => __('Contact Form 7', 'eipro-master'),
				'slug' => 'contact-form-7',
				'required' => true
			),
			array(
				'name' => __('One Click Demo Import', 'eipro-master'),
				'slug' => 'one-click-demo-import',
				'required' => true
			)
		);
		
	} else {

		$plugins = array(
			array(
				'name' => __('Contact Form 7', 'eipro-master'),
				'slug' => 'contact-form-7',
				'required' => true
			),
			array(
				'name' => __('Elementor', 'eipro-master'),
				'slug' => 'elementor',
				'required' => true
			),
			array(
				'name' => __('One Click Demo Import', 'eipro-master'),
				'slug' => 'one-click-demo-import',
				'required' => true
			)
		);
		
	}

	$config = array (
		'id' => 'eipro_plugins_activation',
		'menu' => 'eipro-plugins-activation',
		'parent_slug' => 'themes.php',
		'has_notices'  => true
	);

	$eion ? tgmpa($plugins, $config) : null;

}
add_action('tgmpa_register', 'tgm_act');
