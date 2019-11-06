<?php


function force_type_private($post)
{
    if ($post['post_type'] == 'notes') {
        $post['post_status'] = 'private';
    }
    return $post;
}
add_filter('wp_insert_post_data', 'force_type_private');
