<?php
if ( function_exists('has_nav_menu') && has_nav_menu('main-menu') ) {
	wp_nav_menu( array( 'depth' => 3, 'sort_column' => 'menu_order', 'container' => 'ul', 'menu_class' => 'nav custom-nav', 'menu_id' => 'sec-nav' , 'theme_location' => 'main-menu' ) );
} else {
?>
    <ul id="sec-nav" class="nav">
            <?php wp_list_categories('sort_column=menu_order&depth=3&title_li=&exclude=');  ?>
    </ul><!-- /#nav -->
<?php } ?>

	  