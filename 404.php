<?php get_header(); ?>



	<!-- section -->

	<section role="main">
		<div class="wrapper">
	

		<!-- article -->

		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

		

			<h1><?php _e( 'Page not found', 'dd' ); ?></h1>

			<h2>

				<a href="<?php echo home_url(); ?>"><?php _e( 'Return home?', 'dd' ); ?></a>

			</h2>

			

		</article>

		<!-- /article -->

		</div>

	</section>

	<!-- /section -->

	





<?php get_footer(); ?>