<li <?php post_class(); ?>>

			<?php if ( has_post_thumbnail()) : ?>
                <a href="<?php the_permalink(); ?>" title="<?php the_title();?>" >
                <?php the_post_thumbnail( 'blog',array('title' => "")); ?>
                </a>
            <?php endif; ?>

            <h2 class="upperfont"><a href="<?php the_permalink(); ?>"><?php the_title(); ?> <?php echo tmnf_icon() ?> </a></h2>

            <?php tmnf_meta(); ?>
            
            <p class="teaser"><?php echo themnific_excerpt( get_the_excerpt(), '130'); ?></p>
             
            
</li>