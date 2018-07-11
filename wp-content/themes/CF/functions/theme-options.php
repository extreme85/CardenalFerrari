<?php

add_action('init','themnific_options');  
function themnific_options(){
	
// VARIABLES
$themename = "Columns";
$shortname = "themnific";

// Populate option in array for use in theme 
global $themnific_options; 
$themnific_options = get_option('themnific_options');

$GLOBALS['template_path'] = get_template_directory_uri();;

//Access the WordPress Categories via an Array
$themnific_categories = array();  
$themnific_categories_obj = get_categories('hide_empty=0');
foreach ($themnific_categories_obj as $themnific_cat) {
    $themnific_categories[$themnific_cat->cat_ID] = $themnific_cat->cat_name;}
$categories_tmp = array_unshift($themnific_categories, "Select a category:");    
       
//Access the WordPress Pages via an Array
$themnific_pages = array();
$themnific_pages_obj = get_pages('sort_column=post_parent,menu_order');    
foreach ($themnific_pages_obj as $themnific_page) {
    $themnific_pages[$themnific_page->ID] = $themnific_page->post_name; }
$themnific_pages_tmp = array_unshift($themnific_pages, "Select a page:");       

// Image Alignment radio box
$options_thumb_align = array("alignleft" => "Left","alignright" => "Right","aligncenter" => "Center"); 

// Image Links to Options
$options_image_link_to = array("image" => "The Image","post" => "The Post"); 

//Testing 
$options_select = array("one","two","three","four","five"); 
$options_radio = array("one" => "One","two" => "Two","three" => "Three","four" => "Four","five" => "Five"); 


//Stylesheets Reader
$alt_stylesheet_path = get_template_directory() . '/styles/';
$alt_stylesheets = array();

if ( is_dir($alt_stylesheet_path) ) {
    if ($alt_stylesheet_dir = opendir($alt_stylesheet_path) ) { 
        while ( ($alt_stylesheet_file = readdir($alt_stylesheet_dir)) !== false ) {
            if(stristr($alt_stylesheet_file, ".css") !== false) {
                $alt_stylesheets[] = $alt_stylesheet_file;
            }
        }    
    }
}
// Set the Options Array
$bgurl =  get_template_directory_uri() . '/functions/images/bg';
//More Options
$all_uploads_path =  home_url() . '/wp-content/uploads/';
$all_uploads = get_option('themnific_uploads');
$other_entries = array("Select a number:","1","2","3","4","5","6","7","8","9","10","11","12","13","14","15","16","17","18","19");
$body_repeat = array("no-repeat","repeat-x","repeat-y","repeat");
$body_pos = array("top left","top center","top right","center left","center center","center right","bottom left","bottom center","bottom right");

// THIS IS THE DIFFERENT FIELDS
$options = array();   

$options[] = array( "name" => "General Settings",
                    "type" => "heading");

$options[] = array( "name" => "Custom Logo",
					"desc" => "Upload a main logo for your theme, or specify the image address of your online logo. <br/>Use bigger image - eg. in demo is used 500x110px image",
					"id" => $shortname."_logo",
					"std" => "",
					"type" => "upload");    

$options[] = array( "name" => "Custom Favicon",
					"desc" => "Upload a 16px x 16px Png/Gif image that will represent your website's favicon.",
					"id" => $shortname."_custom_favicon",
					"std" => "",
					"type" => "upload"); 	
                                               
$options[] = array( "name" => "Tracking Code",
					"desc" => "Paste your Google Analytics (or other) tracking code here. This will be added into the footer template of your theme.",
					"id" => $shortname."_google_analytics",
					"std" => "",
					"type" => "textarea");   

$options[] = array( "name" => "Disable Ticker & Search in responsive mode",
                    "desc" => "This section will be not visible on mobile screens (740px and less)",
                    "id" => $shortname."_ticker_res_mode",
                    "std" => "false",
                    "type" => "checkbox");			

$options[] = array( "name" => "Disable Header Ad in responsive mode",
                    "desc" => "This section will be not visible on mobile screens (740px and less)",
                    "id" => $shortname."_ad_res_mode",
                    "std" => "false",
                    "type" => "checkbox");
					


					
// primary styling

$options[] = array( "name" => " Primary Styling",
					"type" => "heading");

			
$options[] = array( "name" => "General Text Font Style",
					"desc" => "Select the typography used in general text. <br />* semi-safe font <br />*** Google Webfonts.",
					"id" => $shortname."_font_text",
					"std" => array('size' => '12','face' => 'Sans Serif, sans-serif','style' => '400','color' => '#242424'),
					"type" => "typography"); 

					
$options[] = array( "name" =>  "Primary Background Color - Container",
					"desc" => "Pick a custom color for main container.",
					"id" => "themnific_thi_body_color",
					"std" => "#ffffff",
					"type" => "color");									
 
$options[] = array( "name" => "Primary - Ghost Background Color",
					"desc" => "Pick a custom color - similar to Primary Background Color",
					"id" => "themnific_custom_color",
					"std" => "#fafafa",
					"type" => "color"); 

					
$options[] = array( "name" =>  "Link Color",
					"desc" => "Pick a custom color for links. e.g. #585a66",
					"id" => "themnific_link_color",
					"std" => "#000000",
					"type" => "color");     

$options[] = array( "name" =>  "Hover Color",
					"desc" => "Pick a custom color for links (hover). #73b8f5",
					"id" => "themnific_link_hover_color",
					"std" => "#db4848",
					"type" => "color");  
					
$options[] = array( "name" =>  "Borders",
					"desc" => "Pick a custom color for text shadows. e.g. #fff",
					"id" => "themnific_border_color",
					"std" => "#e6e6e6",
					"type" => "color"); 

$options[] = array( "name" =>  "Elements Color",
					"desc" => "Pick a custom color for background color of e.g. slider image & navigation hovers,",
					"id" => "themnific_for_body_color",
					"std" => "#47B7DD",
					"type" => "color");

				
	
// secondary styling	
	
$options[] = array( "name" => "Secondary Styling",
					"type" => "heading");
					
$options[] = array( "name" => "Footer Font Style",
					"desc" => "Select the typography for Announcement, More section <br />* semi-safe font <br />** @font-face rule <br />*** Google Webfonts (Must be allowed in General Settings tab).",
					"id" => $shortname."_font_text_sec",
					"std" => array('size' => '11','face' => 'Arial, sans-serif','style' => '400','color' => '#e8e8e8'),
					"type" => "typography");  

					
$options[] = array( "name" =>  "Footer and Navigation Background Color",
					"desc" => "Pick a custom color for background color of the theme e.g. #32333d",
					"id" => "themnific_body_color",
					"std" => "#1f1f1f",
					"type" => "color");
					
$options[] = array( "name" =>  "Footer Link Color",
					"desc" => "Pick a custom color for links. e.g. #585a66",
					"id" => "themnific_link_color_alter",
					"std" => "#d4d4d4",
					"type" => "color");  
					 
$options[] = array( "name" =>  "Secondary Borders",
					"desc" => "Pick a custom color for text shadows. e.g. #fff",
					"id" => "themnific_border_color_sec",
					"std" => "#ddd",
					"type" => "color");   


	

// other styling	
	
$options[] = array( "name" => "Other Styling",
					"type" => "heading");		

$options[] = array( "name" => "Show Uppercase Fonts",
                    "desc" => "You can disable general uppercase here.",
                    "id" => $shortname."_upper",
                    "std" => "true",
                    "type" => "checkbox");
					
$options[] = array( "name" =>  "Body Background Color",
					"desc" => "Pick a custom color.",
					"id" => $shortname."_bg_color",
					"std" => "#1f1f1f",
					"type" => "color");	

$options[] = array( "name" => "Show Container Shadow",
                    "desc" => "You can disable container shadow here.",
                    "id" => $shortname."_cont_shadow",
                    "std" => "false",
                    "type" => "checkbox");

$options[] = array( "name" => "Background overlay",
                    "desc" => "Choose bg overlay.",
                    "id" => $shortname."_body_bg",
					"type" => "select2",
					"options" => array(
					"" => "None",
					"bg-line1.png" => "Line 1",
					"bg-line2.png" => "Line 2", 
					"bg-line3.png" => "Line 3", 
					"bg-line4.png" => "Line 4", 
					"bg-line5.png" => "Line 5", 
					"bg-line6.png" => "Line 6", 
					"bg-line7.png" => "Line 7", 
					"bg-line8.png" => "Line 8", 
					"bg-line9.png" => "Line 9", 
					"bg-square1.png" => "Square 1",
					"bg-square2.png" => "Square 2",
					"bg-square3.png" => "Square 3",
					"bg-square4.png" => "Square 4",
					"bg-square5.png" => "Square 5",
					"bg-square6.png" => "Square 6",
					"bg-pattern1.png" => "Pattern 1", 
					"bg-dots1.png" => "Dots 1",
					"bg-dots2.png" => "Dots 2",
					"bg-zig.png" => "Zig Zag", 
					"bg-noise.png" => "Noise", 
					"bg-transparent.png" => "Transparent", 
					) );			

// typography

$options[] = array( "name" => "Headings Typography",
					"type" => "heading");    

$options[] = array( "name" => "Navigation Font Style",
					"desc" => "Select the typography you want for heading H1. <br />* semi-safe font <br />** @font-face rule <br />*** Google Webfonts (Must be allowed in General Settings tab).",
					"id" => $shortname."_font_nav",
					"std" => array('size' => '12','face' => 'Open Sans, sans-serif','style' => '600','color' => '#fff'),
					"type" => "typography");  

$options[] = array( "name" => "H1 Font Style + H1 Single Post",
					"desc" => "Select the typography you want for heading H1. <br />* semi-safe font <br />** @font-face rule <br />*** Google Webfonts (Must be allowed in General Settings tab).",
					"id" => $shortname."_font_h1",
					"std" => array('size' => '34','face' => 'Open Sans, sans-serif','style' => '600','color' => '#1f1f1f'),
					"type" => "typography");  

$options[] = array( "name" => "H2 Font Style",
					"desc" => "Select the typography you want for heading H2. <br />* semi-safe font <br />** @font-face rule <br />*** Google Webfonts (Must be allowed in General Settings tab).",
					"id" => $shortname."_font_h2",
					"std" => array('size' => '24','face' => 'Raleway, sans-serif','style' => '700','color' => '#1c1c1c'),
					"type" => "typography");  

$options[] = array( "name" => "H2 Homepage + Rating",
					"desc" => "Select the typography you want for heading H2. <br />* semi-safe font <br />** @font-face rule <br />*** Google Webfonts (Must be allowed in General Settings tab).",
					"id" => $shortname."_font_h2_alt",
					"std" => array('size' => '10','face' => 'Open Sans, serif','style' => '700','color' => '#fff'),
					"type" => "typography"); 

$options[] = array( "name" => "H3 Font Style",
					"desc" => "Select the typography you want for heading H3 <br />* semi-safe font <br />** @font-face rule <br />*** Google Webfonts (Must be allowed in General Settings tab).",
					"id" => $shortname."_font_h3",
					"std" => array('size' => '13','face' => 'Open Sans, sans-serif','style' => '600','color' => '#1f1f1f'),
					"type" => "typography"); 

$options[] = array( "name" => "H4 Font Style",
					"desc" => "Select the typography you want for heading H4. <br />* semi-safe font <br />** @font-face rule <br />*** Google Webfonts (Must be allowed in General Settings tab).",
					"id" => $shortname."_font_h4",
					"std" => array('size' => '13','face' => 'Open Sans, serif','style' => '400','color' => '#5c5c5c'),
					"type" => "typography");  
					
$options[] = array( "name" => "H5 & H6 Font Style",
					"desc" => "Select the typography you want for heading H5 and H6. <br />* semi-safe font <br />** @font-face rule <br />*** Google Webfonts (Must be allowed in General Settings tab).",
					"id" => $shortname."_font_h5",
					"std" => array('size' => '13','face' => 'Open Sans, sans-serif','style' => '400','color' => '#5c5c5c'),
					"type" => "typography"); 
		

// magazine sliders

$options[] = array( "name" => "Sliders & Featured Sections",
					"type" => "heading");    
					
$options[] = array( "name" => "Homepage Mosaic - Featured Category",
					"desc" => "Select a category for slider.",
					"id" => $shortname."_slider_category",
					"std" => "Select a category:",
					"type" => "select",
					"options" => $themnific_categories);	

$options[] = array( "name" => "Homepage - Disable Mosaic Section",
					"desc" => "Check to hide slider area",
					"id" => $shortname."_slider_dis",
					"std" => "false",
					"type" => "checkbox");


$options[] = array( "name" => "Blog & Mansory - Disable Mosaic",
					"desc" => "Check to hide slider area",
					"id" => $shortname."_slider_dis_blog",
					"std" => "false",
					"type" => "checkbox");
					

					
$options[] = array( "name" => "Carousel - Featured Category",
					"desc" => "Select a category for slider.",
					"id" => $shortname."_carousel_category",
					"std" => "Select a category:",
					"type" => "select",
					"options" => $themnific_categories);
					
$options[] = array("name" => "Carousel - Number of posts",
					"desc" => "",
					"id" => $shortname."_carousel_postnumber",
					"std" => "12",
					"type" => "text");

$options[] = array( "name" => "Carousel - Disable Carousel",
					"desc" => "Check to hide slider area",
					"id" => $shortname."_carousel_dis",
					"std" => "false",
					"type" => "checkbox");


$options[] = array( "name" => "Blog & Mansory - Disable Carousel",
					"desc" => "Check to hide slider area",
					"id" => $shortname."_carousel_dis_blog",
					"std" => "false",
					"type" => "checkbox");
					
					
					
$options[] = array( "name" => "Ticker",
					"type" => "heading");  
					
$options[] = array( "name" => "News Ticker Category (Header)",
					"desc" => "Select a category for ticker slider.",
					"id" => $shortname."_ticker_category",
					"std" => "Select a category:",
					"type" => "select",
					"options" => $themnific_categories);

					
$options[] = array( "name" => "Disable Ticker",
					"desc" => "Check to disable this area",
					"id" => $shortname."_ticker_dis",
					"std" => "false",
					"type" => "checkbox");

// post settings

$options[] = array( "name" => "Post Settings",
					"type" => "heading");    

$options[] = array( "name" => "Sidebars",
					"desc" => "Choose type of posts layout.",
					"id" => $shortname."_post_widgets",
					"type" => "select2",
					"options" => array(
					"both" => "Two sidebars", 
					"rightone" => "One sidebar (Right)",
					) );		

$options[] = array( "name" => "Disable Featured Image",
					"desc" => "Check to disable featured image in single post",
					"id" => $shortname."_post_image_dis",
					"std" => "false",
					"type" => "checkbox");
					
$options[] = array( "name" => "Disable Slideshow Gallery",
					"desc" => "Check to disable slideshow gallery in single post",
					"id" => $shortname."_post_gallery_dis",
					"std" => "false",
					"type" => "checkbox");
					
$options[] = array( "name" => "Disable Previous/Next Posts",
					"desc" => "Check to disable Previous/Next section in single post",
					"id" => $shortname."_post_bread_dis",
					"std" => "false",
					"type" => "checkbox");
					
$options[] = array( "name" => "Disable Social Buttons",
					"desc" => "Check to disable social buttons section in single post",
					"id" => $shortname."_post_social_dis",
					"std" => "false",
					"type" => "checkbox");
					
$options[] = array( "name" => "Disable Author Info",
					"desc" => "Check to disable author section in single post",
					"id" => $shortname."_post_author_dis",
					"std" => "false",
					"type" => "checkbox");
					
$options[] = array( "name" => "Disable Related Posts",
					"desc" => "Check to disable related posts section in single post",
					"id" => $shortname."_post_related_dis",
					"std" => "false",
					"type" => "checkbox");



// social networks	

$options[] = array( "name" => "Social Networks",
    				"type" => "heading");
			

$options[] = array( "name" => "Rss Feed",
					"desc" => "",
					"id" => $shortname."_socials_rss",
					"std" => "",
					"type" => "text");

$options[] = array( "name" => "Mail",
					"desc" => "",
					"id" => $shortname."_socials_mail",
					"std" => "",
					"type" => "text");

$options[] = array( "name" => "Facebook",
					"desc" => "",
					"id" => $shortname."_socials_fa",
					"std" => "",
					"type" => "text");

$options[] = array( "name" => "Twitter",
					"desc" => "",
					"id" => $shortname."_socials_tw",
					"std" => "",
					"type" => "text");
					
$options[] = array( "name" => "Google+",
					"desc" => "",
					"id" => $shortname."_socials_googleplus",
					"std" => "",
					"type" => "text");

$options[] = array( "name" => "Pinterest",
					"desc" => "",
					"id" => $shortname."_socials_pinterest",
					"std" => "",
					"type" => "text");
					

$options[] = array( "name" => "Instagram",
					"desc" => "",
					"id" => $shortname."_socials_instagram",
					"std" => "",
					"type" => "text");
					
$options[] = array( "name" => "Behance",
					"desc" => "",
					"id" => $shortname."_socials_behance",
					"std" => "",
					"type" => "text");

$options[] = array( "name" => "You Tube",
					"desc" => "",
					"id" => $shortname."_socials_yo",
					"std" => "",
					"type" => "text");

$options[] = array( "name" => "Vimeo",
					"desc" => "",
					"id" => $shortname."_socials_vi",
					"std" => "",
					"type" => "text");

$options[] = array( "name" => "Tumblr",
					"desc" => "",
					"id" => $shortname."_socials_tu",
					"std" => "",
					"type" => "text");

$options[] = array( "name" => "Picasa",
					"desc" => "",
					"id" => $shortname."_socials_picasa",
					"std" => "",
					"type" => "text");

$options[] = array( "name" => "Flickr",
					"desc" => "",
					"id" => $shortname."_socials_fl",
					"std" => "",
					"type" => "text");

$options[] = array( "name" => "LinkedIn",
					"desc" => "",
					"id" => $shortname."_socials_li",
					"std" => "",
					"type" => "text");

$options[] = array( "name" => "Last FM",
					"desc" => "",
					"id" => $shortname."_socials_la",
					"std" => "",
					"type" => "text");

$options[] = array( "name" => "Myspace",
					"desc" => "",
					"id" => $shortname."_socials_my",
					"std" => "",
					"type" => "text");

$options[] = array( "name" => "Dribbble",
					"desc" => "",
					"id" => $shortname."_socials_dribbble",
					"std" => "",
					"type" => "text");

$options[] = array( "name" => "Forrst",
					"desc" => "",
					"id" => $shortname."_socials_forrst",
					"std" => "",
					"type" => "text");

$options[] = array( "name" => "Foursquare",
					"desc" => "",
					"id" => $shortname."_socials_foursquare",
					"std" => "",
					"type" => "text");

$options[] = array( "name" => "Skype",
					"desc" => "",
					"id" => $shortname."_socials_sk",
					"std" => "",
					"type" => "text");

$options[] = array( "name" => "Yahoo",
					"desc" => "",
					"id" => $shortname."_socials_ya",
					"std" => "",
					"type" => "text");

$options[] = array( "name" => "Digg",
					"desc" => "",
					"id" => $shortname."_socials_digg",
					"std" => "",
					"type" => "text");

$options[] = array( "name" => "Github",
					"desc" => "",
					"id" => $shortname."_socials_github",
					"std" => "",
					"type" => "text");

					
					
// footer
$options[] = array( "name" => "Footer",
                    "type" => "heading");
					
$options[] = array( "name" => "Enable Custom Footer (Left)",
					"desc" => "Activate to add the custom text below to the theme footer.",
					"id" => $shortname."_footer_left",
					"std" => "false",
					"type" => "checkbox");    

$options[] = array( "name" => "Custom Text (Left)",
					"desc" => "Custom HTML and Text that will appear in the footer of your theme.",
					"id" => $shortname."_footer_left_text",
					"std" => "<p></p>",
					"type" => "textarea");
	
						
$options[] = array( "name" => "Enable Custom Footer (Right)",
					"desc" => "Activate to add the custom text below to the theme footer.",
					"id" => $shortname."_footer_right",
					"std" => "false",
					"type" => "checkbox");    

$options[] = array( "name" => "Custom Text (Right)",
					"desc" => "Custom HTML and Text that will appear in the footer of your theme.",
					"id" => $shortname."_footer_right_text",
					"std" => "<p></p>",
					"type" => "textarea");


// ads					
					
$options[] = array( "name" => "Static Ads",
					"type" => "heading");  

$options[] = array("name" => "Header Advertisement Code",
					"desc" => "Enter your code here.",
					"id" => $shortname."_headeradscript",
					"std" => "",
					"type" => "textarea");  
					

$options[] = array("name" => "Header Image URL",
					"desc" => "Enter your image url here (468x60px).",
					"id" => $shortname."_headeradimg1",
					"std" => "",
					"type" => "text");   
	   
$options[] = array("name" => "Header Link URL",
					"desc" => "Enter link url here.",
					"id" => $shortname."_headeradurl1",
					"std" => "#",
					"type" => "text");


							                        
update_option('themnific_template',$options);      
update_option('themnific_themename',$themename);   
update_option('themnific_shortname',$shortname);

                                     
// Vergo Metabox Options
$themnific_metaboxes = array();

$themnific_metaboxes[] = array (	"name" => "image",
							"label" => "Image",
							"type" => "upload",
							"desc" => "Upload file here...");							
    
update_option('themnific_custom_template',$themnific_metaboxes);      

}

?>