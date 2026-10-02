<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package eiPro_Master
 */

?>
    <?php
    $hide_footer = get_theme_mod( 'c_hide_footer' );
    $hide_menu = get_theme_mod( 'f_hide_menu' );
    $hide_copyright = get_theme_mod( 'f_hide_copyright' );
    $custom_txt_copyright = get_theme_mod( 'custom_txt_copyright' );
    $add_script_col_1 = get_theme_mod( 'f_add_script_col_1' );
    $hide_socmed = get_theme_mod( 'f_hide_socmed' );
    $custom_title_socmed = get_theme_mod( 'custom_title_socmed' );
    $add_script_col_2 = get_theme_mod( 'f_add_script_col_2' );

    $layout_set = get_theme_mod('layout_set');
    $enable_darkmode = get_theme_mod('enable_darkmode');

    $hide_search_form = get_theme_mod('set_hide_search_form');

    if ( $layout_set != 'lbusiness' ) {
        eipro_ads_code( 'bottom_ad' );
    }
    
    if($hide_footer != true) {
    ?>
    <footer class="c-footer">
        <?php
            $hide_prefooter = get_theme_mod('hide_prefooter');
            if($layout_set == 'lnews'){
                if($hide_prefooter != true){
                    get_template_part( 'template-parts/component/footer-news' );
                }
            }
            if($layout_set == 'lbusiness'){
                if($hide_prefooter != true){
                    get_template_part( 'template-parts/component/footer-business' );
                }
            }
        ?>
        <div class="container">
            <div class="c-row <?php if($hide_menu == true) {echo 'c-hide-menu';} ?>">

                <?php
                if($layout_set != 'lbusiness'){
                ?>
                <div class="col">
                    <div class="c-menu">
                        <?php
                            if($layout_set == 'lnews'){
                                echo '<div style="display: none;">Menu</div>';
                            }
                            if($hide_menu != true) {
                                wp_nav_menu(
                                    array(
                                        'container'      => '',
                                        'theme_location' => 'bottom-menu',
                                        'menu_class'     => '',
                                        'add_li_class'   => '',
                                    )
                                );
                            }
                        ?>
                    </div>
                    <?php if($add_script_col_1) { echo '<div class="c-script">' . $add_script_col_1 . '</div>'; } ?>
                </div>
                <?php } ?>

                <div class="col">

                    <?php if($hide_copyright != true) { ?>
                    <p class="copyright">
                        <?php if($custom_txt_copyright) { echo $custom_txt_copyright; } else { ?>
                        Copyright © <?= (int)date('Y'); ?> <a href="<?= site_url(); ?>"><?php bloginfo( 'name' ); ?></a>. All Right Reserved.
                        <?php } ?>
                    </p>
                    <?php } ?>

                    <?php if($add_script_col_2) { echo '<div class="c-script copyright">' . $add_script_col_2 . '</div>'; } ?>

                </div>
            </div>
        </div>
    </footer>
    <?php } ?>

    <?php
    if ($hide_search_form != true) {
        get_template_part( 'template-parts/modal/search-form' );
    }
    ?>

    <?php
        $enable_popup = get_theme_mod( 'enable_popup' );
        $placement_popup = get_theme_mod('placement_popup_set');
        
        if($enable_popup == true) {
            if($placement_popup == 'pop_home') {
                if($layout_set == 'lbusiness') {
                    if(is_front_page() && !is_home()){
                        get_template_part( 'template-parts/modal/c-modal' );
                    }
                } else {
                    if(is_home()){
                        get_template_part( 'template-parts/modal/c-modal' );
                    }
                }
            } else if($placement_popup == 'pop_singlepost') {
                if(is_single()){
                    get_template_part( 'template-parts/modal/c-modal' );
                }
            } else {
                get_template_part( 'template-parts/modal/c-modal' );
            }
        }
    ?>
    
</div> <!-- .content -->
</div> <!-- .wrapper -->

<?php
if($layout_set == 'lbusiness'){
$hide_chat_wa = get_theme_mod('hide_chat_wa');
$hide_back_to_top = get_theme_mod('hide_back_to_top');
?>

<?php
if($hide_chat_wa == true){
if($hide_back_to_top != true){
?>
<div class="back-to-top">
    <span><svg xmlns="http://www.w3.org/2000/svg" id="Bold" viewBox="0 0 24 24" width="512" height="512"><path d="M22.5,18a1.5,1.5,0,0,1-1.061-.44L13.768,9.889a2.5,2.5,0,0,0-3.536,0L2.57,17.551A1.5,1.5,0,0,1,.449,15.43L8.111,7.768a5.505,5.505,0,0,1,7.778,0l7.672,7.672A1.5,1.5,0,0,1,22.5,18Z"/></svg></span>
</div>
<?php }} ?>

<?php if($hide_chat_wa != true){
    $placement_chat_wa = get_theme_mod('placement_chat_wa');
    if($placement_chat_wa == 'chat_wa_home') {
        if(is_front_page()){
            float_chat_wa();
        }
    } else if($placement_chat_wa == 'chat_wa_singlepage') {
        if(is_page()){
            float_chat_wa();
        }
    } else {
        float_chat_wa();
    }
} ?>

<?php } ?>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

<?php wp_footer(); ?>

<?php if(is_page("sitemap")): ?>
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script>
<script type="text/javascript">
  jQuery(document).ready( function () {
      jQuery('#table_id').DataTable( {
        "processing": true,
        "serverSide": true,
        "ajax": {
            "url": "<?php echo admin_url('admin-ajax.php'); ?>",
            "type": "POST",
            "data": {
                "action": "custom_table_data"
            }
        },
        "paging": true,
        "pageLength": 10,
        "lengthMenu": [10, 25, 50, 100],
        "searching": true,
        "ordering": true,
        columnDefs: [ { orderable: false, targets: 2 } ],
        'order': [[ 1, 'desc' ]]
      } );
      <?php $custom_type_here_text = get_theme_mod('ei_custom_string_type_here'); ?>
      jQuery(".dataTables_wrapper .dataTables_filter input").attr("placeholder","<?php echo esc_html(!empty($custom_type_here_text) ? $custom_type_here_text : 'Type here...'); ?>");
  } );
</script>
<?php endif; ?>

<script type="text/javascript">
    <?php
    $layout_set = get_theme_mod('layout_set');
    if($layout_set == 'lbusiness' || $layout_set == 'lnews'){
    ?>
    
    var space_content = jQuery(".hide-p-sidebar .content.c-fullwidth .main-navigation").height();
    jQuery(".widget-area.c-sticky-on, .c-float-ad-left, .c-float-ad-right, .c-float-ads>.container, .eipro-tabs-sticky, .eipro-price-sticky").css("top", space_content+65);
    jQuery(".eipro-tabs-wrap.e-tabs-sticky").css("top", space_content+40);
    jQuery("html").css("scroll-padding-top", space_content+60);
    jQuery('html').css('--dynamic-navbar-height', (space_content+40)+'px');

    var container_width = jQuery(".eipro-news .hide-p-sidebar .content.c-fullwidth.c-lnews .container").width();
    jQuery(".c-float-ads").css("width", container_width);
    jQuery(".c-float-ad-right").css("margin-left", container_width+20);

    jQuery(window).on('load resize', function () {

    var space_content = jQuery(".hide-p-sidebar .content.c-fullwidth .main-navigation").height();
    jQuery(".widget-area.c-sticky-on, .c-float-ad-left, .c-float-ad-right, .c-float-ads>.container, .eipro-tabs-sticky, .eipro-price-sticky").css("top", space_content+65);
    jQuery(".eipro-tabs-wrap.e-tabs-sticky").css("top", space_content+40);
    jQuery("html").css("scroll-padding-top", space_content+60);
    jQuery('html').css('--dynamic-navbar-height', (space_content+40)+'px');

    var container_width = jQuery(".eipro-news .hide-p-sidebar .content.c-fullwidth.c-lnews .container").width();
    jQuery(".c-float-ads").css("width", container_width);
    jQuery(".c-float-ad-right").css("margin-left", container_width+20);

    });

    <?php } else { ?>
    var space_content = jQuery(".main-navigation").height();
    jQuery('html').css('--dynamic-navbar-height', (space_content+28)+'px');
    jQuery(window).on('load resize', function () {
    jQuery('html').css('--dynamic-navbar-height', (space_content+28)+'px');
    });
    <?php } ?>

    <?php
    if($layout_set == 'lnews'){
    if(get_theme_mod('enable_trending_news') == true) {
    ?>
    var logo_width = jQuery(".ltrending .c-logo").width();
    var title_width = jQuery(".c-trending-wrap .c-trending-title").width();
    jQuery(".ltrending .c-trending-wrap").css("width", "calc(100% - " + (logo_width + 35) + "px)");
    jQuery(".ltrending .c-trending-display-area").css("padding-left", title_width+9);

    jQuery(window).on('load resize', function () {
    var logo_width = jQuery(".ltrending .c-logo").width();
    var title_width = jQuery(".c-trending-wrap .c-trending-title").width();
    jQuery(".ltrending .c-trending-wrap").css("width", "calc(100% - " + (logo_width + 35) + "px)");
    jQuery(".ltrending .c-trending-display-area").css("padding-left", title_width+9);
    });
    <?php }} ?>

    <?php
    $img_zoom = get_theme_mod( 'set_imgzoomeffect' );
    if ( $img_zoom == true && is_singular() ) {
        if(wp_is_mobile()){ $m_zoom=23; } else { $m_zoom=100; } ?>
        mediumZoom('.single-post .content-single p>img, .single-post .content-single figure>img, .eipro-d-desc-wrap figure>img', {
          margin: <?= $m_zoom; ?>,
          background: '#000000'
        });
    <?php } ?>

    <?php
    $data_ad_client = get_theme_mod( 'set_data_ad_client' );
    $enable_lazyload_adsense = get_theme_mod( 'enable_lazyload_adsense' );
    if($enable_lazyload_adsense == true) {
    ?>
    //<![CDATA[
    var lazyadsense2 = false;
    window.addEventListener("scroll", function(){
    if ((document.documentElement.scrollTop != 0 && lazyadsense2 === false) || (document.body.scrollTop != 0 && lazyadsense2 === false)) {
    (function() { var ad = document.createElement('script'); ad.setAttribute('data-ad-client','ca-<?= $data_ad_client; ?>'); ad.async = true; ad.src = 'https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js'; var sc = document.getElementsByTagName('script')[0]; sc.parentNode.insertBefore(ad, sc); })();
    lazyadsense2 = true;
      }
    }, true);
    //]]>
    <?php } ?>

    <?php
    $enable_popup = get_theme_mod( 'enable_popup' );
    $delay_pop = get_theme_mod( 'set_delay_popup' );
    $placement_popup = get_theme_mod('placement_popup_set');
    
    if($enable_popup == true) {
        if($delay_pop) { $delay_pop = $delay_pop; } else { $delay_pop = 10; }

        if($placement_popup == 'pop_home') {
            if($layout_set == 'lbusiness'){
                if(is_front_page() && !is_home()){ ?>
                        window.setTimeout(function(){
                            jQuery('.c-modal, .c-modal-backdrop').addClass('show');
                            jQuery('body').addClass('c-modal-open');
                        }, <?= $delay_pop . '000'; ?>);
                        jQuery('.c-modal-content span.c-close, .close-overlay, .c-modal-hide').click(function() {
                            jQuery('.c-modal, .c-modal-backdrop').removeClass('show');
                            jQuery('body').removeClass('c-modal-open');
                        });
                <?php }
            } else {
                if(is_home()){ ?>
                        window.setTimeout(function(){
                            jQuery('.c-modal, .c-modal-backdrop').addClass('show');
                            jQuery('body').addClass('c-modal-open');
                        }, <?= $delay_pop . '000'; ?>);
                        jQuery('.c-modal-content span.c-close, .close-overlay, .c-modal-hide').click(function() {
                            jQuery('.c-modal, .c-modal-backdrop').removeClass('show');
                            jQuery('body').removeClass('c-modal-open');
                        });
                <?php }
            }
        } else if($placement_popup == 'pop_singlepost') {
            if(is_single()){ ?>
                window.setTimeout(function(){
                    jQuery('.c-modal, .c-modal-backdrop').addClass('show');
                    jQuery('body').addClass('c-modal-open');
                }, <?= $delay_pop . '000'; ?>);
                jQuery('.c-modal-content span.c-close, .close-overlay, .c-modal-hide').click(function() {
                    jQuery('.c-modal, .c-modal-backdrop').removeClass('show');
                    jQuery('body').removeClass('c-modal-open');
                });
        <?php }
        } else { ?>
            window.setTimeout(function(){
                jQuery('.c-modal, .c-modal-backdrop').addClass('show');
                jQuery('body').addClass('c-modal-open');
            }, <?= $delay_pop . '000'; ?>);
            jQuery('.c-modal-content span.c-close, .close-overlay, .c-modal-hide').click(function() {
                jQuery('.c-modal, .c-modal-backdrop').removeClass('show');
                jQuery('body').removeClass('c-modal-open');
            });
        <?php } } ?>


    <?php
    if($layout_set != 'lbusiness'){
        if($enable_darkmode == true){
    ?>
    const defaultDarkMode = 'light';
    function getUserPreference() {
        return localStorage.getItem("theme") || defaultDarkMode;
    }
    function saveUserPreference(userPreference) {
        localStorage.setItem("theme", userPreference);
    }
    function getAppliedMode(userPreference) {
        if (userPreference === "dark") {
            return "dark";
        }
        if (userPreference === "light") {
            return "light";
        }
        return defaultDarkMode;
    }
    function setAppliedMode(mode) {
        document.documentElement.dataset.appliedMode = mode;
    }
    function rotatePreferences(userPreference) {
        if (userPreference === "light") {
            return "dark";
        }
        if (userPreference === "dark") {
            return "light";
        }
        return defaultDarkMode;
    }
    const themeTogglers = document.querySelectorAll(".c-dark-mode");
    let userPreference = getUserPreference();
    setAppliedMode(getAppliedMode(userPreference));
    setTimeout(() => {
        themeTogglers.forEach(themeToggler => {
            themeToggler.onclick = () => {
                const newUserPref = rotatePreferences(userPreference);
                userPreference = newUserPref;
                saveUserPreference(newUserPref);
                setAppliedMode(getAppliedMode(newUserPref));
            };
        });
    }, 1000);
    <?php } } ?>

</script>

<?php
if($layout_set == 'lbusiness'){
$hide_chat_wa = get_theme_mod('hide_chat_wa');
$placement_chat_wa = get_theme_mod('placement_chat_wa');
if($hide_chat_wa != true){

    if($placement_chat_wa == 'chat_wa_home') {
        if(is_front_page()){
            direct_whatsapp_chat();
        }
    } else if($placement_chat_wa == 'chat_wa_singlepage') {
        if(is_page()){
            direct_whatsapp_chat();
        }
    } else {
        direct_whatsapp_chat();
    }

}}
?>

<?php eipro_add_custom_script( 'body' ); ?>

<?php
$wp_default_comment = get_theme_mod( 'enable_wp_default_comment' );
$shortname = get_theme_mod('shortname');
if($layout_set == 'lnews'){
if($wp_default_comment != true){
    if($shortname){?>
        <script id="dsq-count-scr" src="//<?= $shortname; ?>.disqus.com/count.js" async></script>
    <?php }
}
}
?>

</body>
</html>
