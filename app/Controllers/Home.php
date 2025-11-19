<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        render_page('home/index');
    }
    
    public function about_us()
    {
        render_page('home/about-us');
    }
}
