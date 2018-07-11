<li <?php post_class(); ?>>
    
    <h3 class="upperfont"><a href="<?php echo get_post_meta($post->ID, 'tmnf_linkss', true); ?>"><?php echo tmnf_icon() ?> <?php _e('[Link]','themnific');?> <?php the_title(); ?></a></h3>
    
        <?php echo tmnf_meta_small2(); ?>
        
        <p><?php echo themnific_excerpt( get_the_excerpt(), '350'); ?></p>
            
</li>