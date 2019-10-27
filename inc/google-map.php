<?php

function register_map_key($api)
{
    $api['key'] = 'AIzaSyDbPRKbYOoLrAJ-olQHMJ7CUtd6mpcTfJk';
    return $api;
}


add_filter('acf/fields/google_map/api', 'register_map_key');
