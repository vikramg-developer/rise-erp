<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class PermissionFilter implements FilterInterface {

    public function before(RequestInterface $request, $arguments = null) {
        if (!session()->has('logged_in')) {
            return redirect()->to('login');
        }
        // admin bypass
        if (in_array(session('role_id'),array(1,2))) {
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
