<?php
add_action('widgets_init', 'tmnf_featured_ad');

function tmnf_featured_ad()
{
	register_widget('tmnf_featured_ad');
}

class tmnf_featured_ad extends WP_Widget {
	
	function tmnf_featured_ad()
	{
		$widget_ops = array('classname' => 'tmnf_featured_ad', 'description' => 'Latest posts widget.');

		$control_ops = array('id_base' => 'tmnf_featured_ad');

		$this->WP_Widget('tmnf_featured_ad', 'Themnific - Home: Latest posts', $widget_ops, $control_ops);
	}
	
	function widget($args, $instance)
	{
		extract($args);
		
		$title = $instance['title'];
		$adimage = $instance['adimage'];
		$adurl = $instance['adurl'];
		$post_type = 'all';
		$categories = $instance['categories'];
		$posts = $instance['posts'];
		
		echo $before_widget;
		?>
		
		<?php
		$post_types = get_post_types();
		unset($post_types['page'], $post_types['attachment'], $post_types['revision'], $post_types['nav_menu_item']);
		
		if($post_type == 'all') {
			$post_type_array = $post_types;
		} else {
			$post_type_array = $post_type;
		}
		?>

			<h2 class="widget"><span><i class="icon-file"></i> <?php _e('Ultimas noticias','themnific');?></span></h2>
			
			<?php
			$recent_posts = new WP_Query(array(
				'showposts' => $posts,
				'cat' => $categories,
			));
			?>
            <ul class="raws">
			<?php  while($recent_posts->have_posts()): $recent_posts->the_post(); ?>

			<li>
                    
				<?php if ( has_post_thumbnail()) : ?>
                     <a href="<?php the_permalink(); ?>" title="<?php the_title();?>" >
                     <?php the_post_thumbnail( 'blog',array('title' => "")); ?>
                     </a>
                <?php endif; ?>                    
                
                <?php tmnf_meta_small2(); ?>
                    
                <h3 class="upperfont"><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php echo short_title('...', 16); ?></a></h3>
                
                
                <p class="teaser"><?php echo themnific_excerpt( get_the_excerpt(), '120'); ?></p>
                
                <?php echo tmnf_meta_more() ?>
                        
			</li>

			<?php  endwhile; ?>
            <li class="rawsfix"><h2 class="widget"><a href="<?php echo $adurl; ?>"><span class="fr"><?php echo $title; ?> <i class="icon-circle-arrow-right"></i></span></a></h2></li>
			</ul>
            
			<div style="clear: both;"></div>
		
		<?php
		echo $after_widget;
	}
	
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;
		
		$instance['title'] = $new_instance['title'];
		$instance['adimage'] = $new_instance['adimage'];
		$instance['adurl'] = $new_instance['adurl'];
		$instance['post_type'] = 'all';
		$instance['categories'] = $new_instance['categories'];
		$instance['posts'] = $new_instance['posts'];
		
		return $instance;
	}

	function form($instance)
	{
		$defaults = array('title' => 'Recent Posts', 'adimage' => '','adurl' => '','post_type' => 'all', 'categories' => 'all', 'posts' => 3, 'show_excerpt' => null);
		$instance = wp_parse_args((array) $instance, $defaults); ?>
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>">Title:</label>
			<input class="widefat" style="width: 216px;" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo esc_attr($instance['title']); ?>" />
		</p>

		
		<p>
			<label for="<?php echo $this->get_field_id('categories'); ?>">Filter by Category:</label> 
			<select id="<?php echo $this->get_field_id('categories'); ?>" name="<?php echo $this->get_field_name('categories'); ?>" class="widefat categories" style="width:100%;">
				<option value='all' <?php if ('all' == $instance['categories']) echo 'selected="selected"'; ?>>all categories</option>
				<?php $categories = get_categories('hide_empty=0&depth=1&type=post'); ?>
				<?php foreach($categories as $category) { ?>
				<option value='<?php echo $category->term_id; ?>' <?php if ($category->term_id == $instance['categories']) echo 'selected="selected"'; ?>><?php echo $category->cat_name; ?></option>
				<?php } ?>
			</select>
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id('posts'); ?>">Number of posts:</label>
			<input class="widefat" style="width: 30px;" id="<?php echo $this->get_field_id('posts'); ?>" name="<?php echo $this->get_field_name('posts'); ?>" value="<?php echo esc_attr($instance['posts']); ?>" />
		</p>


		<p>
			<label for="<?php echo $this->get_field_id('adurl'); ?>">Custom URL (eg. URL of Blog page):</label>
			<input class="widefat" style="width: 216px;" id="<?php echo $this->get_field_id('adurl'); ?>" name="<?php echo $this->get_field_name('adurl'); ?>" value="<?php echo esc_attr($instance['adurl']); ?>" />
		</p>	

	<?php }
}
?>