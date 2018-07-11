<?php if(has_post_format('image')){
	echo get_template_part( '/includes/post-types/image' );
}elseif(has_post_format('link')){
	echo get_template_part( '/includes/post-types/link' );
}elseif(has_post_format('quote')){
	echo get_template_part( '/includes/post-types/quote' );
	} else {; ?>
    

<li <?php post_class(); ?>>

	<?php 
    $video_input = get_post_meta($post->ID, 'tmnf_video', true);
    $audio_input = get_post_meta($post->ID, 'tmnf_audio', true);
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
                else ?>
                
                  <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('mansory'); ?></a> 
                        
    <?php }?>
    
    <div style="clear: both;"></div>

    <h3 class="upperfont"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
    
        <div class="hrline"><span></span></div>
        
        <?php echo tmnf_meta_small2(); ?>
        
        <p><?php echo themnific_excerpt( get_the_excerpt(), '200'); ?></p>
        
        <?php echo tmnf_meta_more() ?>
                  
</li>
    
<?php }?>