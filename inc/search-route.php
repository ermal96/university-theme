<?php

function registerSearch(){
    register_rest_route('university/v1', 'search', array(
        'methods' => WP_REST_SERVER::READABLE,
        'callback' => 'universitySearchResults'
    ));
}


function universitySearchResults ($data) {
    $query = new WP_Query(array(
        'post_type' => array('post', 'page', 'program', 'campus', 'professor', 'event'),
        's' =>  sanitize_text_field( $data['term'] )
    ));

    $results = array(
        'generalInfo' => array(),
        'professors' => array(),
        'programs' => array(),
        'events' => array(),
        'campuses' => array()
    );

    while($query->have_posts()){
        $query->the_post();
        if(get_post_type() == 'post' OR get_post_type() == 'page'){
            array_push($results['generalInfo'], array(
                'title' => get_the_title(),
                'link'  => get_the_permalink(),
                'img'   => get_the_post_thumbnail_url()
            ));
        }
        if(get_post_type() == 'professor'){
            array_push($results['professors'], array(
                'title' => get_the_title(),
                'link'  => get_the_permalink(),
                'img'   => get_the_post_thumbnail_url()
            ));
        }
        if(get_post_type() == 'program'){
            array_push($results['programs'], array(
                'title' => get_the_title(),
                'link'  => get_the_permalink(),
                'img'   => get_the_post_thumbnail_url(),
                'id'    => get_the_ID()
            ));
        }
        if(get_post_type() == 'event'){
            array_push($results['events'], array(
                'title' => get_the_title(),
                'link'  => get_the_permalink(),
                'img'   => get_the_post_thumbnail_url()
            ));
        }
        if(get_post_type() == 'campus'){
            array_push($results['campuses'], array(
                'title' => get_the_title(),
                'link'  => get_the_permalink(),
                'img'   => get_the_post_thumbnail_url()
            ));
        }

    }

    $programRelQuery = new WP_Query(array(
        'post_type'          => 'professor',
        'meta_query'         => array(
          array(
            'key'            => 'related_program',
            'compare'        => 'LIKE',
            'value'          => '"' . $results['programs'][0]['id'] .'"'
          )
        )
    ));


    while($programRelQuery->have_posts()){
        $programRelQuery->the_post();
            array_push($results['professors'], array(
                'title' => get_the_title(),
                'link'  => get_the_permalink(),
                'img'   => get_the_post_thumbnail_url()
            ));
    }

    $results['professors'] = array_values(array_unique($results['professors'], SORT_REGULAR));

    return $results;
}


add_action('rest_api_init', 'registerSearch');
