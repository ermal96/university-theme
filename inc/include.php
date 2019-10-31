<?php

//Theme Includes

function university_files()
{
    wp_deregister_script('jquery');
    wp_enqueue_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js', array(), null, true);
    wp_enqueue_script('googleMap', '//maps.googleapis.com/maps/api/js?key=AIzaSyAkuRL11s7kwmLpyEr5hnQqnphLAo8n8_w', null, '1.0', true);
    wp_enqueue_script('main-university-js', get_theme_file_uri('/js/scripts-bundled.js'), null, '1.0', true);
    wp_enqueue_script('searchJs', get_theme_file_uri('/js/search.js'), NULL, '1.0', true);
    wp_enqueue_script('myNotes', get_theme_file_uri('/js/myNotes.js'), NULL, '1.0', true);
    wp_enqueue_style('custom-google-fonts', '//fonts.googleapis.com/css?family=Noto+Sans+JP:300,400,500');
    wp_enqueue_style('font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
    wp_enqueue_style('bootstrap', '//stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css');
    wp_enqueue_style('university_main_styles', get_stylesheet_uri());
    wp_localize_script('searchJs', 'universityData', array(
        'root_url' => get_site_url(),
        'nonce'    => wp_create_nonce('wp_rest')
    ));
}

add_action('wp_enqueue_scripts', 'university_files');


