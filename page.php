<?php get_header(); ?>
	<!-- section -->
	<section role="main">
	
	<?php if (have_posts()): while (have_posts()) : the_post(); ?>
		<?php $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>
		<div class="title-header" <?php if ($url != ''){ echo 'style="background-image: url('.$url.');"';}; ?>>
			<div class="wrapper">
				<h1><?php the_title(); ?></h1>

			</div>
		</div>
		<!-- wrapper -->
        <div class="wrapper">
        	<div class="content">
	            
	            <?php the_content(); ?>
	                        
	            <br class="clear">
	            
	            <?php edit_post_link(); ?>
        	</div>

            
        </div>
		
	<?php endwhile; ?>
	
	<?php else: ?>
	
		<!-- wrapper -->
        <div class="wrapper">
			
			<h2><?php _e( 'Sorry, nothing to display.', 'dd' ); ?></h2>
			
			
		</div>
	
	<?php endif; ?>
	
	</section>
	<!-- /section -->
	
<?php get_footer(); ?>