<?php
$title_trending = get_theme_mod('title_trending_news') ?: 'Trending :';
$number_post_trending_news = get_theme_mod('number_post_trending_news') ?: 5;
$trending_time_period = get_theme_mod('trending_time_period_news');

$popular_args = array(
    'post_type' => 'post',
    'meta_key' => 'post_views_count',
    'orderby' => 'meta_value_num',
    'order' => 'DESC',
    'numberposts' => $number_post_trending_news,
);

if ($trending_time_period) {
    $popular_args['date_query'] = array(
        array(
            'after' => '1 ' . substr($trending_time_period, 2) . ' ago',
        ),
    );
}

$popular_posts = get_posts($popular_args);
?>
<div class="c-trending-wrap">
    <div class="c-trending-title"><?= $title_trending; ?></div>
    <div class="c-trending-display-area">

        <?php
        if ($popular_posts) {
            foreach ($popular_posts as $post) {
                setup_postdata($post); ?>
                <a href="<?= get_permalink($post->ID); ?>" class="c-text-slide"><?= get_the_title($post->ID); ?></a>
            <?php }
            wp_reset_postdata();
        } else {
            esc_html_e('No popular posts within this time range.', 'eipro-master');
        }
        ?>
    </div>
</div>