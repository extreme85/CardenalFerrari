<?php get_header(); 
setPostViews(get_the_ID()); ?>

<?php $post_widgets = get_option('themnific_post_widgets'); ?>
<?php if($post_widgets == 'both')  {
	get_template_part('single-s-right' );
	}elseif($post_widgets == 'rightone'){
	get_template_part('single-right' );
	} else {
	get_template_part('single-s-right' );
}?>

<?php get_footer(); ?>