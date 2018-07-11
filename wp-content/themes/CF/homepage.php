<?php
/*
Template Name: Homepage
*/
?>
<?php get_header(); ?>

        <?php if (get_option('themnific_slider_dis') <> "true") { 

			get_template_part('/includes/sliders/mosaic' );

		} ?>
        
        <?php if (get_option('themnific_carousel_dis') <> "true") { 

			get_template_part('/includes/sliders/flex-carousel' );

		} ?>
		

        <div id="homecontent">
        
               <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Homepage Content") ) : ?>
               <?php endif; ?>
               
        </div><!-- #homecontent -->
        
        <div id="sidebar_mid" class="widgetable">
               	<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Middle Sidebar") ) : ?>
               	<?php endif; ?>
        </div><!-- #sidebar_mid -->
		
        <div id="sidebar" class="widgetable">
               	<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Homepage Sidebar") ) : ?>
               	<?php endif; ?>
        </div><!-- #sidebar -->

        
<?php get_footer(); ?>