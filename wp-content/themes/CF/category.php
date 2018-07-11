<?php get_header(); ?>

   	<div id="homecontent">
        
	<?php get_template_part('/includes/mag-ticker-random');?> 
         
	<?php if (have_posts()) : ?>
    
		<?php $post = $posts[0]; if (is_category()) { ?>
        
        	<h2 class="leading upperfont"><?php _e('Archivo de','themnific');?> &#8216;<?php single_cat_title(); ?>&#8217; <?php _e('','themnific');?></h2>
            
        <?php  } elseif( is_tag() ) { ?>
        
        	<h2 class="leading upperfont"><?php _e('Posts Tagged','themnific');?> &#8216;<?php single_tag_title(); ?>&#8217;</h2>
            
        <?php } ?>
            
            <div class="hrline"><span></span></div>
    
      		<ul class="archivepost">
          
    			<?php while (have_posts()) : the_post(); ?>
                                              		
            		<?php get_template_part('/includes/post-types/archivepost');?>
                    
   				<?php endwhile; ?>   <!-- end post -->
                    
     		</ul><!-- end latest posts section-->
            
            <div style="clear: both;"></div>

					<div class="pagination"><?php pagination('&laquo;', '&raquo;'); ?></div>

					<?php else : ?>
			

                        <h1>Lo sentimos, no hay notas que correspondan a sus criterios.</h1>
                        <?php get_search_form(); ?><br/>
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