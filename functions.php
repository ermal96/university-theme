<?php


//Theme Includes

function university_files() {
  wp_enqueue_script('main-university-js', get_theme_file_uri('/js/scripts-bundled.js'), NULL, '1.0', true);
  wp_enqueue_style('custom-google-fonts', '//fonts.googleapis.com/css?family=Noto+Sans+JP:300,400,500');
  wp_enqueue_style('font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
  wp_enqueue_style('bootstrap', '//stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css');
  wp_enqueue_style('university_main_styles', get_stylesheet_uri());
}

add_action('wp_enqueue_scripts', 'university_files');


//Theme Features

function university_features() {
  register_nav_menu('headerMenuLocation', 'Header Menu Location');
  register_nav_menu('footerMenuLocationOne', 'Footer Menu Location One ');
  register_nav_menu('footerMenuLocationTwo', 'Footer Menu Location Two ');
  add_theme_support('title-tag');
  add_theme_support('post-thumbnails'); 
}

add_action('after_setup_theme', 'university_features');



// Register our sidebars and widgetized areas. 

function unverity_widgets_init() {

	register_sidebar( array(
		'name'          => 'Blog right sidebar',
		'id'            => 'blog_right_1',
		'before_widget' => '<div>',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="rounded">',
		'after_title'   => '</h2>',
	) );

}
add_action( 'widgets_init', 'unverity_widgets_init' );



//Register Post Types

function univerity_themes_post_types () {

       $labels = array(
        'name'                          => 'Events',
        'singular_name'                 => 'Event',
        'edit_item'                     => 'Edit Event',
        'new_item'                      => 'New Event',
        'view_item'                     => 'View Event',
        'search_items'                  => 'Search Events',
        'not_found'                     => 'Events Not Found',
        'all_items'                     => 'All Events',
        'archives'                      => 'Events Archives',
        'attributes'                    => 'Events Attributes',
        'insert_into_item'              => 'Insert Into Event',
        'featured_image'                => 'Image Event',
        'set_featured_image'            => 'Set Event Image',
        'remove_featured_image'         => 'Remove Event Image',
        'item_published'                => 'Event Published',
        'item_updated'                  => 'Event Updated',
       );
       
      $supports = array (
        'title',
        'editor',
        'excerpt',
        'author',
        'thumbnail',
        'comments',
        'revisions',
      );
      

      $args = array(
        'show_in_rest'          => true,
        'labels'                => $labels,
        'supports'              => $supports,
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'has_archive'           => true,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'page',
        'menu_icon'             => 'dashicons-calendar',
      );

	register_post_type( 'event', $args );

}



add_action( 'init', 'univerity_themes_post_types', 0 );





