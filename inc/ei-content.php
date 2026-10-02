<?php
function ei_import_files() {

  global $eion;

  $layout_set = get_theme_mod('layout_set');
  if ( $layout_set == 'lbusiness' ){
    return $eion ? array(
      array(
        'import_file_name'           => 'Business - Import Demo',
        'categories'                 => array( 'Business' ),
        'local_import_file'            => trailingslashit( get_template_directory() ) . 'inc/content/eipro-business-all-content.xml',
        'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'inc/content/eipro-business-all-customizer.dat',

        'import_preview_image_url'   => site_url() . '/wp-content/themes/eipro-master/assets/img/business-with-content.png',
      ),
    ) : [];
  } elseif ( $layout_set == 'lnews' ) {
    return $eion ? array(
      array(
        'import_file_name'           => 'News - Import Demo (With Content)',
        'categories'                 => array( 'News' ),
        'local_import_file'            => trailingslashit( get_template_directory() ) . 'inc/content/eipro-news-all-content.xml',
        'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'inc/content/eipro-news-all-customizer.dat',

        'import_preview_image_url'   => site_url() . '/wp-content/themes/eipro-master/assets/img/news-with-content.png',
      ),
      array(
        'import_file_name'           => 'News - Import Demo (Without Content)',
        'categories'                 => array( 'News' ),
        'local_import_file'            => trailingslashit( get_template_directory() ) . 'inc/content/eipro-news-content.xml',
        'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'inc/content/eipro-news-customizer.dat',
        
        'import_preview_image_url'   => site_url() . '/wp-content/themes/eipro-master/assets/img/news-without-content.png',
      ),
    ) : [];
  } else {
    return $eion ? array(
      array(
        'import_file_name'           => 'Personal - Import Demo (With Content)',
        'categories'                 => array( 'Personal' ),
        'local_import_file'            => trailingslashit( get_template_directory() ) . 'inc/content/eipro-all-content.xml',
        'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'inc/content/eipro-all-customizer.dat',

        'import_preview_image_url'   => site_url() . '/wp-content/themes/eipro-master/assets/img/personal-with-content.png',
      ),
      array(
        'import_file_name'           => 'Personal - Import Demo (Without Content)',
        'categories'                 => array( 'Personal' ),
        'local_import_file'            => trailingslashit( get_template_directory() ) . 'inc/content/eipro-content.xml',
        'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'inc/content/eipro-customizer.dat',
        
        'import_preview_image_url'   => site_url() . '/wp-content/themes/eipro-master/assets/img/personal-without-content.png',
      ),
    ) : [];
  }
  
}
add_filter( 'ocdi/import_files', 'ei_import_files' );


function ocdi_after_import_setup() {

  $layout_set = get_theme_mod('layout_set');
  if ( $layout_set == 'lbusiness' ){
    $main_menu = get_term_by( 'name', 'Main', 'nav_menu' );
    $mobile_menu = get_term_by( 'name', 'Mobile', 'nav_menu' );
    set_theme_mod( 'nav_menu_locations', array(
            'top-menu' => $main_menu->term_id,
            'mobile-menu' => $mobile_menu->term_id,
        )
    );
  } elseif ( $layout_set == 'lnews' ) {
    $top_bar_menu = get_term_by( 'name', 'Top Bar', 'nav_menu' );
    $main_menu = get_term_by( 'name', 'Main', 'nav_menu' );
    $bottom_menu = get_term_by( 'name', 'Bottom', 'nav_menu' );
    $mobile_menu = get_term_by( 'name', 'Mobile', 'nav_menu' );
    set_theme_mod( 'nav_menu_locations', array(
            'top-bar-menu' => $top_bar_menu->term_id,
            'top-menu' => $main_menu->term_id,
            'bottom-menu' => $bottom_menu->term_id,
            'mobile-menu' => $mobile_menu->term_id,
        )
    );
  } else {
    $main_menu = get_term_by( 'name', 'Main', 'nav_menu' );
    $bottom_menu = get_term_by( 'name', 'Bottom', 'nav_menu' );

    set_theme_mod( 'nav_menu_locations', array(
            'top-menu' => $main_menu->term_id,
            'bottom-menu' => $bottom_menu->term_id,
        )
    );
  }

}
add_action( 'ocdi/after_import', 'ocdi_after_import_setup' );
