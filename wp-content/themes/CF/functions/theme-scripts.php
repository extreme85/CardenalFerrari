<?php
if ( ! is_admin() ) { add_action( 'wp_print_scripts', 'themnific_add_javascript' ); }

if ( ! function_exists( 'themnific_add_javascript' ) ) {
	function themnific_add_javascript() {

		// Load Common scripts	
		wp_enqueue_script('jquery');
		wp_enqueue_script('css3-mediaqueries', get_template_directory_uri().'/js/css3-mediaqueries.js');
		wp_enqueue_script('superfish', get_template_directory_uri().'/js/superfish.js','','', true);
		wp_enqueue_script('jquery.hoverIntent.minified', get_template_directory_uri().'/js/jquery.hoverIntent.minified.js','','', true);
		wp_enqueue_script('prettyPhoto', get_template_directory_uri() . '/js/jquery.prettyPhoto.js','','', true);
		wp_enqueue_script('jquery.flexslider-min', get_template_directory_uri() .'/js/jquery.flexslider-min.js','','', true);
		wp_enqueue_script('jquery.simplyscroll.min', get_template_directory_uri() .'/js/jquery.simplyscroll.min.js','','', true);
		wp_enqueue_script('jquery.simplyscroll.start', get_template_directory_uri() .'/js/jquery.simplyscroll.start.js','','', true);
		wp_enqueue_script('ownScript', get_template_directory_uri() .'/js/ownScript.js','','', true);
		
		// Load Slider scripts		
		if (get_option('themnific_carousel_dis') <> "true") { 
			if (is_home() || is_page_template('index.php') || is_page_template('homepage.php') || is_page_template('homepage_alt.php')) { 
				wp_enqueue_script('jquery.flexslider.start.carousel', get_template_directory_uri() .'/js/jquery.flexslider.start.carousel.js','','', true);
			} 
		}
		
		// Load Sivgle slider scripts	
		if (is_home() || is_page_template('index.php')) { 
				wp_enqueue_script('jquery.flexslider.start.single', get_template_directory_uri() .'/js/jquery.flexslider.start.single.js','','', true);
		} 
		
		// Load mansory scripts		
		if (is_page_template('homepage_alt.php')){
			wp_enqueue_script('jquery.masonry.min', get_template_directory_uri() .'/js/jquery.masonry.min.js','','', true);
			wp_enqueue_script('jquery.masonry.start', get_template_directory_uri() .'/js/jquery.masonry.start.js','','', true);
				wp_enqueue_script('jquery.flexslider.start.single', get_template_directory_uri() .'/js/jquery.flexslider.start.single.js','','', true);
		}
		
		if ( is_singular()){
		wp_enqueue_script( 'comment-reply' );	
				wp_enqueue_script('jquery.flexslider.start.single', get_template_directory_uri() .'/js/jquery.flexslider.start.single.js','','', true);
		}
		
	}
}
?>