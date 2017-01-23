<?php get_header(); ?>
	
	<!-- section -->
	<section class="main" role="main">
		<div class="wrapper">
		<h1><?php echo sprintf( __( '%s Search Results for ', 'dd' ), $wp_query->found_posts ); echo get_search_query(); ?></h1>
		
		<?php get_template_part('loop'); ?>
		
		<?php get_template_part('pagination'); ?>
		</div>
	</section>
	<!-- /section -->
	


<?php get_footer(); ?>