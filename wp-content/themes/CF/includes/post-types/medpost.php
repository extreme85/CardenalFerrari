<li <?php post_class(); ?>>

			<?php 
			$video_input = get_post_meta($post->ID, 'tmnf_video', true);
			$audio_input = get_post_meta($post->ID, 'tmnf_audio', true);
			?>

            <h2 class="upperfont"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

            <?php tmnf_meta(); ?>
            
            <div style="clear: both;"></div>

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

    		<div class="entry">   

				<?php global $more; $more = 0; ?>
                
                <?php the_content('Continue Reading'); ?> 
                
                <a class="mainbutton fr" href="<?php the_permalink(); ?>"><?php _e('Read More','themnific');?> &#187;</a>
                  
           	</div>
                  
</li>