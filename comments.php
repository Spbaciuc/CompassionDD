<div class="comments" id="comments">
	<?php if (post_password_required()) : ?>
	<p><?php _e( 'Post is password protected. Enter the password to view any comments.', 'dd' ); ?></p>
</div>

	<?php return; endif; ?>

<?php if (have_comments()) : ?>
	<?php if ( is_singular() ) wp_enqueue_script( "comment-reply" ); ?>
	<h2><?php comments_number(); ?></h2>

	<ul>
		<?php wp_list_comments('type=comment&callback=ddcomments'); // Custom callback in functions.php ?>
	</ul>
	<?php paginate_comments_links(); ?>
<?php elseif ( ! comments_open() && ! is_page() && post_type_supports( get_post_type(), 'comments' ) ) : ?>
	
	<p><?php _e( 'Comments are closed here.', 'dd' ); ?></p>
	
<?php endif; ?>

<?php comment_form(); ?>
<script>
	jQuery(document).ready(function(){
		jQuery('.form-submit').append('<button type="submit" class="button button--wapasha button--round-s">Post Comment</button>');
		jQuery('#comments .submit').hide();
	});
</script>
</div>