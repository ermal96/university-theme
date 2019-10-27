<?php


//Theme Features

function university_features()
{
    register_nav_menu('headerMenuLocation', 'Primary');
    register_nav_menu('footerMenuLocationOne', 'Footer ');
    register_nav_menu('footerMenuLocationTwo', 'Footer Menu Location Two ');
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_image_size('professorLandscape', 400, 260, true);
    add_image_size('professorPortrait', 480, 650, true);
}

add_action('after_setup_theme', 'university_features');
