<?php


//Theme Includes

function university_files()
{
    wp_enqueue_script('main-university-js', get_theme_file_uri('/js/scripts-bundled.js'), null, '1.0', true);
    wp_enqueue_style('custom-google-fonts', '//fonts.googleapis.com/css?family=Noto+Sans+JP:300,400,500');
    wp_enqueue_style('font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
    wp_enqueue_style('bootstrap', '//stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css');
    wp_enqueue_style('university_main_styles', get_stylesheet_uri());
}

add_action('wp_enqueue_scripts', 'university_files');


//Theme Features

function university_features()
{
    register_nav_menu('headerMenuLocation', 'Primary');
    register_nav_menu('footerMenuLocationOne', 'Footer ');
    register_nav_menu('footerMenuLocationTwo', 'Footer Menu Location Two ');
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_image_size('professorLandscape', 400, 260, true);
    add_image_size('professorPortrait', 480, 650, true);
}

add_action('after_setup_theme', 'university_features');


function pageBanner()
{
    ?>

<div class="page-banner">
  <div class="page-banner__bg-image" style="background-image: url(<?php $backImg = get_field('page_banner_background_image');
    echo $backImg['url']
    ?>);">
  </div>
  <div class="page-banner__content container container--narrow">
    <h2 class="page-banner__title"><?php the_title(); ?>
    </h2>
    <div class="page-banner__intro">
      <p><?php the_field('page_banner_subtitle'); ?>
      </p>
    </div>
  </div>
</div>

<?php
}




// University Adjust Queries

function university_adjust_queries($query)
{
    //Program
    if (!is_admin() && is_post_type_archive('program') && $query->is_main_query()) {
        $query->set('orderby', 'title');
        $query->set('order', 'ASC');
        $query->set('post_per_page', -1);
    }

    //Event Date
    if (!is_admin() && is_post_type_archive('event') && $query->is_main_query()) {
        $today = date('Ymd');
        $query->set('meta_key', 'event_date');
        $query->set('orderby', 'meta_value');
        $query->set('order', 'ASC');
        $query->set('meta_query', array(
      array(
        'key'            => 'event_date',
        'compare'        => '>=',
        'value'          => $today,
        'type'           => 'numeric'
      )
      ));
    }
}



add_action('pre_get_posts', 'university_adjust_queries');



// Register our sidebars and widgetized areas.

function unverity_widgets_init()
{
    register_sidebar(array(
        'name'          => 'Blog right sidebar',
        'id'            => 'blog_right_1',
        'before_widget' => '<div>',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="rounded">',
        'after_title'   => '</h2>',
    ));
}
add_action('widgets_init', 'unverity_widgets_init');



//Register Post Types

function univerity_themes_post_types()
{

//Events Post Type
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
       
    $supports = array(
        'title',
        'editor',
        'excerpt',
        'author',
        'thumbnail',
        'revisions'
      );
      

    $args = array(
        'show_in_rest'          => true,
        'labels'                => $labels,
        'supports'              => $supports,
        'public'                => true,
        'has_archive'           => true,
        'rewrite'               => array(
        'slug' => 'events'
        ),
        'menu_icon'             => 'dashicons-calendar',
      );

    register_post_type('event', $args);


    //Professors Post Type
    $labels = array(
    'name'                          => 'Professors',
    'singular_name'                 => 'Professor',
    'edit_item'                     => 'Edit Professor',
    'new_item'                      => 'New Professor',
    'view_item'                     => 'View Professor',
    'search_items'                  => 'Search Professors',
    'not_found'                     => 'Professors Not Found',
    'all_items'                     => 'All Professors',
    'archives'                      => 'Professors Archives',
    'attributes'                    => 'Professors Attributes',
    'insert_into_item'              => 'Insert Into Professor',
    'featured_image'                => 'Image Professor',
    'set_featured_image'            => 'Set Professor Image',
    'remove_featured_image'         => 'Remove Professor Image',
    'item_published'                => 'Professor Published',
    'item_updated'                  => 'Professor Updated',
   );
   
    $supports = array(
    'title',
    'editor',
    'excerpt',
    'author',
    'thumbnail',
    'revisions'
  );
  

    $args = array(
    'show_in_rest'          => true,
    'labels'                => $labels,
    'supports'              => $supports,
    'public'                => true,
    'show_in_admin_bar'     => true,
    'menu_icon'             => 'dashicons-welcome-learn-more',
  );

    register_post_type('professor', $args);


    //Porograms Post Type
    $labels = array(
  'name'                          => 'Programs',
  'singular_name'                 => 'Program',
  'edit_item'                     => 'Edit Program',
  'new_item'                      => 'New Program',
  'view_item'                     => 'View Program',
  'search_items'                  => 'Search Program',
  'not_found'                     => 'Programs Not Found',
  'all_items'                     => 'All Programs',
  'archives'                      => 'Programs Archives',
  'attributes'                    => 'Programs Attributes',
  'item_published'                => 'Program Published',
  'item_updated'                  => 'Program Updated',
 );
 
    $supports = array(
  'title',
  'editor',
  'author',
  'revisions'
);


    $args = array(
  'show_in_rest'          => true,
  'labels'                => $labels,
  'supports'              => $supports,
  'public'                => true,
  'has_archive'           => true,
  'rewrite'               => array(
  'slug' => 'programs'
  ),
  'menu_icon'             => 'dashicons-awards',
);

    register_post_type('program', $args);
}



add_action('init', 'univerity_themes_post_types', 0);
