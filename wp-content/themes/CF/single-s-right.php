<div id="homecontent">
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

        	<div <?php post_class('twinsbox'); ?>> 
 
			<?php 
			$video_input = get_post_meta($post->ID, 'tmnf_video', true);
			$audio_input = get_post_meta($post->ID, 'tmnf_audio', true);
			$rating = get_post_meta($post->ID, 'tmnf_rating_main', true);
			?>

			<?php 	if(has_post_format('video')){
                            echo ($video_input);
                    }elseif(has_post_format('audio')){
                            echo ($audio_input);
                    }elseif(has_post_format('gallery')){
						if (get_option('themnific_post_gallery_dis') == 'true' );
						else
                            echo get_template_part( '/includes/post-types/gallery-slider' );
                    } else {
						if (get_option('themnific_post_image_dis') == 'true' );
						else
                           the_post_thumbnail('format-standard', array('class' => 'main-single'));  
                                
            }?>
			
            <div style="clear: both;"></div>
            
           
            
            <h1 class="heading"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>

            <?php tmnf_meta_full(); ?>
         
            <div class="hrline"><span></span></div>
            
            <div class="entry">
            	
                <?php if($rating) {?>

                    <div class="ratingblock body2">
                    
                        <?php get_template_part( '/includes/mag-rating' ); ?>
                        
                    </div>
				
                <?php } else { }?>
            
            	<?php the_content(); ?>
            
            	<?php wp_link_pages( array( 'before' => '<div class="page-link"><span>' . __( 'Pages:','themnific') . '</span>', 'after' => '</div>' ) ); ?>


					
            	<?php 
					if (get_option('themnific_post_social_dis') == 'true' );
					else
					get_template_part('/includes/mag-buttons');
				?>





					<?php if (get_option('themnific_post_bread_dis') == 'true' );
                    else { ?>            	
                    	<div style="clear: both;"></div>
            
                			<div class="postinfo body2">

							<?php get_template_part('/includes/mag-nextprev'); ?>
                        
                            <div style="clear: both;"></div> 
                            
                		</div>
                        
                	<?php }?>
                    
                            
				<?php 
                    if (get_option('themnific_post_author_dis') == 'true' );
                    else
                    get_template_part('/includes/mag-authorinfo');
                ?>
                
            	<?php 
					if (get_option('themnific_post_related_dis') == 'true' );
					else 
					get_template_part('/includes/mag-relatedposts');
				?>
            
            	<div style="clear: both;"></div>
            
            	<?php comments_template(); ?>
            
            </div>
            
            </div>

	<?php endwhile; else: ?>

		<p><?php _e('Lo sentimos, no hay notas que correspondan a sus criterios.','themnific');?>.</p>

	<?php endif; ?>

    <div style="clear: both;"></div>

</div><!-- #homecontent -->

<div id="sidebar_mid" class="widgetable">
        <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Post Left Sidebar") ) : ?>
        <?php endif; ?>
</div><!-- #sidebar_mid -->

<div id="sidebar" class="widgetable">
        <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Post Right Sidebar") ) : ?>
        <?php endif; ?>
</div><!-- #sidebar -->