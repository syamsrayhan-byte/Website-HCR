<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package eiPro_Master
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<?php
$wp_default_comment = get_theme_mod( 'enable_wp_default_comment' );
if ( $wp_default_comment == true ) { ?>

    <div id="comments" class="comments-area <?php if(have_comments()){}else{ echo 'no-comment';} ?>">

    <?php
    // You can start editing here -- including this comment!
    if ( have_comments() ) :
        ?>
        <h2 class="comments-title">
            <?php
            $eipro_comment_count = get_comments_number();
            $one_thought_text = (get_theme_mod('ei_custom_string_one_thought_on') != '') ? get_theme_mod('ei_custom_string_one_thought_on') : 'One thought on';
            $thoughts_on_text = (get_theme_mod('ei_custom_string_thoughts_on') != '') ? get_theme_mod('ei_custom_string_thoughts_on') : 'thoughts on';
            if ( '1' === $eipro_comment_count ) {
                printf(
                    /* translators: 1: title. */
                    '%s &ldquo;%s&rdquo;',
                    esc_html( $one_thought_text ),
                    '<span>' . wp_kses_post( get_the_title() ) . '</span>'
                );
            } else {
                printf( 
                    /* translators: 1: comment count number, 2: title. */
                    esc_html( _nx( '%1$s %2$s &ldquo;%3$s&rdquo;', '%1$s %2$s &ldquo;%3$s&rdquo;', $eipro_comment_count, 'comments title' ) ),
                    number_format_i18n( $eipro_comment_count ), // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
                    esc_html( $thoughts_on_text ),
                    '<span>' . wp_kses_post( get_the_title() ) . '</span>'
                );
            }
            ?>
        </h2><!-- .comments-title -->

        <?php the_comments_navigation(); ?>

        <ul class="comment-list">
            <?php
            wp_list_comments(
                array(
                    'style'      => 'ul',
                    'short_ping' => true,
                )
            );
            ?>
        </ul><!-- .comment-list -->

        <?php
        the_comments_navigation();

        // If comments are closed and there are comments, let's leave a little note, shall we?
        if ( ! comments_open() ) :
            ?>
            <p class="no-comments">
                <?php
                $no_comments = get_theme_mod('ei_custom_string_comments_are_closed');
                echo esc_html(!empty($no_comments) ? $no_comments : 'Comments are closed.');
                ?>
            </p>
            <?php
        endif;

    endif; // Check for have_comments().

    comment_form();
    ?>

</div><!-- #comments -->

<?php
} else {

$shortname = get_theme_mod('shortname');
if (comments_open()) :
    if ($shortname) :
?>
<div id="disqus_thread">
    <center>
        <a href="#" onclick="disqus();return false;" class="c-btn show-comments">
            <?php
            $show_comments = get_theme_mod('ei_custom_string_show_comments');
            echo esc_html(!empty($show_comments) ? $show_comments : 'Show Comments');
            ?>
        </a>
    </center>
</div>
<script type="text/javascript">
    function disqus() {
        var d = document, s = d.createElement('script');
        s.src = '//<?= $shortname ?>.disqus.com/embed.js';
        s.setAttribute('data-timestamp', +new Date());
        (d.head || d.body).appendChild(s);
    }
</script>
<?php 
endif; endif; }
 ?>

