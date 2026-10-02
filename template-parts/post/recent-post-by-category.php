<div class="container">

<?php
$post_typee = 'post';

$number_recent_post_by_cat = get_theme_mod('number_recent_post_by_cat');
$number_recent_post_bycat = $number_recent_post_by_cat ?: 5;
$numrecent_post_bycat = ($number_recent_post_by_cat >= 1 && $number_recent_post_by_cat <= 4) ? 999 : 5;

$include_cat_ids = get_theme_mod('include_cat_id');
if (!empty($include_cat_ids)) {
$include_cat_id = explode(',', $include_cat_ids);

// Get all the taxonomies for this post type
$taxonomiess = get_object_taxonomies(array('post_type' => $post_typee));

foreach ($taxonomiess as $taxonomyy) :
    
    // Gets every "category" (term) in this taxonomy to get the respective posts
    $terms = get_terms($taxonomyy, array('include' => $include_cat_id));
    $counter = 0;
    foreach ($terms as $term) : 
        $counter++;
        $class_cf_post = ($counter % 2 == 1) ? 'cf-post-left' : 'cf-post-right';
    ?>

        <?php
        $p_cat = array(
            'post_type' => $post_typee,
            'posts_per_page' => $number_recent_post_bycat,
            'tax_query' => array(
                array(
                    'taxonomy' => 'category',
                    'field' => 'slug',
                    'terms' => $term->slug,
                )
            )
        );
        $postcat = new WP_Query($p_cat);
 
        if ($postcat->have_posts()) :
        ?> 
        
        <div class="homepage-list">
            <div class="c-title-wrap">
                <div class="c-title"><?= $term->name; ?></div>
            </div>
            <?php
            while ($postcat->have_posts()) : $postcat->the_post();
                $current_post = $postcat->current_post;
                if ($current_post == 0) {
                    echo '<div class="'. $class_cf_post .'">';
                    get_template_part('template-parts/post/main-post-news');
                    echo '</div>';
                }
            endwhile;
            wp_reset_postdata();

            echo '<div class="c-post-group">';
            while ($postcat->have_posts()) : $postcat->the_post();
                $current_post = $postcat->current_post;
                if ($current_post != 0) {
                    get_template_part('template-parts/post/main-post-news');
                }
            endwhile;
            wp_reset_postdata();
            echo '</div>';
            ?>
            <div class="c-readmore">
            <?php
                $more_articles_text = (get_theme_mod('ei_custom_string_more_cat_articles') != '') ? get_theme_mod('ei_custom_string_more_cat_articles') : 'More %s Articles';
                $more_articles_text = sprintf($more_articles_text, $term->name);
                if ($term->count > $numrecent_post_bycat) {
                    echo '<a href="' . esc_url(get_term_link($term)) . '">' . esc_html($more_articles_text) . '</a>';
                }
            ?>
            </div>

            <?php //eipro_ads_code('top_ad'); ?>
        </div>

        <?php endif; ?>
 
    <?php endforeach;
 
endforeach;
}
?>

</div>