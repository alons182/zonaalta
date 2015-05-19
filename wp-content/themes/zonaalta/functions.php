<?php 

add_theme_support('post-thumbnails');


function register_my_menus(){
	//register_nav_menu('header-nav', __('Header Navigation'));
	register_nav_menus(
		array(
			'menu-header' => __('Header Menu') ,
			'menu-footer' => __('Footer Menu')	
			 )
	 );
}
add_action('init','register_my_menus');

/*function register_my_widgets(){
	register_sidebar(
		array(
			'id' => 'sidebar-blog',
			'name' => 'Sidebar Blog',
			'description' => 'Sidebar Blog'
			)

	 );
  
}

add_action('widgets_init', 'register_my_widgets');*/

function site_favicon() {
    echo '<link rel="Shortcut Icon" type="image/x-icon" href="'.get_template_directory_uri().'/favicon.ico" />';
}

add_action('wp_head', 'site_favicon');