<?php
/*
Template Name: 404
*/
?>
<?php get_header(); ?>
        <div id="homecontent">
        	<?php get_template_part('/includes/mag-ticker-random');?>
            <h2 class="leading upperfont"><?php _e('Nothing found here','themnific');?></h2>
            
            <div class="hrline"><span></span></div> 
            
           	<h4><?php _e('Perhaps You will find something interesting form these lists...','themnific');?></h4>
            <div class="hrlineB"><span></span></div> 
            <div class="entry">
			<?php get_template_part('/includes/uni-404-content');?>
            </div>
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
