<?php

function likeRoutes()
{
    register_rest_route('university/v1', 'like', array(
        'methods' => 'POST',
        'callback' => 'createLike'
    ));

    register_rest_route('university/v1', 'like', array(
        'methods' => 'DELETE',
        'callback' => 'deleteLike'
    ));
}

function createLike($data)
{
    $professorId = sanitize_text_field($data['postId']);
    $professorName = sanitize_text_field($data['title']);

    if (is_user_logged_in()) {
        $likeExists = new WP_Query(array(
            'post_type' => 'like',
            'author' => wp_get_current_user()->data->ID,
            'meta_query' => array(
               array(
                  'key' => 'professor_like_id',
                  'compare' => '=',
                  'value' => $professorId
        )
      )
      ));

        if ($likeExists->found_posts == '0' && get_post_type($professorId) == 'professor') {
            return wp_insert_post(array(
                'post_type' => 'like',
                'post_status' => 'publish',
                'post_title' => $professorName,
                'meta_input' => array(
                    'professor_like_id' => $professorId
                )
              ));
        } else {
            die('Invalid Professor Id');
        }
    } else {
        die('you must be loggedin to like a professor');
    }
}

function deleteLike($data)
{
    $likeId = sanitize_text_field($data['like']);
    if (get_current_user_id() == get_post_field('post_author', $likeId) && get_post_type($likeId) == 'like') {
        return wp_delete_post($likeId, true);
    } else {
        die('You Can Not Delete This Post');
    }
}



add_action('rest_api_init', 'likeRoutes');
