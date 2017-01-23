<?php get_header(); ?>
	
	<!-- section -->
	<section class="main" role="main">
		<div class="wrapper">
			<?php if (have_posts()): while (have_posts()) : the_post(); ?>
			
				<!-- article -->
				<article class="content" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				
					<!-- post thumbnail -->
					<?php if ( has_post_thumbnail()) : // Check if Thumbnail exists ?>
						<?php the_post_thumbnail(); // Fullsize image for the single post ?>
					<?php endif; ?>
					<!-- /post thumbnail -->
					
					<!-- post title -->
					<h1>
						<?php the_title(); ?>
					</h1>
					<!-- /post title -->
					
					<!-- post details -->
					<p class="post_details">
					<span class="date"><?php the_time('F j, Y'); ?> <?php the_time('g:i a'); ?> | </span>
					<span class="author"><?php _e( 'Published by', 'dd' ); ?> <?php the_author_posts_link(); ?> | </span>
					<span class="comments"><?php comments_popup_link( __( 'Leave your thoughts', 'journal' ), __( '1 Comment', 'journal' ), __( '% Comments', 'journal' ), 'comments-link', ''); ?></span>
					</p>
					<!-- /post details -->
					
					<?php the_content(); // Dynamic Content ?>
					
					<p class="post_details">
							<span><?php the_tags( __( '', 'dd' ), ', ', ' | '); // Separated by commas with a line break at the end ?></span>
						<?php if(get_the_category() != ''){ ?>
							<span><?php _e( ' ', 'dd' ); the_category(', '); // Separated by commas ?></span>
						<?php }; ?>	
						
					</p>
					<?php edit_post_link(); // Always handy to have Edit Post Links available ?>
					
					<?php comments_template(); ?>
					
				</article>
				<!-- /article -->
				
			<?php endwhile; ?>
			
			<?php else: ?>
			
				<!-- article -->
				<article class="content">
					
					<h1><?php _e( 'Sorry, nothing to display.', 'dd' ); ?></h1>
					
				</article>
				<!-- /article -->
			
			<?php endif; ?>
			
		</div>
	</section>
	<!-- /section -->

<?php get_footer(); ?>