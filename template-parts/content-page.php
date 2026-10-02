<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package eiPro_Master
 */

?>

<div class="content-page">
    
    <?php get_template_part( 'template-parts/post/title' ); ?>

    <div class="container">
        <?php
        while ( have_posts() ) :
            the_post();

            the_content();

        endwhile;
        ?>
    </div>

</div>