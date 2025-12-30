<?php

function clean_name($name) {
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

function clean_special_name($name) {
    // Remove HTML tags
    $name = strip_tags($name);

    // Remove any javascript words inside the text
    $name = preg_replace('/script|javascript|on\w+=/i', '', $name);

    // Allow only letters, numbers, spaces, hyphens, apostrophes
    $name = preg_replace("/[^a-zA-Z0-9\s'-.]/", "", $name);

    // Remove extra spaces
    $name = preg_replace('/\s+/', ' ', $name);

    return trim($name);
}

function clean_number($number) {
    $number = strip_tags($number);
    $number = preg_replace('/script|javascript|on\w+=/i', '', $number);
    $number = preg_replace('/[^0-9]/', '', $number);
    $number = preg_replace('/\s+/', '', $number);

    return $number;
}

function clean_email($email)
{
    $email = strip_tags($email);
    $email = preg_replace('/script|javascript|on\w+=/i', '', $email);

    // allow only valid email characters
    $email = preg_replace('/[^a-zA-Z0-9@._+-]/', '', $email);

    $email = strtolower(trim($email));

    return $email;
}

