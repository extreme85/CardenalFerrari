		<h2 class="widget"><span><?php _e('Related Posts','themnific');?></span> </h2>
			<ul class="related">	
				
			<?php
			$backup = $post;
			$tags = wp_get_post_tags($post->ID);
			if ($tags) { $tag_ids = array();
				foreach($tags as $individual_tag) $tag_ids[] = $individual_tag->term_id;

				$args=array(
					'tag__in' => $tag_ids,
					'post__not_in' => array($post->ID),
					'showposts'=>3, // Number of related posts that will be shown.
					'caller_get_posts'=>1
				);
				$my_query = new wp_query($args);
				if( $my_query->have_posts() ) { echo ''; while ($my_query->have_posts()) { $my_query->the_post();
			?>
            <li><?php echo tmnf_ribbon() ?></span>
                        
				<?php if ( has_post_thumbnail()) : ?>
                
                     <a href="<?php the_permalink(); ?>" title="<?php the_title();?>" >
                     
                            <?php the_post_thumbnail( 'block_3',array('title' => "")); ?>
                            
                     </a>
                     
                <?php endif; ?>
                
                <h3 class="upperfont"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php echo short_title('...', 12); ?></a></h3>
                

			</li>
			<?php
					}
					echo '';
				}
			}
			$post = $backup;
			wp_reset_query(); 
			?>
			</ul>
			<div style="clear: both;"></div>