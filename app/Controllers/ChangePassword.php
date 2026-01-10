<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class ChangePassword extends BaseController
{
    protected $modelfacultyregistration;

    public function __construct()
    {
        $this->modelfacultyregistration = model('ModelFacultyRegistration');
    }

    public function index()
    {
        $data['jspath'] = 'faculty/change-password';
        return render_page('settings/change-password', $data);
    }

    // 🔐 AJAX old password check
    public function checkOldPassword()
    {
        $old = $this->request->getPost('old_password');
        $faculty = $this->modelfacultyregistration
                        ->verify_rise_no(session('rise_no'));

        if (!$faculty || !password_verify($old, $faculty['faculty_password'])) {
            return $this->response->setJSON([
                'status' => false,
                'csrfHash' => csrf_hash()
            ]);
        }

        return $this->response->setJSON([
            'status' => true,
            'csrfHash' => csrf_hash()
        ]);
    }

    // 🔐 Update password
    public function update()
    {
        $old = $this->request->getPost('old_password');
        $new = $this->request->getPost('password');
        $confirm = $this->request->getPost('confirm_password');

        $faculty = $this->modelfacultyregistration
                        ->verify_rise_no(session('rise_no'));

        if (!password_verify($old, $faculty['faculty_password'])) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Old password is incorrect',
                'csrfHash' => csrf_hash()
            ]);
        }

        if ($new !== $confirm) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Passwords do not match',
                'csrfHash' => csrf_hash()
            ]);
        }

        if (password_verify($new, $faculty['faculty_password'])) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'New password must be different from old password',
                'csrfHash' => csrf_hash()
            ]);
        }

        // Model hashes automatically
        $this->modelfacultyregistration->update(
            $faculty['faculty_registration_id'],
            ['faculty_password' => $new]
        );

        return $this->response->setJSON([
            'status' => 'success',
            'message' => 'Password updated successfully',
            'csrfHash' => csrf_hash()
        ]);
    }
}
