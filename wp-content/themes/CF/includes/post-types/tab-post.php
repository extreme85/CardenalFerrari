<div class="tab-post">

	  <?php if ( has_post_thumbnail()) : ?>
      
           <a href="<?php the_permalink(); ?>" title="<?php the_title();?>" >
           
           		<?php the_post_thumbnail( 'tabs',array('title' => "")); ?>
                
           </a>
           
      <?php endif; ?>
          
      <h3><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php echo short_title('...', 11); ?> <?php echo tmnf_icon() ?></a></h3>
      
      <?php tmnf_meta_small2(); ?>
        
</div>