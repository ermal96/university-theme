<?php


require(get_template_directory() . '/inc/init.php');

function print_pre($value)
{
    echo "<pre>",print_r($value, true),"</pre>";
}
