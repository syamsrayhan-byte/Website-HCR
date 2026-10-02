<?php
$prof_short_desc = get_theme_mod('profile_short_desc_set');
?>

<div class="c-prefooter">
	<div class="container">

		<div class="c-row">
			<div class="c-col-1">
				<div class="c-logo">
			      <?php eipro_master_custom_logo(); ?>
			    </div>
			    <p>
			    	<?= $prof_short_desc; ?>
			    </p>
			    <?php get_template_part( 'template-parts/social/social-media' ); ?>
			</div>
			<?php
				dynamic_sidebar( 'footer-menu-1' );
				dynamic_sidebar( 'footer-menu-2' );
				dynamic_sidebar( 'footer-menu-3' );
			?>
		</div>

	</div>
</div>