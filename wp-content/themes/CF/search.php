<?php get_header(); ?>

   	<div id="homecontent">
        
	<?php get_template_part('/includes/mag-ticker-random');?> 

			<h2 class="leading upperfont"><?php _e('Search Results for','themnific');?> "<?php echo $s; ?>"</h2>

		<?php if (have_posts()) : ?>

            <div class="hrline"><span></span></div>

      		<ul class="archivepost">
          
    			<?php while (have_posts()) : the_post(); ?>
                                              		
            		<?php get_template_part('/includes/post-types/archivepost');?>
                    
   				<?php endwhile; ?>   <!-- end post -->
                    
     		</ul><!-- end latest posts section-->
            
            <div style="clear: both;"></div>
            
					<div class="pagination"><?php pagination('&laquo;', '&raquo;'); ?></div>

					<?php else : ?>
                    
						<!-- Not Found Handling -->
                        
                        <div class="hrlineB"><span></span></div>
                        
                        <h3 class="upperfont"><?php _e('Sorry, no posts matched your criteria.','themnific');?></h3>
                        
           				<h4><?php _e('Perhaps You will find something interesting form these lists...','themnific');?></h4>
                        
            			<div class="hrlineB"></div>
                        
						<?php get_template_part('/includes/uni-404-content');?>
                        
                        
					<?php endif; ?>

        </div><!-- end #homesingle-->
        
        <div id="sidebar_mid" class="widgetable">
               	<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Middle Sidebar") ) : ?>
               	<?php endif; ?>
        </div><!-- #sidebar_mid -->
		
        <div id="sidebar" class="widgetable">
               	<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Homepage Sidebar") ) : ?>
               	<?php endif; ?>
        </div><!-- #sidebar -->

<?php get_footer(); ?>