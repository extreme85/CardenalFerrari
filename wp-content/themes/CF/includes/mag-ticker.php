<div id="tickerwarp" class="<?php if (get_option('themnific_ticker_res_mode') == 'false' ); else echo 'resmode-No'; ?>">

<span class="lab"><?php _e('Eventos','themnific');?></span>
    
    <ul class="scroller">
    
		<?php $ticker_cat = get_cat_ID(get_option('themnific_ticker_category'));
        $my_query = new WP_Query( 'showposts=10&cat='. $ticker_cat .'');	 
        while ($my_query->have_posts()) : $my_query->the_post();$do_not_duplicate = $post->ID; ?>
        
        <li>
           <span class="tickdate"><?php the_time(get_option('date_format')); ?>  | </span><a href="<?php the_permalink(); ?>"> <?php echo short_title('...', 18); ?></a>
        </li>
            
        <?php endwhile; ?>
        
    </ul>
    <?php wp_reset_query(); ?>
    
    <?php get_template_part('/includes/uni-searchformhead'); ?>
    
</div>
        
		