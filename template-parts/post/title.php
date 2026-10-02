<?php
$layout_set = get_theme_mod('layout_set');
$hide_author_box = get_theme_mod('set_hide_author_box');
if ( is_front_page() ) {

} elseif ( is_home() ) {

	if ( $layout_set == 'lbusiness' ) {
		$hide_c_blogtitle = get_theme_mod('hide_c_blogtitle');
	    $blogtitle = get_theme_mod('blogtitle');
	    if($blogtitle){$c_blogtitle = $blogtitle;} else {$c_blogtitle = 'Explore Articles';}
	    if($hide_c_blogtitle != true){
	?>
		<div class="title">
			<div class="container">
				<h1><?= $c_blogtitle; ?></h1>
			</div>
		</div>

	<?php } }

} elseif ( is_author() ) {

	if ( $layout_set == 'lbusiness' ) {
		if ( $hide_author_box != true ) {
			get_template_part( 'template-parts/post/author' );
		}
	}

} else {
?>

<div class="title">
	<div class="container">
		<h1>
			<?php
				if ( is_search() ) {
            		$search_text = (get_theme_mod('ei_custom_string_search_results_for') != '') ? get_theme_mod('ei_custom_string_search_results_for') : 'Search Results for:';
            		printf( esc_html__( '%s %s', 'eipro-master' ), $search_text, '<span>"' . get_search_query() . '"</span>' );
            	} elseif ( is_category() ) {
            		printf( esc_html__( '%s', 'eipro-master' ), single_term_title( '', false ) );
            	} elseif ( is_tag() ) {
            		printf( esc_html__( '%s', 'eipro-master' ), single_term_title( '', false ) );
            	} elseif ( is_author() ) {
            		$c_author = get_queried_object();
            		echo 'Author: <span>' . $c_author->display_name . '</span>';
            	} else {
            		the_title();
            	}
			?>
		</h1>
		<?php
		$archive_desc = get_the_archive_description();
		if(is_category() || is_tag()){
			if($archive_desc){
				echo '<div class="c-taxonomy-description">' . $archive_desc . '</div>';
			}
		}
		?>
	</div>
</div>

<?php
	if ( $layout_set == 'lbusiness' ) {
		if ( is_search() ) {
			if ( have_posts() ) {} else {
			  $title_recently_sec = get_theme_mod('title_recently_sec');
			  if($title_recently_sec){
			      $title_recently_sec = $title_recently_sec;
			  } else {
			      $title_recently_sec = 'Recently';
			  }
			  echo '<div class="c-alert">' . (get_theme_mod('ei_custom_string_search_no_results') != '' ? get_theme_mod('ei_custom_string_search_no_results') : 'Sorry, but nothing matched your search terms.') . '</div>';
			  echo '<div class="sec-title">'. $title_recently_sec .'</div>';
			}
		}
	}
}

if(is_home() || is_author() || is_search() || is_category() || is_tag()) {
	if ( $layout_set == 'lbusiness' ) {
		eipro_ads_code( 'top_ad' );
	}
}
?>
