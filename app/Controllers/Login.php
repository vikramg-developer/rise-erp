<?php

namespace App\Controllers;

class Login extends BaseController {

    public $ModelStudentRegistration;

//    public $ModelFacultyRegistration;
//    public $ModelParentsRegistration;

    public function __construct() {
        $this->ModelStudentRegistration = model('ModelStudentRegistration');
//        $this->ModelFacultyRegistration = model('ModelFacultyRegistration');   
//        $this->ModelParentsRegistration = model('ModelParentsRegistration');
    }

    public function login() {
        return view('login/login-page');
    }

    public function check_user() {
//        $session = session();
//        $request = $this->request;
        $data = [];
        if ($this->request->getMethod() == 'post') {
            $user_type = clean_name($this->request->getVar('user_type'));
            $rise_no = clean_name($this->request->getVar('login_username'));
            $password = clean_name($this->request->getVar('login_password'));

            if ($user_type == 1) {

                $userdata = $this->ModelFacultyRegistration->verify_rise_no($data);
                if ($userdata) {
                    if (password_verify($password, $userdata['password'])) {
                        render_page('faculty/faculty-dashboard');
                    } else {
                        return view('login/login-page', ['errors' => $this->ModelFacultyRegistration->errors()]);
                    }
                } else {
                    return view('login/login-page', ['errors' => $this->ModelFacultyRegistration->errors()]);
                }
            } elseif ($user_type == 2) {
                $userdata = $this->ModelStudentRegistration->verify_rise_no($data);
                if ($userdata) {
                    if (password_verify($password, $userdata['password'])) {
                        render_page('student/student-dashboard');
                    } else {
                        return view('login/login-page', ['errors' => $this->ModelStudentRegistration->errors()]);
                    }
                } else {
                    return view('login/login-page', ['errors' => $this->ModelStudentRegistration->errors()]);
                }
            } elseif ($user_type == 3) {
                $userdata = $this->ModelParentsRegistration->verify_rise_no($data);
                if ($userdata) {
                    if (password_verify($password, $userdata['password'])) {
                        render_page('parents/parents-dashboard');
                    } else {
                        return view('login/login-page', ['errors' => $this->ModelParentsRegistration->errors()]);
                    }
                } else {
                    return view('login/login-page', ['errors' => $this->ModelParentsRegistration->errors()]);
                }
            }
        } else {
            $this->session->setTempdata('error', 'Please Login Again', 3);
            return redirect()->to(current_url());
        }
    }
}
