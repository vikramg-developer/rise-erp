<?php

if (! function_exists('timeGreeting')) {

    function timeGreeting()
    {
        $hour = date('H');

        if ($hour < 12) {
            return 'Good Morning 🌄️';
        } elseif ($hour < 17) {
            return 'Good Afternoon ☀️';
        }
        return 'Good Evening 🌅';
    }
}
