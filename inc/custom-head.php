<?php
$layout_set = get_theme_mod('layout_set');
$enable_darkmode = get_theme_mod('enable_darkmode');
$container_width_news = get_theme_mod('set_container_width_news');

$accent = get_theme_mod('accent');
$secondary_bg = get_theme_mod('secondary_bg');
$secondary_text = get_theme_mod('secondary_text');

$reset_default_font = get_theme_mod( 'reset_default_font' );
$set_css_font = get_theme_mod( 'set_css_font' );

$bg_color_cta = get_theme_mod('bg_color_cta');
$text_color_cta = get_theme_mod('text_color_cta');

$body_fontsize_single_post = get_theme_mod('body_fontsize_single_post');
$body_lineheight_single_post = get_theme_mod('body_lineheight_single_post');
$h1_fontsize_single_post = get_theme_mod('h1_fontsize_single_post');
$h1_lineheight_single_post = get_theme_mod('h1_lineheight_single_post');
$h2_fontsize_single_post = get_theme_mod('h2_fontsize_single_post');
$h2_lineheight_single_post = get_theme_mod('h2_lineheight_single_post');
$h3_fontsize_single_post = get_theme_mod('h3_fontsize_single_post');
$h3_lineheight_single_post = get_theme_mod('h3_lineheight_single_post');
$h4_fontsize_single_post = get_theme_mod('h4_fontsize_single_post');
$h4_lineheight_single_post = get_theme_mod('h4_lineheight_single_post');
$h5_fontsize_single_post = get_theme_mod('h5_fontsize_single_post');
$h5_lineheight_single_post = get_theme_mod('h5_lineheight_single_post');
$h6_fontsize_single_post = get_theme_mod('h6_fontsize_single_post');
$h6_lineheight_single_post = get_theme_mod('h6_lineheight_single_post');

$m_body_fontsize_single_post = get_theme_mod('m_body_fontsize_single_post');
$m_body_lineheight_single_post = get_theme_mod('m_body_lineheight_single_post');
$m_h1_fontsize_single_post = get_theme_mod('m_h1_fontsize_single_post');
$m_h1_lineheight_single_post = get_theme_mod('m_h1_lineheight_single_post');
$m_h2_fontsize_single_post = get_theme_mod('m_h2_fontsize_single_post');
$m_h2_lineheight_single_post = get_theme_mod('m_h2_lineheight_single_post');
$m_h3_fontsize_single_post = get_theme_mod('m_h3_fontsize_single_post');
$m_h3_lineheight_single_post = get_theme_mod('m_h3_lineheight_single_post');
$m_h4_fontsize_single_post = get_theme_mod('m_h4_fontsize_single_post');
$m_h4_lineheight_single_post = get_theme_mod('m_h4_lineheight_single_post');
$m_h5_fontsize_single_post = get_theme_mod('m_h5_fontsize_single_post');
$m_h5_lineheight_single_post = get_theme_mod('m_h5_lineheight_single_post');
$m_h6_fontsize_single_post = get_theme_mod('m_h6_fontsize_single_post');
$m_h6_lineheight_single_post = get_theme_mod('m_h6_lineheight_single_post');
?>
<style type="text/css">
	
	<?php if($container_width_news){ ?>
	@media only screen and (min-width: 576px) {
		.eipro-news .hide-p-sidebar .content.c-fullwidth.c-lnews .container, .eipro-news .hide-p-sidebar .content.c-fullwidth.c-lnews .elementor-section.elementor-section-boxed > .elementor-container {
		    max-width: <?= $container_width_news; ?>px !important;
		}
	}
	<?php } ?>

	.eipro-news .widget-area section.widget_eipro_popular_post_widget, .eipro-business .c-prefooter {
		background-image: url(<?= get_template_directory_uri() . '/assets/img/bg-footer-2.jpg'; ?>) !important;
	}

	body .table-of-contents li::before {
		content: url(<?= get_template_directory_uri() . '/assets/icon/angle-small-right.png'; ?>) !important;
	}
	html[data-applied-mode=dark] .table-of-contents li::before {
		content: url(<?= get_template_directory_uri() . '/assets/icon/angle-small-right-white.png'; ?>) !important;
	}

	@media only screen and (min-width: 1171px) {
		.c-trending-wrap {
			background-image: url(<?= get_template_directory_uri() . '/assets/img/bg-footer-2.jpg'; ?>) !important;
		}
	}

	<?php
	if($reset_default_font != true) {

		if($set_css_font){ ?>
		html body {
			font-family: <?= $set_css_font; ?> !important;
		}
		<?php } ?>

		<?php 
		if(is_single()){
		if($body_fontsize_single_post){ ?>
		html body.single-post .desc {
			font-size: <?= $body_fontsize_single_post; ?>px !important;
    		line-height: <?= $body_lineheight_single_post; ?>px !important;
		}

		<?php } if($h1_fontsize_single_post){ ?>
		body.single-post h1 {
			font-size: <?= $h1_fontsize_single_post; ?>px !important;
    		line-height: <?= $h1_lineheight_single_post; ?>px !important;
		}

		<?php } if($h2_fontsize_single_post){ ?>
		body.single-post .desc h2 {
			font-size: <?= $h2_fontsize_single_post; ?>px !important;
    		line-height: <?= $h2_lineheight_single_post; ?>px !important;
		}

		<?php } if($h3_fontsize_single_post){ ?>
		body.single-post .desc h3 {
			font-size: <?= $h3_fontsize_single_post; ?>px !important;
    		line-height: <?= $h3_lineheight_single_post; ?>px !important;
		}

		<?php } if($h4_fontsize_single_post){ ?>
		body.single-post .desc h4 {
			font-size: <?= $h4_fontsize_single_post; ?>px !important;
    		line-height: <?= $h4_lineheight_single_post; ?>px !important;
		}

		<?php } if($h5_fontsize_single_post){ ?>
		body.single-post .desc h5 {
			font-size: <?= $h5_fontsize_single_post; ?>px !important;
    		line-height: <?= $h5_lineheight_single_post; ?>px !important;
		}

		<?php } if($h6_fontsize_single_post){ ?>
		body.single-post .desc h6 {
			font-size: <?= $h6_fontsize_single_post; ?>px !important;
    		line-height: <?= $h6_lineheight_single_post; ?>px !important;
		}

		<?php } ?>
		<?php } ?>

		@media only screen and (max-width: 428px) {

			<?php
			if(is_single()){
			if($m_body_fontsize_single_post){ ?>
			html body.single-post .desc {
				font-size: <?= $m_body_fontsize_single_post; ?>px !important;
	    		line-height: <?= $m_body_lineheight_single_post; ?>px !important;
			}

			<?php } if($m_h1_fontsize_single_post){ ?>
			body.single-post h1 {
				font-size: <?= $m_h1_fontsize_single_post; ?>px !important;
	    		line-height: <?= $m_h1_lineheight_single_post; ?>px !important;
			}

			<?php } if($m_h2_fontsize_single_post){ ?>
			body.single-post .desc h2 {
				font-size: <?= $m_h2_fontsize_single_post; ?>px !important;
	    		line-height: <?= $m_h2_lineheight_single_post; ?>px !important;
			}

			<?php } if($m_h3_fontsize_single_post){ ?>
			body.single-post .desc h3 {
				font-size: <?= $m_h3_fontsize_single_post; ?>px !important;
	    		line-height: <?= $m_h3_lineheight_single_post; ?>px !important;
			}

			<?php } if($m_h4_fontsize_single_post){ ?>
			body.single-post .desc h4 {
				font-size: <?= $m_h4_fontsize_single_post; ?>px !important;
	    		line-height: <?= $m_h4_lineheight_single_post; ?>px !important;
			}

			<?php } if($m_h5_fontsize_single_post){ ?>
			body.single-post .desc h5 {
				font-size: <?= $m_h5_fontsize_single_post; ?>px !important;
	    		line-height: <?= $m_h5_lineheight_single_post; ?>px !important;
			}

			<?php } if($m_h6_fontsize_single_post){ ?>
			body.single-post .desc h6 {
				font-size: <?= $m_h6_fontsize_single_post; ?>px !important;
	    		line-height: <?= $m_h6_lineheight_single_post; ?>px !important;
			}

			<?php } ?>
			<?php } ?>
		}

	<?php } ?>
	:root {
		--color-primary: <?= $accent ?> !important;
		--color-secondary_bg: <?= $secondary_bg ?> !important;
		--color-secondary_text: <?= $secondary_text ?> !important;
	}
	body .content-single blockquote p a, .wp-calendar-nav-prev a, .wp-calendar-table td a, .custom-widget section.widget ul li a:hover, footer .copyright a, .tab-bar .bar-active a span, body .widget h5 .lbl-popular a, .single-post .content-single p a, .table-of-contents li a:hover, .content-page p a, html[data-applied-mode=dark] body.single-post .content-single .table-of-contents li:hover a, html[data-applied-mode=dark] body.single-post .content-single .table-of-contents li:hover {
		color: <?= $accent ?> !important;
	}
	body .content-single blockquote {
		border-color: <?= $accent ?> !important;
	}
	body.single-post .content-single .comments-area li a.comment-reply-link, body.single-post .content-single .comments-area li a.comment-reply-link:focus {
		background-color: <?= $accent ?>;
	}
	body .show-comments, body form input[type="submit"], .dataTables_wrapper .dataTables_paginate .paginate_button.current, .dataTables_wrapper .dataTables_paginate .paginate_button.current:hover, .popup-mobilemenu-area .m-cta .c-btn, .popup-mobilemenu-area .m-cta .c-btn:hover, .popup-mobilemenu-area .m-cta .c-btn:focus, body form select[name="search_taxonomy"] {
		background-color: <?= $accent ?> !important;
		border-color: <?= $accent ?> !important;
	}

	<?php if($bg_color_cta) { ?>
	.main-navigation .nav-right .c-btn, .main-navigation .nav-right .c-btn:hover, .main-navigation .nav-right .c-btn:focus {
		background-color: <?= $bg_color_cta ?> !important;
		color: <?= $text_color_cta ?> !important;
	}
	<?php } ?>

	<?php
	$hide_post_excerpt = get_theme_mod( 'set_hide_post_excerpt' );
	if($hide_post_excerpt == true) { ?>
		article .post-meta {
			margin-top: 15px;
		}
	<?php } ?>

	html[data-applied-mode=dark] .wp-calendar-table td a {
		background-color: <?= $accent ?> !important;
	    color: #ffffff !important;
	    border-radius: 100% !important;
	}
	html[data-applied-mode=dark] .table-of-contents .toc-headline::before {
	    content: url(<?= get_template_directory_uri() . '/assets/icon/list-white-update.svg'; ?>) !important;
	}
	.table-of-contents .toc-headline::before {
		content: url(<?= get_template_directory_uri() . '/assets/icon/list.svg';?>) !important;
	}

	@media only screen and (max-width: 428px) {
		<?php $logomobile_size = get_theme_mod('logomobile_size'); ?>
		.eipro-news .hide-p-sidebar .content.c-fullwidth .c-logo a img, body.eipro-news .c-profile.sidebar .c-logo img, .eipro-business .hide-p-sidebar .content.c-fullwidth .c-logo a img, body.eipro-business .c-profile.sidebar .c-logo img {
			width: calc(<?= ($logomobile_size=$logomobile_size?:'250px'); ?> / 2) !important;
			border-radius: 0;
		}
	}

</style>

<?php
if($layout_set != 'lbusiness'){
	if($enable_darkmode == true){
?>
<script type="text/javascript">
    const defaultMode = 'light';
	const theme = localStorage.getItem('theme') || defaultMode;
	document.documentElement.dataset.appliedMode = theme;
</script>
<?php } } ?>