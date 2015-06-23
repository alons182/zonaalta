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

add_filter( 'rwmb_meta_boxes', 'zonaalta_register_meta_boxes' );

function zonaalta_register_meta_boxes( $meta_boxes )
{

    $prefix = 'rw_';

    // 1st meta box
    $meta_boxes[] = array(
        'id'       => 'ads_content',
        'title'    => 'Anuncios',
        'pages'    => array( 'post', 'page', 'ads' ),
        'context'  => 'normal',
        'priority' => 'high',

        'fields' => array(
            
             array(
                'name'  => 'Image',
                'desc'  => 'Format: Image File',
                'id'    => $prefix . 'ad_image',
                'type'  => 'image',
                'std'   => '',
                'class' => 'custom-class'
                
            ),
              array(
                'name'  => 'Url',
                'desc'  => 'Format: Url',
                'id'    => $prefix . 'ad_url',
                'type'  => 'url',
                'std'   => '',
                'class' => 'custom-class'
                
            )

        )
    );
    


    return $meta_boxes;
}

//custom post type services
function my_custom_post_ads() {
  $labels = array(
    'name'               => _x( 'Anuncios', 'post type general name' ),
    'singular_name'      => _x( 'Anuncio', 'post type singular name' ),
    'add_new'            => _x( 'Add New', 'book' ),
    'add_new_item'       => __( 'Add New Anuncio' ),
    'edit_item'          => __( 'Edit Anuncio' ),
    'new_item'           => __( 'New Anuncio' ),
    'all_items'          => __( 'All ads' ),
    'view_item'          => __( 'View Anuncio' ),
    'search_items'       => __( 'Search Anuncios' ),
    'not_found'          => __( 'No anuncios found' ),
    'not_found_in_trash' => __( 'No Anuncios found in the Trash' ), 
    'parent_item_colon'  => '',
    'menu_name'          => 'Anuncios'
  );
  $args = array(
    'labels'        => $labels,
    'description'   => 'Holds our Ads and Ad specific data',
    'public'        => true,
    'menu_position' => 5,
    'supports'      => array( 'title', 'editor', 'thumbnail', 'excerpt', 'comments' ),
    'has_archive'   => true,
  );
  register_post_type( 'ads', $args ); 
}
add_action( 'init', 'my_custom_post_ads' );

function my_updated_messages( $messages ) {
  global $post, $post_ID;
  $messages['ads'] = array(
    0 => '', 
    1 => sprintf( __('Anuncio updated. <a href="%s">View Anuncio</a>'), esc_url( get_permalink($post_ID) ) ),
    2 => __('Custom field updated.'),
    3 => __('Custom field deleted.'),
    4 => __('Anuncio updated.'),
    5 => isset($_GET['revision']) ? sprintf( __('Project restored to revision from %s'), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
    6 => sprintf( __('Anuncio published. <a href="%s">View Anuncio</a>'), esc_url( get_permalink($post_ID) ) ),
    7 => __('Anuncio saved.'),
    8 => sprintf( __('Anuncio submitted. <a target="_blank" href="%s">Preview Anuncio</a>'), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
    9 => sprintf( __('Anuncio scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview Anuncio</a>'), date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( get_permalink($post_ID) ) ),
    10 => sprintf( __('Anuncio draft updated. <a target="_blank" href="%s">Preview Anuncio</a>'), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
  );
  return $messages;
}
add_filter( 'post_updated_messages', 'my_updated_messages' );

