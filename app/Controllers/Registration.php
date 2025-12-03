<?php

namespace App\Controllers;

use App\Models\ModelRegistration;

class Registration extends BaseController {

    public $ModelRegistration;

    public function __construct() {
        $this->ModelRegistration = new ModelRegistration();
    }

    public function index() {
//        render_page('registration/student-registration');
        return view('registration/student-registration');
    }

    public function login() {
//        render_page('registration/student-registration');
        return view('registration/login-page');
    }

    public function saveSignup() {
//        echo"hello";
        $data = [
            'student_first_name' => $this->request->getPost('first-name'),
            'student_middle_name' => $this->request->getPost('middle-name'),
            'student_last_name' => $this->request->getPost('last-name'),
            'student_aadhar_number' => $this->request->getPost('aadhar-number'),
            'student_password' => password_hash($this->request->getPost('signup-password'), PASSWORD_DEFAULT),
            'student_rise_no' => $this->request->getPost('aadhar-number')
//            'signup-confirmpassword'=>$this->request->getPost('signup-confirmpassword'),
        ];
        $student_details = $this->ModelRegistration->add_registration_data($data);

        if ($student_details) {
            session()->setFlashdata('success', 'Account created successfully! Please Sign in.');

            return redirect()->to(base_url('registration'));
        } else {
            session()->setFlashdata('error', 'Something went wrong. Please try again.');
        }
    }
}
