<?php
/*
Template Name: Full Width
*/
?>
<?php get_header(); ?>
    
    	<div class="entryfull">
            
            <h2 class="post"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
            
            <div class="hrlineB"><span></span></div>
            
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            
            <?php the_content(); ?>
            
            <?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
            
            <?php endwhile; endif; ?>
            
       	</div>
    
   	<div style="clear: both;"></div>
    
<?php get_footer(); ?>