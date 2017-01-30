<?php global $data; ?>
<?php get_header(); ?>
<style type="text/css">
	<?php if($data['custom_bgone']){ ?>
		#header { background-image: url(<?php echo $data['custom_bgone']; ?>);}
	<?php };?>

	<?php if($data['custom_bgtwo']){ ?>
		#sectionone { background-color: <?php echo $data['custom_bgtwo']; ?>;}
	<?php };?>
	<?php if($data['custom_bgthree']){ ?>
		#sectiontwo { background-image: url(<?php echo $data['custom_bgthree']; ?>);}
	<?php };?>
</style>	
	<!-- section -->
	<section id="header">
		<div class="wrapper">
			<h1> 
				<?php if($data['header_text']){ ?>
					<?php echo $data['header_text']; ?>	
				<?php };?>
			</h1>
			
					<a class="button button--wapasha button--round-s" href="<?php if($data['header_button_url']){ ?><?php echo $data['header_button_url']; ?><?php };?>"><?php if($data['header_button_text']){ ?><?php echo $data['header_button_text']; ?><?php };?></a>
			
		</div>
	</section>
	<section id="sectionone">
		<div class="wrapper">
			<div class="row">
				<div class="col-sm-4 col-xs-13">
					<div class="animation-element bounce-up cf">
						<?php if($data['sectionone_img']){ ?>
							<img class="home-img subject" src="<?php echo $data['sectionone_img']; ?>" />
						<?php };?>
					</div>
				</div>
				<div class="col-sm-8 col-xs-13">
					<h1>
						<?php if($data['sectionone_title']){ ?>
							<?php echo $data['sectionone_title']; ?>	
						<?php };?>
					</h1>
					<p>
						<?php if($data['sectionone_text']){ ?>
							<?php echo $data['sectionone_text']; ?>	
						<?php };?>
					</p>
					<a class="button button--wapasha button--round-s" href="<?php if($data['sectionone_button_url']){ ?><?php echo $data['sectionone_button_url']; ?><?php };?>"><?php if($data['sectionone_button_text']){ ?><?php echo $data['sectionone_button_text']; ?><?php };?></a>
				</div>
			</div>			
		</div>
	</section>
	<section id="sectiontwo">
		<div class="wrapper">
			<h1>
				<?php if($data['sectiontwo_text']){ ?>
					<?php echo $data['sectiontwo_text']; ?>	
				<?php };?>
			</h1>
			
					<a class="button button--wapasha button--round-s" href="<?php if($data['sectiontwo_button_url']){ ?><?php echo $data['sectiontwo_button_url']; ?><?php };?>"><?php if($data['sectiontwo_button_text']){ ?><?php echo $data['sectiontwo_button_text']; ?><?php };?></a>
				
		</div>
	</section>
			<div></div>

	<!-- /section -->

<?php get_footer(); ?>