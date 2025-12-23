<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

/**
 * Description of SessionLogoutFilter
 *
 * @author SDC01
 */
class SessionLogoutFilter implements FilterInterface{

    public function before(RequestInterface $request, $arguments = null) {
        if (!session()->has('logged_in')) {
            return redirect()->to('login');
        }

        $lastActivity = session('last_activity');

        if ($lastActivity && time() - $lastActivity > 1800) {
            session()->destroy();
            return redirect()->to('/login');
        }

        session()->set('last_activity', time());
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null) {
        
    }
}
