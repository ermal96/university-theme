<?php


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
