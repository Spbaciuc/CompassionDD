<?php get_header(); ?>
	
	<!-- section -->
	<section class="main" role="main">
		<div class="wrapper">
		<h1><?php _e( 'Archives', 'dd' ); ?></h1>
	
		<?php get_template_part('loop'); ?>
		
		<?php get_template_part('pagination'); ?>
		</div>
	</section>
	<!-- /section -->
	


<?php get_footer(); ?>