<?php

function register_fields()
{
    register_rest_field('post', 'authorName', array(
        'get_callback' => function () {
            return get_the_author();
        }
    ));
}


add_action('rest_api_init', 'register_fields');
