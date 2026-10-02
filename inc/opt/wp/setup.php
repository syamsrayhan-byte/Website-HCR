<?php
function ei_template() {
    global $wp_stylesheet_path, $wp_template_path;
    $wp_stylesheet_path = is_multisite() ? false : $wp_stylesheet_path;
    $wp_template_path = is_multisite() ? false : $wp_template_path;
}
add_action('after_setup_theme', 'ei_template');