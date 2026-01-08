<?php

if (! function_exists('timeGreeting')) {

    function timeGreeting()
    {
        $hour = date('H'); // 00–23

        if ($hour < 12) {
            return 'Good Morning 🌄️';
        } elseif ($hour < 17) {
            return 'Good Afternoon ☀️';
        } elseif ($hour < 21) {
            return 'Good Evening 🌅';
        } else {
            return 'Good Night 🌙';
        }
    }
}
