	<?php 
        $top_carousel = get_cat_ID(get_option('themnific_carousel_category'));
        $top_carousel_posts_nr = get_option('themnific_carousel_postnumber');
        $my_query = new WP_Query('showposts='.$top_carousel_posts_nr.'&cat='. $top_carousel .'');	 
        if ($my_query->have_posts()) :
    ?>

            <div class="flexcarousel flexslider">
            <ul class="slides">
			<?php while ($my_query->have_posts()) : $my_query->the_post();$do_not_duplicate = $post->ID; ?>	

			<li class="body2">
                    
					<?php if ( has_post_thumbnail()) : ?>
                         <a href="<?php the_permalink(); ?>" title="<?php the_title();?>" >
                         <?php the_post_thumbnail( 'carousel',array('title' => "")); ?>
                         </a>
                    <?php endif; ?>
                    
                    <?php echo tmnf_meta_small(); ?>
	
                    <h3><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php echo short_title('...', 12); ?></a></h3>
			</li>

			<?php  endwhile; ?>
			</ul>
            </div>
        <?php endif; ?>
        <?php wp_reset_query(); ?>