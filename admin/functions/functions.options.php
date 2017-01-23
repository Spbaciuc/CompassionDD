<?php

add_action('init','of_options');

if (!function_exists('of_options'))
{
	function of_options()
	{
		//Access the WordPress Categories via an Array
		$of_categories 		= array();  
		$of_categories_obj 	= get_categories('hide_empty=0');
		foreach ($of_categories_obj as $of_cat) {
		    $of_categories[$of_cat->cat_ID] = $of_cat->cat_name;}
		$categories_tmp 	= array_unshift($of_categories, "Select a category:");    
	       
		//Access the WordPress Pages via an Array
		$of_pages 			= array();
		$of_pages_obj 		= get_pages('sort_column=post_parent,menu_order');    
		foreach ($of_pages_obj as $of_page) {
		    $of_pages[$of_page->ID] = $of_page->post_name; }
		$of_pages_tmp 		= array_unshift($of_pages, "Select a page:");       
	
		//Testing 
		$of_options_select 	= array("one","two","three","four","five"); 
		$of_options_radio 	= array("one" => "One","two" => "Two","three" => "Three","four" => "Four","five" => "Five");
		
		//Sample Homepage blocks for the layout manager (sorter)
		$of_options_homepage_blocks = array
		( 
			"disabled" => array (
				"placebo" 		=> "placebo", //REQUIRED!
				"block_one"		=> "Block One",
				"block_two"		=> "Block Two",
				"block_three"	=> "Block Three",
			), 
			"enabled" => array (
				"placebo" 		=> "placebo", //REQUIRED!
				"block_four"	=> "Block Four",
			),
		);


		//Stylesheets Reader
		$alt_stylesheet_path = LAYOUT_PATH;
		$alt_stylesheets = array();
		
		if ( is_dir($alt_stylesheet_path) ) 
		{
		    if ($alt_stylesheet_dir = opendir($alt_stylesheet_path) ) 
		    { 
		        while ( ($alt_stylesheet_file = readdir($alt_stylesheet_dir)) !== false ) 
		        {
		            if(stristr($alt_stylesheet_file, ".css") !== false)
		            {
		                $alt_stylesheets[] = $alt_stylesheet_file;
		            }
		        }    
		    }
		}


		//Background Images Reader
		$bg_images_path = get_stylesheet_directory(). '/img/bg/'; // change this to where you store your bg images
		$bg_images_url = get_template_directory_uri().'/img/bg/'; // change this to where you store your bg images
		$bg_images = array();
		
		if ( is_dir($bg_images_path) ) {
		    if ($bg_images_dir = opendir($bg_images_path) ) { 
		        while ( ($bg_images_file = readdir($bg_images_dir)) !== false ) {
		            if(stristr($bg_images_file, ".png") !== false || stristr($bg_images_file, ".jpg") !== false) {
		            	natsort($bg_images); //Sorts the array into a natural order
		                $bg_images[] = $bg_images_url . $bg_images_file;
		            }
		        }    
		    }
		}
		

		/*-----------------------------------------------------------------------------------*/
		/* TO DO: Add options/functions that use these */
		/*-----------------------------------------------------------------------------------*/
		
		//More Options
		$uploads_arr 		= wp_upload_dir();
		$all_uploads_path 	= $uploads_arr['path'];
		$all_uploads 		= get_option('of_uploads');
		$other_entries 		= array("Select a number:","1","2","3","4","5","6","7","8","9","10","11","12","13","14","15","16","17","18","19");
		$body_repeat 		= array("no-repeat","repeat-x","repeat-y","repeat");
		$body_pos 			= array("top left","top center","top right","center left","center center","center right","bottom left","bottom center","bottom right");
		
		// Image Alignment radio box
		$of_options_thumb_align = array("alignleft" => "Left","alignright" => "Right","aligncenter" => "Center"); 
		
		// Image Links to Options
		$of_options_image_link_to = array("image" => "The Image","post" => "The Post"); 


/*-----------------------------------------------------------------------------------*/
/* The Options Array */
/*-----------------------------------------------------------------------------------*/

// Set the Options Array
global $of_options;
$of_options = array();

$of_options[] = array( 	"name" 		=> "Home Settings",
						"type" 		=> "heading"
				);
$of_options[] = array( 	"name" 		=> "Custom Logo",
						"desc" 		=> "Upload custom logo here.",
						"id" 		=> "custom-logo-upload",
						"std" 		=> "",
						"mod"		=> "min",
						"type" 		=> "media"
				);
$of_options[] = array( 	"name" 		=> "Homepage Header Text",
						"desc" 		=> "You can use the following shortcodes in the section text: [wp-link] [theme-link] [loginout-link] [blog-title] [blog-link] [the-year]",
						"id" 		=> "header_text",
						"std" 		=> "Header text goes here.",
						"type" 		=> "textarea"
				);
$of_options[] = array( 	"name" 		=> "Homepage Button text",
						"desc" 		=> "",
						"id" 		=> "header_button_text",
						"std" 		=> "More Info",
						"type" 		=> "textarea"
				);
$of_options[] = array( 	"name" 		=> "Homepage Button URL",
						"desc" 		=> "",
						"id" 		=> "header_button_url",
						"std" 		=> "Header Button URL goes here.",
						"type" 		=> "textarea"
				);
$of_options[] = array( 	"name" 		=> "Homepage Header Background Image",
						"desc" 		=> "Upload a custom background.",
						"id" 		=> "custom_bgone",
						"std" 		=> $bg_images_url."default1.jpeg",
						"mod"		=> "min",
						"type" 		=> "media"
				);
$of_options[] = array( 	"name" 		=> "Homepage Section 1 Image",
						"desc" 		=> "You can upload your product image, screenshot or icon to help the user understand your product or company better.",
						"id" 		=> "sectionone_img",
						"type" 		=> "media"
				);
$of_options[] = array( 	"name" 		=> "Section 1 Background Color",
						"desc" 		=> "Change a custom background color.",
						"id" 		=> "custom_bgtwo",
						"std" 		=> "#fff",
						"type" 		=> "color"
				);
$of_options[] = array( 	"name" 		=> "Homepage Section 1 Title",
						"desc" 		=> "You can use the following shortcodes in the section text: [wp-link] [theme-link] [loginout-link] [blog-title] [blog-link] [the-year]",
						"id" 		=> "sectionone_title",
						"std" 		=> "Section 1 Title",
						"type" 		=> "textarea"
				);			
$of_options[] = array( 	"name" 		=> "Homepage Section 1 Text",
						"desc" 		=> "You can use the following shortcodes in the section text: [wp-link] [theme-link] [loginout-link] [blog-title] [blog-link] [the-year]",
						"id" 		=> "sectionone_text",
						"std" 		=> "Section 1 text goes here.",
						"type" 		=> "textarea"
				);
$of_options[] = array( 	"name" 		=> "Homepage Section 1 Button Text",
						"desc" 		=> "",
						"id" 		=> "sectionone_button_text",
						"std" 		=> "And More",
						"type" 		=> "textarea"
				);
$of_options[] = array( 	"name" 		=> "Homepage Section 1 Button URL",
						"desc" 		=> "",
						"id" 		=> "sectionone_button_url",
						"std" 		=> "Section 1 Button URL goes here.",
						"type" 		=> "textarea"
				);				
$of_options[] = array( 	"name" 		=> "Homepage Section 2 Text",
						"desc" 		=> "You can use the following shortcodes in the section text: [wp-link] [theme-link] [loginout-link] [blog-title] [blog-link] [the-year]",
						"id" 		=> "sectiontwo_text",
						"std" 		=> "Section 2 text goes here.",
						"type" 		=> "textarea"
				);			
$of_options[] = array( 	"name" 		=> "Section 2 Background Image",
						"desc" 		=> "Upload a custom background.",
						"id" 		=> "custom_bgthree",
						"std" 		=> $bg_images_url."default3.jpeg",
						"mod"		=> "min",
						"type" 		=> "media"
				);
$of_options[] = array( 	"name" 		=> "Homepage Section 2 Button Text",
						"desc" 		=> "",
						"id" 		=> "sectiontwo_button_text",
						"std" 		=> "And One More Thing",
						"type" 		=> "textarea"
				);

$of_options[] = array( 	"name" 		=> "Homepage Section 2 Button URL",
						"desc" 		=> "",
						"id" 		=> "sectiontwo_button_url",
						"std" 		=> "Section 2 Button URL goes here.",
						"type" 		=> "textarea"
				);			
$of_options[] = array( 	"name" 		=> "General Settings",
						"type" 		=> "heading"
				);			
$of_options[] = array( 	"name" 		=> "Tracking Code",
						"desc" 		=> "Paste your Google Analytics (or other) tracking code here. This will be added into the footer template of your theme.",
						"id" 		=> "google_analytics",
						"std" 		=> "",
						"type" 		=> "textarea"
				);				
$of_options[] = array( 	"name" 		=> "Footer Text",
						"desc" 		=> "You can use HTML.",
						"id" 		=> "footer_text",
						"std" 		=> "Powered by <a href='http://wordpress.org'>WordPress</a>. Built on <a href='http://marketdd.deafdude.com'>MarketDD Theme</a>.",
						"type" 		=> "textarea"
				);				
$of_options[] = array( 	"name" 		=> "Styling Options",
						"type" 		=> "heading"
				);				
$of_options[] = array( 	"name" 		=> "Body Text Color",
						"desc" 		=> "Pick a text color for the theme.",
						"id" 		=> "body_text",
						"std" 		=> "#333",
						"type" 		=> "color"
				);								
$of_options[] = array( 	"name" 		=> "Body Background Color",
						"desc" 		=> "Pick a background color for the theme (default: #fff).",
						"id" 		=> "body_background",
						"std" 		=> "#FFF",
						"type" 		=> "color"
				);				
$of_options[] = array( 	"name" 		=> "Header Background Color",
						"desc" 		=> "Pick a background color for the header (default: #fff).",
						"id" 		=> "header_background",
						"std" 		=> "#028BBD",
						"type" 		=> "color"
				);				
$of_options[] = array( 	"name" 		=> "Navigation Color",
						"desc" 		=> "Pick a navigation color for the header (default: #fff).",
						"id" 		=> "nav",
						"std" 		=> "#FFF",
						"type" 		=> "color"
				);			
$of_options[] = array( 	"name" 		=> "Navigation Hover Color",
						"desc" 		=> "Pick a navigation hover color for the header (default: #fff).",
						"id" 		=> "nav_hover",
						"std" 		=> "#FFF",
						"type" 		=> "color"
				);	
$of_options[] = array( 	"name" 		=> "Footer Background Color",
						"desc" 		=> "Pick a background color for the footer (default: #fff).",
						"id" 		=> "footer_background",
						"std" 		=> "#028BBD",
						"type" 		=> "color"
				);
$of_options[] = array( 	"name" 		=> "Footer Text Color",
						"desc" 		=> "Pick a text color for the footer.",
						"id" 		=> "footer_text_color",
						"std" 		=> "#FFF",
						"type" 		=> "color"
				);
$of_options[] = array( 	"name" 		=> "Body Font",
						"desc" 		=> "Specify the body font.",
						"id" 		=> "body_font",
						"std" 		=> "Raleway",
						"type" 		=> "select_google_font",
						"preview" 	=> array(
										"text" => "This is my preview text!", //this is the text from preview box
										"size" => "30px" //this is the text size from preview box
						),
						"options" 	=> array(
										"none" => "Select a font",//please, always use this key: "none"
										"Lato" => "Lato",
										"Raleway" => "Raleway",
										"Open Sans" => "Open Sans",
										"Roboto" => "Roboto",
										"Oswald" => "Oswald",
										"Slabo 27px" => "Slabo 27px",
										"Lora" => "Lora",
										"Source Sans Pro" => "Source Sans Pro",
										"Droid Sans" => "Droid Sans",
										"Loved by the King" => "Loved By the King",
										"Tangerine" => "Tangerine",
										"Terminal Dosis" => "Terminal Dosis"	
						)
				);
$of_options[] = array( 	"name" 		=> "Button Background Color",
						"desc" 		=> "Pick a background color for the button.",
						"id" 		=> "button_background",
						"std" 		=> "#028BBD",
						"type" 		=> "color"
				);	
$of_options[] = array( 	"name" 		=> "Button Text Color",
						"desc" 		=> "Pick a color for the button text.",
						"id" 		=> "button_text",
						"std" 		=> "#FFF",
						"type" 		=> "color"
				);	
$of_options[] = array( 	"name" 		=> "Button Border Color",
						"desc" 		=> "Pick a border color for the button.",
						"id" 		=> "button_border",
						"std" 		=> "#F69414",
						"type" 		=> "color"
				);
$of_options[] = array( 	"name" 		=> "Button Hover Background Color",
						"desc" 		=> "Pick a hover background color for the button.",
						"id" 		=> "button_hover_background",
						"std" 		=> "#FFF",
						"type" 		=> "color"
				);
$of_options[] = array( 	"name" 		=> "Button Hover Text Color",
						"desc" 		=> "Pick a hover text color for the button.",
						"id" 		=> "button_hover_text",
						"std" 		=> "#028BBD",
						"type" 		=> "color"
				);
$of_options[] = array( 	"name" 		=> "Selection Color",
						"desc" 		=> "Pick a selection color on the text.",
						"id" 		=> "selection_background",
						"std" 		=> "#F69414",
						"type" 		=> "color"
				);
$of_options[] = array( 	"name" 		=> "Custom CSS",
						"desc" 		=> "Quickly add some CSS to your theme by adding it to this block.",
						"id" 		=> "custom_css",
						"std" 		=> "",
						"type" 		=> "textarea"
				);
$of_options[] = array( 	"name" 		=> "Social Media",
						"type" 		=> "heading",
						"icon"		=> ADMIN_IMAGES . "icon-info.png"
				);
$of_options[] = array( 	"name" 		=> "Facebook URL",
						"desc" 		=> "Add your FaceBook URL here. Leave blank to hide.",
						"id" 		=> "facebook",
						"std" 		=> "#",
						"type" 		=> "text"
				);
$of_options[] = array( 	"name" 		=> "Twitter URL",
						"desc" 		=> "Add your Twitter URL here. Leave blank to hide.",
						"id" 		=> "twitter",
						"std" 		=> "#",
						"type" 		=> "text"
				);
$of_options[] = array( 	"name" 		=> "LinkedIn URL",
						"desc" 		=> "Add your LinkedIn URL here. Leave blank to hide.",
						"id" 		=> "linkedin",
						"std" 		=> "#",
						"type" 		=> "text"
				);
$of_options[] = array( 	"name" 		=> "Pintrest URL",
						"desc" 		=> "Add your Pinterest URL here. Leave blank to hide.",
						"id" 		=> "pinterest",
						"std" 		=> "#",
						"type" 		=> "text"
				);
$of_options[] = array( 	"name" 		=> "Instagram URL",
						"desc" 		=> "Add your Instagram URL here. Leave blank to hide.",
						"id" 		=> "instagram",
						"std" 		=> "#",
						"type" 		=> "text"
				);
$of_options[] = array( 	"name" 		=> "YouTube URL",
						"desc" 		=> "Add your YouTube URL here. Leave blank to hide.",
						"id" 		=> "youtube",
						"std" 		=> "#",
						"type" 		=> "text"
				);
$of_options[] = array( 	"name" 		=> "KickStarter URL",
						"desc" 		=> "Add your KickStarter URL here. Leave blank to hide.",
						"id" 		=> "kickstarter",
						"std" 		=> "#",
						"type" 		=> "text"
				);
$of_options[] = array( 	"name" 		=> "Email Address",
						"desc" 		=> "Add your Email Address here. Leave blank to hide.",
						"id" 		=> "email",
						"std" 		=> "#",
						"type" 		=> "text"
				);
$of_options[] = array( 	"name" 		=> "Backup Options",
						"type" 		=> "heading",
						"icon"		=> ADMIN_IMAGES . "icon-slider.png"
				);
$of_options[] = array( 	"name" 		=> "Backup and Restore Options",
						"id" 		=> "of_backup",
						"std" 		=> "",
						"type" 		=> "backup",
						"desc" 		=> 'You can use the two buttons below to backup your current options, and then restore it back at a later time. This is useful if you want to experiment on the options but would like to keep the old settings in case you need it back.',
				);
$of_options[] = array( 	"name" 		=> "Transfer Theme Options Data",
						"id" 		=> "of_transfer",
						"std" 		=> "",
						"type" 		=> "transfer",
						"desc" 		=> 'You can tranfer the saved options data between different installs by copying the text inside the text box. To import data from another install, replace the data in the text box with the one from another install and click "Import Options".',
				);
				
	}//End function: of_options()
}//End chack if function exists: of_options()
?>
