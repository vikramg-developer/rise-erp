<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class PermissionFilter implements FilterInterface {

    public function before(RequestInterface $request, $arguments = null) {
        
//        This filter runs and override Auth filter thats why is_logged in block repeated
        //User not logged in redirect to login page
        if (!session()->has('logged_in')) {
            return redirect()->to('login')->with('error', 'Please login first');
        }
        // admin bypass
        if (in_array(session('role_id'),array(1))) {
            return;
        }

//        Written this block if we forget to provide permissions in routes
//        
        // no permission defined
        if (empty($arguments)) {
            return service('response')
                            ->setStatusCode(403)
                            ->setBody(view('error-page/error403'));
//            return;
        }

        $userPermissions = session('permissions') ?? [];
        foreach ($arguments as $permission) {
            if (!in_array($permission, $userPermissions)) {
                return service('response')
                                ->setStatusCode(403)
                                ->setBody(view('error-page/error403'));
            }
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null) {
        // post-processing after the request
    }
}
