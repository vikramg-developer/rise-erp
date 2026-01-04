<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class SessionLogoutFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        if (!session()->get('logged_in')) {
            return redirect()->to('/login');
        }

        $lastActivity = session('last_activity');

        if ($lastActivity && (time() - $lastActivity > 1800)) {
            session()->destroy();
            return redirect()->to('/login');
        }

        session()->set('last_activity', time());
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // 🔥 Disable cache after session timeout
        $response->setHeader('Cache-Control', 'no-store, no-cache, must-revalidate, max-age=0');
        $response->setHeader('Pragma', 'no-cache');
        $response->setHeader('Expires', '0');
    }
}
