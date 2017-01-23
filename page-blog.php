<?php
/*
Template Name: Blog Template
*/
get_header(); ?>
<?php query_posts('post_type=post&post_status=publish&paged='. get_query_var('paged')); ?>
	<!-- section -->
	<section class="main" role="main">
		<div class="wrapper">
		<h1><?php _e( 'Blog', 'dd' ); ?></h1>
	
		<?php get_template_part('loop'); ?>
		
		<?php get_template_part('pagination'); ?>
		</div>
	</section>
	<!-- /section -->
	


<?php get_footer(); ?>