<div id="block-wrap">
<ul id="block">
<?php 
	$feature_cat = get_cat_ID(get_option('themnific_slider_category'));
?>
    <?php 	$my_loop = new WP_Query('&showposts=1&cat='. $feature_cat .'');	 
			while ($my_loop->have_posts()) : $my_loop->the_post();$do_not_duplicate = $post->ID; ?>	
    
    		<?php get_template_part('/includes/sliders-types/blocks2');?>
    
    <?php endwhile; ?> 
    
    
    <?php 	$my_loop = new WP_Query('&showposts=1&offset=1&cat='. $feature_cat .'');	 
			while ($my_loop->have_posts()) : $my_loop->the_post();$do_not_duplicate = $post->ID; ?>	
    
    		<?php get_template_part('/includes/sliders-types/blocks1');?>
    
    <?php endwhile; ?>
   
   
    <?php 	$my_loop = new WP_Query('&showposts=1&offset=2&cat='. $feature_cat .'');	 
			while ($my_loop->have_posts()) : $my_loop->the_post();$do_not_duplicate = $post->ID; ?>	
    
    		<?php get_template_part('/includes/sliders-types/blocks3');?>
    
    <?php endwhile; ?>
    
    <?php 	$my_loop = new WP_Query('&showposts=1&offset=3&cat='. $feature_cat .'');	 
			while ($my_loop->have_posts()) : $my_loop->the_post();$do_not_duplicate = $post->ID; ?>	
    
    		<?php get_template_part('/includes/sliders-types/blocks4');?>
    
    <?php endwhile; ?> 
        
    <?php 	$my_loop = new WP_Query('&showposts=1&offset=4&cat='. $feature_cat .'');	 
			while ($my_loop->have_posts()) : $my_loop->the_post();$do_not_duplicate = $post->ID; ?>	
    
    		<?php get_template_part('/includes/sliders-types/blocks5');?>
    
    <?php endwhile; ?> 
    
    <?php 	$my_loop = new WP_Query('&showposts=1&offset=5&cat='. $feature_cat .'');	 
			while ($my_loop->have_posts()) : $my_loop->the_post();$do_not_duplicate = $post->ID; ?>	
    
    		<?php get_template_part('/includes/sliders-types/blocks6');?>
    
    <?php endwhile; ?> 
    
        <?php 	$my_loop = new WP_Query('&showposts=1&offset=6&cat='. $feature_cat .'');	 
			while ($my_loop->have_posts()) : $my_loop->the_post();$do_not_duplicate = $post->ID; ?>	
    
    		<?php get_template_part('/includes/sliders-types/blocks7');?>
    
    <?php endwhile; ?> <?php wp_reset_query(); ?>
    
    
</ul>	<?php wp_reset_query(); ?>
</div>
<div class="clear"></div>
