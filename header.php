<?php global $data; ?>
<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<title><?php wp_title(); ?></title>
		
		<!-- dns prefetch -->
		<link href="//www.google-analytics.com" rel="dns-prefetch">
		
		<!-- meta -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width,initial-scale=1.0">
		<meta name="description" content="<?php bloginfo('description'); ?>">
		
		<!-- icons -->
		<link href="<?php echo get_template_directory_uri(); ?>/img/icons/favicon.ico" rel="shortcut icon">
		<link href="<?php echo get_template_directory_uri(); ?>/img/icons/touch.png" rel="apple-touch-icon-precomposed">
		<?php if($data['body_font']){
			$bodyfont = $data['body_font']; 
			$bodyfont = str_replace(' ', '+', $bodyfont);?>
			<link href='http://fonts.googleapis.com/css?family=<?php echo $bodyfont; ?>' rel='stylesheet' type='text/css'>
		<?php };?>
		<link href='<?php echo get_template_directory_uri(); ?>/fonts/stackicons/css/stackicons-min.css' rel='stylesheet' type='text/css'>
		<!-- css + javascript -->
		<?php wp_head(); ?>
		<style>
			.header{
				background-color: <?php echo $data['header_background']; ?>;
			}	
			.cbp-spmenu{
				background: <?php echo $data['header_background']; ?>;
			}
			body {
				background: <?php echo $data['body_background']; ?>;
				color: <?php echo $data['body_text']; ?>;
			}	
			body, h1, h2, h3, h4, h5, h6, .h1, .h2, .h3, .h4, .h5, .h6, p, input, textarea, button, select, html{
				font-family: <?php echo $data['body_font']; ?>;
			}	
			.header .nav>li>a, .cbp-spmenu a, #showRightPush::before {
				color: <?php echo $data['nav']; ?>;
			}
			.main-nav a::before, .main-nav a::after{
				background: <?php echo $data['nav']; ?>; 
			}
			.cbp-spmenu a{
				border-color: transparent;
			}
			.cbp-spmenu a::after{
				padding-top:10px;
				border-bottom: 2px solid <?php echo $data['nav']; ?>;
				content: '';
				width: 80%;
				display: block;
				margin: 0 auto -10px;
			}	
			.header .nav>li>a:hover, .header .nav>li>a:focus{
				color: <?php echo $data['nav_hover']; ?> !important;
			}	
			.footer{
				background-color: <?php echo $data['footer_background']; ?>;
			}	
			.footer, .footer a, .footer a::before {
				color: <?php echo $data['footer_text_color']; ?> !important;
			}	
			button, .button {
				background:<?php echo $data['button_background']; ?>;
				color:<?php echo $data['button_text']; ?>;
			}
			.button.button--wapasha {
				color:<?php echo $data['button_text']; ?>;
			}
			.button--wapasha.button--inverted {
				background:<?php echo $data['button_hover_background']; ?>;
				color:<?php echo $data['button_hover_text']; ?>;
			}
			.button--wapasha::before {
				border: 2px solid <?php echo $data['button_border']; ?>;
			}
			.button--wapasha.button--inverted::before {
				border-color:<?php echo $data['button_border']; ?>;
			}
			.button--wapasha:hover {
				background-color:<?php echo $data['button_hover_background']; ?>;
				color:<?php echo $data['button_hover_text']; ?>;
			}
			.button--wapasha.button--inverted:hover {
				background-color:<?php echo $data['button_hover_background']; ?>;
				color:<?php echo $data['button_hover_text']; ?>;
			}
			::selection {
				background:<?php echo $data['selection_background']; ?>;					
			}
			::-webkit-selection {
				background:<?php echo $data['selection_background']; ?>;
			}
			::-moz-selection {
				background:<?php echo $data['selection_background']; ?>;					
			}  
			<?php if($data['custom_css']){ ?>
				<?php echo $data['custom_css']; ?>
			<?php };?>
		</style>
	</head>
	<body <?php body_class(); ?>>
	
        <!-- header -->
        <header class="header">
        	<!-- wrapper -->
			<div class="wrapper">
                    <!-- nav -->
					<div class="logo">
                    	<a href="<?php echo home_url(); ?>">
                            <?php if ($data['custom-logo-upload']){?>
                                <img src="<?php echo $data['custom-logo-upload']; ?>" alt="Logo" class="logo-img">
                            <?php }else{
                            	bloginfo('name');
                            }; ?>
                        </a>
                    </div>
                    <nav class="main-nav" role="navigation">
						<?php nav_main(); ?>
					</nav>
					<a id="showRightPush" class="st-icon-menu st-shape-icon">Menu</a>
					<nav class="main-nav-mobile" role="navigation">
						<?php nav_main_mobile(); ?>
					</nav>
					<script>
						var menuRight = document.getElementById( 'cbp-spmenu-right' ),
						showRightPush = document.getElementById( 'showRightPush' ),
						body = document.body;
						classie.toggle( body, 'cbp-spmenu-push' );
						showRightPush.onclick = function() {
							classie.toggle( this, 'active' );
							classie.toggle( body, 'cbp-spmenu-push-toleft' );
							classie.toggle( menuRight, 'cbp-spmenu-open' );
							disableOther( 'showRightPush' );
						};
						function disableOther( button ) {
						if( button !== 'showRightPush' ) {
								classie.toggle( showRightPush, 'disabled' );
							}
						}
					</script>
					<!-- /nav -->
					<div class="clear"></div>
			</div>
        	<!-- /wrapper -->
        </header>
        <!-- /header -->