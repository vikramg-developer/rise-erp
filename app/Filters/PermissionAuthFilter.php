<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class PermissionAuthFilter implements FilterInterface {

    public function before(RequestInterface $request, $arguments = null) {
        if (!session()->has('logged_in')) {
            return redirect()->to('login');
        }

        // admin bypass
        if (session('role_id') == 1) {
            return;
        }

        // no permission defined
        if (empty($arguments)) {
            return service('response')
                            ->setStatusCode(403)
                            ->setBody(view('error-page/error403'));
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
