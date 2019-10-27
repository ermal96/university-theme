<?php


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
