		<div class="postauthor body2 postinfo">
        	<h3 class="upperfont"><?php _e('about the author','themnific');?>: <?php the_author_posts_link(); ?></h3>
			<?php  echo get_avatar( get_the_author_meta('ID'), '75' );   ?>
 			<div class="authordesc"><?php the_author_meta('description'); ?></div>
		</div>