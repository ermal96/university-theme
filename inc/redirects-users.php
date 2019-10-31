<?php


// Redirects Subscribers To Home Page
function redirectsSubs(){
    
    $curentUser = wp_get_current_user();
    
    if(count($curentUser->roles) == 1 && $curentUser->roles[0] == 'subscriber'){
        wp_redirect(site_url());
        exit;
    }

}

add_action("admin_init", "redirectsSubs");


// Hide Admin Bar For Subscribers
function hideAdminBar(){
    
    $curentUser = wp_get_current_user();
    
    if(count($curentUser->roles) == 1 && $curentUser->roles[0] == 'subscriber'){
        show_admin_bar(false);
    }

}

add_action("wp_loaded", "hideAdminBar");