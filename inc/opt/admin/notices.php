<?php
function ei_is_multisite() {
    $message = sprintf(esc_html__('eiPro theme can\'t running on multisite, please change to single site version.', 'eipro-master'));
    $html_message = sprintf('<div class="error"><p>%s</p></div>', wpautop($message));
    echo is_multisite() ? wp_kses_post($html_message) : false;
}
add_action('admin_notices', 'ei_is_multisite');