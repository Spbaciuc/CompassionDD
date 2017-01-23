		<?php global $data; ?>
			<div id="footerwidgets">
				<div class="wrapper">
					<div class="row">
						<div class="col-md-4 col-sm-6">
							<?php if(!function_exists('dynamic_sidebar') || !dynamic_sidebar('widget-area-1')){
								the_widget( 'WP_Widget_Recent_Posts' );
							} ?>
						</div>
						<div class="col-md-4 col-sm-6">
							<?php if(!function_exists('dynamic_sidebar') || !dynamic_sidebar('widget-area-2')){
								the_widget('WP_Widget_Categories');
							} ?>
						</div>
						<div class="col-md-4 col-sm-6">
							<?php if(!function_exists('dynamic_sidebar') || !dynamic_sidebar('widget-area-3')){
								the_widget( 'WP_Widget_Meta' );
							} ?>
						</div>
					</div>
				</div>
			</div>
			<!-- footer -->
			<footer class="footer" role="contentinfo">
				<div class="wrapper">
                    <p class="copyright">
                    	<?php if($data['footer_text']){ ?>
							<?php echo $data['footer_text']; ?>
						<?php }else{?>
                        	&copy; <?php echo date("Y"); ?> Copyright <?php bloginfo('name'); ?>.
                        <?php }; ?>
                    </p>
                	<div class="social">
                		<?php if($data['facebook']){ ?>
							<span><a href="<?php echo $data['facebook']; ?>" title="Facebook" class="st-icon-facebook-alt st-shape-r4"></a></span>
						<?php };?>
						<?php if($data['twitter']){ ?>
							<span><a href="<?php echo $data['twitter']; ?>" title="Twitter" class="st-icon-twitter st-shape-r4"></a></span>
						<?php };?>
						<?php if($data['linkedin']){ ?>
							<span><a href="<?php echo $data['linkedin']; ?>" title="LinkedIn" class="st-icon-linkedin st-shape-r4"></a></span>
						<?php };?>
						<?php if($data['pinterest']){ ?>
							<span><a href="<?php echo $data['pinterest']; ?>" title="Pinterest" class="st-icon-pinterest st-shape-r4"></a></span>
						<?php };?>
						<?php if($data['instagram']){ ?>
							<span><a href="<?php echo $data['instagram']; ?>" title="Instagram" class="st-icon-instagram st-shape-r4"></a></span>
						<?php };?>
						<?php if($data['youtube']){ ?>
							<span><a href="<?php echo $data['youtube']; ?>" title="YouTube" class="st-icon-youtube st-shape-r4"></a></span>
						<?php };?>
						<?php if($data['kickstarter']){ ?>
							<span><a href="<?php echo $data['kickstarter']; ?>" title="Kickstarter" class="st-icon-kickstarter st-shape-r4"></a></span>
						<?php };?>
						<?php if($data['email']){ ?>
							<span><a href="<?php echo $data['email']; ?>" title="Email" class="st-icon-email st-shape-r4"></a></span>
						<?php };?>
                	</div>
				</div>
			</footer>
			<!-- /footer -->
		</div>
		<!-- /wrapper -->
		<?php wp_footer(); ?>
		<?php if($data['google_analytics']){ ?>
			<?php echo $data['google_analytics']; ?>
		<?php };?>
	</body>
</html>