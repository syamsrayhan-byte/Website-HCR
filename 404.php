<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package eiPro_Master
 */

get_header();
?>

	<div class="c-404">
        <div class="container">
            <h1 style="margin-bottom: 10px !important;">
                <?php
                $custom_text1 = get_theme_mod('ei_custom_string_404');
                echo esc_html(!empty($custom_text1) ? $custom_text1 : '404');
                ?>
            </h1>
            <h2>
                <?php
                $custom_text2 = get_theme_mod('ei_custom_string_page_not_found');
                echo esc_html(!empty($custom_text2) ? $custom_text2 : 'Page not found!');
                ?>
            </h2>
            <p>
                <?php
                $custom_text3 = get_theme_mod('ei_custom_string_error404');
                echo esc_html(!empty($custom_text3) ? $custom_text3 : 'Sorry, the page you were looking for was not found.');
                ?>
            </p>
            <center>
                <a href="<?= site_url(); ?>" class="c-btn">
                    <?php
                    $custom_text4 = get_theme_mod('ei_custom_string_back_home');
                    echo esc_html(!empty($custom_text4) ? $custom_text4 : 'Back Home');
                    ?>
                </a>
            </center>
        </div>
    </div>

<?php
get_footer();