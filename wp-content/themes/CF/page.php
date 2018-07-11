<?php get_header(); ?>
<div class="hrlineB"></div>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

        <div id="homecontent">
        
        	<div <?php post_class(); ?>>
            
                <h2 class="leading"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
    
                <div class="entry">
                        <?php the_content(); ?>
                        
                        <?php wp_link_pages( array( 'before' => '<div class="page-link"><span>' . __( 'Pages:','themnific') . '</span>', 'after' => '</div>' ) ); ?>
                        
                        <?php the_tags( '<p class="tagssingle">','',  '</p>'); ?>
                        
                </div>       
                                
                <div style="clear: both;"></div>
                          
                <?php comments_template(); ?>

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

<?php get_footer(); ?>