<?php

function register_map_key($api){

    $api['key'] = 'AIzaSyAkuRL11s7kwmLpyEr5hnQqnphLAo8n8_w';
    return $api;
}


add_filter('acf/fields/google_map/api', 'register_map_key');