<?php

function headerUrl(){
    return esc_url(site_url());
}

add_filter('login_headerurl', 'headerUrl');


function loginCSS(){
    wp_enqueue_style('university_main_styles', get_stylesheet_uri());
}


add_action('login_enqueue_scripts', 'loginCSS');