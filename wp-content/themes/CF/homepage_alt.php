<?php
/*
Template Name: Homepage Mansory
*/
?>
<?php get_header(); ?>

	<?php if (get_option('themnific_slider_dis_blog') <> "true") { 

        get_template_part('/includes/sliders/mosaic' );

    } ?>
    
    <?php if (get_option('themnific_carousel_dis_blog') <> "true") { 

        get_template_part('/includes/sliders/flex-carousel' );

    } ?>

	<ul class="mansory">

                	<?php
						if ( get_query_var('paged') ) {
							$paged = get_query_var('paged');
						} else if ( get_query_var('page') ) {
							$paged = get_query_var('page');
						} else {
							$paged = 1;
						}
						query_posts( array( 'post_type' => 'post', 'paged' => $paged ) );
					?>
					<?php if (have_posts()) : ?>
                                        
                    <?php while (have_posts()) : the_post(); 
            
						echo get_template_part( '/includes/post-types/mansory-post' ); 
						
					endwhile; ?><!-- end post -->
                    
	</ul><!-- end latest posts section-->
            
        <div style="clear: both;"></div>

            <div class="nav-next fl"><?php previous_posts_link( __( '<i class="icon-circle-arrow-left"></i> Previous posts', 'themnific') ); ?></div>
            <div class="nav-previous fr"><?php next_posts_link( __( 'Next Posts  <i class="icon-circle-arrow-right"></i>', 'themnific') ); ?></div>

    <?php else : ?>


        <h1>Lo sentimos, no hay notas que correspondan a sus criterios.</h1>
        <?php get_search_form(); ?><br/>
    <?php endif; ?>
        
<?php get_footer(); ?>