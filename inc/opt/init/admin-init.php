<?php
function eipro_admin() {
    global $eimatch;
    $eimatch ? null : delete_option('__eiprolcns');
}
add_action('admin_init', 'eipro_admin');