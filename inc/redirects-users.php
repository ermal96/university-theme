<?php

function custom_login_redirect( $redirect_to, $request, $user ){
    global $user;
        if( isset( $user->roles ) && is_array( $user->roles ) ) {
            if( in_array( "administrator", $user->roles ) ) {
                return $redirect_to;
                    } else {
                    return home_url();
            }
        }
        else
            {
                return $redirect_to;
            }
    }

    add_filter("login_redirect", "custom_login_redirect", 10, 3);