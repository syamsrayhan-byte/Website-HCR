<div class="search-form">
	<div class="container">
		<form role="search" method="get" action="<?= site_url(); ?>" autocomplete="off">
		    <select id="cat" name="category">
		      <option value="" selected="selected">
			      <?php
	                $custom_all_categories = get_theme_mod('ei_custom_string_all_categories');
	                echo esc_html(!empty($custom_all_categories) ? $custom_all_categories : 'All categories');
	              ?>
			  </option>
		      <?php
		      $categories = get_categories( array(
		          'parent'  => 0
		      ) );
		      ?>
		      <?php foreach($categories as $cat) {
		      ?>
		      <option value="<?= $cat->slug; ?>"><?= $cat->name; ?></option>
		      <?php } ?>
		    </select>
		    <?php $custom_search_text = get_theme_mod('ei_custom_string_search_here'); ?>
		  	<input type="hidden" name="post_type" value="post">
		    <input type="text" id="search" name="s" placeholder="<?php echo esc_html(!empty($custom_search_text) ? $custom_search_text : 'Search here...'); ?>">
		  	<button type="submit" class="pointer">
		  		<?= file_get_contents(get_template_directory() . "/assets/icon/search.svg"); ?>
		  		<span>
			  		<?php _e('Search', 'eipro-master'); ?>
			  	</span>
		  	</button>
		  	<span class="c-close">
		      <span><?= file_get_contents(get_template_directory() . "/assets/icon/close.svg"); ?></span>
		    </span>
	  	</form>
	</div>
</div>
<div class="search-overlay"></div>