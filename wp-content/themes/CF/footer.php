

<div id="footer">

		<?php get_template_part('/includes/uni-bottombox');?>
        
        <div style="clear: both;"></div>
        
        <div class="hrlineB"></div>
        
        <div id="copyright">
                
          	<div class="fl">
                
				<?php if(get_option('themnific_footer_left') == 'true'){
                
                    echo stripslashes(get_option('themnific_footer_left_text'));
                
                } else { ?>
                
                    <p>&copy; <?php echo date("Y"); ?> <?php bloginfo('name'); ?>&trade;</p>
                    
                <?php } ?>
               
			</div>
            
        	<div class="fr">
            
				<?php if(get_option('themnific_footer_right') == 'true'){
                
                    echo stripslashes(get_option('themnific_footer_right_text'));
                
                } else { ?>
                
                    <p><?php _e('Powered by','themnific');?> <a href="http://www.wordpress.org">Wordpress</a>. <?php _e('Designed by','themnific');?> </p>
                    
                <?php } ?>
                
			</div>
            
        </div> 
    
    </div>
    
</div><!-- /#footer  -->
    



<div class="scrollTo_top" style="display: block">
<a title="Scroll to top" href="#"></a>
</div>
<?php themnific_foot(); ?>
<?php wp_footer(); ?>
</body>
</html>