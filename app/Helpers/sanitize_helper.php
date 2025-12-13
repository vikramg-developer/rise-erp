<?php

function clean_name($name){
    // Remove HTML tags
    $name = strip_tags($name);

    // Remove any javascript words inside the text
    $name = preg_replace('/script|javascript|on\w+=/i', '', $name);

    // Allow only letters, numbers, spaces, hyphens, apostrophes
    $name = preg_replace("/[^a-zA-Z0-9\s'-]/", "", $name);

    // Remove extra spaces
    $name = preg_replace('/\s+/', ' ', $name);

    return trim($name);
}