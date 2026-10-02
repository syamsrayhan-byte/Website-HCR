<div class="c-modal">
  <div class="c-modal-dialog">
    <div class="c-modal-content">
      <span class="c-close">
        <span><?= file_get_contents(get_template_directory() . "/assets/icon/close.svg"); ?></span>
      </span>
      <div class="c-modal-body">

      <?php
        echo do_shortcode(get_theme_mod( 'setting_popup' ));
      ?>
        
      </div>
      <div class="close-overlay"></div>
    </div>
  </div>
</div>
<div class="c-modal-backdrop"></div>