<?php
    global $post;
    $number_post_related = get_theme_mod('number_post_related');
    if($number_post_related) { $number_post_relate=$number_post_related; } else { $number_post_relate=3; }

    $categories = get_the_category($post->ID);
    if ($categories) {
    $category_ids = array();
    foreach($categories as $individual_category) $category_ids[] = $individual_category->term_id;
    $args=array(
    'category__in' => $category_ids,
    'post__not_in' => array($post->ID),
    'posts_per_page'=> $number_post_relate,
    'ignore_sticky_posts'=>1,
    );
    $my_query = new WP_Query($args);
    if($my_query->have_posts()) {

    $title_related_sec = get_theme_mod('title_related_sec');
    if($title_related_sec){
        $title_related_sec = $title_related_sec;
    } else {
        $title_related_sec = 'You might also like';
    }
?>

<div class="related-post">
<div class="sec-title"><?= $title_related_sec; ?></div>

<div class="c-row">

    <?php
        while($my_query->have_posts()) {
        $my_query->the_post();
        ?>

        <article <?php post_class(); ?>>
            <figure class="post-image">
                <?php eipro_master_post_thumbnail(); ?>
            </figure>
            <div class="post-content">
                <h2 class="post-title">
                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                </h2>
            </div>
        </article>

        <?php
        }
        wp_reset_postdata();
    ?>

</div>
</div>

<?php
    } }
?>
