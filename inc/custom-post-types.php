<?php



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
