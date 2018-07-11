<?php
add_action('widgets_init', 'tmnf_homepage_1col_load_widgets');

function tmnf_homepage_1col_load_widgets()
{
	register_widget('tmnf_Homepage_1col_Widget');
}

class tmnf_Homepage_1col_Widget extends WP_Widget {
	
	function tmnf_Homepage_1col_Widget()
	{
		$widget_ops = array('classname' => 'tmnf_homepage_1col', 'description' => 'Homepage 1 Category widget.');

		$control_ops = array('id_base' => 'tmnf_homepage_1col-widget');

		$this->WP_Widget('tmnf_homepage_1col-widget', 'Themnific - Home: 1 Category', $widget_ops, $control_ops);
	}
	
	function widget($args, $instance)
	{
		extract($args);
		
		$title = $instance['title'];
		$post_type = 'all';
		$categories = $instance['categories'];
		$posts = $instance['posts'];
		$images = true;
		$show_excerpt = isset($instance['show_excerpt']) ? 'true' : 'false';
		
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
			
			<h2 class="widget"><a href="<?php echo esc_url(get_category_link($categories)); ?>"><span><i class="icon-star"></i> <?php echo $title; ?></span></a>
            </h2>
			<?php
			$recent_posts = new WP_Query(array(
				'showposts' => $posts,
				'cat' => $categories,
			));
			?>
            <ul class="twins">
			<?php 
			$big_count = round($posts / 7);
			if(!$big_count) { $big_count = 1; }
			$counter = 1; while($recent_posts->have_posts()): $recent_posts->the_post();
            if($counter <= $big_count): if($counter == $big_count) { $last = 'block-item-big-last'; } else { $last = ''; }
			?>
            
                <li class="big_single">
                    
                    <?php echo tmnf_rating_cat() ?>
                
					<?php $video_input = get_post_meta(get_the_ID(), 'tmnf_video', true);?>
                    
                    <?php if($video_input) {?>
                    
                            <?php echo ($video_input); ?>
                            
                    <?php } else {?>

                        <?php if ( has_post_thumbnail()) : ?>
                        
                             <a href="<?php the_permalink(); ?>" title="<?php the_title();?>" >
                             
                             	<?php the_post_thumbnail( 'w-big_single',array('title' => "")); ?>
                                
                             </a>
                             
                        <?php endif; ?>
                        
                    <?php }?> 

                    <?php echo tmnf_meta_small()?>
                    
                    <h2 class="upperfont"><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php echo short_title('...', 16); ?></a></h2>
                    
                    <p class="teaser"><?php echo themnific_excerpt( get_the_excerpt(), '350'); ?></p>
                    
                    <?php echo tmnf_meta_more() ?>
                    
                </li><!-- end big twin -->
            
			<?php else: ?>
            
            

				<li class="small_posts">
            
					<?php if ( has_post_thumbnail()) : ?>
                    
                         <a href="<?php the_permalink(); ?>" title="<?php the_title();?>" >
                         
                         	<?php the_post_thumbnail( 'w-small_single',array('title' => "")); ?>
                            
                         </a>
                         
                    <?php endif; ?>

                    <?php echo tmnf_meta()?>
        
					<h3><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php echo short_title('...', 14); ?> <?php echo tmnf_icon() ?></a></h3>

				</li><!-- end small twin -->
            
			<?php endif; ?>
            
			<?php $counter++; endwhile; ?>
            </ul>
		<div style="clear: both;"></div>
		
		<?php
		echo $after_widget;
	}
	
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;
		
		$instance['title'] = $new_instance['title'];
		$instance['post_type'] = 'all';
		$instance['categories'] = $new_instance['categories'];
		$instance['posts'] = $new_instance['posts'];
		$instance['show_images'] = true;
		$instance['show_excerpt'] = $new_instance['show_excerpt'];
		
		return $instance;
	}

	function form($instance)
	{
		$defaults = array('title' => 'Recent Posts', 'post_type' => 'all', 'categories' => 'all', 'posts' => 3, 'show_excerpt' => true);
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
			<input class="checkbox" type="checkbox" <?php checked($instance['show_excerpt'], 'on'); ?> id="<?php echo $this->get_field_id('show_excerpt'); ?>" name="<?php echo $this->get_field_name('show_excerpt'); ?>" /> 
			<label for="<?php echo $this->get_field_id('show_excerpt'); ?>">Show excerpt</label>
		</p>
	<?php }
}
?>