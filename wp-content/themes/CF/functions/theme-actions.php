<?php 
// Register Styles
function register_styles(){
	
	wp_register_style('style', get_stylesheet_directory_uri() .	'/style.css');
		wp_enqueue_style( 'style');
	wp_register_style('prettyPhoto', get_template_directory_uri() .	'/styles/prettyPhoto.css');
		wp_enqueue_style( 'prettyPhoto');
}
add_action('themnific_head', 'register_styles');


/*-----------------------------------------------------------------------------------*/
/* Custom functions */
/*-----------------------------------------------------------------------------------*/


	global $themnific_options;
	$output = '';

// Add custom styling
add_action('wp_head','themnific_custom_styling');
function themnific_custom_styling() {
	
	// Get options
	$home = home_url();
	$home_theme  = get_template_directory_uri();
	
	$sec_body_color = get_option('themnific_custom_color');
	$thi_body_color = get_option('themnific_thi_body_color');
	$for_body_color = get_option('themnific_for_body_color');
	$body_color = get_option('themnific_body_color');
	$bg_body_color = get_option('themnific_bg_color');
	$text_color = get_option('themnific_text_color');
	$text_color_alter = get_option('themnific_text_color_alter');
	$body_color_sec = get_option('themnific_body_color_sec');
	$sec_text_color = get_option('themnific_sec_text_color');
	$thi_text_color = get_option('themnific_thi_text_color');
	$link = get_option('themnific_link_color');
	$link_alter = get_option('themnific_link_color_alter');
	$hover = get_option('themnific_link_hover_color');
	$sec_link = get_option('themnific_sec_link_color');
	$sec_hover = get_option('themnific_sec_link_hover_color');
	$thi_hover = get_option('themnific_thi_link_hover_color');
	$body_bg = get_option('themnific_body_bg');
	$body_bg_sec = get_option('themnific_body_bg_sec');
	$shadows = get_option('themnific_shadows_color');
	$shadows_sec = get_option('themnific_shadows_color_sec');
	$shadows_thi = get_option('themnific_shadows_color_thi');
	$border = get_option('themnific_border_color');
	$border_sec = get_option('themnific_border_color_sec');
	$border_thi = get_option('themnific_border_color_thi');
	    $custom_css = get_option('themnific_custom_css');
		
	// Add CSS to output
		if ($custom_css)
		$output .= $custom_css;
		$output = '';
	
	if ($body_color)
		$output = 'ul#block li,#footer,#sec-nav,.stuff,.body2{background-color:'.$body_color.'}' . "\n";
	if ($sec_body_color)
		$output .= '#navigation,body.page-template-homepage_alt-php .container,body.page-template-demo_homepage_alt-php .container,.hrline,h2.widget,.archivepost li:nth-child(even),.raws li:nth-child(even),.small_posts:nth-child(even),.ad300,#serinfo-nav li.current,#serinfo,.tagcloud a,#serpane3 a{background-color:'.$sec_body_color.'}' . "\n";
	if ($thi_body_color)
		$output .= '.container,.nav li ul,.body3,#serpane3 a,ul.mansory>li{background-color:'.$thi_body_color.'}' . "\n";
	if ($for_body_color)
		$output .= 'h2.widget span,#tickerwarp span.lab,.searchformhead input.s,p.meta_move,.scrollTo_top,.overrating,a#navtrigger,.hrline span,.hrlineB span,.flexcarousel .flex-direction-nav li a,.singleslider .flex-direction-nav li a,.page-numbers.current,.imgwrap,.nav-next a,.nav-previous a,span.ribbon,a.mainbutton,#submit,#comments .navigation a,.tagssingle a,.contact-form .submit{background-color:'.$for_body_color.'}' . "\n";
		$output .= '#main-nav>li:hover,#main-nav>li.current-cat,#main-nav>li.current_page_item{border-color:'.$for_body_color.' !important}' . "\n";
		$output .= '.nav a:hover,.tagcloud a:before,#serpane3 a:before,p.more a.fr{color:'.$for_body_color.'}' . "\n";
	if ($bg_body_color)
		$output .= 'body{background-color:'.$bg_body_color.'}' . "\n";
	if ($text_color)
		$output.= 'body,.body1 {color:'.$text_color.'}' . "\n";	
	if ($sec_text_color)
		$output .= '.XXX{color:'.$sec_text_color.'}' . "\n";
	if ($text_color_alter)
		$output .= '.XXX {color:'.$text_color_alter.' !important}' . "\n";
	if ($link)
		$output .= '.body1 a, a:link, a:visited,#serinfo h4 a,.related li a {color:'.$link.'}' . "\n";
	if ($link_alter)
		$output .= '#footer a,.body2 a{color:'.$link_alter.' !important}' . "\n";
	if ($hover)
		$output .= '.entry a,a:hover,.body1 a:hover,#serinfo a:hover,#homecontent h2 span a,.nav>li.current-cat>a,.nav>li.current_page_item>a {color:'.$hover.'}' . "\n";
		$output .= '.imagepost,.videopost,.imageformat{background-color:'.$hover.'}' . "\n";
	if ($sec_link)
		$output .= '.XXX{color:'.$sec_link.'}' . "\n";
	if ($sec_hover)
		$output .= '.body2 a:hover,p.body2 a:hover{color:'.$sec_hover.'!important}' . "\n";
	if ($thi_hover)
		$output .= '#footer{color:'.$thi_hover.'}' . "\n";
		
		
		

	if ($body_bg)
		$output .= 'body{background-image:url('.$home_theme.'/images/bg/'.$body_bg.')}' . "\n";
		
		
	if ($border)
		$output .= '#navigation,#serinfo-nav li.current,#serinfo,.widgetable,.searchformhead,.nav>li>a,#headtop,#header ul.social-menu li,.searchform input.s,#main-nav,#main-nav>li,.pagination,input, textarea,input checkbox,input radio,select, file{border-color:'.$border.' !important}' . "\n";	
		$output .= '.hrline,.hrlineB{background-color:'.$border.'}' . "\n";	

	if ($border_sec)
		$output .= '.body2,.ratingblock,#footer h2,#footer .tagcloud a,#footer select,#footer .searchform input.s {border-color:'.$border_sec.' !important}' . "\n";



		// General Typography		
		$font_text = get_option('themnific_font_text');	
		$font_text_sec = get_option('themnific_font_text_sec');	
		
		$font_nav = get_option('themnific_font_nav');
		$font_h1 = get_option('themnific_font_h1');	
		$font_h2 = get_option('themnific_font_h2');	
		$font_h2_alt = get_option('themnific_font_h2_alt');	
		$font_h3 = get_option('themnific_font_h3');	
		$font_h4 = get_option('themnific_font_h4');	
		$font_h5 = get_option('themnific_font_h5');	
		$font_h6 = get_option('themnific_font_h5');	
		
		
		$font_h2_tagline = get_option('themnific_font_h2_tagline');	
	
	
		if ( $font_text )
			$output .= 'body,input, textarea,input checkbox,input radio,select, file {font:'.$font_text["style"].' '.$font_text["size"].'px/1.8em '.stripslashes($font_text["face"]).';color:'.$font_text["color"].'}' . "\n";
			$output .= '#main-nav a,.nav ul li a {color:'.$font_text["color"].'}' . "\n";
			
		if ( $font_text_sec )
			$output .= '#footer,.stuff,#footer select,.body2 {font:'.$font_text_sec["style"].' '.$font_text_sec["size"].'px/2.2em '.stripslashes($font_text_sec["face"]).';color:'.$font_text_sec["color"].'}' . "\n";
			$output .= '#footer h2,#footer h3,.stuff h2 a,.body2 h2,.body2 h3 {color:'.$font_text_sec["color"].'}' . "\n";

		if ( $font_h1 )
			$output .= 'h1 {font:'.$font_h1["style"].' '.$font_h1["size"].'px/1.1em '.stripslashes($font_h1["face"]).';color:'.$font_h1["color"].'}';	
		if ( $font_h2 )
			$output .= 'h2 {font:'.$font_h2["style"].' '.$font_h2["size"].'px/1em '.stripslashes($font_h2["face"]).';color:'.$font_h2["color"].'}';
		if ( $font_h2_alt )
			$output .= 'h2.widget,.ratingblock h2,.archivepost li h2,#tickerwarp span.lab,.searchformhead input.s {font:'.$font_h2_alt["style"].' '.$font_h2_alt["size"].'px/1.2em '.stripslashes($font_h2_alt["face"]).';color:'.$font_h2_alt["color"].'}';
			$output .= 'h2.widget a {color:'.$font_h2_alt["color"].'}';
		if ( $font_h3 )
			$output .= 'h3,ul#serinfo-nav li a {font:'.$font_h3["style"].' '.$font_h3["size"].'px/1.5em '.stripslashes($font_h3["face"]).';color:'.$font_h3["color"].'}';
		if ( $font_h4 )
			$output .= 'h4 {font:'.$font_h4["style"].' '.$font_h4["size"].'px/1.5em '.stripslashes($font_h4["face"]).';color:'.$font_h4["color"].'}';	
		if ( $font_h5 )
			$output .= 'h5 {font:'.$font_h5["style"].' '.$font_h5["size"].'px/1.5em '.stripslashes($font_h5["face"]).';color:'.$font_h5["color"].'}';	
		if ( $font_h6 )
			$output .= 'h6 {font:'.$font_h6["style"].' '.$font_h6["size"].'px/1.5em '.stripslashes($font_h6["face"]).';color:'.$font_h6["color"].'}' . "\n";
			
			
		if ( $font_nav )
			$output .= '#sec-nav>li>a,.ratingblock p {font:'.$font_nav["style"].' '.$font_nav["size"].'px/1em '.stripslashes($font_nav["face"]).';color:'.$font_nav["color"].'}';	
			$output .= '#main-nav>li>a {font-family:'.stripslashes($font_nav["face"]).'}';
			$output .= '#main-nav>li>a {font-family:'.stripslashes($font_nav["face"]).';font-weight:'.$font_nav["style"].'}';		
		
		
		
	// custom stuff	
		if ( $font_text )
			$output .= '.tab-post small a,.taggs a,.ei-slider-thumbs li a {color:'.$font_text["color"].'}' . "\n";	
	
	// Output styles
		if ($output <> '') {
			$output = "<!-- Themnific Styling -->\n<style type=\"text/css\">\n" . $output . "</style>\n";
			echo $output;
	}
		
} 


// Add custom styling
add_action('themnific_head','themnific_mobile_styling');
	function themnific_mobile_styling() {
		echo "<!-- Themnific Mobile & Special CSS -->\n";
		
		// google fonts link generator
		get_template_part('/functions/admin-fonts');
		wp_register_style('style-custom', get_stylesheet_directory_uri() .	'/style-custom.css');
			wp_enqueue_style( 'style-custom');
		
		wp_register_style('font-awesome.min', get_template_directory_uri() .	'/styles/font-awesome.min.css');
			wp_enqueue_style( 'font-awesome.min');
		wp_register_style('font-awesome-ie7', get_template_directory_uri() .	'/styles/font-awesome-ie7.css');
			wp_enqueue_style( 'font-awesome-ie7');
		wp_register_style('mobile', get_stylesheet_directory_uri() .	'/styles/mobile.css');
			wp_enqueue_style( 'mobile');

} 
?>