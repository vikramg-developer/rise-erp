<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        return render_page('home/index');
    }
    
    public function about_us()
    {
        return render_page('home/about-us');
    }
}
