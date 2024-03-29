<?php



//Register Post Types

function univerity_themes_post_types()
{

//Campuses Post Type
    $labels = array(
        'name'                          => 'Campus',
        'singular_name'                 => 'Campus',
        'edit_item'                     => 'Edit Campus',
        'new_item'                      => 'New Campus',
        'view_item'                     => 'View Campus',
        'search_items'                  => 'Search Campus',
        'not_found'                     => 'Campus Not Found',
        'all_items'                     => 'All Campus',
        'archives'                      => 'Campus Archives',
        'attributes'                    => 'Campus Attributes',
        'insert_into_item'              => 'Insert Into Campus',
        'featured_image'                => 'Image Campus',
        'set_featured_image'            => 'Set Campus Image',
        'remove_featured_image'         => 'Remove Campus Image',
        'item_published'                => 'Campus Published',
        'item_updated'                  => 'Campus Updated',
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
        'capability_type'       => 'campus',
        'map_meta_cap'          => true,
        'show_in_rest'          => true,
        'labels'                => $labels,
        'supports'              => $supports,
        'public'                => true,
        'has_archive'           => true,
        'rewrite'               => array(
          'slug' => 'campuses'
          ),
        'menu_icon'             => 'dashicons-location-alt',
      );

    register_post_type('campus', $args);



    //Notes Post Type
    $labels = array(
      'name'                          => 'Notes',
      'singular_name'                 => 'Note',
      'edit_item'                     => 'Edit Note',
      'new_item'                      => 'New Note',
      'view_item'                     => 'View Note',
      'search_items'                  => 'Search Notes',
      'not_found'                     => 'Notes Not Found',
      'all_items'                     => 'All Notes',
      'archives'                      => 'Notes Archives',
      'attributes'                    => 'Notes Attributes',
      'insert_into_item'              => 'Insert Into Note',
      'featured_image'                => 'Image Note',
      'set_featured_image'            => 'Set Note Image',
      'remove_featured_image'         => 'Remove Note Image',
      'item_published'                => 'Note Published',
      'item_updated'                  => 'Note Updated',
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
      'capability_type'       => 'notes',
      'map_meta_cap'          => true,
      'show_in_rest'          => true,
      'labels'                => $labels,
      'supports'              => $supports,
      'public'                => false,
      'show_ui'               => true,
      'has_archive'           => true,
      'menu_icon'             => 'dashicons-welcome-write-blog',
    );

    register_post_type('notes', $args);


    //Likes Post Type
    $labels = array(
      'name'                          => 'Likes',
      'singular_name'                 => 'Like',
      'edit_item'                     => 'Edit Like',
      'new_item'                      => 'New Like',
      'view_item'                     => 'View Like',
      'search_items'                  => 'Search Likes',
      'not_found'                     => 'Likes Not Found',
      'all_items'                     => 'All Likes'
     );
     
    $supports = array(
      'title',
      'author'
    );
    

    $args = array(
      'labels'                => $labels,
      'supports'              => $supports,
      'public'                => false,
      'show_ui'               => true,
      'menu_icon'             => 'dashicons-heart',
    );

    register_post_type('like', $args);



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
